<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
<div class="global-wrapper --section-padding">
	<?php
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content/content', 'single' );
        endwhile; // End of the loop.
	?>
</div>
<?php
get_footer();
