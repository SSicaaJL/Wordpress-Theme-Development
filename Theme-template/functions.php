<?php
/**
 * nusscistudentlife functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nusscistudentlife
 */

/** MAIN SETUP */
if ( ! function_exists( 'nusscistudentlife_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function nusscistudentlife_setup() {

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		/* add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );*/

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'nusscistudentlife_custom_background_args', array(
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

		/** WORDPRESS SETUPS */
		add_theme_support('title-tag'); // Lets wordpress manage the document title, without hard-coded <title> tag in document head
		add_theme_support( 'automatic-feed-links' ); // Add default posts and comments RSS feed links to head.

		/** WORDPRESS BOOTSTRAP NAVWALKER */
		require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'nusscistudentlife' ), // Registers a nav menu named Primary Menu.
			'footer-menu' => __( 'Footer Menu', 'nusscistudentlife' ), // Register a nav menu named Footer Menu
		) );
	}
endif;
add_action( 'after_setup_theme', 'nusscistudentlife_setup' );


/** CONTENT WIDTH */
/** Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nusscistudentlife_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'nusscistudentlife_content_width', 640 );
}
add_action( 'after_setup_theme', 'nusscistudentlife_content_width', 0 );

/** WIDGET REGISTER */
/** @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar */
function nusscistudentlife_widgets_init() {

	/** TEMPLATE FOR REGISTERING WIDGETS */
	/*register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nusscistudentlife' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'nusscistudentlife' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );*/

	/** FOOTER WIDGETS (CONTAINING CONTENT AND MENU) */
	register_sidebar( array( // FOOTER ITEM (LEFT)
		'name'			=> esc_html__( 'Footer - Left', 'nusscistudentlife' ),
		'id'			=> 'footer-widget-l',
		'description'	=> esc_html__( 'Add content to the left of the footer', 'nusscistudentlife' ),
		'before_widget'	=> '<div>',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h6 class="text-light">',
		'after_title'	=> '</h6>',
	));
	register_sidebar( array( // FOOTER ITEM (CENTER)
		'name'			=> esc_html__( 'Footer - Center', 'nusscistudentlife' ),
		'id'			=> 'footer-widget-c',
		'description'	=> esc_html__( 'Add content to the center of the footer', 'nusscistudentlife' ),
		'before_widget'	=> '<div>',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h6 class="text-light">',
		'after_title'	=> '</h6>',
	));
	register_sidebar( array( // FOOTER ITEM (RIGHT)
		'name'			=> esc_html__( 'Footer - Right', 'nusscistudentlife' ),
		'id'			=> 'footer-widget-r',
		'description'	=> esc_html__( 'Add content to the right of the footer', 'nusscistudentlife' ),
		'before_widget'	=> '<div>',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h6 class="text-light">',
		'after_title'	=> '</h6>',
	));
	register_sidebar( array( // FOOTER MENU
		'name'			=> esc_html__( 'Footer - Bottom', 'nusscistudentlife' ),
		'id'			=> 'footer-widget-b',
		'description'	=> esc_html__( 'Add content and menu to the footer', 'nusscistudentlife' ),
		'before_widget'	=> '<div>',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h6 class="text-light">',
		'after_title'	=> '</h6>',
	));

	/** STUDENT ARTICLE WIDGETS */
	register_sidebar( array ( // STUDENT ARTICLE SIDE CONTENT (RIGHT)
		'name'			=> esc_html__( 'Student Article Side Content', 'nusscistudentlife' ),
		'id'			=> 'studentarticle-widget-1',
		'description'	=> esc_html__( 'Add content to the right of the student latest articles', 'nusscistudentlife' ),
		'before_widget'	=> '<div>',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h5>',
		'after_title'	=> '</h5>',
	));
}
add_action( 'widgets_init', 'nusscistudentlife_widgets_init' );


/** ENQUEUE SCRIPTS AND STYLESHEETS */
function nusscistudentlife_scripts() {

	/** STYLES */
	wp_enqueue_style('bootstrap-core', get_template_directory_uri() .'/css/bootstrap.min.css'); // link bootstrap css
	wp_enqueue_style('fontawesome', get_template_directory_uri() .'/css/fontawesome/css/all.min.css'); // link fontawesome icons
	wp_enqueue_style('nusscistudentlife-style', get_stylesheet_uri() ); // link style.css
	
	/** SCRIPTS */
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() .'/js/bootstrap.min.js', array('jquery'), null, true); /** bootstrap js */

	/** COMMENT THREADING */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nusscistudentlife_scripts' );


function nusscistudentlife_custom_excerpt_length( $length ) {
   return 20;
}
add_filter( 'excerpt_length', 'nusscistudentlife_custom_excerpt_length', 999 );



/** SCREW THIS SHIT WE DON'T WANT CUSTOM YET */
/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
// require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// if ( defined( 'JETPACK__VERSION' ) ) {
//	require get_template_directory() . '/inc/jetpack.php';
//}
