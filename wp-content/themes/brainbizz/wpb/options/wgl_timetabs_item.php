<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$theme_color_secondary	= esc_attr(BrainBizz_Theme_Helper::get_option("theme-secondary-color"));
$header_font_color = esc_attr(BrainBizz_Theme_Helper::get_option('header-font')['color']);


if (function_exists('vc_map')) {
	vc_map(array(
		'name' => esc_html__('Time Tab Item', 'brainbizz'),
		'base' => 'wgl_timetabs_item',
		'class' => 'brainbizz_time_line_vertical',
		'category' => esc_html__('WGL Modules', 'brainbizz'),
		'icon' => 'wgl_icon_vertical-timeline',
		'as_child' => array('only' => 'wgl_timetabs_container'),
		'content_element' => true,
		'description' => esc_html__('Time tabs item','brainbizz'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Time', 'brainbizz'),
				'param_name' => 'time',
				'admin_label' => true,
				'value' => esc_html__( '11.00 am - 01.00 pm', 'brainbizz' ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title', 'brainbizz'),
				'param_name' => 'title',
				'admin_label' => true,
				'value' => esc_html__( 'Event Title', 'brainbizz' ),
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'brainbizz' ),
				'param_name' => 'thumbnail',
				'value' => '',
				'description' => esc_html__( 'Select image from media library.', 'brainbizz' ),
			),
			// Content Section
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Event description', 'brainbizz'),
				'param_name' => 'description',
			),
			//Button settings
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Button Customize', 'brainbizz'),
				'param_name' => 'h_button',
				'group' => esc_html__( 'Button', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12 no-top-margin',
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Button Text', 'brainbizz'),
				'value' => esc_html__('Read more', 'brainbizz'),
				'param_name' => 'button_text',
				'group' => esc_html__( 'Button', 'brainbizz' ),
			),
			array(
				'type' => 'vc_link',
				'heading' => esc_html__( 'Button Link', 'brainbizz' ),
				'param_name' => 'button_link',
				'group' => esc_html__( 'Button', 'brainbizz' ),
			),
			// Button size header
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Button Size', 'brainbizz'),
				'param_name' => 'h_button_size',
				'group' => esc_html__( 'Button', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button shadow header
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Button Shadow', 'brainbizz'),
				'param_name' => 'h_button_shadow',
				'group' => esc_html__( 'Button', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button size options
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Button Size', 'brainbizz' ),
				'description' => esc_html__('Select button size.', 'brainbizz'),
				'param_name' => 'button_size',
				'value' => array(
					esc_html__( 'Small', 'brainbizz' )  => 's',
					esc_html__( 'Medium', 'brainbizz' ) => 'm',
					esc_html__( 'Large', 'brainbizz' )  => 'l',
					esc_html__( 'Extra Large', 'brainbizz' ) => 'xl',
				),
				'std' => 'm',
				'group' => esc_html__( 'Button', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button shadow options
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Button Shadow Style', 'brainbizz' ),
				'description' => esc_html__('Select button shadow style.', 'brainbizz'),
				'param_name' => 'button_shadow_style',
				'value' => array(
					esc_html__( 'None', 'brainbizz' )     => 'none',
					esc_html__( 'Always', 'brainbizz' )   => 'always',
					esc_html__( 'On Hover', 'brainbizz' ) => 'on_hover',
					esc_html__( 'Before Hover', 'brainbizz' ) => 'before_hover',
				),
				'std' => 'on_hover',
				'group' => esc_html__( 'Button', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'		 => 'dropdown',
				'heading' 	 => esc_html__( 'Customize', 'brainbizz' ),
				'description' => esc_html__('Show options for color customizing.', 'brainbizz'),
				'param_name' => 'button_customize',
				'value'		 => array(
					esc_html__( 'Default', 'brainbizz' ) => 'def',
					esc_html__( 'Color', 'brainbizz' )   => 'color',
				),
				'std'		=> 'color',
				'group' 	=> esc_html__( 'Button', 'brainbizz' ),
			),
			array(
				'type' 		 => 'brainbizz_param_heading',
				'heading' 	 => esc_html__('Text Color', 'brainbizz'),
				'param_name' => 'h_text_color',
				'dependency' => array(
					'element' => 'button_customize',
					'value'   => 'color'
				),
				'group' => esc_html__( 'Button', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
			),
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Text Color', 'brainbizz'),
				'description' => esc_html__('Select custom text color for button.', 'brainbizz'),
				'param_name' => 'button_text_color',
				'value' => $header_font_color,
				'dependency'  => array(
					'element' => 'button_customize',
					'value'   => 'color'
				),
				'save_always' => true,
				'group' => esc_html__( 'Button', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Hover Text Color', 'brainbizz'),
				'description' => esc_html__('Select custom text color for hover button.', 'brainbizz'),
				'param_name' => 'button_text_color_hover',
				'value' => '#ffffff',
				'dependency' => array(
					'element' => 'button_customize',
					'value' => 'color',
				),
				'save_always' => true,
				'group' => esc_html__( 'Button', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Background Color', 'brainbizz'),
				'param_name' => 'h_background_color',
				'group' => esc_html__( 'Button', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
				'dependency' => array(
					'element' => 'button_customize',
					'value'   => 'color'
				),
			),
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' 	  => esc_html__('Background', 'brainbizz'),
				'description' => esc_html__('Select custom background for button.', 'brainbizz'),
				'param_name' => 'button_bg_color',
				'value' => '#ffffff',
				'dependency' => array(
					'element' => 'button_customize',
					'value'   => 'color'
				),
				'save_always' => true,
				'group' => esc_html__( 'Button', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Hover Background', 'brainbizz'),
				'param_name' => 'button_bg_color_hover',
				'value' => $theme_color_secondary,
				'description' => esc_html__('Select custom background for hover button.', 'brainbizz'),
				'dependency' => array(
					'element' => 'button_customize',
					'value'   => 'color'
				),
				'save_always' => true,
				'group' => esc_html__( 'Button', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button border-color header
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Border Color', 'brainbizz'),
				'param_name' => 'h_border_color',
				'dependency' => array(
					'element' => 'button_customize',
					'value' => 'color'
				),
				'group' => esc_html__( 'Button', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
			),
			// Button border-color
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Border Color', 'brainbizz'),
				'description' => esc_html__('Select custom border color for button.', 'brainbizz'),
				'param_name' => 'button_border_color',
				'value' => $theme_color_secondary,
				'dependency' => array(
					'element' => 'button_customize',
					'value' => array('color')
				),
				'save_always' => true,
				'group' => esc_html__( 'Button', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button Hover border-color
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Hover Border Color', 'brainbizz'),
				'description' => esc_html__('Select custom border color for hover button.', 'brainbizz'),
				'param_name' => 'button_border_color_hover',
				'value' => $theme_color_secondary,
				'dependency' => array(
					'element' => 'button_customize',
					'value' => array('color')
				),
				'save_always' => true,
				'group' => esc_html__( 'Button', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Text Color Customize
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Text Color Customize', 'brainbizz'),
				'param_name' => 'h_text_colors',
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12 no-top-margin',
			),
			// Time Custom Color
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Time Custom Color', 'brainbizz' ),
				'param_name' => 'time_custom_color',
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-7',
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Time Color', 'brainbizz'),
				'param_name' => 'time_color',
				'value' => '#ffffff',
				'description' => esc_html__('Select custom color', 'brainbizz'),
				'dependency' => array(
					'element' => 'time_custom_color',
					'value' => 'true'
				),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-5',
			),
			// Title Custom Color
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Title Custom Color', 'brainbizz' ),
				'param_name' => 'title_custom_color',
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-7',
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Title Color', 'brainbizz'),
				'param_name' => 'title_color',
				'value' => '#ffffff',
				'description' => esc_html__('Select custom color', 'brainbizz'),
				'dependency' => array(
					'element' => 'title_custom_color',
					'value' => 'true'
				),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-5',
			),
			// Description Custom Color
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Description Custom Color', 'brainbizz' ),
				'param_name' => 'description_custom_color',
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-7',
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Description Color', 'brainbizz'),
				'param_name' => 'description_color',
				'value' => '#dadada',
				'description' => esc_html__('Select custom color', 'brainbizz'),
				'dependency' => array(
					'element' => 'description_custom_color',
					'value' => 'true'
				),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-5',
			),
			// Bg Color Customize
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Background Color Customize', 'brainbizz'),
				'param_name' => 'h_bg_color',
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
			),
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Background Custom Color', 'brainbizz' ),
				'param_name' => 'bg_custom_color',
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Background Color', 'brainbizz'),
				'param_name' => 'bg_color',
				'value' => '',
				'description' => esc_html__('Select custom color', 'brainbizz'),
				'dependency' => array(
					'element' => 'bg_custom_color',
					'value' => 'true'
				),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Background Hover Color', 'brainbizz'),
				'param_name' => 'bg_color_hover',
				'value' => '#131120',
				'description' => esc_html__('Select custom color', 'brainbizz'),
				'dependency' => array(
					'element' => 'bg_custom_color',
					'value' => 'true'
				),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
		)
	));

	if (class_exists('WPBakeryShortCode')) {
		class WPBakeryShortCode_wgl_timetabs_item extends WPBakeryShortCode {
		}
	}
}