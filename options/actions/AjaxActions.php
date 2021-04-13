<?php


namespace admin\options\actions;


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

        $httpRef = $_SERVER['HTTP_REFERER'];

        if ( ! empty( $_POST['option'] ) && check_admin_referer( '_save_theme_options' ) ) {

            if ( isset( $_POST['option'] ) && $option = $_POST['option'] ) {
                foreach ( $option as $key => $value ){
                    if ( $key === 'fonts' || $key === 'advanced' )
                        continue;
                    $option[$key] = sanitize_text_field( $value );
                }
                $success = update_option('_theme_option', $option );
                if ( $success ) {
                    $httpRef = add_query_arg( 'success', true, $_SERVER['HTTP_REFERER'] );
                }else{
                    $httpRef = add_query_arg( 'success', false, $_SERVER['HTTP_REFERER'] );
                }
            }
        }
        wp_redirect( $httpRef );
        die(0);
    }

}