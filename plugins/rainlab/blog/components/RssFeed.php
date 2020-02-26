<?php namespace RainLab\Blog\Components;

use Lang;
use Response;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use RainLab\Blog\Models\Course as BlogCourse;
use RainLab\Blog\Models\Category as BlogCategory;

class RssFeed extends ComponentBase
{
    /**
     * A collection of courses to display
     * @var Collection
     */
    public $courses;

    /**
     * If the course list should be filtered by a category, the model to use.
     * @var Model
     */
    public $category;

    /**
     * Reference to the page name for the main blog page.
     * @var string
     */
    public $blogPage;

    /**
     * Reference to the page name for linking to courses.
     * @var string
     */
    public $coursePage;

    public function componentDetails()
    {
        return [
            'name'        => 'rainlab.blog::lang.settings.rssfeed_title',
            'description' => 'rainlab.blog::lang.settings.rssfeed_description'
        ];
    }

    public function defineProperties()
    {
        return [
            'categoryFilter' => [
                'title'       => 'rainlab.blog::lang.settings.courses_filter',
                'description' => 'rainlab.blog::lang.settings.courses_filter_description',
                'type'        => 'string',
                'default'     => '',
            ],
            'sortOrder' => [
                'title'       => 'rainlab.blog::lang.settings.courses_order',
                'description' => 'rainlab.blog::lang.settings.courses_order_description',
                'type'        => 'dropdown',
                'default'     => 'created_at desc',
            ],
            'coursesPerPage' => [
                'title'             => 'rainlab.blog::lang.settings.courses_per_page',
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'rainlab.blog::lang.settings.courses_per_page_validation',
                'default'           => '10',
            ],
            'blogPage' => [
                'title'       => 'rainlab.blog::lang.settings.rssfeed_blog',
                'description' => 'rainlab.blog::lang.settings.rssfeed_blog_description',
                'type'        => 'dropdown',
                'default'     => 'blog/course',
                'group'       => 'rainlab.blog::lang.settings.group_links',
            ],
            'coursePage' => [
                'title'       => 'rainlab.blog::lang.settings.courses_course',
                'description' => 'rainlab.blog::lang.settings.courses_course_description',
                'type'        => 'dropdown',
                'default'     => 'blog/course',
                'group'       => 'rainlab.blog::lang.settings.group_links',
            ],
        ];
    }

    public function getBlogPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function getCoursePageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function getSortOrderOptions()
    {
        $options = BlogCourse::$allowedSortingOptions;

        foreach ($options as $key => $value) {
            $options[$key] = Lang::get($value);
        }

        return $options;
    }

    public function onRun()
    {
        $this->prepareVars();

        $xmlFeed = $this->renderPartial('@default');

        return Response::make($xmlFeed, '200')->header('Content-Type', 'text/xml');
    }

    protected function prepareVars()
    {
        $this->blogPage = $this->page['blogPage'] = $this->property('blogPage');
        $this->coursePage = $this->page['coursePage'] = $this->property('coursePage');
        $this->category = $this->page['category'] = $this->loadCategory();
        $this->courses = $this->page['courses'] = $this->listCourses();

        $this->page['link'] = $this->pageUrl($this->blogPage);
        $this->page['rssLink'] = $this->currentPageUrl();
    }

    protected function listCourses()
    {
        $category = $this->category ? $this->category->id : null;

        /*
         * List all the courses, eager load their categories
         */
        $courses = BlogCourse::with('categories')->listFrontEnd([
            'sort'     => $this->property('sortOrder'),
            'perPage'  => $this->property('coursesPerPage'),
            'category' => $category
        ]);

        /*
         * Add a "url" helper attribute for linking to each course and category
         */
        $courses->each(function($course) {
            $course->setUrl($this->coursePage, $this->controller);
        });

        return $courses;
    }

    protected function loadCategory()
    {
        if (!$categoryId = $this->property('categoryFilter')) {
            return null;
        }

        if (!$category = BlogCategory::whereSlug($categoryId)->first()) {
            return null;
        }

        return $category;
    }
}
