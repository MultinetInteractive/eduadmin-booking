# EduAdmin Booking
- Requires at least: 6.0
- Tested up to: 7.0
- Stable tag: 6.1.0
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

### [6.1.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v6.0.0...v6.1.0) (2026-11-26)


#### Features

* Add setting to use the site's date and time format ([9d07dfb](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9d07dfb7319a77719ed406d6c3892e9dee73f4c0))


#### Bug Fixes

* Always show session times in the programme popup in site-format mode ([d9b71dd](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d9b71dd105b0562f8a04bd34954d4362786bed49))
* Avoid duplicate list times and group schedules by displayed time in site-format mode ([3c8e728](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3c8e7283415273ff965f97bbbf4754f66cd75a56))
* Escape new date settings labels ([ad8a496](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ad8a49607f499e487bb6f60f32572c84def9a332))
* Escape the AJAX-refreshed "Next event" label ([5a4acfb](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5a4acfb8570a2c75f534c40a1342ec569a774d46))
* Respect "Show event time" in schedules when using the sites' date format ([aa47ac2](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/aa47ac25d61ba3081dce6ceb2ceb51259ae99f5a))
* Respect "Show event time" in the list day info when using the site's date format ([57274ae](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/57274ae529686a2ef8b445961e807338e4a943a8))
* Use the site's date format for certificate validity dates ([a8def30](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a8def30c39a9af174d8f8a8c78d44dadaa0302ea))
* Use the site's date format for remaining date displays ([731d259](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/731d259d5704b30e96e47fb8e096733bc03819f3))


#### Documentation

* Explain why the WP-format range shows a single day's times ([818656e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/818656eb3207b51eb5125c4a46f5746ce460c077))


#### Refactoring

* Reuse existing helpers in the schedule popup summary ([fa5672c](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/fa5672c549fcd207a268d48a54886c49cc2ae27a))
* Use the WP date helper for the range day comparison ([06ceb9e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/06ceb9e7bbb8076e5141f8e48e898df456aa3a01))

### [6.0.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.4.3...v6.0.0) (2026-09-04)


#### ⚠ BREAKING CHANGES

* Might break some convenience logins, but it's for the sake of safety.

#### Security

* Fixed authentication to be a bit better than before. ([20a1a5e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/20a1a5e14fde227f515674063129554936e375e6))

### [5.4.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.4.2...v5.4.3) (2026-09-02)


#### Security

* **API:** Fixed proper filtering for OData variables to close a report from Patchstack. ([29ed776](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/29ed776df86d8ea81f5cc450c8d7348b21474d80))

### [5.4.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.4.0...v5.4.2) (2026-04-30)


#### Documentation

* Update links to EduAdmin from https://www.eduadmin.se to https://www.eduadmin.com instead to cater to the international website instead of the swedish one. ([c58f56e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c58f56e807f6904360685ba0af4a6316e0f8232d))



