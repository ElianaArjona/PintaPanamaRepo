<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$theme_color = esc_attr(BrainBizz_Theme_Helper::get_option("theme-custom-color"));

if (function_exists('vc_map')) {
    vc_map(array(
        'name' => esc_html__('Social Icons', 'brainbizz'),
        'base' => 'wgl_soc_icons',
        'class' => 'brainbizz_soc_icons',
        'category' => esc_html__('WGL Modules', 'brainbizz'),
        'icon' => 'wgl_icon_social-icons',
        'content_element' => true,
        'description' => esc_html__('Display Social Icons','brainbizz'),
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__( 'Values', 'brainbizz' ),
                'param_name' => 'values',
                'description' => esc_html__( 'Enter values for graph - value, title and color.', 'brainbizz' ),
                'value' => urlencode( json_encode( array(
                    array(
                        'link' => 'https://www.facebook.com/',
                        'icon' => 'fa fa-facebook',
                        'title' => esc_html__( 'Facebook', 'brainbizz' ),
                        'new_tab' => true,
                    ),
                    array(
                        'link' => 'https://twitter.com/',
                        'icon' => 'fa fa-twitter',
                        'title' => esc_html__( 'Twitter', 'brainbizz' ),
                        'new_tab' => true,
                    ),
                    array(
                        'link' => 'https://www.instagram.com/',
                        'icon' => 'fa fa-instagram',
                        'title' => esc_html__( 'Instagram', 'brainbizz' ),
                        'new_tab' => true,
                    ),
                ) ) ),
                'params' => array(
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__( 'Icon', 'brainbizz' ),
                        'param_name' => 'icon',
                        'value' => 'fa fa-adjust', // default value to backend editor admin_label
                        'settings' => array(
                            'emptyIcon' => true,
                            // default true, display an "EMPTY" icon?
                            'iconsPerPage' => 200,
                            // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                        ),
                        'description' => esc_html__( 'Select icon from library.', 'brainbizz' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Link', 'brainbizz' ),
                        'param_name' => 'link',
                        'edit_field_class' => 'vc_col-sm-6',
                        'admin_label' => true,
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Title', 'brainbizz' ),
                        'param_name' => 'title',
                        'edit_field_class' => 'vc_col-sm-6',
                        'admin_label' => true,
                    ),
                    array(
                        "type"          => "wgl_checkbox",
                        'heading' => esc_html__( 'Custom Colors', 'brainbizz' ),
                        "param_name"    => "custom_colors",
                        'edit_field_class' => 'vc_col-sm-6',
                    ),
                    array(
                        "type"          => "wgl_checkbox",
                        'heading' => esc_html__( 'Open in New Tab', 'brainbizz' ),
                        "param_name"    => "new_tab",
                        'edit_field_class' => 'vc_col-sm-6',
                        "std"           => 'true',
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Icon Color', 'brainbizz'),
                        'param_name' => 'icon_color',
                        'value' => '#ffffff',
                        'dependency' => array(
                            'element' => 'custom_colors',
                            'value' => 'true'
                        ),
                        'edit_field_class' => 'vc_col-sm-6',
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Icon Hover Color', 'brainbizz'),
                        'param_name' => 'icon_hover_color',
                        'value' => $theme_color,
                        'dependency' => array(
                            'element' => 'custom_colors',
                            'value' => 'true'
                        ),
                        'edit_field_class' => 'vc_col-sm-6',
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Background Color', 'brainbizz'),
                        'param_name' => 'bg_color',
                        'value' => $theme_color,
                        'dependency' => array(
                            'element' => 'custom_colors',
                            'value' => 'true'
                        ),
                        'edit_field_class' => 'vc_col-sm-6',
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Background Hover Color', 'brainbizz'),
                        'param_name' => 'bg_hover_color',
                        'value' => '#ffffff',
                        'dependency' => array(
                            'element' => 'custom_colors',
                            'value' => 'true'
                        ),
                        'edit_field_class' => 'vc_col-sm-6',
                    ),
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Icon Font Size', 'brainbizz'),
                'param_name' => 'icon_size',
                'description' => esc_html__( 'Custom icon font size in pixels.', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Background Size', 'brainbizz'),
                'param_name' => 'bg_size',
                'description' => esc_html__( 'Custom width,height,line-height size in pixels.', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Border Radius Size', 'brainbizz'),
                'param_name' => 'border_radius',
                'description' => esc_html__( 'Custom border radius size in pixels.', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icons Position', 'brainbizz'),
                'param_name' => 'icons_pos',
                'value' => array(
                    esc_html__('Left', 'brainbizz') => 'left',
                    esc_html__('Right', 'brainbizz') => 'right',
                    esc_html__('Center', 'brainbizz') => 'center',
                ),
                'edit_field_class' => 'vc_col-sm-4',
                'description' => esc_html__( 'Set alignment icons.', 'brainbizz' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Icons Gap', 'brainbizz'),
                'param_name' => 'icon_gap',
                'description' => esc_html__( 'Custom icon gap width in pixels.', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                "type"          => "wgl_checkbox",
                'heading' => esc_html__( 'Add Icons Background', 'brainbizz' ),
                "param_name"    => "add_bg",
                'edit_field_class' => 'vc_col-sm-4',
                'std' => 'true',
            ),
            array(
                "type"          => "wgl_checkbox",
                'heading' => esc_html__( 'Custom Colors', 'brainbizz' ),
                "param_name"    => "all_custom_colors",
                'edit_field_class' => 'vc_col-sm-12',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Icon Color', 'brainbizz'),
                'param_name' => 'all_icon_color',
                'value' => '#ffffff',
                'dependency' => array(
                    'element' => 'all_custom_colors',
                    'value' => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Icon Hover Color', 'brainbizz'),
                'param_name' => 'all_icon_hover_color',
                'value' => $theme_color,
                'dependency' => array(
                    'element' => 'all_custom_colors',
                    'value' => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Color', 'brainbizz'),
                'param_name' => 'all_bg_color',
                'value' => $theme_color,
                'dependency' => array(
                    'element' => 'all_custom_colors',
                    'value' => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Hover Color', 'brainbizz'),
                'param_name' => 'all_bg_hover_color',
                'value' => '#ffffff',
                'dependency' => array(
                    'element' => 'all_custom_colors',
                    'value' => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Border Color', 'brainbizz'),
                'param_name' => 'all_border_color',
                'value' => '#ffffff',
                'dependency' => array(
                    'element' => 'all_custom_colors',
                    'value' => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Border Hover Color', 'brainbizz'),
                'param_name' => 'all_border_hover_color',
                'value' => $theme_color,
                'dependency' => array(
                    'element' => 'all_custom_colors',
                    'value' => 'true'
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
        )
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_wgl_Soc_Icons extends WPBakeryShortCode {
        }
    }
}
