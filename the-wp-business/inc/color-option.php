<?php
	$the_wp_business_theme_color = get_theme_mod('the_wp_business_theme_color');
	$the_wp_business_custom_css = '';

	/*------------------ Theme Color Option -----------*/
	if ($the_wp_business_theme_color) {
		$the_wp_business_custom_css .= ':root {';
		$the_wp_business_custom_css .= '--primary-color: ' . esc_attr($the_wp_business_theme_color) . ' !important;';
		$the_wp_business_custom_css .= '} ';
	}

	// Layout Options
	$the_wp_business_theme_layout = get_theme_mod( 'the_wp_business_theme_layout_options','Default Theme');
    if($the_wp_business_theme_layout == 'Default Theme'){
		$the_wp_business_custom_css .='body{';
			$the_wp_business_custom_css .='max-width: 100%;';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_theme_layout == 'Container Theme'){
		$the_wp_business_custom_css .='body{';
			$the_wp_business_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='.page-template-custom-front-page #header{';
			$the_wp_business_custom_css .='width: 97.7%';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='
		@media screen and (min-width:1000px) and (max-width:1024px){
			.page-template-custom-front-page #header{';
			$the_wp_business_custom_css .='width:97%;';
		$the_wp_business_custom_css .='} }';
		$the_wp_business_custom_css .='
		@media screen and (min-width:720px) and (max-width:1000px){
			.page-template-custom-front-page #header{';
			$the_wp_business_custom_css .='width:96.1%;';
		$the_wp_business_custom_css .='} }';
		$the_wp_business_custom_css .='
		@media screen and  (max-width:720px){
			.page-template-custom-front-page #header{';
			$the_wp_business_custom_css .='width:100%;';
		$the_wp_business_custom_css .='} }';
	}else if($the_wp_business_theme_layout == 'Box Container Theme'){
		$the_wp_business_custom_css .='body{';
			$the_wp_business_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='.page-template-custom-front-page #header{';
			$the_wp_business_custom_css .='width: 86.4%;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='
		@media screen and (min-width:1000px) and (max-width:1024px){
			.page-template-custom-front-page #header{';
			$the_wp_business_custom_css .='width:97% ;';
		$the_wp_business_custom_css .='} }';
		$the_wp_business_custom_css .='
		@media screen and (min-width:720px) and (max-width:1000px){
			.page-template-custom-front-page #header{';
			$the_wp_business_custom_css .='width:96.1%;';
		$the_wp_business_custom_css .='} }';
		$the_wp_business_custom_css .='
		@media screen and  (max-width:720px){
			.page-template-custom-front-page #header{';
			$the_wp_business_custom_css .='width:100%;';
		$the_wp_business_custom_css .='} }';
	}
	// Breadcrumb Alignmennt
	$the_wp_business_single_page_breadcrumb_alignment = get_theme_mod('the_wp_business_single_page_breadcrumb_alignment', 'Left');
	if($the_wp_business_single_page_breadcrumb_alignment == 'Center' ){
		$the_wp_business_custom_css .='.bradcrumbs{';
			$the_wp_business_custom_css .='text-align: '. $the_wp_business_single_page_breadcrumb_alignment .';';
		$the_wp_business_custom_css .='}';
	}elseif($the_wp_business_single_page_breadcrumb_alignment == 'Left' ){
		$the_wp_business_custom_css .='.bradcrumbs{';
			$the_wp_business_custom_css .=' text-align: '. $the_wp_business_single_page_breadcrumb_alignment .';';
		$the_wp_business_custom_css .='}';
	}elseif($the_wp_business_single_page_breadcrumb_alignment == 'Right' ){
		$the_wp_business_custom_css .='.bradcrumbs{';
			$the_wp_business_custom_css .='text-align: '. $the_wp_business_single_page_breadcrumb_alignment .';';
		$the_wp_business_custom_css .='}';
	}
	/*--------------------------- Slider Opacity -------------------*/
	$the_wp_business_slider_layout = get_theme_mod( 'the_wp_business_slider_opacity_color','0.7');
	if($the_wp_business_slider_layout == '0'){
		$the_wp_business_custom_css .='#slider img{';
			$the_wp_business_custom_css .='opacity:0';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_slider_layout == '0.1'){
		$the_wp_business_custom_css .='#slider img{';
			$the_wp_business_custom_css .='opacity:0.1';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_slider_layout == '0.2'){
		$the_wp_business_custom_css .='#slider img{';
			$the_wp_business_custom_css .='opacity:0.2';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_slider_layout == '0.3'){
		$the_wp_business_custom_css .='#slider img{';
			$the_wp_business_custom_css .='opacity:0.3';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_slider_layout == '0.4'){
		$the_wp_business_custom_css .='#slider img{';
			$the_wp_business_custom_css .='opacity:0.4';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_slider_layout == '0.5'){
		$the_wp_business_custom_css .='#slider img{';
			$the_wp_business_custom_css .='opacity:0.5';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_slider_layout == '0.6'){
		$the_wp_business_custom_css .='#slider img{';
			$the_wp_business_custom_css .='opacity:0.6';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_slider_layout == '0.7'){
		$the_wp_business_custom_css .='#slider img{';
			$the_wp_business_custom_css .='opacity:0.7';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_slider_layout == '0.8'){
		$the_wp_business_custom_css .='#slider img{';
			$the_wp_business_custom_css .='opacity:0.8';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_slider_layout == '0.9'){
		$the_wp_business_custom_css .='#slider img{';
			$the_wp_business_custom_css .='opacity:0.9';
		$the_wp_business_custom_css .='}';
	}

	/*---------------Slider Content Layout -------------------*/
	$the_wp_business_slider_layout = get_theme_mod( 'the_wp_business_slider_alignment_option','Center Align');
    if($the_wp_business_slider_layout == 'Left Align'){
    	$the_wp_business_custom_css .='@media screen and (min-width:721px) {';
		$the_wp_business_custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$the_wp_business_custom_css .='text-align:left;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='#slider .inner_carousel p{';
		$the_wp_business_custom_css .='padding-left:0!important;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='#slider .carousel-caption{';
		$the_wp_business_custom_css .='left:15%; right:50%;';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_slider_layout == 'Center Align'){
		$the_wp_business_custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$the_wp_business_custom_css .='text-align:center;';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_slider_layout == 'Right Align'){
		$the_wp_business_custom_css .='@media screen and (min-width:721px) {';
		$the_wp_business_custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$the_wp_business_custom_css .='text-align:right;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='#slider .inner_carousel p{';
		$the_wp_business_custom_css .='padding-right:0!important;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='#slider .carousel-caption{';
		$the_wp_business_custom_css .='left:50%; right:15%;';
		$the_wp_business_custom_css .='}';
	}

	// Slider Arrows hover color
	$the_wp_business_slider_arrows_hover_color = get_theme_mod('the_wp_business_slider_arrows_hover_color','var(--primary-color)');
	$the_wp_business_custom_css .='#slider .carousel-control-prev-icon:hover,#slider .carousel-control-next-icon:hover{';
			$the_wp_business_custom_css .='color: '.esc_attr($the_wp_business_slider_arrows_hover_color).' !important;';
	$the_wp_business_custom_css .='}';

	/*--------- Preloader Color Option -------*/
	$the_wp_business_preloader_color = get_theme_mod('the_wp_business_preloader_color');

	if($the_wp_business_preloader_color != false){
		$the_wp_business_custom_css .=' .tg-loader{';
			$the_wp_business_custom_css .='border-color: '.esc_attr($the_wp_business_preloader_color).';';
		$the_wp_business_custom_css .='} ';
		$the_wp_business_custom_css .=' .tg-loader-inner, .preloader .preloader-container .animated-preloader, .preloader .preloader-container .animated-preloader:before{';
			$the_wp_business_custom_css .='background-color: '.esc_attr($the_wp_business_preloader_color).';';
		$the_wp_business_custom_css .='} ';
	}

	$the_wp_business_preloader_bg_color = get_theme_mod('the_wp_business_preloader_bg_color');

	if($the_wp_business_preloader_bg_color != false){
		$the_wp_business_custom_css .=' #overlayer, .preloader{';
			$the_wp_business_custom_css .='background-color: '.esc_attr($the_wp_business_preloader_bg_color).';';
		$the_wp_business_custom_css .='} ';
	}

	/*------------ Button Settings option-----------------*/
	$the_wp_business_top_button_padding = get_theme_mod('the_wp_business_top_button_padding');
	$the_wp_business_bottom_button_padding = get_theme_mod('the_wp_business_bottom_button_padding');
	$the_wp_business_left_button_padding = get_theme_mod('the_wp_business_left_button_padding');
	$the_wp_business_right_button_padding = get_theme_mod('the_wp_business_right_button_padding');
	if($the_wp_business_top_button_padding != false || $the_wp_business_bottom_button_padding != false || $the_wp_business_left_button_padding != false || $the_wp_business_right_button_padding != false){
		$the_wp_business_custom_css .='.read-more a, a.blogbutton-small, #comments input[type="submit"].submit, .read-btn a{';
			$the_wp_business_custom_css .='padding-top: '.esc_attr($the_wp_business_top_button_padding).'px; padding-bottom: '.esc_attr($the_wp_business_bottom_button_padding).'px; padding-left: '.esc_attr($the_wp_business_left_button_padding).'px; padding-right: '.esc_attr($the_wp_business_right_button_padding).'px; display:inline-block;';
		$the_wp_business_custom_css .='}';
	}

	$the_wp_business_button_border_radius = get_theme_mod('the_wp_business_button_border_radius',4);
	$the_wp_business_custom_css .='.read-more a, a.blogbutton-small, #comments input[type="submit"].submit, .hvr-sweep-to-right:before, .read-btn a{';
		$the_wp_business_custom_css .='border-radius: '.esc_attr($the_wp_business_button_border_radius).'px;';
	$the_wp_business_custom_css .='}';

	// button font weight
	$the_wp_business_button_font_weight = get_theme_mod('the_wp_business_button_font_weight');
  	$the_wp_business_custom_css .='.postbox a.blogbutton-small{';
    $the_wp_business_custom_css .='font-weight: '.esc_attr($the_wp_business_button_font_weight).';';
  	$the_wp_business_custom_css .='}';


  	// button text transform
  	$the_wp_business_button_text_transform = get_theme_mod('the_wp_business_button_text_transform');
  	if($the_wp_business_button_text_transform == 'uppercase' ){
    	$the_wp_business_custom_css .='.postbox a.blogbutton-small{';
      	$the_wp_business_custom_css .=' text-transform: uppercase;';
    	$the_wp_business_custom_css .='}';
  	}elseif($the_wp_business_button_text_transform == 'Capitalize' ){
    	$the_wp_business_custom_css .='.postbox a.blogbutton-small{';
      	$the_wp_business_custom_css .=' text-transform: Capitalize;';
    	$the_wp_business_custom_css .='}';
  	}elseif($the_wp_business_button_text_transform == 'lowercase' ){
    	$the_wp_business_custom_css .='.postbox a.blogbutton-small{';
      	$the_wp_business_custom_css .=' text-transform: lowercase;';
    	$the_wp_business_custom_css .='}';
  	}

	// Button letter spacing
	$the_wp_business_button_letter_spacing = get_theme_mod('the_wp_business_button_letter_spacing', '0');
	$the_wp_business_custom_css .='.postbox a.blogbutton-small{';
		$the_wp_business_custom_css .='letter-spacing: '.esc_attr($the_wp_business_button_letter_spacing).'px;';
	$the_wp_business_custom_css .='}';

	//Button hover effect
	$the_wp_business_button_hover_effect = get_theme_mod('the_wp_business_button_hover_effect', 'disable');
	if ($the_wp_business_button_hover_effect !== 'disable') {
		$the_wp_business_custom_css .= '.postbox a.blogbutton-small:hover {';
		switch ($the_wp_business_button_hover_effect) {
			case 'pulse':
				$the_wp_business_custom_css .= 'animation: pulse 0.5s ease-in-out;';
				break;
			case 'rubberBand':
				$the_wp_business_custom_css .= 'animation: rubberBand 0.5s ease-in-out;';
				break;
			case 'swing':
				$the_wp_business_custom_css .= 'animation: swing 0.5s ease-in-out;';
				break;
			case 'tada':
				$the_wp_business_custom_css .= 'animation: tada 0.5s ease-in-out;';
				break;
			case 'jello':
				$the_wp_business_custom_css .= 'animation: jello 0.5s ease-in-out;';
				break;
		}
		$the_wp_business_custom_css .= '}';
	}

	//keyframes for all animations
	$the_wp_business_custom_css .= '
	@keyframes pulse {
		0% { transform: scale(1); }
		50% { transform: scale(1.1); }
		100% { transform: scale(1); }
	}

	@keyframes rubberBand {
		0% { transform: scale(1); }
		30% { transform: scaleX(1.25) scaleY(0.75); }
		40% { transform: scaleX(0.75) scaleY(1.25); }
		50% { transform: scale(1); }
	}

	@keyframes swing {
		20% { transform: rotate(15deg); }
		40% { transform: rotate(-10deg); }
		60% { transform: rotate(5deg); }
		80% { transform: rotate(-5deg); }
		100% { transform: rotate(0deg); }
	}

	@keyframes tada {
		0% { transform: scale(1); }
		10%, 20% { transform: scale(0.9) rotate(-3deg); }
		30%, 50%, 70%, 90% { transform: scale(1.1) rotate(3deg); }
		40%, 60%, 80% { transform: scale(1.1) rotate(-3deg); }
		100% { transform: scale(1) rotate(0); }
	}

	@keyframes jello {
		0%, 11.1%, 100% { transform: none; }
		22.2% { transform: skewX(-12.5deg) skewY(-12.5deg); }
		33.3% { transform: skewX(6.25deg) skewY(6.25deg); }
		44.4% { transform: skewX(-3.125deg) skewY(-3.125deg); }
		55.5% { transform: skewX(1.5625deg) skewY(1.5625deg); }
		66.6% { transform: skewX(-0.78125deg) skewY(-0.78125deg); }
		77.7% { transform: skewX(0.390625deg) skewY(0.390625deg); }
		88.8% { transform: skewX(-0.1953125deg) skewY(-0.1953125deg); }
	}';

	//footer icon color
	$the_wp_business_footer_icon_color = get_theme_mod('the_wp_business_footer_icon_color');
	$the_wp_business_custom_css .='#footer .copyright a i{';
		$the_wp_business_custom_css .='color: '.esc_attr($the_wp_business_footer_icon_color).'!important;';
	$the_wp_business_custom_css .='}';

	/*----------- Copyright css -----*/
	$the_wp_business_copyright_top_padding = get_theme_mod('the_wp_business_top_copyright_padding');
	$the_wp_business_copyright_bottom_padding = get_theme_mod('the_wp_business_bottom_copyright_padding');
	if($the_wp_business_copyright_top_padding != false || $the_wp_business_copyright_bottom_padding != false){
		$the_wp_business_custom_css .='.inner{';
			$the_wp_business_custom_css .='padding-top: '.esc_attr($the_wp_business_copyright_top_padding).'px; padding-bottom: '.esc_attr($the_wp_business_copyright_bottom_padding).'px; ';
		$the_wp_business_custom_css .='}';
	} 

	$the_wp_business_copyright_alignment = get_theme_mod('the_wp_business_copyright_alignment', 'center');
	if($the_wp_business_copyright_alignment == 'center' ){
		$the_wp_business_custom_css .='#footer .copyright p{';
			$the_wp_business_custom_css .='text-align: '. $the_wp_business_copyright_alignment .';';
		$the_wp_business_custom_css .='}';
	}elseif($the_wp_business_copyright_alignment == 'left' ){
		$the_wp_business_custom_css .='#footer .copyright p{';
			$the_wp_business_custom_css .=' text-align: '. $the_wp_business_copyright_alignment .';';
		$the_wp_business_custom_css .='}';
	}elseif($the_wp_business_copyright_alignment == 'right' ){
		$the_wp_business_custom_css .='#footer .copyright p{';
			$the_wp_business_custom_css .='text-align: '. $the_wp_business_copyright_alignment .';';
		$the_wp_business_custom_css .='}';
	}

	$the_wp_business_copyright_font_size = get_theme_mod('the_wp_business_copyright_font_size');
	$the_wp_business_custom_css .='#footer .copyright p{';
		$the_wp_business_custom_css .='font-size: '.esc_attr($the_wp_business_copyright_font_size).'px;';
	$the_wp_business_custom_css .='}';

	$the_wp_business_copyright_color = get_theme_mod('the_wp_business_copyright_color');
	$the_wp_business_custom_css .='#footer .copyright p,#footer .copyright a{';
		$the_wp_business_custom_css .='color: '.esc_attr($the_wp_business_copyright_color).'!important;';
	$the_wp_business_custom_css .='}';

	$the_wp_business_back_to_top_text_color = get_theme_mod('the_wp_business_back_to_top_text_color');
	$the_wp_business_custom_css .='.back-to-top{';
		$the_wp_business_custom_css .='color: '.esc_attr($the_wp_business_back_to_top_text_color).'!important;';
	$the_wp_business_custom_css .='}';

	$the_wp_business_back_to_top_color = get_theme_mod('the_wp_business_back_to_top_color');
	$the_wp_business_custom_css .='.back-to-top{';
		$the_wp_business_custom_css .='background-color: '.esc_attr($the_wp_business_back_to_top_color).'!important;';
	$the_wp_business_custom_css .='}';
		$the_wp_business_back_to_top_color = get_theme_mod('the_wp_business_back_to_top_color');
	$the_wp_business_custom_css .='.back-to-top::before{';
		$the_wp_business_custom_css .='border-bottom-color: '.esc_attr($the_wp_business_back_to_top_color).'!important;';
	$the_wp_business_custom_css .='}';

	// back to top icon hover color
	$the_wp_business_back_to_top_hover_color = get_theme_mod('the_wp_business_back_to_top_hover_color');
	$the_wp_business_custom_css .='.back-to-top:hover{';
		$the_wp_business_custom_css .='background-color: '.esc_attr($the_wp_business_back_to_top_hover_color). ' !important;';
	$the_wp_business_custom_css .='}';
		$the_wp_business_back_to_top_hover_color = get_theme_mod('the_wp_business_back_to_top_hover_color');
	$the_wp_business_custom_css .='.back-to-top:hover::before{';
		$the_wp_business_custom_css .='border-bottom-color: '.esc_attr($the_wp_business_back_to_top_hover_color).'!important;';
	$the_wp_business_custom_css .='}';
		

	/*------ Topbar padding ------*/
	$the_wp_business_top_topbar_padding = get_theme_mod('the_wp_business_top_topbar_padding');
	$the_wp_business_bottom_topbar_padding = get_theme_mod('the_wp_business_bottom_topbar_padding');
	if($the_wp_business_top_topbar_padding != false || $the_wp_business_bottom_topbar_padding != false){
		$the_wp_business_custom_css .='#header .header-top{';
			$the_wp_business_custom_css .='padding-top: '.esc_attr($the_wp_business_top_topbar_padding).'px; padding-bottom: '.esc_attr($the_wp_business_bottom_topbar_padding).'px; ';
		$the_wp_business_custom_css .='}';
	}

	/*------ Woocommerce ----*/
	$the_wp_business_product_border = get_theme_mod('the_wp_business_product_border',false);

	if($the_wp_business_product_border == true){
		$the_wp_business_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$the_wp_business_custom_css .='border: 1px solid #dcdcdc;';
		$the_wp_business_custom_css .='}';
	}

	$the_wp_business_product_top = get_theme_mod('the_wp_business_product_top_padding', 5);
	$the_wp_business_product_bottom = get_theme_mod('the_wp_business_product_bottom_padding', 5);
	$the_wp_business_product_left = get_theme_mod('the_wp_business_product_left_padding', 5);
	$the_wp_business_product_right = get_theme_mod('the_wp_business_product_right_padding', 5);
	$the_wp_business_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$the_wp_business_custom_css .='padding-top: '.esc_attr($the_wp_business_product_top).'px; padding-bottom: '.esc_attr($the_wp_business_product_bottom).'px; padding-left: '.esc_attr($the_wp_business_product_left).'px; padding-right: '.esc_attr($the_wp_business_product_right).'px;';
	$the_wp_business_custom_css .='}';

	$the_wp_business_product_border_radius = get_theme_mod('the_wp_business_product_border_radius');
	$the_wp_business_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$the_wp_business_custom_css .='border-radius: '.esc_attr($the_wp_business_product_border_radius).'px;';
	$the_wp_business_custom_css .='}';

	$the_wp_business_product_box_shadow = get_theme_mod('the_wp_business_product_box_shadow','0');
	$the_wp_business_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$the_wp_business_custom_css .='box-shadow: '.esc_attr($the_wp_business_product_box_shadow).'px '.esc_attr($the_wp_business_product_box_shadow).'px '.esc_attr($the_wp_business_product_box_shadow).'px #eee;';
	$the_wp_business_custom_css .='}';		

	/*----- WooCommerce button css --------*/
	$the_wp_business_product_button_top = get_theme_mod('the_wp_business_product_button_top_padding',10);
	$the_wp_business_product_button_bottom = get_theme_mod('the_wp_business_product_button_bottom_padding',10);
	$the_wp_business_product_button_left = get_theme_mod('the_wp_business_product_button_left_padding',15);
	$the_wp_business_product_button_right = get_theme_mod('the_wp_business_product_button_right_padding',15);
	$the_wp_business_custom_css .='.woocommerce ul.products li.product .button, .woocommerce div.product form.cart .button, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce #payment #place_order, .woocommerce-page #payment #place_order, button.woocommerce-button.button.woocommerce-form-login__submit, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
		$the_wp_business_custom_css .='padding-top: '.esc_attr($the_wp_business_product_button_top).'px; padding-bottom: '.esc_attr($the_wp_business_product_button_bottom).'px; padding-left: '.esc_attr($the_wp_business_product_button_left).'px; padding-right: '.esc_attr($the_wp_business_product_button_right).'px;';
	$the_wp_business_custom_css .='}';

	$the_wp_business_product_button_border_radius = get_theme_mod('the_wp_business_product_button_border_radius');
	$the_wp_business_custom_css .='.woocommerce ul.products li.product .button, .woocommerce div.product form.cart .button, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, a.checkout-button.button.alt.wc-forward, .woocommerce #payment #place_order, .woocommerce-page #payment #place_order, button.woocommerce-button.button.woocommerce-form-login__submit{';
		$the_wp_business_custom_css .='border-radius: '.esc_attr($the_wp_business_product_button_border_radius).'px;';
	$the_wp_business_custom_css .='}';

	/*----- WooCommerce product sale css --------*/
	$the_wp_business_product_sale_top = get_theme_mod('the_wp_business_product_sale_top_padding');
	$the_wp_business_product_sale_bottom = get_theme_mod('the_wp_business_product_sale_bottom_padding');
	$the_wp_business_product_sale_left = get_theme_mod('the_wp_business_product_sale_left_padding');
	$the_wp_business_product_sale_right = get_theme_mod('the_wp_business_product_sale_right_padding');
	$the_wp_business_custom_css .='.woocommerce span.onsale {';
		$the_wp_business_custom_css .='padding-top: '.esc_attr($the_wp_business_product_sale_top).'px; padding-bottom: '.esc_attr($the_wp_business_product_sale_bottom).'px; padding-left: '.esc_attr($the_wp_business_product_sale_left).'px; padding-right: '.esc_attr($the_wp_business_product_sale_right).'px;';
	$the_wp_business_custom_css .='}';

	$the_wp_business_product_sale_border_radius = get_theme_mod('the_wp_business_product_sale_border_radius',50);
	$the_wp_business_custom_css .='.woocommerce span.onsale {';
		$the_wp_business_custom_css .='border-radius: '.esc_attr($the_wp_business_product_sale_border_radius).'px;';
	$the_wp_business_custom_css .='}';

	$the_wp_business_menu_case = get_theme_mod('the_wp_business_product_sale_position', 'Right');
	if($the_wp_business_menu_case == 'Right' ){
		$the_wp_business_custom_css .='.woocommerce ul.products li.product .onsale{';
			$the_wp_business_custom_css .=' left:auto; right:0;';
		$the_wp_business_custom_css .='}';
	}elseif($the_wp_business_menu_case == 'Left' ){
		$the_wp_business_custom_css .='.woocommerce ul.products li.product .onsale{';
			$the_wp_business_custom_css .=' left:-10px; right:auto;';
		$the_wp_business_custom_css .='}';
	}

	$the_wp_business_product_sale_font_size = get_theme_mod('the_wp_business_product_sale_font_size',13);
	$the_wp_business_custom_css .='.woocommerce span.onsale {';
		$the_wp_business_custom_css .='font-size: '.esc_attr($the_wp_business_product_sale_font_size).'px;';
	$the_wp_business_custom_css .='}';

	/*---- Slider Image overlay -----*/
	$the_wp_business_slider_image_overlay = get_theme_mod('the_wp_business_slider_image_overlay',true);
	if($the_wp_business_slider_image_overlay == false){
		$the_wp_business_custom_css .='#slider img {';
			$the_wp_business_custom_css .='opacity: 1;';
		$the_wp_business_custom_css .='}';
	}

	$the_wp_business_slider_overlay_color = get_theme_mod('the_wp_business_slider_overlay_color');
	if($the_wp_business_slider_overlay_color != false){
		$the_wp_business_custom_css .='#slider  {';
			$the_wp_business_custom_css .='background-color: '.esc_attr($the_wp_business_slider_overlay_color).';';
		$the_wp_business_custom_css .='}';
	}

	/*---- Comment form ----*/
	$the_wp_business_comment_width = get_theme_mod('the_wp_business_comment_width', '100');
	$the_wp_business_custom_css .='#comments textarea{';
		$the_wp_business_custom_css .=' width:'.esc_attr($the_wp_business_comment_width).'%;';
	$the_wp_business_custom_css .='}';

	$the_wp_business_comment_submit_text = get_theme_mod('the_wp_business_comment_submit_text', 'Post Comment');
	if($the_wp_business_comment_submit_text == ''){
		$the_wp_business_custom_css .='#comments p.form-submit {';
			$the_wp_business_custom_css .='display: none;';
		$the_wp_business_custom_css .='}';
	}

	$the_wp_business_comment_title = get_theme_mod('the_wp_business_comment_title', 'Leave a Reply');
	if($the_wp_business_comment_title == ''){
		$the_wp_business_custom_css .='#comments h2#reply-title {';
			$the_wp_business_custom_css .='display: none;';
		$the_wp_business_custom_css .='}';
	}

	/*------ Footer background css -------*/
	$the_wp_business_footer_bg_color = get_theme_mod('the_wp_business_footer_bg_color');
	if($the_wp_business_footer_bg_color != false){
		$the_wp_business_custom_css .='#footer{';
			$the_wp_business_custom_css .='background-color: '.esc_attr($the_wp_business_footer_bg_color).';';
		$the_wp_business_custom_css .='}';
	}

	$the_wp_business_footer_bg_image = get_theme_mod('the_wp_business_footer_bg_image');
	if($the_wp_business_footer_bg_image != false){
		$the_wp_business_custom_css .='#footer{';
			$the_wp_business_custom_css .='background: url('.esc_attr($the_wp_business_footer_bg_image).'); background-size: cover;';
		$the_wp_business_custom_css .='}';
	}
	/*---------------------------Footer top bottom padding -------------------*/
	$the_wp_business_footer_padding = get_theme_mod('the_wp_business_footer_padding');
	if($the_wp_business_footer_padding != false){
		$the_wp_business_custom_css .='#footer .footerinner{';
			$the_wp_business_custom_css .='padding: '.esc_attr($the_wp_business_footer_padding).' 0 !important;';
		$the_wp_business_custom_css .='}';
	}
	/*-------- Footer Icon Alignment ------*/
	$the_wp_business_footer_icon_alignment = get_theme_mod('the_wp_business_footer_icon_alignment', 'Center');
	if($the_wp_business_footer_icon_alignment == 'Center' ){
		$the_wp_business_custom_css .='#footer .copyright{';
			$the_wp_business_custom_css .='text-align: '. $the_wp_business_footer_icon_alignment .';';
		$the_wp_business_custom_css .='}';
	}elseif($the_wp_business_footer_icon_alignment == 'Left' ){
		$the_wp_business_custom_css .='#footer .copyright{';
			$the_wp_business_custom_css .=' text-align: '. $the_wp_business_footer_icon_alignment .';';
		$the_wp_business_custom_css .='}';
	}elseif($the_wp_business_footer_icon_alignment == 'Right' ){
		$the_wp_business_custom_css .='#footer .copyright{';
			$the_wp_business_custom_css .='text-align: '. $the_wp_business_footer_icon_alignment .';';
		$the_wp_business_custom_css .='}';
	}

	//Footer Social Icon Font size
	$the_wp_business_footer_icon_font_size = get_theme_mod('the_wp_business_footer_icon_font_size');
	$the_wp_business_custom_css .='#footer .copyright a i{';
	$the_wp_business_custom_css .='font-size: '.esc_attr($the_wp_business_footer_icon_font_size).'px;';
	$the_wp_business_custom_css .='}';

	//Footer Social Icon Top Bottom padding 
	$the_wp_business_footer_icon_to_top_padding = get_theme_mod('the_wp_business_footer_icon_to_top_padding');
	$the_wp_business_custom_css .='#footer .copyright a i{';
	$the_wp_business_custom_css .='padding-top: '.esc_attr($the_wp_business_footer_icon_to_top_padding).'px;';
	$the_wp_business_custom_css .='padding-bottom: '.esc_attr($the_wp_business_footer_icon_to_top_padding).'px;';
	$the_wp_business_custom_css .='}';

	// footer image position
	$the_wp_business_footer_img_position = get_theme_mod('the_wp_business_footer_img_position','center center');
	if($the_wp_business_footer_img_position != false){
		$the_wp_business_custom_css .='#footer{';
			$the_wp_business_custom_css .='background-position: '.esc_attr($the_wp_business_footer_img_position).'!important;';
		$the_wp_business_custom_css .='}';
	}	

	// Footer Attatchment
	$the_wp_business_theme_lay = get_theme_mod( 'the_wp_business_footer_attatchment','scroll');
	if($the_wp_business_theme_lay == 'fixed'){
		$the_wp_business_custom_css .='#footer{';
			$the_wp_business_custom_css .='background-attachment: fixed;';
		$the_wp_business_custom_css .='}';
	}elseif ($the_wp_business_theme_lay == 'scroll'){
		$the_wp_business_custom_css .='#footer{';
			$the_wp_business_custom_css .='background-attachment: scroll;';
		$the_wp_business_custom_css .='}';
	}	

/*---------------------------Footer Style -------------------*/

	$the_wp_business_theme_lay = get_theme_mod( 'the_wp_business_footer_template','the_wp_business-footer-one');
    if($the_wp_business_theme_lay == 'the_wp_business-footer-one'){
		$the_wp_business_custom_css .='#footer{';
			$the_wp_business_custom_css .='';
		$the_wp_business_custom_css .='}';

	}else if($the_wp_business_theme_lay == 'the_wp_business-footer-two'){
		$the_wp_business_custom_css .='#footer {';
			$the_wp_business_custom_css .='background: #E3F2FD !important;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='.footerinner p,.footerinner span,.footerinner li a,.footerinner #wp-calendar caption,.footerinner #wp-calendar td,.footerinner #wp-calendar th, .footerinner, .footerinner h3, .footerinner a.rsswidget, .footerinner #wp-calendar a, .copyright a, .footerinner .custom_details, .footerinner ins span, .footerinner .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, .footerinner table, .footerinner th, .footerinner td, .footerinner caption, #sidebar caption,.footerinner nav.wp-calendar-nav a,.footerinner .search-form .search-field{';
			$the_wp_business_custom_css .='color:#000 !important;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='#footer p{';
			$the_wp_business_custom_css .='color:#000 !important;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='.footerinner ul li::before{';
			$the_wp_business_custom_css .='background:#000;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='.footerinner table, .footerinner th, .footerinner td,.footerinner.search-form .search-field,.footerinner .tagcloud a{';
			$the_wp_business_custom_css .='border: 1px solid #000;';
		$the_wp_business_custom_css .='}';

	}else if($the_wp_business_theme_lay == 'the_wp_business-footer-three'){
		$the_wp_business_custom_css .='#footer {';
			$the_wp_business_custom_css .='background: #0A0A1F !important;;';
		$the_wp_business_custom_css .='}';
	}
	else if($the_wp_business_theme_lay == 'the_wp_business-footer-four'){
		$the_wp_business_custom_css .='#footer {';
			$the_wp_business_custom_css .='background: #F5F5DC !important;;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='.footerinner p,.footerinner span,.footerinner li a,.footerinner #wp-calendar caption,.footerinner #wp-calendar td,.footerinner #wp-calendar th, .footerinner, .footerinner h3, .footerinner a.rsswidget, .footerinner #wp-calendar a, .copyright a, .footerinner .custom_details, .footerinner ins span, .footerinner .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, .footerinner table, .footerinner th, .footerinner td, .footerinner caption, #sidebar caption,.footerinner nav.wp-calendar-nav a,.footerinner .search-form .search-field{';
			$the_wp_business_custom_css .='color:#000 !important;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='#footer p{';
			$the_wp_business_custom_css .='color:#000 !important;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='.footerinner ul li::before{';
			$the_wp_business_custom_css .='background:#000;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='.footerinner table, .footerinner th, .footerinner td,.footerinner.search-form .search-field,.footerinner .tagcloud a{';
			$the_wp_business_custom_css .='border: 1px solid #000;';
		$the_wp_business_custom_css .='}';
	}
    else if($the_wp_business_theme_lay == 'the_wp_business-footer-five'){
	$the_wp_business_custom_css .='#footer {';
		$the_wp_business_custom_css .='background: #333333 !important;;';
	$the_wp_business_custom_css .='}';
   }

	/*----- Featured image css -----*/
	$the_wp_business_feature_image_border_radius = get_theme_mod('the_wp_business_feature_image_border_radius');
	if($the_wp_business_feature_image_border_radius != false){
		$the_wp_business_custom_css .='.hovereffect.blogpost img{';
			$the_wp_business_custom_css .='border-radius: '.esc_attr($the_wp_business_feature_image_border_radius).'px;';
		$the_wp_business_custom_css .='}';
	}

	$the_wp_business_feature_image_shadow = get_theme_mod('the_wp_business_feature_image_shadow');
	if($the_wp_business_feature_image_shadow != false){
		$the_wp_business_custom_css .='.hovereffect.blogpost img{';
			$the_wp_business_custom_css .='box-shadow: '.esc_attr($the_wp_business_feature_image_shadow).'px '.esc_attr($the_wp_business_feature_image_shadow).'px '.esc_attr($the_wp_business_feature_image_shadow).'px #aaa;';
		$the_wp_business_custom_css .='}';
	}
	// blog post Pagination Alignment
	$the_wp_business_post_pagination_alignment = get_theme_mod( 'the_wp_business_post_pagination_option','Right');
	if($the_wp_business_post_pagination_alignment == 'Left'){
		$the_wp_business_custom_css .='.navigation nav.pagination{';
			$the_wp_business_custom_css .='justify-content: left;';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_post_pagination_alignment == 'Center'){
		$the_wp_business_custom_css .='.navigation nav.pagination{';
			$the_wp_business_custom_css .='justify-content: center;';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_post_pagination_alignment == 'Right'){
		$the_wp_business_custom_css .='.navigation nav.pagination{';
			$the_wp_business_custom_css .='justify-content: right;';
		$the_wp_business_custom_css .='}';
	}
	/*----- Related posts image css-----*/
	
	$the_wp_business_related_image_border_radius = get_theme_mod('the_wp_business_related_image_border_radius');
	if($the_wp_business_related_image_border_radius != false){
		$the_wp_business_custom_css .='.related-posts .hovereffect img{';
			$the_wp_business_custom_css .='border-radius: '.esc_attr($the_wp_business_related_image_border_radius).'px;';
		$the_wp_business_custom_css .='}';
	}
	/*----- Related Post display type css ------*/
	$the_wp_business_related_post_display_type = get_theme_mod('the_wp_business_related_post_display_type', 'blocks');
	if($the_wp_business_related_post_display_type == 'without blocks' ){
		$the_wp_business_custom_css .='.related-posts .smallpostimage{';
			$the_wp_business_custom_css .='border: 0!important; box-shadow: none;';
		$the_wp_business_custom_css .='}';
	}
	// Metabox Seperator related post
	$the_wp_business_related_post_metabox_seperator = get_theme_mod('the_wp_business_related_post_metabox_seperator', '|');
	if($the_wp_business_related_post_metabox_seperator != '' ){
		$the_wp_business_custom_css .='.related-posts .smallpostimage .post-info span:after{';
			$the_wp_business_custom_css .=' content: "'.esc_attr($the_wp_business_related_post_metabox_seperator).'"; padding-left:10px;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='.related-posts .smallpostimage .post-info span:last-child:after{';
			$the_wp_business_custom_css .=' content: none;';
		$the_wp_business_custom_css .='}';
	}	
	/*------ Sticky header padding ------------*/
	$the_wp_business_top_sticky_header_padding = get_theme_mod('the_wp_business_top_sticky_header_padding');
	$the_wp_business_bottom_sticky_header_padding = get_theme_mod('the_wp_business_bottom_sticky_header_padding');
	$the_wp_business_custom_css .=' .fixed-header{';
		$the_wp_business_custom_css .=' padding-top: '.esc_attr($the_wp_business_top_sticky_header_padding).'px; padding-bottom: '.esc_attr($the_wp_business_bottom_sticky_header_padding).'px';
	$the_wp_business_custom_css .='}';

		// featured image dimention
	$the_wp_business_blog_image_dimension = get_theme_mod('the_wp_business_blog_image_dimension', 'default');
	$the_wp_business_feature_image_custom_width = get_theme_mod('the_wp_business_feature_image_custom_width',250);
	$the_wp_business_feature_image_custom_height = get_theme_mod('the_wp_business_feature_image_custom_height',250);
	if($the_wp_business_blog_image_dimension == 'custom'){
		$the_wp_business_custom_css .='.postbox .hovereffect img {';
		$the_wp_business_custom_css .='width: '.esc_attr($the_wp_business_feature_image_custom_width).'px; height: '.esc_attr($the_wp_business_feature_image_custom_height).'px;';
		$the_wp_business_custom_css .='}';
	}

	/*------ Related products ---------*/
	$the_wp_business_related_products = get_theme_mod('the_wp_business_single_related_products',true);
	if($the_wp_business_related_products == false){
		$the_wp_business_custom_css .=' .related.products{';
			$the_wp_business_custom_css .='display: none;';
		$the_wp_business_custom_css .='}';
	}

	/*-------- Menu Font Size --------*/
	$the_wp_business_menu_font_size = get_theme_mod('the_wp_business_menu_font_size',14);
	if($the_wp_business_menu_font_size != false){
		$the_wp_business_custom_css .='.nav-menu li a{';
			$the_wp_business_custom_css .='font-size: '.esc_attr($the_wp_business_menu_font_size).'px;';
		$the_wp_business_custom_css .='}';
	}

	$the_wp_business_menu_font_weight = get_theme_mod('the_wp_business_menu_font_weight');
	$the_wp_business_custom_css .='.nav-menu li a{';
		$the_wp_business_custom_css .='font-weight: '.esc_attr($the_wp_business_menu_font_weight).';';
	$the_wp_business_custom_css .='}';

	$the_wp_business_menu_case = get_theme_mod('the_wp_business_menu_case', 'uppercase');
	if($the_wp_business_menu_case == 'uppercase' ){
		$the_wp_business_custom_css .='.nav-menu li a{';
			$the_wp_business_custom_css .=' text-transform: uppercase;';
		$the_wp_business_custom_css .='}';
	}elseif($the_wp_business_menu_case == 'capitalize' ){
		$the_wp_business_custom_css .='.nav-menu li a{';
			$the_wp_business_custom_css .=' text-transform: capitalize;';
		$the_wp_business_custom_css .='}';
	}

	// menu padding
	$the_wp_business_menu_padding = get_theme_mod('the_wp_business_menu_padding',10);
	$the_wp_business_custom_css .='.nav-menu ul li a, .sf-arrows ul .sf-with-ul, .sf-arrows .sf-with-ul{';
		$the_wp_business_custom_css .='padding: '.esc_attr($the_wp_business_menu_padding).'px;';
	$the_wp_business_custom_css .='}';

	$the_wp_business_menu_case = get_theme_mod('the_wp_business_menu_case', 'Capitalize');
	if($the_wp_business_menu_case == 'uppercase' ){
		$the_wp_business_custom_css .='.nav-menu ul li a{';
			$the_wp_business_custom_css .=' text-transform: uppercase;';
		$the_wp_business_custom_css .='}';
	}elseif($the_wp_business_menu_case == 'lowercase' ){
		$the_wp_business_custom_css .='.nav-menu ul li a{';
			$the_wp_business_custom_css .=' text-transform: lowercase;';
		$the_wp_business_custom_css .='}';
	}

	$the_wp_business_menus_item = get_theme_mod( 'the_wp_business_menus_item_style','None');
    if($the_wp_business_menus_item == 'None'){
		$the_wp_business_custom_css .='.nav-menu ul li a{';
			$the_wp_business_custom_css .='';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_menus_item == 'Zoom In'){
		$the_wp_business_custom_css .='.nav-menu ul li a:hover{';
			$the_wp_business_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important;';
		$the_wp_business_custom_css .='}';
	}else if ($the_wp_business_menus_item == 'Underline Expand') { 
			$the_wp_business_custom_css .= '.nav-menu ul li a { position: relative; text-decoration: none; }';
		$the_wp_business_custom_css .= '.nav-menu ul li a::after {';
			$the_wp_business_custom_css .= 'content: ""; position: absolute; left: 50%; bottom: calc(' . esc_attr($the_wp_business_menu_padding) . 'px / 2); width: 0; height: 2px; background-color: currentColor;';
		$the_wp_business_custom_css .= 'transition: width 0.3s ease, left 0.3s ease;';
			$the_wp_business_custom_css .= '}';
		$the_wp_business_custom_css .= '.nav-menu ul li a:hover::after {';
			$the_wp_business_custom_css .= 'width: 100%; left: 0;';
		$the_wp_business_custom_css .= '}';
	}		

	// Social Icons Font Size
	$the_wp_business_social_icons_font_size = get_theme_mod('the_wp_business_social_icons_font_size', '16');
	$the_wp_business_custom_css .='.social-media i{';
		$the_wp_business_custom_css .='font-size: '.esc_attr($the_wp_business_social_icons_font_size).'px;';
	$the_wp_business_custom_css .='}';

	//Header icon color
	$the_wp_business_header_icon_color = get_theme_mod('the_wp_business_header_icon_color', '');
	$the_wp_business_custom_css .='.social-media i{';
		$the_wp_business_custom_css .='color: '.esc_attr($the_wp_business_header_icon_color).'!important;';
	$the_wp_business_custom_css .='}';

	// Featured image header
	$header_image_url = the_wp_business_banner_image( $image_url = '' );
	$the_wp_business_custom_css .='#page-site-header{';
		$the_wp_business_custom_css .='background-image: url('. esc_url( $header_image_url ).'); background-size: cover;';
	$the_wp_business_custom_css .='}';

	$the_wp_business_post_featured_image = get_theme_mod('the_wp_business_post_featured_image', 'in-content');
	if($the_wp_business_post_featured_image == 'banner' ){
		$the_wp_business_custom_css .='.single .middle-align h1, .page .middle-align h1, .page .middle-align img, .page .title-box h1{';
			$the_wp_business_custom_css .=' display: none;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='.page-template-custom-front-page #page-site-header{';
			$the_wp_business_custom_css .=' display: none;';
		$the_wp_business_custom_css .='}';
	}

	// Woocommerce Shop page pagination
	$the_wp_business_shop_page_navigation = get_theme_mod('the_wp_business_shop_page_navigation',true);
	if ($the_wp_business_shop_page_navigation == false) {
		$the_wp_business_custom_css .='.woocommerce nav.woocommerce-pagination{';
			$the_wp_business_custom_css .='display: none;';
		$the_wp_business_custom_css .='}';
	}

	// Slider Button color
	$the_wp_business_slider_btn_color = get_theme_mod('the_wp_business_slider_btn_color','#fff');
	$the_wp_business_custom_css .='.read-more a{';
			$the_wp_business_custom_css .='color: '.esc_attr($the_wp_business_slider_btn_color).' !important;';
	$the_wp_business_custom_css .='}';

	// Slider button bg color
	$the_wp_business_slider_btn_bg_color = get_theme_mod('the_wp_business_slider_btn_bg_color','var(--primary-color)');
	$the_wp_business_custom_css .='.read-more a{';
			$the_wp_business_custom_css .='background: '.esc_attr($the_wp_business_slider_btn_bg_color).' !important;';
	$the_wp_business_custom_css .='}';

	// Slider button lable hover color
	$the_wp_business_slider_btn_lable_hover_color = get_theme_mod('the_wp_business_slider_btn_lable_hover_color','#000');
	$the_wp_business_custom_css .='.read-more a:hover{';
			$the_wp_business_custom_css .='color: '.esc_attr($the_wp_business_slider_btn_lable_hover_color).' !important;';
	$the_wp_business_custom_css .='}';

	// Slider button bg hover color
	$the_wp_business_slider_btn_bg_hover_color = get_theme_mod('the_wp_business_slider_btn_bg_hover_color','#fff');
	$the_wp_business_custom_css .='.read-more a:hover{';
			$the_wp_business_custom_css .='background: '.esc_attr($the_wp_business_slider_btn_bg_hover_color).' !important;';
	$the_wp_business_custom_css .='}';

	/*---- Slider Height ------*/
	$the_wp_business_slider_height = get_theme_mod('the_wp_business_slider_height');
	$the_wp_business_custom_css .='#slider img{';
		$the_wp_business_custom_css .='height: '.esc_attr($the_wp_business_slider_height).'px;';
	$the_wp_business_custom_css .='}';
	$the_wp_business_custom_css .='@media screen and (max-width: 768px){
		#slider img{';
		$the_wp_business_custom_css .='height: auto;';
	$the_wp_business_custom_css .='} }';

	/*----- Blog Post display type css ------*/
	$the_wp_business_blog_post_display_type = get_theme_mod('the_wp_business_blog_post_display_type', 'blocks');
	if($the_wp_business_blog_post_display_type == 'without blocks' ){
		$the_wp_business_custom_css .='.blog .postbox, .blog #sidebar .widget{';
			$the_wp_business_custom_css .='border: 0; box-shadow: none;';
		$the_wp_business_custom_css .='}';
	}

	/*---------- Responsive style ---------*/

	$the_wp_business_toggle_button_bg_color_settings = get_theme_mod('the_wp_business_toggle_button_bg_color_settings');
	$the_wp_business_custom_css .='.toggle-menu {';
	$the_wp_business_custom_css .='background-color: '.esc_attr($the_wp_business_toggle_button_bg_color_settings).';';
	$the_wp_business_custom_css .='} ';
	
	if (get_theme_mod('the_wp_business_hide_topbar_responsive',true) == true && get_theme_mod('the_wp_business_top_header',false) == false) {
		$the_wp_business_custom_css .='.header-top{';
			$the_wp_business_custom_css .=' display: none;';
		$the_wp_business_custom_css .='} ';
	}
	if (get_theme_mod('the_wp_business_hide_topbar_responsive',true) == false) {
		$the_wp_business_custom_css .='@media screen and (max-width: 575px){
			.header-top{';
			$the_wp_business_custom_css .=' display: none;';
		$the_wp_business_custom_css .='} }';
	} else if(get_theme_mod('the_wp_business_hide_topbar_responsive',true) == true){
		$the_wp_business_custom_css .='@media screen and (max-width: 575px){
			.header-top{';
			$the_wp_business_custom_css .=' display: block;';
		$the_wp_business_custom_css .='} }';
	}

	if (get_theme_mod('the_wp_business_sticky_header_responsive') == false) {
		$the_wp_business_custom_css .='@media screen and (max-width: 575px){
			.sticky{';
			$the_wp_business_custom_css .=' position: static;';
		$the_wp_business_custom_css .='} }';
	}

	// Metabox Seperator
	$the_wp_business_metabox_seperator = get_theme_mod('the_wp_business_metabox_seperator','|');
	if($the_wp_business_metabox_seperator != '' ){
		$the_wp_business_custom_css .='.postbox .metabox span:after{';
			$the_wp_business_custom_css .=' content: "'.esc_attr($the_wp_business_metabox_seperator).'"; padding-left:10px;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='.postbox .metabox span:last-child:after{';
			$the_wp_business_custom_css .=' content: none;';
		$the_wp_business_custom_css .='}';
	}

	// Metabox Seperator Single post
	$the_wp_business_single_post_metabox_seperator = get_theme_mod('the_wp_business_single_post_metabox_seperator','|');
	if($the_wp_business_single_post_metabox_seperator != '' ){
		$the_wp_business_custom_css .='.metabox span:after{';
			$the_wp_business_custom_css .=' content: "'.esc_attr($the_wp_business_single_post_metabox_seperator).'"; padding-left:10px;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='.metabox span:last-child:after{';
			$the_wp_business_custom_css .=' content: none;';
		$the_wp_business_custom_css .='}';
	}

	// Metabox Seperator Grid post
	$the_wp_business_grid_post_metabox_seperator = get_theme_mod('the_wp_business_grid_post_metabox_seperator','|');
	if($the_wp_business_grid_post_metabox_seperator != '' ){
		$the_wp_business_custom_css .='.postbox .grid-box span:after{';
			$the_wp_business_custom_css .=' content: "'.esc_attr($the_wp_business_grid_post_metabox_seperator).'"; padding-left:10px;';
		$the_wp_business_custom_css .='}';
		$the_wp_business_custom_css .='.postbox .grid-box span:last-child:after{';
			$the_wp_business_custom_css .=' content: none;';
		$the_wp_business_custom_css .='}';
	}

	/*----- grid Post display type css ------*/
	$the_wp_business_grid_post_display_type = get_theme_mod('the_wp_business_grid_post_display_type', 'blocks');
	if($the_wp_business_grid_post_display_type == 'without blocks' ){
		$the_wp_business_custom_css .='.gridbox{';
			$the_wp_business_custom_css .='border: 0;box-shadow:none;';
		$the_wp_business_custom_css .='}';
	}

	/*----- grid Post css ------*/
	$the_wp_business_grid_post_image_border_radius = get_theme_mod('the_wp_business_grid_post_image_border_radius');
	 if($the_wp_business_grid_post_image_border_radius != false){
		 $the_wp_business_custom_css .='.gridbox img{';
			 $the_wp_business_custom_css .='border-radius: '.esc_attr($the_wp_business_grid_post_image_border_radius).'px;';
		 $the_wp_business_custom_css .='}';
	 }

	 /*-------- grid post Alignment ------*/
	$the_wp_business_grid_alignment = get_theme_mod('the_wp_business_grid_alignment','center');
	if($the_wp_business_grid_alignment == 'left' ){
		$the_wp_business_custom_css .='.gridbox, .gridbox h2, .gridbox .metabox, .gridbox .entry-content, .gridbox .blogbutton-small{';
			$the_wp_business_custom_css .=' text-align: '. $the_wp_business_grid_alignment .'!important;';
		$the_wp_business_custom_css .='}';
	}elseif($the_wp_business_grid_alignment == 'right' ){
		$the_wp_business_custom_css .='.gridbox, .gridbox h2, .gridbox .metabox, .gridbox .entry-content, .gridbox .blogbutton-small{';
			$the_wp_business_custom_css .='text-align: '. $the_wp_business_grid_alignment .'!important;';
		$the_wp_business_custom_css .='}';
	}elseif($the_wp_business_grid_alignment == 'center' ){
		$the_wp_business_custom_css .='.gridbox, .gridbox h2, .gridbox .metabox, .gridbox .entry-content, .gridbox .blogbutton-small{';
			$the_wp_business_custom_css .='text-align: '. $the_wp_business_grid_alignment .'!important;';
		$the_wp_business_custom_css .='}';
	}
	
	//Blog Post Initial Cap
	$the_wp_business_initial_caps_enable = get_theme_mod('the_wp_business_initial_caps_enable', 'false');
	if($the_wp_business_initial_caps_enable == 'true' ){
		$the_wp_business_custom_css .='.postbox .entry-content p:nth-of-type(1)::first-letter,.postbox p:nth-of-type(1)::first-letter{';
			$the_wp_business_custom_css .=' font-size: 60px!important; font-weight: 800!important;';
		$the_wp_business_custom_css .=' margin-right: 4px;';
			$the_wp_business_custom_css .=' font-family: "Vollkorn", serif!important;';
		$the_wp_business_custom_css .='}';
	}elseif($the_wp_business_initial_caps_enable == 'false' ){
		$the_wp_business_custom_css .='.postbox .entry-content p:nth-of-type(1)::first-letter,.postbox p:nth-of-type(1)::first-letter{';
			$the_wp_business_custom_css .='display: none!important;';
		$the_wp_business_custom_css .='}';
	}

	/*-------- Blog Post Alignment ------*/
	$the_wp_business_post_alignment = get_theme_mod('the_wp_business_blog_post_alignment', 'left');
	if($the_wp_business_post_alignment == 'center' ){
		$the_wp_business_custom_css .='.postbox  .col-lg-10{';
			$the_wp_business_custom_css .=' text-align: '. $the_wp_business_post_alignment .'!important;';
		$the_wp_business_custom_css .='}';
	}elseif($the_wp_business_post_alignment == 'right' ){
		$the_wp_business_custom_css .='.postbox  .col-lg-10{';
			$the_wp_business_custom_css .='text-align: '. $the_wp_business_post_alignment .'!important;';
		$the_wp_business_custom_css .='}';
	}	

	// widgets heading font size
	$the_wp_business_widgets_heading_fontsize = get_theme_mod('the_wp_business_widgets_heading_fontsize',24);
	if($the_wp_business_widgets_heading_fontsize != false){
		$the_wp_business_custom_css .='#footer h3, #footer h2, #footer .wp-block-search__label{';
			$the_wp_business_custom_css .='font-size: '.esc_attr($the_wp_business_widgets_heading_fontsize).'px; ';
		$the_wp_business_custom_css .='}';
	}

	// widgets heading font weight
	$the_wp_business_widgets_heading_font_weight = get_theme_mod('the_wp_business_widgets_heading_font_weight', '600');
  	$the_wp_business_custom_css .='#footer h3, #footer h2, #footer .wp-block-search__label{';
    $the_wp_business_custom_css .='font-weight: '.esc_attr($the_wp_business_widgets_heading_font_weight).';';
  	$the_wp_business_custom_css .='}';

	/*----------- Footer widgets heading alignment -----*/
	$the_wp_business_footer_widgets_heading = get_theme_mod( 'the_wp_business_footer_widgets_heading','Left');
    if($the_wp_business_footer_widgets_heading == 'Left'){
		$the_wp_business_custom_css .='#footer h3{';
		$the_wp_business_custom_css .='text-align: left;';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_footer_widgets_heading == 'Center'){
		$the_wp_business_custom_css .='#footer h3{';
			$the_wp_business_custom_css .='text-align: center;';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_footer_widgets_heading == 'Right'){
		$the_wp_business_custom_css .='#footer h3{';
			$the_wp_business_custom_css .='text-align: right;';
		$the_wp_business_custom_css .='}';
	}

	// Footer Heading Text Transform

	$the_wp_business_theme_lay = get_theme_mod( 'the_wp_business_footer_text_tranform','Capitalize');
    if($the_wp_business_theme_lay == 'Uppercase'){
		$the_wp_business_custom_css .='#footer h3{';
			$the_wp_business_custom_css .='text-transform: Uppercase;';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_theme_lay == 'Lowercase'){
		$the_wp_business_custom_css .='#footer h3{';
			$the_wp_business_custom_css .='text-transform: Lowercase;';
		$the_wp_business_custom_css .='}';
	}
	else if($the_wp_business_theme_lay == 'Capitalize'){
		$the_wp_business_custom_css .='#footer h3{';
			$the_wp_business_custom_css .='text-transform: Capitalize;';
		$the_wp_business_custom_css .='}';
	}	

	// Footer Heading  letter spacing
	$the_wp_business_widgets_heading_letter_spacing = get_theme_mod('the_wp_business_widgets_heading_letter_spacing','');
	$the_wp_business_custom_css .='#footer h3{';
	$the_wp_business_custom_css .='letter-spacing: '.esc_attr($the_wp_business_widgets_heading_letter_spacing).'px;';
	$the_wp_business_custom_css .='}';		

	$the_wp_business_footer_widgets_content = get_theme_mod( 'the_wp_business_footer_widgets_content','Left');
    if($the_wp_business_footer_widgets_content == 'Left'){
		$the_wp_business_custom_css .='#footer .widget ul{';
		$the_wp_business_custom_css .='text-align: left;';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_footer_widgets_content == 'Center'){
		$the_wp_business_custom_css .='#footer .widget ul{';
			$the_wp_business_custom_css .='text-align: center;';
		$the_wp_business_custom_css .='}';
	}else if($the_wp_business_footer_widgets_content == 'Right'){
		$the_wp_business_custom_css .='#footer .widget ul{';
			$the_wp_business_custom_css .='text-align: right;';
		$the_wp_business_custom_css .='}';
	}

	/*------ Footer background css -------*/
	$the_wp_business_copyright_bg_color = get_theme_mod('the_wp_business_copyright_bg_color');
	if($the_wp_business_copyright_bg_color != false){
		$the_wp_business_custom_css .='.inner{';
			$the_wp_business_custom_css .='background-color: '.esc_attr($the_wp_business_copyright_bg_color).';';
		$the_wp_business_custom_css .='}';
	}

	// Site title Font Size
	$the_wp_business_site_title_font_size = get_theme_mod('the_wp_business_site_title_font_size', '21');
	$the_wp_business_custom_css .='#header .the_wp_business h1, #header .the_wp_business p.site-title{';
		$the_wp_business_custom_css .='font-size: '.esc_attr($the_wp_business_site_title_font_size).'px;';
	$the_wp_business_custom_css .='}';

	// Site tagline Font Size
	$the_wp_business_site_tagline_font_size = get_theme_mod('the_wp_business_site_tagline_font_size', '12');
	$the_wp_business_custom_css .='#header .the_wp_business p{';
		$the_wp_business_custom_css .='font-size: '.esc_attr($the_wp_business_site_tagline_font_size).'px;';
	$the_wp_business_custom_css .='}';

	/*---- Slider Content Position -----*/
	$the_wp_business_top_position = get_theme_mod('the_wp_business_slider_top_position');
	$the_wp_business_bottom_position = get_theme_mod('the_wp_business_slider_bottom_position');
	$the_wp_business_left_position = get_theme_mod('the_wp_business_slider_left_position');
	$the_wp_business_right_position = get_theme_mod('the_wp_business_slider_right_position');
	if($the_wp_business_top_position != false || $the_wp_business_bottom_position != false || $the_wp_business_left_position != false || $the_wp_business_right_position != false){
		$the_wp_business_custom_css .='#slider .carousel-caption{';
			$the_wp_business_custom_css .='top: '.esc_attr($the_wp_business_top_position).'%; bottom: '.esc_attr($the_wp_business_bottom_position).'%; left: '.esc_attr($the_wp_business_left_position).'%; right: '.esc_attr($the_wp_business_right_position).'%;';
		$the_wp_business_custom_css .='}';
	}

	// responsive settings
	if (get_theme_mod('the_wp_business_preloader_responsive',false) == true && get_theme_mod('the_wp_business_preloader',false) == false) {
		$the_wp_business_custom_css .='@media screen and (min-width: 575px){
			.preloader, #overlayer, .tg-loader{';
			$the_wp_business_custom_css .=' visibility: hidden;';
		$the_wp_business_custom_css .='} }';
	}
	if (get_theme_mod('the_wp_business_preloader_responsive',false) == false) {
		$the_wp_business_custom_css .='@media screen and (max-width: 575px){
			.preloader, #overlayer, .tg-loader{';
			$the_wp_business_custom_css .=' visibility: hidden;';
		$the_wp_business_custom_css .='} }';
	}

	/*------------- Slider ------------*/

	$the_wp_business_slider_hide = get_theme_mod('the_wp_business_slider_hide', false);
	if($the_wp_business_slider_hide == false){
		$the_wp_business_custom_css .='.page-template-custom-front-page #header{';
			$the_wp_business_custom_css .='position: static;';
		$the_wp_business_custom_css .='}';
	}

	// responsive slider
	if (get_theme_mod('the_wp_business_slider_responsive',true) == true && get_theme_mod('the_wp_business_slider_hide',false) == false) {
		$the_wp_business_custom_css .='@media screen and (min-width: 575px){
			#slider{';
			$the_wp_business_custom_css .=' display: none;';
		$the_wp_business_custom_css .='} }';
	}
	if (get_theme_mod('the_wp_business_slider_responsive',true) == false) {
		$the_wp_business_custom_css .='@media screen and (max-width: 575px){
			#slider{';
			$the_wp_business_custom_css .=' display: none;';
		$the_wp_business_custom_css .='} }';
	}

	// scroll to top
	$the_wp_business_scroll = get_theme_mod( 'the_wp_business_backtotop_responsive',true);
	if (get_theme_mod('the_wp_business_backtotop_responsive',true) == true && get_theme_mod('the_wp_business_hide_scroll',true) == false) {
    	$the_wp_business_custom_css .='.show-back-to-top{';
			$the_wp_business_custom_css .='visibility: hidden !important;';
		$the_wp_business_custom_css .='} ';
	}
    if($the_wp_business_scroll == true){
    	$the_wp_business_custom_css .='@media screen and (max-width:575px) {';
		$the_wp_business_custom_css .='.show-back-to-top{';
			$the_wp_business_custom_css .='visibility: visible !important;';
		$the_wp_business_custom_css .='} }';
	}else if($the_wp_business_scroll == false){
		$the_wp_business_custom_css .='@media screen and (max-width:575px) {';
		$the_wp_business_custom_css .='.show-back-to-top{';
			$the_wp_business_custom_css .='visibility: hidden !important;';
		$the_wp_business_custom_css .='} }';
	}

	$the_wp_business_resp_sidebar = get_theme_mod( 'the_wp_business_sidebar_hide_show',true);
    if($the_wp_business_resp_sidebar == true){
    	$the_wp_business_custom_css .='@media screen and (max-width:575px) {';
		$the_wp_business_custom_css .='#sidebar{';
			$the_wp_business_custom_css .='display:block;';
		$the_wp_business_custom_css .='} }';
	}else if($the_wp_business_resp_sidebar == false){
		$the_wp_business_custom_css .='@media screen and (max-width:575px) {';
		$the_wp_business_custom_css .='#sidebar{';
			$the_wp_business_custom_css .='display:none;';
		$the_wp_business_custom_css .='} }';
	}

	// site logo padding 
	$the_wp_business_logo_spacing = get_theme_mod('the_wp_business_logo_spacing', '');
	$the_wp_business_custom_css .='.the_wp_business{';
	$the_wp_business_custom_css .='padding: '.esc_attr($the_wp_business_logo_spacing).'px !important;';
	$the_wp_business_custom_css .='}';

	// site title color
	$the_wp_business_site_title_text_color = get_theme_mod('the_wp_business_site_title_text_color');
	$the_wp_business_custom_css .='.the_wp_business h1 a, .the_wp_business p.site-title a{';
		$the_wp_business_custom_css .='color: '.esc_attr($the_wp_business_site_title_text_color).' !important;';
	$the_wp_business_custom_css .='}';

	// site tagline color
	$the_wp_business_site_tagline_text_color = get_theme_mod('the_wp_business_site_tagline_text_color');
	$the_wp_business_custom_css .='.the_wp_business p.site-description{';
		$the_wp_business_custom_css .='color: '.esc_attr($the_wp_business_site_tagline_text_color).' !important;';
	$the_wp_business_custom_css .='}';

	// menu color
	$the_wp_business_menu_color = get_theme_mod('the_wp_business_menu_color');
	$the_wp_business_custom_css .='.nav-menu a, .nav-menu .current-menu-item > a, .nav-menu .current_page_ancestor > a{';
			$the_wp_business_custom_css .='color: '.esc_attr($the_wp_business_menu_color).' !important;';
	$the_wp_business_custom_css .='}';

	// menu hover color
	$the_wp_business_menu_hover_color = get_theme_mod('the_wp_business_menu_hover_color');
	$the_wp_business_custom_css .='.nav-menu a:hover, .nav-menu ul li a:hover{';
			$the_wp_business_custom_css .='color: '.esc_attr($the_wp_business_menu_hover_color).' !important;';
	$the_wp_business_custom_css .='}';

	// Submenu color
	$the_wp_business_submenu_menu_color = get_theme_mod('the_wp_business_submenu_menu_color');
	$the_wp_business_custom_css .='.nav-menu ul.sub-menu a, .nav-menu ul.sub-menu li a,.nav-menu ul.children a, .nav-menu ul.children li a{';
			$the_wp_business_custom_css .='color: '.esc_attr($the_wp_business_submenu_menu_color).' !important;';
	$the_wp_business_custom_css .='}';

	// submenu hover color
	$the_wp_business_submenu_hover_color = get_theme_mod('the_wp_business_submenu_hover_color');
	$the_wp_business_custom_css .='.nav-menu ul.sub-menu a:hover, .nav-menu ul.sub-menu li a:hover,.nav-menu ul.children a:hover, .nav-menu ul.children li a:hover{';
			$the_wp_business_custom_css .='color: '.esc_attr($the_wp_business_submenu_hover_color).' !important;';
	$the_wp_business_custom_css .='}';

	// Breadcrumb color option
	$the_wp_business_breadcrumb_color = get_theme_mod('the_wp_business_breadcrumb_color');
	$the_wp_business_custom_css .='.bradcrumbs a,.bradcrumbs span{';
		$the_wp_business_custom_css .='color: '.esc_attr($the_wp_business_breadcrumb_color).'!important;';
	$the_wp_business_custom_css .='}';

	// Breadcrumb bg color option
	$the_wp_business_breadcrumb_background_color = get_theme_mod('the_wp_business_breadcrumb_background_color');
	$the_wp_business_custom_css .='.bradcrumbs a,.bradcrumbs span{';
		$the_wp_business_custom_css .='background-color: '.esc_attr($the_wp_business_breadcrumb_background_color).'!important;';
	$the_wp_business_custom_css .='}';

	// Breadcrumb hover color option
	$the_wp_business_breadcrumb_hover_color = get_theme_mod('the_wp_business_breadcrumb_hover_color');
	$the_wp_business_custom_css .='.bradcrumbs a:hover{';
		$the_wp_business_custom_css .='color: '.esc_attr($the_wp_business_breadcrumb_hover_color).'!important;';
	$the_wp_business_custom_css .='}';

	// Breadcrumb hover bg color option
	$the_wp_business_breadcrumb_hover_bg_color = get_theme_mod('the_wp_business_breadcrumb_hover_bg_color');
	$the_wp_business_custom_css .='.bradcrumbs a:hover{';
		$the_wp_business_custom_css .='background-color: '.esc_attr($the_wp_business_breadcrumb_hover_bg_color).'!important;';
	$the_wp_business_custom_css .='}';

	// Button Font Size
	$the_wp_business_button_font_size = get_theme_mod('the_wp_business_button_font_size', '16');
	$the_wp_business_custom_css .='.postbox a.blogbutton-small{';
		$the_wp_business_custom_css .='font-size: '.esc_attr($the_wp_business_button_font_size).'px;';
	$the_wp_business_custom_css .='}';

	// single post image dimention
	$the_wp_business_single_post_image_dimension = get_theme_mod('the_wp_business_single_post_image_dimension', 'default');
	$the_wp_business_single_post_image_custom_width = get_theme_mod('the_wp_business_single_post_image_custom_width',400);
	$the_wp_business_single_post_image_custom_height = get_theme_mod('the_wp_business_single_post_image_custom_height',400);
	if($the_wp_business_single_post_image_dimension == 'custom'){
		$the_wp_business_custom_css .='.single-feature-img img{';
			$the_wp_business_custom_css .='width: '.esc_attr($the_wp_business_single_post_image_custom_width).'px; height: '.esc_attr($the_wp_business_single_post_image_custom_height).'px;';
		$the_wp_business_custom_css .='}';
	}
// sticky sidebar
$multipurpose_portfolio_sticky_sidebar = get_theme_mod('multipurpose_portfolio_sticky_sidebar');
if ( $multipurpose_portfolio_sticky_sidebar ) {
	$multipurpose_portfolio_custom_css .= '@media (min-width: 768px) {';
		$multipurpose_portfolio_custom_css .= '#sidebar {';
			$multipurpose_portfolio_custom_css .= 'position: sticky;';
			$multipurpose_portfolio_custom_css .= 'top: 25px;';
			$multipurpose_portfolio_custom_css .= 'align-self: start;';
		$multipurpose_portfolio_custom_css .= '}';
	$multipurpose_portfolio_custom_css .= '}';
}

// Copyright Sticky 
	$the_wp_business_resp_stickycopyright = get_theme_mod( 'the_wp_business_stickycopyright_hide_show',false);
	if($the_wp_business_resp_stickycopyright == true && get_theme_mod( 'the_wp_business_copyright_sticky',false) != true){
    	$the_wp_business_custom_css .='.copyright-sticky{';
			$the_wp_business_custom_css .='position:static;';
		$the_wp_business_custom_css .='} ';
	}	
    
	// change the Category style //
	$the_wp_business_single_post_styling = get_theme_mod( 'the_wp_business_single_post_styling','Button');
		if($the_wp_business_single_post_styling == 'Underline'){
		$the_wp_business_custom_css .='.single-post-category .post-categories li a{';
			$the_wp_business_custom_css .='text-decoration: underline; color: #000 !important; background-color:transparent;';
		$the_wp_business_custom_css .='}';
	}
	else if($the_wp_business_single_post_styling == 'Default'){
		$the_wp_business_custom_css .='.single-post-category .post-categories li a{';
			$the_wp_business_custom_css .='text-decoration: none; color: #000 !important; background-color:transparent;';
		$the_wp_business_custom_css .='}';
	}
