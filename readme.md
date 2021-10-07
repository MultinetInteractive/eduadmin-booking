=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.0
Tested up to: 5.7
Stable tag: 2.38.0
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

### [2.38.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.37.1...v2.38.0) (2021-10-07)


#### Features

* Added attribute `courseattributehasvalue` to allow a user to check if an attribute/CustomField is set/checked ([79f50d5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/79f50d571f2f2fc6af0ad7ef6e98a70e6bcc8044))
* Added support for `Checkbox` in `courseattributeid`-attribute, that will output a translatable string depending if it's checked or not. ([0ffd5ce](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0ffd5cec0059d41824b1099e3766ee460ebd2f5a))

### [2.37.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.37.0...v2.37.1) (2021-07-29)

### [2.37.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.36.1...v2.37.0) (2021-06-14)


#### Features

* Ability to change who gets the booking confirmations after a completed booking ([d36075a](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d36075a4253fd495c2987fabc4891de4fed29596)), closes [#218](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/218)

### [2.36.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.36.0...v2.36.1) (2021-05-06)


#### Bug Fixes

* Using percent instead of view-width/height. ([e4e58bb](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e4e58bbf5ce1189bca0b8885555858ab490ef797))


