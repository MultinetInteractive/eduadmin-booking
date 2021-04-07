=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.0
Tested up to: 5.6
Stable tag: 2.33.1
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

### [2.33.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.33.0...v2.33.1) (2021-04-07)


#### Bug Fixes

* Fixed render info text-function (still not fully converted from old soap) ([4979469](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/49794693913ce6d7c15647f5272572771f279828))
* Remove [@headers](https://github.com/headers) as well ([7567aa5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7567aa53cd13a2aaaf40b32e1372acb2860a2bbe))

### [2.33.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.32.2...v2.33.0) (2021-03-30)


#### Features

* Added methods to open/close booking form modals ([ccb9067](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ccb906759fdec21837e143a3e8fbe4f991dcf931))
* Added option to switch out the booking form to one from EduAdmin instead ([915dbbf](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/915dbbf8e07ba8c01b0d1bbcb7bbcf7a9f5cd97b))
* Added PaymentTerms, PriceNames to OData and Consent to REST ([c3f7c15](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c3f7c1551fce9c7aaf81fe0c1359bd15911989a4))
* Added styling for the modal popup + backdrop ([c7e0764](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c7e0764af790423d853ad502696a66352feec326))
* Added support for booking form in API calls, so we can get the URL. ([0b70304](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0b703044558d6378688d9f697fcd1c5d2cc8d99c))
* Added support for event lists (listTemplate) to use the new booking form modal ([2645778](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/264577820ff3860f6f70c48b7b958f3a6e3594b8))
* Added support for the detail view to use the new booking form modal ([fae9d24](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/fae9d2460f7005b71d433ff6f133d1c15f4588c1))
* If the company using the plugin tries to use booking forms without configuring them, show an error in the places that would show the form (Modal variant) ([81fe12a](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/81fe12a2e40902b0e4ed40b2c03e79354940e31d))
* Instead of redirecting the users if they are explicitly linked to the booking form page, we'll shove an iframe in there. ([8d0a4e7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/8d0a4e725f5b38b4098d07dd9e4499c4964056b4))
* Making it so that when you activate the plugin, and don't have a booking page selected, we'll set the booking form option to true. ([5b3fe54](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5b3fe54e8d36daaf2599f82571288f7f67176a1d))
* Warn users that booking form needs to be configured in EduAdmin ([9b41947](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9b41947fd7f18c43168c9a3b82eaac75d1bc16e1))

### [2.32.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.32.1...v2.32.2) (2021-02-17)

### [2.32.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.32.0...v2.32.1) (2021-02-17)


#### Bug Fixes

* Added extra check for Events in the booking form, so we can detect if there are any available events or not. fixes [#377](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/377) ([ac5df01](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ac5df01b2da5c64d302bbde6af7a9928cdf96b4f))


