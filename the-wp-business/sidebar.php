<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package The WP Business
 */
?>

<div id="sidebar">
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
        <aside role="complementary" aria-label="sidebar1" id="archives" class="widget">
            <h3 class="widget-title"><?php esc_html_e( 'Archives', 'the-wp-business' ); ?></h3>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
        <aside role="complementary" aria-label="sidebar2" id="meta" class="widget">
            <h3 class="widget-title"><?php esc_html_e( 'Meta', 'the-wp-business' ); ?></h3>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
        <aside role="complementary" aria-label="sidebar3" id="categories" class="widget" >
            <h3 class="widget-title"><?php esc_html_e( 'Categories', 'the-wp-business' ); ?></h3>          
            <ul>
                <?php wp_list_categories( array(
                    'title_li' => '',
                ) ); ?>
            </ul>
        </aside>
    <?php endif; // end sidebar widget area ?>  
</div>
