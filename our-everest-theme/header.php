<?php
/**
 * The header template for Our Everest Theme.
 *
 * Displays the top bar, sticky navbar with dynamic logo, and primary navigation.
 *
 * @package Our_Everest_Theme
 * @since   2.0.0
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
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="screen-reader-text" href="#main-content">
	<?php esc_html_e( 'Skip to content', 'our-everest' ); ?>
</a>

<!-- ===== TOP BAR ===== -->
<?php if ( is_active_sidebar( 'topbar-left' ) ) : ?>
<div class="oet-topbar" role="complementary" aria-label="<?php esc_attr_e( 'Top bar', 'our-everest' ); ?>">
	<div class="oet-container oet-topbar__inner">
		<div class="oet-topbar__left">
			<?php dynamic_sidebar( 'topbar-left' ); ?>
		</div>
		<?php if ( has_nav_menu( 'social-toolbar' ) ) : ?>
		<nav class="oet-topbar__social" aria-label="<?php esc_attr_e( 'Social links', 'our-everest' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'social-toolbar',
					'container'      => false,
					'items_wrap'     => '%3$s',
					'walker'         => new OET_Nav_Walker(),
					'depth'          => 1,
				)
			);
			?>
		</nav>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>

<!-- ===== MAIN NAVBAR ===== -->
<header class="oet-navbar" id="oet-navbar" role="banner">
	<div class="oet-container oet-navbar__inner">

		<!-- Logo / Site Title -->
		<div class="oet-navbar__brand">
			<?php
			if ( has_custom_logo() ) {
				the_custom_logo();
			} else {
				?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="oet-navbar__brand-text" rel="home">
					<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
				</a>
				<?php
			}
			?>
		</div>

		<!-- Primary Navigation -->
		<nav class="oet-navbar__menu" id="oet-navbar-menu" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'our-everest' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'items_wrap'     => '%3$s',
					'walker'         => new OET_Nav_Walker(),
					'fallback_cb'    => 'oet_fallback_menu',
					'depth'          => 1,
				)
			);
			?>
		</nav>

		<!-- Mobile Toggle -->
		<button
			class="oet-navbar__toggle"
			id="oet-navbar-toggle"
			type="button"
			aria-controls="oet-navbar-menu"
			aria-expanded="false"
			aria-label="<?php esc_attr_e( 'Toggle navigation', 'our-everest' ); ?>"
		>
			<span></span>
			<span></span>
			<span></span>
		</button>

	</div>
</header>

<main id="main-content" role="main">
