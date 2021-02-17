=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.0
Tested up to: 5.6
Stable tag: 2.32.2
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

### [2.32.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.32.1...v2.32.2) (2021-02-17)

### [2.32.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.32.0...v2.32.1) (2021-02-17)


#### Bug Fixes

* Added extra check for Events in the booking form, so we can detect if there are any available events or not. fixes [#377](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/377) ([ac5df01](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ac5df01b2da5c64d302bbde6af7a9928cdf96b4f))

### [2.32.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.31.0...v2.32.0) (2021-02-09)


#### Features

* The return of the Info text-field. fixes [#375](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/375) ([3d4644d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3d4644df31d2013b7ccaa1bc9a943768988160cd))

### [2.31.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.30.1...v2.31.0) (2021-02-08)


#### Features

* Added separation of expired/used up limited discount cards. fixes [#373](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/373) ([6aca7d0](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6aca7d090a0c07ee6bf6d3972013dc7e9f1c2370))


