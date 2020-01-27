<?php
add_action( 'init', 'tyreconnect_testimonials_post_type' );
add_action( 'init', 'tyreconnect_hero_post_type' );

function tyreconnect_testimonials_post_type() {
    $args = [
        'name' => 'testimonials',
        'label' => 'testimonials',
        'singular_name' => 'Testimonials',
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-chart-pie',
        'show_in_menu  ' => true,
        'public' => true,
        'hierarchical' => false,
        'menu_position' => 50,
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_ui' => true

    ];
    register_post_type('testimonials', $args );
}

function tyreconnect_hero_post_type() {
    $args = [
        'name' => 'hero',
        'singular_name' => 'Hero Section',
        'label' => 'Hero Section',
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-images-alt',
        'show_in_menu  ' => true,
        'public' => true,
        'hierarchical' => false,
        'menu_position' => 51,
        'supports' => array('title'),
        'show_ui' => true

    ];
    register_post_type('hero', $args );
}