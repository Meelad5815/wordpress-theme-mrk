<?php
/**
 * MRK Digital Feature Pack
 *
 * Reusable, dependency-free UX, content-discovery and conversion enhancements.
 * Built inside the existing The WP Business theme; no duplicate theme or
 * third-party page builder is required.
 *
 * @package The WP Business
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function mrk_feature_pack_enabled() {
    return ! is_admin() && ! wp_doing_ajax() && ! wp_doing_cron();
}

/* Reading time metadata for articles, pages, services and projects. */
function mrk_reading_time_minutes( $post_id = 0 ) {
    $post_id = $post_id ? absint( $post_id ) : get_the_ID();
    $text    = wp_strip_all_tags( get_post_field( 'post_content', $post_id ) );
    $words   = str_word_count( preg_replace( '/[^\p{L}\p{N}\s]+/u', ' ', $text ) );
    return max( 1, (int) ceil( $words / 220 ) );
}

function mrk_reading_time_label( $post_id = 0 ) {
    return sprintf( _n( '%d min read', '%d min read', mrk_reading_time_minutes( $post_id ), 'the-wp-business' ), mrk_reading_time_minutes( $post_id ) );
}

function mrk_add_reading_time_to_excerpt( $excerpt ) {
    if ( ! mrk_feature_pack_enabled() || ! is_singular() || ! in_the_loop() ) {
        return $excerpt;
    }
    return $excerpt . ' <span class="mrk-reading-time">' . esc_html( mrk_reading_time_label() ) . '</span>';
}
add_filter( 'get_the_excerpt', 'mrk_add_reading_time_to_excerpt', 20 );

/* Safe content wrapper: add IDs to headings for deep links and a lightweight TOC. */
function mrk_content_heading_ids( $content ) {
    if ( ! mrk_feature_pack_enabled() || ! is_singular() || is_feed() ) {
        return $content;
    }

    $used = array();
    return preg_replace_callback(
        '/<h([23])([^>]*)>(.*?)<\/h\1>/is',
        function ( $match ) use ( &$used ) {
            $attrs = $match[2];
            $text  = wp_strip_all_tags( $match[3] );
            if ( preg_match( '/\bid\s*=\s*["\']([^"\']+)["\']/i', $attrs, $id_match ) ) {
                $id = sanitize_title( $id_match[1] );
            } else {
                $id = sanitize_title( $text );
            }
            if ( ! $id ) {
                $id = 'section';
            }
            $base = $id;
            $n = 2;
            while ( isset( $used[ $id ] ) ) {
                $id = $base . '-' . $n++;
            }
            $used[ $id ] = true;
            if ( preg_match( '/\bid\s*=/i', $attrs ) ) {
                $attrs = preg_replace( '/\bid\s*=\s*["\'][^"\']*["\']/i', 'id="' . esc_attr( $id ) . '"', $attrs );
            } else {
                $attrs .= ' id="' . esc_attr( $id ) . '"';
            }
            return '<h' . $match[1] . $attrs . '>' . $match[3] . '</h' . $match[1] . '>';
        },
        $content
    );
}
add_filter( 'the_content', 'mrk_content_heading_ids', 12 );

/* Inject a TOC only when an article has enough H2/H3 sections. */
function mrk_add_content_toc( $content ) {
    if ( ! mrk_feature_pack_enabled() || ! is_singular( array( 'post', 'page', 'mrk_service', 'mrk_project' ) ) || is_admin() ) {
        return $content;
    }

    preg_match_all( '/<h([23])[^>]*id=["\']([^"\']+)["\'][^>]*>(.*?)<\/h\1>/is', $content, $matches, PREG_SET_ORDER );
    if ( count( $matches ) < 3 ) {
        return $content;
    }

    $items = '<nav class="mrk-toc" aria-label="' . esc_attr__( 'Table of contents', 'the-wp-business' ) . '"><strong>' . esc_html__( 'On this page', 'the-wp-business' ) . '</strong><ol>';
    foreach ( $matches as $m ) {
        $items .= '<li class="mrk-toc-level-' . absint( $m[1] ) . '"><a href="#' . esc_attr( $m[2] ) . '">' . esc_html( wp_strip_all_tags( $m[3] ) ) . '</a></li>';
    }
    $items .= '</ol></nav>';

    return $items . $content;
}
add_filter( 'the_content', 'mrk_add_content_toc', 15 );

/* Contextual related content for blog/service/project pages. */
function mrk_related_content_block() {
    if ( ! mrk_feature_pack_enabled() || ! is_singular( array( 'post', 'mrk_service', 'mrk_project' ) ) ) {
        return;
    }

    $current = get_queried_object_id();
    $types   = array( 'post', 'mrk_service', 'mrk_project' );
    $q = new WP_Query(
        array(
            'post_type'              => $types,
            'post_status'            => 'publish',
            'posts_per_page'         => 3,
            'post__not_in'           => array( $current ),
            'orderby'                => 'date',
            'order'                  => 'DESC',
            'no_found_rows'          => true,
            'ignore_sticky_posts'    => true,
            'update_post_meta_cache' => false,
            'update_post_term_cache' => true,
        )
    );

    if ( ! $q->have_posts() ) {
        return;
    }

    echo '<section class="mrk-related-content" aria-labelledby="mrk-related-title">';
    echo '<h2 id="mrk-related-title">' . esc_html__( 'Related MRK Content', 'the-wp-business' ) . '</h2>';
    echo '<div class="mrk-related-grid">';
    while ( $q->have_posts() ) {
        $q->the_post();
        echo '<article class="mrk-related-card">';
        if ( has_post_thumbnail() ) {
            echo '<a href="' . esc_url( get_permalink() ) . '">' . get_the_post_thumbnail( get_the_ID(), 'medium', array( 'loading' => 'lazy' ) ) . '</a>';
        }
        echo '<h3><a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></h3>';
        echo '<p>' . esc_html( wp_trim_words( get_the_excerpt(), 20 ) ) . '</p>';
        echo '<a class="mrk-related-link" href="' . esc_url( get_permalink() ) . '">' . esc_html__( 'Read more', 'the-wp-business' ) . '</a>';
        echo '</article>';
    }
    echo '</div></section>';
    wp_reset_postdata();
}
add_action( 'wp_footer', 'mrk_related_content_block', 30 );

