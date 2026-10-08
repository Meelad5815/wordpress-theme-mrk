<?php
/**
 * Template Name: Custom home page
 * MRK Digital & Online Services Center home page
 */
get_header();
?>

<main id="maincontent" role="main" class="mrk-home">

  <section class="mrk-hero" aria-labelledby="mrk-hero-title">
    <div class="container">
      <div class="mrk-hero-grid">
        <div class="mrk-hero-copy">
          <span class="mrk-kicker">MRK DIGITAL & ONLINE SERVICES CENTER</span>
          <h1 id="mrk-hero-title">آپ کی ہر آن لائن ضرورت، ایک ہی جگہ!</h1>
          <p class="mrk-hero-subtitle">اب تمام سرکاری، آن لائن، ویب، گرافک، آٹومیشن اور ٹیکنالوجی کی خدمات ایک ہی جگہ پروفیشنل انداز میں حاصل کریں۔</p>
          <div class="mrk-actions">
            <a class="mrk-btn mrk-btn-gold" href="<?php echo esc_url( home_url('/contact-2/') ); ?>">رابطہ کریں</a>
            <a class="mrk-btn mrk-btn-outline" href="<?php echo esc_url( home_url('/services-2/') ); ?>">تمام سروسز دیکھیں</a>
          </div>
          <div class="mrk-trust">
            <span>✓ Mobile Friendly</span>
            <span>✓ Professional Service</span>
            <span>✓ Fast Response</span>
          </div>
        </div>
        <div class="mrk-hero-panel" aria-label="MRK Digital service highlights">
          <div class="mrk-panel-badge">MRK</div>
          <h2>Digital + Engineering</h2>
          <p>Web & App Development • SEO • PLC • Arduino/ESP32 • Electrical & Online Services</p>
          <div class="mrk-stats">
            <div><strong>8+</strong><span>Core Areas</span></div>
            <div><strong>24/7</strong><span>Online Inquiry</span></div>
            <div><strong>100%</strong><span>Mobile First</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="mrk-section mrk-services" aria-labelledby="mrk-services-title">
    <div class="container">
      <div class="mrk-section-head">
        <span class="mrk-eyebrow">OUR SERVICES</span>
        <h2 id="mrk-services-title">MRK Digital کی اہم خدمات</h2>
        <p>افراد، طلبہ، کاروبار اور انڈسٹری کے لیے ایک جامع ڈیجیٹل اور ٹیکنیکل سروس پلیٹ فارم۔</p>
      </div>

      <div class="mrk-service-grid">
        <?php
        $mrk_services = new WP_Query( array(
          'post_type'      => 'mrk_service',
          'post_status'    => 'publish',
          'posts_per_page' => 8,
          'orderby'        => 'menu_order',
          'order'          => 'ASC',
          'no_found_rows'  => true,
        ) );

        if ( $mrk_services->have_posts() ) :
          $mrk_service_number = 1;
          while ( $mrk_services->have_posts() ) : $mrk_services->the_post();
        ?>
          <article class="mrk-service-card">
            <span class="mrk-service-number"><?php echo esc_html( str_pad( (string) $mrk_service_number, 2, '0', STR_PAD_LEFT ) ); ?></span>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php echo esc_html( wp_trim_words( get_the_excerpt() ? get_the_excerpt() : get_the_content(), 22 ) ); ?></p>
            <a class="mrk-card-link" href="<?php the_permalink(); ?>">تفصیل دیکھیں <span aria-hidden="true">→</span></a>
          </article>
        <?php
            $mrk_service_number++;
          endwhile;
          wp_reset_postdata();
        else :
          $services = array(
            array('icon'=>'01','title'=>'Digital & Online Services','text'=>'سرکاری و آن لائن فارم، دستاویزات، FBR، SECP اور دیگر ڈیجیٹل سہولیات۔'),
            array('icon'=>'02','title'=>'Web & App Development','text'=>'WordPress، HTML/CSS/JS، ویب ایپس اور کاروباری ویب سائٹس۔'),
            array('icon'=>'03','title'=>'SEO & Digital Marketing','text'=>'SEO، آن لائن برانڈنگ، کنٹینٹ اور بزنس کی ڈیجیٹل موجودگی۔'),
            array('icon'=>'04','title'=>'Graphic Design','text'=>'کارڈ، دعوت نامہ، فلیکس، سوشل میڈیا اور بزنس ڈیزائن۔'),
            array('icon'=>'05','title'=>'PLC & Industrial Automation','text'=>'PLC programming، control logic، troubleshooting اور industrial automation۔'),
            array('icon'=>'06','title'=>'Arduino / ESP32','text'=>'Automation، sensors، controllers اور custom electronics projects۔'),
            array('icon'=>'07','title'=>'Mobile Software','text'=>'موبائل software setup، troubleshooting اور digital assistance۔'),
            array('icon'=>'08','title'=>'Electrical & Engineering','text'=>'Electrical work، design/consultation، control panels اور engineering support۔'),
          );
          foreach ($services as $service) :
        ?>
          <article class="mrk-service-card">
            <span class="mrk-service-number"><?php echo esc_html( $service['icon'] ); ?></span>
            <h3><?php echo esc_html( $service['title'] ); ?></h3>
            <p><?php echo esc_html( $service['text'] ); ?></p>
            <a class="mrk-card-link" href="<?php echo esc_url( home_url('/services-2/') ); ?>">تفصیل دیکھیں <span aria-hidden="true">→</span></a>
          </article>
        <?php
          endforeach;
        endif;
        ?>
      </div>
    </div>
  </section>

  <section class="mrk-section mrk-projects" aria-labelledby="mrk-projects-title">
    <div class="container">
      <div class="mrk-section-head">
        <span class="mrk-eyebrow">RECENT WORK</span>
        <h2 id="mrk-projects-title">MRK Projects</h2>
        <p>Automation، web development اور digital solutions کے منتخب کام۔</p>
      </div>
      <div class="mrk-project-grid">
        <?php
        $mrk_projects = new WP_Query( array(
          'post_type'      => 'mrk_project',
          'post_status'    => 'publish',
          'posts_per_page' => 3,
          'no_found_rows'  => true,
        ) );
        if ( $mrk_projects->have_posts() ) :
          while ( $mrk_projects->have_posts() ) : $mrk_projects->the_post();
        ?>
          <article class="mrk-project-card">
            <?php if ( has_post_thumbnail() ) : ?>
              <a class="mrk-project-thumb" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
                <?php the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); ?>
              </a>
            <?php endif; ?>
            <div class="mrk-project-body">
              <span class="mrk-project-label">PROJECT</span>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
              <a class="mrk-card-link" href="<?php the_permalink(); ?>">پروجیکٹ دیکھیں <span aria-hidden="true">→</span></a>
            </div>
          </article>
        <?php
          endwhile;
          wp_reset_postdata();
        else :
        ?>
          <article class="mrk-project-card mrk-project-empty">
            <span class="mrk-project-label">MRK PORTFOLIO</span>
            <h3>پروجیکٹس جلد یہاں دکھائے جائیں گے</h3>
            <p>اپنے مکمل شدہ web، automation اور digital projects کو portfolio میں شامل کریں۔</p>
            <a class="mrk-card-link" href="<?php echo esc_url( home_url('/projects/') ); ?>">Portfolio دیکھیں <span aria-hidden="true">→</span></a>
          </article>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="mrk-section mrk-process" aria-labelledby="mrk-process-title">
    <div class="container">
      <div class="mrk-section-head">
        <span class="mrk-eyebrow">HOW IT WORKS</span>
        <h2 id="mrk-process-title">کام کروانے کا آسان طریقہ</h2>
      </div>
      <div class="mrk-process-grid">
        <div class="mrk-step"><strong>01</strong><h3>رابطہ</h3><p>اپنی ضرورت WhatsApp یا رابطہ فارم کے ذریعے بتائیں۔</p></div>
        <div class="mrk-step"><strong>02</strong><h3>مشورہ</h3><p>آپ کے کام کے مطابق مناسب حل اور طریقہ کار طے کیا جائے گا۔</p></div>
        <div class="mrk-step"><strong>03</strong><h3>Development</h3><p>کام کو منظم، محفوظ اور پروفیشنل انداز میں مکمل کیا جائے گا۔</p></div>
        <div class="mrk-step"><strong>04</strong><h3>Delivery</h3><p>تیار کام کی جانچ کے بعد آپ کو مکمل deliverable دیا جائے گا۔</p></div>
      </div>
    </div>
  </section>

  <section class="mrk-cta" aria-labelledby="mrk-cta-title">
    <div class="container">
      <div>
        <span class="mrk-eyebrow">START YOUR PROJECT</span>
        <h2 id="mrk-cta-title">اپنا کام آج ہی شروع کریں</h2>
        <p>ویب سائٹ، آن لائن سروس، گرافک ڈیزائن، PLC یا automation project کے لیے ہم سے رابطہ کریں۔</p>
      </div>
      <a class="mrk-btn mrk-btn-gold" href="<?php echo esc_url( home_url('/contact-2/') ); ?>">ابھی رابطہ کریں</a>
    </div>
  </section>

  <?php while ( have_posts() ) : the_post(); ?>
    <?php if ( trim( get_the_content() ) !== '' ) : ?>
      <section class="container mrk-page-content">
        <?php the_content(); ?>
      </section>
    <?php endif; ?>
  <?php endwhile; ?>

</main>

<?php get_footer(); ?>