<?php
add_action ( 'widgets_init', 'mango_related_product_widgets' );
function mango_related_product_widgets () {
    register_widget ( 'Mango_Related_Product' );
}

class Mango_Related_Product extends WP_Widget {
	function __construct() {
		parent::__construct(
			'Mango_Related_Product',
			__('Mango: Related Product', 'mango'),
            array ( 'classname' => 'Woocomerce', 'description' => __ ( 'Add Related Product.', 'mango' ) )	);
	} 

    function widget ( $args, $instance ) {
		extract ( $args );
        $number = $instance[ 'number' ];
        $heading = $instance[ 'title' ];
        global $product;

        if ( !is_singular("product")) {
            return;
        }

        $related = $product->get_related ( $number );
        $args = apply_filters ( 'woocommerce_related_products_args', array (
            'post_type' => 'product',
            'ignore_sticky_posts' => 1,
            'no_found_rows' => 1,
            'posts_per_page' => $number,
            'post__in' => $related,
            'post__not_in' => array ( $product->id )
        ) );

        $products = new WP_Query( $args );
        if ( $products->have_posts () ) : ?>
            <div class="widget widget-products">
                <h3 class="widget-title"><?php echo esc_attr ( $heading ) ?></h3>
                <ul class="products-list">
                <?php while ( $products->have_posts () ) : $products->the_post ();
                    global $product;
                    ?>
                        <li>
                            <figure>
                                <a href="<?php echo get_the_permalink (); ?>" title="<?php echo get_the_title () ?>">
                                  <?php echo $product->get_image ( 'thumb_60', array ( "class" => "product-image" ) ); ?>
                                </a>
                            </figure>
                            <h5 class="product-title"><a href="<?php echo get_the_permalink () ?>"
                             title="<?php echo get_the_title () ?>"><?php echo get_the_title () ?></a>
                            </h5>
                            <div class="product-price-container">
                                <?php echo $product->get_price_html();
                                woocommerce_template_loop_rating(); ?>
                            </div>
                        </li>
                <?php endwhile; // end of the loop. ?>
                </ul>
            </div>

        <?php endif;
        wp_reset_postdata ();
        ?>
		</div><!-- End .widget -->
	<?php
    }

    function update ( $new_instance, $old_instance ) {
        $instance = $old_instance;
         $instance[ 'title' ] = $new_instance[ 'title' ];
         $instance[ 'number' ] = $new_instance[ 'number' ];
        return $instance;
    }

    function form ( $instance ) {
        $defaults = array ( 'title' => 'Related Products', 'number' => 3 );
        $instance = wp_parse_args ( (array)$instance, $defaults ); 
		?>
        <p>
            <label for="<?php echo $this->get_field_id ( 'title' ); ?>">
                <?php echo __ ( 'Title', 'mango' ) ?>:
                <input type="text" class="widefat" id="<?php echo $this->get_field_id ( 'title' ); ?>"
                 name="<?php echo $this->get_field_name ( 'title' ); ?>"
                 value="<?php if ( isset( $instance[ 'title' ] ) ) echo esc_attr ( $instance[ 'title' ] ); ?>"/>
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id ( 'number' ); ?>"><?php _e('Number', 'mango' ) ?>
                <input type="number" class="custom_media_url" name="<?php echo $this->get_field_name ( 'number' ); ?>"
                id="<?php echo $this->get_field_id ( 'number' ); ?>"
                 value="<?php if ( isset( $instance[ 'number' ] ) ) echo esc_attr ( $instance[ 'number' ] ); ?>"/>
            </label>
        </p>

    <?php
    }
}

?>