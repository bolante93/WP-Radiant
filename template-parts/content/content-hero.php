<?php
/**
 * Template part for displaying hero section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage tyreconnect
 * @since 1.0.0
 */

$args = [
    'post_type' => 'hero',
    'showposts' => 10,
    'order' => 'ASC'
];
$query = new WP_Query($args);
$posts_count = $query->post_count;
$index = 0;
?>

<?php if( $query->have_posts() ):  ?>

  <!--Hero Section-->
  <div class="hero-section">
        <div class="slider-wrapper">
            <?php while ( $query->have_posts() ): $query->the_post(); ?>
            <div class="slides <?= ( $index === 0 ) ? 'active':'' ?> ">
                <img src="<?= get_field('hero_image') ?>">
                <div class="hero-card">
                    <h1><?=  the_title() ?></h1>
                    <p>
                        <?= get_field('hero-description') ?>
                    </p>
                    <div class="cta">
                        <button class="get-started"> <?= get_field('cta-text') ?> </button>
                        <div class="controls">
                            <button class="arrow prev" <?= ( $index === 0 ) ? 'disabled':'' ?>>
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="20" viewBox="0 0 11 20">
                                    <path fill-rule="evenodd"
                                        d="M9.293.293a1 1 0 0 1 1.497 1.32l-.083.094L2.415 10l8.292 8.293a1 1 0 0 1 .083 1.32l-.083.094a1 1 0 0 1-1.32.083l-.094-.083-9-9a1 1 0 0 1-.083-1.32l.083-.094 9-9z" />
                                </svg>
                            </button>
                            <button class="arrow next" <?= ( $index === 2 ) ? 'disabled':'' ?>>
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="20" viewBox="0 0 11 20">
                                    <path fill-rule="evenodd"
                                        d="M.293.293A1 1 0 0 1 1.613.21l.094.083 9 9a1 1 0 0 1 .083 1.32l-.083.094-9 9a1 1 0 0 1-1.497-1.32l.083-.094L8.585 10 .293 1.707A1 1 0 0 1 .21.387L.293.293z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php $index++; endwhile; ?>
        </div>
    </div>
<?php endif;
