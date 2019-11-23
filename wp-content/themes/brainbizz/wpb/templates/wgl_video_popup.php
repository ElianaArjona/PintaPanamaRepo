<?php 
$theme_color = esc_attr(BrainBizz_Theme_Helper::get_option("theme-custom-color"));

$defaults = array(
    'title' => '',
    'title_pos' => 'bot',
    'button_pos' => 'center',
    'always_pulse_anim' => '',
    'bg_image' => '',
    'link' => '#',
    'title_color' => '#ffffff',
    'custom_button_color' => false,
    'button_color' => '#ffffff',
    'bg_color_type' => 'def',
    'background_color' => $theme_color,
    'background_gradient_start' => '',
    'background_gradient_end' => '',
    'custom_triangle_size' => false,
    'triangle_size' => '',
    'title_size' => '14',
	'extra_class' => '',
    'animation_color' => '#ffffff',
);

$atts = vc_shortcode_attribute_parse($defaults, $atts);
extract($atts);

// Enqueue swipebox script
wp_enqueue_script('swipebox', get_template_directory_uri() . '/js/swipebox/js/jquery.swipebox.min.js', array(), false, false);
wp_enqueue_style('swipebox', get_template_directory_uri() . '/js/swipebox/css/swipebox.min.css');

$videobox_id = uniqid( "brainbizz_video_" );

$title_font_family = $video_wrap_classes = '';

ob_start();
	if ($bg_color_type == 'color') {
		echo "#$videobox_id .videobox_link{
			background-color: ".(!empty($background_color) ? esc_html($background_color) : 'transparent').";
		}";
	} else if ($bg_color_type == 'gradient') {
		$background_gradient_start = !empty($background_gradient_start) ? esc_html($background_gradient_start) : 'transparent';
		$background_gradient_end = !empty($background_gradient_end) ? esc_html($background_gradient_end) : 'transparent';
		// video gradient
		echo "#$videobox_id .videobox_link{
			background: linear-gradient(90deg, $background_gradient_start, $background_gradient_end);
		}";
		// \video gradient
	}
$styles = ob_get_clean();
BrainBizz_shortcode_css()->enqueue_brainbizz_css($styles);

// Render Google Fonts
extract( BrainBizz_GoogleFontsRender::getAttributes( $atts, $this, array('google_fonts_title') ) );

// Animation
if (!empty($atts['css_animation'])) {
	$animation_class = $this->getCSSAnimation( $atts['css_animation'] );
}
	
if ( ! empty( $styles_google_fonts_title ) ) {
	$title_font_family = esc_attr( $styles_google_fonts_title ) . ';';
}

$video_wrap_classes .= ' title_pos-'.$title_pos;
$video_wrap_classes .= ' button_align-'.$button_pos;
$video_wrap_classes .= !empty($bg_image) ? ' with_image' : ' no_image';
$video_wrap_classes .= !empty($animation_class) ? ' '.$animation_class : '';
$video_wrap_classes .= !empty($extra_class) ? ' '.$extra_class : '';
$video_wrap_classes .= (bool)$always_pulse_anim ? ' always-pulse-animation' : '';

// Font Size of Title
$title_size = ($title_size != '') ? 'font-size: ' . $title_size . 'px;line-height:'.$title_size * 1.5.'px;' : '';

// Color of Title
$title_color = !empty($title_color) ? 'color: '.$title_color.';' : '';

// Styles of Title
$title_style = !empty($title_color) || !empty($title_size) || !empty($title_font_family) ? 'style="'.esc_attr($title_color).$title_font_family.esc_attr($title_size).'"' : '';

//Video Title
$title = !empty($title) ? '<h2 class="title" '.$title_style.' >'.$title.'</h2>' : '';

// Triangle color
$triangle_color_style = ((bool)$custom_button_color) ? ' border-color: transparent transparent transparent '. esc_attr($button_color).';' : '';

// Triangle size
$triangle_size_style = !empty($triangle_size) ? ' width:'.esc_attr($triangle_size).'px; height:'.esc_attr($triangle_size).'px;' : '';

// Element Shadow
$background_color_hex = $background_color;
list($background_color_r, $background_color_g, $background_color_b) = sscanf($background_color_hex, "#%02x%02x%02x");
$videobox_shadow = "box-shadow: 0px 5px 20px 7px rgba($background_color_r, $background_color_g, $background_color_b, 0.25);";

// Animation color
$animation_color_style = ' style="border-color: '.(!empty($animation_color) ? esc_attr($animation_color) : 'transparent').'";';


// render html
$style_without_bg = '';
$uniqrel = uniqid();
$style = 'border-color:'.esc_attr($background_color).'; color:'.esc_attr($button_color).';'.$triangle_size_style.$videobox_shadow;

$style_without_bg .= 'border-color: '.esc_attr($button_color).'; color:'. esc_attr($button_color).';'.$videobox_shadow;

echo '<div id="'.esc_attr($videobox_id).'" class="brainbizz_module_videobox'.esc_attr($video_wrap_classes).'">';
if ( !empty($bg_image) ){
	echo '<a data-rel="youtube-'.esc_attr($uniqrel).'" href="'.esc_url($link).'" class="videobox_wrapper_link videobox">';
		echo wp_get_attachment_image( $bg_image , 'full');
		echo '<div class="videobox_content">';
			echo BrainBizz_Theme_Helper::render_html($title);
			echo '<div class="videobox_link" style="'.BrainBizz_Theme_Helper::render_html($style_without_bg).'">';
				echo '<div class="videobox_icon" style="'.$triangle_color_style.'"></div>';
				echo '<div class="videobox_animation circle_1"'.$animation_color_style.'></div>';
				echo '<div class="videobox_animation circle_2"'.$animation_color_style.'></div>';
				echo '<div class="videobox_animation circle_3"'.$animation_color_style.'></div>';
			echo '</div>';
		echo '</div>';
	echo '</a>';
}else{
	echo '<div class="videobox_content">';
		echo BrainBizz_Theme_Helper::render_html($title);
		echo '<a data-rel="youtube-'.esc_attr($uniqrel).'" class="videobox_link videobox" href="'.esc_url($link).'" style="'.BrainBizz_Theme_Helper::render_html($style).'" >';
			echo '<div class="videobox_icon" style="'.$triangle_color_style.'"></div>';
			echo '<div class="videobox_animation circle_1"'.$animation_color_style.'></div>';
			echo '<div class="videobox_animation circle_2"'.$animation_color_style.'></div>';
			echo '<div class="videobox_animation circle_3"'.$animation_color_style.'></div>';
		echo '</a>';
	echo '</div>';	
}
echo '</div>';