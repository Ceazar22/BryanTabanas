<?php
/**
 * Contact section.
 *
 * @package UsableStarter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
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
					<a href="mailto:bryan@example.com">bryan@example.com</a>
				</div>

				<div class="social-links">
					<a href="#" aria-label="<?php esc_attr_e( 'LinkedIn', 'usable-starter' ); ?>">in</a>
					<a href="#" aria-label="<?php esc_attr_e( 'GitHub', 'usable-starter' ); ?>">GH</a>
					<a class="download-link" href="#"><?php esc_html_e( 'Download CV', 'usable-starter' ); ?></a>
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
