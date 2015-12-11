<?php
class Banner extends WP_Widget {

 function __construct() {
  parent::__construct(
   'Banner', 
   __('Mango Display Banner', 'mango'),
   array ( 'classname' => 'AD-Banner', 'description' => __('Mango Banner','mango') )
  );
 }

    function form ( $instance ) {
        $instance = wp_parse_args ( (array)$instance, array ( 'Widget Title' => '' ) );
        $Widget_title = $instance['Widget Title'];
        $instance = wp_parse_args ( (array)$instance, array ( 'Title' => '' ) );
        $title = $instance['Title'];
        $instance = wp_parse_args ( (array)$instance, array ( 'sub-title' => '' ) );
        $sub_title = $instance['sub-title'];
        $instance = wp_parse_args ( (array)$instance, array ( 'badge' => '' ) );
        $badge = $instance['badge'];
        $instance = wp_parse_args ( (array)$instance, array ( 'description' => '' ) );
        $description = $instance['description'];
        $instance = wp_parse_args ( (array)$instance, array ( 'img' => '' ) );
        $img = $instance['img'];
        $instance = wp_parse_args ( (array)$instance, array ( 'link' => '' ) );
        $link = $instance['link'];
        $color = $instance['color'];
        $tab = $instance['tab'];
        ?>

        <p>
            <label for="<?php echo $this->get_field_id ( 'Widget Title' ); ?>"><?php _e ( 'Widget Title', 'mango' ); ?>
			</label>
            <input class="widefat" id="<?php echo $this->get_field_id ( 'Widget Title' ); ?>"
             name="<?php echo $this->get_field_name ( 'Widget Title' ); ?>" type="text"
            value="<?php echo esc_attr ( $Widget_title ); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id ( 'color' ); ?>"><?php _e ( 'Title Color', 'mango' ); ?></label>
            <select class='title-color' id="<?php echo $this->get_field_id ( 'color' ); ?>"
                name="<?php echo $this->get_field_name ( 'color' ); ?>">
                <option value="#dc42b2" selected><?php  _e ( 'Default', 'mango' ); ?></option>
                <option value="#d9534f"  <?php echo ( $color == '#d9534f' ) ? 'selected' : ''; ?>><?php  _e('warning','mango'); ?></option>
                <option value="#2e6da4"  <?php echo ( $color == '#2e6da4' ) ? 'selected' : ''; ?>><?php  _e('primary','mango'); ?></option>
                <option value="#5cb85c"  <?php echo ( $color == '#5cb85c' ) ? 'selected' : ''; ?>><?php  _e('success','mango'); ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ( 'Title' ); ?>"><?php _e ( 'Title','mango'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id ( 'Title' ); ?>"
            name="<?php echo $this->get_field_name ( 'Title' ); ?>" type="text"
            value="<?php echo esc_attr ( $title ); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ( 'sub-title' ); ?>"><?php _e ( 'Sub-Title','mango' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id ( 'sub-title' ); ?>"
            name="<?php echo $this->get_field_name ( 'sub-title' ); ?>" type="text"
            value="<?php echo esc_attr ( $sub_title ); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ( 'badge' ); ?>"><?php _e ('Badge: (Max:5 Characters Allowed)','mango' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id ( 'badge' ); ?>"
            name="<?php echo $this->get_field_name ( 'badge' ); ?>" type="text"
            value="<?php echo esc_attr ( $badge ); ?>" maxlength="5"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ( 'description' ); ?>"><?php _e('Description','mango' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id ( 'description' ); ?>"
             name="<?php echo $this->get_field_name ( 'description' ); ?>"><?php echo esc_attr ( $description ); ?>
			</textarea>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ( 'link' ); ?>"><?php _e ( 'URL','mango' ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id ( 'link' ); ?>"
            name="<?php echo $this->get_field_name ( 'link' ); ?>" value="<?php echo esc_url ( $link ); ?>"/>
        </p>

        <p>
            <input type="checkbox" class="widefat" id="<?php echo $this->get_field_id ( 'tab' ); ?>"
            name="<?php echo $this->get_field_name ( 'tab' ); ?>"
            value="<?php if ( isset( $instance[ 'tab' ] ) ) echo esc_attr ( $instance[ 'tab' ] ); ?>"   <?php if ( isset( $instance[ 'tab' ] ) ) {
             echo 'checked="checked"';
            } ?> />
            <label for="<?php echo $this->get_field_id ( 'tab' ); ?>">
                <?php _e ( 'URL Open in new tab', 'mango' ) ?>
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ( 'img' ); ?>"><?php _e ('Image','mango' ) ?></label><br/>
            <input type="text" class="custom_media_url" name="<?php echo $this->get_field_name ( 'img' ); ?>"
            id="<?php echo $this->get_field_id ( 'img' ); ?>"
             value="<?php echo esc_attr ( $instance[ 'img' ] ); ?>"/>
            <input type="button" class="button custom_media_upload" id="custom_image_uploader" value="Select Image"/>
        </p>

    <?php

    }
// UPDATE SECTION 

    function update ( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance[ 'Widget Title' ] = $new_instance[ 'Widget Title' ];
        $instance[ 'Title' ] = $new_instance[ 'Title' ];
        $instance[ 'sub-title' ] = $new_instance[ 'sub-title' ];
        $instance[ 'badge' ] = $new_instance[ 'badge' ];
        $instance[ 'description' ] = $new_instance[ 'description' ];
        $instance[ 'img' ] = $new_instance[ 'img' ];
        $instance[ 'link' ] = $new_instance[ 'link' ];
        $instance[ 'color' ] = $new_instance[ 'color' ];
        $instance[ 'tab' ] = $new_instance[ 'tab' ];
        return $instance;
    }

    function widget ( $args, $instance ) 
	{
        extract ( $args, EXTR_SKIP );
        echo $before_widget;
        $pattern = '//';
        $Widget_title = empty( $instance[ 'Widget Title' ] ) ? ' ' : apply_filters ( 'widget_title', $instance[ 'Widget Title' ] );
        $title = empty( $instance[ 'Title' ] ) ? ' ' : apply_filters ( 'widget_title', $instance[ 'Title' ] );
        $sub_title = empty( $instance[ 'sub-title' ] ) ? ' ' : apply_filters ( 'widget_title', $instance[ 'sub-title' ] );
        $badge = empty( $instance[ 'badge' ] ) ? ' ' : apply_filters ( 'widget_title', $instance[ 'badge' ] );
        $description = empty( $instance[ 'description' ] ) ? ' ' : apply_filters ( 'widget_title', $instance[ 'description' ] );
        $img = empty( $instance[ 'img' ] ) ? ' ' : apply_filters ( 'widget_title', $instance[ 'img' ] );
        $link = empty( $instance[ 'link' ] ) ? ' ' : apply_filters ( 'widget_title', $instance[ 'link' ] );
        $color = $instance[ 'color' ];
        $tab = $instance[ 'tab' ];

        if ( !empty( $instance[ 'badge' ] ) || !empty( $instance[ 'Title' ] ) || !empty( $instance[ 'description' ] ) || !empty( $instance[ 'img' ] ) || !empty( $instance[ 'link' ] ) || !empty( $instance[ 'Widget Title' ] ) || !empty( $instance[ 'sub-title' ] ) || !empty( $instance[ 'link' ] ) ) {
            ?>
            <div class="banner-box">
               <?php if( !empty($Widget_title)){ ?><h3><?php echo $Widget_title; ?></h3> <?php } ?>
                <div class="widget">
                   <?php if (!empty( $instance[ 'img' ] )) {
                    ?>
                    <?php if (!empty( $instance[ 'link' ] )) { ?>
                    <a href="<?php echo esc_attr ( $link ); ?>"  <?php if ( isset( $instance[ 'tab' ] ) ) { ?> target="_blank" <?php } ?>
                       title="<?php echo get_bloginfo ( "title" ) ?>"> <?php } ?>
                        <div class="image">
						    <div class="banner-sidebar-widget">
								<?php if ( !empty( $instance[ 'badge' ] ) ) { ?>
                                    <span class="label label-hot rotated yellow" ><?php echo esc_attr($badge ); ?></span>
								    <?php }
                                    if ( !empty( $instance[ 'Title' ] ) ) { ?>				
									<div class="banner-sidebar-widget-title">
						               <h2 data-custom='<?php echo esc_attr($color); ?>' class="banner-head"><?php echo esc_attr ( $title ); ?></h2>
								    </div>
									<?php }
									if ( !empty( $instance[ 'sub-title' ] ) ) { ?>
										<div class="banner-sidebar-widget-sub-title"><?php echo esc_attr($sub_title );?></div>
										  <?php }
									if ( !empty( $instance[ 'description' ] ) ) { ?>
										<div class="banner-sidebar-widget-description">
											<p><?php echo esc_attr ( $description ); ?></p>
										</div>
									   <?php }

									if ( !empty( $instance[ 'img' ] ) ) { ?>		
										<div class="banner-sidebar-widget-image">
											<img class="img-responsive" src="<?php echo esc_url($img)?>" alt="<?php echo esc_attr($title);?>">
										</div>
										<?php }

                                 ?>	
                            </div><!-- End .discount-box-wrapper -->
                        </div>     
                    </a>
					<?php } ?>
                </div>
            </div> <!-- end banner box -->
        <?php
        }

 echo $after_widget;
    }
}

add_action ( 'widgets_init', create_function ( '', 'return register_widget("Banner");' ) );
function hrw_enqueue () {
	wp_enqueue_script ( 'hrw', plugin_dir_url ( __FILE__ ) .'assets/js/js.js', null, null, true );
}
add_action ( 'admin_enqueue_scripts', 'hrw_enqueue' );
?>