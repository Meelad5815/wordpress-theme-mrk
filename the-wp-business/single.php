<?php
/**
 * The Template for displaying all single posts.
 *
 * @package The WP Business
 */
get_header(); ?>
<?php 
$the_wp_business_content_col_class = ( get_theme_mod( 'the_wp_business_sidebar_size', 'Sidebar 1/4' ) == 'Sidebar 1/3' ) 
    ? 'col-lg-8 col-md-8' 
    : 'col-lg-9 col-md-9';

$the_wp_business_sidebar_col_class = ( get_theme_mod( 'the_wp_business_sidebar_size', 'Sidebar 1/4' ) == 'Sidebar 1/3' ) 
    ? 'col-lg-4 col-md-4' 
    : 'col-lg-3 col-md-3';
?>
<div class="container">
    <main id="maincontent" role="main" class="middle-align">
    	<div class="content py-4">
	    	<?php
            $the_wp_business_left_right = get_theme_mod( 'the_wp_business_single_post_layout','Right Sidebar');
            if($the_wp_business_left_right == 'One Column'){ ?>
	            <div class="content-tg">
					<?php if(get_theme_mod('the_wp_business_single_post_breadcrumb',true) != ''){ ?>
			            <div class="bradcrumbs">
			                <?php the_wp_business_the_breadcrumb(); ?>
			            </div>
					<?php }?>
					<?php while ( have_posts() ) : the_post(); 
						get_template_part( 'template-parts/single-post');
		            endwhile; // end of the loop. 
		            wp_reset_postdata();?>
		       	</div>
			<?php }else if($the_wp_business_left_right == 'Left Sidebar'){ ?>
				<div class="row">
					<div id="sidebar" class="<?php echo $the_wp_business_sidebar_col_class; ?>"><?php dynamic_sidebar('sidebar-1');?></div>
					<div class="<?php echo $the_wp_business_content_col_class; ?>" class="content-tg">
						<?php if(get_theme_mod('the_wp_business_single_post_breadcrumb',true) != ''){ ?>
				            <div class="bradcrumbs">
				                <?php the_wp_business_the_breadcrumb(); ?>
				            </div>
						<?php }?>
						<?php while ( have_posts() ) : the_post(); 
							get_template_part( 'template-parts/single-post');
			            endwhile; // end of the loop. 
			            wp_reset_postdata();?>
			       	</div>
		       </div>
			<?php }else if($the_wp_business_left_right == 'Right Sidebar'){ ?>
				<div class="row">
					<div class="<?php echo $the_wp_business_content_col_class; ?>" class="content-tg">
						<?php if(get_theme_mod('the_wp_business_single_post_breadcrumb',true) != ''){ ?>
				            <div class="bradcrumbs">
				                <?php the_wp_business_the_breadcrumb(); ?>
				            </div>
						<?php }?>
						<?php while ( have_posts() ) : the_post(); 
							get_template_part( 'template-parts/single-post');
			            endwhile; // end of the loop. 
			            wp_reset_postdata();?>
			       	</div>
					<div id="sidebar" class="<?php echo $the_wp_business_sidebar_col_class; ?>"><?php dynamic_sidebar('sidebar-2');?></div>
				</div>
			<?php } ?>
	        <div class="clearfix"></div>
	    </div>
    </main>
</div>

<?php get_footer(); ?>