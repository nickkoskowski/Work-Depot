<?php
$cats = get_categories ();
$post_cats = array ();
foreach ( $cats as $key => $value ) {
    $post_cats[ $value->name ] = $value->term_id;
}




$taxonomy = 'product_cat';
$orderby = 'name';       // name , id
$show_count = 0;         // 1 for yes, 0 for no
$pad_counts = 0;         // 1 for yes, 0 for no
$hierarchical = 1;       // 1 for yes, 0 for no
 $title = '';
$empty = 0;
$parent=0;
$args = array (
    'taxonomy' => $taxonomy,
    'orderby' => $orderby,
    'show_count' => $show_count,
    'pad_counts' => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li' => $title,
    'hide_empty' => $empty,
	'parent' => $parent
);
if ( class_exists( 'WooCommerce' ) ) {
$woo_product = get_categories ( $args );
$product = array ();
foreach ( $woo_product as $key => $value ) {
	$product[0]="Select Categories";
    $product[ $value->name ] = $value->name;
	
}
}



$taxonomy = 'category';
$orderby = 'name';       // name , id
$show_count = 0;         // 1 for yes, 0 for no
$pad_counts = 0;         // 1 for yes, 0 for no
$hierarchical = 1;       // 1 for yes, 0 for no
 $title = '';
$empty = 0;
$parent=0;
$args = array (
    'taxonomy' => $taxonomy,
    'orderby' => $orderby,
    'show_count' => $show_count,
    'pad_counts' => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li' => $title,
    'hide_empty' => $empty,
	'parent' => $parent
);

$post_cat = get_categories ( $args );
$post = array ();
foreach ( $post_cat as $key => $value ) {
	$post[0]="Select Categories";
    $post[ $value->name ] = $value->name;
	
}



$taxonomy = 'faq-category';
$orderby = 'name';       // name , id
$show_count = 0;         // 1 for yes, 0 for no
$pad_counts = 0;         // 1 for yes, 0 for no
$hierarchical = 1;       // 1 for yes, 0 for no
 $title = '';
$empty = 0;
$parent=0;
$args = array (
    'taxonomy' => $taxonomy,
    'orderby' => $orderby,
    'show_count' => $show_count,
    'pad_counts' => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li' => $title,
    'hide_empty' => $empty,
	'parent' => $parent
);

$faq_cat = get_categories ( $args );
$faq = array ();
foreach ( $faq_cat as $key => $value ) {
	$faq[0]="Select Categories";
    $faq[ $value->name ] = $value->name;
	
}



$yes_no = array (
    __ ( "Yes", "mango" ) => "yes",
    __ ( "No", "mango" ) => "no"
);

// Mango Categories
vc_map ( array (
    "name" => __ ( "Mango Categories", 'mango' ),
    "base" => "mango_category",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "admin_enqueue_css" => array ( plugins_url ( 'assets/vc_extend_admin.css', __FILE__ ) ), // This will load css file in the VC backend editor
    "params" => array (
        array (
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Categories Image", 'mango' ),
            "param_name" => "img_active"

        ),


        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Title", 'mango' ),
            "param_name" => "title"
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Sub Title", 'mango' ),
            "param_name" => "sub_title"
        ),


        array (
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Description", 'mango' ),
            "param_name" => "description"
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Button Text", 'mango' ),
            "param_name" => "button_text",
            "description" => __ ( "Text on the button.", 'mango' )
        ),

        array (

            'type' => 'href',
            'heading' => __ ( 'URL (Link)', 'mango' ),
            'param_name' => 'button_link',
            'description' => __('Button link.', 'mango')
        ),
    )
) );


