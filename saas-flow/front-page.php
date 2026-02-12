<?php
/**
 * Front Page Template for SaaS Flow.
 *
 * Custom landing page with Hero, Logo Marquee, Sticky Scrollytelling, and Bento Grid.
 * Structure is hardcoded — replace with ACF Blocks as needed.
 *
 * @package SaaS_Flow
 * @since   1.0.0
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<!-- ============================================================
     SECTION 1: HERO — Full Viewport, Video Background
     ============================================================ -->
<section class="sf-hero" id="hero" aria-label="<?php esc_attr_e( 'Hero', 'saas-flow' ); ?>">

	<!-- Video Background -->
	<div class="sf-hero__video-wrap" aria-hidden="true">
		<!--
			Replace the <video> source with your own file.
			For a quick demo, an empty placeholder is used.
			Recommended: self-hosted MP4, 1920×1080, < 8 MB, muted autoplay loop.
		-->
		<video autoplay muted loop playsinline preload="metadata">
			<source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/hero-bg.mp4' ); ?>" type="video/mp4">
		</video>
	</div>

	<!-- Gradient Overlay -->
	<div class="sf-hero__overlay" aria-hidden="true"></div>

	<!-- Content -->
	<div class="sf-hero__content sf-animate">
		<span class="sf-hero__badge">
			<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
				<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
			</svg>
			<?php esc_html_e( 'Now in Public Beta &mdash; Version 2.0', 'saas-flow' ); ?>
		</span>

		<h1 class="sf-hero__title">
			<?php esc_html_e( 'Ship Products', 'saas-flow' ); ?>
			<span class="sf-gradient-text"><?php esc_html_e( '10x Faster', 'saas-flow' ); ?></span>
		</h1>

		<p class="sf-hero__subtitle">
			<?php esc_html_e( 'The all-in-one platform for modern teams. Automate workflows, collaborate in real-time, and launch with confidence.', 'saas-flow' ); ?>
		</p>

		<div class="sf-hero__actions">
			<a href="#contact" class="sf-btn sf-btn--primary">
				<?php esc_html_e( 'Start Free Trial', 'saas-flow' ); ?>
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
					<line x1="5" y1="12" x2="19" y2="12" /><polyline points="12 5 19 12 12 19" />
				</svg>
			</a>
			<a href="#demo" class="sf-btn sf-btn--outline">
				<?php esc_html_e( 'Watch Demo', 'saas-flow' ); ?>
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
					<polygon points="5 3 19 12 5 21 5 3" />
				</svg>
			</a>
		</div>
	</div>

</section>


<!-- ============================================================
     SECTION 2: LOGO MARQUEE — Infinite CSS Scroll
     ============================================================ -->
<section class="sf-marquee" id="clients" aria-label="<?php esc_attr_e( 'Trusted by', 'saas-flow' ); ?>">

	<p class="sf-marquee__label sf-label">
		<?php esc_html_e( 'Trusted by industry leaders', 'saas-flow' ); ?>
	</p>

	<div class="sf-marquee__track" aria-hidden="true">
		<?php
		// Two identical groups are needed so the animation loops seamlessly.
		$logos = array(
			array( 'name' => 'Stripe',    'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M13.976 9.15c-2.172-.806-3.356-1.426-3.356-2.409 0-.831.683-1.305 1.901-1.305 2.227 0 4.515.858 6.09 1.631l.89-5.494C18.252.975 15.697 0 12.165 0 9.667 0 7.589.654 6.104 1.872 4.56 3.147 3.757 4.992 3.757 7.218c0 4.039 2.467 5.76 6.476 7.219 2.585.92 3.445 1.574 3.445 2.583 0 .98-.84 1.545-2.354 1.545-1.875 0-4.965-.921-7.076-2.19l-.897 5.555C5.088 22.88 7.981 24 11.324 24c2.6 0 4.719-.64 6.249-1.828 1.634-1.262 2.457-3.17 2.457-5.67 0-4.128-2.544-5.835-6.054-7.352z"/></svg>' ),
			array( 'name' => 'Slack',     'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M5.042 15.165a2.528 2.528 0 0 1-2.52 2.523A2.528 2.528 0 0 1 0 15.165a2.527 2.527 0 0 1 2.522-2.52h2.52v2.52zm1.271 0a2.527 2.527 0 0 1 2.521-2.52 2.527 2.527 0 0 1 2.521 2.52v6.313A2.528 2.528 0 0 1 8.834 24a2.528 2.528 0 0 1-2.521-2.522v-6.313zM8.834 5.042a2.528 2.528 0 0 1-2.521-2.52A2.528 2.528 0 0 1 8.834 0a2.528 2.528 0 0 1 2.521 2.522v2.52H8.834zm0 1.271a2.528 2.528 0 0 1 2.521 2.521 2.528 2.528 0 0 1-2.521 2.521H2.522A2.528 2.528 0 0 1 0 8.834a2.528 2.528 0 0 1 2.522-2.521h6.312zm10.122 2.521a2.528 2.528 0 0 1 2.522-2.521A2.528 2.528 0 0 1 24 8.834a2.528 2.528 0 0 1-2.522 2.521h-2.522V8.834zm-1.268 0a2.528 2.528 0 0 1-2.523 2.521 2.527 2.527 0 0 1-2.52-2.521V2.522A2.527 2.527 0 0 1 15.165 0a2.528 2.528 0 0 1 2.523 2.522v6.312zm-2.523 10.122a2.528 2.528 0 0 1 2.523 2.522A2.528 2.528 0 0 1 15.165 24a2.527 2.527 0 0 1-2.52-2.522v-2.522h2.52zm0-1.268a2.527 2.527 0 0 1-2.52-2.523 2.526 2.526 0 0 1 2.52-2.52h6.313A2.527 2.527 0 0 1 24 15.165a2.528 2.528 0 0 1-2.522 2.523h-6.313z"/></svg>' ),
			array( 'name' => 'Notion',    'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M4.459 4.208c.746.606 1.026.56 2.428.466l13.215-.793c.28 0 .047-.28-.046-.326L17.86 1.968c-.42-.326-.981-.7-2.055-.607L2.58 2.559c-.467.047-.56.28-.374.466zm.793 3.08v13.904c0 .747.373 1.027 1.214.98l14.523-.84c.84-.046.933-.56.933-1.167V6.354c0-.606-.233-.933-.746-.886l-15.177.886c-.56.047-.747.327-.747.934zm14.337.745c.093.42 0 .84-.42.888l-.7.14v10.264c-.608.327-1.168.514-1.635.514-.747 0-.933-.234-1.495-.933l-4.577-7.186v6.953l1.448.327s0 .84-1.168.84l-3.222.187c-.093-.186 0-.653.327-.746l.84-.233V9.854L7.822 9.76c-.094-.42.14-1.026.793-1.073l3.456-.234 4.764 7.279v-6.44l-1.215-.14c-.093-.514.28-.886.747-.933zM1.936 1.035l13.869-1.026c1.681-.14 2.1.094 2.8.607l3.876 2.753c.467.327.607.42.607.793v17.19c0 1.073-.374 1.7-1.681 1.773l-15.457.934c-.98.046-1.448-.094-1.962-.747L.98 20.24c-.56-.747-.793-1.307-.793-1.96V2.855c0-.84.374-1.54 1.749-1.82z"/></svg>' ),
			array( 'name' => 'Figma',     'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M15.852 8.981h-4.588V0h4.588c2.476 0 4.49 2.014 4.49 4.49s-2.014 4.491-4.49 4.491zM12.735 7.51h3.117c1.665 0 3.019-1.355 3.019-3.019s-1.354-3.019-3.019-3.019h-3.117V7.51zm0 1.471H8.148c-2.476 0-4.49-2.014-4.49-4.49S5.672 0 8.148 0h4.588v8.981zm-4.587-7.51c-1.665 0-3.019 1.355-3.019 3.019s1.354 3.02 3.019 3.02h3.117V1.471H8.148zm4.587 15.019H8.148c-2.476 0-4.49-2.014-4.49-4.49s2.014-4.49 4.49-4.49h4.588v8.98zM8.148 8.981c-1.665 0-3.019 1.355-3.019 3.019s1.354 3.019 3.019 3.019h3.117V8.981H8.148zM8.172 24c-2.489 0-4.515-2.014-4.515-4.49s2.014-4.49 4.49-4.49h4.588v4.441c0 2.503-2.047 4.539-4.563 4.539zm-.024-7.51a3.023 3.023 0 0 0-3.019 3.019c0 1.665 1.365 3.019 3.044 3.019 1.705 0 3.093-1.376 3.093-3.068v-2.97H8.148zm7.704 0h-.098c-2.476 0-4.49-2.014-4.49-4.49s2.014-4.49 4.49-4.49h.098c2.476 0 4.49 2.014 4.49 4.49s-2.014 4.49-4.49 4.49zm-.097-7.509c-1.665 0-3.019 1.355-3.019 3.019s1.354 3.02 3.019 3.02h.098c1.665 0 3.019-1.355 3.019-3.02s-1.354-3.019-3.019-3.019h-.098z"/></svg>' ),
			array( 'name' => 'Vercel',    'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 22.525H0l12-21.05 12 21.05z"/></svg>' ),
			array( 'name' => 'Linear',    'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M2.325 12.318a.975.975 0 0 1 0-1.38L11.07 2.194a.975.975 0 0 1 1.38 0l8.744 8.744a.975.975 0 0 1 0 1.38l-8.744 8.744a.975.975 0 0 1-1.38 0z"/></svg>' ),
			array( 'name' => 'Supabase',  'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M21.362 9.354H12V.396a.396.396 0 0 0-.716-.233L2.203 12.424l-.401.562a.396.396 0 0 0 .322.628H12v8.958a.396.396 0 0 0 .716.233l9.081-12.261.401-.562a.396.396 0 0 0-.322-.628z"/></svg>' ),
			array( 'name' => 'Raycast',   'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M6.002 18L0 11.998l2.5-2.5 6.002 6.002-2.5 2.5zm5.998 6l-2.5-2.5 6.002-6.002 2.5 2.5L12 24zM21.5 14.5L15.498 8.5l2.5-2.5 6.002 6-2.5 2.5zM8.5 2.5l6 6.002-2.5 2.5L6 4.998 8.5 2.5z"/></svg>' ),
		);

		for ( $group = 0; $group < 2; $group++ ) :
			?>
			<div class="sf-marquee__group">
				<?php foreach ( $logos as $logo ) : ?>
					<div class="sf-marquee__item">
						<?php
						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- SVG is hardcoded, not user input.
						echo $logo['icon'];
						?>
						<span><?php echo esc_html( $logo['name'] ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endfor; ?>
	</div>

</section>


<!-- ============================================================
     SECTION 3: STICKY SCROLLYTELLING
     Desktop: Left sidebar sticky, right column scrolls.
     Mobile: Stacked vertically (sticky disabled via CSS).

     To change the sticky offset, adjust `top: 100px` in style.css
     under `.sf-scrollytelling__sidebar`.
     ============================================================ -->
<section class="sf-scrollytelling sf-section" id="features" aria-label="<?php esc_attr_e( 'Features', 'saas-flow' ); ?>">
	<div class="sf-container">

		<div class="sf-scrollytelling__inner">

			<!-- Sticky Sidebar (Left) -->
			<div class="sf-scrollytelling__sidebar">
				<div class="sf-scrollytelling__sidebar-content sf-animate">
					<span class="sf-label"><?php esc_html_e( 'How It Works', 'saas-flow' ); ?></span>
					<h2 class="sf-scrollytelling__title">
						<?php esc_html_e( 'Everything you need to', 'saas-flow' ); ?>
						<span class="sf-gradient-text"><?php esc_html_e( 'build & scale', 'saas-flow' ); ?></span>
					</h2>
					<p class="sf-scrollytelling__description">
						<?php esc_html_e( 'Our platform handles the complexity so your team can focus on what matters — building great products. Scroll through to explore our core capabilities.', 'saas-flow' ); ?>
					</p>

					<div class="sf-scrollytelling__features">
						<div class="sf-scrollytelling__feature">
							<span class="sf-scrollytelling__feature-icon" aria-hidden="true">&#10003;</span>
							<span><?php esc_html_e( 'Zero-config deployment', 'saas-flow' ); ?></span>
						</div>
						<div class="sf-scrollytelling__feature">
							<span class="sf-scrollytelling__feature-icon" aria-hidden="true">&#10003;</span>
							<span><?php esc_html_e( 'Built-in CI/CD pipelines', 'saas-flow' ); ?></span>
						</div>
						<div class="sf-scrollytelling__feature">
							<span class="sf-scrollytelling__feature-icon" aria-hidden="true">&#10003;</span>
							<span><?php esc_html_e( 'Real-time collaboration', 'saas-flow' ); ?></span>
						</div>
						<div class="sf-scrollytelling__feature">
							<span class="sf-scrollytelling__feature-icon" aria-hidden="true">&#10003;</span>
							<span><?php esc_html_e( 'Enterprise-grade security', 'saas-flow' ); ?></span>
						</div>
					</div>
				</div>
			</div>

			<!-- Scrolling Content (Right) -->
			<div class="sf-scrollytelling__content sf-stagger">

				<!-- Card 1 -->
				<article class="sf-scrollytelling__card sf-animate">
					<span class="sf-scrollytelling__card-number" aria-hidden="true">01</span>
					<h3 class="sf-scrollytelling__card-title"><?php esc_html_e( 'Automated Workflows', 'saas-flow' ); ?></h3>
					<p class="sf-scrollytelling__card-text">
						<?php esc_html_e( 'Design powerful automation flows with our visual builder. Connect APIs, trigger actions, and eliminate repetitive tasks — no code required.', 'saas-flow' ); ?>
					</p>
					<div class="sf-scrollytelling__card-image" aria-label="<?php esc_attr_e( 'Workflow automation illustration', 'saas-flow' ); ?>">
						<!-- Replace with <img> or ACF image field -->
					</div>
				</article>

				<!-- Card 2 -->
				<article class="sf-scrollytelling__card sf-animate">
					<span class="sf-scrollytelling__card-number" aria-hidden="true">02</span>
					<h3 class="sf-scrollytelling__card-title"><?php esc_html_e( 'Real-Time Analytics', 'saas-flow' ); ?></h3>
					<p class="sf-scrollytelling__card-text">
						<?php esc_html_e( 'Monitor every metric that matters with live dashboards. Custom reports, funnel analysis, and cohort tracking built right in.', 'saas-flow' ); ?>
					</p>
					<div class="sf-scrollytelling__card-image" aria-label="<?php esc_attr_e( 'Analytics dashboard illustration', 'saas-flow' ); ?>">
						<!-- Replace with <img> or ACF image field -->
					</div>
				</article>

				<!-- Card 3 -->
				<article class="sf-scrollytelling__card sf-animate">
					<span class="sf-scrollytelling__card-number" aria-hidden="true">03</span>
					<h3 class="sf-scrollytelling__card-title"><?php esc_html_e( 'Team Collaboration', 'saas-flow' ); ?></h3>
					<p class="sf-scrollytelling__card-text">
						<?php esc_html_e( 'Shared workspaces, inline comments, and role-based permissions make it effortless for teams of any size to move fast without stepping on toes.', 'saas-flow' ); ?>
					</p>
					<div class="sf-scrollytelling__card-image" aria-label="<?php esc_attr_e( 'Team collaboration illustration', 'saas-flow' ); ?>">
						<!-- Replace with <img> or ACF image field -->
					</div>
				</article>

				<!-- Card 4 -->
				<article class="sf-scrollytelling__card sf-animate">
					<span class="sf-scrollytelling__card-number" aria-hidden="true">04</span>
					<h3 class="sf-scrollytelling__card-title"><?php esc_html_e( 'Global Edge Deployment', 'saas-flow' ); ?></h3>
					<p class="sf-scrollytelling__card-text">
						<?php esc_html_e( 'Deploy to 200+ edge locations worldwide with a single click. Automatic SSL, CDN, and DDoS protection included at every tier.', 'saas-flow' ); ?>
					</p>
					<div class="sf-scrollytelling__card-image" aria-label="<?php esc_attr_e( 'Global deployment illustration', 'saas-flow' ); ?>">
						<!-- Replace with <img> or ACF image field -->
					</div>
				</article>

				<!-- Card 5 -->
				<article class="sf-scrollytelling__card sf-animate">
					<span class="sf-scrollytelling__card-number" aria-hidden="true">05</span>
					<h3 class="sf-scrollytelling__card-title"><?php esc_html_e( 'Enterprise Security', 'saas-flow' ); ?></h3>
					<p class="sf-scrollytelling__card-text">
						<?php esc_html_e( 'SOC 2 Type II certified. SAML SSO, audit logs, and granular access controls ensure your data stays protected at every layer.', 'saas-flow' ); ?>
					</p>
					<div class="sf-scrollytelling__card-image" aria-label="<?php esc_attr_e( 'Enterprise security illustration', 'saas-flow' ); ?>">
						<!-- Replace with <img> or ACF image field -->
					</div>
				</article>

			</div><!-- .sf-scrollytelling__content -->

		</div><!-- .sf-scrollytelling__inner -->

	</div><!-- .sf-container -->
</section>


<!-- ============================================================
     SECTION 4: BENTO GRID — Asymmetric Feature Grid
     ============================================================ -->
<section class="sf-bento sf-section" id="bento" aria-label="<?php esc_attr_e( 'Feature highlights', 'saas-flow' ); ?>">
	<div class="sf-container">

		<div class="sf-section__header sf-animate">
			<span class="sf-label"><?php esc_html_e( 'Features', 'saas-flow' ); ?></span>
			<h2>
				<?php esc_html_e( 'Built for', 'saas-flow' ); ?>
				<span class="sf-gradient-text"><?php esc_html_e( 'modern teams', 'saas-flow' ); ?></span>
			</h2>
			<p>
				<?php esc_html_e( 'A carefully crafted suite of tools to power every stage of your product lifecycle.', 'saas-flow' ); ?>
			</p>
		</div>

		<div class="sf-bento__grid sf-stagger">

			<!-- Item 1: Featured (2×2) -->
			<div class="sf-bento__item sf-bento__item--featured sf-animate">
				<div>
					<div class="sf-bento__icon sf-bento__icon--purple" aria-hidden="true">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<rect x="3" y="3" width="18" height="18" rx="2" ry="2" /><line x1="3" y1="9" x2="21" y2="9" /><line x1="9" y1="21" x2="9" y2="9" />
						</svg>
					</div>
					<h3 class="sf-bento__item-title"><?php esc_html_e( 'Visual Dashboard', 'saas-flow' ); ?></h3>
					<p class="sf-bento__item-text">
						<?php esc_html_e( 'A unified command center for your entire operation. Drag-and-drop widgets, custom views, and real-time data sync across all your tools.', 'saas-flow' ); ?>
					</p>
				</div>
				<div class="sf-bento__item-visual" aria-hidden="true"></div>
			</div>

			<!-- Item 2: Standard -->
			<div class="sf-bento__item sf-animate">
				<div class="sf-bento__icon sf-bento__icon--teal" aria-hidden="true">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
					</svg>
				</div>
				<h3 class="sf-bento__item-title"><?php esc_html_e( 'Live Metrics', 'saas-flow' ); ?></h3>
				<p class="sf-bento__item-text">
					<?php esc_html_e( 'Track performance with sub-second latency. Instant alerts when metrics cross your thresholds.', 'saas-flow' ); ?>
				</p>
			</div>

			<!-- Item 3: Standard -->
			<div class="sf-bento__item sf-animate">
				<div class="sf-bento__icon sf-bento__icon--pink" aria-hidden="true">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" /><circle cx="9" cy="7" r="4" /><path d="M23 21v-2a4 4 0 0 0-3-3.87" /><path d="M16 3.13a4 4 0 0 1 0 7.75" />
					</svg>
				</div>
				<h3 class="sf-bento__item-title"><?php esc_html_e( 'Team Spaces', 'saas-flow' ); ?></h3>
				<p class="sf-bento__item-text">
					<?php esc_html_e( 'Isolated environments for every team with shared resources and cross-project visibility.', 'saas-flow' ); ?>
				</p>
			</div>

			<!-- Item 4: Wide (2 cols) -->
			<div class="sf-bento__item sf-bento__item--wide sf-animate">
				<div class="sf-bento__icon sf-bento__icon--purple" aria-hidden="true">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<path d="M18 20V10" /><path d="M12 20V4" /><path d="M6 20v-6" />
					</svg>
				</div>
				<h3 class="sf-bento__item-title"><?php esc_html_e( 'Advanced Reporting', 'saas-flow' ); ?></h3>
				<p class="sf-bento__item-text">
					<?php esc_html_e( 'Generate investor-ready reports with one click. Cohort analysis, MRR tracking, churn prediction, and custom SQL queries.', 'saas-flow' ); ?>
				</p>
			</div>

			<!-- Item 5: Tall (2 rows) -->
			<div class="sf-bento__item sf-bento__item--tall sf-animate">
				<div class="sf-bento__icon sf-bento__icon--teal" aria-hidden="true">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<rect x="4" y="4" width="16" height="16" rx="2" ry="2" /><rect x="9" y="9" width="6" height="6" /><line x1="9" y1="1" x2="9" y2="4" /><line x1="15" y1="1" x2="15" y2="4" /><line x1="9" y1="20" x2="9" y2="23" /><line x1="15" y1="20" x2="15" y2="23" /><line x1="20" y1="9" x2="23" y2="9" /><line x1="20" y1="14" x2="23" y2="14" /><line x1="1" y1="9" x2="4" y2="9" /><line x1="1" y1="14" x2="4" y2="14" />
					</svg>
				</div>
				<h3 class="sf-bento__item-title"><?php esc_html_e( 'API-First Architecture', 'saas-flow' ); ?></h3>
				<p class="sf-bento__item-text">
					<?php esc_html_e( 'Every feature is accessible via our REST & GraphQL APIs. Build custom integrations with comprehensive SDKs for Python, Node, Go, and Ruby.', 'saas-flow' ); ?>
				</p>
				<div class="sf-bento__item-visual" aria-hidden="true"></div>
			</div>

			<!-- Item 6: Standard -->
			<div class="sf-bento__item sf-animate">
				<div class="sf-bento__icon sf-bento__icon--pink" aria-hidden="true">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
					</svg>
				</div>
				<h3 class="sf-bento__item-title"><?php esc_html_e( 'SOC 2 Certified', 'saas-flow' ); ?></h3>
				<p class="sf-bento__item-text">
					<?php esc_html_e( 'Enterprise-grade compliance with SOC 2 Type II, GDPR, and HIPAA. Your data is encrypted at rest and in transit.', 'saas-flow' ); ?>
				</p>
			</div>

		</div><!-- .sf-bento__grid -->

	</div>
</section>

<?php get_footer(); ?>
