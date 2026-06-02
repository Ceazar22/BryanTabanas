<?php
/**
 * Not found template.
 *
 * @package UsableStarter
 */

get_header();
?>
<main id="primary" class="site-main">
	<section class="not-found">
		<h1><?php esc_html_e( 'Page not found', 'usable-starter' ); ?></h1>
		<p><?php esc_html_e( 'The page you requested could not be found. Try searching or return to the homepage.', 'usable-starter' ); ?></p>
		<?php get_search_form(); ?>
		<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back home', 'usable-starter' ); ?></a>
	</section>
</main>
<?php
get_footer();
