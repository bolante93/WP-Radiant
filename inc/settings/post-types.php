<?php
//add_action( 'init', 'tyreconnect_testimonials_post_type' );
add_action( 'init', 'tyreconnect_register_post_type' );

function tyreconnect_register_post_type() {
    $testimonial = [
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

    //register_post_type('testimonials', $testimonial );

    $blog = [
        'name' => 'blog',
        'singular_name' => 'Blog',
        'label' => 'Blog',
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-format-quote',
        'show_in_menu  ' => true,
        'public' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'thumbnail', 'editor'),
        'show_ui' => true

    ];
    register_post_type('blog', $blog );
}

