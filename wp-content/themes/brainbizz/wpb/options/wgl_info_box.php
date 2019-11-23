<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
$theme_color = esc_attr(BrainBizz_Theme_Helper::get_option("theme-custom-color"));
$header_font_color = esc_attr(BrainBizz_Theme_Helper::get_option('header-font')['color']);
$main_font_color = esc_attr(BrainBizz_Theme_Helper::get_option('main-font')['color']);

add_action( 'admin_enqueue_scripts', 'load_admin_style' );
function load_admin_style() {
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/fonts/flaticon/flaticon.css');
}

if (function_exists('vc_map')) {
// Add list item
    vc_map(array(
        'name' => esc_html__('Info Box', 'brainbizz'),
        'base' => 'wgl_info_box',
        'class' => 'brainbizz_info_box',
        'category' => esc_html__('WGL Modules', 'brainbizz'),
        'icon' => 'wgl_icon_info_box',
        'content_element' => true,
        'description' => esc_html__('Info Box','brainbizz'),
        'params' => array(
            array(
                'type' => 'brainbizz_radio_image',
                'heading' => esc_html__('Info Box Type', 'brainbizz'),
                'param_name' => 'ib_type',
                'fields' => array(
                    'default' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/type_def.png',
                        'label' => esc_html__('Default', 'brainbizz')),
                    'full_size' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/type_full_width.png',
                        'label' => esc_html__('Full Size', 'brainbizz')),
                    'bordered' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/type_bordered.png',
                        'label' => esc_html__('Bordered', 'brainbizz')),
                    'fill' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/type_fill.png',
                        'label' => esc_html__('Fill', 'brainbizz')),
                    'tile' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/type_tile.png',
                        'label' => esc_html__('Tile', 'brainbizz')),
                ),
                'value' => 'default',
            ),
            array(
                'type' => 'brainbizz_radio_image',
                'heading' => esc_html__('Info Box Layout', 'brainbizz'),
                'param_name' => 'ib_layout',
                'fields' => array(
                    'top' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/style_def.png',
                        'label' => esc_html__('Top', 'brainbizz')),
                    'left' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/style_left.png',
                        'label' => esc_html__('Left', 'brainbizz')),
                    'right' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/style_right.png',
                        'label' => esc_html__('Right', 'brainbizz')),
                    'top_left' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/style_left_top.png',
                        'label' => esc_html__('Top Left', 'brainbizz')),
                    'top_right' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/style_right_top.png',
                        'label' => esc_html__('Top Right', 'brainbizz')),
                ),
                'value' => 'top',
                'dependency' => array(
                    'element' => 'ib_type',
                    'value' => array('default', 'bordered', 'fill', 'tile')
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Alignment', 'brainbizz' ),
                'param_name' => 'ib_align',
                'value' => array(
					esc_html__( 'Left', 'brainbizz' ) => 'left',
					esc_html__( 'Center', 'brainbizz' ) => 'center',
					esc_html__( 'Right', 'brainbizz' ) => 'right',
                ),
            ),
            // Info-box shadow
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Add Info-Box Shadow', 'brainbizz' ),
				'param_name' => 'add_shadow',
				'edit_field_class' => 'vc_col-sm-3',
			),
			// Info-box shadow style
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Button Shadow Style', 'brainbizz' ),
				'param_name' => 'shadow_style',
				'value'	=> array(
					esc_html__( 'On Hover', 'brainbizz' ) => 'on_hover',
					esc_html__( 'Before Hover', 'brainbizz' ) => 'before_hover',
					esc_html__( 'Always', 'brainbizz' ) => 'always',
				),
				'description' => esc_html__('Select info-box shadow style.', 'brainbizz'),
				'dependency' => array(
					'element' => 'add_shadow',
					'value' => 'true'
				),
				'edit_field_class' => 'vc_col-sm-9',
			),
            vc_map_add_css_animation( true ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', 'brainbizz'),
                'param_name' => 'extra_class',
                'description' => esc_html__('Add an extra class name to the element and refer to it from Custom CSS option.', 'brainbizz')
            ),
            // Info Box Content
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Info Box Title', 'brainbizz'),
                'param_name' => 'ib_title',
                'admin_label' => true,
                'group' => esc_html__( 'Content', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-9',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Title Divider', 'brainbizz' ),
                'param_name' => 'add_title_divider',
                'group' => esc_html__( 'Content', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-3',
                'dependency' => array(
                    'element' => 'ib_layout',
                    'value' => 'top',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Info Box Subtitle', 'brainbizz'),
                'param_name' => 'ib_subtitle',
                'admin_label' => true,
                'group' => esc_html__( 'Content', 'brainbizz' ),
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Info Box Text', 'brainbizz'),
                'param_name' => 'ib_content',
                'group' => esc_html__( 'Content', 'brainbizz' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Read More Button', 'brainbizz' ),
                'param_name' => 'add_read_more',
                'group' => esc_html__( 'Content', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Read More Button Text', 'brainbizz'),
                'param_name' => 'read_more_text',
                'value' => 'Read More',
                'group' => esc_html__( 'Content', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'add_read_more',
                    'value'   => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'vc_link',
                'heading' => esc_html__( 'Link', 'brainbizz' ),
                'param_name' => 'link',
                'description' => esc_html__('Add link to read more button.', 'brainbizz'),
                'group' => esc_html__( 'Content', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'add_read_more',
                    'value' => 'true'
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom Top Offset', 'brainbizz' ),
                'param_name' => 'add_read_more_offset',
                'group' => esc_html__( 'Content', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
                'dependency' => array(
                    'element' => 'add_read_more',
                    'value' => 'true'
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Top Offset', 'brainbizz'),
                'param_name' => 'read_more_offset',
                'value' => '',
                'group' => esc_html__( 'Content', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'add_read_more_offset',
                    'value' => 'true'
                ),
                'description' => esc_html__('Add top offset to read more button in pixels.', 'brainbizz'),
                'edit_field_class' => 'vc_col-sm-8',
            ),
            // Info Box Icon/Image heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Icon Type', 'brainbizz'),
                'param_name' => 'h_icon_type',
                'group' => esc_html__( 'Icon', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
            ),
            // Info Box Icon/Image
            array(
                'type' => 'dropdown',
                'param_name' => 'icon_type',
                'value' => array(
                    esc_html__( 'None', 'brainbizz' ) => 'none',
                    esc_html__( 'Font', 'brainbizz' ) => 'font',
                    esc_html__( 'Image', 'brainbizz' ) => 'image',
                ),
                'save_always' => true,
                'group' => esc_html__( 'Icon', 'brainbizz' ),
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'icon_font_type',
                'value' => array(
                    esc_html__( 'Flaticon', 'brainbizz' )    => 'type_flaticon',
                    esc_html__( 'Fontawesome', 'brainbizz' ) => 'type_fontawesome',
                ),
                'save_always' => true,
                'group' => esc_html__( 'Icon', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'font',
                ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'brainbizz' ),
                'param_name' => 'icon_fontawesome',
                'value' => 'fa fa-adjust', // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an 'EMPTY' icon?
                    'type' => 'fontawesome',
                    'iconsPerPage' => 200,
                    // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                ),
                'description' => esc_html__( 'Select icon from library.', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'icon_font_type',
                    'value' => 'type_fontawesome',
                ),
                'group' => esc_html__( 'Icon', 'brainbizz' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'brainbizz' ),
                'param_name' => 'icon_flaticon',
                'value' => '', // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an 'EMPTY' icon
                    'type' => 'flaticon',
                    'iconsPerPage' => 200,
                    // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                ),
                'description' => esc_html__( 'Select icon from library.', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'icon_font_type',
                    'value' => 'type_flaticon',
                ),
                'group' => esc_html__( 'Icon', 'brainbizz' ),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Image', 'brainbizz' ),
                'param_name' => 'thumbnail',
                'value' => '',
                'description' => esc_html__( 'Select image from media library.', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'image',
                ),
                'group' => esc_html__( 'Icon', 'brainbizz' ),
            ),
            // Custom image width
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Custom Image Width', 'brainbizz'),
                'param_name' => 'custom_image_width',
                'description' => esc_html__( 'Enter image size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Icon', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'image',
                ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Custom image height
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Custom Image Height', 'brainbizz'),
                'param_name' => 'custom_image_height',
                'description' => esc_html__( 'Enter image size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Icon', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'image',
                ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Icon shadow
			array(
				'type' => 'wgl_checkbox',
				'heading' => esc_html__( 'Add Icon Shadow', 'brainbizz' ),
				'param_name' => 'add_icon_shadow',
				'description' => esc_html__( 'Custom box-shadow style.', 'brainbizz' ),
				'dependency' => array(
					'element' => 'icon_type',
                    'value' => 'font',
				),
				'group' => esc_html__( 'Icon', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-3',
			),
			// Icon shadow style
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Button Shadow Style', 'brainbizz' ),
				'param_name' => 'icon_shadow_style',
				'value'	=> array(
					esc_html__( 'On Hover', 'brainbizz' )		=> 'on_hover',
					esc_html__( 'Before Hover', 'brainbizz' ) => 'before_hover',
					esc_html__( 'Always', 'brainbizz' )		=> 'always',
				),
				'description' => esc_html__('Select icon shadow style.', 'brainbizz'),
				'dependency' => array(
					'element' => 'add_icon_shadow',
					'value' => 'true'
				),
				'group' => esc_html__( 'Icon', 'brainbizz' ),
				'edit_field_class' => 'vc_col-sm-9',
			),
            // Custom icon size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Custom Icon Size', 'brainbizz'),
                'param_name' => 'custom_icon_size',
                'description' => esc_html__( 'Enter Icon size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Icon', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'font',
                ),
            ),
            // Icon color checkbox
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Custom Icon Colors', 'brainbizz' ),
                'param_name' => 'custom_icon_color',
                'description' => esc_html__( 'Select custom colors', 'brainbizz' ),
                'group' => esc_html__( 'Icon', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'font',
                ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // Icon color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Icon Color', 'brainbizz'),
                'param_name' => 'icon_color',
                'value' => $theme_color,
                'description' => esc_html__('Select icon color', 'brainbizz'),
                'dependency' => array(
                    'element' => 'custom_icon_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Icon', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // Icon hover color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Icon Hover Color', 'brainbizz'),
                'param_name' => 'icon_color_hover',
                'value' => $theme_color,
                'description' => esc_html__('Select icon hover color', 'brainbizz'),
                'dependency' => array(
                    'element' => 'custom_icon_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Icon', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // icon/image number
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Icon Number', 'brainbizz'),
                'param_name' => 'h_icon_number',
                'group' => esc_html__( 'Icon', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => array('font','image'),
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Number', 'brainbizz' ),
                'param_name' => 'add_number',
                'group' => esc_html__( 'Icon', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => array('font','image'),
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Enter Icon Number', 'brainbizz'),
                'param_name' => 'icon_number',
                'value' => '01',
                'group' => esc_html__( 'Icon', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
                'dependency' => array(
                    'element' => 'add_number',
                    'value' => 'true',
                ),
            ),
            array(
                'type'          => 'dropdown',
                'heading' => esc_html__('Number Position', 'brainbizz'),
                'param_name'    => 'number_pos',
                'value'         => array(
                    esc_html__( 'Left Top Corner', 'brainbizz' )     => 'left_top',
                    esc_html__( 'Right Top Corner', 'brainbizz' )    => 'right_top',
                    esc_html__( 'Left Bottom Corner', 'brainbizz' )  => 'left_bottom',
                    esc_html__( 'Right Bottom Corner', 'brainbizz' ) => 'right_bottom',
                ),
                'dependency' => array(
                    'element' => 'add_number',
                    'value' => 'true',
                ),
                'group' => esc_html__( 'Icon', 'brainbizz' ),
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Icon Background Dimensions', 'brainbizz'),
                'param_name' => 'h_icon_bg',
                'group' => esc_html__( 'Icon Background', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
            ),
            // Custom icon bg size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Enter Background Width', 'brainbizz'),
                'param_name' => 'custom_icon_bg_width',
                'description' => esc_html__( 'Custom width in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Icon Background', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Custom icon bg size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Enter Background Height', 'brainbizz'),
                'param_name' => 'custom_icon_bg_height',
                'description' => esc_html__( 'Custom height in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Icon Background', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Custom icon bg offsets
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Enter Bottom Offset', 'brainbizz'),
                'param_name' => 'custom_icon_bot_offset',
                'description' => esc_html__( 'Custom offset in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Icon Background', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),  
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Enter Side Offset', 'brainbizz'),
                'param_name' => 'custom_icon_side_offset',
                'description' => esc_html__( 'It works only with layout left or right', 'brainbizz' ),
                'group' => esc_html__( 'Icon Background', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'ib_layout',
                    'value' => array('left','right','top_left','top_right'),
                ),
            ),  
            // Custom icon bg radius
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Enter Border Radius', 'brainbizz'),
                'param_name' => 'custom_icon_radius',
                'description' => esc_html__( 'Custom radius in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Icon Background', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'ib_type',
                    'value' => array('bordered','fill')
                ),
            ),   
            // icon/image border styles
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Border Styles', 'brainbizz'),
                'param_name' => 'h_border_styles',
                'group' => esc_html__( 'Icon Background', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'ib_type',
                    'value' => 'bordered'
                ),
            ),
            // Custom icon border width
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Border Width', 'brainbizz'),
                'param_name' => 'border_width',
                'description' => esc_html__( 'Enter border width in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Icon Background', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'ib_type',
                    'value' => 'bordered'
                ),
            ),
            // border color checkbox
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Custom Border Colors', 'brainbizz' ),
                'param_name' => 'custom_border_color',
                'description' => esc_html__( 'Select custom colors', 'brainbizz' ),
                'group' => esc_html__( 'Icon Background', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'ib_type',
                    'value' => 'bordered'
                ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // border color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Border Color', 'brainbizz'),
                'param_name' => 'border_color',
                'value' => '#000000',
                'description' => esc_html__('Select border color', 'brainbizz'),
                'dependency' => array(
                    'element' => 'custom_border_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Icon Background', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // border hover color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Border Hover Color', 'brainbizz'),
                'param_name' => 'border_color_hover',
                'value' => '#000000',
                'description' => esc_html__('Select border hover color', 'brainbizz'),
                'dependency' => array(
                    'element' => 'custom_border_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Icon Background', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ), 
            // Icon/image bg
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Icon Background Color', 'brainbizz'),
                'param_name' => 'h_icon_bg_color',
                'group' => esc_html__( 'Icon Background', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            // Icon bg color checkbox
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Custom Background Color', 'brainbizz' ),
                'param_name' => 'custom_icon_bg_color',
                'description' => esc_html__( 'Select custom colors.', 'brainbizz' ),
                'group' => esc_html__( 'Icon Background', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // Icon bg color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Color', 'brainbizz'),
                'param_name' => 'icon_bg_color',
                'value' => '#ffffff',
                'description' => esc_html__('Select color.', 'brainbizz'),
                'dependency' => array(
                    'element' => 'custom_icon_bg_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Icon Background', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // Icon bg hover color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Hover Color', 'brainbizz'),
                'param_name' => 'icon_bg_color_hover',
                'value' => $theme_color,
                'description' => esc_html__('Select color.', 'brainbizz'),
                'dependency' => array(
                    'element' => 'custom_icon_bg_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Icon Background', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // tile background
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Customize Tile Colors', 'brainbizz'),
                'param_name' => 'h_tile_colors',
                'group' => esc_html__( 'Tile Background', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
                'dependency' => array(
                    'element' => 'ib_type',
                    'value' => 'tile'
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Custom Colors', 'brainbizz' ),
                'param_name' => 'custom_tile_colors',
                'group' => esc_html__( 'Tile Background', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'ib_type',
                    'value' => 'tile'
                ),
            ),
            // tile hover content colors
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Tile Hover Content', 'brainbizz'),
                'param_name' => 'tile_content_color_hover',
                'value' => '#ffffff',
                'dependency' => array(
                    'element' => 'custom_tile_colors',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Tile Background', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Background color
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Background Customize Colors', 'brainbizz' ),
                'param_name'    => 'tile_bg_color_type',
                'value'         => array(
                    esc_html__( 'Default', 'brainbizz' )      => 'def',
                    esc_html__( 'Color', 'brainbizz' )      => 'color',
                ),
                'dependency' => array(
                    'element' => 'custom_tile_colors',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Tile Background', 'brainbizz' ),
            ),
            // background color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Color', 'brainbizz'),
                'param_name' => 'tile_bg_color',
                'value' => '#ffffff',
                'description' => esc_html__('Select background color', 'brainbizz'),
                'dependency' => array(
                    'element' => 'tile_bg_color_type',
                    'value' => 'color'
                ),
                'group' => esc_html__( 'Tile Background', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // background hover color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Hover Color', 'brainbizz'),
                'param_name' => 'tile_bg_color_hover',
                'value' => $theme_color,
                'description' => esc_html__('Select background hover color', 'brainbizz'),
                'dependency' => array(
                    'element' => 'tile_bg_color_type',
                    'value' => 'color'
                ),
                'group' => esc_html__( 'Tile Background', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ), 
            // title styles heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Title Styles', 'brainbizz'),
                'param_name' => 'h_title_styles',
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Title Tag', 'brainbizz' ),
                'param_name'    => 'title_tag',
                'value'         => array(
                    esc_html__( 'Span', 'brainbizz' )    => 'span',
                    esc_html__( 'Div', 'brainbizz' )    => 'div',
                    esc_html__( 'H2', 'brainbizz' )    => 'h2',
                    esc_html__( 'H3', 'brainbizz' )    => 'h3',
                    esc_html__( 'H4', 'brainbizz' )    => 'h4',
                    esc_html__( 'H5', 'brainbizz' )    => 'h5',
                    esc_html__( 'H6', 'brainbizz' )    => 'h6',
                ),
                'std' => 'h3',
                'group'         => esc_html__( 'Styling', 'brainbizz' ),
                'description' => esc_html__( 'Choose your tag for info box title', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // title Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title Font Size', 'brainbizz'),
                'param_name' => 'title_size',
                'value' => '',
                'description' => esc_html__( 'Enter Info Box title font-size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // title Font Weight
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title Font Weight', 'brainbizz'),
                'param_name' => 'title_weight',
                'value' => '',
                'description' => esc_html__( 'Enter Info Box title font-weight.', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // title Font Weight
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title Bottom Offset', 'brainbizz'),
                'param_name' => 'title_bot_offset',
                'value' => '',
                'description' => esc_html__( 'Enter Info Box title offset in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Title Fonts
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom font family for info box title', 'brainbizz' ),
                'param_name' => 'custom_fonts_title',
                'description' => esc_html__( 'Customize font family', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_title',
                'value' => '',
                'dependency' => array(
                    'element' => 'custom_fonts_title',
                    'value' => 'true',
                ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
            ),
            // title color checkbox
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Custom Title Color', 'brainbizz' ),
                'param_name' => 'custom_title_color',
                'description' => esc_html__( 'Select custom color', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // title color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Title Color', 'brainbizz'),
                'param_name' => 'title_color',
                'value' => $header_font_color,
                'description' => esc_html__('Select title color', 'brainbizz'),
                'dependency' => array(
                    'element' => 'custom_title_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // subtitle styles heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Subtitle Styles', 'brainbizz'),
                'param_name' => 'h_subtitle_styles',
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Subtitle Tag', 'brainbizz' ),
                'param_name'    => 'subtitle_tag',
                'value'         => array(
                    esc_html__( 'Span', 'brainbizz' )    => 'span',
                    esc_html__( 'Div', 'brainbizz' )    => 'div',
                    esc_html__( 'H2', 'brainbizz' )    => 'h2',
                    esc_html__( 'H3', 'brainbizz' )    => 'h3',
                    esc_html__( 'H4', 'brainbizz' )    => 'h4',
                    esc_html__( 'H5', 'brainbizz' )    => 'h5',
                    esc_html__( 'H6', 'brainbizz' )    => 'h6',
                ),
                'std' => 'span',
                'group'         => esc_html__( 'Styling', 'brainbizz' ),
                'description' => esc_html__( 'Choose your tag for info box subtitle', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // subtitle Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Subtitle Font Size', 'brainbizz'),
                'param_name' => 'subtitle_size',
                'value' => '',
                'description' => esc_html__( 'Enter Info Box subtitle font-size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Subtitle Fonts
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom font family for info box subtitle', 'brainbizz' ),
                'param_name' => 'custom_fonts_subtitle',
                'description' => esc_html__( 'Customize font family', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_subtitle',
                'value' => '',
                'dependency' => array(
                    'element' => 'custom_fonts_subtitle',
                    'value' => 'true',
                ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
            ),
            // subtitle color checkbox
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Custom Subtitle Color', 'brainbizz' ),
                'param_name' => 'custom_subtitle_color',
                'description' => esc_html__( 'Select custom color', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // subtitle color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Subtitle Color', 'brainbizz'),
                'param_name' => 'subtitle_color',
                'value' => '#000000',
                'description' => esc_html__('Select subtitle color', 'brainbizz'),
                'dependency' => array(
                    'element' => 'custom_subtitle_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // content styles heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Content Styles', 'brainbizz'),
                'param_name' => 'h_content_styles',
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Content Tag', 'brainbizz' ),
                'param_name'    => 'content_tag',
                'value'         => array(
                    esc_html__( 'Span', 'brainbizz' )    => 'span',
                    esc_html__( 'Div', 'brainbizz' )    => 'div',
                    esc_html__( 'H2', 'brainbizz' )    => 'h2',
                    esc_html__( 'H3', 'brainbizz' )    => 'h3',
                    esc_html__( 'H4', 'brainbizz' )    => 'h4',
                    esc_html__( 'H5', 'brainbizz' )    => 'h5',
                    esc_html__( 'H6', 'brainbizz' )    => 'h6',
                ),
                'std' => 'div',
                'group'         => esc_html__( 'Styling', 'brainbizz' ),
                'description' => esc_html__( 'Choose your tag for info box content', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // content Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Content Font Size', 'brainbizz'),
                'param_name' => 'content_size',
                'value' => '',
                'description' => esc_html__( 'Enter Info Box content font-size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // content Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Content Font Weight', 'brainbizz'),
                'param_name' => 'content_weight',
                'value' => '',
                'description' => esc_html__( 'Enter Info Box content font-weight.', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // Content Fonts
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom font family for info box content', 'brainbizz' ),
                'param_name' => 'custom_fonts_content',
                'description' => esc_html__( 'Customize font family', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_content',
                'value' => '',
                'dependency' => array(
                    'element' => 'custom_fonts_content',
                    'value' => 'true',
                ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
            ),
            // content color checkbox
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Custom Content Color', 'brainbizz' ),
                'param_name' => 'custom_content_color',
                'description' => esc_html__( 'Select custom color', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // content color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Content Color', 'brainbizz'),
                'param_name' => 'content_color',
                'value' => $main_font_color,
                'description' => esc_html__('Select content color', 'brainbizz'),
                'dependency' => array(
                    'element' => 'custom_content_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // button styles heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Button Styles', 'brainbizz'),
                'param_name' => 'h_button_styles',
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'add_read_more',
                    'value' => 'true'
                ),
            ),
            // button Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Font Size', 'brainbizz'),
                'param_name' => 'button_size',
                'value' => '',
                'description' => esc_html__( 'Enter Info Box button font-size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'add_read_more',
                    'value' => 'true'
                ),
            ),
            // Button Fonts
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom font family for info box button', 'brainbizz' ),
                'param_name' => 'custom_fonts_button',
                'description' => esc_html__( 'Customize font family', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'add_read_more',
                    'value' => 'true'
                ),
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_button',
                'value' => '',
                'dependency' => array(
                    'element' => 'custom_fonts_button',
                    'value' => 'true',
                ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
            ),
            // button color checkbox
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Custom Button Color', 'brainbizz' ),
                'param_name' => 'custom_button_color',
                'description' => esc_html__( 'Select custom color', 'brainbizz' ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
                'dependency' => array(
                    'element' => 'add_read_more',
                    'value' => 'true'
                ),
            ),
            // button color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Button Color', 'brainbizz'),
                'param_name' => 'button_color',
                'value' => $theme_color,
                'description' => esc_html__('Select button color', 'brainbizz'),
                'dependency' => array(
                    'element' => 'custom_button_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // button hover color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Button Hover Color', 'brainbizz'),
                'param_name' => 'button_color_hover',
                'value' => $header_font_color,
                'description' => esc_html__('Select button hover color', 'brainbizz'),
                'dependency' => array(
                    'element' => 'custom_button_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Styling', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
        )
    ));
    
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_wgl_info_box extends WPBakeryShortCode {
            
        }
    } 
}
