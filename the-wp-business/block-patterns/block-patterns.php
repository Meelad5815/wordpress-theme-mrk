<?php
/**
 * The WP Business : Block Patterns
 *
 * @package The WP Business 
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'the-wp-business',
		array( 'label' => __( 'The WP Business ', 'the-wp-business' ) )
	);
}
/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'the-wp-business/banner-section',
		array(
			'title'      => __( 'Banner Section', 'the-wp-business' ),
			'categories' => array( 'the-wp-business' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/block-patterns/images/banner.png\",\"id\":1081,\"dimRatio\":50,\"isDark\":false,\"align\":\"full\",\"className\":\"main-banner-section\"} -->\n<div class=\"wp-block-cover alignfull is-light main-banner-section\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-1081\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/block-patterns/images/banner.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"15%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:15%\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"70%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:70%\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"style\":{\"typography\":{\"textTransform\":\"uppercase\"}},\"textColor\":\"white\"} -->\n<h1 class=\"has-text-align-center has-white-color has-text-color\" style=\"text-transform:uppercase\">LOREM IPSUM is simply dummy text.</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"textColor\":\"white\"} -->\n<p class=\"has-text-align-center has-white-color has-text-color\">Lorem Ipsum&nbsp;is simply dummy text for the printing and typesetting industry. For years, Lorem Ipsum has been the industry's standard dummy text.&nbsp;</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"align\":\"center\",\"style\":{\"border\":{\"radius\":\"4px\"}}} -->\n<div class=\"wp-block-button aligncenter\"><a class=\"wp-block-button__link\" style=\"border-radius:4px\">LEARN MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"15%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:15%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'the-wp-business/we-think-section-section',
		array(
			'title'      => __( 'We Think Section', 'the-wp-business' ),
			'categories' => array( 'the-wp-business' ),
			'content'    => "<!-- wp:columns {\"align\":\"wide\",\"className\":\"main-service-section mx-5\"} -->\n<div class=\"wp-block-columns alignwide main-service-section mx-5\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"center\",\"id\":1096,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image aligncenter size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/block-patterns/images/about-us.png\" alt=\"\" class=\"wp-image-1096\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"service-section-col\"} -->\n<div class=\"wp-block-column service-section-col\"><!-- wp:heading -->\n<h2>Lorem Ipsum</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem Ipsum&nbsp;is simply dummy text for the printing and typesetting industry. The Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing .</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"border\":{\"radius\":\"4px\"}}} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\" style=\"border-radius:4px\">READ MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
		)
	);
}