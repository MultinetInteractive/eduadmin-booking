=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.8
Tested up to: 5.9
Stable tag: 3.2.0
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

### [3.2.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.1.0...v3.2.0) (2022-05-05)


#### Features

* **Booking form:** Setting to always allow changing which event the end user wants to attend/book. ([66b3dc5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/66b3dc5b31de26cfda428f4c75b3f6901d331146)), closes [#300](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/300)
* **Course details:** Added limited LD-JSON support, to enable better SEO ([4bf95fa](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/4bf95fafa6ee62ee105f66636ef3c827ce80eee3)), closes [#293](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/293)


#### Bug Fixes

* **Booking form:** Remove the global-declarations, it messed things up ([8cc59ee](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/8cc59ee2bac6d7e51fbd34da583cf23af54187a5))
* **Booking page:** If the course is OnDemand, we should load the OnDemand variant instead, to get the events properly ([ba1e525](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ba1e525421c1750ed7f3b2e49d20ee092a691131))
* **Interest registration/Event:** If the course is on demand, we should load that variant, to get the proper events. ([5438067](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/54380675026f5e32d499b6aebf373f98373f2b59))
* **Profile:** If the query is missing, show the normal profile. ([ea4c3ac](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ea4c3acd04bd8f6ba2c1ebaa2417b3ad621b790b))
* **Security:** Hardened cookies with HttpOnly ([cfa2fca](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/cfa2fca974bdf6f5392ba8a421472dceb4d2964e))

### [3.1.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.0.0...v3.1.0) (2022-02-23)


#### Features

* **My Profile/Bookings:** Ability to sort bookings either by Created (booking) or Event Start Date ([58b85c8](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/58b85c832707d8594c9aeac2e00d773655940e6c)), closes [#427](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/427)
* **My Profile/Bookings:** Added wp-hook/filter for `edu_bookings`, so that external plugins/code can customize the booking list. ([26d0590](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/26d0590fda156ea046debceba5257c1d505bb5fe)), closes [MultinetInteractive/EduAdmin-WordPress/issues/427#issuecomment-1048621038](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/427/issues/issuecomment-1048621038)


#### Bug Fixes

* Fixed translation for Export-button in Bookings ([57b7b25](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/57b7b2504002c80a4382bbaec06b54e58f8dce93))


#### Documentation

* Fix Copyright notice in RSS-feed ([a69ffd2](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a69ffd2b163f88f5b3c3a5b6792cb1deb887cd54))
* More info for the blog, for better SEO ([7f967b6](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7f967b609a1fa95a2d136e1a5e5acc99d61dd5a0))

### [3.0.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.40.2...v3.0.0) (2022-02-21)


#### ⚠ BREAKING CHANGES

* **Login page:** Will probably break any custom styling to the login page.

#### Features

* **My Profile/Bookings:** Export bookings into Excel (CSV) ([68c66aa](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/68c66aaca009f17ed5254363d084b43a8ff44555)), closes [#426](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/426)
* **My Profile/Bookings:** Show unnamed participants in list of bookings. ([64d1bd4](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/64d1bd49a31de31f18d2c24f73bdb8e5b1eaa4c4)), closes [#428](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/428)


#### Bug Fixes

* **Checksum:** Fix calculation of checksum, forgot to add some files it should ignore, so it generated a faulty hash ([cf05b24](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/cf05b24e19ac9e12b152cae78e64d7ca116dfa27))


#### Refactoring

* **Login page:** Remade the login page, so that it looks better on desktop and mobile ([8931993](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/89319935b04cfba88d5b2802078346392d4b7dc2))


#### Documentation

* Updated documentation with new styles, enabled blog, wrote our first entry ([ecee658](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ecee6581b186bd30afc39ae95ae28ae38311f19a))

### [2.40.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.40.1...v2.40.2) (2022-02-03)


#### Bug Fixes

* Added Book-button to template B (event) ([f760e70](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f760e700ee131266c49ddf3c593e81b35dbc335a)), closes [#418](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/418)


#### Documentation

* Update documentation, remove `showmore` from listview, as it was never implemented ([b37c0ad](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b37c0ad790242c0edf9b425095fc5cfe782f514d))



