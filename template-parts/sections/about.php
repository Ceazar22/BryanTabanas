<?php
/**
 * About section.
 *
 * @package UsableStarter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$profile = USABLE_STARTER_URI . '/assets/images/bryan-portrait.jpeg';

$stack = array(
	array( 'name' => 'WordPress', 'level' => 95 ),
	array( 'name' => 'Shopify / Liquid', 'level' => 90 ),
	array( 'name' => 'JavaScript / PHP', 'level' => 85 ),
	array( 'name' => 'HTML / CSS / Tailwind', 'level' => 95 ),
);
?>
<section id="about" class="portfolio-section about-section">
	<div class="section-shell">
		<div class="section-heading">
			<div class="section-kicker">// <?php esc_html_e( 'About', 'usable-starter' ); ?></div>
			<h2><?php esc_html_e( 'A bit about me', 'usable-starter' ); ?></h2>
		</div>

		<div class="about-grid">
			<div>
				<div class="portrait-card">
					<div class="portrait-card__glow"></div>
					<div class="portrait-card__image">
						<img src="<?php echo esc_url( $profile ); ?>" alt="<?php esc_attr_e( 'Bryan Ceazar Tabanas portrait', 'usable-starter' ); ?>" loading="lazy">
						<div class="portrait-card__location">Based in the Philippines</div>
					</div>
				</div>
			</div>

			<div class="about-details">
				<p class="about-copy"><?php esc_html_e( "I'm a website developer based in the Philippines specializing in WordPress and Shopify. For nearly 4 years I've been building everything from business websites to full e-commerce storefronts, focused on speed, clean code, and results.", 'usable-starter' ); ?></p>

				<div>
					<h3><?php esc_html_e( 'Core stack proficiency', 'usable-starter' ); ?></h3>
					<div class="stack-list">
						<?php foreach ( $stack as $item ) : ?>
							<div class="stack-item">
								<div class="stack-item__top">
									<span><?php echo esc_html( $item['name'] ); ?></span>
									<span><?php echo esc_html( $item['level'] ); ?>%</span>
								</div>
								<div class="stack-item__track"><span style="<?php echo esc_attr( '--level:' . $item['level'] . '%;' ); ?>"></span></div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
