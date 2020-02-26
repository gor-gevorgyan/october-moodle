<?php namespace RainLab\Blog\Components;

use Event;
use BackendAuth;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use RainLab\Blog\Models\Course as BlogCourse;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Course extends ComponentBase
{
    /**
     * @var RainLab\Blog\Models\Course The course model used for display.
     */
    public $course;

    /**
     * @var string Reference to the page name for linking to categories.
     */
    public $categoryPage;

    public function componentDetails()
    {
        return [
            'name'        => 'rainlab.blog::lang.settings.course_title',
            'description' => 'rainlab.blog::lang.settings.course_description'
        ];
    }

    public function defineProperties()
    {
        return [
            'slug' => [
                'title'       => 'rainlab.blog::lang.settings.course_slug',
                'description' => 'rainlab.blog::lang.settings.course_slug_description',
                'default'     => '{{ :slug }}',
                'type'        => 'string',
            ],
            'categoryPage' => [
                'title'       => 'rainlab.blog::lang.settings.course_category',
                'description' => 'rainlab.blog::lang.settings.course_category_description',
                'type'        => 'dropdown',
                'default'     => 'blog/category',
            ],
        ];
    }

    public function getCategoryPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function init()
    {
        Event::listen('translate.localePicker.translateParams', function ($page, $params, $oldLocale, $newLocale) {
            $newParams = $params;

            foreach ($params as $paramName => $paramValue) {
                $records = BlogCourse::transWhere($paramName, $paramValue, $oldLocale)->first();

                if ($records) {
                    $records->translateContext($newLocale);
                    $newParams[$paramName] = $records[$paramName];
                }
            }
            return $newParams;
        });
    }

    public function onRun()
    {
        $this->categoryPage = $this->page['categoryPage'] = $this->property('categoryPage');
        $this->course = $this->page['course'] = $this->loadCourse();
    }

    public function onRender()
    {
        if (empty($this->course)) {
            $this->course = $this->page['course'] = $this->loadCourse();
        }
    }

    protected function loadCourse()
    {
        $slug = $this->property('slug');

        $course = new BlogCourse;

        $course = $course->isClassExtendedWith('RainLab.Translate.Behaviors.TranslatableModel')
            ? $course->transWhere('slug', $slug)
            : $course->where('slug', $slug);

        if (!$this->checkEditor()) {
            $course = $course->isPublished();
        }

        try {
            $course = $course->firstOrFail();
        } catch (ModelNotFoundException $ex) {
            $this->setStatusCode(404);
            return $this->controller->run('404');
        }

        /*
         * Add a "url" helper attribute for linking to each category
         */
        if ($course && $course->categories->count()) {
            $course->categories->each(function($category) {
                $category->setUrl($this->categoryPage, $this->controller);
            });
        }

        return $course;
    }

    public function previousCourse()
    {
        return $this->getCourseSibling(-1);
    }

    public function nextCourse()
    {
        return $this->getCourseSibling(1);
    }

    protected function getCourseSibling($direction = 1)
    {
        if (!$this->course) {
            return;
        }

        $method = $direction === -1 ? 'previousCourse' : 'nextCourse';

        if (!$course = $this->course->$method()) {
            return;
        }

        $coursePage = $this->getPage()->getBaseFileName();

        $course->setUrl($coursePage, $this->controller);

        $course->categories->each(function($category) {
            $category->setUrl($this->categoryPage, $this->controller);
        });

        return $course;
    }

    protected function checkEditor()
    {
        $backendUser = BackendAuth::getUser();

        return $backendUser && $backendUser->hasAccess('rainlab.blog.access_courses');
    }
}
