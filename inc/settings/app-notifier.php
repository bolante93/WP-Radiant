<?php

add_action( 'publish_post', 'post_published_notification1', 10, 2 );
function post_published_notification1( $ID, $post ) {
    $author = $post->post_author; /* Post author ID. */
    $name = get_the_author_meta( 'display_name', $author );
    $thumb = get_the_post_thumbnail_url( $post->ID );


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