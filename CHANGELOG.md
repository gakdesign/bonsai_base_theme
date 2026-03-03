# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/)
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Security
- [inc/acf.php] Added ABSPATH guard; renamed `my_acf_op_init` to `bonsai_acf_op_init` and `write_humans_txt_on_save` to `bonsai_write_humans_txt_on_save`; changed Site Settings capability from `edit_posts` to `edit_theme_options`; sanitised humans.txt content with `wp_strip_all_tags()` and `sanitize_textarea_field()` before writing to filesystem
- [inc/acf-json.php] Added `defined('ABSPATH') || exit` guard; switched save path from parent to child theme (`get_stylesheet_directory`); added child-first load path so ACF JSON resolves correctly when a child theme is active
- [inc/gutenberg.php] Added ABSPATH guard; renamed `remove_block_css` to `bonsai_remove_block_css` to avoid function name collision
- [inc/header.php] Added ABSPATH guard; renamed function to `bonsai_add_custom_meta_before_wp_head`; removed redundant `Content-Type` meta tag and both duplicate `X-UA-Compatible` tags (IE/Chrome Frame is EOL)
- [inc/media.php] Added ABSPATH guard; renamed `protect_email_addresses` to `bonsai_protect_email_addresses` to avoid collision
- [inc/assets.php] Added ABSPATH guard; added `jquery`, `slick`, and `bootjs` as explicit dependencies for `main.js`
- [inc/security.php] Added ABSPATH guard; removed `bonsai_remove_query_strings` function and both filter registrations as it negated `filemtime()` cache-busting
- [inc/*.php] Added `defined('ABSPATH') || exit` guard to all remaining `inc/` files: `accessibility`, `cleanup`, `comments`, `content`, `editor`, `frontend`, `helpers`, `lazy-load`, `post-labels`, `rss`, `theme-setup`, `tinymce-styles`, `webp`
- [functions.php] Improved `error_log` message to include theme prefix and use concatenation rather than variable interpolation in a double-quoted string
- [template-parts/modules/page-builder.php] Added ABSPATH guard
- [template-parts/modules/content_module.php] Added ABSPATH guard; escaped all previously unescaped `get_sub_field()` outputs: `text_content_block`, `main_quote`, `content_table`, `text_column_one`, `text_column_two`, `text_column_split` (×2) via `wp_kses_post()`; `quote_citation` via `esc_html()`; `video_file` via `esc_url()`
- [template-parts/modules/meet_the_team_module.php] Added ABSPATH guard; replaced `the_title()` with `esc_html( get_the_title() )`; added `no_found_rows => true` to WP_Query
- [template-parts/modules/case_study_listings_module.php] Added ABSPATH guard; cast `posts_per_page` field with `absint()`; added `no_found_rows => true` to WP_Query; replaced all three `the_permalink()` calls with `esc_url( get_permalink() )`; replaced `the_title()` with `esc_html( get_the_title() )`
- [template-parts/modules/contact_us_module.php] Added ABSPATH guard; corrected mailto href to use `esc_url( 'mailto:' . $contact_email )` instead of `esc_attr`; sanitised shortcode input with `wp_kses( $form_shortcode, [] )` before passing to `do_shortcode()`
- [template-parts/modules/] Added ABSPATH guards to all remaining module files: `home_banner`, `page_banner`, `featured_content`, `featured_content_slider`, `featured_product_categories_gateway`, `image_gallery`, `image_gallery_slider`, `client_stories`, `testimonial`, `faq`, `you_might_also_like`

### Added
- [template-parts/modules/] Added 12 Spencer and Bates–specific page builder modules: `page_banner`, `content_module`, `featured_content`, `featured_content_slider`, `featured_product_categories_gateway`, `image_gallery`, `image_gallery_slider`, `client_stories`, `meet_the_team`, `case_study_listings`, `contact_us`, `you_might_also_like`
- [assets/css/modules/] Added corresponding CSS files for all 12 new modules
- [acf-json/] Added ACF Local JSON field group definitions: Theme Settings, Page Builder layouts, team CPT, case-study CPT, and additional field group
- [CLAUDE.md] Added project-specific Claude Code instructions for Spencer and Bates
- [.claude/] Added Claude Code project configuration directory

### Changed
- [template-parts/modules/home_banner_module.php] Updated home banner module for Spencer and Bates
- [assets/css/modules/home_banner_module.css] Updated home banner styles
- [template-parts/modules/faq_module.php] Updated FAQ module for Spencer and Bates
- [assets/css/modules/faq_module.css] Updated FAQ styles
- [template-parts/modules/testimonial_module.php] Updated testimonials module for Spencer and Bates
- [assets/css/modules/testimonial_module.css] Updated testimonial styles
- [style.css] Updated theme stylesheet

### Removed
- Removed 28 legacy base theme modules not applicable to Spencer and Bates: `accommodation`, `accordian`, `banner`, `block_links`, `booking_embeds`, `breadcrumbs`, `contact_form`, `content_full_width`, `content_image_grid`, `content_introduction`, `content_split_width`, `cta`, `event_details`, `event_listings`, `gallery_slider`, `gateway_blocks`, `gateway_hover`, `gift_voucher_advert`, `gift_voucher`, `google_reviews`, `image_slider`, `join_the_team`, `mailing-list`, `menus`, `opening_hours`, `room_design_details`, `room_details`, `room_listings`, `vacancies`, `whats_on`

## [1.0.0] - 2026-03-01

### Added
- Initial stable release.
- Base theme structure  
- ACF flexible layout support  
- Core setup, enqueue, and security functions added  