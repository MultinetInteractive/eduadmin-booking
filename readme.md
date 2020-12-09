=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.0
Tested up to: 5.5
Stable tag: 2.28.4
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

### [2.28.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.28.0...v2.28.1) (2020-11-26)


#### Bug Fixes

* Removing double output of start/end time if there's an event with a single day ([d91d2e8](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d91d2e84783525193c24043c15f791327894c52c))


