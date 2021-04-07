<?php


namespace classes;


use admin\options\Options;

class Theme
{

    /**
     * @var int|string
     */
    public $version = '';

    /**
     * @var int|string
     */
    protected $asset_directory = '';

    /**
     * @var boolean
     */
    public $debug = false;

    /**
     * Theme constructor.
     * Enable debug to dynamically change scripts query strings
     * @param false $debug
     */
    public function __construct( $debug = false )
    {
        $this->debug = Options::get('debug');

        if ( !is_null($this->debug) ) {
            $this->version = time();
        }

        $this->asset_directory = get_template_directory_uri(). '/assets';
        $this->theme_supports();

        add_action('widgets_init', array( $this, 'sidebar') );
        add_action('wp_enqueue_scripts', array( $this, 'register_theme_scripts' ));
        add_action('wp_head', array( $this, 'preload_scripts'), 5 );
        add_filter( 'rwmb_meta_boxes', array( $this, 'theme_register_taxonomy_meta_boxes' ) );
        add_action('admin_init', array( $this, 'load_common_theme_option' ));
    }


    /**
     * Preload theme scripts
     */
    public function preload_scripts() {
        $defaults = ['url'=> '', 'media' => 'all'];
        ?>
            <?php
                $fonts = apply_filters('google_font_url', null);
                if ( $fonts ) :
                ?>
                    <link rel="preconnect" href="https://fonts.gstatic.com" />
                <?php
                    foreach ( $fonts as $font_key => $font ):
                        $font = wp_parse_args( $font, $defaults );
                ?>
                    <link rel="stylesheet" media="<?php echo $font['media'] ?>" href="<?php echo esc_url($font['url']) ?>">
                <?php endforeach; ?>
            <?php
                endif;
    }

    /**
     * Preregister theme scripts
     */
    public function register_theme_scripts() {
        wp_register_style(WP_SMASCSS_TXT_DOMAIN . '-swiper', $this->asset_directory . '/css/swiper-bundle.css', array(), $this->version);
        wp_register_style(WP_SMASCSS_TXT_DOMAIN . '-main', $this->asset_directory . '/css/main.css', array(), $this->version);
        wp_register_style(WP_SMASCSS_TXT_DOMAIN . '-style', get_stylesheet_uri(), array(), $this->version);
        wp_register_script(WP_SMASCSS_TXT_DOMAIN . '-swiper', $this->asset_directory . '/js/swiper.min.js', array(), $this->version, true);
        wp_register_script(WP_SMASCSS_TXT_DOMAIN . '-bootstrap-bundle', $this->asset_directory . '/js/bootstrap.bundle.min.js', array(), $this->version, true);
        wp_register_script(WP_SMASCSS_TXT_DOMAIN . '-main', $this->asset_directory . '/js/main.js', array('jquery'), $this->version, true);
    }

    /**
     * Theme sidebar
     * @see https://developer.wordpress.org/reference/functions/register_sidebar/
     */
    public function sidebar() {
        $blog_sidebar = [
            'name'          => __( 'Blog Sidebar' ),
            'id'            => 'blog-sidebar',
            'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        ];
        register_sidebar($blog_sidebar);
    }

    /**
     * Theme supports
     * @see https://developer.wordpress.org/reference/functions/add_theme_support/
     */
    private function theme_supports() {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails', ['post']);
        register_post_type('design-archive',
            [
                'public'     => true,
                'label'      => 'Design Archives',
                'menu_icon'  => 'dashicons-editor-table',
                'supports'   => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'author'),
            ]
        );
    }

    /**
     * Register additional metaboxes for post
     * and custom post types
     * @see https://docs.metabox.io/
     * @param $meta_boxes
     * @return mixed
     */
    public function theme_register_taxonomy_meta_boxes( $meta_boxes ){
        // category metaboxes
        $meta_boxes[] = array(
            'title'      => 'Category Content',
            'taxonomies' => 'category', // List of taxonomies. Array or string

            'fields' => array(
                array(
                    'id'   => 'cat_featured_content',
                    'type' => 'wysiwyg',
                ),
            ),
        );
        // post metaboxes
        $meta_boxes[] = array(
            'title'      => 'Content Details',
            'post_types' => 'post',
            'fields' => array(
                array(
                    'name' => 'HTML Content Details',
                    'id'   => 'featured_content',
                    'type' => 'wysiwyg',
                ),
                array(
                    'name' => 'Custom CSS',
                    'id'   => 'custom_css',
                    'type' => 'textarea',
                ),
            ),
        );
        // design-archives metaboxes
        $meta_boxes[] = array(
            'title'      => 'Button',
            'post_types' => 'design-archive',
            'context'    => 'side',
            'fields' => array(
                array(
                    'name' => 'Text',
                    'id'   => 'design_archive_button_text',
                    'type' => 'input',
                ),
            ),
        );
        return $meta_boxes;
    }

    /**
     * Load theme options
     * and apply settings
     */
    public function load_common_theme_option() {
        $advanced_options = Options::get('advanced');
        if ( !is_null( $advanced_options['disable_gb_editor'] ) ) {
            add_filter('use_block_editor_for_post', '__return_false', 10);
        }
        if ( !is_null( $advanced_options['allow_svg_upload'] ) ) {
            add_filter('upload_mimes', array( $this, 'enable_svg_upload' ) );
        }

    }

    /**
     * Enable or disable svg uploads
     * @param $mimes
     * @return mixed
     */
    public function enable_svg_upload( $mimes ) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

    /**
     * @return int|string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param int|string $version
     */
    public function setVersion($version = ''): void
    {
        if( is_null($this->debug) )
            $this->version = $version;
    }

    /**
     * @return bool
     */
    public function isDebug(): bool
    {
        return $this->debug;
    }

    /**
     * @param bool $debug
     */
    public function setDebug(bool $debug): void
    {
        $this->debug = $debug;
    }


}