=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 5.8
Tested up to: 6.0.0
Stable tag: 3.3.1
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

### [3.3.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.3.0...v3.3.1) (2022-06-14)


#### Bug Fixes

* Add extra escape-things for input from WordPress, since it adds slashes to everything. ([a07a167](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a07a167ceea8a66c36736bb44728b074a5bb8ae4)), closes [#450](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/450)

### [3.3.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.2.3...v3.3.0) (2022-06-10)


#### Features

* OpenGraph-support in detail views for prettier results on Twitter, Facebook, Slack, Discord and many other platforms that supports the OpenGraph standard (https://ogp.me/) ([e0bc773](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e0bc773e4834ee9d7db26925cdcfa1a4fb71ada8)), closes [#155](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/155)


#### Bug Fixes

* Better linebreaks (OGP) ([adad674](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/adad6747313211484615386bc90ba209be78b817))
* Fixes oEmbed canonical links. ([d48f816](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d48f81668d45935494c1cab5f86b2460a5120931)), closes [#310](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/310)

### [3.2.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.2.2...v3.2.3) (2022-06-02)


#### Bug Fixes

* Enhanced handling of new contacts/customers (can't set the personId or things like that, if they don't exist) ([ea630b5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ea630b5a897daac2a0aaf0ce508203028ba53287))
* Some fixes for Question handling ([c2e4408](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c2e4408722316b8a8ac0e36d543ed781decf37b5))

### [3.2.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.2.1...v3.2.2) (2022-06-01)


#### Bug Fixes

* If the country is not required, do not set a default value in the field ([16ed440](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/16ed440cf5b6362ab16281704e491ed0bf3f4162))



