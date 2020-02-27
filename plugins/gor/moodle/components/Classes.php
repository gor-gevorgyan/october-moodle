<?php namespace Gor\Moodle\Components;

use Cms\Classes\ComponentBase;

class Classes extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'classes',
            'description' => 'moodle classes'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function init()
    {
        $token = config('moodle.token'); // d39ac25b9f01ff86acd4bd34aa2cde9c
        $domain_name = config('moodle.domain'); // https://test-as.moodlecloud.com
        $function_name = 'core_course_get_courses';
        $rest_format = 'json';

        $server_url = $domain_name . '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $function_name . '&moodlewsrestformat=' . $rest_format;

        try {
            $courses_json = file_get_contents($server_url, true);
        } catch (\Exception $e) {
            $courses_json = '{}';
        }

        $courses = json_decode($courses_json, true);
        $this->page['courses'] = $courses;
    }

    public function onRun()
    {
        //ss https://codepen.io/vasansr/pen/PZOJXr
        $this->addCss('assets/css/table.css');
    }

    public function onRender()
    {
        //
    }
}
