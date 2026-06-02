<?php
/**
 * Contact section.
 *
 * @package UsableStarter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$email        = 'bryanceazartabanas@gmail.com';
$linkedin_url = 'https://www.linkedin.com/in/bryan-ceazar-tabanas-0a8b83232/';
$cv_url       = USABLE_STARTER_URI . '/assets/files/bryan-ceazar-tabanas-cv.pdf';
?>
<section id="contact" class="portfolio-section contact-section">
	<div class="section-shell">
		<div class="contact-grid">
			<div>
				<div class="section-kicker">// <?php esc_html_e( 'Contact', 'usable-starter' ); ?></div>
				<h2>
					<?php esc_html_e( 'Have a project in mind?', 'usable-starter' ); ?>
					<br>
					<span class="text-gradient"><?php esc_html_e( "Let's build something great.", 'usable-starter' ); ?></span>
				</h2>
				<p><?php esc_html_e( "Drop me a message and I'll get back to you within 24 hours. Whether it's a new build, a redesign, or a performance audit, I'd love to hear about it.", 'usable-starter' ); ?></p>

				<div class="contact-links">
					<a href="<?php echo esc_url( 'mailto:' . $email ); ?>"><?php echo esc_html( $email ); ?></a>
				</div>

				<div class="social-links">
					<a href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'LinkedIn', 'usable-starter' ); ?>">
						<svg class="social-links__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
							<path fill="currentColor" d="M20.45 20.45h-3.56v-5.58c0-1.33-.02-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.95v5.67H9.34V9h3.42v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28ZM5.32 7.43a2.06 2.06 0 1 1 0-4.13 2.06 2.06 0 0 1 0 4.13ZM7.1 20.45H3.54V9H7.1v11.45ZM22.22 0H1.77C.79 0 0 .77 0 1.72v20.56C0 23.23.79 24 1.77 24h20.45c.98 0 1.78-.77 1.78-1.72V1.72C24 .77 23.2 0 22.22 0Z"></path>
						</svg>
					</a>
					<a class="download-link" href="<?php echo esc_url( $cv_url ); ?>" download><?php esc_html_e( 'Download CV', 'usable-starter' ); ?></a>
				</div>
			</div>

			<form class="contact-form" action="#" method="post">
				<div class="field-row">
					<label>
						<span><?php esc_html_e( 'Name', 'usable-starter' ); ?></span>
						<input type="text" name="name" placeholder="<?php esc_attr_e( 'Your name', 'usable-starter' ); ?>" required>
					</label>
					<label>
						<span><?php esc_html_e( 'Email', 'usable-starter' ); ?></span>
						<input type="email" name="email" placeholder="<?php esc_attr_e( 'you@email.com', 'usable-starter' ); ?>" required>
					</label>
				</div>
				<label>
					<span><?php esc_html_e( 'Subject', 'usable-starter' ); ?></span>
					<input type="text" name="subject" placeholder="<?php esc_attr_e( 'Project type or topic', 'usable-starter' ); ?>" required>
				</label>
				<label>
					<span><?php esc_html_e( 'Message', 'usable-starter' ); ?></span>
					<textarea name="message" rows="5" placeholder="<?php esc_attr_e( 'Tell me a bit about your project...', 'usable-starter' ); ?>" required></textarea>
				</label>
				<button class="button button--primary" type="submit"><?php esc_html_e( 'Send Message', 'usable-starter' ); ?></button>
			</form>
		</div>
	</div>
</section>
