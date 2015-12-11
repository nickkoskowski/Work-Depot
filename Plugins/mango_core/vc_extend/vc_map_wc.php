<?php
// Mango Woocommerce Categories
vc_map ( array (
    "name" => __ ( "Mango Woocommerce Categories", 'mango' ),
    "base" => "mango_woocommece_cat",
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
            "heading" => __ ( "Style", 'mango' ),
            "param_name" => "style",
            "value" => array (
                __ ( "Select Style", "mango" ) => '',
                __ ( "Style 1", "mango" ) => 'style1',
                __ ( "Style 2", "mango" ) => 'style2',
                __ ( "Style 3", "mango" ) => 'style3',
            )
        ),

        array (
            "type" => "number",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Mango Woocommerce Categories Numbers", 'mango' ),
            "param_name" => "number_cat",
            "value" => "2"
        ),
    )
) );

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

$all_categories = get_categories ( $args );
$product = array ();
foreach ( $all_categories as $key => $value ) {
	$product[0]="Select Categories";
    $product[ $value->name ] = $value->name;
}

// Mango Categoreies Product
vc_map ( array (

    "name" => __ ( "Mango Categoreies Product", "mango" ),
    "base" => "mango_categoreies_product",
    "class" => "wpb_mango",
    "category" => __ ( "Mango", "mango" ),
    "params" => array (
        array (
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Link Text", 'mango' ),
            "param_name" => "link_text"
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
            "heading" => __ ( "Categories", 'mango' ),
            "param_name" => "categories",
            "value" => $product
        ),
    )
) );

vc_map ( array (
    "name" => __ ( "Mango Products By Type", 'mango' ),
    "base" => "mango_feature_product",
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
            "type" => "number",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Number", 'mango' ),
            "param_name" => "number_cat",
            "value" => 3
        ),

        array (
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Select Product", 'mango' ),
            "param_name" => "product_select",
            "value" => array (
                __ ( "New Arrivals", "mango" ) => '',
                __ ( "Featured Product", "mango" ) => 'Featured',
                __ ( "Popular Product", "mango" ) => 'best_selling',
            )
        ),

        array (
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Select Categories", 'mango' ),
            "param_name" => "categories",
            "value" => $product
        ),

    )

) );


$product_categories_array = get_terms ( 'product_cat', array ( "fields" => 'id=>name' ) );
$product_categories = array_flip ( $product_categories_array );
$all_products = array ();
$args = array (
    'post_type' => "product",
    'post_status' => 'publish',
    'posts_per_page' => - 1,
);

$my_query = null;
$my_query = new WP_Query( $args );
if ( $my_query->have_posts () ) {
    while ( $my_query->have_posts () ) : $my_query->the_post ();
        $all_products[ get_the_title () ] = get_the_ID ();
    endwhile;
}
wp_reset_query ();

vc_map ( array (
        "name" => __ ( "Mango Products List/Grid", 'mango' ),
        "base" => "mango_products_list_grid",
        "class" => "wpb_mango",
        "category" => __ ( 'Mango', 'mango' ),
        "controls" => "full",
        "params" => array (
            array (
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => __ ( "Select Grid/List Style", 'mango' ),
                "param_name" => "products_view_type",
                "value" => array (
                    __ ( "Default", 'mango' ) => '',
                    __ ( "Grid Style 1", 'mango' ) => "v_1",
                    __ ( "Grid Style 2", 'mango' ) => "v_2",
                    __ ( "Grid Style 3", 'mango' ) => "v_3",
                    __ ( "Grid Style 4", 'mango' ) => "v_4",
                    __ ( "List", 'mango' ) => "list",
                    __ ( "List Right Aligned", 'mango' ) => "list_right",
                ),
            ),

            array (
                "type" => "checkbox",
                "holder" => "div",
                "class" => "",
                "heading" => __ ( "Use Isotopes", 'mango' ),
                "param_name" => "isotope_style",
                "value" => array (
                    'isotopes' => __ ( 'Yes', 'mango' ),
                ),

                "dependency" => array ( 'element' => 'products_view_type', 'value' => array ( 'v_4' ) )
            ),
            array (
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => __ ( "Columns", 'mango' ),
                "param_name" => "columns",
                "value" => array (
                    1 => 1,
                    2 => 2,
                    3 => 3,
                    4 => 4,
                    5 => 5,
                    6 => 6
                ),
            ),

            array (
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => __ ( "Products By:", 'mango' ),
                "param_name" => "products_scenario",
                "value" => array (
                    __ ( 'Filter Products', 'mango' ) => '2',
                    __ ( "Select Specific Products", 'mango' ) => '1'
                ),

            ),

            array (
                "type" => "number",
                "holder" => "div",
                "class" => "",
                "heading" => __ ( "Items Per Page", 'mango' ),
                "param_name" => "items_per_page",
                'value' => '12',
                "dependency" => array ( 'element' => 'products_scenario', 'value' => array ( '2' ) )
            ),

            array (
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => __ ( "Order By", 'mango' ),
                "param_name" => "order_by",
                "value" => array (
                    __ ( 'Latest Products', 'mango' ) => 'recent_products',
                    __ ( 'Top Rated Products', 'mango' ) => 'top_rated_products',
                    __ ( 'Best Selling Products', 'mango' ) => 'best_selling_products',
                    __ ( 'Featured Products', 'mango' ) => 'featured_products',
                    __ ( "Products On Sale", 'mango' ) => 'sale_products',
                    __ ( "Random Products", 'mango' ) => 'rand',
                ),
                "dependency" => array ( 'element' => 'products_scenario', 'value' => array ( '2' ) )
            ),

            array (
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => __ ( "Order", 'mango' ),
                "param_name" => "order",
                "value" => array (
                    __ ( "Descending", 'mango' ) => 'desc',
                    __ ( "Ascending", 'mango' ) => 'asc',
                ),
            ),

            array (
                "type" => "checkbox",
                "holder" => "div",
                "class" => "",
                "heading" => __ ( "Filter By product Categories", 'mango' ),
                "param_name" => "product_categories",
                "value" => $product_categories,
                "dependency" => array ( 'element' => 'order_by', 'value' => array ( 'rand', 'recent_products' ) )
            ),

            array (
                "type" => "checkbox",
                "holder" => "div",
                "class" => "",
                "heading" => __ ( "Select Products To Display", 'mango' ),
                "param_name" => "selected_products",
                "value" => $all_products,
                "dependency" => array ( 'element' => 'products_scenario', 'value' => array ( '1' ) )
            ),
        )
    )
);





vc_map ( array (
        "name" => __ ( "Mango Products Item Grid", 'mango' ),
        "base" => "mango_pro_item_grid",
        "class" => "wpb_mango",
        "category" => __ ( 'Mango', 'mango' ),
        "controls" => "full",
        "params" => array (
      
            array (
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => __ ( "Item Thumbnail Size", 'mango' ),
                "param_name" => "columns",
                "value" => array (
					'Small' => 12,
                    'Medium' => 10,
                    'Large' => 8,
                    'Extra-Large' => 5,
                ),
            ),
			array (
                "type" => "checkbox",
                "holder" => "div",
                "class" => "",
                "heading" => __ ( "Filter By product Categories", 'mango' ),
                "param_name" => "pro_cat",
                "value" => $product
                
            ),		
			
			
        array (
            "type" => "number",
            "holder" => "div",
            "class" => "",
            "heading" => __ ( "Product Show Numbers", 'mango' ),
            "param_name" => "show_pro",
            "value" => 36
        ),
        )
    )
);

?>