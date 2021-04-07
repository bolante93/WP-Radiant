<?php
namespace admin\options\controller;

use classes\Helper;

class IndexController extends Controller
{

    public static function index()
    {

        try {
            $options = get_option('_theme_option');
//            wp_die( var_dump($options) );
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
//            wp_die( var_dump($options) );
            return parent::renderStatic('index', [ 'options' => $options ]);
        } catch (\Exception $e) {
            wp_die('Template ENGINE Error');
        }
    }

    public function theme_option_scripts () {

    }

}