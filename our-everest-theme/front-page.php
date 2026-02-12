<?php
/**
 * Front Page Template — Dynamic One-Page via Child Pages.
 *
 * This template builds the front page by:
 * 1. Displaying the main "Home" page content as an intro section.
 * 2. Querying all published child pages (ordered by menu_order).
 * 3. Rendering each child page as a scrolly-section.
 * 4. If a child page slug contains 'sticky', it gets the .is-sticky-split class.
 *
 * @package Our_Everest_Theme
 * @since   2.0.0
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<?php if ( have_posts() ) : ?>
	<?php
	while ( have_posts() ) :
		the_post();
		?>

		<!-- ===== INTRO: Main Page Content ===== -->
		<section class="oet-intro scrolly-section" id="intro" aria-label="<?php esc_attr_e( 'Introduction', 'our-everest' ); ?>">
			<div class="oet-container">
				<div class="oet-intro__content oet-animate">
					<?php the_content(); ?>
				</div>
			</div>
		</section>

	<?php endwhile; ?>
<?php endif; ?>

<?php
// ===== CHILD PAGE SECTIONS =====
$parent_id      = get_the_ID();
$child_sections = oet_get_child_sections( (int) $parent_id );

if ( ! empty( $child_sections ) ) :
	foreach ( $child_sections as $section_page ) :
		// Set up the global $post so template tags work.
		// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
		$GLOBALS['post'] = $section_page;
		setup_postdata( $section_page );

		get_template_part( 'template-parts/content', 'section' );

	endforeach;
	wp_reset_postdata();
endif;
?>

<?php get_footer(); ?>
