<?php
/**
 * Dynamic MRK Services landing page.
 * Keeps the existing services-2 page URL and renders published MRK services.
 */
get_header(); ?>
<main id="maincontent" class="mrk-inner-page mrk-services-landing">
  <section class="mrk-page-hero">
    <div class="container">
      <span class="mrk-eyebrow">MRK DIGITAL</span>
      <h1><?php the_title(); ?></h1>
      <p><?php echo esc_html( get_the_excerpt() ?: 'MRK Digital کی professional digital, technical اور automation services۔' ); ?></p>
    </div>
  </section>
  <section class="container mrk-page-body">
    <?php if ( trim( get_the_content() ) !== '' ) : ?>
      <div class="mrk-page-content-card mrk-services-intro"><?php the_content(); ?></div>
    <?php endif; ?>
    <div class="mrk-service-grid">
      <?php
      $mrk_services = new WP_Query( array(
        'post_type' => 'mrk_service',
        'post_status' => 'publish',
        'posts_per_page' => 12,
        'orderby' => 'menu_order',
        'order' => 'ASC',
      ) );
      if ( $mrk_services->have_posts() ) :
        $n = 1;
        while ( $mrk_services->have_posts() ) : $mrk_services->the_post();
          $terms = get_the_terms( get_the_ID(), 'mrk_service_area' );
      ?>
        <article class="mrk-service-card">
          <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>" class="mrk-project-thumb"><?php the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); ?></a>
          <?php endif; ?>
          <span class="mrk-service-number"><?php echo esc_html( str_pad( (string) $n, 2, '0', STR_PAD_LEFT ) ); ?></span>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <?php if ( $terms && ! is_wp_error( $terms ) ) : ?>
            <div class="mrk-taxonomy-list"><?php echo esc_html( implode( ', ', wp_list_pluck( $terms, 'name' ) ) ); ?></div>
          <?php endif; ?>
          <p><?php echo esc_html( wp_trim_words( get_the_excerpt() ?: get_the_content(), 20 ) ); ?></p>
          <a class="mrk-card-link" href="<?php the_permalink(); ?>">تفصیل دیکھیں <span aria-hidden="true">→</span></a>
        </article>
      <?php $n++; endwhile; wp_reset_postdata(); else : ?>
        <article class="mrk-service-card">
          <span class="mrk-service-number">01</span>
          <h2>سروسز جلد یہاں دکھائی جائیں گی</h2>
          <p>WordPress Admin میں MRK Services سے اپنی professional services شامل کریں۔</p>
        </article>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>