// Mango Banner
vc_map ( array (
    "name" => __ ( "Mango Banner ", 'mango' ),
    "base" => "mango_banner",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Banner Image", 'mango' ),
            "param_name" => "img_active",
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Title", 'mango' ),
            "param_name" => "title"
        ),

        array (
            "type" => "dropdown",
            "heading" => __ ( "Font Select", "mango" ),
            "param_name" => "mango_font",
            "value" => array (
                __ ( "Font Normal", "mango" ) => 'classy',
                __ ( "Font Medium", "mango" ) => 'mini',
                __ ( "Font Bold", "mango" ) => 'banner-color',
            ),
            "description" => __ ( "Select Grade", "mango" )
        ),
        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Sub Title", 'mango' ),
            "param_name" => "sub_title"
        ),


        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Button Text", 'mango' ),
            "param_name" => "button_text",
            "description" => __ ( "Text on the button.", 'mango' )
        ),

        array (
            'type' => 'href',
            'heading' => __ ( 'URL (Link)', 'mango' ),
            'param_name' => 'button_link',
            'description' => __ ( 'Button link.', 'mango' )
        ),
    )
) );

// Mango Blogs
vc_map ( array (
    "name" => __ ( "Mango Blog", 'mango' ),
    "base" => "mango_blog",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Heading", 'mango' ),
            "param_name" => "heading"
        ),


        array (
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Blog Image", 'mango' ),
            "param_name" => "img_active",
        ),


        array (
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Description", 'mango' ),
            "param_name" => "description"
        ),


        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Button Text", 'mango' ),
            "param_name" => "button_text",
            "description" => __ ( "Text on the button.", 'mango' )
        ),

        array (
            'type' => 'href',
            'heading' => __ ( 'URL (Link)', 'mango' ),
            'param_name' => 'button_link',
            'description' => __ ( 'Button link.', 'mango' )
        ),
    )

) );


// Latest Posts

vc_map ( array (
    "name" => __ ( "Mango Latest Posts", 'mango' ),
    "base" => "latest_posts",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Title", 'mango' ),
            "param_name" => "heading",
        ),


        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Show more posts text", 'mango' ),
            "param_name" => "text",
        ),

        array (

            "type" => "href",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Text Link", 'mango' ),
            "param_name" => "link",
        ),


        array (

            "type" => "number",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "No of Posts", 'mango' ),
            "param_name" => "no_of_posts",
            "value" => "5",
            "description" => __ ( "Left empty means all posts", 'mango' )
        ),

        array (
            "type" => "dropdown",
            "class" => "",
            "heading" => __ ( "Show Per Column", "mango" ),
            "param_name" => "post_per_column",
            "value" => array (
                __ ( "6 Per Column", "mango" ) => 6,
                __ ( "5 Per Column", "mango" ) => 5,
                __ ( "4 Per Column", "mango" ) => 4,
                __ ( "3 Per Column", "mango" ) => 3,
                __ ( "2 Per Column", "mango" ) => 2,
                __ ( "1 Per Column", "mango" ) => 1,
            ),
        ),

        array (
            "type" => "checkbox",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Filter By Category", 'mango' ),
            "param_name" => "post_cats",
            "value" => $post_cats
        ),
    )
) );

//Mango  clients
vc_map ( array (
    "name" => __ ( "Mango Clients", 'mango' ),
    "base" => "mango_clients",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Heading", 'mango' ),
            "param_name" => "heading",
            "value" => __ ( "Clients", 'mango' )
        ),

        array (
            "type" => "number",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "No: Of Client Logo", 'mango' ),
            "param_name" => "no_of_posts",
            "value" => "2"
        ),

        array (
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Style", 'mango' ),
            "param_name" => "style_select",
            "value" => array (
                __ ( "Select Style", "mango" ) => '',
                __ ( "Style 1", "mango" ) => 'style1',
                __ ( "Style 2", "mango" ) => 'style2',
            )
        ),
    )

) );


//Mango  clients Carosil

vc_map ( array (
    "name" => __ ( "Mango Client Carousel", 'mango' ),
    "base" => "mango_client_carosil",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Heading", 'mango' ),
            "param_name" => "heading",
        ),
    )
) );


