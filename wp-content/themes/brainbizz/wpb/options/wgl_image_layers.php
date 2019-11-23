<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

if (function_exists('vc_map')) {
    vc_map(array(
        'name' => esc_html__('Image Layers', 'brainbizz'),
        'base' => 'wgl_image_layers',
        'class' => 'brainbizz_image_layers',
        'category' => esc_html__('WGL Modules', 'brainbizz'),
        'icon' => 'wgl_icon_image_layers',
        'content_element' => true,
        'description' => esc_html__('Display Image Layers','brainbizz'),
        'params' => array(
            // image styles heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Layers Settings', 'brainbizz'),
                'param_name' => 'h_settings',
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__( 'Values', 'brainbizz' ),
                'param_name' => 'values',
                'description' => esc_html__( 'Enter values for graph', 'brainbizz' ),
                'params' => array(
                    array(
                        'type'          => 'attach_image',
                        'heading'       => esc_html__( 'Thumbnail', 'brainbizz' ),
                        'param_name'    => 'thumbnail',
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => esc_html__( 'Top Offset', 'brainbizz' ),
                        'param_name'    => 'top_offset',
                        'edit_field_class' => 'vc_col-sm-6',
                        'description' => esc_html__( 'Enter offset in %, for example -100% or 100%', 'brainbizz' ),
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => esc_html__( 'Left Offset', 'brainbizz' ),
                        'param_name'    => 'left_offset',
                        'edit_field_class' => 'vc_col-sm-6',
                        'description' => esc_html__( 'Enter offset in %, for example -100% or 100%', 'brainbizz' ),
                    ),          
                    array(
                        'type'          => 'dropdown',
                        'heading'       => esc_html__( 'Image Animation', 'brainbizz' ),
                        'param_name'    => 'image_animation',
                        'edit_field_class' => 'vc_col-sm-6',
                        'value'         => array(
                            esc_html__( 'Fade In', 'brainbizz' )      => 'fade_in',
                            esc_html__( 'Slide Up', 'brainbizz' )      => 'slide_up',
                            esc_html__( 'Slide Down', 'brainbizz' )     => 'slide_down',
                            esc_html__( 'Slide Left', 'brainbizz' )     => 'slide_left',
                            esc_html__( 'Slide Right', 'brainbizz' )     => 'slide_right',
                            esc_html__( 'Slide Big Up', 'brainbizz' )      => 'slide_big_up',
                            esc_html__( 'Slide Big Down', 'brainbizz' )     => 'slide_big_down',
                            esc_html__( 'Slide Big Left', 'brainbizz' )     => 'slide_big_left',
                            esc_html__( 'Slide Big Right', 'brainbizz' )     => 'slide_big_right',
                            esc_html__( 'Slide Big Right', 'brainbizz' )     => 'slide_big_right',
                            esc_html__( 'Flip Horizontally', 'brainbizz' )     => 'flip_x',
                            esc_html__( 'Flip Vertically', 'brainbizz' )     => 'flip_y',
                            esc_html__( 'Zoom In', 'brainbizz' )     => 'zoom_in',
                        ),
                    ),         
                    array(
                        'type'          => 'textfield',
                        'heading'       => esc_html__( 'Image z-index', 'brainbizz' ),
                        'param_name'    => 'image_order',
                        'value'         => '1',
                        'edit_field_class' => 'vc_col-sm-6',
                    ),  
                ),
            ),
            // images interval
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Enter Interval Images Appearing', 'brainbizz'),
                'param_name' => 'interval',
                'value' => '600',
                'description' => esc_html__( 'Enter interval in milliseconds', 'brainbizz' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Enter Transition Speed', 'brainbizz'),
                'param_name' => 'transition',
                'value' => '800',
                'description' => esc_html__( 'Enter transition speed in milliseconds', 'brainbizz' ),
            ),
            array(
                'type' => 'vc_link',
                'heading' => esc_html__( 'Link', 'brainbizz' ),
                'param_name' => 'link',
                'description' => esc_html__('Add link to button.', 'brainbizz')
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', 'brainbizz'),
                'param_name' => 'extra_class',
                'description' => esc_html__('Add an extra class name to the element and refer to it from Custom CSS option.', 'brainbizz')
            ),
        )
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_wgl_Image_Layers extends WPBakeryShortCode {
        }
    }
}
