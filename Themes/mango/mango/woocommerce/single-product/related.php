<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>

	<div class="related products">

		<h5><?php _e( 'Related Products', 'woocommerce' ); ?></h5>

		<?php woocommerce_product_loop_start(); ?>
        <?php $loop  = 0; ?>
<!--        <div class="row">-->
			<?php while ( $products->have_posts() ) : $products->the_post(); ?>
                <?php
                $loop++;
//                if($loop==4){ ?>
<!--                </div><div class="row">-->
<!--                --><?php //$loop=0; } ?>
<!--                <div class="col-md-3 col-sm-6">-->
				    <?php wc_get_template_part( 'content', 'product' ); ?>
<!--                </div>-->
			<?php endwhile; // end of the loop. ?>
<!--        </div>-->
		<?php woocommerce_product_loop_end(); ?>
	</div>
<?php endif;
wp_reset_postdata();