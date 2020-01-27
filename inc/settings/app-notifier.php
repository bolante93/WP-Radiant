<?php

//add_action( 'new_posts', 'post_published_notification1', 10, 2 );
add_action('transition_post_status', 'post_published_notification', 10, 3);
function post_published_notification( $new_status, $old_status, $post ) {

    if('publish' === $new_status && 'draft' === $old_status && $post->post_type === 'post') {
        $author = $post->post_author; /* Post author ID. */
        $name = get_the_author_meta( 'display_name', $author );
        $thumb = get_the_post_thumbnail_url($post->ID);


        $post_data = [
            'title' => $post->post_title,
            'author'=> $name,
            'id' => $post->ID,
            'thumb' => $thumb,
        ];
        $response = wp_remote_request( 'http://192.168.0.115:5000/api/v1/notification/new-post',
            array(
                'method' => 'POST',
                'body' => $post_data
            )
        );
    }

}