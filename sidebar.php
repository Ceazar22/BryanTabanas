<?php
/**
 * Sidebar template.
 *
 * @package UsableStarter
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside class="site-sidebar" aria-label="<?php esc_attr_e( 'Sidebar', 'usable-starter' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
