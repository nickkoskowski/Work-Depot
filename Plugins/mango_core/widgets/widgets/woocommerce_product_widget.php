<?php

add_action('widgets_init', 'woocommerce_products_load_widgets');
function woocommerce_products_load_widgets()
{
	register_widget('Woocommerce_Products_Widget');
}

class Woocommerce_Products_Widget extends WP_Widget {
	function __construct() {
			parent::__construct(
				'Woocommerce_Products_Widget',
				__('Mango: Woocommerce Products', 'mango'),
	array('classname' => 'woocommerce_products-widget', 'description' => __('Woocomemrce Products.','mango') )	);
		}
		
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$number = $instance['number'];
		 $style = $instance[ 'style' ];
		$categories = $instance['categories'];
		$type = $instance['product_type'];

		echo $before_widget;
		if($title) {
			echo $before_title . esc_attr($title) . $after_title;
		}
		
			if($style =='style1'){
		?>

		
		
		

		 <ul class="products-list">
		<?php
	
		
		 $query_arg = array(
			'post_type' => 'product',
			'posts_per_page' => $number,
			 'product_cat' => $categories
		);

		if($type == 'Featured'){
			$query_arg['meta_key'] = '_featured';
			$query_arg['meta_value'] = 'yes';
		}else if($type == 'Bestselling'){
		$query_arg['post__in'] = mango_woocomerce_bestsellers();
		}
		$s = new WP_Query($query_arg );
		if($s->have_posts()):
			while($s->have_posts()):
			global $product;
			$s->the_post();
		$category = get_term_by('name', $categories, 'product_cat');
		$product = get_product( $s->post->ID );
		?>

        <li>
        	<?php 
			$img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $product->id ));?>
            <?php if( has_post_thumbnail($product->id) && ! post_password_required()  ){ ?> 
            <figure>
                <a href="<?php the_permalink();?>">
                <img src="<?php echo esc_url($img_src[0]) ; ?>" alt="<?php the_title();?>" class="product-image"></a>
            </figure>
            <?php }else{ 
			$image = plugin_dir_url( __DIR__ )."img/dummy-img.jpg";
			?>

		<figure>
                <a href="<?php the_permalink();?>">
                <img src="<?php echo esc_url($image) ; ?>" alt="<?php the_title();?>" class="product-image"></a>
        </figure>
		<?php } ?>
                <h5 class="product-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h5>
				 <div class="product-price-container">
				 
				 
             <?php if($product->get_regular_price() && $product->get_sale_price() ){?>
				<span class="product-old-price"><?php echo get_woocommerce_currency_symbol(); ?><?php echo $product->get_regular_price(); ?></span>
				 <span class="product-price"><?php echo get_woocommerce_currency_symbol(); ?><?php echo $product->get_sale_price(); ?></span>
			 <?php } 
			 
				 elseif($product->get_sale_price()) {?>
                <span class="product-price"><?php echo get_woocommerce_currency_symbol(); ?><?php echo $product->get_sale_price(); ?></span>
			<?php } 
			
			 elseif($product->get_regular_price()) { ?>
                <span class="product-price"><?php echo get_woocommerce_currency_symbol(); ?><?php echo $product->get_regular_price(); ?></span>
			<?php } ?>
			
			
			

			<?php if ( $rating_html = $product->get_rating_html() ) :
			$rating = $product->get_average_rating();
			$rating_html = $product->get_rating_html();
			$count = 0; ?>
			<div class="product-ratings">
			<?php for( $i = 0; $i <(int)$rating; $i ++ ) {
			$count ++;
			echo '<span class="star active"></span>';
			}

			if( $rating -(int)$rating >= 0.5 ) {
			$count ++;
			echo '<span class="star active-half"></span>';
			}

			for( $i = $count; $i < 5; $i ++ ) {
			$count ++;
			echo '<span class="star"></span>';
			} ?>

			<span class="rating-amount">
            <?php
            $rev_count = $product->get_review_count();
            echo $rev_count." ";
            if($rev_count==0 || $rev_count>1){
                _e("Reviews",'mango');
            }elseif($rev_count==1){
                _e("Review",'mango');
            }
            ?>
			</span>
		</div>
		<?php endif; ?>
			</div><!-- End .product-price-container -->
			</li>
		<?php endwhile; wp_reset_query(); endif; ?>
		</ul>
		
		
		
		<?php
		
		} if($style =='style2'){
			
			?>
			
			<div class="widget widget-products">
         
		
                <ul class="products-list border-none">
                   <?php
	
		
		 $query_arg = array(
			'post_type' => 'product',
			'posts_per_page' => $number,
			 'product_cat' => $categories
		);

		if($type == 'Featured'){
			$query_arg['meta_key'] = '_featured';
			$query_arg['meta_value'] = 'yes';
		}else if($type == 'Bestselling'){
		$query_arg['post__in'] = mango_woocomerce_bestsellers();
		}
		$s = new WP_Query($query_arg );
		if($s->have_posts()):
			while($s->have_posts()):
			global $product;
			$s->the_post();
		$category = get_term_by('name', $categories, 'product_cat');
		$product = get_product( $s->post->ID );
		?>
                        <li>
                          <?php 
							$img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $product->id ));?>
							<?php if( has_post_thumbnail($product->id) && ! post_password_required()  ){ ?> 
							<figure>
								<a class="mango-popular" href="<?php the_permalink();?>">
								<img src="<?php echo esc_url($img_src[0]) ; ?>" alt="<?php the_title();?>" class="product-image"></a>
							</figure>
							<?php }else{ 
							$image = plugin_dir_url( __DIR__ )."img/dummy-img.jpg";
							?>

						<figure>
								<a  class="mango-popular" href="<?php the_permalink();?>">
								<img src="<?php echo esc_url($image) ; ?>" alt="<?php the_title();?>" class="product-image"></a>
						</figure>
						<?php } ?>
                            <h5 class="product-title"><a  class="mango-popular"  href="<?php echo get_the_permalink () ?>"
                             title="<?php echo get_the_title () ?>"><?php echo get_the_title () ?></a>
                            </h5>
                         <div class="product-price-container">
				 
				 
             <?php if($product->get_regular_price() && $product->get_sale_price() ){?>
				<span class="product-old-price"><?php echo get_woocommerce_currency_symbol(); ?><?php echo $product->get_regular_price(); ?></span>
				 <span class="product-price"><?php echo get_woocommerce_currency_symbol(); ?><?php echo $product->get_sale_price(); ?></span>
			 <?php } 
			 
				 elseif($product->get_sale_price()) {?>
                <span class="product-price"><?php echo get_woocommerce_currency_symbol(); ?><?php echo $product->get_sale_price(); ?></span>
			<?php } 
			
			 elseif($product->get_regular_price()) { ?>
                <span class="product-price"><?php echo get_woocommerce_currency_symbol(); ?><?php echo $product->get_regular_price(); ?></span>
			<?php } ?>
			
			
			

			<?php if ( $rating_html = $product->get_rating_html() ) :
			$rating = $product->get_average_rating();
			$rating_html = $product->get_rating_html();
			$count = 0; ?>
			<div class="product-ratings">
			<?php for( $i = 0; $i <(int)$rating; $i ++ ) {
			$count ++;
			echo '<span class="star active"></span>';
			}

			if( $rating -(int)$rating >= 0.5 ) {
			$count ++;
			echo '<span class="star active-half"></span>';
			}

			for( $i = $count; $i < 5; $i ++ ) {
			$count ++;
			echo '<span class="star"></span>';
			} ?>

			<span class="rating-amount">
            <?php
            $rev_count = $product->get_review_count();
            echo $rev_count." ";
            if($rev_count==0 || $rev_count>1){
                _e("Reviews",'mango');
            }elseif($rev_count==1){
                _e("Review",'mango');
            }
            ?>
			</span>
		</div>
		<?php endif; ?>
			</div><!-- End .product-price-container -->
                        </li>
         		<?php endwhile; wp_reset_query(); endif; ?>
                </ul>
            </div>
			
		<?php }
		
		echo $after_widget;
	} 
	
	
		

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['product_type'] = $new_instance['product_type'];
		$instance['categories'] = $new_instance['categories'];
		$instance[ 'style' ] = $new_instance[ 'style' ];
		return $instance;

	}

	function form($instance)
	{
		$defaults = array('title' => 'Feature Product', 'number' =>3,'product_type' => 'Bestselling','categories'=>1);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __ ( 'TItle', 'mango' )?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo (isset($instance['title'])?($instance['title']):''); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e("Number of Products to show:",'mango')?></label>
			<input class="widefat" type="number"  id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo (isset($instance['number'])?($instance['number']):''); ?>" />
		</p>
		
		
		    <p>
            <label for="<?php echo $this->get_field_id ( 'style' ); ?>"></label>
                <?php echo __ ( 'Select Style', 'mango' ) ?>
				<select name="<?php echo $this->get_field_name ( 'style' ); ?>" id="<?php echo $this->get_field_id ( 'style' ); ?>">
					<option value="style1"  <?php echo ( $instance[ 'style' ] == 'style1' ) ? 'selected' : ''; ?>> <?php _e("Style Footer Top",'mango');?></option>
					<option value="style2"  <?php echo ( $instance[ 'style' ] == 'style2' ) ? 'selected' : ''; ?>> <?php _e("Style Vendor Sidebar",'mango');?></option>
				
				</select>
			
        </p>
		
		
		<p>
			<label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e("Add Category:",'mango')?>
			</label>
			<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat" style="width:100%;">
				<?php
            $taxonomy = 'product_cat';
            $orderby = 'name';
            $show_count = 0;      // 1 for yes, 0 for no
            $pad_counts = 0;      // 1 for yes, 0 for no
            $hierarchical = 1;      // 1 for yes, 0 for no
            $title = '';
            $empty = 0;
            $arg = array (
            'taxonomy' => $taxonomy,
            'orderby' => $orderby,
            'show_count' => $show_count,
            'pad_counts' => $pad_counts,
            'hierarchical' => $hierarchical,
             'title_li' => $title,
             'hide_empty' => $empty
            );

            $cats = get_categories ( $arg );
			foreach ( $cats as $key => $value ) {
			 $post_cats[ $value->name ] = $value->name;
			$category=$post_cats[ $value->name ];
			?>

				<option value="<?php echo esc_attr($category ); ?>"  <?php if ( $category == $instance['categories'] ) {
                    echo 'selected';
                    }?>><?php echo esc_attr($category)?>
				<option>
			<?php }?>
			</select>
		</p>

        <p>
			<label for="<?php echo $this->get_field_id('product_type'); ?>"><?php  echo __ ( 'Select Product Type', 'mango' );?>	</label>
			<select id="<?php echo $this->get_field_id('product_type'); ?>" name="<?php echo $this->get_field_name('product_type'); ?>" class="widefat" style="width:100%;">
				<option value="<?php echo "Latest" ?>" <?php if ('Latest' == $instance['product_type']) echo 'selected="selected"'; ?>><?php _e("New Arrivals",'mango');?></option>
				<option value="<?php echo "Bestselling"; ?>" <?php if ('Bestselling' == $instance['product_type']) echo 'selected="selected"'; ?>><?php _e("Popular Products",'mango')?></option>
				<option value="<?php echo "Featured"; ?>" <?php if ('Featured' == $instance['product_type']) echo 'selected="selected"'; ?>><?php _e("Featured Products",'mango') ?></option>
			</select>
		
		</p>
	<?php
	}
}
