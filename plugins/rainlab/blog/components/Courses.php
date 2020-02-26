<?php namespace RainLab\Blog\Components;

use Lang;
use Redirect;
use BackendAuth;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use October\Rain\Database\Model;
use October\Rain\Database\Collection;
use RainLab\Blog\Models\Course as BlogCourse;
use RainLab\Blog\Models\Category as BlogCategory;
use RainLab\Blog\Models\Settings as BlogSettings;

class Courses extends ComponentBase
{
    /**
     * A collection of courses to display
     *
     * @var Collection
     */
    public $courses;

    /**
     * Parameter to use for the page number
     *
     * @var string
     */
    public $pageParam;

    /**
     * If the course list should be filtered by a category, the model to use
     *
     * @var Model
     */
    public $category;

    /**
     * Message to display when there are no messages
     *
     * @var string
     */
    public $noCoursesMessage;

    /**
     * Reference to the page name for linking to courses
     *
     * @var string
     */
    public $coursePage;

    /**
     * Reference to the page name for linking to categories
     *
     * @var string
     */
    public $categoryPage;

    /**
     * If the course list should be ordered by another attribute
     *
     * @var string
     */
    public $sortOrder;

    public function componentDetails()
    {
        return [
            'name'        => 'rainlab.blog::lang.settings.courses_title',
            'description' => 'rainlab.blog::lang.settings.courses_description'
        ];
    }

    public function defineProperties()
    {
        return [
            'pageNumber' => [
                'title'       => 'rainlab.blog::lang.settings.courses_pagination',
                'description' => 'rainlab.blog::lang.settings.courses_pagination_description',
                'type'        => 'string',
                'default'     => '{{ :page }}',
            ],
            'categoryFilter' => [
                'title'       => 'rainlab.blog::lang.settings.courses_filter',
                'description' => 'rainlab.blog::lang.settings.courses_filter_description',
                'type'        => 'string',
                'default'     => '',
            ],
            'coursesPerPage' => [
                'title'             => 'rainlab.blog::lang.settings.courses_per_page',
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'rainlab.blog::lang.settings.courses_per_page_validation',
                'default'           => '10',
            ],
            'noCoursesMessage' => [
                'title'             => 'rainlab.blog::lang.settings.courses_no_courses',
                'description'       => 'rainlab.blog::lang.settings.courses_no_courses_description',
                'type'              => 'string',
                'default'           => Lang::get('rainlab.blog::lang.settings.courses_no_courses_default'),
                'showExternalParam' => false,
            ],
            'sortOrder' => [
                'title'       => 'rainlab.blog::lang.settings.courses_order',
                'description' => 'rainlab.blog::lang.settings.courses_order_description',
                'type'        => 'dropdown',
                'default'     => 'published_at desc',
            ],
            'categoryPage' => [
                'title'       => 'rainlab.blog::lang.settings.courses_category',
                'description' => 'rainlab.blog::lang.settings.courses_category_description',
                'type'        => 'dropdown',
                'default'     => 'blog/category',
                'group'       => 'rainlab.blog::lang.settings.group_links',
            ],
            'coursePage' => [
                'title'       => 'rainlab.blog::lang.settings.courses_course',
                'description' => 'rainlab.blog::lang.settings.courses_course_description',
                'type'        => 'dropdown',
                'default'     => 'blog/course',
                'group'       => 'rainlab.blog::lang.settings.group_links',
            ],
            'exceptCourse' => [
                'title'             => 'rainlab.blog::lang.settings.courses_except_course',
                'description'       => 'rainlab.blog::lang.settings.courses_except_course_description',
                'type'              => 'string',
                'validationPattern' => '^[a-z0-9\-_,\s]+$',
                'validationMessage' => 'rainlab.blog::lang.settings.courses_except_course_validation',
                'default'           => '',
                'group'             => 'rainlab.blog::lang.settings.group_exceptions',
            ],
            'exceptCategories' => [
                'title'             => 'rainlab.blog::lang.settings.courses_except_categories',
                'description'       => 'rainlab.blog::lang.settings.courses_except_categories_description',
                'type'              => 'string',
                'validationPattern' => '^[a-z0-9\-_,\s]+$',
                'validationMessage' => 'rainlab.blog::lang.settings.courses_except_categories_validation',
                'default'           => '',
                'group'             => 'rainlab.blog::lang.settings.group_exceptions',
            ],
        ];
    }

    public function getCategoryPageOptions()
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

        $this->category = $this->page['category'] = $this->loadCategory();
        $this->courses = $this->page['courses'] = $this->listCourses();

        /*
         * If the page number is not valid, redirect
         */
        if ($pageNumberParam = $this->paramName('pageNumber')) {
            $currentPage = $this->property('pageNumber');

            if ($currentPage > ($lastPage = $this->courses->lastPage()) && $currentPage > 1) {
                return Redirect::to($this->currentPageUrl([$pageNumberParam => $lastPage]));
            }
        }
    }

    protected function prepareVars()
    {
        $this->pageParam = $this->page['pageParam'] = $this->paramName('pageNumber');
        $this->noCoursesMessage = $this->page['noCoursesMessage'] = $this->property('noCoursesMessage');

        /*
         * Page links
         */
        $this->coursePage = $this->page['coursePage'] = $this->property('coursePage');
        $this->categoryPage = $this->page['categoryPage'] = $this->property('categoryPage');
    }

    protected function listCourses()
    {
        $category = $this->category ? $this->category->id : null;

        /*
         * List all the courses, eager load their categories
         */
        $isPublished = !$this->checkEditor();

        $courses = BlogCourse::with('categories')->listFrontEnd([
            'page'             => $this->property('pageNumber'),
            'sort'             => $this->property('sortOrder'),
            'perPage'          => $this->property('coursesPerPage'),
            'search'           => trim(input('search')),
            'category'         => $category,
            'published'        => $isPublished,
            'exceptCourse'       => is_array($this->property('exceptCourse'))
                ? $this->property('exceptCourse')
                : preg_split('/,\s*/', $this->property('exceptCourse'), -1, PREG_SPLIT_NO_EMPTY),
            'exceptCategories' => is_array($this->property('exceptCategories'))
                ? $this->property('exceptCategories')
                : preg_split('/,\s*/', $this->property('exceptCategories'), -1, PREG_SPLIT_NO_EMPTY),
        ]);

        /*
         * Add a "url" helper attribute for linking to each course and category
         */
        $courses->each(function($course) {
            $course->setUrl($this->coursePage, $this->controller);

            $course->categories->each(function($category) {
                $category->setUrl($this->categoryPage, $this->controller);
            });
        });

        return $courses;
    }

    protected function loadCategory()
    {
        if (!$slug = $this->property('categoryFilter')) {
            return null;
        }

        $category = new BlogCategory;

        $category = $category->isClassExtendedWith('RainLab.Translate.Behaviors.TranslatableModel')
            ? $category->transWhere('slug', $slug)
            : $category->where('slug', $slug);

        $category = $category->first();

        return $category ?: null;
    }

    protected function checkEditor()
    {
        $backendUser = BackendAuth::getUser();

        return $backendUser && $backendUser->hasAccess('rainlab.blog.access_courses') && BlogSettings::get('show_all_courses', true);
    }
}
