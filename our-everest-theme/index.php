<?php
/**
 * The main template file (fallback).
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

<section class="scrolly-section">
	<div class="oet-container oet-container--narrow">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header style="margin-bottom: var(--space-md);">
						<?php if ( is_singular() ) : ?>
							<h1><?php the_title(); ?></h1>
						<?php else : ?>
							<h2>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
						<?php endif; ?>

						<?php if ( 'post' === get_post_type() ) : ?>
							<p style="color: var(--text-muted); font-size: var(--fs-sm);">
								<?php echo esc_html( get_the_date() ); ?>
							</p>
						<?php endif; ?>
					</header>

					<div class="entry-content">
						<?php
						if ( is_singular() ) {
							the_content();
						} else {
							the_excerpt();
						}
						?>
					</div>
				</article>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<p><?php esc_html_e( 'No content found.', 'our-everest' ); ?></p>

		<?php endif; ?>

	</div>
</section>

<?php get_footer(); ?>
