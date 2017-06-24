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
    set_post_thumbnail_size(360,300);

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
    wp_enqueue_script('agg-script',get_template_directory_uri().'/js/aag-script.js');

}
add_action('wp_enqueue_scripts','aag_scripts');

add_filter('excerpt_more',function($more){
    return '...';
});

/* eji hasce */
function aag_the_breadcrumb(){
    global $post;
    if(!is_home()){
        echo '<li><a href="'.site_url().'"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li> <li> / </li> ';
        if(is_single()){ // posts
            the_category(', ');
            echo " <li> / </li> ";
            echo '<li>';
            the_title();
            echo '</li>';
        }
        elseif (is_page()) { // pages
            if ($post->post_parent ) {
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
                    $parent_id  = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                foreach ($breadcrumbs as $crumb) echo $crumb . '<li> / </li> ';
            }
            echo the_title();
        }
        elseif (is_category()) { // category
            global $wp_query;
            $obj_cat = $wp_query->get_queried_object();
            $current_cat = $obj_cat->term_id;
            $current_cat = get_category($current_cat);
            $parent_cat = get_category($current_cat->parent);
            if ($current_cat->parent != 0)
                echo(get_category_parents($parent_cat, TRUE, ' <li> / </li> '));
            single_cat_title();
        }
        elseif (is_search()) { // search pages
            echo 'Search results "' . get_search_query() . '"';
        }
        elseif (is_tag()) { // tags
            echo single_tag_title('', false);
        }
        elseif (is_day()) { // archive (days)
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> <li> / </li> ';
            echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> <li> / </li> ';
            echo get_the_time('d');
        }
        elseif (is_month()) { // archive (months)
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> <li> / </li>';
            echo get_the_time('F');
        }
        elseif (is_year()) { // archive (years)
            echo get_the_time('Y');
        }
        elseif (is_author()) { // authors
            global $author;
            $userdata = get_userdata($author);
            echo '<li>Posted ' . $userdata->display_name . '</li>';
        } elseif (is_404()) { // if page not found
            echo '<li>Error 404</li>';
        }

        if (get_query_var('paged')) // number of page
            echo ' (' . get_query_var('paged').'- page)';

    } else { // home
        $pageNum=(get_query_var('paged')) ? get_query_var('paged') : 1;
        if($pageNum>1)
            echo '<li><a href="'.site_url().'"><i class="fa fa-home" aria-hidden="true">Home</a></li> <li> / </li> '.$pageNum.'- page';
        else
            echo '<li><i class="fa fa-home" aria-hidden="true"></i>Home</li>';
    }
}