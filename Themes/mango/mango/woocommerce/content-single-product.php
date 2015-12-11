<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class("row"); ?>>
	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		 
		 
global $mango_settings;
if ( $mango_settings[ 'mango_show_add_to_cart_button' ] ) {


}else{
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
}
		 
		do_action( 'woocommerce_before_single_product_summary' );
	?>
	
<div class="col-md-5 col-sm-5">
	<div class="summary entry-summary">
        <div class="product-details text-left">
            <?php
            /**
			 * woocommerce_single_product_summary hook
			 *
             *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>
        </div>
	</div><!-- .summary -->

	
	<meta itemprop="url" content="<?php the_permalink(); ?>" />
	<?php if($mango_settings[ 'mango_show_add_to_cart_button' ]==0){ ?>
<div class="send-enquiry">
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingOne2">
				<h4 class="panel-title enq">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
						<i class="fa fa-envelope"></i> <?php _e('Send Enquiry','mango');?>
						<span class="panel-icon"></span>
					</a>
				</h4>
			</div><!-- End .panel-heading -->
			<div id="collapseOne2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne2">
				<div class="panel-body">
				<?php echo do_shortcode($mango_settings['mango_send_enquiry']); ?>
				</div><!-- End .panel-body -->
			</div><!-- End .panel-collapse -->
		</div><!-- End .panel -->
	</div><!-- End .panel-group -->
 </div>
<?php } ?>
</div><!--col-md-5-->
</div><!-- #product-<?php the_ID(); ?> -->


<?php do_action( 'woocommerce_after_single_product' ); ?>
<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>