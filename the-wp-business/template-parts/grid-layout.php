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
?> 
<?php 
    $the_wp_business_grid_columns = get_theme_mod('the_wp_business_grid_columns', '3');
    if ($the_wp_business_grid_columns == '2') {
      $the_wp_business_column_class = 'col-lg-6 col-md-6';
    } elseif ($the_wp_business_grid_columns == '4') {
      $the_wp_business_column_class = 'col-lg-3 col-md-6';
    } elseif ($the_wp_business_grid_columns == '3') {
      $the_wp_business_column_class = 'col-lg-4 col-md-4';
    }
?>
<div class="<?php echo esc_attr($the_wp_business_column_class); ?>">
  <article class="gridbox smallpostimage p-3 mb-4">
    <?php if(has_post_thumbnail() && get_theme_mod('the_wp_business_grid_post_featured_image',true) == true) { ?>
      <div class="hovereffect mb-3">
        <?php the_post_thumbnail(); ?>
      </div>
    <?php }?>
    <div class="clearfix"></div>
    <div class="wow bounceInUp">
      <?php if(get_theme_mod('the_wp_business_grid_post_date',true)){ ?>
        <div class="col-lg-6 col-md-8">
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

      <h2 class="pt-0 m-0"><a href="<?php echo esc_url( get_permalink() );?>" class="p-0"><?php esc_html(the_title()); ?></a></h2>
      <div class="entry-content">
          <p>
            <?php $the_wp_business_theme_lay = get_theme_mod( 'the_wp_business_grid_post_content','Excerpt Content');
              if($the_wp_business_theme_lay == 'Full Content'){ ?>
                <?php the_content(); ?>
              <?php }
              if($the_wp_business_theme_lay == 'Excerpt Content'){ ?>
                <?php if(get_the_excerpt()) { ?>
                  <?php $the_wp_business_excerpt = get_the_excerpt(); echo esc_html( the_wp_business_string_limit_words( $the_wp_business_excerpt, esc_attr(get_theme_mod('the_wp_business_grid_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('the_wp_business_grid_excerpt_suffix','...') ); ?>
                <?php }?>
              <?php }?>
          </p>
	      </div>
      <div class="metabox grid-box py-2">
        <?php if(get_theme_mod('the_wp_business_grid_post_author',true)){ ?>
          <i class="<?php echo esc_attr(get_theme_mod('the_wp_business_grid_post_author_icon',"fa fa-user" )); ?>"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><span class="entry-author"> <?php esc_html(the_author()); ?></span><span class="screen-reader-text"><?php esc_html(the_author()); ?></span></a>
        <?php }?>
        <?php if(get_theme_mod('the_wp_business_grid_post_comment',true)){ ?>
          <i class="<?php echo esc_attr(get_theme_mod('the_wp_business_grid_post_comment_icon',"fa fa-comments" )); ?>"></i><span class="entry-comments"> <?php comments_number( __('0 Comments','the-wp-business'), __('0 Comments','the-wp-business'), __('% Comments','the-wp-business') ); ?></span> 
        <?php }?>
        <?php if( get_theme_mod( 'the_wp_business_grid_post_time',true) != '') { ?>
          <i class="<?php echo esc_attr(get_theme_mod('the_wp_business_grid_post_time_icon',"fa fa-clock" )); ?>"></i><span class="entry-comments"> <?php echo esc_html( get_the_time() ); ?></span>
        <?php }?>
      </div>
      <?php if ( get_theme_mod('the_wp_business_grid_button_text','Read Full') != '' ) {?>
        <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right mt-3"><?php echo esc_html( get_theme_mod('the_wp_business_grid_button_text',__('Read Full', 'the-wp-business')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('the_wp_business_grid_button_text',__('Read Full', 'the-wp-business')) ); ?></span></a>
      <?php }?>
    </div>
    <div class="clearfix"></div>
  </article>
</div>
  