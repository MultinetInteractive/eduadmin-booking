=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.8
Tested up to: 6.0.0
Stable tag: 3.5.1
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

### [3.5.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.5.0...v3.5.1) (2022-09-26)


#### Bug Fixes

* **Booking:** Properly handle vouchers ([f2479c5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f2479c5411b51779c8256bdf87e7da84715a1043)), closes [#458](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/458)

### [3.5.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.4.0...v3.5.0) (2022-09-22)


#### Features

* Added Certificates-endpoint for OData ([34e1054](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/34e10545cc8a3107910badda2145b2d18819409b))
* **Shortcodes:** Added the possibility to override what type of price you show for the `[eduadmin-detailinfo courseprice]` and `[eduadmin-detailinfo eventprice]` shortcodes ([f63724c](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f63724ce82f9fddb7ce14fc72053f8eff8ee09c9)), closes [#456](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/456)

### [3.4.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.3.2...v3.4.0) (2022-09-01)


#### Features

* Booking page now cares about ApplicationOpenDate. If we're not at/past the date, it can't be selected. ([45af1af](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/45af1af2a6ef8a08cbe29f8104146044e368be65)), closes [#436](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/436)
* Listview (events) and detailview now removes the "Book"-button, if there is an ApplicationOpenDate, that hasn't passed yet. ([7bbc8aa](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7bbc8aa94cc412586624bcd46a2540eaf08cb00d)), closes [#436](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/436)


#### Bug Fixes

* If course_id is null, don't try to output any ogp or ld-json. ([28f4f8d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/28f4f8d61801950c7c6dc8587f5d618f3f97e125))


#### Refactoring

* Add ApplicationOpenDate to available data from the API ([0f49992](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0f499920965e2235297cb5bed21e90513db3629f)), closes [#436](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/436)

### [3.3.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.3.1...v3.3.2) (2022-06-23)


#### Bug Fixes

* Added code to handle use of `eduadmin-bookingview` on a separate page (with attributes) ([f475ee4](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f475ee45f058ec0d3c38a23fd370b5ad210d422b))


#### Documentation

* Added info about cookies ([511f7ae](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/511f7ae28d2d4e6948b307163113191d629f6f10))