//Mango  Testimonials
vc_map ( array (
    "name" => __ ( "Mango Testimonials", 'mango' ),
    "base" => "mango_testimonials",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Heading", 'mango' ),
            "param_name" => "heading",
            "value" => __ ( "Testimonials", 'mango' )
        ),

        array (
            "type" => "number",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "No: Of Testimonials", 'mango' ),
            "param_name" => "no_of_posts",
            "value" => "2"
        ),
    )

) );


//Mango  Shipping
vc_map ( array (
    "name" => __ ( "Mango Shipping", 'mango' ),
    "base" => "mango_shipping",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Shipping Image", 'mango' ),
            "param_name" => "img_active",
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Heading", 'mango' ),
            "param_name" => "heading"
        ),

        array (
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Description", 'mango' ),
            "param_name" => "description"
        ),

        array (
            "type" => "dropdown",
            "heading" => __ ( "Color Select", "mango" ),
            "param_name" => "color",
            "value" => array (
                __ ( "Select Style", "mango" ) => '',
                __ ( "Dark", "mango" ) => 'dark',
                __ ( "Custom", "mango" ) => 'custom last',
            )
        ),
    )
) );


// Mango Category 1
vc_map ( array (
    "name" => __ ( "Mango Category 1", 'mango' ),
    "base" => "mango_category_fix",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
           "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Category Image", 'mango' ),
            "param_name" => "img_active",
        ),


        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Title", 'mango' ),
            "param_name" => "title"
        ),


        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Sub Title", 'mango' ),
            "param_name" => "sub_title"
        ),


        array (
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Description", 'mango' ),
            "param_name" => "description"
        ),
    )
) );

// Mango Category 2
vc_map ( array (
    "name" => __ ( "Mango Category 2", 'mango' ),
    "base" => "mango_category_side",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Category Image", 'mango' ),
            "param_name" => "img_active",
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Title 1", 'mango' ),
            "param_name" => "title1"
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Title 2", 'mango' ),
            "param_name" => "title2"
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Price", 'mango' ),
            "param_name" => "price"
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Button Text", 'mango' ),
            "param_name" => "button_text",
            "description" => __ ( "Text on the button.", 'mango' )
        ),

        array (
            'type' => 'href',
            'heading' => __ ( 'URL (Link)', 'mango' ),
            'param_name' => 'button_link',
            'description' => __ ( 'Button link.', 'mango' )
        ),

    )
) );


// Mango Banner Long
vc_map ( array (
    "name" => __ ( "Mango Banner Long", 'mango' ),
    "base" => "mango_banner_long",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Long Banner Image", 'mango' ),
            "param_name" => "img_active",
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Title", 'mango' ),
            "param_name" => "title"
        ),


        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Price", 'mango' ),
            "param_name" => "price"
        ),


        array (
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Description", 'mango' ),
            "param_name" => "description"
        ),


        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Button Text", 'mango' ),
            "param_name" => "button_text",
            "description" => __ ( "Text on the button.", 'mango' )
        ),

        array (
            'type' => 'href',
            'heading' => __ ( 'URL (Link)', 'mango' ),
            'param_name' => 'button_link',
            'description' => __ ( 'Button link.', 'mango' )
        ),
    )
) );

// Mango Promated Categories

vc_map ( array (
    "name" => __ ( "Mango Promoted Categories", 'mango' ),
    "base" => "mango_promated_categories",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Long Banner Image", 'mango' ),
            "param_name" => "img_active",
        ),


        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Title", 'mango' ),
            "param_name" => "heading"
        ),


        array (
            "type" => "number",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Number", 'mango' ),
            "param_name" => "number_cat",
            "value" => "2"
        ),


        array (
           "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Select Category", 'mango' ),
            "param_name" => "category_select",
            "value" => array (
                __ ( "Select category", "mango" ) => '',
                __ ( "Select Post category", "mango" ) => 'category',
                __ ( "Select Woocommerce Categories", "mango" ) => 'product_cat',
                __ ( "Select FAQ'S Categories", "mango" ) => 'faq-category',
            )
        ),
    )
) );


