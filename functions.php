<?php
/**
 * Theme functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 */

use admin\options\Options;

require_once 'includes/constants.php';
require_once 'vendor/autoload.php';
require_once 'plugins/meta-box/meta-box.php';
require_once 'plugins/mb-term-meta/mb-term-meta.php';
require_once 'options/options.php';


add_action('after_setup_theme', function () {
    remove_filter( 'the_content', 'wpautop' );
    remove_filter( 'the_excerpt', 'wpautop' );
    new classes\Actions();
    new classes\Filters();
    new admin\options\Options();
    new classes\Scripts();
});


add_shortcode( 'asset-icon', 'asset_icon' );
function asset_icon( $atts ) {
    $atts = shortcode_atts( array(
        'image_file' => 'copy-icon.svg',
    ), $atts, 'asset-icon' );

//    wp_die( var_dump($atts) );
    $theme_uri = get_template_directory_uri() . '/assets/images/icon';
    $file = $atts['image_file'];

    return '<img src="'. $theme_uri . '/' . $file .'" alt="imco-icon">';
}

add_action( 'admin_action_save_theme_options', function () {
    if ( ! empty( $_POST['option'] ) && check_admin_referer( '_save_theme_options' ) ) {

        if ( isset( $_POST['option'] ) && $option = $_POST['option'] ) {
            foreach ( $option as $key => $value ){
                if ( $key === 'fonts' || $key === 'advanced' )
                    continue;
                $option[$key] = sanitize_text_field( $value );
            }
//            $sanitized_option = serialize( $option );
//            wp_die( var_dump($option) );
            update_option('_theme_option', $option );
        }
        wp_redirect( $_SERVER['HTTP_REFERER'] );
        die(0);
    }
} );

