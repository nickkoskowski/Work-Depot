<?php
/**
 * Product quantity inputs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="quantity product-quantity-wrapper">
    <div class="product-quantity">
        <label class="input-desc"><?php _e("Quantity",'mango') ?>:</label>
        <input type="number" data-step="<?php echo esc_attr( $step ); ?>" <?php if ( is_numeric( $min_value ) ) : ?> data-min="<?php echo esc_attr( $min_value ); ?>"<?php endif; ?> <?php if ( is_numeric( $max_value ) ) : ?>data-max="<?php echo esc_attr( $max_value ); ?>"<?php endif; ?> name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>" title="<?php _ex( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) ?>" class="input-text horizontal-spinner qty text" size="4" />
    </div>
</div>