<?php
/**
 * The WP Business functions and definitions
 *
 * @package The WP Business
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'the_wp_business_setup' ) ) :

 
/* Breadcrumb Begin */
function the_wp_business_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					esc_html(the_title());
				echo "</span> ";
			}
		} elseif (is_page()) {
			echo "<span> ";
			esc_html(the_title());
		}
	}
}

/* Theme Setup */
function the_wp_business_setup() {

	$GLOBALS['content_width'] = apply_filters( 'the_wp_business_content_width', 640 );
	
	load_theme_textdomain( 'the-wp-business', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'the-wp-business' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('the-wp-business-homepage-thumb',240,145,true);
	
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'the-wp-business' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.WordPress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', the_wp_business_font_url() ) );
	// Theme Activation Notice
	global $pagenow;
	
	if (
		is_admin()
		&&
		('themes.php' == $pagenow)
		// &&
		// isset( $_GET['activated'] )
	) {
		add_action('admin_notices', 'the_wp_business_activation_notice');
	}
}
endif;
add_action( 'after_setup_theme', 'the_wp_business_setup' );

// Notice after Theme Activation
function the_wp_business_activation_notice() {
	$the_wp_business_meta = get_option( 'the_wp_business_admin_notice' );

	if (!$the_wp_business_meta) {
	echo '<div id="the-wp-business-welcome-notice" class="notice notice-success is-dismissible activation-notice">';
		echo '<div class="content">';
			echo '<h2>' . esc_html__( 'Thank You for Choosing The WP Business by Themesglance!', 'the-wp-business' ) . '</h2>';
			echo '<p class="notice-para">' . esc_html__( 'We’re thrilled to have you on board. To help you get started quickly and make the most out of your theme, check out the resources below:', 'the-wp-business' ) . '</p>';
			echo '<p>';
				echo '<a href="' . esc_url( admin_url( 'themes.php?page=the_wp_business_guide' ) ) . '" class="button">' . esc_html__( 'Demo Import', 'the-wp-business' ) . '</a>';
				echo '<a href="' . esc_url( 'https://preview.themesglance.com/wp-business/' ) . '" class="button" target="_blank">' . esc_html__( 'Demo', 'the-wp-business' ) . '</a>';
				echo '<a href="' . esc_url( 'https://www.themesglance.com/products/business-WordPress-theme' ) . '" class="button" target="_blank">' . esc_html__( 'Get Premium', 'the-wp-business' ) . '</a>';
				echo '<a href="' . esc_url( 'https://preview.themesglance.com/demo/docs/free-wp-business/' ) . '" class="button" target="_blank">' . esc_html__( 'Documentation', 'the-wp-business' ) . '</a>';
			echo '</p>';
		echo '</div>';
		echo '<div class="image-preview">';
                echo '<a  href="https://www.themesglance.com/products/wp-theme-bundle" target="_blank" class="pre-img rel="noopener noreferrer"">';
                echo '<img src="' . esc_url( get_template_directory_uri() . '/images/notice-img.png' ) . '" alt="Notice Image" />';
        echo '</a>';
		echo '</div>';
	echo '</div>';
}
}

/* Theme Widgets Setup */
function the_wp_business_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'the-wp-business' ),
		'description'   => __( 'Appears on blog page sidebar', 'the-wp-business' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2 mb-4">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title p-2 mb-3">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'the-wp-business' ),
		'description'   => __( 'Appears on page sidebar', 'the-wp-business' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2 mb-4">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title p-2 mb-3">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Sidebar', 'the-wp-business' ),
		'description'   => __( 'Appears on page sidebar', 'the-wp-business' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2 mb-4">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title p-2 mb-3">',
		'after_title'   => '</h3>',
	) );

	$the_wp_business_footer_columns = get_theme_mod('the_wp_business_footer_widget', '4');
	for ($i=1; $i<=$the_wp_business_footer_columns; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer ', 'the-wp-business' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s py-4">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title pb-2 mb-3">',
			'after_title'   => '</h3>',
		) );
	}
	register_sidebar( array(
			'name'          => __( 'Shop Page Sidebar', 'the-wp-business' ),
			'description'   => __( 'Appears on shop page', 'the-wp-business' ),	
			'id'            => 'woocommerce_sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Single Product Page Sidebar', 'the-wp-business' ),
		'description'   => __( 'Appears on shop page', 'the-wp-business' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'the_wp_business_widgets_init' );

/* Theme Font URL */
function the_wp_business_font_url(){
	$font_family   = array(
		'ABeeZee:ital@0;1',
		'Abril Fatfac',
		'Acme',
		'Allura',
		'Amatic SC:wght@400;700',
		'Anton',
		'Architects Daughter',
		'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
		'Arvo:ital,wght@0,400;0,700;1,400;1,700',
		'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Asap:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Assistant:wght@200;300;400;500;600;700;800',
		'Alfa Slab One',
		'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Bangers',
		'Boogaloo',
		'Bad Script',
		'Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Barlow Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Berkshire Swash',
		'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Bree Serif',
		'BenchNine:wght@300;400;700',
		'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cardo:ital,wght@0,400;0,700;1,400',
		'Courgette',
		'Caveat:wght@400;500;600;700',
		'Caveat Brush',
		'Cherry Swash:wght@400;700',
		'Comfortaa:wght@300;400;500;600;700',
		'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
		'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
		'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cookie',
		'Coming Soon',
		'Charm:wght@400;700',
		'Chewy',
		'Days One',
		'DM Serif Display:ital@0;1',
		'Dosis:wght@200;300;400;500;600;700;800',
		'EB Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800',
		'Economica:ital,wght@0,400;0,700;1,400;1,700',
		'Epilogue:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Exo 2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Familjen Grotesk:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Fira Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Fredoka One',
		'Fjalla One',
		'Francois One',
		'Frank Ruhl Libre:wght@300;400;500;700;900',
		'Gabriela',
		'Gloria Hallelujah',
		'Great Vibes',
		'Handlee',
		'Hammersmith One',
		'Heebo:wght@100;200;300;400;500;600;700;800;900',
		'Hind:wght@300;400;500;600;700',
		'Inconsolata:wght@200;300;400;500;600;700;800;900',
		'Indie Flower',
		'IM Fell English SC',
		'Julius Sans One',
		'Jomhuria',
		'Josefin Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Josefin Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Kaisei HarunoUmi:wght@400;500;700',
		'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Kaushan Script',
		'Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700',
		'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
		'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Libre Baskerville:ital,wght@0,400;0,700;1,400',
		'Lobster',
		'Lobster Two:ital,wght@0,400;0,700;1,400;1,700',
		'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
		'Monda:wght@400;700',
		'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Marck Script',
		'Marcellus',
		'Merienda One',
		'Monda:wght@400;700',
		'Noto Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Nunito Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900',
		'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
		'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Overpass Mono:wght@300;400;500;600;700',
		'Oxygen:wght@300;400;700',
		'Oswald:wght@200;300;400;500;600;700',
		'Orbitron:wght@400;500;600;700;800;900',
		'Patua One',
		'Pacifico',
		'Padauk:wght@400;700',
		'Playball',
		'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'PT Sans:ital,wght@0,400;0,700;1,400;1,700',
		'PT Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
		'Permanent Marker',
		'Poiret One',
		'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Prata',
		'Quicksand:wght@300;400;500;600;700',
		'Quattrocento Sans:ital,wght@0,400;0,700;1,400;1,700',
		'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Roboto Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Rokkitt:wght@100;200;300;400;500;600;700;800;900',
		'Ropa Sans:ital@0;1',
		'Russo One',
		'Righteous',
		'Saira:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Satisfy',
		'Sen:wght@400;700;800',
		'Slabo 13px',
		'Slabo 27px',
		'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
		'Shadows Into Light Two',
		'Shadows Into Light',
		'Sacramento',
		'Sail',
		'Shrikhand',
		'League Spartan:wght@100;200;300;400;500;600;700;800;900',
		'Staatliches',
		'Stylish',
		'Tangerine:wght@400;700',
		'Titillium Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700',
		'Trirong:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700',
		'Unica One',
		'VT323',
		'Varela Round',
		'Vampiro One',
		'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Volkhov:ital,wght@0,400;0,700;1,400;1,700',
		'Work Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Yanone Kaffeesatz:wght@200;300;400;500;600;700',
		'Yeseva One',
		'ZCOOL XiaoWei'
	);

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

/* Theme enqueue scripts */
function the_wp_business_scripts() {
	wp_enqueue_style( 'the-wp-business-font', the_wp_business_font_url(), array() );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'the-wp-business-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'the-wp-business-style', 'rtl', 'replace' );
	wp_enqueue_style( 'the-wp-business-block-pattern-frontend', get_template_directory_uri().'/block-patterns/css/block-frontend.css' );
	wp_enqueue_style( 'the-wp-business-effect', get_template_directory_uri().'/css/effect.css' );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css' );	
	wp_enqueue_style( 'block-style', get_theme_file_uri('/css/blocks-style.css') );
	wp_enqueue_style( 'animate-style', get_template_directory_uri().'/css/animate.css' );
	wp_enqueue_script( 'wow-jquery', get_template_directory_uri() . '/js/wow.js', array('jquery'),'' ,true );

	// Paragraph
	    $the_wp_business_paragraph_color = get_theme_mod('the_wp_business_paragraph_color', '');
	    $the_wp_business_paragraph_font_family = get_theme_mod('the_wp_business_paragraph_font_family', '');
	    $the_wp_business_paragraph_font_size = get_theme_mod('the_wp_business_paragraph_font_size', '');
	// "a" tag
		$the_wp_business_atag_color = get_theme_mod('the_wp_business_atag_color', '');
	    $the_wp_business_atag_font_family = get_theme_mod('the_wp_business_atag_font_family', '');
	// "li" tag
		$the_wp_business_li_color = get_theme_mod('the_wp_business_li_color', '');
	    $the_wp_business_li_font_family = get_theme_mod('the_wp_business_li_font_family', '');
	// H1
		$the_wp_business_h1_color = get_theme_mod('the_wp_business_h1_color', '');
	    $the_wp_business_h1_font_family = get_theme_mod('the_wp_business_h1_font_family', '');
	    $the_wp_business_h1_font_size = get_theme_mod('the_wp_business_h1_font_size', '');
	// H2
		$the_wp_business_h2_color = get_theme_mod('the_wp_business_h2_color', '');
	    $the_wp_business_h2_font_family = get_theme_mod('the_wp_business_h2_font_family', '');
	    $the_wp_business_h2_font_size = get_theme_mod('the_wp_business_h2_font_size', '');
	// H3
		$the_wp_business_h3_color = get_theme_mod('the_wp_business_h3_color', '');
	    $the_wp_business_h3_font_family = get_theme_mod('the_wp_business_h3_font_family', '');
	    $the_wp_business_h3_font_size = get_theme_mod('the_wp_business_h3_font_size', '');
	// H4
		$the_wp_business_h4_color = get_theme_mod('the_wp_business_h4_color', '');
	    $the_wp_business_h4_font_family = get_theme_mod('the_wp_business_h4_font_family', '');
	    $the_wp_business_h4_font_size = get_theme_mod('the_wp_business_h4_font_size', '');
	// H5
		$the_wp_business_h5_color = get_theme_mod('the_wp_business_h5_color', '');
	    $the_wp_business_h5_font_family = get_theme_mod('the_wp_business_h5_font_family', '');
	    $the_wp_business_h5_font_size = get_theme_mod('the_wp_business_h5_font_size', '');
	// H6
		$the_wp_business_h6_color = get_theme_mod('the_wp_business_h6_color', '');
	    $the_wp_business_h6_font_family = get_theme_mod('the_wp_business_h6_font_family', '');
	    $the_wp_business_h6_font_size = get_theme_mod('the_wp_business_h6_font_size', '');


		$the_wp_business_custom_css ='
			p,span{
			    color:'.esc_html($the_wp_business_paragraph_color).'!important;
			    font-family: '.esc_html($the_wp_business_paragraph_font_family).';
			    font-size: '.esc_html($the_wp_business_paragraph_font_size).';
			}
			a{
			    color:'.esc_html($the_wp_business_atag_color).'!important;
			    font-family: '.esc_html($the_wp_business_atag_font_family).';
			}
			li{
			    color:'.esc_html($the_wp_business_li_color).'!important;
			    font-family: '.esc_html($the_wp_business_li_font_family).';
			}
			h1{
			    color:'.esc_html($the_wp_business_h1_color).'!important;
			    font-family: '.esc_html($the_wp_business_h1_font_family).'!important;
			    font-size: '.esc_html($the_wp_business_h1_font_size).'!important;
			}
			h2{
			    color:'.esc_html($the_wp_business_h2_color).'!important;
			    font-family: '.esc_html($the_wp_business_h2_font_family).'!important;
			    font-size: '.esc_html($the_wp_business_h2_font_size).'!important;
			}
			h3{
			    color:'.esc_html($the_wp_business_h3_color).'!important;
			    font-family: '.esc_html($the_wp_business_h3_font_family).'!important;
			    font-size: '.esc_html($the_wp_business_h3_font_size).'!important;
			}
			h4{
			    color:'.esc_html($the_wp_business_h4_color).'!important;
			    font-family: '.esc_html($the_wp_business_h4_font_family).'!important;
			    font-size: '.esc_html($the_wp_business_h4_font_size).'!important;
			}
			h5{
			    color:'.esc_html($the_wp_business_h5_color).'!important;
			    font-family: '.esc_html($the_wp_business_h5_font_family).'!important;
			    font-size: '.esc_html($the_wp_business_h5_font_size).'!important;
			}
			h6{
			    color:'.esc_html($the_wp_business_h6_color).'!important;
			    font-family: '.esc_html($the_wp_business_h6_font_family).'!important;
			    font-size: '.esc_html($the_wp_business_h6_font_size).'!important;
			}

			';
			
	wp_add_inline_style( 'the-wp-business-basic-style',$the_wp_business_custom_css );

	wp_enqueue_script( 'the-wp-business-custom-scripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery') ,'',true);
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	require get_parent_theme_file_path( '/inc/color-option.php' );
	wp_add_inline_style( 'the-wp-business-basic-style',$the_wp_business_custom_css );
}
add_action( 'wp_enqueue_scripts', 'the_wp_business_scripts' );

/*** Enqueue block editor style */
function the_wp_business_block_editor_styles() {
	wp_enqueue_style( 'the-wp-business-font', the_wp_business_font_url(), array() );
    wp_enqueue_style( 'the-wp-business-block-patterns-style-editor', get_theme_file_uri( '/block-patterns/css/block-editor.css' ), false, '1.0', 'all' );
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/css/bootstrap.css' );
}
add_action( 'enqueue_block_editor_assets', 'the_wp_business_block_editor_styles' );


function the_wp_business_my_setup() {
	/* Block pattern */
	require get_template_directory() . '/block-patterns/block-patterns.php';
		/* Theme Credit link */
	define('THE_WP_BUSINESS_PRO_THEME_URL',__('https://www.themesglance.com/products/business-WordPress-theme','the-wp-business'));
	define('THE_WP_BUSINESS_THEME_DOC',__('https://preview.themesglance.com/demo/docs/wp-business/','the-wp-business'));
	define('THE_WP_BUSINESS_LIVE_DEMO',__('https://preview.themesglance.com/wp-business/','the-wp-business'));
	define('THE_WP_BUSINESS_FREE_THEME_DOC',__('http://preview.themesglance.com/demo/docs/free-wp-business/','the-wp-business'));
	define('THE_WP_BUSINESS_SUPPORT',__('https://WordPress.org/support/theme/the-wp-business/','the-wp-business'));
	define('THE_WP_BUSINESS_REVIEW',__('https://WordPress.org/support/theme/the-wp-business/reviews/','the-wp-business'));
	define('THE_WP_BUSINESS_SITE_URL',__('https://www.themesglance.com/products/wp-business-WordPress-theme','the-wp-business'));
	define('THE_WP_BUSINESS_BUNDLE_URL',__('https://www.themesglance.com/products/wp-theme-bundle','the-wp-business'));
}
add_action( 'after_setup_theme', 'the_wp_business_my_setup' );


function the_wp_business_credit_link() {
    echo "<a href=".esc_url(THE_WP_BUSINESS_SITE_URL)." target='_blank'>".esc_html__('Business WordPress Theme','the-wp-business')."</a>";
}

/*radio button sanitization*/
function the_wp_business_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'the_wp_business_loop_columns');
	if (!function_exists('the_wp_business_loop_columns')) {
	function the_wp_business_loop_columns() {
		return get_theme_mod( 'the_wp_business_products_per_row', '3' ); // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'the_wp_business_products_per_page' );
function the_wp_business_products_per_page( $cols ) {
  	return  get_theme_mod( 'the_wp_business_products_per_page',9);
}

function the_wp_business_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/* Excerpt Limit Begin */
function the_wp_business_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
		array_pop($words);
	return implode(' ', $words);
}

function the_wp_business_blog_image_dimension(){
	if(get_theme_mod('the_wp_business_blog_image_dimension') == 'custom' ) {
		return true;
	}
	return false;
}

function the_wp_business_pagination_callback() {
    return get_theme_mod( 'the_wp_business_pagination_type', 'page-numbers' ) === 'next-prev';
}

function the_wp_business_excerpt_enabled(){
	if(get_theme_mod('the_wp_business_blog_post_content') == 'Excerpt Content' ) {
		return true;
	}
	return false;
}

function the_wp_business_grid_excerpt_enabled(){
	if(get_theme_mod('the_wp_business_grid_post_content') == 'Excerpt Content' ) {
		return true;
	}
	return false;
}

function the_wp_business_single_post_image_dimension(){
	if(get_theme_mod('the_wp_business_single_post_image_dimension') == 'custom' ) {
		return true;
	}
	return false;
}

function the_wp_business_button_enabled(){
	if(get_theme_mod('the_wp_business_blog_button_text') != '' ) {
		return true;
	}
	return false;
}

/*----- Related Posts Function ------*/
if ( ! function_exists( 'the_wp_business_related_posts_function' ) ) {
	function the_wp_business_related_posts_function() {
		wp_reset_postdata();
		global $post;

		// Define shared post arguments
		$args = array(
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'ignore_sticky_posts'    => 1,
			'orderby'                => 'rand',
			'post__not_in'           => array( $post->ID ),
			'posts_per_page'    => absint( get_theme_mod( 'the_wp_business_related_post_count', '3' ) ),
		);
		// Related by categories
		if ( get_theme_mod( 'the_wp_business_post_shown_by', 'categories' ) == 'categories' ) {

			$cats = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $cats ) {
				$cats                 = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
				$args['category__in'] = $cats;
			} else {
				$args['cat'] = $cats;
			}
		}
		// Related by tags
		if ( get_theme_mod( 'the_wp_business_post_shown_by', 'categories' ) == 'tags' ) {

			$tags = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $tags ) {
				$tags            = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
				$args['tag__in'] = $tags;
			} else {
				$args['tag_slug__in'] = explode( ',', $tags );
			}
			if ( ! $tags ) {
				$break = true;
			}
		}

		$query = ! isset( $break ) ? new WP_Query( $args ) : new WP_Query();

		return $query;
	}
}

