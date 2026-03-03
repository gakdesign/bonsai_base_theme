# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/)
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

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