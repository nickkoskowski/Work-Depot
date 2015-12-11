<?php

add_action ( 'widgets_init', 'mango_recent_post_widgets' );
function mango_recent_post_widgets () {
    register_widget ( 'mango_recent_post_Widget' );
}

class mango_recent_post_Widget extends WP_Widget {
function __construct() {
		parent::__construct(
			'mango_recent_post_Widget',
			__('Mango: Recent Post', 'mango'),
array ( 'classname' => 'mango_recent_post', 'description' => __('Recent Post.','mango') )	);
	} 

    function widget ( $args, $instance ) {
        extract ( $args );
        $title = apply_filters ( 'widget_title', $instance[ 'title' ] );
        $number = $instance[ 'number' ];
        echo $before_widget;
        if ( $title ) {
            echo $before_title . esc_attr ( $title ) . $after_title;
        }
        ?>
			 <div class="widget">
                    <?php
                        $recent_posts = new WP_Query( 'showposts=' . $number . '&ignore_sticky_posts=1' );
                        if ( $recent_posts->have_posts () ):
                            ?>
                            <div class="recent-posts-widget">
							        <?php while ( $recent_posts->have_posts () ): $recent_posts->the_post (); ?>
									<?php $img = get_post_meta ( get_the_ID (), 'mango_option_image', false ); ?>
                                <article class="entry clearfix">
								<?php if ( has_post_thumbnail () && !post_password_required () ) { ?>
								 <div class="entry-media">
                                       <a href="<?php the_permalink (); ?>"> <?php the_post_thumbnail()?></a>
                                    </div><!-- End .entry-media -->
								 <?php } elseif ( !empty( $img )  && !post_password_required () ) { ?>
                                    <div class="entry-media">
                                        <a href="<?php the_permalink (); ?>">
										 <?php $images = get_post_meta ( get_the_ID (), 'mango_option_image', false );
                                            $image = wp_get_attachment_image_src ( $images[ 0 ], 'thumb_200' ); ?>
										<img src="<?php echo esc_url ( $image[ 0 ] ); ?>"
                                          alt="<?php the_title (); ?>"/>
										</a>
                                    </div><!-- End .entry-media -->
									<?php } else { ?>
								<div class="entry-media">
                                     <a href="<?php the_permalink (); ?>">
                                      <img  src="<?php echo plugin_dir_url( __DIR__ )."widgets/assets/img/dummy-img.jpg";?>" alt="<?php the_title (); ?>"/>
                                     </a>
                                    </div><!-- End .entry-media -->
								    <?php } ?>
                                    <h5 class="entry-title"><a href="<?php the_permalink (); ?>"><?php the_title (); ?></a></h5>
                                    <div class="entry-meta"><?php _e ('Posted','mango' ) ?> <?php the_time ( 'd M Y' ); ?> </div><!-- End .entry-meta -->
                                </article>
                                  <?php endwhile; ?> 
                            </div><!-- End .ecent-posts-widget -->
						<?php endif; ?>
                    <?php wp_reset_query (); ?>	
            </div><!-- End .widget -->
        <?php echo $after_widget;
    }

    function update ( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags ( $new_instance[ 'title' ] );
        $instance[ 'number' ] = $new_instance[ 'number' ];
        return $instance;
    }




    function form ( $instance ) {
        $defaults = array ( 'title' => __ ( 'Recent Posts', 'mango' ), 'number' => 3 );
        $instance = wp_parse_args ( (array)$instance, $defaults ); ?>
        <p>
            <label for="<?php echo $this->get_field_id ( 'title' ); ?>"><?php _e ( "Title", 'mango' ); ?></label>
            <input class="widget" type="text" id="<?php echo $this->get_field_id ( 'title' ); ?>"
            name="<?php echo $this->get_field_name ( 'title' ); ?>"
            value="<?php echo ( isset( $instance[ 'title' ] ) ? ( $instance[ 'title' ] ) : '' ); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id ( 'number' ); ?>"><?php _e ( "Number of Post show:", 'mango' ); ?></label>
            <input class="widget" type="text" style="width: 30px;" id="<?php echo $this->get_field_id ( 'number' ); ?>"
            name="<?php echo $this->get_field_name ( 'number' ); ?>"
            value="<?php echo ( isset( $instance[ 'number' ] ) ? ( $instance[ 'number' ] ) : '' ); ?>"/>
        </p>

    <?php
    }
}
?>