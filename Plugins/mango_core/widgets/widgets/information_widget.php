<?php
add_action ( 'widgets_init', 'mango_info_load_widgets' );
function mango_info_load_widgets () {
    register_widget ('Mango_Information_Widget');
}

class Mango_Information_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'Mango_Information_Widget', 
			__('Mango: Information', 'mango'), 
			array ( 'classname' => 'Informations', 'description' => __ ( 'Add information.', 'mango' ) ) 
		);
	} 

    function widget ($args,$instance) {
        extract ( $args );
        $title = apply_filters ( 'widget_title', $instance[ 'title' ] );
        $description = $instance[ 'description' ];
        $linktext = $instance[ 'linktext' ];
        $link = $instance[ 'link' ];
        $img = $instance[ 'img' ];
        $tab = $instance[ 'tab' ];
        echo $before_widget;
        if ( $title ) {
            echo $before_title . $title . $after_title;
        }
        ?>


        <div class="informations-widget">
            <?php if ($img) : ?>
            <figure>
                <a href="#"><img src="<?php echo esc_url ( $img ); ?>"
                 alt="<?php echo get_bloginfo ( "title" ) ?>"></a><?php endif; ?>
            </figure>
            <?php if ( $description ) : ?>  <p><?php echo esc_textarea ( $description ) ?> </p><?php endif; ?>
            <?php if ( $linktext ) : ?> <a href="<?php echo esc_url ( $link ); ?>" <?php if ( isset( $instance[ 'tab' ] ) ) { ?> target="_blank" <?php } ?>>  <?php echo esc_attr ( $linktext ) ?>   <i class="fa fa-angle-right"></i></a><?php endif; ?>
        </div><!-- End .informations-widget -->

        <?php
        echo $after_widget;
    }

    function update ( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags ( $new_instance[ 'title' ] );
        $instance[ 'description' ] = $new_instance[ 'description' ];
        $instance[ 'linktext' ] = $new_instance[ 'linktext' ];
        $instance[ 'link' ] = $new_instance[ 'link' ];
        $instance[ 'img' ] = $new_instance[ 'img' ];
        $instance[ 'tab' ] = $new_instance[ 'tab' ];
        return $instance;
    }

    function form ( $instance ) {
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
            <label for="<?php echo $this->get_field_id ( 'img' ); ?>"><?php _e ('Image','mango' ) ?></label><br/>
            <input type="text" class="custom_media_url" name="<?php echo $this->get_field_name ( 'img' ); ?>"
            id="<?php echo $this->get_field_id ( 'img' ); ?>"
            value="<?php if ( isset( $instance[ 'img' ] ) ) echo esc_url ( $instance[ 'img' ] ); ?>"/>
            <input type="button" class="button custom_media_upload" id="custom_image_uploader" value="Select Image"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ( 'text' ); ?>">
                <?php echo __( 'Description','mango' ) ?>:
                <textarea class="widefat" id="<?php echo $this->get_field_id ( 'description' ); ?>"
                name="<?php echo $this->get_field_name ( 'description' ); ?>"><?php if ( isset( $instance[ 'description' ] ) ) echo esc_textarea ( $instance[ 'description' ] ); ?></textarea>
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ( 'linktext' ); ?>">
                <?php echo __ ( 'Text URL', 'mango' ) ?>:
                <input type="text" class="widefat" id="<?php echo $this->get_field_id ( 'linktext' ); ?>"
                name="<?php echo $this->get_field_name ( 'linktext' ); ?>"
                value="<?php if ( isset( $instance[ 'linktext' ] ) ) echo esc_attr ( $instance[ 'linktext' ] ); ?>"/>
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ( 'link' ); ?>">
                <?php echo __ ( 'URL', 'mango' ) ?>:
                <input type="url" class="widefat" id="<?php echo $this->get_field_id ( 'link' ); ?>"
                name="<?php echo $this->get_field_name ( 'link' ); ?>"
                value="<?php if ( isset( $instance[ 'link' ] ) ) echo esc_url ( $instance[ 'link' ] ); ?>"/>
            </label>
        </p>

        <p>
            <input type="checkbox" class="widefat" id="<?php echo $this->get_field_id ( 'tab' ); ?>"
                 name="<?php echo $this->get_field_name ( 'tab' ); ?>"
                 value="<?php if ( isset( $instance[ 'tab' ] ) ) echo esc_attr ( $instance[ 'tab' ] ); ?>"   <?php if ( isset( $instance[ 'tab' ] ) ) {
                echo 'checked="checked"';
            } ?> />
            <label for="<?php echo $this->get_field_id ( 'tab' ); ?>">
                <?php echo _e( 'URL Open in New Tab', 'mango' ) ?>
            </label>
        </p>

    <?php
    }
}
?>