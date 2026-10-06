<?php
/**
 * Template Name: Custom home page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action('the_wp_business_above_slider_section'); ?>

 <?php if( get_theme_mod( 'the_wp_business_slider_hide', true)){?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod('the_wp_business_slider_speed',3000)); ?>"> 
        <?php $the_wp_business_content_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'the_wp_business_slidersettings_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $the_wp_business_content_pages[] = $mod;
            }
          }
          if( !empty($the_wp_business_content_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $the_wp_business_content_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
            $i = 1;
        ?>     
          <div class="carousel-inner" role="listbox">
            <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
              <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail();
                } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/block-patterns/images/banner.png" alt="" />
                <?php } ?>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <?php if ( get_theme_mod('the_wp_business_slider_title',true) != '' ) {?>
                      <h1 class="p-0 mb-3"><?php esc_html(the_title()); ?></h1> 
                    <?php }?>
                    <?php if ( get_theme_mod('the_wp_business_slider_content',true) != '' ) {?>
                      <p class="px-5"><?php $the_wp_business_excerpt = get_the_excerpt(); echo esc_html( the_wp_business_string_limit_words( $the_wp_business_excerpt, esc_attr(get_theme_mod('the_wp_business_slider_excerpt_number','15')))); ?></p> 
                    <?php }?> 
                    <?php if ( get_theme_mod('the_wp_business_slider_button_label','LEARN MORE') != '' && get_theme_mod('the_wp_business_slider_button',true) != ''|| get_theme_mod('the_wp_busines_slider_button_link') != '') {?>
                      <div class ="read-more mt-md-4 mt-0">
                        <a href="<?php echo esc_url(get_theme_mod('the_wp_business_slider_button_link')!= '') ? esc_url(get_theme_mod('the_wp_business_slider_button_link')) : esc_url(get_permalink()); ?>" class="hvr-sweep-to-right"><?php echo esc_html( get_theme_mod('the_wp_business_slider_button_label',__('LEARN MORE','the-wp-business')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('the_wp_business_slider_button_label',__('LEARN MORE','the-wp-business')) ); ?></span></a>
                      </div> 
                    <?php }?>                   
                  </div>
                </div>
              </div>
            <?php $i++; endwhile; 
            wp_reset_postdata();?>
          </div>
        <?php else : ?>
        <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <?php if(get_theme_mod('the_wp_business_slider_arrow_hide_show', true)){?>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="<?php echo esc_attr(get_theme_mod('the_wp_business_slider_prev_icon','fas fa-angle-left')); ?>"></i></span>
            <span class="screen-reader-text"><?php esc_html_e('Previous','the-wp-business'); ?></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="<?php echo esc_attr(get_theme_mod('the_wp_business_slider_next_icon','fas fa-angle-right')); ?>"></i></span>
            <span class="screen-reader-text"><?php esc_html_e('Next','the-wp-business'); ?></span>
          </a>
        <?php } ?>  
      </div>  
      <div class="clearfix"></div>
    </section> 
  <?php }?>

  <?php do_action('the_wp_business_above_wethink_section'); ?>

  <?php if( get_theme_mod( 'the_wp_business_wethink_post_setting') != '') { ?>
    <section id="wethink" class="py-5">
      <div class="container">
        <?php
        $the_wp_business_postData1 =  get_theme_mod('the_wp_business_wethink_post_setting');
        if($the_wp_business_postData1){
          $args = array( 'p' => esc_html($the_wp_business_postData1 ,'the-wp-business'),
          'post_type' => 'post');
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="row">
              <?php if(has_post_thumbnail()){ 
                $thumb_col = 'col-lg-6 col-md-6';
              $desc_col = 'col-lg-6 col-md-6';
              }else{
                $desc_col = 'col-lg-12 col-md-12';
              } ?>
              <div class="<?php echo esc_attr($thumb_col); ?>">
                <?php the_post_thumbnail(); ?>
              </div>
              <div class="<?php echo esc_attr($desc_col); ?>">
                <h2 class="m-0 p-0"><?php esc_html(the_title()); ?></h2>
                <p><?php the_content(); ?></p>
                <div class="clearfix"></div>
                <div class="read-btn mt-4"><a class="button  hvr-sweep-to-right"  href="<?php esc_url(the_permalink()); ?>"><?php esc_html_e('READ MORE','the-wp-business'); ?><span class="screen-reader-text"><?php esc_html_e('READ MORE','the-wp-business'); ?></span></a>
                </div>
              </div>
            </div>
            <?php endwhile; 
            wp_reset_postdata();?>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php
        endif; }?>
        <div class="clearfix"></div>
      </div> 
    </section>
  <?php }?>

  <?php do_action('the_wp_business_below_wethink_section'); ?>

  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="entry-content"><?php the_content(); ?></div>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>