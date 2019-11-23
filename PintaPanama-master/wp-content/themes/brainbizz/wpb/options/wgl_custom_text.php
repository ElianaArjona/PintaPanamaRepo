<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$main_font = BrainBizz_Theme_Helper::get_option('main-font');

if (function_exists('vc_map')) {
// Add list item
    vc_map(array(
        'name' => esc_html__('WGL Text Module', 'brainbizz'),
        'base' => 'wgl_custom_text',
        'class' => 'brainbizz_custom_text',
        'category' => esc_html__('WGL Modules', 'brainbizz'),
        'icon' => 'wgl_icon_custom_text',
        'content_element' => true,
        'description' => esc_html__('Text with responsive settings','brainbizz'),
        'params' => array(
            array(
                'type' => 'textarea_html',
                'holder' => 'div',
                'heading' => esc_html__('Content.', 'brainbizz') ,
                'param_name' => 'content',
            ),
            vc_map_add_css_animation( true ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', 'brainbizz'),
                'param_name' => 'extra_class',
                'description' => esc_html__('Add an extra class name to the element and refer to it from Custom CSS option.', 'brainbizz')
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Font Size', 'brainbizz'),
                'param_name' => 'font_size',
                'value' => (int)$main_font['font-size'],
                'description' => esc_html__( 'Enter font-size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4 no-top-padding',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Line Height', 'brainbizz'),
                'param_name' => 'line_height',
                'value' => $main_font['line-height'],
                'description' => esc_html__( 'Enter line height in px.', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4 no-top-padding',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom font family for text', 'brainbizz' ),
                'param_name' => 'custom_fonts',
                'description' => esc_html__( 'Customize font family', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_text',
                'value' => '',
                'dependency' => array(
                    'element' => 'custom_fonts',
                    'value' => 'true',
                ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
            ), 
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Desktops typography settings', 'brainbizz'),
                'param_name' => 'h_responsive_elements',
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Desktops', 'brainbizz' ),
                'param_name' => 'responsive_font_desktop',
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-2',
            ),
            array( 
                'type' => 'textfield',
                'heading' => esc_html__('Font Size Desktops', 'brainbizz'),
                'param_name' => 'font_size_desktop',
                'description' => esc_html__( 'Enter font-size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-5',
                'dependency' => array(
                    'element' => 'responsive_font_desktop',
                    'value' => 'true'
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Line Height Desktops', 'brainbizz'),
                'param_name' => 'line_height_desktop',
                'value' => $main_font['line-height'],
                'description' => esc_html__( 'Enter line height in px.', 'brainbizz' ),
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-5',
                'dependency' => array(
                    'element' => 'responsive_font_desktop',
                    'value' => 'true'
                ),
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Tablet typography settings', 'brainbizz'),
                'param_name' => 'h_responsive_elements_talet',
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Tablet', 'brainbizz' ),
                'param_name' => 'responsive_font_tablet',
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-2',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Font Size for Tablets', 'brainbizz'),
                'param_name' => 'font_size_tablet',
                'description' => esc_html__( 'Enter font-size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-5',
                'dependency' => array(
                    'element' => 'responsive_font_tablet',
                    'value' => 'true'
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Line Height Tablet', 'brainbizz'),
                'param_name' => 'line_height_tablet',
                'value' => $main_font['line-height'],
                'description' => esc_html__( 'Enter line height in px.', 'brainbizz' ),
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-5',
                'dependency' => array(
                    'element' => 'responsive_font_tablet',
                    'value' => 'true'
                ),
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Mobile typography settings', 'brainbizz'),
                'param_name' => 'h_responsive_elements_mobile',
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Mobile', 'brainbizz' ),
                'param_name' => 'responsive_font_mobile',
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                 'edit_field_class' => 'vc_col-sm-2',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Font Size for Mobile', 'brainbizz'),
                'param_name' => 'font_size_mobile',
                'description' => esc_html__( 'Enter font-size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-5',
                'dependency' => array(
                    'element' => 'responsive_font_mobile',
                    'value' => 'true'
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Line Height Mobile', 'brainbizz'),
                'param_name' => 'line_height_mobile',
                'value' => $main_font['line-height'],
                'description' => esc_html__( 'Enter line height in px.', 'brainbizz' ),
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-5',
                'dependency' => array(
                    'element' => 'responsive_font_mobile',
                    'value' => 'true'
                ),
            ),              
        )
    ));
    
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_wgl_custom_text extends WPBakeryShortCode {
            
        }
    } 
}
