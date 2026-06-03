<?php
/**
 * Contact form handling.
 *
 * @package UsableStarter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$smtp_config = __DIR__ . '/smtp-config.php';

if ( is_readable( $smtp_config ) ) {
	require_once $smtp_config;
}

add_action( 'admin_post_usable_starter_contact', 'usable_starter_handle_contact_form' );
add_action( 'admin_post_nopriv_usable_starter_contact', 'usable_starter_handle_contact_form' );
add_action( 'phpmailer_init', 'usable_starter_configure_smtp' );
add_action( 'wp_mail_failed', 'usable_starter_log_mail_error' );

/**
 * Read an SMTP setting from a constant or environment variable.
 *
 * @param string $name    Setting name without the USABLE_STARTER_ prefix.
 * @param mixed  $default Default value.
 * @return mixed
 */
function usable_starter_get_mail_setting( string $name, $default = '' ) {
	$constant = 'USABLE_STARTER_' . $name;

	if ( defined( $constant ) ) {
		return constant( $constant );
	}

	$value = getenv( $constant );

	return false === $value ? $default : $value;
}

/**
 * Configure SMTP for wp_mail() when credentials are provided.
 *
 * Expected constants or environment variables:
 * USABLE_STARTER_SMTP_HOST, USABLE_STARTER_SMTP_PORT, USABLE_STARTER_SMTP_USER,
 * USABLE_STARTER_SMTP_PASS, USABLE_STARTER_SMTP_SECURE, USABLE_STARTER_SMTP_FROM,
 * USABLE_STARTER_SMTP_FROM_NAME, USABLE_STARTER_CONTACT_RECIPIENT.
 *
 * @param PHPMailer\PHPMailer\PHPMailer $phpmailer WordPress mailer instance.
 */
function usable_starter_configure_smtp( $phpmailer ): void {
	$host = (string) usable_starter_get_mail_setting( 'SMTP_HOST' );
	$user = (string) usable_starter_get_mail_setting( 'SMTP_USER' );
	$pass = (string) usable_starter_get_mail_setting( 'SMTP_PASS' );

	if ( '' === $host || '' === $user || '' === $pass ) {
		return;
	}

	$from      = sanitize_email( (string) usable_starter_get_mail_setting( 'SMTP_FROM' ) );
	$from_name = sanitize_text_field( (string) usable_starter_get_mail_setting( 'SMTP_FROM_NAME', get_bloginfo( 'name' ) ) );
	$secure    = (string) usable_starter_get_mail_setting( 'SMTP_SECURE', 'tls' );
	$port      = (int) usable_starter_get_mail_setting( 'SMTP_PORT', 587 );

	if ( ! is_email( $from ) ) {
		$from = is_email( $user ) ? $user : get_option( 'admin_email' );
	}

	$phpmailer->isSMTP();
	$phpmailer->Host       = $host;
	$phpmailer->SMTPAuth   = true;
	$phpmailer->Port       = $port > 0 ? $port : 587;
	$phpmailer->Username   = $user;
	$phpmailer->Password   = $pass;
	$phpmailer->SMTPSecure = $secure;
	$phpmailer->From       = $from;
	$phpmailer->FromName   = $from_name;
	$phpmailer->Sender     = $from;
}

/**
 * Log mail errors in debug mode so failed contact submissions are traceable.
 *
 * @param WP_Error $error Mail error.
 */
function usable_starter_log_mail_error( WP_Error $error ): void {
	if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
		error_log( 'Contact form mail failed: ' . $error->get_error_message() ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
	}
}

/**
 * Send contact form submissions to the site owner.
 */
function usable_starter_handle_contact_form(): void {
	$redirect = wp_get_referer() ? wp_get_referer() : home_url( '/#contact' );
	$redirect = remove_query_arg( 'contact_status', $redirect );

	if (
		! isset( $_POST['usable_starter_contact_nonce'] ) ||
		! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['usable_starter_contact_nonce'] ) ), 'usable_starter_contact' )
	) {
		wp_safe_redirect( add_query_arg( 'contact_status', 'error', $redirect ) . '#contact' );
		exit;
	}

	$honeypot = isset( $_POST['website'] ) ? trim( sanitize_text_field( wp_unslash( $_POST['website'] ) ) ) : '';

	if ( '' !== $honeypot ) {
		wp_safe_redirect( add_query_arg( 'contact_status', 'success', $redirect ) . '#contact' );
		exit;
	}

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$subject = isset( $_POST['subject'] ) ? sanitize_text_field( wp_unslash( $_POST['subject'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( '' === $name || ! is_email( $email ) || '' === $subject || '' === $message ) {
		wp_safe_redirect( add_query_arg( 'contact_status', 'error', $redirect ) . '#contact' );
		exit;
	}

	$recipient = sanitize_email( (string) usable_starter_get_mail_setting( 'CONTACT_RECIPIENT', 'bryanceazartabanas@gmail.com' ) );

	if ( ! is_email( $recipient ) ) {
		wp_safe_redirect( add_query_arg( 'contact_status', 'error', $redirect ) . '#contact' );
		exit;
	}

	$mail_subject = sprintf(
		/* translators: %s: contact form subject. */
		__( 'Portfolio contact: %s', 'usable-starter' ),
		$subject
	);
	$mail_body = sprintf(
		"Name: %s\nEmail: %s\nSubject: %s\n\nMessage:\n%s",
		$name,
		$email,
		$subject,
		$message
	);
	$headers = array(
		'Reply-To: ' . $name . ' <' . $email . '>',
		'Content-Type: text/plain; charset=UTF-8',
	);

	$sent = wp_mail( $recipient, $mail_subject, $mail_body, $headers );

	wp_safe_redirect( add_query_arg( 'contact_status', $sent ? 'success' : 'error', $redirect ) . '#contact' );
	exit;
}
