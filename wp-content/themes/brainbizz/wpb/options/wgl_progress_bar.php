<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$theme_color = esc_attr(BrainBizz_Theme_Helper::get_option("theme-custom-color"));
$header_font_color = esc_attr(BrainBizz_Theme_Helper::get_option('header-font')['color']);

if (function_exists('vc_map')) {
    vc_map(array(
        'name' => esc_html__('Progress Bar', 'brainbizz'),
        'base' => 'wgl_progress_bar',
        'class' => 'brainbizz_progress_bar',
        'category' => esc_html__('WGL Modules', 'brainbizz'),
        'icon' => 'wgl_icon_progress_bar',
        'content_element' => true,
        'description' => esc_html__('Display Progress Bar','brainbizz'),
        'params' => array(
            array(
                'type' => 'param_group',
                'param_name' => 'values',
                'description' => esc_html__( 'Enter values for graph - point label and point value.', 'brainbizz' ),
                'params' => array(
                    array(
                        "type" => "textfield",
                        "heading" => esc_html__( 'Label', 'brainbizz' ),
                        "param_name" => "label",
                        'admin_label' => true,
                        "description" => esc_html__( 'Enter text used as title of bar.', 'brainbizz' ),
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => esc_html__( 'Value', 'brainbizz' ),
                        "param_name" => "point_value",
                        "description" => esc_html__( 'Enter value of bar.', 'brainbizz' ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Progress Bar Customize Color', 'brainbizz' ),
                        'param_name' => 'bar_color_type',
                        'value' => array(
                            esc_html__( 'Default', 'brainbizz' ) => 'def',
                            esc_html__( 'Color', 'brainbizz' ) => 'color',
                        ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Text Color', 'brainbizz'),
                        'param_name' => 'text_color',
                        'value' => $header_font_color,
                        'description' => esc_html__('Select custom color', 'brainbizz'),
                        'dependency' => array(
                            'element' => 'bar_color_type',
                            'value' => 'color'
                        ),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Bar Color', 'brainbizz'),
                        'param_name' => 'bar_color',
                        'value' => $theme_color,
                        'description' => esc_html__('Select custom color', 'brainbizz'),
                        'dependency' => array(
                            'element' => 'bar_color_type',
                            'value' => 'color'
                        ),
                        'edit_field_class' => 'vc_col-sm-6',
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Background Bar Color', 'brainbizz'),
                        'param_name' => 'bg_bar_color',
                        'value' => '#e8e9f2',
                        'description' => esc_html__('Select custom color', 'brainbizz'),
                        'dependency' => array(
                            'element' => 'bar_color_type',
                            'value' => 'color'
                        ),
                        'edit_field_class' => 'vc_col-sm-6',
                    ),
                ),
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( 'Units', 'brainbizz' ),
                "param_name" => "units",
                'value' => '%',
                'description' => esc_html__('Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'brainbizz'),
            ),
            vc_map_add_css_animation( true ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', 'brainbizz'),
                'param_name' => 'extra_class',
                'description' => esc_html__('Add an extra class name to the element and refer to it from Custom CSS option.', 'brainbizz')
            ),
        )
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_wgl_Progress_Bar extends WPBakeryShortCode {
        }
    }
}
