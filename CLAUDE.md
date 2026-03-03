# CLAUDE.md — Spencer and Bates

## Global Context
@C:\Users\thebe\.claude\CLAUDE.md

---

## Project Overview

Bespoke WordPress theme for **Spencer and Bates**, built on the **Bonsai Base Theme** by The Bonsai Digital Collective. There is no build system — CSS and JS are authored and served directly (no Sass, no bundler, no npm).

**Requirements:** WordPress 6.0+, PHP 8.0+, ACF Pro (required — the theme will not function without it).

**Local development** runs via LocalWP. The site root relative to this theme is three levels up: `site/app/public/`.

---

## Architecture

### `functions.php` — Module Loader

`functions.php` only defines two constants (`BONSAI_THEME_DIR`, `BONSAI_THEME_URI`) and then `require_once`s every file in `/inc/`. Add new functionality by creating a new file in `/inc/` and adding its name (without `.php`) to the `$modules` array.

### ACF Flexible Content Page Builder

This is the core content system. The page builder field (`page_builder`) is an ACF Flexible Content field. Its layouts map directly to files:

- **PHP template:** `template-parts/modules/{layout_name}.php`
- **CSS:** `assets/css/modules/{layout_name}.css`

The dispatcher is `template-parts/modules/page-builder.php`. For each active layout row it:
1. Looks up `assets/css/modules/{layout}.css` and enqueues it on demand (child-theme-first via `get_theme_file_path()`).
2. Resolves the PHP template via `locate_template()` (also child-theme-first).

**To create a new module:**
1. Add a new layout to the `page_builder` ACF Flexible Content field (field group: `group_677bab909515c.json`).
2. Create `template-parts/modules/{layout_name}.php`.
3. Create `assets/css/modules/{layout_name}.css` (copy `BLANK.css` as a starting point).
4. Sync ACF JSON: WP Admin → Custom Fields → Field Groups → Sync available.

---

## CSS Structure

| File | Purpose |
|------|---------|
| `assets/css/core/base.css` | Global base styles |
| `assets/css/core/header.css` | Header styles |
| `assets/css/core/footer.css` | Footer styles |
| `assets/css/core/additions.css` | Utility additions |
| `assets/css/colour-scheme.css` | WP admin colour scheme (`#000000` + `#ee4367`) |
| `assets/css/bootstrap-custom.min.css` | Bootstrap grid/utilities (custom build) |
| `assets/css/modules/BLANK.css` | Template for new module CSS files |

- All module CSS is lazy-enqueued — only modules present on a given page are loaded
- Module CSS breakpoints: **1536, 1366, 1280, 992, 768, 600px** (follow `BLANK.css` pattern)
- Never use `!important` without flagging it

---

## JavaScript

All custom JS lives in `assets/js/main.js` (jQuery, loaded in footer). It handles:
- Mobile menu toggle (`#trigger`)
- Room bookings off-canvas toggle (`#bookings-open`)
- Slick slider instances (`.slider-for`, `.featured-gateway`, `.image-slider-module`, `.whats-on-slider`, `.details-slider`, `.galleryslider-for` / `.galleryslider-nav`)
- Simple accordion (`.accordion-header` / `.accordion-content`)
- Dark/light mode toggle (`.switches`)
- Adaptive content for breakpoints (`.show-900` / `.hide-900`)
- Footer height adjustment and sticky footer logic

AOS animations and page fade-in are present but commented out.

Third-party JS: `assets/js/slick.js`, `assets/js/bootstrap.bundle.min.js`.

**Never add inline JS — always add to `assets/js/main.js` and enqueue via `wp_enqueue_scripts`.**

---

## ACF Field Groups (`/acf-json/`)

| File | Contents |
|------|---------|
| `group_64525a8b8885f.json` | Theme Settings options (logos, contact info, socials, copyright) |
| `group_677bab909515c.json` | Page Builder flexible content layouts |
| `group_6881f94ae87b3.json` | Additional field group (check file for details) |
| `post_type_69a5b102331cf.json` | Custom post type: `team` |
| `post_type_69a5b1161311f.json` | Custom post type: `case-study` |

After pulling changes always go to **Custom Fields → Field Groups → Sync available**.

---

## ACF Options Pages

Registered in `inc/acf.php`:
- **Site Settings** (`theme-general-settings`) — logos, contact details, social URLs, copyright text
- **Humans.txt** (`site-text-files`) — editable humans.txt content

Access options page fields with `get_field('field_name', 'option')`.

---

## Navigation Menus

Registered in `inc/theme-setup.php`: `primary`, `mobile`, `footer`, `legal`.
Footer template also references `footer_what` and `footer_about` — register these if used.

---

## Custom Post Types

Registered via ACF (not PHP): `team` and `case-study`.
Built-in `post` type is relabelled to **News** via `inc/post-labels.php`.
`accommodation` post type expected by `inc/assets.php` — SiteMinder IBE widget conditionally enqueued on `single-accommodation`.

---

## Key `inc/` Files

| File | What it does |
|------|-------------|
| `assets.php` | Enqueues all styles and scripts; loads Google Font (Cormorant Garamond) |
| `gutenberg.php` | Disables Gutenberg for all post types; removes block CSS |
| `security.php` | Strips WP version, disables XML-RPC; auto-update suppression via `BONSAI_DISABLE_AUTO_UPDATES` |
| `helpers.php` | `bonsai_get_trimmed_excerpt($word_limit)` and `bonsai_get_trimmed_content($word_limit)` |
| `media.php` | SVG sanitisation, WebP support, email obfuscation, lazy loading |
| `header.php` | Adds mobile/SEO meta tags at priority 0 in `wp_head` |
| `acf-json.php` | Redirects ACF JSON save/load to `/acf-json/` |

---

## Coding Conventions

- Follow WordPress coding standards — always escape output, sanitise input, nonces where appropriate
- Use `get_field()` / `the_field()` for ACF — pass `'option'` for options page fields
- Use `get_theme_file_path()` / `get_theme_file_uri()` — not `get_template_directory()` — for child-theme override support
- New PHP helper functions go in `inc/helpers.php` prefixed `bonsai_`
- Always assume child theme — never edit parent theme files directly

---

## Agents to Use on This Project

Invoke these agents in Claude Code for specific tasks:

| Task | Agent |
|------|-------|
| Writing or reviewing PHP/CSS/JS | `Use the wp-developer agent` |
| Monthly client report | `Use the client-reporter agent` |
| GDPR/cookie/accessibility audit | `Use the compliance-checker agent` |

---

## CHANGELOG

Keep `CHANGELOG.md` updated using [Keep a Changelog](https://keepachangelog.com/en/1.1.0/) format with Semantic Versioning.
