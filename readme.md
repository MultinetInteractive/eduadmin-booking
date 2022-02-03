=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.0
Tested up to: 5.8
Stable tag: 2.40.2
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

### [2.40.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.40.1...v2.40.2) (2022-02-03)


#### Bug Fixes

* Added Book-button to template B (event) ([f760e70](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f760e700ee131266c49ddf3c593e81b35dbc335a)), closes [#418](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/418)


#### Documentation

* Update documentation, remove `showmore` from listview, as it was never implemented ([b37c0ad](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b37c0ad790242c0edf9b425095fc5cfe782f514d))

### [2.40.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.40.0...v2.40.1) (2022-01-11)


#### Bug Fixes

* Get OnDemand info if the coursetemplate is OnDemand ([075be39](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/075be3967467808ec22d284230623a58da2053b3))


#### Documentation

* Add attribute ondemand to detailinfo ([35c5363](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/35c5363cea1992c46e499de42a34655d075e92c2))

### [2.40.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.39.1...v2.40.0) (2022-01-11)


#### Features

* **Booking:** Support for OnDemand in the event selector on the booking page ([3416712](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/34167122ae0f60afd8266aad1da81425f27bded9))
* **EDUApiHelper:** Added extra fields for OnDemand, added extra method to fetch OnDemand courses, added filter to block OnDemand from showing up in normal course lists. ([11c6c53](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/11c6c531270b3b371db46550ee70e67a1e21ad37))
* Hide non-on-demand events from event lists ([208f982](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/208f982c7f5df4dd9e9a0297c2a6b10888d9f35f))
* OnDemand support for more views ([ee2d927](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ee2d92748132bc190a351d6d27f6bdd41afe8ef3))
* **Programme:** Hide headers based on course detail setting to hide headers. ([a5baeb0](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a5baeb073f5e6e0b9c9fbfb8d64d3f59f37d461e)), closes [#414](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/414)


#### Bug Fixes

* **ApiHelper:** Added LocationId to fix issue with region filtering ([2f012b9](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2f012b9ca1cb36cd0badcb6054476425ae0fef5b))
* Changed from curly brace to brackets to fix error in PHP 8.0 ([175dca0](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/175dca0af713eff97ff66fa4f55e59ff35ca3edd))
* **Detail template:** Change code that checks `$course_level` ([a8e7562](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a8e7562e3f955c7fe87e69bd0917a8eda2a815e5))
* **docs:** Formatting the document was a bad idea ([7e89d27](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7e89d27fc076813ca531fb0452fccf3723032830))
* Fix ajax method that fetches minimum price ([71a4c80](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/71a4c802e0beb96d9ec2bf68cd8111c05ee4ce76))
* Fixed casing for VAT texts ([5c5c7ae](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5c5c7ae884ad014749750925748637cba03d179e))
* How about we use the correct version with nvmrc, update composer installer ([0fef61e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0fef61eceb2a0c32ec192081a8e5fc5f131163ae))
* Output only non-empty parts in the venue info. ([aca146f](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/aca146f784a20785b7bb241d72fae472892d0c8e))
* **Programme/Book:** Added null check for contact and customfields before looping over it. ([f633bd8](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f633bd8cdde2691ee852af2d5ca8634b56d24e30))
* Remove default value from parameter always sent ([f610d1c](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f610d1c08a82b919753da81b1c83b7eca1aca828))


#### Documentation

* Added info about `ondemand` attribute for listview shortcode ([baa625d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/baa625dff4ef7997398423a4e0ccc056570aae1b))

### [2.39.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.39.0...v2.39.1) (2021-12-07)


#### Bug Fixes

* Missing replacement of lower case VAT-text ([5e2b83b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5e2b83b063236335d02739f399732e4659d0d57b))


