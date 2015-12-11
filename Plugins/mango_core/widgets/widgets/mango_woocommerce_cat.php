<?php
add_action ( 'widgets_init', 'mango_woocommrce_cat_widgets' );
function mango_woocommrce_cat_widgets () {
    register_widget ( 'Mango_Woocommerce_categories' );
}
class Mango_Woocommerce_categories extends WP_Widget {
function __construct() {
		parent::__construct(
			'Mango_Woocommerce_categories',
			__('Mango: Woocommerce Categories', 'mango'),
array ( 'classname' => 'Woocomerce', 'description' => __ ( 'Add Woocommerce Categories.', 'mango-widgets' ) )
	);
	}
    function widget ( $args, $instance ) {
        extract ( $args );
		   $number = $instance[ 'number' ];
		   $style = $instance[ 'style' ];
		   $heading = $instance[ 'title' ];
			$taxonomy = 'product_cat';
			$iconized_args=1;
            $orderby = 'name';
            $show_count = 0;      // 1 for yes, 0 for no
            $pad_counts = 0;      // 1 for yes, 0 for no
            $hierarchical = 1;      // 1 for yes, 0 for no
            $title = '';
            $pss = $number;
            $empty = 0;
            $arg = array (
            'taxonomy' => $taxonomy,
            'orderby' => $orderby,
            'show_count' => $show_count,
            'pad_counts' => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li' => $title,
            'number' => $pss,
            'hide_empty' => $empty,
		    'parent'=>0,
			'iconized' => $iconized_args
            );
			?>	
			   <?php 
					if($style =='style1'){
						?>
						<aside class=" widget-home-widget">
							<div class="widget widget-menu">
						    <div class="widget-category-menu">
						    <h3><?php echo esc_attr($heading);?></h3>
						    <ul>
							<?php echo '<li><a href="'.wp_list_categories ( $arg ).'"></a></li>'; ?>
						    </ul>
							</div>
						   </div>
						</aside>
							<?php
							}
							?>
							<?php 
							if($style =='style2'){
							?>
						<div class="widget-category-menu category-menu-parted">
                            <ul>
							<?php echo '<li><a href="'.wp_list_categories ( $arg ).'"></a></li>'; ?>
                            </ul>
                        </div><!-- End .widget-category-menu -->
						<?php 
						}
						?>
						<?php 
						if($style =='style3'){
						?>
						<div class="widget category-widget-box">
                            <h3 class="#"><?php echo esc_attr($heading); ?></h3>
                            <ul id="category-widget">
								<?php $all_categories = get_categories ( $arg ); $anch = 0;
							foreach ( $all_categories as $cat ) {
							 $args = array(
								'child_of'                 => $cat->term_id,
								'orderby'                  => 'name',
								'order'                    => 'ASC',
								'hide_empty'               => FALSE,
								'hierarchical'             => 1,
								'taxonomy'                 => 'product_cat',
								); 
							$child_categories = get_categories($args );
							 echo '<li class=""><a href="'.get_term_link( $cat->slug, $cat->taxonomy ).'">'.$cat->name; 
							if($child_categories){ 
								echo '<span class="category-widget-btn"><i class="fa fa-angle-bottom"></i></span></a>'; 
								$anch = 1;
								echo "<ul>";
								foreach($child_categories as $subcat){
								echo '<li><a href="'.get_term_link( $subcat->slug, $subcat->taxonomy ).'">'.$subcat->name.'</a></li>';	
								}
							echo "</ul>";
							}
							if($anch != 1)
								echo '</a>';
							$anch = 0;
							echo"</li>";
							}
							?>
							</ul>
                        </div><!-- End .widget -->
						<?php } ?>
				<?php
				}
    function update ( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance[ 'title' ] = $new_instance[ 'title' ];
        $instance[ 'number' ] = $new_instance[ 'number' ];
        $instance[ 'style' ] = $new_instance[ 'style' ];
        return $instance;
    }
    function form ( $instance ) {
        $defaults = array ( 'title' =>'Product Categories', 'number' => 3, 'style' => '' );
        $instance = wp_parse_args ( (array)$instance, $defaults ); ?>
        <p>
            <label for="<?php echo $this->get_field_id ( 'title' ); ?>">
                <?php echo __ ( 'Title', 'mango' ) ?>:
                <input type="text" class="widefat" id="<?php echo $this->get_field_id ( 'title' ); ?>"
                  name="<?php echo $this->get_field_name ( 'title' ); ?>"
                 value="<?php if ( isset( $instance[ 'title' ] ) ) echo esc_attr ( $instance[ 'title' ] ); ?>"/>
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id ( 'number' ); ?>"><?php _e ( 'Number','mango' ) ?>
            <input type="number" class="custom_media_url" name="<?php echo $this->get_field_name ( 'number' ); ?>"
             id="<?php echo $this->get_field_id ( 'number' ); ?>"
             value="<?php if ( isset( $instance[ 'number' ] ) ) echo esc_attr( $instance[ 'number' ] ); ?>"/>
			</label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id ( 'style' ); ?>">
                <?php echo __ ( 'Select Style', 'mango' ) ?>
				<select name="<?php echo $this->get_field_name ( 'style' ); ?>" id="<?php echo $this->get_field_id ( 'style' ); ?>">
					<option value="style1"  <?php echo ( $instance[ 'style' ] == 'style1' ) ? 'selected' : ''; ?>> <?php _e("Style 1",'mango');?></option>
					<option value="style2"  <?php echo ( $instance[ 'style' ] == 'style2' ) ? 'selected' : ''; ?>> <?php _e("Style 2",'mango');?></option>
					<option value="style3"  <?php echo ( $instance[ 'style' ] == 'style3' ) ? 'selected' : ''; ?>><?php _e("Style 3",'mango');?></option>
				</select>
			</label>
        </p>
    <?php
    }
}
?>