<?php 


if (!class_exists( 'RWMB_Loader' )) {
	return;
}
class BrainBizz_Metaboxes{
	public function __construct(){
		//Team Fields Metaboxes
		add_filter( 'rwmb_meta_boxes', array( $this, 'team_meta_boxes' ) );

		//Portfolio Fields Metaboxes
		add_filter( 'rwmb_meta_boxes', array( $this, 'portfolio_meta_boxes' ) );
		add_filter( 'rwmb_meta_boxes', array( $this, 'portfolio_related_meta_boxes' ) );

		//Blog Fields Metaboxes
		add_filter( 'rwmb_meta_boxes', array( $this, 'blog_settings_meta_boxes' ) );
		add_filter( 'rwmb_meta_boxes', array( $this, 'blog_meta_boxes' ) );
		add_filter( 'rwmb_meta_boxes', array( $this, 'blog_related_meta_boxes' ));
		
		//Page Fields Metaboxes
		add_filter( 'rwmb_meta_boxes', array( $this, 'page_layout_meta_boxes' ) );
		//Colors Fields Metaboxes
		add_filter( 'rwmb_meta_boxes', array( $this, 'page_color_meta_boxes' ) );		
		//Logo Fields Metaboxes
		add_filter( 'rwmb_meta_boxes', array( $this, 'page_logo_meta_boxes' ) );		
		//Header Builder Fields Metaboxes
		add_filter( 'rwmb_meta_boxes', array( $this, 'page_header_meta_boxes' ) );
		//Title Fields Metaboxes
		add_filter( 'rwmb_meta_boxes', array( $this, 'page_title_meta_boxes' ) );
		//Footer Fields Metaboxes
		add_filter( 'rwmb_meta_boxes', array( $this, 'page_footer_meta_boxes' ) );				
		//Copyright Fields Metaboxes
		add_filter( 'rwmb_meta_boxes', array( $this, 'page_copyright_meta_boxes' ) );		
	}

	public function team_meta_boxes( $meta_boxes ) {
	    $meta_boxes[] = array(
	        'title'      => esc_html__( 'Team Options', 'brainbizz' ),
	        'post_types' => array( 'team' ),
	        'context' => 'advanced',
	        'fields'     => array(
	        	array(
		            'name' => esc_html__( 'Info Name Department', 'brainbizz' ),
		            'id'   => 'department_name',
		            'type' => 'text',
		            'class' => 'name-field'
		        ),       
	        	array(
		            'name' => esc_html__( 'Member Department', 'brainbizz' ),
		            'id'   => 'department',
		            'type' => 'text',
		            'class' => 'field-inputs'
				),
				array(
					'name' => esc_html__( 'Member Info', 'brainbizz' ),
		            'id'   => 'info_items',
		            'type' => 'social',
		            'clone' => true,
		            'sort_clone'     => true,
		            'options' => array(
						'name'    => array(
							'name' => esc_html__( 'Name', 'brainbizz' ),
							'type_input' => 'text'
							),
						'description' => array(
							'name' => esc_html__( 'Description', 'brainbizz' ),
							'type_input' => 'text'
							),
						'link' => array(
							'name' => esc_html__( 'Link', 'brainbizz' ),
							'type_input' => 'text'
							),
					),
		        ),		
		        array(
					'name'     => esc_html__( 'Social Icons', 'brainbizz' ),
					'id'          => "soc_icon",
					'type'        => 'select_icon',
					'options'     => WglAdminIcon()->get_icons_name(),
					'clone' => true,
					'sort_clone'     => true,
					'placeholder' => esc_html__( 'Select an icon', 'brainbizz' ),
					'multiple'    => false,
					'std'         => 'default',
				),
		        array(
					'name'             => esc_html__( 'Info Background Image', 'brainbizz' ),
					'id'               => "mb_info_bg",
					'type'             => 'file_advanced',
					'max_file_uploads' => 1,
					'mime_type'        => 'image',
				), 
	        ),
	    );
	    return $meta_boxes;
	}
	
