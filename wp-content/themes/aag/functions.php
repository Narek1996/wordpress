<?php

function aag_setup(){
    load_theme_textdomain('aag');


/*header um avelacnuma title*/
    add_theme_support('title-tag');

/*admikum talisa hnaravorutyun logo dnelu */
    add_theme_support('custom-logo',array(
        'height' => 150,
        'width' => 300,
        'flex-height' =>true ) );


    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(200,300);

    add_theme_support('html5',array(
        'search_form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'));
    add_theme_support('post-formats',array(
        'aside',
        'image',
        'video',
        'gallery'
    ));
    /*adminkum amelacnuma menu stexcelu hnaravorutyun */
    /*add_theme_support('menus');*/

    /*sraquma patrasti menu bolor ejeric*/
    /*aag te vortex lini menun loaction nshvuma menun sarqelu jamanak*/
    //register_nav_menus(array('Header menu','Footer menu'));
     register_nav_menu('primary','aag menu');
}
add_action('after_setup_theme','aag_setup');
/*headum logoyi tex@ grvuma <?php the_custom_logo() ?>*/

function aag_scripts(){
    wp_enqueue_style('style-css',get_stylesheet_uri());
    wp_enqueue_style('animate',get_template_directory_uri().'/css/animate.css');
    wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('magnific-popup',get_template_directory_uri().'/css/magnific-popup.css');
    wp_enqueue_style('font-awesome',get_template_directory_uri().'/css/font-awesome.min.css');
    wp_enqueue_style('agg-style',get_template_directory_uri().'/css/aag-style.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.min.js');
    wp_enqueue_script('jquery.parallax',get_template_directory_uri().'/js/jquery.parallax.js');
    wp_enqueue_script('smoothscroll',get_template_directory_uri().'/js/smoothscroll.js');
    wp_enqueue_script('jquery.magnific-popup',get_template_directory_uri().'/js/jquery.magnific-popup.min.js');
    wp_enqueue_script('magnific-popup-options',get_template_directory_uri().'/js/magnific-popup-options.js');
    wp_enqueue_script('wow',get_template_directory_uri().'/js/wow.min.js');
    wp_enqueue_script('custom',get_template_directory_uri().'/js/custom.js');
}
add_action('wp_enqueue_scripts','aag_scripts');