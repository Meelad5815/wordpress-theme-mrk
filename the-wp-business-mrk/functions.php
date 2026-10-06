<?php
if(!defined('ABSPATH'))exit;
function mrk_setup(){add_theme_support('title-tag');add_theme_support('post-thumbnails');add_theme_support('custom-logo',array('height'=>80,'width'=>240,'flex-height'=>true,'flex-width'=>true));add_theme_support('html5',array('search-form','comment-form','comment-list','gallery','caption','style','script'));register_nav_menus(array('primary'=>'Primary Menu'));}
add_action('after_setup_theme','mrk_setup');
function mrk_assets(){wp_enqueue_style('mrk-style',get_stylesheet_uri(),array(),wp_get_theme()->get('Version'));if(is_rtl())wp_enqueue_style('mrk-rtl',get_template_directory_uri().'/rtl.css',array('mrk-style'),wp_get_theme()->get('Version'));}
add_action('wp_enqueue_scripts','mrk_assets');
function mrk_meta(){if(is_front_page())echo '<meta name="description" content="MRK Digital & Online Services Center — web development, SEO, digital services, PLC automation, Arduino and engineering solutions.">';}
add_action('wp_head','mrk_meta',1);
