<?php
    
    if ( !class_exists( 'BrainBizz_Core' ) ) {
        return;
    } 

    if (!function_exists('brainbizz_get_preset')) {
        function brainbizz_get_preset() {
            $custom_preset = get_option('brainbizz_set_preset');
            $presets = function_exists('brainbizz_default_preset') ? brainbizz_default_preset() : '';

            $out = array();
            $i = 1;
            if(is_array($presets)){
                foreach ($presets as $key => $value) {
                    if($key != 'img'){
                        $out[$key] = $key;
                        $i++;                        
                    }
                }            
            }
            if(is_array($custom_preset)){
                foreach ( $custom_preset as $preset_id => $preset) :
                    if($preset_id != 'default' && $preset_id != 'img'){
                        $out[$preset_id] = $preset_id;
                    }
                endforeach;             
            }
            return $out;
        }
    } 

    // This is theme option name where all the Redux data is stored.
    $theme_slug = 'brainbizz_set';
    
    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */
    $theme = wp_get_theme(); 
    
    $args = array(
        'opt_name'             => $theme_slug,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__('Theme Options', 'brainbizz' ),
        'page_title'           => esc_html__('Theme Options', 'brainbizz' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
         // Show the panel pages on the admin bar
        'admin_bar'            => true,
        'admin_bar_icon'       => 'dashicons-admin-generic',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => 'dashicons-admin-generic',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
         // Shows the Import/Export panel when not used as a field.
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
    );


    Redux::setArgs( $theme_slug, $args );

    // -> START Basic Fields
    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'General', 'brainbizz' ),
        'id'               => 'general',        
        'icon'             => 'el el-cog',
        'fields'           => array(
            array(
                'id'       => 'use_minify',
                'type'     => 'switch',
                'title'    => esc_html__( 'Use minify css/js files', 'brainbizz' ),
                'desc'     => esc_html__( 'Recommended for site load speed.', 'brainbizz' ),
            ),
            array(
                'id'       => 'preloder_settings',
                'type'     => 'section',
                'title'    => esc_html__( 'Preloader Settings', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'preloader',
                'type'     => 'switch',
                'title'    => esc_html__( 'Preloader On/Off', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'       => 'preloader_background',
                'type'     => 'color',
                'title'    => esc_html__( 'Preloader Background', 'brainbizz' ),
                'subtitle' => esc_html__( 'Set Preloader Background', 'brainbizz' ),
                'default'  => '#ffffff',
                'transparent' => false,
                'required' => array( 'preloader', '=', '1' ),
            ),
            array(
                'id'       => 'preloader_color_1',
                'type'     => 'color',
                'title'    => esc_html__( 'Preloader Color', 'brainbizz' ),
                'default'  => '#c10e0e',
                'transparent' => false,
                'required' => array( 'preloader', '=', '1' ),
            ),
            array(
                'id'       => 'preloader_settings-end',
                'type'     => 'section',
                'indent'   => false,
            ),
            array(
                'id'       => 'search_settings',
                'type'     => 'section',
                'title'    => esc_html__( 'Search Settings', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'search_style',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Choose your search style.', 'brainbizz' ),
                'options'  => array(
                    'standard' => esc_html__( 'Standard', 'brainbizz' ),
                    'alt' => esc_html__( 'Alternative', 'brainbizz' ),
                ),
                'default'  => 'standard'
            ),
             array(
                'id'       => 'search_settings-end',
                'type'     => 'section',
                'indent'   => false,
            ),
            array(
                'id'       => 'scroll_up_settings',
                'type'     => 'section',
                'title'    => esc_html__( 'Scroll Up Button Settings', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'scroll_up',
                'type'     => 'switch',
                'title'    => esc_html__( 'Button On/Off', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id'       => 'scroll_up_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Background Color', 'brainbizz' ),
                'default'  => '#c10e0e',
                'transparent' => false,
                'required' => array( 'scroll_up', '=', '1' ),
            ),
            array(
                'id'       => 'scroll_up_arrow_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Arrow Color', 'brainbizz' ),
                'default'  => '#ffffff',
                'transparent' => false,
                'required' => array( 'scroll_up', '=', '1' ),
            ),
            array(
                'id'       => 'scroll_up_settings-end',
                'type'     => 'section',
                'indent'   => false,
            ),
        ),
    ) );

    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'Custom JS', 'brainbizz' ),
        'id'               => 'editors-option',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'custom_js',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Custom JS', 'brainbizz' ),
                'subtitle' => esc_html__( 'Paste your JS code here.', 'brainbizz' ),
                'mode'     => 'javascript',
                'theme'    => 'chrome',
                'default'  => ''
            ),
            array(
                'id'       => 'header_custom_js',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Custom JS', 'brainbizz' ),
                'subtitle' => esc_html__( 'Code to be added inside HEAD tag', 'brainbizz' ),
                'mode'     => 'html',
                'theme'    => 'chrome',
                'default'  => ''
            ),
        ),
    ) );

    // -> START Basic Fields
    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'Header', 'brainbizz' ),
        'id'               => 'header_section',        
    ) );

    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'Logo', 'brainbizz' ),
        'id'               => 'logo',
        'subsection'       => true,        
        'fields'           => array(
            array(
                'id'       => 'header_logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Header Logo', 'brainbizz' ),
            ),
            array(
                'id'       => 'logo_height_custom',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Logo Height', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'             => 'logo_height',
                'type'           => 'dimensions',
                'units'          => false,    
                'units_extended' => false,
                'title'          => esc_html__( 'Set Logo Height' , 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => 100,
                ),
                'required' => array( 'logo_height_custom', '=', '1' ),
            ),
            array(
                'id'       => 'logo_sticky',
                'type'     => 'media',
                'title'    => esc_html__( 'Sticky Logo', 'brainbizz' ),
            ),
            array(
                'id'       => 'sticky_logo_height_custom',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Sticky Logo Height', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'             => 'sticky_logo_height',
                'type'           => 'dimensions',
                'units'          => false,    
                'units_extended' => false,
                'title'          => esc_html__( 'Set Sticky Logo Height' , 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => '',
                ),
                'required' => array(
                    array( 'sticky_logo_height_custom', '=', '1' ),
                ),
            ),
            array(
                'id'       => 'logo_mobile',
                'type'     => 'media',
                'title'    => esc_html__( 'Mobile Logo', 'brainbizz' ),
            ),
            array(
                'id'       => 'mobile_logo_height_custom',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Mobile Logo Height', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'             => 'mobile_logo_height',
                'type'           => 'dimensions',
                'units'          => false,    
                'units_extended' => false,
                'title'          => esc_html__( 'Set Mobile Logo Height' , 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => '',
                ),
                'required' => array(
                    array( 'mobile_logo_height_custom', '=', '1' ),
                ),
            ),
        )
    ) );

    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'Header Builder', 'brainbizz' ),
        'id'               => 'header-customize',
        'subsection'       => true,        
        'fields'           => array(            
            array(
                'id'       => 'header_def_js_preset',
                'type'     => 'select',
                'title'    => esc_html__( 'Header default preset', 'brainbizz' ),
                'default'  => 'Fill BG-Image',
                'select2'  => array('allowClear' => false),
                'options'  => brainbizz_get_preset(),
                'desc'     => esc_html__( 'Please choose preset to use this in all Pages. 
                    You also can choose for every page your custom header present in page\'s option select(page metabox).', 'brainbizz' ),
            ),            
            array(
                'id'         => 'opt-js-preset',
                'type'       => 'custom_preset',
                'title'      => esc_html__( 'Custom Preset', 'brainbizz' ),
            ),    
            array(
                'id'       => 'bottom_header_layout',
                'type'     => 'custom_header_builder',
                'title'    => esc_html__( 'Header Builder', 'brainbizz' ),
                'compiler' => 'true',
                'full_width' => true,
                'options'  => array(
                    'items'  => array(
                        'html1' => array( 'title' => esc_html__( 'HTML 1', 'brainbizz' ), 'settings' => true) ,
                        'html2'  =>  array( 'title' => esc_html__( 'HTML 2', 'brainbizz' ), 'settings' => true) ,
                        'html3' => array( 'title' => esc_html__( 'HTML 3', 'brainbizz' ), 'settings' => true) ,
                        'html4'  =>  array( 'title' => esc_html__( 'HTML 4', 'brainbizz' ), 'settings' => true) ,
                        'html5' => array( 'title' => esc_html__( 'HTML 5', 'brainbizz' ), 'settings' => true) ,
                        'html6'  =>  array( 'title' => esc_html__( 'HTML 6', 'brainbizz' ), 'settings' => true) ,     
                        'html7'  =>  array( 'title' => esc_html__( 'HTML 7', 'brainbizz' ), 'settings' => true) ,     
                        'html8'  =>  array( 'title' => esc_html__( 'HTML 8', 'brainbizz' ), 'settings' => true) ,     
                        'wpml'        =>  array( 'title' => esc_html__( 'WPML', 'brainbizz' ), 'settings' => false) ,
                        'delimiter1'  =>  array( 'title' => esc_html__( '|', 'brainbizz' ), 'settings' => true) ,
                        'delimiter2'  =>  array( 'title' => esc_html__( '|', 'brainbizz' ), 'settings' => true) ,
                        'delimiter3'  =>  array( 'title' => esc_html__( '|', 'brainbizz' ), 'settings' => true) ,
                        'delimiter4'  =>  array( 'title' => esc_html__( '|', 'brainbizz' ), 'settings' => true) ,
                        'delimiter5'  =>  array( 'title' => esc_html__( '|', 'brainbizz' ), 'settings' => true) ,
                        'delimiter6'  =>  array( 'title' => esc_html__( '|', 'brainbizz' ), 'settings' => true) ,
                        'spacer1'  =>  array( 'title' => esc_html__( 'Spacer 1', 'brainbizz' ), 'settings' => true) ,
                        'spacer2'  =>  array( 'title' => esc_html__( 'Spacer 2', 'brainbizz' ), 'settings' => true) ,
                        'spacer3'  =>  array( 'title' => esc_html__( 'Spacer 3', 'brainbizz' ), 'settings' => true) ,
                        'spacer4'  =>  array( 'title' => esc_html__( 'Spacer 4', 'brainbizz' ), 'settings' => true) ,
                        'spacer5'  =>  array( 'title' => esc_html__( 'Spacer 5', 'brainbizz' ), 'settings' => true) ,
                        'spacer6'  =>  array( 'title' => esc_html__( 'Spacer 6', 'brainbizz' ), 'settings' => true) ,
                        'spacer7'  =>  array( 'title' => esc_html__( 'Spacer 7', 'brainbizz' ), 'settings' => true) ,
                        'spacer8'  =>  array( 'title' => esc_html__( 'Spacer 8', 'brainbizz' ), 'settings' => true) ,
                        'cart'     =>  array( 'title' => esc_html__( 'Cart', 'brainbizz' ), 'settings' => false) ,
                    ), 
                    'Top Left area' => array(),
                    'Top Center area' => array(),
                    'Top Right area' => array(),                     
                    'Middle Left area' => array(
                        'logo' => array( 'title' => esc_html__( 'Logo', 'brainbizz' ), 'settings' => false),
                    ),
                    'Middle Center area' => array(
                        'menu' => array( 'title' => esc_html__( 'Menu', 'brainbizz' ), 'settings' => false),
                    ),
                    'Middle Right area' => array(
                        'item_search'  =>  array( 'title' => esc_html__( 'Search', 'brainbizz' ), 'settings' => false) ,
                    ),                    
                    'Bottom Left  area' => array(
                    ),
                    'Bottom Center area' => array(
                    ),
                    'Bottom Right area' => array(
                    ),
                ),
                'default'   => array(
                    'items'  => array(
                        'html1' => array( 'title' => esc_html__( 'HTML 1', 'brainbizz' ), 'settings' => true) ,
                        'html2'  =>  array( 'title' => esc_html__( 'HTML 2', 'brainbizz' ), 'settings' => true) ,
                        'html3' => array( 'title' => esc_html__( 'HTML 3', 'brainbizz' ), 'settings' => true) ,
                        'html4'  =>  array( 'title' => esc_html__( 'HTML 4', 'brainbizz' ), 'settings' => true) ,
                        'html5' => array( 'title' => esc_html__( 'HTML 5', 'brainbizz' ), 'settings' => true) ,
                        'html6'  =>  array( 'title' => esc_html__( 'HTML 6', 'brainbizz' ), 'settings' => true) ,              
                        'html7'  =>  array( 'title' => esc_html__( 'HTML 7', 'brainbizz' ), 'settings' => true) ,              
                        'html8'  =>  array( 'title' => esc_html__( 'HTML 8', 'brainbizz' ), 'settings' => true) ,              
                        'wpml'        =>  array( 'title' => esc_html__( 'WPML', 'brainbizz' ), 'settings' => false) ,
                        'delimiter1'  =>  array( 'title' => esc_html__( '|', 'brainbizz' ), 'settings' => true) ,
                        'delimiter2'  =>  array( 'title' => esc_html__( '|', 'brainbizz' ), 'settings' => true) ,
                        'delimiter3'  =>  array( 'title' => esc_html__( '|', 'brainbizz' ), 'settings' => true) ,
                        'delimiter4'  =>  array( 'title' => esc_html__( '|', 'brainbizz' ), 'settings' => true) ,
                        'delimiter5'  =>  array( 'title' => esc_html__( '|', 'brainbizz' ), 'settings' => true) ,
                        'delimiter6'  =>  array( 'title' => esc_html__( '|', 'brainbizz' ), 'settings' => true) ,
                        'spacer1'  =>  array( 'title' => esc_html__( 'Spacer 1', 'brainbizz' ), 'settings' => true) ,
                        'spacer2'  =>  array( 'title' => esc_html__( 'Spacer 2', 'brainbizz' ), 'settings' => true) ,
                        'spacer3'  =>  array( 'title' => esc_html__( 'Spacer 3', 'brainbizz' ), 'settings' => true) ,
                        'spacer4'  =>  array( 'title' => esc_html__( 'Spacer 4', 'brainbizz' ), 'settings' => true) ,
                        'spacer5'  =>  array( 'title' => esc_html__( 'Spacer 5', 'brainbizz' ), 'settings' => true) ,
                        'spacer6'  =>  array( 'title' => esc_html__( 'Spacer 6', 'brainbizz' ), 'settings' => true) ,
                        'spacer7'  =>  array( 'title' => esc_html__( 'Spacer 7', 'brainbizz' ), 'settings' => true) ,
                        'spacer8'  =>  array( 'title' => esc_html__( 'Spacer 8', 'brainbizz' ), 'settings' => true) ,
                        'button1'  =>  array( 'title' => esc_html__( 'Button', 'brainbizz' ), 'settings' => true) ,
                        'button2'  =>  array( 'title' => esc_html__( 'Button', 'brainbizz' ), 'settings' => true) ,
                        'button3'  =>  array( 'title' => esc_html__( 'Button', 'brainbizz' ), 'settings' => true) ,
                        'button4'  =>  array( 'title' => esc_html__( 'Button', 'brainbizz' ), 'settings' => true) ,
                        'cart'     =>  array( 'title' => esc_html__( 'Cart', 'brainbizz' ), 'settings' => false) ,
                    ), 
                    'Top Left area' => array(),
                    'Top Center area' => array(),
                    'Top Right  area' => array(),                     
                    'Middle Left  area' => array(
                        'logo' => array( 'title' => esc_html__( 'Logo', 'brainbizz' ), 'settings' => false),
                    ),
                    'Middle Center  area' => array(
                        'menu' => array( 'title' => esc_html__( 'Menu', 'brainbizz' ), 'settings' => false),
                    ),
                    'Middle Right  area' => array(
                        'item_search'  =>  array( 'title' => esc_html__( 'Search', 'brainbizz' ), 'settings' => false) ,
                    ),                    
                    'Bottom Left area' => array(
                    ),
                    'Bottom Center area' => array(
                    ),
                    'Bottom Right area' => array(
                    ),
                ),
            ),   
            array(
                'id'      => 'bottom_header_spacer1',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Header Spacer 1 Width', 'brainbizz' ),
                'height'         => false,
                'width'          => true,
                'default'        => array(
                    'width' => 25,
                )
            ),            
            array(
                'id'      => 'bottom_header_spacer2',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Header Spacer 2 Width', 'brainbizz' ),
                'height'         => false,
                'width'          => true,
                'default'        => array(
                    'width' => 25,
                )
            ),            
            array(
                'id'      => 'bottom_header_spacer3',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Header Spacer 3 Width', 'brainbizz' ),
                'height'         => false,
                'width'          => true,
                'default'        => array(
                    'width' => 25,
                )
            ),            
            array(
                'id'      => 'bottom_header_spacer4',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Header Spacer 4 Width', 'brainbizz' ),
                'height'         => false,
                'width'          => true,
                'default'        => array(
                    'width' => 25,
                )
            ),            
            array(
                'id'      => 'bottom_header_spacer5',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Header Spacer 5 Width', 'brainbizz' ),
                'height'         => false,
                'width'          => true,
                'default'        => array(
                    'width' => 25,
                )
            ),            
            array(
                'id'      => 'bottom_header_spacer6',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Header Spacer 6 Width', 'brainbizz' ),
                'height'         => false,
                'width'          => true,
                'default'        => array(
                    'width' => 25,
                )
            ),            
            array(
                'id'      => 'bottom_header_spacer7',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Header Spacer 7 Width', 'brainbizz' ),
                'height'         => false,
                'width'          => true,
                'default'        => array(
                    'width' => 25,
                )
            ),            
            array(
                'id'      => 'bottom_header_spacer8',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Header Spacer 8 Width', 'brainbizz' ),
                'height'         => false,
                'width'          => true,
                'default'        => array(
                    'width' => 25,
                )
            ),            
            array(
                'id'             => 'bottom_header_delimiter1_height',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Delimiter Height', 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => 100,
                )
            ),            
            array(
                'id'      => 'bottom_header_delimiter1_width',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Delimiter Width', 'brainbizz' ),
                'height'         => false,
                'width'          => true,
                'default'        => array(
                    'width' => 1,
                )
            ),  
            array(
                'id'       => 'bottom_header_delimiter1_bg',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Delimiter Background', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '.9',
                    'rgba'  => 'rgba(255,255,255,0.9)'
                ),
                'mode'     => 'background',
            ),
            array(
                'id'       => 'bottom_header_delimiter1_margin',
                'type'     => 'spacing',
                // An array of CSS selectors to apply this font style to
                'mode'     => 'margin',
                'all'      => false,
                'bottom'   => false,
                'top'   => false,
                'left'   => true,
                'right'   => true,
                'title'    => esc_html__( 'Delimiter Spacing', 'brainbizz' ),
                'default'  => array(
                    
                    'margin-left' => '30', 
                    'margin-right' => '30',                            
                )
            ), 
            array(
                'id'       => 'bottom_header_delimiter1_sticky_custom',
                'type'     => 'switch',
                'title'    => esc_html__( 'Customize Sticky Delimiter', 'brainbizz' ),
                'default'  => false,
            ),            
            array(
                'id'       => 'bottom_header_delimiter1_sticky_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Delimiter Background', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_delimiter1_sticky_custom', '=', '1' ),
                ),
            ),               
            array(
                'id'             => 'bottom_header_delimiter2_height',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Delimiter Height', 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => 100,
                )
            ),            
            array(
                'id'      => 'bottom_header_delimiter2_width',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Delimiter Width', 'brainbizz' ),
                'height'         => false,
                'width'          => true,
                'default'        => array(
                    'width' => 1,
                )
            ),  
            array(
                'id'       => 'bottom_header_delimiter2_bg',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Delimiter Background', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '.9',
                    'rgba'  => 'rgba(255,255,255,0.9)'
                ),
                'mode'     => 'background',
            ),
            array(
                'id'       => 'bottom_header_delimiter2_margin',
                'type'     => 'spacing',
                // An array of CSS selectors to apply this font style to
                'mode'     => 'margin',
                'all'      => false,
                'bottom'   => false,
                'top'   => false,
                'left'   => true,
                'right'   => true,
                'title'    => esc_html__( 'Delimiter Spacing', 'brainbizz' ),
                'default'  => array(
                    
                    'margin-left' => '30', 
                    'margin-right' => '30',                            
                )
            ), 
            array(
                'id'       => 'bottom_header_delimiter2_sticky_custom',
                'type'     => 'switch',
                'title'    => esc_html__( 'Customize Sticky Delimiter', 'brainbizz' ),
                'default'  => false,
            ),            
            array(
                'id'       => 'bottom_header_delimiter2_sticky_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Delimiter Background', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_delimiter2_sticky_custom', '=', '1' ),
                ),
            ),            
            array(
                'id'             => 'bottom_header_delimiter3_height',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Delimiter Height', 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => 100,
                )
            ),            
            array(
                'id'      => 'bottom_header_delimiter3_width',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Delimiter Width', 'brainbizz' ),
                'height'         => false,
                'width'          => true,
                'default'        => array(
                    'width' => 1,
                )
            ),  
            array(
                'id'       => 'bottom_header_delimiter3_bg',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Delimiter Background', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '.9',
                    'rgba'  => 'rgba(255,255,255,0.9)'
                ),
                'mode'     => 'background',
            ),
            array(
                'id'       => 'bottom_header_delimiter3_margin',
                'type'     => 'spacing',
                // An array of CSS selectors to apply this font style to
                'mode'     => 'margin',
                'all'      => false,
                'bottom'   => false,
                'top'   => false,
                'left'   => true,
                'right'   => true,
                'title'    => esc_html__( 'Delimiter Spacing', 'brainbizz' ),
                'default'  => array(
                    
                    'margin-left' => '30', 
                    'margin-right' => '30',                            
                )
            ),    
            array(
                'id'       => 'bottom_header_delimiter3_sticky_custom',
                'type'     => 'switch',
                'title'    => esc_html__( 'Customize Sticky Delimiter', 'brainbizz' ),
                'default'  => false,
            ),            
            array(
                'id'       => 'bottom_header_delimiter3_sticky_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Delimiter Background', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_delimiter3_sticky_custom', '=', '1' ),
                ),
            ),         
            array(
                'id'             => 'bottom_header_delimiter4_height',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Delimiter Height', 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => 100,
                )
            ),            
            array(
                'id'      => 'bottom_header_delimiter4_width',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Delimiter Width', 'brainbizz' ),
                'height'         => false,
                'width'          => true,
                'default'        => array(
                    'width' => 1,
                )
            ),  
            array(
                'id'       => 'bottom_header_delimiter4_bg',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Delimiter Background', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '.9',
                    'rgba'  => 'rgba(255,255,255,0.9)'
                ),
                'mode'     => 'background',
            ),
            array(
                'id'       => 'bottom_header_delimiter4_margin',
                'type'     => 'spacing',
                // An array of CSS selectors to apply this font style to
                'mode'     => 'margin',
                'all'      => false,
                'bottom'   => false,
                'top'   => false,
                'left'   => true,
                'right'   => true,
                'title'    => esc_html__( 'Delimiter Spacing', 'brainbizz' ),
                'default'  => array(
                    
                    'margin-left' => '30', 
                    'margin-right' => '30',                            
                )
            ),
            array(
                'id'       => 'bottom_header_delimiter4_sticky_custom',
                'type'     => 'switch',
                'title'    => esc_html__( 'Customize Sticky Delimiter', 'brainbizz' ),
                'default'  => false,
            ),            
            array(
                'id'       => 'bottom_header_delimiter4_sticky_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Delimiter Background', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_delimiter4_sticky_custom', '=', '1' ),
                ),
            ),             
            array(
                'id'             => 'bottom_header_delimiter5_height',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Delimiter Height', 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => 100,
                )
            ),            
            array(
                'id'      => 'bottom_header_delimiter5_width',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Delimiter Width', 'brainbizz' ),
                'height'         => false,
                'width'          => true,
                'default'        => array(
                    'width' => 1,
                )
            ),  
            array(
                'id'       => 'bottom_header_delimiter5_bg',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Delimiter Background', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '.9',
                    'rgba'  => 'rgba(255,255,255,0.9)'
                ),
                'mode'     => 'background',
            ),
            array(
                'id'       => 'bottom_header_delimiter5_margin',
                'type'     => 'spacing',
                // An array of CSS selectors to apply this font style to
                'mode'     => 'margin',
                'all'      => false,
                'bottom'   => false,
                'top'   => false,
                'left'   => true,
                'right'   => true,
                'title'    => esc_html__( 'Delimiter Spacing', 'brainbizz' ),
                'default'  => array(
                    
                    'margin-left' => '30', 
                    'margin-right' => '30',                            
                )
            ), 
            array(
                'id'       => 'bottom_header_delimiter5_sticky_custom',
                'type'     => 'switch',
                'title'    => esc_html__( 'Customize Sticky Delimiter', 'brainbizz' ),
                'default'  => false,
            ),            
            array(
                'id'       => 'bottom_header_delimiter5_sticky_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Delimiter Background', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_delimiter5_sticky_custom', '=', '1' ),
                ),
            ),            
            array(
                'id'             => 'bottom_header_delimiter6_height',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Delimiter Height', 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => 100,
                )
            ),            
            array(
                'id'      => 'bottom_header_delimiter6_width',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Delimiter Width', 'brainbizz' ),
                'height'         => false,
                'width'          => true,
                'default'        => array(
                    'width' => 1,
                )
            ),  
            array(
                'id'       => 'bottom_header_delimiter6_bg',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Delimiter Background', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '.9',
                    'rgba'  => 'rgba(255,255,255,0.9)'
                ),
                'mode'     => 'background',
            ),
            array(
                'id'       => 'bottom_header_delimiter6_margin',
                'type'     => 'spacing',
                // An array of CSS selectors to apply this font style to
                'mode'     => 'margin',
                'all'      => false,
                'bottom'   => false,
                'top'   => false,
                'left'   => true,
                'right'   => true,
                'title'    => esc_html__( 'Delimiter Spacing', 'brainbizz' ),
                'default'  => array(
                    
                    'margin-left' => '30', 
                    'margin-right' => '30',                            
                )
            ),
            array(
                'id'       => 'bottom_header_delimiter6_sticky_custom',
                'type'     => 'switch',
                'title'    => esc_html__( 'Customize Sticky Delimiter', 'brainbizz' ),
                'default'  => false,
            ),            
            array(
                'id'       => 'bottom_header_delimiter6_sticky_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Delimiter Background', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_delimiter6_sticky_custom', '=', '1' ),
                ),
            ), 
            array(
                'id'             => 'bottom_header_button1_title',
                'type'           => 'text',
                'title'          => esc_html__( 'Button Text', 'brainbizz' ),
                'default'        => esc_html__( 'Get Ticket', 'brainbizz' ),
            ),             
            array(
                'id'             => 'bottom_header_button1_link',
                'type'           => 'text',
                'title'          => esc_html__( 'Link', 'brainbizz' )
            ), 
            array(
                'id'       => 'bottom_header_button1_size',
                'type'     => 'select',
                'title'    => esc_html__( 'Button Size', 'brainbizz' ),
                'options'  => array(
                    's' => esc_html__( 'Small', 'brainbizz' ),
                    'm' => esc_html__( 'Medium', 'brainbizz' ),
                    'l' => esc_html__( 'Large', 'brainbizz' ),
                    'xl' => esc_html__( 'Extra Large', 'brainbizz' ),
                    
                ),
                'default'  => 'm'
            ),  
            array(
                'id'       => 'bottom_header_button1_custom',
                'type'     => 'switch',
                'title'    => esc_html__( 'Customize Button', 'brainbizz' ),
                'default'  => false,
            ),            
            array(
                'id'       => 'bottom_header_button1_color_txt',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Text Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button1_custom', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button1_hover_color_txt',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Hover Text Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button1_custom', '=', '1' ),
                ),
            ),            
            array(
                'id'       => 'bottom_header_button1_bg',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Background Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button1_custom', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button1_hover_bg',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Hover Background Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button1_custom', '=', '1' ),
                ),
            ),            
            array(
                'id'       => 'bottom_header_button1_border',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button1_custom', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button1_hover_border',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Hover Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button1_custom', '=', '1' ),
                ),
            ),
            array(
                'id'       => 'bottom_header_button1_custom_sticky',
                'type'     => 'switch',
                'title'    => esc_html__( 'Customize Sticky Button', 'brainbizz' ),
                'default'  => false,
            ),              
            array(
                'id'       => 'bottom_header_button1_color_txt_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Text Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button1_custom_sticky', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button1_hover_color_txt_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Hover Text Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button1_custom_sticky', '=', '1' ),
                ),
            ),            
            array(
                'id'       => 'bottom_header_button1_bg_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Background Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button1_custom_sticky', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button1_hover_bg_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Hover Background Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button1_custom_sticky', '=', '1' ),
                ),
            ),            
            array(
                'id'       => 'bottom_header_button1_border_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button1_custom_sticky', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button1_hover_border_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Hover Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button1_custom_sticky', '=', '1' ),
                ),
            ),
            array(
                'id'       => 'bottom_header_button1_padding',
                'type'     => 'spacing',
                // An array of CSS selectors to apply this font style to
                'mode'     => 'padding',
                'all'      => false,
                'bottom'   => false,
                'top'   => false,
                'left'   => true,
                'right'   => true,
                'title'    => esc_html__( 'Paddings Left/Right', 'brainbizz' ),
                'default'  => array(         
                    'padding-left' => '35', 
                    'padding-right' => '35',                            
                )
            ),
                        array(
                'id'             => 'bottom_header_button2_title',
                'type'           => 'text',
                'title'          => esc_html__( 'Button Text', 'brainbizz' ),
                'default'        => esc_html__( 'Get Ticket', 'brainbizz' ),
            ),             
            array(
                'id'             => 'bottom_header_button2_link',
                'type'           => 'text',
                'title'          => esc_html__( 'Link', 'brainbizz' )
            ), 
            array(
                'id'       => 'bottom_header_button2_size',
                'type'     => 'select',
                'title'    => esc_html__( 'Button Size', 'brainbizz' ),
                'options'  => array(
                    's' => esc_html__( 'Small', 'brainbizz' ),
                    'm' => esc_html__( 'Medium', 'brainbizz' ),
                    'l' => esc_html__( 'Large', 'brainbizz' ),
                    'xl' => esc_html__( 'Extra Large', 'brainbizz' ),
                    
                ),
                'default'  => 'm'
            ),  
            array(
                'id'       => 'bottom_header_button2_custom',
                'type'     => 'switch',
                'title'    => esc_html__( 'Customize Button', 'brainbizz' ),
                'default'  => false,
            ),            
            array(
                'id'       => 'bottom_header_button2_color_txt',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Text Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button2_custom', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button2_hover_color_txt',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Hover Text Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button2_custom', '=', '1' ),
                ),
            ),            
            array(
                'id'       => 'bottom_header_button2_bg',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Background Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button2_custom', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button2_hover_bg',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Hover Background Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button2_custom', '=', '1' ),
                ),
            ),            
            array(
                'id'       => 'bottom_header_button2_border',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button2_custom', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button2_hover_border',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Hover Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button2_custom', '=', '1' ),
                ),
            ),
            array(
                'id'       => 'bottom_header_button2_custom_sticky',
                'type'     => 'switch',
                'title'    => esc_html__( 'Customize Sticky Button', 'brainbizz' ),
                'default'  => false,
            ),              
            array(
                'id'       => 'bottom_header_button2_color_txt_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Text Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button2_custom_sticky', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button2_hover_color_txt_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Hover Text Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button2_custom_sticky', '=', '1' ),
                ),
            ),            
            array(
                'id'       => 'bottom_header_button2_bg_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Background Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button2_custom_sticky', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button2_hover_bg_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Hover Background Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button2_custom_sticky', '=', '1' ),
                ),
            ),            
            array(
                'id'       => 'bottom_header_button2_border_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button2_custom_sticky', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button2_hover_border_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Hover Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button2_custom_sticky', '=', '1' ),
                ),
            ),
            array(
                'id'       => 'bottom_header_button2_padding',
                'type'     => 'spacing',
                // An array of CSS selectors to apply this font style to
                'mode'     => 'padding',
                'all'      => false,
                'bottom'   => false,
                'top'   => false,
                'left'   => true,
                'right'   => true,
                'title'    => esc_html__( 'Paddings Left/Right', 'brainbizz' ),
                'default'  => array(         
                    'padding-left' => '35', 
                    'padding-right' => '35',                            
                )
            ),
                        array(
                'id'             => 'bottom_header_button3_title',
                'type'           => 'text',
                'title'          => esc_html__( 'Button Text', 'brainbizz' ),
                'default'        => esc_html__( 'Get Ticket', 'brainbizz' ),
            ),             
            array(
                'id'             => 'bottom_header_button3_link',
                'type'           => 'text',
                'title'          => esc_html__( 'Link', 'brainbizz' )
            ), 
            array(
                'id'       => 'bottom_header_button3_size',
                'type'     => 'select',
                'title'    => esc_html__( 'Button Size', 'brainbizz' ),
                'options'  => array(
                    's' => esc_html__( 'Small', 'brainbizz' ),
                    'm' => esc_html__( 'Medium', 'brainbizz' ),
                    'l' => esc_html__( 'Large', 'brainbizz' ),
                    'xl' => esc_html__( 'Extra Large', 'brainbizz' ),
                    
                ),
                'default'  => 'm'
            ),  
            array(
                'id'       => 'bottom_header_button3_custom',
                'type'     => 'switch',
                'title'    => esc_html__( 'Customize Button', 'brainbizz' ),
                'default'  => false,
            ),            
            array(
                'id'       => 'bottom_header_button3_color_txt',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Text Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button3_custom', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button3_hover_color_txt',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Hover Text Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button3_custom', '=', '1' ),
                ),
            ),            
            array(
                'id'       => 'bottom_header_button3_bg',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Background Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button3_custom', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button3_hover_bg',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Hover Background Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button3_custom', '=', '1' ),
                ),
            ),            
            array(
                'id'       => 'bottom_header_button3_border',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button3_custom', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button3_hover_border',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Hover Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button3_custom', '=', '1' ),
                ),
            ),
            array(
                'id'       => 'bottom_header_button3_custom_sticky',
                'type'     => 'switch',
                'title'    => esc_html__( 'Customize Sticky Button', 'brainbizz' ),
                'default'  => false,
            ),              
            array(
                'id'       => 'bottom_header_button3_color_txt_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Text Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button3_custom_sticky', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button3_hover_color_txt_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Hover Text Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button3_custom_sticky', '=', '1' ),
                ),
            ),            
            array(
                'id'       => 'bottom_header_button3_bg_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Background Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button3_custom_sticky', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button3_hover_bg_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Hover Background Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button3_custom_sticky', '=', '1' ),
                ),
            ),            
            array(
                'id'       => 'bottom_header_button3_border_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button3_custom_sticky', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button3_hover_border_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Hover Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button3_custom_sticky', '=', '1' ),
                ),
            ),
            array(
                'id'       => 'bottom_header_button3_padding',
                'type'     => 'spacing',
                // An array of CSS selectors to apply this font style to
                'mode'     => 'padding',
                'all'      => false,
                'bottom'   => false,
                'top'   => false,
                'left'   => true,
                'right'   => true,
                'title'    => esc_html__( 'Paddings Left/Right', 'brainbizz' ),
                'default'  => array(         
                    'padding-left' => '35', 
                    'padding-right' => '35',                            
                )
            ),
                        array(
                'id'             => 'bottom_header_button4_title',
                'type'           => 'text',
                'title'          => esc_html__( 'Button Text', 'brainbizz' ),
                'default'        => esc_html__( 'Get Ticket', 'brainbizz' ),
            ),             
            array(
                'id'             => 'bottom_header_button4_link',
                'type'           => 'text',
                'title'          => esc_html__( 'Link', 'brainbizz' )
            ), 
            array(
                'id'       => 'bottom_header_button4_size',
                'type'     => 'select',
                'title'    => esc_html__( 'Button Size', 'brainbizz' ),
                'options'  => array(
                    's' => esc_html__( 'Small', 'brainbizz' ),
                    'm' => esc_html__( 'Medium', 'brainbizz' ),
                    'l' => esc_html__( 'Large', 'brainbizz' ),
                    'xl' => esc_html__( 'Extra Large', 'brainbizz' ),
                    
                ),
                'default'  => 'm'
            ),  
            array(
                'id'       => 'bottom_header_button4_custom',
                'type'     => 'switch',
                'title'    => esc_html__( 'Customize Button', 'brainbizz' ),
                'default'  => false,
            ),            
            array(
                'id'       => 'bottom_header_button4_color_txt',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Text Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button4_custom', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button4_hover_color_txt',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Hover Text Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button4_custom', '=', '1' ),
                ),
            ),            
            array(
                'id'       => 'bottom_header_button4_bg',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Background Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#fd226a',
                    'alpha' => '1',
                    'rgba'  => 'rgba(253,34,106,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button4_custom', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button4_hover_bg',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Hover Background Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button4_custom', '=', '1' ),
                ),
            ),            
            array(
                'id'       => 'bottom_header_button4_border',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button4_custom', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button4_hover_border',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Hover Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button4_custom', '=', '1' ),
                ),
            ),
            array(
                'id'       => 'bottom_header_button4_custom_sticky',
                'type'     => 'switch',
                'title'    => esc_html__( 'Customize Sticky Button', 'brainbizz' ),
                'default'  => false,
            ),              
            array(
                'id'       => 'bottom_header_button4_color_txt_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Text Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button4_custom_sticky', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button4_hover_color_txt_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Hover Text Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button4_custom_sticky', '=', '1' ),
                ),
            ),            
            array(
                'id'       => 'bottom_header_button4_bg_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Background Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#fd226a',
                    'alpha' => '1',
                    'rgba'  => 'rgba(253,34,106,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button4_custom_sticky', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button4_hover_bg_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Hover Background Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button4_custom_sticky', '=', '1' ),
                ),
            ),            
            array(
                'id'       => 'bottom_header_button4_border_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button4_custom_sticky', '=', '1' ),
                ),
            ),           
            array(
                'id'       => 'bottom_header_button4_hover_border_sticky',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Hover Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#7c529c',
                    'alpha' => '1',
                    'rgba'  => 'rgba(124,82,156,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'bottom_header_button4_custom_sticky', '=', '1' ),
                ),
            ),
            array(
                'id'       => 'bottom_header_button4_padding',
                'type'     => 'spacing',
                // An array of CSS selectors to apply this font style to
                'mode'     => 'padding',
                'all'      => false,
                'bottom'   => false,
                'top'   => false,
                'left'   => true,
                'right'   => true,
                'title'    => esc_html__( 'Paddings Left/Right', 'brainbizz' ),
                'default'  => array(         
                    'padding-left' => '35', 
                    'padding-right' => '35',                            
                )
            ),
            array(
                'id'      => 'bottom_header_bar_html1_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 1 Editor', 'brainbizz' ),
                'default' => '',
            ),
            array(
                'id'      => 'bottom_header_bar_html2_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 2 Editor', 'brainbizz' ),
                'default' => '',
            ),            
            array(
                'id'      => 'bottom_header_bar_html3_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 3 Editor', 'brainbizz' ),
                'default' => '',
            ),
            array(
                'id'      => 'bottom_header_bar_html4_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 4 Editor', 'brainbizz' ),
                'default' => '',
            ),            array(
                'id'      => 'bottom_header_bar_html5_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 5 Editor', 'brainbizz' ),
                'default' => '',
            ),
            array(
                'id'      => 'bottom_header_bar_html6_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 6 Editor', 'brainbizz' ),
                'default' => '',
            ),            
            array(
                'id'      => 'bottom_header_bar_html7_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 7 Editor', 'brainbizz' ),
                'default' => '',
            ),            
            array(
                'id'      => 'bottom_header_bar_html8_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 8 Editor', 'brainbizz' ),
                'default' => '',
            ),
            array(
                'id'       => 'header_top-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Header Top Options', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'header_top_full_width',
                'type'     => 'switch',
                'title'    => esc_html__( 'Full Width Top Header', 'brainbizz' ),
                'subtitle' => esc_html__( 'Set header content in full width top layout', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'             => 'header_top_height',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Header Top Height', 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => 100,
                )
            ),
            array(
                'id'       => 'header_top_background_image',
                'type'     => 'media',
                'title'    => esc_html__( 'Header Top Background Image', 'brainbizz' ),
            ),
            array(
                'id'       => 'header_top_background',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Header Top Background', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '.9',
                    'rgba'  => 'rgba(255,255,255,0.9)'
                ),
                'mode'     => 'background',
            ),
            array(
                'id'       => 'header_top_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Header Top Text Color', 'brainbizz' ),
                'subtitle' => esc_html__( 'Set Top header text color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#fefefe',
                    'alpha' => '.5',
                    'rgba'  => 'rgba(254,254,254,0.5)'
                ),
                'mode'     => 'background',
            ),
            array(
                'id'       => 'header_top_bottom_border',
                'type'     => 'switch',
                'title'    => esc_html__( 'Set Header Top Bottom Border', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id'             => 'header_top_border_height',
                'type'           => 'dimensions',
                'units'          => false,    
                'units_extended' => false,
                'title'          => esc_html__( 'Header Top Border Width' , 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => '1',
                ),
                'required' => array(
                    array( 'header_top_bottom_border', '=', '1' )
                ),
            ),
            array(
                'id'       => 'header_top_bottom_border_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Header Top Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#2b3258',
                    'alpha' => '1',
                    'rgba'  => 'rgba(43,50,88,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'header_top_bottom_border', '=', '1' ),
                ), 
            ),
            array(
                'id'     => 'header_top-end',
                'type'   => 'section',
                'indent' => false, 
            ),               
            array(
                'id'       => 'header_middle-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Header Middle Options', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'header_middle_full_width',
                'type'     => 'switch',
                'title'    => esc_html__( 'Full Width Middle Header', 'brainbizz' ),
                'subtitle' => esc_html__( 'Set header content in full width middle layout', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id'             => 'header_middle_height',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Header Middle Height', 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => 110,
                )
            ),
            array(
                'id'       => 'header_middle_background_image',
                'type'     => 'media',
                'title'    => esc_html__( 'Header Middle Background Image', 'brainbizz' ),
            ),
            array(
                'id'       => 'header_middle_background',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Header Middle Background', 'brainbizz' ),
                'default'  => array(
                    'color' => '#212122',
                    'alpha' => '1',
                    'rgba'  => 'rgba(33,33,34,1)'
                ),
                'mode'     => 'background',
            ),
            array(
                'id'       => 'header_middle_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Header Middle Text Color', 'brainbizz' ),
                'subtitle' => esc_html__( 'Set Middle header text color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
            ),
            array(
                'id'       => 'header_middle_bottom_border',
                'type'     => 'switch',
                'title'    => esc_html__( 'Set Header Middle Bottom Border', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'             => 'header_middle_border_height',
                'type'           => 'dimensions',
                'units'          => false,    
                'units_extended' => false,
                'title'          => esc_html__( 'Header Middle Border Width' , 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => '1',
                ),
                'required' => array(
                    array( 'header_middle_bottom_border', '=', '1' )
                ),
            ),
            array(
                'id'       => 'header_middle_bottom_border_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Header Middle Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#2b3258',
                    'alpha' => '1',
                    'rgba'  => 'rgba(43,50,88,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'header_middle_bottom_border', '=', '1' ),
                ), 
            ),
            array(
                'id'     => 'header_middle-end',
                'type'   => 'section',
                'indent' => false, 
            ),            

            array(
                'id'       => 'header_bottom-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Header Bottom Options', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'header_bottom_full_width',
                'type'     => 'switch',
                'title'    => esc_html__( 'Full Width Bottom Header', 'brainbizz' ),
                'subtitle' => esc_html__( 'Set header content in full width bottom layout', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'             => 'header_bottom_height',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Header Bottom Height', 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => 100,
                )
            ),
            array(
                'id'       => 'header_bottom_background_image',
                'type'     => 'media',
                'title'    => esc_html__( 'Header Bottom Background Image', 'brainbizz' ),
            ),
            array(
                'id'       => 'header_bottom_background',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Header Bottom Background', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '.9',
                    'rgba'  => 'rgba(255,255,255,0.9)'
                ),
                'mode'     => 'background',
            ),
            array(
                'id'       => 'header_bottom_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Header Bottom Text Color', 'brainbizz' ),
                'subtitle' => esc_html__( 'Set Bottom header text color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#fefefe',
                    'alpha' => '.5',
                    'rgba'  => 'rgba(254,254,254,0.5)'
                ),
                'mode'     => 'background',
            ),
            array(
                'id'       => 'header_bottom_bottom_border',
                'type'     => 'switch',
                'title'    => esc_html__( 'Set Header Bottom Border', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id'             => 'header_bottom_border_height',
                'type'           => 'dimensions',
                'units'          => false,    
                'units_extended' => false,
                'title'          => esc_html__( 'Header Bottom Border Width' , 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => '1',
                ),
                'required' => array(
                    array( 'header_bottom_bottom_border', '=', '1' )
                ),
            ),
            array(
                'id'       => 'header_bottom_bottom_border_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Header Bottom Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#2b3258',
                    'alpha' => '1',
                    'rgba'  => 'rgba(43,50,88,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'header_bottom_bottom_border', '=', '1' ),
                ), 
            ),
            array(
                'id'     => 'header_bottom-end',
                'type'   => 'section',
                'indent' => false, 
            ),            
            array(
                'id'       => 'header_column-top-left-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Top Left Column Options', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'header_column_top_left_horz',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Horizontal Align', 'brainbizz' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'brainbizz' ),
                    'center' => esc_html__( 'Center', 'brainbizz' ),
                    'right' => esc_html__( 'Right', 'brainbizz' ),
                ),
                'default'  => 'left'
            ),            
            array(
                'id'       => 'header_column_top_left_vert',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Vertical Align', 'brainbizz' ),
                'options'  => array(
                    'top' => esc_html__( 'Top', 'brainbizz' ),
                    'middle' => esc_html__( 'Middle', 'brainbizz' ),
                    'bottom' => esc_html__( 'Bottom', 'brainbizz' ),
                ),
                'default'  => 'middle'
            ),            
            array(
                'id'       => 'header_column_top_left_display',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Display', 'brainbizz' ),
                'options'  => array(
                    'normal' => esc_html__( 'Normal', 'brainbizz' ),
                    'grow' => esc_html__( 'Grow', 'brainbizz' ),
                ),
                'default'  => 'normal'
            ),
            array(
                'id'     => 'header_column-top-left-end',
                'type'   => 'section',
                'indent' => false, 
            ),            
            array(
                'id'       => 'header_column-top-center-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Top Center Column Options', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'header_column_top_center_horz',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Horizontal Align', 'brainbizz' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'brainbizz' ),
                    'center' => esc_html__( 'Center', 'brainbizz' ),
                    'right' => esc_html__( 'Right', 'brainbizz' ),
                ),
                'default'  => 'left'
            ),            
            array(
                'id'       => 'header_column_top_center_vert',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Vertical Align', 'brainbizz' ),
                'options'  => array(
                    'top' => esc_html__( 'Top', 'brainbizz' ),
                    'middle' => esc_html__( 'Middle', 'brainbizz' ),
                    'bottom' => esc_html__( 'Bottom', 'brainbizz' ),
                ),
                'default'  => 'middle'
            ),            
            array(
                'id'       => 'header_column_top_center_display',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Display', 'brainbizz' ),
                'options'  => array(
                    'normal' => esc_html__( 'Normal', 'brainbizz' ),
                    'grow' => esc_html__( 'Grow', 'brainbizz' ),
                ),
                'default'  => 'normal'
            ),
            array(
                'id'     => 'header_column-top-center-end',
                'type'   => 'section',
                'indent' => false, 
            ),            
            array(
                'id'       => 'header_column-top-center-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Top Center Column Options', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'header_column_top_center_horz',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Horizontal Align', 'brainbizz' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'brainbizz' ),
                    'center' => esc_html__( 'Center', 'brainbizz' ),
                    'right' => esc_html__( 'Right', 'brainbizz' ),
                ),
                'default'  => 'left'
            ),            
            array(
                'id'       => 'header_column_top_center_vert',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Vertical Align', 'brainbizz' ),
                'options'  => array(
                    'top' => esc_html__( 'Top', 'brainbizz' ),
                    'middle' => esc_html__( 'Middle', 'brainbizz' ),
                    'bottom' => esc_html__( 'Bottom', 'brainbizz' ),
                ),
                'default'  => 'middle'
            ),            
            array(
                'id'       => 'header_column_top_center_display',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Display', 'brainbizz' ),
                'options'  => array(
                    'normal' => esc_html__( 'Normal', 'brainbizz' ),
                    'grow' => esc_html__( 'Grow', 'brainbizz' ),
                ),
                'default'  => 'normal'
            ),
            array(
                'id'     => 'header_column-top-center-end',
                'type'   => 'section',
                'indent' => false, 
            ),            
            array(
                'id'       => 'header_column-top-right-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Top Right Column Options', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'header_column_top_right_horz',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Horizontal Align', 'brainbizz' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'brainbizz' ),
                    'center' => esc_html__( 'Center', 'brainbizz' ),
                    'right' => esc_html__( 'Right', 'brainbizz' ),
                ),
                'default'  => 'right'
            ),            
            array(
                'id'       => 'header_column_top_right_vert',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Vertical Align', 'brainbizz' ),
                'options'  => array(
                    'top' => esc_html__( 'Top', 'brainbizz' ),
                    'middle' => esc_html__( 'Middle', 'brainbizz' ),
                    'bottom' => esc_html__( 'Bottom', 'brainbizz' ),
                ),
                'default'  => 'middle'
            ),            
            array(
                'id'       => 'header_column_top_right_display',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Display', 'brainbizz' ),
                'options'  => array(
                    'normal' => esc_html__( 'Normal', 'brainbizz' ),
                    'grow' => esc_html__( 'Grow', 'brainbizz' ),
                ),
                'default'  => 'normal'
            ),
            array(
                'id'     => 'header_column-top-right-end',
                'type'   => 'section',
                'indent' => false, 
            ),            
            array(
                'id'       => 'header_column-middle-left-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Middle Left Column Options', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'header_column_middle_left_horz',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Horizontal Align', 'brainbizz' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'brainbizz' ),
                    'center' => esc_html__( 'Center', 'brainbizz' ),
                    'right' => esc_html__( 'Right', 'brainbizz' ),
                ),
                'default'  => 'left'
            ),            
            array(
                'id'       => 'header_column_middle_left_vert',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Vertical Align', 'brainbizz' ),
                'options'  => array(
                    'top' => esc_html__( 'Top', 'brainbizz' ),
                    'middle' => esc_html__( 'Middle', 'brainbizz' ),
                    'bottom' => esc_html__( 'Bottom', 'brainbizz' ),
                ),
                'default'  => 'middle'
            ),            
            array(
                'id'       => 'header_column_middle_left_display',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Display', 'brainbizz' ),
                'options'  => array(
                    'normal' => esc_html__( 'Normal', 'brainbizz' ),
                    'grow' => esc_html__( 'Grow', 'brainbizz' ),
                ),
                'default'  => 'normal'
            ),
            array(
                'id'     => 'header_column-middle-left-end',
                'type'   => 'section',
                'indent' => false, 
            ),            
            array(
                'id'       => 'header_column-middle-center-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Middle Center Column Options', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'header_column_middle_center_horz',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Horizontal Align', 'brainbizz' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'brainbizz' ),
                    'center' => esc_html__( 'Center', 'brainbizz' ),
                    'right' => esc_html__( 'Right', 'brainbizz' ),
                ),
                'default'  => 'left'
            ),            
            array(
                'id'       => 'header_column_middle_center_vert',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Vertical Align', 'brainbizz' ),
                'options'  => array(
                    'top' => esc_html__( 'Top', 'brainbizz' ),
                    'middle' => esc_html__( 'Middle', 'brainbizz' ),
                    'bottom' => esc_html__( 'Bottom', 'brainbizz' ),
                ),
                'default'  => 'middle'
            ),            
            array(
                'id'       => 'header_column_middle_center_display',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Display', 'brainbizz' ),
                'options'  => array(
                    'normal' => esc_html__( 'Normal', 'brainbizz' ),
                    'grow' => esc_html__( 'Grow', 'brainbizz' ),
                ),
                'default'  => 'normal'
            ),
            array(
                'id'     => 'header_column-middle-center-end',
                'type'   => 'section',
                'indent' => false, 
            ),            
            array(
                'id'       => 'header_column-middle-center-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Middle Center Column Options', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'header_column_middle_center_horz',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Horizontal Align', 'brainbizz' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'brainbizz' ),
                    'center' => esc_html__( 'Center', 'brainbizz' ),
                    'right' => esc_html__( 'Right', 'brainbizz' ),
                ),
                'default'  => 'left'
            ),            
            array(
                'id'       => 'header_column_middle_center_vert',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Vertical Align', 'brainbizz' ),
                'options'  => array(
                    'top' => esc_html__( 'Top', 'brainbizz' ),
                    'middle' => esc_html__( 'Middle', 'brainbizz' ),
                    'bottom' => esc_html__( 'Bottom', 'brainbizz' ),
                ),
                'default'  => 'middle'
            ),            
            array(
                'id'       => 'header_column_middle_center_display',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Display', 'brainbizz' ),
                'options'  => array(
                    'normal' => esc_html__( 'Normal', 'brainbizz' ),
                    'grow' => esc_html__( 'Grow', 'brainbizz' ),
                ),
                'default'  => 'normal'
            ),
            array(
                'id'     => 'header_column-middle-center-end',
                'type'   => 'section',
                'indent' => false, 
            ),            
            array(
                'id'       => 'header_column-middle-right-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Middle Right Column Options', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'header_column_middle_right_horz',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Horizontal Align', 'brainbizz' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'brainbizz' ),
                    'center' => esc_html__( 'Center', 'brainbizz' ),
                    'right' => esc_html__( 'Right', 'brainbizz' ),
                ),
                'default'  => 'right'
            ),            
            array(
                'id'       => 'header_column_middle_right_vert',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Vertical Align', 'brainbizz' ),
                'options'  => array(
                    'top' => esc_html__( 'Top', 'brainbizz' ),
                    'middle' => esc_html__( 'Middle', 'brainbizz' ),
                    'bottom' => esc_html__( 'Bottom', 'brainbizz' ),
                ),
                'default'  => 'middle'
            ),            
            array(
                'id'       => 'header_column_middle_right_display',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Display', 'brainbizz' ),
                'options'  => array(
                    'normal' => esc_html__( 'Normal', 'brainbizz' ),
                    'grow' => esc_html__( 'Grow', 'brainbizz' ),
                ),
                'default'  => 'normal'
            ),
            array(
                'id'     => 'header_column-middle-right-end',
                'type'   => 'section',
                'indent' => false, 
            ),            
            array(
                'id'       => 'header_column-bottom-left-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Bottom Left Column Options', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'header_column_bottom_left_horz',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Horizontal Align', 'brainbizz' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'brainbizz' ),
                    'center' => esc_html__( 'Center', 'brainbizz' ),
                    'right' => esc_html__( 'Right', 'brainbizz' ),
                ),
                'default'  => 'left'
            ),            
            array(
                'id'       => 'header_column_bottom_left_vert',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Vertical Align', 'brainbizz' ),
                'options'  => array(
                    'top' => esc_html__( 'Top', 'brainbizz' ),
                    'middle' => esc_html__( 'Middle', 'brainbizz' ),
                    'bottom' => esc_html__( 'Bottom', 'brainbizz' ),
                ),
                'default'  => 'middle'
            ),            
            array(
                'id'       => 'header_column_bottom_left_display',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Display', 'brainbizz' ),
                'options'  => array(
                    'normal' => esc_html__( 'Normal', 'brainbizz' ),
                    'grow' => esc_html__( 'Grow', 'brainbizz' ),
                ),
                'default'  => 'normal'
            ),
            array(
                'id'     => 'header_column-bottom-left-end',
                'type'   => 'section',
                'indent' => false, 
            ),            
            array(
                'id'       => 'header_column-bottom-center-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Middle Center Column Options', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'header_column_bottom_center_horz',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Horizontal Align', 'brainbizz' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'brainbizz' ),
                    'center' => esc_html__( 'Center', 'brainbizz' ),
                    'right' => esc_html__( 'Right', 'brainbizz' ),
                ),
                'default'  => 'left'
            ),            
            array(
                'id'       => 'header_column_bottom_center_vert',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Vertical Align', 'brainbizz' ),
                'options'  => array(
                    'top' => esc_html__( 'Top', 'brainbizz' ),
                    'middle' => esc_html__( 'Middle', 'brainbizz' ),
                    'bottom' => esc_html__( 'Bottom', 'brainbizz' ),
                ),
                'default'  => 'middle'
            ),            
            array(
                'id'       => 'header_column_bottom_center_display',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Display', 'brainbizz' ),
                'options'  => array(
                    'normal' => esc_html__( 'Normal', 'brainbizz' ),
                    'grow' => esc_html__( 'Grow', 'brainbizz' ),
                ),
                'default'  => 'normal'
            ),
            array(
                'id'     => 'header_column-bottom-center-end',
                'type'   => 'section',
                'indent' => false, 
            ),            
            array(
                'id'       => 'header_column-bottom-center-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Bottom Center Column Options', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'header_column_bottom_center_horz',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Horizontal Align', 'brainbizz' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'brainbizz' ),
                    'center' => esc_html__( 'Center', 'brainbizz' ),
                    'right' => esc_html__( 'Right', 'brainbizz' ),
                ),
                'default'  => 'left'
            ),            
            array(
                'id'       => 'header_column_bottom_center_vert',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Vertical Align', 'brainbizz' ),
                'options'  => array(
                    'top' => esc_html__( 'Top', 'brainbizz' ),
                    'middle' => esc_html__( 'Middle', 'brainbizz' ),
                    'bottom' => esc_html__( 'Bottom', 'brainbizz' ),
                ),
                'default'  => 'middle'
            ),            
            array(
                'id'       => 'header_column_bottom_center_display',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Display', 'brainbizz' ),
                'options'  => array(
                    'normal' => esc_html__( 'Normal', 'brainbizz' ),
                    'grow' => esc_html__( 'Grow', 'brainbizz' ),
                ),
                'default'  => 'normal'
            ),
            array(
                'id'     => 'header_column-bottom-center-end',
                'type'   => 'section',
                'indent' => false, 
            ),            
            array(
                'id'       => 'header_column-bottom-right-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Bottom Right Column Options', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'header_column_bottom_right_horz',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Horizontal Align', 'brainbizz' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'brainbizz' ),
                    'center' => esc_html__( 'Center', 'brainbizz' ),
                    'right' => esc_html__( 'Right', 'brainbizz' ),
                ),
                'default'  => 'right'
            ),            
            array(
                'id'       => 'header_column_bottom_right_vert',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Vertical Align', 'brainbizz' ),
                'options'  => array(
                    'top' => esc_html__( 'Top', 'brainbizz' ),
                    'middle' => esc_html__( 'Middle', 'brainbizz' ),
                    'bottom' => esc_html__( 'Bottom', 'brainbizz' ),
                ),
                'default'  => 'middle'
            ),            
            array(
                'id'       => 'header_column_bottom_right_display',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Display', 'brainbizz' ),
                'options'  => array(
                    'normal' => esc_html__( 'Normal', 'brainbizz' ),
                    'grow' => esc_html__( 'Grow', 'brainbizz' ),
                ),
                'default'  => 'normal'
            ),
            array(
                'id'     => 'header_column-bottom-right-end',
                'type'   => 'section',
                'indent' => false, 
            ),
            array(
                'id'       => 'header_row_settings-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Header Settings', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'header_shadow',
                'type'     => 'switch',
                'title'    => esc_html__( 'Header Bottom Shadow', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'       => 'header_on_bg',
                'type'     => 'switch',
                'title'    => esc_html__( 'Over content', 'brainbizz' ),
                'subtitle' => esc_html__( 'Set Header preset to display over content.', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'       => 'lavalamp_active',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Lavalamp Marker', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'       => 'sub_menu_background',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sub Menu Background', 'brainbizz' ),
                'subtitle' => esc_html__( 'Set sub menu background color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
            ),
            array(
                'id'       => 'sub_menu_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Sub Menu Text Color', 'brainbizz' ),
                'subtitle' => esc_html__( 'Set sub menu header text color', 'brainbizz' ),
                'default'  => '#232323',
                'transparent' => false,
            ),
            array(
                'id'        => 'header_mobile_queris',
                'type'      => 'slider',
                'title'     => esc_html__('Show Header mobile in the resolution', 'brainbizz'),
                "default"   => 1200,
                "min"       => 1,
                "step"      => 1,
                "max"       => 1700,
                'display_value' => 'text',
                'required' => array( 'mobile_header', '=', '1' ),
            ),

            array(
                'id'     => 'header_row_settings-end',
                'type'   => 'section',
                'indent' => false, 
            ),

        )

    ) );

    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'Header Sticky', 'brainbizz' ),
        'id'               => 'header_builder_sticky',
        'subsection'       => true,        
        'fields'           => array(            
            array(
                'id'       => 'header_sticky',
                'type'     => 'switch',
                'title'    => esc_html__( 'Sticky Header', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id'       => 'header_sticky-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Sticky Settings', 'brainbizz' ),
                'indent'   => true,
                'required' => array( 'header_sticky', '=', '1' ),
            ),            
            array(
                'id'       => 'header_sticky_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Sticky Header Text Color', 'brainbizz' ),
                'subtitle' => esc_html__( 'Set sticky header text color', 'brainbizz' ),
                'default'  => '#404040',
                'transparent' => false,
            ),
            array(
                'id'       => 'header_sticky_background',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sticky Header Background', 'brainbizz' ),
                'subtitle' => esc_html__( 'Set sticky header background color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1.0',
                    'rgba'  => 'rgba(255,255,255,1)'
                ),
                'mode'     => 'background',
            ),
            array(
                'id'             => 'header_sticky_height',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Sticky Header Height', 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => 100,
                )
            ),
            array(
                'id'       => 'header_sticky_style',
                'type'     => 'select',
                'title'    => esc_html__( 'Choose your sticky style.', 'brainbizz' ),
                'options'  => array(
                    'standard' => esc_html__( 'Show when scroll', 'brainbizz' ),
                    'scroll_up' => esc_html__( 'Show when scroll up', 'brainbizz' ),
                ),
                'default'  => 'standard'
            ),
            array(
                'id'       => 'header_sticky_border',
                'type'     => 'switch',
                'title'    => esc_html__( 'Bottom Border On/Off', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'             => 'header_sticky_border_height',
                'type'           => 'dimensions',
                'units'          => false,    
                'units_extended' => false,
                'title'          => esc_html__( 'Bottom Border Width' , 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => '1',
                ),
                'required' => array(
                    array( 'header_sticky_border', '=', '1' )
                ),
            ),
            array(
                'id'       => 'header_sticky_border_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Bottom Border Color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#525252',
                    'alpha' => '1',
                    'rgba'  => 'rgba(82, 82, 82, 1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'header_sticky_border', '=', '1' )
                ), 
            ),
            array(
                'id'       => 'header_sticky_shadow',
                'type'     => 'switch',
                'title'    => esc_html__( 'Bottom Shadow On/Off', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id'       => 'sticky_header',
                'type'     => 'switch',
                'title'    => esc_html__( 'Custom Sticky Header ', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'       => 'sticky_header_layout',
                'type'     => 'sorter',
                'title'    => esc_html__( 'Sticky Header Builder', 'brainbizz' ),
                'compiler' => 'true',
                'full_width'    => true,
                'options'  => array(
                    'items'  => array(
                        'html1' => esc_html__( 'HTML 1', 'brainbizz' ),
                        'html2'  =>  esc_html__( 'HTML 2', 'brainbizz' ),                        
                        'html3' => esc_html__( 'HTML 3', 'brainbizz' ),
                        'html4'  =>  esc_html__( 'HTML 4', 'brainbizz' ),                        
                        'html5' => esc_html__( 'HTML 5', 'brainbizz' ),
                        'html6'  =>  esc_html__( 'HTML 6', 'brainbizz' ),
                        'item_search'  =>  esc_html__( 'Search', 'brainbizz' ),
                        'wpml'        =>  esc_html__( 'WPML', 'brainbizz' ),
                        'delimiter1'  =>  esc_html__( '|', 'brainbizz' ),
                        'delimiter2'  =>  esc_html__( '|', 'brainbizz' ),
                        'delimiter3'  =>  esc_html__( '|', 'brainbizz' ),
                        'delimiter4'  =>  esc_html__( '|', 'brainbizz' ),
                        'delimiter5'  =>  esc_html__( '|', 'brainbizz' ),
                        'delimiter6'  =>  esc_html__( '|', 'brainbizz' ),
                    ),
                    'Left align side' => array(
                        'logo' => esc_html__( 'Logo', 'brainbizz' ),
                    ),
                    'Center align side' => array(),
                    'Right align side' => array(
                        'menu' => esc_html__( 'Menu', 'brainbizz' ),
                    ),
                ),
                'required' => array(
                    array( 'sticky_header', '=', '1' )
                ),
            ),
            array(
                'id'       => 'header_custom_sticky_full_width',
                'type'     => 'switch',
                'title'    => esc_html__( 'Full Width Sticky Header', 'brainbizz' ),
                'default'  => false,
                'required' => array(
                    array( 'sticky_header', '=', '1' )
                ),
            ),
            array(
                'id'      => 'sticky_header_bar_html1_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 1 Editor', 'brainbizz' ),
                'default' => '',
                'required' => array(
                    array( 'sticky_header', '=', '1' )
                ),
            ),
            array(
                'id'      => 'sticky_header_bar_html2_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 2 Editor', 'brainbizz' ),
                'default' => '',
                'required' => array(
                    array( 'sticky_header', '=', '1' )
                ),
            ),             
            array(
                'id'      => 'sticky_header_bar_html3_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 3 Editor', 'brainbizz' ),
                'default' => '',
                'required' => array(
                    array( 'sticky_header', '=', '1' )
                ),
            ),
            array(
                'id'      => 'sticky_header_bar_html4_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 4 Editor', 'brainbizz' ),
                'default' => '',
                'required' => array(
                    array( 'sticky_header', '=', '1' )
                ),
            ),             
            array(
                'id'      => 'sticky_header_bar_html5_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 5 Editor', 'brainbizz' ),
                'default' => '',
                'required' => array(
                    array( 'sticky_header', '=', '1' )
                ),
            ),
            array(
                'id'      => 'sticky_header_bar_html6_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 6 Editor', 'brainbizz' ),
                'default' => '',
                'required' => array(
                    array( 'sticky_header', '=', '1' )
                ),
            ), 
            array(
                'id'     => 'header_sticky-end',
                'type'   => 'section',
                'indent' => false, 
                'required' => array( 'header_sticky', '=', '1' ),
            ),
        )
    ) );    
    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'Header Mobile', 'brainbizz' ),
        'id'               => 'header_builder_mobile',
        'subsection'       => true,        
        'fields'           => array(
            array(
                'id'       => 'mobile_header',
                'type'     => 'switch',
                'title'    => esc_html__( 'Custom Mobile Header ', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id'       => 'mobile_background',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Mobile Header Background', 'brainbizz' ),
                'subtitle' => esc_html__( 'Set mobile header background color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#222328',
                    'alpha' => '1',
                    'rgba'  => 'rgba(34,35,40,1)'
                ),
                'mode'     => 'background',
                'required' => array( 'mobile_header', '=', '1' ),
            ),
            array(
                'id'       => 'mobile_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Mobile Header Text Color', 'brainbizz' ),
                'subtitle' => esc_html__( 'Set mobile header text color', 'brainbizz' ),
                'default'  => '#ffffff',
                'transparent' => false,
                'required' => array( 'mobile_header', '=', '1' ),
            ),
            array(
                'id'       => 'mobile_sub_menu_background',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Mobile Sub Menu Background', 'brainbizz' ),
                'subtitle' => esc_html__( 'Set sub menu background color', 'brainbizz' ),
                'default'  => array(
                    'color' => '#222328',
                    'alpha' => '1',
                    'rgba'  => 'rgba(34,35,40,1)'
                ),
                'mode'     => 'background',
                'required' => array( 'mobile_header', '=', '1' ),
            ),
            array(
                'id'       => 'mobile_sub_menu_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Mobile Sub Menu Text Color', 'brainbizz' ),
                'subtitle' => esc_html__( 'Set sub menu header text color', 'brainbizz' ),
                'default'  => '#ffffff',
                'transparent' => false,
                'required' => array( 'mobile_header', '=', '1' ),
            ),   
            array(
                'id'             => 'header_mobile_height',
                'type'           => 'dimensions',
                'units'          => false,    
                'units_extended' => false,
                'title'          => esc_html__( 'Mobile Height' , 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => '100',
                ),
                'required' => array(
                    array( 'mobile_header', '=', '1' )
                ),
            ),
            array(
                'id'       => 'mobile_header_layout',
                'type'     => 'sorter',
                'title'    => esc_html__( 'Mobile Header Builder', 'brainbizz' ),
                'compiler' => 'true',
                'full_width' => true,
                'options'  => array(
                    'items'  => array(
                        'html1' => esc_html__( 'HTML 1', 'brainbizz' ),
                        'html2'  =>  esc_html__( 'HTML 2', 'brainbizz' ),                        
                        'html3' => esc_html__( 'HTML 3', 'brainbizz' ),
                        'html4'  =>  esc_html__( 'HTML 4', 'brainbizz' ),                        
                        'html5' => esc_html__( 'HTML 5', 'brainbizz' ),
                        'html6'  =>  esc_html__( 'HTML 6', 'brainbizz' ),
                        'wpml'        =>  esc_html__( 'WPML', 'brainbizz' ),
                    ),
                    'Left align side' => array(
                        'menu' => esc_html__( 'Menu', 'brainbizz' ),
                    ),
                    'Center align side' => array(
                        'logo' => esc_html__( 'Logo', 'brainbizz' ),
                    ),
                    'Right align side' => array(
                        'item_search'  =>  esc_html__( 'Search', 'brainbizz' ),
                    ),
                ),
                'required' => array(
                    array( 'mobile_header', '=', '1' )
                ),
            ),
            array(
                'id'      => 'mobile_header_bar_html1_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 1 Editor', 'brainbizz' ),
                'default' => '',
                'required' => array(
                    array( 'mobile_header', '=', '1' )
                ),
            ),
            array(
                'id'      => 'mobile_header_bar_html2_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 2 Editor', 'brainbizz' ),
                'default' => '',
                'required' => array(
                    array( 'mobile_header', '=', '1' )
                ),
            ),              
            array(
                'id'      => 'mobile_header_bar_html3_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 3 Editor', 'brainbizz' ),
                'default' => '',
                'required' => array(
                    array( 'mobile_header', '=', '1' )
                ),
            ),
            array(
                'id'      => 'mobile_header_bar_html4_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 4 Editor', 'brainbizz' ),
                'default' => '',
                'required' => array(
                    array( 'mobile_header', '=', '1' )
                ),
            ),             
            array(
                'id'      => 'mobile_header_bar_html5_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 5 Editor', 'brainbizz' ),
                'default' => '',
                'required' => array(
                    array( 'mobile_header', '=', '1' )
                ),
            ),
            array(
                'id'      => 'mobile_header_bar_html6_editor',
                'type'    => 'ace_editor',
                'mode'    => 'html',
                'title'   => esc_html__( 'HTML Element 6 Editor', 'brainbizz' ),
                'default' => '',
                'required' => array(
                    array( 'mobile_header', '=', '1' )
                ),
            ),  
        )
    ) );

    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'Page Title', 'brainbizz' ),
        'id'               => 'page_title',        
    ) );

    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'Settings', 'brainbizz' ),
        'id'               => 'page_title_settings',
        'subsection'       => true,        
        'fields'           => array(
            array(
                'id'       => 'page_title_switch',
                'type'     => 'switch',
                'title'    => esc_html__( 'Page Title On/Off', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id'       => 'page_title-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Page Title Settings', 'brainbizz' ),
                'indent'   => true,
                'required' => array( 'page_title_switch', '=', '1' ),
            ),
            array(
                'id'       => 'page_title_bg_image',
                'type'     => 'background',
                'background-color' => false,
                'preview_media' => true,
                'preview' => false,
                'title'    => esc_html__( 'Background Image', 'brainbizz' ),
                'default'  => array(
                    'background-repeat' => 'repeat',
                    'background-size' => 'cover',
                    'background-attachment' => 'scroll',
                    'background-position' => 'center center',
                    'background-color' => '#1e73be',
                )
            ),
            array(
                'id'             => 'page_title_height',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Height', 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => 300,
                )
            ),
            array(
                'id'       => 'page_title_align',
                'type'     => 'button_set',
                'title'    => esc_html__('Text Align', 'brainbizz'),
                'options' => array(
                    'left' => 'Left', 
                    'center' => 'Center',
                    'right' => 'Right'
                 ), 
                'default' => 'left'
            ),
            array(
                'id'       => 'page_title_padding',
                'type'     => 'spacing',
                'mode'     => 'padding',
                'all'      => false,
                'bottom'   => true,
                'top'   => true,
                'left'   => false,
                'right'   => false,
                'title'    => esc_html__( 'Paddings Top/Bottom', 'brainbizz' ),
                'default'  => array(
                    'padding-top' => '120',              
                    'padding-bottom' => '120',
                )
            ),
            array(
                'id'       => 'page_title_margin',
                'type'     => 'spacing',
                'mode'     => 'margin',
                'all'      => false,
                'bottom'   => true,
                'top'   => false,
                'left'   => false,
                'right'   => false,
                'title'    => esc_html__( 'Margin Bottom', 'brainbizz' ),
                'default'  => array(
                    'margin-bottom' => '60',          
                )
            ),
            array(
                'id'       => 'page_title_parallax',
                'type'     => 'switch',
                'title'    => esc_html__( 'Add Page Title Parallax', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'       => 'page_title_parallax_speed',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Parallax Speed', 'brainbizz' ),
                'default'  => '0.3',
                'min'      => '-5',
                'step'     => '0.1',
                'max'      => '5',
                'required' => array( 'page_title_parallax', '=', '1' ),
            ),

            array(
                'id'       => 'page_title_breadcrumbs_switch',
                'type'     => 'switch',
                'title'    => esc_html__( 'Breadcrumbs On/Off', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id'     => 'page_title-end',
                'type'   => 'section',
                'indent' => false, 
                'required' => array( 'page_title_switch', '=', '1' ),
            ),
            
        )
    ) );

    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'Typography', 'brainbizz' ),
        'id'               => 'page_title_typography',
        'subsection'       => true,        
        'fields'           => array(
            array(
                'id'       => 'page_title_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Background Color', 'brainbizz' ),
                'default'  => '#272728',
                'transparent' => false
            ),
            array(
                'id'          => 'page_title_font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Page Title Font', 'brainbizz' ),
                'font-size' => true,
                'google' => false,
                'font-weight' => false,
                'font-family' => false,
                'font-style' => false,
                'color' => true,
                'line-height' => true,
                'font-backup' => false,
                'text-align' => false,
                'all_styles'  => false,
                'default'     => array(
                    'font-size'   => '48px',
                    'line-height'   => '60px',
                    'color'   => '#ffffff',
                ),
            ),
            array(
                'id'          => 'page_title_breadcrumbs_font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Page Title Breadcrumbs Font', 'brainbizz' ),
                'font-size' => true,
                'google' => false,
                'font-weight' => false,
                'font-family' => false,
                'font-style' => false,
                'color' => true,
                'line-height' => true,
                'font-backup' => false,
                'text-align' => false,
                'all_styles'  => false,
                'default'     => array(
                    'font-size'   => '16px',
                    'color'   => '#ffffff',
                    'line-height'   => '16px',
                ),
            ),
        )
    ) );

    // -> START Footer Options
    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__('Footer', 'brainbizz' ),
        'id'               => 'footer',        
    ) ); 

    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'Settings', 'brainbizz' ),
        'id'               => 'footer_settings',
        'subsection'       => true,        
        'fields'           => array(
            array(
                'id'       => 'footer_switch',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer On/Off', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id'       => 'footer-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Footer Settings', 'brainbizz' ),
                'indent'   => true,
                'required' => array( 'footer_switch', '=', '1' ),
            ),            
            array(
                'id'       => 'footer_add_wave',
                'type'     => 'switch',
                'title'    => esc_html__( 'Add Wave', 'brainbizz' ),
                'default'  => false,
                 'required' => array( 'footer_switch', '=', '1' ),
            ),           
            array(
                'id'             => 'footer_wave_height',
                'type'           => 'dimensions',
                'units'          => false,    
                'units_extended' => false,
                'title'          => esc_html__( 'Set Wave Height' , 'brainbizz' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
                    'height' => 158,
                ),
                'required' => array( 'footer_add_wave', '=', '1' ),
            ), 
            array(
                'id'       => 'footer_content_type',
                'type'     => 'select',
                'title'    => esc_html__( 'Content Type', 'brainbizz' ),
                'options'  => array(
                    'widgets' => 'Get Widgets',
                    'pages' => 'Get Pages'
                ),
                'default'  => 'widgets'
            ),
            array(
                'id'       => 'footer_page_select',
                'type'     => 'select',
                'title'    => esc_html__( 'Page Select', 'brainbizz' ),
                'data'  => 'posts',
                'args'  => array(
                    'post_type'      => 'footer',
                    'posts_per_page' => -1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                ),
                'required' => array( 'footer_content_type', '=', 'pages' )
            ),
            array(
                'id'       => 'widget_columns',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Columns', 'brainbizz' ),
                'options' => array(
                    '1' => '1', 
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                 ), 
                'default' => '4',
                'required' => array( 'footer_content_type', '=', 'widgets' )
            ),
            array(
                'id'       => 'widget_columns_2',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Columns Layout', 'brainbizz' ),
                'options'  => array(
                    '6-6' => array(
                        'alt' => '50-50',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/50-50.png'
                    ),
                    '3-9' => array(
                        'alt' => '25-75',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/25-75.png'
                    ),
                    '9-3' => array(
                        'alt' => '75-25',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/75-25.png'
                    ),
                    '4-8' => array(
                        'alt' => '33-66',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/33-66.png'
                    ),
                    '8-4' => array(
                        'alt' => '66-33',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/66-33.png'
                    )
                ),
                'default'  => '6-6',
                'required' => array( 'widget_columns', '=', '2' ),
            ),
            array(
                'id'       => 'widget_columns_3',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Columns Layout', 'brainbizz' ),
                'options'  => array(
                    '4-4-4' => array(
                        'alt' => '33-33-33',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/33-33-33.png'
                    ),
                    '3-3-6' => array(
                        'alt' => '25-25-50',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/25-25-50.png'
                    ),
                    '3-6-3' => array(
                        'alt' => '25-50-25',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/25-50-25.png'
                    ),
                    '6-3-3' => array(
                        'alt' => '50-25-25',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/50-25-25.png'
                    ),
                ),
                'default'  => '4-4-4',
                'required' => array( 'widget_columns', '=', '3' ),
            ),
            array(
                'id'       => 'footer_spacing',
                'type'     => 'spacing',
                'output'   => array( '.wgl-footer' ),
                'mode'     => 'padding',
                'units'    => 'px',
                'all'      => false,
                'title'    => esc_html__( 'Paddings', 'brainbizz' ),
                'default'  => array(
                    'padding-top'    => '55px',
                    'padding-right'  => '0px',
                    'padding-bottom' => '78px',
                    'padding-left'   => '0px'
                )
            ),
            array(
                'id'       => 'footer_full_width',
                'type'     => 'switch',
                'title'    => esc_html__( 'Full Width On/Off', 'brainbizz' ),
                'default'  => false,
                'required' => array( 'footer_content_type', '=', 'widgets' )
            ),
            array(
                'id'     => 'footer-end',
                'type'   => 'section',
                'indent' => false, 
                'required' => array( 'footer_switch', '=', '1' ),
            ),
            array(
                'id'       => 'footer-start-styles',
                'type'     => 'section',
                'title'    => esc_html__( 'Footer Styling', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'footer_bg_image',
                'type'     => 'background',
                'background-color' => false,
                'preview_media' => true,
                'preview' => false,
                'title'    => esc_html__( 'Background Image', 'brainbizz' ),
                'default'  => array(
                    'background-repeat' => 'repeat',
                    'background-size' => 'cover',
                    'background-attachment' => 'scroll',
                    'background-position' => 'center center',
                )
            ),
            array(
                'id'       => 'footer_align',
                'type'     => 'button_set',
                'title'    => esc_html__('Content Align', 'brainbizz'),
                'options' => array(
                    'left' => 'Left', 
                    'center' => 'Center',
                    'right' => 'Right'
                 ), 
                'default' => 'center',
                'required' => array( 'footer_content_type', '=', 'widgets' )
            ),
            array(
                'id'       => 'footer_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Background Color', 'brainbizz' ),
                'default'  => '#272728',
                'transparent' => false
            ),
            array(
                'id'       => 'footer_heading_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Headings color', 'brainbizz' ),
                'default'  => '#ffffff',
                'transparent' => false
            ),
            array(
                'id'       => 'footer_text_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Content color', 'brainbizz' ),
                'default'  => '#ffffff',
                'transparent' => false
            ),
            array(
                'id'     => 'footer-end-styles',
                'type'   => 'section',
                'indent' => false, 
            ),
        )
    ) );

    // -> START Copyright Options
    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__('Copyright', 'brainbizz' ),
        'id'               => 'copyright',        
    ) );

    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'Settings', 'brainbizz' ),
        'id'               => 'copyright-settings',
        'subsection'       => true,        
        'fields'           => array(
            array(
                'id'       => 'copyright_switch',
                'type'     => 'switch',
                'title'    => esc_html__( 'Copyright On/Off', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id'       => 'copyright-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Copyright Settings', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'      => 'copyright_editor',
                'type'    => 'editor',
                'title'   => esc_html__( 'Editor', 'brainbizz' ),
                'default' => '<p>Copyright © 2018 BrainBizz by WebGeniusLab. All Rights Reserved</p>',
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 2,
                    'teeny'         => false,
                    'quicktags'     => true,
                ),
                'required' => array( 'copyright_switch', '=', '1' ),
            ),
            array(
                'id'       => 'copyright_text_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Text Color', 'brainbizz' ),
                'default'  => '#888888',
                'transparent' => false,
                'required' => array( 'copyright_switch', '=', '1' ),
            ),
            array(
                'id'       => 'copyright_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Background Color', 'brainbizz' ),
                'default'  => '#1d1f21',
                'transparent' => false,
                'required' => array( 'copyright_switch', '=', '1' ),
            ),
            array(
                'id'       => 'copyright_spacing',
                'type'     => 'spacing',
                'mode'     => 'padding',
                'left'     => false,
                'right'     => false,
                'all'      => false,
                'title'    => esc_html__( 'Paddings', 'brainbizz' ),
                'default'  => array(
                    'padding-top'    => '10',
                    'padding-bottom' => '10',
                ),
                'required' => array( 'copyright_switch', '=', '1' ),
            ),
            array(
                'id'     => 'copyright-end',
                'type'   => 'section',
                'indent' => false, 
                'required' => array( 'footer_switch', '=', '1' ),
            ),
        )
    ));

    // -> START Blog Options
    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__('Blog', 'brainbizz' ),
        'id'               => 'blog-option',        
        'icon' => 'el-icon-th',
    ) );

    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'Archive', 'brainbizz' ),
        'id'               => 'blog-list-option',
        'subsection'       => true,        
        'fields'           => array(
            array(
                'id'       => 'post_archive_page_title_bg_image',
                'type'     => 'background',
                'background-color' => false,
                'preview_media' => true,
                'preview' => false,
                'title'    => esc_html__( 'Archive Page Title Background Image', 'brainbizz' ),
                'default'  => array(
                    'background-repeat' => 'repeat',
                    'background-size' => 'cover',
                    'background-attachment' => 'scroll',
                    'background-position' => 'center center',
                    'background-color' => '#1e73be',
                )
            ),
            array(
                'id'       => 'blog_list_sidebar_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Blog Archive Sidebar Layout', 'brainbizz' ),
                'options'  => array(
                    'none' => array(
                        'alt' => 'None',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/1col.png'
                    ),
                    'left' => array(
                        'alt' => 'Left',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/2cl.png'
                    ),
                    'right' => array(
                        'alt' => 'Right',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/2cr.png'
                    )
                ),
                'default'  => 'none'
            ),
            array(
                'id'       => 'blog_list_sidebar_def',
                'type'     => 'select',
                'title'    => esc_html__( 'Blog Archive Sidebar', 'brainbizz' ),
                'data'     => 'sidebars',
                'required' => array( 'blog_list_sidebar_layout', '!=', 'none' ),
            ),
            array(
                'id'       => 'blog_list_sidebar_def_width',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Blog Archive Sidebar Width', 'brainbizz' ),
                'options'  => array(          
                    '9' => '25%',
                    '8' => '33%',
                ),
                'default'  => '9',
                'required' => array( 'blog_list_sidebar_layout', '!=', 'none' ),
            ),
            array(
                'id'       => 'blog_list_sidebar_sticky',
                'type'     => 'switch',
                'title'    => esc_html__( 'Blog Archive Sticky Sidebar On?', 'brainbizz' ),
                'default'  => false,
                'required' => array( 'blog_list_sidebar_layout', '!=', 'none' ),
            ),         
            array(
                'id'       => 'blog_list_sidebar_gap',
                'type'     => 'select',
                'title'    => esc_html__( 'Blog Archive Sidebar Side Gap', 'brainbizz' ),
                'options'  => array(
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
                'default'  => 'def',
                'required' => array( 'blog_list_sidebar_layout', '!=', 'none' ),
            ),
            array(
                'id'       => 'blog_list_columns',
                'type'     => 'button_set',
                'title'    => esc_html__('Columns in Archive', 'brainbizz'),
                'options' => array(
                    '12' => 'One', 
                    '6' => 'Two', 
                    '4' => 'Three',
                    '3' => 'Four'
                 ), 
                'default' => '12'
            ),
            array(
                'id'       => 'blog_list_likes',
                'type'     => 'switch',
                'title'    => esc_html__( 'Likes On/Off', 'brainbizz' ),
                'default'  => false,
            ),            
            array(
                'id'       => 'blog_list_share',
                'type'     => 'switch',
                'title'    => esc_html__( 'Share On/Off', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'       => 'blog_list_hide_media',
                'type'     => 'switch',
                'title'    => esc_html__( 'Hide Media?', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'       => 'blog_list_hide_title',
                'type'     => 'switch',
                'title'    => esc_html__( 'Hide Title?', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'       => 'blog_list_hide_content',
                'type'     => 'switch',
                'title'    => esc_html__( 'Hide Content?', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'       => 'blog_post_listing_content',
                'type'     => 'switch',
                'title'    => esc_html__( 'Cut Off Text in Blog Listing', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'       => 'blog_list_letter_count',
                'type'     => 'text',
                'title'    => esc_html__('Number of character to show after trim.', 'brainbizz'),
                'default'  => '85',
                'required' => array( 'blog_post_listing_content', '=', true ),
            ),
            array(
                'id'       => 'blog_list_read_more',
                'type'     => 'switch',
                'title'    => esc_html__( 'Hide Read More Button?', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id' => 'blog_list_meta',
                'type'     => 'switch',
                'title'    => esc_html__( 'Hide all post-meta?', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'       => 'blog_list_meta_author',
                'type'     => 'switch',
                'title'    => esc_html__( 'Hide post-meta author?', 'brainbizz' ),
                'default'  => false,
                'required' => array( 'blog_list_meta', '=', false ),
            ),
            array(
                'id'       => 'blog_list_meta_comments',
                'type'     => 'switch',
                'title'    => esc_html__( 'Hide post-meta comments?', 'brainbizz' ),
                'default'  => false,
                'required' => array( 'blog_list_meta', '=', false ),
            ),
            array(
                'id'       => 'blog_list_meta_categories',
                'type'     => 'switch',
                'title'    => esc_html__( 'Hide post-meta categories?', 'brainbizz' ),
                'default'  => false,
                'required' => array( 'blog_list_meta', '=', false ),
            ),
            array(
                'id'       => 'blog_list_meta_date',
                'type'     => 'switch',
                'title'    => esc_html__( 'Hide post-meta date?', 'brainbizz' ),
                'default'  => false,
                'required' => array( 'blog_list_meta', '=', false ),
            ),
            
        )
    ) );

    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'Single', 'brainbizz' ),
        'id'               => 'blog-single-option',
        'subsection'       => true,        
        'fields'           => array(
            array(
                'id'       => 'blog_title_conditional',
                'type'     => 'switch',
                'title'    => esc_html__( 'Blog Post Title On/Off', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id'       => 'post_single_page_title_text',
                'type'     => 'text',
                'title'    => esc_html__( 'Single Page Title Text', 'brainbizz' ),
                'default'  => esc_html__( 'Blog', 'brainbizz' ),
                'required' => array( 'blog_title_conditional', '=', true ),
            ),  
            array(
                'id'       => 'post_single_page_title_bg_image',
                'type'     => 'background',
                'background-color' => false,
                'preview_media' => true,
                'preview' => false,
                'title'    => esc_html__( 'Single Page Title Background Image', 'brainbizz' ),
                'default'  => array(
                    'background-repeat' => 'repeat',
                    'background-size' => 'cover',
                    'background-attachment' => 'scroll',
                    'background-position' => 'center center',
                    'background-color' => '#1e73be',
                )
            ),
            array(
                'id'       => 'single_type_layout',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Blog Single Type', 'brainbizz' ),
                'options'  => array(
                    '1' => esc_html__('Title First', 'brainbizz' ),
                    '2' => esc_html__('Image First', 'brainbizz' ),
                    '3' => esc_html__('Overlay Image', 'brainbizz' )
                ),
                'default'  => '3'
            ), 
            array(
                'id'       => 'single_padding_layout_3',
                'type'     => 'spacing',
                // An array of CSS selectors to apply this font style to
                'mode'     => 'padding',
                'all'      => false,
                'bottom'   => true,
                'top'   => true,
                'left'   => false,
                'right'   => false,
                'title'    => esc_html__( 'Page Title Padding', 'brainbizz' ),
                'default'  => array(
                    'padding-top' => '100px',              
                    'padding-bottom' => '30px',
                ),
                'required' => array( 'single_type_layout', '=', '3' ),
            ),
            array(
                'id'       => 'single_apply_animation',
                'type'     => 'switch',
                'title'    => esc_html__( 'Apply Animation?', 'brainbizz' ),
                'default'  => true,
                'required' => array( 'single_type_layout', '=', '3' ),
            ),           
            array(
                'id'       => 'single_sidebar_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Blog Single Sidebar Layout', 'brainbizz' ),
                'options'  => array(
                    'none' => array(
                        'alt' => 'None',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/1col.png'
                    ),
                    'left' => array(
                        'alt' => 'Left',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/2cl.png'
                    ),
                    'right' => array(
                        'alt' => 'Right',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/2cr.png'
                    )
                ),
                'default'  => 'none'
            ),
            array(
                'id'       => 'single_sidebar_def',
                'type'     => 'select',
                'title'    => esc_html__( 'Blog Single Sidebar', 'brainbizz' ),
                'data'     => 'sidebars',
                'required' => array( 'single_sidebar_layout', '!=', 'none' ),
            ),  
            array(
                'id'       => 'single_sidebar_def_width',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Blog Single Sidebar Width', 'brainbizz' ),
                'options'  => array(
                    '9' => '25%',
                    '8' => '33%',
                ),
                'default'  => '9',
                'required' => array( 'single_sidebar_layout', '!=', 'none' ),
            ),
            array(
                'id'       => 'single_sidebar_sticky',
                'type'     => 'switch',
                'title'    => esc_html__( 'Blog Single Sticky Sidebar On?', 'brainbizz' ),
                'default'  => false,
                'required' => array( 'single_sidebar_layout', '!=', 'none' ),
            ),         
            array(
                'id'       => 'single_sidebar_gap',
                'type'     => 'select',
                'title'    => esc_html__( 'Blog Single Sidebar Side Gap', 'brainbizz' ),
                'options'  => array(
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
                'default'  => 'def',
                'required' => array( 'single_sidebar_layout', '!=', 'none' ),
            ),
            array(
                'id'       => 'single_related_posts',
                'type'     => 'switch',
                'title'    => esc_html__( 'Related Posts', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id'       => 'single_likes',
                'type'     => 'switch',
                'title'    => esc_html__( 'Likes On/Off', 'brainbizz' ),
                'default'  => false,
            ),            
            array(
                'id'       => 'single_views',
                'type'     => 'switch',
                'title'    => esc_html__( 'Views On/Off', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'       => 'single_share',
                'type'     => 'switch',
                'title'    => esc_html__( 'Share On/Off', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'       => 'single_author_info',
                'type'     => 'switch',
                'title'    => esc_html__( 'Author Info On/Off', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id' => 'single_meta',
                'type'     => 'switch',
                'title'    => esc_html__( 'Hide all post-meta?', 'brainbizz' ),
                'default'  => false,
            ),
            array(
                'id'       => 'single_meta_author',
                'type'     => 'switch',
                'title'    => esc_html__( 'Hide post-meta author?', 'brainbizz' ),
                'default'  => false,
                'required' => array( 'single_meta', '=', false ),
            ),
            array(
                'id'       => 'single_meta_comments',
                'type'     => 'switch',
                'title'    => esc_html__( 'Hide post-meta comments?', 'brainbizz' ),
                'default'  => false,
                'required' => array( 'single_meta', '=', false ),
            ),
            array(
                'id'       => 'single_meta_categories',
                'type'     => 'switch',
                'title'    => esc_html__( 'Hide post-meta categories?', 'brainbizz' ),
                'default'  => false,
                'required' => array( 'single_meta', '=', false ),
            ),
            array(
                'id'       => 'single_meta_date',
                'type'     => 'switch',
                'title'    => esc_html__( 'Hide post-meta date?', 'brainbizz' ),
                'default'  => false,
                'required' => array( 'single_meta', '=', false ),
            ),
            array(
                'id'       => 'single_meta_tags',
                'type'     => 'switch',
                'title'    => esc_html__( 'Hide tags?', 'brainbizz' ),
                'default'  => false,
            ),
            
        )
    ) );     
    
    // -> START Portfolio Options
    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__('Portfolio', 'brainbizz' ),
        'id'               => 'portfolio-option',        
        'icon' => 'el-icon-th',
    ) );

    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'Archive', 'brainbizz' ),
        'id'               => 'portfolio-list-option',
        'subsection'       => true,        
        'fields'           => array(
            array(
                'id'       => 'portfolio_archive_page_title_bg_image',
                'type'     => 'background',
                'background-color' => false,
                'preview_media' => true,
                'preview' => false,
                'title'    => esc_html__( 'Archive Page Title Background Image', 'brainbizz' ),
                'default'  => array(
                    'background-repeat' => 'repeat',
                    'background-size' => 'cover',
                    'background-attachment' => 'scroll',
                    'background-position' => 'center center',
                    'background-color' => '#1e73be',
                )
            ),
            array(
                'id'       => 'portfolio_list_sidebar_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Portfolio Archive Sidebar Layout', 'brainbizz' ),
                'options'  => array(
                    'none' => array(
                        'alt' => 'None',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/1col.png'
                    ),
                    'left' => array(
                        'alt' => 'Left',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/2cl.png'
                    ),
                    'right' => array(
                        'alt' => 'Right',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/2cr.png'
                    )
                ),
                'default'  => 'none'
            ),
            array(
                'id'       => 'portfolio_list_sidebar_def',
                'type'     => 'select',
                'title'    => esc_html__( 'Portfolio Archive Sidebar', 'brainbizz' ),
                'data'     => 'sidebars',
                'required' => array( 'portfolio_list_sidebar_layout', '!=', 'none' ),
            ),
            array(
                'id'       => 'portfolio_list_columns',
                'type'     => 'button_set',
                'title'    => esc_html__('Columns in Archive', 'brainbizz'),
                'options' => array(
                    '1' => 'One', 
                    '2' => 'Two', 
                    '3' => 'Three',
                    '4' => 'Four'
                 ), 
                'default' => '3'
            ),
            array(
                'id'       => 'portfolio_slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Portfolio Slug', 'brainbizz' ),
                'default'  => 'portfolio',
            ),  
            array(
                'id'       => 'portfolio_list_show_filter',
                'type'     => 'switch',
                'title'    => esc_html__( 'Filter On/Off', 'brainbizz' ),
                'default'  => false,
            ),  

            array(
                'id'    => 'portfolio_list_filter_cats',
                'type'  => 'select',
                'multi'    => true,
                'title' => esc_html__( 'Select Categories', 'brainbizz' ), 
                'data'  => 'terms',
                'args' => array('taxonomies'=>'portfolio-category'),
                'required' => array( 'portfolio_list_show_filter', '=', '1' ),
            ),

            array(
                'id'       => 'portfolio_list_show_title',
                'type'     => 'switch',
                'title'    => esc_html__( 'Title On/Off', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id'       => 'portfolio_list_show_content',
                'type'     => 'switch',
                'title'    => esc_html__( 'Content On/Off', 'brainbizz' ),
                'default'  => false,
            ),            
            array(
                'id'       => 'portfolio_list_show_cat',
                'type'     => 'switch',
                'title'    => esc_html__( 'Categories On/Off', 'brainbizz' ),
                'default'  => true,
            ),           
        )
    ) );

    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'Single', 'brainbizz' ),
        'id'               => 'portfolio-single-option',
        'subsection'       => true,        
        'fields'           => array(
            array(
                'id'       => 'portfolio_title_conditional',
                'type'     => 'switch',
                'title'    => esc_html__( 'Portfolio Post Title On/Off', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id'       => 'portfolio_single_page_title_text',
                'type'     => 'text',
                'title'    => esc_html__( 'Single Page Title Text', 'brainbizz' ),
                'default'  => esc_html__( 'Portfolio', 'brainbizz' ),
                'required' => array( 'portfolio_title_conditional', '=', true ),
            ), 
            array(
                'id'       => 'portfolio_single_page_title_bg_image',
                'type'     => 'background',
                'background-color' => false,
                'preview_media' => true,
                'preview' => false,
                'title'    => esc_html__( 'Single Page Title Background Image', 'brainbizz' ),
                'default'  => array(
                    'background-repeat' => 'repeat',
                    'background-size' => 'cover',
                    'background-attachment' => 'scroll',
                    'background-position' => 'center center',
                    'background-color' => '#1e73be',
                )
            ),
            array(
                'id'       => 'portfolio_single_sidebar_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Portfolio Single Sidebar Layout', 'brainbizz' ),
                'options'  => array(
                    'none' => array(
                        'alt' => 'None',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/1col.png'
                    ),
                    'left' => array(
                        'alt' => 'Left',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/2cl.png'
                    ),
                    'right' => array(
                        'alt' => 'Right',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/2cr.png'
                    )
                ),
                'default'  => 'none'
            ),
            array(
                'id'       => 'portfolio_single_sidebar_def',
                'type'     => 'select',
                'title'    => esc_html__( 'Portfolio Single Sidebar', 'brainbizz' ),
                'data'     => 'sidebars',
                'required' => array( 'portfolio_single_sidebar_layout', '!=', 'none' ),
            ),  
            array(
                'id'       => 'portfolio_single_sidebar_def_width',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Portfolio Single Sidebar Width', 'brainbizz' ),
                'options'  => array(
                    '9' => '25%',
                    '8' => '33%',     
                ),
                'default'  => '8',
                'required' => array( 'portfolio_single_sidebar_layout', '!=', 'none' ),
            ),
            array(
                'id'       => 'portfolio_single_sidebar_sticky',
                'type'     => 'switch',
                'title'    => esc_html__( 'Portfolio Single Sticky Sidebar On?', 'brainbizz' ),
                'default'  => false,
                'required' => array( 'portfolio_single_sidebar_layout', '!=', 'none' ),
            ),         
            array(
                'id'       => 'portfolio_single_sidebar_gap',
                'type'     => 'select',
                'title'    => esc_html__( 'Portfolio Single Sidebar Side Gap', 'brainbizz' ),
                'options'  => array(
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
                'default'  => 'def',
                'required' => array( 'portfolio_single_sidebar_layout', '!=', 'none' ),
            ),
            array(
                'id'       => 'portfolio_rel_columns',
                'type'     => 'button_set',
                'title'    => esc_html__('Related Columns', 'brainbizz'),
                'options' => array(
                    '2' => 'Two', 
                    '3' => 'Three',
                    '4' => 'Four'
                 ), 
                'default' => '3'
            ),
            array(
                'id'       => 'portfolio_single_related_posts',
                'type'     => 'switch',
                'title'    => esc_html__( 'Related Posts On/Off', 'brainbizz' ),
                'default'  => true,
            ),           
            array(
                'id'       => 'portfolio_above_content_cats',
                'type'     => 'switch',
                'title'    => esc_html__( 'Tags On/Off', 'brainbizz' ),
                'default'  => true,
            ),           
            array(
                'id'       => 'portfolio_above_content_share',
                'type'     => 'switch',
                'title'    => esc_html__( 'Share On/Off', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id'       => 'portfolio_single_meta_likes',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post-meta likes On/Off', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id' => 'portfolio_single_meta',
                'type'     => 'switch',
                'title'    => esc_html__( 'Hide all post-meta?', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id'       => 'portfolio_single_meta_author',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post-meta author On/Off', 'brainbizz' ),
                'default'  => true,
                'required' => array( 'portfolio_single_meta', '=', false ),
            ),
            array(
                'id'       => 'portfolio_single_meta_comments',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post-meta comments On/Off', 'brainbizz' ),
                'default'  => true,
                'required' => array( 'portfolio_single_meta', '=', false ),
            ),
            array(
                'id'       => 'portfolio_single_meta_categories',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post-meta categories On/Off', 'brainbizz' ),
                'default'  => true,
                'required' => array( 'portfolio_single_meta', '=', false ),
            ),
            array(
                'id'       => 'portfolio_single_meta_date',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post-meta date On/Off', 'brainbizz' ),
                'default'  => true,
                'required' => array( 'portfolio_single_meta', '=', false ),
            ),
        )
    ) );   

    // -> START Team Options
    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__('Team', 'brainbizz' ),
        'id'               => 'team-option',        
        'icon' => 'el-icon-th',
        'fields'           => array(
            array(
                'id'       => 'team_slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Team Slug', 'brainbizz' ),
                'default'  => 'team',
            ), 
            array(
                'id'       => 'team_single_page_title_bg_image',
                'type'     => 'background',
                'background-color' => false,
                'preview_media' => true,
                'preview' => false,
                'title'    => esc_html__( 'Single Page Title Background Image', 'brainbizz' ),
                'default'  => array(
                    'background-repeat' => 'repeat',
                    'background-size' => 'cover',
                    'background-attachment' => 'scroll',
                    'background-position' => 'center center',
                    'background-color' => '#1e73be',
                )
            ),          
        )
    ) ); 

    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'Single', 'brainbizz' ),
        'id'               => 'team-single-option',
        'subsection'       => true,        
        'fields'           => array(
            array(
                'id'       => 'team_title_conditional',
                'type'     => 'switch',
                'title'    => esc_html__( 'Team Post Title On/Off', 'brainbizz' ),
                'default'  => true,
            ),
            array(
                'id'       => 'team_single_page_title_text',
                'type'     => 'text',
                'title'    => esc_html__( 'Single Page Title Text', 'brainbizz' ),
                'default'  => esc_html__( 'Team', 'brainbizz' ),
                'required' => array( 'team_title_conditional', '=', true ),
            ), 
        )
    ) );   

    // -> START Page 404 Options
    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__('Page 404', 'brainbizz' ),
        'id'               => '404-option',        
        'icon' => 'el-icon-th',
        'fields'           => array(        
            array(
                'id'       => '404_page_title_bg_image',
                'type'     => 'background',
                'background-color' => false,
                'preview_media' => true,
                'preview' => false,
                'title'    => esc_html__( '404 Page Title Background Image', 'brainbizz' ),
                'default'  => array(
                    'background-repeat' => 'repeat',
                    'background-size' => 'cover',
                    'background-attachment' => 'scroll',
                    'background-position' => 'center center',
                    'background-color' => '#1e73be',
                )
            ),          
        )
    ) ); 

    // -> START Layout Options
    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__('Sidebars', 'brainbizz' ),
        'id'               => 'layout_options',        
        'icon' => 'el el-braille',
        'fields'           => array(
            array(
                'id'=>'sidebars', 
                'type' => 'multi_text',
                'validate' => 'no_html',
                'add_text' => esc_html__('Add Sidebar', 'brainbizz' ),
                'title' => esc_html__('Register Sidebars', 'brainbizz' ),
                'default' => array('Main Sidebar'),
            ),
            array(
                'id'       => 'sidebars-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Sidebar Page Settings', 'brainbizz' ),
                'indent'   => true,
            ),
            array(
                'id'       => 'page_sidebar_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Page Sidebar Layout', 'brainbizz' ),
                'options'  => array(
                    'none' => array(
                        'alt' => 'None',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/1col.png'
                    ),
                    'left' => array(
                        'alt' => 'Left',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/2cl.png'
                    ),
                    'right' => array(
                        'alt' => 'Right',
                        'img' => get_template_directory_uri() . '/core/admin/img/options/2cr.png'
                    )
                ),
                'default'  => 'none'
            ),
            array(
                'id'       => 'page_sidebar_def',
                'type'     => 'select',
                'title'    => esc_html__( 'Page Sidebar', 'brainbizz' ),
                'data'     => 'sidebars',
                'required' => array( 'page_sidebar_layout', '!=', 'none' ),
            ),          
            array(
                'id'       => 'page_sidebar_def_width',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Page Sidebar Width', 'brainbizz' ),
                'options'  => array(
                    '9' => '25%',
                    '8' => '33%',     
                ),
                'default'  => '9',
                'required' => array( 'page_sidebar_layout', '!=', 'none' ),
            ),
            array(
                'id'       => 'page_sidebar_sticky',
                'type'     => 'switch',
                'title'    => esc_html__( 'Sticky Sidebar On?', 'brainbizz' ),
                'default'  => false,
                'required' => array( 'page_sidebar_layout', '!=', 'none' ),
            ),         
            array(
                'id'       => 'page_sidebar_gap',
                'type'     => 'select',
                'title'    => esc_html__( 'Sidebar Side Gap', 'brainbizz' ),
                'options'  => array(
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
                'default'  => 'def',
                'required' => array( 'page_sidebar_layout', '!=', 'none' ),
            ),
            array(
                'id'       => 'sidebars-end',
                'type'     => 'section',
                'indent'   => false,
            ),
        )
    ) );

    // -> START Styling Options

    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__('Color Options', 'brainbizz' ),
        'id'               => 'color_options_color',
        'icon' => 'el-icon-tint',     
        'fields'           => array(
            array(
                'id'        => 'theme-custom-color',
                'type'      => 'color',
                'title'     => esc_html__('General Theme Color', 'brainbizz' ),
                'transparent' => false,
                'default'   => '#c10e0e',
                'validate'  => 'color',
            ),            
            array(
                'id'        => 'body-background-color',
                'type'      => 'color',
                'title'     => esc_html__('Body Background Color', 'brainbizz' ),
                'transparent' => false,
                'default'   => '#ffffff',
                'validate'  => 'color',
            ),
        )
    ));

    // Start Typography config
    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'Typography', 'brainbizz' ),
        'id'               => 'Typography',
        'icon' => 'el-icon-font', // Icon for section      
    ) );

    $typography = array();
    $main_typography = array(
        array(
            'id' => 'main-font',
            'title' => esc_html__('Content Font', 'brainbizz' ),
            'color' => true,
            'line-height' => true,
            'font-size' => true,
            'subsets' => true,
            'defs' => array(
                'font-size' => '16px',
                'line-height' => '30px',
                'color' => '#616161',
                'font-family' => 'Open Sans',
                'font-weight' => '400',
            ),
        ),
        array(
            'id' => 'header-font',
            'title' => esc_html__('Headings Main Settings', 'brainbizz' ),
            'font-size' => false,
            'line-height' => false,
            'color' => true,
            'subsets' => false,
            'defs' => array(
                'color' => '#151515',
                'google' => true,
                'font-family' => 'Prata',
                'font-weight' => '400',
            ),
        ),
        array(
            'id' => 'subtitle-font',
            'title' => esc_html__('Secondary Font', 'brainbizz' ),
            'subtitle'     => esc_html__( 'Typography settings for the meta infomation, sub-title', 'brainbizz' ),
            'font-size' => false,
            'line-height' => false,
            'color' => false,
            'subsets' => false,
            'defs' => array(
                'google' => true,
                'font-family' => 'Montserrat',
            ),
        ),        
    );
    foreach ($main_typography as $key => $value) {
        array_push($typography , array(
            'id'          => $value['id'],
            'type'        => 'typography',
            'title'       => $value['title'],
            'color' => $value['color'],
            'line-height' => $value['line-height'],
            'font-size' => $value['font-size'],
            'subsets' => $value['subsets'],
            'subtitle' => isset($value['subtitle']) ? $value['subtitle'] : '',
            'google' => true,
            'font-style'    => true,
            'font-backup' => false,
            'text-align' => false,
            'all_styles'  => true,
            'default'     => $value['defs'],
        ));
    }
    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'Main Content', 'brainbizz' ),
        'id'               => 'main_typography',
        //'icon' => 'el-icon-font', // Icon for section 
        'subsection'       => true,
        'fields'           => $typography
    ) );

    // Start menu typography
    $menu_typography = array(
        array(
            'id'          => 'menu-font',
            'title'       => esc_html__( 'Menu Font', 'brainbizz' ),
            'color' => false,
            'line-height' => true,
            'font-size' => true,
            'subsets' => true,
            'defs'     => array(
                'font-family' => 'Montserrat',
                'google'      => true,
                'font-size'   => '14px',
                'font-weight' => '600',
                'line-height' => '30px'
            ),
        ),
        array(
            'id'          => 'sub-menu-font',
            'title'       => esc_html__( 'Submenu Font', 'brainbizz' ),
            'color' => false,
            'line-height' => true,
            'font-size' => true,
            'subsets' => true,
            'defs'     => array(
                'font-family' => 'Montserrat',
                'google'      => true,
                'font-size'   => '16px',
                'font-weight' => '500',
                'line-height' => '30px'
            ),
        ),
    );
    $menu_typography_array = array();
    foreach ($menu_typography as $key => $value) {
        array_push($menu_typography_array , array(
            'id'          => $value['id'],
            'type'        => 'typography',
            'title'       => $value['title'],
            'color' => $value['color'],
            'line-height' => $value['line-height'],
            'font-size' => $value['font-size'],
            'subsets' => $value['subsets'],
            'google' => true,
            'font-style'    => true,
            'font-backup' => false,
            'text-align' => false,
            'all_styles'  => true,
            'default'     => $value['defs'],
        ));
    }
    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__( 'Menu', 'brainbizz' ),
        'id'               => 'main_menu_typography',
        //'icon' => 'el-icon-font', // Icon for section 
        'subsection'       => true,
        'fields'           => $menu_typography_array
    ) );
    // End menu Typography

    // Start headings typography
    $headings = array(
        array(
            'id' => 'header-h1',
            'title' => esc_html__('H1', 'brainbizz' ),
            'defs' => array(
                'font-family' => 'Prata',
                'font-size' => '48px',
                'font-weight' => '400',
                'line-height' => '60px',
            ),
        ),
        array(
            'id' => 'header-h2',
            'title' => esc_html__('H2', 'brainbizz' ),
            'defs' => array(
                'font-family' => 'Prata',
                'font-weight' => '400',
                'font-size' => '36px',
                'line-height' => '52px',
            ),
        ),
        array(
            'id' => 'header-h3',
            'title' => esc_html__('H3', 'brainbizz' ),
            'defs' => array(
                'font-family' => 'Prata',
                'font-weight' => '400',
                'font-size' => '30px',
                'line-height' => '48px',
            ),
        ),
        array(
            'id' => 'header-h4',
            'title' => esc_html__('H4', 'brainbizz' ),
            'defs' => array(
                'font-family' => 'Prata',
                'font-weight' => '400',
                'font-size' => '24px',
                'line-height' => '42px',
            ),
        ),
        array(
            'id' => 'header-h5',
            'title' => esc_html__('H5', 'brainbizz' ),
            'defs' => array(
                'font-size' => '22px',
                'line-height' => '36px',
                'font-family' => 'Prata',
                'font-weight' => '400'
            ),
        ),
        array(
            'id' => 'header-h6',
            'title' => esc_html__('H6', 'brainbizz' ),
            'defs' => array(
                'font-size' => '18px',
                'line-height' => '36px',
                'font-family' => 'Prata',
                'font-weight' => '400',
            ),
        ),
    );
    $headings_array = array();
    foreach ($headings as $key => $heading) {
        array_push($headings_array , array(
            'id' => $heading['id'],
            'type' => 'typography',
            'title' => $heading['title'],
            'google' => true,
            'font-backup' => false,
            'font-size' => true,
            'line-height' => true,
            'color' => false,
            'word-spacing' => false,
            'letter-spacing' => true,
            'text-align' => false,
            'text-transform' => true,
            'default' => $heading['defs'],
        ));
    }

    // Typogrophy section
    Redux::setSection( $theme_slug, array(
        'title'            => esc_html__('Headings', 'brainbizz' ),
        'id'               => 'main_headings_typography',
        //'icon' => 'el-icon-font', // Icon for section 
        'subsection'       => true,
        'fields'           => $headings_array
    ) );
    // End Typography config

    if ( class_exists( 'WooCommerce' ) )  {
        Redux::setSection( $theme_slug, array(
            'title'            => esc_html__('Shop', 'brainbizz' ),
            'id'               => 'shop-option',            
            'icon' => 'el-icon-shopping-cart',
            'fields'           => array(                                                        
            )
        ) );
        Redux::setSection( $theme_slug, array(
            'title'            => esc_html__( 'Catalog', 'brainbizz' ),
            'id'               => 'shop-catalog-option',
            'subsection'       => true,            
            'fields'           => array(
                array(
                    'id'       => 'shop_catalog_page_title_bg_image',
                    'type'     => 'background',
                    'background-color' => false,
                    'preview_media' => true,
                    'preview' => false,
                    'title'    => esc_html__( 'Catalog Page Title Background Image', 'brainbizz' ),
                    'default'  => array(
                        'background-repeat' => 'repeat',
                        'background-size' => 'cover',
                        'background-attachment' => 'scroll',
                        'background-position' => 'center center',
                        'background-color' => '#1e73be',
                    )
                ), 
                array(
                    'id'       => 'shop_catalog_sidebar_layout',
                    'type'     => 'image_select',
                    'title'    => esc_html__( 'Shop Catalog Sidebar Layout', 'brainbizz' ),
                    'options'  => array(
                        'none' => array(
                            'alt' => 'None',
                            'img' => get_template_directory_uri() . '/core/admin/img/options/1col.png'
                        ),
                        'left' => array(
                            'alt' => 'Left',
                            'img' => get_template_directory_uri() . '/core/admin/img/options/2cl.png'
                        ),
                        'right' => array(
                            'alt' => 'Right',
                            'img' => get_template_directory_uri() . '/core/admin/img/options/2cr.png'
                        )
                    ),
                    'default'  => 'left'
                ),
                array(
                    'id'       => 'shop_catalog_sidebar_def',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Shop Catalog Sidebar', 'brainbizz' ),
                    'data'     => 'sidebars',
                    'required' => array( 'shop_catalog_sidebar_layout', '!=', 'none' ),
                ),  
                array(
                    'id'       => 'shop_catalog_sidebar_def_width',
                    'type'     => 'button_set',
                    'title'    => esc_html__( 'Shop Sidebar Width', 'brainbizz' ),
                    'options'  => array(
                        '9' => '25%',
                        '8' => '33%',             
                    ),
                    'default'  => '9',
                    'required' => array( 'shop_catalog_sidebar_layout', '!=', 'none' ),
                ), 
                array(
                    'id'       => 'shop_sidebar_sticky',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Sticky Sidebar On?', 'brainbizz' ),
                    'default'  => false,
                    'required' => array( 'shop_catalog_sidebar_layout', '!=', 'none' ),
                ),         
                array(
                    'id'       => 'shop_sidebar_gap',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Sidebar Side Gap', 'brainbizz' ),
                    'options'  => array(
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
                    'default'  => 'def',
                    'required' => array( 'shop_catalog_sidebar_layout', '!=', 'none' ),
                ),
                array(
                    'id'       => 'shop_column',
                    'type'     => 'button_set',
                    'title'    => esc_html__( 'Shop Column', 'brainbizz' ),
                    'options'  => array(
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4'
                    ),
                    'default'  => '3',
                ),
                array(
                    'id'       => 'shop_products_per_page',
                    'type'     => 'spinner',
                    'title'    => esc_html__('Products per page', 'brainbizz'),
                    'default'  => '12',
                    'min'      => '1',
                    'step'     => '1',
                    'max'      => '100',
                ),  
            )
            
        ) );        
        Redux::setSection( $theme_slug, array(
            'title'            => esc_html__( 'Single', 'brainbizz' ),
            'id'               => 'shop-single-option',
            'subsection'       => true,            
            'fields'           => array(
                array(
                    'id'       => 'shop_single_page_title_bg_image',
                    'type'     => 'background',
                    'background-color' => false,
                    'preview_media' => true,
                    'preview' => false,
                    'title'    => esc_html__( 'Single Page Title Background Image', 'brainbizz' ),
                    'default'  => array(
                        'background-repeat' => 'repeat',
                        'background-size' => 'cover',
                        'background-attachment' => 'scroll',
                        'background-position' => 'center center',
                        'background-color' => '#1e73be',
                    )
                ),  
                array(
                    'id'       => 'shop_single_sidebar_layout',
                    'type'     => 'image_select',
                    'title'    => esc_html__( 'Shop Single Sidebar Layout', 'brainbizz' ),
                    'options'  => array(
                        'none' => array(
                            'alt' => 'None',
                            'img' => get_template_directory_uri() . '/core/admin/img/options/1col.png'
                        ),
                        'left' => array(
                            'alt' => 'Left',
                            'img' => get_template_directory_uri() . '/core/admin/img/options/2cl.png'
                        ),
                        'right' => array(
                            'alt' => 'Right',
                            'img' => get_template_directory_uri() . '/core/admin/img/options/2cr.png'
                        )
                    ),
                    'default'  => 'none'
                ),
                array(
                    'id'       => 'shop_single_sidebar_def',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Shop Single Sidebar', 'brainbizz' ),
                    'data'     => 'sidebars',
                    'required' => array( 'shop_single_sidebar_layout', '!=', 'none' ),
                ),  
                array(
                    'id'       => 'shop_single_sidebar_def_width',
                    'type'     => 'button_set',
                    'title'    => esc_html__( 'Shop Single Sidebar Width', 'brainbizz' ),
                    'options'  => array(
                        '9' => '25%',
                        '8' => '33%', 
                    ),
                    'default'  => '9',
                    'required' => array( 'shop_single_sidebar_layout', '!=', 'none' ),
                ),
                array(
                    'id'       => 'shop_single_sidebar_sticky',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Shop Single Sticky Sidebar On?', 'brainbizz' ),
                    'default'  => false,
                    'required' => array( 'shop_single_sidebar_layout', '!=', 'none' ),
                ),         
                array(
                    'id'       => 'shop_single_sidebar_gap',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Shop Single Sidebar Side Gap', 'brainbizz' ),
                    'options'  => array(
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
                    'default'  => 'def',
                    'required' => array( 'shop_single_sidebar_layout', '!=', 'none' ),
                ),
                array(
                    'id'       => 'shop_title_conditional',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Shop Single Post Title On/Off', 'brainbizz' ),
                    'default'  => true,
                ),
                array(
                    'id'       => 'shop_single_page_title_text',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Shop Single Page Title Text', 'brainbizz' ),
                    'default'  => esc_html__( 'Shop', 'brainbizz' ),
                    'required' => array( 'shop_title_conditional', '=', true ),
                ), 
            )
            
        ) );        
        Redux::setSection( $theme_slug, array(
            'title'            => esc_html__( 'Related', 'brainbizz' ),
            'id'               => 'shop-related-option',
            'subsection'       => true,            
            'fields'           => array(
                array(
                    'id'       => 'shop_single_related',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Shop Single Related Product On/Off', 'brainbizz' ),
                    'default'  => true,
                ),
                array(
                    'id'       => 'shop_related_columns',
                    'type'     => 'button_set',
                    'title'    => esc_html__( 'Related products column', 'brainbizz' ),
                    'options'  => array(
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4'
                    ),
                    'default'  => '4',
                    'required' => array( 'shop_single_related', '=', true ),
                ),              
                array(
                    'id'       => 'shop_r_products_per_page',
                    'type'     => 'spinner',
                    'title'    => esc_html__('Related products per page', 'brainbizz'),
                    'default'  => '4',
                    'min'      => '1',
                    'step'     => '1',
                    'max'      => '100',
                    'required' => array( 'shop_single_related', '=', true ),
                ),
            )
            
        ) );        
        Redux::setSection( $theme_slug, array(
            'title'            => esc_html__( 'Cart', 'brainbizz' ),
            'id'               => 'shop-cart-option',
            'subsection'       => true,            
            'fields'           => array(
                array(
                    'id'       => 'shop_cart_page_title_bg_image',
                    'type'     => 'background',
                    'background-color' => false,
                    'preview_media' => true,
                    'preview' => false,
                    'title'    => esc_html__( 'Cart Page Title Background Image', 'brainbizz' ),
                    'default'  => array(
                        'background-repeat' => 'repeat',
                        'background-size' => 'cover',
                        'background-attachment' => 'scroll',
                        'background-position' => 'center center',
                        'background-color' => '#1e73be',
                    )
                ), 
            )
            
        ) );        
        Redux::setSection( $theme_slug, array(
            'title'            => esc_html__( 'Checkout', 'brainbizz' ),
            'id'               => 'shop-checkout-option',
            'subsection'       => true,            
            'fields'           => array(
                array(
                    'id'       => 'shop_checkout_page_title_bg_image',
                    'type'     => 'background',
                    'background-color' => false,
                    'preview_media' => true,
                    'preview' => false,
                    'title'    => esc_html__( 'Checkout Page Title Background Image', 'brainbizz' ),
                    'default'  => array(
                        'background-repeat' => 'repeat',
                        'background-size' => 'cover',
                        'background-attachment' => 'scroll',
                        'background-position' => 'center center',
                        'background-color' => '#1e73be',
                    )
                ),  
            )
            
        ) );
    }

