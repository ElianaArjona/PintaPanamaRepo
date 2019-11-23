<?php
	$theme_color = esc_attr(BrainBizz_Theme_Helper::get_option('theme-custom-color'));

	$defaults = array(
		// General
		'button_text' => 'Button text',
		'link' => '',
		'css_animation' => '',
		'extra_class' => '',
		// Style
		'size' => 'xl',
		'border_radius' => '',
		'align' => 'left',
		'full_width' => false,
		'inline' => false,
		'add_border' => true,
		'border_width' => '1px',
		'shadow_style' => 'none',
		// Typography
		'font_size' => '',
		'font_weight' => '',
		// Icon
		'icon_type' => 'none',
		'icon_font_type' => 'type_fontawesome',
		'icon_fontawesome' => 'fa fa-adjust',
		'icon_flaticon' => '',
		'image' => '',
		'img_width' => '',
		'icon_position' => 'left',
		'icon_font_size' => '',
		'custom_icon_color' => false,
		'icon_color' => '#ffffff',
		'icon_color_hover' => $theme_color,
		// Spacing
		'left_pad' => '',
		'right_pad' => '',
		'top_pad' => '',
		'bottom_pad' => '',
		'left_mar' => '',
		'right_mar' => '',
		'top_mar' => '',
		'bottom_mar' => '',
		// Colors
		'customize' => 'def',
		'bg_color' => $theme_color,
		'text_color' => '#ffffff',
		'border_color' => $theme_color,
		'bg_color_hover' => '#ffffff',
		'text_color_hover' => $theme_color,
		'border_color_hover' => $theme_color,
	);

	$atts = vc_shortcode_attribute_parse($defaults, $atts);
	extract($atts);
	
	$styles = $button_classes = $button_wrap_classes = $button_attr = $animation_class = $button_id = $button_id_attr = $button_styles = $button_icon_content = $button_value_font = '';

	// Render Google Fonts
	extract( BrainBizz_GoogleFontsRender::getAttributes( $atts, $this, array('google_fonts_button') ) );
	if ( ! empty( $styles_google_fonts_button ) ) {
		$button_value_font = esc_attr( $styles_google_fonts_button );
	}

	// Adding unique id for button item
	if ($customize != 'def' || $shadow_style != 'none' || (bool)$custom_icon_color) {
		$button_id = uniqid( "brainbizz_button_" );
		$button_id_attr = ' id='.$button_id;
	}

	$bg_color = !empty($bg_color) ? esc_html($bg_color) : 'transparent';
	$bg_color_hover = !empty($bg_color_hover) ? esc_html($bg_color_hover) : 'transparent';
	
	ob_start();
	if ($customize != 'def') {
		// button color
		echo "#$button_id a{
			color: ".(!empty($text_color) ? esc_html($text_color) : 'transparent').";
			background-color: ".$bg_color.";
			border-color: ".(!empty($border_color) ? esc_html($border_color) : 'transparent').";
		}";
		echo "#$button_id a:hover{
			color: ".(!empty($text_color_hover) ? esc_html($text_color_hover) : 'transparent').";
			background-color: ".$bg_color_hover.";
			border-color: ".(!empty($border_color_hover) ? esc_html($border_color_hover) : 'transparent').";
		}";
	}
	switch ($shadow_style) {
		case 'none':
			break;
		case 'before_hover':
			echo "#$button_id a{
				box-shadow: 0px 11px 29px 0 rgba(".BrainBizz_Theme_Helper::hexToRGB($bg_color).",0.45);
			}";
			echo "#$button_id a:hover{
				box-shadow: none;
			}";
			break;
		case 'on_hover':
			echo "#$button_id a{
				box-shadow: none;
			}";
			echo "#$button_id a:hover{
				box-shadow: 0px 11px 29px 0 rgba(".BrainBizz_Theme_Helper::hexToRGB($bg_color_hover).",0.45);
			}";
			break;
		case 'always':
			echo "#$button_id a{
				box-shadow: 0px 11px 29px 0 rgba(".BrainBizz_Theme_Helper::hexToRGB($bg_color).",0.45);
			}";
			echo "#$button_id a:hover{
				box-shadow: 0px 11px 29px 0 rgba(".BrainBizz_Theme_Helper::hexToRGB($bg_color_hover).",0.45);
			}";
			break;
		default:
			break;
	}
	if ((bool)$custom_icon_color) {
		// button icon color
		echo "#$button_id a .wgl_button-icon{
			color: ".(!empty($icon_color) ? esc_html($icon_color) : 'transparent').";
			transition: all 400ms;
		}";
		echo "#$button_id a:hover .wgl_button-icon{
			color: ".(!empty($icon_color_hover) ? esc_html($icon_color_hover) : 'transparent').";
		}";
	}
	$styles = ob_get_clean();
	BrainBizz_shortcode_css()->enqueue_brainbizz_css($styles);	

	// Link Settings
	$link_temp = vc_build_link($link);
	$url = $link_temp['url'];
	$button_title = $link_temp['title'];
	$target = $link_temp['target'];

	// Animation
	if (!empty($atts['css_animation'])) {
		$animation_class = $this->getCSSAnimation( $atts['css_animation'] );
	}
	$button_attr .= !empty($url) ? 'href="'.esc_url($url).'"' : 'href="#"';
	$button_attr .= !empty($button_title) ? " title='".esc_attr($button_title)."'" : '';
	$button_attr .= !empty($target) ? ' target="'.esc_attr($target).'"' : '';

	// Button classes
	$button_wrap_classes .= ' wgl_button-'.$size;
	$button_wrap_classes .= (bool)$full_width ? ' wgl_button-full' : '';
	$button_wrap_classes .= (bool)$inline ? ' wgl_button-inline' : '';
	$button_wrap_classes .= ($icon_type != 'none') ? ' wgl_button-icon_'.$icon_position : '';
	$button_wrap_classes .= ' a'.$align;
	$button_wrap_classes .= $animation_class;
	$button_wrap_classes .= !empty($extra_class) ? ' '.$extra_class : '';

	// Size & font-size
	$button_styles .= ($font_size != '') ? 'font-size:'.(int)$font_size.'px; ' : '';
	$button_styles .= ($font_weight != '') ? 'font-weight:'.(int)$font_weight.'; ' : '';

	// Border styles
	$button_styles .= ($border_radius != '') ? 'border-radius:'.(int)$border_radius.'px; ' : '';
	$button_styles .= !(bool)$add_border ? 'border-style: none; ' : '';
	$button_styles .= (bool)$add_border ? 'border-width:'.(int)$border_width.'px; ' : '';

	// Paddings
	$button_styles .= ($left_pad != '') ? 'padding-left:'.$left_pad.'px; ' : '';
	$button_styles .= ($right_pad != '') ? 'padding-right:'.$right_pad.'px; ' : '';
	$button_styles .= ($top_pad != '') ? 'padding-top:'.$top_pad.'px; ' : '';
	$button_styles .= ($bottom_pad != '') ? 'padding-bottom:'.$bottom_pad.'px; ' : '';

	// Margins
	$button_styles .= ($left_mar != '') ? 'margin-left:'.$left_mar.'px; ' : '';
	$button_styles .= ($right_mar != '') ? 'margin-right:'.$right_mar.'px; ' : '';
	$button_styles .= ($top_mar != '') ? 'margin-top:'.$top_mar.'px; ' : '';
	$button_styles .= ($bottom_mar != '') ? 'margin-bottom:'.$bottom_mar.'px; ' : '';

	// Google fonts
	$button_styles .= $button_value_font;
	$button_attr .= !empty($button_styles) ? ' style="'.esc_attr($button_styles).'"' : '';

	// Button content
	if ($icon_type == 'font') {
		// button icon (font)
		if ($icon_font_type == 'type_fontawesome') {
			wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
			$icon_font = $icon_fontawesome;
		} else if($icon_font_type == 'type_flaticon'){
			wp_enqueue_style('flaticon', get_template_directory_uri() . '/fonts/flaticon/flaticon.css');
			$icon_font = $icon_flaticon;
		}
		$button_icon_style = ($icon_font_size != '') ? 'style="font-size:'.(int)$icon_font_size.'px;"' : '';
		$button_icon_content = !empty($icon_font) ? '<i class="wgl_button-icon '.esc_attr($icon_font).'" '.$button_icon_style.'></i>' : '';
	} else if ($icon_type == 'image' && !empty($image)){
		// button icon (image)
		$featured_image = wp_get_attachment_image_src($image, 'full');
		$featured_image_url = $featured_image[0];
		$button_image_src = ($img_width != '') ? (aq_resize($featured_image_url, $img_width*2, '', true, true, true)) : $featured_image_url;
		$button_img_width_style = ($img_width != '') ? 'style="width:'.(int)$img_width.'px;"' : '';
		$button_icon_content .= '<span class="wgl_button-icon"><img src="'.esc_url($button_image_src).'" alt="'.esc_attr($button_text).'" '.$button_img_width_style.' /></span>';
	}
	switch ($icon_position) {
		case 'none':
			$button_content = esc_html($button_text);
			break;
		case 'left':
			$button_content = $button_icon_content . esc_html($button_text);
			break;
		case 'right':
			$button_content = esc_html($button_text) . $button_icon_content;
			break;
	}


	$output = '<div'.$button_id_attr.' class="brainbizz_module_button wgl_button'.esc_attr($button_wrap_classes).'">'; 
		$output .= '<a '.$button_attr.' class="wgl_button_link">';
			$output .= $button_content;
		$output .= '</a>';
	$output .= '</div>';

	echo BrainBizz_Theme_Helper::render_html($output);
?>

