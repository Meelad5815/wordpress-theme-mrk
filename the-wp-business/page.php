<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package The WP Business
 */
get_header(); ?>

<?php do_action('the_wp_business_page_header'); ?>

<main id="maincontent" role="main" class="mrk-inner-page">
    <?php while ( have_posts() ) : the_post(); ?>
      <section class="mrk-page-hero">
        <div class="container">
          <span class="mrk-eyebrow">MRK DIGITAL</span>
          <h1><?php the_title(); ?></h1>
          <?php if ( has_excerpt() ) : ?><p><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?>
        </div>
      </section>

      <section class="container mrk-page-body">
        <div class="mrk-page-content-card">
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="mrk-inner-featured"><?php the_post_thumbnail( 'large' ); ?></div>
          <?php endif; ?>
          <?php if ( get_theme_mod('the_wp_business_single_page_breadcrumb',true) ) : ?>
            <div class="bradcrumbs mrk-breadcrumbs"><?php the_wp_business_the_breadcrumb(); ?></div>
          <?php endif; ?>
          <div class="entry-content"><?php the_content(); ?></div>
          <?php wp_link_pages( array(
            'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'the-wp-business' ) . '</span>',
            'after' => '</div>', 'link_before' => '<span class="page-number">', 'link_after' => '</span>',
            'pagelink' => '<span class="screen-reader-text">' . __( 'Page', 'the-wp-business' ) . ' </span>%',
            'separator' => '<span class="screen-reader-text">, </span>',
          ) ); ?>
        </div>
      </section>
    <?php endwhile; wp_reset_postdata(); ?>
</main>

<?php do_action('the_wp_business_page_footer'); ?>

<?php get_footer(); ?>