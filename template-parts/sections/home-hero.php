<?php
/**
 * Homepage hero section.
 *
 * @package UsableStarter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$stats = array(
	array(
		'value' => '4',
		'suffix' => 'yrs',
		'label' => __( 'Experience', 'usable-starter' ),
	),
	array(
		'value' => '40+',
		'label' => __( 'Projects Delivered', 'usable-starter' ),
	),
	array(
		'value' => '2',
		'label' => __( 'Platforms Mastered', 'usable-starter' ),
	),
	array(
		'value' => '100%',
		'label' => __( 'Client Satisfaction', 'usable-starter' ),
	),
);
?>
<section id="home" class="home-hero portfolio-hero">
	<div class="grid-bg" aria-hidden="true"></div>
	<canvas class="hero-canvas" aria-hidden="true"></canvas>
	<div class="hero-particles" aria-hidden="true">
		<?php for ( $i = 0; $i < 30; $i++ ) : ?>
			<span style="<?php echo esc_attr( '--dot-left:' . ( ( $i * 37 ) % 100 ) . '%; --dot-top:' . ( ( $i * 53 ) % 100 ) . '%; --dot-size:' . ( 2 + ( $i % 4 ) ) . 'px; --dot-delay:' . ( ( $i % 10 ) * 0.4 ) . 's; --dot-duration:' . ( 6 + ( $i % 6 ) ) . 's;' ); ?>"></span>
		<?php endfor; ?>
	</div>
	<div class="home-hero__content">
		<div class="availability-pill">
			<span aria-hidden="true"></span>
			<?php esc_html_e( 'Available for freelance work', 'usable-starter' ); ?>
		</div>

		<h1>
			<?php esc_html_e( 'Bryan Ceazar', 'usable-starter' ); ?>
			<br>
			<span class="text-gradient"><?php esc_html_e( 'Tabanas', 'usable-starter' ); ?></span>
		</h1>
		<p class="hero-role"><?php esc_html_e( 'WordPress', 'usable-starter' ); ?> <span>&amp;</span> <?php esc_html_e( 'Shopify Developer', 'usable-starter' ); ?></p>
		<p class="hero-copy"><?php esc_html_e( 'I build fast, clean, and conversion-focused websites that turn ideas into polished digital experiences.', 'usable-starter' ); ?></p>

		<div class="hero-actions">
			<a class="button button--primary" href="#portfolio">
				<?php esc_html_e( 'View My Work', 'usable-starter' ); ?>
				<span aria-hidden="true">-&gt;</span>
			</a>
			<a class="button button--ghost" href="#contact">
				<?php esc_html_e( 'Get In Touch', 'usable-starter' ); ?>
			</a>
		</div>

		<div class="hero-stats">
			<?php foreach ( $stats as $stat ) : ?>
				<div class="hero-stat">
					<div class="hero-stat__value">
						<?php echo esc_html( $stat['value'] ); ?>
						<?php if ( ! empty( $stat['suffix'] ) ) : ?>
							<span><?php echo esc_html( $stat['suffix'] ); ?></span>
						<?php endif; ?>
					</div>
					<div class="hero-stat__label"><?php echo esc_html( $stat['label'] ); ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="scroll-indicator" aria-hidden="true"><span></span></div>
</section>
