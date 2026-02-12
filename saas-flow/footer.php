<?php
/**
 * The footer template for SaaS Flow.
 *
 * Displays the 4-column widget footer and closing tags.
 *
 * @package SaaS_Flow
 * @since   1.0.0
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</main><!-- #main-content -->

<footer class="sf-footer" role="contentinfo">
	<div class="sf-container">

		<!-- 4-Column Widget Area -->
		<div class="sf-footer__widgets">

			<div class="sf-footer__col">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<?php dynamic_sidebar( 'footer-1' ); ?>
				<?php else : ?>
					<div class="sf-footer__widget">
						<h4 class="sf-footer__widget-title"><?php esc_html_e( 'SaaS Flow', 'saas-flow' ); ?></h4>
						<p style="color: var(--color-text-muted); font-size: var(--fs-sm);">
							<?php esc_html_e( 'Build better products faster with our modern SaaS platform. Trusted by thousands of teams worldwide.', 'saas-flow' ); ?>
						</p>
					</div>
				<?php endif; ?>
			</div>

			<div class="sf-footer__col">
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<?php dynamic_sidebar( 'footer-2' ); ?>
				<?php else : ?>
					<div class="sf-footer__widget">
						<h4 class="sf-footer__widget-title"><?php esc_html_e( 'Product', 'saas-flow' ); ?></h4>
						<ul>
							<li><a href="#"><?php esc_html_e( 'Features', 'saas-flow' ); ?></a></li>
							<li><a href="#"><?php esc_html_e( 'Integrations', 'saas-flow' ); ?></a></li>
							<li><a href="#"><?php esc_html_e( 'Pricing', 'saas-flow' ); ?></a></li>
							<li><a href="#"><?php esc_html_e( 'Changelog', 'saas-flow' ); ?></a></li>
							<li><a href="#"><?php esc_html_e( 'Roadmap', 'saas-flow' ); ?></a></li>
						</ul>
					</div>
				<?php endif; ?>
			</div>

			<div class="sf-footer__col">
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<?php dynamic_sidebar( 'footer-3' ); ?>
				<?php else : ?>
					<div class="sf-footer__widget">
						<h4 class="sf-footer__widget-title"><?php esc_html_e( 'Company', 'saas-flow' ); ?></h4>
						<ul>
							<li><a href="#"><?php esc_html_e( 'About', 'saas-flow' ); ?></a></li>
							<li><a href="#"><?php esc_html_e( 'Blog', 'saas-flow' ); ?></a></li>
							<li><a href="#"><?php esc_html_e( 'Careers', 'saas-flow' ); ?></a></li>
							<li><a href="#"><?php esc_html_e( 'Press Kit', 'saas-flow' ); ?></a></li>
							<li><a href="#"><?php esc_html_e( 'Contact', 'saas-flow' ); ?></a></li>
						</ul>
					</div>
				<?php endif; ?>
			</div>

			<div class="sf-footer__col">
				<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
					<?php dynamic_sidebar( 'footer-4' ); ?>
				<?php else : ?>
					<div class="sf-footer__widget">
						<h4 class="sf-footer__widget-title"><?php esc_html_e( 'Legal', 'saas-flow' ); ?></h4>
						<ul>
							<li><a href="#"><?php esc_html_e( 'Privacy Policy', 'saas-flow' ); ?></a></li>
							<li><a href="#"><?php esc_html_e( 'Terms of Service', 'saas-flow' ); ?></a></li>
							<li><a href="#"><?php esc_html_e( 'Cookie Policy', 'saas-flow' ); ?></a></li>
							<li><a href="#"><?php esc_html_e( 'GDPR', 'saas-flow' ); ?></a></li>
						</ul>
					</div>
				<?php endif; ?>
			</div>

		</div>

		<!-- Bottom Bar -->
		<div class="sf-footer__bottom">
			<p class="sf-footer__copyright">
				<?php
				printf(
					/* translators: 1: current year, 2: site name */
					esc_html__( '&copy; %1$s %2$s. All rights reserved.', 'saas-flow' ),
					esc_html( (string) gmdate( 'Y' ) ),
					esc_html( get_bloginfo( 'name' ) )
				);
				?>
			</p>

			<div class="sf-footer__social">
				<a href="#" aria-label="<?php esc_attr_e( 'Twitter / X', 'saas-flow' ); ?>">
					<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<path d="M4 4l11.733 16h4.267l-11.733 -16z" /><path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
					</svg>
				</a>
				<a href="#" aria-label="<?php esc_attr_e( 'GitHub', 'saas-flow' ); ?>">
					<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22" />
					</svg>
				</a>
				<a href="#" aria-label="<?php esc_attr_e( 'LinkedIn', 'saas-flow' ); ?>">
					<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" /><rect x="2" y="9" width="4" height="12" /><circle cx="4" cy="4" r="2" />
					</svg>
				</a>
			</div>
		</div>

	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
