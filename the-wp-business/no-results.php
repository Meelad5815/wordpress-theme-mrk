<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.WordPress.org/Template_Hierarchy
 *
 * @package The WP Business
 */
?>

<header>
	<h2 class="entry-title p-0 mb-3"><?php echo esc_html( get_theme_mod('the_wp_business_search_result_title',__('Nothing Found', 'the-wp-business' )) ); ?></h2>
</header>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	
	<p><?php printf(esc_html__( 'Ready to publish your first post? Get started here.','the-wp-business'), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
	<?php elseif ( is_search() ) : ?>
	<p><?php echo esc_html( get_theme_mod('the_wp_business_search_result_text',__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'the-wp-business' )) ); ?></p><br />
		<?php get_search_form(); ?>
	<?php else : ?>
	<p><?php esc_html_e( 'Dont worry &hellip; it happens to the best of us.', 'the-wp-business' ); ?></p><br />
	<div class="read-moresec mt-3">
		<a href="<?php echo esc_url( home_url() ); ?>" class="button hvr-sweep-to-right py-2 px-4"><?php esc_html_e( 'Back to Home Page', 'the-wp-business' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Back to Home Page', 'the-wp-business' ); ?></span></a>
	</div>
<?php endif; ?>
