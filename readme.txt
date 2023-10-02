=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.8
Tested up to: 6.4
Stable tag: 3.11.0
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

### [3.11.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.10.0...v3.11.0) (2023-10-02)


#### Features

* List number of free spots on programme list ([38529a8](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/38529a86da27169961bb53597a0f6069c4721d1c))

### [3.10.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.9.2...v3.10.0) (2023-09-29)


#### Features

* Programme starts now show number of spots left (according to settings) ([0117df4](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0117df408a557998bd04d467720e51cef331612a)), closes [#498](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/498)

### [3.9.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.9.1...v3.9.2) (2023-09-26)


#### Refactoring

* Made a readme.txt as well, for use in the SVN trunk. ([e6b6d61](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e6b6d61b8e3f27c2841c25812f46f6d2cde3ead3))

### [3.9.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.9.0...v3.9.1) (2023-09-25)


#### Bug Fixes

* **Programme:** Fixed an issue where programme views/shortcodes weren't included in the correct way. ([fd0ee12](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/fd0ee128dfc1e324732544f9071640b5aba76e0c)), closes [#494](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/494)



