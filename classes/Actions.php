<?php


namespace classes;


class Actions
{
    public function __construct()
    {
        add_action('wp_smascss_header', array($this, 'wp_smascss_header'), 10, 1 );
        add_action('wp_smascss_footer', array($this, 'wp_smascss_footer') );
        add_action('wp_smascss_post_thumbnail', array($this, 'wp_smascss_post_thumbnail') );
        add_action('wp_smascss_after_post_content', array($this, 'wp_smascss_after_post_content') );
    }

    /**
     * WP_SMASCSS Theme Header
     * @param $args
     */
    public function wp_smascss_header( $args ) {
        $defaults = array (
            'show_admin_controls' => true,
            'header_text' => 'Latest Posts',
        );
        $args = wp_parse_args( $args, $defaults );
        $locations = get_nav_menu_locations();
        $menu_id = $locations['navigation_menu'];
        $menu_items = wp_get_nav_menu_items( $menu_id );
        ?>
        <nav>
            <div class="global-wrapper section-padding">
                <div class="menu-wrapper">
                    <div class="brand">
                        <a href="<?php echo get_home_url() ?>">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.svg">
                        </a>
                    </div>
                    <?php generate_menu($menu_items); ?>
                </div>
            </div>
        </nav>
        <header class="hero mini gradient-hero">
            <div class="global-wrapper section-padding">
                <div class="heading">
                    <?php if ( is_home() ): ?>
                        <h1 class="light"><?php echo get_bloginfo('name') ?></h1>
                        <p class="lead"><?php echo get_bloginfo('description') ?></p>
                    <?php else: ?>
                        <h1 class="light"><?php echo get_the_title() ?></h1>
                    <?php endif; ?>
                </div>
                <?php Components::admin_controls(); ?>
            </div>
        </header>
        <?php
    }

    /**
     * WP_SMASCSS Theme Footer
     */
    public function wp_smascss_footer() {
        ?>
            <footer class="bg-light">
                <div class="global-wrapper">
                    <p>
                        Copyright &copy; 2021 Cloud Radius. All Rights Reserved.
                    </p>
                </div>
            </footer>
        <?php
    }

    /**
     * Properly size images with proper width and height
     * @see https://web.dev/uses-responsive-images/#wordpress
     * @param string $size
     */
    public function wp_smascss_post_thumbnail( $size = 'full' ) {
        $featured_image     = wp_get_attachment_image_src( get_post_thumbnail_id(), $size );
        if ( $featured_image ) {
            $featured_image_url = $featured_image[0];
            $width = $featured_image[1];
            $height = $featured_image[2];
        }
        ?>
            <?php if( has_post_thumbnail() ): ?>
                <img width="<?php esc_attr($width); ?>" height="<?php esc_attr($height); ?>" src="<?php echo esc_url($featured_image_url) ?>">
            <?php else:  ?>
                <img src="<?php echo get_template_directory_uri() . '/assets/images/glenn-carstens-peters-npxXWgQ33ZQ-unsplash.jpg' ?>">
            <?php endif ?>
        <?php
    }

    /**
     * Display content after post content.
     */
    public function wp_smascss_after_post_content() {
        $tags = get_the_tags();
        ?>
           <?php if ($tags): ?>
            <ul class="tags">
                <?php foreach ( $tags as $tag ): ?>
                    <li><a href="<?php echo esc_url(get_tag_link($tag->term_id) ) ?>"><?php echo $tag->name ?> </a></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        <?php
    }
}