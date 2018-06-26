=== EduAdmin Booking ===
Contributors: mnchga
Tags: booking, participants, courses, events, eduadmin, lega online
Requires at least: 4.7
Tested up to: 4.9
Stable tag: 2.0.7
Requires PHP: 5.2
License: GPL3
License-URI: https://www.gnu.org/licenses/gpl-3.0.en.html
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



== Installation ==

- Upload the zip-file (or install from WordPress) and activate the plugin
- Provide the API key from EduAdmin.
- Create pages for the different views and give them their shortcodes

== Upgrade Notice ==

= 2.0 =
We have replaced everything with a new API-client, so some things may be broken. If you experience any bugs (not new feature-requests), please contact the MultiNet Support.
If you notice that your API key doesn't work any more, you have to contact us.

== Changelog ==

### 2.0.8 ###
- fix: Fixed sort order on event dates

### 2.0.7 ###
- fix: Fixed the date format in the event schedule when the event is withing different months
- fix: The events in the list-view are now sorted by `startDate` when the `Sort order` is set to `Sort index`
- fix: Events in the event-list can now be sorted with event properties as well as course template properties

### 2.0.6 ###
- fix: `get_option` does only return booleans when they are empty (fixed on booking page)
- fix: When checking price on a single-participant-booking, we should fill the participant name if it's empty
- fix: Fix from clestial that fixes permalink reload when you change settings

### 2.0.5 ###
- fix: Fixed a bug with saving attribute values
- add: More errorhandling to booking handler

### 2.0.4 ###
- fix: Fixed so that strings from the EduAdmin-API also gets captured into `data`
- add: Show price on programme booking-page
- add: Support for programme bookings to be booked (with support for payment plugins)
- chg: Added CTA-class to book-button on detail view for programme starts
- chg: Updating EduAdmin PHP API Client
- chg: Adding escaping of output
- add: Making it easier to add profile-menu items
- add: Support for REST endpoint ProgrammeStart (Get questions)
- add: Support for price check on ProgrammeBooking
- chg: Codestyling to match other pages.
- fix: Checking for existence of the property data before we try to fetch data from it.
- fix: Better check if the person is logged in or not.

### 2.0.3 ###
- add: Ability to view schedule of a programme
- chg: Bugfix where confirmation emails weren't sent for multiple participant bookings
- chg: Bugfix for 2 column detail template
- add: Better error handling when booking a course (At least some handling..)

### 2.0.2 ###
- fix: Adding check for nonces in interest-registration pages
- fix: Checking count in password reset in a different way
- add: When you activate/deactivate the plugin, all transients are now cleaned
- add: Programme start list in detail view
- add: Save `customerId` and `personId` in hidden variables on booking page, so we won't lose logged in users if the session times out.
- add: If we cannot find anything related to `[eduadmin` in the pages, show all pages.

### 2.0.1 ###
- chg: Better check against `customtemplate`
- add: Backend-function to fix old search/sort/display values to the new ones
- fix: Stop setting cookies for while logging in (except the ones from WP_Session), should stop nginx from breaking.
- chg: Validating all fields when you post a booking
- chg: Removed `setcookie( 'eduadmin_loginUser' ...`, since it's not needed by the plugin.
- chg: Fixed line breaks in interest registration in a textarea
- add: Validate what fields are being sorted on (if it's even possible) in course and event lists
