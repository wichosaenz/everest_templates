<?php
/**
 * Single page template.
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

		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="scrolly-section__header">
					<h1><?php the_title(); ?></h1>
				</header>
				<div class="scrolly-section__content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>

	</div>
</section>

<?php get_footer(); ?>
