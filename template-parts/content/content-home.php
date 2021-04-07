<?php
/**
 * Partial template for displaying content a content
 */
?>
    <article class="post-item post-<?php the_ID(); ?>" style="margin-bottom: 20px">
        <h2 class="light"><?php echo get_the_title() ?></h2>
        <p><?php echo get_the_excerpt() ?></p>
        <a class="button crimson arrow" href="./identity.html">
            Read More
            <div class="icon-wrapper">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/right-arrow.svg" alt="" />
            </div>
        </a>
    </article>