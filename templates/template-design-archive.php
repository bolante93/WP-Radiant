<?php
/**
 * Template Name: Design Identity
 * Template Post Type: design-archive
 */

get_header();
$wp_categories = get_categories(['order'=> 'asc',  'parent'  => 0]);
?>


<section id="identity">
    <div class="global-wrapper section-padding">
        <div class="side-nav">
            <nav class="navbar">
                <?php foreach ( $wp_categories as $wp_category ):  ?>
                    <div class="nav-section">
                        <a href="#<?php echo $wp_category->slug ?>" class="nav-link"><?php echo $wp_category->name ?></a>
                        <nav class="nav sub-links">
                            <?php
                                $args = ['cat' => [$wp_category->term_id], 'order'=>'asc'];
                                $posts = get_posts( $args );
                                foreach ( $posts as $post ):
                            ?>
                                <a href="#<?php echo classes\Helper::generate_dom_target_id( $post ) ?>" class="nav-link"><?php echo $post->post_title ?></a>
                            <?php endforeach; ?>
                        </nav>
                    </div>
                <?php endforeach; ?>

            </nav>
        </div>

        <div class="side-nav-content">
            <?php foreach ( $wp_categories as $wp_category ):  ?>
                <div id="<?php echo $wp_category->slug ?>" class="content-section">
                    <div class="content-heading">
                        <h1>
                            <?php echo $wp_category->name ?>
                            <?php if (is_user_logged_in() && current_user_can('edit_post', $wp_category->ID)): ?>
                                <a href="<?php echo admin_url('term.php?taxonomy=category&tag_ID='.$wp_category->term_id.'&post_type=post&wp_http_referer='.esc_attr( wp_unslash( $_SERVER['REQUEST_URI'] ) )); ?>"><span class="dashicons dashicons-edit-large"></span> </a>
                            <?php endif; ?>
                        </h1>
                        <?php echo classes\Helper::get_category_description_meta($wp_category->term_id) ?>
                    </div>
                    <?php
                        $args = ['cat' => [$wp_category->term_id], 'order'=>'asc'];
                        $posts = get_posts( $args );
                        foreach ( $posts as $post ):
                    ?>
                        <div id="<?php echo classes\Helper::generate_dom_target_id( $post ) ?>" class="sub-content-wrapper">
                        <div class="sub-content">
                            <?php echo apply_filters('the_content', $post->post_content ); ?>
                        </div>
                        <div class="sub-details">
                            <span class="content-group"><?php echo $wp_category->name ?></span>
                            <h4 class="content-title"><?php \classes\Helper::admin_controls($post) ?> <?php echo apply_filters('design_library_post_title', $post->post_title) ?></h4>
                            <?php echo classes\Helper::get_content_details( $post->ID ) ?>
                            <?php
                                $css = rwmb_meta( 'custom_css', $post->ID );
                                if ( $css ) {
                                    echo '<style>' . $css . '</style>';
                                }
                            ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<?php
get_footer()
?>