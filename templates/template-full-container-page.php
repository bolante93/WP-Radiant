<?php
/**
 * Template Name: Full-Container Page Template
 */
get_header();
?>

    <?php while ( have_posts() ): the_post();  ?>
        <div class="global-wrapper section-padding">
            <?php the_content(); ?>
        </div>
    <?php endwhile; ?>
<?php
get_footer();
