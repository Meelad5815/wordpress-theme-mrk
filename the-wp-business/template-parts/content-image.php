<?php
/**
 * The template part for displaying post
 *
 * @package The WP Business
 * @subpackage the_wp_business
 * @since The WP Business 1.0
 */
?>
<?php 
  $the_wp_business_archive_year  = get_the_time('Y'); 
  $the_wp_business_archive_month = get_the_time('m'); 
  $the_wp_business_archive_day = get_the_time('d'); 
  $alignment = get_theme_mod('the_wp_business_blog_post_alignment', 'left');
  ?>
<article class="postbox smallpostimage wow zoomInLeft delay-1000 p-3 mb-4 <?php echo esc_attr($alignment); ?>-align">
  <?php if ($alignment == 'image_content') { ?>
    <div class="row m-0">
      <?php if (has_post_thumbnail()&& get_theme_mod('the_wp_business_featured_image',true) == true) { ?>
        <div class="hovereffect blogpost mb-3 col-lg-5 col-md-12 custom-width1">
            <?php the_post_thumbnail(); ?>
        </div>
      <?php } ?>
      <div class="<?php echo (has_post_thumbnail()) ? 'col-lg-7 col-md-12' : 'col-lg-12 col-md-12'; ?> custom-width2">
        <div class="row">
        <?php if(get_theme_mod('the_wp_business_metafields_date',true)==1){ ?>
          <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4">
            <div class="datebox mb-1 text-center">
              <div class="date-monthwrap py-4 px-md-0 px-3">
                <a href="<?php echo esc_url( get_day_link( $the_wp_business_archive_year, $the_wp_business_archive_month, $the_wp_business_archive_day)); ?>" class="p-0">
                  <span class="date-month"><?php echo esc_html( get_the_date( 'M' ) ); ?></span>
                  <span class="date-day"><?php echo esc_html( get_the_date( 'd') ); ?></span>
                <span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span>
              </a>
              </div>
              <div class="yearwrap py-1">
                <span class="date-year"><?php echo esc_html( get_the_date( 'Y' ) ); ?></span>
              </div>
            </div>
          </div>
        <?php }?>
        <div class="col-xl-10 col-lg-9 col-md-12 col-sm-12">
          <h2 class="pt-0 m-0"><a href="<?php echo esc_url( get_permalink() );?>" class="p-0"><?php esc_html(the_title()); ?></a></h2>   
          <?php if(get_theme_mod('the_wp_business_blog_post_content') == 'Full Content'){ ?>
            <?php the_content(); ?>
          <?php }
          if(get_theme_mod('the_wp_business_blog_post_content', 'Excerpt Content') == 'Excerpt Content'){ ?>
            <?php if(get_the_excerpt()) { ?>
              <div class="entry-content"><p><?php $the_wp_business_excerpt = get_the_excerpt(); echo esc_html( the_wp_business_string_limit_words( $the_wp_business_excerpt, esc_attr(get_theme_mod('the_wp_business_post_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('the_wp_business_button_excerpt_suffix','...') ); ?></p></div>
            <?php }?>
          <?php }?>
          <div class="metabox py-2">
            <?php if(get_theme_mod('the_wp_business_metafields_author',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('the_wp_business_postauthor_icon',"fa fa-user pe-2" )); ?>"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>" class="pe-3"><span class="entry-author"> <?php esc_html(the_author()); ?></span><span class="screen-reader-text"><?php esc_html(the_author()); ?></span></a>
            <?php }?>
            <?php if(get_theme_mod('the_wp_business_metafields_comment',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('the_wp_business_postcomment_icon',"fa fa-comments pe-2" )); ?>"></i><span class="entry-comments pe-3"> <?php comments_number( __('0 Comments','the-wp-business'), __('0 Comments','the-wp-business'), __('% Comments','the-wp-business') ); ?></span> 
            <?php }?>
            <?php if( get_theme_mod( 'the_wp_business_metafields_time',true) != '') { ?>
              <i class="<?php echo esc_attr(get_theme_mod('the_wp_business_posttime_icon',"fa fa-clock pe-2" )); ?>"></i><span class="entry-comments"> <?php echo esc_html( get_the_time() ); ?></span>
            <?php }?>
          </div>
          <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right mt-3"><?php esc_html_e('Read Full','the-wp-business'); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('the_wp_business_blog_button_text',__('Read Full', 'the-wp-business')) ); ?></span></a>
        </div>
        <div class="clearfix"></div>
      </div>
      </div>
    </div>
  <?php } else { ?>
    <!-- Default Layout -->
    <?php if(has_post_thumbnail() && get_theme_mod('the_wp_business_featured_image',true) == true) { ?>
    <div class="hovereffect blogpost mb-3">
      <?php the_post_thumbnail(); ?>
    </div>
    <?php }?>
    <div class="clearfix"></div>
    <div class="row">
      <?php if(get_theme_mod('the_wp_business_metafields_date',true)==1){ ?>
        <div class="col-lg-2 col-md-2">
          <div class="datebox mb-1 text-center">
            <div class="date-monthwrap py-4 px-md-0 px-3">
              <a href="<?php echo esc_url( get_day_link( $the_wp_business_archive_year, $the_wp_business_archive_month, $the_wp_business_archive_day)); ?>" class="p-0">
                <span class="date-month"><?php echo esc_html( get_the_date( 'M' ) ); ?></span>
                <span class="date-day"><?php echo esc_html( get_the_date( 'd') ); ?></span>
              <span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span>
            </a>
            </div>
            <div class="yearwrap py-1">
              <span class="date-year"><?php echo esc_html( get_the_date( 'Y' ) ); ?></span>
            </div>
          </div>
        </div>
      <?php }?>
      <div class="col-lg-10 col-md-10 ">
        <h2 class="pt-0 m-0"><a href="<?php echo esc_url( get_permalink() );?>" class="p-0"><?php esc_html(the_title()); ?></a></h2>   
        <?php if(get_theme_mod('the_wp_business_blog_post_content') == 'Full Content'){ ?>
          <?php the_content(); ?>
        <?php }
        if(get_theme_mod('the_wp_business_blog_post_content', 'Excerpt Content') == 'Excerpt Content'){ ?>
          <?php if(get_the_excerpt()) { ?>
            <div class="entry-content"><p><?php $the_wp_business_excerpt = get_the_excerpt(); echo esc_html( the_wp_business_string_limit_words( $the_wp_business_excerpt, esc_attr(get_theme_mod('the_wp_business_post_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('the_wp_business_button_excerpt_suffix','...') ); ?></p></div>
          <?php }?>
        <?php }?>
        <div class="metabox py-2">
          <?php if(get_theme_mod('the_wp_business_metafields_author',true)==1){ ?>
            <i class="<?php echo esc_attr(get_theme_mod('the_wp_business_postauthor_icon',"fa fa-user pe-2" )); ?>"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>" class="pe-3"><span class="entry-author"> <?php esc_html(the_author()); ?></span><span class="screen-reader-text"><?php esc_html(the_author()); ?></span></a>
          <?php }?>
          <?php if(get_theme_mod('the_wp_business_metafields_comment',true)==1){ ?>
            <i class="<?php echo esc_attr(get_theme_mod('the_wp_business_postcomment_icon',"fa fa-comments pe-2" )); ?>"></i><span class="entry-comments pe-3"> <?php comments_number( __('0 Comments','the-wp-business'), __('0 Comments','the-wp-business'), __('% Comments','the-wp-business') ); ?></span> 
          <?php }?>
          <?php if( get_theme_mod( 'the_wp_business_metafields_time',true) != '') { ?>
            <i class="<?php echo esc_attr(get_theme_mod('the_wp_business_posttime_icon',"fa fa-clock pe-2" )); ?>"></i><span class="entry-comments"> <?php echo esc_html( get_the_time() ); ?></span>
          <?php }?>
        </div>
        <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right mt-3"><?php esc_html_e('Read Full','the-wp-business'); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('the_wp_business_blog_button_text',__('Read Full', 'the-wp-business')) ); ?></span></a>
      </div>
      <div class="clearfix"></div>
    </div>
  <?php } ?>  
</article>