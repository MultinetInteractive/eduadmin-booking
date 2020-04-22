=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 4.9
Tested up to: 5.3
Stable tag: 2.18.1
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

### [2.18.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.18.0...v2.18.1) (2020-04-22)


### Bug Fixes

* Changing how we verify the nonce while paying. ([ce6027e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ce6027e287314a8cbb26c87f23e6d34fe904a9dc))

## [2.18.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.17.1...v2.18.0) (2020-04-14)


### Features

* Added canonical URL for programme as well ([9be5bff](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9be5bff2d25dfd67625a2c8a13b0396b4d9ef45d))
* Setting canonical URLs for detail/booking ([cbfec72](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/cbfec7218d5e3d53482f80365ac397eb0104d979))

### [2.17.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.17.0...v2.17.1) (2020-04-06)


### Bug Fixes

* **css:** Changed from `flex: 1` to `flex: auto`, because IE11 broke otherwise. ([76b681b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/76b681b))

## [2.17.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.16.2...v2.17.0) (2020-03-20)


### Features

* Ability to stop sending confirmation emails ([37f9ff6](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/37f9ff6))


