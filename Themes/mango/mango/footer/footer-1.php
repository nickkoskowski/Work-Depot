<?php 
		global $mango_settings, $post; ?>
		
		<footer id="footer" class="mango_footer_1" role="contentinfo">
			<?php get_template_part("footer/footer-top-widgets"); ?>
			<div id="footer-inner">
				<div class="container footer-bg">
					<?php get_template_part('footer/footer-widgets') ?>
				</div>
			</div>
			<div id="footer-bottom">
				<div class="container">
					<div class="row">																<div class="col-md-7 ">							<?php  if ( has_nav_menu ( 'footer_menu' )  && mango_show_footer_menu()) {								wp_nav_menu (									array (										'theme_location' => 'footer_menu',										'menu_class' => 'footer-menu',										"depth" => 1,										'container' => false									) );								}?>								<p class="copyright"><?php echo htmlspecialchars_decode(esc_textarea($mango_settings['mango_copyright'])) ?></p>						</div><!-- End .col-md-7 -->
						<?php if(!$mango_settings['mango_hide_payments']){ ?>
						<div class="col-md-5 ">
							<div class="payment-container">
								<img src="<?php echo esc_url($mango_settings['mango_payments_image']['url']);?>" alt="Payments">
							</div><!-- End .payment-container -->
						</div><!-- End .col-md-5 -->
                <?php 	} ?>
					
					</div><!-- End .row -->
				</div><!-- End .container -->
			</div><!-- End #footer-bottom -->
		</footer><!-- End #footer -->