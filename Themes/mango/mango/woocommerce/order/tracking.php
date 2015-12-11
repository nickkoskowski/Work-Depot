<?php
/**
 * Order tracking
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$order_status_text = sprintf( __( 'Order #%s which was made %s has the status &ldquo;%s&rdquo;', 'woocommerce' ), $order->get_order_number(), human_time_diff( strtotime( $order->order_date ), current_time( 'timestamp' ) ) . ' ' . __( 'ago', 'woocommerce' ), wc_get_order_status_name( $order->get_status() ) );

if ( $order->has_status( 'completed' ) ) $order_status_text .= ' ' . __( 'and was completed', 'woocommerce' ) . ' ' . human_time_diff( strtotime( $order->completed_date ), current_time( 'timestamp' ) ) . __( ' ago', 'woocommerce' );

$order_status_text .= '.';
echo "<p class='first-color'>";
echo ( esc_attr( apply_filters( 'woocommerce_order_tracking_status', $order_status_text, $order ) ) );
echo "</p>";
$notes = $order->get_customer_order_notes();

if ( $notes ) : ?>
	<h2><?php _e( 'Order Updates', 'woocommerce' ); ?></h2>
<?php foreach ( $notes as $note ) : ?>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo date_i18n( __( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); ?></div>
    <div class="panel-body">
        <?php echo wpautop( wptexturize( wp_kses_post( $note->comment_content ) ) ); ?>
    </div>
</div>
<!--	<ol class="commentlist notes">-->
<!--		--><?php //foreach ( $notes as $note ) : ?>
<!--		<li class="comment note">-->
<!--			<div class="comment_container">-->
<!--				<div class="comment-text">-->
<!--					<p class="meta">--><?php //echo date_i18n( __( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); ?><!--</p>-->
<!--					<div class="description">-->
<!--						--><?php //echo wpautop( wptexturize( wp_kses_post( $note->comment_content ) ) ); ?>
<!--					</div>-->
<!--	  				<div class="clear"></div>-->
<!--	  			</div>-->
<!--				<div class="clear"></div>-->
<!--			</div>-->
<!--		</li>-->
<!--	</ol>-->
<?php endforeach; ?>
<?php endif; ?>
<?php do_action( 'woocommerce_view_order', $order->id ); ?>
