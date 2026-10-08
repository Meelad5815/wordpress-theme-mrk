<?php
/**
 * Dynamic MRK Projects landing page.
 * Keeps the original WordPress page URL while rendering published MRK projects.
 */
get_header(); ?>
<main id="maincontent" class="mrk-inner-page mrk-projects-landing">
  <section class="mrk-page-hero">
    <div class="container">
      <span class="mrk-eyebrow">MRK PORTFOLIO</span>
      <h1><?php the_title(); ?></h1>
      <p><?php echo esc_html( get_the_excerpt() ?: 'Web development، automation، Arduino/ESP32 اور digital solutions کے منتخب projects۔' ); ?></p>
    </div>
  </section>
  <section class="container mrk-page-body">
    <?php if ( trim( get_the_content() ) !== '' ) : ?>
      <div class="mrk-page-content-card mrk-projects-intro"><?php the_content(); ?></div>
    <?php endif; ?>
    <div class="mrk-project-grid">
      <?php
      $mrk_projects = new WP_Query( array(
        'post_type' => 'mrk_project',
        'post_status' => 'publish',
        'posts_per_page' => 12,
        'orderby' => 'menu_order',
        'order' => 'ASC',
      ) );
      if ( $mrk_projects->have_posts() ) :
        while ( $mrk_projects->have_posts() ) : $mrk_projects->the_post();
          $terms = get_the_terms( get_the_ID(), 'mrk_project_type' );
      ?>
        <article class="mrk-project-card">
          <?php if ( has_post_thumbnail() ) : ?>
            <a class="mrk-project-thumb" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); ?></a>
          <?php endif; ?>
          <div class="mrk-project-body">
            <span class="mrk-project-label">PROJECT</span>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php if ( $terms && ! is_wp_error( $terms ) ) : ?>
              <div class="mrk-taxonomy-list"><?php echo esc_html( implode( ', ', wp_list_pluck( $terms, 'name' ) ) ); ?></div>
            <?php endif; ?>
            <p><?php echo esc_html( wp_trim_words( get_the_excerpt() ?: get_the_content(), 20 ) ); ?></p>
            <a class="mrk-card-link" href="<?php the_permalink(); ?>">پروجیکٹ دیکھیں <span aria-hidden="true">→</span></a>
          </div>
        </article>
      <?php endwhile; wp_reset_postdata(); else : ?>
        <article class="mrk-project-card mrk-project-empty">
          <span class="mrk-project-label">MRK PORTFOLIO</span>
          <h2>پروجیکٹس جلد یہاں دکھائے جائیں گے</h2>
          <p>WordPress Admin میں MRK Projects سے اپنا project شامل کریں۔</p>
        </article>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>