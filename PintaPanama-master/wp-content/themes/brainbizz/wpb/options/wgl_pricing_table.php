<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$theme_color = esc_attr(BrainBizz_Theme_Helper::get_option("theme-custom-color"));
$header_font_color = esc_attr(BrainBizz_Theme_Helper::get_option('header-font')['color']);
$main_font_color = esc_attr(BrainBizz_Theme_Helper::get_option('main-font')['color']);


if (function_exists('vc_map')) {
	vc_map(array(
		'name' => esc_html__('Pricing Table', 'brainbizz'),
		'base' => 'wgl_pricing_table',
		'class' => 'brainbizz_pricing_table',
		'category' => esc_html__('WGL Modules', 'brainbizz'),
		'icon' => 'wgl_icon_price_table',
		'content_element' => true,
		'description' => esc_html__('Place Pricing Table','brainbizz'),
		'params' => array(
			// GENERAL TAB
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Pricing Table Title', 'brainbizz'),
				'param_name' => 'pricing_title',
				'admin_label' => true,
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Currency', 'brainbizz'),
				'param_name' => 'pricing_cur',
				'edit_field_class' => 'vc_col-sm-2',
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Price', 'brainbizz'),
				'param_name' => 'pricing_price',
				'edit_field_class' => 'vc_col-sm-2',
				'admin_label' => true,
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Descriptions', 'brainbizz'),
				'param_name' => 'pricing_desc',
				'edit_field_class' => 'vc_col-sm-8',
			),
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Highlighting', 'brainbizz' ),
				'param_name' => 'highlighted_plan',
				'description' => esc_html__( 'Highlight plan?', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
				'admin_label' => true,
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Highlighting text', 'brainbizz'),
				'param_name' => 'highlighting_title',
				'value' => esc_html__('Recomended', 'brainbizz'),
				'dependency' => array(
					'element' => 'highlighted_plan',
					'value' => 'true',
				),
				'edit_field_class' => 'vc_col-sm-8',
			),
			vc_map_add_css_animation( true ),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra Class', 'brainbizz'),
				'param_name' => 'extra_class',
				'description' => esc_html__('Add an extra class name to the element and refer to it from Custom CSS option.', 'brainbizz')
			),
			// ICON TAB
			// Pricing Table Icon/Image heading
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Icon Type', 'brainbizz'),
				'param_name' => 'h_icon_type',
				'group' => esc_html__( 'Icon', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12 no-top-margin',
			),
			// Pricing Table Icon/Image
			array(
				'type' => 'dropdown',
				'param_name' => 'icon_type',
				'value' => array(
					esc_html__( 'None', 'brainbizz' ) => 'none',
					esc_html__( 'Font', 'brainbizz' ) => 'font',
					esc_html__( 'Image', 'brainbizz' ) => 'image',
				),
				'save_always' => true,
				'group' => esc_html__( 'Icon', 'brainbizz' ),
			),
			array(
				'type' => 'dropdown',
				'param_name' => 'icon_font_type',
				'value' => array(
					esc_html__( 'Fontawesome', 'brainbizz' ) => 'type_fontawesome',
					esc_html__( 'Flaticon', 'brainbizz' ) => 'type_flaticon',
				),
				'save_always' => true,
				'group' => esc_html__( 'Icon', 'brainbizz' ),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'font',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'brainbizz' ),
				'param_name' => 'icon_fontawesome',
				'value' => 'fa fa-adjust', // default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an 'EMPTY' icon?
					'iconsPerPage' => 200,
					// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
				),
				'description' => esc_html__( 'Select icon from library.', 'brainbizz' ),
				'dependency' => array(
					'element' => 'icon_font_type',
					'value' => 'type_fontawesome',
				),
				'group' => esc_html__( 'Icon', 'brainbizz' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'brainbizz' ),
				'param_name' => 'icon_flaticon',
				'value' => '', // default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an 'EMPTY' icon?
					'type' => 'flaticon',
					'iconsPerPage' => 200,
					// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
				),
				'description' => esc_html__( 'Select icon from library.', 'brainbizz' ),
				'dependency' => array(
					'element' => 'icon_font_type',
					'value' => 'type_flaticon',
				),
				'group' => esc_html__( 'Icon', 'brainbizz' ),
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'brainbizz' ),
				'param_name' => 'thumbnail',
				'value' => '',
				'description' => esc_html__( 'Select image from media library.', 'brainbizz' ),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'image',
				),
				'group' => esc_html__( 'Icon', 'brainbizz' ),
			),
			// Custom image width
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Custom Image Width', 'brainbizz'),
				'param_name' => 'custom_image_width',
				'description' => esc_html__( 'Enter image size in pixels.', 'brainbizz' ),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'image',
				),
				'group' => esc_html__( 'Icon', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Custom image height
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Custom Image Height', 'brainbizz'),
				'param_name' => 'custom_image_height',
				'description' => esc_html__( 'Enter image size in pixels.', 'brainbizz' ),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'image',
				),
				'group' => esc_html__( 'Icon', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Custom icon size
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Custom Icon Size', 'brainbizz'),
				'param_name' => 'custom_icon_size',
				'description' => esc_html__( 'Enter Icon size in pixels.', 'brainbizz' ),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'font',
				),
				'group' => esc_html__( 'Icon', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-3',
			),
			// Icon color checkbox
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Use Custom Icon Colors', 'brainbizz' ),
				'param_name' => 'custom_icon_color',
				'description' => esc_html__( 'Select custom colors', 'brainbizz' ),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'font',
				),
				'group' => esc_html__( 'Icon', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			// Icon color
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Icon Color', 'brainbizz'),
				'param_name' => 'icon_color',
				'value' => '#ffffff',
				'description' => esc_html__('Select icon color', 'brainbizz'),
				'dependency' => array(
					'element' => 'custom_icon_color',
					'value' => 'true'
				),
				'group' => esc_html__( 'Icon', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-5',
			),   
			// Content Section
			array(
				'type' => 'textarea_html',
				'holder' => 'div',
				'heading' => esc_html__('Content.', 'brainbizz'),
				'param_name' => 'content',
				'group' => esc_html__( 'Content', 'brainbizz' ),
				'admin_label' => false,
			),
			// description
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Description Text', 'brainbizz'),
				'param_name' => 'descr_text',
				'group' => esc_html__( 'Content', 'brainbizz' ),
			),
			// add button header
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Add Button', 'brainbizz'),
				'param_name' => 'h_button',
				'group' => esc_html__( 'Content', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
			),
			// button
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Button Text', 'brainbizz'),
				'param_name' => 'button_title',
				'value' => esc_html__('Get Ticket', 'brainbizz'),
				'group' => esc_html__( 'Content', 'brainbizz' ),
			),
			// Link
			array(
				'type' => 'vc_link',
				'heading' => esc_html__( 'Button Link', 'brainbizz' ),
				'param_name' => 'link',
				'group' => esc_html__( 'Content', 'brainbizz' ),
				'description' => esc_html__('Add link to button.', 'brainbizz')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Customize', 'brainbizz' ),
				'param_name' => 'button_customize',
				'value'         => array(
					esc_html__( 'Default', 'brainbizz' ) => 'def',
					esc_html__( 'Color', 'brainbizz' ) => 'color',
				),
				'group' => esc_html__( 'Content', 'brainbizz' ),
			),
			// Button text-color header
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Text Color', 'brainbizz'),
				'param_name' => 'h_text_color',
				'group' => esc_html__( 'Content', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
				'dependency' => array(
					'element' => 'button_customize',
					'value' => 'color'
				),
			),
			// Button text-color
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Text Color', 'brainbizz'),
				'param_name' => 'button_text_color',
				'value' => $header_font_color,
				'description' => esc_html__('Select custom text color for button.', 'brainbizz'),
				'save_always' => true,
				'dependency' => array(
					'element' => 'button_customize',
					'value' => 'color'
				),
				'group' => esc_html__( 'Content', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button Hover text-color
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Hover Text Color', 'brainbizz'),
				'param_name' => 'button_text_color_hover',
				'value' => '#ffffff',
				'description' => esc_html__('Select custom text color for hover button.', 'brainbizz'),
				'dependency' => array(
					'element' => 'button_customize',
					'value' => 'color',
				),
				'group' => esc_html__( 'Content', 'brainbizz' ),
				'save_always' => true,
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button Bg header
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Background Color', 'brainbizz'),
				'param_name' => 'h_background_color',
				'group' => esc_html__( 'Content', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
				'dependency' => array(
					'element' => 'button_customize',
					'value' => array('color')
				),
			),
			// Button Bg
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Background', 'brainbizz'),
				'param_name' => 'button_bg_color',
				'value' => '#ffffff',
				'description' => esc_html__('Select custom background for button.', 'brainbizz'),
				'save_always' => true,
				'dependency' => array(
					'element' => 'button_customize',
					'value' => array('color')
				),
				'group' => esc_html__( 'Content', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button Hover Bg
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Hover Background', 'brainbizz'),
				'param_name' => 'button_bg_color_hover',
				'value' => $theme_color,
				'description' => esc_html__('Select custom background for hover button.', 'brainbizz'),
				'dependency' => array(
					'element' => 'button_customize',
					'value' => array('color')
				),
				'group' => esc_html__( 'Content', 'brainbizz' ),
				'save_always' => true,
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button Bg Gradient header
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Background Gradient Color', 'brainbizz'),
				'param_name' => 'h_button_background_gradient_color',
				'group' => esc_html__( 'Content', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
				'dependency' => array(
					'element' => 'button_customize',
					'value' => array('gradient')
				),
			),
			// Button Bg Gradient start
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Start Color', 'brainbizz'),
				'param_name' => 'button_bg_gradient_start',
				'value' => '#f8f9fd',
				'save_always' => true,
				'dependency' => array(
					'element' => 'button_customize',
					'value' => array('gradient')
				),
				'group' => esc_html__( 'Content', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button Bg Gradient end
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('End Color', 'brainbizz'),
				'param_name' => 'button_bg_gradient_end',
				'value' => '#f8f9fd',
				'dependency' => array(
					'element' => 'button_customize',
					'value' => array('gradient')
				),
				'group' => esc_html__( 'Content', 'brainbizz' ),
				'save_always' => true,
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button Bg Gradient Hover header
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Background Gradient Hover Color', 'brainbizz'),
				'param_name' => 'h_background_gradient_hover_color',
				'group' => esc_html__( 'Content', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
				'dependency' => array(
					'element' => 'button_customize',
					'value' => array('gradient')
				),
			),
			// Button Bg Gradient Hover start
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Start Color', 'brainbizz'),
				'param_name' => 'button_bg_gradient_start_hover',
				'value' => '',
				'save_always' => true,
				'dependency' => array(
					'element' => 'button_customize',
					'value' => array('gradient')
				),
				'group' => esc_html__( 'Content', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button Bg Gradient Hover end
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('End Color', 'brainbizz'),
				'param_name' => 'button_bg_gradient_end_hover',
				'value' => '',
				'dependency' => array(
					'element' => 'button_customize',
					'value' => array('gradient')
				),
				'group' => esc_html__( 'Content', 'brainbizz' ),
				'save_always' => true,
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button border-color header
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Border Color', 'brainbizz'),
				'param_name' => 'h_border_color',
				'group' => esc_html__( 'Content', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
				'dependency' => array(
					'element' => 'button_customize',
					'value' => array('color')
				),
			),
			// Button border-color
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Border Color', 'brainbizz'),
				'param_name' => 'button_border_color',
				'value' => $theme_color,
				'description' => esc_html__('Select custom border color for button.', 'brainbizz'),
				'save_always' => true,
				'dependency' => array(
					'element' => 'button_customize',
					'value' => array('color')
				),
				'group' => esc_html__( 'Content', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button Hover border-color
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Hover Border Color', 'brainbizz'),
				'param_name' => 'button_border_color_hover',
				'value' => $theme_color,
				'description' => esc_html__('Select custom border color for hover button.', 'brainbizz'),
				'group' => esc_html__( 'Content', 'brainbizz' ),
				'save_always' => true,
				'dependency' => array(
					'element' => 'button_customize',
					'value' => array('color')
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Background styling
			array(
				'type' 		 => 'brainbizz_param_heading',
				'heading'	 => esc_html__('Header Background', 'brainbizz'),
				'param_name' => 'h_header_style',
				'group' 	 => esc_html__( 'Background', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12 no-top-margin',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Customize', 'brainbizz' ),
				'param_name' => 'header_customize',
				'value' => array(
					esc_html__( 'Default', 'brainbizz' ) => 'def',
					esc_html__( 'Color', 'brainbizz' ) => 'color',
					esc_html__( 'Image', 'brainbizz' ) => 'image',
				),
				'group' => esc_html__( 'Background', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6 no-top-margin',
			),
			// Header bg
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Background', 'brainbizz'),
				'param_name' => 'header_bg_color',
				'value' => $theme_color,
				'description' => esc_html__('Select custom background for header.', 'brainbizz'),
				'save_always' => true,
				'dependency' => array(
					'element' => 'header_customize',
					'value' => array('color')
				),
				'group' => esc_html__( 'Background', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Header bg gradient
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Background Gradient Color', 'brainbizz'),
				'param_name' => 'h_background_gradient_color',
				'group' => esc_html__( 'Background', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
				'dependency' => array(
					'element' => 'header_customize',
					'value' => array('gradient')
				),
			),
			// Header bg image
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Background Header Image', 'brainbizz' ),
				'param_name'  => 'bg_image',
				'value' => '',
				'description' => esc_html__( 'Select image from media library.', 'brainbizz' ),
				'dependency' => array(
					'element' => 'header_customize',
					'value' => 'image',
				),
				'group' => esc_html__( 'Background', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Content Background', 'brainbizz'),
				'param_name' => 'h_content_style',
				'group' => esc_html__( 'Background', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Customize', 'brainbizz' ),
				'param_name' => 'content_customize',
				'value' => array(
					esc_html__( 'Default', 'brainbizz' ) => 'def',
					esc_html__( 'Color', 'brainbizz' ) => 'color',
				),
				'group' => esc_html__( 'Background', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6 no-top-margin',
			),
			// Content bg color
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Background', 'brainbizz'),
				'param_name'  => 'content_bg_color',
				'value' => '#ffffff',
				'description' => esc_html__('Select custom background for content.', 'brainbizz'),
				'save_always' => true,
				'dependency'  => array(
					'element' => 'content_customize',
					'value' => array('color')
				),
				'group' => esc_html__( 'Background', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// title styles heading
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Title Styles', 'brainbizz'),
				'param_name' => 'h_title_styles',
				'group' => esc_html__( 'Typography', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12 no-top-margin',
			),
			// title Font Size
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title Font Size', 'brainbizz'),
				'param_name' => 'title_size',
				'value' => '',
				'description' => esc_html__( 'Enter title font-size in pixels.', 'brainbizz' ),
				'group' => esc_html__( 'Typography', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// title Font Weight
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title Font Weight', 'brainbizz'),
				'param_name' => 'title_weight',
				'value' => '',
				'description' => esc_html__( 'Enter font-weight.', 'brainbizz' ),
				'group' => esc_html__( 'Typography', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Title Fonts
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Custom font family for pricing table title', 'brainbizz' ),
				'param_name' => 'custom_fonts_title',
				'description' => esc_html__( 'Customize font family', 'brainbizz' ),
				'group' => esc_html__( 'Typography', 'brainbizz' ),
			),
			array(
				'type' => 'google_fonts',
				'param_name' => 'google_fonts_title',
				'value' => '',
				'dependency' => array(
					'element' => 'custom_fonts_title',
					'value' => 'true',
				),
				'group' => esc_html__( 'Typography', 'brainbizz' ),
			),
			// Title color checkbox
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Use Custom Title Color', 'brainbizz' ),
				'param_name' => 'custom_title_color',
				'description' => esc_html__( 'Select custom color', 'brainbizz' ),
				'group' => esc_html__( 'Typography', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			// Title colorpicker
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Title Color', 'brainbizz'),
				'param_name' => 'title_color',
				'value' => '#ffffff',
				'description' => esc_html__('Select title color', 'brainbizz'),
				'dependency' => array(
					'element' => 'custom_title_color',
					'value' => 'true'
				),
				'group' => esc_html__( 'Typography', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Price Styles', 'brainbizz'),
				'param_name' => 'h_content_styles',
				'group' => esc_html__( 'Typography', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
			),
			// Content font size
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Price Font Size', 'brainbizz'),
				'param_name' => 'price_size',
				'value' => '',
				'description' => esc_html__( 'Enter price font-size in pixels.', 'brainbizz' ),
				'group' => esc_html__( 'Typography', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Use Custom Price Color', 'brainbizz' ),
				'param_name' => 'custom_price_color',
				'description' => esc_html__( 'Select custom color', 'brainbizz' ),
				'group' => esc_html__( 'Typography', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			// Price color
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Price Color', 'brainbizz'),
				'param_name' => 'price_color',
				'value' => $header_font_color,
				'description' => esc_html__('Select price color', 'brainbizz'),
				'dependency' => array(
					'element' => 'custom_price_color',
					'value' => 'true'
				),
				'group' => esc_html__( 'Typography', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			// Pricing description styles
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Pricing Descriptions Styles', 'brainbizz'),
				'param_name' => 'description_styles',
				'group' => esc_html__( 'Typography', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
			),
			// Pricing description font size 
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Pricing Description Font Size', 'brainbizz'),
				'param_name' => 'description_size',
				'value' => '',
				'description' => esc_html__( 'Enter description font-size in pixels.', 'brainbizz' ),
				'group' => esc_html__( 'Typography', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			//  pricing description custom color checkbox
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Use Custom Description Color', 'brainbizz' ),
				'param_name' => 'custom_description_color',
				'description' => esc_html__( 'Select custom color', 'brainbizz' ),
				'group' => esc_html__( 'Typography', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			// pricing description custom color picker
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Description Color', 'brainbizz'),
				'param_name' => 'description_color',
				'value' => $main_font_color,
				'description' => esc_html__('Select price color', 'brainbizz'),
				'dependency' => array(
					'element' => 'custom_description_color',
					'value' => 'true'
				),
				'group' => esc_html__( 'Typography', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
		)
	));

	if (class_exists('WPBakeryShortCode')) {
		class WPBakeryShortCode_wgl_Pricing_Table extends WPBakeryShortCode {}
	}
}
