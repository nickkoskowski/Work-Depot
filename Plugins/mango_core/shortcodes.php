<?php
// register button shortcode
function mango_button( $atts, $content = null) {
	extract( shortcode_atts( array(
		'button_type'  => 'button',
		'btn_size' => 'sm',
		'btn_min_width' => 'xs',
		'btn_style' => '',
		'btn_link' => '',
		'btn_target' => '_blank',
		'btn_custom_class' => ''
	), $atts ) );

    $output = '';
  
	if($btn_style==""){
			$btn_style="white";
	}
    if ($button_type == 'button') {
        $output .='<button class="'.$btn_custom_class.' btn btn-'.$btn_size.' btn-'.$btn_style.' min-width-'.$btn_min_width.'">'.$content.'</button>';
    } else if ($button_type == 'link'){
			$output .='<a href="'.$btn_link.'" target="'.$btn_target.'" class="'.$btn_custom_class.' btn btn-'.$btn_size.' btn-'.$btn_style.' min-width-'.$btn_min_width.'">'.$content.'</a>';
    }
    return $output;
}

// create shortcode for woocommerce product

function mango_woo_product($atts){

global $mango_settings;
	extract(shortcode_atts(array(
		'product_style' => 'style2',
		'textalign' => '',
		'show_product' => '-1',
		'product_cats' => '',
		'post_per_column_style1' => ' fullwidth',
		'per_column_desktop' => '3',
		'selecttype'=>'',
		'per_column_tab' => '6',
		'show_cat' => 'yes',
		'show_rating' => 'yes',
		'show_price' => 'yes',
	), $atts));

   ob_start();
   if ($product_style == 'style1') {
    ?>
		<div class="product-container<?php echo esc_attr($post_per_column_style1s); ?>">
   <?php 
   } elseif ($product_style == 'style2'){
   ?>
		<div class="row">
   <?php 
   }
   
    $args = array('post_type' => 'product', 'showposts' => $show_product, 'product_cat' =>$product_cats);
	if($selecttype == 'featured'){
			$args['meta_key'] = '_featured';
			$args['meta_value'] = 'yes';
	}else if($selecttype == 'selling'){
			$args['post__in'] = mango_woocomerce_bestsellers();
	}
		$argsd = query_posts($args);
		$post = new WP_Query( $argsd );
   ?>
    <div class="owl-carousel home-newarrivals-carousel" data-items="<?php echo esc_attr($per_column_desktop);?>" data-number-of-pro-cols="<?php if ($product_style == 'style2') { echo esc_attr($per_column_desktop); } elseif ( $product_style == 'style1') {
	  echo esc_attr($post_per_column_style1) ;
		}?>">
   <?php
   if (have_posts()) :
    while (have_posts()) : the_post();
		global $product, $woocommerce;
		$product_cats = $product->get_categories(' | ', '', '');
		$attachment_ids = $product->get_gallery_attachment_ids();
        if ($product_style == 'style1') {
          ?>
            <div class="product">
                <div class="product-top no-margin">
                    <figure>
                        <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                            <?php echo '<a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_post_thumbnail( $post->ID, 'product-thumbnail', array("class" => "product-image") ).'</a>'; ?>
                        </a>
                    </figure>
                </div><!-- End .product-top -->
                <div class="product-meta-box">
                    <?php
                    if ($show_cat == 'yes') {
                        ?>
							<div class="product-cats"><?php echo $product_cats ; ?></div><!-- End .product-cats -->
                      <?php 
					}
					 ?>
                    <h3 class="product-title"><a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h3>
                    <?php
                      if ($show_rating == 'yes') {
                     ?>
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
    <?php } ?>
        <?php
            if ($show_price == 'yes') {
        ?>
        <?php wc_get_template_part("loop/price");?>
        <?php } ?>
            </div><!-- End .product-meta-box -->
            </div><!-- End .product -->
        <?php } elseif ($product_style == 'style2') {
        ?>
		    <div class="product <?php echo esc_attr($textalign);?>">
			
 <?php global  $mango_settings;
?>
                <div class="product-top">
                    <?php
					if ( $mango_settings[ 'mango_show_compare_button' ] ) {
                          if ( in_array( 'yith-woocommerce-compare/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                            echo do_shortcode('[yith_compare_button]');
                          }
						  }
						  if ( $mango_settings[ 'mango_show_quick_button' ])  {
						  ?>
						<div class="woocommerce product quick-button">
							<a class="top-line-a right  open-product btn btn-custom2  btn-xs" data-id="<?php echo the_ID();?>"><i class="fa fa-expand"></i>
							<span><?php _e('Quick View','mango')?></span>
							</a>	
						</div>	
						  <?php
						  }
						  
						  if ( $mango_settings[ 'mango_show_wishlist_button' ] ) {
                          if ( in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                            echo do_shortcode('[yith_wcwl_add_to_wishlist]');
                          }
						  }
                        ?>
						<div class="img-effect">
                       
                          <?php
                            echo '<a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_post_thumbnail( $post->ID, 'product-thumbnail', array("class" => "product-image") ).'</a>';
						if ($attachment_ids) {
							   foreach ( $attachment_ids as $attachment_id ) {
									$image_link = wp_get_attachment_url( $attachment_id );
								 echo '<a class="hover-img" href="'.get_the_permalink().'" title="'.get_the_title().'">'.wp_get_attachment_image( $attachment_id, 'product-image' ).'</a>';

								}
						}
						?>
					</div>
						
                        <div class="product-action-container">
                          <?php 
						  if ( $mango_settings[ 'mango_show_add_to_cart_button' ] ) {



						  echo apply_filters( 'woocommerce_loop_add_to_cart_link', sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="product-btn product-add-btn %s product_type_%s"><i class="fa fa-shopping-cart"></i>%s</a>', esc_url( $product->add_to_cart_url() ), esc_attr( $product->id ), esc_attr( $product->get_sku() ), esc_attr( isset( $quantity ) ? $quantity : 1 ), $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '', esc_attr( $product->product_type ), esc_html( $product->add_to_cart_text() ) ), $product ); }?>
                        </div><!-- end .product-action-container -->
						</div><!-- End .product-top -->
            <?php
                    if ($show_cat == 'yes') {
                        ?>
                        <div class="product-cats"><?php echo $product_cats ; ?></div><!-- End .product-cats -->
            <?php 	}

                    ?>
                    <h3 class="product-title"><a href="<?php echo get_the_permalink(); ?>" title="<?php get_the_title(); ?>"><?php echo get_the_title(); ?></a></h3>
            <?php
                    if ($show_rating == 'yes') {
                    ?>
            <?php 	if ( $rating_html = $product->get_rating_html() ) :
						$rating = $product->get_average_rating();
						$rating_html = $product->get_rating_html();
						$count = 0; 
			?>
			
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
	<?php } ?>
	<?php
		if ($show_price == 'yes') {
                       ?>
                <?php wc_get_template_part("loop/price");?>
                <?php 
		}
                ?>
                </div><!-- End .product -->
        <?php }
		endwhile;
		endif;
   ?>
    </div><!-- End .col-md-3 -->
	
	<!--******************** QUICK VIEW START ******************************-->
	
	<?php
   if (have_posts()) :
    while (have_posts()) : the_post();
   global $product, $woocommerce;
   $product_cats = $product->get_categories(' | ', '', '');
   $attachment_ids = $product->get_gallery_attachment_ids();
        
          ?>
<div id="product-popup_<?php echo the_ID();?>" class="overlay-popup mypopup mfp-hide">
   <div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class("row"); ?>>
      <?php
         //do_action( 'woocommerce_before_single_product_summary' );
         ?>
      <div class="col-md-6 col-sm-6">
         <div class="images product-gallery-container">
            <div class="product-top ">
               <?php
                  woocommerce_show_product_sale_flash();
                  
                  if ( has_post_thumbnail() ) {
                  
                  $image_title 	= esc_attr( get_the_title( get_post_thumbnail_id() ) );
                  
                  $image_caption 	= get_post( get_post_thumbnail_id() )->post_excerpt;
                  
                  $image_link  	= wp_get_attachment_url( get_post_thumbnail_id() );
                  
                  $image       	= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
                  
                  'title'	=> $image_title,
                  
                  'alt'	=> $image_title
                  
                  ) );
                  
                      $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); //single-product //
                  
                      $image = $image['0'];
                  
                      $zoom_img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
                  
                      $zoom_img = $zoom_img['0'];
                  
                          echo apply_filters("woocommerce_single_product_image_html", sprintf('<img class="product-zoom"  src="%s" data-zoom-image="%s" alt="%s"/>',$zoom_img,$zoom_img,$image_title),$post->ID );
                  
                  } else {
                   echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img class="product-zoom"  src="%s"  data-zoom-image="%s" alt="%s" />', wc_placeholder_img_src(),wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );
                  
                  }
                  
                  ?>
            </div>
            <?php
               // do_action( 'woocommerce_product_thumbnails' ); 
                          
               $attachment_ids = $product->get_gallery_attachment_ids();
               if(has_post_thumbnail()){
				   if(empty($attachment_ids)){
						$attachment_ids[] = get_post_thumbnail_id($post->ID);
				   }else{
						array_unshift ( $attachment_ids ,  get_post_thumbnail_id($post->ID) );
						}
               }
               
               if ( $attachment_ids ) {
               $loop 		= 0;
               $columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
               ?>
            <div class="product-gallery-wrapper thumbnails <?php echo 'columns-' . $columns; ?>">
               <div class="product-quick">
                  <?php
                     foreach ( $attachment_ids as $attachment_id ) {
                              							
                     		
                     	$image        = wp_get_attachment_image_src( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_single' ) );
                               $image_zoom   = wp_get_attachment_image_src( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'full' ) );
                     	$image_class = 'product-gallery-item';
                     	$image_title = esc_attr( get_the_title( $attachment_id ) );
                     			
                                  		?>
                  <div class="gallery_images">
                     <a href="#" data-image="<?php echo $image[0];?>" data-zoom-image="<?php echo $image_zoom[0]?>" class="<?php echo $image_class;?>" title="<?php echo $image_title;?>"><img src="<?php echo $image[0] ;?>" alt="<?php echo $image_title;?>"/></a>
                  </div>
                  <?php   }  ?>
				  <div class="clearfix"></div>
               </div>
            </div>
            <?php   }  ?>
         </div>
      </div>
      <div class="col-md-6 col-sm-6">
         <div class="summary entry-summary">
            <div class="product-details text-left">
               <?php
                  do_action( 'woocommerce_single_product_summary' );
                  ?>
            </div>
         </div>
         <!-- .summary -->
         <?php
            do_action( 'woocommerce_after_single_product_summary' );
            ?>
         <meta itemprop="url" content="<?php the_permalink(); ?>" />
      </div>
      <!--col-md-6-->
   </div>
   <!-- #product-<?php the_ID(); ?> -->
   <?php do_action( 'woocommerce_after_single_product' ); ?>
