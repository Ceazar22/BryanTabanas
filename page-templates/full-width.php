<?php
/**
 * Template Name: Full Width Page
 * Template Post Type: page
 *
 * @package UsableStarter
 */

get_header();
?>
<main id="primary" class="site-main site-main--wide">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'template-parts/content', 'page' ); ?>
	<?php endwhile; ?>
</main>
<?php
get_footer();
