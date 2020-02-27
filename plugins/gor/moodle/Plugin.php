<?php namespace Gor\Moodle;

/**
 * The plugin.php file (called the plugin initialization script) defines the plugin information class.
 */

use System\Classes\PluginBase;

class Plugin extends PluginBase
{

    public function pluginDetails()
    {
        return [
            'name'        => 'gor',
            'description' => 'gor moodle',
            'author'      => 'Gor',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerComponents()
    {
        return [
            '\Gor\Moodle\Components\Classes' => 'classes'
        ];
    }
}
