=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.0
Tested up to: 5.7
Stable tag: 2.35.0
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

### [2.35.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.34.1...v2.35.0) (2021-04-08)


#### Features

* Use SortIndex on custom fields ([2d1c15c](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2d1c15c56f3a05d97593d291141e5ccb8c0b232c))

### [2.34.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.34.0...v2.34.1) (2021-04-08)


#### Bug Fixes

* Update tested to-variable ([7887b1a](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7887b1a547b3218f7fc2dc0ca8bd00502b64510b))

### [2.34.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.33.1...v2.34.0) (2021-04-08)


#### Features

* Book-button now also opens modal with form for programmes ([208d335](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/208d33537ecdb54c3bf0cf6fab4a7addfef63baf))
* Programme booking should use booking form if possible ([3bd9938](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3bd993889d1ec660c7c10ebd1c63c036e014400f))

### [2.33.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.33.0...v2.33.1) (2021-04-07)


#### Bug Fixes

* Fixed render info text-function (still not fully converted from old soap) ([4979469](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/49794693913ce6d7c15647f5272572771f279828))
* Remove [@headers](https://github.com/headers) as well ([7567aa5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7567aa53cd13a2aaaf40b32e1372acb2860a2bbe))