// Mango Categories List
$product='';
vc_map ( array (
    "name" => __ ( "Mango Categories List", 'mango' ),
    "base" => "mango_categories_list",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Categories List Image", 'mango' ),
            "param_name" => "img_active",
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Title", 'mango' ),
            "param_name" => "heading"
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Sub Title", 'mango' ),
            "param_name" => "sub_title"
        ),


        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Big Title ", 'mango' ),
            "param_name" => "big_title"
        ),


        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Button Text", 'mango' ),
            "param_name" => "button_text",
            "description" => __ ( "Text on the button.", 'mango' )

        ),

        array (
            'type' => 'href',
            'heading' => __ ( 'URL (Link)', 'mango' ),
            'param_name' => 'button_link',
            'description' => __ ( 'Button link.', 'mango' )
        ),


        array (
            "type" => "number",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Number", 'mango' ),
            "param_name" => "number_cat",
            "value" => "2"
        ),


        array (
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Select Category", 'mango' ),
            "param_name" => "category_select",
            "value" => array (
                __ ( "Select category", "mango" ) => '',
                __ ( "Select Post category", "mango" ) => 'category',
                __ ( "Select Woocommerce Categories", "mango" ) => 'product_cat',
                __ ( "Select FAQ'S Categories", "mango" ) => 'faq-category',
            )
        ),
		
		
	    array(
        "type" => "dropdown",            
        "class" => "",
        "heading" => __("Woocommerce Parent Categories", "mango"),
        "param_name" => "woocommerce_parent_categories",
        "value" => $product,

        "dependency" => array(
         "element"=>"category_select",
         "value" => "product_cat"
        )
     ),
	 
	 	
	    array(
        "type" => "dropdown",            
        "class" => "",
        "heading" => __("Post Parent Categories", "mango"),
        "param_name" => "post_parent_categories",
        "value" => $post,

        "dependency" => array(
         "element"=>"category_select",
         "value" => "category"
        )
     ),
		
		
		 array(
        "type" => "dropdown",            
        "class" => "",
        "heading" => __("Faqs Parent Categories", "mango"),
        "param_name" => "faqs_parent_categories",
        "value" => $faq,

        "dependency" => array(
         "element"=>"category_select",
         "value" => "faq-category"
        )
     ),
    )
) );


// Mango Banner Vine
vc_map ( array (
    "name" => __ ( "Mango Banner Vine", 'mango' ),
    "base" => "mango_banner_vine",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Banner Image", 'mango' ),
            "param_name" => "img_active",
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Title", 'mango' ),
            "param_name" => "title"
        ),


        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Sub Title", 'mango' ),
            "param_name" => "sub_title"
        ),

        array (
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Description", 'mango' ),
            "param_name" => "description"
        ),


        array (
            "type" => "href",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Url (Link)", 'mango' ),
            "param_name" => "link"
        ),
    )
) );

// Mango discount Box

vc_map ( array (
    "name" => __ ( "Mango Discount Box", 'mango' ),
    "base" => "mango_discount_box",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
           "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Title", 'mango' ),
            "param_name" => "title"
        ),


        array (
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Title Color", 'mango' ),
            "param_name" => "title_color",
            "value" => array (
                __ ( "Theme Option", "mango" ) => '',
                __ ( "Select Color", "mango" ) => '',
                __ ( "Warning", "mango" ) => 'warning',
                __ ( "Primary", "mango" ) => 'primary',
                __ ( "Success", "mango" ) => 'success',
            )
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Sub Title", 'mango' ),
            "param_name" => "sub_title"
        ),

        array (
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Description", 'mango' ),
            "param_name" => "description"
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Badge Text", 'mango' ),
            "param_name" => "badge"
        ),

        array (
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Badge Color", 'mango' ),
            "param_name" => "badge_color",
            "value" => array (
                __ ( "Select Color", "mango" ) => '',
                __ ( "Yellow", "mango" ) => 'yellow',
                __ ( "Red", "mango" ) => 'red',
                __ ( "Blue", "mango" ) => 'blue',
            )
        ),
    )
) );

