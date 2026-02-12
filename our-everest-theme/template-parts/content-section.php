<?php
/**
 * Template Part: Content Section.
 *
 * Renders a single child page as a scrolly-section on the front page.
 * If the page slug contains 'sticky', the section gets the .is-sticky-split class
 * and the content is wrapped in a two-column sticky layout.
 *
 * @package Our_Everest_Theme
 * @since   2.0.0
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section_slug    = get_post_field( 'post_name', get_the_ID() );
$is_sticky       = oet_is_sticky_section( $section_slug );
$section_classes  = 'scrolly-section';

if ( $is_sticky ) {
	$section_classes .= ' is-sticky-split';
}
?>

<section
	id="<?php echo esc_attr( $section_slug ); ?>"
	class="<?php echo esc_attr( $section_classes ); ?>"
	aria-label="<?php echo esc_attr( get_the_title() ); ?>"
>
	<div class="scrolly-section__inner">

		<!-- Section Header -->
		<div class="scrolly-section__header oet-animate">
			<h2><?php the_title(); ?></h2>
			<?php if ( has_excerpt() ) : ?>
				<p><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>

		<!-- Section Content -->
		<?php if ( $is_sticky ) : ?>

			<!--
				Sticky Split Layout:
				- Left sidebar: Page title + excerpt (sticky on desktop).
				- Right main: Full page content (scrolls naturally).
				The sidebar duplicates the header info for the sticky context.
				The header above is hidden via CSS when sticky is active.
			-->
			<div class="scrolly-section__content">
				<div class="oet-sticky-sidebar oet-animate">
					<h2><?php the_title(); ?></h2>
					<?php if ( has_excerpt() ) : ?>
						<p><?php echo esc_html( get_the_excerpt() ); ?></p>
					<?php endif; ?>
				</div>
				<div class="oet-sticky-main oet-animate">
					<?php the_content(); ?>
				</div>
			</div>

		<?php else : ?>

			<div class="scrolly-section__content oet-animate">
				<?php the_content(); ?>
			</div>

		<?php endif; ?>

	</div>
</section>
