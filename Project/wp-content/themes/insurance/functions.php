<?php
require_once('libs/wp-bootstrap-navwalker-master/wp_bootstrap_navwalker.php'); //for wp nav menu
/**
 * insurance functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package insurance
 */

if ( ! function_exists( 'insurance_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function insurance_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on insurance, use a find and replace
	 * to change 'insurance' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'insurance', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'insurance' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'insurance_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'insurance_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function insurance_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'insurance_content_width', 640 );
}
add_action( 'after_setup_theme', 'insurance_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function insurance_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'insurance' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'insurance' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'insurance_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function insurance_scripts() {
	/*
	wp_enqueue_style( 'insurance-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'insurance-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
	wp_enqueue_script( 'insurance-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	*/
	/*main css*/


		// comment out the next two lines to load the local copy of jQuery

	
	/*main style*/
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style/style.css',false,'1.1','all');
	/*main js */
	wp_enqueue_script( 'insurance-navigation', get_template_directory_uri() . '/js/main.js');
	/*<!--Slider main JS file -->*/
	wp_enqueue_script( 'insurance-navigation', get_template_directory_uri() . '/js/sliderWD/jquery.mobile.js');
	wp_enqueue_script( 'insurance-navigation', get_template_directory_uri() . '/js/sliderWD/wds.js');
	wp_enqueue_script( 'insurance-navigation', get_template_directory_uri() . '/js/sliderWD/wds_frontend.js');
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'insurance_scripts' );



 /*
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
	return is_array($var) ? array_intersect($var, array('current-menu-item ')) : '';
}
*/

/*
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );
*/
/*
add_image_size( 'sml_size', 300 );
add_image_size( 'mid_size', 600 );
add_image_size( 'lrg_size', 1200 );
add_image_size( 'sup_size', 2400 );
*/
/*Add responsive custome WP class to add responsive image to content*/
function add_responsive_class($content){

	$content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
	$document = new DOMDocument();
	libxml_use_internal_errors(true);
	$document->loadHTML(utf8_decode($content));

	$imgs = $document->getElementsByTagName('img');
	foreach ($imgs as $img) {
		$img->setAttribute('class','img-responsive');
	}

	$html = $document->saveHTML();
	return $html;
}
add_filter ('the_content', 'add_responsive_class');
/*End add_responsive_class*/



/*Register new menu*/
function register_my_menus() {
	register_nav_menus(
		array(
			'corporate clients' => __( 'Corporate clients' ),
			'private clients' => __( 'Private Clients' ),
			'check policy' => __( 'Check Policy' )
		)
	);
}
add_action( 'init', 'register_my_menus' );


/*Remove admin ligin panal (to remove margin top from html)*/
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}



/*
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
	if( in_array('current-menu-item', $classes) ){
		$classes[] = 'active ';
	}
	return $classes;
}
*/

/*Pagination link*/
function _mam_paginate($numrows,$limit=10,$range=7) {

	$pagelinks = "<div class=\"pagelinks\">";
	$currpage = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
	if ($numrows > $limit) {
		if(isset($_GET['mypage'])){
			$mypage = $_GET['mypage'];
		} else {
			$mypage = 1;
		}
		$currpage = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
		$currpage = str_replace("&mypage=".$mypage,"",$currpage); // Use this for non-pretty permalink
		$currpage = str_replace("?mypage=".$mypage,"",$currpage); // Use this for pretty permalink
		if($mypage == 1){
			$pagelinks .= "<span class=\"pageprevdead\">&laquo PREV </span>";
		}else{
			$pageprev = $mypage - 1;
			$pagelinks .= "<a class=\"pageprevlink\" href=\"" . $currpage .
				"&mypage=" . $pageprev . "\">&laquo PREV </a>";
		}
		$numofpages = ceil($numrows / $limit);
		if ($range == "" or $range == 0) $range = 7;
		$lrange = max(1,$mypage-(($range-1)/2));
		$rrange = min($numofpages,$mypage+(($range-1)/2));
		if (($rrange - $lrange) < ($range - 1)) {
			if ($lrange == 1) {
				$rrange = min($lrange + ($range-1), $numofpages);
			} else {
				$lrange = max($rrange - ($range-1), 0);
			}
		}
		if ($lrange > 1) {
			$pagelinks .= "<a class=\"pagenumlink\" " .
				"href=\"" . $currpage . "&mypage=" . 1 .
				"\"> [1] </a>";
			if ($lrange > 2) $pagelinks .= "&nbsp;...&nbsp;";
		} else {
			$pagelinks .= "&nbsp;&nbsp;";
		}
		for($i = 1; $i <= $numofpages; $i++){
			if ($i == $mypage) {
				$pagelinks .= "<span class=\"pagenumon\"> [$i] </span>";
			} else {
				if ($lrange <= $i and $i <= $rrange) {
					$pagelinks .= "<a class=\"pagenumlink\" " .
						"href=\"" . $currpage . "&mypage=" . $i .
						"\"> [" . $i . "] </a>";
				}
			}
		}
		if ($rrange < $numofpages) {
			if ($rrange < $numofpages - 1) $pagelinks .= "&nbsp;...&nbsp;";
			$pagelinks .= "<a class=\"pagenumlink\" " .
				"href=\"" . $currpage . "&mypage=" . $numofpages .
				"\"> [" . $numofpages . "] </a>";
		} else {
			$pagelinks .= "&nbsp;&nbsp;";
		}
		if(($numrows - ($limit * $mypage)) > 0){
			$pagenext = $mypage + 1;
			$pagelinks .= "<a class=\"pagenextlink\" href=\"" . $currpage .
				"&mypage=" . $pagenext . "\"> NEXT &raquo;</a>";
		} else {
			$pagelinks .= "<span class=\"pagenextdead\"> NEXT &raquo;</span>";
		}

	}
	$pagelinks .= "</div>";
	return $pagelinks;
}










/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';