=== SaaS Flow ===

Contributors: saasflow
Tags: saas, landing-page, scrollytelling, bento-grid, glassmorphism, one-column, custom-menu
Requires at least: 6.0
Tested up to: 6.7
Requires PHP: 8.0
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A lightweight, high-performance WordPress theme with modern scrolling behaviors —
sticky scrollytelling, glassmorphism navbar, infinite logo marquee, and asymmetric
bento grids. Zero dependencies on Bootstrap, jQuery, or page builders.


== Description ==

SaaS Flow is a developer-friendly WordPress theme built for SaaS landing pages.
It replicates the premium scrolling behaviors found on sites like Elementor.com,
using only native WordPress standards, vanilla JavaScript, and CSS custom properties.

**Key Features:**

* **Glassmorphism Navbar** — Starts transparent over the hero, transitions to a
  frosted-glass effect on scroll (>50px).
* **100vh Hero** — Full viewport hero with video background support and fade-up
  text animations driven by IntersectionObserver.
* **Infinite Logo Marquee** — Pure CSS infinite scroll for client/partner logos.
  Pauses on hover. No JavaScript required.
* **Sticky Scrollytelling** — A split-layout section where the left sidebar stays
  fixed while the right column of cards scrolls past. Automatically stacks
  vertically on mobile for full readability.
* **Bento Grid** — Asymmetric CSS Grid layout for feature highlights. Supports
  wide (2-col), tall (2-row), and featured (2×2) card variants.
* **CSS Variables** — Entire design token system lives in `:root`. Change colors,
  fonts, spacing, and radii in one place to re-skin the theme.
* **Mobile-First Responsive** — CSS Grid + Flexbox layout with breakpoints at
  480px, 768px, and 1024px.
* **Accessibility** — Skip-to-content link, semantic HTML5 landmarks, ARIA labels,
  keyboard-navigable mobile menu.


== Installation ==

1. Download the `saas-flow` folder (or the `.zip` archive).
2. In your WordPress admin, go to **Appearance → Themes → Add New → Upload Theme**.
3. Upload the `saas-flow.zip` file and click **Install Now**.
4. Activate the theme.
5. Go to **Settings → Reading** and set "Your homepage displays" to
   **A static page**, then choose any page as your homepage. The theme will
   automatically use `front-page.php` for that page.
6. Go to **Appearance → Menus** to create and assign your Primary Menu.
7. Go to **Appearance → Widgets** to populate the four footer columns.

**Manual installation (FTP/SSH):**

1. Upload the `saas-flow` folder to `/wp-content/themes/`.
2. Activate via **Appearance → Themes**.


== Configuring the Sticky Scrollytelling Section ==

The sticky behavior is handled entirely with CSS (no JavaScript). To customize it:

**Changing the sticky offset (distance from top of viewport):**

Open `style.css` and find:

    .sf-scrollytelling__sidebar {
        position: sticky;
        top: 100px;
        ...
    }

Change `top: 100px` to your desired offset. A value of `100px` accounts for the
72px navbar height plus 28px breathing room. If you change the navbar height
(via `--nav-height`), update this value accordingly.

**Changing the overall section height (scroll distance):**

The scroll distance is determined by the number and height of cards in the right
column (`.sf-scrollytelling__content`). To increase scroll distance:

* Add more cards inside `.sf-scrollytelling__content`.
* Increase the padding/margin on `.sf-scrollytelling__card`.
* Add `min-height` to individual cards.

The sidebar will remain sticky as long as the right column is taller than the
viewport. Once the section scrolls past, the sidebar scrolls away naturally.

**Disabling sticky on specific breakpoints:**

The sticky behavior is already disabled on mobile (< 768px) via:

    @media (max-width: 768px) {
        .sf-scrollytelling__sidebar {
            position: static;
            ...
        }
    }

To disable on tablet as well, add the same override inside the 1024px media query.


== Adding a Hero Video ==

1. Create a folder: `saas-flow/assets/video/`.
2. Place your video file there (recommended: MP4, 1920×1080, under 8 MB).
3. The `front-page.php` template references `assets/video/hero-bg.mp4`.
   Rename your file to match, or update the `<source>` path in the template.

Tip: For performance, also provide a WebM version and add a second `<source>` tag.


== Replacing Hardcoded Content with ACF ==

The `front-page.php` template uses hardcoded placeholder text so you can see the
layout immediately. To make sections editable:

1. Install Advanced Custom Fields (ACF).
2. Create field groups for each section (Hero, Marquee, Scrollytelling, Bento).
3. Replace `esc_html_e(...)` calls with `the_field(...)` or `get_field(...)`.
4. Alternatively, convert each section into an ACF Block registered via
   `acf_register_block_type()` in `functions.php`.


== File Structure ==

    saas-flow/
    ├── style.css              — Theme stylesheet (reset, variables, components)
    ├── functions.php          — Theme setup, enqueue, menus, widgets
    ├── header.php             — <head>, navbar, skip link
    ├── footer.php             — 4-column footer, copyright, social links
    ├── front-page.php         — Landing page (Hero, Marquee, Sticky, Bento)
    ├── README.txt             — This file
    └── assets/
        ├── js/
        │   └── main.js        — Sticky header, mobile menu, IntersectionObserver
        ├── images/            — Place logo/image assets here
        └── video/             — Place hero background video here


== Browser Support ==

* Chrome / Edge 88+
* Firefox 78+
* Safari 14+
* iOS Safari 14+
* Samsung Internet 15+

The theme uses `IntersectionObserver`, `backdrop-filter`, CSS `clamp()`, and
CSS Grid — all well-supported in modern browsers. A graceful fallback is included
for browsers that do not support `IntersectionObserver` (elements render visible
immediately).


== Changelog ==

= 1.0.0 — 2025-01-01 =
* Initial release.
* Glassmorphism sticky navbar with scroll detection.
* Full-viewport hero section with video background support.
* Pure CSS infinite logo marquee.
* Sticky scrollytelling split layout (desktop) with vertical stack (mobile).
* Asymmetric bento grid for feature highlights.
* 4-column widgetized footer.
* Mobile-first responsive design (480px / 768px / 1024px breakpoints).
* IntersectionObserver-driven scroll animations with stagger support.
* Extensive CSS custom properties for easy theming.
* WordPress Coding Standards compliant PHP.


== Credits ==

* Inter typeface by Rasmus Andersson — https://rsms.me/inter/ (SIL Open Font License)
* SVG icons adapted from Feather Icons — https://feathericons.com/ (MIT License)
* Brand SVG logos used as placeholders for the marquee section.
