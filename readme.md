=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.8
Tested up to: 6.0.0
Stable tag: 3.2.3
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

### [3.2.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.2.2...v3.2.3) (2022-06-02)


#### Bug Fixes

* Enhanced handling of new contacts/customers (can't set the personId or things like that, if they don't exist) ([ea630b5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ea630b5a897daac2a0aaf0ce508203028ba53287))
* Some fixes for Question handling ([c2e4408](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c2e4408722316b8a8ac0e36d543ed781decf37b5))

### [3.2.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.2.1...v3.2.2) (2022-06-01)


#### Bug Fixes

* If the country is not required, do not set a default value in the field ([16ed440](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/16ed440cf5b6362ab16281704e491ed0bf3f4162))

### [3.2.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.2.0...v3.2.1) (2022-05-31)


#### Bug Fixes

* Change method to filter LastApplicationDate ([59a46fc](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/59a46fc12b32b01629a631d494283827cc8d19f3)), closes [#444](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/444)

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



