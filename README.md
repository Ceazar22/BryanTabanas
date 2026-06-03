# Usable Starter WordPress Theme

A reusable classic WordPress starter theme focused on clean theme functions, safer defaults, and page-template driven project builds.

## What Is Included

- Core templates: `index.php`, `page.php`, `single.php`, `archive.php`, `search.php`, `404.php`
- Layout partials: `header.php`, `footer.php`, `sidebar.php`, `comments.php`, `searchform.php`
- Template parts in `template-parts/`
- Page templates in `page-templates/`
- Theme setup split into `inc/`
- Frontend assets in `assets/css/` and `assets/js/`

## Security Defaults

The theme adds practical public-layer hardening in `inc/security.php`:

- Prevents direct PHP file access with `ABSPATH` checks.
- Removes generator and legacy discovery metadata from the page head.
- Adds conservative frontend response headers.
- Makes login errors generic.
- Disables XML-RPC by default.
- Removes risky upload mime types such as SVG, PHP, HTML, JS, and executable files.
- Provides `usable_starter_verify_post_nonce()` for future custom forms.

If a future project needs XML-RPC, SVG uploads, or a more specific content security policy, adjust those rules intentionally in `inc/security.php`.

## Creating Pages

Create normal WordPress Pages and choose a template from the Page Attributes panel:

- `Full Width Page`: general page layout without sidebar.
- `Landing Page`: large intro section plus page content.

For a new project-specific page template:

1. Copy one file from `page-templates/`.
2. Rename it for the page purpose.
3. Update the `Template Name` comment.
4. Keep output escaped with `esc_html()`, `esc_attr()`, `esc_url()`, or `wp_kses_post()` as appropriate.

## Development Notes

- `functions.php` only bootstraps the theme. Add new setup files inside `inc/` and require them there.
- Use `wp_enqueue_script()` and `wp_enqueue_style()` in `inc/assets.php`; do not hardcode asset tags in templates.
- Keep custom form processing nonce-protected and permission-aware.
- Prefer WordPress APIs for sanitizing, escaping, querying, and redirects.

## Contact Form SMTP

The contact form sends through `wp_mail()` and uses SMTP when credentials are set in `inc/smtp-config.php`, `wp-config.php`, or environment variables.

`inc/smtp-config.php` is ignored by git and guarded against direct browser access. Use `inc/smtp-config.example.php` as the template.

```php
define( 'USABLE_STARTER_SMTP_HOST', 'smtp.example.com' );
define( 'USABLE_STARTER_SMTP_PORT', 587 );
define( 'USABLE_STARTER_SMTP_USER', 'your-smtp-username' );
define( 'USABLE_STARTER_SMTP_PASS', 'your-smtp-password' );
define( 'USABLE_STARTER_SMTP_SECURE', 'tls' );
define( 'USABLE_STARTER_SMTP_FROM', 'verified-sender@example.com' );
define( 'USABLE_STARTER_SMTP_FROM_NAME', 'Bryan Ceazar Tabanas' );
define( 'USABLE_STARTER_CONTACT_RECIPIENT', 'bryanceazartabanas@gmail.com' );
```

The same names also work as environment variables. Use a sender email verified by your SMTP provider.
