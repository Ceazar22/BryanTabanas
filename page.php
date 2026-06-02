<?php
/**
 * Page template.
 *
 * @package UsableStarter
 */

get_header();
?>
<main id="primary" class="site-main">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php
		$code_page = usable_starter_code_page_path( get_post_field( 'post_name', get_the_ID() ) );

		if ( $code_page ) {
			require $code_page;
		} else {
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-content' ); ?>>
				<header class="entry-header">
					<h1><?php the_title(); ?></h1>
				</header>
				<div class="entry-content">
					<?php
					the_content();
					wp_link_pages();
					?>
				</div>
			</article>
			<?php
		}
		?>
	<?php endwhile; ?>
</main>
<?php
get_footer();
