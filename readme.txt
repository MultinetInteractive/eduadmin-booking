=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.8
Tested up to: 6.4
Stable tag: 4.0.0
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

### [4.0.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.11.1...v4.0.0) (2023-10-10)


#### ⚠ BREAKING CHANGES

* **Programme/Shortcodes:** Custom code with `do_shortcode` now needs to do
`echo do_shortcode( '[eduadmin-programme-list]' );` after the change.
Which is the intended way to use `do_shortcode` the previous versions
were not working in the correct way.

#### Bug Fixes

* **Programme/Shortcodes:** Fixed an issue with Programme pages ([461c3bf](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/461c3bfac424d8614580ac4f7df2fe5d70161499))

### [3.11.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.11.0...v3.11.1) (2023-10-09)


#### Bug Fixes

* **Programme:** Added check for StatusId, so that we only show programme starts with statusid 1 (Booked) ([cc9a797](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/cc9a7970fb7aaa989facd0aea7894edeaeb9407b))

### [3.11.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.10.0...v3.11.0) (2023-10-02)


#### Features

* List number of free spots on programme list ([38529a8](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/38529a86da27169961bb53597a0f6069c4721d1c))

### [3.10.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.9.2...v3.10.0) (2023-09-29)


#### Features

* Programme starts now show number of spots left (according to settings) ([0117df4](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0117df408a557998bd04d467720e51cef331612a)), closes [#498](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/498)



