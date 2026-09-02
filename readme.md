# EduAdmin Booking
- Requires at least: 6.0
- Tested up to: 7.0
- Stable tag: 5.4.3
- Requires PHP: 8.1
- License: GPL3
- License URI: https://www.gnu.org/licenses/gpl-3.0.en.html

EduAdmin plugin to allow visitors to book courses at your website. Requires EduAdmin-account.

## Description

Plugin that you connect to [EduAdmin](https://www.eduadmin.com) to enable booking on your website.

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

### [5.4.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.4.2...v5.4.3) (2026-09-02)


#### Security

* **API:** Fixed proper filtering for OData variables to close a report from Patchstack. ([29ed776](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/29ed776df86d8ea81f5cc450c8d7348b21474d80))

### [5.4.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.4.0...v5.4.2) (2026-04-30)


#### Documentation

* Update links to EduAdmin from https://www.eduadmin.se to https://www.eduadmin.com instead to cater to the international website instead of the swedish one. ([c58f56e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c58f56e807f6904360685ba0af4a6316e0f8232d))

### [5.4.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.4.0...v5.4.1) (2026-04-30)


#### Documentation

* Update links to EduAdmin from https://www.eduadmin.se to https://www.eduadmin.com instead to cater to the international website instead of the swedish one. ([c58f56e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c58f56e807f6904360685ba0af4a6316e0f8232d))

### [5.4.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.3.1...v5.4.0) (2025-02-25)


#### Features

* Added VoucherTemplate OData-endpoint ([9a6c631](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9a6c6310fb4876ab4e1413e83d17491ffc018d6a))


#### Bug Fixes

* Custom course detail views will no longer require an attribute to show on demand events. ([6f90e87](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6f90e875845d78a44ab32dda817284ad8b8b82ca))


#### Documentation

* Remove ondemand-attribute from detailinfo ([dfa3f59](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/dfa3f59c5bea11c8da99d5067e415d6859475a34))