// Mango Category Box

vc_map ( array (
    "name" => __ ( "Mango Category Box", 'mango' ),
    "base" => "mango_category_box",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Category Box Image", 'mango' ),
            "param_name" => "img_active"
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Heading", 'mango' ),
            "param_name" => "heading"
        ),

        array (
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Description", 'mango' ),
            "param_name" => "description"
        ),


        array (
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Select Category", 'mango' ),
            "param_name" => "category_select",
            "value" => array (
                __ ( "Select category", "mango" ) => '',
                __ ( "Select Post category", "mango" ) => 'category',
                __ ( "Select Woocommerce Categories", "mango" ) => 'product_cat',
                __ ( "Select FAQ'S Categories", "mango" ) => 'faq-category',
            )
        ),


        array (
            "type" => "number",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Number", 'mango' ),
            "param_name" => "number_cat",
            "value" => "2"
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Badge Text", 'mango' ),
            "param_name" => "badge"
        ),


        array (
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Badge Color", 'mango' ),
            "param_name" => "badge_color",
            "value" => array (
                __ ( "Select Color", "mango" ) => '',
                __ ( "Yellow", "mango" ) => 'yellow',
                __ ( "Red", "mango" ) => 'red',
                __ ( "Blue", "mango" ) => 'blue',
            )
        ),
    )
) );


// Mango Vertical Category
vc_map ( array (
    "name" => __ ( "Mango Vertical Category ", 'mango' ),
    "base" => "mango_vertical_categories",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Vertical  Category  Image", 'mango' ),
            "param_name" => "img_active"
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Heading", 'mango' ),
            "param_name" => "heading"
        ),


        array (
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Select Category", 'mango' ),
            "param_name" => "category_select",
            "value" => array (
                __ ( "Select category", "mango" ) => '',
                __ ( "Select Post category", "mango" ) => 'category',
                __ ( "Select Woocommerce Categories", "mango" ) => 'product_cat',
                __ ( "Select FAQ'S Categories", "mango" ) => 'faq-category',
            )

        ),

        array (
            "type" => "number",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Number", 'mango' ),
            "param_name" => "number_cat",
            "value" => "2"
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Badge Text", 'mango' ),
            "param_name" => "badge"
        ),

        array (
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Badge Color", 'mango' ),
            "param_name" => "badge_color",
            "value" => array (
                __ ( "Select Color", "mango" ) => '',
                __ ( "Yellow", "mango" ) => 'yellow',
                __ ( "Red", "mango" ) => 'red',
                __ ( "Blue", "mango" ) => 'blue',
            )
        ),

    )
) );

// Mango Vertical Banner
vc_map ( array (
    "name" => __ ( "Mango Vertical Banner", 'mango' ),
    "base" => "mango_vertical_banner",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Mango Vertical Image", 'mango' ),
            "param_name" => "img_active"
        ),
        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Title", 'mango' ),
            "param_name" => "title"
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Sub Title", 'mango' ),
            "param_name" => "sub_title"
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Button Text", 'mango' ),
            "param_name" => "button_text",
            "description" => __ ( "Text on the button.", 'mango' )
        ),

        array (
            'type' => 'href',
            'heading' => __ ( 'URL (Link)', 'mango' ),
            'param_name' => 'button_link',
            'description' => __ ( 'Button link.', 'mango' )
        ),
    )
) );

// Mango Newsletter

vc_map ( array (
    "name" => __ ( "Mango Newsletter", 'mango' ),
    "base" => "mango_newsletter",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Heading", 'mango' ),
            "param_name" => "heading"
        ),

        array (
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Description", 'mango' ),
            "param_name" => "description",
        ),

        array (
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Select Form", 'mango' ),
            "param_name" => "select_form",
            "value" => array (
                __ ( "Select Form", "mango" ) => '',
                __ ( "Newletter", "mango" ) => 'newletter',
            )
        )
    )
) );


