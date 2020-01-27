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

<header>
    <div class="row">
        <div class="twelve columns">
            <div class="logo">
                <a href="index.html"><img alt="" src="<?= get_template_directory_uri() ?>/assets/images/logo.png"></a>
            </div>

            <nav id="nav-wrap">
                <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
                <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>
                <ul id="nav" class="nav">
                    <li class="current"><a href="index.htm">Home</a></li>
                    <li><span><a href="blog.html">Blog</a></span>
                        <ul>
                            <li><a href="blog.html">Blog Index</a></li>
                            <li><a href="single.html">Post</a></li>
                        </ul>
                    </li>
                    <li><span><a href="portfolio-index.html">Portfolio</a></span>
                        <ul>
                            <li><a href="portfolio-index.html">Portfolio Index</a></li>
                            <li><a href="portfolio.html">Portfolio Entry</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="styles.html">Features</a></li>
                </ul> <!-- end #nav -->
            </nav> <!-- end #nav-wrap -->
        </div>
    </div>
</header> <!-- Header End -->