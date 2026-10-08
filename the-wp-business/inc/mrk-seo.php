<?php
/**
 * MRK Digital SEO and earning-readiness layer.
 *
 * Adds non-plugin SEO metadata and structured data while yielding to
 * Yoast SEO / Rank Math when either is active.
 *
 * @package The_WP_Business
 */

if ( ! function_exists( 'mrk_digital_seo_plugin_active' ) ) {
    function mrk_digital_seo_plugin_active() {
        return defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' );
    }
}

if ( ! function_exists( 'mrk_digital_seo_description' ) ) {
    function mrk_digital_seo_description( $post_id = 0 ) {
        $post_id = $post_id ? absint( $post_id ) : get_queried_object_id();

        if ( is_front_page() ) {
            return 'MRK Digital Center provides WordPress websites, web and app development, PLC and industrial automation, Arduino and ESP32 projects, graphic design, SEO and digital services.';
        }

        if ( $post_id ) {
            $description = get_post_meta( $post_id, '_mrk_seo_description', true );
            if ( ! $description ) {
                $description = get_the_excerpt( $post_id );
            }
            if ( ! $description ) {
                $description = wp_trim_words( wp_strip_all_tags( get_post_field( 'post_content', $post_id ) ), 30 );
            }
            if ( $description ) {
                return wp_strip_all_tags( $description );
            }
        }

        return 'MRK Digital Center — Web, WordPress, automation and digital services.';
    }
}

if ( ! function_exists( 'mrk_digital_seo_meta_head' ) ) {
    function mrk_digital_seo_meta_head() {
        if ( is_admin() || mrk_digital_seo_plugin_active() ) {
            return;
        }

        $title       = wp_strip_all_tags( wp_get_document_title() );
        $description = mrk_digital_seo_description();
        $canonical   = is_singular() ? get_permalink() : home_url( '/' );

        if ( is_home() && get_option( 'page_for_posts' ) ) {
            $canonical = get_permalink( get_option( 'page_for_posts' ) );
        }

        echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
        echo '<link rel="canonical" href="' . esc_url( $canonical ) . '">' . "\n";
        echo '<meta property="og:locale" content="en_US">' . "\n";
        echo '<meta property="og:type" content="' . esc_attr( is_singular( 'post' ) ? 'article' : 'website' ) . '">' . "\n";
        echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
        echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
        echo '<meta property="og:url" content="' . esc_url( $canonical ) . '">' . "\n";
        echo '<meta property="og:site_name" content="MRK Digital Center">' . "\n";
        echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
        echo '<meta name="twitter:title" content="' . esc_attr( $title ) . '">' . "\n";
        echo '<meta name="twitter:description" content="' . esc_attr( $description ) . '">' . "\n";

        if ( is_singular() && has_post_thumbnail() ) {
            $image = get_the_post_thumbnail_url( get_queried_object_id(), 'large' );
            if ( $image ) {
                echo '<meta property="og:image" content="' . esc_url( $image ) . '">' . "\n";
                echo '<meta name="twitter:image" content="' . esc_url( $image ) . '">' . "\n";
            }
        } elseif ( has_custom_logo() ) {
            $logo_id = get_theme_mod( 'custom_logo' );
            $image   = wp_get_attachment_image_url( $logo_id, 'full' );
            if ( $image ) {
                echo '<meta property="og:image" content="' . esc_url( $image ) . '">' . "\n";
                echo '<meta name="twitter:image" content="' . esc_url( $image ) . '">' . "\n";
            }
        }
    }
}
add_action( 'wp_head', 'mrk_digital_seo_meta_head', 5 );

