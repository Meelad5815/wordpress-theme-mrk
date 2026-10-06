<?php
/**
 * Template Name: Page with Right Sidebar
**/

get_header(); ?>
<?php 
$the_wp_business_content_col_class = ( get_theme_mod( 'the_wp_business_sidebar_size', 'Sidebar 1/4' ) == 'Sidebar 1/3' ) 
    ? 'col-lg-8 col-md-8' 
    : 'col-lg-9 col-md-9';

$the_wp_business_sidebar_col_class = ( get_theme_mod( 'the_wp_business_sidebar_size', 'Sidebar 1/4' ) == 'Sidebar 1/3' ) 
    ? 'col-lg-4 col-md-4' 
    : 'col-lg-3 col-md-3';
?>
<?php do_action('the_wp_business_page_rightside_header'); ?>

<div class="container">
    <main id="maincontent" role="main" class="middle-align content row">
		<div class="<?php echo $the_wp_business_content_col_class; ?>" class="content-tg">
			<?php while ( have_posts() ) : the_post(); ?>                
                <h1><?php esc_html(the_title()); ?></h1>       		
                <?php the_post_thumbnail(); ?>
                <div class="entry-content"><?php the_content(); ?></div>

                <?php wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'the-wp-business' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'the-wp-business' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) ); 

                //If comments are open or we have at least one comment, load up the comment template
                	if ( comments_open() || '0' != get_comments_number() )
                    	comments_template();
                ?>
            <?php endwhile; // end of the loop. 
            wp_reset_postdata();?>            
        </div>
        <div id="sidebar" class="<?php echo $the_wp_business_sidebar_col_class; ?>">
			<?php dynamic_sidebar('sidebar-2'); ?>
		</div>
        <div class="clearfix"></div>    
    </main>
</div>

<?php do_action('the_wp_business_page_rightside_footer'); ?>

<?php get_footer(); ?>