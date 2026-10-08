<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-tg">
 *
 * @package The WP Business
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
  } else {
    do_action( 'wp_body_open' );
  }?>
  <?php if(get_theme_mod('the_wp_business_preloader',false) || get_theme_mod('the_wp_business_preloader_responsive',false)){ ?>
    <?php if(get_theme_mod( 'the_wp_business_preloader_type','Square') == 'Square'){ ?>
      <div id="overlayer"></div>
      <span class="tg-loader">
        <span class="tg-loader-inner"></span>
      </span>
    <?php }else if(get_theme_mod( 'the_wp_business_preloader_type') == 'Circle') {?>    
      <div class="preloader text-center">
        <div class="preloader-container">
          <span class="animated-preloader"></span>
        </div>
      </div>
    <?php }?>
  <?php }?>
  <header role="banner" class="mrk-site-header">
    <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'the-wp-business' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'the-wp-business' ); ?></span></a>
    <div id="header">
      <?php if(get_theme_mod('the_wp_business_top_header',false)== false || get_theme_mod('the_wp_business_hide_topbar_responsive',true) == true){ ?>
        <div class="header-top py-2 text-md-start text-center">
          <div class="container">
            <div class="row">
              <div class="top-contact col-lg-3 col-md-3 align-self-center">
                <?php if( get_theme_mod( 'the_wp_business_contact_corporate','' ) != '') { ?>
                  <span class="call"><a href="tel:<?php echo esc_attr( get_theme_mod( 'the_wp_business_contact_corporate','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('the_wp_business_call_icon','fa fa-phone')); ?> me-2" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('the_wp_business_contact_corporate','' )); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('the_wp_business_contact_corporate','' )); ?></span></a></span>
                <?php } ?>
              </div>   
              <div class="top-contact col-lg-3 col-md-4 align-self-center">
                <?php if( get_theme_mod( 'the_wp_business_email_corporate','' ) != '') { ?>
                  <span class="email_corporate"><a href="mailto:<?php echo esc_attr( get_theme_mod( 'the_wp_business_email_corporate','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('the_wp_business_mail_icon','fa fa-envelope')); ?> me-2" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('the_wp_business_email_corporate','') ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('the_wp_business_email_corporate','' )); ?></span></a></span>
                <?php } ?>
              </div>
              <?php if( get_theme_mod( 'the_wp_business_show_icons', true ) != '') { ?>
              <div class="social-media col-lg-6 col-md-5 text-md-end text-center align-self-center">
                <?php if( get_theme_mod( 'the_wp_business_youtube_url') != '') { ?>
                  <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'the_wp_business_youtube_url','' ) ); ?>"><i class="fab fa-youtube ms-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube', 'the-wp-business' ); ?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'the_wp_business_facebook_url') != '') { ?>
                  <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'the_wp_business_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f ms-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook', 'the-wp-business' ); ?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'the_wp_business_twitter_url' ) != '') { ?>
                  <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'the_wp_business_twitter_url','' ) ); ?>"><i class="fab fa-twitter ms-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter', 'the-wp-business' ); ?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'the_wp_business_rss_url') != '') { ?>
                  <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'the_wp_business_rss_url','' ) ); ?>"><i class="fas fa-rss ms-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'RSS', 'the-wp-business' ); ?></span></a>
                <?php } ?>
              </div>
              <?php } ?>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      <?php }?>
      <div class="toggle-menu responsive-menu p-3">
        <?php  ?>
          <button type="button" class="mobiletoggle mrk-menu-toggle" aria-controls="primary-site-navigation" aria-expanded="false"><i class="<?php echo esc_html(get_theme_mod('the_wp_business_menu_open_icon','fas fa-bars')); ?> me-2"></i><?php echo esc_html( get_theme_mod('the_wp_business_mobile_menu_label', __('Menu','the-wp-business'))); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('the_wp_business_mobile_menu_label', __('Menu','the-wp-business'))); ?></span></button>
        <?php ?>
        <?php if(get_theme_mod('the_wp_business_show_search',true) ){ ?>
          <div class="wrap"><?php get_search_form(); ?></div>
        <?php }?>
      </div>
      <div class="menu-sec mt-2 <?php if( get_theme_mod( 'the_wp_business_sticky_header') != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
        <div class="container">
          <div class="row">
            <div class="the-wp-business-logo mrk-brand py-2 px-0 text-center col-lg-3 col-md-5 wow bounceInDown align-self-center">
              <?php if ( has_custom_logo() ) : ?>
                <span class="mrk-brand-logo">
                  <?php the_custom_logo(); ?>
                </span>
              <?php endif; ?>
              <?php $blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <span class="mrk-brand-kicker"><?php echo esc_html__( 'MRK DIGITAL', 'the-wp-business' ); ?></span>
                <?php if( get_theme_mod('the_wp_business_show_site_title',true) != ''){ ?>
                  <?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                  <?php else : ?>
                    <p class="site-title m-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php endif; ?>
                <?php }?>
              <?php endif; ?>
              <?php if( get_theme_mod('the_wp_business_show_tagline',false) != ''){ ?>
                <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) :
                ?>
                  <p class="site-description m-0">
                    <?php echo esc_html($description); ?>
                  </p>
                <?php endif; ?>
              <?php }?>   
            </div>
            <div class="menubox align-self-center <?php if(get_theme_mod('the_wp_business_show_search',true)) { ?>col-lg-6 col-md-3" <?php } else { ?>col-lg-7 col-md-5 <?php } ?>">
              <div id="sidelong-menu" class="nav side-nav">
                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'the-wp-business' ); ?>">
                  <?php  
                    wp_nav_menu( array( 
                      'theme_location' => 'primary',
                      'container_class' => 'main-menu-navigation clearfix py-2' ,
                      'menu_class' => 'clearfix',
                      'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                      'fallback_cb' => 'wp_page_menu',
                    ) ); 
                   ?>
                  <button type="button" class="closebtn responsive-menu" aria-label="<?php echo esc_attr( get_theme_mod('the_wp_business_close_menu_label', __('Close Menu','the-wp-business'))); ?>"><?php echo esc_html( get_theme_mod('the_wp_business_close_menu_label', __('Close Menu','the-wp-business'))); ?><i class="<?php echo esc_attr(get_theme_mod('the_wp_business_menu_close_icon','fas fa-times-circle')); ?> m-3" aria-hidden="true"></i></button>
                </nav>
              </div>
            </div>
            <?php if(get_theme_mod('the_wp_business_show_search',true) ){ ?>
              <div class="search-box col-lg-1 col-md-2 my-3 text-end align-self-center">
                <div class="wrap"><?php get_search_form(); ?></div>
              </div>
            <?php }?>
            <?php if ( get_theme_mod('the_wp_business_button_url','') != "" ) {?>
              <div class="col-lg-2 col-md-4 ps-0 align-self-center">
                <div class ="testbutton mt-2 text-md-end text-center mb-md-0 mb-3">
                  <a href="<?php echo esc_url(get_theme_mod('the_wp_business_button_url','')); ?>"><?php echo esc_html(get_theme_mod('the_wp_business_button_text','')); ?> <span class="screen-reader-text"><?php echo esc_html(get_theme_mod('the_wp_business_button_text','')); ?></span></a>
                </div>
              </div>
            <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <?php if(get_theme_mod('the_wp_business_post_featured_image') == 'banner' ){
    if( is_singular() ) {?>
      <div id="page-site-header">
        <div class='page-header'> 
          <?php the_title( '<h1>', '</h1>' ); ?>
        </div>
      </div>
    <?php }
  }?>