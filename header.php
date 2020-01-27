<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage tyreconnect
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a id="top" href=""></a>


<div class="navigation">
	<div class="branding">
		<a href="#top"><img src="<?= get_template_directory_uri(); ?>/assets/logo.svg" alt=""></a>
	</div>

		<?php if ( has_nav_menu( 'menu-1' ) ) : ?>
		<div class="main-nav">
		<div class="nav-list">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_class'     => 'nav-items',
					'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
				)
			);
			?>
		</div>
	<?php endif; ?>


        <div class="nav-cta">
            <a class="login" href="javascript:">Log in</a>
            <a class="get-started button" href="javascript:">Get started</a>
        </div>
	</div>
</div>