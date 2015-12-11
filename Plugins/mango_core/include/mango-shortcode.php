<?php
add_action ( 'vc_before_init', 'mango_integrateWithVC' );
function mango_integrateWithVC () {
    /***********============= Alert Boxes Setting =============***********/
    $attributes = array (
        'type' => 'checkbox',
        'heading' => "Dismissable Alert Boxes",
        'param_name' => 'dismissable',
        'value' => array ( "" => 'yes' ),
        'weight' => 0, //  default 0 - unsorted and appended to bottom, 1 - appended to top
    );
	
    vc_add_param ( 'vc_message', $attributes );
    $attributes = array (
        'type' => 'checkbox',
        'heading' => "Close Button",
        'param_name' => 'closebtn',
        'value' => array ( "" => 'yes' ),
        'weight' => 0, //  default 0 - unsorted and appended to bottom, 1 - appended to top
    );
	
    vc_add_param ( 'vc_message', $attributes );
    $settings = array (
        'name' => __ ( 'Alert Boxes', 'mango' ),
		"class" => "wpb_mango",
        'category' => __ ( 'Mango', 'mango' )
    );
    vc_map_update ( 'vc_message', $settings ); // Note: 'vc_message' was used as a base for "Message box" element
    /***********============= Alert Boxes Setting =============***********/
    /***********============= Accordion Setting =============***********/
    $attributes = array (
        'type' => 'textfield',
        'heading' => "Label Text",
        'param_name' => 'labeltxt',
        'value' => 'new',
        'description' => 'if not needed leave blank',
        'weight' => 0, //  default 0 - unsorted and appended to bottom, 1 - appended to top
    );
    vc_add_param ( 'vc_accordion_tab', $attributes );
    $attributes = array (
        'type' => 'dropdown',
        'heading' => "Label Type",
        'param_name' => 'labeltyp',
        'value' => array ( 'select', 'new', 'popular' ),
        'weight' => 0, //  default 0 - unsorted and appended to bottom, 1 - appended to top
    );
    vc_add_param ( 'vc_accordion_tab', $attributes );
    /***********============= Accordion Setting =============***********/
    /***********============= Tabs Setting =============***********/
    vc_remove_param ( "vc_tabs", "el_class" );
    vc_remove_param ( "vc_tabs", "interval" );
    $attributes = array (
        'type' => 'dropdown',
        'heading' => "Tabs position",
        'param_name' => 'tabposition',
        'value' => array ( 'Top', 'Bottom', 'Left', 'Right' ),
        'weight' => 0, //  default 0 - unsorted and appended to bottom, 1 - appended to top
    );
	
    vc_add_param ( 'vc_tabs', $attributes );
    $attributes = array (
        'type' => 'dropdown',
        'heading' => "Tab Style",
        'param_name' => 'tabstyle',
		'value' => array ( 'Simple Tabs', 'Simple Justified Tabs', 'Animated Tabs', 'Animated Center Tabs','Animated Dark Tabs' ),
        'weight' => 0, //  default 0 - unsorted and appended to bottom, 1 - appended to top
    );
    vc_add_param ( 'vc_tabs', $attributes );
    /***********============= Tabs Setting =============***********/
    /***********============= Animation Setting =============***********/
    vc_remove_param ( "vc_single_image", "title" );
    vc_remove_param ( "vc_single_image", "css_animation" );
    $settings = array (
        'name' => __ ( 'Mango Image', 'mango' ),
		"class" => "wpb_mango", 
        'category' => __ ( 'Mango', 'mango' )
    );
    vc_map_update ( 'vc_single_image', $settings );
    $attributes = array (
        'type' => 'textfield',
        'heading' => "Title",
        'param_name' => 'title',
        'value' => '',
        'weight' => 1, //  default 0 - unsorted and appended to bottom, 1 - appended to top
    );
    vc_add_param ( 'vc_single_image', $attributes );
    $attributes = array (
        'type' => 'dropdown',
        'heading' => "Animation Type",
        'param_name' => 'img_eff',
        'value' => array ( 'none', 'slideInDown', 'slideInUp', 'bounce', 'flash', 'fadeInDown', 'fadeInUp', 'fadeInRight', 'fadeInLeft', 'pulse', 'rubberBand', 'shake', 'rotateInDownRight', 'swing', 'tada', 'wobble', 'rotateInDownLeft', 'bounceIn', 'bounceInDown', 'bounceInLeft', 'bounceInRight', 'bounceInUp', 'bounceOut', 'bounceOutDown', 'bounceOutLeft', 'bounceOutRight', 'bounceOutUp', 'fadeIn', 'fadeInDown', 'fadeInDownBig', 'fadeInLeft', 'fadeInLeftBig', 'fadeInRight', 'fadeInUp', 'fadeInRightBig', 'fadeInUpBig', 'fadeOut', 'fadeOutDown', 'fadeOutDownBig', 'fadeOutLeft', 'fadeOutRight', 'fadeOutLeftBig', 'fadeOutRightBig', 'fadeOutUp', 'fadeOutUpBig', 'flip', 'flipInX', 'flipInY', 'flipOutX', 'flipOutY', 'lightSpeedIn', 'lightSpeedOut', 'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight', 'rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight', 'slideInLeft', 'slideInRight', 'slideOutLeft', 'slideOutRight', 'slideOutUp', 'hinge', 'rollIn', 'rollOut' ),
        'weight' => 0, //  default 0 - unsorted and appended to bottom, 1 - appended to top
    );
    vc_add_param ( 'vc_single_image', $attributes );
    $attributes = array (
        'type' => 'dropdown',
        'heading' => "Set Delay",
        'param_name' => 'img_delay',
        'value' => array ( 'none', '0.1s', '0.2s', '0.3s', '0.4s', '0.5s', '0.6s', '0.7s', '0.8s', '0.9s', '1.2s', '1.5s', '1s', '1.4s' ),
        'weight' => 0, //  default 0 - unsorted and appended to bottom, 1 - appended to top
    );
    vc_add_param ( 'vc_single_image', $attributes );
    /***********============= Animation Setting =============***********/
    /***********============= Button Setting =============***********/
    vc_remove_param ( "vc_button", "color" );
    vc_remove_param ( "vc_button", "size" );
    vc_remove_param ( "vc_button", "icon" );
    vc_remove_param ( "vc_button", "el_class" );
    $settings = array (
        'name' => __ ( 'Mango Button', 'mango' ),
		"class" => "wpb_mango",
        'category' => __ ( 'Mango', 'mango' )
    );
    vc_map_update ( 'vc_button', $settings );
    $attributes = array (
        'type' => 'dropdown',
        'heading' => "Button Block/Justified",
        'param_name' => 'btn_block_just',
        'value' => array ( 'Simple', 'Block', 'Justified', 'Button Groups' ),
        'weight' => 0, //  default 0 - unsorted and appended to bottom, 1 - appended to top
    );
    vc_add_param ( 'vc_button', $attributes );
    $attributes = array (
        'type' => 'checkbox',
        'heading' => "Create Groups",
        'dependency' => array ( 'element' => 'btn_block_just', 'value' => array ( 'Button Groups', 'Justified' ) ),
        'param_name' => 'btn_group',
        'value' => array ( 'default' => 'default', 'primary' => 'primary', 'success' => 'success', 'warning' => 'warning', 'info' => 'info', 'danger' => 'danger', 'custom' => 'custom', 'custom2' => 'custom2' ),
        'description' => 'please give "Text on the button" with comma(,)',
        'weight' => 0, //  default 0 - unsorted and appended to bottom, 1 - appended to top
    );
    vc_add_param ( 'vc_button', $attributes );
    $attributes = array (
        'type' => 'dropdown',
        'heading' => "Button Type",
        'dependency' => array ( 'element' => 'btn_block_just', 'value' => array ( 'Simple', 'Block' ) ),
        'param_name' => 'btn_type',
        'value' => array ( 'default', 'primary', 'success', 'warning', 'info', 'danger', 'custom', 'custom2' ),
        'weight' => 0, //  default 0 - unsorted and appended to bottom, 1 - appended to top
    );
    vc_add_param ( 'vc_button', $attributes );
    $attributes = array (
        'type' => 'dropdown',
        'heading' => "Size",
        'param_name' => 'btn_size',
        'value' => array ( 'regular', 'large', 'small', 'mini' ),
        'weight' => 0, //  default 0 - unsorted and appended to bottom, 1 - appended to top
    );
    vc_add_param ( 'vc_button', $attributes );
    $attributes = array (
        'type' => 'checkbox',
        'heading' => "Border",
        'param_name' => 'btn_border',
        'value' => array ( "" => 'yes' ),
        'weight' => 0, //  default 0 - unsorted and appended to bottom, 1 - appended to top
    );
    vc_add_param ( 'vc_button', $attributes );
    $attributes = array (
        'type' => 'dropdown',
        'heading' => "Button Layout",
        'param_name' => 'btn_layout',
        'value' => array ( 'Square', 'Large Radius', 'Larger Radius' ),
        'weight' => 0, //  default 0 - unsorted and appended to bottom, 1 - appended to top
    );
    vc_add_param ( 'vc_button', $attributes );
    $attributes = array (
        'type' => 'dropdown',
        'heading' => "Button Disable/Enable",
        'param_name' => 'btn_dis_ena',
        'value' => array ( 'Enable', 'Disable' ),
        'weight' => 0, //  default 0 - unsorted and appended to bottom, 1 - appended to top
    );
    vc_add_param ( 'vc_button', $attributes );
    $attributes = array (
        'type' => 'dropdown',
        'heading' => "Use",
        'param_name' => 'btn_use',
        'value' => array ( 'anchor', 'Button' ),
        'weight' => 0, //  default 0 - unsorted and appended to bottom, 1 - appended to top
    );
    vc_add_param ( 'vc_button', $attributes );
    /***********============= Button Setting =============***********/
    /***********============= Progressbars Setting =============***********/
    $settings = array (
        'name' => __ ( 'Mango Progressbars', 'mango' ),
		"class" => "wpb_mango",
        'category' => __ ( 'Mango', 'mango' ),
        "params" => array (
            array (
                "type" => "textfield",
                "holder" => "div",
                "heading" => __ ( "Title", "mango" ),
                "param_name" => "title",
                "value" => '',
                "description" => 'Enter text which will be used as widget title. Leave blank if no title is needed.'
            ),
            array (
                "type" => "textarea",
                "holder" => "div",
                "heading" => __ ( "Graphic values", "mango" ),
                "param_name" => "values",
                "value" => '',
                "description" => 'Input graph values, titles and put bar color ("custom","custom2","custom3","primary","success","warning","info","danger","dark","gray") Here. Divide values with linebreaks (Enter). Example: 90|Development| custom'
            ),
            array (
                'type' => 'dropdown',
                'heading' => "Bar size",
                'param_name' => 'bar_size',
                'value' => array ( 'Large', 'Normal', 'small', 'mini' )
            ),
            array (
                'type' => 'checkbox',
                'heading' => "Option",
                'param_name' => 'option',
                'value' => array ( 'Add striped' => 'striped', 'Add Tooltip' => 'tooltip', 'Add Animated' => 'Animated' )
            ),
            array (
                'type' => 'dropdown',
                'heading' => "Show Percentage",
                'param_name' => 'show_per',
                'value' => array ( 'Show', 'Hide' )
            )
        )
    );
    vc_map_update ( 'vc_progress_bar', $settings );
    // List Group
    $settings = array (
        "name" => __ ( "List Groups", "mango" ),
        "base" => "mango_list_group",
        "as_parent" => array ( 'only' => 'mango_list_group_child_withul,mango_list_group_child_withoutul' ), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
        "show_settings_on_create" => false,		'category' => __ ( 'Mango', 'mango' ),
        "params" => array (
            // add params same as with any other content element
            array (
                "type" => "textfield",
                "heading" => __ ( "Point", "mango" ),
                "param_name" => "point",
                "value" => ""
            ),
            array (
                "type" => "dropdown",
                "heading" => __ ( "Color value", "mango" ),
                "param_name" => "color",
                "value" => array ( 'none', 'success', 'warning', 'info', 'danger' )
            ),
            array (
                "type" => "textfield",
                "heading" => __ ( "Number", "mango" ),
                "param_name" => "number",
                "value" => "",
                "description" => "if not required leave blank"
            )
        ),
        "js_view" => 'VcColumnView'
    );
    vc_map ( $settings );
    $settings = array (
        "name" => __ ( "Add Point", "mango" ),
        "base" => "mango_list_group_child_withul",
        "content_element" => true,
        "as_child" => array ( 'only' => 'mango_list_group' ), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array (
            // add params same as with any other content element
            array (
                "type" => "textfield",
                "heading" => __ ( "Point", "mango" ),
                "param_name" => "point",
                "value" => ""
            ),
            array (
                "type" => "dropdown",
                "heading" => __ ( "Color value", "mango" ),
                "param_name" => "color",
                "value" => array ( 'none', 'default', 'primary', 'success', 'warning', 'info', 'danger' )
            ),
            array (
                "type" => "textfield",
                "heading" => __ ( "Number", "mango" ),
                "param_name" => "number",
                "value" => "",
                "description" => "if not required leave blank"
            )
        )
    );
    vc_map ( $settings );
    if ( class_exists ( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_mango_list_group extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists ( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_mango_list_group_child_withul extends WPBakeryShortCode {
        }
    }
    if ( class_exists ( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_mango_list_group_child_withoutul extends WPBakeryShortCode {
        }
    }
    $settings = array (
        "name" => __ ( "Add Point (Witout Ul element)", "mango" ),
        "base" => "mango_list_group_child_withoutul",
        "content_element" => true,
        "as_child" => array ( 'only' => 'mango_list_group' ), 
        "params" => array (
            
            array (
                "type" => "textfield",
                "heading" => __ ( "Point", "mango" ),
                "param_name" => "point",
                "value" => ""
            ),
            array (
                "type" => "textfield",
                "heading" => __ ( "Heading", "mango" ),
                "param_name" => "heading",
                "value" => ""
            ),
            array (
                "type" => "textarea",
                "heading" => __ ( "Description", "mango" ),
                "param_name" => "description",
                "value" => ""
            ),
            array (
                "type" => "checkbox",
                "heading" => __ ( "Active", "mango" ),
                "param_name" => "act",
                "value" => array ( '' => 'yes' )
            ),
            array (
                "type" => "textfield",
                "heading" => __ ( "Url", "mango" ),
                "param_name" => "url",
                "value" => ""
            )
        )
    );
    vc_map ( $settings );
    /************ button dropdown ***************/
    $settings = array (
        'name' => __ ( 'Mango Dropdown Button', 'mango' ),
        'base' => 'mango_vc_button',
        "as_parent" => array ( 'only' => 'mango_dropdown_button' ), 
        "content_element" => true,
        "show_settings_on_create" => true,		'category' => __ ( 'Mango', 'mango' ),
        "params" => array (
            array (
                "type" => "textfield",
                "holder" => "div",
                "heading" => __ ( "Text on the button", "mango" ),
                "param_name" => "title",
                "value" => ''
            ),
            array (
                'type' => 'dropdown',
                'heading' => "Button Type",
                'param_name' => 'btn_type',
                'value' => array ( 'default', 'primary', 'success', 'warning', 'info', 'danger', 'custom', 'custom2', 'custom3' )
            ),
            array (
                "type" => "checkbox",
                "holder" => "div",
                "heading" => __ ( "dropdown-toggle on text", "mango" ),
                "param_name" => "toggletxt",
                "value" => array ( '' => 'yes' )
            )
        ),
        "js_view" => 'VcColumnView'
    );
    vc_map ( $settings );
    if ( class_exists ( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_mango_vc_button extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists ( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_mango_dropdown_button extends WPBakeryShortCode {
        }
    }
    $settings = array (
        "name" => __ ( "Add Button Text and Link", "mango" ),
        "base" => "mango_dropdown_button",
        "content_element" => true,
        "as_child" => array ( 'only' => 'mango_vc_button' ),
        "params" => array (
         
            array (
                "type" => "textfield",
                "heading" => __ ( "Button Text", "mango" ),
                "param_name" => "btn_txt",
                "value" => ""
            ),
            array (
                "type" => "checkbox",
                "heading" => __ ( "Keep disable", "mango" ),
                "param_name" => "disable_txt",
                "value" => array ( '' => 'yes' )
            ),
            array (
                "type" => "textfield",
                "heading" => __ ( "Url", "mango" ),
                "param_name" => "url",
                "value" => ""
            )
        )
    );
    vc_map ( $settings );
    /************ button dropdown ***************/
    // List
    $settings = array (
        'name' => __ ( 'Mango List', 'mango' ),
        'category' => __ ( 'Mango', 'mango' ),
        "base" => "mango_list",
        "class" => "wpb_mango",
        "params" => array (
            array (
                "type" => "textfield",
                "holder" => "div",
                "heading" => __ ( "Title", "mango" ),
                "param_name" => "title",
                "value" => '',
                "description" => 'Enter text which will be used as widget title. Leave blank if no title is needed.'
            ),
            array (
                'type' => 'dropdown',
                'heading' => "List Type",
                'param_name' => 'list_typ',
                'value' => array ( 'Disc', 'Square', 'Circle', 'Decimal', 'Lower Alpha', 'Upper alpha', 'Lower Roman', 'Upper Roman' )
            ),
            array (
                "type" => "textarea",
                "holder" => "div",
                "heading" => __ ( "Point", "mango" ),
                "param_name" => "point_list",
                "value" => '',
                "description" => 'Input values Here. Divide values with linebreaks. Example: List1 | List2 | List3'
            )
        )
    );
    vc_map ( $settings );
    // Progressbars
    $settings = array (
        'name' => __ ( 'Mango Circle Progressbars', 'mango' ),
        'category' => __ ( 'Mango', 'mango' ),
        "base" => "Circle_progress_bar",
        "class" => "wpb_mango",
        "params" => array (
            array (
                "type" => "textfield",
                "holder" => "div",
                "heading" => __ ( "Title", "mango" ),
                "param_name" => "title",
                "value" => '',
                "description" => 'Enter text which will be used as widget title. Leave blank if no title is needed.'
            ),
            array (
                "type" => "textarea",
                "holder" => "div",
                "heading" => __ ( "Graphic values", "mango" ),
                "param_name" => "values",
                "value" => '',
                "description" => 'Input graph values, titles and put bar color Here. Divide values with linebreaks (Enter). Example: 90|Development| #2e2e2e'
            ),
            array (
                'type' => 'textfield',
                'heading' => "Circle Thickness",
                'param_name' => 'cir_thi',
                'value' => '',
                'description' => 'example : .1'
            ),
            array (
                'type' => 'textfield',
                'heading' => "Circle Size",
                'param_name' => 'size',
                'value' => '150'
            ),
            array (
                'type' => 'dropdown',
                'heading' => "Title Position",
                'param_name' => 'title_pos',
                'value' => array ( 'Top', 'Bottom' )
            ),
            array (
                'type' => 'checkbox',
                'heading' => "Add Animated",
                'param_name' => 'options',
                'value' => array ( '' => 'animated' )
            )
        )
    );
    vc_map ( $settings );
    // Blockquote
    $settings = array (
        'name' => __ ( 'Mango Blockquote', 'mango' ),
        'category' => __ ( 'Mango', 'mango' ),
        "base" => "mango_blockquote",
        "class" => "wpb_mango",
        "params" => array (
            array (
                "type" => "textfield",
                "holder" => "div",
                "heading" => __ ( "Title", "mango" ),
                "param_name" => "title",
                "value" => '',
                "description" => 'Enter text which will be used as widget title. Leave blank if no title is needed.'
            ),
            array (
                "type" => "textarea",
                "holder" => "div",
                "heading" => __ ( "Description", "mango" ),
                "param_name" => "desc_val",
                "value" => '',
            ),
            array (
                'type' => 'dropdown',
                'heading' => "Choose Type",
                'param_name' => 'ch_ty',
                'value' => array ( 'blockquote', 'blockquote reverse', 'blockquote icon', 'blockquote icon reverse' )
            )
        )
    );
    vc_map ( $settings );
    /*************** Media Setting ***************/
    $settings = array (
        'name' => __ ( 'Mango Media', 'mango' ),
        'category' => __ ( 'Mango', 'mango' ),
        "base" => "mango_media",
        "class" => "wpb_mango",
        "params" => array (
            array (
                "type" => "textfield",
                "holder" => "div",
                "heading" => __ ( "Title", "mango" ),
                "param_name" => "title",
                "value" => '',
                "description" => 'Enter text which will be used as widget title. Leave blank if no title is needed.'
            ),
            array (
                'type' => 'dropdown',
                'heading' => "Select Media",
                'param_name' => 'media_type',
                'value' => array ( 'Local Video', 'Local Audio' )
            ),
            array (
                'type' => 'textfield',
                'heading' => "Video Link",
                'param_name' => 'link_v',
                'value' => '',
                'dependency' => array ( 'element' => 'media_type', 'value' => array ( 'Local Video' ) ),
                'description' => 'IE, Chrome & Safari support MP4 format, while Firefox & Opera prefer WebM / Ogg formats. You can upload the video through <a href="http://kamleshyadav.com/wp-developer/mango/wp-admin/media-new.php" target="_blank">WordPress Media Library</a>.'
            ),
            array (
                'type' => 'textfield',
                'heading' => "Audio Link",
                'param_name' => 'link_a',
                'value' => '',
                'dependency' => array ( 'element' => 'media_type', 'value' => array ( 'Local Audio' ) ),
                'description' => '<a href="http://kamleshyadav.com/wp-developer/mango/wp-admin/media-new.php" target="_blank">WordPress Media Library</a>'
            )
        )
    );
    vc_map ( $settings );
    /*************** Media Setting ***************/
}
function Circle_progress_bar_func ( $atts ) {
    extract ( shortcode_atts ( array (
        'title' => '',
        'values' => '',
        'cir_thi' => '',
        'size' => '',
        'title_pos' => 'Top',
        'options' => '',
    ), $atts ) );
    $results = '';
	$max_value = 0.0;
    if ( !empty( $title ) )
        $results .= '<h2 class="md-margin">' . $title . '</small></h2>';
    $graph_lines = explode ( ",", $values );
    $graph_lines_data = array ();
    foreach ( $graph_lines as $line ) {
        $new_line = array ();
        $color_index = 2;
        $data = explode ( "|", $line );
        $new_line[ 'value' ] = isset( $data[ 0 ] ) ? $data[ 0 ] : 0;
        $new_line[ 'percentage_value' ] = isset( $data[ 1 ] ) && preg_match ( '/^\d{1,2}\%$/', $data[ 1 ] ) ? (float)str_replace ( '%', '', $data[ 1 ] ) : false;
        if ( $new_line[ 'percentage_value' ] != false ) {
            $color_index += 1;
            $new_line[ 'label' ] = isset( $data[ 2 ] ) ? $data[ 2 ] : '';
        } else {
            $new_line[ 'label' ] = isset( $data[ 1 ] ) ? $data[ 1 ] : '';
        }
        $new_line[ 'color' ] = ( isset( $data[ $color_index ] ) ) ? $data[ $color_index ] : $custombgcolor;
        if ( $new_line[ 'percentage_value' ] === false && $max_value < (float)$new_line[ 'value' ] ) {
            $max_value = $new_line[ 'value' ];
        }
        $graph_lines_data[ ] = $new_line;
    }
    foreach ( $graph_lines_data as $line ) {
        $results .= '<div class="circle-progress-container">';
        if ( $title_pos == 'Top' )
            $results .= '<h4 class="progress-title text-uppercase">' . esc_attr ( $line[ 'label' ] ) . '</h4>';
        if ( $options == 'animated' )
            $cls = 'progress-animate';
        $results .= '<div class="circle-progress ' . esc_attr ( $cls ) . '">
			<input type="text" class="knob" data-width="' . esc_attr ( $size ) . '"  data-height="' . esc_attr ( $size ) . '" data-readOnly="true" data-fgColor="' . $line[ 'color' ] . '" data-animateto="' . strip_tags ( $line[ 'value' ] ) . '" data-thickness="' . esc_attr ( $cir_thi ) . '">
		</div><!-- End .circle-progress -->';
        if ( $title_pos == 'Bottom' )
            $results .= '<h4 class="progress-title text-uppercase">' . esc_attr ( $line[ 'label' ] ) . '</h4>';
        $results .= '</div><!-- End .circle-progress-container -->';
    }
    return $results;
}
add_shortcode ( 'Circle_progress_bar', 'Circle_progress_bar_func' );
/***********============= Progressbars Setting =============***********/
/***********============= List Setting =============***********/
function mango_list_func ( $atts ) {
    extract ( shortcode_atts ( array (
        'title' => '',
        'list_typ' => '',
        'point_list' => ''
    ), $atts ) );
    $results = $cls = '';
    $results .= '<strong>' . esc_attr ( $title ) . '</strong><div class="xs-margin"></div>';
    $point_list = explode ( "|", $point_list );
    $results .= '<ul class="list-style list-' . sanitize_title ( $list_typ ) . '">';
    for ( $i = 0; $i < count ( $point_list ); $i ++ ) {
        $results .= '<li>' . esc_attr ( trim ( strip_tags ( $point_list[ $i ] ) ) ) . '</li>';
    }
    $results .= '</ul>';
    return $results;
}
add_shortcode ( 'mango_list', 'mango_list_func' );
// List Group
function mango_list_group_func ( $atts, $content = null ) {
    extract ( shortcode_atts ( array (
        'point' => '',
        'color' => '',
        'number' => ''
    ), $atts ) );
    $results = '';
    if ( has_shortcode ( $content, 'mango_list_group_child_withul' ) ) {
        $results .= '<ul class="list-group">';
        $results .= do_shortcode ( $content );
        $results .= "</ul>";
    } elseif ( has_shortcode ( $content, 'mango_list_group_child_withoutul' ) ) {
        $results .= '<div class="list-group">';
        $results .= do_shortcode ( $content );
        $results .= "</div>";
    }
    return $results;
}
add_shortcode ( 'mango_list_group', 'mango_list_group_func' );
function mango_list_group_child_withul_func ( $atts, $content ) {
    extract ( shortcode_atts ( array (
        'point' => '',
        'color' => '',
        'number' => ''
    ), $atts ) );
    $results = '';
    if ( $color == 'none' )
        $results .= '<li class="list-group-item">';
    else
        $results .= '<li class="list-group-item list-group-item-' . esc_attr ( $color ) . '">';
    if ( !empty( $number ) )
        $results .= '<span class="badge">' . esc_attr ( $number ) . '</span>';
    $results .= esc_attr ( $point );
    $results .= '</li>';
    return $results;
}
add_shortcode ( 'mango_list_group_child_withul', 'mango_list_group_child_withul_func' );
function mango_list_group_child_withoutul_func ( $atts, $content ) {
    extract ( shortcode_atts ( array (
        'point' => '',
        'heading' => '',
        'description' => '',
        'act' => '',
        'url' => ''
    ), $atts ) );
    $results = $cls = '';
    if ( $act )
        $cls = 'active';
    $results .= '<a href="' . esc_url ( $url ) . '" class="list-group-item ' . esc_attr ( $cls ) . '">';
    if ( !empty( $point ) )
        $results .= esc_attr ( $point );
    if ( !empty( $heading ) )
        $results .= '<h5 class="list-group-item-heading">' . esc_attr ( $heading ) . '</h5>';
    if ( !empty( $description ) )
        $results .= '<p class="list-group-item-text">' . esc_attr ( $description ) . '</p>';
    $results .= '</a>';
    return $results;
}
add_shortcode ( 'mango_list_group_child_withoutul', 'mango_list_group_child_withoutul_func' );
/***********============= List Setting =============***********/
/***********============= blockquote Setting =============***********/
function mango_blockquote_func ( $atts ) {
    extract ( shortcode_atts ( array (
        'title' => '',
        'desc_val' => '',
        'ch_ty' => ''
    ), $atts ) );
    $results = '';
    if ( $ch_ty == 'blockquote icon reverse' ) {
        $results .= '<blockquote class="blockquote-reverse blockquote-icon">';
    } else {
        $results .= '<blockquote class="' . sanitize_title ( $ch_ty ) . '">';
    }
    $results .= '<p>' . esc_attr ( $desc_val ) . '</p>';
    if ( $ch_ty == 'blockquote icon reverse' || $ch_ty == 'blockquote reverse' )
        $results .= '<cite>' . esc_attr ( $title ) . '--</cite>';
    else
        $results .= '<cite>--' . esc_attr ( $title ) . '</cite>';
    $results .= '</blockquote>';
    return $results;
}
add_shortcode ( 'mango_blockquote', 'mango_blockquote_func' );
/***********============= blockquote Setting =============***********/
/***********============= button dropdown =============***********/
function mango_vc_button_func ( $atts, $content = null ) {
    extract ( shortcode_atts ( array (
        'title' => __ ( 'Text on the button', "mango" ),
        'btn_type' => '',
        'toggletxt' => 'yes'
    ), $atts ) );
    $results = '';
    $results = '<div class="btn-group">';
    if ( $toggletxt == 'yes' ) {
        $results .= '<button type="button" class="btn btn-' . esc_attr ( $btn_type ) . ' dropdown-toggle" data-toggle="dropdown">' . esc_attr ( $title ) . '<span class="caret"></span></button>';
    } else {
        $results .= '<button type="button" class="btn btn-' . esc_attr ( $btn_type ) . '">' . esc_attr ( $title ) . '</button><button type="button" class="btn btn-' . esc_attr ( $btn_type ) . ' dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>';
    }
    $results .= '<ul class="dropdown-menu pull-right" role="menu">';
    $results .= do_shortcode ( $content );
    $results .= '</ul></div>';
    return $results;
}
add_shortcode ( 'mango_vc_button', 'mango_vc_button_func' );
function mango_dropdown_button_func ( $atts, $content = null ) {
    extract ( shortcode_atts ( array (
        'btn_txt' => '',
        'disable_txt' => '',
        'url' => ''
    ), $atts ) );
    $results = '';
    if ( $disable_txt )
        $results .= '<li class="disabled"><a href="' . esc_url ( $url ) . '" >' . esc_attr ( $btn_txt ) . '</a></li>';
    else
        $results .= '<li><a href="' . esc_url ( $url ) . '" >' . esc_attr ( $btn_txt ) . '</a></li>';
    return $results;
}
add_shortcode ( 'mango_dropdown_button', 'mango_dropdown_button_func' );
/***********============= button dropdown =============***********/
/***********============= button dropdown =============***********/
function mango_media_func ( $atts ) {
    extract ( shortcode_atts ( array (
        'title' => '',
        'media_type' => '',
        'link_a' => '',
        'link_v' => ''
    ), $atts ) );
    $results = '';
    $results .= '<h3>' . esc_attr ( $title ) . '</h3>';
    if ( $media_type == 'Local Video' ) {
        $file_parts = pathinfo ( $link_v );
        $results .= '<video controls="controls">';
        /* MP4 for Safari, IE9, iPhone, iPad, Android, and Windows Phone 7 */
        if ( $file_parts[ 'extension' ] == 'mp4' )
            $results .= '<source type="video/mp4" src="' . esc_url ( $link_v ) . '" />';
        /* WebM/VP8 for Firefox4, Opera, and Chrome */
        if ( $file_parts[ 'extension' ] == 'webm' )
            $results .= '<source type="video/webm" src="' . esc_url ( $link_v ) . '" />';
        /* Ogg/Vorbis for older Firefox and Opera versions */
        if ( $file_parts[ 'extension' ] == 'ogg' )
            $results .= '<source type="video/ogg" src="' . esc_url ( $link_v ) . '" />';
        $results .= '</video>';
    } else {
		$results .= '<audio controls loop><source src="' . esc_url ( $link_a ) . '" type="audio/ogg"></audio>';
    }
    return $results;
}
add_shortcode ( 'mango_media', 'mango_media_func' );
/***********============= button dropdown =============***********/

add_shortcode('mango_block','mango_block');
function mango_block($atts){
    extract(shortcode_atts(array(
        'name'  => '',
    ),$atts));
    $block = get_posts( array( 'name' => $name, 'post_type'=>'block', 'status' => 'publish' ) );
    if ( $block ){
        return '<div class="menu-quick-tags">'.$block[0]->post_content.'</div>';
    }
}add_action('vc_after_init', 'mango_vc_enable_deprecated_shortcodes');function mango_vc_enable_deprecated_shortcodes() {    if (class_exists('WPBMap')) {        $category = __('Mango', 'mango');        $desc = __(' with mango style','mango');        WPBMap::modify('vc_tabs', 'deprecated', false);        WPBMap::modify('vc_tabs', 'category', $category);        WPBMap::modify('vc_tabs', 'description', __( 'Tabbed content', 'js_composer' ) . $desc);        }}
?>