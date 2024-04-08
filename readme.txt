=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 6.0
Tested up to: 6.5
Stable tag: 4.3.0
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

### [4.3.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v4.2.3...v4.3.0) (2024-04-08)


#### Features

* Support for EduAdmin Form Reserve/Waiting Lists when the event is fully booked. ([3680b47](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3680b4703298c57210f5d025a70fbbf1f6565a3d)), closes [#455](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/455)


#### Bug Fixes

* Only check description if it actually contains anything ([33234df](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/33234dff3445e6642281cb5aa53ef674485a7fe0))

### [4.2.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v4.2.2...v4.2.3) (2024-02-09)


#### Bug Fixes

* #[\ReturnTypeWillChange] instead of typing, because PHP is.. well PHP ([7684891](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7684891ff6d55b58e186a2569d42674792e7f543))

### [4.2.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v4.2.1...v4.2.2) (2024-01-10)


#### Bug Fixes

* More return types, because of silly deprecation notices. ([528d744](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/528d7441f64cd45de32fd599f6853a93c89a9489))

### [4.2.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v4.2.0...v4.2.1) (2024-01-10)


#### Bug Fixes

* Add return types ([ae0f126](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ae0f126f31513731d677c7af2708b10c2a51573e))



