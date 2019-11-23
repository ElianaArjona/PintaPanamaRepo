<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$theme_color = esc_attr(BrainBizz_Theme_Helper::get_option("theme-custom-color"));

if (function_exists('vc_map')) {
// Add list item
    vc_map(array(
        'name' => esc_html__('Divider', 'brainbizz'),
        'base' => 'wgl_divider',
        'class' => 'brainbizz_divider',
        'category' => esc_html__('WGL Modules', 'brainbizz'),
        'icon' => 'wgl_icon_divider', // need to change
        'content_element' => true,
        'description' => esc_html__('Divider', 'brainbizz'),
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Height', 'brainbizz'),
                'param_name' => 'height',
                'description' => esc_html__('Enter divider height in pixels', 'brainbizz'),
                'value' => '2px',
                'save_always' => true,
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-12',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Width', 'brainbizz'),
                'param_name' => 'width',
                'description' => esc_html__('Enter divider width', 'brainbizz'),
                'value' => '100',
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Divider Width Units', 'brainbizz' ),
                'param_name' => 'width_units',
                'value' => array(
                    esc_html__( 'Pixels', 'brainbizz' )      => 'px',
                    esc_html__( 'Percentages', 'brainbizz' ) => '%',
                ),
                'description' => esc_html__('Select width units', 'brainbizz'),
                'std' => '%',
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Divider Alignment', 'brainbizz' ),
                'param_name' => 'divider_alignment',
                'value' => array(
                    esc_html__( 'Left', 'brainbizz' )   => 'left',
                    esc_html__( 'Center', 'brainbizz' ) => 'center',
                    esc_html__( 'Right', 'brainbizz' )  => 'right',
                ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Divider Color', 'brainbizz' ),
                'param_name' => 'divider_color',
                'value' => '#ececec',
                'save_always' => true,
                'description' => esc_html__( 'Choose divider color.', 'brainbizz' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Divider Line', 'brainbizz' ),
                'param_name' => 'add_divider_line',
                'edit_field_class' => 'vc_col-sm-12 no-margin-top',
                'group' => esc_html__( 'Divider Line', 'brainbizz' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Divider Line Alignment', 'brainbizz' ),
                'param_name' => 'divider_line_alignment',
                'value' => array(
                    esc_html__( 'Left', 'brainbizz' )   => 'left',
                    esc_html__( 'Center', 'brainbizz' ) => 'center',
                    esc_html__( 'Right', 'brainbizz' )  => 'right',
                ),
                'dependency' => array(
                    'element' => 'add_divider_line',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Divider Line', 'brainbizz' ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Divider Line Color', 'brainbizz' ),
                'param_name' => 'divider_line_color',
                'value' => $theme_color,
                'save_always' => true,
                'description' => esc_html__( 'Choose divider line color.', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'add_divider_line',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Divider Line', 'brainbizz' ),
            ),
        )
    ));
    
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_wgl_divider extends WPBakeryShortCode {}
    }
}