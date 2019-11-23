<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}


if (function_exists('vc_map')) {
// Add list item
    vc_map(array(
        'name' => esc_html__('Earth', 'brainbizz'),
        'base' => 'wgl_earth',
        'class' => 'brainbizz_spacing',
        'category' => esc_html__('WGL Modules', 'brainbizz'),
        'icon' => 'wgl_icon_earth',
        'content_element' => true,
        'description' => esc_html__('Earth moving','brainbizz'),
        'params' => array(
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__('Sphere', 'brainbizz'),
                'param_name' => 'figure_color',
                'value' => '#ffffff',
                'description' => esc_html__('Select sphere color', 'brainbizz'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Sphere Width', 'brainbizz'),
                'param_name' => 'width',
                'value' => '750',
                'description' => esc_html__( 'Enter size of sphere in px.', 'brainbizz' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'param_name' => 'add_second_sphere',                    
                'heading' => esc_html__( 'Add Inside Second Sphere', 'brainbizz' ),
            ),   
        )
    ));
    
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_wgl_earth extends WPBakeryShortCode {
            
        }
    } 
}