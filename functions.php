<?php
/**
 * tyreconnect functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage tyreconnect
 * @since 1.0.0
 */

/**
 * tyreconnect only works in WordPress 4.7 or later.
 */
error_reporting(E_ALL);
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}else{
    defined( 'TC_CORE_PATH' ) or define( 'TC_CORE_PATH', get_theme_file_path('/inc/') );
}
require_once TC_CORE_PATH . 'init.php';

function gavilan_blocks( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'tyreconnect-blocks',
                'title' => __( 'TyreConnect Blocks', 'tyreconnect' ),
            ),
        )
    );
}
add_filter( 'block_categories', 'gavilan_blocks', 10, 2);
function admin_enqueue_style( $hook ) { 
    wp_enqueue_style('bootstrap-4','https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
}
add_action( 'admin_enqueue_scripts'  , 'admin_enqueue_style' );

add_action( 'wp_enqueue_scripts', function(){
    wp_register_script( 'my_ajax_script', get_template_directory_uri() . '/js/ajax.js', array( 'jquery' ), '0.1.0' );
    wp_localize_script( 'my_ajax_script', 'my_ajax_url', ['admin_url' => admin_url( 'admin-ajax.php' )] );
    wp_enqueue_script('my_ajax_script');
} );


function tyreconnect_custom_mime_types( $mimes ) {

    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';

// Optional. Remove a mime type.
    unset( $mimes['exe'] );
    return $mimes;
}
add_filter( 'upload_mimes', 'tyreconnect_custom_mime_types' );

if ( ! function_exists( 'tyreconnect_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tyreconnect_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on tyreconnect, use a find and replace
		 * to change 'tyreconnect' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tyreconnect', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'tyreconnect' ),
				'right_menu-1' => __( 'RightPrimary', 'tyreconnect' ),
				'footer' => __( 'Footer Menu', 'tyreconnect' ),
				'social' => __( 'Social Links Menu', 'tyreconnect' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		//add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'tyreconnect' ),
					'shortName' => __( 'S', 'tyreconnect' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'tyreconnect' ),
					'shortName' => __( 'M', 'tyreconnect' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'tyreconnect' ),
					'shortName' => __( 'L', 'tyreconnect' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'tyreconnect' ),
					'shortName' => __( 'XL', 'tyreconnect' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => 'default' === get_theme_mod( 'primary_color' ) ? __( 'Blue', 'tyreconnect' ) : null,
					'slug'  => 'primary',
					'color' => tyreconnect_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 33 ),
				),
				array(
					'name'  => 'default' === get_theme_mod( 'primary_color' ) ? __( 'Dark Blue', 'tyreconnect' ) : null,
					'slug'  => 'secondary',
					'color' => tyreconnect_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 23 ),
				),
				array(
					'name'  => __( 'Dark Gray', 'tyreconnect' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'tyreconnect' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'tyreconnect' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'tyreconnect_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tyreconnect_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'tyreconnect' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'tyreconnect' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'tyreconnect_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function tyreconnect_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'tyreconnect_content_width', 640 );
}
add_action( 'after_setup_theme', 'tyreconnect_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function tyreconnect_scripts() {
	//wp_enqueue_style( 'tyreconnect-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'tyreconnect-style', get_template_directory_uri().'/css/main.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'editor-style', get_template_directory_uri().'/style.css', array(), wp_get_theme()->get( 'Version' ) );
    //wp_enqueue_style( 'tyreconnect-swiper-min', get_template_directory_uri().'/css/swiper.min.css', array('tyreconnect-style'), wp_get_theme()->get( 'Version' ) );
    //wp_enqueue_style( 'tyreconnect-ui-library', get_template_directory_uri().'/css/ui-library.css', array(), wp_get_theme()->get( 'Version' ) );

	wp_style_add_data( 'tyreconnect-style', 'rtl', 'replace' );

	if ( has_nav_menu( 'menu-1' ) ) {
		//wp_enqueue_script( 'tyreconnect-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '20181214', true );
		//wp_enqueue_script( 'tyreconnect-touch-navigation', get_theme_file_uri( '/js/touch-keyboard-navigation.js' ), array(), '20181231', true );
	}

    wp_enqueue_script( 'tyreconnect-main', get_template_directory_uri().'/js/main.js' , array(), '20181231', true );
    wp_enqueue_script( 'tyreconnect-swiper', get_template_directory_uri() . '/js/swiper.min.js' , array(), '20181231', true );
	wp_enqueue_style( 'tyreconnect-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', null, '3.4.1', false);
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-validate', 'https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js', array('jquery'), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_script('gtag', 'https://www.googletagmanager.com/gtag/js?id=UA-109029484-2', array(), wp_get_theme()->get( 'Version' ), true );
	
	$script = '
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag("js", new Date());
		gtag("config", "UA-109029484-2");
	';

	wp_add_inline_script( 'gtag', $script );
}
add_action( 'wp_enqueue_scripts', 'tyreconnect_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function tyreconnect_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'tyreconnect_skip_link_focus_fix' );

/**
 * Enqueue supplemental block editor styles.
 */
function tyreconnect_editor_customizer_styles() {

	wp_enqueue_style( 'tyreconnect-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.1', 'all' );

	if ( 'custom' === get_theme_mod( 'primary_color' ) ) {
		// Include color patterns.
		require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
		wp_add_inline_style( 'tyreconnect-editor-customizer-styles', tyreconnect_custom_colors_css() );
	}
}
add_action( 'enqueue_block_editor_assets', 'tyreconnect_editor_customizer_styles' );

/**
 * Display custom color CSS in customizer and on frontend.
 */
function tyreconnect_colors_css_wrap() {

	// Only include custom colors in customizer or frontend.
	if ( ( ! is_customize_preview() && 'default' === get_theme_mod( 'primary_color', 'default' ) ) || is_admin() ) {
		return;
	}

	require_once get_parent_theme_file_path( '/inc/color-patterns.php' );

	$primary_color = 199;
	if ( 'default' !== get_theme_mod( 'primary_color', 'default' ) ) {
		$primary_color = get_theme_mod( 'primary_color_hue', 199 );
	}
	?>

	<style type="text/css" id="custom-theme-colors" <?php echo is_customize_preview() ? 'data-hue="' . absint( $primary_color ) . '"' : ''; ?>>
		<?php echo tyreconnect_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'tyreconnect_colors_css_wrap' );

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-tyreconnect-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-tyreconnect-walker-comment.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';
