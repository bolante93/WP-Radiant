<?php


namespace classes;


class AjaxActions
{
    public function __construct()
    {
        add_action( 'admin_action_save_theme_options', array( $this, 'save_theme_options' ) );
    }

    /**
     * Ajax action to handle theme options
     * form submission
     */
    public function save_theme_options () {
        if ( ! empty( $_POST['option'] ) && check_admin_referer( '_save_theme_options' ) ) {

            if ( isset( $_POST['option'] ) && $option = $_POST['option'] ) {
                foreach ( $option as $key => $value ){
                    if ( $key === 'fonts' || $key === 'advanced' )
                        continue;
                    $option[$key] = sanitize_text_field( $value );
                }
//            $sanitized_option = serialize( $option );
//            wp_die( var_dump($option) );
                update_option('_theme_option', $option );
            }
            wp_redirect( $_SERVER['HTTP_REFERER'] );
            die(0);
        }
    }

}