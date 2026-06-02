<?php
/**
 * Testimonials section.
 *
 * @package UsableStarter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = array(
	array(
		'quote' => 'Bryan built our multi-location dental site on WordPress and made the booking flow effortless. New patient inquiries went up almost immediately after launch.',
		'name' => 'Dr. Hannah Lim',
		'role' => 'Smile Well Dental',
	),
	array(
		'quote' => 'Our renovation site finally reflects the quality of work we deliver. The quote request flow brings in serious leads. Bryan was a real partner through the build.',
		'name' => 'Marcus Bauer',
		'role' => 'Meraki Homes Renovation',
	),
	array(
		'quote' => 'Bryan set up our Shopify print-on-demand store end to end. Product catalog, design submissions, the whole order flow. It just works.',
		'name' => 'Janelle Cruz',
		'role' => 'Zarvel Creatives',
	),
);
?>
<section id="testimonials" class="portfolio-section portfolio-section--surface">
	<div class="section-shell">
		<div class="section-heading">
			<div class="section-kicker">// <?php esc_html_e( 'Testimonials', 'usable-starter' ); ?></div>
			<h2><?php esc_html_e( 'Kind words from clients', 'usable-starter' ); ?></h2>
		</div>

		<div class="testimonial-grid">
			<?php foreach ( $items as $item ) : ?>
				<figure class="testimonial-card card-hover">
					<div class="quote-mark">"</div>
					<blockquote><?php echo esc_html( $item['quote'] ); ?></blockquote>
					<figcaption>
						<strong><?php echo esc_html( $item['name'] ); ?></strong>
						<span><?php echo esc_html( $item['role'] ); ?></span>
					</figcaption>
				</figure>
			<?php endforeach; ?>
		</div>
	</div>
</section>
