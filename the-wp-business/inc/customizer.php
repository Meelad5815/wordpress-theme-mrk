<?php
/**
 * The WP Business Theme Customizer
 *
 * @package The WP Business
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function the_wp_business_customize_register( $wp_customize ) {	

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-selector.php' );

	class The_WP_Business_WP_Customize_Range_Control extends WP_Customize_Control{
	    public $type = 'custom_range';
	    public function enqueue(){
	        wp_enqueue_script(
	            'cs-range-control',
	            false,
	            true
	        );
	    }
	    public function render_content(){?>
	        <label>
	            <?php if ( ! empty( $this->label )) : ?>
	                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	            <?php endif; ?>
	            <div class="cs-range-value"><?php echo esc_html($this->value()); ?></div>
	            <input data-input-type="range" type="range" <?php $this->input_attrs(); ?> value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
	            <?php if ( ! empty( $this->description )) : ?>
	                <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
	            <?php endif; ?>
	        </label>
        <?php }
	}	

	//add home page setting pannel
	$wp_customize->add_panel( 'the_wp_business_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'TG Settings', 'the-wp-business' ),
	    'description' => __( 'Description of what this panel does.', 'the-wp-business' ),
	) );

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'the_wp_business_theme_color_option', array( 
		'panel' => 'the_wp_business_panel_id', 
		'title' => esc_html__( 'Global Color Settings', 'the-wp-business' ) 
	) );

  	$wp_customize->add_setting( 'the_wp_business_theme_color', array(
	    'default' => '#1e7600',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_theme_color', array(
  		'label' => 'Color Option',
	    'description' => __('One can change complete theme global color settings on just one click.', 'the-wp-business'),
	    'section' => 'the_wp_business_theme_color_option',
	    'settings' => 'the_wp_business_theme_color',
  	)));

    $the_wp_business_font_array = array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

	//Typography
	$wp_customize->add_section( 'the_wp_business_typography', array(
    	'title'      => __( 'Typography', 'the-wp-business' ),
		'panel' => 'the_wp_business_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'the_wp_business_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_paragraph_color', array(
		'label' => __('Paragraph Color', 'the-wp-business'),
		'section' => 'the_wp_business_typography',
		'settings' => 'the_wp_business_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('the_wp_business_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_wp_business_paragraph_font_family', array(
	    'section'  => 'the_wp_business_typography',
	    'label'    => __( 'Paragraph Fonts','the-wp-business'),
	    'type'     => 'select',
	    'choices'  => $the_wp_business_font_array,
	));

	$wp_customize->add_setting('the_wp_business_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('the_wp_business_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','the-wp-business'),
		'section'	=> 'the_wp_business_typography',
		'setting'	=> 'the_wp_business_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'the_wp_business_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_atag_color', array(
		'label' => __('"a" Tag Color', 'the-wp-business'),
		'section' => 'the_wp_business_typography',
		'settings' => 'the_wp_business_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('the_wp_business_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_wp_business_atag_font_family', array(
	    'section'  => 'the_wp_business_typography',
	    'label'    => __( '"a" Tag Fonts','the-wp-business'),
	    'type'     => 'select',
	    'choices'  => $the_wp_business_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'the_wp_business_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_li_color', array(
		'label' => __('"li" Tag Color', 'the-wp-business'),
		'section' => 'the_wp_business_typography',
		'settings' => 'the_wp_business_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('the_wp_business_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_wp_business_li_font_family', array(
	    'section'  => 'the_wp_business_typography',
	    'label'    => __( '"li" Tag Fonts','the-wp-business'),
	    'type'     => 'select',
	    'choices'  => $the_wp_business_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'the_wp_business_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_h1_color', array(
		'label' => __('H1 Color', 'the-wp-business'),
		'section' => 'the_wp_business_typography',
		'settings' => 'the_wp_business_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('the_wp_business_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_wp_business_h1_font_family', array(
	    'section'  => 'the_wp_business_typography',
	    'label'    => __( 'H1 Fonts','the-wp-business'),
	    'type'     => 'select',
	    'choices'  => $the_wp_business_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('the_wp_business_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('the_wp_business_h1_font_size',array(
		'label'	=> __('H1 Font Size','the-wp-business'),
		'section'	=> 'the_wp_business_typography',
		'setting'	=> 'the_wp_business_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'the_wp_business_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_h2_color', array(
		'label' => __('H2 Color', 'the-wp-business'),
		'section' => 'the_wp_business_typography',
		'settings' => 'the_wp_business_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('the_wp_business_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_wp_business_h2_font_family', array(
	    'section'  => 'the_wp_business_typography',
	    'label'    => __( 'H2 Fonts','the-wp-business'),
	    'type'     => 'select',
	    'choices'  => $the_wp_business_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('the_wp_business_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_wp_business_h2_font_size',array(
		'label'	=> __('H2 Font Size','the-wp-business'),
		'section'	=> 'the_wp_business_typography',
		'setting'	=> 'the_wp_business_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'the_wp_business_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_h3_color', array(
		'label' => __('H3 Color', 'the-wp-business'),
		'section' => 'the_wp_business_typography',
		'settings' => 'the_wp_business_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('the_wp_business_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_wp_business_h3_font_family', array(
	    'section'  => 'the_wp_business_typography',
	    'label'    => __( 'H3 Fonts','the-wp-business'),
	    'type'     => 'select',
	    'choices'  => $the_wp_business_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('the_wp_business_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('the_wp_business_h3_font_size',array(
		'label'	=> __('H3 Font Size','the-wp-business'),
		'section'	=> 'the_wp_business_typography',
		'setting'	=> 'the_wp_business_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'the_wp_business_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_h4_color', array(
		'label' => __('H4 Color', 'the-wp-business'),
		'section' => 'the_wp_business_typography',
		'settings' => 'the_wp_business_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('the_wp_business_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_wp_business_h4_font_family', array(
	    'section'  => 'the_wp_business_typography',
	    'label'    => __( 'H4 Fonts','the-wp-business'),
	    'type'     => 'select',
	    'choices'  => $the_wp_business_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('the_wp_business_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_wp_business_h4_font_size',array(
		'label'	=> __('H4 Font Size','the-wp-business'),
		'section'	=> 'the_wp_business_typography',
		'setting'	=> 'the_wp_business_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'the_wp_business_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_h5_color', array(
		'label' => __('H5 Color', 'the-wp-business'),
		'section' => 'the_wp_business_typography',
		'settings' => 'the_wp_business_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('the_wp_business_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_wp_business_h5_font_family', array(
	    'section'  => 'the_wp_business_typography',
	    'label'    => __( 'H5 Fonts','the-wp-business'),
	    'type'     => 'select',
	    'choices'  => $the_wp_business_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('the_wp_business_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('the_wp_business_h5_font_size',array(
		'label'	=> __('H5 Font Size','the-wp-business'),
		'section'	=> 'the_wp_business_typography',
		'setting'	=> 'the_wp_business_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'the_wp_business_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_h6_color', array(
		'label' => __('H6 Color', 'the-wp-business'),
		'section' => 'the_wp_business_typography',
		'settings' => 'the_wp_business_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('the_wp_business_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_wp_business_h6_font_family', array(
	    'section'  => 'the_wp_business_typography',
	    'label'    => __( 'H6 Fonts','the-wp-business'),
	    'type'     => 'select',
	    'choices'  => $the_wp_business_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('the_wp_business_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('the_wp_business_h6_font_size',array(
		'label'	=> __('H6 Font Size','the-wp-business'),
		'section'	=> 'the_wp_business_typography',
		'setting'	=> 'the_wp_business_h6_font_size',
		'type'	=> 'text'
	));

	//Topbar section
	$wp_customize->add_section('the_wp_business_topbar_icon',array(
		'title'	=> __('Topbar Section','the-wp-business'),
		'description'	=> __('Add Header Content here','the-wp-business'),
		'priority'	=> null,
		'panel' => 'the_wp_business_panel_id',
	));

	$wp_customize->add_setting('the_wp_business_top_header',array(
       'default' => false,
       'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_top_header',array(
       'type' => 'checkbox',
       'label' => __('Enable Top Header','the-wp-business'),
       'section' => 'the_wp_business_topbar_icon'
    ));

    $wp_customize->add_setting('the_wp_business_topbar_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('the_wp_business_topbar_padding',array(
		'label'	=> esc_html__('Topbar Padding','the-wp-business'),
		'section'=> 'the_wp_business_topbar_icon',
	));

    $wp_customize->add_setting('the_wp_business_top_topbar_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_top_topbar_padding',array(
		'description'	=> __('Top','the-wp-business'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'the_wp_business_topbar_icon',
		'type'=> 'number',
	));

	$wp_customize->add_setting('the_wp_business_bottom_topbar_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_bottom_topbar_padding',array(
		'description'	=> __('Bottom','the-wp-business'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'the_wp_business_topbar_icon',
		'type'=> 'number',
	));

    $wp_customize->add_setting('the_wp_business_sticky_header',array(
       'default' => '',
       'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_sticky_header',array(
       'type' => 'checkbox',
       'label' => __('Stick header on Desktop','the-wp-business'),
       'section' => 'the_wp_business_topbar_icon'
    ));

    $wp_customize->add_setting('the_wp_business_sticky_header_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('the_wp_business_sticky_header_padding',array(
		'label'	=> esc_html__('Sticky Header Padding','the-wp-business'),
		'section'=> 'the_wp_business_topbar_icon',
		'type' => 'hidden',
	));

    $wp_customize->add_setting('the_wp_business_top_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_top_sticky_header_padding',array(
		'description'	=> __('Top','the-wp-business'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'the_wp_business_topbar_icon',
		'type'=> 'number'
	));

	$wp_customize->add_setting('the_wp_business_bottom_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_bottom_sticky_header_padding',array(
		'description'	=> __('Bottom','the-wp-business'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'the_wp_business_topbar_icon',
		'type'=> 'number'
	));

	$wp_customize->add_setting('the_wp_business_show_search',array(
       'default' => 'true',
       'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_show_search',array(
       'type' => 'checkbox',
       'label' => __('Show/Hide Search','the-wp-business'),
       'section' => 'the_wp_business_topbar_icon'
    ));

    $wp_customize->add_setting('the_wp_business_search_placeholder',array(
       'default' => __('Search','the-wp-business'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_wp_business_search_placeholder',array(
       'type' => 'text',
       'label' => __('Search Placeholder text','the-wp-business'),
       'section' => 'the_wp_business_topbar_icon'
    ));

	$wp_customize->add_setting('the_wp_business_contact_corporate',array(
		'default'	=> '',
		'sanitize_callback'	=> 'the_wp_business_sanitize_phone_number'
	));	
	$wp_customize->add_control('the_wp_business_contact_corporate',array(
		'label'	=> __('Add Phone Number','the-wp-business'),
		'section'	=> 'the_wp_business_topbar_icon',
		'setting'	=> 'the_wp_business_contact_corporate',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('the_wp_business_call_icon',array(
		'default'	=> 'fa fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new the_wp_business_Icon_Selector(
        $wp_customize,'the_wp_business_call_icon',array(
		'label'	=>__('Add Phone Icon','the-wp-business'),
		'transport' => 'refresh',
		'section'	=> 'the_wp_business_topbar_icon',
		'setting'	=> 'the_wp_business_call_icon',
		'type'		=> 'icon',
	)));

	$wp_customize->add_setting('the_wp_business_email_corporate',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('the_wp_business_email_corporate',array(
		'label'	=> __('Add Email','the-wp-business'),
		'section'	=> 'the_wp_business_topbar_icon',
		'setting'	=> 'the_wp_business_email_corporate',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('the_wp_business_mail_icon',array(
		'default'	=> 'fa fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new the_wp_business_Icon_Selector(
        $wp_customize,'the_wp_business_mail_icon',array(
		'label'	=>__('Add Email Icon','the-wp-business'),
		'transport' => 'refresh',
		'section'	=> 'the_wp_business_topbar_icon',
		'setting'	=> 'the_wp_business_mail_icon',
		'type'		=> 'icon',
	)));

	$wp_customize->add_setting('the_wp_business_button_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('the_wp_business_button_text',array(
		'label'	=> __('Add Button Text','the-wp-business'),
		'section'	=> 'the_wp_business_topbar_icon',
		'setting'	=> 'the_wp_business_button_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('the_wp_business_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('the_wp_business_button_url',array(
		'label'	=> __('Add Button Url','the-wp-business'),
		'section'	=> 'the_wp_business_topbar_icon',
		'setting'	=> 'the_wp_business_button_url',
		'type'		=> 'text'
	));

	$wp_customize->add_section('the_wp_business_header',array(
		'title'	=> __('Header','the-wp-business'),
		'priority'	=> null,
		'panel' => 'the_wp_business_panel_id',
	));

	$wp_customize->add_setting('the_wp_business_menu_case',array(
        'default' => 'uppercase',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_menu_case',array(
        'type' => 'select',
        'label' => __('Menu Case','the-wp-business'),
        'section' => 'the_wp_business_header',
        'choices' => array(
            'uppercase' => __('Uppercase','the-wp-business'),
            'capitalize' => __('Capitalize','the-wp-business'),
        ),
	) );

	$wp_customize->add_setting( 'the_wp_business_menu_font_size', array(
		'default'=> '14',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new The_WP_Business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_menu_font_size', array(
        'label'  => __('Menu Font Size','the-wp-business'),
        'section'  => 'the_wp_business_header',
        'description' => __('Measurement is in pixel.','the-wp-business'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

    $wp_customize->add_setting('the_wp_business_menu_font_weight',array(
        'default' => '',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menu Font Weight','the-wp-business'),
        'section' => 'the_wp_business_header',
        'choices' => array(
            '100' => __('100','the-wp-business'),
            '200' => __('200','the-wp-business'),
            '300' => __('300','the-wp-business'),
            '400' => __('400','the-wp-business'),
            '500' => __('500','the-wp-business'),
            '600' => __('600','the-wp-business'),
            '700' => __('700','the-wp-business'),
            '800' => __('800','the-wp-business'),
            '900' => __('900','the-wp-business'),
        ),
	) );

	$wp_customize->add_setting('the_wp_business_menu_padding',array(
		'default'=> 10,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new the_wp_business_WP_Customize_Range_Control( $wp_customize,'the_wp_business_menu_padding',array(
		'label'	=> __('Menu Font Padding','the-wp-business'),
		'section'=> 'the_wp_business_header',
		'input_attrs' => array(
         'step'  => 1,
			'min'   => 0,
			'max'   => 50,
        ),
	)));

	$wp_customize->add_setting('the_wp_business_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_menus_item_style',array(
        'type' => 'select',
		'label' => __('Menu Item Hover Style','the-wp-business'),
		'section' => 'the_wp_business_header',
		'choices' => array(
            'None' => __('None','the-wp-business'),
            'Zoom In' => __('Zoom In','the-wp-business'),
			'Underline Expand' => __('Underline Expand', 'the-wp-business'), 
        ),
	) );	

	$wp_customize->add_setting('the_wp_business_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_menu_color', array(
		'label'    => __('Menu Color', 'the-wp-business'),
		'section'  => 'the_wp_business_header',
		'settings' => 'the_wp_business_menu_color',
	)));

	$wp_customize->add_setting('the_wp_business_menu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_menu_hover_color', array(
		'label'    => __('Menu Hover Color', 'the-wp-business'),
		'section'  => 'the_wp_business_header',
		'settings' => 'the_wp_business_menu_hover_color',
	)));

	$wp_customize->add_setting('the_wp_business_submenu_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_submenu_menu_color', array(
		'label'    => __('Submenu Color', 'the-wp-business'),
		'section'  => 'the_wp_business_header',
		'settings' => 'the_wp_business_submenu_menu_color',
	)));

	$wp_customize->add_setting('the_wp_business_submenu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_submenu_hover_color', array(
		'label'    => __('Submenu Hover Color', 'the-wp-business'),
		'section'  => 'the_wp_business_header',
		'settings' => 'the_wp_business_submenu_hover_color',
	)));

	$wp_customize->add_setting( 'the_wp_business_menu_settings_premium_features',array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_wp_business_menu_settings_premium_features', array(
        'type'=> 'hidden',
        'description' => "<h3>". esc_html('Premium Theme Features!','the-wp-business') ."</h3>
            <ul>
                <li>". esc_html('Menu DropDown Background Colors','the-wp-business') ."</li>
                <li>". esc_html('Menu Item Fonts','the-wp-business') ."</li>
                <li>". esc_html('Active Menu Colors','the-wp-business') ."</li>
                <li>". esc_html('Header Search Icons Colors','the-wp-business') ."</li>
                <li>". esc_html('... and Other Premium Features','the-wp-business') ."</li>
            </ul>
            <a target='_blank' href='". esc_url('https://www.themesglance.com/products/business-WordPress-theme') ." '>". esc_html('Upgrade Now','the-wp-business') ."</a>",
        'section' => 'the_wp_business_header'
        )
    );

	//Social Icons(topbar)
	$wp_customize->add_section('the_wp_business_topbar_header',array(
		'title'	=> __('Social Icon Section','the-wp-business'),
		'description'	=> __('Add Header Content here','the-wp-business'),
		'priority'	=> null,
		'panel' => 'the_wp_business_panel_id',
	));

	$wp_customize->add_setting('the_wp_business_show_icons',array(
		'default' => true,
		'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
	 ));
	 $wp_customize->add_control('the_wp_business_show_icons',array(
		'type' => 'checkbox',
		'label' => __('Show/Hide Social Icon','the-wp-business'),
		'section' => 'the_wp_business_topbar_header'
	 ));

	$wp_customize->add_setting('the_wp_business_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('the_wp_business_youtube_url',array(
		'label'	=> __('Add Youtube link','the-wp-business'),
		'section'	=> 'the_wp_business_topbar_header',
		'setting'	=> 'the_wp_business_youtube_url',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('the_wp_business_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('the_wp_business_facebook_url',array(
		'label'	=> __('Add Facebook link','the-wp-business'),
		'section'	=> 'the_wp_business_topbar_header',
		'setting'	=> 'the_wp_business_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('the_wp_business_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('the_wp_business_twitter_url',array(
		'label'	=> __('Add Twitter link','the-wp-business'),
		'section'	=> 'the_wp_business_topbar_header',
		'setting'	=> 'the_wp_business_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('the_wp_business_rss_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('the_wp_business_rss_url',array(
		'label'	=> __('Add RSS link','the-wp-business'),
		'section'	=> 'the_wp_business_topbar_header',
		'setting'	=> 'the_wp_business_rss_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting( 'the_wp_business_social_icons_font_size', array(
		'default'=> '16',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new The_WP_Business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_social_icons_font_size', array(
        'label'  => __('Social Icons Font Size','the-wp-business'),
        'section'  => 'the_wp_business_topbar_header',
        'description' => __('Measurement is in pixel.','the-wp-business'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

	$wp_customize->add_setting('the_wp_business_header_icon_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_header_icon_color', array(
		'label'    => __('Icons Color', 'the-wp-business'),
		'section'  => 'the_wp_business_topbar_header',
	)));

	//home page slider
	$wp_customize->add_section( 'the_wp_business_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'the-wp-business' ),
		'priority'   => null,
		'panel' => 'the_wp_business_panel_id'
	) );

	$wp_customize->add_setting('the_wp_business_slider_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','the-wp-business'),
       'section' => 'the_wp_business_slidersettings'
    ));

	$wp_customize->add_setting('the_wp_business_slider_title',array(
        'default' => true,
        'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
	));
	$wp_customize->add_control('the_wp_business_slider_title',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Title','the-wp-business'),
      	'section' => 'the_wp_business_slidersettings'
	));

	$wp_customize->add_setting('the_wp_business_slider_content',array(
        'default' => true,
        'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
	));
	$wp_customize->add_control('the_wp_business_slider_content',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Content','the-wp-business'),
      	'section' => 'the_wp_business_slidersettings'
	));

	$wp_customize->add_setting('the_wp_business_slider_button',array(
        'default' => true,
        'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
	));
	$wp_customize->add_control('the_wp_business_slider_button',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Button','the-wp-business'),
      	'section' => 'the_wp_business_slidersettings'
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'the_wp_business_slidersettings_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'the_wp_business_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'the_wp_business_slidersettings_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'the-wp-business' ),
			'section'  => 'the_wp_business_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'the_wp_business_slider_speed', array(
		'default'              => 3000,
		'sanitize_callback'	=> 'the_wp_business_sanitize_float'
	) );
	$wp_customize->add_control( 'the_wp_business_slider_speed', array(
		'label'       => esc_html__( 'Slider Speed','the-wp-business' ),
		'section'     => 'the_wp_business_slidersettings',
		'type'        => 'number',
		'settings'    => 'the_wp_business_slider_speed',
		'input_attrs' => array(
			'step'             => 500,
			'min'              => 500,
			'max'              => 5000,
		),
	) );

	$wp_customize->add_setting( 'the_wp_business_slider_arrow_hide_show',array(
	    'default' => true,   
	    'sanitize_callback' => 'the_wp_business_sanitize_checkbox'
	));
	$wp_customize->add_control( 'the_wp_business_slider_arrow_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Arrows','the-wp-business' ),
		'section' => 'the_wp_business_slidersettings',
		'type' => 'checkbox',
	));

	$wp_customize->add_setting('the_wp_business_slider_prev_icon',array(
		'default'	=> 'fas fa-angle-left',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new the_wp_business_Icon_Selector(
        $wp_customize,'the_wp_business_slider_prev_icon',array(
		'label'	=>__('Add Slider Prev Icon','the-wp-business'),
		'transport' => 'refresh',
		'section'	=> 'the_wp_business_slidersettings',
		'setting'	=> 'the_wp_business_slider_prev_icon',
		'type'		=> 'icon',
	)));

	$wp_customize->add_setting('the_wp_business_slider_next_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new the_wp_business_Icon_Selector(
        $wp_customize,'the_wp_business_slider_next_icon',array(
		'label'	=> __('Add Slider Next Icon','the-wp-business'),
		'transport' => 'refresh',
		'section'	=> 'the_wp_business_slidersettings',
		'setting'	=> 'the_wp_business_slider_next_icon',
		'type'		=> 'icon',
	)));

	 $wp_customize->add_setting('the_wp_business_slider_arrows_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_slider_arrows_hover_color', array(
		'label'    => __('Slider Arrows hover Color', 'the-wp-business'),
		'section'  => 'the_wp_business_slidersettings',
		'settings' => 'the_wp_business_slider_arrows_hover_color',
	)));

	$wp_customize->add_setting('the_wp_business_content_position',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('the_wp_business_content_position',array(
		'label'	=> esc_html__('Slider Content Position','the-wp-business'),
		'section'=> 'the_wp_business_slidersettings',
	));

	$wp_customize->add_setting( 'the_wp_business_slider_top_position', array(
		'default'  => '',
		'sanitize_callback'	=> 'the_wp_business_sanitize_float'
	) );
	$wp_customize->add_control( 'the_wp_business_slider_top_position', array(
		'label' => esc_html__( 'Top','the-wp-business' ),
		'section' => 'the_wp_business_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'the_wp_business_slider_bottom_position', array(
		'default'  => '',
		'sanitize_callback'	=> 'the_wp_business_sanitize_float'
	) );
	$wp_customize->add_control( 'the_wp_business_slider_bottom_position', array(
		'label' => esc_html__( 'Bottom','the-wp-business' ),
		'section' => 'the_wp_business_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'the_wp_business_slider_left_position', array(
		'default'  => '',
		'sanitize_callback'	=> 'the_wp_business_sanitize_float'
	) );
	$wp_customize->add_control( 'the_wp_business_slider_left_position', array(
		'label' => esc_html__( 'Left','the-wp-business'),
		'section' => 'the_wp_business_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'the_wp_business_slider_right_position', array(
		'default'  => '',
		'sanitize_callback'	=> 'the_wp_business_sanitize_float'
	) );
	$wp_customize->add_control( 'the_wp_business_slider_right_position', array(
		'label' => esc_html__('Right','the-wp-business'),
		'section' => 'the_wp_business_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	//content Alignment
    $wp_customize->add_setting('the_wp_business_slider_alignment_option',array(
    'default' => 'Center Align',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_slider_alignment_option',array(
        'type' => 'radio',
        'label' => __('Slider Content Alignment','the-wp-business'),
        'section' => 'the_wp_business_slidersettings',
        'choices' => array(
            'Center Align' => __('Center Align','the-wp-business'),
            'Left Align' => __('Left Align','the-wp-business'),
            'Right Align' => __('Right Align','the-wp-business'),
        ),
	) );

    //Slider excerpt
	$wp_customize->add_setting( 'the_wp_business_slider_excerpt_number', array(
		'default'              => 15,
		'sanitize_callback'    => 'absint',
	) );
	$wp_customize->add_control( 'the_wp_business_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','the-wp-business' ),
		'section'     => 'the_wp_business_slidersettings',
		'type'        => 'number',
		'settings'    => 'the_wp_business_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('the_wp_business_slider_image_overlay',array(
        'default' => true,
        'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
	));
	$wp_customize->add_control('the_wp_business_slider_image_overlay',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Image Overlay','the-wp-business'),
      	'section' => 'the_wp_business_slidersettings',
	));

	$wp_customize->add_setting( 'the_wp_business_slider_overlay_color', array(
	    'default' => '#000',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_slider_overlay_color', array(
	    'label' => __('Slider Overlay Color', 'the-wp-business'),
	    'section' => 'the_wp_business_slidersettings',
  	)));

	//Opacity
	$wp_customize->add_setting('the_wp_business_slider_opacity_color',array(
      'default'              => 0.7,
      'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control( 'the_wp_business_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','the-wp-business' ),
		'section'     => 'the_wp_business_slidersettings',
		'type'        => 'select',
		'settings'    => 'the_wp_business_slider_opacity_color',
		'choices' => array(
	      '0' =>  esc_attr('0','the-wp-business'),
	      '0.1' =>  esc_attr('0.1','the-wp-business'),
	      '0.2' =>  esc_attr('0.2','the-wp-business'),
	      '0.3' =>  esc_attr('0.3','the-wp-business'),
	      '0.4' =>  esc_attr('0.4','the-wp-business'),
	      '0.5' =>  esc_attr('0.5','the-wp-business'),
	      '0.6' =>  esc_attr('0.6','the-wp-business'),
	      '0.7' =>  esc_attr('0.7','the-wp-business'),
	      '0.8' =>  esc_attr('0.8','the-wp-business'),
	      '0.9' =>  esc_attr('0.9','the-wp-business')
		),
	));

	$wp_customize->add_setting( 'the_wp_business_slider_button_label', array(
		'default' => __('LEARN MORE','the-wp-business' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'the_wp_business_slider_button_label', array(
		'label' => esc_html__( 'Slider Button Label','the-wp-business' ),
		'section'     => 'the_wp_business_slidersettings',
		'type'        => 'text',
		'settings'    => 'the_wp_business_slider_button_label'
	) );

	$wp_customize->add_setting('the_wp_busines_slider_button_link',array(
        'default'=> '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('the_wp_busines_slider_button_link',array(
        'label' => esc_html__('Add Button Link','the-wp-business'),
        'section'=> 'the_wp_business_slidersettings',
        'type'=> 'url'
    ));

	$wp_customize->add_setting('the_wp_business_slider_btn_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_slider_btn_color', array(
		'label'    => __('Slider Button Lable Color', 'the-wp-business'),
		'section'  => 'the_wp_business_slidersettings',
		'settings' => 'the_wp_business_slider_btn_color',
	)));

	$wp_customize->add_setting('the_wp_business_slider_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_slider_btn_bg_color', array(
		'label'    => __('Slider Button Bg Color', 'the-wp-business'),
		'section'  => 'the_wp_business_slidersettings',
		'settings' => 'the_wp_business_slider_btn_bg_color',
	)));

    $wp_customize->add_setting('the_wp_business_slider_btn_lable_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_slider_btn_lable_hover_color', array(
		'label'    => __('Slider Button Lable hover Color', 'the-wp-business'),
		'section'  => 'the_wp_business_slidersettings',
		'settings' => 'the_wp_business_slider_btn_lable_hover_color',
	)));

	$wp_customize->add_setting('the_wp_business_slider_btn_bg_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_slider_btn_bg_hover_color', array(
		'label'    => __('Slider Button Bg hover Color', 'the-wp-business'),
		'section'  => 'the_wp_business_slidersettings',
		'settings' => 'the_wp_business_slider_btn_bg_hover_color',
	)));

	$wp_customize->add_setting( 'the_wp_business_slider_height', array(
		'default'          => '',
		'sanitize_callback'	=> 'the_wp_business_sanitize_float'
	) );
	$wp_customize->add_control( 'the_wp_business_slider_height', array(
		'label'       => esc_html__( 'Slider Height','the-wp-business' ),
		'section'     => 'the_wp_business_slidersettings',
		'type'        => 'number',
		'description' => __('Measurement is in pixel.','the-wp-business'),
		'input_attrs' => array(
			'step' => 1,
			'min'  => 500,
			'max'  => 1000,
		),
	) );

	//we think
	$wp_customize->add_section('the_wp_business_wethink',array(
		'title'	=> __('We Think Section','the-wp-business'),
		'description'	=> __('Add We Think sections below.','the-wp-business'),
		'panel' => 'the_wp_business_panel_id',

	
	));

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$pst[]='Select';  
	foreach($post_list as $post){
		$pst[$post->ID] = $post->post_title;
	}

	$wp_customize->add_setting('the_wp_business_wethink_post_setting',array(
		'sanitize_callback' => 'the_wp_business_sanitize_choices',
	));

	$wp_customize->add_control('the_wp_business_wethink_post_setting',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','the-wp-business'),
		'section' => 'the_wp_business_wethink',
	));

	$wp_customize->add_setting( 'the_wp_business_wethink_settings_premium_features',array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_wp_business_wethink_settings_premium_features', array(
        'type'=> 'hidden',
        'description' => "<h3>". esc_html('Premium Theme Features!','the-wp-business') ."</h3>
            <ul>
                <li>". esc_html('Title Font & Color Settings','the-wp-business') ."</li>
                <li>". esc_html('Paragraph Font & Color Settings','the-wp-business') ."</li>
                <li>". esc_html('... and Other Premium Features','the-wp-business') ."</li>
            </ul>
            <a target='_blank' href='". esc_url('https://www.themesglance.com/products/business-WordPress-theme') ." '>". esc_html('Upgrade Now','the-wp-business') ."</a>",
        'section' => 'the_wp_business_wethink'
        )
    );

	//Layouts
	$wp_customize->add_section( 'the_wp_business_left_right', array(
    	'title'   => __( 'Blog Settings', 'the-wp-business' ),
		'panel' => 'the_wp_business_panel_id'
	) );

	$wp_customize->add_setting('the_wp_business_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
    ));
	$wp_customize->add_control('the_wp_business_theme_options', array(
        'type' => 'radio',
        'section' => 'the_wp_business_left_right',
   		'label' => __('Blog Layout','the-wp-business'),
        'choices' => array(
        	'One Column' => __('One Column','the-wp-business'),
            'Three Columns' => __('Three Columns','the-wp-business'),
            'Four Columns' => __('Four Columns','the-wp-business'),
            'Left Sidebar' => __('Left Sidebar','the-wp-business'),
            'Right Sidebar' => __('Right Sidebar','the-wp-business'),
          	'Grid Layout' => __('Grid Layout','the-wp-business')
        ),
    ));

    $wp_customize->add_setting('the_wp_business_blog_post_alignment',array(
        'default' => 'left',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
    ));
	$wp_customize->add_control('the_wp_business_blog_post_alignment', array(
        'type' => 'select',
        'label' => __( 'Blog Post Alignment', 'the-wp-business' ),
        'section' => 'the_wp_business_left_right',
        'choices' => array(
            'left' => __('Left Align','the-wp-business'),
            'right' => __('Right Align','the-wp-business'),
            'center' => __('Center Align','the-wp-business'),
			'image_content' => __('Image and Content', 'the-wp-business')
        ),
    ));

    $wp_customize->add_setting('the_wp_business_blog_post_display_type',array(
        'default' => 'blocks',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
    ));
	$wp_customize->add_control('the_wp_business_blog_post_display_type', array(
        'type' => 'select',
        'label' => __( 'Blog Page Display Type', 'the-wp-business' ),
        'section' => 'the_wp_business_left_right',
        'choices' => array(
            'blocks' => __('Blocks','the-wp-business'),
            'without blocks' => __('Without Blocks','the-wp-business'),
        ),
    ));

    $wp_customize->add_setting('the_wp_business_featured_image',array(
       'default' => 'true',
       'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_featured_image',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Featured Image','the-wp-business'),
       'section' => 'the_wp_business_left_right'
    ));

    $wp_customize->add_setting('the_wp_business_metafields_date',array(
       'default' => 'true',
       'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_metafields_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Date ','the-wp-business'),
       'section' => 'the_wp_business_left_right'
    ));

    $wp_customize->add_setting('the_wp_business_metafields_author',array(
       'default' => 'true',
       'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_metafields_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Author','the-wp-business'),
       'section' => 'the_wp_business_left_right'
    ));

    $wp_customize->add_setting('the_wp_business_postauthor_icon',array(
		'default'	=> 'fa fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_WP_Business_Icon_Selector(
        $wp_customize,'the_wp_business_postauthor_icon',array(
		'label'	=> __('Add Post Author Icon','the-wp-business'),
		'transport' => 'refresh',
		'section'	=> 'the_wp_business_left_right',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('the_wp_business_metafields_comment',array(
       'default' => 'true',
       'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_metafields_comment',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Comments','the-wp-business'),
       'section' => 'the_wp_business_left_right'
    ));

    $wp_customize->add_setting('the_wp_business_postcomment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_WP_Business_Icon_Selector(
        $wp_customize,'the_wp_business_postcomment_icon',array(
		'label'	=> __('Add Post Comments Icon','the-wp-business'),
		'transport' => 'refresh',
		'section'	=> 'the_wp_business_left_right',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('the_wp_business_metafields_time',array(
       'default' => 'true',
       'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_metafields_time',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Time','the-wp-business'),
       'section' => 'the_wp_business_left_right'
    ));

     $wp_customize->add_setting('the_wp_business_posttime_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_WP_Business_Icon_Selector(
        $wp_customize,'the_wp_business_posttime_icon',array(
		'label'	=> __('Add Post Time Icon','the-wp-business'),
		'transport' => 'refresh',
		'section'	=> 'the_wp_business_left_right',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('the_wp_business_post_navigation',array(
       'default' => 'true',
       'sanitize_callback' => 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_post_navigation',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Post Navigation','the-wp-business'),
       'section' => 'the_wp_business_left_right'
    ));

	$wp_customize->add_setting('the_wp_business_initial_caps_enable',
	array(
		'default' => false,
		'sanitize_callback' => 'the_wp_business_sanitize_checkbox',
	)); 
	$wp_customize->add_control( 'the_wp_business_initial_caps_enable', 
	array(
		'label' => esc_html__('Initial Letter Capital', 'the-wp-business'),
		'type' => 'checkbox',
		'section' => 'the_wp_business_left_right',
	));

    $wp_customize->add_setting('the_wp_business_metabox_seperator',array(
       'default' => '|',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_wp_business_metabox_seperator',array(
       'type' => 'text',
       'label' => __('Metabox Seperator','the-wp-business'),
       'description' => __('Ex: "/", "|", "-", ...','the-wp-business'),
       'section' => 'the_wp_business_left_right'
    ));

    $wp_customize->add_setting('the_wp_business_blog_post_content',array(
    	'default' => 'Excerpt Content',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_blog_post_content',array(
        'type' => 'radio',
        'label' => __('Blog Post Content Type','the-wp-business'),
        'section' => 'the_wp_business_left_right',
        'choices' => array(
            'No Content' => __('No Content','the-wp-business'),
            'Full Content' => __('Full Content','the-wp-business'),
            'Excerpt Content' => __('Excerpt Content','the-wp-business'),
        ),
	) );

   $wp_customize->add_setting( 'the_wp_business_post_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( 'the_wp_business_post_excerpt_number', array(
		'label'       => esc_html__( 'Blog Post Excerpt Number (Max 50)','the-wp-business' ),
		'section'     => 'the_wp_business_left_right',
		'type'        => 'number',
		'settings'    => 'the_wp_business_post_excerpt_number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
		'active_callback' => 'the_wp_business_excerpt_enabled'
	) );

	$wp_customize->add_setting( 'the_wp_business_button_excerpt_suffix', array(
		'default'   => '...',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'the_wp_business_button_excerpt_suffix', array(
		'label'       => __( 'Post Excerpt Suffix','the-wp-business' ),
		'section'     => 'the_wp_business_left_right',
		'type'        => 'text',
		'settings'    => 'the_wp_business_button_excerpt_suffix',
		'active_callback' => 'the_wp_business_excerpt_enabled'
	) );

	//Featured Image
	$wp_customize->add_setting('the_wp_business_blog_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'the_wp_business_sanitize_choices'
    ));
    $wp_customize->add_control('the_wp_business_blog_image_dimension',array(
       'type' => 'radio',
       'label'	=> __('Blog Post Featured Image Dimension','the-wp-business'),
       'choices' => array(
            'default' => __('Default','the-wp-business'),
            'custom' => __('Custom Image Size','the-wp-business'),
        ),
      	'section'	=> 'the_wp_business_left_right',
    ));

    $wp_customize->add_setting( 'the_wp_business_feature_image_custom_width', array(
		'default'=> '250',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new The_WP_Business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_feature_image_custom_width', array(
        'label'  => __('Featured Image Custom Width','the-wp-business'),
        'section'  => 'the_wp_business_left_right',
        'description' => __('Measurement is in pixel.','the-wp-business'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 800,
        ),
		'active_callback' => 'the_wp_business_blog_image_dimension'
    )));

    $wp_customize->add_setting( 'the_wp_business_feature_image_custom_height', array(
		'default'=> '250',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new The_WP_Business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_feature_image_custom_height', array(
        'label'  => __('Featured Image Custom Height','the-wp-business'),
        'section'  => 'the_wp_business_left_right',
        'description' => __('Measurement is in pixel.','the-wp-business'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 700,
        ),
		'active_callback' => 'the_wp_business_blog_image_dimension'
    )));

	$wp_customize->add_setting( 'the_wp_business_feature_image_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new The_WP_Business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_feature_image_border_radius', array(
        'label'  => __('Featured Image Border Radius','the-wp-business'),
        'section'  => 'the_wp_business_left_right',
        'description' => __('Measurement is in pixel.','the-wp-business'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        ),
    )));

    $wp_customize->add_setting( 'the_wp_business_feature_image_shadow', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new The_WP_Business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_feature_image_shadow', array(
        'label'  => __('Featured Image Shadow','the-wp-business'),
        'section'  => 'the_wp_business_left_right',
        'description' => __('Measurement is in pixel.','the-wp-business'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        ),
    )));
	
	$wp_customize->add_setting('the_wp_business_post_pagination_option',array(
		'default' => 'Right',
		'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_post_pagination_option',array(
		'type' => 'select',
		'label' => __('Post Pagination Alignment','the-wp-business'),
		'section' => 'the_wp_business_left_right',
		'choices' => array(
			'Center' => __('Center','the-wp-business'),
			'Left' => __('Left','the-wp-business'),
			'Right' => __('Right','the-wp-business'),
		),
	) );

    $wp_customize->add_setting( 'the_wp_business_pagination_type', array(
        'default'			=> 'page-numbers',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'the_wp_business_pagination_type', array(
        'section' => 'the_wp_business_left_right',
        'type' => 'select',
        'label' => __( 'Blog Pagination Style', 'the-wp-business' ),
        'choices'		=> array(
            'page-numbers'  => __( 'Number', 'the-wp-business' ),
            'next-prev' => __( 'Next/Prev', 'the-wp-business' ),
    )));

	$wp_customize->add_setting( 'the_wp_business_blog_post_prev_nav_text', array(
		'default' => __('Older posts','the-wp-business' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'the_wp_business_blog_post_prev_nav_text', array(
		'label' => esc_html__( 'Blog Post Previous Nav text','the-wp-business' ),
		'section'     => 'the_wp_business_left_right',
		'type'        => 'text',
		'settings'    => 'the_wp_business_blog_post_prev_nav_text',
		'active_callback' => 'the_wp_business_pagination_callback',
	) );

	$wp_customize->add_setting( 'the_wp_business_blog_post_next_nav_text', array(
		'default' => __('Newer posts','the-wp-business' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'the_wp_business_blog_post_next_nav_text', array(
		'label' => esc_html__( 'Blog Post Next Nav text','the-wp-business' ),
		'section'     => 'the_wp_business_left_right',
		'type'        => 'text',
		'settings'    => 'the_wp_business_blog_post_next_nav_text',
		'active_callback' => 'the_wp_business_pagination_callback',
	) );

    $wp_customize->add_setting('the_wp_business_blog_nav_position',array(
        'default' => 'bottom',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
    ));
	$wp_customize->add_control('the_wp_business_blog_nav_position', array(
        'type' => 'select',
        'label' => __( 'Blog Post Navigation Position', 'the-wp-business' ),
        'section' => 'the_wp_business_left_right',
        'choices' => array(
            'top' => __('Top','the-wp-business'),
            'bottom' => __('Bottom','the-wp-business'),
            'both' => __('Both','the-wp-business')
        ),
    ));

    $wp_customize->add_setting( 'the_wp_business_post_settings_premium_features',array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_wp_business_post_settings_premium_features', array(
        'type'=> 'hidden',
        'description' => "<h3>". esc_html('Premium Theme Features!','the-wp-business') ."</h3>
            <ul>
                <li>". esc_html('Section Heading Option','the-wp-business') ."</li>
                <li>". esc_html('Animated Elements Colors','the-wp-business') ."</li>
                <li>". esc_html('... and Other Premium Features','the-wp-business') ."</li>
            </ul>
            <a target='_blank' href='". esc_url('https://www.themesglance.com/products/business-WordPress-theme') ." '>". esc_html('Upgrade Now','the-wp-business') ."</a>",
        'section' => 'the_wp_business_left_right'
        )
    );

	$wp_customize->add_section( 'the_wp_business_single_post_settings', array(
		'title' => __( 'Single Post Options', 'the-wp-business' ),
		'panel' => 'the_wp_business_panel_id',
	));

	$wp_customize->add_setting('the_wp_business_single_post_breadcrumb',array(
       'default' => 'true',
       'sanitize_callback' => 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_single_post_breadcrumb',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Breadcrumb','the-wp-business'),
       'section' => 'the_wp_business_single_post_settings'
    ));

    $wp_customize->add_setting('the_wp_business_single_post_date',array(
		'default' => 'true',
		'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
	));
	$wp_customize->add_control('the_wp_business_single_post_date',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Date','the-wp-business'),
		'section' => 'the_wp_business_single_post_settings'
	));

	$wp_customize->add_setting('the_wp_business_singlepost_date_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_WP_Business_Icon_Selector(
        $wp_customize,'the_wp_business_singlepost_date_icon',array(
		'label'	=> __('Add Single Post Date Icon','the-wp-business'),
		'transport' => 'refresh',
		'section'	=> 'the_wp_business_single_post_settings',
		'setting'	=> 'the_wp_business_singlepost_date_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('the_wp_business_single_post_author',array(
       'default' => 'true',
       'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Author','the-wp-business'),
       'section' => 'the_wp_business_single_post_settings'
    ));

    $wp_customize->add_setting('the_wp_business_singlepost_author_icon',array(
		'default'	=> 'fa fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_WP_Business_Icon_Selector(
        $wp_customize,'the_wp_business_singlepost_author_icon',array(
		'label'	=> __('Add Single Post Author Icon','the-wp-business'),
		'transport' => 'refresh',
		'section'	=> 'the_wp_business_single_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('the_wp_business_single_post_comment_no',array(
       'default' => 'true',
       'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_single_post_comment_no',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Comment Number','the-wp-business'),
       'section' => 'the_wp_business_single_post_settings'
    ));

    $wp_customize->add_setting('the_wp_business_single_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_WP_Business_Icon_Selector(
        $wp_customize,'the_wp_business_single_post_comment_icon',array(
		'label'	=> __('Add Single Post Comments Icon','the-wp-business'),
		'transport' => 'refresh',
		'section'	=> 'the_wp_business_single_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('the_wp_business_single_post_time',array(
       'default' => 'true',
       'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Time','the-wp-business'),
       'section' => 'the_wp_business_single_post_settings'
    ));

    $wp_customize->add_setting('the_wp_business_single_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_WP_Business_Icon_Selector(
        $wp_customize,'the_wp_business_single_post_time_icon',array(
		'label'	=> __('Add Single Post Time Icon','the-wp-business'),
		'transport' => 'refresh',
		'section'	=> 'the_wp_business_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('the_wp_business_single_post_metabox_seperator',array(
       'default' => '|',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_wp_business_single_post_metabox_seperator',array(
       'type' => 'text',
       'label' => __('Metabox Seperator','the-wp-business'),
       'description' => __('Ex: "/", "|", "-", ...','the-wp-business'),
       'section' => 'the_wp_business_single_post_settings'
    ));

    $wp_customize->add_setting('the_wp_business_single_post_image',array(
       'default' => 'true',
       'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_single_post_image',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Featured Image','the-wp-business'),
       'section' => 'the_wp_business_single_post_settings'
    ));

    $wp_customize->add_setting('the_wp_business_single_post_category',array(
       'default' => 'true',
       'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_single_post_category',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Category','the-wp-business'),
       'section' => 'the_wp_business_single_post_settings'
    ));

	$wp_customize->add_setting('the_wp_business_metafields_tags',array(
       'default' => 'true',
       'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_metafields_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Tags','the-wp-business'),
       'section' => 'the_wp_business_single_post_settings'
    ));

	// Single Posts Category 

	$wp_customize->add_setting('the_wp_business_single_post_styling',array(
    'default' => 'Button',
    'transport' => 'refresh',
    'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_single_post_styling',array(
	'description' => __('Change the styling of Category .','the-wp-business'),
	'type' => 'select',
    'section' => 'the_wp_business_single_post_settings',
    'choices' => array(
        'Button' => __('Button','the-wp-business'),
		'Underline' => __('Underline','the-wp-business'),
		'Default' => __('Default','the-wp-business'),
      ),
	));

    $wp_customize->add_setting( 'the_wp_business_post_featured_image', array(
        'default' => 'in-content',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'the_wp_business_post_featured_image', array(
        'section' => 'the_wp_business_single_post_settings',
        'type' => 'radio',
        'label' => __( 'Featured Image Display Type', 'the-wp-business' ),
        'choices'		=> array(
            'banner'  => __('as Banner Image', 'the-wp-business'),
            'in-content' => __( 'as Featured Image', 'the-wp-business' ),
    )));

	//Featured Image
	
	$wp_customize->add_setting('the_wp_business_single_post_image_dimension',array(
		'default' => 'default',
		'sanitize_callback'	=> 'the_wp_business_sanitize_choices'
	 ));
	 $wp_customize->add_control('the_wp_business_single_post_image_dimension',array(
		'type' => 'radio',
		'label'	=> __('Single Post Featured Image Dimension','the-wp-business'),
		'choices' => array(
			 'default' => __('Default','the-wp-business'),
			 'custom' => __('Custom Image Size','the-wp-business'),
		 ),
		   'section'	=> 'the_wp_business_single_post_settings',
	 ));

	 $wp_customize->add_setting( 'the_wp_business_single_post_image_custom_width', array(
		'default'=> '400',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new The_WP_Business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_single_post_image_custom_width', array(
        'label'  => __('Featured Image Custom Width','the-wp-business'),
        'section'  => 'the_wp_business_single_post_settings',
        'description' => __('Measurement is in pixel.','the-wp-business'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 1000,
        ),
		'active_callback' => 'the_wp_business_single_post_image_dimension'
    )));

	$wp_customize->add_setting( 'the_wp_business_single_post_image_custom_height', array(
		'default'=> '400',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new The_WP_Business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_single_post_image_custom_height', array(
        'label'  => __('Featured Image Custom Height','the-wp-business'),
        'section'  => 'the_wp_business_single_post_settings',
        'description' => __('Measurement is in pixel.','the-wp-business'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 1000,
        ),
		'active_callback' => 'the_wp_business_single_post_image_dimension'
    )));

    $wp_customize->add_setting('the_wp_business_single_post_nav',array(
       'default' => 'true',
       'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_single_post_nav',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Navigation','the-wp-business'),
       'section' => 'the_wp_business_single_post_settings'
    ));

    $wp_customize->add_setting( 'the_wp_business_single_post_prev_nav_text', array(
		'default' => __('Previous','the-wp-business' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'the_wp_business_single_post_prev_nav_text', array(
		'label' => esc_html__( 'Single Post Previous Nav text','the-wp-business' ),
		'section'     => 'the_wp_business_single_post_settings',
		'type'        => 'text',
		'settings'    => 'the_wp_business_single_post_prev_nav_text'
	) );

	$wp_customize->add_setting( 'the_wp_business_single_post_next_nav_text', array(
		'default' => __('Next','the-wp-business' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'the_wp_business_single_post_next_nav_text', array(
		'label' => esc_html__( 'Single Post Next Nav text','the-wp-business' ),
		'section'     => 'the_wp_business_single_post_settings',
		'type'        => 'text',
		'settings'    => 'the_wp_business_single_post_next_nav_text'
	) );

	$wp_customize->add_setting( 'the_wp_business_show_post_navigation_title', array(
        'default'           => false,
        'sanitize_callback' => 'the_wp_business_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'the_wp_business_show_post_navigation_title', array(
        'label'    => __( 'Show Post Navigation Title', 'the-wp-business' ),
        'section'  => 'the_wp_business_single_post_settings',
        'type'     => 'checkbox',
    ) );

    $wp_customize->add_setting('the_wp_business_single_post_comment',array(
       'default' => 'true',
       'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_single_post_comment',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post comment','the-wp-business'),
       'section' => 'the_wp_business_single_post_settings'
    ));

	$wp_customize->add_setting( 'the_wp_business_comment_width', array(
		'default'=> '100',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new The_WP_Business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_comment_width', array(
        'label'  => __('Comment textarea width','the-wp-business'),
        'section'  => 'the_wp_business_single_post_settings',
        'description' => __('Measurement is in %.','the-wp-business'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
        ),
    )));

    $wp_customize->add_setting('the_wp_business_comment_title',array(
       'default' => __('Leave a Reply','the-wp-business'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_wp_business_comment_title',array(
       'type' => 'text',
       'label' => __('Comment form Title','the-wp-business'),
       'section' => 'the_wp_business_single_post_settings'
    ));

    $wp_customize->add_setting('the_wp_business_comment_submit_text',array(
       'default' => __('Post Comment','the-wp-business'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_wp_business_comment_submit_text',array(
       'type' => 'text',
       'label' => __('Comment Submit Button Label','the-wp-business'),
       'section' => 'the_wp_business_single_post_settings'
    ));

	// related post section
	$wp_customize->add_section( 'the_wp_business_related_post_settings', array(
		'title' => __( 'Related Post Options', 'the-wp-business' ),
		'panel' => 'the_wp_business_panel_id',
	));

	$wp_customize->add_setting('the_wp_business_related_posts',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_wp_business_related_posts',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Related Posts','the-wp-business'),
       'section' => 'the_wp_business_related_post_settings'
    ));

	$wp_customize->add_setting('the_wp_business_related_post_date',array(
		'default' => 'true',
		'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
	));
	$wp_customize->add_control('the_wp_business_related_post_date',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Related Post Date','the-wp-business'),
		'section' => 'the_wp_business_related_post_settings'
	));

	$wp_customize->add_setting('the_wp_business_related_post_date_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_WP_Business_Icon_Selector(
        $wp_customize,'the_wp_business_related_post_date_icon',array(
		'label'	=> __('Related Post Date Icon','the-wp-business'),
		'transport' => 'refresh',
		'section'	=> 'the_wp_business_related_post_settings',
		'setting'	=> 'the_wp_business_related_post_date_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('the_wp_business_related_post_author',array(
		'default' => 'true',
		'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
	));
	$wp_customize->add_control('the_wp_business_related_post_author',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Related Post Author','the-wp-business'),
		'section' => 'the_wp_business_related_post_settings'
	));

	$wp_customize->add_setting('the_wp_business_related_post_author_icon',array(
		'default'	=> 'fa fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_WP_Business_Icon_Selector(
        $wp_customize,'the_wp_business_related_post_author_icon',array(
		'label'	=> __('Related Post Author Icon','the-wp-business'),
		'transport' => 'refresh',
		'section'	=> 'the_wp_business_related_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('the_wp_business_related_post_comment_no',array(
		'default' => 'true',
		'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
	));
	$wp_customize->add_control('the_wp_business_related_post_comment_no',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Related Post Comments','the-wp-business'),
		'section' => 'the_wp_business_related_post_settings'
	));

	$wp_customize->add_setting('the_wp_business_related_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_WP_Business_Icon_Selector(
        $wp_customize,'the_wp_business_related_post_comment_icon',array(
		'label'	=> __('Related Post Comments Icon','the-wp-business'),
		'transport' => 'refresh',
		'section'	=> 'the_wp_business_related_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('the_wp_business_related_post_time',array(
        'default' => 'true',
        'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_related_post_time',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Related Post Time','the-wp-business'),
        'section' => 'the_wp_business_related_post_settings'
    ));

    $wp_customize->add_setting('the_wp_business_related_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_WP_Business_Icon_Selector(
        $wp_customize,'the_wp_business_related_post_time_icon',array(
		'label'	=> __('Related Post Time Icon','the-wp-business'),
		'transport' => 'refresh',
		'section'	=> 'the_wp_business_related_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('the_wp_business_related_post_metabox_seperator',array(
		'default' => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_wp_business_related_post_metabox_seperator',array(
		'type' => 'text',
		'label' => __('Metabox Seperator','the-wp-business'),
		'description' => __('Ex: "/", "|", "-", ...','the-wp-business'),
		'section' => 'the_wp_business_related_post_settings'
	));

	$wp_customize->add_setting('the_wp_business_show_related_posts_image',array(
		'default' => true,
		'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
	));
	$wp_customize->add_control('the_wp_business_show_related_posts_image',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Related Posts image','the-wp-business'),
		'section' => 'the_wp_business_related_post_settings'
	));

	$wp_customize->add_setting( 'the_wp_business_related_image_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new The_WP_Business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_related_image_border_radius', array(
        'label'  => __('Related Image Border Radius','the-wp-business'),
        'section'  => 'the_wp_business_related_post_settings',
        'description' => __('Measurement is in pixel.','the-wp-business'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        ),
    )));

    $wp_customize->add_setting('the_wp_business_related_posts_title',array(
       'default' => __('You May Also Like','the-wp-business'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_wp_business_related_posts_title',array(
       'type' => 'text',
       'label' => __('Related Posts Title','the-wp-business'),
       'section' => 'the_wp_business_related_post_settings'
    ));

    $wp_customize->add_setting( 'the_wp_business_related_post_count', array(
		'default' => 3,
		'sanitize_callback'	=> 'the_wp_business_sanitize_float'
	) );
	$wp_customize->add_control( 'the_wp_business_related_post_count', array(
		'label' => esc_html__( 'Related Posts Count','the-wp-business' ),
		'section' => 'the_wp_business_related_post_settings',
		'type' => 'number',
		'settings' => 'the_wp_business_related_post_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

    $wp_customize->add_setting( 'the_wp_business_post_shown_by', array(
        'default' => 'categories',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'the_wp_business_post_shown_by', array(
        'section' => 'the_wp_business_related_post_settings',
        'type' => 'radio',
        'label' => __( 'Related Posts must be shown:', 'the-wp-business' ),
        'choices'		=> array(
            'categories'  => __('By Categories', 'the-wp-business'),
            'tags' => __( 'By Tags', 'the-wp-business' ),
    )));

    $wp_customize->add_setting( 'the_wp_business_related_post_excerpt_number',array(
		'default' => 20,
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('the_wp_business_related_post_excerpt_number',	array(
		'label' => esc_html__( 'Related Posts Content Limit','the-wp-business' ),
		'section' => 'the_wp_business_related_post_settings',
		'type'    => 'number',
	 	'settings' => 'the_wp_business_related_post_excerpt_number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'the_wp_business_related_post_excerpt_suffix', array(
		'default'   => '...',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'the_wp_business_related_post_excerpt_suffix', array(
		'label'       => esc_html__('Related Post Excerpt Suffix','the-wp-business' ),
		'section'     => 'the_wp_business_related_post_settings',
		'type'        => 'text',
		'settings'    => 'the_wp_business_related_post_excerpt_suffix',
		'active_callback' => 'the_wp_business_excerpt_enabled'
	) );

	$wp_customize->add_setting('the_wp_business_related_post_display_type',array(
		'default' => 'blocks',
		'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_related_post_display_type', array(
		'type' => 'select',
		'label' => __('Related Post Display Type', 'the-wp-business' ),
		'section' => 'the_wp_business_related_post_settings',
		'choices' => array(
		   'blocks' => __('Blocks','the-wp-business'),
		   'without blocks' => __('Without Blocks','the-wp-business'),
		),
    ));

	$wp_customize->add_setting('the_wp_business_related_button_text',array(
		'default'=> esc_html__('Read Full','the-wp-business'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_wp_business_related_button_text',array(
		'label'	=> esc_html__('Add Button Text','the-wp-business'),
		'input_attrs' => array(
        'placeholder' => esc_html__( 'Read Full', 'the-wp-business' ),
        ),
		'section'=> 'the_wp_business_related_post_settings',
		'type'=> 'text'
	));

	// Grid layout setting
	$wp_customize->add_section( 'the_wp_business_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'the-wp-business' ),
		'panel' => 'the_wp_business_panel_id',
	));

	$wp_customize->add_setting('the_wp_business_grid_post_sidebar_layout',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'the_wp_business_sanitize_choices'
 	));
	$wp_customize->add_control('the_wp_business_grid_post_sidebar_layout', array(
		'type' => 'select',
		'label' => __( 'Grid Sidebar Layout', 'the-wp-business' ),
		'section' => 'the_wp_business_grid_layout_settings',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','the-wp-business'),
		   'Right Sidebar' => __('Right Sidebar','the-wp-business'),
		   'One Column' => __('One Column','the-wp-business')
		),
 	));

	$wp_customize->add_setting('the_wp_business_grid_columns', array(
		'default'           => '3',
		'sanitize_callback' => 'the_wp_business_sanitize_choices',
		'transport'         => 'refresh',
	));
	
	$wp_customize->add_control('the_wp_business_grid_columns', array(
		'label'    => __('Grid Columns', 'the-wp-business'),
		'section'  => 'the_wp_business_grid_layout_settings', 
		'type'     => 'select',
		'choices'  => array(
			'2' => __('2 Columns', 'the-wp-business'),
			'3' => __('3 Columns', 'the-wp-business'),
			'4' => __('4 Columns', 'the-wp-business'),
		),
	));

	$wp_customize->add_setting('the_wp_business_grid_button_text',array(
		'default'=> esc_html__('Read Full','the-wp-business'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_wp_business_grid_button_text',array(
		'label'	=> esc_html__('Add Button Text','the-wp-business'),
		'input_attrs' => array(
        'placeholder' => esc_html__( 'Read Full', 'the-wp-business' ),
      ),
		'section'=> 'the_wp_business_grid_layout_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('the_wp_business_grid_post_content',array(
    	'default' => 'Excerpt Content',
     	'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_grid_post_content',array(
		'type' => 'radio',
		'label' => __('Grid Post Content Type','the-wp-business'),
		'section' => 'the_wp_business_grid_layout_settings',
		'choices' => array(
		   'No Content' => __('No Content','the-wp-business'),
		   'Full Content' => __('Full Content','the-wp-business'),
		   'Excerpt Content' => __('Excerpt Content','the-wp-business'),
		),
	) );

 	$wp_customize->add_setting( 'the_wp_business_grid_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( 'the_wp_business_grid_excerpt_number', array(
		'label' => esc_html__( 'Grid Post Excerpt Number (Max 50)','the-wp-business' ),
		'section' => 'the_wp_business_grid_layout_settings',
		'type'    => 'number',
		'settings' => 'the_wp_business_grid_excerpt_number',
		'input_attrs' => array(
			'step'  => 1,
			'min'   => 0,
			'max'   => 50,
		),
		'active_callback' => 'the_wp_business_grid_excerpt_enabled'
	) );
	
	$wp_customize->add_setting('the_wp_business_grid_excerpt_suffix',array(
		'default'=> '...',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_wp_business_grid_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','the-wp-business'),
		'section'=> 'the_wp_business_grid_layout_settings',
		'type'=> 'text',
		'settings'    => 'the_wp_business_grid_excerpt_suffix',
		'active_callback' => 'the_wp_business_grid_excerpt_enabled'
	));


	$wp_customize->add_setting('the_wp_business_grid_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
    ));
	$wp_customize->add_control('the_wp_business_grid_alignment', array(
        'type' => 'select',
        'label' => __( 'Grid Post Alignment', 'the-wp-business' ),
        'section' => 'the_wp_business_grid_layout_settings',
        'choices' => array(
            'left' => __('Left Align','the-wp-business'),
            'right' => __('Right Align','the-wp-business'),
            'center' => __('Center Align','the-wp-business')
        ),
    ));

	$wp_customize->add_setting('the_wp_business_grid_post_metabox_seperator',array(
       'default' => '|',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_wp_business_grid_post_metabox_seperator',array(
       'type' => 'text',
       'label' => __('Metabox Seperator','the-wp-business'),
       'description' => __('Ex: "/", "|", "-", ...','the-wp-business'),
       'section' => 'the_wp_business_grid_layout_settings'
    ));

    $wp_customize->add_setting('the_wp_business_grid_post_date',array(
		'default' => 'true',
		'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
	));
	$wp_customize->add_control('the_wp_business_grid_post_date',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Date ','the-wp-business'),
		'section' => 'the_wp_business_grid_layout_settings'
	));

	$wp_customize->add_setting('the_wp_business_grid_post_author',array(
		'default' => 'true',
		'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
	));
	$wp_customize->add_control('the_wp_business_grid_post_author',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Author','the-wp-business'),
		'section' => 'the_wp_business_grid_layout_settings'
	));

	$wp_customize->add_setting('the_wp_business_grid_post_author_icon',array(
		'default'	=> 'fa fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_WP_Business_Icon_Selector(
        $wp_customize,'the_wp_business_grid_post_author_icon',array(
		'label'	=> __('Grid Post Author Icon','the-wp-business'),
		'transport' => 'refresh',
		'section'	=> 'the_wp_business_grid_layout_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('the_wp_business_grid_post_comment',array(
		'default' => 'true',
		'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
	));
	$wp_customize->add_control('the_wp_business_grid_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Comments','the-wp-business'),
		'section' => 'the_wp_business_grid_layout_settings'
	));

	$wp_customize->add_setting('the_wp_business_grid_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_WP_Business_Icon_Selector(
        $wp_customize,'the_wp_business_grid_post_comment_icon',array(
		'label'	=> __('Grid Post Comments Icon','the-wp-business'),
		'transport' => 'refresh',
		'section'	=> 'the_wp_business_grid_layout_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('the_wp_business_grid_post_time',array(
		'default' => 'true',
		'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
	));
	$wp_customize->add_control('the_wp_business_grid_post_time',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Time','the-wp-business'),
		'section' => 'the_wp_business_grid_layout_settings'
	));

	$wp_customize->add_setting('the_wp_business_grid_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_WP_Business_Icon_Selector(
        $wp_customize,'the_wp_business_grid_post_time_icon',array(
		'label'	=> __('Grid Post Time Icon','the-wp-business'),
		'transport' => 'refresh',
		'section'	=> 'the_wp_business_grid_layout_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('the_wp_business_grid_post_featured_image',array(
       'default' => 'true',
       'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_grid_post_featured_image',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Featured Image','the-wp-business'),
       'section' => 'the_wp_business_grid_layout_settings'
    ));

	$wp_customize->add_setting( 'the_wp_business_grid_post_image_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new The_WP_Business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_grid_post_image_border_radius', array(
        'label'  => __('Grid Post Image Border Radius','the-wp-business'),
        'section'  => 'the_wp_business_grid_layout_settings',
        'description' => __('Measurement is in pixel.','the-wp-business'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        ),
    )));

	$wp_customize->add_setting('the_wp_business_grid_post_display_type',array(
		'default' => 'blocks',
		'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_grid_post_display_type', array(
		'type' => 'select',
		'label' => __( 'Grid Post Display Type', 'the-wp-business' ),
		'section' => 'the_wp_business_grid_layout_settings',
		'choices' => array(
		   'blocks' => __('Blocks','the-wp-business'),
		   'without blocks' => __('Without Blocks','the-wp-business'),
		),
    ));

	// Button option
	$wp_customize->add_section( 'the_wp_business_button_options', array(
		'title' =>  __( 'Button Options', 'the-wp-business' ),
		'panel' => 'the_wp_business_panel_id',
	));

    $wp_customize->add_setting( 'the_wp_business_blog_button_text', array(
		'default'   => __('Read Full','the-wp-business'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'the_wp_business_blog_button_text', array(
		'label'       => esc_html__( 'Blog Post Button Label','the-wp-business' ),
		'section'     => 'the_wp_business_button_options',
		'type'        => 'text',
		'settings'    => 'the_wp_business_blog_button_text'
	) );

	$wp_customize->add_setting('the_wp_business_button_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('the_wp_business_button_padding',array(
		'label'	=> esc_html__('Button Padding','the-wp-business'),
		'section'=> 'the_wp_business_button_options',
		'active_callback' => 'the_wp_business_button_enabled'
	));

	$wp_customize->add_setting('the_wp_business_top_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_top_button_padding',array(
		'label'	=> __('Top','the-wp-business'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'the_wp_business_button_options',
		'type'=> 'number',
		'active_callback' => 'the_wp_business_button_enabled'
	));

	$wp_customize->add_setting('the_wp_business_bottom_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_bottom_button_padding',array(
		'label'	=> __('Bottom','the-wp-business'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'the_wp_business_button_options',
		'type'=> 'number',
		'active_callback' => 'the_wp_business_button_enabled'
	));

	$wp_customize->add_setting('the_wp_business_left_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_left_button_padding',array(
		'label'	=> __('Left','the-wp-business'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'the_wp_business_button_options',
		'type'=> 'number',
		'active_callback' => 'the_wp_business_button_enabled'
	));

	$wp_customize->add_setting('the_wp_business_right_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_right_button_padding',array(
		'label'	=> __('Right','the-wp-business'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'the_wp_business_button_options',
		'type'=> 'number',
		'active_callback' => 'the_wp_business_button_enabled'
	));

	$wp_customize->add_setting( 'the_wp_business_button_border_radius', array(
		'default'=> 4,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new The_WP_Business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_button_border_radius', array(
		'label'  => __('Border Radius','the-wp-business'),
		'section'  => 'the_wp_business_button_options',
		'description' => __('Measurement is in pixel.','the-wp-business'),
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
		),
		'active_callback' => 'the_wp_business_button_enabled'
    )));

    // font size button
 	$wp_customize->add_setting( 'the_wp_business_button_font_size',array(
		'default' => '16',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new the_wp_business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_button_font_size', array(
		'label'  => __('Button Font Size','the-wp-business'),
		'section'  => 'the_wp_business_button_options',
		'description' => __('Measurement is in pixel.','the-wp-business'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
 	)));

 	$wp_customize->add_setting('the_wp_business_button_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'the_wp_business_sanitize_choices'
		));
	$wp_customize->add_control('the_wp_business_button_font_weight',array(
	    'type' => 'select',
	    'label' => __('Button Font Weight','the-wp-business'),
	    'section' => 'the_wp_business_button_options',
	    'choices' => array(
	       '100' => __('100','the-wp-business'),
	       '200' => __('200','the-wp-business'),
	       '300' => __('300','the-wp-business'),
	       '400' => __('400','the-wp-business'),
	       '500' => __('500','the-wp-business'),
	       '600' => __('600','the-wp-business'),
	       '700' => __('700','the-wp-business'),
	       '800' => __('800','the-wp-business'),
	       '900' => __('900','the-wp-business'),
	    ),
	) );

	$wp_customize->add_setting('the_wp_business_button_text_transform',array(
        'default' => '',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
  	));
  	$wp_customize->add_control('the_wp_business_button_text_transform',array(
        'type' => 'select',
        'label' => __('Button Text transform','the-wp-business'),
        'section' => 'the_wp_business_button_options',
        'choices' => array(
            'uppercase' => __('Uppercase','the-wp-business'),
            'capitalize' => __('Capitalize','the-wp-business'),
            'lowercase' => __('lowercase','the-wp-business'),
        ),
  	) );

	// letter spacing button
	$wp_customize->add_setting( 'the_wp_business_button_letter_spacing',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new The_Wp_Business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_button_letter_spacing', array(
		'label'  => __('Button Letter Spacing','the-wp-business'),
		'section'  => 'the_wp_business_button_options',
		'description' => __('Measurement is in pixel.','the-wp-business'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
 	)));

	$wp_customize->add_setting('the_wp_business_button_hover_effect',array(
        'default' => '',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
    ));
	$wp_customize->add_control('the_wp_business_button_hover_effect', array(
        'type' => 'select',
        'label' => __( 'Button Hover Effect', 'the-wp-business' ),
        'section' => 'the_wp_business_button_options',
        'choices' => array(
			'pulse'     => __( 'Pulse', 'the-wp-business' ),
			'rubberBand'=> __( 'RubberBand', 'the-wp-business' ),
			'swing'     => __( 'Swing', 'the-wp-business' ),
			'tada'      => __( 'Tada', 'the-wp-business' ),
			'jello'     => __( 'Jello', 'the-wp-business' ),
			'disable'   => __( 'Disabled', 'the-wp-business' )
        ),
    ));

    //Sidebar setting
	$wp_customize->add_section( 'the_wp_business_sidebar_options', array(
    	'title'   => __( 'Sidebar options', 'the-wp-business' ),
		'priority'   => null,
		'panel' => 'the_wp_business_panel_id'
	) );

	$wp_customize->add_setting('the_wp_business_single_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
    ));
	$wp_customize->add_control('the_wp_business_single_page_layout', array(
        'type' => 'select',
        'label' => __( 'Single Page Layout', 'the-wp-business' ),
        'section' => 'the_wp_business_sidebar_options',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','the-wp-business'),
            'Right Sidebar' => __('Right Sidebar','the-wp-business'),
            'One Column' => __('One Column','the-wp-business')
        ),
    ));

    $wp_customize->add_setting('the_wp_business_single_post_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
    ));
	$wp_customize->add_control('the_wp_business_single_post_layout', array(
        'type' => 'select',
        'label' => __( 'Single Post Layout', 'the-wp-business' ),
        'section' => 'the_wp_business_sidebar_options',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','the-wp-business'),
            'Right Sidebar' => __('Right Sidebar','the-wp-business'),
            'One Column' => __('One Column','the-wp-business')
        ),
    ));

	$wp_customize->add_setting( 'the_wp_business_sticky_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'the_wp_business_sanitize_checkbox',
	) );
	
	$wp_customize->add_control( 'the_wp_business_sticky_sidebar', array(
		'type'     => 'checkbox',
		'label'    => __( 'Enable Sticky Sidebar', 'the-wp-business' ),
		'section'  => 'the_wp_business_sidebar_options',
	) );

	$wp_customize->add_setting('the_wp_business_sidebar_size',array(
        'default' => 'Sidebar 1/4',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_sidebar_size',array(
        'type' => 'radio',
        'label' => __('Sidebar Size Option','the-wp-business'),
        'section' => 'the_wp_business_sidebar_options',
        'choices' => array(
			'Sidebar 1/4' => __('Sidebar 1/4','the-wp-business'),
            'Sidebar 1/3' => __('Sidebar 1/3','the-wp-business'),
        ),
	) );

    //Advance Options
	$wp_customize->add_section( 'the_wp_business_advance_options', array(
    	'title' => __( 'Advance Options', 'the-wp-business' ),
		'priority'   => null,
		'panel' => 'the_wp_business_panel_id'
	) );

	$wp_customize->add_setting('the_wp_business_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_wp_business_preloader',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','the-wp-business'),
       'section' => 'the_wp_business_advance_options'
    ));

    $wp_customize->add_setting( 'the_wp_business_preloader_color', array(
	    'default' => '#333333',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_preloader_color', array(
  		'label' => __('Preloader Color', 'the-wp-business'),
	    'section' => 'the_wp_business_advance_options',
	    'settings' => 'the_wp_business_preloader_color',
  	)));

  	$wp_customize->add_setting( 'the_wp_business_preloader_bg_color', array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_preloader_bg_color', array(
  		'label' => __('Preloader Background Color', 'the-wp-business'),
	    'section' => 'the_wp_business_advance_options',
	    'settings' => 'the_wp_business_preloader_bg_color',
  	)));

  	$wp_customize->add_setting('the_wp_business_preloader_type',array(
        'default' => 'Square',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_preloader_type',array(
        'type' => 'radio',
        'label' => __('Preloader Type','the-wp-business'),
        'section' => 'the_wp_business_advance_options',
        'choices' => array(
            'Square' => __('Square','the-wp-business'),
            'Circle' => __('Circle','the-wp-business'),
        ),
	) );

	// Cursor Settings
	$wp_customize->add_setting( 'the_wp_business_enable_custom_cursor',array(
	    'default' => false,
    	'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
  	) );
	$wp_customize->add_control('the_wp_business_enable_custom_cursor',array(
		'type' => 'checkbox',
		'label' => __( 'Show / Hide Cursor','the-wp-business' ),
		'section' => 'the_wp_business_advance_options'
	));

	$wp_customize->add_setting('the_wp_business_theme_layout_options',array(
        'default' => 'Default Theme',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_theme_layout_options',array(
        'type' => 'radio',
        'label' => __('Theme Layout','the-wp-business'),
        'section' => 'the_wp_business_advance_options',
        'choices' => array(
            'Default Theme' => __('Default Theme','the-wp-business'),
            'Container Theme' => __('Container Theme','the-wp-business'),
            'Box Container Theme' => __('Box Container Theme','the-wp-business'),
        ),
	) );

	$wp_customize->add_setting( 'the_wp_business_single_page_breadcrumb',array(
		'default' => true,
      	'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ) );
    $wp_customize->add_control('the_wp_business_single_page_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Page Breadcrumb','the-wp-business' ),
        'section' => 'the_wp_business_advance_options'
    ));

	$wp_customize->add_setting('the_wp_business_single_page_breadcrumb_alignment',array(
    	'default' => 'Left',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_single_page_breadcrumb_alignment',array(
        'type' => 'radio',
        'label' => __('Breadcrumb Alignment','the-wp-business'),
        'section' => 'the_wp_business_advance_options',
        'choices' => array(
            'Center' => __('Center','the-wp-business'),
            'Left' => __('Left','the-wp-business'),
            'Right' => __('Right','the-wp-business'),
        ),
	) );

    $wp_customize->add_setting('the_wp_business_breadcrumb_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_breadcrumb_color', array(
		'label'    => __('Breadcrumb Color', 'the-wp-business'),
		'section'  => 'the_wp_business_advance_options',
	)));

	$wp_customize->add_setting('the_wp_business_breadcrumb_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_breadcrumb_background_color', array(
		'label'    => __('Breadcrumb Background Color', 'the-wp-business'),
		'section'  => 'the_wp_business_advance_options',
	)));

	$wp_customize->add_setting('the_wp_business_breadcrumb_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_breadcrumb_hover_color', array(
		'label'    => __('Breadcrumb Hover Color', 'the-wp-business'),
		'section'  => 'the_wp_business_advance_options',
	)));

	$wp_customize->add_setting('the_wp_business_breadcrumb_hover_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_breadcrumb_hover_bg_color', array(
		'label'    => __('Breadcrumb Hover Background Color', 'the-wp-business'),
		'section'  => 'the_wp_business_advance_options',
	)));

	//404 Page Option
	$wp_customize->add_section('the_wp_business_404_settings',array(
		'title'	=> __('404 Page & Search Result Settings','the-wp-business'),
		'priority'	=> null,
		'panel' => 'the_wp_business_panel_id',
	));

	$wp_customize->add_setting('the_wp_business_404_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('the_wp_business_404_title',array(
		'label'	=> __('404 Title','the-wp-business'),
		'section'	=> 'the_wp_business_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('the_wp_business_404_button_label',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('the_wp_business_404_button_label',array(
		'label'	=> __('404 button Label','the-wp-business'),
		'section'	=> 'the_wp_business_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('the_wp_business_search_result_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('the_wp_business_search_result_title',array(
		'label'	=> __('No Search Result Title','the-wp-business'),
		'section'	=> 'the_wp_business_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('the_wp_business_search_result_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('the_wp_business_search_result_text',array(
		'label'	=> __('No Search Result Text','the-wp-business'),
		'section'	=> 'the_wp_business_404_settings',
		'type'		=> 'text'
	));	

	//Responsive Settings
	$wp_customize->add_section('the_wp_business_responsive_options',array(
		'title'	=> __('Responsive Options','the-wp-business'),
		'panel' => 'the_wp_business_panel_id'
	));

	$wp_customize->add_setting('the_wp_business_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new The_WP_Business_Icon_Selector(
        $wp_customize,'the_wp_business_menu_open_icon',array(
		'label'	=> __('Menu Open Icon','the-wp-business'),
		'section' => 'the_wp_business_responsive_options',
		'type'	  => 'icon',
	)));

	$wp_customize->add_setting('the_wp_business_mobile_menu_label',array(
       'default' => __('Menu','the-wp-business'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_wp_business_mobile_menu_label',array(
       'type' => 'text',
       'label' => __('Mobile Menu Label','the-wp-business'),
       'section' => 'the_wp_business_responsive_options'
    ));

	$wp_customize->add_setting('the_wp_business_menu_close_icon',array(
		'default'	=> 'fas fa-times-circle',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new The_WP_Business_Icon_Selector(
        $wp_customize,'the_wp_business_menu_close_icon',array(
		'label'	=> __('Menu Close Icon','the-wp-business'),
		'section' => 'the_wp_business_responsive_options',
		'type'	  => 'icon',
	)));

	$wp_customize->add_setting('the_wp_business_close_menu_label',array(
       'default' => __('Close Menu','the-wp-business'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_wp_business_close_menu_label',array(
       'type' => 'text',
       'label' => __('Close Menu Label','the-wp-business'),
       'section' => 'the_wp_business_responsive_options'
    ));

    //toggle button bg-color
    $wp_customize->add_setting( 'the_wp_business_toggle_button_bg_color_settings', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_wp_business_toggle_button_bg_color_settings', array(
  		'label' => __('Toggle Button Bg Color', 'the-wp-business'),
	    'section' => 'the_wp_business_responsive_options',
	    'settings' => 'the_wp_business_toggle_button_bg_color_settings',
  	)));

    $wp_customize->add_setting('the_wp_business_sticky_header_responsive',array(
        'default' => false,
        'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
	));
	$wp_customize->add_control('the_wp_business_sticky_header_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Sticky Header','the-wp-business'),
      	'section' => 'the_wp_business_responsive_options',
	));

	$wp_customize->add_setting('the_wp_business_hide_topbar_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
	));
	$wp_customize->add_control('the_wp_business_hide_topbar_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Top Header','the-wp-business'),
      	'section' => 'the_wp_business_responsive_options',
	));

	$wp_customize->add_setting('the_wp_business_preloader_responsive',array(
        'default' => false,
        'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
	));
	$wp_customize->add_control('the_wp_business_preloader_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Preloader','the-wp-business'),
      	'section' => 'the_wp_business_responsive_options',
	));

	$wp_customize->add_setting('the_wp_business_slider_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
	));
	$wp_customize->add_control('the_wp_business_slider_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Slider','the-wp-business'),
      	'section' => 'the_wp_business_responsive_options',
	));

	$wp_customize->add_setting('the_wp_business_backtotop_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
	));
	$wp_customize->add_control('the_wp_business_backtotop_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Back to Top','the-wp-business'),
      	'section' => 'the_wp_business_responsive_options',
	));

	$wp_customize->add_setting( 'the_wp_business_sidebar_hide_show',array(
      'default' => true,
      'sanitize_callback'	=> 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_sidebar_hide_show',array(
      'type' => 'checkbox',
      'label' => esc_html__( 'Enable Sidebar','the-wp-business' ),
      'section' => 'the_wp_business_responsive_options'
    ));

	//Woocommerce Options
	$wp_customize->add_section('the_wp_business_woocommerce',array(
		'title'	=> __('WooCommerce Options','the-wp-business'),
		'panel' => 'the_wp_business_panel_id',
	));

	$wp_customize->add_setting('the_wp_business_shop_page_sidebar',array(
       'default' => false,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_wp_business_shop_page_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable Shop Page Sidebar','the-wp-business'),
       'section' => 'the_wp_business_woocommerce'
    ));

    // shop page sidebar alignment
    $wp_customize->add_setting('the_wp_business_shop_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'the_wp_business_sanitize_choices',
	));
	$wp_customize->add_control('the_wp_business_shop_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Layout', 'the-wp-business'),
		'section'        => 'the_wp_business_woocommerce',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'the-wp-business'),
			'Right Sidebar' => __('Right Sidebar', 'the-wp-business'),
		),
	));

    $wp_customize->add_setting('the_wp_business_shop_page_navigation',array(
       	'default' => true,
       	'sanitize_callback' => 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_shop_page_navigation',array(
       	'type' => 'checkbox',
       	'label' => __('Enable Shop Page Pagination','the-wp-business'),
       	'section' => 'the_wp_business_woocommerce'
    ));

    $wp_customize->add_setting('the_wp_business_single_product_sidebar',array(
       	'default' => false,
       	'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_wp_business_single_product_sidebar',array(
       	'type' => 'checkbox',
       	'label' => __('Enable Single Product Page Sidebar','the-wp-business'),
       	'section' => 'the_wp_business_woocommerce'
    ));

    // Single product Page sidebar alignment
    $wp_customize->add_setting('the_wp_business_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'the_wp_business_sanitize_choices',
	));
	$wp_customize->add_control('the_wp_business_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Product Page Layout', 'the-wp-business'),
		'section'        => 'the_wp_business_woocommerce',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'the-wp-business'),
			'Right Sidebar' => __('Right Sidebar', 'the-wp-business'),
		),
	));

    $wp_customize->add_setting('the_wp_business_single_related_products',array(
       	'default' => true,
       	'sanitize_callback' => 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_single_related_products',array(
       	'type' => 'checkbox',
       	'label' => __('Enable Related Products','the-wp-business'),
       	'section' => 'the_wp_business_woocommerce'
    ));

    $wp_customize->add_setting('the_wp_business_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_products_per_page',array(
		'label'	=> __('Products Per Page','the-wp-business'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'the_wp_business_woocommerce',
		'type'=> 'number',
	));

	$wp_customize->add_setting('the_wp_business_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_products_per_row',array(
		'label'	=> __('Products Per Row','the-wp-business'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'the_wp_business_woocommerce',
		'type'=> 'select',
	));

	$wp_customize->add_setting('the_wp_business_product_border',array(
       	'default' => false,
       	'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_wp_business_product_border',array(
       	'type' => 'checkbox',
       	'label' => __('Show / Hide product border','the-wp-business'),
       	'section' => 'the_wp_business_woocommerce',
    ));

    $wp_customize->add_setting('the_wp_business_product_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('the_wp_business_product_padding',array(
		'label'	=> esc_html__('Product Padding','the-wp-business'),
		'section'=> 'the_wp_business_woocommerce',
	));

	$wp_customize->add_setting( 'the_wp_business_product_top_padding',array(
		'default' => 5,
		'sanitize_callback' => 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_product_top_padding', array(
		'label' => esc_html__( 'Top','the-wp-business' ),
		'type' => 'number',
		'section' => 'the_wp_business_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('the_wp_business_product_bottom_padding',array(
		'default' => 5,
		'sanitize_callback' => 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_product_bottom_padding', array(
		'label' => esc_html__( 'Bottom','the-wp-business' ),
		'type' => 'number',
		'section' => 'the_wp_business_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('the_wp_business_product_left_padding',array(
		'default' => 5,
		'sanitize_callback' => 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_product_left_padding', array(
		'label' => esc_html__( 'Left','the-wp-business' ),
		'type' => 'number',
		'section' => 'the_wp_business_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'the_wp_business_product_right_padding',array(
		'default' => 5,
		'sanitize_callback' => 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_product_right_padding', array(
		'label' => esc_html__( 'Right','the-wp-business' ),
		'type' => 'number',
		'section' => 'the_wp_business_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'the_wp_business_product_border_radius',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new The_WP_Business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_product_border_radius', array(
        'label'  => __('Product Border Radius','the-wp-business'),
        'section'  => 'the_wp_business_woocommerce',
        'description' => __('Measurement is in pixel.','the-wp-business'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

	$wp_customize->add_setting( 'the_wp_business_product_box_shadow',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new The_WP_Business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_product_box_shadow', array(
		'label'  => __('Product Box Shadow','the-wp-business'),
		'section'  => 'the_wp_business_woocommerce',
		'description' => __('Measurement is in pixel.','the-wp-business'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
    )));	

	$wp_customize->add_setting('the_wp_business_product_button_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('the_wp_business_product_button_padding',array(
		'label'	=> esc_html__('Product Button Padding','the-wp-business'),
		'section'=> 'the_wp_business_woocommerce',
	));

	$wp_customize->add_setting( 'the_wp_business_product_button_top_padding',array(
		'default' => 10,
		'sanitize_callback' => 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_product_button_top_padding', array(
		'label' => esc_html__( 'Top','the-wp-business' ),
		'type' => 'number',
		'section' => 'the_wp_business_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('the_wp_business_product_button_bottom_padding',array(
		'default' => 10,
		'sanitize_callback' => 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_product_button_bottom_padding', array(
		'label' => esc_html__( 'Bottom','the-wp-business' ),
		'type' => 'number',
		'section' => 'the_wp_business_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('the_wp_business_product_button_left_padding',array(
		'default' => 15,
		'sanitize_callback' => 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_product_button_left_padding', array(
		'label' => esc_html__( 'Left','the-wp-business' ),
		'type' => 'number',
		'section' => 'the_wp_business_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'the_wp_business_product_button_right_padding',array(
		'default' => 15,
		'sanitize_callback' => 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_product_button_right_padding', array(
		'label' => esc_html__( 'Right','the-wp-business' ),
		'type' => 'number',
		'section' => 'the_wp_business_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'the_wp_business_product_button_border_radius',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new The_WP_Business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_product_button_border_radius', array(
        'label'  => __('Product Button Border Radius','the-wp-business'),
        'section'  => 'the_wp_business_woocommerce',
        'description' => __('Measurement is in pixel.','the-wp-business'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

    $wp_customize->add_setting('the_wp_business_product_sale_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_product_sale_position',array(
        'type' => 'radio',
        'label' => __('Product Sale Position','the-wp-business'),
        'section' => 'the_wp_business_woocommerce',
        'choices' => array(
            'Left' => __('Left','the-wp-business'),
            'Right' => __('Right','the-wp-business'),
        ),
	) );

	$wp_customize->add_setting( 'the_wp_business_product_sale_font_size',array(
		'default' => '13',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new The_WP_Business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_product_sale_font_size', array(
        'label'  => __('Product Sale Font Size','the-wp-business'),
        'section'  => 'the_wp_business_woocommerce',
        'description' => __('Measurement is in pixel.','the-wp-business'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

    $wp_customize->add_setting('the_wp_business_product_sale_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('the_wp_business_product_sale_padding',array(
		'label'	=> esc_html__('Product Sale Padding','the-wp-business'),
		'section'=> 'the_wp_business_woocommerce',
	));

	$wp_customize->add_setting( 'the_wp_business_product_sale_top_padding',array(
		'default' => 0,
		'sanitize_callback' => 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_product_sale_top_padding', array(
		'label' => esc_html__( 'Top','the-wp-business' ),
		'type' => 'number',
		'section' => 'the_wp_business_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('the_wp_business_product_sale_bottom_padding',array(
		'default' => 0,
		'sanitize_callback' => 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_product_sale_bottom_padding', array(
		'label' => esc_html__( 'Bottom','the-wp-business' ),
		'type' => 'number',
		'section' => 'the_wp_business_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('the_wp_business_product_sale_left_padding',array(
		'default' => 0,
		'sanitize_callback' => 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_product_sale_left_padding', array(
		'label' => esc_html__( 'Left','the-wp-business' ),
		'type' => 'number',
		'section' => 'the_wp_business_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('the_wp_business_product_sale_right_padding',array(
		'default' => 0,
		'sanitize_callback' => 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_product_sale_right_padding', array(
		'label' => esc_html__( 'Right','the-wp-business' ),
		'type' => 'number',
		'section' => 'the_wp_business_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'the_wp_business_product_sale_border_radius',array(
		'default' => '50',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new The_WP_Business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_product_sale_border_radius', array(
        'label'  => __('Product Sale Border Radius','the-wp-business'),
        'section'  => 'the_wp_business_woocommerce',
        'description' => __('Measurement is in pixel.','the-wp-business'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

	//Footer
	$wp_customize->add_section('the_wp_business_footer_section',array(
		'title'	=> __('Footer Section','the-wp-business'),
		'priority'	=> null,
		'panel' => 'the_wp_business_panel_id',
	));

	$wp_customize->add_setting('the_wp_business_hide_scroll',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_wp_business_hide_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Back To Top','the-wp-business'),
      	'section' => 'the_wp_business_footer_section',
	));

	$wp_customize->add_setting('the_wp_business_back_to_top',array(
        'default' => 'Right',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_back_to_top',array(
        'type' => 'radio',
        'label' => __('Back to Top Alignment','the-wp-business'),
        'section' => 'the_wp_business_footer_section',
        'choices' => array(
            'Left' => __('Left','the-wp-business'),
            'Right' => __('Right','the-wp-business'),
            'Center' => __('Center','the-wp-business'),
        ),
	) );

	$wp_customize->add_setting('the_wp_business_back_to_top_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_back_to_top_color', array(
		'label'    => __('Back To Top Color', 'the-wp-business'),
		'section'  => 'the_wp_business_footer_section',
	)));	

	$wp_customize->add_setting('the_wp_business_back_to_top_text_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_back_to_top_text_color', array(
		'label'    => __('Back To Top Text Color', 'the-wp-business'),
		'section'  => 'the_wp_business_footer_section',
	)));

	$wp_customize->add_setting('the_wp_business_back_to_top_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_back_to_top_hover_color', array(
		'label'    => __('Back to Top Hover Color', 'the-wp-business'),
		'section'  => 'the_wp_business_footer_section',
	)));

	$wp_customize->add_setting( 'the_wp_business_footer_hide_show',array(
      	'default' => 'true',
     	'sanitize_callback' => 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_footer_hide_show',array(
    	'type' => 'checkbox',
      	'label' => esc_html__( 'Show / Hide Footer','the-wp-business' ),
      	'section' => 'the_wp_business_footer_section'
    ));

	$wp_customize->add_setting('the_wp_business_footer_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_footer_bg_color', array(
		'label'    => __('Footer Background Color', 'the-wp-business'),
		'section'  => 'the_wp_business_footer_section',
	)));

	$wp_customize->add_setting('the_wp_business_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'the_wp_business_footer_bg_image',array(
        'label' => __('Footer Background Image','the-wp-business'),
        'section' => 'the_wp_business_footer_section'
	)));

	// footer padding
	$wp_customize->add_setting('the_wp_business_footer_padding',array(
		'default'=> '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('the_wp_business_footer_padding',array(
		'label' => __('Footer Top Bottom Padding','the-wp-business'),
		'description' => __('Enter a value in pixels. Example:20px','the-wp-business'),
		'input_attrs' => array(
		  'placeholder' => __( '10px', 'the-wp-business' ),
		),
		'section'=> 'the_wp_business_footer_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('the_wp_business_footer_img_position',array(
		'default' => 'center center',
		'transport' => 'refresh',
		'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','the-wp-business'),
		'section' => 'the_wp_business_footer_section',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'the-wp-business' ),
			'center top'   => esc_html__( 'Top', 'the-wp-business' ),
			'right top'   => esc_html__( 'Top Right', 'the-wp-business' ),
			'left center'   => esc_html__( 'Left', 'the-wp-business' ),
			'center center'   => esc_html__( 'Center', 'the-wp-business' ),
			'right center'   => esc_html__( 'Right', 'the-wp-business' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'the-wp-business' ),
			'center bottom'   => esc_html__( 'Bottom', 'the-wp-business' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'the-wp-business' ),
		),
	));
	$wp_customize->add_setting('the_wp_business_footer_attatchment',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_footer_attatchment',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','the-wp-business'),
		'choices' => array(
            'fixed' => __('fixed','the-wp-business'),
            'scroll' => __('scroll','the-wp-business'),
        ),
		'section'=> 'the_wp_business_footer_section',
	));		

	$wp_customize->add_setting('the_wp_business_footer_widget',array(
        'default'           => '4',
        'sanitize_callback' => 'the_wp_business_sanitize_choices',
    ));
    $wp_customize->add_control('the_wp_business_footer_widget',array(
        'type'        => 'radio',
        'label'       => __('No. of Footer columns', 'the-wp-business'),
        'section'     => 'the_wp_business_footer_section',
        'description' => __('Select the number of footer columns and add your widgets in the footer.', 'the-wp-business'),
        'choices' => array(
            '1'     => __('One column', 'the-wp-business'),
            '2'     => __('Two columns', 'the-wp-business'),
            '3'     => __('Three columns', 'the-wp-business'),
            '4'     => __('Four columns', 'the-wp-business')
        ),
    )); 

    $wp_customize->add_setting('the_wp_business_widgets_heading_fontsize',array(
		'default'	=> 24,
		'sanitize_callback'	=> 'the_wp_business_sanitize_float',
	));	
	$wp_customize->add_control('the_wp_business_widgets_heading_fontsize',array(
		'label'	=> __('Footer Widgets Heading Font Size','the-wp-business'),
		'section'	=> 'the_wp_business_footer_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('the_wp_business_widgets_heading_font_weight',array(
        'default' => '600',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
    ));
    $wp_customize->add_control('the_wp_business_widgets_heading_font_weight',array(
        'type' => 'select',
        'label' => __('Footer Widgets Heading Font Weight','the-wp-business'),
        'section' => 'the_wp_business_footer_section',
        'choices' => array(
            '100' => __('100','the-wp-business'),
            '200' => __('200','the-wp-business'),
            '300' => __('300','the-wp-business'),
            '400' => __('400','the-wp-business'),
            '500' => __('500','the-wp-business'),
            '600' => __('600','the-wp-business'),
            '700' => __('700','the-wp-business'),
            '800' => __('800','the-wp-business'),
            '900' => __('900','the-wp-business'),
        ),
	) );

    $wp_customize->add_setting('the_wp_business_footer_widgets_heading',array(
		'default' => 'Left',
		'transport' => 'refresh',
		'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_footer_widgets_heading',array(
		'type' => 'select',
		'label' => __('Footer Widget Heading Alignment','the-wp-business'),
		'section' => 'the_wp_business_footer_section',
		'choices' => array(
			'Left' => __('Left','the-wp-business'),
			'Center' => __('Center','the-wp-business'),
			'Right' => __('Right','the-wp-business')
		),
	) );

	$wp_customize->add_setting('the_wp_business_footer_text_tranform',array(
		'default' => 'Capitalize',
		'sanitize_callback' => 'the_wp_business_sanitize_choices'
 	));
 	$wp_customize->add_control('the_wp_business_footer_text_tranform',array(
		'type' => 'select',
		'label' => __('Footer Widgets Heading Text Transform','the-wp-business'),
		'section' => 'the_wp_business_footer_section',
		'choices' => array(
		   'Uppercase' => __('Uppercase','the-wp-business'),
		   'Lowercase' => __('Lowercase','the-wp-business'),
		   'Capitalize' => __('Capitalize','the-wp-business'),
		),
	) );	
	
	$wp_customize->add_setting('the_wp_business_widgets_heading_letter_spacing',array(
		'default'	=> '',
		'sanitize_callback'	=> 'the_wp_business_sanitize_float',
	));	
	$wp_customize->add_control('the_wp_business_widgets_heading_letter_spacing',array(
		'label'	=> __('Footer Widgets Heading Letter Spacing','the-wp-business'),
		'section'	=> 'the_wp_business_footer_section',
		'type'		=> 'number'
	));		

	$wp_customize->add_setting('the_wp_business_footer_widgets_content',array(
		'default' => 'Left',
		'transport' => 'refresh',
		'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_footer_widgets_content',array(
		'type' => 'select',
		'label' => __('Footer Widget Content Alignment','the-wp-business'),
		'section' => 'the_wp_business_footer_section',
		'choices' => array(
			'Left' => __('Left','the-wp-business'),
			'Center' => __('Center','the-wp-business'),
			'Right' => __('Right','the-wp-business')
        ),
	) );

	$wp_customize->add_setting('the_wp_business_footer_template',array(
		'default'	=> esc_html('the_wp_business-footer-one'),
		'sanitize_callback'	=> 'the_wp_business_sanitize_choices'	
	));
	$wp_customize->add_control('the_wp_business_footer_template',array(
		'label'	=> esc_html__('Footer style','the-wp-business'),
		'section'	=> 'the_wp_business_footer_section',
		'setting'	=> 'the_wp_business_footer_template',
		'type' => 'select',
		'choices' => array(
			'the_wp_business-footer-one' => esc_html__('Style 1', 'the-wp-business'),
			'the_wp_business-footer-two' => esc_html__('Style 2', 'the-wp-business'),
			'the_wp_business-footer-three' => esc_html__('Style 3', 'the-wp-business'),
			'the_wp_business-footer-four' => esc_html__('Style 4', 'the-wp-business'),
			'the_wp_business-footer-five' => esc_html__('Style 5', 'the-wp-business'),
			)
	));		

    $wp_customize->add_setting( 'the_wp_business_copyright_hide_show',array(
      	'default' => 'true',
      	'sanitize_callback' => 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_copyright_hide_show',array(
    	'type' => 'checkbox',
      	'label' => esc_html__( 'Show / Hide Copyright','the-wp-business' ),
      	'section' => 'the_wp_business_footer_section'
    ));

    $wp_customize->add_setting('the_wp_business_copyright_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_copyright_bg_color', array(
		'label'    => __('Copyright Background Color', 'the-wp-business'),
		'section'  => 'the_wp_business_footer_section',
	)));

	$wp_customize->add_setting('the_wp_business_copyright_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_copyright_color', array(
		'label'    => __('Copyright Color', 'the-wp-business'),
		'section'  => 'the_wp_business_footer_section',
	)));

    $wp_customize->add_setting('the_wp_business_copyright_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('the_wp_business_copyright_padding',array(
		'label'	=> esc_html__('Copyright Padding','the-wp-business'),
		'section'=> 'the_wp_business_footer_section',
	));

    $wp_customize->add_setting('the_wp_business_top_copyright_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_top_copyright_padding',array(
		'description'	=> __('Top','the-wp-business'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'the_wp_business_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('the_wp_business_bottom_copyright_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_wp_business_sanitize_float'
	));
	$wp_customize->add_control('the_wp_business_bottom_copyright_padding',array(
		'description'	=> __('Bottom','the-wp-business'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'the_wp_business_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('the_wp_business_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_copyright_alignment',array(
        'type' => 'radio',
        'label' => __('Copyright Alignment','the-wp-business'),
        'section' => 'the_wp_business_footer_section',
        'choices' => array(
            'left' => __('Left','the-wp-business'),
            'right' => __('Right','the-wp-business'),
            'center' => __('Center','the-wp-business'),
        ),
	) );

	$wp_customize->add_setting( 'the_wp_business_copyright_font_size', array(
		'default'=> '15',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new The_WP_Business_WP_Customize_Range_Control( $wp_customize, 'the_wp_business_copyright_font_size', array(
        'label'  => __('Copyright Font Size','the-wp-business'),
        'section'  => 'the_wp_business_footer_section',
        'description' => __('Measurement is in pixel.','the-wp-business'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));
	
	$wp_customize->add_setting('the_wp_business_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('the_wp_business_footer_copy',array(
		'label'	=> __('Copyright Text','the-wp-business'),
		'section'	=> 'the_wp_business_footer_section',
		'type'		=> 'text'
	));

	// Copyright Sticky //
	$wp_customize->add_setting( 'the_wp_business_copyright_sticky',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'the_wp_business_sanitize_checkbox'
    ) );
    $wp_customize->add_control('the_wp_business_copyright_sticky',array(
		'type' => 'checkbox',
      'label' => __('Show / Hide Sticky Copyright','the-wp-business'),
      'section' => 'the_wp_business_footer_section',
    ));

	//Footer Social Media
	$wp_customize->add_section('the_wp_business_footer_social_media',array(
		'title'	=> __('Footer Social Media','the-wp-business'),
		'priority' => null,
		'panel' => 'the_wp_business_panel_id',
	));

	$wp_customize->add_setting( 'the_wp_business_footer_social_media_hide_show',array(
		'default' => false,
		'sanitize_callback' => 'the_wp_business_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_wp_business_footer_social_media_hide_show',array(
    	'type' => 'checkbox',
		'label' => esc_html__( 'Show / Hide Social Icon','the-wp-business' ),
		'section' => 'the_wp_business_footer_social_media'
    ));		

	$wp_customize->add_setting('the_wp_business_footer_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('the_wp_business_footer_youtube_url',array(
		'label'	=> __('Add Youtube link','the-wp-business'),
		'section'	=> 'the_wp_business_footer_social_media',
		'setting'	=> 'the_wp_business_footer_youtube_url',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('the_wp_business_footer_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('the_wp_business_footer_facebook_url',array(
		'label'	=> __('Add Facebook link','the-wp-business'),
		'section'	=> 'the_wp_business_footer_social_media',
		'setting'	=> 'the_wp_business_footer_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('the_wp_business_footer_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('the_wp_business_footer_twitter_url',array(
		'label'	=> __('Add Twitter link','the-wp-business'),
		'section'	=> 'the_wp_business_footer_social_media',
		'setting'	=> 'the_wp_business_footer_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('the_wp_business_footer_rss_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('the_wp_business_footer_rss_url',array(
		'label'	=> __('Add RSS link','the-wp-business'),
		'section'	=> 'the_wp_business_footer_social_media',
		'setting'	=> 'the_wp_business_footer_rss_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('the_wp_business_footer_icon_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_wp_business_footer_icon_color', array(
		'label'    => __('Icon Color', 'the-wp-business'),
		'section'  => 'the_wp_business_footer_social_media',
	)));


	$wp_customize->add_setting('the_wp_business_footer_icon_alignment',array(
    	'default' => 'Center',
        'sanitize_callback' => 'the_wp_business_sanitize_choices'
	));
	$wp_customize->add_control('the_wp_business_footer_icon_alignment',array(
        'type' => 'radio',
        'label' => __('Icon Alignment','the-wp-business'),
        'section' => 'the_wp_business_footer_social_media',
        'choices' => array(
            'Center' => __('Center','the-wp-business'),
            'Left' => __('Left','the-wp-business'),
            'Right' => __('Right','the-wp-business'),
        ),
	) );
	$wp_customize->add_setting( 'the_wp_business_footer_icon_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'the_wp_business_sanitize_float',
	) );
	$wp_customize->add_control( 'the_wp_business_footer_icon_font_size', array(
		'label' => __( 'Icon Font Size','the-wp-business' ),
		'section'     => 'the_wp_business_footer_social_media',
		'type'        => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 50,
		),
	) );

	
    // Icon Top Bottom setting
	$wp_customize->add_setting( 'the_wp_business_footer_icon_to_top_padding', array(
		'default'           => '',
		'sanitize_callback' => 'the_wp_business_sanitize_float',
	) );
	$wp_customize->add_control( 'the_wp_business_footer_icon_to_top_padding', array(
		'label' => __( 'Icon Top Bottom Padding','the-wp-business' ),
		'section'     => 'the_wp_business_footer_social_media',
		'type'        => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 50,
		),
	) );

	//Reset All Settings
	$wp_customize->add_section( 'the_wp_business_reset_section', array(
        'title'    => __( 'Reset Theme Settings', 'the-wp-business' ),
        'priority'	=> null,
		'panel' => 'the_wp_business_panel_id',
    ) );

	//Reset Global Color
	$wp_customize->add_setting('the_wp_business_reset_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	
	$wp_customize->add_control('the_wp_business_reset_color', array(
		'type'    => 'button',
		'label'   => __('Reset Global Color', 'the-wp-business'),
		'section' => 'the_wp_business_reset_section',
		'input_attrs' => array(
			'onclick' => 'ResetGlobalColor()',
		),
	));
	
}
add_action( 'customize_register', 'the_wp_business_customize_register' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class The_WP_Business_Customize {

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
		$manager->register_section_type( 'The_WP_Business_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new The_WP_Business_Customize_Section_Pro(
				$manager,
				'the_wp_business_pro_link',
				array(
					'priority'	=> 9,
					'title'    => esc_html__( 'WP Business Pro', 'the-wp-business' ),
					'pro_text' => esc_html__( 'Get Pro', 'the-wp-business' ),
					'pro_url'  => esc_url( 'https://www.themesglance.com/products/business-WordPress-theme' ),
				)
			)
		);
		$manager->add_section(
			new The_WP_Business_Customize_Section_Pro(
				$manager,
				'the_wp_business_doc_link',
				array(
					'priority'	=> 9,
					'title'    => esc_html__( 'WP Business Doc', 'the-wp-business' ),
					'pro_text' => esc_html__( 'Help Doc', 'the-wp-business' ),
					'pro_url'  => esc_url(THE_WP_BUSINESS_FREE_THEME_DOC ),
				)
			)
		);
		$manager->add_section(
			new The_WP_Business_Customize_Section_Pro(
				$manager,
				'the_wp_business_demo_link',
				array(
					'priority'	=> 9,
					'title'    => esc_html__( 'WP Business Demo', 'the-wp-business' ),
					'pro_text' => esc_html__( 'Live Demo', 'the-wp-business' ),
					'pro_url'  => esc_url(THE_WP_BUSINESS_LIVE_DEMO),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'the-wp-business-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'the-wp-business-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
The_WP_Business_Customize::get_instance();