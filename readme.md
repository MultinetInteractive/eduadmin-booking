=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 4.7
Tested up to: 4.9
Stable tag: 2.0.16
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

== Installation ==

-   Upload the zip-file (or install from WordPress) and activate the plugin
-   Provide the API key from EduAdmin.
-   Create pages for the different views and give them their shortcodes

== Upgrade Notice ==

= 2.0 =
We have replaced everything with a new API-client, so some things may be broken. If you experience any bugs (not new feature-requests), please contact the MultiNet Support.
If you notice that your API key doesn't work any more, you have to contact us.

== Changelog ==

### 2.0.16
-   fix: Validation of answers were changed in the API, so doing change to reflect that

### 2.0.15
-   add: Adding region filtering to detail view
-   add: Adding filter to event and course list.
-   add: Adding styles for region-filter buttons
-   add: Adding timer in event-block-a to see if the rendering takes too long
-   add: Adding base data and template for region filtering
-   add: Adding options in admin to enable region filtering
-   add: Adding support for region filtering in API/Ajax methods
-   add: Adding region-support in API-controller
-   chg: If an event ID is present in the query string on a detail page, we won't show regions.
-   chg: Adding more transients to cache more data.
-   chg: Adding more checks to multiSort to get rid of notices/warnings
-   fix: Adding another filter to get rid of company specific events.
-   chg: Code style

### 2.0.14
-   fix: `courseattributeid`-attribute on `[eduadmin-detailinfo]` didn't work with a strict check

### 2.0.13
-   fix: Sorting on dates even while grouped on city