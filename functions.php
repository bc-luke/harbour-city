<?php

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Harbour City supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Harbour City 1.0
 */
function harbour_city_setup() {
	/*
	 * Makes Harbour City available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Harbour City, use a find and replace
	 * to change 'twentytwelve' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'harbour-city', get_template_directory() . '/languages' );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'gallery' ) );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menu( 'primary', __( 'Primary Menu', 'harbour-city' ) );
    register_nav_menu( 'site-info', __( 'Site Info Menu', 'harbour-city' ) );

	/*
	 * This theme supports custom background color and image, and here
	 * we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => '000',
	) );
}
add_action( 'after_setup_theme', 'harbour_city_setup' );

// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
register_default_headers( array(
	'harbour-city-hoppers-logo' => array(
		'url' => get_template_directory_uri() . '/img/headers/harbour-city-hoppers-logo.png',
		'thumbnail_url' =>  get_template_directory_uri() . '/img/headers/harbour-city-hoppers-logo-thumbnail.png',
		/* translators: header image description */
		'description' => __( 'Sydney', 'harbour-city' )
	),
) );

/**
 * Adds support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Enqueues scripts and styles for front-end.
 *
 * @since Harbour City 1.0
 */
function harbour_city_scripts_styles() {
	global $wp_styles;


	/*
	 * Adds JavaScript for handling the navigation menu hide-and-show behavior.
	 */
	wp_enqueue_script( 'harbour-city-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );

	/*
	 * Loads our special font CSS file.
	 *
	 * The use of Open Sans by default is localized. For languages that use
	 * characters not supported by the font, the font can be disabled.
	 *
	 * To disable in a child theme, use wp_dequeue_style()
	 * function mytheme_dequeue_fonts() {
	 *     wp_dequeue_style( 'twentytwelve-fonts' );
	 * }
	 * add_action( 'wp_enqueue_scripts', 'mytheme_dequeue_fonts', 11 );
	 */

	/* translators: If there are characters in your language that are not supported
	   by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'harbour-city' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language, translate
		   this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language. */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'harbour-city' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Open+Sans:400italic,700italic,400,700',
			'subset' => $subsets,
		);
		wp_enqueue_style( 'harbour-city-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );
	}

	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'harbour-city-style', get_stylesheet_uri() );

	/*
	 * Loads the Internet Explorer specific stylesheet.
	 */
	wp_enqueue_style( 'harbour-city-ie', get_template_directory_uri() . '/css/ie.css', array( 'harbour-city-style' ), '20121010' );
	$wp_styles->add_data( 'harbour-city-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'harbour_city_scripts_styles' );

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Harbour City 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function harbour_city_wp_title( $title, $sep ) {
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
		$title = "$title $sep " . sprintf( __( 'Page %s', 'harbour-city' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'harbour_city_wp_title', 10, 2 );

/**
 * Registers our main widget area and the front page widget areas.
 *
 * @since Twenty Twelve 1.0
 */
function harbour_city_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Footer Widgets', 'harbour-city' ),
		'id' => 'widgets-footer',
		'description' => __( 'Appears on the index page', 'harbour-city' ),
        'before_widget' => '<li id="%1$s" class="widget span4 %2$s">',
        'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'harbour_city_widgets_init' );