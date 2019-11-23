<?php

$theme_gradient = BrainBizz_Theme_Helper::get_option('theme-gradient');

if (function_exists('vc_map')) {
    vc_map(array(		
		
        'base' => 'wgl_ico_progress',
        'name' => esc_html__('Ico Progress', 'brainbizz'),
		'class' => 'brainbizz_ico_progress_module',
        'description' => esc_html__('Display Ico Progress Module', 'brainbizz'),
        'as_parent' => array('only' => 'wgl_countdown, wgl_button, vc_column_text, wgl_custom_text, vc_single_image, vc_row , wgl_ico_progress_bar, wgl_spacing'),
		'content_element' => true,		
        'category' => esc_html__('WGL Modules', 'brainbizz'),
        'icon' => 'wgl_ico-mod',
		'show_settings_on_create' => true,
		'is_container' => true,
        'params' => array(
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Background Colors', 'brainbizz'),
                'param_name' => 'h_bg_bg_colors',
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Background Customize Colors', 'brainbizz' ),
                'param_name'    => 'bg_color_type',
                'value'         => array(
                    esc_html__( 'Default', 'brainbizz' )      => 'def',
                    esc_html__( 'Color', 'brainbizz' )      => 'color',
                    esc_html__( 'Gradient', 'brainbizz' )     => 'gradient',
                ),
            ),	
            // background color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Color', 'brainbizz'),
                'param_name' => 'bg_color',
                'value' => 'rgba(0,0,32,0.7)',
                'description' => esc_html__('Select background color', 'brainbizz'),
                'dependency' => array(
                    'element' => 'bg_color_type',
                    'value' => 'color'
                ),
                'edit_field_class' => 'vc_col-sm-6',
            ),	
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Start Color', 'brainbizz'),
                'param_name' => 'bg_gradient_start',
                'value' => $theme_gradient['from'],
                'dependency' => array(
                    'element' => 'bg_color_type',
                    'value' => 'gradient'
                ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // background Gradient end
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background End Color', 'brainbizz'),
                'param_name' => 'bg_gradient_end',
                'value' => $theme_gradient['to'],
                'dependency' => array(
                    'element' => 'bg_color_type',
                    'value' => 'gradient'
                ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // button paddings
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Ico Paddings', 'brainbizz'),
                'param_name' => 'heading',
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Ico Left Padding', 'brainbizz'),
                'param_name' => 'ico_left_pad',
                'value' => '30',
                'description' => esc_html__( 'Enter Ico left padding in pixels.', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Ico Right Padding', 'brainbizz'),
                'param_name' => 'ico_right_pad',
                'value' => '30',
                'description' => esc_html__( 'Enter Ico right padding in pixels.', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Ico Top Padding', 'brainbizz'),
                'param_name' => 'ico_top_pad',
                'value' => '30',
                'description' => esc_html__( 'Enter Ico top padding in pixels.', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Ico Bottom Padding', 'brainbizz'),
                'param_name' => 'ico_bottom_pad',
                'value' => '30',
                'description' => esc_html__( 'Enter Ico bottom padding in pixels.', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            vc_map_add_css_animation( true ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', 'brainbizz'),
                'param_name' => 'extra_class',
                'description' => esc_html__('Add an extra class name to the element and refer to it from Custom CSS option.', 'brainbizz')
            ),
        ),
		'js_view' => 'VcColumnView'
    ));


    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_wgl_Ico_Progress extends WPBakeryShortCodesContainer
        {
        }
    }
}