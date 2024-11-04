=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 6.0
Tested up to: 6.6
Stable tag: 5.2.0
Requires PHP: 8.1
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

### [5.2.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.1.3...v5.2.0) (2024-11-04)


#### Features

* Setting to turn off/on OG/metadata and LD+JSON. ([594c422](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/594c422407be2aa6f8a4d2192f5636faac85975b)), closes [#520](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/520)


#### Bug Fixes

* Added repeatFrequency, repeatCount and courseMode for LD+JSON ([e5e5c42](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e5e5c42bfe37d39c088e6901c2de3e7f31841e75)), closes [#511](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/511)

### [5.1.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.1.2...v5.1.3) (2024-10-10)

### [5.1.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.1.1...v5.1.2) (2024-10-10)


#### Security

* Fix potential LFI vulnerability ([89a8479](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/89a84796caaf40187c0272850632da92ee01477f))

### [5.1.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.1.0...v5.1.1) (2024-09-18)


#### Bug Fixes

* Fetch AnswerId for checkbox questions the correct way ([d123497](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d123497be9795741796aad8f13469623bc072701))



