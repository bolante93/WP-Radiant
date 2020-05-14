<?php

//add_action( 'new_posts', 'post_published_notification1', 10, 2 );
add_action('transition_post_status', 'post_published_notification', 10, 3);
function post_published_notification( $new_status, $old_status, $post ) {

    if('publish' === $new_status && 'draft' === $old_status && $post->post_type === 'post') {
        $author = $post->post_author; /* Post author ID. */
        $name = get_the_author_meta( 'display_name', $author );
        $thumb = get_the_post_thumbnail_url($post->ID);
        $thumb = explode( site_url(), $thumb  )[1];

        $post_data = [
            'title' => $post->post_title,
            'body' => get_the_excerpt($post->ID),
            'id' => $post->ID,
            'thumb' => 'http://192.168.0.115/projects/wordpress/WP-Plugins'.$thumb,
        ];
        $response = wp_remote_request( 'http://192.168.0.115:3000/notification/',
            array(
                'method' => 'POST',
                'body' => $post_data
            )
        );
    }

}