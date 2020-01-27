<?php

/**
 * Enqueue scripts and styles.
 */
function tyreconnect_scripts() {
    wp_enqueue_style( 'default-style', get_template_directory_uri().'/assets/css/default.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'layout-style', get_template_directory_uri().'/assets/css/layout.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'media-style', get_template_directory_uri().'/assets/css/media-queries.css', array(), wp_get_theme()->get( 'Version' ) );
    //wp_enqueue_style('bootstrap-4','https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');

    wp_style_add_data( 'tyreconnect-style', 'rtl', 'replace' );

//    if ( has_nav_menu( 'menu-1' ) ) {
//        //wp_enqueue_script( 'tyreconnect-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '20181214', true );
//        //wp_enqueue_script( 'tyreconnect-touch-navigation', get_theme_file_uri( '/js/touch-keyboard-navigation.js' ), array(), '20181231', true );
//    }

    wp_enqueue_script( 'modernize', get_template_directory_uri().'/assets/js/modernizr.js' , array(), wp_get_theme()->get('Version'), false );

    wp_enqueue_style( 'tyreconnect-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    /**
     * Remove wordpress default jquery and enqueue from CDN
     */
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', null, '3.4.1', false);
    wp_enqueue_script('jquery');

    /**
     * Theme Scripts
     */
    wp_register_script( 'flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js' , array('jquery'), wp_get_theme()->get('Version'), true );
    wp_register_script( 'doubletaptogo', get_template_directory_uri() . '/assets/js/doubletaptogo.js' , array('flexslider'), wp_get_theme()->get('Version'), true );
    wp_enqueue_script( 'init', get_template_directory_uri() . '/assets/js/init.js' , array('doubletaptogo'), wp_get_theme()->get('Version'), true );

}
add_action( 'wp_enqueue_scripts', 'tyreconnect_scripts' );