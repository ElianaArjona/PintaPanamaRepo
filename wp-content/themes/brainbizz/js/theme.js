"use strict";

is_visible_init ();
brainbizz_slick_navigation_init();

jQuery(document).ready(function($) {
	brainbizz_sticky_init();
	brainbizz_search_init();
	brainbizz_mobile_header();
	brainbizz_woocommerce_qty();
	brainbizz_init_timeline_appear();
	brainbizz_init_timeline_horizontal_appear();
	brainbizz_init_progress_appear();
	brainbizz_carousel_slick();
	brainbizz_counter_init();
	brainbizz_countdown_init ();
	brainbizz_img_layers();
	brainbizz_page_title_parallax ();
	brainbizz_message_anim_init();
	brainbizz_scroll_up();
	brainbizz_link_scroll();
	brainbizz_skrollr_init();
	brainbizz_sticky_sidebar ();
	brainbizz_videobox_init ();
	brainbizz_parallax_video();
	wgl_timeTabs();
	brainbizz_select_wrap();
	jQuery( '.wgl_module_title .carousel_arrows' ).brainbizz_slick_navigation();
	brainbizz_menu_lavalamp();
});

jQuery(window).load(function() {
	brainbizz_isotope ();
	brainbizz_blog_masonry_init ();
	brainbizz_instagram_init();
	setTimeout(function(){
		jQuery('#preloader-wrapper').fadeOut();
	},1100);
	particles_custom ();
	jQuery(".wgl-currency-stripe_scrolling").each(function(){
    	jQuery(this).simplemarquee({
	        speed: 40,
	        space: 0,
	        handleHover: true,
	        handleResize: true
	    });
    })
});