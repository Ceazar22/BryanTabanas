<?php
/**
 * Single post template.
 *
 * @package UsableStarter
 */

get_header();
?>
<main id="primary" class="site-main">
	<div class="content-layout">
		<section class="content-list">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>
					<header class="entry-header">
						<h1><?php the_title(); ?></h1>
						<?php usable_starter_post_meta(); ?>
					</header>
					<?php if ( has_post_thumbnail() ) : ?>
						<figure class="entry-image"><?php the_post_thumbnail( 'usable-starter-hero' ); ?></figure>
					<?php endif; ?>
					<div class="entry-content">
						<?php
						the_content();
						wp_link_pages();
						?>
					</div>
				</article>
				<?php
				the_post_navigation();
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>
			<?php endwhile; ?>
		</section>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php
get_footer();
