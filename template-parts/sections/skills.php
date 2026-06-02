<?php
/**
 * Skills section.
 *
 * @package UsableStarter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$groups = array(
	array(
		'title' => 'WordPress',
		'gradient' => 'blue',
		'skills' => array( 'Custom Themes', 'Elementor Pro', 'WooCommerce', 'ACF', 'Custom CPTs' ),
	),
	array(
		'title' => 'Shopify',
		'gradient' => 'green',
		'skills' => array( 'Liquid Templating', 'Theme Customization', 'App Integrations', 'Checkout Optimization' ),
	),
	array(
		'title' => 'Development',
		'gradient' => 'violet',
		'skills' => array( 'HTML / CSS', 'JavaScript', 'PHP', 'Git / GitHub', 'Responsive Design' ),
	),
	array(
		'title' => 'SEO & Performance',
		'gradient' => 'amber',
		'skills' => array( 'Core Web Vitals', 'Page Speed Optimization', 'On-Page SEO', 'Google Analytics' ),
	),
);
?>
<section id="skills" class="portfolio-section portfolio-section--surface">
	<div class="section-shell">
		<div class="section-heading">
			<div class="section-kicker">// <?php esc_html_e( 'Skills', 'usable-starter' ); ?></div>
			<h2><?php esc_html_e( 'What I work with', 'usable-starter' ); ?></h2>
			<p><?php esc_html_e( 'A focused toolkit refined over four years of shipping production sites.', 'usable-starter' ); ?></p>
		</div>

		<div class="skills-grid">
			<?php foreach ( $groups as $group ) : ?>
				<article class="skill-card card-hover">
					<div class="skill-card__icon skill-card__icon--<?php echo esc_attr( $group['gradient'] ); ?>"><?php echo esc_html( substr( $group['title'], 0, 1 ) ); ?></div>
					<h3><?php echo esc_html( $group['title'] ); ?></h3>
					<ul>
						<?php foreach ( $group['skills'] as $skill ) : ?>
							<li><?php echo esc_html( $skill ); ?></li>
						<?php endforeach; ?>
					</ul>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
