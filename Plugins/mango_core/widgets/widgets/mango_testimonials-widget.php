<?php
class Mango_Testimonials_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		'Mango_Testimonials_Widget',
		__('Recent Testimonials', 'mango'),
		array ( 'classname' => 'mango_testimonials_widget','description' => __ ( 'Recent Testimonials', 'mango' ) )	);
	} 
    function widget ( $args, $instance ) {
        extract ( $args );
        $title = apply_filters ( 'widget_title', $instance[ 'title' ] );
		if(isset($instance[ 'number' ]) || isset($instance[ 'text' ]) || isset($instance[ 'text' ])){
			$number = $instance[ 'number' ];
			$text = $instance[ 'text' ];
			$link = $instance[ 'link' ];
		}else{
			$number = '';
			$text = '';
			$link = '';
		}
        if ( !$link ) $link = get_post_type_archive_link ( 'testimonial' );
        echo $before_widget;
        if ( $title ) {
            echo $before_title . esc_attr ( $title ) . $after_title;
        }
        ?>
        <?php
        $args = array (
            'post_type' => 'testimonial',
            'posts_per_page' => $number,
            'has_password' => false
        );
        $testi = new WP_Query( $args );
        if ( $testi->have_posts () ):
            ?>
            <div class="testimonials-widget">
                <div class="owl-carousel testimonials-slider">
                    <?php while ( $testi->have_posts () ): $testi->the_post (); ?>
                        <div class="testimonial">
                            <blockquote>
                                <?php the_content (); ?>
                                <cite><span><?php the_title (); ?></span>, <?php echo human_time_diff ( get_the_time ( 'U' ), current_time ( 'timestamp' ) ) . ' ago'; ?>
                                </cite>
                            </blockquote>
                        </div><!-- End .testimonial -->
                    <?php endwhile;
                    wp_reset_postdata ();?>
                </div>
                <!-- End .testimonials-slider -->
            </div><!-- End.testimonials-widget -->
        <?php else:
            echo __ ( "No Testimonials Found", 'mango' );
        endif; ?>
        <?php echo $after_widget;
    }
    function form ( $instance ) {
        $defaults = array ( 'title' => __ ( 'Latest Review', 'mango' ), 'number' => 6, 'text' => __ ( 'Read More Testimonials', 'mango' ), 'link' => '#' );
        $instance = wp_parse_args ( (array)$instance, $defaults ); ?>
        <p>
            <label for="<?php echo $this->get_field_id ( 'title' ); ?>"><?php _e ( "Title", 'mango' ); ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id ( 'title' ); ?>"
                   name="<?php echo $this->get_field_name ( 'title' ); ?>"
                   value="<?php echo ( isset( $instance[ 'title' ] ) ? ( $instance[ 'title' ] ) : '' ); ?>"/>
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id ( 'number' ); ?>"><?php _e ( "Number of items to show:", 'mango' ); ?></label>
            <input class="widefat" type="text" style="width: 30px;" id="<?php echo $this->get_field_id ( 'number' ); ?>"
                   name="<?php echo $this->get_field_name ( 'number' ); ?>"
                   value="<?php echo ( isset( $instance[ 'number' ] ) ? ( $instance[ 'number' ] ) : '' ); ?>"/>
        </p>
    <?php
    }
	function update( $new_instance, $old_instance ) {
        $instance = array(); 
        $instance[ 'title' ] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance[ 'number' ] = ( ! empty( $new_instance['number'] ) ) ?  $new_instance['number']  : '';
        $instance[ 'text' ] = ( ! empty( $new_instance['text'] ) ) ?  $new_instance['text'] : '';
        $instance[ 'link' ] = ( ! empty( $new_instance['link'] ) ) ? $new_instance['link']  : '';
        return $instance; 
    }
}

add_action ( 'widgets_init', 'mango_testimonials_widgets' );
function mango_testimonials_widgets () {
    register_widget ( 'Mango_Testimonials_Widget' );
}
?>