<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$theme_color = esc_attr(BrainBizz_Theme_Helper::get_option("theme-custom-color"));

if (function_exists('vc_map')) {
    vc_map(array(
        'name' => esc_html__('Ico Progress Bar', 'brainbizz'),
        'base' => 'wgl_ico_progress_bar',
        'class' => 'brainbizz_ico_progress_bar',
        'category' => esc_html__('WGL Modules', 'brainbizz'),
        'icon' => 'wgl_ico-mod',
        'content_element' => true,
        'description' => esc_html__('Display Ico Progress Bar','brainbizz'),
        'params' => array(
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Max Value', 'brainbizz' ),
                "param_name"    => "max_value",
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Max Value Label', 'brainbizz' ),
                "param_name"    => "max_value_label",
                'edit_field_class' => 'vc_col-sm-6 no-top-padding',
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Completed', 'brainbizz' ),
                "param_name"    => "completed",
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Completed Label', 'brainbizz' ),
                "param_name"    => "completed_label",
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Units', 'brainbizz' ),
                "param_name"    => "units",
                "value"    => "$",
                "description"   => esc_html__( 'Enter measurement units (Example: %, px, points, etc.)', 'brainbizz' ),
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Max Ico Progress Bar Width', 'brainbizz' ),
                "param_name"    => "max_width",
                "description"   => esc_html__( 'Enter max width in pixels', 'brainbizz' ),
            ),
            vc_map_add_css_animation( true ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', 'brainbizz'),
                'param_name' => 'extra_class',
                'description' => esc_html__('Add an extra class name to the element and refer to it from Custom CSS option.', 'brainbizz')
            ),
            // Ico Progress Bar Points
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Ico Progress Bar Points', 'brainbizz'),
                'param_name' => 'h_bar_points',
                'group' => esc_html__( 'Points', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
            ),
            array(
                'type' => 'param_group',
                'param_name' => 'values',
                'description' => esc_html__( 'Enter values for graph - point label and point value.', 'brainbizz' ),
                'group' => esc_html__( 'Points', 'brainbizz' ),
                'value' => urlencode( json_encode( array(
                    array(
                        'point_label' => esc_html__( 'Soft Cap', 'brainbizz' ),
                        'point_value' => '25',
                    ),
                    array(
                        'point_label' => esc_html__( 'Hard Cap', 'brainbizz' ),
                        'point_value' => '75',
                    ),
                ) ) ),
                'params' => array(
                    array(
                        "type"          => "textfield",
                        "heading"       => esc_html__( 'Point Label', 'brainbizz' ),
                        "param_name"    => "point_label",
                        'admin_label'   => true,
                    ),
                    array(
                        "type"          => "textfield",
                        "heading"       => esc_html__( 'Point Value', 'brainbizz' ),
                        "param_name"    => "point_value",
                        "description"    => esc_html__( 'Enter value in percentage', 'brainbizz' ),
                    ),
                ),
            ),
            // Colors
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Bar Colors', 'brainbizz'),
                'param_name' => 'h_bar_colors',
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
                'group' => esc_html__( 'Colors', 'brainbizz' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom Bar Colors', 'brainbizz' ),
                'param_name' => 'custom_bar_color',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Colors', 'brainbizz' ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Bacground Color', 'brainbizz'),
                'param_name' => 'bg_color',
                'value' => '#313131',
                'edit_field_class' => 'vc_col-sm-4',
                "dependency"    => array(
                    "element"   => "custom_bar_color",
                    "value" => 'true'
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Comleted Color', 'brainbizz'),
                'param_name' => 'completed_color',
                'value' => '#90ff98',
                'edit_field_class' => 'vc_col-sm-4',
                "dependency"    => array(
                    "element"   => "custom_bar_color",
                    "value" => 'true'
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Text Colors', 'brainbizz'),
                'param_name' => 'h_text_colors',
                'edit_field_class' => 'vc_col-sm-12',
                'group' => esc_html__( 'Colors', 'brainbizz' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom Text Colors', 'brainbizz' ),
                'param_name' => 'custom_text_color',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Colors', 'brainbizz' ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Values Colors', 'brainbizz'),
                'param_name' => 'value_color',
                'value' => '#ffffff',
                'edit_field_class' => 'vc_col-sm-4',
                "dependency"    => array(
                    "element"   => "custom_text_color",
                    "value" => 'true'
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Labels Colors', 'brainbizz'),
                'param_name' => 'label_color',
                'value' => '#ffffff',
                'edit_field_class' => 'vc_col-sm-4',
                "dependency"    => array(
                    "element"   => "custom_text_color",
                    "value" => 'true'
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
            ),
        )
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_wgl_Ico_Progress_Bar extends WPBakeryShortCode {
        }
    }
}
