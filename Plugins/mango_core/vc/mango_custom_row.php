<?php
/** Module - Animation Block **/

if(!class_exists('MangoCustomSectionClass')){
  class MangoCustomSectionClass{
	function __construct(){
		add_shortcode('mangosection',array($this,'mangosection_shortcode'));
		add_action('init',array($this,'mangosection_shortcode_mapper'));
	}/* end constructor*/

   // create shortcode
	function mangosection_shortcode($atts, $content = null){
		$output = $row_bg_color = $row_bg_image = $row_bg_size = $row_bg_repeat = $mangoparallax = $mangosectionheight = '';
		extract(shortcode_atts(array(
			'row_bg_color' => '',
			'row_bg_image' => '',
			'row_bg_size' => 'cover',
			'row_bg_repeat' => 'no-repeat',
			'mangoparallax' => 'parallax',
			'mangosectionheight' => 'fullheight',
		),$atts));
		$bg_color = '';
		$bg_image = '';
		if ($row_bg_color) {
			$bg_color = 'data-bgcolor="'.$row_bg_color.'"';
        }
		
	if($row_bg_image) {
		$path="(".wp_get_attachment_url( $row_bg_image ).")";
		$bg_image = "background-image:url".$path;     
    }
	
    $output .= '<div class="section '.$mangoparallax.' '.$mangosectionheight.'" '.$bg_color.' data-bgsize="'.$row_bg_size.'" data-bgrepeat="'.$row_bg_repeat.'" data-bottom-top="background-position:50% 0px;" data-top-bottom="background-position:50% -90%" style='.$bg_image.' >';
		if ($mangosectionheight == 'fullheight') {
			$output .= '<div class="vcenter-container"><div class="vcenter">';
        }
        $output .= do_shortcode($content);
		
    if($mangosectionheight == 'fullheight') {
			$output .= '</div></div>';
    }
    $output .= '</div>';
        return $output;
    } /* end animate_shortcode()*/

    // register shrotcode mapper
    function mangosection_shortcode_mapper(){
		if(function_exists('vc_map')){
			vc_map( 
				array(
					"name" => __("Mango Section", "mango"),
					"base" => "mangosection",
					"class" => "wpb_mango",
					"as_parent" => array('except' => 'mangosection'),
					"content_element" => true,
					"controls" => "full",
					"show_settings_on_create" => true,
					"category" => __("Mango", "mango"),
					"is_container"    => false,
					"params" => array(
										array(
											"type" => "colorpicker",
											"class" => "row_bg_color",
											"heading" => __("Background Color",'mango'),
											"param_name" => "row_bg_color",
											"value" => ''
										),
										array(
											'type' => 'attach_images',
											"class" => "row_bg_image",
											'heading' => __( 'Background Image', 'richer-framework' ),
											'param_name' => 'row_bg_image',
											'value' => ''
										),
										array(
											"type" => "dropdown",
											"class" => "row_bg_size",
											"heading" => __("Background Style",'mango'),
											"param_name" => "row_bg_size",
											"value" => array(
														__( "Cover", 'mango' ) => 'cover',
														__( 'Contain', 'mango' ) => 'contain',
														__( 'Initial', 'mango' ) => 'initial'
											)
										),
										array(
											"type" => "dropdown",
											"class" => "row_bg_repeat",
											"heading" => __("Background Repeat",'mango'),
											"param_name" => "row_bg_repeat",
											"value" => array(
														__( 'No Repeat', 'mango' ) => 'no-repeat',
														__( "Repeat Y", 'mango' ) => 'repeat-y',
														__( 'Repeat-X', 'mango' ) => 'Repeat-x',
														__( 'Repeat', 'mango' ) => 'repeat'
											)
										),
										array(
											"type" => "dropdown",
											"class" => "yesparallax",
											"heading" => __("Parallax option",'mango'),
											"param_name" => "mangoparallax",
											"value" => array(
														__('Yes', 'mango') => 'parallax',
														__('No', 'mango') => 'noparallax'
											)
										),
										array(
											"type" => "dropdown",
											"class" => "parsection_height",
											"heading" => __("Section Full Height",'mango'),
											"param_name" => "mangosectionheight",
											"value" => array(
														__('Yes', 'mango') => 'fullheight',
														__('No', 'mango') => 'nofullheight'
											)
										),
					),
				"js_view" => 'VcColumnView'
				)
			);/* end vc_map*/
		} /* end vc_map check*/
    }/*end animate_shortcode_mapper()*/
  } /* end class MangoCustomSectionClass*/
  // Instantiate the class
  
  new MangoCustomSectionClass;
	if( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_mangosection extends WPBakeryShortCodesContainer {
		}
	}
}
?>