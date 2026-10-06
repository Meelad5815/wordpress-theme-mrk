<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package The WP Business
 */
get_header(); ?>

<?php do_action('the_wp_business_page_header'); ?>

<main id="maincontent" role="main" class="container">
    <div class="main-wrap-box py-4">
        <?php $the_wp_business_page_layout = get_theme_mod( 'the_wp_business_single_page_layout','One Column');
        if($the_wp_business_page_layout == 'One Column'){ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="title-box">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div id="wrapper">
                    <?php if(get_theme_mod('the_wp_business_single_page_breadcrumb',true) != ''){ ?>
                        <div class="bradcrumbs">
                            <?php the_wp_business_the_breadcrumb(); ?>
                        </div>
                    <?php }?>
                    <div class="feature-box">   
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="entry-content"><?php the_content(); ?> </div>
                    <?php wp_link_pages( array(
                            'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'the-wp-business' ) . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span class="page-number">',
                            'link_after'  => '</span>',
                            'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'the-wp-business' ) . ' </span>%',
                            'separator'   => '<span class="screen-reader-text">, </span>',
                    )   ); ?>       
                    <div class="clearfix"></div>   
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                    ?>
                </div><!-- container -->
            <?php endwhile; // end of the loop. 
            wp_reset_postdata();?>
        <?php }else if($the_wp_business_page_layout == 'Left Sidebar'){ ?>
            <div class="row">
                <div  id="sidebar" class="col-lg-4 col-md-4">
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </div>
                <div class="col-lg-8 col-md-8">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="title-box">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <div id="wrapper">
                            <?php if(get_theme_mod('the_wp_business_single_page_breadcrumb',true) != ''){ ?>
                                <div class="bradcrumbs">
                                    <?php the_wp_business_the_breadcrumb(); ?>
                                </div>
                            <?php }?> 
                            <div class="feature-box">   
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="entry-content"><?php the_content(); ?> </div>
                            <?php wp_link_pages( array(
                                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'the-wp-business' ) . '</span>',
                                    'after'       => '</div>',
                                    'link_before' => '<span class="page-number">',
                                    'link_after'  => '</span>',
                                    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'the-wp-business' ) . ' </span>%',
                                    'separator'   => '<span class="screen-reader-text">, </span>',
                            )   ); ?>       
                            <div class="clearfix"></div>   
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) {
                                    comments_template();
                                }
                            ?>
                        </div><!-- container -->
                    <?php endwhile; // end of the loop. 
                    wp_reset_postdata();?>
                </div>
            </div>
        <?php }else if($the_wp_business_page_layout == 'Right Sidebar'){ ?>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="title-box">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <div id="wrapper">
                            <?php if(get_theme_mod('the_wp_business_single_page_breadcrumb',true) != ''){ ?>
                                <div class="bradcrumbs">
                                    <?php the_wp_business_the_breadcrumb(); ?>
                                </div>
                            <?php }?> 
                            <div class="feature-box">   
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="entry-content"><?php the_content(); ?> </div>
                            <?php wp_link_pages( array(
                                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'the-wp-business' ) . '</span>',
                                    'after'       => '</div>',
                                    'link_before' => '<span class="page-number">',
                                    'link_after'  => '</span>',
                                    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'the-wp-business' ) . ' </span>%',
                                    'separator'   => '<span class="screen-reader-text">, </span>',
                            )   ); ?>       
                            <div class="clearfix"></div>   
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) {
                                    comments_template();
                                }
                            ?>
                        </div><!-- container -->
                    <?php endwhile; // end of the loop. 
                    wp_reset_postdata();?>
                </div>
                <div  id="sidebar" class="col-lg-4 col-md-4">
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </div>
            </div>
        <?php }?>
    </div>
</main>

<?php do_action('the_wp_business_page_footer'); ?>

<?php get_footer(); ?>