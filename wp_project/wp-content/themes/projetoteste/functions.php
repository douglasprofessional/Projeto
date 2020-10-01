<?php
/**
 * projetoteste functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package projetoteste
 */

if ( ! function_exists( 'projetoteste_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function projetoteste_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on projetoteste, use a find and replace
		 * to change 'projetoteste' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'projetoteste', get_template_directory() . '/languages' );

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
			'main-menu' => esc_html__( 'Principal', 'projetoteste' )
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'projetoteste_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'projetoteste_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function projetoteste_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'projetoteste_content_width', 640 );
}
add_action( 'after_setup_theme', 'projetoteste_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function projetoteste_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Single', 'projetoteste' ),
		'id'            => 'sidebar-single',
		'description'   => esc_html__( 'Add widgets here.', 'projetoteste' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Global', 'projetoteste' ),
		'id'            => 'sidebar-global',
		'description'   => esc_html__( 'Add widgets here.', 'projetoteste' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'projetoteste_widgets_init' );


// Removendo o jQuery do WP desnecessário ao tema!
add_filter( 'wp_enqueue_scripts', 'change_default_jquery' );
function change_default_jquery( ){
    wp_dequeue_script( 'jquery');
    wp_deregister_script( 'jquery');
}

function add_defer_forscript($url)
{
    if (strpos($url, '#deferload')===false)
        return $url;
    else if (is_admin())
        return str_replace('#deferload', '', $url);
    else
        return str_replace('#deferload', '', $url)."' defer='defer";
}

/**
 * Enqueue scripts and styles.
 */
function projetoteste_theme_scripts() {

	// STYLES
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/bootstrap.min.css', filemtime(get_template_directory() . '/assets/vendor/bootstrap/bootstrap.min.css'), false );
	wp_enqueue_style( 'owlcarousel', get_template_directory_uri() . '/assets/vendor/OwlCarousel/owl.carousel.min.css', filemtime(get_template_directory() . '/assets/vendor/OwlCarousel/owl.carousel.min.css'), false );
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/main.min.css', array(), filemtime(get_template_directory() . '/assets/css/main.min.css'), false );

	// SCRIPTS
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/vendor/jquery/jquery-3.4.1.min.js', array(), '', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/bootstrap.min.js#deferload', array(), '', true );
	wp_enqueue_script( 'owlcarousel', get_template_directory_uri() . '/assets/vendor/OwlCarousel/owl.carousel.min.js#deferload', array(), '', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/main.min.js#deferload', array(), filemtime(get_template_directory() . '/assets/js/main.min.js' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'projetoteste_theme_scripts' );

/*-------------------------------------------*
  custom menu example @ https://digwp.com/2011/11/html-formatting-custom-menus/
*------------------------------------------*/
function clean_custom_menus() {
	$menu_name = 'main-menu';

	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);

		$menu_list = '<ul id="menu" style="top: 50px;">' ."\n";
		foreach ((array) $menu_items as $key => $menu_item) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= "\t\t\t\t\t". '<li><a href="'. $url .'">'. $title .'</a></li>' ."\n";
		}
		$menu_list .= '</ul>' ."\n";
	} else {
		// $menu_list = '<!-- no list defined -->';
	}
	echo $menu_list;
}

