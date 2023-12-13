=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.8
Tested up to: 6.4
Stable tag: 4.1.2
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

### [4.1.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v4.1.1...v4.1.2) (2023-12-13)


#### Bug Fixes

* Filtering the events if we're looking at a specific one for prices as well ([144762e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/144762e9e3c9c14f7c1c0ce68dafa7feb50cb4e2))

### [4.1.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v4.1.0...v4.1.1) (2023-11-10)


#### Bug Fixes

* Don't output the print_r of the entire programme.. ([e32d407](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e32d4074a10a937fdd8c42f262669d669623a046))

### [4.1.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v4.0.0...v4.1.0) (2023-11-06)


#### Features

* Added shortcode [eduadmin-programmeinfo] with limited attributes ([b51a1b1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b51a1b102282dd7a23cd96aa9e459f4b116f3af0)), closes [#506](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/506)


#### Documentation

* **Shortcodes:** Added info about the new shortcode ([4fe4b80](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/4fe4b8015c095841a75cfd5348ece89bfb90944a)), closes [#506](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/506)

### [4.0.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.11.1...v4.0.0) (2023-10-10)


#### ⚠ BREAKING CHANGES

* **Programme/Shortcodes:** Custom code with `do_shortcode` now needs to do
`echo do_shortcode( '[eduadmin-programme-list]' );` after the change.
Which is the intended way to use `do_shortcode` the previous versions
were not working in the correct way.

#### Bug Fixes

* **Programme/Shortcodes:** Fixed an issue with Programme pages ([461c3bf](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/461c3bfac424d8614580ac4f7df2fe5d70161499))



