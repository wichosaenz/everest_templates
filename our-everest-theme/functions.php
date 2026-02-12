<?php
/**
 * Our Everest Theme — Functions and Definitions.
 *
 * @package Our_Everest_Theme
 * @since   2.0.0
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'OET_VERSION', '2.0.0' );
define( 'OET_DIR', get_template_directory() );
define( 'OET_URI', get_template_directory_uri() );

/* =========================================================================
   1. THEME SETUP
   ========================================================================= */

/**
 * Sets up theme defaults and registers support for WordPress features.
 *
 * @since 2.0.0
 * @return void
 */
function oet_setup(): void {
	// Let WordPress manage the <title> tag.
	add_theme_support( 'title-tag' );

	// RSS feed links in <head>.
	add_theme_support( 'automatic-feed-links' );

	// Post thumbnails.
	add_theme_support( 'post-thumbnails' );

	// Custom logo — flexible dimensions for square/round logos.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 120,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	// HTML5 markup.
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

	// Responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Wide and full alignment for Gutenberg blocks.
	add_theme_support( 'align-wide' );

	// Editor styles.
	add_theme_support( 'editor-styles' );

	// Register navigation menus.
	register_nav_menus(
		array(
			'primary'        => esc_html__( 'Primary Menu', 'our-everest' ),
			'social-toolbar' => esc_html__( 'Social Toolbar', 'our-everest' ),
		)
	);
}
add_action( 'after_setup_theme', 'oet_setup' );

/* =========================================================================
   2. CONTENT WIDTH
   ========================================================================= */

/**
 * Set global content width.
 *
 * @since 2.0.0
 * @return void
 */
function oet_content_width(): void {
	$GLOBALS['content_width'] = apply_filters( 'oet_content_width', 1200 );
}
add_action( 'after_setup_theme', 'oet_content_width', 0 );

/* =========================================================================
   3. ENQUEUE SCRIPTS & STYLES
   ========================================================================= */

/**
 * Enqueue front-end assets.
 *
 * @since 2.0.0
 * @return void
 */
function oet_scripts(): void {
	// Google Fonts — Inter.
	wp_enqueue_style(
		'oet-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
		array(),
		OET_VERSION
	);

	// Main stylesheet.
	wp_enqueue_style(
		'oet-style',
		get_stylesheet_uri(),
		array( 'oet-fonts' ),
		OET_VERSION
	);

	// Main JavaScript.
	wp_enqueue_script(
		'oet-main',
		OET_URI . '/assets/js/main.js',
		array(),
		OET_VERSION,
		array( 'strategy' => 'defer' )
	);
}
add_action( 'wp_enqueue_scripts', 'oet_scripts' );

/**
 * Add preconnect hints for Google Fonts.
 *
 * @since 2.0.0
 * @param array  $urls          Resource hint URLs.
 * @param string $relation_type Hint type.
 * @return array Modified URLs.
 */
function oet_resource_hints( array $urls, string $relation_type ): array {
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
add_filter( 'wp_resource_hints', 'oet_resource_hints', 10, 2 );

/* =========================================================================
   4. WIDGET AREAS
   ========================================================================= */

/**
 * Register widget areas.
 *
 * @since 2.0.0
 * @return void
 */
function oet_widgets_init(): void {
	$areas = array(
		'topbar-left' => esc_html__( 'Top Bar Left', 'our-everest' ),
		'footer-1'    => esc_html__( 'Footer Area 1', 'our-everest' ),
		'footer-2'    => esc_html__( 'Footer Area 2', 'our-everest' ),
		'copyright'   => esc_html__( 'Copyright Area', 'our-everest' ),
	);

	foreach ( $areas as $id => $name ) {
		register_sidebar(
			array(
				'name'          => $name,
				'id'            => $id,
				'description'   => sprintf(
					/* translators: %s: widget area name */
					esc_html__( 'Widgets for %s.', 'our-everest' ),
					$name
				),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			)
		);
	}
}
add_action( 'widgets_init', 'oet_widgets_init' );

/* =========================================================================
   5. CUSTOMIZER — Theme Colors Section
   ========================================================================= */

/**
 * Register Customizer settings and controls for theme colors.
 *
 * @since 2.0.0
 * @param WP_Customize_Manager $wp_customize Customizer manager instance.
 * @return void
 */
function oet_customize_register( WP_Customize_Manager $wp_customize ): void {
	// Section: Theme Colors.
	$wp_customize->add_section(
		'oet_colors',
		array(
			'title'    => esc_html__( 'Theme Colors', 'our-everest' ),
			'priority' => 30,
		)
	);

	$color_settings = array(
		'oet_primary_color' => array(
			'default' => '#2563eb',
			'label'   => esc_html__( 'Primary Color', 'our-everest' ),
		),
		'oet_body_bg_color' => array(
			'default' => '#ffffff',
			'label'   => esc_html__( 'Body Background Color', 'our-everest' ),
		),
		'oet_text_color' => array(
			'default' => '#333333',
			'label'   => esc_html__( 'Text Color', 'our-everest' ),
		),
	);

	foreach ( $color_settings as $setting_id => $config ) {
		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => $config['default'],
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'   => $config['label'],
					'section' => 'oet_colors',
				)
			)
		);
	}
}
add_action( 'customize_register', 'oet_customize_register' );

