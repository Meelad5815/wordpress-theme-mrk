<?php
/**
 * The template part for displaying single post
 *
 * @package The WP Business
 * @subpackage the_wp_business
 * @since The WP Business 1.0
 */
?>
<?php 
  $the_wp_business_archive_year  = get_the_time('Y'); 
  $the_wp_business_archive_month = get_the_time('m'); 
  $the_wp_business_archive_day = get_the_time('d'); 
?>

<article>
	<h1><?php esc_html(the_title()); ?></h1>
	<?php if( get_theme_mod('the_wp_business_single_post_date',true)==1 || get_theme_mod('the_wp_business_single_post_author',true)==1 || get_theme_mod('the_wp_business_single_post_comment_no',true)==1 || get_theme_mod('the_wp_business_single_post_time',true)==1) { ?>
		<div class="metabox py-2">
	      	<?php if(get_theme_mod('the_wp_business_single_post_date',true)==1){ ?>
	      		<i class="<?php echo esc_attr(get_theme_mod('the_wp_business_singlepost_date_icon',"fa fa-calendar pe-2" )); ?>"></i><a href="<?php echo esc_url( get_day_link( $the_wp_business_archive_year, $the_wp_business_archive_month, $the_wp_business_archive_day)); ?>" class="pe-3"><span class="entry-date"><?php echo esc_html( get_the_date() ); ?></span><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a>
		    <?php }?>
	      	<?php if(get_theme_mod('the_wp_business_single_post_author',true)==1){ ?>
	      		<i class="<?php echo esc_attr(get_theme_mod('the_wp_business_singlepost_author_icon',"fa fa-user pe-2" )); ?>"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>" class="pe-3"><span class="entry-author"> <?php esc_html(the_author()); ?></span><span class="screen-reader-text"><?php esc_html(the_author()); ?></span></a>
		    <?php }?>
	      	<?php if(get_theme_mod('the_wp_business_single_post_comment_no',true)==1){ ?>
	      		<i class="<?php echo esc_attr(get_theme_mod('the_wp_business_single_post_comment_icon',"fa fa-comments pe-2" )); ?>"></i><span class="entry-comments"> <?php comments_number( __('0 Comments','the-wp-business'), __('0 Comments','the-wp-business'), __('% Comments','the-wp-business') ); ?></span> 
		    <?php }?>
		    <?php if( get_theme_mod( 'the_wp_business_single_post_time',true) != '') { ?>
        	<i class="<?php echo esc_attr(get_theme_mod('the_wp_business_single_post_time_icon',"fa fa-clock pe-2" )); ?>"></i><span class="entry-comments"> <?php echo esc_html( get_the_time() ); ?></span>
        <?php }?>
		</div>
	<?php }?>
	<?php if( get_theme_mod( 'the_wp_business_single_post_image',true) != '' && get_theme_mod('the_wp_business_post_featured_image','in-content') == 'in-content') { ?>
		<?php if(has_post_thumbnail()) { ?>
			<hr>
			<div class="feature-box single-feature-img">	
				<?php the_post_thumbnail(); ?>
			</div>
			<hr>					
		<?php } ?>
	<?php }?>
	<?php if( get_theme_mod( 'the_wp_business_single_post_category',true) != '') { ?>
		<div class="single-post-category mt-3">
			<span class="category"><?php esc_html_e('Categories:','the-wp-business'); ?></span>
			<?php the_category(); ?>
		</div>
	<?php }?>
	<div class="entry-content"><?php the_content(); ?></div>

	<?php
		
	if ( is_singular( 'attachment' ) ) {
		// Parent post navigation.
		the_post_navigation( array(
			'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'the-wp-business' ),
		) );
	} 	elseif ( is_singular( 'post' ) ) {
		if( get_theme_mod( 'the_wp_business_single_post_nav',true) != '') {
			// Previous/next post navigation.
			the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html(get_theme_mod('the_wp_business_single_post_next_nav_text',__('Next','the-wp-business' )) )  . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'the-wp-business' ) . '</span> ' .
					( get_theme_mod( 'the_wp_business_show_post_navigation_title', false ) ? '<span class="nav-title">%title</span>' : '' ),
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html(get_theme_mod('the_wp_business_single_post_prev_nav_text',__('Previous','the-wp-business' )) ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'the-wp-business' ) . '</span> ' .
					( get_theme_mod( 'the_wp_business_show_post_navigation_title', false ) ? '<span class="nav-title">%title</span>' : '' ),
			) );
		}
	}

	echo '<div class="clearfix"></div>'; ?>

	<?php if( get_theme_mod( 'the_wp_business_metafields_tags',true) != '') { ?>
		<div class="tags mt-3">
			<?php
	        if( $tags = get_the_tags() ) {
	          foreach( $tags as $content_tag ) {
	            $sep = ( $content_tag === end( $tags ) ) ? '' : ' ';
	            echo '<a href="' . esc_url(get_term_link( $content_tag, $content_tag->taxonomy )) . '" class="py-1 px-2 me-2 mb-2"><i class="fas fa-tag me-1"></i>' . esc_html($content_tag->name) . '</a>' . esc_html($sep);
	            }
	        } ?>
		</div> 
	<?php }?>

	<?php
	if( get_theme_mod( 'the_wp_business_single_post_comment',true) != '') {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}?>
</article>

<?php if (get_theme_mod('the_wp_business_related_posts',true) != '') {
	get_template_part( 'template-parts/related-post' );
}