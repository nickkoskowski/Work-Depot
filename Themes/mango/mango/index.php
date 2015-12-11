<?php
/**
 * Template Name: Blog
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage mango
 * @since Mango 1.0
 */

global $mango_settings,$args,$mango_layout_columns, $post;
$mango_layout_columns = mango_page_columns ();
$class=mango_main_container_class();
get_header ();
$blog_settings = mango_get_blog_settings ();
get_template_part ( 'content-query' );
$wp_query = new WP_Query( $args);
$mango_class_name =  mango_class_name();
?>
    	<div class="<?php echo esc_attr($class);?> main">
	        <div class="row">
                <div class="mango_blog <?php echo esc_attr($mango_class_name); ?>">
                    <?php if ( $wp_query->have_posts () ) {
                         if($blog_settings['blog_type']=="timeline"){ ?>
                            <div class="blog-timeline">
                        <?php }elseif($blog_settings['blog_type']=='blog-masonry'){ ?>
                                <div class="max-col-<?php echo esc_attr($blog_settings['blog_masonry_cols']); ?>" id="blog-item-container">
                         <?php }
                            while ( $wp_query->have_posts() ) {
                                $wp_query->the_post();
                                get_template_part( 'content','loop' );
                            }
                        if($blog_settings['blog_type']=="timeline"){  ?>
                            </div>
                        <?php }elseif($blog_settings['blog_type']=='blog-masonry'){ ?>
                            </div>
                        <?php }
                            mango_pagination();
                         } else {
                            get_template_part( "content", "none" );
                         } ?>
						<?php wp_reset_postdata(); ?>
                </div><!-- End .col-md-9 -->
                <div class="md-margin2x clearfix visible-sm visible-xs"></div><!-- space -->
                <?php  get_sidebar(); ?>
            </div><!-- End .row -->
        </div><!-- End .container -->
        <div class="lg-margin hidden-xs hidden-sm"></div><!-- space -->
    </section><!-- End #content -->
<?php get_footer(); ?>