<?php namespace RainLab\Blog\Models;

use Backend\Models\ExportModel;
use ApplicationException;

/**
 * Course Export Model
 */
class CourseExport extends ExportModel
{
    public $table = 'rainlab_blog_courses';

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'course_user' => [
            'Backend\Models\User',
            'key' => 'user_id'
        ]
    ];

    public $belongsToMany = [
        'course_categories' => [
            'RainLab\Blog\Models\Category',
            'table'    => 'rainlab_blog_courses_categories',
            'key'      => 'course_id',
            'otherKey' => 'category_id'
        ]
    ];

    public $hasMany = [
        'featured_images' => [
            'System\Models\File',
            'order' => 'sort_order',
            'key' => 'attachment_id',
            'conditions' => "field = 'featured_images' AND attachment_type = 'RainLab\\\\Blog\\\\Models\\\\Course'"
        ]
    ];

    /**
     * The accessors to append to the model's array form.
     * @var array
     */
    protected $appends = [
        'author_email',
        'categories',
        'featured_image_urls'
    ];

    public function exportData($columns, $sessionKey = null)
    {
        $result = self::make()
            ->with([
                'course_user',
                'course_categories',
                'featured_images'
            ])
            ->get()
            ->toArray()
        ;

        return $result;
    }

    public function getAuthorEmailAttribute()
    {
        if (!$this->course_user) {
            return '';
        }

        return $this->course_user->email;
    }

    public function getCategoriesAttribute()
    {
        if (!$this->course_categories) {
            return '';
        }

        return $this->encodeArrayValue($this->course_categories->lists('name'));
    }

    public function getFeaturedImageUrlsAttribute()
    {
        if (!$this->featured_images) {
            return '';
        }

        return $this->encodeArrayValue($this->featured_images->map(function ($image) {
            return $image->getPath();
        }));
    }
}
