<?php
add_action ( 'widgets_init', 'mango_clients_widgets' );
function mango_clients_widgets () {
    register_widget ( 'mango_clients_Widget' );
}

class mango_clients_Widget extends WP_Widget {
 function __construct() {
  parent::__construct(
   'mango_clients_Widget', 
   __('Mango Clients', 'mango'),
   array ( 'classname' => 'mango_clients-widget', 'description' => __('Add Clients','mango'))
  );
 }


    function widget ( $args, $instance ) {
        extract ( $args );
        $title = apply_filters ( 'widget_title', $instance[ 'title' ] );
        $number = $instance[ 'number' ];
        $text = $instance[ 'text' ];
        $link = $instance[ 'link' ];
        $tab = $instance[ 'tab' ];
        $linktext = $instance[ 'linktext' ];
        if ( !$link ) $link = get_post_type_archive_link ( 'clients' );
        echo $before_widget;
        if ( $title ) {
            echo $before_title . esc_attr ( $title ) . $after_title;
        }
        ?>

        <?php
        $args = array (
            'post_type' => 'clients',
            'posts_per_page' => $number,
            'has_password' => false
        );

        $testi = new WP_Query( $args );
        if ( $testi->have_posts () ):
            ?>
            <div class="producents-widget">
                <div class="producents-widget-wrapper">
                    <div class="row">
                        <?php while ( $testi->have_posts () ): $testi->the_post ();
                            $image = get_the_post_thumbnail ();
                            ?>
                            <a href="#" title="client"><?php echo $image ; ?></a>
                        <?php endwhile;
                        wp_reset_postdata ();?>
                    </div>
                    <!-- End .row -->
                </div>
                <a href="<?php echo esc_url ( $link );?>"  <?php if ( isset( $instance[ 'tab' ] ) ) { ?> target="_blank" <?php } ?>
                   class="more-link"><?php echo esc_attr ( $linktext );?></a>
            </div><!-- End .producents-widget -->
			<?php else:
				echo __ ( "No Clients Found", 'mango' );
			endif; ?>
			<?php echo $after_widget;
    }

    function update ( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags ( $new_instance['title'] );
        $instance['number'] = $new_instance['number'];
        $instance['text'] = $new_instance['text'];
        $instance['link'] = $new_instance['link'];
        $instance['tab'] = $new_instance['tab'];
        $instance['linktext'] = $new_instance['linktext'];
        return $instance;
    }


    function form ( $instance ) {
        $defaults = array ( 'title' => __ ('Popular producents', 'mango'), 'number' => 1 );
        $instance = wp_parse_args ( (array)$instance, $defaults ); ?>
        <p>
            <label for="<?php echo $this->get_field_id ( 'title' ); ?>"><?php _e ( "Title", 'mango' ); ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id ( 'title' ); ?>"
             name="<?php echo $this->get_field_name ( 'title' ); ?>"
             value="<?php echo ( isset( $instance[ 'title' ] ) ? ( $instance[ 'title' ] ) : '' ); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ( 'number' ); ?>"><?php _e ( "Number of items to show:", 'mango' ); ?></label>
            <input class="widefat" type="text" style="width: 30px;" id="<?php echo $this->get_field_id ( 'number' ); ?>"
             name="<?php echo $this->get_field_name ( 'number' ); ?>"
            value="<?php echo ( isset( $instance[ 'number' ] ) ? ( $instance[ 'number' ] ) : '' ); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ( 'linktext' ); ?>"><?php _e ( "URL text:", 'mango' ); ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id ( 'linktext' ); ?>"
             name="<?php echo $this->get_field_name ( 'linktext' ); ?>"
            value="<?php echo ( isset( $instance[ 'linktext' ] ) ? ( $instance[ 'linktext' ] ) : '' ); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ( 'link' ); ?>"><?php _e ( "URL:", 'mango' ); ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id ( 'link' ); ?>"
             name="<?php echo $this->get_field_name ( 'link' ); ?>"
            value="<?php echo ( isset( $instance[ 'link' ] ) ? ( $instance[ 'link' ] ) : '' ); ?>"/>
        </p>


        <p>
            <input type="checkbox" class="widefat" id="<?php echo $this->get_field_id ( 'tab' ); ?>"
              name="<?php echo $this->get_field_name ( 'tab' ); ?>"
              value="<?php if ( isset( $instance[ 'tab' ] ) ) echo esc_attr ( $instance[ 'tab' ] ); ?>"   <?php if ( isset( $instance[ 'tab' ] ) ) {
              echo 'checked="checked"';
            } ?> />
            <label for="<?php echo $this->get_field_id ( 'tab' ); ?>">
               <?php _e( 'URL Open in new tab', 'mango' ) ?>
            </label>
        </p>

    <?php
    }
}
?>