=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 4.9
Tested up to: 5.3
Stable tag: 2.21.0
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

## [2.21.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.20.0...v2.21.0) (2020-08-10)


### Features

* Added CSS-classes to interest registration pages. ([9916936](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9916936624d542562e2b431b5c6a9038e1786027)), closes [#329](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/329)
* Removed requirement for number of participants on interest registrations. ([3de2847](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3de28470bf3374305094620453b4550ac64e1383)), closes [#328](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/328)

## [2.20.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.19.7...v2.20.0) (2020-08-06)


### Features

* Added Programme-image to detail view. ([b3cc17c](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b3cc17cd0b4aca2ecef508bc3b4a58f4241bad1e)), closes [#330](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/330)

### [2.19.7](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.19.6...v2.19.7) (2020-07-15)


### Bug Fixes

* Found an instance where we shouldn't add the timezone to the dates, because.. it's impossible. ([29c75df](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/29c75dfe9c45e97ad0356ff3b85ccc3e14740674))

### [2.19.6](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.19.5...v2.19.6) (2020-07-15)


### Bug Fixes

* Rolling with our own date methods, since the built in didn't do what I expected ([e57e2dc](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e57e2dc5c046edb8127d758078465dc1c215330b))


