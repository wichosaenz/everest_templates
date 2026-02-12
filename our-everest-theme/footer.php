<?php
/**
 * The footer template for Our Everest Theme.
 *
 * Displays the two-column widget footer and copyright bar.
 *
 * @package Our_Everest_Theme
 * @since   2.0.0
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</main><!-- #main-content -->

<footer class="oet-footer" role="contentinfo">
	<div class="oet-container">

		<!-- Footer Widget Columns -->
		<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) ) : ?>
		<div class="oet-footer__widgets">
			<div class="oet-footer__col">
				<?php
				if ( is_active_sidebar( 'footer-1' ) ) {
					dynamic_sidebar( 'footer-1' );
				}
				?>
			</div>
			<div class="oet-footer__col">
				<?php
				if ( is_active_sidebar( 'footer-2' ) ) {
					dynamic_sidebar( 'footer-2' );
				}
				?>
			</div>
		</div>
		<?php endif; ?>

		<!-- Bottom Bar: Copyright Widget + Dynamic Year/Name -->
		<div class="oet-footer__bottom">
			<div class="oet-footer__copyright-widget">
				<?php
				if ( is_active_sidebar( 'copyright' ) ) {
					dynamic_sidebar( 'copyright' );
				}
				?>
			</div>
			<p>
				<?php
				printf(
					/* translators: 1: current year, 2: site name */
					esc_html__( '&copy; %1$s %2$s. All rights reserved.', 'our-everest' ),
					esc_html( (string) gmdate( 'Y' ) ),
					esc_html( get_bloginfo( 'name' ) )
				);
				?>
			</p>
		</div>

	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
