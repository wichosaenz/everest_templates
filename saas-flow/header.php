<?php
/**
 * The header template for SaaS Flow.
 *
 * Displays the <head> section and opening <body> with the sticky navbar.
 *
 * @package SaaS_Flow
 * @since   1.0.0
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="screen-reader-text" href="#main-content">
	<?php esc_html_e( 'Skip to content', 'saas-flow' ); ?>
</a>

<header class="sf-navbar" id="sf-navbar" role="banner">
	<div class="sf-container sf-navbar__inner">

		<!-- Brand -->
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="sf-navbar__brand" rel="home">
			<?php
			if ( has_custom_logo() ) {
				the_custom_logo();
			} else {
				?>
				Saas<span>Flow</span>
				<?php
			}
			?>
		</a>

		<!-- Primary Navigation -->
		<nav class="sf-navbar__menu" id="sf-navbar-menu" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'saas-flow' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container'       => false,
					'items_wrap'      => '%3$s',
					'walker'          => new Saas_Flow_Nav_Walker(),
					'fallback_cb'     => 'saas_flow_fallback_menu',
					'depth'           => 1,
				)
			);
			?>
		</nav>

		<!-- CTA Buttons -->
		<div class="sf-navbar__cta">
			<a href="#pricing" class="sf-btn sf-btn--outline sf-btn--sm">
				<?php esc_html_e( 'Log In', 'saas-flow' ); ?>
			</a>
			<a href="#contact" class="sf-btn sf-btn--primary sf-btn--sm">
				<?php esc_html_e( 'Get Started', 'saas-flow' ); ?>
			</a>
		</div>

		<!-- Mobile Toggle -->
		<button
			class="sf-navbar__toggle"
			id="sf-navbar-toggle"
			aria-controls="sf-navbar-menu"
			aria-expanded="false"
			aria-label="<?php esc_attr_e( 'Toggle navigation', 'saas-flow' ); ?>"
			type="button"
		>
			<span></span>
			<span></span>
			<span></span>
		</button>

	</div>
</header>

<main id="main-content" role="main">
