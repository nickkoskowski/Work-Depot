<?php
	$yes_no = array(
				__("Yes", "mango")=>"yes",
				__("No", "mango")=>"no"
    );
	add_action( "init", "mango_vc_shortcodes" );
	function mango_vc_shortcodes() {
				global $yes_no;
				vc_map( array(
							"name" => __("Button", "mango"),
							"base" => "mango_button",
							"class" => "wpb_mango",
							"category" => __("Mango", "mango"),
							"params" => array(
											array(
												"type" => "dropdown",            
												"class" => "",
												"heading" => __("Button Type", "mango"),
												"param_name" => "button_type",
												"admin_label" => true,
												"value" => array(
												__("Button", "mango") => "button",
												__("link", "mango") => "link"
												)
											),
												array(
													"type" => "dropdown",            
													"class" => "",
													"heading" => __("Button Size", "mango"),
													"param_name" => "btn_size",
													"value" => array(
													__("Extra Small", "mango") => "xs",
													__("Small", "mango") => "sm",
													__("Medium", "mango") => "md",
													__("Learge", "mango") => "lg"
													)
												),
												array(
													"type" => "dropdown",            
													"class" => "",
													"heading" => __("Button Min Width", "mango"),
													"param_name" => "btn_min_width",
													"value" => array(
																	__("Extra Small", "mango") => "xs",
																	__("Small", "mango") => "sm",
																	__("Medium", "mango") => "md",
																	__("Large", "mango") => "lg"
															)
													),
												array(
													"type" => "dropdown",            
													"class" => "",
													"heading" => __("Button Style", "mango"),
													"param_name" => "btn_style",
													"value" => array(
													__("White", "mango") => "white",
													__("Theme Default", "mango") => "custom"
													)
												),
												array(
													"type" => "textfield",            
													"class" => "",
													"heading" => __("Button Text", "mango"),
													"param_name" => "content",
													"value" => ""
												),
												array(
													"type" => "textfield",            
													"class" => "",
													"heading" => __("Button Link", "mango"),
													"param_name" => "btn_link",
													"value" => "",
													"dependency" => array(
													"element"=>"button_type",
													"value" => "link"
													)
												),
												array(
													"type" => "dropdown",
													"class" => "",
													"heading" => __("Open Link In", "mango"),
													"param_name" => "btn_target",
													"value" => array(
													__("New Window", "mango") => "_blank",
													__("Same Window", "mango") => "_self"
													),
													"dependency" => array(
													"element"=>"button_type",
													"value" => "link"
													)
												)
		)
   )
);

  $taxonomy = 'product_cat';
  $orderby = 'name';       // name , id
  $show_count = 0;         // 1 for yes, 0 for no
  $pad_counts = 0;         // 1 for yes, 0 for no
  $hierarchical = 1;       // 1 for yes, 0 for no
  $title = '';
  $empty = 0;
  $args = array (
  'taxonomy' => $taxonomy,
  'orderby' => $orderby,
  'show_count' => $show_count,
  'pad_counts' => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li' => $title,
  'hide_empty' => $empty
  );
if ( class_exists( 'WooCommerce' ) ) {
   $all_categories = get_categories ( $args );
	$product = array ();
	foreach ( $all_categories as $key => $value ){
	
		$product[$value->name]=$value->name; 

	}
}
	$product="";
  vc_map( array(
  "name" => __("Woo Product Slider", "mango"),
  "base" => "mango_woo_product",
  "class" => "wpb_mango",
  "category" => __("Mango", "mango"),
  "params" => array(
     array(
        "type" => "dropdown",            
        "class" => "",
        "heading" => __("Style", "mango"),
        "param_name" => "product_style",
        "admin_label" => true,
        "value" => array(
        __("Style 1", "mango") => "style1",
        __("Style 2", "mango") => "style2"
        ),
     ),
     array(
      "type" => "textfield",            
      "class" => "",
      "heading" => __("How Much Product To Show", "mango"),
      "param_name" => "show_product",
      "value" => "-1"
     ),
	 array (
      "type" => "checkbox",
      "holder" => "div",
      "class" => "",
      "heading" => __ ( "Filter By Category", 'mango' ),
      "param_name" => "product_cats",
	  "value" => $product
      ),
     array(
        "type" => "dropdown",            
        "class" => "",
        "heading" => __("Show Per Column", "mango"),
        "param_name" => "post_per_column_style1",
        "value" => array(
        __("1 Per Column", "mango") => 1,
        __("2 Per Column", "mango") => 2,
        __("3 Per Column", "mango") => 3,
        __("4 Per Column", "mango") => 4,
        __("5 Per Column", "mango") => 5,
	    __("6 Per Column", "mango") => 6,
        ),

        "dependency" => array(
         "element"=>"product_style",
         "value" => "style1"
        )
     ),
     array(
        "type" => "dropdown",            
        "class" => "",
        "heading" => __("Show Per Column For Desktop", "mango"),
        "param_name" => "per_column_desktop",
        "value" => array(
        __("1 Per Column", "mango") => 1,
        __("2 Per Column", "mango") => 2,
        __("3 Per Column", "mango") => 3,
        __("4 Per Column", "mango") => 4,
        __("5 Per Column", "mango") => 5,
		__("6 Per Column", "mango") => 6,
        ),

        "dependency" => array(
        "element"=>"product_style",
        "value" => "style2"
        )
     ),
	 
	 array(
     "type" => "dropdown",            
     "class" => "",
     "heading" => __("Text Align", "mango"),		
	"param_name" => "textalign",
    "value" => array(
	     __("Text Center", "mango") => '',
         __("Text Left", "mango") => 'text-left',  
        ),
        "dependency" => array(
        "element"=>"product_style",
         "value" => "style2"
        )
     ),
     array(
        "type" => "dropdown",            
        "class" => "",
        "heading" => __("Show Category With Products", "mango"),
        "param_name" => "show_cat",
        "value" => $yes_no
     ),
     array(
        "type" => "dropdown",            
        "class" => "",
        "heading" => __("Show Rating With Products", "mango"),
        "param_name" => "show_rating",
        "value" => $yes_no
     ),
	  array(
        "type" => "dropdown",            
        "class" => "",
        "heading" => __("Select Type", "mango"),
        "param_name" => "selecttype",
        "value" => array(
       __("New Arrival", "mango") => 'default',
       __("Popular", "mango") => 'selling',
       __("Featured", "mango") => 'featured',
     )),
     array(
        "type" => "dropdown",            
        "class" => "",
        "heading" => __("Show Price With Products", "mango"),
        "param_name" => "show_price",
        "value" => $yes_no
     )
	)
	)
	);

		
// Mango Flipbook
$product="";
vc_map ( array (
    "name" => __ ( "Mango Flipbook", 'mango' ),
    "base" => "mango_flipbook",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "admin_enqueue_css" => array ( plugins_url ( 'assets/vc_extend_admin.css', __FILE__ ) ), // This will load css file in the VC backend editor
    "params" => array (
      
        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Title", 'mango' ),
            "param_name" => "title"
        ),

		 array(
        "type" => "dropdown",            
        "class" => "",
        "heading" => __("Select Title Alignment", "mango"),
        "param_name" => "select_alignment",
        "value" => array(
        __("left", "mango") ,
        __("center", "mango"), 
        __("right", "mango") 
        
        )
     ),
   
    array (
            "type" => "number",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Select Product Number", 'mango' ),
            "param_name" => "number",
			"value" => "2"
    ),

    array(
      "type" => "dropdown",
      "holder" => "div",
      "class" => "",
      "heading" => __ ( "Filter By Category", 'mango' ),
      "param_name" => "product_cats",
	 "value" => $product
      
    ),
    )
)
 );

}

// include vc custom row for mango section
require_once("mango_custom_row.php");
?>