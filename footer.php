<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage tyreconnect
 * @since 1.0.0
 */

?>

    <footer class="bg-darker">
        <div id="footer" class="global-wrapper">
            <div class="copyright">
                <p class="copyright-text"> <?= get_theme_mod('footer_copyright') ?> </p>
                <p class="copyright-abn"><?= get_theme_mod('footer_abn') ?></p>
                <p class="copyright-contact"><?=  get_theme_mod('footer_contact') ?></p>
            </div>
            <div class="terms">
                <a href="<?= get_theme_mod('footer_terms', '#') ?>"><span class="terms-and-conditions"></span> Terms and Conditions</a>
                <a href="<?= get_theme_mod('footer_privacy', '#') ?>"><span class="privacy-policy"></span>Privacy Policy</a>
            </div>
        </div>
    </footer>

<!--Modal section-->
<div class="bg-modal get-started-modal">
    <div class="modal-content">
        <svg class="close" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
            <path class="close" fill-rule="evenodd"
                  d="M5.686 4.686c6.249-6.248 16.38-6.248 22.628 0 6.248 6.249 6.248 16.38 0 22.628-6.249 6.248-16.38 6.248-22.628 0-6.248-6.249-6.248-16.38 0-22.628zM26.9 6.101C21.432.633 12.568.633 7.101 6.1c-5.468 5.467-5.468 14.331 0 19.798 5.467 5.468 14.331 5.468 19.798 0 5.468-5.467 5.468-14.331 0-19.798zm-15.63 4.168a1 1 0 0 1 1.414 0L17 14.586l4.317-4.317a1 1 0 0 1 1.32-.083l.094.083a1 1 0 0 1 0 1.414L18.414 16l4.317 4.317a1 1 0 0 1 .083 1.32l-.083.094a1 1 0 0 1-1.414 0L17 17.414l-4.317 4.317a1 1 0 0 1-1.32.083l-.094-.083a1 1 0 0 1 0-1.414L15.586 16l-4.317-4.317a1 1 0 0 1-.083-1.32z" />
        </svg>
        <div class="left">
            <h3>Request an account</h3>
            <form id="sign_up_user" data-empty="" action="#" method="post" >
                <div class="form-group">
                    <small>Your name</small>
                    <input id="sign-up-name" class="input-field" type="text" placeholder="e.g. John Smith" required>
                </div>
                <div class="form-group">
                    <small>Business name</small>
                    <input id="sign-up-business" class="input-field" type="text" placeholder="e.g. TyreConnect" required>
                </div>
                <div class="form-group">
                    <small>Phone</small>
                    <input id="sign-up-phone" class="input-field" type="number" placeholder="e.g. 0456 123 456" required>
                </div>
                <div class="form-group">
                    <small>Email</small>
                    <input id="sign-up-email"  class="input-field" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="e.g. John@tyreconnect.com.au" required>
                </div>
                <button type="submit" class="button sent submit"> Submit request </button>
            </form>
            <div class="bottom-text">
                <p>Already have a TyreConnect account?</p>
                <a class="login" href="javascript:">Login</a>
            </div>
        </div>
        <div class="right">
            <span class="modal-thumb-1"></span>
            <img src="<?= get_theme_mod('modal_thumb', get_template_directory_uri() .'/assets/Van.png' ) ?>"  alt="">
            <div class="info">
                    <span class="title-1 modal-title-1">
                        <?= get_theme_mod('modal_title') ?>
                    </span>
                <p class="modal-description-1"> <?= get_theme_mod('modal_description') ?> </p>
            </div>
        </div>
    </div>
</div>

<div class="bg-modal login-modal ">
    <div class="modal-content">
        <svg class="close" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
            <path fill-rule="evenodd"
                  d="M4.686 4.686c6.249-6.248 16.38-6.248 22.628 0 6.248 6.249 6.248 16.38 0 22.628-6.249 6.248-16.38 6.248-22.628 0-6.248-6.249-6.248-16.38 0-22.628zM25.9 6.101C20.432.633 11.568.633 6.101 6.1.633 11.568.633 20.432 6.1 25.899c5.467 5.468 14.331 5.468 19.798 0 5.468-5.467 5.468-14.331 0-19.798zm-15.63 4.168a1 1 0 0 1 1.414 0L16 14.586l4.317-4.317a1 1 0 0 1 1.32-.083l.094.083a1 1 0 0 1 0 1.414L17.414 16l4.317 4.317a1 1 0 0 1 .083 1.32l-.083.094a1 1 0 0 1-1.414 0L16 17.414l-4.317 4.317a1 1 0 0 1-1.32.083l-.094-.083a1 1 0 0 1 0-1.414L14.586 16l-4.317-4.317a1 1 0 0 1-.083-1.32z" />
        </svg>
        <div class="left">
            <h3>Log in to your account</h3>
            <form id="log_in" data-empty="" action="#" method="post">
                <div class="form-group">
                    <small>Username</small>
                    <input id="login-username" class="input-field" type="text" placeholder="Your Username" required>
                </div>
                <div class="form-group">
                    <small>Password</small>
                    <input id="login-password" class="input-field" type="password" placeholder="Your Password" required>
                </div>
                <button type="submit" class="button submit"> Log in </button>
            </form>
            <p class="details phone-text">
                Forgot your login details? Give us a call on 1300 244 170 or email us at info@tyreconnect.com.au
            </p>
            <span class="title-1">Don’t have an account?</span>
            <div class="bottom-text">
                <p>Getting started with us is easy.</p>
                <a class="get-started" href="javascript:">Sign up now</a>
            </div>
        </div>
        <div class="right">
            <img src="<?= get_template_directory_uri() ?>/assets/Login.jpg" alt="">
            <div class="info">
                    <span class="title-1">
                        We are always ready for business
                    </span>
                <p>Simply log in and we’ll be here to help with all your tyre needs.</p>
            </div>
        </div>
    </div>
</div>

<div id="sent" class=" bg-modal">
    <div class="modal-content">
        <svg class="close" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
            <path fill-rule="evenodd"
                  d="M4.686 4.686c6.249-6.248 16.38-6.248 22.628 0 6.248 6.249 6.248 16.38 0 22.628-6.249 6.248-16.38 6.248-22.628 0-6.248-6.249-6.248-16.38 0-22.628zM25.9 6.101C20.432.633 11.568.633 6.101 6.1.633 11.568.633 20.432 6.1 25.899c5.467 5.468 14.331 5.468 19.798 0 5.468-5.467 5.468-14.331 0-19.798zm-15.63 4.168a1 1 0 0 1 1.414 0L16 14.586l4.317-4.317a1 1 0 0 1 1.32-.083l.094.083a1 1 0 0 1 0 1.414L17.414 16l4.317 4.317a1 1 0 0 1 .083 1.32l-.083.094a1 1 0 0 1-1.414 0L16 17.414l-4.317 4.317a1 1 0 0 1-1.32.083l-.094-.083a1 1 0 0 1 0-1.414L14.586 16l-4.317-4.317a1 1 0 0 1-.083-1.32z" />
        </svg>

        <div class="request-sent">
            <div class="img-wrapper">
                <img src="<?= get_template_directory_uri() ?>/assets/icon-mail.svg" alt="">
            </div>
            <h3>Your request has been submitted</h3>
            <p>We’ll get back to you shortly with your login details for the client portal.</p>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
