<?php
/**
 * Statistic Widget
 */

function mango_widget_statistics_init() {
	register_widget('mango_Widget_Statistics');
}
add_action('widgets_init', 'mango_widget_statistics_init');

class Mango_Widget_Statistics extends WP_Widget {

	function __construct() {
		parent::__construct(
				'Mango_Widget_Statistics',
				__( 'Mango - Statistic Product and Users', 'mango' ),
				array( 'description' => __( 'Display statistic product and users', 'mango' ) )
			);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		 $style = $instance[ 'style' ];
	

		printf( '%s', $args['before_widget'] );
		if ( $title ) {
			printf( '%s', $args['before_title'] . $title . $args['after_title'] );
		}

		echo '<div class="widget-statistic">';

		if( class_exists( 'woocommerce' ) ) {


			$result = count_users();

				if ( isset( $result['avail_roles']['customer'] ) ) {
				$members = $result['avail_roles']['customer'];
				if ( $members > 0 ) {
					echo '<div class="market-members">';
					
					if($style == 'style1' ){
								echo '<p>' . __( 'Marketplace Members', 'mango' ) . ' </p>';	
						}
						
					if($style == 'style2' ){
						echo '<h5 class="product-title">' . __( 'Marketplace Members', 'mango' ) . ' </h5>';
					}
						
					echo '<h5 class="product-title"><span class="markplace-num">' . number_format( $members, 0, '', '.' ) . '</span></h5>';
					
				
					echo '</div>';
				}
			}

			$role_seller = '';
			if ( class_exists('WC_Vendors') ) {
				$role_seller = 'vendor';
			}
			
			
			if ( $role_seller ) {
				if ( isset( $result['avail_roles'][$role_seller] ) ) {
					$sellers = $result['avail_roles'][$role_seller];
					if ( $sellers > 0) {
						echo '<div class="market-members">';
				
						if($style == 'style1' ){
								echo '<p>' . __( 'Marketplace Sellers', 'mango' ) . ' </p>';
							
						}
						if($style == 'style2' ){
						echo '<h5 class="product-title">' . __( 'Marketplace Sellers', 'mango' ) . ' </h5>';
						}
						 echo '<h5 class="product-title"><span class="markplace-num">' . number_format( $sellers, 0, '', '.' ) . '</span></h5>';
						//echo '<p class="statistic">' . number_format( $sellers, 0, '', '.' ) . '</p>';
						echo '</div>';
						

					}
				}
			}

			// $count_posts = count( get_posts( array( 'post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1' ) ) );
			$count_posts = wp_count_posts( 'product' );
			$count_posts = $count_posts->publish;
			$items_title = __( 'Marketplace Items', 'mango' );

		}
		else {

			$count_posts = wp_count_posts( 'post' );
			$count_posts = $count_posts->publish;
			$items_title = __( 'Posts', 'mango' );

		}

		echo '<div class="market-items">';
			
		if($style == 'style1' ){
				echo '<p>' . $items_title . '  </p>';
				
		}
		if($style == 'style2' ){
			echo '<h5 class="product-title">' . $items_title . '  </h5>';
			
		}
		echo '<h5 class="product-title"><span class="markplace-num">' . number_format( $count_posts, 0, '', '.' ) . '</span></h5>';


		echo '</div>';

		echo '</div>';

		printf( '%s', $args['after_widget'] );
	}

	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : __( 'Statistics', 'mango' );
		 $style = $instance[ 'style' ];
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'mango' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		
		 <p>
            <label for="<?php echo $this->get_field_id ( 'style' ); ?>"></label>
                <?php echo __ ( 'Select Style', 'mango' ) ?>
				<select name="<?php echo $this->get_field_name ( 'style' ); ?>" id="<?php echo $this->get_field_id ( 'style' ); ?>">
				<option value="style2"  <?php echo ( $instance[ 'style' ] == 'style2' ) ? 'selected' : ''; ?>> <?php _e("Style Sidebar",'mango');?></option>
					<option value="style1"  <?php echo ( $instance[ 'style' ] == 'style1' ) ? 'selected' : ''; ?>> <?php _e("Style Footer ",'mango');?></option>
					
				
				</select>
			
        </p>

		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
       $instance[ 'style' ] = $new_instance[ 'style' ];
		return $instance;
	}
}
