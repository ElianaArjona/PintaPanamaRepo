<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

if (function_exists('vc_map')) {
    vc_map(array(
        'name' => esc_html__('Clients', 'brainbizz'),
        'base' => 'wgl_clients',
        'class' => 'brainbizz_clients',
        'category' => esc_html__('WGL Modules', 'brainbizz'),
        'icon' => 'wgl_icon_clients',
        'content_element' => true,
        'description' => esc_html__('Display Clients','brainbizz'),
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__( 'Values', 'brainbizz' ),
                'param_name' => 'values',
                'description' => esc_html__( 'Enter values for graph - thumbnail, quote, author name and author status.', 'brainbizz' ),
                'params' => array(
                    array(
                        "type"          => "attach_image",
                        "heading"       => esc_html__( 'Thumbnail', 'brainbizz' ),
                        "param_name"    => "thumbnail",
                        'edit_field_class' => 'vc_col-sm-6',
                    ),
                    array(
                        "type"          => "attach_image",
                        "heading"       => esc_html__( 'Hover Thumbnail', 'brainbizz' ),
                        "param_name"    => "hover_thumbnail",
                        'edit_field_class' => 'vc_col-sm-6 no-top-padding',
                        'description' => esc_html__( 'Work only with Exchange Images animation.', 'brainbizz' ),
                    ),
                    array(
                        'type' => 'wgl_checkbox',
                        'heading' => esc_html__( 'Add Link', 'brainbizz' ),
                        'param_name' => 'add_link',
                        'edit_field_class' => 'vc_col-sm-12',
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__( 'Link', 'brainbizz' ),
                        'param_name' => 'link',
                        'description' => esc_html__('Add link to client image.', 'brainbizz'),
                        "dependency"    => array(
                            "element"   => "add_link",
                            "value" => 'true'
                        ),
                    ),
                ),
            ),
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__( 'Clients Grid', 'brainbizz' ),
                "param_name"    => "item_grid",
                "value"         => array(
                    esc_html__( 'One Column', 'brainbizz' )    => '1',
                    esc_html__( 'Two Columns', 'brainbizz' )   => '2',
                    esc_html__( 'Three Columns', 'brainbizz' ) => '3',
                    esc_html__( 'Four Columns', 'brainbizz' )  => '4',
                    esc_html__( 'Five Columns', 'brainbizz' )  => '5',
                    esc_html__( 'Six Columns', 'brainbizz' )  => '6',
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'std' => '4'        
            ),
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__( 'Clients Animation for each Image', 'brainbizz' ),
                "param_name"    => "item_anim",
                "value"         => array(
                    esc_html__( 'Shadow', 'brainbizz' ) => 'shadow',
                    esc_html__( 'Zoom', 'brainbizz' )    => 'zoom',
                    esc_html__( 'Opacity', 'brainbizz' )    => 'opacity',
                    esc_html__( 'Grayscale', 'brainbizz' )   => 'grayscale',
                    esc_html__( 'Contrast', 'brainbizz' ) => 'contrast',
                    esc_html__( 'Blur', 'brainbizz' ) => 'blur',
                    esc_html__( 'Invert', 'brainbizz' ) => 'invert',
                    esc_html__( 'Exchange Images', 'brainbizz' ) => 'ex_images',
                ),       
                'edit_field_class' => 'vc_col-sm-6',
            ),
            vc_map_add_css_animation( true ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', 'brainbizz'),
                'param_name' => 'extra_class',
                'description' => esc_html__('Add an extra class name to the element and refer to it from Custom CSS option.', 'brainbizz')
            ),
            // carousel heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Add Carousel for Clients Items', 'brainbizz'),
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
                "type"          => "wgl_checkbox",
                'heading' => esc_html__( 'Autoplay', 'brainbizz' ),
                "param_name"    => "autoplay",
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Autoplay Speed', 'brainbizz' ),
                "param_name"    => "autoplay_speed",
                "dependency"    => array(
                    "element"   => "autoplay",
                    "value" => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-4',
                "value"         => "3000",
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
            ),
            // carousel pagination heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Responsive', 'brainbizz'),
                'param_name' => 'h_resp',
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Customize Responsive', 'brainbizz' ),
                'param_name' => 'custom_resp',
                "dependency"    => array(
                    "element"   => "use_carousel",
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
        )
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_wgl_Clients extends WPBakeryShortCode {
        }
    }
}
