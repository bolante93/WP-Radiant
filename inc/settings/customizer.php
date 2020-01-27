<?php
	add_action( 'customize_register', 'theme_customize_register' );
    /**
     * @param $wp_customize WP_Customize_Manager
     */
	function theme_customize_register( $wp_customize ) {

//		$wp_customize->add_setting( 'accent_color', array(
//			'default'   => '',
//			'transport' => 'refresh',
//		) );
//		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array(
//			'section' => 'colors',
//			'label'   => esc_html__( 'Accent Color', 'primera-dm' ),
//		) ) );





        /**
         * Customizer section for site CONTACT DETAILS
         */
        $wp_customize->add_section('contact_details', array(
            'title' => esc_html__('Contact Details'),
            'priority' => 20
        ) );
        $wp_customize->add_setting( 'site_email', array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'site_email_control', array(
            'section' => 'contact_details',
            'settings' => 'site_email',
            'label'   => esc_html__( 'Site Email', 'primera-dm' ),
        ) ) );

        $wp_customize->add_setting( 'site_number', array(
            'default'   => '+ 1235 2355 985',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'site_number_control', array(
            'section' => 'contact_details',
            'settings' => 'site_number',
            'label'   => esc_html__( 'Site Contact Number', 'primera-dm' ),
        ) ) );

        $wp_customize->add_setting( 'site_highlight', array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'site_highlight', array(
            'section' => 'contact_details',
            'label'   => esc_html__( 'Site Highlight', 'primera-dm' ),
            'type'    => 'textarea'
        ) ) );

        /**
         * Footer Details
         */
        $wp_customize->add_section('footer_section', array(
            'title' => esc_html__('Footer Details'),
            'priority' => 20
        ) );

            $wp_customize->add_setting( 'footer_copyright', array(
                'default'   => '',
                'transport' => 'refresh',
            ) );
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_copyright_text', array(
                'section' => 'footer_section',
                'settings' => 'footer_copyright',
                'label'   => esc_html__( 'Footer Copyright Text', 'tyreconnect' ),
            ) ) );

            $wp_customize->add_setting( 'footer_abn', array(
                'default'   => '',
                'transport' => 'refresh',
            ) );
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_abn_text', array(
                'section' => 'footer_section',
                'settings' => 'footer_abn',
                'label'   => esc_html__( 'Footer ABN Text', 'tyreconnect' ),
            ) ) );

            $wp_customize->add_setting( 'footer_contact', array(
                'default'   => '',
                'transport' => 'refresh',
            ) );
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_contact_text', array(
                'section' => 'footer_section',
                'settings' => 'footer_contact',
                'label'   => esc_html__( 'Contact Phone Text', 'tyreconnect' ),
            ) ) );

            $wp_customize->add_setting( 'footer_privacy', array(
                'default'   => '',
                'transport' => 'refresh',
            ) );
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_privacy_link', array(
                'section' => 'footer_section',
                'settings' => 'footer_privacy',
                'label'   => esc_html__( 'Privacy Policy Link', 'tyreconnect' ),
            ) ) );

            $wp_customize->add_setting( 'footer_terms', array(
                'default'   => null,
                'transport' => 'refresh',
            ) );
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_terms_text', array(
                'section' => 'footer_section',
                'settings' => 'footer_terms',
                'label'   => esc_html__( 'Terms and Condition', 'tyreconnect' ),
            ) ) );


        /**
         * Footer Details
         */
        $wp_customize->add_section('get_started_modal', array(
            'title' => esc_html__('Modal Options'),
            'priority' => 20
        ) );

            $wp_customize->add_setting( 'modal_title', array(
                'default'   => null,
                'transport' => 'refresh',
            ) );
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'modal_title', array(
                'section' => 'get_started_modal',
                'settings' => 'modal_title',
                'label'   => esc_html__( 'Modal Title', 'tyreconnect' ),
            ) ) );

            $wp_customize->add_setting( 'modal_description', array(
                'default'   => null,
                'transport' => 'refresh',
            ) );
            $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'modal_description', array(
                'type' => 'textarea',
                'section' => 'get_started_modal',
                'settings' => 'modal_description',
                'label'   => esc_html__( 'Modal Description', 'tyreconnect' ),
            ) ) );


            $wp_customize->add_setting( 'modal_thumb', array(
                'default'   => '',
                'transport' => 'refresh',
            ) );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'modal_image_thumb', array(
                'label'             => __('Modal Image', 'tyreconnect'),
                'section'           => 'get_started_modal',
                'settings'          => 'modal_thumb',
            )));


        $wp_customize->add_setting( 'email_notification_to', array(
            'default'   => '',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'marketing_email', array(
            'label'             => __('Marketing Email', 'tyreconnect'),
            'section'           => 'title_tagline',
            'settings'          => 'email_notification_to',
        )));



        /**
         * Selective refresh for custom theme option fields
         */
        $wp_customize->get_setting( 'footer_copyright' )->transport        = 'postMessage';
        $wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
            'selector' => '.copyright-text',
        ) );

        $wp_customize->get_setting( 'footer_abn' )->transport        = 'postMessage';
        $wp_customize->selective_refresh->add_partial( 'footer_abn', array(
            'selector' => '.copyright-abn',
        ) );

        $wp_customize->get_setting( 'footer_contact' )->transport        = 'postMessage';
        $wp_customize->selective_refresh->add_partial( 'footer_contact', array(
            'selector' => '.copyright-contact',
        ) );

        $wp_customize->get_setting( 'footer_terms' )->transport        = 'postMessage';
        $wp_customize->selective_refresh->add_partial( 'footer_terms', array(
            'selector' => '.terms-and-conditions',
        ) );

        $wp_customize->get_setting( 'footer_privacy' )->transport        = 'postMessage';
        $wp_customize->selective_refresh->add_partial( 'footer_privacy', array(
            'selector' => '.privacy-policy',
        ) );

        $wp_customize->get_setting( 'modal_title' )->transport        = 'postMessage';
        $wp_customize->selective_refresh->add_partial( 'modal_title', array(
            'selector' => '.modal-title-1',
        ) );

        $wp_customize->get_setting( 'modal_description' )->transport        = 'postMessage';
        $wp_customize->selective_refresh->add_partial( 'modal_description', array(
            'selector' => '.modal-description-1',
        ) );

        $wp_customize->get_setting( 'modal_thumb' )->transport        = 'postMessage';
        $wp_customize->selective_refresh->add_partial( 'modal_thumb', array(
            'selector' => '.modal-thumb-1',
        ) );
	}



