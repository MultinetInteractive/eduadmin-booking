=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.8
Tested up to: 6.3.0
Stable tag: 3.6.2
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

### [3.6.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.6.1...v3.6.2) (2023-05-05)


#### Bug Fixes

* **Booking page:** Fixed so that price recalculation will be done when you click a Discount Card. ([7847bda](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7847bda741019eea3c7dcf2e728af79f49a96f0a)), closes [#479](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/479)


#### Security

* Update packages to get rid of vulns ([acd5bfd](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/acd5bfd9538df4079a8612630d3bc6cfe4ac9e04))

### [3.6.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.6.0...v3.6.1) (2023-04-04)


#### Bug Fixes

* **List View:** Use mb_stripos the right way when filtering for cities ([ac1bfa7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ac1bfa7fdb7736ae28e0ffcc325a2fb6253d8b21))

### [3.6.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.5.6...v3.6.0) (2023-01-30)


#### Features

* **Profile/Login:** Added setting to disable the login redirect to referring page, so it goes directly to the normal profile ([b038ee0](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b038ee03f575bcb2f03d8ab56524e99ba329c134)), closes [#470](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/470)

### [3.5.6](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.5.5...v3.5.6) (2023-01-17)


#### Bug Fixes

* **Forms:** Added `maxlength` to most form items, that matches the API specification. ([039631b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/039631b109aafb8c77578de676d36f8868e45037)), closes [#468](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/468)



