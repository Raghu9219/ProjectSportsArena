<?php

	$vw_sports_custom_css= "";

	$vw_sports_first_color = get_theme_mod('vw_sports_first_color');

	if($vw_sports_first_color != false){
		$vw_sports_custom_css .='#header, .main-navigation ul.sub-menu>li>a:before, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .more-btn a:before, .more-btn a,#comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,nav.woocommerce-MyAccount-navigation ul li,.pro-button a, #footer-2, .scrollup i, #sidebar h3, .pagination span, .pagination a, .widget_product_search button, .woocommerce span.onsale, #preloader, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__label,.bradcrumbs a, .post-categories li a,.bradcrumbs span, #sidebar h3, #sidebar .wp-block-search .wp-block-search__label, #sidebar .wp-block-heading, .wp-block-tag-cloud a:hover, .wp-block-button__link, a.added_to_cart.wc-forward, .pagination span, .pagination a, .post-nav-links span, .post-nav-links a{';
			$vw_sports_custom_css .='background-color: '.esc_attr($vw_sports_first_color).';';
		$vw_sports_custom_css .='}';
	}

	if($vw_sports_first_color != false){
		$vw_sports_custom_css .='a, .tab button:hover,button.tablinks.active, #footer .textwidget a,#footer li a:hover,.post-main-box:hover h3 a,#sidebar ul li a:hover,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.post-navigation a:hover,.post-navigation a:focus, .woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce ul.products li.product .price, .slider-inner-box h1 a:hover, .post-main-box:hover h2 a, .post-main-box:hover .post-info a, .single-post .post-info:hover a, .wp-block-quote, .wp-block-quote:not(.is-large):not(.is-style-large), .wp-block-pullquote{';
			$vw_sports_custom_css .='color: '.esc_attr($vw_sports_first_color).';';
		$vw_sports_custom_css .='}';
	}

	if($vw_sports_first_color != false){
		$vw_sports_custom_css .='.wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button, .wc-block-components-order-summary-item__quantity, .wc-block-grid__product-onsale{';
			$vw_sports_custom_css .='background-color: '.esc_attr($vw_sports_first_color).'!important;';
		$vw_sports_custom_css .='}';
	}

	if($vw_sports_first_color != false){
		$vw_sports_custom_css .='.wp-block-quote:not(.is-large):not(.is-style-large), .wp-block-pullquote{';
			$vw_sports_custom_css .='border-left: 4px solid; '.esc_attr($vw_sports_first_color).';';
		$vw_sports_custom_css .='}';
	}


	/*---------------------------Width Layout -------------------*/

	$vw_sports_theme_lay = get_theme_mod( 'vw_sports_width_option','Full Width');
    if($vw_sports_theme_lay == 'Boxed'){
		$vw_sports_custom_css .='body{';
			$vw_sports_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='#slider .carousel-caption{';
			$vw_sports_custom_css .='right: 30% !important; left:20% !important';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='.logo-inner{';
			$vw_sports_custom_css .='margin-left: 20%;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='.scrollup i{';
			$vw_sports_custom_css .='right: 100px;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='.scrollup.left i{';
			$vw_sports_custom_css .='left: 100px;';
		$vw_sports_custom_css .='}';
	}else if($vw_sports_theme_lay == 'Wide Width'){
		$vw_sports_custom_css .='body{';
			$vw_sports_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='.scrollup i{';
			$vw_sports_custom_css .='right: 30px;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='.scrollup.left i{';
			$vw_sports_custom_css .='left: 30px;';
		$vw_sports_custom_css .='}';
	}else if($vw_sports_theme_lay == 'Full Width'){
		$vw_sports_custom_css .='body{';
			$vw_sports_custom_css .='max-width: 100%;';
		$vw_sports_custom_css .='}';
	}

	/*------------------ Slider Content Layout -------------------*/

	$vw_sports_theme_lay = get_theme_mod( 'vw_sports_slider_content_option','Left');
    if($vw_sports_theme_lay == 'Left'){
		$vw_sports_custom_css .='#slider .carousel-caption{';
			$vw_sports_custom_css .='text-align:left; right: 55%; left:20%';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='#slider .more-btn{';
			$vw_sports_custom_css .='margin: 40px auto 0 15px;';
		$vw_sports_custom_css .='}';
	}else if($vw_sports_theme_lay == 'Center'){
		$vw_sports_custom_css .='#slider .carousel-caption{';
			$vw_sports_custom_css .='text-align:center; right: 30%; left: 30%;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='#slider .more-btn{';
			$vw_sports_custom_css .='margin: 40px auto 0 auto;';
		$vw_sports_custom_css .='}';
	}else if($vw_sports_theme_lay == 'Right'){
		$vw_sports_custom_css .='#slider .carousel-caption{';
			$vw_sports_custom_css .='text-align:right; right: 20%; left: 45%;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='#slider .more-btn{';
			$vw_sports_custom_css .='margin: 40px 15px 0 auto;';
		$vw_sports_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$vw_sports_slider_content_padding_top_bottom = get_theme_mod('vw_sports_slider_content_padding_top_bottom');
	$vw_sports_slider_content_padding_left_right = get_theme_mod('vw_sports_slider_content_padding_left_right');
	if($vw_sports_slider_content_padding_top_bottom != false || $vw_sports_slider_content_padding_left_right != false){
		$vw_sports_custom_css .='#slider .carousel-caption{';
			$vw_sports_custom_css .='top: '.esc_attr($vw_sports_slider_content_padding_top_bottom).'; bottom: '.esc_attr($vw_sports_slider_content_padding_top_bottom).';left: '.esc_attr($vw_sports_slider_content_padding_left_right).';right: '.esc_attr($vw_sports_slider_content_padding_left_right).';';
		$vw_sports_custom_css .='}';
	}

	/*--------------------- Slider Opacity -------------------*/

	$vw_sports_theme_lay = get_theme_mod( 'vw_sports_slider_opacity_color','0.5');
	if($vw_sports_theme_lay == '0'){
		$vw_sports_custom_css .='#slider img{';
			$vw_sports_custom_css .='opacity:0';
		$vw_sports_custom_css .='}';
		}else if($vw_sports_theme_lay == '0.1'){
		$vw_sports_custom_css .='#slider img{';
			$vw_sports_custom_css .='opacity:0.1';
		$vw_sports_custom_css .='}';
		}else if($vw_sports_theme_lay == '0.2'){
		$vw_sports_custom_css .='#slider img{';
			$vw_sports_custom_css .='opacity:0.2';
		$vw_sports_custom_css .='}';
		}else if($vw_sports_theme_lay == '0.3'){
		$vw_sports_custom_css .='#slider img{';
			$vw_sports_custom_css .='opacity:0.3';
		$vw_sports_custom_css .='}';
		}else if($vw_sports_theme_lay == '0.4'){
		$vw_sports_custom_css .='#slider img{';
			$vw_sports_custom_css .='opacity:0.4';
		$vw_sports_custom_css .='}';
		}else if($vw_sports_theme_lay == '0.5'){
		$vw_sports_custom_css .='#slider img{';
			$vw_sports_custom_css .='opacity:0.5';
		$vw_sports_custom_css .='}';
		}else if($vw_sports_theme_lay == '0.6'){
		$vw_sports_custom_css .='#slider img{';
			$vw_sports_custom_css .='opacity:0.6';
		$vw_sports_custom_css .='}';
		}else if($vw_sports_theme_lay == '0.7'){
		$vw_sports_custom_css .='#slider img{';
			$vw_sports_custom_css .='opacity:0.7';
		$vw_sports_custom_css .='}';
		}else if($vw_sports_theme_lay == '0.8'){
		$vw_sports_custom_css .='#slider img{';
			$vw_sports_custom_css .='opacity:0.8';
		$vw_sports_custom_css .='}';
		}else if($vw_sports_theme_lay == '0.9'){
		$vw_sports_custom_css .='#slider img{';
			$vw_sports_custom_css .='opacity:0.9';
		$vw_sports_custom_css .='}';
		}

	/*---------------------- Slider Image Overlay ------------------------*/

	$vw_sports_slider_image_overlay = get_theme_mod('vw_sports_slider_image_overlay', true);
	if($vw_sports_slider_image_overlay == false){
		$vw_sports_custom_css .='#slider img{';
			$vw_sports_custom_css .='opacity:1;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_slider_image_overlay_color = get_theme_mod('vw_sports_slider_image_overlay_color', true);
	if($vw_sports_slider_image_overlay_color != false){
		$vw_sports_custom_css .='#slider .slide-image{';
			$vw_sports_custom_css .='background-color: '.esc_attr($vw_sports_slider_image_overlay_color).';';
		$vw_sports_custom_css .='}';
	}

	/*--------------------------- Menus settings -------------------*/

	// Header Background Color 
	$vw_sports_header_background_color = get_theme_mod('vw_sports_header_background_color');
	if($vw_sports_header_background_color != false){
		$vw_sports_custom_css .='#header{';
			$vw_sports_custom_css .='background-color: '.esc_attr($vw_sports_header_background_color).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_header_img_position = get_theme_mod('vw_sports_header_img_position','center top');
	if($vw_sports_header_img_position != false){
		$vw_sports_custom_css .='.home-page-header{';
			$vw_sports_custom_css .='background-position: '.esc_attr($vw_sports_header_img_position).'!important;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_navigation_menu_font_size = get_theme_mod('vw_sports_navigation_menu_font_size');
	if($vw_sports_navigation_menu_font_size != false){
		$vw_sports_custom_css .='.main-navigation a{';
			$vw_sports_custom_css .='font-size: '.esc_attr($vw_sports_navigation_menu_font_size).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_header_menus_color = get_theme_mod('vw_sports_header_menus_color');
	if($vw_sports_header_menus_color != false){
		$vw_sports_custom_css .='.main-navigation a{';
			$vw_sports_custom_css .='color: '.esc_attr($vw_sports_header_menus_color).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_header_menus_hover_color = get_theme_mod('vw_sports_header_menus_hover_color');
	if($vw_sports_header_menus_hover_color != false){
		$vw_sports_custom_css .='.main-navigation a:hover{';
			$vw_sports_custom_css .='color: '.esc_attr($vw_sports_header_menus_hover_color).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_header_submenus_color = get_theme_mod('vw_sports_header_submenus_color');
	if($vw_sports_header_submenus_color != false){
		$vw_sports_custom_css .='.main-navigation ul ul a{';
			$vw_sports_custom_css .='color: '.esc_attr($vw_sports_header_submenus_color).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_header_submenus_hover_color = get_theme_mod('vw_sports_header_submenus_hover_color');
	if($vw_sports_header_submenus_hover_color != false){
		$vw_sports_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$vw_sports_custom_css .='color: '.esc_attr($vw_sports_header_submenus_hover_color).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_menus_item = get_theme_mod( 'vw_sports_menus_item_style','None');
    if($vw_sports_menus_item == 'None'){
		$vw_sports_custom_css .='.main-navigation a{';
			$vw_sports_custom_css .='';
		$vw_sports_custom_css .='}';
	}else if($vw_sports_menus_item == 'Zoom In'){
		$vw_sports_custom_css .='.main-navigation a:hover{';
			$vw_sports_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color: #fff;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_navigation_menu_font_weight = get_theme_mod('vw_sports_navigation_menu_font_weight','500');
	if($vw_sports_navigation_menu_font_weight != false){
		$vw_sports_custom_css .='.main-navigation a{';
			$vw_sports_custom_css .='font-weight: '.esc_attr($vw_sports_navigation_menu_font_weight).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_theme_lay = get_theme_mod( 'vw_sports_menu_text_transform','Uppercase');
	if($vw_sports_theme_lay == 'Capitalize'){
		$vw_sports_custom_css .='.main-navigation a{';
			$vw_sports_custom_css .='text-transform:Capitalize;';
		$vw_sports_custom_css .='}';
	}
	if($vw_sports_theme_lay == 'Lowercase'){
		$vw_sports_custom_css .='.main-navigation a{';
			$vw_sports_custom_css .='text-transform:Lowercase;';
		$vw_sports_custom_css .='}';
	}
	if($vw_sports_theme_lay == 'Uppercase'){
		$vw_sports_custom_css .='.main-navigation a{';
			$vw_sports_custom_css .='text-transform:Uppercase;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_single_blog_post_navigation_show_hide = get_theme_mod('vw_sports_single_blog_post_navigation_show_hide',true);
	if($vw_sports_single_blog_post_navigation_show_hide != true){
		$vw_sports_custom_css .='.post-navigation{';
			$vw_sports_custom_css .='display: none;';
		$vw_sports_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_sports_slider = get_theme_mod('vw_sports_slider_arrows');
	if($vw_sports_slider == false){
		$vw_sports_custom_css .='.home-page-header, .page-template-custom-home-page .homepageheader{';
			$vw_sports_custom_css .='padding:25px 0 0;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='.admin-bar .home-page-header, .page-template-custom-home-page.admin-bar .homepageheader{';
			$vw_sports_custom_css .='padding:50px 0 0;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='.admin-bar .home-page-header{';
			$vw_sports_custom_css .='margin-top: 0px;';
		$vw_sports_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$vw_sports_resp_slider = get_theme_mod( 'vw_sports_resp_slider_hide_show',true);
	if($vw_sports_resp_slider == true && get_theme_mod( 'vw_sports_slider_arrows', false) == false){
    	$vw_sports_custom_css .='#slider{';
			$vw_sports_custom_css .='display:none;';
		$vw_sports_custom_css .='} ';
	}
    if($vw_sports_resp_slider == true){
    	$vw_sports_custom_css .='@media screen and (max-width:575px) {';
		$vw_sports_custom_css .='#slider{';
			$vw_sports_custom_css .='display:block;';
		$vw_sports_custom_css .='} }';
	}else if($vw_sports_resp_slider == false){
		$vw_sports_custom_css .='@media screen and (max-width:575px) {';
		$vw_sports_custom_css .='#slider{';
			$vw_sports_custom_css .='display:none;';
		$vw_sports_custom_css .='} }';
		$vw_sports_custom_css .='@media screen and (max-width:575px){';
			$vw_sports_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
				$vw_sports_custom_css .='margin-top: 45px;';
			$vw_sports_custom_css .='} }';
	}

	$vw_sports_resp_sidebar = get_theme_mod( 'vw_sports_sidebar_hide_show',true);
    if($vw_sports_resp_sidebar == true){
    	$vw_sports_custom_css .='@media screen and (max-width:575px) {';
		$vw_sports_custom_css .='#sidebar{';
			$vw_sports_custom_css .='display:block;';
		$vw_sports_custom_css .='} }';
	}else if($vw_sports_resp_sidebar == false){
		$vw_sports_custom_css .='@media screen and (max-width:575px) {';
		$vw_sports_custom_css .='#sidebar{';
			$vw_sports_custom_css .='display:none;';
		$vw_sports_custom_css .='} }';
	}

	$vw_sports_resp_scroll_top = get_theme_mod( 'vw_sports_resp_scroll_top_hide_show',true);
	if($vw_sports_resp_scroll_top == true && get_theme_mod( 'vw_sports_hide_show_scroll',true) == false){
    	$vw_sports_custom_css .='.scrollup i{';
			$vw_sports_custom_css .='visibility:hidden !important;';
		$vw_sports_custom_css .='} ';
	}
    if($vw_sports_resp_scroll_top == true){
    	$vw_sports_custom_css .='@media screen and (max-width:575px) {';
		$vw_sports_custom_css .='.scrollup i{';
			$vw_sports_custom_css .='visibility:visible !important;';
		$vw_sports_custom_css .='} }';
	}else if($vw_sports_resp_scroll_top == false){
		$vw_sports_custom_css .='@media screen and (max-width:575px){';
		$vw_sports_custom_css .='.scrollup i{';
			$vw_sports_custom_css .='visibility:hidden !important;';
		$vw_sports_custom_css .='} }';
	}

	$vw_sports_resp_menu_toggle_btn_bg_color = get_theme_mod('vw_sports_resp_menu_toggle_btn_bg_color');
	if($vw_sports_resp_menu_toggle_btn_bg_color != false){
		$vw_sports_custom_css .='.toggle-nav i{';
			$vw_sports_custom_css .='background: '.esc_attr($vw_sports_resp_menu_toggle_btn_bg_color).';';
		$vw_sports_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_sports_theme_lay = get_theme_mod( 'vw_sports_blog_layout_option','Default');
    if($vw_sports_theme_lay == 'Default'){
		$vw_sports_custom_css .='.post-main-box{';
			$vw_sports_custom_css .='';
		$vw_sports_custom_css .='}';
	}else if($vw_sports_theme_lay == 'Center'){
		$vw_sports_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$vw_sports_custom_css .='text-align:center;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='.post-info{';
			$vw_sports_custom_css .='margin-top:10px;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='.post-info hr{';
			$vw_sports_custom_css .='margin:15px auto;';
		$vw_sports_custom_css .='}';
	}else if($vw_sports_theme_lay == 'Left'){
		$vw_sports_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_sports_custom_css .='text-align:Left;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='.post-info hr{';
			$vw_sports_custom_css .='margin-bottom:10px;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='.post-main-box h2{';
			$vw_sports_custom_css .='margin-top:10px;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='.service-text .more-btn{';
			$vw_sports_custom_css .='display:inline-block;';
		$vw_sports_custom_css .='}';
	}

	/*--------------------- Blog Page Posts -------------------*/

	$vw_sports_blog_page_posts_settings = get_theme_mod( 'vw_sports_blog_page_posts_settings','Into Blocks');
    if($vw_sports_blog_page_posts_settings == 'Without Blocks'){
		$vw_sports_custom_css .='.post-main-box{';
			$vw_sports_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$vw_sports_custom_css .='}';
	}

	/*--------------------- Grid Posts Posts -------------------*/

	$vw_sports_display_grid_posts_settings = get_theme_mod( 'vw_sports_display_grid_posts_settings','Into Blocks');
    if($vw_sports_display_grid_posts_settings == 'Without Blocks'){
		$vw_sports_custom_css .='.grid-post-main-box{';
			$vw_sports_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$vw_sports_custom_css .='}';
	}


	// featured image dimention
	$vw_sports_blog_post_featured_image_dimension = get_theme_mod('vw_sports_blog_post_featured_image_dimension', 'default');
	$vw_sports_blog_post_featured_image_custom_width = get_theme_mod('vw_sports_blog_post_featured_image_custom_width',250);
	$vw_sports_blog_post_featured_image_custom_height = get_theme_mod('vw_sports_blog_post_featured_image_custom_height',250);
	if($vw_sports_blog_post_featured_image_dimension == 'custom'){
		$vw_sports_custom_css .='.post-main-box img{';
			$vw_sports_custom_css .='width: '.esc_attr($vw_sports_blog_post_featured_image_custom_width).'; height: '.esc_attr($vw_sports_blog_post_featured_image_custom_height).';';
		$vw_sports_custom_css .='}';
	}

	/*---------------- Posts Settings ------------------*/

	$vw_sports_featured_image_border_radius = get_theme_mod('vw_sports_featured_image_border_radius', 0);
	if($vw_sports_featured_image_border_radius != false){
		$vw_sports_custom_css .='.box-image img, .feature-box img{';
			$vw_sports_custom_css .='border-radius: '.esc_attr($vw_sports_featured_image_border_radius).'px;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_featured_image_box_shadow = get_theme_mod('vw_sports_featured_image_box_shadow',0);
	if($vw_sports_featured_image_box_shadow != false){
		$vw_sports_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$vw_sports_custom_css .='box-shadow: '.esc_attr($vw_sports_featured_image_box_shadow).'px '.esc_attr($vw_sports_featured_image_box_shadow).'px '.esc_attr($vw_sports_featured_image_box_shadow).'px #cccccc;';
		$vw_sports_custom_css .='}';
	}

	/*---------------- Grid Posts Settings ------------------*/

	$vw_sports_grid_featured_image_border_radius = get_theme_mod('vw_sports_grid_featured_image_border_radius', 0);
	if($vw_sports_grid_featured_image_border_radius != false){
		$vw_sports_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img{';
			$vw_sports_custom_css .='border-radius: '.esc_attr($vw_sports_grid_featured_image_border_radius).'px;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_grid_featured_image_box_shadow = get_theme_mod('vw_sports_grid_featured_image_box_shadow',0);
	if($vw_sports_grid_featured_image_box_shadow != false){
		$vw_sports_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img, #content-vw img{';
			$vw_sports_custom_css .='box-shadow: '.esc_attr($vw_sports_grid_featured_image_box_shadow).'px '.esc_attr($vw_sports_grid_featured_image_box_shadow).'px '.esc_attr($vw_sports_grid_featured_image_box_shadow).'px #cccccc;';
		$vw_sports_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_sports_button_letter_spacing = get_theme_mod('vw_sports_button_letter_spacing',14);
	$vw_sports_custom_css .='.post-main-box .more-btn a{';
		$vw_sports_custom_css .='letter-spacing: '.esc_attr($vw_sports_button_letter_spacing).';';
	$vw_sports_custom_css .='}';

	$vw_sports_button_border_radius = get_theme_mod('vw_sports_button_border_radius');
	if($vw_sports_button_border_radius != false){
		$vw_sports_custom_css .='.post-main-box .more-btn a{';
			$vw_sports_custom_css .='border-radius: '.esc_attr($vw_sports_button_border_radius).'px;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_button_top_bottom_padding = get_theme_mod('vw_sports_button_top_bottom_padding');
	$vw_sports_button_left_right_padding = get_theme_mod('vw_sports_button_left_right_padding');
	if($vw_sports_button_top_bottom_padding != false || $vw_sports_button_left_right_padding != false){
		$vw_sports_custom_css .='.post-main-box .more-btn a{';
			$vw_sports_custom_css .='padding-top: '.esc_attr($vw_sports_button_top_bottom_padding).'!important; padding-bottom: '.esc_attr($vw_sports_button_top_bottom_padding).'!important;padding-left: '.esc_attr($vw_sports_button_left_right_padding).'!important;padding-right: '.esc_attr($vw_sports_button_left_right_padding).'!important;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_button_font_size = get_theme_mod('vw_sports_button_font_size',14);
	$vw_sports_custom_css .='.more-btn a{';
		$vw_sports_custom_css .='font-size: '.esc_attr($vw_sports_button_font_size).';';
	$vw_sports_custom_css .='}';

	$vw_sports_theme_lay = get_theme_mod( 'vw_sports_button_text_transform','Uppercase');
	if($vw_sports_theme_lay == 'Capitalize'){
		$vw_sports_custom_css .='.more-btn a{';
			$vw_sports_custom_css .='text-transform:Capitalize;';
		$vw_sports_custom_css .='}';
	}
	if($vw_sports_theme_lay == 'Lowercase'){
		$vw_sports_custom_css .='.more-btn a{';
			$vw_sports_custom_css .='text-transform:Lowercase;';
		$vw_sports_custom_css .='}';
	}
	if($vw_sports_theme_lay == 'Uppercase'){
		$vw_sports_custom_css .='.more-btn a{';
			$vw_sports_custom_css .='text-transform:Uppercase;';
		$vw_sports_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/
	$vw_sports_copyright_background_color = get_theme_mod('vw_sports_copyright_background_color');
	if($vw_sports_copyright_background_color != false){
		$vw_sports_custom_css .='#footer-2{';
			$vw_sports_custom_css .='background-color: '.esc_attr($vw_sports_copyright_background_color).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_footer_padding = get_theme_mod('vw_sports_footer_padding');
	if($vw_sports_footer_padding != false){
		$vw_sports_custom_css .='#footer{';
			$vw_sports_custom_css .='padding: '.esc_attr($vw_sports_footer_padding).' 0;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_footer_background_color = get_theme_mod('vw_sports_footer_background_color');
	if($vw_sports_footer_background_color != false){
		$vw_sports_custom_css .='#footer{';
			$vw_sports_custom_css .='background-color: '.esc_attr($vw_sports_footer_background_color).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_copyright_font_size = get_theme_mod('vw_sports_copyright_font_size');
	if($vw_sports_copyright_font_size != false){
		$vw_sports_custom_css .='.copyright p{';
			$vw_sports_custom_css .='font-size: '.esc_attr($vw_sports_copyright_font_size).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_footer_icon = get_theme_mod('vw_sports_footer_icon');
	if($vw_sports_footer_icon == false){
		$vw_sports_custom_css .='.copyright p{';
			$vw_sports_custom_css .='width:100%; text-align:center; float:none;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_copyright_alignment = get_theme_mod('vw_sports_copyright_alignment');
	if($vw_sports_copyright_alignment != false){
		$vw_sports_custom_css .='.copyright p{';
			$vw_sports_custom_css .='text-align: '.esc_attr($vw_sports_copyright_alignment).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_footer_background_image = get_theme_mod('vw_sports_footer_background_image');
	if($vw_sports_footer_background_image != false){
		$vw_sports_custom_css .='#footer{';
			$vw_sports_custom_css .='background: url('.esc_attr($vw_sports_footer_background_image).');';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_theme_lay = get_theme_mod( 'vw_sports_img_footer','scroll');
	if($vw_sports_theme_lay == 'fixed'){
		$vw_sports_custom_css .='#footer{';
			$vw_sports_custom_css .='background-attachment: fixed !important;';
		$vw_sports_custom_css .='}';
	}elseif ($vw_sports_theme_lay == 'scroll'){
		$vw_sports_custom_css .='#footer{';
			$vw_sports_custom_css .='background-attachment: scroll !important;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_footer_img_position = get_theme_mod('vw_sports_footer_img_position','center center');
	if($vw_sports_footer_img_position != false){
		$vw_sports_custom_css .='#footer{';
			$vw_sports_custom_css .='background-position: '.esc_attr($vw_sports_footer_img_position).'!important;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_footer_widgets_heading = get_theme_mod( 'vw_sports_footer_widgets_heading','Left');
    if($vw_sports_footer_widgets_heading == 'Left'){
		$vw_sports_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$vw_sports_custom_css .='text-align: left;';
		$vw_sports_custom_css .='}';
	}else if($vw_sports_footer_widgets_heading == 'Center'){
		$vw_sports_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$vw_sports_custom_css .='text-align: center;';
		$vw_sports_custom_css .='}';
	}else if($vw_sports_footer_widgets_heading == 'Right'){
		$vw_sports_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$vw_sports_custom_css .='text-align: right;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_footer_widgets_content = get_theme_mod( 'vw_sports_footer_widgets_content','Left');
    if($vw_sports_footer_widgets_content == 'Left'){
		$vw_sports_custom_css .='#footer .widget{';
		$vw_sports_custom_css .='text-align: left;';
		$vw_sports_custom_css .='}';
	}else if($vw_sports_footer_widgets_content == 'Center'){
		$vw_sports_custom_css .='#footer .widget{';
			$vw_sports_custom_css .='text-align: center;';
		$vw_sports_custom_css .='}';
	}else if($vw_sports_footer_widgets_content == 'Right'){
		$vw_sports_custom_css .='#footer .widget{';
			$vw_sports_custom_css .='text-align: right;';
		$vw_sports_custom_css .='}';
	}


	/*---------------- Single Blog Page Settings ------------------*/

	$vw_sports_single_blog_comment_title = get_theme_mod('vw_sports_single_blog_comment_title', 'Leave a Reply');
	if($vw_sports_single_blog_comment_title == ''){
		$vw_sports_custom_css .='#comments h2#reply-title {';
			$vw_sports_custom_css .='display: none;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_single_blog_comment_button_text = get_theme_mod('vw_sports_single_blog_comment_button_text', 'Post Comment');
	if($vw_sports_single_blog_comment_button_text == ''){
		$vw_sports_custom_css .='#comments p.form-submit {';
			$vw_sports_custom_css .='display: none;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_comment_width = get_theme_mod('vw_sports_single_blog_comment_width');
	if($vw_sports_comment_width != false){
		$vw_sports_custom_css .='#comments textarea{';
			$vw_sports_custom_css .='width: '.esc_attr($vw_sports_comment_width).';';
		$vw_sports_custom_css .='}';
	}

	/*------------------ Woocommerce Settings -------------------*/

	$vw_sports_related_product_show_hide = get_theme_mod('vw_sports_related_product_show_hide',true);
	if($vw_sports_related_product_show_hide != true){
		$vw_sports_custom_css .='.related.products{';
			$vw_sports_custom_css .='display: none;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_products_btn_padding_top_bottom = get_theme_mod('vw_sports_products_btn_padding_top_bottom');
	if($vw_sports_products_btn_padding_top_bottom != false){
		$vw_sports_custom_css .='.woocommerce a.button{';
			$vw_sports_custom_css .='padding-top: '.esc_attr($vw_sports_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($vw_sports_products_btn_padding_top_bottom).' !important;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_products_btn_padding_left_right = get_theme_mod('vw_sports_products_btn_padding_left_right');
	if($vw_sports_products_btn_padding_left_right != false){
		$vw_sports_custom_css .='.woocommerce a.button{';
			$vw_sports_custom_css .='padding-left: '.esc_attr($vw_sports_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($vw_sports_products_btn_padding_left_right).' !important;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_products_button_border_radius = get_theme_mod('vw_sports_products_button_border_radius', 0);
	if($vw_sports_products_button_border_radius != false){
		$vw_sports_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$vw_sports_custom_css .='border-radius: '.esc_attr($vw_sports_products_button_border_radius).'px;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_woocommerce_sale_font_size = get_theme_mod('vw_sports_woocommerce_sale_font_size');
	if($vw_sports_woocommerce_sale_font_size != false){
		$vw_sports_custom_css .='.woocommerce span.onsale{';
			$vw_sports_custom_css .='font-size: '.esc_attr($vw_sports_woocommerce_sale_font_size).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_woocommerce_sale_position = get_theme_mod( 'vw_sports_woocommerce_sale_position','left');
    if($vw_sports_woocommerce_sale_position == 'left'){
		$vw_sports_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_sports_custom_css .='left: 0px !important; right: auto !important;';
		$vw_sports_custom_css .='}';
	}else if($vw_sports_woocommerce_sale_position == 'right'){
		$vw_sports_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_sports_custom_css .='left: auto !important; right: 0 !important;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_woocommerce_sale_padding_top_bottom = get_theme_mod('vw_sports_woocommerce_sale_padding_top_bottom');
	if($vw_sports_woocommerce_sale_padding_top_bottom != false){
		$vw_sports_custom_css .='.woocommerce span.onsale{';
			$vw_sports_custom_css .='padding-top: '.esc_attr($vw_sports_woocommerce_sale_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_sports_woocommerce_sale_padding_top_bottom).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_woocommerce_sale_padding_left_right = get_theme_mod('vw_sports_woocommerce_sale_padding_left_right');
	if($vw_sports_woocommerce_sale_padding_left_right != false){
		$vw_sports_custom_css .='.woocommerce span.onsale{';
			$vw_sports_custom_css .='padding-left: '.esc_attr($vw_sports_woocommerce_sale_padding_left_right).'; padding-right: '.esc_attr($vw_sports_woocommerce_sale_padding_left_right).';';
		$vw_sports_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$vw_sports_logo_padding = get_theme_mod('vw_sports_logo_padding');
	if($vw_sports_logo_padding != false){
		$vw_sports_custom_css .='.logo{';
			$vw_sports_custom_css .='padding: '.esc_attr($vw_sports_logo_padding).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_logo_margin = get_theme_mod('vw_sports_logo_margin');
	if($vw_sports_logo_margin != false){
		$vw_sports_custom_css .='.logo{';
			$vw_sports_custom_css .='margin: '.esc_attr($vw_sports_logo_margin).';';
		$vw_sports_custom_css .='}';
	}

	// Site title Font Size
	$vw_sports_site_title_font_size = get_theme_mod('vw_sports_site_title_font_size');
	if($vw_sports_site_title_font_size != false){
		$vw_sports_custom_css .='.logo-inner p.site-title, .logo-inner h1{';
			$vw_sports_custom_css .='font-size: '.esc_attr($vw_sports_site_title_font_size).';';
		$vw_sports_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_sports_site_tagline_font_size = get_theme_mod('vw_sports_site_tagline_font_size');
	if($vw_sports_site_tagline_font_size != false){
		$vw_sports_custom_css .='.logo-inner p.site-description{';
			$vw_sports_custom_css .='font-size: '.esc_attr($vw_sports_site_tagline_font_size).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_site_title_color = get_theme_mod('vw_sports_site_title_color');
	if($vw_sports_site_title_color != false){
		$vw_sports_custom_css .='p.site-title a{';
			$vw_sports_custom_css .='color: '.esc_attr($vw_sports_site_title_color).'!important;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_site_tagline_color = get_theme_mod('vw_sports_site_tagline_color');
	if($vw_sports_site_tagline_color != false){
		$vw_sports_custom_css .='.logo p.site-description{';
			$vw_sports_custom_css .='color: '.esc_attr($vw_sports_site_tagline_color).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_logo_width = get_theme_mod('vw_sports_logo_width');
	if($vw_sports_logo_width != false){
		$vw_sports_custom_css .='.logo img{';
			$vw_sports_custom_css .='width: '.esc_attr($vw_sports_logo_width).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_logo_height = get_theme_mod('vw_sports_logo_height');
	if($vw_sports_logo_height != false){
		$vw_sports_custom_css .='.logo img{';
			$vw_sports_custom_css .='height: '.esc_attr($vw_sports_logo_height).';';
		$vw_sports_custom_css .='}';
	}

	// Woocommerce img

	$vw_sports_shop_featured_image_border_radius = get_theme_mod('vw_sports_shop_featured_image_border_radius', 0);
	if($vw_sports_shop_featured_image_border_radius != false){
		$vw_sports_custom_css .='.woocommerce ul.products li.product a img{';
			$vw_sports_custom_css .='border-radius: '.esc_attr($vw_sports_shop_featured_image_border_radius).'px;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_shop_featured_image_box_shadow = get_theme_mod('vw_sports_shop_featured_image_box_shadow');
	if($vw_sports_shop_featured_image_box_shadow != false){
		$vw_sports_custom_css .='.woocommerce ul.products li.product a img{';
				$vw_sports_custom_css .='box-shadow: '.esc_attr($vw_sports_shop_featured_image_box_shadow).'px '.esc_attr($vw_sports_shop_featured_image_box_shadow).'px '.esc_attr($vw_sports_shop_featured_image_box_shadow).'px #ddd;';
		$vw_sports_custom_css .='}';
	}


	/*------------------ Preloader Background Color  -------------------*/

	$vw_sports_preloader_bg_color = get_theme_mod('vw_sports_preloader_bg_color');
	if($vw_sports_preloader_bg_color != false){
		$vw_sports_custom_css .='#preloader{';
			$vw_sports_custom_css .='background-color: '.esc_attr($vw_sports_preloader_bg_color).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_preloader_border_color = get_theme_mod('vw_sports_preloader_border_color');
	if($vw_sports_preloader_border_color != false){
		$vw_sports_custom_css .='.loader-line{';
			$vw_sports_custom_css .='border-color: '.esc_attr($vw_sports_preloader_border_color).'!important;';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_preloader_bg_img = get_theme_mod('vw_sports_preloader_bg_img');
	if($vw_sports_preloader_bg_img != false){
		$vw_sports_custom_css .='#preloader{';
			$vw_sports_custom_css .='background: url('.esc_attr($vw_sports_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$vw_sports_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_sports_scroll_to_top_font_size = get_theme_mod('vw_sports_scroll_to_top_font_size');
	if($vw_sports_scroll_to_top_font_size != false){
		$vw_sports_custom_css .='.scrollup i{';
			$vw_sports_custom_css .='font-size: '.esc_attr($vw_sports_scroll_to_top_font_size).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_scroll_to_top_padding = get_theme_mod('vw_sports_scroll_to_top_padding');
	$vw_sports_scroll_to_top_padding = get_theme_mod('vw_sports_scroll_to_top_padding');
	if($vw_sports_scroll_to_top_padding != false){
		$vw_sports_custom_css .='.scrollup i{';
			$vw_sports_custom_css .='padding-top: '.esc_attr($vw_sports_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_sports_scroll_to_top_padding).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_scroll_to_top_width = get_theme_mod('vw_sports_scroll_to_top_width');
	if($vw_sports_scroll_to_top_width != false){
		$vw_sports_custom_css .='.scrollup i{';
			$vw_sports_custom_css .='width: '.esc_attr($vw_sports_scroll_to_top_width).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_scroll_to_top_height = get_theme_mod('vw_sports_scroll_to_top_height');
	if($vw_sports_scroll_to_top_height != false){
		$vw_sports_custom_css .='.scrollup i{';
			$vw_sports_custom_css .='height: '.esc_attr($vw_sports_scroll_to_top_height).';';
		$vw_sports_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_sports_social_icon_font_size = get_theme_mod('vw_sports_social_icon_font_size');
	if($vw_sports_social_icon_font_size != false){
		$vw_sports_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_sports_custom_css .='font-size: '.esc_attr($vw_sports_social_icon_font_size).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_social_icon_padding = get_theme_mod('vw_sports_social_icon_padding');
	if($vw_sports_social_icon_padding != false){
		$vw_sports_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_sports_custom_css .='padding: '.esc_attr($vw_sports_social_icon_padding).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_social_icon_width = get_theme_mod('vw_sports_social_icon_width');
	if($vw_sports_social_icon_width != false){
		$vw_sports_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_sports_custom_css .='width: '.esc_attr($vw_sports_social_icon_width).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_social_icon_height = get_theme_mod('vw_sports_social_icon_height');
	if($vw_sports_social_icon_height != false){
		$vw_sports_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_sports_custom_css .='height: '.esc_attr($vw_sports_social_icon_height).';';
		$vw_sports_custom_css .='}';
	}

	$vw_sports_social_icon_border_radius = get_theme_mod('vw_sports_social_icon_border_radius');
	if($vw_sports_social_icon_border_radius != false){
		$vw_sports_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_sports_custom_css .='border-radius: '.esc_attr($vw_sports_social_icon_border_radius).'px;';
		$vw_sports_custom_css .='}';
	}

	/*---------------------------Footer Style -------------------*/

	$vw_sports_theme_lay = get_theme_mod( 'vw_sports_footer_template','vw_sports-footer-one');
    if($vw_sports_theme_lay == 'vw_sports-footer-one'){
		$vw_sports_custom_css .='#footer{';
			$vw_sports_custom_css .='';
		$vw_sports_custom_css .='}';

	}else if($vw_sports_theme_lay == 'vw_sports-footer-two'){
		$vw_sports_custom_css .='#footer{';
			$vw_sports_custom_css .='background: linear-gradient(to right, #f9f8ff, #dedafa);';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$vw_sports_custom_css .='color:#000;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='#footer ul li::before{';
			$vw_sports_custom_css .='background:#000;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$vw_sports_custom_css .='border: 1px solid #000;';
		$vw_sports_custom_css .='}';

	}else if($vw_sports_theme_lay == 'vw_sports-footer-three'){
		$vw_sports_custom_css .='#footer{';
			$vw_sports_custom_css .='background: #232524;';
		$vw_sports_custom_css .='}';
	}
	else if($vw_sports_theme_lay == 'vw_sports-footer-four'){
		$vw_sports_custom_css .='#footer{';
			$vw_sports_custom_css .='background: #f7f7f7;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$vw_sports_custom_css .='color:#000;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='#footer ul li::before{';
			$vw_sports_custom_css .='background:#000;';
		$vw_sports_custom_css .='}';
		$vw_sports_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$vw_sports_custom_css .='border: 1px solid #000;';
		$vw_sports_custom_css .='}';
	}
	else if($vw_sports_theme_lay == 'vw_sports-footer-five'){
		$vw_sports_custom_css .='#footer{';
			$vw_sports_custom_css .='background: linear-gradient(to right, #01093a, #2d0b00);';
		$vw_sports_custom_css .='}';
	}