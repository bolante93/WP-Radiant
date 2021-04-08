<?php
/**
 *  The default home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */
get_header();
global $wp_query;
?>
    <div style="padding-top: 100px">
        <div class="global-wrapper section-padding">
            <div class="posts active-sidebar">
                <div class="post-wrapper">
                    <?php while( have_posts() ): the_post(); ?>
                        <?php get_template_part('template-parts/content/content', 'home') ?>
                    <?php endwhile; ?>
                </div>
                <div class="sidebar">
                    <?php get_sidebar() ?>
                </div>
            </div>
        </div>
        <?php classes\Components::pagination(); ?>
    </div>
<?php
get_footer();
