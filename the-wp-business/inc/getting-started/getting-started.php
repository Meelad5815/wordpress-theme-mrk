<?php
//about theme info
add_action( 'admin_menu', 'the_wp_business_gettingstarted' );
function the_wp_business_gettingstarted() {    	
	add_theme_page( esc_html__('Theme Demo Content', 'the-wp-business'), esc_html__('Theme Demo Content', 'the-wp-business'), 'edit_theme_options', 'the_wp_business_guide', 'the_wp_business_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function the_wp_business_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getting-started/getting-started.css');

    // Admin notice code START
	wp_register_script('the-wp-business-notice', esc_url(get_template_directory_uri()) . '/inc/getting-started/js/notice.js', array('jquery'), time(), true);
	wp_enqueue_script('the-wp-business-notice');
	// Admin notice code END
}
add_action('admin_enqueue_scripts', 'the_wp_business_admin_theme_style');

//guidline for about theme
function the_wp_business_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'the-wp-business' );
?>
<div class="wrapper-info">
	<div class="intro">
		<h3><?php esc_html_e( 'Welcome to The WP Business WordPress Theme', 'the-wp-business' ); ?></h3>
		<p>( Version: <?php echo esc_html($theme['Version']);?> )</p>
	</div>
	<div class="col-left">
		<div class="left-box">
			<div class="color_bg_blue color-info">
				<div class="intro-text"><img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/themesglance-logo.png" alt="" />
				</div>
				<p class="intro_version"><span class="highlight1"><?php echo esc_html__( 'Congratulations!', 'the-wp-business' ); ?></span></p>
				<p><?php echo  esc_html_e( 'Your demo import has been completed successfully.', 'the-wp-business' ); ?></p>
				<?php
					/* Demo Import */
					require get_parent_theme_file_path( '/inc/getting-started/demo-content.php' );
				?>
			</div>
			<div class="best-offers">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/best-offer.png" alt="best-offer" />
				<div class="offers">
					<p class="offer-text"><?php echo esc_html__( 'On Premium WordPress Theme', 'the-wp-business' ); ?></p>
					<p class="coupon"><?php echo esc_html__( 'Use Coupon Code:" GET20 "', 'the-wp-business' ); ?></p>
					<a href="<?php echo esc_url( THE_WP_BUSINESS_PRO_THEME_URL ); ?>" class="btn-pro" target="_blank" >
						<?php esc_html_e('Get Pro', 'the-wp-business'); ?>
					</a>
				</div>
			</div>
		</div>
		<div class="started">
			<h3><?php esc_html_e( 'Lite Theme Info', 'the-wp-business' ); ?></h3>
			<p><?php esc_html_e( 'WP Business is a versatile, fully responsive, and mobile-friendly theme designed for business owners, consulting firms, corporate organizations, marketing agencies, startups, digital agencies, and professional service providers looking to build a strong online presence. Ideal for creating business portfolios, landing pages, corporate websites, eCommerce stores, financial service platforms, and lead generation sites, it caters to a wide range of industries including hotels, tours, hospitals, retail, and large-scale corporations. Built with secure and clean Bootstrap-based code, this theme ensures a smooth user experience even for beginners without coding knowledge while staying compatible with the latest platform updates. Its SEO-optimized structure and cross-browser compatibility help boost search engine rankings and improve visibility across multiple channels, while seamless social media integration enhances marketing efforts. With extensive customization options, fast loading performance, multipurpose shortcodes, testimonial sections, and engaging banners with strong Call-to-Action (CTA) buttons, WP Business empowers every agency and enterprise to create impactful digital experiences and establish a professional and credible brand identity online.', 'the-wp-business')?></p>
			<hr>

			<div class="service">
				<div class="info col-md-3">
					<h3><span class="dashicons dashicons-media-document"></span> <?php esc_html_e('Get Support', 'the-wp-business'); ?></h3>
					<ol>
						<li>
						<a href="<?php echo esc_url( THE_WP_BUSINESS_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'the-wp-business'); ?></a>
						</li>
					</ol>
				</div>
				<div class="info col-md-3">
					<h3><span class="dashicons dashicons-welcome-widgets-menus"></span> <?php esc_html_e('Getting Started', 'the-wp-business'); ?></h3>
					<ol>
						<li> <?php esc_html_e('Start', 'the-wp-business'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'the-wp-business'); ?></a> <?php esc_html_e('your website.', 'the-wp-business'); ?></li>
					</ol>
				</div>
				<div class="info col-md-3">
					<h3><span class="dashicons dashicons-star-filled"></span> <?php esc_html_e('Rate This Theme', 'the-wp-business'); ?></h3>
					<ol>
						<li>
							<a href="<?php echo esc_url( THE_WP_BUSINESS_REVIEW ); ?>" target="_blank"><?php esc_html_e('Rate it here', 'the-wp-business'); ?></a>
						</li>
					</ol> 
				</div>
				<div class="info col-md-3">
					<h3><span class="dashicons dashicons-editor-help"></span> <?php esc_html_e( 'Help Docs', 'the-wp-business' ); ?></h3>
					<ol>
						<li><?php esc_html_e( 'The WP Business Lite', 'the-wp-business' ); ?> <a href="<?php echo esc_url( THE_WP_BUSINESS_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'the-wp-business' ); ?></a></li>
					</ol>
				</div>
			</div>
			
			<h3><?php esc_html_e( 'Get started with The Wp Business Theme', 'the-wp-business' ); ?></h3>
			<div class="col-left-inner"> 
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/customizer-image.png" alt="" />
			</div>		
			<div class="col-right-inner">
				<p><?php esc_html_e( 'Go to', 'the-wp-business' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'the-wp-business' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'the-wp-business' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Easily customizable ', 'the-wp-business' ); ?> </li>
					<li><?php esc_html_e( 'Absolutely free', 'the-wp-business' ); ?> </li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="centerbold">
			<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/responsive-tg.png" alt="" />
			<hr class="firsthr">
			<div class="btn-grp">
				<a href="<?php echo esc_url( THE_WP_BUSINESS_PRO_THEME_URL ); ?>" target="_blank"><?php esc_html_e('Get Premium', 'the-wp-business'); ?></a>
				<a href="<?php echo esc_url( THE_WP_BUSINESS_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'the-wp-business'); ?></a>
				<a href="<?php echo esc_url( THE_WP_BUSINESS_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'the-wp-business'); ?></a>
				<a href="<?php echo esc_url( THE_WP_BUSINESS_BUNDLE_URL ); ?>" target="_blank"><?php esc_html_e('Bundle of 176+ Premium WP Themes at $79', 'the-wp-business'); ?></a>
			</div>
			<hr class="secondhr">
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'the-wp-business'); ?></h3>
		<ul>
		 	<li><?php esc_html_e( 'Theme options using customizer API', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Inbuilt BMI Calculator', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Responsive Design', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Advanced Color Options and Color Pallets', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( '100+ Font Family Options', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'RTL & Translation Ready', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Support to Add Custom CSS/JS', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'SEO Friendly', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Pagination Option', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Footer Customization Options', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Fully Integrated with Font Awesome Icon', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Short Codes', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Woo Commerce Compatible', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Gallery, Banner & Post Type Plugin Functionality', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Multiple Inner Page Templates', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Customizable Home Page', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Advance Social Media Feature', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Left and Right Sidebar', 'the-wp-business'); ?></li>
		</ul>
	</div>
	
</div>
<?php } ?>