<?php
function wp_smascss_post_thumbnail( $size = 'full' ) {
    $featured_image     = wp_get_attachment_image_src( get_post_thumbnail_id(), $size );
    $featured_image_url = $featured_image[0];
    return $featured_image_url;
}