if ( ! function_exists( 'mrk_digital_general_schema' ) ) {
    function mrk_digital_general_schema() {
        if ( is_admin() || mrk_digital_seo_plugin_active() ) {
            return;
        }

        $graph = array();

        $organization = array(
            '@type' => 'Organization',
            '@id'   => home_url( '/#organization' ),
            'name'  => 'MRK Digital Center',
            'url'   => home_url( '/' ),
        );

        if ( has_custom_logo() ) {
            $logo_id = get_theme_mod( 'custom_logo' );
            $logo    = wp_get_attachment_image_url( $logo_id, 'full' );
            if ( $logo ) {
                $organization['logo'] = array(
                    '@type' => 'ImageObject',
                    'url'   => $logo,
                );
            }
        }

        $graph[] = $organization;

        if ( is_front_page() || is_home() ) {
            $graph[] = array(
                '@type' => 'WebSite',
                '@id'   => home_url( '/#website' ),
                'name'  => 'MRK Digital Center',
                'url'   => home_url( '/' ),
                'publisher' => array(
                    '@id' => home_url( '/#organization' ),
                ),
            );
        }

        if ( is_singular( 'post' ) ) {
            $post_id = get_queried_object_id();
            $article = array(
                '@type'         => 'BlogPosting',
                '@id'           => get_permalink( $post_id ) . '#article',
                'headline'      => wp_strip_all_tags( get_the_title( $post_id ) ),
                'description'   => mrk_digital_seo_description( $post_id ),
                'url'           => get_permalink( $post_id ),
                'datePublished' => get_the_date( 'c', $post_id ),
                'dateModified'  => get_the_modified_date( 'c', $post_id ),
                'author'        => array(
                    '@type' => 'Person',
                    'name'  => get_the_author_meta( 'display_name', (int) get_post_field( 'post_author', $post_id ) ),
                ),
                'publisher'     => array(
                    '@id' => home_url( '/#organization' ),
                ),
            );

            if ( has_post_thumbnail( $post_id ) ) {
                $article['image'] = array( get_the_post_thumbnail_url( $post_id, 'large' ) );
            }

            $graph[] = $article;
        }

        if ( is_page() || is_singular( array( 'mrk_service', 'mrk_project' ) ) ) {
            $post_id  = get_queried_object_id();
            $items    = array();
            $position = 1;

            $items[] = array(
                '@type'    => 'ListItem',
                'position' => $position++,
                'name'     => 'Home',
                'item'     => home_url( '/' ),
            );

            $ancestors = array_reverse( get_post_ancestors( $post_id ) );
            foreach ( $ancestors as $ancestor ) {
                $items[] = array(
                    '@type'    => 'ListItem',
                    'position' => $position++,
                    'name'     => wp_strip_all_tags( get_the_title( $ancestor ) ),
                    'item'     => get_permalink( $ancestor ),
                );
            }

            $items[] = array(
                '@type'    => 'ListItem',
                'position' => $position,
                'name'     => wp_strip_all_tags( get_the_title( $post_id ) ),
                'item'     => get_permalink( $post_id ),
            );

            $graph[] = array(
                '@type'           => 'BreadcrumbList',
                '@id'             => get_permalink( $post_id ) . '#breadcrumb',
                'itemListElement' => $items,
            );
        }

        echo '<script type="application/ld+json">' . wp_json_encode(
            array(
                '@context' => 'https://schema.org',
                '@graph'   => $graph,
            ),
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        ) . '</script>' . "\n";
    }
}
add_action( 'wp_head', 'mrk_digital_general_schema', 8 );

function mrk_digital_robots( $robots ) {
    if ( mrk_digital_seo_plugin_active() ) {
        return $robots;
    }

    if ( ! is_search() && ! is_404() ) {
        $robots['max-image-preview'] = 'large';
        $robots['max-snippet']       = '-1';
        $robots['max-video-preview'] = '-1';
    }

    return $robots;
}
add_filter( 'wp_robots', 'mrk_digital_robots' );

/* Replace the earlier service/project SEO hook with this unified layer. */
remove_action( 'wp_head', 'mrk_digital_seo_head', 25 );
/* MRK SEO layer version: 1.1 */
/* MRK SEO layer version: 1.2 */
