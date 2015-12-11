<?php

add_action ( 'admin_head', 'ctup_wdscript' );
function ctup_wdscript () {
    wp_enqueue_media ();
    wp_enqueue_script ( 'adsScript', plugins_url ( 'assets/js/upload-widget.js', __FILE__ ) );
}

add_action ( 'widgets_init', 'mango_contact_widgets' );
function mango_contact_widgets () {
    register_widget ( 'Mango_Contact_Widget' );
}

class Mango_Contact_Widget extends WP_Widget {
function __construct() {
		parent::__construct(
			'Mango_Contact_Widget', // Base ID
			__('Mango: Contact', 'mango'), // Name
			array( 'description' => __( 'Add contact mango widget', 'mango' ), ) // Args
		);
	} 
	
    function widget ( $args, $instance ) {
        extract ( $args );
        $title = apply_filters ( 'widget_title', $instance[ 'title' ] );
        $img = $instance[ 'img' ];
        $address = $instance[ 'address' ];
        $phone = $instance[ 'phone' ];
        $email = $instance[ 'email' ];
        $description = $instance[ 'description' ];
        $link = $instance[ 'link' ];
        $tab = $instance[ 'tab' ];
        ?>

        <div class="widget">
            <?php
            if ( $title ) {
               echo $before_title . $title . $after_title;
            }
            ?>
            <?php if ( $instance[ 'img' ] || $instance[ 'description' ] || $instance[ 'address' ] || $instance[ 'phone' ] || $instance[ 'email' ] || $instance[ 'link' ] ) {
              $img_path = mango_get_logo_url ( "footer_" );
             ?>

                <div class="describe-widget">
                    <?php if ( $img ) : ?>
                        <div class="footer-logo">
						  <img src="<?php echo esc_url ( $img_path ); ?>" alt="<?php echo get_bloginfo ( "title" ) ?>"
                          class="img-responsive">
						</div>
					<?php 
					endif; 
					?>
                    <?php if ( $description ) : ?><p><?php echo esc_textarea( $description ) ?></p><?php endif; ?>
                    <ul class="contact-list">
                        <?php if ( $address ): ?>
                            <li><?php echo esc_attr( $address ) ?></li><?php endif; ?>
                        <?php if ( $phone ) : ?>
                            <li> <span><?php _e ("Phone", 'mango') ?>:</span> <?php echo esc_attr( $phone ) ?>
                            </li><?php endif; ?>
                        <?php if ( $email ) : ?>
                            <li><span><?php _e ( "Email", 'mango' ) ?> :</span> <?php echo esc_attr ( $email ) ?>
                            </li><?php endif; ?>
                        <?php if ( $link ) : ?><a href="<?php echo esc_url( $link ) ?>" <?php if ( isset( $instance[ 'tab' ] ) ) { ?> target="_blank" <?php } ?>><li><?php echo esc_attr( $link ) ?></a></li><?php endif; ?>
                    </ul>
                </div>
            <?php } ?>
        </div>

    <?php
    }
    function update ( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags ( $new_instance['title'] );
        $instance['address'] = $new_instance['address'];
        $instance['phone'] = $new_instance['phone'];
        $instance['email'] = $new_instance['email'];
        $instance['description'] = $new_instance['description'];
        $instance['link'] = $new_instance['link'];
        $instance['img'] = $new_instance['img'];
        $instance['tab'] = $new_instance['tab'];
        return $instance;
    }

    function form ( $instance ) {
        $defaults = array ( 'title' =>  '', 'img' => '', 'address' => '', 'phone' => '', 'email' => '', 'description' => '', 'link' => '' );
        $instance = wp_parse_args ( (array)$instance, $defaults ); ?>
        <p>
            <label for="<?php echo $this->get_field_id ( 'title' ); ?>">
                <?php echo __('Title', 'mango' ) ?>:
                <input type="text" class="widefat" id="<?php echo $this->get_field_id ( 'title' ); ?>"
                name="<?php echo $this->get_field_name ( 'title' ); ?>"
                value="<?php if ( isset( $instance[ 'title' ] ) ) echo $instance[ 'title' ]; ?>"/>
            </label>
        </p>

        <p>
            <input type="checkbox" class="custom_media_url" name="<?php echo $this->get_field_name ( 'img' ); ?>"
                id="<?php echo $this->get_field_id ( 'img' ); ?>"
                 value="<?php echo $img_path = mango_get_logo_url ( "footer_" ); ?>" <?php if ( isset( $instance[ 'img' ] ) )
				{
                echo 'checked="checked"';
				} ?> />
            <label for="<?php echo $this->get_field_id ( 'img' ); ?>"><?php _e('Upload Footer Logo','mango' ) ?></label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ( 'address' ); ?>">
                <?php echo __('Address','mango' ) ?>:
                <input type="text" class="widefat" id="<?php echo $this->get_field_id ( 'address' ); ?>"
                 name="<?php echo $this->get_field_name ( 'address' ); ?>"
                 value="<?php if ( isset( $instance[ 'address' ] ) ) echo esc_attr ( $instance[ 'address' ] ); ?>"/>
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ('phone' ); ?>">
                <?php echo __('Phone','mango' ) ?>:
                <input type="text" class="widefat" id="<?php echo $this->get_field_id ( 'phone' ); ?>"
                 name="<?php echo $this->get_field_name ('phone' ); ?>"
                 value="<?php if(isset($instance[ 'phone' ])) echo esc_attr ( $instance[ 'phone' ] ); ?>"/>
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ( 'email' ); ?>">
                <?php echo __( 'Email', 'mango' )?>:
                <input type="text" class="widefat" id="<?php echo $this->get_field_id ( 'email' ); ?>"
                 name="<?php echo $this->get_field_name ( 'email' ); ?>"
                value="<?php if ( isset( $instance[ 'email' ] ) ) echo esc_attr ( $instance[ 'email' ] ); ?>"/>
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ( 'description' ); ?>">
                <?php echo __('Description','mango') ?>:
                <textarea class="widefat" id="<?php echo $this->get_field_id ( 'description' ); ?>"
                 name="<?php echo $this->get_field_name ( 'description' ); ?>"><?php if ( isset( $instance[ 'description' ] )) echo esc_textarea ( $instance[ 'description' ] ); ?></textarea>
            </label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ( 'link' ); ?>">
                <?php echo __('Link','mango') ?>:
                <input type="url" class="widefat" id="<?php echo $this->get_field_id ( 'link' ); ?>"
                name="<?php echo $this->get_field_name ( 'link' ); ?>"
                value="<?php if ( isset( $instance[ 'link' ] ) ) echo esc_url ( $instance[ 'link' ] ); ?>"/>
            </label>
        </p>

        <p>
            <input type="checkbox" class="widefat" id="<?php echo $this->get_field_id ( 'tab' ); ?>"
                name="<?php echo $this->get_field_name ( 'tab' ); ?>"
                value="<?php if ( isset( $instance[ 'tab' ] ) ) echo esc_attr ( $instance[ 'tab' ] ); ?>"   <?php if ( isset($instance[ 'tab' ] ) ) {
                echo 'checked="checked"';
            } ?> />
            <label for="<?php echo $this->get_field_id ( 'tab' ); ?>">
                <?php _e('URL Open in new tab', 'mango' ) ?>
            </label>
        </p>
    <?php
    }
}
?>