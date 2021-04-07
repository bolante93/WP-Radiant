<?php
/**
 * Partial template for displaying content a content
 */
?>
<!--<div class="post-item">-->
<!--    --><?php //do_action('wp_smascss_post_thumbnail'); // Apply proper { width & height } img attributes ?>
<!--    <div class="post-meta">-->
<!--        <h2>--><?php //echo get_the_title() ?><!--</h2>-->
<!--        <p> --><?php //echo get_the_excerpt() ?><!-- </p>-->
<!--        <a href="--><?php //echo esc_url(get_the_permalink()) ?><!--" class="button outline gray"> Read More </a>-->
<!--    </div>-->
<!--</div>-->

<div class="card">
    <h2 class="light">Design Identity</h2>
    <p><?php echo get_the_excerpt() ?></p>
    <a class="button crimson arrow" href="./identity.html">
        Read More
        <div class="icon-wrapper">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/right-arrow.svg" alt="" />
        </div>
    </a>
</div>