</div><?php 
   endwhile;
   endif;
    ?>
	<script type="text/javascript">
		 jQuery( document ).ready(function() {
		 /* swap images for zoom on click event */
				jQuery('.product-quick').find('a').on('click', function (e) {
					var ez = jQuery('.product-zoom').data('elevateZoom'),
						smallImg = jQuery(this).data('image'),
						bigImg = jQuery(this).data('zoom-image');
						ez.swaptheimage(smallImg, bigImg);
					e.preventDefault();
				})
				})
	</script>
	
	<!-- ************************ QUICK VIEW END ******************* -->
 
   </div>
   <?php
   wp_reset_query();
  $output = ob_get_clean();
  return $output;
}

// create shortcode for woocommerce product carousel

function mango_woo_product_carousel($atts){
   extract(shortcode_atts(array(
		'product_style' => 'style1',
		'show_product' => '-1',
		'post_cat' => '',
		'product_cats'=>'',
		'per_column_desktop' => '4',
		'per_column_tab' => '3',
		'per_column_smart_phone' => '2',
		'show_nav' => 'false',
		'carousel_autoplay' => 'true',
		'show_cat' => 'yes',
		'show_rating' => 'yes',
		'show_price' => 'yes',
   ), $atts));
   ob_start();
   static $id = 1;
    ?>
    <script type="text/javascript">
      jQuery( document ).ready(function() {
        jQuery('.owl-carousel.product_carousel<?php echo $id; ?>').owlCarousel({
    <?php
		
        if ($product_style == 'style1') {
          ?>
            loop:false,
            margin:30,
            responsiveClass:true,
            nav:<?php echo esc_js($show_nav); ?>,
            dots: false,
            autoplay: <?php echo esc_js($carousel_autoplay); ?>,
            autoplayTimeout: 10000,
            center: true,
            responsive:{
              0:{
                items:1
              },
              520:{
                items:<?php echo esc_js($per_column_smart_phone); ?>
              },
              768: {
                items:<?php echo esc_js($per_column_tab); ?>
              },
              992: {
                items:<?php echo esc_js($per_column_desktop); ?>
              }
            }
         <?php } elseif ($product_style == 'style2') {
          ?>
            loop:false,
            margin:30,
            responsiveClass:true,
            autoplay: <?php echo esc_js($carousel_autoplay); ?>,
            nav:false,
            dots: false,
            responsive:{

              0:{
                items:2
              },

              768:{
                items:<?php echo esc_js($per_column_desktop); ?>
              }
            }
         <?php } ?>
        });
      });
    </script>

   <?php
			if ($product_style == 'style1') {
    ?>   
      <div class="owl-carousel lookbook-carousel product_carousel<?php echo esc_attr($id); ?>">
    <?php 	} elseif ($product_style == 'style2') {
    ?>
		<div class="owl-carousel lookbook-carousel product_carousel<?php echo esc_attr($id); ?>">
    <?php	 }
	
   $args = query_posts(array('post_type' => 'product', 'showposts' => $show_product, 'product_cat' => $product_cats));
   $post = new WP_Query( $args );
   if (have_posts()) :
      while (have_posts()) : the_post();
        global $product, $woocommerce;
			$product_cats = $product->get_categories(' | ', '', '');
			$attachment_ids = $product->get_gallery_attachment_ids();
        if ($product_style == 'style1') {
          ?>
            <div class="product">
                <div class="product-top no-margin">
                    <figure>
                            <?php echo '<a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_post_thumbnail( $post->ID, 'product-thumbnail', array("class" => "product-image") ).'</a>'; ?>
                    </figure>
                </div><!-- End .product-top -->
                <div class="product-meta-box">
                <?php
                    if ($show_cat == 'yes') {
                        ?>
                        <div class="product-cats"><?php echo $product_cats; ?></div><!-- End .product-cats -->
                <?php }
                    ?>
                    <h3 class="product-title"><a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h3>
                <?php
                    if ($show_rating == 'yes') {
                        ?>
                <?php 
					if ( $rating_html = $product->get_rating_html() ) :
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
	  <?php }  ?>
		<?php
				   if ($show_price == 'yes') {
                        ?>
                          <?php wc_get_template_part("loop/price");?>
                      <?php
					}
                    ?>
                </div><!-- End .product-meta-box -->
            </div><!-- End .product -->
        <?php } elseif ($product_style == 'style2') {
          ?>
              <div class="product">
                  <div class="product-top">
                      <?php
                        if ( in_array( 'yith-woocommerce-compare/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                          echo do_shortcode('[yith_compare_button]');
                        }
                       if ( in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                          echo do_shortcode('[yith_wcwl_add_to_wishlist]');
                        }
                      ?>
                      <figure class="owl-carousel product-slider">
                        <?php
                          echo '<a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_post_thumbnail( $post->ID, 'product-thumbnail', array("class" => "product-image") ).'</a>';
                        if ($attachment_ids) {
                            foreach ( $attachment_ids as $attachment_id ) {
                              $image_link = wp_get_attachment_url( $attachment_id );
                              echo '<a href="'.get_the_permalink().'" title="'.get_the_title().'">'.wp_get_attachment_image( $attachment_id, 'product-image' ).'</a>';
							}
                        }
                        ?>
                      </figure>
                      <div class="product-action-container">
                        <?php
if ( $mango_settings[ 'mango_show_add_to_cart_button' ] ) {

						echo apply_filters( 'woocommerce_loop_add_to_cart_link', sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="product-btn product-add-btn %s product_type_%s"><i class="fa fa-shopping-cart"></i>%s</a>', esc_url( $product->add_to_cart_url() ), esc_attr( $product->id ), esc_attr( $product->get_sku() ), esc_attr( isset( $quantity ) ? $quantity : 1 ), $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '', esc_attr( $product->product_type ), esc_html( $product->add_to_cart_text() ) ), $product ); } ?>
                      </div><!-- end .product-action-container -->
                  </div><!-- End .product-top -->
                  <?php
                    if ($show_cat == 'yes') {

                      ?>
                      <div class="product-cats"><?php echo $product_cats ; ?></div><!-- End .product-cats -->
                    <?php } ?>

                  <h3 class="product-title"><a href="<?php echo get_the_permalink(); ?>" title="<?php get_the_title(); ?>"><?php echo get_the_title(); ?></a></h3>
                 <?php
                    if($show_rating == 'yes') {
                      ?>
                    <?php if( $rating_html = $product->get_rating_html() ) :
								$rating = $product->get_average_rating();
								$rating_html = $product->get_rating_html();
								$count = 0;
					?>
    <div class="product-ratings">
		<?php 
			for( $i = 0; $i <(int)$rating; $i ++ ) {
				$count ++;
				echo '<span class="star active"></span>';
			}
		if( $rating -(int)$rating >= 0.5 ){
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
<?php } ?>
<?php                if ($show_price == 'yes') {
                      ?>
<?php wc_get_template_part("loop/price");?>
<?php } 	?>
              </div><!-- End .product -->
        <?php }
      endwhile;
   endif;
   ?>
   </div>
   <?php
   wp_reset_query();
   // increment unique id
   $id++;
  // clean to stop auto top
  $output = ob_get_clean();
  return $output;
}

function mango_flipbook($atts){
 extract(shortcode_atts(array(
  'number' => '',
  'product_cats' => '',
  'title'=>'',
  'select_alignment'=>''
   ), $atts));
   ob_start();
     
 ?>
 
     <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide mango_flipbook" data-ride="carousel" data-interval="7000">
                          
       <?php if($title){?>
       <h2 class="align-<?php echo $select_alignment;?>"><?php echo $title;?></h2>
       <?php }?>
                            <div class="carousel-inner  flipbook-container">
        <?php 
        $args  = array('post_type' => 'product',
        'posts_per_page' => $number,
        'product_cat' =>$product_cats
        ); 
        
        $product_loop = new WP_Query( $args );//global $product;
        if ( $product_loop->have_posts() ):
        while ( $product_loop->have_posts() ) : $product_loop->the_post();

        global $product,$mango_settings,$post;

       ?>
       
                              <div class="item ">
        <div class="col-md-6 flip-image">
         <div class="product-gallery-container">
          <div class="product-top">
               <?php 
			   echo '<a  href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_post_thumbnail( $post->ID, 'full' ).'</a>';
			   ?>
          </div><!-- End .product-top -->
         </div><!-- End .product-gallery-container -->
        </div>
        
        <div class="col-md-6 flip-desc">
         <div class="product-details">
         <h2 class="product-title"><?php the_title(); ?> </h2>
          <div class="product-cats">
           <a href="#" title="Category Name"><?php echo $product_cats;?></a>
          </div><!-- End .product-cats -->
         <div class="product-ratings-container">
          <?php 
           if ($rating_html = $product->get_rating_html()) :
          ?>
          <div class="product-ratings">
            <?php $count = 0;
            $rating = $product->get_average_rating();
            for ($i = 0; $i < (int)$rating; $i++) {
            $count++;
            ?>
           <span class="star active"></span>
            <?php }
            if ($rating - (int)$rating >= 0.5) {
            $count++;
            ?>
           <span class="star active-half"></span>
            <?php }
            for ($i = $count; $i < 5; $i++) {
            $count++;
            ?>
           <span class="star"></span>
            <?php }?>
           <span class="rating-amount">
            <?php 
            $rev_count = $product->get_review_count();
            echo  $rev_count . " ";
             if ($rev_count == 0 || $rev_count > 1) {
             echo "Reviews";
            } elseif ($rev_count == 1) {
              echo "Review";
            }?>
           </span>
          </div><!-- End .product-ratings -->';
          <?php  
          endif;
          ?>
         </div><!-- End .product-ratings-container -->
         <p><?php the_excerpt();?></p>
         <div class="product-price-container">
          <?php if ($product->get_regular_price()) {?>
           <span class="product-old-price"><?php echo  get_woocommerce_currency_symbol(); ?><?php echo $product->get_regular_price();?></span>
          <?php } ?>   
          <?php if ($product->get_sale_price()) {?>
            <span class="product-price"><?php echo get_woocommerce_currency_symbol();?><?php echo $product->get_sale_price();?></span>
          <?php } ?>
         </div><!-- End .product-price-container -->
       
         <div class="product-action-container">
          <a href=<?php echo  esc_url($product->add_to_cart_url());?> class="product-btn product-add-btn"><i class="fa fa-shopping-cart"></i><?php echo  $product->add_to_cart_text() ?></a>
         </div><!-- end .product-action-container -->
         
         <div class=" product-action">
          <a href="<?php echo the_permalink();?>" class="col-md-4 btn btn-custom2 single_add_to_cart_button button alt" title="Add to cart"><?php echo __('Read More','mango');?></a>
         </div><!-- End .product-action -->
        </div><!-- End .product-details -->
        </div>
                                </div><!-- End .item -->
        
                                 <?php endwhile; ?>

                              
                            </div><!-- End .carousel-inner -->

                            <!-- Controls -->
                            <a class="left carousel-control flipbook-icon" href="#carousel-example-generic" role="button" data-slide="prev"><i class="fa fa-angle-left flipbook-icon"></i></a>
       
                            <a class="right carousel-control flipbook-icon" href="#carousel-example-generic" role="button" data-slide="next"><i class="fa fa-angle-right flipbook-icon"></i></a>
                        </div><!-- End .carousel -->
       <?php wp_reset_postdata(); 
      endif; ?>
                    </div>
 
<?php }

// add action for all shortcode
add_shortcode('mango_flipbook', 'mango_flipbook');
add_shortcode('mango_button', 'mango_button');
add_shortcode('mango_woo_product', 'mango_woo_product');
add_shortcode('mango_woo_product_carousel', 'mango_woo_product_carousel');

 $cats = get_categories();
 $post_cats = array ();
 foreach ( $cats as $key => $value ) {
    $post_cats[ $value->name ] = $value->term_id;
 }

?>