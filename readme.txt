=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.8
Tested up to: 6.4
Stable tag: 4.2.2
Requires PHP: 7.0
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
Donate link: https://github.com/sponsors/itssimple

EduAdmin plugin to allow visitors to book courses at your website. Requires EduAdmin-account.

== Description ==

Plugin that you connect to [EduAdmin](https://www.eduadmin.se) to enable bookings of both courses and programmes through your website.

Requires the following PHP-modules

- php-curl
- php-mbstring

== Installation ==

-   Upload the zip-file (or install from WordPress) and activate the plugin
-   Provide the API key from EduAdmin.
-   Create pages for the different views and give them their shortcodes

== Frequently Asked Questions ==

== Screenshots ==

== Upgrade Notice ==

= 3.0 =

Styles have been remade for the end user login page, and the booking list page. Please check that any custom styles are still working, or you might need to fix them.

= 2.0 =

We have replaced everything with a new API-client, so some things may be broken. If you experience any bugs (not new feature-requests), please contact the MultiNet Support.
If you notice that your API key doesn't work any more, you have to contact us.

== Changelog ==

The full changelog available on [GitHub](https://github.com/MultinetInteractive/EduAdmin-WordPress/blob/production/CHANGELOG.md)

### [4.2.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v4.2.1...v4.2.2) (2024-01-10)


#### Bug Fixes

* More return types, because of silly deprecation notices. ([528d744](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/528d7441f64cd45de32fd599f6853a93c89a9489))

### [4.2.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v4.2.0...v4.2.1) (2024-01-10)


#### Bug Fixes

* Add return types ([ae0f126](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ae0f126f31513731d677c7af2708b10c2a51573e))

### [4.2.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v4.1.2...v4.2.0) (2023-12-21)


#### Features

* Support for the required fields in Google Search Console for the ld+json ([519a446](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/519a446527a37ae8ffc7e3d159ea99c5c9d86e45)), closes [#511](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/511)

### [4.1.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v4.1.1...v4.1.2) (2023-12-13)


#### Bug Fixes

* Filtering the events if we're looking at a specific one for prices as well ([144762e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/144762e9e3c9c14f7c1c0ce68dafa7feb50cb4e2))



