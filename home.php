<?php
/**
 *  The default home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */
get_header();
global $wp_query;
$page_args = [
    'post_type' => 'design-archive',
    'post_status' => ['publish','draft'],
    'order' => 'asc'
];
$pages = get_posts( $page_args );
?>
    <section style="min-height: calc(100vh - 545px);">
        <div class="global-wrapper section-padding">
            <div class="card-list x3">
                <?php foreach ( $pages as $page ): ?>
                    <div class="card">
                        <h2 class="light"><?php echo get_the_title($page->ID) ?></h2>
                        <p><?php echo get_the_excerpt($page->ID) ?></p>
                        <a class="button crimson arrow" <?php classes\Helper::page_links_attribute($page) ?>>
                            <?php echo rwmb_meta( 'design_archive_button_text', null, $page->ID ); ?>
                            <div class="icon-wrapper">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/icon/right-arrow.svg" alt="" />
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    </div>
<?php
get_footer();
