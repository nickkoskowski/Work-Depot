<?php global $mango_settings, $post; ?>
<footer id="footer" class="footer2 footer-light mango_footer_6" role="contentinfo">
    <?php get_template_part("footer/footer-top-widgets"); ?>
    <div id="footer-inner">
        <div class="container">
            <?php get_template_part('footer/footer-widgets') ?>
        </div><!-- End .container -->
    </div><!-- End #footer-inner -->
    <div id="footer-bottom">
        <div class="container">
            <div class="footer-bottom-wrapper">
                <div class="row">

                    <?php if(!$mango_settings['mango_hide_payments']){ ?>
                        <div class="col-md-5 col-md-push-7">
                            <div class="payment-container">
                                <img src="<?php echo esc_url($mango_settings['mango_payments_image']['url']);?>" alt="Payments">
                            </div><!-- End .payment-container -->
                        </div><!-- End .col-md-5 -->
                    <?php } ?>
                    <?php  if ( has_nav_menu ( 'footer_menu' )  && mango_show_footer_menu()) {
                        wp_nav_menu (
                            array (
                                'theme_location' => 'footer_menu',
                                'menu_class' => 'footer-menu',
                                "depth" => 1,
                                'container' => 'div',
                                'container_class' => 'col-md-7 col-md-pull-5'
                            ) );
                    }?>
                </div><!-- End .row -->
            </div>
        </div><!-- End .container -->

        <div class="container text-center">
            <p class="copyright"><?php echo htmlspecialchars_decode(esc_textarea($mango_settings['mango_copyright'])) ?></p>
        </div><!-- End .container -->
    </div><!-- End #footer-bottom -->
</footer><!-- End #footer -->