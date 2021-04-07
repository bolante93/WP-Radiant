<?php

namespace admin\options;

use classes\Helper;

class Options {

    public function __construct()
    {
        add_filter( 'admin_menu', array( $this, 'theme_options' ) );
    }

    public function theme_options() {
        $menu = add_menu_page('Theme Options', 'Theme Options', 'manage_options', 'options', '\admin\options\controller\IndexController::index');
        add_action( 'admin_print_styles-' . $menu, array( $this, 'admin_custom_css' ) );
    }

    public function admin_custom_css (){
        wp_enqueue_style('gg', get_template_directory_uri() . '/options/assets/css/options.css');
    }

    static function get( $key = '' ) {
        $options = get_option('_theme_option');
        $defaults = [
            'version'       => '',
            'fonts'         => [
                'google_font_primary' => '',
                'google_font_secondary' => '',
            ],
            'debug'         => null,
            'advanced'      => [
                'disable_gb_editor' => null,
                'allow_svg_upload' => null,
            ],
        ];
        $options = Helper::wp_parse_args_r( $options, $defaults );

        return $options[$key];
    }

}

