=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 6.0
Tested up to: 6.6
Stable tag: 5.1.2
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

### [5.1.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.1.1...v5.1.2) (2024-10-10)


#### Security

* Fix potential LFI vulnerability ([89a8479](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/89a84796caaf40187c0272850632da92ee01477f))

### [5.1.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.1.0...v5.1.1) (2024-09-18)


#### Bug Fixes

* Fetch AnswerId for checkbox questions the correct way ([d123497](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d123497be9795741796aad8f13469623bc072701))

### [5.1.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.0.1...v5.1.0) (2024-08-19)


#### Features

* Adding new endpoints and classes ([0df472e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0df472e7b80f3e1ca8584a3f7b7cbf0c81432dcc))


#### Bug Fixes

* Fixes incorrect encoding after PHP 8.1 changing how things work. ([ff8055d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ff8055dfda0cb4e805977895136a2a0df6135f33)), closes [#526](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/526)

### [5.0.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.0.0...v5.0.1) (2024-04-09)


#### Bug Fixes

* Some null handling that is deprecated in newer versions of PHP ([d89c27d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d89c27d1dcf6b245ff6fd982ebccdacc1a7a4527))



