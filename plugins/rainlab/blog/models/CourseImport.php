<?php namespace RainLab\Blog\Models;

use Backend\Models\ImportModel;
use Backend\Models\User as AuthorModel;
use ApplicationException;
use Exception;

/**
 * Course Import Model
 */
class CourseImport extends ImportModel
{
    public $table = 'rainlab_blog_courses';

    /**
     * Validation rules
     */
    public $rules = [
        'title'   => 'required',
        'content' => 'required'
    ];

    protected $authorEmailCache = [];

    protected $categoryNameCache = [];

    public function getDefaultAuthorOptions()
    {
        return AuthorModel::all()->lists('full_name', 'email');
    }

    public function getCategoriesOptions()
    {
        return Category::lists('name', 'id');
    }

    public function importData($results, $sessionKey = null)
    {
        $firstRow = reset($results);

        /*
         * Validation
         */
        if ($this->auto_create_categories && !array_key_exists('categories', $firstRow)) {
            throw new ApplicationException('Please specify a match for the Categories column.');
        }

        /*
         * Import
         */
        foreach ($results as $row => $data) {
            try {

                if (!$title = array_get($data, 'title')) {
                    $this->logSkipped($row, 'Missing course title');
                    continue;
                }

                /*
                 * Find or create
                 */
                $course = Course::make();

                if ($this->update_existing) {
                    $course = $this->findDuplicateCourse($data) ?: $course;
                }

                $courseExists = $course->exists;

                /*
                 * Set attributes
                 */
                $except = ['id', 'categories', 'author_email'];

                foreach (array_except($data, $except) as $attribute => $value) {
                    $course->{$attribute} = $value ?: null;
                }

                if ($author = $this->findAuthorFromEmail($data)) {
                    $course->user_id = $author->id;
                }

                $course->forceSave();

                if ($categoryIds = $this->getCategoryIdsForCourse($data)) {
                    $course->categories()->sync($categoryIds, false);
                }

                /*
                 * Log results
                 */
                if ($courseExists) {
                    $this->logUpdated();
                }
                else {
                    $this->logCreated();
                }
            }
            catch (Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }
        }
    }

    protected function findAuthorFromEmail($data)
    {
        if (!$email = array_get($data, 'email', $this->default_author)) {
            return null;
        }

        if (isset($this->authorEmailCache[$email])) {
            return $this->authorEmailCache[$email];
        }

        $author = AuthorModel::where('email', $email)->first();
        return $this->authorEmailCache[$email] = $author;
    }

    protected function findDuplicateCourse($data)
    {
        if ($id = array_get($data, 'id')) {
            return Course::find($id);
        }

        $title = array_get($data, 'title');
        $course = Course::where('title', $title);

        if ($slug = array_get($data, 'slug')) {
            $course->orWhere('slug', $slug);
        }

        return $course->first();
    }

    protected function getCategoryIdsForCourse($data)
    {
        $ids = [];

        if ($this->auto_create_categories) {
            $categoryNames = $this->decodeArrayValue(array_get($data, 'categories'));

            foreach ($categoryNames as $name) {
                if (!$name = trim($name)) {
                    continue;
                }

                if (isset($this->categoryNameCache[$name])) {
                    $ids[] = $this->categoryNameCache[$name];
                }
                else {
                    $newCategory = Category::firstOrCreate(['name' => $name]);
                    $ids[] = $this->categoryNameCache[$name] = $newCategory->id;
                }
            }
        }
        elseif ($this->categories) {
            $ids = (array) $this->categories;
        }

        return $ids;
    }
}
