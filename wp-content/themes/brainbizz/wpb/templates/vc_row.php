<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $equal_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_bg
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = '';
$disable_element = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
	'vc_row',
	'wpb_row',
	//deprecated
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);

if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if ( vc_shortcode_custom_css_has_property( $css, array(
		'border',
		'background',
	) ) || $video_bg || $parallax
) {
	$css_classes[] = 'vc_row-has-fill';
}

if ( ! empty( $atts['gap'] ) ) {
	$css_classes[] = 'vc_column-gap-' . $atts['gap'];
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if ( ! empty( $full_width ) ) {
	$wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	if ( 'stretch_row_content' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
	} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
		$css_classes[] = 'vc_row-no-padding';
	}
	$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = 'vc_row-o-full-height';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = 'vc_row-o-columns-' . $columns_placement;
		if ( 'stretch' === $columns_placement ) {
			$css_classes[] = 'vc_row-o-equal-height';
		}
	}
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}

if (isset($add_extended) && (bool)$add_extended) {
	$css_classes[] = 'wgl-row-animation';
}

if (isset($extended_animation) && 'sphere' == $extended_animation) {

	$figure_color = isset($figure_color) ? $figure_color : '#ffffff';
	$width = isset($sphere_width) ? $sphere_width : '750';
	$extended_animation_pos_vertical = isset($extended_animation_pos_vertical) ? $extended_animation_pos_vertical : '50';
	$extended_animation_pos_horizont = isset($extended_animation_pos_horizont) ? $extended_animation_pos_horizont : '70';
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}



if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';


//Render row
$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= wpb_js_remove_wpautop( $content );

if (isset($add_extended) && (bool)$add_extended) {
	$values = (array) vc_param_group_parse_atts( $values );
	$item_data = array();

	foreach ( $values as $data ) {
	    $new_data = $data;
	    $new_data['extended_animation'] = isset( $data['extended_animation'] ) ? $data['extended_animation'] : 'sphere';
	    $new_data['figure_color'] = isset( $data['figure_color'] ) ? $data['figure_color'] : '#ffffff';
	    $new_data['extended_animation_pos_horizont'] = isset( $data['extended_animation_pos_horizont'] ) ? $data['extended_animation_pos_horizont'] : '50';
	    $new_data['extended_animation_pos_vertical'] = isset( $data['extended_animation_pos_vertical'] ) ? $data['extended_animation_pos_vertical'] : '50';
	    $new_data['sphere_width'] = isset( $data['sphere_width'] ) ? $data['sphere_width'] : '100';
	    $new_data['add_second_sphere'] = isset( $data['add_second_sphere'] ) ? $data['add_second_sphere'] : false;
	    $new_data['particles_position_top'] = isset( $data['particles_position_top'] ) ? $data['particles_position_top'] : '0';
	    $new_data['particles_position_left'] = isset( $data['particles_position_left'] ) ? $data['particles_position_left'] : '0';
	    $new_data['particles_width'] = isset( $data['particles_width'] ) ? $data['particles_width'] : '100';
	    $new_data['particles_height'] = isset( $data['particles_height'] ) ? $data['particles_height'] : '100';

	    $item_data[] = $new_data;
	}

	foreach ( $item_data as $item_d ) {

		if ($item_d['extended_animation'] == 'particles') {
			wp_enqueue_script('particles', get_template_directory_uri() . '/js/particles.min.js', array('jquery'), false, true);
		}

	    //Add animation sphere
		if ('sphere' == $item_d['extended_animation']) {
			$output .= '<div class="wgl-row_background" style="top: '.esc_attr($item_d['extended_animation_pos_vertical']).'%;left: '.esc_attr($item_d['extended_animation_pos_horizont']).'%">'.do_shortcode('[wgl_earth figure_color="'.($item_d['figure_color']).'" width="'.($item_d['sphere_width']).'" add_second_sphere="'.($item_d['add_second_sphere']).'"]').'</div>';
		}

		// //Add Animation particles
		if ('particles' == $item_d['extended_animation']) {
			$particles_position_top = 'top:'.($item_d['particles_position_top']).'%;';
			$particles_position_left = 'left:'.($item_d['particles_position_left']).'%;';
			$particles_width = 'width:'.($item_d['particles_width']).'%;';
			$particles_height = 'height:'.($item_d['particles_height']).'%;';
			$particles_style = $particles_position_top . $particles_position_left . $particles_width . $particles_height;

			$particles_id = uniqid( 'particles_' );
			$output .= '<div id="'.esc_attr($particles_id).'" class="particles-js" style="'.$particles_style.'" data-particles-color="'.esc_attr($item_d['figure_color']).'"></div>';
		}

	}
}

$output .= '</div>';
$output .= $after_output;

echo BrainBizz_Theme_Helper::render_html($output);
