<?php

class videoWidget extends WP_Widget {
	 function __construct() {
					parent::__construct(
					   'videoWidget', 
						 __('Mango: Video Widget ', 'mango'), 
						array ( 'classname' => 'Video-Widget', 'description' => __('Mango Video Widget','mango') ) 
					);
	}

	function form ( $instance ) {
		$instance = wp_parse_args ( (array)$instance, array ( 'Widget Title' => '' ) );
		$Widget_title = $instance[ 'Widget Title' ];
		$instance = wp_parse_args ( (array)$instance, array ( 'Videourl' => '' ) );
		$Videourl = $instance[ 'Videourl' ];
		$instance = wp_parse_args ( (array)$instance, array ( 'VideoType' => '' ) );
		$VideoType = $instance[ 'VideoType' ];
		$instance = wp_parse_args ( (array)$instance, array ( 'Vide_desc' => '' ) );
		$Vide_desc = $instance[ 'Vide_desc' ];
	?>

		<p>
			<label for="<?php echo $this->get_field_id ( 'Widget Title' ); ?>"><?php _e ( 'Widget Title', 'mango' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id ( 'Widget Title' ); ?>"
			 name="<?php echo $this->get_field_name ( 'Widget Title' ); ?>" type="text"
			value="<?php echo esc_attr ( $Widget_title ); ?>"/>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id ( 'Videourl' ); ?>"><?php _e ( 'Video Url', 'mango' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id ( 'Videourl' ); ?>"
			 name="<?php echo $this->get_field_name ( 'Videourl' ); ?>" type="text"
			 value="<?php echo esc_url ( $Videourl ); ?>"/>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id ( 'VideoType' ); ?>"><?php _e ( 'Select Video Type', 'mango' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id ( 'VideoType' ); ?>"
			    name="<?php echo $this->get_field_name ( 'VideoType' ); ?>">
				<option value="youtube" <?php if($VideoType=='youtube') { echo "selected='selected'";}?>><?php _e ( 'Youtube', 'mango' ) ?></option>
				<option value="vimeo" <?php if($VideoType=='vimeo') { echo "selected='selected'";}?>><?php _e ( 'Vimeo', 'mango' ) ?></option>
			</select>
		</p>

			<p>
				<label for="<?php echo $this->get_field_id ( 'Vide_desc' ); ?>"><?php _e ( 'Video Description', 'mango' ); ?></label>
				<textarea class="widefat" id="<?php echo $this->get_field_id ( 'Vide_desc' ); ?>"
				     name="<?php echo $this->get_field_name ( 'Vide_desc' ); ?>" rows="4" cols="50" >
					<?php echo esc_attr ( $Vide_desc ); ?>
			    </textarea>
			</p>
	<?php
	}
	function update ( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'Widget Title' ] = $new_instance[ 'Widget Title' ];
		$instance[ 'Videourl' ] = $new_instance[ 'Videourl' ];
		$instance[ 'VideoType' ] = $new_instance[ 'VideoType' ];
		$instance[ 'Vide_desc' ] = $new_instance[ 'Vide_desc' ];
		return $instance;
	}

	function widget ( $args, $instance ) {
		extract ( $args, EXTR_SKIP );
		echo $before_widget;
		$pattern = '//';
		 $Widget_title = empty( $instance[ 'Widget Title' ] ) ? ' ' : apply_filters ( 'widget_title', $instance[ 'Widget Title' ] );
		$Videourl = empty( $instance[ 'Videourl' ] ) ? ' ' : apply_filters ( 'widget_title', $instance[ 'Videourl' ] );
		$VideoType = empty( $instance[ 'VideoType' ] ) ? ' ' : apply_filters ( 'widget_title', $instance[ 'VideoType' ] );
		 $Vide_desc = empty( $instance[ 'Vide_desc' ] ) ? ' ' : apply_filters ( 'widget_title', $instance[ 'Vide_desc' ] );
			?>
			<div class="widget">
				<h3 class="widget-title"><?php echo esc_attr($Widget_title); ?></h3>
					<div class="embed-responsive embed-responsive-16by9">
					<ul class="slides">
						<?php if( $VideoType == 'youtube' && filter_var($Videourl, FILTER_VALIDATE_URL) ) : ?>
							<li class='iframe'> <?php
								$parsedUrl  = parse_url($Videourl);
								$embed      = $parsedUrl['query'];
								parse_str($embed, $out);
								$embedUrl   = $out['v']; 
							
								?>
						<iframe width="1170" height="658" src="//www.youtube.com/embed/<?php echo $embedUrl;?>"  ></iframe>
							</li>
						<?php endif; ?>
						<?php if( $VideoType == 'vimeo'  && filter_var($Videourl, FILTER_VALIDATE_URL) ) : ?>
						<li class='iframe'>
							<iframe src="//player.vimeo.com/video/<?php echo (int) substr(parse_url($Videourl, PHP_URL_PATH), 1); ?>" width="1170" height="658" ></iframe>
						</li>
							<?php endif; ?>
					</ul>
					</div>
					<?php if($Vide_desc){?>
					<p>
					<?php echo esc_textarea( $Vide_desc ) ?>
					</p>
					<?php } ?>
				<!-- end widget -->
			</div> <!-- end banner box -->

		<?php
		echo $after_widget;
			}
		}
add_action ( 'widgets_init', create_function ( '', 'return register_widget("videoWidget");' ) );