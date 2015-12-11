<?php
/**
 * Show options for ordering
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="filter-row-box">
    <form class="woocommerce-ordering" method="get">
    <span class="filter-row-label"><?php _e("Sort by",'woocommerce')?></span>
    <div class="small-selectbox sort-selectbox clearfix">
        <select id="sort" name="orderby" class="selectbox">
            <?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
                <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
            <?php endforeach; ?>
        </select>
    </div><!-- End .normal-selectbox-->
        <?php
        // Keep query string vars intact
        foreach ( $_GET as $key => $val ) {
            if ( 'orderby' === $key || 'submit' === $key ) {
                continue;
            }
            if ( is_array( $val ) ) {
                foreach( $val as $innerVal ) {
                    echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
                }
            } else {
                echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
            }
        }
        ?>
    <button type="submit" class="sort-arrow" title="<?php _e("Sort",'woocommerce')?>"><?php _e("Sort",'woocommerce')?></button>
    </form>
</div><!-- End .filter-row-box -->