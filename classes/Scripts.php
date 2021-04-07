<?php
namespace classes;


class Scripts extends Theme
{

    public static $instance = null;

    public function __construct()
    {
        parent::__construct();
        add_action('wp_enqueue_scripts', array($this, 'enqueue_theme_scripts'));
    }

    public function enqueue_theme_scripts() {
//        wp_enqueue_style(WP_SMASCSS_TXT_DOMAIN . '-swiper');
        wp_enqueue_style(WP_SMASCSS_TXT_DOMAIN . '-main');
        wp_enqueue_style(WP_SMASCSS_TXT_DOMAIN . '-style');
        wp_enqueue_script(WP_SMASCSS_TXT_DOMAIN . '-bootstrap-bundle');
        wp_enqueue_script(WP_SMASCSS_TXT_DOMAIN . '-main');
    }

    public static function instance(): ?Scripts
    {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}