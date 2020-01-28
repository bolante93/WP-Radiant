<?php
add_action( 'after_setup_theme', 'tyreconnect_setup' );
if ( ! function_exists( 'tyreconnect_setup' ) ) :
    function tyreconnect_setup() {
        load_theme_textdomain( 'tyreconnect', get_template_directory() . '/languages' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1568, 9999 );
        register_nav_menus(
            array(
                'menu-1' => __( 'Primary', 'tyreconnect' ),
                'right_menu-1' => __( 'RightPrimary', 'tyreconnect' ),
                'footer' => __( 'Footer Menu', 'tyreconnect' ),
                'social' => __( 'Social Links Menu', 'tyreconnect' ),
            )
        );
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'script',
                'style',
            )
        );
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 190,
                'width'       => 190,
                'flex-width'  => false,
                'flex-height' => false,
            )
        );

        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'align-wide' );
        add_theme_support( 'editor-styles' );
        add_theme_support(
            'editor-font-sizes',
            array(
                array(
                    'name'      => __( 'Small', 'tyreconnect' ),
                    'shortName' => __( 'S', 'tyreconnect' ),
                    'size'      => 19.5,
                    'slug'      => 'small',
                ),
                array(
                    'name'      => __( 'Normal', 'tyreconnect' ),
                    'shortName' => __( 'M', 'tyreconnect' ),
                    'size'      => 22,
                    'slug'      => 'normal',
                ),
                array(
                    'name'      => __( 'Large', 'tyreconnect' ),
                    'shortName' => __( 'L', 'tyreconnect' ),
                    'size'      => 36.5,
                    'slug'      => 'large',
                ),
                array(
                    'name'      => __( 'Huge', 'tyreconnect' ),
                    'shortName' => __( 'XL', 'tyreconnect' ),
                    'size'      => 49.5,
                    'slug'      => 'huge',
                ),
            )
        );
        add_theme_support(
            'editor-color-palette',
            array(

                array(
                    'name'  => __( 'Dark Gray', 'tyreconnect' ),
                    'slug'  => 'dark-gray',
                    'color' => '#111',
                ),
                array(
                    'name'  => __( 'Light Gray', 'tyreconnect' ),
                    'slug'  => 'light-gray',
                    'color' => '#767676',
                ),
                array(
                    'name'  => __( 'White', 'tyreconnect' ),
                    'slug'  => 'white',
                    'color' => '#FFF',
                ),
            )
        );
        add_theme_support( 'responsive-embeds' );
    }
endif;
