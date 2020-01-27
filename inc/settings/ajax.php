<?php

function wp_sender_email( $original_email_address ) {
    return 'info@tyreconnec.com';
}

function wp_sender_name( $original_email_from ) {
    return 'TyreConnect';
}

add_filter( 'wp_mail_from', 'wp_sender_email' );
add_filter( 'wp_mail_from_name', 'wp_sender_name' );

add_action( 'wp_ajax_send_request', 'wpse_sendmail' );
add_action( 'wp_ajax_nopriv_send_request', 'wpse_sendmail' );

add_action( 'wp_ajax_send_contact', 'wpse_contact_email' );
add_action( 'wp_ajax_nopriv_send_contact', 'wpse_contact_email' );

function wpse_sendmail()
{
    $to = 'marketing@tyreconnect.com.au';
    $name = esc_html__( $_POST['name'] );
    $buss_name = esc_html__( $_POST['buss_name'] );
    $phone = esc_html__( $_POST['phone'] );
    $email = esc_html__( $_POST['email'] );
    $message = 'Email: '. $email . "\r\n" . 'Phone: '. $phone . "\r\n" . 'Business Name: '. $buss_name . "\r\n". 'Name: '. $name . "\r\n" ;
    $status = wp_mail( 'gavilan.arts@gmail.com', 'Account enquiry ', $message );
    if( $status ){
        echo 'Email sent';
    }else{
        var_dump($status);
    }
    die();
}


function wpse_contact_email()
{
    $to = 'marketing@tyreconnect.com.au';
    $name = esc_html__( $_POST['name'] );
    $buss_name = esc_html__( $_POST['buss_name'] );
    $phone = esc_html__( $_POST['phone'] );
    $email = esc_html__( $_POST['email'] );
    $content = esc_html__( $_POST['message'] );
    $message = 'Email: '. $email . "\r\n" . 'Phone: '. $phone . "\r\n" . 'Business Name: '. $buss_name . "\r\n". 'Name: '. $name . "\r\n" . 'Message: '.$content;
    $status = wp_mail( 'gavilan.arts@gmail.com', 'General contact ', $message );
    if( $status ){
        echo 'Email sent';
    }else{
        var_dump($status);
    }
    die();
}