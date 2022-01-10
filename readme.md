=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.0
Tested up to: 5.8
Stable tag: 2.39.1
Requires PHP: 7.0
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

### [2.39.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.39.0...v2.39.1) (2021-12-07)


#### Bug Fixes

* Missing replacement of lower case VAT-text ([5e2b83b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5e2b83b063236335d02739f399732e4659d0d57b))

### [2.39.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.38.2...v2.39.0) (2021-11-24)


#### Features

* Added MNNaturalize to make strings and numbers sortable in a better way ([2b45e0e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2b45e0e5102b78ca90148b7dd338f86f03705d78))


#### Bug Fixes

* Fixed sorting of events ([125daeb](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/125daebe66e2c1d0153d151704422975f7197fa5))


#### Refactoring

* Simplified reading of the code ([008f472](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/008f47245337a0eda111134c596c3509ecd4e303))

### [2.38.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.38.1...v2.38.2) (2021-11-09)


#### Bug Fixes

* Fixed VAT-text to be uppercase ([7878cbd](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7878cbddca383d05e5b132a61258c33b33a30765))

### [2.38.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.38.0...v2.38.1) (2021-11-05)


#### Bug Fixes

* **Course booking:** Filtering available events, to not include events that are fully booked. ([bf014de](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/bf014de3e99db0ad6b9c7a5a71c505d8e5371bb5))
* **Course booking:** If the end user visits the booking page without a selected event, select it in the dropdown, if available ([0ec0db0](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0ec0db0e1363926f3d85068918d62304ad4164a9)), closes [#405](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/405)
* **Documentation:** Added CNAME file in static-folder for GitHub Pages, fixed paths in config ([2f8cc2b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2f8cc2bd683b84353e1b101b9a1fb9994291c3cd))
* **Programme:** Fixed so that duplicate sort index-keys won't remove courses. ([578a636](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/578a63650d0feef595b2c26793127c34523b0f7b))


#### Refactoring

* **Changelog:** Added .versionrc file to repo, so that we get more info in the changelog depending on what we've done ([e342b02](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e342b028760544dd6bcc2e781e5d574e9f49d636))
* Migrated documentation to new version of Docusaurus. ([44fafce](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/44fafce999ca25f61349096fe19eb68627fc8c3a))


