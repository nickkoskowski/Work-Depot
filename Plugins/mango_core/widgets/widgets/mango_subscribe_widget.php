<?php
/**
 * Custom Subscribe
 */

function mango_widget_subscribe_init() {
	unregister_widget( 'MC4WP_Lite_Widget' );
	register_widget('Mango_Widget_Subscribe');
}
add_action('widgets_init', 'mango_widget_subscribe_init');

class Mango_Widget_Subscribe extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Mango_Widget_Subscribe', // Base ID
			__( 'Mango - Subscribe Form', 'mango' ), // Name
			array( 'description' => __( 'Displays your custom MailChimp for WordPress sign-up form', 'mango' ) ) // Args
		);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		printf( '%s', $args['before_widget'] );
		if ( $title ) {
			printf( '%s', $args['before_title'] . $title . $args['after_title'] );
		}

		if( "" != $instance['description'] )
			echo '<p class="form-desc">' . $instance['description'] . '</p>';
echo '<div class="footer-newsletter-box">';
		echo do_shortcode( "[subscribe2  hide='Unsubscribe']" );
echo '</div>';
		printf( '%s', $args['after_widget'] );
	}

	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : __( 'Newsletter', 'mango' );
		$description = isset( $instance['description'] ) ? $instance['description'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'mango' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php _e( 'Form Description', 'mango' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" type="text" value="<?php echo esc_attr( $description ); ?>" />
		</p>
		<p class="help">
			<?php printf( __( 'You can edit your sign-up form in the %sMailChimp for WordPress form settings%s.', 'mango' ), '<a href="' . admin_url('admin.php?page=mc4wp-lite-form-settings') . '">', '</a>' ); ?>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
		return $instance;
	}
}