function the_wp_business_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function the_wp_business_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function the_wp_business_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

/* Starter Content */
	add_theme_support( 'starter-content', array(
		'widgets' => array(
			'footer-1' => array(
				'categories',
			),
			'footer-2' => array(
				'archives',
			),
			'footer-3' => array(
				'meta',
			),
			'footer-4' => array(
				'search',
			),
		),
    ));

/* About Theme. */
require get_template_directory() . '/inc/getting-started/getting-started.php';
/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';
/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';
/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* About Us Widget */
require get_template_directory() . '/inc/about-widget.php';

/* Contact Us Widget */
require get_template_directory() . '/inc/contact-widget.php';

/* webfont */
require get_template_directory() . '/inc/wptt-webfont-loader.php';

// plugin page
add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );

// Admin notice code START
function the_wp_business_dismissed_notice() {
	update_option( 'the_wp_business_admin_notice', true );
}
add_action( 'wp_ajax_the_wp_business_dismissed_notice', 'the_wp_business_dismissed_notice' );


//After Switch theme function
add_action('after_switch_theme', 'the_wp_business_getstart_setup_options');
function the_wp_business_getstart_setup_options () {
    update_option('the_wp_business_admin_notice', false );
}
// Admin notice code END


/* MRK Digital accessibility and responsive enhancements. */
function mrk_digital_enqueue_assets() {
    wp_enqueue_script(
        'mrk-digital-menu',
        get_template_directory_uri() . '/assets/js/mrk-menu.js',
        array(),
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'mrk_digital_enqueue_assets', 30 );


/* MRK Digital Services & Projects content types. */
function mrk_digital_register_content_types() {
    register_post_type( 'mrk_service', array(
        'labels' => array(
            'name' => 'MRK Services', 'singular_name' => 'MRK Service',
            'add_new' => 'Add Service', 'add_new_item' => 'Add New Service',
            'edit_item' => 'Edit Service', 'new_item' => 'New Service',
            'view_item' => 'View Service', 'search_items' => 'Search Services',
        ),
        'public' => true, 'show_in_rest' => true, 'menu_icon' => 'dashicons-admin-tools',
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
        'has_archive' => 'services', 'rewrite' => array( 'slug' => 'services' ),
        'taxonomies' => array( 'mrk_service_area' ),
    ) );
    register_post_type( 'mrk_project', array(
        'labels' => array(
            'name' => 'MRK Projects', 'singular_name' => 'MRK Project',
            'add_new' => 'Add Project', 'add_new_item' => 'Add New Project',
            'edit_item' => 'Edit Project', 'new_item' => 'New Project',
            'view_item' => 'View Project', 'search_items' => 'Search Projects',
        ),
        'public' => true, 'show_in_rest' => true, 'menu_icon' => 'dashicons-portfolio',
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
        'has_archive' => 'projects', 'rewrite' => array( 'slug' => 'projects' ),
        'taxonomies' => array( 'mrk_project_type' ),
    ) );

    register_taxonomy( 'mrk_service_area', 'mrk_service', array(
        'labels' => array( 'name' => 'Service Areas', 'singular_name' => 'Service Area' ),
        'public' => true, 'show_in_rest' => true, 'hierarchical' => true,
        'rewrite' => array( 'slug' => 'service-area' ),
    ) );

    register_taxonomy( 'mrk_project_type', 'mrk_project', array(
        'labels' => array( 'name' => 'Project Types', 'singular_name' => 'Project Type' ),
        'public' => true, 'show_in_rest' => true, 'hierarchical' => true,
        'rewrite' => array( 'slug' => 'project-type' ),
    ) );
}
add_action( 'init', 'mrk_digital_register_content_types' );
/* Keep MRK Services and Projects archives ordered for portfolio presentation. */
function mrk_digital_archive_order( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }

    if ( $query->is_post_type_archive( array( 'mrk_service', 'mrk_project' ) ) ) {
        $query->set( 'orderby', 'menu_order' );
        $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'mrk_digital_archive_order' );

/* Add safe loading hints for the main MRK font/icon resources used by the original theme. */
function mrk_digital_resource_hints( $urls, $relation_type ) {
    if ( 'preconnect' !== $relation_type ) {
        return $urls;
    }

    $urls[] = array(
        'href' => 'https://fonts.googleapis.com',
        'crossorigin' => '',
    );
    $urls[] = array(
        'href' => 'https://fonts.gstatic.com',
        'crossorigin' => '',
    );
    return $urls;
}
add_filter( 'wp_resource_hints', 'mrk_digital_resource_hints', 10, 2 );

/* MRK one-click admin setup for service/project taxonomies. */
function mrk_digital_setup_defaults() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $service_areas = array(
        'Digital & Online Services',
        'Web & App Development',
        'SEO & Digital Marketing',
        'Graphic Design',
        'PLC & Industrial Automation',
        'Arduino / ESP32',
        'Mobile Software',
        'Electrical & Engineering',
    );
    $project_types = array(
        'Web Development',
        'WordPress',
        'Automation',
        'PLC',
        'Arduino / ESP32',
        'Electrical Engineering',
        'Graphic Design',
        'Digital Services',
    );

    foreach ( $service_areas as $term ) {
        if ( ! term_exists( $term, 'mrk_service_area' ) ) {
            wp_insert_term( $term, 'mrk_service_area' );
        }
    }
    foreach ( $project_types as $term ) {
        if ( ! term_exists( $term, 'mrk_project_type' ) ) {
            wp_insert_term( $term, 'mrk_project_type' );
        }
    }
}

