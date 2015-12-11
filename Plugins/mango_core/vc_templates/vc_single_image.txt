<?php

$output = $el_class = $image = $img_size = $img_link = $img_link_target = $img_link_large = $title = $alignment = $css_animation = $css = '';
$exact_size = false;
extract( shortcode_atts( array(
	'title' => '',
	'image' => $image,
	'img_size' => 'thumbnail',
	'img_link_large' => false,
	'img_link' => '',
	'link' => '',
	'img_link_target' => '_self',
	'alignment' => 'left',
	'el_class' => '',
	'style' => '',
	'border_color' => '',
	'css' => '',
	'img_eff' => 'none',
	'img_delay' => 'none',
), $atts ) );

$style = ( $style != '' ) ? $style : '';
$border_color = ( $border_color != '' ) ? ' vc_box_border_' . $border_color : '';
$img_id = preg_replace( '/[^\d]/', '', $image );
// Set rectangular.
if( preg_match( '/_circle_2$/', $style )) {
	$style = preg_replace('/_circle_2$/', '_circle', $style);
	$img_size = $this->getImageSquereSize($img_id, $img_size);
}
$img = wpb_getImageBySize( array(
	'attach_id' => $img_id,
	'thumb_size' => $img_size,
	'class' => 'vc_single_image-img'
) );

if($img_eff == 'none'){
	$img_eff = '';
}

if ( $img == null ) {
	if($img_delay == 'none'){
		$img['p_img_large'][0] = '<img class="vc_img-placeholder vc_single_image-img wow '.$img_eff.' pull-'.$alignment.'" src="' . vc_asset_url( 'vc/no_image.png' ) . '" />';
	}else{
		$img['p_img_large'][0] = '<img class="vc_img-placeholder vc_single_image-img wow '.$img_eff.' pull-'.$alignment.'" src="' . vc_asset_url( 'vc/no_image.png' ) . '" data-wow-delay="'.$img_delay.'"/>';
	}
}//' <small>'.__('This is image placeholder, edit your page to replace it.', 'js_composer').'</small>';
$el_class = $this->getExtraClass( $el_class );

$a_class = '';
if ( $el_class != '' ) {
	$tmp_class = explode( " ", strtolower( $el_class ) );
	$tmp_class = str_replace( ".", "", $tmp_class );
	if ( in_array( "prettyphoto", $tmp_class ) ) {
		wp_enqueue_script( 'prettyphoto' );
		wp_enqueue_style( 'prettyphoto' );
		$a_class = ' class="prettyphoto"' . ' rel="prettyPhoto[rel-' . get_the_ID() . '-' . rand() . ']"';
		$el_class = str_ireplace( " prettyphoto", "", $el_class );
	}
}

$link_to = '';
if ( $img_link_large == true ) {
	$link_to = wp_get_attachment_image_src( $img_id, 'large' );
	$link_to = $link_to[0];
} else if ( strlen( $link ) > 0 ) {
	$link_to = $link;
} else if ( ! empty( $img_link ) ) {
	$link_to = $img_link;
	if ( ! preg_match( '/^(https?\:\/\/|\/\/)/', $link_to ) ) {
		$link_to = 'http://' . $link_to;
	}
}
//to disable relative links uncomment this..

if($img_delay == 'none'){
	$img_output = ( $style == 'vc_box_shadow_3d' ) ? '<span class="vc_box_shadow_3d_wrap"> <img src="' . $img['p_img_large'][0] . '" alt="" class="wow '.$img_eff.' pull-'.$alignment.'"  /></span>' : '<img src="' . $img['p_img_large'][0] . '" alt="" class="wow '.$img_eff.' pull-'.$alignment.'"  />';
}else{
	$img_output = ( $style == 'vc_box_shadow_3d' ) ? '<span class="vc_box_shadow_3d_wrap"> <img src="' . $img['p_img_large'][0] . '" alt="" class="wow '.$img_eff.' pull-'.$alignment.'" data-wow-delay="'.$img_delay.'" /></span>' : '<img src="' . $img['p_img_large'][0] . '" alt="" class="wow '.$img_eff.' pull-'.$alignment.'"  data-wow-delay="'.$img_delay.'" />';
}



$output .= "\n\t\t\t" . $img_output;

echo $output;