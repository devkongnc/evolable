<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package Oceanami
 * @subpackage Oceanami
 * @since Oceanami 1.0
 */
add_filter( 'post_thumbnail_html', 'remove_thumbnail_width_height', 10, 5 );
function remove_thumbnail_width_height( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction');
function add_featured_image_instruction( $content ) {
    return $content .= '<p></p>';
}
add_filter( 'gettext', 'change_excerpt_name', 20, 3 );
function change_excerpt_name( $translated_text, $text, $domain ) {
    if( $_GET['post_type'] == 'slider' ) {
        switch ( $translated_text ) {
            case 'Excerpt' :
                $translated_text = 'Url link to';
                break;
            case 'Excerpts are optional hand-crafted summaries of your content that can be used in your theme. <a href="%s">Learn more about manual excerpts</a>.' :
                $translated_text = '';
                break;
        }
    }
    return $translated_text;
}
function font_admin_init() {
   wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); 
}
function custom_post_css() {
   echo "<style type='text/css' media='screen'>
       #adminmenu .menu-icon-dining div.wp-menu-image:before{
            content:'\\f0f4' !important;
            font-family: fontawesome !important;
        }
        #adminmenu .menu-icon-meeting div.wp-menu-image:before{
            content:'\\f06e' !important;
            font-family: fontawesome !important;
        }
        #adminmenu .menu-icon-special div.wp-menu-image:before{
            content:'\\f06b' !important;
            font-family: fontawesome !important;
        }
        #adminmenu .menu-icon-experience div.wp-menu-image:before{
            content:'\\f2d7' !important;
            font-family: fontawesome !important;
        }
        #adminmenu .menu-icon-gallery div.wp-menu-image:before{
            content:'\\f1c5' !important;
            font-family: fontawesome !important;
        }
        #adminmenu .menu-icon-slider div.wp-menu-image:before{
            content:'\\f1de' !important;
            font-family: fontawesome !important;
        }
        #adminmenu .menu-icon-oceanami div.wp-menu-image:before{
            content:'\\f059' !important;
            font-family: fontawesome !important;
        }
        #adminmenu .menu-icon-destination div.wp-menu-image:before{
            content:'\\f124' !important;
            font-family: fontawesome !important;
        }
        #adminmenu .menu-icon-contact div.wp-menu-image:before{
            content:'\\f2b6' !important;
            font-family: fontawesome !important;
        }
        #adminmenu .menu-icon-accommodation div.wp-menu-image:before{
            content:'\\f236' !important;
            font-family: fontawesome !important;
        }
        #adminmenu .menu-icon-about_us div.wp-menu-image:before{
            content:'\\f19c' !important;
            font-family: fontawesome !important;
        }
        #adminmenu .menu-icon-department div.wp-menu-image:before{
            content:'\\f2bb' !important;
            font-family: fontawesome !important;
        }
        #adminmenu .menu-icon-blog div.wp-menu-image:before{
            content:'\\f1ea' !important;
            font-family: fontawesome !important;
        }
        #adminmenu .menu-icon-press div.wp-menu-image:before{
            content:'\\f041' !important;
            font-family: fontawesome !important;
        }
        #adminmenu .menu-icon-visitor_experience div.wp-menu-image:before{
            content:'\\f0c0' !important;
            font-family: fontawesome !important;
        }
        #adminmenu .menu-icon-getting-here div.wp-menu-image:before{
            content:'\\f207' !important;
            font-family: fontawesome !important;
        }
        #adminmenu .toplevel_page_cv .dashicons-admin-generic:before{
          content:'\\f298' !important;
            font-family: fontawesome !important;
        }
        .qtranxs-lang-switch-wrap + .qtranxs-lang-switch-wrap,
        #acf-qtranslate-lsb-shim + .qtranxs-lang-switch-wrap{display: none !important;}
     </style>";
}
add_action('admin_head', 'custom_post_css');
add_action('admin_init', 'font_admin_init');
//add_action('admin_menu', 'my_remove_sub_menus');
function my_remove_sub_menus() {
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
}
function oceanami_wp_title( $title, $sep ) {
  global $paged, $page;
  if ( is_feed() )
    return $title;
  // Add the site name.
  $title .= get_bloginfo( 'name' );
  // Add the site description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    $title = "$title $sep $site_description";
  // Add a page number if necessary.
  if ( $paged >= 2 || $page >= 2 )
    $title = "$title $sep " . sprintf( __( 'Page %s', 'oceanami_wp_title' ), max( $paged, $page ) );
  return $title;
}
add_filter( 'wp_title', 'oceanami_wp_title', 10, 2 );
function oceanami_scripts() {
  $post_type = get_post_type( get_the_ID());
  $post_type = get_query_var('pagename')!=''? get_query_var('pagename'): $post_type;
  wp_enqueue_style( 'oceanami-style', get_stylesheet_uri() );
 // wp_enqueue_style( 'datepicker', get_template_directory_uri() . '/css/datepicker.min.css', array());
//  wp_enqueue_style( 'bannerscollection_zoominout', get_template_directory_uri() . '/css/bannerscollection_zoominout.css', array());
  wp_enqueue_style( 'awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array());
  wp_enqueue_style( 'ddsmoothmenu', get_template_directory_uri() . '/css/ddsmoothmenu.css', array());
  wp_enqueue_style( 'Lang-select', get_template_directory_uri() . '/css/Lang-select.css', array());
  wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', array());
    wp_enqueue_style( 'scroll_css', get_template_directory_uri() . '/css/scroll.css', array());
  wp_enqueue_script( 'oceanami-modernizr.custom.63321', get_template_directory_uri().'/js/modernizr.custom.63321.js', array());
  wp_enqueue_script( 'oceanami-jquery.1.8','http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js');
  wp_enqueue_script( 'oceanami-jquery.1.9.2','http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js');
  wp_enqueue_script( 'modernizr-custom',get_template_directory_uri().'/js/modernizr.custom.js');
  wp_enqueue_script( 'scroll_js',get_template_directory_uri().'/js/jquery.mCustomScrollbar.concat.min.js');
 // wp_enqueue_script( 'classie',get_template_directory_uri().'/js/classie.js');
//  wp_enqueue_script( 'uisearch',get_template_directory_uri().'/js/uisearch.js');
//  wp_enqueue_script( 'datepicker',get_template_directory_uri().'/js/datepicker.min.js');
 // wp_enqueue_script( 'datepicker.en',get_template_directory_uri().'/js/datepicker.en.js');
  switch ($post_type) {
    case 'blog':
    wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css', array());
    wp_enqueue_script( 'jquery-ui-1.10.4.custom.min',get_template_directory_uri().'/js_blog/vendor/jquery-ui-1.10.4.custom.min.js');
    wp_enqueue_script( 'jquery-1.10.2.min',get_template_directory_uri().'/js_blog/vendor/jquery-1.10.2.min.js');
    wp_enqueue_script( 'carousel',get_template_directory_uri().'/js_blog/bootstrap/carousel.js');
    wp_enqueue_script( 'tab',get_template_directory_uri().'/js_blog/bootstrap/tab.js');
    wp_enqueue_script( 'collapse',get_template_directory_uri().'/js_blog/bootstrap/collapse.js');
    wp_enqueue_script( 'excanvas',get_template_directory_uri().'/js_blog/excanvas.js');
    wp_enqueue_script( 'jquery.knob.min',get_template_directory_uri().'/js_blog/bootstrap/jquery.knob.min.js');
    wp_enqueue_script( 'fastclick',get_template_directory_uri().'/js_blog/bootstrap/fastclick.min.js');
    wp_enqueue_script( 'jquery.stellar.min',get_template_directory_uri().'/js_blog/bootstrap/jquery.stellar.min.js');
    wp_enqueue_script( 'jquery.mousewheel',get_template_directory_uri().'/js_blog/bootstrap/jquery.mousewheel.js');
    wp_enqueue_script( 'perfect-scrollbar.min',get_template_directory_uri().'/js_blog/bootstrap/perfect-scrollbar.min.js');    
    wp_enqueue_script( 'isotope.pkgd.min',get_template_directory_uri().'/js_blog/bootstrap/isotope.pkgd.min.js'); 
    wp_enqueue_script( 'plugins.min',get_template_directory_uri().'/js_blog/bootstrap/plugins.js');
    wp_enqueue_script( 'main',get_template_directory_uri().'/js_blog/bootstrap/main.js');
     break;
     case 'gallery':
      wp_enqueue_style( 'slider_1', get_template_directory_uri() . '/css/slider_1.css');
      wp_enqueue_style( 'selectbox', get_template_directory_uri() . '/css/selectbox.css');
     break;
    default:
    wp_enqueue_style( 'supersized', get_template_directory_uri() . '/css/supersized.css');
    wp_enqueue_style( 'supersized.shutter', get_template_directory_uri() . '/css/supersized.shutter.css');
    wp_enqueue_style( 'jquery.bxslider', get_template_directory_uri() . '/css/jquery.bxslider.css', array());
    wp_enqueue_script( 'jquery.bxslider.min',get_template_directory_uri().'/js/jquery.bxslider.min.js');
    wp_enqueue_script( 'jquery.bxslider',get_template_directory_uri().'/js/jquery.bxslider.js');
    wp_enqueue_script( 'jquery.supersized.cu.min',get_template_directory_uri().'/js/supersized.cu.min.js');
    wp_enqueue_script( 'supersized.shutter',get_template_directory_uri().'/js/supersized.shutter.js');
      break;
  }
}
add_action( 'wp_enqueue_scripts', 'oceanami_scripts' );
add_theme_support( 'post-thumbnails' );
register_nav_menus( array(
  'primary' => __( 'Primary Menu', 'Oceanami' )
) );
/***Accommodation***/
function tr_create_my_taxonomy() {
    register_taxonomy(
        'accommodation-category',
        'accommodation',
        array(
            'label' => __( 'Category' ),
            'rewrite' => array( 'slug' => 'accommodation-category' ),
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'accommodation_post_type');
function accommodation_post_type() {
    register_post_type( 'accommodation',
    array(
      'labels' => array(
        'name' => __( 'Accommodation' ),
        'singular_name' => __( 'Accommodation')
      ),
      'supports' => array('title','editor','thumbnail'),
      'public' => true,
      'has_archive' => false,
      'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => '',
    )
  );
}
/***Dining***/
add_action( 'init', 'tr_create_my_taxonomy' );
add_action( 'init', 'dining_post_type');
function dining_post_type() {
    register_post_type( 'dining',
    array(
      'labels' => array(
        'name' => __( 'Dining' ),
        'singular_name' => __( 'Dining')
      ),
      'supports' => array('title','editor','thumbnail'),
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => '',
    )
  );
}
/***career_taxonomy***/
function career_taxonomy() {
    register_taxonomy(
        'career-info-category',
        'career-info',
        array(
            'label' => __( 'Category' ),
            'rewrite' => array( 'slug' => 'destination-category' ),
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'career_taxonomy' );
add_action( 'init', 'career_info_post_type');
function career_info_post_type() {
    register_post_type( 'career-info',
    array(
      'labels' => array(
        'name' => __( 'Career Information' ),
        'singular_name' => __( 'Career Information ')
      ),
      'supports' => array('title','editor'),
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-carrot',
    )
  );
}
/***Metting***/
add_action( 'init', 'meeting_post_type');
function meeting_post_type() {
    register_post_type( 'meeting',
    array(
      'labels' => array(
        'name' => __( 'Meetings & Events' ),
        'singular_name' => __( 'Meetings & Events')
      ),
      'supports' => array('title','editor','thumbnail'),
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-carrot',
    )
  );
}
/***Destination***/
function destination_taxonomy() {
    register_taxonomy(
        'destination-category',
        'destination',
        array(
            'label' => __( 'Category' ),
            'rewrite' => array( 'slug' => 'destination-category' ),
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'destination_taxonomy' );
add_action( 'init', 'destination_post_type');
function destination_post_type() {
    register_post_type( 'destination',
    array(
      'labels' => array(
        'name' => __( 'Destination' ),
        'singular_name' => __( 'Destination')
      ),
      'supports' => array('title','excerpt','thumbnail'),
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-carrot',
    )
  );
}
/***Experience***/
add_action( 'init', 'experience_post_type');
function experience_post_type() {
    register_post_type( 'experience',
    array(
      'labels' => array(
        'name' => __( 'Experiences'),
        'singular_name' => __( 'Experiences')
      ),
      'supports' => array('title','editor','thumbnail'),
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-carrot',
    )
  );
}
/***Special***/
function special_taxonomy() {
    register_taxonomy(
        'special-category',
        'special',
        array(
            'label' => __( 'Category' ),
            'rewrite' => array( 'slug' => 'special-category' ),
            'hierarchical' => true,
        )
    );
}
add_action('init', 'special_taxonomy' );
add_action('init', 'special_post_type');
function special_post_type() {
    register_post_type( 'special',
    array(
      'labels' => array(
        'name' => __( 'Special Offers'),
        'singular_name' => __( 'Special offer')
      ),
      'supports' => array('title','excerpt','editor','thumbnail'),
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-carrot',
    )
  );
}
/***Gallery***/
add_action( 'init', 'gallery_post_type');
function gallery_post_type() {
    register_post_type( 'gallery',
    array(
      'labels' => array(
        'name' => __( 'Gallery'),
        'singular_name' => __( 'Gallery')
      ),
      'supports' => array('title'),
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-carrot',
    )
  );
}
/***Slider***/
add_action( 'init', 'slider_post_type');
function slider_post_type() {
    register_post_type( 'slider',
    array(
      'labels' => array(
        'name' => __( 'Slider'),
        'singular_name' => __( 'Slider')
      ),
      'supports' => array('title','excerpt','thumbnail'),
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-carrot',
    )
  );
}
/***About****/
add_action( 'init', 'about_post_type');
function about_post_type() {
    register_post_type( 'about_us',
    array(
      'labels' => array(
        'name' => __( 'About us'),
        'singular_name' => __( 'About us')
      ),
      'supports' => array('title','editor','thumbnail'),
      'map_meta_cap' => true,
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => '',
    )
  );
}
/***Popup****/
add_action( 'init', 'popup_type');
function popup_type() {
    register_post_type( 'popup',
    array(
      'labels' => array(
        'name' => __( 'Popup'),
        'singular_name' => __( 'Popup')
      ),
      'supports' => array('title'),
      'map_meta_cap' => true,
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => '',
    )
  );
}
/***About****/
add_action( 'init', 'contact_post_type');
function contact_post_type() {
    register_post_type( 'contact',
    array(
      'labels' => array(
        'name' => __( 'Contact Us'),
        'singular_name' => __( 'Contact Us')
      ),
      'supports' => array('title','excerpt','editor','thumbnail'),
      'map_meta_cap' => true,
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-carrot',
    )
  );
}
/****Department*****/
add_action( 'init', 'department_taxonomy' );
function department_taxonomy(){
    register_taxonomy(
        'department-category',
        'page',
        array(
            'label' => __( 'Category' ),
            'rewrite' => array( 'slug' => 'department_taxonomy' ),
            'hierarchical' => true,
        )
    );
}
/******Departments*****/
add_action( 'init', 'department_post_type');
function department_post_type() {
    register_post_type( 'department',
    array(
      'labels' => array(
        'name' => __( 'Departments'),
        'singular_name' => __( 'Departments')
      ),
      'supports' => array('title'),
      'public' => true,
      'has_archive' => false,
      'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => '',
    )
  );
}
/**
 Khai báo meta box
**/
function email_meta_box()
{
 add_meta_box( 'thong-tin', 'Input email', 'email_output', 'department' );
}
add_action( 'add_meta_boxes', 'email_meta_box' );
/**
 Khai báo callback
 @param $post là đối tượng WP_Post để nhận thông tin của post
**/
function email_output( $post )
{
 $inputEmail = get_post_meta( $post->ID, '_inputEmail', true );
 // Tạo trường Link Download
 echo ('<input type="text" id="inputEmail" name="inputEmail" value="'.esc_attr( $inputEmail ).'" style="width:100%;" />');
}
/**
 Lưu dữ liệu meta box khi nhập vào
 @param post_id là ID của post hiện tại
**/
function email_save( $post_id )
{
 $inputEmail = sanitize_text_field( $_POST['inputEmail'] );
 update_post_meta( $post_id, '_inputEmail', $inputEmail );
}
add_action( 'save_post', 'email_save' );
add_action('init', 'press_post_type');
function press_post_type() {
    register_post_type( 'press',
    array(
      'labels' => array(
        'name' => __( 'Press'),
        'singular_name' => __( 'Press')
      ),
      'supports' => array('title','excerpt','editor','thumbnail'),
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => '',
    )
  );
}
add_action('init', 'blog_post_type');
function blog_post_type() {
    register_post_type( 'Blog',
    array(
      'labels' => array(
        'name' => __( 'Blog'),
        'singular_name' => __( 'Blog')
      ),
      'supports' => array('title','editor','thumbnail'),
      'public' => true,
      'has_archive' => false,
      'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => '',
    )
  );
}
add_action('init', 'getting_here_post_type');
function getting_here_post_type() {
    register_post_type( 'getting-here',
    array(
      'labels' => array(
        'name' => __( 'Getting here'),
        'singular_name' => __( 'Getting here')
      ),
      'supports' => array('title','editor','thumbnail'),
      'public' => true,
      'has_archive' => false,
      'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => '',
    )
  );
}
add_action('init', 'visitorExperience_post_type');
function visitorExperience_post_type() {
    register_post_type( 'visitor_experience',
    array(
      'labels' => array(
        'name' => __( "Other Visitor's Experience"),
        'singular_name' => __("Other Visitor's Experience")
      ),
      'supports' => array('title','excerpt'),
      'public' => true,
      'has_archive' => false,
      'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => '',
    )
  );
}
$set = get_option( 'post_type_rules_flased_mycpt' );
if ( $set !== true ){
    flush_rewrite_rules( false );
    update_option( 'post_type_rules_flased_mycpt', true );
}
add_filter('acf/settings/show_admin', '__return_false');
function oz_run_after_title_meta_boxes() {
    global $post, $wp_meta_boxes;
    do_meta_boxes( get_current_screen(), 'after_title', $post );
}
add_action( 'edit_form_after_title', 'oz_run_after_title_meta_boxes' );
add_action('wp_ajax_contact_frm_action', 'contact_frm');
add_action('wp_ajax_nopriv_contact_frm_action', 'contact_frm');
function contact_frm() {
   $Status = '';
    if($_POST['nameContact']!='' && $_POST['phone']!='' && $_POST['email']!=''){
        $email = get_option( 'admin_email' );
        $name = $_POST["nameContact"];
        $email_add = $_POST["email"];
        $phone = $_POST["phone"];
        $contentPost = $_POST["content"];
        $header .= "MIME-Version: 1.0\n";
        $header .= "Content-Type: text/html; charset=utf-8\n";
        $headers .= "From:" . $email_add;
        $message ='<table><tbody>';
        $message .='<tr><th>Name:</th><td>'.$name.'</td></tr>';
        $message .='<tr><th>Email:</th>'.$email_add.'<td></td></tr>';
        $message .='<tr><th>Phone:</th>'.$phone.'<td></td></tr>';
        $message .='<tr><th>Message:</th>'.nl2br($contentPost).'<td></td></tr>';
        $message .='<tr><th>Url:</th><td>'.get_permalink().'</td></tr>';
        $message .='</tbody></table>';
        $subject =$name.'_contact';
        $_SESSION["popupLoadHome"]= $email;
        global $wpdb;
        $table_name = $wpdb->prefix . 'contactList'; // do not forget about tables prefix
        $wpdb->insert($table_name, array(
            'name' => $name,
            'email' => $email_add,
            'phone' => $phone ,
            'date' => current_time('mysql'),
            'content' => $contentPost
        ));
        wp_mail($email, $subject, $message, $header);
        $Status = 'true'; 
        echo $Status;
    }
}
add_action('wp_ajax_deparment_frm_action', 'deparment_action');
add_action('wp_ajax_nopriv_deparment_frm_action', 'deparment_action');
function deparment_action(){
  global $post;
  $postId = $_POST['post_id'];
  $query=array(
'post_type'=>'career-info',
'posts_per_page'=>1,
'p'=>$postId,
);
$the_query2=null;
$the_query2 = new WP_Query($query);
 while ( $the_query2->have_posts() ) :
   $the_query2->the_post();
 $description = $post->post_content;
 $urlFile = get_field('download',$postId);
 $return = array(
      'message' =>$description,
      'urlFile'    => $urlFile['url']
  );
 endwhile;wp_reset_query();
echo  $data = json_encode($return);
die();
}
add_action("admin_init", "download_csv");
function download_csv() {
  if (isset($_POST['download_csv'])) {
    global $wpdb;
    $sql = "SELECT * FROM ".$wpdb->prefix . 'contactList order by id DESC';
    $rows = $wpdb->get_results($sql, 'ARRAY_A');
    if ($rows) {
        $csv_fields = array();
        $csv_fields[] = "first_column";
        $csv_fields[] = 'second_column';
        $output_filename = 'contact_export_'.time().'.xls';
        header('Content-Encoding: UTF-8');
        header('Content-Type: text/xls; charset=utf-8' );
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=$output_filename");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo 'STT' . "\t";
        echo 'Tên' . "\t";
        echo 'Email' . "\t";
        echo 'Điện thoại' . "\t";
        echo 'Ngày' . "\t";
        echo 'Nội dung' . "\r\n";
        foreach ($rows as $key=>$row) {
          $j = $key+1;
             echo  $j."\t".$row['name']."\t".$row['email']."\t".$row['phone']."\t".$row['date']."\t".$row['content']."\r\n";
        }
        exit();

    }
  }
}

add_action( 'init', 'add_author_rules' );
function add_author_rules() { 
    add_rewrite_rule("category/([^/]+)/?","index.php?category_name=$matches[1]","top");
   
}
function _nice_category_link($link) {
return str_replace('/accommodation-category/', '/' , $link);
}
add_filter('category_link', '_nice_category_link');