function mrk_digital_admin_setup_page() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    if ( isset( $_POST['mrk_setup_defaults'] ) ) {
        check_admin_referer( 'mrk_setup_defaults_action', 'mrk_setup_defaults_nonce' );
        mrk_digital_setup_defaults();
        echo '<div class="notice notice-success is-dismissible"><p><strong>MRK Digital:</strong> Default Service Areas اور Project Types تیار کر دیے گئے ہیں۔</p></div>';
    }
    ?>
    <div class="wrap">
        <h1>MRK Digital Setup</h1>
        <p>یہ setup صرف default categories/taxonomies بناتا ہے۔ موجودہ terms یا services/projects کو delete یا overwrite نہیں کرتا۔</p>
        <form method="post">
            <?php wp_nonce_field( 'mrk_setup_defaults_action', 'mrk_setup_defaults_nonce' ); ?>
            <p><button type="submit" name="mrk_setup_defaults" class="button button-primary button-hero">MRK Default Setup چلائیں</button></p>
        </form>
        <hr>
        <h2>Content workflow</h2>
        <ol>
            <li><strong>MRK Services</strong> میں service بنائیں۔</li>
            <li>Excerpt، Featured Image اور Service Area شامل کریں۔</li>
            <li><strong>MRK Projects</strong> میں completed work شامل کریں۔</li>
            <li>Project Type، Featured Image اور ترتیب منتخب کریں۔</li>
            <li>Publish کے بعد homepage، Services اور Projects pages خود update ہوں گے۔</li>
        </ol>
    </div>
    <?php
}

