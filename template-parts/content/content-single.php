<div class="single post">
    <div class="content-wrapper">
        <div class="article">
            <div class="featured-thumbnail">
                <?php do_action('wp_smascss_post_thumbnail'); ?>
            </div>
            <div class="post-date">
                Posted: <strong><?php echo get_the_date() ?></strong>
            </div>
            <div class="post-author">
                by: <strong><?php echo get_the_author() ?></strong>
            </div>
            <?php the_content(); ?>
            <?php do_action('wp_smascss_after_post_content'); ?>
        </div>
        <div class="sidebar">
            <?php if ( is_active_sidebar('blog-sidebar') ) : ?>
                <?php dynamic_sidebar('blog-sidebar') ?>
            <?php endif; ?>
        </div>
    </div>
</div>


