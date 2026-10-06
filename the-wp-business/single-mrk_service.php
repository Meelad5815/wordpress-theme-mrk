<?php
/** MRK Service single template. */
get_header(); ?>
<main id="maincontent" class="mrk-inner-page mrk-single-content">
  <?php while ( have_posts() ) : the_post(); ?>
  <section class="mrk-page-hero"><div class="container"><span class="mrk-eyebrow">MRK SERVICE</span><h1><?php the_title(); ?></h1><?php if(has_excerpt()): ?><p><?php echo esc_html(get_the_excerpt()); ?></p><?php endif; ?></div></section>
  <section class="container mrk-page-body"><article class="mrk-page-content-card"><?php if(has_post_thumbnail()): ?><div class="mrk-inner-featured"><?php the_post_thumbnail('large'); ?></div><?php endif; ?><div class="bradcrumbs mrk-breadcrumbs"><?php the_wp_business_the_breadcrumb(); ?></div><div class="entry-content"><?php the_content(); ?></div><a class="mrk-btn mrk-btn-gold" href="<?php echo esc_url(home_url('/contact-2/')); ?>">اس سروس کے لیے رابطہ کریں</a></article></section>
  <?php endwhile; wp_reset_postdata(); ?>
</main><?php get_footer(); ?>