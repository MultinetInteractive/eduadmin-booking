=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 4.9
Tested up to: 5.3
Stable tag: 2.15.1
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

### [2.15.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.15.0...v2.15.1) (2020-03-04)

## [2.15.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.14.1...v2.15.0) (2020-03-04)


### Features

* **ci:** Automatic update of checksum to lessen the amount of mishaps. ([d64a6d3](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d64a6d3))

### [2.14.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.14.0...v2.14.1) (2020-03-03)


### Bug Fixes

* Re-added history.go(-1), because some customers used that ([18d62e4](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/18d62e4))

## [2.14.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.13.1...v2.14.0) (2020-02-24)


### Bug Fixes

* Fixed a logic error in the price computation output. ([b7b6211](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b7b6211))


### Features

* Added data-attributes for courseid and eventid on detail and booking views, so they can be targeted by CSS (if needed). fixes [#297](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/297) ([bd541f7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/bd541f7))


