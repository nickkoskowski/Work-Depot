<?php
/**
 * Template Name: Contact Page
 * @package WordPress
 * @subpackage mango
 * @since Mango 1.0
 */
global $mango_settings, $post;
$mango_layout_columns = mango_page_columns();
$mango_class_name = mango_class_name ();

get_header();
$mango_contact_version = get_post_meta ( $post->ID, 'mango_contact_page_version', true ) ? get_post_meta ( $post->ID, 'mango_contact_page_version', true ) : '1';
$address = get_post_meta ( $post->ID, 'mango_contact_address', true ) ? get_post_meta ( $post->ID, 'mango_contact_address', true ) : '';
$contact_info = get_post_meta ( $post->ID, 'mango_contact_info', true ) ? get_post_meta ( $post->ID, 'mango_contact_info', true ) : '';
//$google_map = mango_get_latitude_longitude();
$contact_msg = get_post_meta ( $post->ID, 'mango_contact_message', true ) ? get_post_meta ( $post->ID, 'mango_contact_message', true ) : '';
$show_icons = isset($mango_settings['mango_map_social_icons'])?$mango_settings['mango_map_social_icons']:'';

$containerClass = mango_main_container_class();
the_post();

if($mango_contact_version=='2'){ ?>
    <div class="<?php echo esc_attr($containerClass); ?>">
        <div id="map" class="map2"></div><!-- End #map -->
    </div><!-- End .container --> 
<?php }elseif($mango_contact_version=='1'){ ?>
    <div id="map"></div><!-- End #map -->
<?php }elseif($mango_contact_version=='4'){ ?>
    <div class="<?php echo esc_attr($containerClass); ?>">
        <div id="map-container">
            <div id="map" class="map2"></div><!-- End #map -->
            <?php if( $address || $contact_info){ ?>
            <div class="map-overlay-box">
                <?php if($address){ ?>
                <div class="address-box">
                    <?php echo wpautop($address); ?>
                </div><!-- End .address-box --> 
                <?php } ?>
                <?php if($contact_info){ ?>
                <div class="address-box">
                    <?php echo wpautop($contact_info);  ?>
                </div><!-- End .address-box -->
                <?php } ?>
            </div><!-- End .map-overlay-box -->
            <?php  } ?>
        </div><!-- End #map-container --> 
    </div><!-- End .container -->
<?php } ?>
<div class="<?php echo esc_attr($containerClass); ?>">
                <div class="row">
                    <div class="<?php echo esc_attr($mango_class_name); ?>">
                        <?php 
						get_template_part("templates/contact",$mango_contact_version); ?>
                    </div>
                    <?php  get_sidebar() ?> 
                </div>
</div>
</section>
<?php get_footer(); ?>
