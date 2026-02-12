<?php
/**
 * SaaS Flow Theme Functions and Definitions.
 *
 * @package SaaS_Flow
 * @since   1.0.0
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define theme constants.
 */
define( 'SAAS_FLOW_VERSION', '1.0.0' );
define( 'SAAS_FLOW_DIR', get_template_directory() );
define( 'SAAS_FLOW_URI', get_template_directory_uri() );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since 1.0.0
 * @return void
 */
function saas_flow_setup(): void {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Switch default core markup to output valid HTML5.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Add support for custom logo.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 60,
			'width'       => 200,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	// Register navigation menus.
	register_nav_menus(
		array(
			'primary'     => esc_html__( 'Primary Menu', 'saas-flow' ),
			'footer'      => esc_html__( 'Footer Menu', 'saas-flow' ),
		)
	);
}
add_action( 'after_setup_theme', 'saas_flow_setup' );

/**
 * Set the content width in pixels.
 *
 * @since 1.0.0
 * @return void
 */
function saas_flow_content_width(): void {
	$GLOBALS['content_width'] = apply_filters( 'saas_flow_content_width', 1280 );
}
add_action( 'after_setup_theme', 'saas_flow_content_width', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 * @return void
 */
function saas_flow_scripts(): void {
	// Google Fonts — Inter.
	wp_enqueue_style(
		'saas-flow-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
		array(),
		SAAS_FLOW_VERSION
	);

	// Main stylesheet.
	wp_enqueue_style(
		'saas-flow-style',
		get_stylesheet_uri(),
		array( 'saas-flow-fonts' ),
		SAAS_FLOW_VERSION
	);

	// Main JavaScript.
	wp_enqueue_script(
		'saas-flow-main',
		SAAS_FLOW_URI . '/assets/js/main.js',
		array(),
		SAAS_FLOW_VERSION,
		array( 'strategy' => 'defer' )
	);
}
add_action( 'wp_enqueue_scripts', 'saas_flow_scripts' );

/**
 * Register widget areas.
 *
 * @since 1.0.0
 * @return void
 */
function saas_flow_widgets_init(): void {
	$footer_columns = array(
		'footer-1' => esc_html__( 'Footer Column 1', 'saas-flow' ),
		'footer-2' => esc_html__( 'Footer Column 2', 'saas-flow' ),
		'footer-3' => esc_html__( 'Footer Column 3', 'saas-flow' ),
		'footer-4' => esc_html__( 'Footer Column 4', 'saas-flow' ),
	);

	foreach ( $footer_columns as $id => $name ) {
		register_sidebar(
			array(
				'name'          => $name,
				'id'            => $id,
				'description'   => sprintf(
					/* translators: %s: widget area name */
					esc_html__( 'Add widgets for %s.', 'saas-flow' ),
					$name
				),
				'before_widget' => '<div id="%1$s" class="sf-footer__widget widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="sf-footer__widget-title">',
				'after_title'   => '</h4>',
			)
		);
	}

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'saas-flow' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here for the main sidebar.', 'saas-flow' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'saas_flow_widgets_init' );

/**
 * Custom walker for the primary navigation menu.
 * Strips the default WordPress list markup in favor of plain anchor tags.
 *
 * @since 1.0.0
 */
class Saas_Flow_Nav_Walker extends Walker_Nav_Menu {

	/**
	 * Start the element output.
	 *
	 * @param string   $output Used to append additional content.
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @param int      $id     Current item ID.
	 * @return void
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ): void {
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_string = implode( ' ', array_filter( $classes ) );

		$atts = array(
			'title'  => ! empty( $item->attr_title ) ? $item->attr_title : '',
			'target' => ! empty( $item->target ) ? $item->target : '',
			'rel'    => ! empty( $item->xfn ) ? $item->xfn : '',
			'href'   => ! empty( $item->url ) ? $item->url : '',
			'class'  => $class_string,
		);

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$attributes .= ' ' . esc_attr( $attr ) . '="' . esc_attr( $value ) . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );

		$output .= '<a' . $attributes . '>' . esc_html( $title ) . '</a>';
	}

	/**
	 * End the element output — no closing tag needed since we use <a> only.
	 *
	 * @param string   $output Used to append additional content.
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @return void
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ): void {
		// Intentionally empty — flat <a> tags, no closing </li>.
	}

	/**
	 * Start level — no <ul> wrapper.
	 *
	 * @param string   $output Used to append additional content.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @return void
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ): void {
		// Intentionally empty — no sub-menu wrapper.
	}

	/**
	 * End level — no closing </ul>.
	 *
	 * @param string   $output Used to append additional content.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @return void
	 */
	public function end_lvl( &$output, $depth = 0, $args = null ): void {
		// Intentionally empty.
	}
}

/**
 * Fallback menu when no primary menu is assigned.
 *
 * @since 1.0.0
 * @return void
 */
function saas_flow_fallback_menu(): void {
	echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'saas-flow' ) . '</a>';
	echo '<a href="' . esc_url( home_url( '/#features' ) ) . '">' . esc_html__( 'Features', 'saas-flow' ) . '</a>';
	echo '<a href="' . esc_url( home_url( '/#pricing' ) ) . '">' . esc_html__( 'Pricing', 'saas-flow' ) . '</a>';
	echo '<a href="' . esc_url( home_url( '/#contact' ) ) . '">' . esc_html__( 'Contact', 'saas-flow' ) . '</a>';
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since 1.0.0
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type.
 * @return array Modified URLs.
 */
function saas_flow_resource_hints( array $urls, string $relation_type ): array {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.googleapis.com',
			'crossorigin',
		);
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'saas_flow_resource_hints', 10, 2 );
