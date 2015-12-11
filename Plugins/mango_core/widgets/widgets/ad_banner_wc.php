<?php

class woocommerce_category extends WP_Widget {

	function __construct() {
			parent::__construct(
				'woocommerce_category', 
				__('Mango WC Banner', 'mango'), 
				array( 'description' => __( 'Mango Woocommerce Banner', 'mango' ), ) // Args
			);
		} 


    function form ( $instance ) {


        wp_enqueue_style ( 'custom-style', plugin_dir_url ( __FILE__ ) . 'assets/css/style.css' );
        $Widget_title = $instance[ 'Widget Title' ];
        $title = $instance[ 'title' ];
        $link = $instance[ 'link' ];
        $link_text = $instance[ 'link_text' ];
        $select = $instance[ 'category_id' ];
        $category_image = $instance[ 'category_image' ];
        $show_title = $instance[ 'show_title' ];
        $tab = $instance[ 'tab' ];

        ?>

        <p>
            <label for="<?php echo $this->get_field_id ( 'Widget Title' ); ?>"><?php _e('Widget Title', 'mango' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id ( 'Widget Title' ); ?>" name="<?php echo $this->get_field_name ( 'Widget Title' ); ?>" type="text"  value="<?php echo esc_attr ( attribute_escape ( $Widget_title ) ); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ( 'title' ); ?>"><?php _e ( 'Title', 'mango' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id ( 'title' ); ?>" name="<?php echo $this->get_field_name ( 'title' ); ?>" type="text"
			value="<?php echo esc_attr ( $title ); ?>"/>
		</p>
		
        <p>
            <label for="<?php echo $this->get_field_id ( 'link' ); ?>"><?php _e ( 'URL', 'mango' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id ( 'link' ); ?>"
            name="<?php echo $this->get_field_name ( 'link' ); ?>" type="url"
            value="<?php echo esc_attr ( $link ); ?>"/>
			<?php echo esc_attr ( $link ); ?>
        </p>



        <p>
            <input type="checkbox" class="widefat" id="<?php echo $this->get_field_id ( 'tab' ); ?>"
            name="<?php echo $this->get_field_name ( 'tab' ); ?>" value="<?php if ( isset( $instance[ 'tab' ] ) ) echo esc_attr ( $instance[ 'tab' ] ); ?>"   <?php if ( isset( $instance[ 'tab' ] ) ) {
            echo 'checked="checked"';
            }?>/>

            <label for="<?php echo $this->get_field_id ( 'tab' ); ?>">
                <?php _e( 'URL Open in new tab', 'mango' ) ?>:
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ( 'link_text' ); ?>"><?php _e ( 'URL Text', 'mango' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id ( 'link_text' ); ?>"
            name="<?php echo $this->get_field_name ( 'link_text' ); ?>" type="text"
            value="<?php echo esc_attr ( $link_text ); ?>"/>
        </p>

        <?php

        $taxonomy = 'product_cat';
        $orderby = 'name';       // name , id
        $show_count = 0;         // 1 for yes, 0 for no
        $pad_counts = 0;         // 1 for yes, 0 for no
        $hierarchical = 1;       // 1 for yes, 0 for no
        $title = '';
        $empty = 0;

        $args = array (
            'taxonomy' => $taxonomy,
            'orderby' => $orderby,
            'show_count' => $show_count,
            'pad_counts' => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li' => $title,
            'hide_empty' => $empty,
        );
        $all_categories = get_categories ( $args );
        ?>


        <label for="<?php echo $this->get_field_id ( 'category_id' ); ?>"><?php _e ( 'Please select category to show', 'mango' ); ?></label>
        <?php if ( !empty( $all_categories ) ) { ?>
            <select name="<?php echo $this->get_field_name ( 'category_id' ) ?>"
                id="<?php echo $this->get_field_name ( 'category_id' ); ?>" class="widefat"
                 style="margin-bottom:10px">
                <option value="" class="hot-topic" style="margin-bottom: 3px;"><?php  _e ( 'Select Category', 'mango' ); ?></option>
                <?php
                foreach ( $all_categories as $cat ) 
				{
                    if ( $cat->category_parent == 0 ) 
					{
                       $category_id = $cat->term_id;
                       $thumbnail_id = get_woocommerce_term_meta ( $cat->term_id, 'thumbnail_id', true );
                       $image = wp_get_attachment_url ( $thumbnail_id );
                       ?>
						<option value="<?php echo $category_id; ?>" class="hot-topic"
							 style="margin-bottom:3px;" <?php if ( $category_id == $select ) {
							 echo 'selected';
							} ?>><?php echo $cat->name; ?>
						</option>
							<?php
                        $args2 = array (
                            'taxonomy' => $taxonomy,
                            'child_of' => 0,
                            'parent' => $category_id,
                            'orderby' => $orderby,
                            'show_count' => $show_count,
                            'pad_counts' => $pad_counts,
                            'hierarchical' => $hierarchical,
                            'title_li' => $title,
                            'hide_empty' => $empty
                        );
                        $sub_cats = get_categories ( $args2 );
                        if ( $sub_cats ) {
                            foreach ( $sub_cats as $sub_category ) {
                                if ( $sub_cats->$sub_category == 0 ) {
                                    ?>
                                    <option value="<?php echo $sub_category->cat_ID; ?>" class="hot-topic"
                                      style="margin-bottom:3px;" <?php if ( $sub_category->cat_ID == $select ) {
                                       echo 'selected';
                                    } ?>><?php echo $sub_category->name; ?>
									</option>
                                <?php
                                }  
                            } 
                        } 
                    } 
                } 
                ?>
            </select>
        <?php
        } 
        else {
          __( 'No woocommerce category found ','mango');

        }
    } 
// UPDATE SECTION 
    function update ( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance[ 'Widget Title' ] = $new_instance[ 'Widget Title' ];
        $instance[ 'title' ] = esc_attr ( $new_instance[ 'title' ] );
        $instance[ 'category_id' ] = esc_sql ( $new_instance[ 'category_id' ] );
        $instance[ 'category_image' ] = esc_sql ( $new_instance[ 'category_image' ] );
        $instance[ 'show_title' ] = esc_sql ( $new_instance[ 'show_title' ] );
        $instance[ 'link' ] = $new_instance[ 'link' ];
        $instance[ 'link_text' ] = $new_instance[ 'link_text' ];
        $instance[ 'tab' ] = $new_instance[ 'tab' ];
        return $instance;



    }


// WIDGET / DISPLAY SECTION 
    function widget ( $args, $instance ) {
        extract ( $args );
        $Widget_title = apply_filters ( 'widget_title', $instance[ 'Widget Title' ] );
        $title = apply_filters ( 'widget_title', $instance[ 'title' ] );
        $category_ids = $instance[ 'category_id' ];
        $showcategory_image = $instance[ 'category_image' ];
        $show_title = $instance[ 'show_title' ];
        $link = apply_filters ( 'widget_title', $instance[ 'link' ] );
        $link_text = apply_filters ( 'widget_title', $instance[ 'link_text' ] );
        echo $before_widget;
        if ( $Widget_title ) {
            ?>
			
            <div class="tiles">
                <h3><?php echo esc_attr($Widget_title);?></h3>
            </div>
        <?php } ?>

        <div class="widget">
            <div class="banner banner-color">
                <?php
                $args = array (
                    'taxonomy' => 'product_cat',
                    'orderby' => 'id',
                    'show_count' => 0,
                    'pad_counts' => 0,
                    'hierarchical' => 1,
                    'title_li' => '',
                    'hide_empty' => 0
                );
					$thumbnail_id = get_woocommerce_term_meta ( $category_ids, 'thumbnail_id', true );
					$image_url = wp_get_attachment_url ( $thumbnail_id );
					$term = get_term_by ( 'id', $category_ids, 'product_cat', 'ARRAY_A' );
					if ( empty( $image_url ) and !empty( $instance[ 'category_id' ] ) ) {
						?>
						<img src="<?php echo plugins_url ( 'assets/images/preview-70x70.jpg', __FILE__ ); ?>">
					<?php } else { ?>
                    <img src="<?php echo $image_url ; ?>" alt=""/>
					<?php } ?>
                <div class="banner-content">
                    <?php if ( $term[ 'name' ] != '' ) { ?>
                        <h4><?php echo esc_attr($term[ 'name' ]); ?></h4>
                    <?php
                    }
                    if ( $title != '' ) {
                        ?>
                        <h3> <?php
                            echo esc_attr($title);
                           ?>
						</h3>
                    <?php }

                    if ( $link != '' ) { //echo esc_url(get_term_link($cat->slug, 'product_cat'));        ?>
                        <a href="<?php echo esc_url ( $link ); ?>"  <?php if ( isset( $instance[ 'tab' ] ) ) { ?> target="_blank" <?php } ?>
                         title="<?php echo get_bloginfo ( "title" ) ?>"><?php echo esc_attr($link_text); ?></a>
                    <?php } ?>
                </div>
                <!-- end banner-content -->
            </div>
            <!-- End .banner -->
        </div> <!-- end Widget -->
        <?php
        echo $after_widget;
    }
// end function widget
}
// REGISTER WIDGET 
add_action ( 'widgets_init', create_function ( '', 'return register_widget("woocommerce_category");' ) );