<?php
/**
 * Template Name: Landing Page
 * Template Post Type: page
 *
 * @package UsableStarter
 */

get_header();
?>
<main id="primary" class="site-main">
	<?php while ( have_posts() ) : the_post(); ?>
		<section class="page-hero page-hero--landing">
			<div class="page-hero__inner">
				<h1><?php the_title(); ?></h1>
				<?php if ( usable_starter_page_intro() ) : ?>
					<p><?php echo wp_kses_post( usable_starter_page_intro() ); ?></p>
				<?php endif; ?>
			</div>
		</section>
		<section class="page-content">
			<?php the_content(); ?>
		</section>
	<?php endwhile; ?>
</main>
<?php
get_footer();