function mrk_digital_admin_menu() {
    add_submenu_page(
        'edit.php?post_type=mrk_service',
        'MRK Digital Setup',
        'MRK Setup',
        'manage_options',
        'mrk-digital-setup',
        'mrk_digital_admin_setup_page'
    );
}
add_action( 'admin_menu', 'mrk_digital_admin_menu' );

/* MRK admin columns and content guidance. */
function mrk_digital_admin_columns( $columns, $post_type ) {
    if ( 'mrk_service' === $post_type ) {
        return array(
            'cb' => isset( $columns['cb'] ) ? $columns['cb'] : '<input type="checkbox" />',
            'title' => 'Service',
            'mrk_service_image' => 'Image',
            'mrk_service_area' => 'Service Area',
            'mrk_order' => 'Order',
            'date' => 'Date',
        );
    }

    if ( 'mrk_project' === $post_type ) {
        return array(
            'cb' => isset( $columns['cb'] ) ? $columns['cb'] : '<input type="checkbox" />',
            'title' => 'Project',
            'mrk_project_image' => 'Image',
            'mrk_project_type' => 'Project Type',
            'mrk_order' => 'Order',
            'date' => 'Date',
        );
    }

    return $columns;
}
add_filter( 'manage_edit-mrk_service_columns', function( $columns ) {
    return mrk_digital_admin_columns( $columns, 'mrk_service' );
} );
add_filter( 'manage_edit-mrk_project_columns', function( $columns ) {
    return mrk_digital_admin_columns( $columns, 'mrk_project' );
} );

