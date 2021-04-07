<?php


namespace classes;


class Plugin
{

    public $plugins = [];

    public function __construct()
    {
        $theme_plugin_directory = get_template_directory() . '/plugins/';
        $plugins = preg_grep('/^([^.])/', scandir($theme_plugin_directory));
        if ( $plugins ) {
            foreach ($plugins as $plugin){
                if ( !is_file( $theme_plugin_directory . $plugin ) ) {
                    array_push($this->plugins, $plugin);
                }
            }
        }
    }




}