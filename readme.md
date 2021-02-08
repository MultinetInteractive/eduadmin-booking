=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.0
Tested up to: 5.6
Stable tag: 2.31.0
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

### [2.31.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.30.1...v2.31.0) (2021-02-08)


#### Features

* Added separation of expired/used up limited discount cards. fixes [#373](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/373) ([6aca7d0](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6aca7d090a0c07ee6bf6d3972013dc7e9f1c2370))

### [2.30.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.30.0...v2.30.1) (2021-01-15)


#### Bug Fixes

* Removed the strange occurrence of a closing div-tag. fixes [#371](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/371) ([b187e1c](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b187e1c4dea873d15d0a2eecfbf4512e9fff7df3))

### [2.30.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.29.1...v2.30.0) (2020-12-10)


#### Features

* Added some protection against booking events that have already past their start date ([03a5423](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/03a542306926c767d056d7e2001a2d821e51e3a1)), closes [#357](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/357)

### [2.29.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.29.0...v2.29.1) (2020-12-10)


#### Bug Fixes

* And same fix for Programme bookings (not being able to create WP-users) ([1b017a7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/1b017a780752dc00b7025e65456c16bcb8074713))


