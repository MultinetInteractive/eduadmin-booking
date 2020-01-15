# Changelog

All notable changes to this project will be documented in this file. See [standard-version](https://github.com/conventional-changelog/standard-version) for commit guidelines.

## [2.13.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.12.0...v2.13.0) (2020-01-15)


### Features

* Added code so that we send the CountryCode to EduAdmin ([9096904](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9096904))
* Added country-selector for customer + invoice information (not sending it yet, as it is not supported in the API yet) ([1a98fe6](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/1a98fe6))
* Added Country-selector to Single Person-booking ([2216f94](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2216f94))
* Added CountryCode to ContactPerson-class ([bf40ba7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/bf40ba7))
* If the logged in/new customer doesn't have any country code, we will fetch it from the EduAdmin account, and default to SE if it's missing. ([52afa7f](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/52afa7f))



## [2.12.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.8...v2.12.0) (2019-12-17)


### Bug Fixes

* Fixes so that programme bookings get a correct price check even if you don't have any participants/contact person details. ([3734187](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3734187))
* Moved payment-methods to root-folder of content, because it's used by both programme and normal events. ([d7d1bfe](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d7d1bfe))
* we fall back to invoice through EduAdmin if there are no available plugins. fix for [#290](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/290) ([e545b4b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e545b4b))


### Features

* 🎸 Add optional filter for `get_integrations` ([e1fd75d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e1fd75d))
* Added plugin type, and method to return a label for said type ([9bf1804](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9bf1804))
* Do not run payment-plugins if the totalsum is zero ([e2b4493](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e2b4493)), closes [#288](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/288)
* Only send bookings through payment plugins if they are PaymentMethodId 2 (Card payment). ([6917ff0](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6917ff0))
* Setting to enforce use of payment plugin. ([7fd4114](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7fd4114)), closes [#290](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/290)
* Showing plugin type label in list of installed plugins ([bb015a3](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/bb015a3))
* The end user now has the possibility to select payment method (if there are multiple available) ([9aaab43](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9aaab43)), closes [#289](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/289)



### [2.11.8](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.7...v2.11.8) (2019-11-22)



### [2.11.7](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.6...v2.11.7) (2019-11-15)


### Bug Fixes

* 🐛 Adding custom CSS in wp_footer instead ([7e725bb](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7e725bb))



### [2.11.6](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.5...v2.11.6) (2019-11-08)


### Bug Fixes

* 🐛 Removing the javascript-version of back (FF-bug) ([f382807](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f382807))



### [2.11.5](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.4...v2.11.5) (2019-11-07)



### [2.11.4](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.3...v2.11.4) (2019-11-07)


### Bug Fixes

* 🐛 Line endings can be troublesome ([b8e1411](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b8e1411))



### [2.11.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.2...v2.11.3) (2019-11-07)


### Bug Fixes

* 🐛 Correct path for new submodule ([5d21b42](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5d21b42))
* 🐛 eventinquiry check = 1 ([44ebf33](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/44ebf33))
* 🐛 Sorting all files for int-check, added debug-thing ([12fd9a7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/12fd9a7))



### [2.11.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.1...v2.11.2) (2019-11-07)


### Bug Fixes

* 🐛 Don't output all checked files ([49bc1af](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/49bc1af))



### [2.11.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.0...v2.11.1) (2019-11-07)


### Bug Fixes

* 🐛 Removed folder from checksum-check, removed scripts ([1bc3ed1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/1bc3ed1))



## [2.11.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.10.1...v2.11.0) (2019-11-07)


### Bug Fixes

* 🐛 Fix for actions ([72ba312](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/72ba312))


### Features

* 🎸 Plugin integrity check ([d56608e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d56608e)), closes [#280](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/280)



### [2.10.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.10.0...v2.10.1) (2019-09-11)


### Bug Fixes

* 🐛 Correct path for new submodule ([e060f02](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e060f02))
* 🐛 eventinquiry check = 1 ([b8e1fcf](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b8e1fcf))



## [2.10.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.9.1...v2.10.0) (2019-08-29)


### Bug Fixes

* 🐛 If the version supports it, use set_script_translations ([a210b6f](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a210b6f))
* 🐛 More aggressive transient deletion ([4612268](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/4612268))


### Features

* 🎸 GLN numbers can now be added to a booking. fixes [#276](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/276) ([e19810c](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e19810c))
* 🎸 Updated EduAdmin API client ([a8b8edd](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a8b8edd))



### [2.9.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.9.0...v2.9.1) (2019-08-19)


### Bug Fixes

* 🐛 Fix for <5.0 WP that doesn't have set_script_translation ([5e79191](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5e79191))



## [2.9.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.8.0...v2.9.0) (2019-08-08)


### Features

* 🎸 News page with ability to warn if new versions is neede ([a196779](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a196779))



## [2.8.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.7.1...v2.8.0) (2019-08-07)


### Features

* 🎸 Added filtercity-attribute to listview. fixes [#80](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/80) ([bf64a10](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/bf64a10))



### [2.7.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.7.0...v2.7.1) (2019-08-06)


### Bug Fixes

* 🐛 Fix for is_checked if empty option value ([8260dcc](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/8260dcc))
* 🐛 Remove debug-info ([f98f480](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f98f480))



## [2.7.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.6.2...v2.7.0) (2019-07-29)


### Features

* 🎸 Setting for showing all certs in a company fixes [#259](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/259) ([64b05be](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/64b05be))



### [2.6.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.6.1...v2.6.2) (2019-07-25)


### Bug Fixes

* 🐛 Multibyte-searches should work now. :( Fixes [#270](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/270) ([f05c0f1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f05c0f1))



### [2.6.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.6.0...v2.6.1) (2019-07-22)


### Bug Fixes

* 🐛 Fix for TypeScript type (timeout) ([22cc179](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/22cc179))
* 🐛 Required fields are required, fixes [#268](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/268) ([9604c35](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9604c35))
* 🐛 Reset required-state if not participant ([d5a4f7d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d5a4f7d))



# [2.6.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.5.1...v2.6.0) (2019-06-28)


### Features

* 🎸 Show prices on programme starts (detail view) ([57c1c26](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/57c1c26))
* 🎸 Showing city (if available) on programme starts ([88f4d3d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/88f4d3d))



## [2.5.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.5.0...v2.5.1) (2019-06-28)


### Bug Fixes

* 🐛 Don't write the debug info in prod ([a809097](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a809097))



# [2.5.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.4.2...v2.5.0) (2019-06-28)


### Features

* 🎸 Category filtering on programme-list ([c722379](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c722379))



## [2.4.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.4.1...v2.4.2) (2019-06-26)


### Bug Fixes

* 🐛 Show questions regardless of eventid in query ([3febc13](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3febc13))



## [2.4.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.4.0...v2.4.1) (2019-06-04)


### Bug Fixes

* 🐛 Only one event = add hidden field ([25c813d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/25c813d))



# [2.4.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.3.1...v2.4.0) (2019-05-31)


### Features

* 🎸 Back-buttons now use history.go(-1) or fallback url ([b3ce1f7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b3ce1f7))
* 🎸 show/hideimages attribute on listview shortcode ([8480ff2](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/8480ff2))



## [2.3.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.3.0...v2.3.1) (2019-05-01)


### Bug Fixes

* 🐛 Check question if suffix is contact. Skip multiple ([7d98ed7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7d98ed7))



# [2.3.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.2.0...v2.3.0) (2019-04-26)


### Bug Fixes

* 🐛 Adding missing CSS class ([19a94f8](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/19a94f8))


### Features

* 🎸 Added data-attributes for dates ([a89753d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a89753d))



# [2.2.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.1.0...v2.2.0) (2019-04-24)


### Features

* 🎸 Course list can now also be limited by numberofevents ([ffa3b27](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ffa3b27))



## [2.0.47](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.46...v2.0.47) (2019-04-09)



## [2.0.46](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.44...v2.0.46) (2019-04-04)



## [2.0.44](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.43...v2.0.44) (2019-03-14)



## [2.0.43](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.42...v2.0.43) (2019-03-13)



## [2.0.42](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.39...v2.0.42) (2019-03-11)



## [2.0.39](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.38...v2.0.39) (2019-02-21)



## [2.0.38](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.37...v2.0.38) (2019-02-19)



## [2.0.37](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.35...v2.0.37) (2019-02-14)



## [2.0.35](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.34...v2.0.35) (2019-02-12)



## [2.0.34](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.33...v2.0.34) (2019-02-08)



## [2.0.33](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.32...v2.0.33) (2019-01-28)



## [2.0.32](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.31...v2.0.32) (2018-12-05)



## [2.0.31](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.30...v2.0.31) (2018-11-30)



## [2.0.30](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.29...v2.0.30) (2018-11-19)



## [2.0.29](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.28...v2.0.29) (2018-11-19)



## [2.0.28](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.27...v2.0.28) (2018-10-30)



## [2.0.25](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.24...v2.0.25) (2018-10-11)



## [2.0.24](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.21...v2.0.24) (2018-10-10)



## [2.0.21](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.20...v2.0.21) (2018-09-17)



# [2.1.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.49...v2.1.0) (2019-04-23)


### Features

* 🎸 Added support for EDI Reference on bookings ([6e0bc2d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6e0bc2d))



## [2.0.49](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.48...v2.0.49) (2019-04-12)



## [2.0.48](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.27...v2.0.48) (2019-04-12)


### Bug Fixes

* Don't add temporary participant if you use the contact as participant. Would double the price. :D ([841463f](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/841463f))
* Missing `"` in a class attribute. ([5c81608](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5c81608))



## [2.0.47](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.46...v2.0.47) (2019-04-09)

### Bug Fixes

- fix: Missing `"` on one class-attribute ([5c81608](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5c81608))

### 2.0.46
- add: Added invoice organisation number to invoice-section

### 2.0.45
- fix: Don't add temporary participant if you use the contact as participant. Would double the price. :D

### 2.0.44
- add: Added lots of new classes to labels and elements, so that people can find stuff, and customize it.
- chg: Replaced h3 with divs in questions and attributes

### 2.0.43
- chg: When checking price, make sure we have a temporary participant if none are present.

### 2.0.42
- fix: When we load a customer from the session, we should also load the `CustomerGroupId`

### 2.0.41
- If you get to the `/book/` URL on a course template that doesn't have any events, we will now show a label saying `No events planned for this course yet.` 

### 2.0.40
- Don't set the customer group if it's already set.

### 2.0.39
- If the price is zero (no participants added, don't show any text)

### 2.0.38
- fix: Fixing problems with iOS not being able to select second text box within labels.

### 2.0.37
- fix: Logical error when to show invoice information

### 2.0.36
- fix: CSS-fixes, missing css.

### 2.0.35
- add: If it seems like inc/excl VAT is the same price, show as VAT free. [#222](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/222)
- add: Backend setting to allow customers to update their profile while booking (only existing customers) [#219](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/219)
- fix: Adding missing CSS to Programme Detail / Booking
- chg: Rewritten the rewrite rules to all work from the `EduAdminRouter` instead of `edu-rewrites.php`

### 2.0.34
- fix: Using `BuyerReference` when we fetch in profile.
- chg: Switched to SCSS and splitted files into multiple files instead

### 2.0.33
- chg: `BuyerReference` should be saved in `BuyerReference`, not `SellerReference`

### 2.0.32
- add: Allowing HTML (`<p></p>` and `<br />`) in list view

### 2.0.31
- add: Settings page with settings for "My page" / User profiles (Fixes: [#213](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/214))
- fix: Showing both incl. VAT and excl. VAT prices

### 2.0.30
- fix: And actually checking the required-attribute in the validation would help.

### 2.0.29
- fix: [#163](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/163) Civic registration number only required if the contact person is a participant

### 2.0.28
- fix: Interest registration on events, now actually know which event the user selected

### 2.0.27
- add: Better civregno-check for contact persons if the course requires it.

### 2.0.26
- add: Adding automatic pruning of transients that are expired. (Only from EduAdmin)

### 2.0.25
- add: Added query param to view plugin transients to debug caching problems.

### 2.0.24
- removed: Removed client side validation of civic registration numbers.

### 2.0.23
- add: Listview: Allow line breaks in HTML-code from course templates

### 2.0.22
- fix: Setting last admittance date and time to 23:59:59 (since some customers uses that full day)

### 2.0.21
- fix: Added missing `CourseDescriptionShort` in helper-method

### 2.0.20
- chg: Altered the info text you get when you request a password reset.
- chg: Made a new function to group dates, that works better.

### 2.0.19
- add: Added `get_transient` in `eduadmin.php` (`EDU()->get_transient($name, $action, $expiration, ..$args)`)

This method generates a unique transient-name based on the name and the arguments, so that we can cache the same method, multiple times (depending on filters)

- chg: Redoing most of the code fetching data from EduAdmin (Adding `$select`, to decrease the amount of data fetched)
- add: Added new class `EduAdminAPIHelper`, that I'm using to deduplicate code.
- per: Adding more performance fixes, that should solve some issues.
- fix: Fixed a problem with showing price names in the detail view.
- add: Added extra check for regions, so we don't loop over empty objects

### 2.0.18
-   fix: Proper sorting on event dates. (Using `sort` on an `array` was stupid)..

### 2.0.17
-   fix: Code styling and small fixes
-   add: Added a header for the region-filter on the detail view
-   fix: Apperantly the information from the course template and event was merged the wrong way, so some information didn't get through.
-   add: Added debug variables to "free spots"-placeholder

### 2.0.16
-   fix: Validation of answers were changed in the API, so doing change to reflect that

### 2.0.15
-   add: Adding region filtering to detail view
-   add: Adding filter to event and course list.
-   add: Adding styles for region-filter buttons
-   add: Adding timer in event-block-a to see if the rendering takes too long
-   add: Adding base data and template for region filtering
-   add: Adding options in admin to enable region filtering
-   add: Adding support for region filtering in API/Ajax methods
-   add: Adding region-support in API-controller
-   chg: If an event ID is present in the query string on a detail page, we won't show regions.
-   chg: Adding more transients to cache more data.
-   chg: Adding more checks to multiSort to get rid of notices/warnings
-   fix: Adding another filter to get rid of company specific events.
-   chg: Code style

### 2.0.14
-   fix: `courseattributeid`-attribute on `[eduadmin-detailinfo]` didn't work with a strict check

### 2.0.13
-   fix: Sorting on dates even while grouped on city

### 2.0.12
-   fix: We don't need users to accept terms to check prices.. That's just silly.

### 2.0.11
-   fix: Fixed the problems with events on the detail view not grouping by city.

### 2.0.10

-   fix Fixed the settingspage saving "on" instead of true as a settingValue for "eduadmin-useLogin". Coerce the value of eduadmin-useLogin to a bool before posting it to the API

### 2.0.9

-   fix: Added attribute to list of valid attributes, so that `eventprice` works in `[eduadmin-detailinfo]`

### 2.0.8

-   fix: Fixed sort order on event dates ([Issue #178](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/178))
-   fix: Adding extra parameter to links that could contain sensitive information ([Issue #170](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/170))
-   chg: My Bookings now only include non-cancelled events
-   chg: Changing the text for the "Use match"-dropdown, to something the you can understand.
-   chg: Suffix all transients with version of plugin ([Issue #164](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/164))

### 2.0.7

-   fix: Fixed the date format in the event schedule when the event is withing different months
-   fix: The events in the list-view are now sorted by `startDate` when the `Sort order` is set to `Sort index`
-   fix: Events in the event-list can now be sorted with event properties as well as course template properties

### 2.0.6

-   fix: `get_option` does only return booleans when they are empty (fixed on booking page)
-   fix: When checking price on a single-participant-booking, we should fill the participant name if it's empty
-   fix: Fix from clestial that fixes permalink reload when you change settings

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

### 2.0 ###
- add: Adding page for certificates
- chg: Bumping major version, since we're using a brand new API
- chg: Removing default styles, it will now be emptied when you reset it. (To make sure that you don't have double CSS)
- chg: Making "Forgot password" into a "neutral-btn"
- chg: Making event separators a little bit bigger and bolder
- chg: `showmore` upgrade, available in `[eduadmin-detailinfo]` as attribute
- chg: Two column-template fixed to load templated event list.
- add: Adding nonces to actions/forms
- add: Customer, person and participant CustomFields on booking page
- add: Fixed event inquiries to use the new API
- add: Adding attribute `eventprice` to `[eduadmin-detailinfo]`
- add: Adding cache-break to the new API (OData endpoints)
- add: Adding listview-shortcode for Programmes `[eduadmin-programme-list]`
- add: Creating a new Router-class to handle rewrites and custom post types.
- chg: Changing how we check price (less validation until we actually try to post)
- chg: Added onchange-events to participant-fields (name/email) to update price
- chg: Simplified usage to `wp_kses_post` instead of `wp_kses` with params.
- add: Safeguard against missing courseid from either `query_var` or attributes.
- add: Added support for number, email and phone fields in integrations.
- chg: Fetch option for number of months in ajax-calls instead of hard coded 6 months
- add: Added options for Programme-pages
- chg: Added removal of `&#8221;` and `&#8243;` from courseid-attribute.

### 1.0.28
- If no events are available, load public pricenames from course template

### 1.0.27
- Adding more fields to output when a booking is completed

### 1.0.26
- Some more styles to some buttons
- Making it easier to edit some templates
- If there are no dates provided to the date-function, render an empty string instead of 01 January, 1970
- Adding support for `showmore` in `[eduadmin-detailinfo]` as attribute
- Bugfix: Don't load already loaded classes

### 1.0.25
- Bugfix: Missing styles

### 1.0.24
- Bugfix: Booking button gets disabled, and aborts the form post.. For some reason

### [1.0.23]
- Translations are wiped, so that 3rd-party plugins can translate the plugin better (and language packs for default phrases)
- Adding first version of EduAdmin PHP API Client
- Redoing how template blocks are rendered (now using a single template, instead of 3 separate to update)
- Removed lots of the changelog to a separate file found at https://github.com/MultinetInteractive/EduAdmin-WordPress/blob/master/CHANGELOG.md

### [1.0.22]
- Disabling the book-button when the form is valid and the booking is under way
- Fixes some styles to use `px` instead of `rem`
- Adding `data-price` to the fields that were missing, that (for some reason) the price-calculation wanted

### [1.0.21]
- Lots of design fixes and changes, to make the plugin more mobile friendly
- Login widget bug fixed

### [1.0.20]
- More subject filters to fix.

### [1.0.19]
- More subject filters to fix.

### [1.0.18]
- Bugfix in subject-filter in the ajax method `edu_api_listview_eventlist`, it should check for name, not ID

### [1.0.17]
- Changing user agent in SoapClient to contain the version number of the plugin
- More mobile friendly default CSS (Users will need to reset their style settings, if they have modified anything
- Civic reg no-bugfix.

### [1.0.16]
- Adding missing form-field used by login-code
- Bugfix: Wrong function called in _ajaxFunctions when fetching logical date groups

### [1.0.15]
- Added so that we only display valid discount cards
- Fixing loginproblems. (Sending new passwords also triggered "Wrong password")

### [1.0.14]
- Bugfix: Search not checking if value was empty, which converted some values to `0`, which is bad.

### [1.0.13]
- Hide the course image, if there is no URL available.

### [1.0.12]
- JS-bugfix, the selector for the civic reg numbers should work on any field that has the correct class (and is not a template)

### [1.0.11]
- Bugfix with REST API, we don't need to pass the token now, so we can always get a valid token when needed.

### [1.0.10]
- Rewriting the AJAX-API a third time. This time we use the REST API.
- Increased performance overall by rethinking the localization-functions.
- Added more debugging timers to see if we can catch performance thieves.

### [1.0.9]
- Implementing current ajax-methods as WordPress-ajax-methods instead.
- Removed the whole backend-directory that contained the old AJAX-api.
- Added ability to hide `price,time` from the detail view. (Also fixed the bug that didn't hide the fields)

### [1.0.8]
- Code fixes to remove notices (if warnings are shown)
- Login field is now correctly typed if email is selected.
- Making it possible to hide fields on the default detail templates by using the attribute `hide`
  - Fields that can be hidden: `description,goal,target,prerequisites,after,quote`

### [1.0.7]
- Fixed text domain on three phrases I missed earlier.
- Fixing validation error for civic reg numbers.

### [1.0.6]
- Adding setting to force customers to be registered before being able to book

### [1.0.5]
- Defining `WP_SESSION_COOKIE` so that we won't get warnings/notices.
- Adding script to autodeploy to WordPress when we make new releases (Commits to production-branch)

### [1.0.4]
- Adding action `eduadmin-bookingform-loaded`, so that plugins can fire when the booking form is loaded.

### [1.0.3]
- Removing `.official.plugin` and `auto_update`, since we are running as a normal plugin now.

### [1.0.2]
- Removing internal language files
- Removing `README.md` and `CHANGELOG.md`, these live inside `readme.txt` (this file)
- Bugfix for questions and attributes with only one option (SOAP API gave us an object instead of an array)

### [1.0.1]
- Modified when languages should load (`plugins_loaded` instead of `init`)
- Changing text domain everywhere to `eduadmin-booking` (new WordPress-slug)
- Adding `autocomplete="new-password"` to password-field when you register a new account while booking

### [1.0.0]
#### WordPress-plugin compatibility/requirements
- Removing unnecessary paths (for functions that are never used)
- Fixing the correct way to include files (by path, not function..)
- Sanitizing everything I can think of/find.
- Modifying how pages are outputted.
- Implementing `WP_Session` to get rid of `$_SESSION`-usage
  - Finally found how to get rid of `$_SESSION` in the custom ajax-handlers.

#### Added
- Shortcode attributes on `[eduadmin-listview]`
  - `showsearch`: Overrides settings to show the search
  - `showcity`: Sets if you want to show/hide city from the list
  - `showbookbtn`: Sets if you want to show/hide the book button
  - `showreadmorebtn`: Sets if you want to show/hide the read more button
- Shortcode to show all public pricenames on Course `[eduadmin-coursepublicpricename]`
- Setting to hide invoice email
- Attribute to hide invoice email `[eduadmin-detailview hideinvoiceemailfield="1"]`

### [0.10.24]
#### Added
- Fixed validation-bug in javascript if you only had the contact person as a participant.

### [0.10.23]
#### Added
- Added pluralized text to the shortcode that shows course days `[eduadmin-detailinfo coursedays]`
  Now outputs `1 day` or `2 days`
- Reformatted the HTML for contact/participant names, so we can use 50% width. Works in *most* cases.

### [0.10.22]
#### Added
- Add sorting to pricenames in Eventlists
- Fixed faulty tooltips for `orderby` and `order`

### [0.10.21]
#### Added
- Check if number of free spots is equals or less than 0, instead of only 0.

### [0.10.20]
#### Added
- Added setting for List-views, to show week days (only event lists)

### [0.10.19]
#### Added
- Added support for attribute `courseid` in `[eduadmin-objectinterest]`-shortcode

### [0.10.18]
#### Added
- Added discount card-support, so end customers can use their discount cards when they book a course

### [0.10.17]
#### Added
- Added extra code to prevent bookings to go through when there are no free spots left

### [0.10.16]
#### Added
- Fixing code styles
- Fix sorting in `template_GF_listCourses`, again

### [0.10.15]
#### Added
- Bugfix: Logging in on non-existing contacts activated some kind of warning

### [0.10.14]
#### Added
- Fix in `template_GF_listCourses` to fix sorting

### [0.10.13]
#### Added
- Added new class `EduAdminBookingHandler`, to process bookings from the plugin
- Added span element around event time in booking form, so you can hide it.
- Moved booking handling to `EduAdminBookingHandler`.
- Added custom actions `eduadmin-checkpaymentplugins`, `eduadmin-processbooking` and `eduadmin-bookingcompleted`


### [0.10.12]
#### Added
- Bugfix: Fixed a bug where you were unable to select a single event.

### [0.10.11]
#### Added
- Fixing issues stated by scrutinizer
- Added class `EduAdminBookingInfo` that is passed to action `eduadmin-processbooking`
- Moved the redirect from when you've completed a booking to `createBooking.php`
- Added `NoRedirect`-property to `EduAdminBookingInfo` to skip the redirects after a booking is completed.
- Redid the `EduAdminClient` to conform to coding standards
- Added filter `edu-booking-error` so we can show dynamic errors in booking process.
- Fix: Show start/end-time on events with only one course day

### [0.10.10]
#### Added
- Fixing issues stated by scrutinizer
- Added `exit()` after `wp_redirect()`
- Bugfix: Correctly matching logout with `stristr`

### [0.10.9]
#### Added
- Bugfix: Sessions are now set before the class is loaded
- Changed how we handle redirects (Login/Logout)
- Plugin-support: We can now save plugin-settings
- Added .scrutinizer.yml
- Fixing issues stated by scrutinizer

### [0.10.8]
#### Added
- Trying to build everything as classes instead, just like WooCommerce
- Bugfix: While fetching prices, we should use the same date span as everything else.
- Started coding support for plugins

### [0.10.7]
#### Added
- Default translation is now in Swedish.

### [0.10.6]
#### Added
- Fixes mobile-layout on detail-page (Template-B)

### [0.10.5]
#### Added
- Added better version-check (support-wise)
- Bugfix: civic validation (Do not validate the invisible template)

### [0.10.4]
#### Added
- Added lots of `shield.io`-badges
- Added support to use [GitHub Updater](https://github.com/afragen/github-updater)
- Adding Travis-CI to begin experimenting with tests
- Adding check to `edu.api.authenticate.php` so we don't get warnings in travis
- Adding phpunit-tests to travis
- Added fix to session_start
- Redoing date limits for shown events. (Soon I'll have to make a setting for this)
- Updated readme.txt

### [0.10.3]
#### Added
- Adding span around time in eventlist, so it can be hidden with css `.eduadmin .eventTime` and `.edu-DayPopup .eventTime`

### [0.10.2]
#### Added
- Added option to block editing user fields of they are logged in

### [0.10.1]
#### Added
- Admin notices instead of just blurting the error text into the page.
- Pulled #64 and #63 from @ekandreas to fix composer compatibility and proper way to set access levels in menues.

### [0.10.0]
#### Added
- New date-handling, if there are more than 3 date groups, we show a popup instead
- Bugfix: Added CustomerID-filter to more lists (it flashed some events that were customer related)
- Bugfix: Removed debug info from "Spots left"-text

### [0.9.19]
#### Added
- Added classes to participant-lists, so that the headers can "set" the style easier than using strange CSS-selectors
- Bugfix: Places left didn't account for max spots.

### [0.9.18]
#### Added
- Switched version-numbering to `semver` to make it easier to use with composer
- Added participant-list under "My bookings" as requested by issue #62

### [0.9.17.16]
#### Added
- Bugfix: Pricenames with zero max participants should be selectable

### [0.9.17.15]
#### Added
- Rudimentary support to block people from booking with certain price names (Only when it's selectable)
- Bugfix: Javascript, dates, string. Woe is me.

### [0.9.17.14]
#### Added
- Bugfix: Validation in Javascript is a pain in the rear.

### [0.9.17.13]
#### Added
- Bugfix: Added code to save invoice reference on single participant bookings
- Bugfix: Fixed an JS-error on login pages.

### [0.9.17.12]
#### Added
- Added an extra option in customer groups, and a required flag, so you HAVE to choose a group before saving.
- Added invoice reference field to single person booking

### [0.9.17.11]
#### Added
- Bugfix: Page title must set separator as default parameter, or else things break

### [0.9.17.10]
#### Added
- Why did I change how we check for subjects? We now check against name again
- Bugfix: Page title should not contain object multiple times
- Show an error if you are trying to login with an invalid civic reg no
- Changed serialization of new customers, so it doesn't throw warnings about incomplete classes
- Fixed SingleParticipant-booking so that there will be less duplicates (It actually checks the logged in user customer and contact person)
- Fixed MultipleParticipants-booking so that there will be less duplicates

### [0.9.17.9]
#### Added
- Added `disabled`-filter in customer check (Login), just in case.
- Adding support set page title on detail pages (old wp, new wp and "All in one SEO")
- Added option to set which field you want to use as page title
- Bugfix: Search with category, subject and course level should now be working
- More validation in login-form
- Bugfix: Places-left fix when below zero. It showed "Few spots left", instead of "No spots left"

### [0.9.17.8]
#### Added
- Added warning for missing civic reg.no in booking form (instead of saying they participant is missing their name)
- Bugfix in civregno formatting

### [0.9.17.7]
#### Added
- Readded `flush_rewrite_rules();` when `eduadmin-options_have_changed` is set to true, so we can get rid of the stupid "Go to Settings -> Permalinks and save to fix the paths" (I hate wordpress)
- Removed a lot of `?>` from PHP-files, so we won't output any data where it's unwanted
- Removed dashes except last one in validation
- Added civic reg.no validation to login forms

### [0.9.17.6]
#### Added
- Added link in booking form to log out the current user (if logged in), in format `Not person? Log out`
- Added more phrases to `defaultPhrases.json`
- If you only allow one participant, inquiries also only allow a single participant.
- Added check if `queried_object` is set before checking it.

### [0.9.17.5]
#### Added
- Added LICENSE.md
- Added limitedDiscountView in bookingTemplate to handle limited discount cards
- Added some phrases to defaultPhrases.json (I've got to find a way to do this automagically)
- Bugfix: Fixed date format function on profile -> discount cards. (used an old function)
- Bugfix: Suppressing warnings if `HTTP_REFERER` is missing
- Bugfix: We should use `edu__` in string concatenations instead of `edu_e`
- Bugfix: Event inquiry used the old date function
- Bugfix: We should pass along the settings to use event inquiries all the way..

### [0.9.17.4]
#### Added
- Option to use civic reg.no validation (Swedish) in Booking settings
- Validation support in `frontendjs.js` to validate swedish civic reg.nos
- Added css-style to required input fields (`.eduadmin .inputHolder input[required]`)
- Added `<meta name="robots" content="noindex" />` to detail pages if no `courseid` is present, to prevent broken detail page to be indexed by search engines.
- Bugfix: Booking-form-login now checks the correct field when we try to login

#### Removed
- Removed validation of existing password to enforce password retrieval on contacts with `NULL` passwords.

### [0.9.17.3]
#### Added
- Added option to set how many "few" spots is when you use "Text only"

### [0.9.17.2]
#### Added
- Bugfix: Invoice info should be shown if you don't use the setting from [0.9.17]

### [0.9.17.1]
#### Added
- Bugfix: Search applies to events now as well..

### [0.9.17]
#### Added
- Option to hide invoice information when events are free
- If the above option is used, hides invoice information from free events

### [0.9.16]
#### Added
- `edu.apiclient.AfterUpdate` can be used as a function in javascript to run after the page has loaded all EduAdmin-related things.
- Added automatic focus on searchbox after searching
- Bugfix: It's called `debugTimers` not `debug` :)
- Missed a couple `LastApplicationDate` fix in the code
- Bugfix: It's also commonly known that you should check if all variables are declare
- Fixed date listing in event list templates
- Bugfix: Since you can change login field, we should populate the field used instead of only email.

### [0.9.15]
#### Added
- Added `singlePersonBooking.php` to handle when the participant is customer, contact and participant.
- Added `__bookSingleParticipant.php` and `__bookMultipleParticipants.php` to handle different settings.
- Fixing `frontend.js` to work with single participant-settings.
- Switched to openssl_encrypt/decrypt since mcrypt is deprecated
- Added class name to dates, so you can style them yourself
- Added span around venue name, so you can style it, if you want to
- Adding support to load existing attribute data to customer and contact, when loading the booking form. (Would be bad if we emptied it..)

#### Removed
- `getallheaders` is now gone, forever.

### [0.9.14]
#### Added
- Attributes can now be saved on customers, contacts and participants (person) (Only multiple participants currently)

### [0.9.13]
#### Added
- Added support for attributes (customer, contact and person) in booking form.
- Added functions to render the different attribute types, attributes not supported is multi value attributes, dates, checkbox lists and HTML
- Added: Saving customer attributes
- Bugfix: Phrases
- Booking login form didn't care about what field you chose, it does now.
- Pre-booking form also didn't care about what field you chose, it also does now.

### [0.9.12]
#### Added
- Added option `eduadmin-allowDiscountCode`, to enable the customers to enter a discount code when they book participants for a event.
- Bugfix: When copying contact to participant, correct field is now copied, instead of surname.
- Added backend-api file to handle checking coupon codes
- Added support to validate coupon codes against the api
- Added support to recalculate the price and post the coupon with the Booking

### [0.9.11]
#### Added
- Removed `margin-top: 1.0em; vertical-align: top;` from `.inputLabel` and replaced with `vertical-align: middle;`.
- Bugfix: Search was not respected by ajax-reloads. (Bad, bad JS..)
- Added extra option to show city **AND** venue name.
- Fixed all views and endpoints that show city to include venue name if the setting is on.
- Only show date period in the listview event list, instead of all course days.

### [0.9.10]
#### Added
- If you selected civic registration number as login field, you must now fill it in on your customer contact. It's hard to login otherwise.
- Fixed an error with translations in Booking settings
- Fixing [#48](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/48), to allow users to choose "username" field
- Login-code checks the given login field instead of email.
- It is now possible to add your own translation directly in the plugin. (Again)
- Added extra filter to course list (ajax) to skip "next" event if there isn't a public price name set.
- Changed the filter for LastApplicationDate on events to satisfy the needs (and proper implementation) of being able to book the same day

### [0.9.9.2.40]
#### Added
- Set `date_default_timezone_set` to `UTC` to get rid of warnings instead.

#### Removed
- Removed all error suppression regarding dates.

### [0.9.9.2.39]
#### Added
- More "fixes" for the broken host, only error suppression for `date` and `strtotime`

### [0.9.9.2.38]
#### Added
- Lots, and lots of warning suppression (all `strtotime`)

#### Updated
- `CONTRIBUTING.md` is updated (ripped from [jmaynard](https://medium.com/@jmaynard/a-contribution-policy-for-open-source-that-works-bfc4600c9d83#.c42dikaxi))

### [0.9.9.2.37]
#### Added
- This changelog
- Bugfix: if phrase doesn't exist in our dictionary, it threw an error. It shouldn't do that.
- Bugfix: Some users have a faulty php-config and gives warnings about that we need to set a timezone before we run `strtotime`

### [0.9.9.2.36] - 2017-01-05
#### Removed
- Removing our translation, making it possible for third party plugins to translate the plugin by using standard WordPress-translation

### [0.9.9.2.25] - 2016-12-05
#### Added
- Added GF-course view (Hard coded with cities)
- Added attributes `order`, `orderby` on listview and detail info shortcodes
- Added attribute `mode` to listview shortcode, so you can select mode

### [0.9.9.2.5] - 2016-10-04
#### Added
- Added support for sub events
- Changed links to be absolute
- Added support for event dates

### [0.9.7.5] - 2016-09-13
#### Added
- Added attribute `numberofevents` to shortcode `[eduadmin-listview]`
- Fix in rewrite-script
- Added missing translations
- Also adds event inquiries for fullbooked events

### 0.9.7 - 2016-09-06
#### Added
- Added inquiry support in course

[1.0.23]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.22...v1.0.23
[1.0.22]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.21...v1.0.22
[1.0.21]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.20...v1.0.21
[1.0.20]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.19...v1.0.20
[1.0.19]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.18...v1.0.19
[1.0.18]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.17...v1.0.18
[1.0.17]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.16...v1.0.17
[1.0.16]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.15...v1.0.16
[1.0.15]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.14...v1.0.15
[1.0.14]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.13...v1.0.14
[1.0.13]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.12...v1.0.13
[1.0.12]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.11...v1.0.12
[1.0.11]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.10...v1.0.11
[1.0.10]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.9...v1.0.10
[1.0.9]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.8...v1.0.9
[1.0.8]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.7...v1.0.8
[1.0.7]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.6...v1.0.7
[1.0.6]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.5...v1.0.6
[1.0.5]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.4...v1.0.5
[1.0.4]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.3...v1.0.4
[1.0.3]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.2...v1.0.3
[1.0.2]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.1...v1.0.2
[1.0.1]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.0...v1.0.1
[1.0.0]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.24...v1.0.0
[0.10.24]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.23...v0.10.24
[0.10.23]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.22...v0.10.23
[0.10.22]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.21...v0.10.22
[0.10.21]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.20...v0.10.21
[0.10.20]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.19...v0.10.20
[0.10.19]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.18...v0.10.19
[0.10.18]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.17...v0.10.18
[0.10.17]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.16...v0.10.17
[0.10.16]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.15...v0.10.16
[0.10.15]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.14...v0.10.15
[0.10.14]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.13...v0.10.14
[0.10.13]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.12...v0.10.13
[0.10.12]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.11...v0.10.12
[0.10.11]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.10...v0.10.11
[0.10.10]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.9...v0.10.10
[0.10.9]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.8...v0.10.9
[0.10.8]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.7...v0.10.8
[0.10.7]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.6...v0.10.7
[0.10.6]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.5...v0.10.6
[0.10.5]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.4...v0.10.5
[0.10.4]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.3...v0.10.4
[0.10.3]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.2...v0.10.3
[0.10.2]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.1...v0.10.2
[0.10.1]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.0...v0.10.1
[0.10.0]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.18...v0.10.0
[0.9.19]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.18...v0.9.19
[0.9.18]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.16...v0.9.18
[0.9.17.16]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.15...v0.9.17.16
[0.9.17.15]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.14...v0.9.17.15
[0.9.17.14]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.13...v0.9.17.14
[0.9.17.13]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.12...v0.9.17.13
[0.9.17.12]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.11...v0.9.17.12
[0.9.17.11]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.10...v0.9.17.11
[0.9.17.10]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.9...v0.9.17.10
[0.9.17.9]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.8...v0.9.17.9
[0.9.17.8]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.7...v0.9.17.8
[0.9.17.7]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.6...v0.9.17.7
[0.9.17.6]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.5...v0.9.17.6
[0.9.17.5]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.4...v0.9.17.5
[0.9.17.4]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.3...v0.9.17.4
[0.9.17.3]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.2...v0.9.17.3
[0.9.17.2]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.1...v0.9.17.2
[0.9.17.1]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17...v0.9.17.1
[0.9.17]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.16...v0.9.17
[0.9.16]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.15...v0.9.16
[0.9.15]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.14...v0.9.15
[0.9.14]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.13...v0.9.14
[0.9.13]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.12...v0.9.13
[0.9.12]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.11...v0.9.12
[0.9.11]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.10...v0.9.11
[0.9.10]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.9.2.40...v0.9.10
[0.9.9.2.40]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.9.2.39...v0.9.9.2.40
[0.9.9.2.39]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.9.2.38...v0.9.9.2.39
[0.9.9.2.38]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.9.2.37...v0.9.9.2.38
[0.9.9.2.37]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.9.2.36...v0.9.9.2.37
[0.9.9.2.36]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.9.2.25...v0.9.9.2.36
[0.9.9.2.25]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.9.2.5...v0.9.9.2.25
[0.9.9.2.5]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.7.5...v0.9.9.2.5
[0.9.7.5]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.7...v0.9.7.5
