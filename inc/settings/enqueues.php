<?php
add_action( 'wp_enqueue_scripts', 'tyreconnect_scripts' );

/**
 * Enqueue scripts and styles.
 */
function tyreconnect_scripts() {
    //wp_enqueue_style( 'tyreconnect-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'tyreconnect-style', get_template_directory_uri().'/assets/css/main.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'editor-style', get_template_directory_uri().'/style.css', array(), wp_get_theme()->get( 'Version' ) );
    //wp_enqueue_style( 'tyreconnect-swiper-min', get_template_directory_uri().'/css/swiper.min.css', array('tyreconnect-style'), wp_get_theme()->get( 'Version' ) );
    //wp_enqueue_style( 'tyreconnect-ui-library', get_template_directory_uri().'/css/ui-library.css', array(), wp_get_theme()->get( 'Version' ) );

    wp_style_add_data( 'tyreconnect-style', 'rtl', 'replace' );

    if ( has_nav_menu( 'menu-1' ) ) {
        //wp_enqueue_script( 'tyreconnect-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '20181214', true );
        //wp_enqueue_script( 'tyreconnect-touch-navigation', get_theme_file_uri( '/js/touch-keyboard-navigation.js' ), array(), '20181231', true );
    }

    wp_enqueue_script( 'tyreconnect-main', get_template_directory_uri().'/assets/js/main.js' , array(), '20181231', true );
    wp_enqueue_script( 'tyreconnect-swiper', get_template_directory_uri() . '/assets/js/swiper.min.js' , array(), '20181231', true );
    wp_enqueue_style( 'tyreconnect-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', null, '3.4.1', false);
    wp_enqueue_script('jquery');
}
