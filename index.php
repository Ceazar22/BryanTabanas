<?php
/**
 * Main template.
 *
 * @package UsableStarter
 */

get_header();
?>
<main id="primary" class="site-main">
	<div class="content-layout">
		<section class="content-list">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
				<?php endwhile; ?>
				<?php the_posts_pagination(); ?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
		</section>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php
get_footer();
