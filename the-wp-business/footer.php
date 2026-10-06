<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package The WP Business
 */
?>
<?php if( get_theme_mod( 'the_wp_business_hide_scroll',true) != ''  || get_theme_mod( 'the_wp_business_backtotop_responsive',true) != '') { ?>
  <?php $the_wp_business_scroll_align = get_theme_mod( 'the_wp_business_back_to_top','Right');
  if($the_wp_business_scroll_align == 'Left'){ ?>
    <a href="#content" class="back-to-top scroll-left text-center"><?php esc_html_e('Top', 'the-wp-business'); ?><span class="screen-reader-text"><?php esc_html_e('Back to Top', 'the-wp-business'); ?></span></a>
  <?php }else if($the_wp_business_scroll_align == 'Center'){ ?>
    <a href="#content" class="back-to-top scroll-center text-center"><?php esc_html_e('Top', 'the-wp-business'); ?><span class="screen-reader-text"><?php esc_html_e('Back to Top', 'the-wp-business'); ?></span></a>
  <?php }else{ ?>
    <a href="#content" class="back-to-top scroll-right text-center"><?php esc_html_e('Top', 'the-wp-business'); ?><span class="screen-reader-text"><?php esc_html_e('Back to Top', 'the-wp-business'); ?></span></a>
  <?php }?>
<?php }?>
  <footer role="contentinfo" id="footer" class="copyright-wrapper mrk-site-footer">
    <?php //Set widget areas classes based on user choice
      $the_wp_business_footer_columns = get_theme_mod('the_wp_business_footer_widget', '4');
      if ($the_wp_business_footer_columns == '3') {
        $he_wp_business_the_wp_business_cols = 'col-lg-4 col-md-4';
      } elseif ($the_wp_business_footer_columns == '4') {
        $the_wp_business_cols = 'col-lg-3 col-md-3';
      } elseif ($the_wp_business_footer_columns == '2') {
        $the_wp_business_cols = 'col-lg-6 col-md-6';
      } else {
        $the_wp_business_cols = 'col-lg-12 col-md-12';
      }
    ?>
    <?php if (get_theme_mod('the_wp_business_footer_hide_show', true)){ ?>
      <div class="container">        
        <div class="footerinner">
        <div class="row">
        <!-- Footer 1 -->
        <div class="<?php echo esc_attr($the_wp_business_cols); ?> footer-block">
            <?php if (is_active_sidebar('footer-1')) : ?>
                <?php dynamic_sidebar('footer-1'); ?>
            <?php else : ?>
                <aside id="categories" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('footer1', 'the-wp-business'); ?>">
                    <h3 class="widget-title"><?php esc_html_e('Categories', 'the-wp-business'); ?></h3>
                    <ul>
                        <?php wp_list_categories('title_li='); ?>
                    </ul>
                </aside>
            <?php endif; ?>
        </div>

        <!-- Footer 2 -->
        <div class="<?php echo esc_attr($the_wp_business_cols); ?> footer-block">
            <?php if (is_active_sidebar('footer-2')) : ?>
                <?php dynamic_sidebar('footer-2'); ?>
            <?php else : ?>
                <aside id="archives" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('footer2', 'the-wp-business'); ?>">
                    <h3 class="widget-title"><?php esc_html_e('Archives', 'the-wp-business'); ?></h3>
                    <ul>
                        <?php wp_get_archives(array('type' => 'monthly')); ?>
                    </ul>
                </aside>
            <?php endif; ?>
        </div>

        <!-- Footer 3 -->
        <div class="<?php echo esc_attr($the_wp_business_cols); ?> footer-block">
            <?php if (is_active_sidebar('footer-3')) : ?>
                <?php dynamic_sidebar('footer-3'); ?>
            <?php else : ?>
                <aside id="meta" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('footer3', 'the-wp-business'); ?>">
                    <h3 class="widget-title"><?php esc_html_e('Meta', 'the-wp-business'); ?></h3>
                    <ul>
                        <?php wp_register(); ?>
                        <li><?php wp_loginout(); ?></li>
                        <?php wp_meta(); ?>
                    </ul>
                </aside>
            <?php endif; ?>
        </div>

        <!-- Footer 4 -->
        <div class="<?php echo esc_attr($the_wp_business_cols); ?> footer-block">
            <?php if (is_active_sidebar('footer-4')) : ?>
                <?php dynamic_sidebar('footer-4'); ?>
            <?php else : ?>
                <aside id="search-widget" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('footer4', 'the-wp-business'); ?>">
                    <h3 class="widget-title"><?php esc_html_e('Search', 'the-wp-business'); ?></h3>
                    <?php the_widget('WP_Widget_Search'); ?>
                </aside>
            <?php endif; ?>
        </div>
        </div>
        </div>
      </div>
    <?php } ?>  
      <div class="mrk-footer-brand" aria-label="<?php esc_attr_e( 'MRK Digital & Online Services Center', 'the-wp-business' ); ?>"><div class="container"><strong>MRK DIGITAL</strong><span><?php esc_html_e( 'Digital & Online Services Center', 'the-wp-business' ); ?></span></div></div>
      <div class="footer <?php if( get_theme_mod( 'the_wp_business_copyright_sticky', false) == 1) { ?> copyright-sticky<?php } else { ?>close-sticky <?php } ?>">     
    <?php if (get_theme_mod('the_wp_business_copyright_hide_show', true)) {?>
      <div class="inner">
        <div class="container">
          <div class="copyright">
            <p><?php the_wp_business_credit_link(); ?> <?php echo esc_html(get_theme_mod('the_wp_business_footer_copy',__('By Themesglance','the-wp-business'))); ?></p>
            <?php if(get_theme_mod('the_wp_business_footer_social_media_hide_show',false)){ ?>
              <div class="mt-2">
                <?php if( get_theme_mod( 'the_wp_business_footer_youtube_url') != '') { ?>
                  <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'the_wp_business_footer_youtube_url','' ) ); ?>"><i class="fab fa-youtube" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube', 'the-wp-business' ); ?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'the_wp_business_footer_facebook_url') != '') { ?>
                  <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'the_wp_business_footer_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook', 'the-wp-business' ); ?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'the_wp_business_footer_twitter_url' ) != '') { ?>
                  <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'the_wp_business_footer_twitter_url','' ) ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter', 'the-wp-business' ); ?></span></a>
                <?php } ?>
                <?php if( get_theme_mod( 'the_wp_business_footer_rss_url') != '') { ?>
                  <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'the_wp_business_footer_rss_url','' ) ); ?>"><i class="fas fa-rss" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'RSS', 'the-wp-business' ); ?></span></a>
                <?php } ?>
              </div>
            <?php } ?>   
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    <?php } ?> 
    </div> 
  </footer>
<?php if (get_theme_mod('the_wp_business_enable_custom_cursor', false) != false) : ?>
  <!-- Custom cursor -->
  <div class="custom-cursor"></div>
  <!-- .Custom cursor -->
<?php endif; ?>
  <?php
  $mrk_whatsapp = get_theme_mod( 'mrk_whatsapp_number', '' );
  if ( get_theme_mod( 'mrk_show_whatsapp', false ) && $mrk_whatsapp ) :
      $mrk_label = get_theme_mod( 'mrk_whatsapp_label', 'WhatsApp پر رابطہ کریں' );
  ?>
    <a class="mrk-floating-whatsapp" href="<?php echo esc_url( 'https://wa.me/' . preg_replace( '/[^0-9]/', '', $mrk_whatsapp ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $mrk_label ); ?>">
      <i class="fab fa-whatsapp" aria-hidden="true"></i>
      <span><?php echo esc_html( $mrk_label ); ?></span>
    </a>
  <?php endif; ?>
  <?php wp_footer(); ?>
</body>
</html>