// Mango Store

vc_map ( array (
    "name" => __ ( "Mango Store", 'mango' ),
    "base" => "mango_store",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Background Image", 'mango' ),
            "param_name" => "img_active"
        ),


        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Heading", 'mango' ),
            "param_name" => "heading"
        ),

        array (
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Description", 'mango' ),
            "param_name" => "description",
        ),

        array (
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Select Form", 'mango' ),
            "param_name" => "select_form",
            "value" => array (
                __ ( "Select Form", "mango" ) => '',
                __ ( "Newletter", "mango" ) => 'newletter',
            )
        )
    )
) );

// Mango Login
vc_map ( array (
    "name" => __ ( "Mango Login", 'mango' ),
    "base" => "mango_login",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "textfield",
            "holder" => "div",
           "class" => "",
            "heading" => __ ( "Heading", 'mango' ),
            "param_name" => "heading"
        ),

        array (
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Description", 'mango' ),
            "param_name" => "description"
        ),


        array (
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Select Form", 'mango' ),
            "param_name" => "select_form",
            "value" => array (
                __ ( "Select Form", "mango" ) => '',
                __ ( "Login", "mango" ) => 'login',
            )
        ),
    )
) );

// Mango Registration
vc_map ( array (
    "name" => __ ( "Mango Registration Form", 'mango' ),
    "base" => "mango_registration",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Heading", 'mango' ),
            "param_name" => "heading"
        ),

        array (
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Description", 'mango' ),
            "param_name" => "description"
        ),

        array (
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Select Form", 'mango' ),
            "param_name" => "select_form",
            "value" => array (
                __ ( "Select Form", "mango" ) => '',
                __ ( "Registration", "mango" ) => 'registration',
            )
        ),
    )
) );


/// Mango Slider
vc_map ( array (
    "name" => __ ( "Mango Bootstrap Slider", "mango" ),
    "base" => "mango_bootstrap_slider",
    "category" => __ ( 'Mango', 'mango' ),
    "class" => "wpb_mango",
    "as_parent" => array ( 'only' => 'mango_add_bootstrap_slider' ),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array (
       array (
            'type' => 'textfield',
            'heading' => __ ( 'Extra class name', 'mango' ),
            'param_name' => 'el_class',
            'description' => __ ( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'mango' ),
        ),

        array (
           'type' => 'textfield',
            'heading' => __ ( 'Heading', 'mango' ),
           'param_name' => 'heading',
        ),
    ),
) );

vc_map ( array (
    "name" => __ ( "Add Slider", 'mango' ),
    "base" => "mango_add_bootstrap_slider",
    "content_element" => true,
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "as_child" => array ( 'only' => 'mango_bootstrap_slider' ),
    "params" => array (
        array (
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
           "heading" => __ ( "Slider Image", 'mango' ),
            "param_name" => "img_active"
        ),

        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Caption", 'mango' ),
            "param_name" => "caption"
        ),
    )
) );

// Mango Tooltips Button

vc_map ( array (
        "name" => __ ( "Mango Tooltips Button", "mango" ),
        "base" => "mango_tooltips_button",
        "class" => "wpb_mango",
        "category" => __ ( "Mango", "mango" ),
        "params" => array (
            array (
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __ ( "Button Text", 'mango' ),
                "param_name" => "button_text"
            ),

            array (
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => __ ( "Select Button", 'mango' ),
                "param_name" => "button_color",
                "value" => array (
                    __ ( "Button Black", "mango" ) => 'custom',
                    __ ( "Button Red", "mango" ) => 'custom2',
                )
            ),

            array (
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => __ ( "Data  Content", 'mango' ),
                "param_name" => "data_content"
            ),

            array (
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => __ ( "Button Placement", 'mango' ),
                "param_name" => "button_placement",
                "value" => array (
                    __ ( "Select One", "mango" ) => 'top',
                    __ ( "Top", "mango" ) => 'top',
                    __ ( "Left", "mango" ) => 'left',
                    __ ( "Bottom", "mango" ) => 'bottom',
                   __ ( "Right", "mango" ) => 'right',
                )
            ),
        )
    )
);

