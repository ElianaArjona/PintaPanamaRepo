<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$theme_color = esc_attr(BrainBizz_Theme_Helper::get_option("theme-custom-color"));
$header_font_color = esc_attr(BrainBizz_Theme_Helper::get_option('header-font')['color']);

if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'wgl_video_popup',
        'name' => esc_html__('Video Popup', 'brainbizz'),
        'description' => esc_html__('Create a Button or Poster for Video Popup.', 'brainbizz'),
        'category' => esc_html__('WGL Modules', 'brainbizz'),
        'icon' => 'wgl_icon_video_popup',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title', 'brainbizz'),
                'param_name' => 'title',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Title Position', 'brainbizz' ),
                'param_name' => 'title_pos',
                'value' => array(
                    esc_html__( 'Left', 'brainbizz' )   => 'left',
                    esc_html__( 'Right', 'brainbizz' )  => 'right',
                    esc_html__( 'Top', 'brainbizz' )    => 'top',
                    esc_html__( 'Bottom', 'brainbizz' ) => 'bot',
                ),
                'std' => 'bot',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Video Popup Button Alignment', 'brainbizz' ),
                'param_name' => 'button_pos',
                'value' => array(
                    esc_html__( 'Left', 'brainbizz' )   => 'left',
                    esc_html__( 'Center', 'brainbizz' ) => 'center',
                    esc_html__( 'Right', 'brainbizz' )  => 'right',
                    esc_html__( 'Inline', 'brainbizz' ) => 'inline',
                ),
                'std' => 'center',
            ),            
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Always Pulse Animation on Button', 'brainbizz' ),
                'param_name' => 'always_pulse_anim',
            ),           
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Video Link', 'brainbizz'),
                'param_name' => 'link',
                'description' => esc_html__('Enter video link from youtube or vimeo.', 'brainbizz')
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Background Image Video', 'brainbizz'),
                'param_name' => 'bg_image',
                'description' => esc_html__('Select video background image.', 'brainbizz')
            ),
            vc_map_add_css_animation( true ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', 'brainbizz'),
                'param_name' => 'extra_class',
                'description' => esc_html__('Add an extra class name to the element and refer to it from Custom CSS option.', 'brainbizz')
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Title Styles', 'brainbizz'),
                'param_name' => 'h_background_title_styles',
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Title color', 'brainbizz'),
                'param_name' => 'title_color',
                'value' => '#ffffff',
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom font family for Video Popup title?', 'brainbizz' ),
                'param_name' => 'custom_fonts_title',
                'description' => esc_html__( 'Customize font family', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_title',
                'value' => '',
                'dependency' => array(
                    'element' => 'custom_fonts_title',
                    'value' => 'true',
                ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Video Popup Title Font Size', 'brainbizz'),
                'param_name' => 'title_size',
                'value' => '14',
                'description' => esc_html__( 'Enter Video Popup Title font-size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Button Styles', 'brainbizz'),
                'param_name' => 'h_background_title_styles',
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            // Background color/gradient
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom Triangle Size', 'brainbizz' ),
                'param_name' => 'custom_triangle_size',
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Triangle Size', 'brainbizz'),
                'param_name' => 'triangle_size',
                'description' => esc_html__( 'Enter triangle size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'custom_triangle_size',
                    'value' => 'true',
                ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom Triangle Color', 'brainbizz' ),
                'param_name' => 'custom_button_color',
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
                
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Triangle color', 'brainbizz'),
                'param_name' => 'button_color',
                'value' => '#ffffff',
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'custom_button_color',
                    'value' => 'true',
                ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Background Customize Colors', 'brainbizz' ),
                'param_name' => 'bg_color_type',
                'value' => array(
                    esc_html__( 'Default', 'brainbizz' )  => 'def',
                    esc_html__( 'Color', 'brainbizz' )    => 'color',
                    esc_html__( 'Gradient', 'brainbizz' ) => 'gradient',
                ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Color', 'brainbizz'),
                'param_name' => 'background_color',
                'value' => $theme_color,
                'description' => esc_html__('Select background color', 'brainbizz'),
                'dependency' => array(
                    'element' => 'bg_color_type',
                    'value' => 'color'
                ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Start Color', 'brainbizz'),
                'param_name' => 'background_gradient_start',
                'value' => '',
                'dependency' => array(
                    'element' => 'bg_color_type',
                    'value' => 'gradient'
                ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
			array(
				'type' 		 => 'colorpicker',
				'heading'	 => esc_html__('Background End Color', 'brainbizz'),
				'param_name' => 'background_gradient_end',
				'value' 	 => '',
				'dependency' => array(
					'element' => 'bg_color_type',
					'value'	  => 'gradient'
				),
				'group' => esc_html__( 'Styling', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Animation Styles
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Animation Styles', 'brainbizz'),
				'param_name' => 'animated_circles_styles',
				'group' => esc_html__( 'Styling', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-12',
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Animation Color', 'brainbizz'),
				'param_name' => 'animation_color',
				'value' => '#ffffff',
                'description' => esc_html__('Select color of animated circles', 'brainbizz'),
				'group' => esc_html__( 'Styling', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-4',
			),
		),
    ));

    class WPBakeryShortCode_wgl_Video_Popup extends WPBakeryShortCode { }

}