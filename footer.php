<?php
/**
 * Site footer.
 *
 * @package UsableStarter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<footer class="site-footer">
	<div class="site-footer__inner">
		<p class="site-footer__credit">
			<?php echo esc_html( sprintf( 'Copyright %s Bryan Ceazar Tabanas. Built with care.', gmdate( 'Y' ) ) ); ?>
		</p>
		<p class="site-footer__note"><?php esc_html_e( 'Designed & developed in the Philippines', 'usable-starter' ); ?></p>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
