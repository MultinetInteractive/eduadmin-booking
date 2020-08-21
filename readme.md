=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 4.9
Tested up to: 5.3
Stable tag: 2.24.2
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

### [2.24.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.24.1...v2.24.2) (2020-08-21)


### Bug Fixes

* Force sort on ProgrammeCourseSortIndex to keep the configured sort index in EduAdmin. ([21f1298](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/21f12987d821b5a7b83316e0d06e7eafdc13fe32)), closes [#344](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/344)
* Send confirmation email options on programme bookings as well. ([41ba93b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/41ba93be71a67e8ce46feb1682c5c715b416054c)), closes [#343](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/343)

### [2.24.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.24.0...v2.24.1) (2020-08-21)


### Bug Fixes

* If the MaxNumberParticipants on a programme is 0, we should let people book. ([37ccfba](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/37ccfbafbb4834e5e6084569677d2872d4912bf8)), closes [#339](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/339)
* ParticipantVat is not available on sessions/sub events ([acbfc94](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/acbfc942670f9798b71fdac120ed1d5834d326fe))

## [2.24.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.23.0...v2.24.0) (2020-08-20)


### Features

* Changing how we output prices in accordance to the new setting ([0d56f66](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0d56f66408c823a392dcdc766d1b7067c62cfc6b)), closes [#327](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/327)


### Bug Fixes

* We should allow the use of AddParticipant if it's a programme. ([7a14206](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7a1420616670c35d3e28c525f29787304e629bc6)), closes [#338](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/338)

## [2.23.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.22.1...v2.23.0) (2020-08-17)


### Features

* Use same method of showing dates for programmes as with course days.master ([9cc1948](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9cc19483695854fd35f72397f7ea968d9c2e7ef2)), closes [#319](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/319)


