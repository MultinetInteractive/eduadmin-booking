=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 4.9
Tested up to: 5.5
Stable tag: 2.26.1
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

### [2.26.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.26.0...v2.26.1) (2020-09-17)


#### Bug Fixes

* Additional fix for old version of PHP cookies. ([118870e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/118870e4d3d06a617366fde19eaa48b83ec1d698))
* Sorting programme events by ProgrammeCourseSortIndex ([b2f7bd4](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b2f7bd465f84a857813331d4705ef5e7bea4cdde))

### [2.26.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.25.0...v2.26.0) (2020-09-17)

#### Features

* Added support to make the search form react on query parameters as well, and not only posted variables. ([45b3fb2](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/45b3fb25d8f2003b942e43e0e8c0b26c956ec337))


#### Bug Fixes

* Removed unused $_COOKIE, since everything works through EDU()->session now ([4a31776](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/4a31776992adb8b9e36875ca138b15f7dc664d13))
* Rewrote session/cookie lib to work with samesite and other things.. ([47c5fda](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/47c5fda02b9cf20698816a9059e4e884cb25232e))

### [2.25.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.24.4...v2.25.0) (2020-08-27)

#### Features


* Added ability to post coupon codes on programme bookings as well. ([3852568](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3852568443961b1b079bac1e06231c474a59b515)), closes [#349](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/349)

#### Bug Fixes

* Fixes missing CSS for required participant fields ([5867ba5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5867ba500ecc76f99ee0859249529233cfad9fe5)), closes [#350](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/350)

### [2.24.4](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.24.3...v2.24.4) (2020-08-24)


#### Bug Fixes

* Fixes required-fields-bug that was introduced when we started adding the `data-required` attribute since hidden required-fields was bad practice ([c39bce1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c39bce161cbb8caef3621f7973631edd2e3ccfd5))

=======