/**
 * Inject Customizer CSS variables into wp_head.
 *
 * @since 2.0.0
 * @return void
 */
function oet_customizer_css(): void {
	$primary = get_theme_mod( 'oet_primary_color', '#2563eb' );
	$bg      = get_theme_mod( 'oet_body_bg_color', '#ffffff' );
	$text    = get_theme_mod( 'oet_text_color', '#333333' );

	$css = sprintf(
		':root { --primary-color: %s; --body-bg-color: %s; --text-color: %s; }',
		esc_attr( $primary ),
		esc_attr( $bg ),
		esc_attr( $text )
	);

	printf( '<style id="oet-customizer-css">%s</style>' . "\n", $css ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- CSS is sanitized above.
}
add_action( 'wp_head', 'oet_customizer_css', 25 );

/**
 * Enqueue Customizer live-preview script.
 *
 * @since 2.0.0
 * @return void
 */
function oet_customize_preview_js(): void {
	wp_enqueue_script(
		'oet-customizer-preview',
		OET_URI . '/assets/js/customizer-preview.js',
		array( 'customize-preview' ),
		OET_VERSION,
		true
	);
}
add_action( 'customize_preview_init', 'oet_customize_preview_js' );

/* =========================================================================
   6. CUSTOM NAV WALKER (Flat <a> tags)
   ========================================================================= */

/**
 * Custom walker that outputs flat <a> tags for the navbar.
 *
 * @since 2.0.0
 */
class OET_Nav_Walker extends Walker_Nav_Menu {

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
		$class_string = implode( ' ', array_filter( $classes ) );

		$atts = array(
			'href'   => ! empty( $item->url ) ? $item->url : '',
			'title'  => ! empty( $item->attr_title ) ? $item->attr_title : '',
			'target' => ! empty( $item->target ) ? $item->target : '',
			'rel'    => ! empty( $item->xfn ) ? $item->xfn : '',
		);

		if ( $class_string ) {
			$atts['class'] = $class_string;
		}

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
	 * No closing tag for flat <a> output.
	 *
	 * @param string   $output Used to append additional content.
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @return void
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ): void {}

	/**
	 * No sub-menu wrapper.
	 *
	 * @param string   $output Used to append additional content.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @return void
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ): void {}

	/**
	 * No closing sub-menu wrapper.
	 *
	 * @param string   $output Used to append additional content.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @return void
	 */
	public function end_lvl( &$output, $depth = 0, $args = null ): void {}
}

/**
 * Fallback menu when no primary menu is assigned.
 *
 * @since 2.0.0
 * @return void
 */
function oet_fallback_menu(): void {
	echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'our-everest' ) . '</a>';
}

/* =========================================================================
   7. HELPER: Get child pages for the front page
   ========================================================================= */

/**
 * Retrieve published child pages of the given parent, ordered by menu_order.
 *
 * @since 2.0.0
 * @param int $parent_id The parent page ID.
 * @return WP_Post[] Array of child page WP_Post objects.
 */
function oet_get_child_sections( int $parent_id ): array {
	$query = new WP_Query(
		array(
			'post_type'      => 'page',
			'post_parent'    => $parent_id,
			'posts_per_page' => 50,
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'post_status'    => 'publish',
			'no_found_rows'  => true,
		)
	);

	return $query->posts;
}

/**
 * Determine if a page slug indicates a sticky-split section.
 *
 * @since 2.0.0
 * @param string $slug The page slug.
 * @return bool True if sticky-split should be applied.
 */
function oet_is_sticky_section( string $slug ): bool {
	return ( false !== strpos( $slug, 'sticky' ) );
}
