<?php
/**
 * The template for displaying Search Results pages.
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
<main id="maincontent" role="main">
    <div class="content py-4">
        <div class="container">
            <?php
            $the_wp_business_left_right = get_theme_mod( 'the_wp_business_theme_options','Right Sidebar');
            if($the_wp_business_left_right == 'One Column'){ ?>
                <div class="content-tg">                   
                    <h1 class="search-title mt-3 mb-4"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','the-wp-business'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                    <?php if( get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'top' || get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'both') { ?>
                        <?php if( get_theme_mod( 'the_wp_business_post_navigation',true) != '') { ?>
                            <div class="navigation">
                                <?php the_wp_business_posts_pagination();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                    <?php if ( have_posts() ) :/* Start the Loop */
                
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content', get_post_format() ); 
                    
                        endwhile;
                        wp_reset_postdata();
                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'both') { ?>
                        <?php if( get_theme_mod( 'the_wp_business_post_navigation',true) != '') { ?>
                            <div class="navigation">
                                <?php the_wp_business_posts_pagination();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                </div>
            <?php }else if($the_wp_business_left_right == 'Three Columns'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                    <div class="col-lg-6 col-md-6" class="content-tg">
                        <h1 class="search-title mt-3 mb-4"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','the-wp-business'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php if( get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'top' || get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'both') { ?>
                            <?php if( get_theme_mod( 'the_wp_business_post_navigation',true) != '') { ?>
                                <div class="navigation">
                                    <?php the_wp_business_posts_pagination();?>
                                    <div class="clearfix"></div>
                                </div>
                            <?php }?>
                        <?php }?>
                        <?php if ( have_posts() ) :/* Start the Loop */
                    
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content', get_post_format() ); 
                        
                            endwhile;
                            wp_reset_postdata();
                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'both') { ?>
                            <?php if( get_theme_mod( 'the_wp_business_post_navigation',true) != '') { ?>
                                <div class="navigation">
                                    <?php the_wp_business_posts_pagination();?>
                                    <div class="clearfix"></div>
                                </div>
                            <?php }?>
                        <?php }?>
                    </div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                </div>
            <?php }else if($the_wp_business_left_right == 'Four Columns'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                    <div class="col-lg-3 col-md-3" class="content-tg">
                        <h1 class="search-title mt-3 mb-4"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','the-wp-business'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php if( get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'top' || get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'both') { ?>
                            <?php if( get_theme_mod( 'the_wp_business_post_navigation',true) != '') { ?>
                                <div class="navigation">
                                    <?php the_wp_business_posts_pagination();?>
                                    <div class="clearfix"></div>
                                </div>
                            <?php }?>
                        <?php }?>
                        <?php if ( have_posts() ) :/* Start the Loop */
                    
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content', get_post_format() ); 
                        
                            endwhile;
                            wp_reset_postdata();
                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'both') { ?>
                            <?php if( get_theme_mod( 'the_wp_business_post_navigation',true) != '') { ?>
                                <div class="navigation">
                                    <?php the_wp_business_posts_pagination();?>
                                    <div class="clearfix"></div>
                                </div>
                            <?php }?>
                        <?php }?>
                    </div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3');?></div>
                </div>
            <?php }else if($the_wp_business_left_right == 'Left Sidebar'){ ?>
                <div class="row">
                    <div id="sidebar" class="<?php echo $the_wp_business_sidebar_col_class; ?>"><?php dynamic_sidebar('sidebar-1');?></div>
                    <div class="<?php echo $the_wp_business_content_col_class; ?>" class="content-tg">
                        <h1 class="search-title mt-3 mb-4"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','the-wp-business'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php if( get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'top' || get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'both') { ?>
                            <?php if( get_theme_mod( 'the_wp_business_post_navigation',true) != '') { ?>
                                <div class="navigation">
                                    <?php the_wp_business_posts_pagination();?>
                                    <div class="clearfix"></div>
                                </div>
                            <?php }?>
                        <?php }?>
                        <?php if ( have_posts() ) :/* Start the Loop */
                    
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content', get_post_format() ); 
                        
                            endwhile;
                            wp_reset_postdata();
                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'both') { ?>
                            <?php if( get_theme_mod( 'the_wp_business_post_navigation',true) != '') { ?>
                                <div class="navigation">
                                    <?php the_wp_business_posts_pagination();?>
                                    <div class="clearfix"></div>
                                </div>
                            <?php }?>
                        <?php }?>
                    </div>
                </div>
            <?php }else if($the_wp_business_left_right == 'Right Sidebar'){ ?>
                <div class="row">
                    <div class="<?php echo $the_wp_business_content_col_class; ?>" class="content-tg">
                        <h1 class="search-title mt-3 mb-4"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','the-wp-business'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php if( get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'top' || get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'both') { ?>
                            <?php if( get_theme_mod( 'the_wp_business_post_navigation',true) != '') { ?>
                                <div class="navigation">
                                    <?php the_wp_business_posts_pagination();?>
                                    <div class="clearfix"></div>
                                </div>
                            <?php }?>
                        <?php }?>
                        <?php if ( have_posts() ) :/* Start the Loop */
                    
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content', get_post_format() ); 
                        
                            endwhile;
                            wp_reset_postdata();
                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'both') { ?>
                            <?php if( get_theme_mod( 'the_wp_business_post_navigation',true) != '') { ?>
                                <div class="navigation">
                                    <?php the_wp_business_posts_pagination();?>
                                    <div class="clearfix"></div>
                                </div>
                            <?php }?>
                        <?php }?>
                    </div>
                    <div id="sidebar" class="<?php echo $the_wp_business_sidebar_col_class; ?>"><?php dynamic_sidebar('sidebar-1');?></div>
                </div>
            <?php }else if($the_wp_business_left_right == 'Grid Layout'){ ?>
                <div class="row">
                        <?php 
                            $sidebar_layout = get_theme_mod('the_wp_business_grid_post_sidebar_layout', 'Right Sidebar');
                            if ($sidebar_layout == 'Left Sidebar') { ?>
                                <div class="<?php echo $the_wp_business_sidebar_col_class; ?>"><?php get_sidebar(); ?></div>
                        <?php } ?>
                        <div class="<?php echo ($sidebar_layout == 'One Column') ? 'col-lg-12' : $the_wp_business_content_col_class; ?>">
                        <h1 class="search-title mt-3 mb-4"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','the-wp-business'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php if( get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'top' || get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'both') { ?>
                            <?php if( get_theme_mod( 'the_wp_business_post_navigation',true) != '') { ?>
                                <div class="navigation">
                                    <?php the_wp_business_posts_pagination();?>
                                    <div class="clearfix"></div>
                                </div>
                            <?php }?>
                        <?php }?>
                        <div class="row">
                            <?php if ( have_posts() ) :/* Start the Loop */
                        
                                while ( have_posts() ) : the_post();

                                    get_template_part( 'template-parts/grid-layout' ); 
                            
                                endwhile;
                                wp_reset_postdata();
                                else :

                                    get_template_part( 'no-results' ); 

                                endif; 
                            ?>
                        </div>
                        <?php if( get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'both') { ?>
                            <?php if( get_theme_mod( 'the_wp_business_post_navigation',true) != '') { ?>
                                <div class="navigation">
                                    <?php the_wp_business_posts_pagination();?>
                                    <div class="clearfix"></div>
                                </div>
                            <?php }?>
                        <?php }?>
                    </div>
                    <?php if ($sidebar_layout == 'Right Sidebar') { ?>
                        <div class="<?php echo $the_wp_business_sidebar_col_class; ?>"><?php get_sidebar(); ?></div>
                    <?php } ?>
                    <div class="clearfix"></div>
                </div>
            <?php }else {?>
                <div class="row">
                    <div class="<?php echo $the_wp_business_content_col_class; ?>" class="content-tg">
                        <h1 class="search-title mt-3 mb-4"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','the-wp-business'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php if( get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'top' || get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'both') { ?>
                            <?php if( get_theme_mod( 'the_wp_business_post_navigation',true) != '') { ?>
                                <div class="navigation">
                                    <?php the_wp_business_posts_pagination();?>
                                    <div class="clearfix"></div>
                                </div>
                            <?php }?>
                        <?php }?>
                        <?php if ( have_posts() ) :/* Start the Loop */
                    
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content', get_post_format() ); 
                        
                            endwhile;
                            wp_reset_postdata();
                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'the_wp_business_blog_nav_position','bottom') == 'both') { ?>
                            <?php if( get_theme_mod( 'the_wp_business_post_navigation',true) != '') { ?>
                                <div class="navigation">
                                    <?php the_wp_business_posts_pagination();?>
                                    <div class="clearfix"></div>
                                </div>
                            <?php }?>
                        <?php }?>
                    </div>
                    <div id="sidebar" class="<?php echo $the_wp_business_sidebar_col_class; ?>"><?php dynamic_sidebar('sidebar-1');?></div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>