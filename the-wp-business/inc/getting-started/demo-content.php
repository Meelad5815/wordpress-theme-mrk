<div class="theme-info">
	<?php
        // Check if the demo import has been completed
        $the_wp_business_demo_import_completed = get_option('the_wp_business_demo_import_completed', false);

        // If the demo import is completed, display the "View Site" button
        if ($the_wp_business_demo_import_completed) {
        // echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'the-wp-business') . '</p>';
        echo '<span><a href="' . esc_url(home_url()) . '" class="import-btn site-btn" target="_blank">' . esc_html__('VISIT SITE', 'the-wp-business') . '</a></span>';
        echo '<span><a href="' . esc_url( admin_url('customize.php')) . '" class="import-btn site-btn" target="_blank">' . esc_html__('CUSTOMIZE', 'the-wp-business') . '</a></span>';
        }

		//POST and update the customizer and other related data of POLITICAL CAMPAIGN
        if (isset($_POST['submit'])) {

        
        // ------- Create Main Menu --------
        $the_wp_business_menuname = 'Primary Menu';
        $the_wp_business_bpmenulocation = 'primary';
        $the_wp_business_menu_exists = wp_get_nav_menu_object( $the_wp_business_menuname );
    
        if ( !$the_wp_business_menu_exists ) {
            $the_wp_business_menu_id = wp_create_nav_menu( $the_wp_business_menuname );

            // Create Home Page
            $the_wp_business_home_title = 'Home';
            $the_wp_business_home = array(
                'post_type'    => 'page',
                'post_title'   => $the_wp_business_home_title,
                'post_content' => '',
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => 'home'
            );
            $the_wp_business_home_id = wp_insert_post($the_wp_business_home);
            // Assign Home Page Template
            add_post_meta($the_wp_business_home_id, '_wp_page_template', 'page-template/custom-front-page.php');
            // Update options to set Home Page as the front page
            update_option('page_on_front', $the_wp_business_home_id);
            update_option('show_on_front', 'page');
            // Add Home Page to Menu
            wp_update_nav_menu_item($the_wp_business_menu_id, 0, array(
                'menu-item-title' => __('Home', 'the-wp-business'),
                'menu-item-classes' => 'home',
                'menu-item-url' => home_url('/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $the_wp_business_home_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Create a new Page 
            $the_wp_business_pages_title = 'Features';
            $the_wp_business_pages_content = '<p>Explore all the pages we have on our website. Find information about our services, company, and more.</p>

                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                  All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
            $the_wp_business_pages = array(
                'post_type'    => 'page',
                'post_title'   => $the_wp_business_pages_title,
                'post_content' => $the_wp_business_pages_content,
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => 'pages'
            );
            $the_wp_business_pages_id = wp_insert_post($the_wp_business_pages);
            // Add Pages Page to Menu
            wp_update_nav_menu_item($the_wp_business_menu_id, 0, array(
                'menu-item-title' => __('Features', 'the-wp-business'),
                'menu-item-classes' => 'pages',
                'menu-item-url' => home_url('/pages/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $the_wp_business_pages_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Create About Us Page with Dummy Content
            $the_wp_business_about_title = 'Services';
            $the_wp_business_about_content = 'Explore all the pages we have on our website. Find information about our services, company, and more.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
            $the_wp_business_about = array(
                'post_type'    => 'page',
                'post_title'   => $the_wp_business_about_title,
                'post_content' => $the_wp_business_about_content,
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => 'about-us'
            );
            $the_wp_business_about_id = wp_insert_post($the_wp_business_about);
            // Add About Us Page to Menu
            wp_update_nav_menu_item($the_wp_business_menu_id, 0, array(
                'menu-item-title' => __('Services', 'the-wp-business'),
                'menu-item-classes' => 'about-us',
                'menu-item-url' => home_url('/about-us/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $the_wp_business_about_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

             // Create About Us Page with Dummy Content
            $the_wp_business_about_title = 'News';
            $the_wp_business_about_content = 'Explore all the pages we have on our website. Find information about our services, company, and more.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
            $the_wp_business_about = array(
                'post_type'    => 'page',
                'post_title'   => $the_wp_business_about_title,
                'post_content' => $the_wp_business_about_content,
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => 'about-us'
            );
            $the_wp_business_about_id = wp_insert_post($the_wp_business_about);
            // Add About Us Page to Menu
            wp_update_nav_menu_item($the_wp_business_menu_id, 0, array(
                'menu-item-title' => __('News', 'the-wp-business'),
                'menu-item-classes' => 'about-us',
                'menu-item-url' => home_url('/about-us/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $the_wp_business_about_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Create Blog Page only if it doesn't exist already
            $the_wp_business_existing_blog_page = get_page_by_path('blog');
            if (!$the_wp_business_existing_blog_page) {
                $the_wp_business_blog_id = wp_insert_post(array(
                'post_type'    => 'page',
                'post_title'   => __('Blog', 'the-wp-business'),
                'post_content' => '',
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_name'    => 'blog'
             ));
            } else {
                $the_wp_business_blog_id = $the_wp_business_existing_blog_page->ID;
            }
            // Assign as Posts Page
            update_option('page_for_posts', $the_wp_business_blog_id);
            update_option('show_on_front', 'page');
            //Add to Menu (only if not already added)
            $the_wp_business_menu_items = wp_get_nav_menu_items($the_wp_business_menu_id);
            $the_wp_business_blog_in_menu = false;
            if ($the_wp_business_menu_items) {
                foreach ($the_wp_business_menu_items as $the_wp_business_item) {
                    if ((int) $the_wp_business_item->object_id === (int) $the_wp_business_blog_id) {
                        $the_wp_business_blog_in_menu = true;
                        break;
                    }
                }
            }
            if (!$the_wp_business_blog_in_menu) {
            wp_update_nav_menu_item($the_wp_business_menu_id, 0, array(
                'menu-item-title'       => __('Blog', 'the-wp-business'),
                'menu-item-url'         => home_url('/blog/'),
                'menu-item-status'      => 'publish',
                'menu-item-object-id'   => $the_wp_business_blog_id,
                'menu-item-object'      => 'page',
                'menu-item-type'        => 'post_type',
                'menu-item-classes'     => 'the-wp-business-blog-link'
            ));
            }

            // Create About Us Page with Dummy Content
            $the_wp_business_about_title = 'Shop';
            $the_wp_business_about_content = 'Explore all the pages we have on our website. Find information about our services, company, and more.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
            $the_wp_business_about = array(
                'post_type'    => 'page',
                'post_title'   => $the_wp_business_about_title,
                'post_content' => $the_wp_business_about_content,
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => 'about-us'
            );
            $the_wp_business_about_id = wp_insert_post($the_wp_business_about);
            // Add About Us Page to Menu
            wp_update_nav_menu_item($the_wp_business_menu_id, 0, array(
                'menu-item-title' => __('Shop', 'the-wp-business'),
                'menu-item-classes' => 'about-us',
                'menu-item-url' => home_url('/about-us/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $the_wp_business_about_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

             // Create About Us Page with Dummy Content
            $the_wp_business_about_title = 'Contact Us';
            $the_wp_business_about_content = 'Explore all the pages we have on our website. Find information about our services, company, and more.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
            $the_wp_business_about = array(
                'post_type'    => 'page',
                'post_title'   => $the_wp_business_about_title,
                'post_content' => $the_wp_business_about_content,
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => 'contact-us'
            );
            $the_wp_business_about_id = wp_insert_post($the_wp_business_about);
            // Add About Us Page to Menu
            wp_update_nav_menu_item($the_wp_business_menu_id, 0, array(
                'menu-item-title' => __('Contact Us', 'the-wp-business'),
                'menu-item-classes' => 'contact-us',
                'menu-item-url' => home_url('/about-us/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $the_wp_business_about_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Create Shop Page only if it doesn't exist already
            $the_wp_business_existing_shop_page = get_page_by_path('shop');
            if (!$the_wp_business_existing_shop_page) {
            $the_wp_business_shop_id = wp_insert_post(array(
                'post_type'    => 'Contact',
                'post_title'   => __('Shop', 'the-wp-business'),
                'post_content' => '',
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_name'    => 'shop'
            ));
            } else {
                $the_wp_business_shop_id = $the_wp_business_existing_shop_page->ID;
            }
            // Assign as WooCommerce Shop Page
            update_option('woocommerce_shop_page_id', $the_wp_business_shop_id);
            // Add to Menu (only if not already added)
            $the_wp_business_menu_items = wp_get_nav_menu_items($the_wp_business_menu_id);
            $the_wp_business_shop_in_menu = false;

            if ($the_wp_business_menu_items) {
                foreach ($the_wp_business_menu_items as $the_wp_business_item) {
                    if ((int) $the_wp_business_item->object_id === (int) $the_wp_business_shop_id) {
                        $the_wp_business_shop_in_menu = true;
                        break;
                    }
                }
            }
            if (!$the_wp_business_shop_in_menu) {
            wp_update_nav_menu_item($the_wp_business_menu_id, 0, array(
                'menu-item-title'       => __('Contact', 'the-wp-business'),
                'menu-item-url'         => home_url('/shop/'),
                'menu-item-status'      => 'publish',
                'menu-item-object-id'   => $the_wp_business_shop_id,
                'menu-item-object'      => 'page',
                'menu-item-type'        => 'post_type',
                'menu-item-classes'     => 'the-wp-business-shop-link'
            ));
            }
            // Assign the menu to the primary location if not already set
            if ( ! has_nav_menu( $the_wp_business_bpmenulocation ) ) {
                $the_wp_business_locations = get_theme_mod( 'nav_menu_locations' );
                if ( empty( $the_wp_business_locations ) ) {
                    $the_wp_business_locations = array();
                }
                $the_wp_business_locations[ $the_wp_business_bpmenulocation ] = $the_wp_business_menu_id;
                set_theme_mod( 'nav_menu_locations', $the_wp_business_locations );
            }
        }

        // Set the demo import completion flag
        update_option('the_wp_business_demo_import_completed', true);
        // Display success message and "View Site" button
        // echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'the-wp-business') . '</p>';
        echo '<span><a href="' . esc_url(home_url()) . '" class="import-btn site-btn" target="_blank">' . esc_html__('VISIT SITE', 'the-wp-business') . '</a></span>';
        echo '<span><a href="' . esc_url( admin_url('customize.php')) . '" class="import-btn site-btn" target="_blank">' . esc_html__('CUSTOMIZE', 'the-wp-business') . '</a></span>';
        //end 

        //Topbar
        set_theme_mod( 'the_wp_business_top_header', true );
         set_theme_mod( 'the_wp_business_contact_corporate', '#' );
        set_theme_mod( 'the_wp_business_contact_corporate', '0987654321 ' );
        set_theme_mod( 'the_wp_business_email_corporate', '#' );
        set_theme_mod( 'the_wp_business_email_corporate', 'example@gmail.com' );


        // Show/Hide Social Icons ON
        set_theme_mod( 'the_wp_business_show_icons', true );

        // Default Social URLs
        set_theme_mod( 'the_wp_business_youtube_url', 'https://youtube.com/' );
        set_theme_mod( 'the_wp_business_facebook_url', 'https://facebook.com/' );
        set_theme_mod( 'the_wp_business_twitter_url', 'https://twitter.com/' );
        set_theme_mod( 'the_wp_business_rss_url', '#' );

        // Default Font Size
        set_theme_mod( 'the_wp_business_social_icons_font_size', '16' );

        // Default Icon Color
        set_theme_mod( 'the_wp_business_header_icon_color', '#ffffff' ); // any color you want

        //Header
        set_theme_mod( 'the_wp_business_button_text', 'SEND REQUEST' );
        set_theme_mod( 'the_wp_business_button_url', '#' );

        
    //Slider
      
    // Slider Options (Customizer Defaults)
    set_theme_mod( 'the_wp_business_slider_hide', true );
    set_theme_mod( 'the_wp_business_slider_title', true );
    set_theme_mod( 'the_wp_business_slider_content', true );
    set_theme_mod( 'the_wp_business_slider_button', true );
    set_theme_mod( 'the_wp_business_slider_arrow_hide_show', true );

    // Slider Button Defaults
    set_theme_mod( 'the_wp_business_slider_button_label', 'Learn More' );
    set_theme_mod( 'the_wp_business_slider_button_link', '#' );
    set_theme_mod( 'the_wp_business_slider_button_label2', 'Learn More' );
    set_theme_mod( 'the_wp_business_slider_button_link2', '#' );

    // Slider Speed Default
    set_theme_mod( 'the_wp_business_slider_speed', 3000 );

    // Slider Titles
    $the_wp_business_slider_titles = [
        'Empowering Businesses with Modern Digital Solutions',
        'Your business goals, our expertise',
        'Solutions built for modern businesses',
        'Smart Strategies for a Smarter Business Future',
    ];

    // Create 4 demo slider pages
    for ($i = 1; $i <= 4; $i++) {

        $title   = $the_wp_business_slider_titles[$i - 1];
        $content = "create solutions that deliver real impact";

        // Create a PAGE for slider
        $page_data = [
            'post_title'   => wp_strip_all_tags($title),
            'post_content' => wp_kses_post($content),
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ];

        $post_id = wp_insert_post($page_data);

        if (!is_wp_error($post_id) && $post_id) {

            // Image for slider
            $image_url = get_template_directory_uri() . '/images/slider' . $i . '.jpg';
            $image_id = media_sideload_image($image_url, $post_id, null, 'id');

            if (!is_wp_error($image_id)) {
                set_post_thumbnail($post_id, $image_id);
            }

            // SAVE page ID to theme mod
            set_theme_mod('the_wp_business_slidersettings_page' . $i, $post_id);
        }
    }

         // We Think Section Demo Content
        set_theme_mod( 'the_wp_business_wethink_post_setting', true );

        // Demo Title for We Think Section (if needed)
        set_theme_mod( 'the_wp_business_wethink_title', 'We Think' );

        // Post Content for the We Think Section
        $the_wp_business_wethink_title   = "Innovative Business Strategy & Growth";
        $the_wp_business_wethink_content = "Our team believes in smart planning, market-driven strategy, and sustainable business growth. We analyze, create, and implement powerful solutions for your next success journey. We help businesses transform their vision into measurable results through innovative strategy development and sustainable growth solutions. By combining market insights, data-driven decision-making, and modern business models, we guide organizations to redefine their strengths, and scale confidently.";
        $the_wp_business_wethink_image_url = get_template_directory_uri() . '/images/postimg.jpg';

        // Create Demo Post
        $the_wp_business_wethink_post_data = array(
            'post_title'   => wp_strip_all_tags( $the_wp_business_wethink_title ),
            'post_content' => wp_kses_post( $the_wp_business_wethink_content ),
            'post_status'  => 'publish',
            'post_type'    => 'post',
        );

        $the_wp_business_wethink_post_id = wp_insert_post( $the_wp_business_wethink_post_data );

        if ( ! is_wp_error( $the_wp_business_wethink_post_id ) ) {

            // Add Featured Image
            $the_wp_business_wethink_image_id = media_sideload_image(
                esc_url( $the_wp_business_wethink_image_url ),
                $the_wp_business_wethink_post_id,
                null,
                'id'
            );

            if ( ! is_wp_error( $the_wp_business_wethink_image_id ) ) {
                set_post_thumbnail( $the_wp_business_wethink_post_id, $the_wp_business_wethink_image_id );
            }
            set_theme_mod( 'the_wp_business_wethink_post_setting', $the_wp_business_wethink_post_id );
        }

        
        //Copyright Text
        set_theme_mod( 'the_wp_business_footer_text', 'By Themesglance' );

        }
    ?>

    <form action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=the_wp_business_guide" method="POST" onsubmit="return validate(this);">
    <?php if (!get_option('the_wp_business_demo_import_completed')) : ?>
        <div class="demo-btn">
       
            <button id="import-button" type="submit" name="submit" class="import-btn run-import button-large">
                <?php esc_html_e('Run Importer', 'the-wp-business'); ?>
                    <span id="spinner" style="display: none;">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spinner.gif" alt="Loading..." style="width:34px; height:34px; margin-left:10px;vertical-align: middle;" />
                    </span>
            </button>
        </div>
    <?php endif; ?>
    </form>
	<script type="text/javascript">
		function validate(valid) {
			 if(confirm("Do you really want to import the Demo Theme Content?")){
			    document.getElementById('spinner').style.display = 'inline-block';
			}
		    else {
			    return false;
		    }
		}
	</script>
</div>
