# [CLIENT NAME] — WordPress Theme

**Version:** 1.0  
**Author:** Ben Ervine / [Bonsai Digital Collective](https://bonsaidigitalcollective.co.uk/)  
**Base Theme:** Bonsai Base Theme  
**Text Domain:** `bonsai-base-theme`

---

## Overview

This repository contains the bespoke WordPress theme for **[CLIENT NAME]**, built on top of the **Bonsai Base Theme** by [Bonsai Digital Collective](https://bonsaidigitalcollective.co.uk/).

The theme provides:

- A flexible, ACF-powered page builder
- Site-wide options for SEO, branding and system files (robots.txt / humans.txt)
- Clean, secure and performance-focused PHP, HTML, CSS and jQuery

It is intended for use within Bonsai-managed environments only.

See full release history in [CHANGELOG.md](CHANGELOG.md).

---

## Developers

- **Lead Developer:** [Ben Ervine](https://realityhouse.co.uk)  
- **Main Designer:** [NAME](URL)  
- **Support Designer:** [NAME]
- **Agency:** [Bonsai Digital Collective](https://bonsaidigitalcollective.co.uk/) 

---

## Requirements

- **WordPress:** 6.0+  
- **PHP:** 8.0+ (recommended)  
- **Database:** MySQL 5.7+ or MariaDB equivalent  

---

## Theme Structure

Key directories:

- `/assets/` – Compiled CSS, JS, images, fonts  
- `/inc/` – Theme setup, security, ACF configuration, helpers, Gutenberg/editor tweaks  
- `/template-parts/` – Reusable partials (header, footer, modules, flexible layouts)  
- `/acf-json/` – ACF Local JSON field group definitions  

---

## Features

- Custom WordPress theme built from scratch  
- Fully compatible with **Advanced Custom Fields (ACF Pro)**  
- Modular and reusable template structure  
- Accessible front-end markup (WCAG compliant)  
- Secure, DRY PHP architecture  
- Ready for integration with:
  - Cookie compliance tools (e.g., Cookiebot / CookieScript)
  - Google Analytics 4 + Tag Manager
  - SEO plugins (e.g., RankMath / Yoast)
- PageSpeed and Core Web Vitals optimized  

---

## ACF & Content Model

This theme is built around **Advanced Custom Fields Pro**.

### 1. Local JSON (`/acf-json/`)

- All ACF field groups are saved to `/acf-json/` via ACF Local JSON.
- When pulling the project onto a new environment:
  1. Activate the theme and ACF Pro.
  2. Go to **Custom Fields → Field Groups**.
  3. Click **Sync available** to import any JSON changes.

This keeps field definitions version-controlled and consistent across environments.

---

## Security & Performance

- Follows WordPress security best practices (nonces, sanitization, escaping)  
- Supports modern security headers (CSP, HSTS, Referrer Policy)  
- Lazy loading and responsive images  
- Minimal external dependencies

---

## Notes

This theme is maintained as a private Bonsai Digital Collective asset.

Any refactors or new modules should:
- Use existing ACF patterns where possible (page builder layouts, options pages).
- Avoid introducing plugin functionality that duplicates what the theme already provides.
- Follow WordPress coding standards (escaping, sanitisation, nonces, capability checks).

---

## License

**Private License — All Rights Reserved.**  
Developed exclusively for **The Bonsai Digital Collective** and its clients.  
Do not distribute or reuse without written permission.

---

## Changelog

**v1.0 — Initial Release**  
- Base theme structure  
- ACF flexible layout support  
- Core setup, enqueue, and security functions added  

---

© The Bonsai Digital Collective / Ben Ervine. All Rights Reserved.