function mrk_digital_admin_column_content( $column, $post_id ) {
    if ( 'mrk_service_image' === $column || 'mrk_project_image' === $column ) {
        if ( has_post_thumbnail( $post_id ) ) {
            echo get_the_post_thumbnail( $post_id, array( 64, 48 ), array( 'style' => 'width:64px;height:48px;object-fit:cover;border-radius:6px;' ) );
        } else {
            echo '<span aria-hidden="true">—</span>';
        }
        return;
    }

    if ( 'mrk_order' === $column ) {
        echo esc_html( (string) get_post_field( 'menu_order', $post_id ) );
        return;
    }

    if ( 'mrk_service_area' === $column ) {
        $terms = get_the_terms( $post_id, 'mrk_service_area' );
    } elseif ( 'mrk_project_type' === $column ) {
        $terms = get_the_terms( $post_id, 'mrk_project_type' );
    } else {
        return;
    }

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        echo esc_html( implode( ', ', wp_list_pluck( $terms, 'name' ) ) );
    } else {
        echo '<span aria-hidden="true">—</span>';
    }
}
add_action( 'manage_mrk_service_posts_custom_column', 'mrk_digital_admin_column_content', 10, 2 );
add_action( 'manage_mrk_project_posts_custom_column', 'mrk_digital_admin_column_content', 10, 2 );

