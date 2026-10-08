<?php
/**
 * MRK Business Features
 * Dependency-free service/project conversion utilities.
 * @package The WP Business
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function mrk_business_post_types() {
	return array( 'mrk_service', 'mrk_project' );
}

function mrk_business_whatsapp_url( $message = '' ) {
	$number = preg_replace( '/[^0-9]/', '', (string) get_theme_mod( 'mrk_whatsapp_number', '' ) );
	if ( ! $number ) { return ''; }
	return 'https://wa.me/' . $number . ( $message ? '?text=' . rawurlencode( $message ) : '' );
}

/* Conversion CTA: always provide a contact path; use WhatsApp when configured. */
function mrk_business_enquiry_cta() {
	if ( ! is_singular( mrk_business_post_types() ) ) { return; }

	$title      = wp_strip_all_tags( get_the_title() );
	$whatsapp   = mrk_business_whatsapp_url( sprintf( 'Assalam o Alaikum, I need information about: %s', $title ) );
	$contact    = home_url( '/contact/' );
	$post_type  = get_post_type();
	$label      = 'mrk_service' === $post_type ? __( 'Service enquiry', 'the-wp-business' ) : __( 'Project discussion', 'the-wp-business' );

	echo '<section class="mrk-enquiry-cta" aria-labelledby="mrk-enquiry-title">';
	echo '<div class="mrk-enquiry-copy"><span class="mrk-eyebrow">MRK DIGITAL</span><span class="mrk-enquiry-label">' . esc_html( $label ) . '</span><h2 id="mrk-enquiry-title">' . esc_html__( 'Need this service?', 'the-wp-business' ) . '</h2><p>' . esc_html__( 'Tell us what you need and get a clear next step.', 'the-wp-business' ) . '</p></div>';
	echo '<div class="mrk-enquiry-actions">';
	if ( $whatsapp ) {
		echo '<a class="mrk-btn mrk-btn-gold" target="_blank" rel="noopener noreferrer" href="' . esc_url( $whatsapp ) . '">' . esc_html__( 'Discuss on WhatsApp', 'the-wp-business' ) . '</a>';
	}
	echo '<a class="mrk-btn mrk-btn-outline" href="' . esc_url( $contact ) . '">' . esc_html__( 'Send enquiry', 'the-wp-business' ) . '</a>';
	echo '</div>';
	echo '</section>';
}
add_action( 'wp_footer', 'mrk_business_enquiry_cta', 35 );

function mrk_business_related_by_taxonomy() {
	if ( ! is_singular( mrk_business_post_types() ) ) { return; }
	$id    = get_queried_object_id();
	$type  = get_post_type( $id );
	$tax   = $type === 'mrk_service' ? 'mrk_service_area' : 'mrk_project_type';
	$terms = wp_get_post_terms( $id, $tax, array( 'fields' => 'ids' ) );
	$args  = array(
		'post_type'              => $type,
		'post_status'            => 'publish',
		'posts_per_page'         => 4,
		'post__not_in'           => array( $id ),
		'no_found_rows'          => true,
		'ignore_sticky_posts'    => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => true,
	);
	if ( ! is_wp_error( $terms ) && $terms ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => $tax,
				'field'    => 'term_id',
				'terms'    => $terms,
			),
		);
	}
	$q = new WP_Query( $args );
	if ( ! $q->have_posts() ) { return; }
	echo '<section class="mrk-related-business" aria-labelledby="mrk-related-business-title"><h2 id="mrk-related-business-title">' . esc_html__( 'More from MRK Digital', 'the-wp-business' ) . '</h2><div class="mrk-related-business-grid">';
	while ( $q->have_posts() ) {
		$q->the_post();
		echo '<article><h3><a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></h3><p>' . esc_html( wp_trim_words( get_the_excerpt(), 22 ) ) . '</p><a class="mrk-card-link" href="' . esc_url( get_permalink() ) . '">' . esc_html__( 'View details', 'the-wp-business' ) . ' <span aria-hidden="true">→</span></a></article>';
	}
	echo '</div></section>';
	wp_reset_postdata();
}
add_action( 'wp_footer', 'mrk_business_related_by_taxonomy', 34 );

function mrk_business_features_css() {
	$css = '.mrk-enquiry-cta{max-width:1200px;margin:35px auto;padding:30px;display:flex;align-items:center;justify-content:space-between;gap:25px;border-radius:18px;background:linear-gradient(135deg,#07152b,#12385f);color:#fff;box-shadow:0 14px 40px rgba(7,21,43,.12)}.mrk-enquiry-copy{min-width:0}.mrk-enquiry-cta h2{margin:5px 0;color:#fff}.mrk-enquiry-cta p{margin:0;color:rgba(255,255,255,.82)}.mrk-enquiry-label{display:block;font-size:.82rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:#e8c76a}.mrk-enquiry-actions{display:flex;flex-wrap:wrap;gap:10px;flex-shrink:0}.mrk-enquiry-actions a{white-space:nowrap}.mrk-enquiry-cta .mrk-btn-outline{border:1px solid rgba(255,255,255,.65);color:#fff;background:transparent}.mrk-enquiry-cta .mrk-btn-outline:hover,.mrk-enquiry-cta .mrk-btn-outline:focus{background:#fff;color:#07152b}.mrk-related-business{max-width:1200px;margin:40px auto;padding:0 16px}.mrk-related-business h2{color:#07152b}.mrk-related-business-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:16px}.mrk-related-business-grid article{padding:20px;background:#fff;border:1px solid #e8edf3;border-radius:14px;box-shadow:0 7px 22px rgba(16,42,74,.05)}.mrk-related-business-grid h3{margin:0 0 8px}.mrk-related-business-grid h3 a{color:#07152b}.mrk-related-business-grid p{color:#607086}.mrk-related-business-grid .mrk-card-link{display:inline-flex;margin-top:8px}@media(max-width:900px){.mrk-related-business-grid{grid-template-columns:repeat(2,1fr)}}@media(max-width:600px){.mrk-enquiry-cta{margin:25px 16px;padding:22px;flex-direction:column;align-items:flex-start}.mrk-enquiry-actions{width:100%}.mrk-enquiry-actions a{flex:1 1 100%;text-align:center}.mrk-related-business-grid{grid-template-columns:1fr}}';
	wp_add_inline_style( 'the-wp-business-basic-style', $css );
}
add_action( 'wp_enqueue_scripts', 'mrk_business_features_css', 45 );
