<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>
<script type="text/html" id="vc_controls-template-default">
	<div
		class="vc_controls-element" data-can-all="{{ can_all }}" data-can-edit="{{ can_edit }}">
		<div class="vc_controls-cc"><a class="vc_control-btn vc_element-name{# if( can_all ) { #} vc_element-move{# } #}"><span
					class="vc_btn-content"
					title="{# if( can_all ) { #}<?php printf( __( 'Drag to move %s', 'js_composer' ), '{{ name }}' ) ?>{# } #}">
					{{ name }}
				</span></a>{# if( can_edit ) { #}<a
				class="vc_control-btn vc_control-btn-edit" data-control="edit" href="#"
				title="<?php printf( __( 'Edit %s', 'js_composer' ), '{{ name }}' ) ?>"><span
					class="vc_btn-content"><span
						class="icon"></span></span></a>{# }
					if( can_all ) { #}<a class="vc_control-btn vc_control-btn-clone"
		                                                  data-control="clone"
		                                                  href="#"
		                                                  title="<?php printf( __( 'Clone %s', 'js_composer' ), '{{ name }}' ) ?>"><span
					class="vc_btn-content"><span class="icon"></span></span></a><a
				class="vc_control-btn vc_control-btn-delete" data-control="delete" href="#"
				title="<?php printf( __( 'Delete %s', 'js_composer' ), '{{ name }}' ) ?>"><span
					class="vc_btn-content"><span
						class="icon"></span></span></a>{# } #}</div>
	</div>
</script>
<script type="text/html" id="vc_controls-template-container">
	<div class="vc_controls-container">
		<div class="vc_controls-out-tl">
			<div class="vc_element element-{{ tag }}"><a class="vc_control-btn vc_element-name{# if( can_all ) { #} vc_element-move{# } #}"
			                                             title="{# if( can_all ) { #}<?php printf( __( 'Drag to move %s', 'js_composer' ), '{{ name }}' ) ?>{# } #}"><span
						class="vc_btn-content">{{ name }}</span></a>{# if( can_edit ) { #}<a class="vc_control-btn vc_control-btn-edit"
			                                                           href="#"
			                                                           title="<?php printf( __( 'Edit %s', 'js_composer' ), '{{ name }}' ) ?>"><span
						class="vc_btn-content"><span class="icon"></span></span></a>{# } #}{# if( 'edit' !== state ) { #}<a
					class="vc_control-btn vc_control-btn-prepend" href="#"
					title="<?php printf( __( 'Prepend to %s', 'js_composer' ), '{{ name }}' ) ?>"><span
						class="vc_btn-content"><span class="icon"></span></span></a>{# } #}{# if( can_all ) { #}<a
					class="vc_control-btn vc_control-btn-clone" href="#"
					title="<?php printf( __( 'Clone %s', 'js_composer' ), '{{ name }}' ) ?>"><span
						class="vc_btn-content"><span class="icon"></span></span></a><a
					class="vc_control-btn vc_control-btn-delete" href="#"
					title="<?php printf( __( 'Delete %s', 'js_composer' ), '{{ name }}' ) ?>"><span
						class="vc_btn-content"><span class="icon"></span></span></a>{# } #}</div>
		</div>
		{# if( 'edit' !== state ) { #}
		<div class="vc_controls-bc"><a class="vc_control-btn vc_control-btn-append" href="#"
		                               title="<?php printf( __( 'Append to %s', 'js_composer' ), '{{ name }}' ) ?>"><span
					class="vc_btn-content"><span class="icon"></span></span></a></div>{# } #}
	</div><!-- end vc_controls-column -->
</script>
<script type="text/html" id="vc_controls-template-container-width-parent">
	<div class="vc_controls-column">
		<div class="vc_controls-out-tl">
			<div class="vc_parent parent-{{ parent_tag }}"><a
					class="vc_control-btn vc_element-name{# if( parent_can_all ) { #} vc_move-{{ parent_tag }} vc_element-move{# } #}"
					title="{# if( can_all ) { #}<?php printf( __( 'Drag to move %s', 'js_composer' ), '{{ parent_name }}' ) ?>{# } #}"><span
						class="vc_btn-content">{{ parent_name }}</span></a><span class="advanced">{# if( parent_can_edit ) { #}<a
						class="vc_control-btn vc_control-btn-edit vc_edit" href="#"
						title="<?php printf( __( 'Edit %s', 'js_composer' ), '{{ parent_name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}{# if( allowAdd ) { #}<a
						class="vc_control-btn vc_control-btn-prepend vc_edit" href="#"
						title="<?php printf( __( 'Prepend to %s', 'js_composer' ), '{{ parent_name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}{# if( parent_can_all ) { #}<a
						class="vc_control-btn vc_control-btn-clone" href="#"
						title="<?php printf( __( 'Clone %s', 'js_composer' ), '{{ parent_name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a><a
						class="vc_control-btn vc_control-btn-delete" href="#"
						title="<?php printf( __( 'Delete %s', 'js_composer' ), '{{ parent_name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}</span><a
					class="vc_control-btn vc_control-btn-switcher{{ switcherPrefix }}"
					title="<?php printf( __( 'Show %s controls', 'js_composer' ), '{{ parent_name }}' ) ?>"><span
						class="vc_btn-content"><span class="icon"></span></span></a></div>
			<div class="vc_element element-{{ tag }} vc_active"><a
					class="vc_control-btn vc_element-name vc_move-{{ tag }} {# if( can_all ) { #}vc_element-move{# } #}"
					title="{# if( can_all ) { #}<?php printf( __( 'Drag to move %s', 'js_composer' ), '{{ name }}' ) ?>{# } #}"><span
						class="vc_btn-content">{{ name }}</span></a><span class="advanced">{# if( can_edit ) { #}<a
						class="vc_control-btn vc_control-btn-edit" href="#"
						title="<?php printf( __( 'Edit %s', 'js_composer' ), '{{ name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}{# if( 'edit' !== state ) { #}<a
						class="vc_control-btn vc_control-btn-prepend" href="#"
						title="<?php printf( __( 'Prepend to %s', 'js_composer' ), '{{ name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a></span>{# } #}<a
					class="vc_control-btn vc_control-btn-switcher{{ switcherPrefix }}"
					title="<?php printf( __( 'Show %s controls', 'js_composer' ), '{{ name }}' ) ?>"><span
						class="vc_btn-content"><span class="icon"></span></span></a></div>
		</div>
		{# if( 'edit' !== state ) { #}
		<div class="vc_controls-bc"><a class="vc_control-btn vc_control-btn-append" href="#"
		                               title="<?php printf( __( 'Append to %s', 'js_composer' ), '{{ name }}' ) ?>"><span
					class="vc_btn-content"><span class="icon"></span></span></a></div>{# } #}
	</div><!-- end vc_controls-column -->
</script>
<script type="text/html" id="vc_controls-template-vc_column">
	<div class="vc_controls-column">
		<div class="vc_controls-out-tl">
			<div class="vc_parent parent-{{ parent_tag }}"><a
					class="vc_control-btn vc_element-name{# if( parent_can_all ) { #} vc_element-move vc_move-{{ parent_tag }}{# } #}"
					title="{# if( parent_can_all ) { #}<?php printf( __( 'Drag to move %s', 'js_composer' ), '{{ parent_name }}' ) ?>{# } #}"><span
						class="vc_btn-content">{{ parent_name }}</span></a><span class="vc_advanced{{ switcherPrefix }}">{# if( parent_can_edit ) { #}<a
						class="vc_control-btn vc_control-btn-edit vc_edit" href="#"
						title="<?php printf( __( 'Edit %s', 'js_composer' ), '{{ parent_name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}{# if( parent_can_all ) { #}<a
						class="vc_control-btn vc_control-btn-layout vc_edit" href="#"
						title="<?php printf( __( 'Change layout', 'js_composer' ) ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}{# if( allowAdd ) { #}<a
						class="vc_control-btn vc_control-btn-prepend vc_edit" href="#"
						title="<?php printf( __( 'Add new %s', 'js_composer' ), '{{ name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}{# if( parent_can_all ) { #}<a
						class="vc_control-btn vc_control-btn-clone" href="#"
						title="<?php printf( __( 'Clone %s', 'js_composer' ), '{{ parent_name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a><a
						class="vc_control-btn vc_control-btn-delete" href="#"
						title="<?php printf( __( 'Delete %s', 'js_composer' ), '{{ parent_name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}</span><a
					class="vc_control-btn vc_control-btn-switcher{{ switcherPrefix }}"
					title="<?php printf( __( 'Show %s controls', 'js_composer' ), '{{ parent_name }}' ) ?>"><span
						class="vc_btn-content"><span class="icon"></span></span></a></div>
			<div class="vc_element element-{{ tag }} vc_active"><a
					class="vc_control-btn vc_element-name{# if( can_all ) { #} vc_element-move vc_move-vc_column{# } #}"
					title="{# if( can_all ) { #}<?php printf( __( 'Drag to move %s', 'js_composer' ), '{{ name }}' ) ?>{# } #}"><span
						class="vc_btn-content">{{ name }}</span></a><span class="vc_advanced{{ switcherPrefix }}">{# if( can_edit ) { #}<a
						class="vc_control-btn vc_control-btn-edit" href="#"
						title="<?php printf( __( 'Edit %s', 'js_composer' ), '{{ name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}{# if( 'edit' !== state ) { #}<a
						class="vc_control-btn vc_control-btn-prepend" href="#"
						title="<?php printf( __( 'Prepend to %s', 'js_composer' ), '{{ name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}{# if( can_all ) { #}<a
						class="vc_control-btn vc_control-btn-delete" href="#"
						title="<?php printf( __( 'Delete %s', 'js_composer' ), '{{ name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}"></span><a
					class="vc_control-btn vc_control-btn-switcher{{ switcherPrefix }}"
					title="<?php printf( __( 'Show %s controls', 'js_composer' ), '{{ name }}' ) ?>"><span
						class="vc_btn-content"><span class="icon"></span></span></a></div>
		</div>
		{# if( 'edit' !== state ) { #}
		<div class="vc_controls-bc"><a class="vc_control-btn vc_control-btn-append" href="#"
		                               title="<?php printf( __( 'Append to %s', 'js_composer' ), '{{ name }}' ) ?>"><span
					class="vc_btn-content"><span class="icon"></span></span></a></div>{# } #}
	</div><!-- end vc_controls-column -->
</script>

<script type="text/html" id="vc_controls-template-vc_tab">
	<div class="vc_controls-column">
		<div class="vc_controls-out-tr">
			<div class="vc_parent parent-{{ parent_tag }}"><a
					class="vc_control-btn vc_element-name vc_move-{{ parent_tag }}{# if( parent_can_all ) { #} vc_element-move{# } #}"
					title="{# if( parent_can_all ) { #}<?php printf( __( 'Drag to move %s', 'js_composer' ), '{{ parent_name }}' ) ?>{# } #}"><span
						class="vc_btn-content">{{ parent_name }}</span></a><span class="vc_advanced{{ switcherPrefix }}">{# if( parent_can_edit ) { #}<a
						class="vc_control-btn vc_control-btn-edit vc_edit" href="#"
						title="<?php printf( __( 'Edit %s', 'js_composer' ), '{{ parent_name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}{# if( allowAdd ) { #}<a
						class="vc_control-btn vc_control-btn-prepend vc_edit" href="#"
						title="<?php printf( __( 'Add new %s', 'js_composer' ), '{{ name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}{# if( parent_can_all ) { #}<a
						class="vc_control-btn vc_control-btn-clone" href="#"
						title="<?php printf( __( 'Clone %s', 'js_composer' ), '{{ parent_name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a><a
						class="vc_control-btn vc_control-btn-delete" href="#"
						title="<?php printf( __( 'Delete %s', 'js_composer' ), '{{ parent_name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}</span><a
					class="vc_control-btn vc_control-btn-switcher{{ switcherPrefix }}"
					title="<?php printf( __( 'Show %s controls', 'js_composer' ), '{{ parent_name }}' ) ?>"><span
						class="vc_btn-content"><span class="icon"></span></span></a></div>
			<div class="vc_element element-{{ tag }} vc_active"><a
					class="vc_control-btn vc_element-name vc_move-{{ tag }}{# if( can_all ) { #} vc_element-move{# } #}"
					title="{# if( can_all ) { #}<?php printf( __( 'Drag to move %s', 'js_composer' ), '{{ name }}' ) ?>{# } #}"><span
						class="vc_btn-content">{{ name }}</span></a><span class="vc_advanced{{ switcherPrefix }}">{# if( can_edit ) { #}<a
						class="vc_control-btn vc_control-btn-edit" href="#"
						title="<?php printf( __( 'Edit %s', 'js_composer' ), '{{ name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}{# if( 'edit' !== state ) { #}<a
						class="vc_control-btn vc_control-btn-prepend" href="#"
						title="<?php printf( __( 'Prepend to %s', 'js_composer' ), '{{ name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}{# if( can_all ) { #}<a
						class="vc_control-btn vc_control-btn-clone" href="#"
						title="<?php printf( __( 'Clone %s', 'js_composer' ), '{{ name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a><a
						class="vc_control-btn vc_control-btn-delete" href="#"
						title="<?php printf( __( 'Delete %s', 'js_composer' ), '{{ name }}' ) ?>"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}</span><a
					class="vc_control-btn vc_control-btn-switcher{{ switcherPrefix }}"
					title="<?php printf( __( 'Show %s controls', 'js_composer' ), '{{ name }}' ) ?>"><span
						class="vc_btn-content"><span class="icon"></span></span></a></div>
		</div>
		{# if( 'edit' !== state ) { #}
		<div class="vc_controls-bc"><a class="vc_control-btn vc_control-btn-append" href="#"
		                               title="<?php printf( __( 'Append to %s', 'js_composer' ), '{{ name }}' ) ?>"><span
					class="vc_btn-content"><span class="icon"></span></span></a></div>{# } #}
	</div><!-- end vc_controls-column -->
</script>
<?php
/**
 * @deprecated 4.8
*/
?>
<script type="text/html" id="vc_controls-template-vc_row">
	<div class="vc_controls-row">
		<div class="vc_controls-out-tl"><a class="vc_control-btn vc_element-name">{{ name }}</a><a
				class="vc_control-btn switcher"><span class="icon"></span></a><a
				class="vc_control-btn vc_control-btn-move" href="#"><span class="icon"></span></a><a
				class="vc_control-btn vc_control-btn-append" href="#"><span class="icon"></span></a><a
				class="vc_control-btn vc_control-btn-edit vc_edit" href="#"><span class="icon"></span></a><a
				class="vc_control-btn vc_control-btn-clone" href="#"><span class="icon"></span></a><a
				class="vc_control-btn vc_control-btn-delete" href="#"><span class="icon"></span></a></div>
	</div>
</script>
<script type="text/html" id="vc_controls-template-vc_tta_section">
	<div class="vc_controls-container">
		<div class="vc_controls-out-tr">
			<div class="vc_parent parent-{{ parent_tag }}"><a
					class="vc_control-btn vc_element-name vc_move-{{ parent_tag }}{# if( parent_can_all ) { #} vc_element-move{# } #}"
					title="{# if( parent_can_all ) { #}<?php printf( __( 'Drag to move %s', 'js_composer' ), '{{ parent_name }}' ) ?>{# } #}"><span
						class="vc_btn-content">{{ parent_name }}</span></a><span class="vc_advanced{{ switcherPrefix }}">{# if( parent_can_edit ) { #}<a
						class="vc_control-btn vc_control-btn-edit vc_edit" href="#"
						title="<?php printf( __( 'Edit %s', 'js_composer' ), '{{ parent_name }}' ) ?>"
						data-vc-control="parent.edit"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}{# if( allowAdd ) { #}<a
						class="vc_control-btn vc_control-btn-prepend vc_edit" href="#"
						title="<?php printf( __( 'Add new %s', 'js_composer' ), '{{ name }}' ) ?>"
						data-vc-control="parent.append"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}{# if( parent_can_all ) { #}<a
						class="vc_control-btn vc_control-btn-clone" href="#"
						title="<?php printf( __( 'Clone %s', 'js_composer' ), '{{ parent_name }}' ) ?>"
						data-vc-control="parent.clone"><span
							class="vc_btn-content"><span class="icon"></span></span></a><a
						class="vc_control-btn vc_control-btn-delete" href="#"
						title="<?php printf( __( 'Delete %s', 'js_composer' ), '{{ parent_name }}' ) ?>"
						data-vc-control="parent.destroy"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}</span><a
					class="vc_control-btn vc_control-btn-switcher{{ switcherPrefix }}"
					title="<?php printf( __( 'Show %s controls', 'js_composer' ), '{{ parent_name }}' ) ?>"><span
						class="vc_btn-content"><span class="icon"></span></span></a></div>
			<div class="vc_element element-{{ tag }} vc_active"><a
					class="vc_control-btn vc_element-name vc_move-{{ tag }}{# if( can_all ) { #} vc_child-element-move{# } #}"
					title="{# if( can_all ) { #}<?php printf( __( 'Drag to move %s', 'js_composer' ), '{{ name }}' ) ?>{# } #}"><span
						class="vc_btn-content">{{ name }}</span></a><span class="vc_advanced{{ switcherPrefix }}">{# if( can_edit ) { #}<a
						class="vc_control-btn vc_control-btn-edit" href="#"
						title="<?php printf( __( 'Edit %s', 'js_composer' ), '{{ name }}' ) ?>"
						data-vc-control="edit"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}{# if( 'edit' !== state ) { #}<a
						class="vc_control-btn vc_control-btn-prepend" href="#"
						title="<?php printf( __( 'Prepend to %s', 'js_composer' ), '{{ name }}' ) ?>"
						data-vc-control="prepend"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}{# if( can_all ) { #}<a
						class="vc_control-btn vc_control-btn-clone" href="#"
						title="<?php printf( __( 'Clone %s', 'js_composer' ), '{{ name }}' ) ?>"
						data-vc-control="clone"><span
							class="vc_btn-content"><span class="icon"></span></span></a><a
						class="vc_control-btn vc_control-btn-delete" href="#"
						title="<?php printf( __( 'Delete %s', 'js_composer' ), '{{ name }}' ) ?>"
						data-vc-control="destroy"><span
							class="vc_btn-content"><span class="icon"></span></span></a>{# } #}</span><a
					class="vc_control-btn vc_control-btn-switcher{{ switcherPrefix }}"
					title="<?php printf( __( 'Show %s controls', 'js_composer' ), '{{ name }}' ) ?>"><span
						class="vc_btn-content"><span class="icon"></span></span></a></div>
		</div>
		{# if( 'edit' !== state ) { #}
		<div class="vc_controls-bc"><a class="vc_control-btn vc_control-btn-append" href="#"
		                               title="<?php printf( __( 'Append to %s', 'js_composer' ), '{{ name }}' ) ?>"
		                               data-vc-control="append"><span
					class="vc_btn-content"><span class="icon"></span></span></a></div>{# } #}
	</div><!-- end vc_controls-vc_tta_section -->
</script>