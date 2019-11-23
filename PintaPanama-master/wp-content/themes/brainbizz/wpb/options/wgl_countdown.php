<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$main_font = BrainBizz_Theme_Helper::get_option('main-font');
$theme_color = esc_attr(BrainBizz_Theme_Helper::get_option("theme-custom-color"));
$header_font = BrainBizz_Theme_Helper::get_option('header-font');
if (function_exists('vc_map')) {
    vc_map(array(
        'name' => esc_html__('Countdown Timer', 'brainbizz'),
        'base' => 'wgl_countdown',
        'class' => 'brainbizz_countdown',
        'content_element' => true,
        'description' => esc_html__('Countdown','brainbizz'),
        'category' => esc_html__('WGL Modules', 'brainbizz'),
        'icon' => 'wgl_icon_countdown',
        'params' => array(
            array(
                'type'          => 'brainbizz_param_heading',
                'heading' => esc_html__('Countdown Date:', 'brainbizz'),
                'param_name'    => 'h_date',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Year', 'brainbizz'),
                'param_name' => 'countdown_year',
                'edit_field_class' => 'vc_col-sm-2',
                'description' => esc_html__('Enter year example: 2018', 'brainbizz'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Month', 'brainbizz'),
                'param_name' => 'countdown_month',
                'edit_field_class' => 'vc_col-sm-2',
                'description' => esc_html__('Enter month example: 03', 'brainbizz'),
            ),            
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Day', 'brainbizz'),
                'param_name' => 'countdown_day',
                'edit_field_class' => 'vc_col-sm-2',
                'description' => esc_html__('Enter day example: 28', 'brainbizz'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Hours', 'brainbizz'),
                'param_name' => 'countdown_hours', 
                'edit_field_class' => 'vc_col-sm-2',
                'description' => esc_html__('Enter hours example: 13', 'brainbizz'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Minutes', 'brainbizz'),
                'param_name' => 'countdown_min',
                'edit_field_class' => 'vc_col-sm-2',
                'description' => esc_html__('Enter min. example: 24', 'brainbizz'),
            ), 
            array(
                "type"          => "brainbizz_param_heading",
                "heading" => esc_html__("Countdown Hide:", 'brainbizz'),
                "param_name"    => "h_hide",
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Hide Days?', 'brainbizz' ),
                'param_name' => 'hide_day',
                'edit_field_class' => 'vc_col-sm-3',
            ),            
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Hide Hours?', 'brainbizz' ),
                'param_name' => 'hide_hours',
                'edit_field_class' => 'vc_col-sm-3',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Hide Minutes?', 'brainbizz' ),
                'param_name' => 'hide_minutes',
                'edit_field_class' => 'vc_col-sm-3',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Hide Seconds?', 'brainbizz' ),
                'param_name' => 'hide_seconds',
                'edit_field_class' => 'vc_col-sm-3',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom font family for a countdown?', 'brainbizz' ),
                'param_name' => 'custom_fonts_countdown',
                'description' => esc_html__( 'Customize font family', 'brainbizz' ),
                'group' => esc_html__( 'Style', 'brainbizz' ),
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_countdown',
                'value' => '',
                'dependency' => array(
                    'element' => 'custom_fonts_countdown',
                    'value' => 'true',
                ),
                'group' => esc_html__( 'Style', 'brainbizz' ),
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Size", 'brainbizz'),
                "param_name" => "size",
                "value" => array(
                    esc_html__("Small",'brainbizz') => "small",
                    esc_html__("Medium",'brainbizz') => "medium",
                    esc_html__("Large",'brainbizz') => "large",
                    esc_html__("Extra Large",'brainbizz') => "e_large",
                    esc_html__("Custom",'brainbizz') => "custom",
                ),
                'std'         => 'large', 
                'group' => esc_html__( 'Style', 'brainbizz' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Custom Font Size', 'brainbizz'),
                'param_name' => 'font_size',
                'description' => esc_html__('Enter font-size in pixels', 'brainbizz'),
                'edit_field_class' => 'vc_col-sm-4',
                'dependency' => array(
                    'element' => 'size',
                    'value' => 'custom',
                ),
                'group' => esc_html__( 'Style', 'brainbizz' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Custom Font Size Numner', 'brainbizz'),
                'param_name' => 'font_size_number',
                'description' => esc_html__('Enter font-size in em', 'brainbizz'),
                'edit_field_class' => 'vc_col-sm-4',
                'dependency' => array(
                    'element' => 'size',
                    'value' => 'custom',
                ),
                'group' => esc_html__( 'Style', 'brainbizz' ),
            ),           
             array(
                'type' => 'textfield',
                'heading' => esc_html__('Custom Font Size Text', 'brainbizz'),
                'param_name' => 'font_size_text',
                'description' => esc_html__('Enter font-size in em', 'brainbizz'),
                'edit_field_class' => 'vc_col-sm-4',
                'dependency' => array(
                    'element' => 'size',
                    'value' => 'custom',
                ),
                'group' => esc_html__( 'Style', 'brainbizz' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Custom Number Weight', 'brainbizz'),
                'param_name' => 'font_weight',
                'description' => esc_html__('Enter font-weight in pixels', 'brainbizz'),
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Style', 'brainbizz' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Custom Text Weight', 'brainbizz'),
                'param_name' => 'font_text_weight',
                'description' => esc_html__('Enter font-weight in pixels', 'brainbizz'),
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Style', 'brainbizz' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Align', 'brainbizz' ),
                'param_name' => 'align',
                "value"         => array(
                    esc_html__( 'Left', 'brainbizz' ) => 'left',
                    esc_html__( 'Center', 'brainbizz' ) => 'center',
                    esc_html__( 'Right', 'brainbizz' ) => 'right',
                ),
                'std' => 'center',
                'group' => esc_html__( 'Style', 'brainbizz' ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__('Number Color', 'brainbizz'),
                'param_name' => 'number_color',
                'value' => "#ffffff",
                'group' => esc_html__( 'Style', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ), 
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__('Text Color', 'brainbizz'),
                'param_name' => 'countdown_color',
                'value' => "#ffffff",
                'group' => esc_html__( 'Style', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ), 
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__('Points Color', 'brainbizz'),
                'param_name' => 'points_color',
                'value' => $theme_color,
                'group' => esc_html__( 'Style', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),                     
        )
    ));
    
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_wgl_countdown extends WPBakeryShortCode {}
    } 
}