//Text Tooltip


vc_map ( array (

    "name" => __ ( "Mango Text Tooltip", 'mango' ),
    "base" => "mango_text_tooltip",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Content", 'mango' ),
            "param_name" => "tooldescription"
        ),

        array (
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Text for tooltip", 'mango' ),
            "param_name" => "toolbox",
            'description' => 'tooltipone,tooltip2'
        ),

        array (
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Select Position", 'mango' ),
            "param_name" => "select_tool_dir",
            "value" => array (
                __ ( "Select One", "mango" ) => 'top',
                __ ( "Top", "mango" ) => 'top',
                __ ( "Left", "mango" ) => 'left',
                __ ( "Bottom", "mango" ) => 'bottom',
                __ ( "Right", "mango" ) => 'right',
            )
        ),
    )
) );

//Mango Portfolio

$taxonomy = 'portfolio-category';
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


$all_categories = get_categories ( $args );
$portfolio = array ();

foreach ( $all_categories as $key => $value ) {
    $portfolio[ $value->name ] = $value->name;
}

vc_map ( array (
    "name" => __ ( "Mango Portfolio", 'mango' ),
    "base" => "mango_portfolio",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (

        array (
            "type" => "number",
            "holder" => "div",
           "class" => "",
            "heading" => __ ( "Number Of Portfolio Show", 'mango' ),
            "param_name" => "number",
            "value" => 1
        ),


        array (
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Categoriees ", 'mango' ),
            "param_name" => "portfolio_categories",
            "value" => $portfolio
        ),


        array (
            "type" => "checkbox",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Hide Title", 'mango' ),
            "param_name" => "hide_title",
            "value" => array (
                __ ( "YES", "mango" ) => 1,
            ),
        ),

        array (
            "type" => "checkbox",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Hide Category", 'mango' ),
            "param_name" => "hide_category",
            "value" => array (
                __ ( "YES", "mango" ) => 2,
            ),
        ),

        array (
            "type" => "checkbox",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Hide Description", 'mango' ),
            "param_name" => "hide_description",
            "value" => array (
                __ ( "YES", "mango" ) => 3,
            ),
        ),

        array (
            "type" => "checkbox",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Hide Read More Link", 'mango' ),
            "param_name" => "hide_link",
            "value" => array (
                __ ( "YES", "mango" ) => 4,
            ),
        ),

        array (
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Select Styles", 'mango' ),
            "param_name" => "style",
            "value" => array (
                __ ( "Select One", "mango" ) => '',
                __ ( "Style 1", "mango" ) => 'style1',
                __ ( "Style 2", "mango" ) => 'style2',
                __ ( "Style 3", "mango" ) => 'style3',
            )
        ),
    )
) );

// Mango Simple Category
vc_map ( array (
    "name" => __ ( "Mango Simple Category ", 'mango' ),
    "base" => "mango_single_categories",
    "class" => "wpb_mango",
    "category" => __ ( 'Mango', 'mango' ),
    "params" => array (
        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Heading", 'mango' ),
            "param_name" => "heading"
        ),

        array (
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Select Category", 'mango' ),
            "param_name" => "category_select",
            "value" => array (
                __ ( "Select One", "mango" ) => '',
                __ ( "Select Post category", "mango" ) => 'category',
                __ ( "Select Woocommerce Categories", "mango" ) => 'product_cat',
                __ ( "Select FAQ'S Categories", "mango" ) => 'faq-category',
            )
        ),

        array (
            "type" => "number",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Number", 'mango' ),
            "param_name" => "number_cat",
            "value" => "2"
        ),
    )
) );
// Mango Feature  Product
?>