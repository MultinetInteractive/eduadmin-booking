=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.8
Tested up to: 6.0.0
Stable tag: 3.5.4
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

### [3.5.4](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.5.3...v3.5.4) (2022-12-20)


#### Bug Fixes

* **Dates:** If there's only a single day, we should always show the times ([e58c962](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e58c962887c7181db5ee6e5b9c7ea0f0f62c3fd6))

### [3.5.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.5.2...v3.5.3) (2022-12-12)


#### Bug Fixes

* NIL is no longer available in PHP for some reason. ([c45b30e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c45b30e2b410b35d5dcca06a14573b79a194722a))

### [3.5.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.5.1...v3.5.2) (2022-12-08)


#### Bug Fixes

* Pluralization, and visible time ([e84e5bd](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e84e5bd40ba4f1f087e0a33dd6822b74bd3607a0))

### [3.5.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.5.0...v3.5.1) (2022-09-26)


#### Bug Fixes

* **Booking:** Properly handle vouchers ([f2479c5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f2479c5411b51779c8256bdf87e7da84715a1043)), closes [#458](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/458)



