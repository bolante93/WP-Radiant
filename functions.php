<?php
/**
 * tyreconnect functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage tyreconnect
 * @since 1.0.0
 */

/**
 * tyreconnect only works in WordPress 4.7 or later.
 */
error_reporting(E_ALL);
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}else{
    defined( 'TC_CORE_PATH' ) or define( 'TC_CORE_PATH', get_theme_file_path('/inc/') );
}

/**
 * Theme core files
 */
require_once TC_CORE_PATH . 'init.php';
require_once get_theme_file_path() . '/classes/class-twentytwenty-walker-comment.php';

add_filter( 'block_categories', 'gavilan_blocks', 10, 2);
function gavilan_blocks( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'tyreconnect-blocks',
                'title' => __( 'TyreConnect Blocks', 'tyreconnect' ),
            ),
        )
    );
}

function admin_enqueue_style( $hook ) { 
    wp_enqueue_style('bootstrap-4','https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
}


add_filter( 'upload_mimes', 'tyreconnect_custom_mime_types' );
function tyreconnect_custom_mime_types( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    unset( $mimes['exe'] );
    return $mimes;
}


/**
 * Register widget area.
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_action( 'widgets_init', 'tyreconnect_widgets_init' );
function tyreconnect_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'tyreconnect' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'tyreconnect' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}


