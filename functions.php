<?php
/**
 * Theme functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 */

$locations = get_nav_menu_locations();
$menu_id = $locations['navigation_menu'];
$menu_items = wp_get_nav_menu_items( $menu_id );

function generate_menu( $menu_items, int $parent = 0, $depth = 0 ){
    ?>
    <ul class="menu">
        <?php
            foreach ( $menu_items as $key => $item ): ?>
            <?php if ( (int)$item->menu_item_parent === $parent ) : ?>
                <li class="depth-<?php echo $depth?> <?php echo ( has_sub_menu($menu_items,$item->ID) )? 'has-sub': '' ?>" >
                    <a href="javascript:"><?php echo $item->title ?></a>
                    <?php
                        if ( has_sub_menu( $menu_items, $item->ID ) ) :
                            generate_menu( $menu_items, $item->ID, $depth+1 );
                        endif;
                    ?>
                </li>
            <?php endif; ?>
        <?php
            endforeach;
        ?>
    </ul>
<?php
}

function has_sub_menu( array $menu_items, int $id ){
    foreach ( $menu_items as $menu_item ){
        if ( (int)$menu_item->menu_item_parent === $id ) {
            return true;
        }
    }
    return false;
}

require_once 'includes/constants.php';
require_once 'vendor/autoload.php';
require_once 'plugins/meta-box/meta-box.php';
require_once 'options/options.php';


add_action('after_setup_theme', function () {
    remove_filter( 'the_content', 'wpautop' );
    remove_filter( 'the_excerpt', 'wpautop' );
    new classes\Actions();
    new classes\Filters();
    new admin\options\Options();
    new classes\Scripts();
    new admin\options\actions\AjaxActions();
});


add_shortcode( 'asset-icon', 'asset_icon' );
function asset_icon( $atts ) {
    $atts = shortcode_atts( array(
        'image_file' => 'copy-icon.svg',
    ), $atts, 'asset-icon' );

//    wp_die( var_dump($atts) );
    $theme_uri = get_template_directory_uri() . '/assets/images/icon';
    $file = $atts['image_file'];

    return '<img src="'. $theme_uri . '/' . $file .'" alt="imco-icon">';
}