	public function portfolio_meta_boxes( $meta_boxes ) {
	    $meta_boxes[] = array(
	        'title'      => esc_html__( 'Portfolio Options', 'brainbizz' ),
	        'post_types' => array( 'portfolio' ),
	        'context' => 'advanced',
	        'fields'     => array(
	        	array(
					'id'   => 'mb_portfolio_featured_img',
					'name' => esc_html__( 'Show Featured image on single', 'brainbizz' ),
					'type' => 'switch',
					'std' => 'true',
				),        	
				array(
					'id'   => 'mb_portfolio_title',
					'name' => esc_html__( 'Show Title on single', 'brainbizz' ),
					'type' => 'switch',
				),	
				array(
					'name' => esc_html__( 'Info', 'brainbizz' ),
		            'id'   => 'mb_portfolio_info_items',
		            'type' => 'social',
		            'clone' => true,
		            'sort_clone'     => true,
		            'desc' => esc_html__( 'Description', 'brainbizz' ),
		            'options' => array(
						'name'    => array(
							'name' => esc_html__( 'Name', 'brainbizz' ),
							'type_input' => 'text'
							),
						'description' => array(
							'name' => esc_html__( 'Description', 'brainbizz' ),
							'type_input' => 'text'
							),
						'link' => array(
							'name' => esc_html__( 'Url', 'brainbizz' ),
							'type_input' => 'text'
							),
					),
		        ),		
		        array(
					'name'     => esc_html__( 'Info Description', 'brainbizz' ),
					'id'          => "mb_portfolio_editor",
					'type'        => 'wysiwyg',
					'multiple'    => false,
					'desc' => esc_html__( 'Info description is shown in one row with a main info', 'brainbizz' ),
				),			
		        array(
					'name'     => esc_html__( 'Tags On/Off', 'brainbizz' ),
					'id'          => "mb_portfolio_above_content_cats",
					'type'        => 'button_group',
					'options'     => array(
						'default' => esc_html__( 'Default', 'brainbizz' ),
						'yes' => esc_html__( 'On', 'brainbizz' ),
						'no' => esc_html__( 'Off', 'brainbizz' ),
					),
					'multiple'    => false,
					'std'         => 'default',
				),		
		        array(
					'name'     => esc_html__( 'Share Links On/Off', 'brainbizz' ),
					'id'          => "mb_portfolio_above_content_share",
					'type'        => 'button_group',
					'options'     => array(
						'default' => esc_html__( 'Default', 'brainbizz' ),
						'yes' => esc_html__( 'On', 'brainbizz' ),
						'no' => esc_html__( 'Off', 'brainbizz' ),
					),
					'multiple'    => false,
					'std'         => 'default',
				),	
	        ),
	    );
	    return $meta_boxes;
	}

