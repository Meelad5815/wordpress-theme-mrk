<?php
/**
 * The template for displaying image attachments.
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
<main id="maincontent" role="main" class="content-area">
    <div class="content py-4">
        <div class="middle-align content_sidebar">
            <div class="container">
                <?php
                $the_wp_business_left_right = get_theme_mod( 'the_wp_business_theme_options','Right Sidebar');
                if($the_wp_business_left_right == 'One Column'){ ?>
                    <div class="site-main" id="sitemain">
            			<?php while ( have_posts() ) : the_post(); ?>    
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header role="banner" class="entry-header">
                                    <?php esc_html(the_title( '<h1 class="entry-title p-0 mb-3">', '</h1>' )); ?>
                
                                    <div class="entry-meta">
                                        <?php
                                            $metadata = wp_get_attachment_metadata();
                                            printf('Published <i class="fa fa-calendar" aria-hidden="true"></i><time class="entry-date" datetime="%1$s">%2$s</time> at <a href="%3$s">%4$s &times; %5$s</a> in <a href="%6$s" rel="gallery">%7$s</a>',
                                                esc_attr( get_the_date( 'c' ) ),
                                                esc_html( get_the_date() ),
                                                esc_url( wp_get_attachment_url() ),
                                                absint($metadata['width']),
                                                absint($metadata['height']),
                                                esc_url( get_permalink( $post->post_parent ) ),
                                                esc_html(get_the_title( $post->post_parent ))
                                            );
                
                                            edit_post_link( __( 'Edit', 'the-wp-business' ), '<span class="edit-link">', '</span>' );
                                        ?>
                                    </div>    
                                    <nav role="navigation" id="image-navigation" class="image-navigation">
                                        <div class="nav-previous"><?php previous_image_link( 'thumbnail', __( '<span class="meta-nav">&larr;</span> Previous', 'the-wp-business' ) ); ?></div>
                                        <div class="nav-next"><?php next_image_link( 'thumbnail', __( 'Next <span class="meta-nav">&rarr;</span>', 'the-wp-business' ) ); ?></div>
                                    </nav>
                                </header>    
                                <div class="entry-content">
                                    <div class="entry-attachment">
                                        <div class="attachment">
                                            <?php the_wp_business_the_attached_image(); ?>
                                        </div>
                
                                        <?php if ( has_excerpt() ) : ?>
                                            <div class="entry-caption">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>    
                                    <?php
                                        the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'the-wp-business' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>    
                                <?php edit_post_link( __( 'Edit', 'the-wp-business' ), '<footer role="contentinfo" class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                            </article>    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>    
                        <?php endwhile; // end of the loop. 
                        wp_reset_postdata();?>
                    </div>
                <?php }else if($the_wp_business_left_right == 'Three Columns'){ ?>
                    <div class="row">
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                        <div class="col-lg-6 col-md-6 site-main" id="sitemain">
                            <?php while ( have_posts() ) : the_post(); ?>    
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <header role="banner" class="entry-header">
                                        <?php esc_html(the_title( '<h1 class="entry-title p-0 mb-3">', '</h1>' )); ?>
                    
                                        <div class="entry-meta">
                                            <?php
                                                $metadata = wp_get_attachment_metadata();
                                                printf('Published <i class="fa fa-calendar" aria-hidden="true"></i><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s">%4$s &times; %5$s</a> in <a href="%6$s" rel="gallery">%7$s</a>',
                                                    esc_attr( get_the_date( 'c' ) ),
                                                    esc_html( get_the_date() ),
                                                    esc_url( wp_get_attachment_url() ),
                                                    absint($metadata['width']),
                                                    absint($metadata['height']),
                                                    esc_url( get_permalink( $post->post_parent ) ),
                                                    esc_html(get_the_title( $post->post_parent ))
                                                );
                    
                                                edit_post_link( __( 'Edit', 'the-wp-business' ), '<span class="edit-link">', '</span>' );
                                            ?>
                                        </div>    
                                        <nav role="navigation" id="image-navigation" class="image-navigation">
                                            <div class="nav-previous"><?php previous_image_link( 'thumbnail', __( '<span class="meta-nav">&larr;</span> Previous', 'the-wp-business' ) ); ?></div>
                                            <div class="nav-next"><?php next_image_link( 'thumbnail', __( 'Next <span class="meta-nav">&rarr;</span>', 'the-wp-business' ) ); ?></div>
                                        </nav>
                                    </header>    
                                    <div class="entry-content">
                                        <div class="entry-attachment">
                                            <div class="attachment">
                                                <?php the_wp_business_the_attached_image(); ?>
                                            </div>
                    
                                            <?php if ( has_excerpt() ) : ?>
                                                <div class="entry-caption">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>    
                                        <?php
                                            the_content();
                                            wp_link_pages( array(
                                                'before' => '<div class="page-links">' . __( 'Pages:', 'the-wp-business' ),
                                                'after'  => '</div>',
                                            ) );
                                        ?>
                                    </div>    
                                    <?php edit_post_link( __( 'Edit', 'the-wp-business' ), '<footer role="contentinfo" class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                                </article>    
                                <?php
                                    // If comments are open or we have at least one comment, load up the comment template
                                    if ( comments_open() || '0' != get_comments_number() )
                                        comments_template();
                                ?>    
                            <?php endwhile; // end of the loop. 
                            wp_reset_postdata();?>
                        </div>
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                    </div>
                <?php }else if($the_wp_business_left_right == 'Four Columns'){ ?>
                    <div class="row">
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                        <div class="col-lg-3 col-md-3 site-main" id="sitemain">
                            <?php while ( have_posts() ) : the_post(); ?>    
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <header role="banner" class="entry-header">
                                        <?php esc_html(the_title( '<h1 class="entry-title p-0 mb-3">', '</h1>' )) ?>
                    
                                        <div class="entry-meta">
                                            <?php
                                                $metadata = wp_get_attachment_metadata();
                                                printf('Published <i class="fa fa-calendar" aria-hidden="true"></i><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s">%4$s &times; %5$s</a> in <a href="%6$s" rel="gallery">%7$s</a>',
                                                    esc_attr( get_the_date( 'c' ) ),
                                                    esc_html( get_the_date() ),
                                                    esc_url( wp_get_attachment_url() ),
                                                    absint($metadata['width']),
                                                    absint($metadata['height']),
                                                    esc_url( get_permalink( $post->post_parent ) ),
                                                    esc_html(get_the_title( $post->post_parent ))
                                                );
                    
                                                edit_post_link( __( 'Edit', 'the-wp-business' ), '<span class="edit-link">', '</span>' );
                                            ?>
                                        </div>    
                                        <nav role="navigation" id="image-navigation" class="image-navigation">
                                            <div class="nav-previous"><?php previous_image_link( 'thumbnail', __( '<span class="meta-nav">&larr;</span> Previous', 'the-wp-business' ) ); ?></div>
                                            <div class="nav-next"><?php next_image_link( 'thumbnail', __( 'Next <span class="meta-nav">&rarr;</span>', 'the-wp-business' ) ); ?></div>
                                        </nav>
                                    </header>    
                                    <div class="entry-content">
                                        <div class="entry-attachment">
                                            <div class="attachment">
                                                <?php the_wp_business_the_attached_image(); ?>
                                            </div>
                    
                                            <?php if ( has_excerpt() ) : ?>
                                                <div class="entry-caption">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>    
                                        <?php
                                            the_content();
                                            wp_link_pages( array(
                                                'before' => '<div class="page-links">' . __( 'Pages:', 'the-wp-business' ),
                                                'after'  => '</div>',
                                            ) );
                                        ?>
                                    </div>    
                                    <?php edit_post_link( __( 'Edit', 'the-wp-business' ), '<footer role="contentinfo" class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                                </article>    
                                <?php
                                    // If comments are open or we have at least one comment, load up the comment template
                                    if ( comments_open() || '0' != get_comments_number() )
                                        comments_template();
                                ?>    
                            <?php endwhile; // end of the loop. 
                            wp_reset_postdata();?>
                        </div>
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3');?></div>
                    </div>
                <?php }else if($the_wp_business_left_right == 'Left Sidebar'){ ?>
                    <div class="row">
                        <div id="sidebar" class="<?php echo $the_wp_business_sidebar_col_class; ?>"><?php dynamic_sidebar('sidebar-1');?></div>
                        <div class="<?php echo $the_wp_business_content_col_class; ?> site-main" id="sitemain">
                            <?php while ( have_posts() ) : the_post(); ?>    
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <header role="banner" class="entry-header">
                                        <?php esc_html(the_title( '<h1 class="entry-title p-0 mb-3">', '</h1>' )); ?>
                    
                                        <div class="entry-meta">
                                            <?php
                                                $metadata = wp_get_attachment_metadata();
                                                printf('Published <i class="fa fa-calendar" aria-hidden="true"></i><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s">%4$s &times; %5$s</a> in <a href="%6$s" rel="gallery">%7$s</a>',
                                                    esc_attr( get_the_date( 'c' ) ),
                                                    esc_html( get_the_date() ),
                                                    esc_url( wp_get_attachment_url() ),
                                                    absint($metadata['width']),
                                                    absint($metadata['height']),
                                                    esc_url( get_permalink( $post->post_parent ) ),
                                                    esc_html(get_the_title( $post->post_parent ))
                                                );
                    
                                                edit_post_link( __( 'Edit', 'the-wp-business' ), '<span class="edit-link">', '</span>' );
                                            ?>
                                        </div>    
                                        <nav role="navigation" id="image-navigation" class="image-navigation">
                                            <div class="nav-previous"><?php previous_image_link( 'thumbnail', __( '<span class="meta-nav">&larr;</span> Previous', 'the-wp-business' ) ); ?></div>
                                            <div class="nav-next"><?php next_image_link( 'thumbnail', __( 'Next <span class="meta-nav">&rarr;</span>', 'the-wp-business' ) ); ?></div>
                                        </nav>
                                    </header>    
                                    <div class="entry-content">
                                        <div class="entry-attachment">
                                            <div class="attachment">
                                                <?php the_wp_business_the_attached_image(); ?>
                                            </div>
                    
                                            <?php if ( has_excerpt() ) : ?>
                                                <div class="entry-caption">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>    
                                        <?php
                                            the_content();
                                            wp_link_pages( array(
                                                'before' => '<div class="page-links">' . __( 'Pages:', 'the-wp-business' ),
                                                'after'  => '</div>',
                                            ) );
                                        ?>
                                    </div>    
                                    <?php edit_post_link( __( 'Edit', 'the-wp-business' ), '<footer role="contentinfo" class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                                </article>    
                                <?php
                                    // If comments are open or we have at least one comment, load up the comment template
                                    if ( comments_open() || '0' != get_comments_number() )
                                        comments_template();
                                ?>    
                            <?php endwhile; // end of the loop. 
                            wp_reset_postdata();?>
                        </div>
                    </div>
                <?php }else if($the_wp_business_left_right == 'Right Sidebar'){ ?>
                    <div class="row">
                        <div class="<?php echo $the_wp_business_content_col_class; ?> site-main" id="sitemain">
                            <?php while ( have_posts() ) : the_post(); ?>    
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <header role="banner" class="entry-header">
                                        <?php esc_html(the_title( '<h1 class="entry-title p-0 mb-3">', '</h1>' )); ?>
                    
                                        <div class="entry-meta">
                                            <?php
                                                $metadata = wp_get_attachment_metadata();
                                                printf('Published <i class="fa fa-calendar" aria-hidden="true"></i><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s">%4$s &times; %5$s</a> in <a href="%6$s" rel="gallery">%7$s</a>',
                                                    esc_attr( get_the_date( 'c' ) ),
                                                    esc_html( get_the_date() ),
                                                    esc_url( wp_get_attachment_url() ),
                                                    absint($metadata['width']),
                                                    absint($metadata['height']),
                                                    esc_url( get_permalink( $post->post_parent ) ),
                                                    esc_html(get_the_title( $post->post_parent ))
                                                );
                    
                                                edit_post_link( __( 'Edit', 'the-wp-business' ), '<span class="edit-link">', '</span>' );
                                            ?>
                                        </div>    
                                        <nav role="navigation" id="image-navigation" class="image-navigation">
                                            <div class="nav-previous"><?php previous_image_link( 'thumbnail', __( '<span class="meta-nav">&larr;</span> Previous', 'the-wp-business' ) ); ?></div>
                                            <div class="nav-next"><?php next_image_link( 'thumbnail', __( 'Next <span class="meta-nav">&rarr;</span>', 'the-wp-business' ) ); ?></div>
                                        </nav>
                                    </header>    
                                    <div class="entry-content">
                                        <div class="entry-attachment">
                                            <div class="attachment">
                                                <?php the_wp_business_the_attached_image(); ?>
                                            </div>
                    
                                            <?php if ( has_excerpt() ) : ?>
                                                <div class="entry-caption">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>    
                                        <?php
                                            the_content();
                                            wp_link_pages( array(
                                                'before' => '<div class="page-links">' . __( 'Pages:', 'the-wp-business' ),
                                                'after'  => '</div>',
                                            ) );
                                        ?>
                                    </div>    
                                    <?php edit_post_link( __( 'Edit', 'the-wp-business' ), '<footer role="contentinfo" class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                                </article>    
                                <?php
                                    // If comments are open or we have at least one comment, load up the comment template
                                    if ( comments_open() || '0' != get_comments_number() )
                                        comments_template();
                                ?>    
                            <?php endwhile; // end of the loop. 
                            wp_reset_postdata();?>
                        </div>
                        <div id="sidebar" class="<?php echo $the_wp_business_sidebar_col_class; ?>"><?php dynamic_sidebar('sidebar-1');?></div>
                    </div>
                <?php }else if($the_wp_business_left_right == 'Grid Layout'){ ?>
                    <div class="row">
                        <div id="sidebar" class="<?php echo $the_wp_business_sidebar_col_class; ?>"><?php dynamic_sidebar('sidebar-1');?></div>
                        <div class="<?php echo $the_wp_business_content_col_class; ?> site-main" id="sitemain">
                            <?php while ( have_posts() ) : the_post(); ?>    
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <header role="banner" class="entry-header">
                                        <?php esc_html(the_title( '<h1 class="entry-title">', '</h1>' )); ?>
                                        <?php esc_html(the_title( '<h1 class="entry-title p-0 mb-3">', '</h1>' )); ?>
                                        <div class="entry-meta">
                                            <?php
                                                $metadata = wp_get_attachment_metadata();
                                                printf('Published <i class="fa fa-calendar" aria-hidden="true"></i><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s">%4$s &times; %5$s</a> in <a href="%6$s" rel="gallery">%7$s</a>',
                                                    esc_attr( get_the_date( 'c' ) ),
                                                    esc_html( get_the_date() ),
                                                    esc_url( wp_get_attachment_url() ),
                                                    absint($metadata['width']),
                                                    absint($metadata['height']),
                                                    esc_url( get_permalink( $post->post_parent ) ),
                                                    esc_html(get_the_title( $post->post_parent ))
                                                );
                    
                                                edit_post_link( __( 'Edit', 'the-wp-business' ), '<span class="edit-link">', '</span>' );
                                            ?>
                                        </div>    
                                        <nav role="navigation" id="image-navigation" class="image-navigation">
                                            <div class="nav-previous"><?php previous_image_link( 'thumbnail', __( '<span class="meta-nav">&larr;</span> Previous', 'the-wp-business' ) ); ?></div>
                                            <div class="nav-next"><?php next_image_link( 'thumbnail', __( 'Next <span class="meta-nav">&rarr;</span>', 'the-wp-business' ) ); ?></div>
                                        </nav>
                                    </header>    
                                    <div class="entry-content">
                                        <div class="entry-attachment">
                                            <div class="attachment">
                                                <?php the_wp_business_the_attached_image(); ?>
                                            </div>
                    
                                            <?php if ( has_excerpt() ) : ?>
                                                <div class="entry-caption">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>    
                                        <?php
                                            the_content();
                                            wp_link_pages( array(
                                                'before' => '<div class="page-links">' . __( 'Pages:', 'the-wp-business' ),
                                                'after'  => '</div>',
                                            ) );
                                        ?>
                                    </div>    
                                    <?php edit_post_link( __( 'Edit', 'the-wp-business' ), '<footer role="contentinfo" class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                                </article>    
                                <?php
                                    // If comments are open or we have at least one comment, load up the comment template
                                    if ( comments_open() || '0' != get_comments_number() )
                                        comments_template();
                                ?>    
                            <?php endwhile; // end of the loop. 
                            wp_reset_postdata();?>
                        </div>
                    </div>
                <?php }else {?>
                    <div class="row">
                    <?php 
                        $sidebar_layout = get_theme_mod('the_wp_business_grid_post_sidebar_layout', 'Right Sidebar'); 
                        if ($sidebar_layout == 'Left Sidebar') { ?>
                            <div id="sidebar" class="<?php echo $the_wp_business_sidebar_col_class; ?>"><?php dynamic_sidebar('sidebar-1'); ?></div>
                    <?php } ?>
                    <div class="<?php echo ($sidebar_layout == 'One Column') ? 'col-lg-12' : $the_wp_business_content_col_class; ?>" id="sitemain">
                            <?php while ( have_posts() ) : the_post(); ?>    
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <header role="banner" class="entry-header">
                                        <?php esc_html(the_title( '<h1 class="entry-title p-0 mb-3">', '</h1>' )); ?>
                    
                                        <div class="entry-meta">
                                            <?php
                                                $metadata = wp_get_attachment_metadata();
                                                printf('Published <i class="fa fa-calendar" aria-hidden="true"></i><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s">%4$s &times; %5$s</a> in <a href="%6$s" rel="gallery">%7$s</a>',
                                                    esc_attr( get_the_date( 'c' ) ),
                                                    esc_html( get_the_date() ),
                                                    esc_url( wp_get_attachment_url() ),
                                                    absint($metadata['width']),
                                                    absint($metadata['height']),
                                                    esc_url( get_permalink( $post->post_parent ) ),
                                                    esc_html(get_the_title( $post->post_parent ))
                                                );
                    
                                                edit_post_link( __( 'Edit', 'the-wp-business' ), '<span class="edit-link">', '</span>' );
                                            ?>
                                        </div>    
                                        <nav role="navigation" id="image-navigation" class="image-navigation">
                                            <div class="nav-previous"><?php previous_image_link( 'thumbnail', __( '<span class="meta-nav">&larr;</span> Previous', 'the-wp-business' ) ); ?></div>
                                            <div class="nav-next"><?php next_image_link( 'thumbnail', __( 'Next <span class="meta-nav">&rarr;</span>', 'the-wp-business' ) ); ?></div>
                                        </nav>
                                    </header>    
                                    <div class="entry-content">
                                        <div class="entry-attachment">
                                            <div class="attachment">
                                                <?php the_wp_business_the_attached_image(); ?>
                                            </div>
                    
                                            <?php if ( has_excerpt() ) : ?>
                                                <div class="entry-caption">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>    
                                        <?php
                                            the_content();
                                            wp_link_pages( array(
                                                'before' => '<div class="page-links">' . __( 'Pages:', 'the-wp-business' ),
                                                'after'  => '</div>',
                                            ) );
                                        ?>
                                    </div>    
                                    <?php edit_post_link( __( 'Edit', 'the-wp-business' ), '<footer role="contentinfo" class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                                </article>    
                                <?php
                                    // If comments are open or we have at least one comment, load up the comment template
                                    if ( comments_open() || '0' != get_comments_number() )
                                        comments_template();
                                ?>    
                            <?php endwhile; // end of the loop. 
                            wp_reset_postdata();?>
                        </div>
                        <?php if ($sidebar_layout == 'Right Sidebar') { ?>
                            <div id="sidebar" class="<?php echo $the_wp_business_sidebar_col_class; ?>"><?php dynamic_sidebar('sidebar-1'); ?></div>
                        <?php } ?>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>