/* Lightweight share/utility controls; URLs are built server-side and escaped. */
function mrk_share_tools() {
    if ( ! mrk_feature_pack_enabled() || ! is_singular( array( 'post', 'page', 'mrk_service', 'mrk_project' ) ) ) {
        return;
    }

    $url   = rawurlencode( get_permalink() );
    $title = rawurlencode( wp_strip_all_tags( get_the_title() ) );

    echo '<div class="mrk-share-tools" aria-label="' . esc_attr__( 'Share this page', 'the-wp-business' ) . '">';
    echo '<span class="mrk-share-label">' . esc_html__( 'Share:', 'the-wp-business' ) . '</span>';
    echo '<a target="_blank" rel="noopener noreferrer" href="https://wa.me/?text=' . esc_attr( $title . '%20' . $url ) . '">WhatsApp</a>';
    echo '<a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/sharer/sharer.php?u=' . esc_attr( $url ) . '">Facebook</a>';
    echo '<a target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/sharing/share-offsite/?url=' . esc_attr( $url ) . '">LinkedIn</a>';
    echo '<button type="button" class="mrk-copy-link" data-mrk-copy="' . esc_attr( get_permalink() ) . '">' . esc_html__( 'Copy link', 'the-wp-business' ) . '</button>';
    echo '<button type="button" class="mrk-print-page">' . esc_html__( 'Print', 'the-wp-business' ) . '</button>';
    echo '</div>';
}
add_action( 'wp_body_open', 'mrk_share_tools', 20 );

/* Stronger attachment/image accessibility defaults. */
function mrk_attachment_alt_fallback( $attr, $attachment ) {
    if ( empty( $attr['alt'] ) ) {
        $alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
        if ( ! $alt ) {
            $alt = get_the_title( $attachment->ID );
        }
        if ( $alt ) {
            $attr['alt'] = wp_strip_all_tags( $alt );
        }
    }
    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'mrk_attachment_alt_fallback', 20, 2 );

/* No-index internal search results and paginated search to reduce index noise. */
function mrk_search_robots( $robots ) {
    if ( is_search() ) {
        $robots['noindex'] = true;
        $robots['follow']  = true;
    }
    return $robots;
}
add_filter( 'wp_robots', 'mrk_search_robots', 20 );

/* Feature-pack styles are tiny and only loaded on the front end. */
function mrk_feature_pack_styles() {
    if ( ! mrk_feature_pack_enabled() ) {
        return;
    }
    $css = '.mrk-share-tools{display:flex;flex-wrap:wrap;gap:.55rem;align-items:center;margin:1.25rem 0;padding:.8rem;border:1px solid rgba(0,0,0,.08);border-radius:12px}.mrk-share-tools a,.mrk-share-tools button{padding:.45rem .7rem;border-radius:7px;text-decoration:none;cursor:pointer}.mrk-share-label{font-weight:700}.mrk-toc{margin:1.5rem 0;padding:1rem 1.1rem;border-radius:12px;background:rgba(0,0,0,.035)}.mrk-toc ol{margin:.6rem 0 0 1.2rem}.mrk-toc-level-3{margin-left:1rem}.mrk-related-content{max-width:1200px;margin:2.5rem auto;padding:0 1rem}.mrk-related-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:1rem}.mrk-related-card{padding:1rem;border:1px solid rgba(0,0,0,.09);border-radius:12px}.mrk-related-card img{width:100%;height:auto;border-radius:8px}.mrk-related-card h3{margin:.75rem 0 .4rem}.mrk-reading-time{font-size:.9em;opacity:.75}@media(max-width:768px){.mrk-related-grid{grid-template-columns:1fr}.mrk-share-tools{align-items:stretch}.mrk-share-tools a,.mrk-share-tools button{flex:1 1 auto;text-align:center}}';
    wp_add_inline_style( 'the-wp-business-basic-style', $css );
}
add_action( 'wp_enqueue_scripts', 'mrk_feature_pack_styles', 40 );

/* Small client-side utilities: copy URL and print, with accessible feedback. */
function mrk_feature_pack_scripts() {
    if ( ! mrk_feature_pack_enabled() ) {
        return;
    }
    $js = "(function(){document.addEventListener('click',function(e){var copy=e.target.closest('.mrk-copy-link');if(copy){var u=copy.getAttribute('data-mrk-copy')||location.href;navigator.clipboard?navigator.clipboard.writeText(u).then(function(){copy.textContent='Copied';setTimeout(function(){copy.textContent='Copy link'},1400)}):window.prompt('Copy link',u)}var print=e.target.closest('.mrk-print-page');if(print){window.print()}});})();";
    wp_add_inline_script( 'the-wp-business-custom-scripts', $js, 'after' );
}
add_action( 'wp_enqueue_scripts', 'mrk_feature_pack_scripts', 40 );
