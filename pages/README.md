# Theme Pages

Put code-based page content in this folder.

- `homepage.php` is loaded by `front-page.php`.
- Any normal WordPress page can use a matching file by slug. For example, a page with the slug `about` will load `pages/about.php`.

These files are theme templates, so write PHP/HTML here instead of building the page content in the WordPress editor.

Keep reusable sections in `template-parts/sections/`, then include them from page files with `get_template_part()`.
