<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
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

<section class="sf-section">
	<div class="sf-container sf-container--narrow">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<?php if ( is_singular() ) : ?>
							<h1><?php the_title(); ?></h1>
						<?php else : ?>
							<h2>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h2>
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

			<p><?php esc_html_e( 'No content found.', 'saas-flow' ); ?></p>

		<?php endif; ?>

	</div>
</section>

<?php
get_footer();
