<?php

/* Start Overwrite CF7 Input Shortcode */

if ( function_exists ( 'wpcf7_remove_shortcode' ) ) { // Only run if these functions are available (prevent server error if CF7 isn't active on a site within the network)
    add_action ( 'init', 'mango_wpcf7_shortcode_text', 10 );

    function mango_wpcf7_shortcode_text () {
        wpcf7_remove_shortcode ( 'text' );
        wpcf7_remove_shortcode ( 'text*' );
        wpcf7_remove_shortcode ( 'email' );
        wpcf7_remove_shortcode ( 'email*' );
        wpcf7_remove_shortcode ( 'url' );
        wpcf7_remove_shortcode ( 'url*' );
        wpcf7_remove_shortcode ( 'tel' );
        wpcf7_remove_shortcode ( 'tel*' );
        wpcf7_add_shortcode (

		array ( 'text', 'text*', 'email', 'email*', 'url', 'url*', 'tel', 'tel*' ),
            'mango_wpcf7_text_shortcode_handler', true );
		}
	}

/* End Overwrite CF7 Input Shortcode */

function mango_wpcf7_text_shortcode_handler ( $tag ) {
    $tag = new WPCF7_Shortcode( $tag );
    if ( empty( $tag->name ) )
		return '';
	
    $validation_error = wpcf7_get_validation_error ( $tag->name );
    $class = wpcf7_form_controls_class ( $tag->type, 'wpcf7-text' );

    if ( in_array ( $tag->basetype, array ( 'email', 'url', 'tel' ) ) )
		$class .= ' wpcf7-validates-as-' . $tag->basetype;

    if ( $validation_error )
		$class .= ' wpcf7-not-valid';
		$atts = array ();
		$atts_id = '';
		$atts[ 'size' ] = $tag->get_size_option ( '40' );
		$atts[ 'maxlength' ] = $tag->get_maxlength_option ();
		$atts[ 'minlength' ] = $tag->get_minlength_option ();

    if ( $atts[ 'maxlength' ] && $atts[ 'minlength' ] && $atts[ 'maxlength' ] < $atts[ 'minlength' ] ) {
		unset( $atts[ 'maxlength' ], $atts[ 'minlength' ] );
    }
	
     $atts[ 'class' ] = $tag->get_class_option ( $class );
     $atts[ 'id' ] = $tag->get_id_option ();
     $atts_id = $atts[ 'id' ];
     $atts[ 'tabindex' ] = $tag->get_option ( 'tabindex', 'int', true );

    if ( $tag->has_option ( 'readonly' ) )
		$atts[ 'readonly' ] = 'readonly';

    if ( $tag->is_required () )
		$atts[ 'aria-required' ] = 'true';
		$atts[ 'aria-invalid' ] = $validation_error ? 'true' : 'false';
		$value = (string)reset ( $tag->values );

    if ( $tag->has_option ( 'placeholder' ) || $tag->has_option ( 'watermark' ) ) {
		$atts[ 'placeholder' ] = $value;
		$value = '';
    }
	
    $value = $tag->get_default_option ( $value );
    $value = wpcf7_get_hangover ( $tag->name, $value );
    $atts[ 'value' ] = $value;

    if ( wpcf7_support_html5 () ) {
		$atts[ 'type' ] = $tag->basetype;	
	}
	else {
		$atts[ 'type' ] = 'text';
    }
    $atts[ 'name' ] = $tag->name;
    $atts = wpcf7_format_atts ( $atts );
	
    if ( $atts_id == 'disabledInput' )
       $html = sprintf (
       '<input %1$s disabled />%2$s', $atts, $validation_error );
    else
      $html = sprintf (
      '<input %1$s />%2$s', $atts, $validation_error );
		return $html;
	}

	add_action ( 'wpcf7_init', 'mango_add_shortcode_checkbox' );

	function mango_add_shortcode_checkbox () {
		wpcf7_add_shortcode ( array ( 'checkbox', 'checkbox*', 'radio' ),
		'mango_checkbox_shortcode_handler', true );
    }

	function mango_checkbox_shortcode_handler ( $tag ) {
		$tag = new WPCF7_Shortcode( $tag );

    if ( empty( $tag->name ) )
		return '';
		$validation_error = wpcf7_get_validation_error ( $tag->name );
		$class = wpcf7_form_controls_class ( $tag->type );

    if ( $validation_error )
		$class .= ' wpcf7-not-valid';
		$label_first = $tag->has_option ( 'label_first' );
		$use_label_element = $tag->has_option ( 'use_label_element' );
		$exclusive = $tag->has_option ( 'exclusive' );
		$free_text = $tag->has_option ( 'free_text' );
		$multiple = false;
	
    if ( 'checkbox' == $tag->basetype )
		$multiple = !$exclusive;
    else // radio
		$exclusive = false;
    if ( $exclusive )
		$class .= ' wpcf7-exclusive-checkbox';
		$atts = array ();
		$atts[ 'class' ] = $tag->get_class_option ( $class );
		$atts[ 'id' ] = $tag->get_id_option ();
		$tabindex = $tag->get_option ( 'tabindex', 'int', true );
    if ( false !== $tabindex )
		$tabindex = absint ( $tabindex );
		$html = '';
		$count = 0;
		$values = (array)$tag->values;
		$labels = (array)$tag->labels;
	
    if ( $data = (array)$tag->get_data_option () ) {
     if ( $free_text ) {
		$values = array_merge (
					array_slice ( $values, 0, - 1 ),
					array_values ( $data ),
					array_slice ( $values, - 1 ) );
		$labels = array_merge (
					array_slice ( $labels, 0, - 1 ),
					array_values ( $data ),
					array_slice ( $labels, - 1 ) );

    } else {
		$values = array_merge ( $values, array_values ( $data ) );
		$labels = array_merge ( $labels, array_values ( $data ) );
      }
    }

    $defaults = array ();
    $default_choice = $tag->get_default_option ( null, 'multiple=1' );
    foreach ( $default_choice as $value ) {
        $key = array_search ( $value, $values, true );
        if ( false !== $key ) {
			$defaults[ ] = (int)$key + 1;
        }
    }

    $defaults = array_unique ( $defaults );
    $hangover = wpcf7_get_hangover ( $tag->name, $multiple ? array () : '' );
    $i = 0;

    foreach ( $values as $key => $value ) {
    if ( $value == 'mango_same_line' || $value == 'mango_custom' )
		continue;
		$ex = explode ( "|", $tag->raw_values[ $i ] );
		$i ++;
    if ( count ( $ex ) == 1 ) {
		$disable = '';
    } else {
		$disable = $ex[ 1 ];
      }
      $class = 'wpcf7-list-item';
      $checked = false;
    if ( $hangover ) {
		if ( $multiple ) {
			$checked = in_array ( esc_sql ( $value ), (array)$hangover );
		} else {
			$checked = ( $hangover == esc_sql ( $value ) );
		}
    } else {
		$checked = in_array ( $key + 1, (array)$defaults );
    }
    if ( isset( $labels[ $key ] ) )
		$label = $labels[ $key ];
    else
		$label = $value;
		$item_atts = array (
			'type' => $tag->basetype,
			'name' => $tag->name . ( $multiple ? '[]' : '' ),
			'value' => $value,
			'checked' => $checked ? 'checked' : '',
			'tabindex' => $tabindex ? $tabindex : '' );
		$item_atts = wpcf7_format_atts ( $item_atts );

	  
    if ( $label_first ) { // put label first, input last
		if ( in_array ( 'mango_custom', $values ) ) {
			$item = sprintf (
				'<span>%1$s</span><span class="custom-' . esc_attr ( $tag->basetype ) . '-container"><input %2$s  /><span class="custom-' . esc_attr ( $tag->basetype ) . '-icon"></span></span>', esc_html ( $label ), $item_atts );
		} else {
			$item = sprintf (
				'%1$s&nbsp;<input %2$s %3$s />',
				esc_html ( $label ), $item_atts, $disable );
        }
    } else {
		if ( in_array ( 'mango_custom', $values ) ) {
		$item = sprintf (
		'<span class="custom-' . esc_attr ( $tag->basetype ) . '-container"><input %2$s  /><span class="custom-' . esc_attr ( $tag->basetype ) . '-icon"></span></span><span>%1$s</span>', esc_html ( $label ), $item_atts );

       } else {
			$item = sprintf (
			'<input %2$s %3$s />&nbsp;%1$s',
			esc_html ( $label ), $item_atts, $disable );
        }
       }

    if ( $use_label_element ) {
		if ( in_array ( 'mango_same_line', $values ) ) {
			if ( in_array ( 'mango_custom', $values ) ) {
				if ( !empty( $disable ) )
					$item = '<label class="' . esc_attr ( $tag->basetype ) . '-inline custom-' . esc_attr ( $tag->basetype ) . '-wrapper disabled">' . $item . '</label>';
				else
					$item = '<label class="' . esc_attr ( $tag->basetype ) . '-inline custom-' . esc_attr ( $tag->basetype ) . '-wrapper">' . $item . '</label>';

			} else {
				if ( !empty( $disable ) )
					$item = '<label class="' . esc_attr ( $tag->basetype ) . '-inline disabled">' . $item . '</label>';
				else
					$item = '<label class="' . esc_attr ( $tag->basetype ) . '-inline">' . $item . '</label>';
			}
		} else {
			if ( in_array ( 'mango_custom', $values ) ) {
				if ( !empty( $disable ) )
					$item = '<div class="' . esc_attr ( $tag->basetype ) . ' disabled"><label class="custom-' . esc_attr ( $tag->basetype ) . '-wrapper">' . $item . '</label></div>';
				else
					$item = '<div class="' . esc_attr ( $tag->basetype ) . '"><label class="custom-' . esc_attr ( $tag->basetype ) . '-wrapper">' . $item . '</label></div>';

			} else {
				if ( !empty( $disable ) )
					$item = '<div class="' . esc_attr ( $tag->basetype ) . ' disabled"><label>' . $item . '</label></div>';
				else
					$item = '<div class="' . esc_attr ( $tag->basetype ) . '"><label>' . $item . '</label></div>';
			}
        }
    }
    if ( false !== $tabindex )
		$tabindex += 1;
		$count += 1;
		if ( 1 == $count ) {
			$class .= ' first';
		}

    if ( count ( $values ) == $count ) {
		$class .= ' last';
		if ( $free_text ) {
			$free_text_name = sprintf (
			'_wpcf7_%1$s_free_text_%2$s', $tag->basetype, $tag->name );
			$free_text_atts = array (
				'name' => $free_text_name,
				'class' => 'wpcf7-free-text',
				'tabindex' => $tabindex ? $tabindex : '' );

	if ( wpcf7_is_posted () && isset( $_POST[ $free_text_name ] ) ) {
		$free_text_atts[ 'value' ] = wp_unslash (
		$_POST[ $free_text_name ] );
    }

       $free_text_atts = wpcf7_format_atts ( $free_text_atts );
       $item .= sprintf ( ' <input type="text" %s />', $free_text_atts );
       $class .= ' has-free-text';
       }
    }

      $disable = '';
      $html .= $item;
    }

    $atts = wpcf7_format_atts ( $atts );
    if ( empty( $values ) ) {
		$item_atts = array (
			'type' => $tag->basetype,
			'name' => $tag->name . ( $multiple ? '[]' : '' ),
			'value' => 'yes' );
			$item_atts = wpcf7_format_atts ( $item_atts );
			$html = sprintf ( '<span class="input-group-addon no-minwidth custom-' . esc_attr ( $tag->basetype ) . '-wrapper">
			<span class="custom-' . esc_attr ( $tag->basetype ) . '-container">
			<input %1$s>
			<span class="custom-' . esc_attr ( $tag->basetype ) . '-icon"></span>
			</span>
			</span>', $item_atts );
	
			$html = sprintf (
				'%1$s%2$s', $html, $validation_error );

    } else {
			$html = sprintf (
			'<div %1$s>%2$s&nbsp;%3$s</div>', $atts, $html, $validation_error );
    }
    return $html;
}
	
	add_action ( 'wpcf7_init', 'mango_button_add_shortcode' );

	function mango_button_add_shortcode () {
			wpcf7_add_shortcode ( 'mango_button', 'mango_button_add_shortcode_handler' );
			wpcf7_add_shortcode ( 'mango_dropdown_button', 'mango_dropdown_button_add_shortcode_handler' );
	}

	function mango_button_add_shortcode_handler ( $tag ) {
		$tag = new WPCF7_Shortcode( $tag );
		$values = (array)$tag->values;

    if ( empty( $values[ 0 ] ) )
    return '';
    $item_atts = array (
		'type' => $tag->basetype,
		'name' => 'mango_' . $values[ 0 ],
		'value' => $values[ 0 ] );

    $item_atts = wpcf7_format_atts ( $item_atts );
		return sprintf ( '<button class="btn btn-custom" %1$s >' . esc_attr ( $values[ 0 ] ) . '</button>', $item_atts );
	}

	function mango_dropdown_button_add_shortcode_handler ( $tag ) {
		$tag = new WPCF7_Shortcode( $tag );
		$values = (array)$tag->values;
		$class = $tag->get_class_option ();

    if ( !empty( $values ) ) {
		$output = ''; 

    if ( in_array ( 'with_text', $tag->options ) ) {
		$output .= '<button type="button" class="' . esc_attr ( $class ) . '" data-toggle="dropdown">' . esc_attr ( $values[ 0 ] ) . '<span class="caret"></span></button>';
    } elseif ( in_array ( 'without_text', $tag->options ) ) {

		$output .= '<button type="button" class="' . esc_attr ( str_replace ( "dropdown-toggle", "", $class ) ) . 'btn btn-custom" tabindex="-1">' . esc_attr ( $values[ 0 ] ) . '</button>
		<button type="button" class="' . esc_attr ( $class ) . '" data-toggle="dropdown" tabindex="-1">
		<span class="caret"></span>
		<span class="sr-only">Toggle Dropdown</span>
		</button>';
    }

    $output .= '<ul class="dropdown-menu" role="menu">';
    for ( $i = 1; $i < count ( $values ); $i ++ ) {
		$ex = explode ( ',', $values[ $i ] );
		$output .= '<li><a href="' . esc_url ( $ex[ 1 ] ) . '">' . esc_attr ( $ex[ 0 ] ) . '</a></li>';
    }

    $output .= '</ul>';
    }
    return $output;
  }
?>