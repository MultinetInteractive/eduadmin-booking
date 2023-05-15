=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.8
Tested up to: 6.3.0
Stable tag: 3.7.1
Requires PHP: 7.0
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html

EduAdmin plugin to allow visitors to book courses at your website. Requires EduAdmin-account.

== Description ==

Plugin that you connect to [EduAdmin](https://www.eduadmin.se) to enable booking on your website.

[<img src="https://img.shields.io/wordpress/plugin/v/eduadmin-booking.svg" alt="Plugin version" />](https://wordpress.org/plugins/eduadmin-booking/)
[<img src="https://img.shields.io/wordpress/plugin/dt/eduadmin-booking.svg" alt="Downloads" />](https://wordpress.org/plugins/eduadmin-booking/)
[<img src="https://img.shields.io/wordpress/v/eduadmin-booking.svg" alt="Tested up to" />](https://wordpress.org/plugins/eduadmin-booking/)

[<img src="https://badges.gitter.im/MultinetInteractive/EduAdmin-WordPress.png" alt="Gitter" />](https://gitter.im/MultinetInteractive/EduAdmin-WordPress)
[<img src="https://travis-ci.org/MultinetInteractive/EduAdmin-WordPress.svg?branch=master" alt="Build status" />](https://travis-ci.org/MultinetInteractive/EduAdmin-WordPress)
[<img src="https://scrutinizer-ci.com/g/MultinetInteractive/EduAdmin-WordPress/badges/quality-score.png?b=master" alt="Code quality" />](https://scrutinizer-ci.com/g/MultinetInteractive/EduAdmin-WordPress/?branch=master)

[<img src="https://img.shields.io/github/commits-since/MultinetInteractive/EduAdmin-WordPress/latest.svg" alt="Commits since latest plugin version" />](https://wordpress.org/plugins/eduadmin-booking/)

Requires the following PHP-modules

- php-curl
- php-mbstring

== Installation ==

-   Upload the zip-file (or install from WordPress) and activate the plugin
-   Provide the API key from EduAdmin.
-   Create pages for the different views and give them their shortcodes

== Upgrade Notice ==

= 3.0 =

Styles have been remade for the end user login page, and the booking list page. Please check that any custom styles are still working, or you might need to fix them.

= 2.0 =

We have replaced everything with a new API-client, so some things may be broken. If you experience any bugs (not new feature-requests), please contact the MultiNet Support.
If you notice that your API key doesn't work any more, you have to contact us.

== Changelog ==

The full changelog available on https://github.com/MultinetInteractive/EduAdmin-WordPress/blob/production/CHANGELOG.md

### [3.7.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.7.0...v3.7.1) (2023-05-15)


#### Bug Fixes

* **Documentation:** Fixed a config error for the new version of Docusaurus ([b26c828](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b26c82876ec154b3f1b3374cacd7c57624ad9501))
* Fix for filtering courses/events for the selected city, not just which course templates that has ever had an event there. ([478f75d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/478f75dc364fa3966e272eb361bfb2e0a3703776))

### [3.7.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.6.2...v3.7.0) (2023-05-09)


#### Features

* Added possibility to use attribute `allcourses` to show both on demand and regular course templates at the same time. ([4919f52](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/4919f52a185ba75224653e0f9f8719cab512ecd3)), closes [#478](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/478)

### [3.6.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.6.1...v3.6.2) (2023-05-05)


#### Bug Fixes

* **Booking page:** Fixed so that price recalculation will be done when you click a Discount Card. ([7847bda](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7847bda741019eea3c7dcf2e728af79f49a96f0a)), closes [#479](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/479)


#### Security

* Update packages to get rid of vulns ([acd5bfd](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/acd5bfd9538df4079a8612630d3bc6cfe4ac9e04))

### [3.6.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.6.0...v3.6.1) (2023-04-04)


#### Bug Fixes

* **List View:** Use mb_stripos the right way when filtering for cities ([ac1bfa7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ac1bfa7fdb7736ae28e0ffcc325a2fb6253d8b21))



