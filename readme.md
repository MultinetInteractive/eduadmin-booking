# EduAdmin Booking
- Requires at least: 6.0
- Tested up to: 6.6
- Stable tag: 5.3.1
- Requires PHP: 8.1
- License: GPL3
- License URI: https://www.gnu.org/licenses/gpl-3.0.en.html

EduAdmin plugin to allow visitors to book courses at your website. Requires EduAdmin-account.

## Description

Plugin that you connect to [EduAdmin](https://www.eduadmin.se) to enable booking on your website.

[<img src="https://img.shields.io/github/commits-since/MultinetInteractive/EduAdmin-WordPress/latest.svg" alt="Commits since latest plugin version" />](https://wordpress.org/plugins/eduadmin-booking/)

Requires the following PHP-modules

- php-curl
- php-mbstring

## Installation

-   Upload the zip-file (or install from WordPress) and activate the plugin
-   Provide the API key from EduAdmin.
-   Create pages for the different views and give them their shortcodes

## How can I report security bugs?

You can report security bugs through the Patchstack Vulnerability Disclosure Program. The Patchstack team help validate, triage and handle any security vulnerabilities. [Report a security vulnerability.](https://patchstack.com/database/vdp/eduadmin-booking)

## Upgrade Notice

### 3.0

Styles have been remade for the end user login page, and the booking list page. Please check that any custom styles are still working, or you might need to fix them.

### 2.0

We have replaced everything with a new API-client, so some things may be broken. If you experience any bugs (not new feature-requests), please contact the MultiNet Support.
If you notice that your API key doesn't work any more, you have to contact us.

## Changelog

The full changelog available on [GitHub](https://github.com/MultinetInteractive/EduAdmin-WordPress/blob/production/CHANGELOG.md)

### [5.3.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.3.0...v5.3.1) (2024-11-05)


#### Bug Fixes

* Set health-check as blocking, so we get an actual result, increase timeout to 0.5 seconds ([7e4bd4e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7e4bd4e7ece1efe0bd7e99ecc5b0ada8f7422957))

### [5.3.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.2.0...v5.3.0) (2024-11-05)


#### Features

* Handle API being down/blocked, instead of making the site hang until the configured timeout happens. ([a1a5104](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a1a51042d4b7687830de5eaa9127ae2959a3f577)), closes [#153](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/153)

### [5.2.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.1.3...v5.2.0) (2024-11-04)


#### Features

* Setting to turn off/on OG/metadata and LD+JSON. ([594c422](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/594c422407be2aa6f8a4d2192f5636faac85975b)), closes [#520](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/520)


#### Bug Fixes

* Added repeatFrequency, repeatCount and courseMode for LD+JSON ([e5e5c42](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e5e5c42bfe37d39c088e6901c2de3e7f31841e75)), closes [#511](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/511)

### [5.1.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.1.2...v5.1.3) (2024-10-10)



