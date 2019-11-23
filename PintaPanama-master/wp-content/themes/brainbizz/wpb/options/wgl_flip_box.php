<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$theme_color = esc_attr(BrainBizz_Theme_Helper::get_option("theme-custom-color"));
$header_font = BrainBizz_Theme_Helper::get_option('header-font');

if (function_exists('vc_map')) {
    // Add button
    vc_map(array(
        'name' => esc_html__('Flip Box', 'brainbizz'),
        'base' => 'wgl_flip_box',
        'class' => 'brainbizz_flip_box',
        'category' => esc_html__('WGL Modules', 'brainbizz'),
        'icon' => 'wgl_icon_flip_box',
        'content_element' => true,
        'description' => esc_html__('Add Flip Box','brainbizz'),
        'params' => array(
            // General
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Flip Direction', 'brainbizz' ),
                'param_name' => 'fb_dir',
                'value' => array(
                    esc_html__( 'Flip to Right', 'brainbizz' )  => 'flip_right',
                    esc_html__( 'Flip to Left', 'brainbizz' )   => 'flip_left',
                    esc_html__( 'Flip to Top', 'brainbizz' )    => 'flip_top',
                    esc_html__( 'Flip to Bottom', 'brainbizz' ) => 'flip_bottom',
                ),
                'admin_label' => true,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Custom Flip Box Height', 'brainbizz'),
                'param_name' => 'fb_height',
                'value' => '',
                'description' => esc_html__( 'Enter custom flip box height in pixels.', 'brainbizz' ),
            ),
            vc_map_add_css_animation( true ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', 'brainbizz'),
                'param_name' => 'extra_class',
                'description' => esc_html__('Add an extra class name to the element and refer to it from Custom CSS option.', 'brainbizz')
            ),
            // Front Side
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Front Side Background', 'brainbizz'),
                'param_name' => 'h_front_bg',
                'group' => esc_html__( 'Front Side', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'front_bg_style',
                'value' => array(
                    esc_html__( 'Color', 'brainbizz' ) => 'front_color',
                    esc_html__( 'Image', 'brainbizz' ) => 'front_image',
                ),
                'group' => esc_html__( 'Front Side', 'brainbizz' ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Color', 'brainbizz'),
                'param_name' => 'front_bg_color',
                'value' => '#ffffff',
                'dependency' => array(
                    'element' => 'front_bg_style',
                    'value' => 'front_color'
                ),
                'group' => esc_html__( 'Front Side', 'brainbizz' ),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Background Image', 'brainbizz'),
                'param_name' => 'front_bg_image',
                'description' => esc_html__( 'Select image from media library.', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'front_bg_style',
                    'value' => 'front_image'
                ),
                'group' => esc_html__( 'Front Side', 'brainbizz' ),
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Front Side Content', 'brainbizz'),
                'param_name' => 'h_front_content',
                'group' => esc_html__( 'Front Side', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Logo Image', 'brainbizz'),
				'param_name' => 'front_logo_image',
				'description' => esc_html__( 'Select image from media library.', 'brainbizz' ),
				'group' => esc_html__( 'Front Side', 'brainbizz' ),
			),
            array(
                'type' => 'textarea',
                'param_name' => 'front_title',
                'heading' => esc_html__('Title', 'brainbizz'),
                'group' => esc_html__( 'Front Side', 'brainbizz' ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Title Color', 'brainbizz'),
                'param_name' => 'front_title_color',
                'value' => '#ffffff',
                'group' => esc_html__( 'Front Side', 'brainbizz' ),
            ),
            array(
                'type' => 'textarea',
                'param_name' => 'front_descr',
                'heading' => esc_html__('Description', 'brainbizz'),
                'group' => esc_html__( 'Front Side', 'brainbizz' ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Description Color', 'brainbizz'),
                'param_name' => 'front_descr_color',
                'value' => '#ffffff',
                'group' => esc_html__( 'Front Side', 'brainbizz' ),
            ),
            // Back Side
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Back Side Background', 'brainbizz'),
                'param_name' => 'h_back_bg',
                'group' => esc_html__( 'Back Side', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'back_bg_style',
                'value' => array(
                    esc_html__( 'Color', 'brainbizz' ) => 'back_color',
                    esc_html__( 'Image', 'brainbizz' ) => 'back_image',
                ),
                'group' => esc_html__( 'Back Side', 'brainbizz' ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Color', 'brainbizz'),
                'param_name' => 'back_bg_color',
                'value' => $theme_color,
                'dependency' => array(
                    'element' => 'back_bg_style',
                    'value' => 'back_color'
                ),
                'group' => esc_html__( 'Back Side', 'brainbizz' ),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Background Image', 'brainbizz'),
                'param_name' => 'back_bg_image',
                'description' => esc_html__( 'Select image from media library.', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'back_bg_style',
                    'value' => 'back_image'
                ),
                'group' => esc_html__( 'Back Side', 'brainbizz' ),
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Back Side Content', 'brainbizz'),
                'param_name' => 'h_back_title',
                'group' => esc_html__( 'Back Side', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Add Logo Image', 'brainbizz' ),
				'param_name' => 'add_back_logo_image',
				'value' => 'true',
				'group' => esc_html__( 'Back Side', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-3',
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Logo Image', 'brainbizz'),
				'param_name' => 'back_logo_image',
				'description' => esc_html__( 'Select image from media library.', 'brainbizz' ),
				'dependency' => array(
					'element' => 'add_back_logo_image',
					'value' => 'true'
				),
				'group' => esc_html__( 'Back Side', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-9',
			),
            array(
                'type' => 'textfield',
                'param_name' => 'back_title',
                'heading' => esc_html__('Title', 'brainbizz'),
                'group' => esc_html__( 'Back Side', 'brainbizz' ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Title Color', 'brainbizz'),
                'param_name' => 'back_title_color',
                'value' => '#ffffff',
                'group' => esc_html__( 'Back Side', 'brainbizz' ),
            ),
            array(
                'type' => 'textarea',
                'param_name' => 'back_descr',
                'heading' => esc_html__('Description', 'brainbizz'),
                'group' => esc_html__( 'Back Side', 'brainbizz' ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Description Color', 'brainbizz'),
                'param_name' => 'back_descr_color',
                'value' => '#ffffff',
                'group' => esc_html__( 'Back Side', 'brainbizz' ),
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Back Side Button', 'brainbizz'),
                'param_name' => 'h_back_button',
                'group' => esc_html__( 'Back Side', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Read More Button', 'brainbizz' ),
                'param_name' => 'add_read_more',
                'group' => esc_html__( 'Back Side', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Button Color', 'brainbizz'),
                'param_name' => 'back_button_color',
                'value' => '#ffffff',
                'group' => esc_html__( 'Back Side', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'add_read_more',
                    'value' => 'true'
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Read More Button Text', 'brainbizz'),
                'param_name' => 'read_more_text',
                'value' => esc_html__('Read More', 'brainbizz'),
                'group' => esc_html__( 'Back Side', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'add_read_more',
                    'value' => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'vc_link',
                'heading' => esc_html__( 'Link', 'brainbizz' ),
                'param_name' => 'link',
                'description' => esc_html__('Add link to read more button.', 'brainbizz'),
                'group' => esc_html__( 'Back Side', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'add_read_more',
                    'value' => 'true'
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Icon to the Button', 'brainbizz' ),
                'param_name' => 'add_icon_button',
                'group' => esc_html__( 'Back Side', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'add_read_more',
                    'value' => 'true'
                ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__('Icon', 'brainbizz'),
                'param_name' => 'button_icon_fontawesome',
                'value' => 'fa fa-adjust', // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false, // default true, display an 'EMPTY' icon?
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                ),
                'dependency' => array(
                    'element' => 'add_icon_button',
                    'value' => 'true'
                ),
                'description' => esc_html__( 'Select icon from library.', 'brainbizz' ),
                'group' => esc_html__( 'Back Side', 'brainbizz' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon Position', 'brainbizz'),
                'param_name' => 'button_icon_position',
                'value' => array(
                    esc_html__('Left', 'brainbizz') => 'left',
                    esc_html__('Right', 'brainbizz') => 'right'
                ),
                'dependency' => array(
                    'element' => 'add_icon_button',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Back Side', 'brainbizz' ),
            ),
        )
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_wgl_Flip_Box extends WPBakeryShortCode {
        }
    }
}