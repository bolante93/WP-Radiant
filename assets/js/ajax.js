$(document).ready( function($){
    const admin = my_ajax_url.admin_url;
    $('body').on('submit','#sign_up_user', function (e) {
        e.preventDefault();
            const name = $('#request-name').val();
            const buss_name = $('#request-business-name').val();
            const phone = $('#request-phone').val();
            const email = $('#request-email').val();
            const formdata = { action : 'send_request', name:name, buss_name:buss_name, phone:phone, email:email}
        $.ajax({
            method : 'POST',
            url    : admin,
            data   : formdata
        })
        .done( function( response ) {
            if( response ){
                $('.get-started-modal').fadeOut('fast');
                $('.login-modal').fadeOut('fast');
                $('#sent').fadeIn('fast');
            }
        })
        .fail( function() {
            alert( 'Request not sent' );
        })
    });
    $('body').on('submit','#contact_us', function (e) {
        e.preventDefault();
        const name = $('input[name ="name"]').val();
        const buss_name = $('input[name ="buss_name"]').val();
        const phone = $('input[name ="phone"]').val();
        const email = $('input[name ="email"]').val();
        const message = $('textarea[name ="message"]').val();
        const formdata = { action : 'send_contact', name:name, buss_name:buss_name, phone:phone, email:email, message:message}
        $.ajax({
            method : 'POST',
            url    : admin,
            data   : formdata
        })
            .done( function( response ) {
                if( response ){
                    $('.get-started-modal').fadeOut('fast');
                    $('.login-modal').fadeOut('fast');
                    $('#sent').fadeIn('fast');
                }
            })
            .fail( function() {
                alert( 'Request not sent' );
            })
    })
});