<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="200" <?php body_class(); ?>>

<?php do_action('wp_smascss_header', [ 'show_admin_controls' => true ]) ?>


