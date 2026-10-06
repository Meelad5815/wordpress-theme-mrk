
<?php 
  $the_wp_business_archive_year  = get_the_time('Y'); 
  $the_wp_business_archive_month = get_the_time('m'); 
  $the_wp_business_archive_day   = get_the_time('d'); 
?>
<?php $the_wp_business_related_posts = the_wp_business_related_posts_function(); ?>

<?php if ( $the_wp_business_related_posts->have_posts() ): ?>

	<div class="related-posts clearfix py-3 mt-3">
		<?php if ( get_theme_mod('the_wp_business_related_posts_title','You May Also Like') != '' ) {?>
			<h2 class="related-posts-main-title m-0 pb-3"><?php echo esc_html( get_theme_mod('the_wp_business_related_posts_title',__('You May Also Like','the-wp-business')) ); ?></h2>
		<?php }?>
		<div class="row">
			<?php while ( $the_wp_business_related_posts->have_posts() ) : $the_wp_business_related_posts->the_post(); ?>

				<div class="col-lg-4 col-md-6">
					<article class="postbox smallpostimage p-3 mb-4">
						<?php if(has_post_thumbnail() && get_theme_mod('the_wp_business_show_related_posts_image',true) == true) { ?>
						    <div class="hovereffect mb-3">
						      <?php the_post_thumbnail(); ?>
						    </div>
						<?php }?>
					    <div class="clearfix"></div>
					    <div class="wow bounceInUp">
					        <h3 class="pt-0 m-0"><a href="<?php echo esc_url( get_permalink() );?>" class="p-0"><?php esc_html(the_title()); ?></a></h3> 
					        <?php if( get_theme_mod( 'the_wp_business_related_post_date',true) != '' || get_theme_mod( 'the_wp_business_related_post_author',true) != '' || get_theme_mod( 'the_wp_business_related_post_comment_no',true) != '' || get_theme_mod( 'the_wp_business_related_post_time',true) != '') { ?>
								<div class="post-info p-2 mb-2">
								<?php if( get_theme_mod( 'the_wp_business_related_post_date',true) != '') { ?>
									<i class="<?php echo esc_attr(get_theme_mod('the_wp_business_related_post_date_icon',"fa fa-calendar pe-2" )); ?>"></i><a href="<?php echo esc_url( get_day_link( $the_wp_business_archive_year, $the_wp_business_archive_month, $the_wp_business_archive_day)); ?>"><span class="entry-date pe-3"><?php echo esc_html( get_the_date() ); ?></span><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a>
								<?php }?>
								<?php if( get_theme_mod( 'the_wp_business_related_post_author',true) != '') { ?>
									<i class="<?php echo esc_attr(get_theme_mod('the_wp_business_related_post_author_icon',"fa fa-user pe-2" )); ?>"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><span class="entry-author pe-3"> <?php the_author(); ?></span><span class="screen-reader-text"><?php the_author(); ?></span></a>
								<?php }?>
								<?php if( get_theme_mod( 'the_wp_business_related_post_comment_no',true) != '') { ?>
									<i class="<?php echo esc_attr(get_theme_mod('the_wp_business_related_post_comment_icon',"fa fa-comments pe-2" )); ?>"></i><span class="entry-comments pe-3"> <?php comments_number( __('0 Comments','the-wp-business'), __('0 Comments','the-wp-business'), __('% Comments','the-wp-business') ); ?></span> 
								<?php }?>
								<?php if( get_theme_mod( 'the_wp_business_related_post_time',true) != '') { ?>
									<span class="entry-comments me-2"><i class="<?php echo esc_attr(get_theme_mod('the_wp_business_related_post_time_icon',"fa fa-clock pe-2" )); ?>"></i> <?php echo esc_html( get_the_time() ); ?></span>
								<?php }?>
								</div>
							<?php }?>
							<?php if(get_the_excerpt()) { ?>
					            <div class="entry-content"><p><?php $the_wp_business_excerpt = get_the_excerpt(); echo esc_html( the_wp_business_string_limit_words( $the_wp_business_excerpt, esc_attr(get_theme_mod('the_wp_business_related_post_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('the_wp_business_related_post_excerpt_suffix','...') ); ?></p></div>
					        <?php }?>
						    <?php if ( get_theme_mod('the_wp_business_related_button_text','Read Full') != '' ) {?>
						        <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right mt-3"><?php echo esc_html( get_theme_mod('the_wp_business_related_button_text',__('Read Full', 'the-wp-business')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('the_wp_business_related_button_text',__('Read Full', 'the-wp-business')) ); ?></span></a>
						    <?php }?>
					    </div>
					    <div class="clearfix"></div>
					</article>
				</div>

			<?php endwhile; ?>
		</div>

	</div><!--/.post-related-->
<?php endif; ?>

<?php wp_reset_postdata(); ?>