/* Helpful MRK editing instructions on service/project screens. */
function mrk_digital_editor_help() {
    $screen = get_current_screen();
    if ( ! $screen || ! in_array( $screen->post_type, array( 'mrk_service', 'mrk_project' ), true ) ) {
        return;
    }

    $title = 'MRK Content Checklist';
    $message = 'Title واضح رکھیں، مختصر excerpt لکھیں، Featured Image شامل کریں، متعلقہ taxonomy منتخب کریں، اور Publish سے پہلے mobile preview ضرور چیک کریں۔';
    echo '<div class="notice notice-info"><p><strong>' . esc_html( $title ) . ':</strong> ' . esc_html( $message ) . '</p></div>';
}
add_action( 'admin_notices', 'mrk_digital_editor_help' );


/* MRK SEO metadata and structured data. */
function mrk_digital_seo_head() {
    if ( ! is_singular( array( 'mrk_service', 'mrk_project' ) ) ) {
        return;
    }

    $post_id = get_queried_object_id();
    $title = wp_strip_all_tags( get_the_title( $post_id ) );
    $description = wp_strip_all_tags( get_the_excerpt( $post_id ) );
    if ( ! $description ) {
        $description = wp_trim_words( wp_strip_all_tags( get_post_field( 'post_content', $post_id ) ), 28 );
    }

    if ( $description ) {
        echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
    }

    $type = get_post_type( $post_id ) === 'mrk_project' ? 'CreativeWork' : 'Service';
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => $type,
        'name' => $title,
        'url' => get_permalink( $post_id ),
        'description' => $description,
        'provider' => array(
            '@type' => 'Organization',
            'name' => 'MRK Digital & Online Services Center',
            'url' => home_url( '/' ),
        ),
    );

    if ( has_post_thumbnail( $post_id ) ) {
        $schema['image'] = get_the_post_thumbnail_url( $post_id, 'large' );
    }

    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}
add_action( 'wp_head', 'mrk_digital_seo_head', 25 );

/* Add service/project type classes to the body for targeted responsive styling. */
function mrk_digital_body_classes( $classes ) {
    if ( is_singular( 'mrk_service' ) ) {
        $classes[] = 'mrk-service-single';
    }
    if ( is_singular( 'mrk_project' ) ) {
        $classes[] = 'mrk-project-single';
    }
    return $classes;
}
add_filter( 'body_class', 'mrk_digital_body_classes' );


/* Flush MRK rewrite rules once after theme activation. */
function mrk_digital_flush_rewrite_rules() {
    mrk_digital_register_content_types();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'mrk_digital_flush_rewrite_rules' );
