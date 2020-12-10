=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.0
Tested up to: 5.6
Stable tag: 2.29.0
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

### [2.29.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.28.4...v2.29.0) (2020-12-10)


#### Features

* Added another category for date settings ([2d61b08](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2d61b08b01ffeff69d00250dd630bd5840569cd2))
* Added get_option to main class with our request cache, to speed up fetching same option multiple times per execution/page request ([08721f9](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/08721f99f1d0d4d85220bb476935e7330ef74cbc))
* Added way to restore settings to default values for dates ([bd1b062](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/bd1b06221fffff13b2d92c851230b45901059de1))
* Adding new Date Settings-page ([f6b3296](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f6b329654faaf9ebd687cb2c9e617da15f0416ed))
* Date formatting in list view (events), template A ([dc52908](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/dc52908aa2f5778b869e9c438819f3c82474f5be))
* Date settings applied for list view (event) ([309398e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/309398eeeab6c949fa6775954954c3085b44b4c0))
* Fixed template B event list. ([783082d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/783082dc52a7c0bc8339ab06ed927de3a1b0a516))
* Remade some options in the date settings page, added method to output event dates that listens to the options ([79482c2](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/79482c27335ebd9a086a1ab2a245d62400dffa8a)), closes [#254](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/254) [#356](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/356) [#354](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/354)


#### Bug Fixes

* Fixed a bug where the ParticipantVat went missing after an ajax reload in event lists (listview, not detail) ([34d7976](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/34d79768a70eaf8c2ab325c6249a41518fbb65a6))
* Move robot-check into the other checks first, to not block creation of users in WP ([3dbd5e7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3dbd5e75d2a7850a8812b48ffed5ba5e54da5ec0))

### [2.28.4](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.28.3...v2.28.4) (2020-12-02)


#### Bug Fixes

* Added permission_callback to register_rest_route (Thanks wordpress, I hate you) ([50859d2](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/50859d21c7a55b2e49683fbe065328d031eb626d))

### [2.28.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.28.2...v2.28.3) (2020-11-30)


#### Bug Fixes

* Hide the captcha-fields on all devices. ([1def084](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/1def0842f4bd0d77c6b61d420f5ba243eef73315))

### [2.28.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.28.1...v2.28.2) (2020-11-27)


#### Bug Fixes

* Added extra check for reCAPTCHA in javascript, since sites can load multiple recaptchas. ([3dd86df](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3dd86dfed1cb22124a77d02c88a4cd0af1f8a999))
* Fixed question handling for radio buttons ([4b61b73](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/4b61b73264bb813fd66eb9213c768aaf9e93e634))