	public function portfolio_related_meta_boxes( $meta_boxes ) {
	    $meta_boxes[] = array(
	        'title'      => esc_html__( 'Related Portfolio', 'brainbizz' ),
	        'post_types' => array( 'portfolio' ),
	        'context' => 'advanced',
	        'fields'     => array(
	        	array(
					'id'   => 'mb_pf_carousel_r',
					'name' => esc_html__( 'Display items carousel for this portfolio post', 'brainbizz' ),
					'type' => 'switch',
					'std'  => 1,
				),           	
				array(
					'id'   => 'mb_pf_show_r',
					'name' => esc_html__( 'Show related', 'brainbizz' ),
					'type' => 'switch',
					'std'  => 1,
				),
				array(
					'name' => esc_html__( 'Title', 'brainbizz' ),
					'id'   => "mb_pf_title_r",
					'type' => 'text',
					'std'  => 'Related Portfolio',
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('mb_pf_show_r','=','1')
							),
						),
					),
				), 			
				array(
					'name' => esc_html__( 'Categories', 'brainbizz' ),
					'id'   => "mb_pf_cat_r",
					'multiple'    => true,
					'type' => 'taxonomy_advanced',
					'taxonomy' => 'portfolio-category',
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('mb_pf_show_r','=','1')
							),
						),
					),
				),     
				array(
					'name'     => esc_html__( 'Columns', 'brainbizz' ),
					'id'          => "mb_pf_column_r",
					'type'        => 'button_group',
					'options'     => array(
						'def' => esc_html__( 'Default', 'brainbizz' ),
						'1' => esc_html__( '1', 'brainbizz' ),
						'2' => esc_html__( '2', 'brainbizz' ),
						'3' => esc_html__( '3', 'brainbizz' ),
						'4' => esc_html__( '4', 'brainbizz' ),
					),
					'multiple'    => false,
					'std'         => 'def',
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('mb_pf_show_r','=','1')
							),
						),
					),
				),  
				array(
					'name' => esc_html__( 'Number of Related Items', 'brainbizz' ),
					'id'   => "mb_pf_number_r",
					'type' => 'number',
					'min'  => 0,
					'step' => 1,
					'std'  => 4,
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('mb_pf_show_r','=','1')
							),
						),
					),
				),
	        ),
	    );
	    return $meta_boxes;
	}

	public function blog_settings_meta_boxes( $meta_boxes ) {
	    $meta_boxes[] = array(
	        'title'      => esc_html__( 'Post Settings', 'brainbizz' ),
	        'post_types' => array( 'post' ),
	        'context' => 'advanced',
	        'fields'     => array(
				array(
					'name'     => esc_html__( 'Post Layout', 'brainbizz' ),
					'id'          => "mb_post_layout_conditional",
					'type'        => 'button_group',
					'options'     => array(
						'default' => esc_html__( 'Default', 'brainbizz' ),
						'custom' => esc_html__( 'Custom', 'brainbizz' ),
					),
					'multiple'    => false,
					'std'         => 'default',
				),        
				array(
					'name'     => esc_html__( 'Post Layout Settings', 'brainbizz' ),
					'type'     => 'wgl_heading',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_post_layout_conditional','=','custom')
						)),
					),
				),  	    
				array(
					'name'     => esc_html__( 'Post Layout', 'brainbizz' ),
					'id'          => "mb_single_type_layout",
					'type'        => 'button_group',
					'options'     => array(
						'1' => esc_html__( 'Title First', 'brainbizz' ),
						'2' => esc_html__( 'Image First', 'brainbizz' ),
						'3' => esc_html__( 'Overlay Image', 'brainbizz' ),
					),
					'multiple'    => false,
					'std'         => '1',
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('mb_post_layout_conditional','=','custom')
							),
						),
					),
				), 
				array(
					'name' => esc_html__( 'Spacing', 'brainbizz' ),
					'id'   => 'mb_single_padding_layout_3',
					'type' => 'wgl_offset',
					'options' => array(
						'mode'   => 'padding',
						'top'    => true,
						'right'  => false,
						'bottom' => true,
						'left'   => false,
					),
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_post_layout_conditional','=','custom'),
							array('mb_single_type_layout','=','3'),
						)),
					),
					'std' => array(
						'padding-top' => '300',
						'padding-bottom' => '30'
					)
				),
				array(
					'id'   => 'mb_single_apply_animation',
					'name' => esc_html__( 'Apply Animation', 'brainbizz' ),
					'type' => 'switch',
					'std'  => 1,
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_post_layout_conditional','=','custom'),
							array('mb_single_type_layout','=','3'),
						)),
					),
				),
	        ),
	    );
	    return $meta_boxes;
	}

	public function blog_meta_boxes( $meta_boxes ) {
		$meta_boxes[] = array(
			'title'      => esc_html__( 'Post Format Layout', 'brainbizz' ),
			'post_types' => array( 'post' ),
			'context' => 'advanced',
			'fields'     => array(
				// Standard Post Format
				array(
					'name'             => esc_html__( 'Standard Post( Enabled only Featured Image for this post format)', 'brainbizz' ),
					'id'               => "post_format_standard",
					'type'             => 'static-text',
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('formatdiv','=','0')
							),
						),
					),
				),
				// Gallery Post Format  
				array(
					'name'     => esc_html__( 'Gallery Settings', 'brainbizz' ),
					'type'     => 'wgl_heading',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('formatdiv','=','gallery')
						)),
					),
				),  
				array(
					'name'             => esc_html__( 'Add Images', 'brainbizz' ),
					'id'               => "post_format_gallery",
					'type'             => 'image_advanced',
					'max_file_uploads' => '',
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('formatdiv','=','gallery')
							),
						),
					),
				),
				// Video Post Format
				array(
					'name'     => esc_html__( 'Video Settings', 'brainbizz' ),
					'type'     => 'wgl_heading',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('formatdiv','=','video')
						)),
					),
				), 
				array(
					'name' => esc_html__( 'Video Style', 'brainbizz' ),
					'id'   => "post_format_video_style",
					'type'        => 'select',
					'options'     => array(
						'bg_video' => esc_html__( 'Background Video', 'brainbizz' ),
						'popup' => esc_html__( 'Popup', 'brainbizz' ),
					),
					'multiple'    => false,
					'std'         => 'bg_video',
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('formatdiv','=','video')
							),
						),
					),
				),	
				array(
					'name' => esc_html__( 'Start Video', 'brainbizz' ),
					'id'   => "start_video",
					'type' => 'number',
					'std'  => '0',
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('formatdiv','=','video'),
								array('post_format_video_style','=','bg_video'),
							),
						),
					),
				),				
				array(
					'name' => esc_html__( 'End Video', 'brainbizz' ),
					'id'   => "end_video",
					'type' => 'number',
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('formatdiv','=','video'),
								array('post_format_video_style','=','bg_video'),
							),
						),
					),
				),	
				array(
					'name' => esc_html__( 'oEmbed URL', 'brainbizz' ),
					'id'   => "post_format_video_url",
					'type' => 'oembed',
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('formatdiv','=','video')
							),
							array(
								array('post_format_video_select','=','oEmbed')
							)
						),
					),
				),
				// Quote Post Format
				array(
					'name'     => esc_html__( 'Quote Settings', 'brainbizz' ),
					'type'     => 'wgl_heading',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('formatdiv','=','quote')
						)),
					),
				), 
				array(
					'name'             => esc_html__( 'Quote Text', 'brainbizz' ),
					'id'               => "post_format_qoute_text",
					'type'             => 'textarea',
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('formatdiv','=','quote')
							),
						),
					),
				),
				array(
					'name'             => esc_html__( 'Author Name', 'brainbizz' ),
					'id'               => "post_format_qoute_name",
					'type'             => 'text',
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('formatdiv','=','quote')
							),
						),
					),
				),			
				array(
					'name'             => esc_html__( 'Author Position', 'brainbizz' ),
					'id'               => "post_format_qoute_position",
					'type'             => 'text',
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('formatdiv','=','quote')
							),
						),
					),
				),
				array(
					'name'             => esc_html__( 'Author Avatar', 'brainbizz' ),
					'id'               => "post_format_qoute_avatar",
					'type'             => 'image_advanced',
					'max_file_uploads' => 1,
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('formatdiv','=','quote')
							),
						),
					),
				),
				// Audio Post Format
				array(
					'name'     => esc_html__( 'Audio Settings', 'brainbizz' ),
					'type'     => 'wgl_heading',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('formatdiv','=','audio')
						)),
					),
				), 
				array(
					'name' => esc_html__( 'oEmbed URL', 'brainbizz' ),
					'id'   => "post_format_audio_url",
					'type' => 'oembed',
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('formatdiv','=','audio')
							),
							array(
								array('post_format_audio_select','=','oEmbed')
							)
						),
					),
				),
				// Link Post Format
				array(
					'name'     => esc_html__( 'Link Settings', 'brainbizz' ),
					'type'     => 'wgl_heading',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('formatdiv','=','link')
						)),
					),
				), 
				array(
					'name'             => esc_html__( 'URL', 'brainbizz' ),
					'id'               => "post_format_link_url",
					'type'             => 'url',
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('formatdiv','=','link')
							),
						),
					),
				),
				array(
					'name'             => esc_html__( 'Text', 'brainbizz' ),
					'id'               => "post_format_link_text",
					'type'             => 'text',
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('formatdiv','=','link')
							),
						),
					),
				),
			)
		);
		return $meta_boxes;
	}

	public function blog_related_meta_boxes( $meta_boxes ) {
	    $meta_boxes[] = array(
	        'title'      => esc_html__( 'Related Blog Post', 'brainbizz' ),
	        'post_types' => array( 'post' ),
	        'context' => 'advanced',
	        'fields'     => array(        	
				array(
					'id'   => 'mb_blog_show_r',
					'name' => esc_html__( 'Related On/Off', 'brainbizz' ),
					'type' => 'switch',
					'std'  => 1,
				),
				array(
					'name'     => esc_html__( 'Related Settings', 'brainbizz' ),
					'type'     => 'wgl_heading',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_blog_show_r','=','1')
						)),
					),
				), 
				array(
					'name' => esc_html__( 'Title', 'brainbizz' ),
					'id'   => "mb_blog_title_r",
					'type' => 'text',
					'std'  => 'Related Posts',
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('mb_blog_show_r','=','1')
							),
						),
					),
				), 			
				array(
					'name' => esc_html__( 'Categories', 'brainbizz' ),
					'id'   => "mb_blog_cat_r",
					'multiple'    => true,
					'type' => 'taxonomy_advanced',
					'taxonomy' => 'category',
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('mb_blog_show_r','=','1')
							),
						),
					),
				),     
				array(
					'name'     => esc_html__( 'Columns', 'brainbizz' ),
					'id'          => "mb_blog_column_r",
					'type'        => 'button_group',
					'options'     => array(
						'12' => esc_html__( '1', 'brainbizz' ),
						'6' => esc_html__( '2', 'brainbizz' ),
						'4' => esc_html__( '3', 'brainbizz' ),
						'3' => esc_html__( '4', 'brainbizz' ),
					),
					'multiple'    => false,
					'std'         => '6',
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('mb_blog_show_r','=','1')
							),
						),
					),
				),  
				array(
					'name' => esc_html__( 'Number of Related Items', 'brainbizz' ),
					'id'   => "mb_blog_number_r",
					'type' => 'number',
					'min'  => 0,
					'step' => 1,
					'std'  => 2,
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('mb_blog_show_r','=','1')
							),
						),
					),
				),
	        	array(
					'id'   => 'mb_blog_carousel_r',
					'name' => esc_html__( 'Display items carousel for this blog post', 'brainbizz' ),
					'type' => 'switch',
					'std'  => 1,
					'attributes' => array(
						'data-conditional-logic' => array(
							array(
								array('mb_blog_show_r','=','1')
							),
						),
					),
				),  
	        ),
	    );
	    return $meta_boxes;
	}

	public function page_layout_meta_boxes( $meta_boxes ) {

	    $meta_boxes[] = array(
	        'title'      => esc_html__( 'Page Layout', 'brainbizz' ),
	        'post_types' => array( 'page' , 'post', 'team', 'practice','portfolio' ),
	        'context' => 'advanced',
	        'fields'     => array(
				array(
					'name'     => esc_html__( 'Page Sidebar Layout', 'brainbizz' ),
					'id'          => "mb_page_sidebar_layout",
					'type'        => 'wgl_image_select',
					'options'     => array(
						'default' => get_template_directory_uri() . '/core/admin/img/options/1c.png',
						'none'    => get_template_directory_uri() . '/core/admin/img/options/none.png',
						'left'    => get_template_directory_uri() . '/core/admin/img/options/2cl.png',
						'right'   => get_template_directory_uri() . '/core/admin/img/options/2cr.png',
					),
					'std'         => 'default',
				),
				array(
					'name'     => esc_html__( 'Sidebar Settings', 'brainbizz' ),
					'type'     => 'wgl_heading',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_sidebar_layout','!=','default'),
							array('mb_page_sidebar_layout','!=','none'),
						)),
					),
				),
				array(
					'name'     => esc_html__( 'Page Sidebar', 'brainbizz' ),
					'id'          => "mb_page_sidebar_def",
					'type'        => 'select',
					'placeholder' => 'Select a Sidebar',
					'options'     => brainbizz_get_all_sidebar(),
					'multiple'    => false,
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_sidebar_layout','!=','default'),
							array('mb_page_sidebar_layout','!=','none'),
						)),
					),
				),			
				array(
					'name'     => esc_html__( 'Page Sidebar Width', 'brainbizz' ),
					'id'          => "mb_page_sidebar_def_width",
					'type'        => 'button_group',
					'options'     => array(	
						'9' => esc_html( '25%' ),
						'8' => esc_html( '33%' ),
					),
					'std'  => '9',
					'multiple'    => false,
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_sidebar_layout','!=','default'),
							array('mb_page_sidebar_layout','!=','none'),
						)),
					),
				),
				array(
					'id'   => 'mb_sticky_sidebar',
					'name' => esc_html__( 'Sticky Sidebar On?', 'brainbizz' ),
					'type' => 'switch',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_sidebar_layout','!=','default'),
							array('mb_page_sidebar_layout','!=','none'),
						)),
					),
				),
				array(
					'name'     => esc_html__( 'Sidebar Side Gap', 'brainbizz' ),
					'id'          => "mb_sidebar_gap",
					'type'        => 'select',
					'options'     => array(	
						'def' => 'Default',
	                    '0' => '0',     
	                    '15' => '15',     
	                    '20' => '20',     
	                    '25' => '25',     
	                    '30' => '30',     
	                    '35' => '35',     
	                    '40' => '40',     
	                    '45' => '45',     
	                    '50' => '50', 
					),
					'std'         => 'def',
					'multiple'    => false,
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_sidebar_layout','!=','default'),
							array('mb_page_sidebar_layout','!=','none'),
						)),
					),
				),
	        )
	    );
	    return $meta_boxes;
	}

	public function page_color_meta_boxes( $meta_boxes ) {

	    $meta_boxes[] = array(
	        'title'      => esc_html__( 'Page Colors', 'brainbizz' ),
	        'post_types' => array( 'page' , 'post', 'team', 'practice','portfolio' ),
	        'context' => 'advanced',
	        'fields'     => array(
	        	array(
					'name'     => esc_html__( 'Page Colors', 'brainbizz' ),
					'id'          => "mb_page_colors_switch",
					'type'        => 'button_group',
					'options'     => array(
						'default' => esc_html__( 'Default', 'brainbizz' ),
						'custom' => esc_html__( 'Custom', 'brainbizz' ),
					),
					'inline'   		=> true,
					'multiple'    => false,
					'std'         => 'default',
				),
				array(
					'name'     => esc_html__( 'Colors Settings', 'brainbizz' ),
					'type'     => 'wgl_heading',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_colors_switch','=','custom')
						)),
					),
				),
				array(
					'name'     	=> esc_html__( 'General Theme Color', 'brainbizz' ),
	                'id'        => 'mb_page_theme_color',
	                'type'      => 'color',
	                'std'         => '#c10e0e',
					'js_options' => array(
						'defaultColor' => '#c10e0e',
					),
	                'validate'  => 'color',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_colors_switch','=','custom'),
						)),
					),
	            ),				
	            array(
					'name'     	=> esc_html__( 'Secondary Theme Color', 'brainbizz' ),
	                'id'        => 'mb_page_theme_secondary_color',
	                'type'      => 'color',
	                'std'         => '#7c529c',
					'js_options' => array(
						'defaultColor' => '#7c529c',
					),
	                'validate'  => 'color',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_colors_switch','=','custom'),
						)),
					),
	            ),
				array(
					'name'     	=> esc_html__( 'Body Background Color', 'brainbizz' ),
	                'id'        => 'mb_body_background_color',
	                'type'      => 'color',
	                'std'         => '#ffffff',
					'js_options' => array(
						'defaultColor' => '#ffffff',
					),
	                'validate'  => 'color',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_colors_switch','=','custom'),
						)),
					),
	            ),
				array(
					'name'     => esc_html__( 'Scroll Up Settings', 'brainbizz' ),
					'type'     => 'wgl_heading',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_colors_switch','=','custom')
						)),
					),
				),
				array(
					'name'     	=> esc_html__( 'Button Background Color', 'brainbizz' ),
	                'id'        => 'mb_scroll_up_bg_color',
	                'type'      => 'color',
	                'std'         => '#c10e0e',
					'js_options' => array(
						'defaultColor' => '#c10e0e',
					),
	                'validate'  => 'color',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_colors_switch','=','custom'),
						)),
					),
	            ),				
	            array(
					'name'     	=> esc_html__( 'Button Arrow Color', 'brainbizz' ),
	                'id'        => 'mb_scroll_up_arrow_color',
	                'type'      => 'color',
	                'std'         => '#ffffff',
					'js_options' => array(
						'defaultColor' => '#ffffff',
					),
	                'validate'  => 'color',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_colors_switch','=','custom'),
						)),
					),
	            ),
	        )
	    );
	    return $meta_boxes;
	}

	public function page_logo_meta_boxes( $meta_boxes ) {
	    $meta_boxes[] = array(
	        'title'      => esc_html__( 'Logo', 'brainbizz' ),
	        'post_types' => array( 'page' ),
	        'context' => 'advanced',
	        'fields'     => array(
	        	array(
					'name'     => esc_html__( 'Logo', 'brainbizz' ),
					'id'          => "mb_customize_logo",
					'type'        => 'button_group',
					'options'     => array(
						'default' => esc_html__( 'Default', 'brainbizz' ),
						'custom' => esc_html__( 'Custom', 'brainbizz' ),
					),
					'multiple'    => false,
					'inline'    => true,
					'std'         => 'default',
				),
				array(
					'name'     => esc_html__( 'Logo Settings', 'brainbizz' ),
					'type'     => 'wgl_heading',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_customize_logo','=','custom')
						)),
					),
				),
				array(
					'name'             => esc_html__( 'Header Logo', 'brainbizz' ),
					'id'               => "mb_header_logo",
					'type'             => 'image_advanced',
					'max_file_uploads' => 1,
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_customize_logo','=','custom')
						)),
					),
				),
				array(
					'id'   => 'mb_logo_height_custom',
					'name' => esc_html__( 'Enable Logo Height', 'brainbizz' ),
					'type' => 'switch',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
					    	array('mb_customize_logo','=','custom')
						)),
					),
				),
				array(
					'name' => esc_html__( 'Set Logo Height', 'brainbizz' ),
					'id'   => "mb_logo_height",
					'type' => 'number',
					'min'  => 0,
					'step' => 1,
					'std'  => 50,
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_customize_logo','=','custom'),
							array('mb_logo_height_custom','=',true)
						)),
					),
				),
				array(
					'name'             => esc_html__( 'Sticky Logo', 'brainbizz' ),
					'id'               => "mb_logo_sticky",
					'type'             => 'image_advanced',
					'max_file_uploads' => 1,
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_customize_logo','=','custom')
						)),
					),
				),
				array(
					'id'   => 'mb_sticky_logo_height_custom',
					'name' => esc_html__( 'Enable Sticky Logo Height', 'brainbizz' ),
					'type' => 'switch',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
					    	array('mb_customize_logo','=','custom')
						)),
					),
				),
				array(
					'name' => esc_html__( 'Set Sticky Logo Height', 'brainbizz' ),
					'id'   => "mb_sticky_logo_height",
					'type' => 'number',
					'min'  => 0,
					'step' => 1,
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_customize_logo','=','custom'),
							array('mb_sticky_logo_height_custom','=',true),
						)),
					),
				),
				array(
					'name'             => esc_html__( 'Mobile Logo', 'brainbizz' ),
					'id'               => "mb_logo_mobile",
					'type'             => 'image_advanced',
					'max_file_uploads' => 1,
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_customize_logo','=','custom')
						)),
					),
				),
				array(
					'id'   => 'mb_mobile_logo_height_custom',
					'name' => esc_html__( 'Enable Mobile Logo Height', 'brainbizz' ),
					'type' => 'switch',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
					    	array('mb_customize_logo','=','custom')
						)),
					),
				),
				array(
					'name' => esc_html__( 'Set Mobile Logo Height', 'brainbizz' ),
					'id'   => "mb_mobile_logo_height",
					'type' => 'number',
					'min'  => 0,
					'step' => 1,
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_customize_logo','=','custom'),
							array('mb_mobile_logo_height_custom','=',true),
						)),
					),
				),
	        )
	    );
	    return $meta_boxes;
	}

	public function page_header_meta_boxes( $meta_boxes ) {
	    $meta_boxes[] = array(
	        'title'      => esc_html__( 'Header', 'brainbizz' ),
	        'post_types' => array( 'page' ),
	        'context' => 'advanced',
	        'fields'     => array(
	        	array(
					'name'     => esc_html__( 'Header Settings', 'brainbizz' ),
					'id'          => "mb_customize_header_layout",
					'type'        => 'button_group',
					'options'     => array(
						'default' => esc_html__( 'default', 'brainbizz' ),
						'custom' => esc_html__( 'custom', 'brainbizz' ),
						'hide' => esc_html__( 'hide', 'brainbizz' ),
					),
					'multiple'    => false,
					'std'         => 'default',
				),
	        	array(
					'name'     => esc_html__( 'Header Builder', 'brainbizz' ),
					'id'          => "mb_customize_header",
					'type'        => 'select',
					'options'     => brainbizz_get_custom_preset(),
					'multiple'    => false,
					'std'         => 'default',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_customize_header_layout','!=','hide')
						)),
					),
				),			
				// It is works 
				array(
					'id'   => 'mb_menu_header',
					'name' => esc_html__( 'Menu ', 'brainbizz' ),
					'type' => 'select',
					'options'     => brainbizz_get_custom_menu(),
					'multiple'    => false,
					'std'         => 'default',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_customize_header_layout','=','custom')
						)),
					),
				),
				array(
					'id'   => 'mb_header_sticky',
					'name' => esc_html__( 'Sticky Header', 'brainbizz' ),
					'type' => 'switch',
					'std'  => 1,
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_customize_header_layout','=','custom')
						)),
					),
				),
	        )
	    );
	    return $meta_boxes;
	}

	public function page_title_meta_boxes( $meta_boxes ) {
	    $meta_boxes[] = array(
	        'title'      => esc_html__( 'Page Title', 'brainbizz' ),
	        'post_types' => array( 'page', 'post', 'team', 'practice','portfolio' ),
	        'context' => 'advanced',
	        'fields'     => array(
				array(
					'id'       => 'mb_page_title_switch',
					'name'     => esc_html__( 'Page Title', 'brainbizz' ),
					'type'     => 'button_group',
					'options'  => array(
						'default' => esc_html__( 'Default', 'brainbizz' ),
						'on' => esc_html__( 'On', 'brainbizz' ),
						'off' => esc_html__( 'Off', 'brainbizz' ),
					),
					'inline'   => true,
					'multiple' => false,
					'std'      => 'default'
				),
				array(
					'name'     => esc_html__( 'Page Title Settings', 'brainbizz' ),
					'type'     => 'wgl_heading',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_title_switch','=','on')
						)),
					),
				),
				array(
					'name'             => esc_html__( 'Background', 'brainbizz' ),
					'id'               => "mb_page_title_bg",
					'type'             => 'wgl_background',	
					'color'      	   => '#272728',
				    'image'     	   => '',
				    'position'   	   => 'center center',
				    'attachment' 	   => 'scroll',
				    'size'       	   => 'cover',
				    'repeat'     	   => 'no-repeat',			
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_title_switch','=','on')
						)),
					),
				),			
				array( 
					'name' => esc_html__( 'Height', 'brainbizz' ),
					'id'   => 'mb_page_title_height',
					'type' => 'number',
					'std'  => 440,
					'min'  => 0,
					'step' => 1,
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_title_switch','=','on')
						)),
					),
				),
				array(
					'name'     => esc_html__( 'Text Align', 'brainbizz' ),
					'id'       => 'mb_page_title_align',
					'type'     => 'button_group',
					'options'  => array(
						'left' => esc_html__( 'left', 'brainbizz' ),
						'center' => esc_html__( 'center', 'brainbizz' ),
						'right' => esc_html__( 'right', 'brainbizz' ),
					),
					'multiple' => false,
					'std'         => 'left',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_title_switch','=','on')
						)),
					),
				),
				array(
					'name' => esc_html__( 'Padding Top/Bottom', 'brainbizz' ),
					'id'   => 'mb_page_title_padding',
					'type' => 'wgl_offset',
					'options' => array(
						'mode'   => 'padding',
						'top'    => true,
						'right'  => false,
						'bottom' => true,
						'left'   => false,
					),
					'std' => array(
						'padding-top'    => '0',
						'padding-bottom' => '120',
					),
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_title_switch','=','on')
						)),
					),
				),
				array(
					'name' => esc_html__( 'Margin Bottom', 'brainbizz' ),
					'id'   => "mb_page_title_margin",
					'type' => 'wgl_offset',
					'options' => array(
						'mode'   => 'margin',
						'top'    => false,
						'right'  => false,
						'bottom' => true,
						'left'   => false,
					),
					'std' => array(
						'margin-bottom' => '60',
					),
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_title_switch','=','on')
						)),
					),
				),
				array(
					'id'   => 'mb_page_title_parallax',
					'name' => esc_html__( 'Add Page Title Parallax', 'brainbizz' ),
					'type' => 'switch',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_title_switch','=','on')
						)),
					),
				),
				array(
					'name' => esc_html__( 'Prallax Speed', 'brainbizz' ),
					'id'   => "mb_page_title_parallax_speed",
					'type' => 'number',
					'std'  => 0.3,
					'step' => 0.1,
					'attributes' => array(
						'data-conditional-logic'  =>  array( array(
							array('mb_page_title_parallax','=',true),
							array('mb_page_title_switch','=','on'),
						)),
					),
				),
				array(
					'id'   => 'mb_page_change_tile_switch',
					'name' => esc_html__( 'Custom Page Title', 'brainbizz' ),
					'type' => 'switch',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_title_switch','=','on')
						)),
					),
				),		
				array(
		            'name' => esc_html__( 'Page Title', 'brainbizz' ),
		            'id'   => 'mb_page_change_tile',
		            'type' => 'text',
		            'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
					    	array('mb_page_change_tile_switch','=',1),
							array('mb_page_title_switch','=','on'),
						)),
					),
		        ),		
				array(
					'id'   => 'mb_page_title_breadcrumbs_switch',
					'name' => esc_html__( 'Show Breadcrumbs', 'brainbizz' ),
					'type' => 'switch',
					'std'  => 1,
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_title_switch','=','on')
						)),
					),
				),
				array(
					'name'     => esc_html__( 'Page Title Typography', 'brainbizz' ),
					'type'     => 'wgl_heading',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_title_switch','=','on')
						)),
					),
				),
				array(
					'name' => esc_html__( 'Page Title Font', 'brainbizz' ),
					'id'   => 'mb_page_title_font',
					'type' => 'wgl_font',
					'options' => array(
						'font-size' => true,
						'line-height' => true,
						'font-weight' => false,
						'color' => true,
					),
					'std' => array(
						'font-size' => '48',
						'line-height' => '60',
						'color' => '#ffffff',
					),
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_title_switch','=','on')
						)),
					),
				),
				array(
					'name' => esc_html__( 'Page Title Breadcrumbs Font', 'brainbizz' ),
					'id'   => 'mb_page_title_breadcrumbs_font',
					'type' => 'wgl_font',
					'options' => array(
						'font-size' => true,
						'line-height' => true,
						'font-weight' => false,
						'color' => true,
					),
					'std' => array(
						'font-size' => '16',
						'line-height' => '16',
						'color' => '#ffffff',
					),
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_page_title_switch','=','on')
						)),
					),
				),
	        ),
	    );
	    return $meta_boxes;
	}

	public function page_footer_meta_boxes( $meta_boxes ) {
	    $meta_boxes[] = array(
	        'title'      => esc_html__( 'Footer', 'brainbizz' ),
	        'post_types' => array( 'page' ),
	        'context' => 'advanced',
	        'fields'     => array(
	        	array(
					'name'     => esc_html__( 'Footer', 'brainbizz' ),
					'id'          => "mb_footer_switch",
					'type'        => 'button_group',
					'options'     => array(
						'default' => esc_html__( 'Default', 'brainbizz' ),
						'on' => esc_html__( 'On', 'brainbizz' ),
						'off' => esc_html__( 'Off', 'brainbizz' ),
					),
					'multiple'    => false,
					'std'         => 'default',
				),
				array(
					'name'     => esc_html__( 'Footer Settings', 'brainbizz' ),
					'type'     => 'wgl_heading',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_footer_switch','=','on')
						)),
					),
				), 
				array(
					'id'   => 'mb_footer_add_wave',
					'name' => esc_html__( 'Add Wave', 'brainbizz' ),
					'type' => 'switch',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_footer_switch','=','on')
						)),
					),
				),
				array(
					'name' => esc_html__( 'Set Wave Height', 'brainbizz' ),
					'id'   => "mb_footer_wave_height",
					'type' => 'number',
					'min'  => 0,
					'step' => 1,
					'std'  => 158,
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
					    	array('mb_footer_switch','=','on'),
							array('mb_footer_add_wave','=','1')
						)),
					),
				),
				array(
					'name'     => esc_html__( 'Content Type', 'brainbizz' ),
					'id'          => 'mb_footer_content_type',
					'type'        => 'button_group',
					'options'     => array(
						'widgets' => esc_html__( 'Default', 'brainbizz' ),
						'pages' => esc_html__( 'Page', 'brainbizz' )		
					),
					'multiple'    => false,
					'std'         => 'widgets',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_footer_switch','=','on')
						)),
					),
				),
				array(
	        		'name'        => 'Select a page',
					'id'          => 'mb_footer_page_select',
					'type'        => 'post',
					'post_type'   => 'footer',
					'field_type'  => 'select_advanced',
					'placeholder' => 'Select a page',
					'query_args'  => array(
					    'post_status'    => 'publish',
					    'posts_per_page' => - 1,
					),
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_footer_switch','=','on'),
							array('mb_footer_content_type','=','pages')
						)),
					),
	        	),
				array(
					'name' => esc_html__( 'Paddings', 'brainbizz' ),
					'id'   => 'mb_footer_spacing',
					'type' => 'wgl_offset',
					'options' => array(
						'mode'   => 'padding',
						'top'    => true,
						'right'  => true,
						'bottom' => true,
						'left'   => true,
					),
					'std' => array(
						'padding-top'    => '98',
						'padding-right'  => '0',
						'padding-bottom' => '10',
						'padding-left'   => '0'
					),
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_footer_switch','=','on')
						)),
					),
				),	
				array(
					'name'             => esc_html__( 'Background', 'brainbizz' ),
					'id'               => "mb_footer_bg",
					'type'             => 'wgl_background',	
					'color'      	   => '#272728',
				    'image'     	   => '',
				    'position'   	   => 'center center',
				    'attachment' 	   => 'scroll',
				    'size'       	   => 'cover',
				    'repeat'     	   => 'no-repeat',			
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_footer_switch','=','on')
						)),
					),
				),				
	        ),
	     );
	    return $meta_boxes;
	}	

	public function page_copyright_meta_boxes( $meta_boxes ) {
	    $meta_boxes[] = array(
	        'title'      => esc_html__( 'Copyright', 'brainbizz' ),
	        'post_types' => array( 'page' ),
	        'context' => 'advanced',
	        'fields'     => array(
				array(
					'name'     => esc_html__( 'Copyright', 'brainbizz' ),
					'id'          => "mb_copyright_switch",
					'type'        => 'button_group',
					'options'     => array(
						'default' => esc_html__( 'Default', 'brainbizz' ),
						'on' => esc_html__( 'On', 'brainbizz' ),
						'off' => esc_html__( 'Off', 'brainbizz' ),
					),
					'multiple'    => false,
					'std'         => 'default',
				),
				array(
					'name'     => esc_html__( 'Copyright Settings', 'brainbizz' ),
					'type'     => 'wgl_heading',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_copyright_switch','=','on')
						)),
					),
				),
				array(
					'name' => esc_html__( 'Editor', 'brainbizz' ),
					'id'   => "mb_copyright_editor",
					'type' => 'textarea',
					'cols' => 20,
					'rows' => 3,
					'std'  => 'Copyright © 2018 BrainBizz by WebGeniusLab. All Rights Reserved',
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(						
							array('mb_copyright_switch','=','on')
						)),
					),
				),
				array(
					'name' => esc_html__( 'Text Color', 'brainbizz' ),
					'id'   => "mb_copyright_text_color",
					'type' => 'color',
					'std'  => '#888888',
					'js_options' => array(
						'defaultColor' => '#888888',
					),
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(						
							array('mb_copyright_switch','=','on')
						)),
					),
				),
				array(
					'name' => esc_html__( 'Background Color', 'brainbizz' ),
					'id'   => "mb_copyright_bg_color",
					'type' => 'color',
					'std'  => '#1d1f21',
					'js_options' => array(
						'defaultColor' => '#1d1f21',
					),
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(						
							array('mb_copyright_switch','=','on')
						)),
					),
				),
				array(
					'name' => esc_html__( 'Paddings', 'brainbizz' ),
					'id'   => 'mb_copyright_spacing',
					'type' => 'wgl_offset',
					'options' => array(
						'mode'   => 'padding',
						'top'    => true,
						'right'  => false,
						'bottom' => true,
						'left'   => false,
					),
					'std' => array(
						'padding-top'    => '20',
						'padding-bottom' => '20',
					),
					'attributes' => array(
					    'data-conditional-logic'  =>  array( array(
							array('mb_copyright_switch','=','on')
						)),
					),
				),
	        ),
	     );
	    return $meta_boxes;

	}

}
new BrainBizz_Metaboxes();

?>