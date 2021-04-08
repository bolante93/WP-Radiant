<?php
/**
 * Partial template for displaying content a content
 */
?>
<article class="post-item post-<?php echo get_the_ID(); ?>" >
    <h2 class="light"><?php echo get_the_title() ?></h2>
    <p><?php echo get_the_excerpt() ?></p>
    <p><strong> Posted on: </strong><?php echo get_the_date() ?></p>
    <p><strong> by: </strong><?php echo get_the_author() ?></p>
    <a class="button outline gray" href="<?php echo get_the_permalink() ?>">
        Read More
    </a>
</article>