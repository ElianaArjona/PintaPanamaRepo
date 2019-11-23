<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$theme_color = esc_attr(BrainBizz_Theme_Helper::get_option("theme-custom-color"));
$header_font_color = esc_attr(BrainBizz_Theme_Helper::get_option('header-font')['color']);

if (function_exists('vc_map')) {
	vc_map(array(
		'name' => esc_html__('Testimonials', 'brainbizz'),
		'base' => 'wgl_testimonials',
		'class' => 'brainbizz_testimonials',
		'category' => esc_html__('WGL Modules', 'brainbizz'),
		'icon' => 'wgl_icon_testimonial',
		'content_element' => true,
		'description' => esc_html__('Feedback from the clients.','brainbizz'),
		'params' => array(
			array(
				'type' => 'brainbizz_radio_image',
				'heading' => esc_html__('Testimonials Type', 'brainbizz'),
				'param_name' => 'item_type',
				'fields' => array(
					'default' => array(
						'image_url' => get_template_directory_uri().'/img/wgl_composer_addon/icons/testimonials_1.png',
						'label' => esc_html__('Default', 'brainbizz')),
					'author_top_inline' => array(
						'image_url' => get_template_directory_uri().'/img/wgl_composer_addon/icons/testimonials_2.png',
						'label' => esc_html__('Author Top Inline', 'brainbizz')),
					'author_bottom_inline' => array(
						'image_url' => get_template_directory_uri().'/img/wgl_composer_addon/icons/testimonials_3.png',
						'label' => esc_html__('Author Bottom Inline', 'brainbizz')),
					'author_bottom' => array(
						'image_url' => get_template_directory_uri().'/img/wgl_composer_addon/icons/testimonials_3.png',
						'label' => esc_html__('Author Bottom', 'brainbizz')),
				),
				'value' => 'default',
				'admin_label' => true,
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__( 'Testimonials Grid', 'brainbizz' ),
				"param_name" => "item_grid",
				"value" => array(
					esc_html__( 'One Column', 'brainbizz' ) => '1',
					esc_html__( 'Two Columns', 'brainbizz' ) => '2',
					esc_html__( 'Three Columns', 'brainbizz' ) => '3',
					esc_html__( 'Four Columns', 'brainbizz' ) => '4',
					esc_html__( 'Five Columns', 'brainbizz' ) => '5',
				),              
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Alignment', 'brainbizz' ),
				'param_name' => 'item_align',
				'value' => array(
					esc_html__( 'Left', 'brainbizz' ) => 'left',
					esc_html__( 'Center', 'brainbizz' ) => 'center',
					esc_html__( 'Right', 'brainbizz' ) => 'right',
				),
			),
			vc_map_add_css_animation( true ),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra Class', 'brainbizz'),
				'param_name' => 'extra_class',
				'description' => esc_html__('Add an extra class name to the element and refer to it from Custom CSS option.', 'brainbizz')
			),
			array(
				'type' => 'param_group',
				'heading' => esc_html__( 'Values', 'brainbizz' ),
				'description' => esc_html__( 'Enter values for graph - thumbnail, quote, author name and author status.', 'brainbizz' ),
				'param_name' => 'values',
				'params' => array(
					array(
						"type" => "attach_image",
						"heading" => esc_html__( 'Thumbnail', 'brainbizz' ),
						"param_name" => "thumbnail",
					),
					array(
						"type" => "textarea",
						"heading" => esc_html__( 'Quote', 'brainbizz' ),
						"param_name" => "quote",
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( 'Author Name', 'brainbizz' ),
						"param_name" => "author_name",
						'admin_label' => true,
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( 'Author Status', 'brainbizz' ),
						"param_name" => "author_status",
					),
				),
				'group' => esc_html__( 'Items', 'brainbizz' ),
			),
			// image styles heading
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Custom Image Styles', 'brainbizz'),
				'param_name' => 'h_image_styles',
				'group' => esc_html__( 'Items', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
			),
			// Custom image size
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Enter Image Width', 'brainbizz'),
				'param_name' => 'custom_img_width',
				'description' => esc_html__( 'Custom width in pixels.', 'brainbizz' ),
				'group' => esc_html__( 'Items', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			// Custom image size
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Enter Image Height', 'brainbizz'),
				'param_name' => 'custom_img_height',
				'description' => esc_html__( 'Custom height in pixels.', 'brainbizz' ),
				'group' => esc_html__( 'Items', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			// Custom image radius
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Enter Image Radius', 'brainbizz'),
				'param_name' => 'custom_img_radius',
				'description' => esc_html__( 'Custom radius in pixels.', 'brainbizz' ),
				'group' => esc_html__( 'Items', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			// carousel heading
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Add Carousel for Testimonials Items', 'brainbizz'),
				'param_name' => 'h_carousel',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12 no-top-margin',
			),
			array(
				"type"          => "wgl_checkbox",
				'heading' => esc_html__( 'Use Carousel', 'brainbizz' ),
				"param_name"    => "use_carousel",
				'edit_field_class' => 'vc_col-sm-4',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
			),
			array(
				"type" => "wgl_checkbox",
				'heading' => esc_html__( 'Autoplay', 'brainbizz' ),
				"param_name" => "autoplay",
				"dependency" => array(
					"element"   => "use_carousel",
					"value" => 'true'
				),
				'edit_field_class' => 'vc_col-sm-4',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( 'Autoplay Speed', 'brainbizz' ),
				"param_name" => "autoplay_speed",
				"dependency" => array(
					"element" => "autoplay",
					"value" => 'true'
				),
				'edit_field_class' => 'vc_col-sm-4',
				"value" => "3000",
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
			),
			// carousel pagination heading
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Pagination Controls', 'brainbizz'),
				'param_name' => 'h_pag_controls',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
				"dependency" => array(
					"element" => "use_carousel",
					"value" => 'true'
				),
			),
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Add Pagination control', 'brainbizz' ),
				'param_name' => 'use_pagination',
				'edit_field_class' => 'vc_col-sm-12',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
				"dependency"    => array(
					"element"   => "use_carousel",
					"value" => 'true'
				),
				'std' => 'true'
			),
			array(
				'type' => 'brainbizz_radio_image',
				'heading' => esc_html__('Pagination Type', 'brainbizz'),
				'param_name' => 'pag_type',
				'fields' => array(
					'circle' => array(
						'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_circle.png',
						'label' => esc_html__('Circle', 'brainbizz')),
					'circle_border' => array(
						'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_circle_border.png',
						'label' => esc_html__('Empty Circle', 'brainbizz')),
					'square' => array(
						'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_square.png',
						'label' => esc_html__('Square', 'brainbizz')),
					'line' => array(
						'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_line.png',
						'label' => esc_html__('Line', 'brainbizz')),
					'line_circle' => array(
						'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_line_circle.png',
						'label' => esc_html__('Line - Circle', 'brainbizz')),
				),
				'value' => 'line',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => 'true',
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Pagination Top Offset', 'brainbizz' ),
				'param_name' => 'pag_offset',
				'value' => '',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
				'description' => esc_html__( 'Enter pagination top offset in pixels.', 'brainbizz' ),
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => 'true',
				),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Pagination Aligning', 'brainbizz'),
				'param_name' => 'pag_align',
				'value' => array(
					esc_html__('Left', 'brainbizz')	=> 'left',
					esc_html__('Right', 'brainbizz')	=> 'right',
					esc_html__('Center', 'brainbizz')	=> 'center',
				),
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => 'true',
				),
				'edit_field_class' => 'vc_col-sm-6',
				'std' => 'center',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
			),
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Custom Pagination Color', 'brainbizz' ),
				'param_name' => 'custom_pag_color',
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => 'true',
				),
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Pagination Color', 'brainbizz'),
				'param_name' => 'pag_color',
				'value' => $header_font_color,
				'dependency' => array(
					'element' => 'custom_pag_color',
					'value' => 'true'
				),
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// carousel pagination heading
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Responsive', 'brainbizz'),
				'param_name' => 'h_resp',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
				"dependency" => array(
					"element" => "use_carousel",
					"value" => 'true'
				),
			),
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Customize Responsive', 'brainbizz' ),
				'param_name' => 'custom_resp',
				"dependency"  => array(
					"element" => "use_carousel",
					"value" => 'true'
				),
				'edit_field_class' => 'vc_col-sm-12 no-top-margin',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
			),
			// medium desktop
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Medium Desktop', 'brainbizz'),
				'param_name' => 'h_resp_medium',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
				'dependency' => array(
					'element' => 'custom_resp',
					'value' => 'true',
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Screen resolution', 'brainbizz' ),
				'param_name' => 'resp_medium',
				'value' => '1025',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'custom_resp',
					'value' => 'true',
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Slides to show', 'brainbizz' ),
				'param_name' => 'resp_medium_slides',
				'value' => '',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'custom_resp',
					'value' => 'true',
				),
			),
			
			// tablets
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Tablets', 'brainbizz'),
				'param_name' => 'h_resp_tablets',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
				'dependency' => array(
					'element' => 'custom_resp',
					'value' => 'true',
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Screen resolution', 'brainbizz' ),
				'param_name' => 'resp_tablets',
				'value' => '800',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'custom_resp',
					'value' => 'true',
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Slides to show', 'brainbizz' ),
				'param_name' => 'resp_tablets_slides',
				'value' => '',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'custom_resp',
					'value' => 'true',
				),
			),
			// mobile phones
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Mobile Phones', 'brainbizz'),
				'param_name' => 'h_resp_mobile',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
				'dependency' => array(
					'element' => 'custom_resp',
					'value' => 'true',
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Screen resolution', 'brainbizz' ),
				'param_name' => 'resp_mobile',
				'value' => '480',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'custom_resp',
					'value' => 'true',
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Slides to show', 'brainbizz' ),
				'param_name' => 'resp_mobile_slides',
				'value' => '',
				'group' => esc_html__( 'Carousel', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'custom_resp',
					'value' => 'true',
				),
			),
			// quote styles heading
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Quote Styles', 'brainbizz'),
				'param_name' => 'h_quote_styles',
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12 no-top-margin',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Quote Tag', 'brainbizz' ),
				'param_name' => 'quote_tag',
				'value' => array(
					esc_html__( 'Div', 'brainbizz' ) => 'div',
					esc_html__( 'Span', 'brainbizz' ) => 'span',
					esc_html__( 'H2', 'brainbizz' )	=> 'h2',
					esc_html__( 'H3', 'brainbizz' )	=> 'h3',
					esc_html__( 'H4', 'brainbizz' )	=> 'h4',
					esc_html__( 'H5', 'brainbizz' )	=> 'h5',
					esc_html__( 'H6', 'brainbizz' )	=> 'h6',
				),
				'std' => 'div',
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'description' => esc_html__( 'Choose your tag for quote', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			// quote Font Size
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Quote Font Size', 'brainbizz'),
				'param_name' => 'quote_size',
				'value' => '',
				'description' => esc_html__( 'Enter quote font-size in pixels.', 'brainbizz' ),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			// Quote Fonts
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Custom font family for quote', 'brainbizz' ),
				'param_name' => 'custom_fonts_quote',
				'description' => esc_html__( 'Customize font family', 'brainbizz' ),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type' => 'google_fonts',
				'param_name' => 'google_fonts_quote',
				'value' => '',
				'dependency' => array(
					'element' => 'custom_fonts_quote',
					'value' => 'true',
				),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
			),
			// quote color checkbox
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Use Custom Quote Color', 'brainbizz' ),
				'param_name' => 'custom_quote_color',
				'description' => esc_html__( 'Use custom color?', 'brainbizz' ),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
			),
			// quote color
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Quote Color', 'brainbizz'),
				'param_name' => 'quote_color',
				'value' => '#000000',
				'description' => esc_html__('Select custom color', 'brainbizz'),
				'dependency' => array(
					'element' => 'custom_quote_color',
					'value' => 'true'
				),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
			),
			// quote color checkbox
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Use Custom Quote Icon Color', 'brainbizz' ),
				'param_name' => 'custom_quote_icon_color',
				'description' => esc_html__( 'Use custom color?', 'brainbizz' ),
				'dependency' => array(
					'element' => 'item_type',
					'value' => array('author_top_inline', 'author_bottom_inline')
				),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
			),
			// quote icon color
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Quote Icon Color', 'brainbizz'),
				'param_name' => 'quote_icon_color',
				'value' => '#f6f4f0',
				'description' => esc_html__('Select color', 'brainbizz'),
				'dependency' => array(
					'element' => 'custom_quote_icon_color',
					'value' => 'true'
				),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
			),
			// author name styles heading
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Author Name Styles', 'brainbizz'),
				'param_name' => 'h_name_styles',
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Author Name Tag', 'brainbizz' ),
				'param_name' => 'name_tag',
				'value' => array(
					esc_html__( 'Span', 'brainbizz' ) => 'span',
					esc_html__( 'Div', 'brainbizz' ) => 'div',
					esc_html__( 'H2', 'brainbizz' )	=> 'h2',
					esc_html__( 'H3', 'brainbizz' )	=> 'h3',
					esc_html__( 'H4', 'brainbizz' )	=> 'h4',
					esc_html__( 'H5', 'brainbizz' )	=> 'h5',
					esc_html__( 'H6', 'brainbizz' )	=> 'h6',
				),
				'std' => 'h3',
				'group'         => esc_html__( 'Styles', 'brainbizz' ),
				'description' => esc_html__( 'Choose your tag for author name', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// author name Font Size
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Author Name Font Size', 'brainbizz'),
				'param_name' => 'name_size',
				'value' => '',
				'description' => esc_html__( 'Enter author name font-size in pixels.', 'brainbizz' ),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// author name Fonts
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Custom font family for author name', 'brainbizz' ),
				'param_name' => 'custom_fonts_name',
				'description' => esc_html__( 'Customize font family', 'brainbizz' ),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
			),
			array(
				'type' => 'google_fonts',
				'param_name' => 'google_fonts_name',
				'value' => '',
				'dependency' => array(
					'element' => 'custom_fonts_name',
					'value' => 'true',
				),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
			),
			// author name color checkbox
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Use Custom Author Name Color', 'brainbizz' ),
				'param_name' => 'custom_name_color',
				'description' => esc_html__( 'Select custom color', 'brainbizz' ),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			// author name color
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Author Name Color', 'brainbizz'),
				'param_name' => 'name_color',
				'value' => '#000000',
				'description' => esc_html__('Select author name color', 'brainbizz'),
				'dependency' => array(
					'element' => 'custom_name_color',
					'value' => 'true'
				),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			// author status styles heading
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Author Status Styles', 'brainbizz'),
				'param_name' => 'h_status_styles',
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Author Status Tag', 'brainbizz' ),
				'param_name' => 'status_tag',
				'value' => array(
					esc_html__( 'Span', 'brainbizz' ) => 'span',
					esc_html__( 'Div', 'brainbizz' ) => 'div',
					esc_html__( 'H2', 'brainbizz' )	=> 'h2',
					esc_html__( 'H3', 'brainbizz' )	=> 'h3',
					esc_html__( 'H4', 'brainbizz' )	=> 'h4',
					esc_html__( 'H5', 'brainbizz' )	=> 'h5',
					esc_html__( 'H6', 'brainbizz' )	=> 'h6',
				),
				'std' => 'span',
				'group'         => esc_html__( 'Styles', 'brainbizz' ),
				'description' => esc_html__( 'Choose your tag for author status', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// author status Font Size
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Author Status Font Size', 'brainbizz'),
				'param_name' => 'status_size',
				'value' => '',
				'description' => esc_html__( 'Enter author status font-size in pixels.', 'brainbizz' ),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// author status Fonts
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Custom font family for author status', 'brainbizz' ),
				'param_name' => 'custom_fonts_status',
				'description' => esc_html__( 'Customize font family', 'brainbizz' ),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
			),
			array(
				'type' => 'google_fonts',
				'param_name' => 'google_fonts_status',
				'value' => '',
				'dependency' => array(
					'element' => 'custom_fonts_status',
					'value' => 'true',
				),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
			),
			// author status color checkbox
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Use Custom Author Status Color', 'brainbizz' ),
				'param_name' => 'custom_status_color',
				'value' => 'true',
				'description' => esc_html__( 'Select custom color', 'brainbizz' ),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
			// author status color
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Author Status Color', 'brainbizz'),
				'param_name' => 'status_color',
				'value' => '#8e8e8e',
				'description' => esc_html__('Select author status color', 'brainbizz'),
				'dependency' => array(
					'element' => 'custom_status_color',
					'value' => 'true'
				),
				'group' => esc_html__( 'Styles', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
		)
	));

	if (class_exists('WPBakeryShortCode')) {
		class WPBakeryShortCode_wgl_Testimonials extends WPBakeryShortCode {}
	}
}
