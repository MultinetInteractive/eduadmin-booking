=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 4.9
Tested up to: 5.5
Stable tag: 2.28.0
Requires PHP: 5.2
License: GPL3
License-URI: https://www.gnu.org/licenses/gpl-3.0.en.html
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

= 2.0 =
We have replaced everything with a new API-client, so some things may be broken. If you experience any bugs (not new feature-requests), please contact the MultiNet Support.
If you notice that your API key doesn't work any more, you have to contact us.

== Changelog ==

The full changelog available on https://github.com/MultinetInteractive/EduAdmin-WordPress/blob/production/CHANGELOG.md

### [2.28.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.27.0...v2.28.0) (2020-11-23)


#### Features

* Added method for MultiNet to fetch diagnostics info ([94e20f1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/94e20f12f1097e5acc15cef61df25f922bff568b))

### [2.27.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.26.2...v2.27.0) (2020-11-19)


#### Features

* Added basic support for reCAPTCHA v2 Checkbox. (Only booking form, not interest registration) ref [#157](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/157) ([b357789](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b3577894ba092b5cfad23883ddca58f6b50bfefc))
* Added more honeypots to booking form ([6efadc1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6efadc1c569ff4c01041392a02556ac9fb8f7d62)), closes [#157](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/157)

### [2.26.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.26.1...v2.26.2) (2020-10-26)


#### Bug Fixes

* Fixing date output in detail template ([25f64ab](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/25f64abdeddce2e8490ec8774c6f19f281112950))
* Hiding warnings from inability of setting headers ([6557b10](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6557b10f7079cb4ae1ef6a78ed09381f06d1d2a4))

### [2.26.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.26.0...v2.26.1) (2020-09-17)


#### Bug Fixes

* Additional fix for old version of PHP cookies. ([118870e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/118870e4d3d06a617366fde19eaa48b83ec1d698))
* Sorting programme events by ProgrammeCourseSortIndex ([b2f7bd4](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b2f7bd465f84a857813331d4705ef5e7bea4cdde))


