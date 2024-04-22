<?php
/**
 * VW Sports Theme Customizer
 *
 * @package VW Sports
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function vw_sports_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_sports_custom_controls' );

function vw_sports_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo .site-title a',
	 	'render_callback' => 'vw_sports_Customize_partial_blogname',
	));

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => 'p.site-description',
		'render_callback' => 'vw_sports_Customize_partial_blogdescription',
	));

	$vw_sports_parent_panel = new VW_Sports_WP_Customize_Panel( $wp_customize, 'vw_sports_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title'      => esc_html__( 'VW Settings', 'vw-sports' ),
		'priority' => 10,
	));

	//Homepage Settings
	$wp_customize->add_panel( 'vw_sports_homepage_panel', array(
		'title' => esc_html__( 'Homepage Settings', 'vw-sports' ),
		'panel' => 'vw_sports_panel_id',
		'priority' => 20,
	));

	//Menus Settings
	$wp_customize->add_section( 'vw_sports_menu_section' , array(
    	'title' => __( 'Menus Settings', 'vw-sports' ),
		'panel' => 'vw_sports_homepage_panel'
	) );

	$wp_customize->add_setting( 'vw_sports_header_search',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));
    $wp_customize->add_control( new vw_sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_header_search',array(
      	'label' => esc_html__( 'Show / Hide Search','vw-sports' ),
      	'section' => 'vw_sports_menu_section'
    )));

 	// Header Background color
	$wp_customize->add_setting('vw_sports_header_background_color', array(
		'default'           => '#ff6c26',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_sports_header_background_color', array(
		'label'    => __('Header Background Color', 'vw-sports'),
		'section'  => 'vw_sports_menu_section',
	)));

	$wp_customize->add_setting('vw_sports_header_img_position',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_header_img_position',array(
		'type' => 'select',
		'label' => __('Header Image Position','vw-sports'),
		'section' => 'vw_sports_menu_section',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-sports' ),
			'center top'   => esc_html__( 'Top', 'vw-sports' ),
			'right top'   => esc_html__( 'Top Right', 'vw-sports' ),
			'left center'   => esc_html__( 'Left', 'vw-sports' ),
			'center center'   => esc_html__( 'Center', 'vw-sports' ),
			'right center'   => esc_html__( 'Right', 'vw-sports' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-sports' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-sports' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-sports' ),
		),
	));

    $wp_customize->add_setting('vw_sports_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_navigation_menu_font_weight',array(
        'default' => 500,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','vw-sports'),
        'section' => 'vw_sports_menu_section',
        'choices' => array(
        	'100' => __('100','vw-sports'),
            '200' => __('200','vw-sports'),
            '300' => __('300','vw-sports'),
            '400' => __('400','vw-sports'),
            '500' => __('500','vw-sports'),
            '600' => __('600','vw-sports'),
            '700' => __('700','vw-sports'),
            '800' => __('800','vw-sports'),
            '900' => __('900','vw-sports'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('vw_sports_menu_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menus Text Transform','vw-sports'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-sports'),
            'Capitalize' => __('Capitalize','vw-sports'),
            'Lowercase' => __('Lowercase','vw-sports'),
        ),
		'section'=> 'vw_sports_menu_section',
	));

	$wp_customize->add_setting('vw_sports_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_menus_item_style',array(
        'type' => 'select',
        'section' => 'vw_sports_menu_section',
		'label' => __('Menu Item Hover Style','vw-sports'),
		'choices' => array(
            'None' => __('None','vw-sports'),
            'Zoom In' => __('Zoom In','vw-sports'),
        ),
	) );

	$wp_customize->add_setting('vw_sports_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_sports_header_menus_color', array(
		'label'    => __('Menus Color', 'vw-sports'),
		'section'  => 'vw_sports_menu_section',
	)));

	$wp_customize->add_setting('vw_sports_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_sports_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'vw-sports'),
		'section'  => 'vw_sports_menu_section',
	)));

	$wp_customize->add_setting('vw_sports_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_sports_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'vw-sports'),
		'section'  => 'vw_sports_menu_section',
	)));

	$wp_customize->add_setting('vw_sports_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_sports_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'vw-sports'),
		'section'  => 'vw_sports_menu_section',
	)));

	//Slider
	$wp_customize->add_section( 'vw_sports_slidersettings' , array(
    	'title' => esc_html__( 'Slider Settings', 'vw-sports' ),
    	'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/wordpress-sports-theme/">GET PRO</a>','vw-sports'),
		'panel' => 'vw_sports_homepage_panel'
	) );

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_sports_slider_arrows',array(
		'selector'        => '#slider .carousel-caption h1',
		'render_callback' => 'vw_sports_Customize_partial_vw_sports_slider_arrows',
	));

	$wp_customize->add_setting( 'vw_sports_slider_arrows',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','vw-sports' ),
      	'section' => 'vw_sports_slidersettings'
    )));

    $wp_customize->add_setting('vw_sports_slider_type',array(
        'default' => 'Default slider',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	) );
	$wp_customize->add_control('vw_sports_slider_type', array(
        'type' => 'select',
        'label' => __('Slider Type','vw-sports'),
        'section' => 'vw_sports_slidersettings',
        'choices' => array(
            'Default slider' => __('Default slider','vw-sports'),
            'Advance slider' => __('Advance slider','vw-sports'),
        ),
	));

	$wp_customize->add_setting('vw_sports_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','vw-sports'),
		'section'=> 'vw_sports_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_sports_advance_slider'
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'vw_sports_slider_page' . $count, array(
			'default'  => '',
			'sanitize_callback' => 'vw_sports_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_sports_slider_page' . $count, array(
			'label'    => esc_html__( 'Select Slider Page', 'vw-sports' ),
			'description' => esc_html__('Slider image size (1600 x 650)','vw-sports'),
			'section'  => 'vw_sports_slidersettings',
			'type'     => 'dropdown-pages',
			'active_callback' => 'vw_sports_default_slider'
		) );
	}

	$wp_customize->add_setting( 'vw_sports_slider_title_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_slider_title_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Title','vw-sports' ),
		'section' => 'vw_sports_slidersettings',
    	'active_callback' => 'vw_sports_default_slider'
	)));

	$wp_customize->add_setting( 'vw_sports_slider_content_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_slider_content_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Content','vw-sports' ),
		'section' => 'vw_sports_slidersettings',
    	'active_callback' => 'vw_sports_default_slider'
	)));

	//content layout
	$wp_customize->add_setting('vw_sports_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Sports_Image_Radio_Control($wp_customize, 'vw_sports_slider_content_option', array(
        'type' => 'select',
        'label' => esc_html__('Slider Content Layouts','vw-sports'),
        'section' => 'vw_sports_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    	),
        'active_callback' => 'vw_sports_default_slider'
	)));

     //Slider content padding
    $wp_customize->add_setting('vw_sports_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','vw-sports'),
		'description'	=> __('Enter a value in %. Example:20%','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_sports_default_slider'
	));

	$wp_customize->add_setting('vw_sports_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','vw-sports'),
		'description'	=> __('Enter a value in %. Example:20%','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_sports_default_slider'
	));

    $wp_customize->add_setting( 'vw_sports_slider_excerpt_number', array(
		'default'              => 45,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_sports_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_sports_slider_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-sports' ),
		'section'     => 'vw_sports_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_sports_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
		'active_callback' => 'vw_sports_default_slider'
	) );

	$wp_customize->add_setting('vw_sports_slider_button_text',array(
		'default'=> esc_html__('Read More','vw-sports'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_slider_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-sports'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_sports_default_slider'
	));

	$wp_customize->add_setting('vw_sports_slider_button_link',array(
        'default'=> '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('vw_sports_slider_button_link',array(
        'label' => esc_html__('Add Slider Button Link','vw-sports'),
        'section'=> 'vw_sports_slidersettings',
        'type'=> 'url'
    ));

	//Opacity
	$wp_customize->add_setting('vw_sports_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_sports_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_sports_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','vw-sports' ),
		'section'     => 'vw_sports_slidersettings',
		'type'        => 'select',
		'settings'    => 'vw_sports_slider_opacity_color',
		'choices' => array(
	      '0' =>  esc_attr('0','vw-sports'),
	      '0.1' =>  esc_attr('0.1','vw-sports'),
	      '0.2' =>  esc_attr('0.2','vw-sports'),
	      '0.3' =>  esc_attr('0.3','vw-sports'),
	      '0.4' =>  esc_attr('0.4','vw-sports'),
	      '0.5' =>  esc_attr('0.5','vw-sports'),
	      '0.6' =>  esc_attr('0.6','vw-sports'),
	      '0.7' =>  esc_attr('0.7','vw-sports'),
	      '0.8' =>  esc_attr('0.8','vw-sports'),
	      '0.9' =>  esc_attr('0.9','vw-sports')
	),'active_callback' => 'vw_sports_default_slider'
	));

	$wp_customize->add_setting( 'vw_sports_slider_image_overlay',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_slider_image_overlay',array(
      	'label' => esc_html__( 'Show / Hide Slider Image Overlay','vw-sports' ),
      	'section' => 'vw_sports_slidersettings',
      	'active_callback' => 'vw_sports_default_slider'
    )));

    $wp_customize->add_setting('vw_sports_slider_image_overlay_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_sports_slider_image_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'vw-sports'),
		'section'  => 'vw_sports_slidersettings',
		'active_callback' => 'vw_sports_default_slider'
	)));

	//latest results Section
	$wp_customize->add_section('vw_sports_landscaping_latest_results', array(
		'title'       => __('Latest Results Section', 'vw-sports'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-sports'),
		'priority'    => null,
		'panel'       => 'vw_sports_homepage_panel',
	));

	$wp_customize->add_setting('vw_sports_landscaping_latest_results_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_latest_results_text',array(
		'description' => __('<p>1. More options for latest results section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for latest results section.</p>','vw-sports'),
		'section'=> 'vw_sports_landscaping_latest_results',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_sports_landscaping_latest_results_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_latest_results_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_sports_guide') ." '>More Info</a>",
		'section'=> 'vw_sports_landscaping_latest_results',
		'type'=> 'hidden'
	));

	//records Section
	$wp_customize->add_section('vw_sports_landscaping_records', array(
		'title'       => __('Records Section', 'vw-sports'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-sports'),
		'priority'    => null,
		'panel'       => 'vw_sports_homepage_panel',
	));

	$wp_customize->add_setting('vw_sports_landscaping_records_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_records_text',array(
		'description' => __('<p>1. More options for records section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for records section.</p>','vw-sports'),
		'section'=> 'vw_sports_landscaping_records',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_sports_landscaping_records_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_records_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_sports_guide') ." '>More Info</a>",
		'section'=> 'vw_sports_landscaping_records',
		'type'=> 'hidden'
	));

	//about us Section
	$wp_customize->add_section('vw_sports_landscaping_about_us', array(
		'title'       => __('About Us Results Section', 'vw-sports'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-sports'),
		'priority'    => null,
		'panel'       => 'vw_sports_homepage_panel',
	));

	$wp_customize->add_setting('vw_sports_landscaping_about_us_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_about_us_text',array(
		'description' => __('<p>1. More options for about us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for latest about us section.</p>','vw-sports'),
		'section'=> 'vw_sports_landscaping_about_us',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_sports_landscaping_about_us_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_about_us_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_sports_guide') ." '>More Info</a>",
		'section'=> 'vw_sports_landscaping_about_us',
		'type'=> 'hidden'
	));

	//team coach Section
	$wp_customize->add_section('vw_sports_landscaping_team_coach', array(
		'title'       => __('Team Coach Section', 'vw-sports'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-sports'),
		'priority'    => null,
		'panel'       => 'vw_sports_homepage_panel',
	));

	$wp_customize->add_setting('vw_sports_landscaping_team_coach_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_team_coach_text',array(
		'description' => __('<p>1. More options for latest results section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for latest results section.</p>','vw-sports'),
		'section'=> 'vw_sports_landscaping_team_coach',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_sports_landscaping_team_coach_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_team_coach_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_sports_guide') ." '>More Info</a>",
		'section'=> 'vw_sports_landscaping_team_coach',
		'type'=> 'hidden'
	));

	//winning awards Section
	$wp_customize->add_section('vw_sports_landscaping_winning_awards', array(
		'title'       => __('Winning Awards Section', 'vw-sports'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-sports'),
		'priority'    => null,
		'panel'       => 'vw_sports_homepage_panel',
	));

	$wp_customize->add_setting('vw_sports_landscaping_winning_awards_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_winning_awards_text',array(
		'description' => __('<p>1. More options for winning awards section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for winning awards section.</p>','vw-sports'),
		'section'=> 'vw_sports_landscaping_winning_awards',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_sports_landscaping_winning_awards_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_winning_awards_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_sports_guide') ." '>More Info</a>",
		'section'=> 'vw_sports_landscaping_winning_awards',
		'type'=> 'hidden'
	));

	//upcoming match Section
	$wp_customize->add_section('vw_sports_landscaping_upcoming_match', array(
		'title'       => __('Team Coach Section', 'vw-sports'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-sports'),
		'priority'    => null,
		'panel'       => 'vw_sports_homepage_panel',
	));

	$wp_customize->add_setting('vw_sports_landscaping_upcoming_match_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_upcoming_match_text',array(
		'description' => __('<p>1. More options for upcoming match section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for upcoming match section.</p>','vw-sports'),
		'section'=> 'vw_sports_landscaping_upcoming_match',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_sports_landscaping_upcoming_match_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_upcoming_match_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_sports_guide') ." '>More Info</a>",
		'section'=> 'vw_sports_landscaping_upcoming_match',
		'type'=> 'hidden'
	));

	//our team Section
	$wp_customize->add_section('vw_sports_landscaping_our_team', array(
		'title'       => __('Our Team Section', 'vw-sports'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-sports'),
		'priority'    => null,
		'panel'       => 'vw_sports_homepage_panel',
	));

	$wp_customize->add_setting('vw_sports_landscaping_our_team_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_our_team_text',array(
		'description' => __('<p>1. More options for our team section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our team section.</p>','vw-sports'),
		'section'=> 'vw_sports_landscaping_our_team',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_sports_landscaping_our_team_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_our_team_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_sports_guide') ." '>More Info</a>",
		'section'=> 'vw_sports_landscaping_our_team',
		'type'=> 'hidden'
	));

	//our leaderboard Section
	$wp_customize->add_section('vw_sports_landscaping_our_leaderboard', array(
		'title'       => __('Leaderboard Section', 'vw-sports'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-sports'),
		'priority'    => null,
		'panel'       => 'vw_sports_homepage_panel',
	));

	$wp_customize->add_setting('vw_sports_landscaping_our_leaderboard_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_our_leaderboard_text',array(
		'description' => __('<p>1. More options for latest results section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for latest results section.</p>','vw-sports'),
		'section'=> 'vw_sports_landscaping_our_leaderboard',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_sports_landscaping_our_leaderboard_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_our_leaderboard_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_sports_guide') ." '>More Info</a>",
		'section'=> 'vw_sports_landscaping_our_leaderboard',
		'type'=> 'hidden'
	));

	//video slider Section
	$wp_customize->add_section('vw_sports_landscaping_video_slider', array(
		'title'       => __('Video Slider Section', 'vw-sports'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-sports'),
		'priority'    => null,
		'panel'       => 'vw_sports_homepage_panel',
	));

	$wp_customize->add_setting('vw_sports_landscaping_video_slider_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_video_slider_text',array(
		'description' => __('<p>1. More options for video slider section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for video slider section.</p>','vw-sports'),
		'section'=> 'vw_sports_landscaping_video_slider',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_sports_landscaping_video_slider_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_video_slider_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_sports_guide') ." '>More Info</a>",
		'section'=> 'vw_sports_landscaping_video_slider',
		'type'=> 'hidden'
	));

	//our shop Section
	$wp_customize->add_section('vw_sports_landscaping_our_shop', array(
		'title'       => __('Official Pro Shop Section', 'vw-sports'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-sports'),
		'priority'    => null,
		'panel'       => 'vw_sports_homepage_panel',
	));

	$wp_customize->add_setting('vw_sports_landscaping_our_shop_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_our_shop_text',array(
		'description' => __('<p>1. More options for Official Pro Shop section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Official Pro Shop section.</p>','vw-sports'),
		'section'=> 'vw_sports_landscaping_our_shop',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_sports_landscaping_our_shop_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_our_shop_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_sports_guide') ." '>More Info</a>",
		'section'=> 'vw_sports_landscaping_our_shop',
		'type'=> 'hidden'
	));

	// featured post Section
	$wp_customize->add_section('vw_sports_landscaping_featured_post', array(
		'title'       => __('Featured Post Section', 'vw-sports'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-sports'),
		'priority'    => null,
		'panel'       => 'vw_sports_homepage_panel',
	));

	$wp_customize->add_setting('vw_sports_landscaping_featured_post_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_featured_post_text',array(
		'description' => __('<p>1. More options for featured post section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for featured post section.</p>','vw-sports'),
		'section'=> 'vw_sports_landscaping_featured_post',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_sports_landscaping_featured_post_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_featured_post_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_sports_guide') ." '>More Info</a>",
		'section'=> 'vw_sports_landscaping_featured_post',
		'type'=> 'hidden'
	));

	//our partners Section
	$wp_customize->add_section('vw_sports_landscaping_our_partners', array(
		'title'       => __('Partners Section', 'vw-sports'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-sports'),
		'priority'    => null,
		'panel'       => 'vw_sports_homepage_panel',
	));

	$wp_customize->add_setting('vw_sports_landscaping_our_partners_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_our_partners_text',array(
		'description' => __('<p>1. More options for partners section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for partners section.</p>','vw-sports'),
		'section'=> 'vw_sports_landscaping_our_partners',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_sports_landscaping_our_partners_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_our_partners_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_sports_guide') ." '>More Info</a>",
		'section'=> 'vw_sports_landscaping_our_partners',
		'type'=> 'hidden'
	));

	//newsletter Section
	$wp_customize->add_section('vw_sports_landscaping_newsletter', array(
		'title'       => __('Newsletter Section', 'vw-sports'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-sports'),
		'priority'    => null,
		'panel'       => 'vw_sports_homepage_panel',
	));

	$wp_customize->add_setting('vw_sports_landscaping_newsletter_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_newsletter_text',array(
		'description' => __('<p>1. More options for newsletter section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for newsletter section.</p>','vw-sports'),
		'section'=> 'vw_sports_landscaping_newsletter',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_sports_landscaping_newsletter_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_landscaping_newsletter_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_sports_guide') ." '>More Info</a>",
		'section'=> 'vw_sports_landscaping_newsletter',
		'type'=> 'hidden'
	));

	//Services
	$wp_customize->add_section('vw_sports_services',array(
		'title'	=> __('Game Section','vw-sports'),
		'description' => __('For more options of game section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/wordpress-sports-theme/">GET PRO</a>','vw-sports'),
		'panel' => 'vw_sports_homepage_panel',
	));

	$wp_customize->add_setting('vw_sports_services_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_services_text',array(
		'label'	=> esc_html__('Game Section Heading','vw-sports'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Game Highlights', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_services',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_services_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_services_number',array(
		'description' => __('Publish and Refresh the page after select the number of tab.','vw-sports'),
		'label'	=> esc_html__('No of Tabs to show','vw-sports'),
		'section'=> 'vw_sports_services',
		'type'=> 'number'
	));

	$featured_post = get_theme_mod('vw_sports_services_number','');
    for ( $j = 1; $j <= $featured_post; $j++ ) {
		$wp_customize->add_setting('vw_sports_services_text'.$j,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('vw_sports_services_text'.$j,array(
			'label'	=> esc_html__('Tab ','vw-sports').$j,
			'input_attrs' => array(
	            'placeholder' => esc_html__( 'All', 'vw-sports' ),
	        ),
			'section'=> 'vw_sports_services',
			'type'=> 'text'
		));

		$categories = get_categories();
			$cat_posts = array();
				$i = 0;
				$cat_posts[]='Select';
			foreach($categories as $category){
				if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cat_posts[$category->slug] = $category->name;
		}

		$wp_customize->add_setting('vw_sports_services_category'.$j,array(
			'default'	=> 'select',
			'sanitize_callback' => 'vw_sports_sanitize_choices',
		));
		$wp_customize->add_control('vw_sports_services_category'.$j,array(
			'type'    => 'select',
			'choices' => $cat_posts,
			'label' => __('Select Category to display game highlight','vw-sports'),
			'section' => 'vw_sports_services',
		));
	}

	//Footer Text
	$wp_customize->add_section('vw_sports_footer',array(
		'title'	=> esc_html__('Footer Settings','vw-sports'),
		'panel' => 'vw_sports_homepage_panel',
		'description' => __('For more options of footer section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/wordpress-sports-theme/">GET PRO</a>','vw-sports'),
	));

	$wp_customize->add_setting( 'vw_sports_footer_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_footer_hide_show',array(
      'label' => esc_html__( 'Show / Hide Footer','vw-sports' ),
      'section' => 'vw_sports_footer'
    )));

  	$wp_customize->add_setting('vw_sports_footer_template',array(
	    'default'	=> esc_html('vw_sports-footer-one'),
	    'sanitize_callback'	=> 'vw_sports_sanitize_choices'
  	));
 	$wp_customize->add_control('vw_sports_footer_template',array(
        'label'	=> esc_html__('Footer style','vw-sports'),
        'section'	=> 'vw_sports_footer',
        'setting'	=> 'vw_sports_footer_template',
        'type' => 'select',
        'choices' => array(
            'vw_sports-footer-one' => esc_html__('Style 1', 'vw-sports'),
            'vw_sports-footer-two' => esc_html__('Style 2', 'vw-sports'),
            'vw_sports-footer-three' => esc_html__('Style 3', 'vw-sports'),
            'vw_sports-footer-four' => esc_html__('Style 4', 'vw-sports'),
            'vw_sports-footer-five' => esc_html__('Style 5', 'vw-sports'),
        )
  	));

	$wp_customize->add_setting('vw_sports_footer_background_color', array(
		'default'           => '#151821',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_sports_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-sports'),
		'section'  => 'vw_sports_footer',
	)));

	$wp_customize->add_setting('vw_sports_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_sports_footer_background_image',array(
        'label' => __('Footer Background Image','vw-sports'),
        'section' => 'vw_sports_footer'
	)));

	$wp_customize->add_setting('vw_sports_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','vw-sports'),
		'section' => 'vw_sports_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-sports' ),
			'center top'   => esc_html__( 'Top', 'vw-sports' ),
			'right top'   => esc_html__( 'Top Right', 'vw-sports' ),
			'left center'   => esc_html__( 'Left', 'vw-sports' ),
			'center center'   => esc_html__( 'Center', 'vw-sports' ),
			'right center'   => esc_html__( 'Right', 'vw-sports' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-sports' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-sports' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-sports' ),
		),
	));

	// Footer
	$wp_customize->add_setting('vw_sports_img_footer',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_img_footer',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','vw-sports'),
		'choices' => array(
            'fixed' => __('fixed','vw-sports'),
            'scroll' => __('scroll','vw-sports'),
        ),
		'section'=> 'vw_sports_footer',
	));

	$wp_customize->add_setting('vw_sports_footer_widgets_heading',array(
	    'default' => 'Left',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_footer_widgets_heading',array(
	    'type' => 'select',
	    'label' => __('Footer Widget Heading','vw-sports'),
	    'section' => 'vw_sports_footer',
	    'choices' => array(
	    	'Left' => __('Left','vw-sports'),
	      'Center' => __('Center','vw-sports'),
	      'Right' => __('Right','vw-sports')
    ),
	) );

	$wp_customize->add_setting('vw_sports_footer_widgets_content',array(
	    'default' => 'Left',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_footer_widgets_content',array(
	    'type' => 'select',
	    'label' => __('Footer Widget Content','vw-sports'),
	    'section' => 'vw_sports_footer',
	    'choices' => array(
	    	'Left' => __('Left','vw-sports'),
	      'Center' => __('Center','vw-sports'),
	      'Right' => __('Right','vw-sports')
    ),
	) );

	// footer padding
	$wp_customize->add_setting('vw_sports_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-sports' ),
    ),
		'section'=> 'vw_sports_footer',
		'type'=> 'text'
	));

    // footer social icon
  	$wp_customize->add_setting( 'vw_sports_footer_icon',array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_footer_icon',array(
		'label' => esc_html__( 'Show / Hide Footer Social Icon','vw-sports' ),
		'section' => 'vw_sports_footer'
    )));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_sports_footer_text', array(
		'selector' => '.copyright p',
		'render_callback' => 'vw_sports_Customize_partial_vw_sports_footer_text',
	));

	$wp_customize->add_setting( 'vw_sports_copyright_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_copyright_hide_show',array(
      'label' => esc_html__( 'Show / Hide Copyright','vw-sports' ),
      'section' => 'vw_sports_footer'
    )));

	$wp_customize->add_setting('vw_sports_copyright_background_color', array(
		'default'           => '#ff6c26',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_sports_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'vw-sports'),
		'section'  => 'vw_sports_footer',
	)));

	$wp_customize->add_setting('vw_sports_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_footer_text',array(
		'label'	=> esc_html__('Copyright Text','vw-sports'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2020, .....', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Sports_Image_Radio_Control($wp_customize, 'vw_sports_copyright_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','vw-sports'),
        'section' => 'vw_sports_footer',
        'settings' => 'vw_sports_copyright_alignment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting( 'vw_sports_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','vw-sports' ),
      	'section' => 'vw_sports_footer'
    )));

     //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_sports_scroll_to_top_icon', array(
		'selector' => '.scrollup i',
		'render_callback' => 'vw_sports_Customize_partial_vw_sports_scroll_to_top_icon',
	));

    $wp_customize->add_setting('vw_sports_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Sports_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_sports_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-sports'),
		'transport' => 'refresh',
		'section'	=> 'vw_sports_footer',
		'setting'	=> 'vw_sports_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_sports_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-sports'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_sports_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_sports_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_sports_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-sports' ),
		'section'     => 'vw_sports_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('vw_sports_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control(new vw_sports_Image_Radio_Control($wp_customize, 'vw_sports_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','vw-sports'),
        'section' => 'vw_sports_footer',
        'settings' => 'vw_sports_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

	///Blog Post

	$BlogPostParentPanel = new VW_Sports_WP_Customize_Panel( $wp_customize, 'vw_sports_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'vw-sports' ),
		'panel' => 'vw_sports_panel_id',
		'priority' => 20,
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_sports_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'vw-sports' ),
		'panel' => 'vw_sports_blog_post_parent_panel',
	));

	//Blog layout
    $wp_customize->add_setting('vw_sports_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Sports_Image_Radio_Control($wp_customize, 'vw_sports_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Post Layouts','vw-sports'),
        'section' => 'vw_sports_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

	$wp_customize->add_setting('vw_sports_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','vw-sports'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','vw-sports'),
        'section' => 'vw_sports_post_settings',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','vw-sports'),
            'Right Sidebar' => esc_html__('Right Sidebar','vw-sports'),
            'One Column' => esc_html__('One Column','vw-sports'),
            'Three Columns' => __('Three Columns','vw-sports'),
            'Four Columns' => __('Four Columns','vw-sports'),
            'Grid Layout' => esc_html__('Grid Layout','vw-sports')
        ),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_sports_toggle_postdate', array(
		'selector' => '.post-main-box h2 a',
		'render_callback' => 'vw_sports_Customize_partial_vw_sports_toggle_postdate',
	));

  	$wp_customize->add_setting('vw_sports_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Sports_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_sports_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-sports'),
		'transport' => 'refresh',
		'section'	=> 'vw_sports_post_settings',
		'setting'	=> 'vw_sports_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_sports_toggle_blog_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_toggle_blog_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','vw-sports' ),
        'section' => 'vw_sports_post_settings'
    )));

	$wp_customize->add_setting('vw_sports_toggle_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Sports_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_sports_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','vw-sports'),
		'transport' => 'refresh',
		'section'	=> 'vw_sports_post_settings',
		'setting'	=> 'vw_sports_toggle_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_sports_toggle_blog_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_toggle_blog_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-sports' ),
		'section' => 'vw_sports_post_settings'
    )));

    $wp_customize->add_setting('vw_sports_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Sports_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_sports_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-sports'),
		'transport' => 'refresh',
		'section'	=> 'vw_sports_post_settings',
		'setting'	=> 'vw_sports_toggle_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_sports_toggle_blog_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_toggle_blog_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-sports' ),
		'section' => 'vw_sports_post_settings'
    )));

    $wp_customize->add_setting('vw_sports_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Sports_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_sports_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','vw-sports'),
		'transport' => 'refresh',
		'section'	=> 'vw_sports_post_settings',
		'setting'	=> 'vw_sports_toggle_time_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_sports_toggle_blog_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_toggle_blog_time',array(
		'label' => esc_html__( 'Show / Hide Time','vw-sports' ),
		'section' => 'vw_sports_post_settings'
	)));

	$wp_customize->add_setting( 'vw_sports_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','vw-sports' ),
		'section' => 'vw_sports_post_settings'
    )));

    $wp_customize->add_setting( 'vw_sports_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','vw-sports' ),
		'section' => 'vw_sports_post_settings'
    )));

    $wp_customize->add_setting( 'vw_sports_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_sports_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_sports_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vw-sports' ),
		'section'     => 'vw_sports_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_sports_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_sports_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_sports_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','vw-sports' ),
		'section'     => 'vw_sports_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('vw_sports_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'vw_sports_sanitize_choices'
	));
  	$wp_customize->add_control('vw_sports_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','vw-sports'),
		'section'	=> 'vw_sports_post_settings',
		'choices' => array(
		'default' => __('Default','vw-sports'),
		'custom' => __('Custom Image Size','vw-sports'),
      ),
  	));

	$wp_customize->add_setting('vw_sports_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('vw_sports_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'vw-sports' ),),
		'section'=> 'vw_sports_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_sports_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('vw_sports_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'vw-sports' ),),
		'section'=> 'vw_sports_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_sports_blog_post_featured_image_dimension'
	));

    $wp_customize->add_setting( 'vw_sports_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_sports_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_sports_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-sports' ),
		'section'     => 'vw_sports_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_sports_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('vw_sports_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','vw-sports'),
        'section' => 'vw_sports_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','vw-sports'),
            'Excerpt' => esc_html__('Excerpt','vw-sports'),
            'No Content' => esc_html__('No Content','vw-sports')
        ),
	) );

	$wp_customize->add_setting('vw_sports_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-sports'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-sports'),
		'section'=> 'vw_sports_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('vw_sports_blog_page_posts_settings',array(
        'default' => 'Into Blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_blog_page_posts_settings',array(
        'type' => 'select',
        'label' => __('Display Blog Posts','vw-sports'),
        'section' => 'vw_sports_post_settings',
        'choices' => array(
        	'Into Blocks' => __('Into Blocks','vw-sports'),
            'Without Blocks' => __('Without Blocks','vw-sports')
        ),
	) );

	$wp_customize->add_setting( 'vw_sports_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-sports' ),
      'section' => 'vw_sports_post_settings'
    )));

	$wp_customize->add_setting( 'vw_sports_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_sports_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_sports_blog_pagination_type', array(
        'section' => 'vw_sports_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-sports' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-sports' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-sports' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_sports_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'vw-sports' ),
		'panel' => 'vw_sports_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_sports_button_text', array(
		'selector' => '.post-main-box .more-btn a',
		'render_callback' => 'vw_sports_Customize_partial_vw_sports_button_text',
	));

    $wp_customize->add_setting('vw_sports_button_text',array(
		'default'=> esc_html__('Read More','vw-sports'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-sports'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('vw_sports_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_button_font_size',array(
		'label'	=> __('Button Font Size','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-sports' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_sports_button_settings',
	));


	$wp_customize->add_setting( 'vw_sports_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_sports_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_sports_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-sports' ),
		'section'     => 'vw_sports_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// button padding
	$wp_customize->add_setting('vw_sports_button_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_button_top_bottom_padding',array(
		'label'	=> __('Button Top Bottom Padding','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-sports' ),
    ),
		'section'=> 'vw_sports_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_button_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_button_left_right_padding',array(
		'label'	=> __('Button Left Right Padding','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-sports' ),
    ),
		'section'=> 'vw_sports_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-sports' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_sports_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('vw_sports_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','vw-sports'),
		'choices' => array(
      'Uppercase' => __('Uppercase','vw-sports'),
      'Capitalize' => __('Capitalize','vw-sports'),
      'Lowercase' => __('Lowercase','vw-sports'),
    ),
		'section'=> 'vw_sports_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_sports_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'vw-sports' ),
		'panel' => 'vw_sports_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_sports_related_post_title', array(
		'selector' => '.related-post h3',
		'render_callback' => 'vw_sports_Customize_partial_vw_sports_related_post_title',
	));

    $wp_customize->add_setting( 'vw_sports_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_related_post',array(
		'label' => esc_html__( 'Show / Hide Related Post','vw-sports' ),
		'section' => 'vw_sports_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_sports_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','vw-sports'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_sports_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'vw_sports_sanitize_number_absint'
	));
	$wp_customize->add_control('vw_sports_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','vw-sports'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'vw_sports_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_sports_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_sports_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','vw-sports' ),
		'section'     => 'vw_sports_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'vw_sports_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Single Posts Settings
	$wp_customize->add_section( 'vw_sports_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-sports' ),
		'panel' => 'vw_sports_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_sports_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Sports_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_sports_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-sports'),
		'transport' => 'refresh',
		'section'	=> 'vw_sports_single_blog_settings',
		'setting'	=> 'vw_sports_single_postdate_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_sports_toggle_postdate',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_sports_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_toggle_postdate',array(
	    'label' => esc_html__( 'Show / Hide Date','vw-sports' ),
	   'section' => 'vw_sports_single_blog_settings'
	)));

	$wp_customize->add_setting('vw_sports_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Sports_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_sports_single_author_icon',array(
		'label'	=> __('Add Author Icon','vw-sports'),
		'transport' => 'refresh',
		'section'	=> 'vw_sports_single_blog_settings',
		'setting'	=> 'vw_sports_single_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_sports_toggle_author',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_sports_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_toggle_author',array(
	    'label' => esc_html__( 'Show / Hide Author','vw-sports' ),
	    'section' => 'vw_sports_single_blog_settings'
	)));

   	$wp_customize->add_setting('vw_sports_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Sports_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_sports_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-sports'),
		'transport' => 'refresh',
		'section'	=> 'vw_sports_single_blog_settings',
		'setting'	=> 'vw_sports_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_sports_toggle_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_sports_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_toggle_comments',array(
	    'label' => esc_html__( 'Show / Hide Comments','vw-sports' ),
	    'section' => 'vw_sports_single_blog_settings'
	)));

  	$wp_customize->add_setting('vw_sports_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Sports_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_sports_single_time_icon',array(
		'label'	=> __('Add Time Icon','vw-sports'),
		'transport' => 'refresh',
		'section'	=> 'vw_sports_single_blog_settings',
		'setting'	=> 'vw_sports_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_sports_toggle_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_sports_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_toggle_time',array(
	    'label' => esc_html__( 'Show / Hide Time','vw-sports' ),
	    'section' => 'vw_sports_single_blog_settings'
	)));

	$wp_customize->add_setting( 'vw_sports_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','vw-sports' ),
		'section' => 'vw_sports_single_blog_settings'
    )));

	$wp_customize->add_setting( 'vw_sports_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
 	 $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','vw-sports' ),
		'section' => 'vw_sports_single_blog_settings'
    )));

	// Single Posts Category
 	 $wp_customize->add_setting( 'vw_sports_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','vw-sports' ),
		'section' => 'vw_sports_single_blog_settings'
    )));

	$wp_customize->add_setting('vw_sports_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-sports'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-sports'),
		'section'=> 'vw_sports_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_sports_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
	));
	$wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_single_blog_post_navigation_show_hide', array(
		  'label' => esc_html__( 'Show / Hide Post Navigation','vw-sports' ),
		  'section' => 'vw_sports_single_blog_settings'
	)));

	//navigation text
	$wp_customize->add_setting('vw_sports_single_blog_prev_navigation_text',array(
		'default'=> 'PREVIOUS',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_single_blog_next_navigation_text',array(
		'default'=> 'NEXT',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_single_blog_comment_title',array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_sports_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_single_blog_comment_button_text',array(
		'default'=> 'Post Comment',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_sports_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','vw-sports'),
		'description'	=> __('Enter a value in %. Example:50%','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_single_blog_settings',
		'type'=> 'text'
	));

	 // Grid layout setting
	$wp_customize->add_section( 'vw_sports_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'vw-sports' ),
		'panel' => 'vw_sports_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_sports_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Sports_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_sports_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-sports'),
		'transport' => 'refresh',
		'section'	=> 'vw_sports_grid_layout_settings',
		'setting'	=> 'vw_sports_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_sports_grid_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_grid_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','vw-sports' ),
        'section' => 'vw_sports_grid_layout_settings'
    )));

	$wp_customize->add_setting('vw_sports_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Sports_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_sports_grid_author_icon',array(
		'label'	=> __('Add Author Icon','vw-sports'),
		'transport' => 'refresh',
		'section'	=> 'vw_sports_grid_layout_settings',
		'setting'	=> 'vw_sports_grid_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_sports_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-sports' ),
		'section' => 'vw_sports_grid_layout_settings'
    )));

    $wp_customize->add_setting('vw_sports_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Sports_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_sports_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-sports'),
		'transport' => 'refresh',
		'section'	=> 'vw_sports_grid_layout_settings',
		'setting'	=> 'vw_sports_grid_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_sports_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-sports' ),
		'section' => 'vw_sports_grid_layout_settings'
    )));

 	$wp_customize->add_setting('vw_sports_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-sports'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-sports'),
		'section'=> 'vw_sports_grid_layout_settings',
		'type'=> 'text'
	));

	 $wp_customize->add_setting( 'vw_sports_grid_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_sports_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_sports_grid_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-sports' ),
		'section'     => 'vw_sports_grid_layout_settings',
		'type'        => 'range',
		'settings'    => 'vw_sports_grid_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('vw_sports_display_grid_posts_settings',array(
        'default' => 'Into Blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_display_grid_posts_settings',array(
        'type' => 'select',
        'label' => __('Display Grid Posts','vw-sports'),
        'section' => 'vw_sports_grid_layout_settings',
        'choices' => array(
        	'Into Blocks' => __('Into Blocks','vw-sports'),
            'Without Blocks' => __('Without Blocks','vw-sports')
        ),
	) );

  	$wp_customize->add_setting('vw_sports_grid_button_text',array(
		'default'=> esc_html__('Read More','vw-sports'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_grid_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-sports'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_grid_layout_settings',
		'type'=> 'text'
	));

  	$wp_customize->add_setting('vw_sports_grid_button_icon',array(
		'default'	=> 'fas fa-angle-double-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_sports_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_sports_grid_button_icon',array(
		'label'	=> __('Add Grid Button Icon','vw-sports'),
		'transport' => 'refresh',
		'section'	=> 'vw_sports_grid_layout_settings',
		'setting'	=> 'vw_sports_grid_button_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_sports_grid_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_grid_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_grid_layout_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('vw_sports_grid_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_grid_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Grid Post Content','vw-sports'),
        'section' => 'vw_sports_grid_layout_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','vw-sports'),
            'Excerpt' => esc_html__('Excerpt','vw-sports'),
            'No Content' => esc_html__('No Content','vw-sports')
        ),
	) );

    $wp_customize->add_setting( 'vw_sports_grid_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_sports_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_sports_grid_featured_image_border_radius', array(
		'label'       => esc_html__( 'Grid Featured Image Border Radius','vw-sports' ),
		'section'     => 'vw_sports_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_sports_grid_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_sports_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_sports_grid_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Grid Featured Image Box Shadow','vw-sports' ),
		'section'     => 'vw_sports_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Others Settings
	$wp_customize->add_panel( 'vw_sports_others_panel', array(
		'title' => esc_html__( 'Others Settings', 'vw-sports' ),
		'panel' => 'vw_sports_panel_id',
		'priority' => 20,
	));

	$wp_customize->add_section( 'vw_sports_left_right', array(
    	'title' => esc_html__( 'General Settings', 'vw-sports' ),
		'panel' => 'vw_sports_others_panel'
	) );

	$wp_customize->add_setting('vw_sports_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Sports_Image_Radio_Control($wp_customize, 'vw_sports_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','vw-sports'),
        'description' => esc_html__('Here you can change the width layout of Website.','vw-sports'),
        'section' => 'vw_sports_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('vw_sports_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','vw-sports'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','vw-sports'),
        'section' => 'vw_sports_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','vw-sports'),
            'Right_Sidebar' => esc_html__('Right Sidebar','vw-sports'),
            'One_Column' => esc_html__('One Column','vw-sports')
        ),
	) );

	 //Wow Animation
	$wp_customize->add_setting( 'vw_sports_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_animation',array(
        'label' => esc_html__( 'Show / Hide Animation ','vw-sports' ),
        'description' => __('Here you can disable overall site animation effect','vw-sports'),
        'section' => 'vw_sports_left_right'
    )));

	$wp_customize->add_setting( 'vw_sports_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_single_page_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Page Breadcrumb','vw-sports' ),
		'section' => 'vw_sports_left_right'
  	)));

    //Pre-Loader
	$wp_customize->add_setting( 'vw_sports_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_loader_enable',array(
        'label' => esc_html__( 'Show / Hide Pre-Loader','vw-sports' ),
        'section' => 'vw_sports_left_right'
    )));

	$wp_customize->add_setting('vw_sports_preloader_bg_color', array(
		'default'           => '#ff6c26',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_sports_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-sports'),
		'section'  => 'vw_sports_left_right',
	)));

	$wp_customize->add_setting('vw_sports_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_sports_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-sports'),
		'section'  => 'vw_sports_left_right',
	)));

	$wp_customize->add_setting('vw_sports_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_sports_preloader_bg_img',array(
        'label' => __('Preloader Background Image','vw-sports'),
        'section' => 'vw_sports_left_right'
	)));

	//No Result Page Setting
	$wp_customize->add_section('vw_sports_no_results_page',array(
		'title'	=> __('No Results Page Settings','vw-sports'),
		'panel' => 'vw_sports_others_panel',
	));

	$wp_customize->add_setting('vw_sports_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_sports_no_results_page_title',array(
		'label'	=> __('Add Title','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_sports_no_results_page_content',array(
		'label'	=> __('Add Text','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_no_results_page',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_sports_404_page',array(
		'title'	=> __('404 Page Settings','vw-sports'),
		'panel' => 'vw_sports_others_panel',
	));

	$wp_customize->add_setting('vw_sports_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_sports_404_page_title',array(
		'label'	=> __('Add Title','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_sports_404_page_content',array(
		'label'	=> __('Add Text','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( 'GO BACK', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('vw_sports_no_results_page',array(
		'title'	=> __('No Results Page Settings','vw-sports'),
		'panel' => 'vw_sports_others_panel',
	));

	$wp_customize->add_setting('vw_sports_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_sports_no_results_page_title',array(
		'label'	=> __('Add Title','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_sports_no_results_page_content',array(
		'label'	=> __('Add Text','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_sports_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-sports'),
		'panel' => 'vw_sports_others_panel',
	));

	$wp_customize->add_setting('vw_sports_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_social_icon_width',array(
		'label'	=> __('Icon Width','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_social_icon_height',array(
		'label'	=> __('Icon Height','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_social_icon_settings',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('vw_sports_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','vw-sports'),
		'panel' => 'vw_sports_others_panel',
	));

    $wp_customize->add_setting( 'vw_sports_resp_slider_hide_show',array(
      	'default' => 1,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','vw-sports' ),
      	'section' => 'vw_sports_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_sports_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','vw-sports' ),
      	'section' => 'vw_sports_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_sports_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-sports' ),
      	'section' => 'vw_sports_responsive_media'
    )));

    $wp_customize->add_setting('vw_sports_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Sports_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_sports_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-sports'),
		'transport' => 'refresh',
		'section'	=> 'vw_sports_responsive_media',
		'setting'	=> 'vw_sports_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_sports_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Sports_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_sports_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-sports'),
		'transport' => 'refresh',
		'section'	=> 'vw_sports_responsive_media',
		'setting'	=> 'vw_sports_res_close_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_sports_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_sports_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'vw-sports'),
		'section'  => 'vw_sports_responsive_media',
	)));

    //Woocommerce settings
	$wp_customize->add_section('vw_sports_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-sports'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

    //Shop Page Featured Image
	$wp_customize->add_setting( 'vw_sports_shop_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_sports_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_sports_shop_featured_image_border_radius', array(
		'label'       => esc_html__( 'Shop Page Featured Image Border Radius','vw-sports' ),
		'section'     => 'vw_sports_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_sports_shop_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_sports_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_sports_shop_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Shop Page Featured Image Box Shadow','vw-sports' ),
		'section'     => 'vw_sports_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_sports_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar',
		'render_callback' => 'vw_sports_customize_partial_vw_sports_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_sports_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Shop Page Sidebar','vw-sports' ),
		'section' => 'vw_sports_woocommerce_section'
    )));

    $wp_customize->add_setting('vw_sports_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','vw-sports'),
        'section' => 'vw_sports_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-sports'),
            'Right Sidebar' => __('Right Sidebar','vw-sports'),
        ),
	) );


     //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_sports_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar',
		'render_callback' => 'vw_sports_customize_partial_vw_sports_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_sports_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','vw-sports' ),
		'section' => 'vw_sports_woocommerce_section'
    )));

    $wp_customize->add_setting('vw_sports_single_product_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_single_product_layout',array(
        'type' => 'select',
        'label' => __('Single Product Sidebar Layout','vw-sports'),
        'section' => 'vw_sports_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-sports'),
            'Right Sidebar' => __('Right Sidebar','vw-sports'),
        ),
	) );

	$wp_customize->add_setting('vw_sports_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_sports_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_sports_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_sports_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-sports' ),
		'section'     => 'vw_sports_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_sports_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_woocommerce_section',
		'type'=> 'text'
	));

    //Products Sale Badge
	$wp_customize->add_setting('vw_sports_woocommerce_sale_position',array(
        'default' => 'left',
        'sanitize_callback' => 'vw_sports_sanitize_choices'
	));
	$wp_customize->add_control('vw_sports_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','vw-sports'),
        'section' => 'vw_sports_woocommerce_section',
        'choices' => array(
            'left' => __('Left','vw-sports'),
            'right' => __('Right','vw-sports'),
        ),
	) );

	$wp_customize->add_setting('vw_sports_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_sports_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_sports_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','vw-sports'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-sports'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-sports' ),
        ),
		'section'=> 'vw_sports_woocommerce_section',
		'type'=> 'text'
	));

  	// Related Product
    $wp_customize->add_setting( 'vw_sports_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_sports_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Sports_Toggle_Switch_Custom_Control( $wp_customize, 'vw_sports_related_product_show_hide',array(
        'label' => esc_html__( 'Show / Hide Related Product','vw-sports' ),
        'section' => 'vw_sports_woocommerce_section'
    )));

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Sports_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Sports_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_sports_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Sports_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_sports_panel';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;
			return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Sports_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_sports_section';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;

			if ( $this->panel ) {
			$array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
			} else {
			$array['customizeAction'] = 'Customizing';
			}
			return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_sports_Customize_controls_scripts() {
	wp_enqueue_script( 'vw-sports-customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_sports_Customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Sports_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Sports_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new VW_Sports_Customize_Section_Pro( $manager,'vw_sports_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'SPORTS PRO', 'vw-sports' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-sports' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/wordpress-sports-theme/'),
		) )	);

		$manager->add_section(new VW_Sports_Customize_Section_Pro($manager,'vw_sports_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-sports' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-sports' ),
			'pro_url'  => esc_url('https://preview.vwthemesdemo.com/docs/free-vw-sports/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-sports-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-sports-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Sports_Customize::get_instance();
