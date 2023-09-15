=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.8
Tested up to: 6.3.0
Stable tag: 3.9.0
Requires PHP: 7.0
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html

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

= 3.0 =

Styles have been remade for the end user login page, and the booking list page. Please check that any custom styles are still working, or you might need to fix them.

= 2.0 =

We have replaced everything with a new API-client, so some things may be broken. If you experience any bugs (not new feature-requests), please contact the MultiNet Support.
If you notice that your API key doesn't work any more, you have to contact us.

== Changelog ==

The full changelog available on https://github.com/MultinetInteractive/EduAdmin-WordPress/blob/production/CHANGELOG.md

### [3.9.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.8.1...v3.9.0) (2023-09-15)


#### Features

* New type of script, when you use the booking form in the API. ([92eabd8](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/92eabd85c6d6392e3ce68db769fd60f52258dc77)), closes [#412](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/412)

### [3.8.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.8.0...v3.8.1) (2023-09-08)

### [3.8.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.7.1...v3.8.0) (2023-09-08)


#### Features

* Added actions for showing course/event lists ([2fcdc70](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2fcdc70a71969bbd9e1967e72e615f840321d13d)), closes [#488](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/488)
* Added actions for viewing detail views, booking forms and performing a purchase (not programs) ([a3270b2](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a3270b265919513935f817c87bc259c91877e9db)), closes [#488](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/488)
* Added actions for viewing detail views, booking forms and performing a purchase of programs ([5dee4ec](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5dee4ecc0abf158b98e2d0a63499c953f46a5409)), closes [#488](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/488)
* Added actions for viewing detail views, booking forms and performing a purchase of programs ([d2757b4](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d2757b478c470e8717cc522fe6ee58c86d339f9e)), closes [#488](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/488)


#### Documentation

* Added information about Actions ([2042c70](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2042c7023647eb2e3f09c5d5db0b2faf7bf9d4a5))

### [3.7.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.7.0...v3.7.1) (2023-05-15)


#### Bug Fixes

* **Documentation:** Fixed a config error for the new version of Docusaurus ([b26c828](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b26c82876ec154b3f1b3374cacd7c57624ad9501))
* Fix for filtering courses/events for the selected city, not just which course templates that has ever had an event there. ([478f75d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/478f75dc364fa3966e272eb361bfb2e0a3703776))



