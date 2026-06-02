<?php
/**
 * Portfolio section.
 *
 * @package UsableStarter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$projects = array(
	array(
		'title' => 'Smile Well Dental',
		'image' => 'smilewelldental.png',
		'url' => 'https://smilewelldental.ca/',
		'description' => 'A modern multi-location dental practice website featuring service pages, location finder, patient testimonials, and an integrated booking flow.',
		'tags' => array( 'WordPress', 'Custom Theme', 'Booking' ),
		'tall' => true,
	),
	array(
		'title' => 'Meraki Homes Renovation',
		'image' => 'meraki-renovation.png',
		'url' => 'http://merakihomes.ca/',
		'description' => 'A premium renovation company website featuring service breakdowns, project galleries, awards showcase, and a multi-step quote request flow.',
		'tags' => array( 'WordPress', 'Custom Theme', 'Lead Gen' ),
		'tall' => true,
	),
	array(
		'title' => 'Zarvel Creatives',
		'image' => 'zarvel-creatives.png',
		'url' => 'http://zarvelcreatives.com/',
		'description' => 'A print-on-demand Shopify storefront with a category-driven shop, design submission form, best-selling product grid, and streamlined order flow.',
		'tags' => array( 'Shopify', 'Print on Demand', 'Custom Storefront' ),
		'tall' => true,
	),
	array(
		'title' => 'Catering Leeuwen',
		'image' => 'catering-leeuwen.png',
		'url' => 'http://catering-leeuwen.nl/',
		'description' => 'A full-service catering website featuring buffet menus, foodtruck services, a reservation form, and WhatsApp booking confirmation.',
		'tags' => array( 'WordPress', 'Reservation Form', 'Multi-Service' ),
		'tall' => true,
	),
);
?>
<section id="portfolio" class="portfolio-section">
	<div class="section-shell">
		<div class="section-heading">
			<div class="section-kicker">// <?php esc_html_e( 'Selected Work', 'usable-starter' ); ?></div>
			<h2><?php esc_html_e( 'Recent projects', 'usable-starter' ); ?></h2>
			<p><?php esc_html_e( "A few sites I've shipped, from boutique storefronts to brand-led marketing sites.", 'usable-starter' ); ?></p>
		</div>

		<div class="project-grid">
			<?php foreach ( $projects as $project ) : ?>
				<article class="project-card card-hover<?php echo ! empty( $project['tall'] ) ? ' project-card--tall' : ''; ?>">
					<div class="project-card__media">
						<img src="<?php echo esc_url( USABLE_STARTER_URI . '/assets/images/' . $project['image'] ); ?>" alt="<?php echo esc_attr( $project['title'] ); ?>" loading="lazy">
					</div>
					<div class="project-card__body">
						<h3><?php echo esc_html( $project['title'] ); ?></h3>
						<a class="project-card__link" href="<?php echo esc_url( $project['url'] ); ?>" target="_blank" rel="noopener noreferrer">
							<?php esc_html_e( 'Visit website', 'usable-starter' ); ?>
							<span aria-hidden="true">-&gt;</span>
						</a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
