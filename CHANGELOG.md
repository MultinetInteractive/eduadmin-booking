# Changelog

All notable changes to this project will be documented in this file. See [standard-version](https://github.com/conventional-changelog/standard-version) for commit guidelines.

### [3.5.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.5.0...v3.5.1) (2022-09-26)


### Bug Fixes

* **Booking:** Properly handle vouchers ([f2479c5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f2479c5411b51779c8256bdf87e7da84715a1043)), closes [#458](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/458)

## [3.5.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.4.0...v3.5.0) (2022-09-22)


### Features

* Added Certificates-endpoint for OData ([34e1054](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/34e10545cc8a3107910badda2145b2d18819409b))
* **Shortcodes:** Added the possibility to override what type of price you show for the `[eduadmin-detailinfo courseprice]` and `[eduadmin-detailinfo eventprice]` shortcodes ([f63724c](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f63724ce82f9fddb7ce14fc72053f8eff8ee09c9)), closes [#456](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/456)

## [3.4.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.3.2...v3.4.0) (2022-09-01)


### Features

* Booking page now cares about ApplicationOpenDate. If we're not at/past the date, it can't be selected. ([45af1af](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/45af1af2a6ef8a08cbe29f8104146044e368be65)), closes [#436](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/436)
* Listview (events) and detailview now removes the "Book"-button, if there is an ApplicationOpenDate, that hasn't passed yet. ([7bbc8aa](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7bbc8aa94cc412586624bcd46a2540eaf08cb00d)), closes [#436](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/436)


### Bug Fixes

* If course_id is null, don't try to output any ogp or ld-json. ([28f4f8d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/28f4f8d61801950c7c6dc8587f5d618f3f97e125))


### Refactoring

* Add ApplicationOpenDate to available data from the API ([0f49992](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0f499920965e2235297cb5bed21e90513db3629f)), closes [#436](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/436)

### [3.3.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.3.1...v3.3.2) (2022-06-23)


### Bug Fixes

* Added code to handle use of `eduadmin-bookingview` on a separate page (with attributes) ([f475ee4](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f475ee45f058ec0d3c38a23fd370b5ad210d422b))


### Documentation

* Added info about cookies ([511f7ae](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/511f7ae28d2d4e6948b307163113191d629f6f10))

### [3.3.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.3.0...v3.3.1) (2022-06-14)


### Bug Fixes

* Add extra escape-things for input from WordPress, since it adds slashes to everything. ([a07a167](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a07a167ceea8a66c36736bb44728b074a5bb8ae4)), closes [#450](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/450)

## [3.3.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.2.3...v3.3.0) (2022-06-10)


### Features

* OpenGraph-support in detail views for prettier results on Twitter, Facebook, Slack, Discord and many other platforms that supports the OpenGraph standard (https://ogp.me/) ([e0bc773](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e0bc773e4834ee9d7db26925cdcfa1a4fb71ada8)), closes [#155](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/155)


### Bug Fixes

* Better linebreaks (OGP) ([adad674](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/adad6747313211484615386bc90ba209be78b817))
* Fixes oEmbed canonical links. ([d48f816](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d48f81668d45935494c1cab5f86b2460a5120931)), closes [#310](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/310)

### [3.2.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.2.2...v3.2.3) (2022-06-02)


### Bug Fixes

* Enhanced handling of new contacts/customers (can't set the personId or things like that, if they don't exist) ([ea630b5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ea630b5a897daac2a0aaf0ce508203028ba53287))
* Some fixes for Question handling ([c2e4408](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c2e4408722316b8a8ac0e36d543ed781decf37b5))

### [3.2.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.2.1...v3.2.2) (2022-06-01)


### Bug Fixes

* If the country is not required, do not set a default value in the field ([16ed440](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/16ed440cf5b6362ab16281704e491ed0bf3f4162))

### [3.2.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.2.0...v3.2.1) (2022-05-31)


### Bug Fixes

* Change method to filter LastApplicationDate ([59a46fc](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/59a46fc12b32b01629a631d494283827cc8d19f3)), closes [#444](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/444)

## [3.2.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.1.0...v3.2.0) (2022-05-05)


### Features

* **Booking form:** Setting to always allow changing which event the end user wants to attend/book. ([66b3dc5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/66b3dc5b31de26cfda428f4c75b3f6901d331146)), closes [#300](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/300)
* **Course details:** Added limited LD-JSON support, to enable better SEO ([4bf95fa](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/4bf95fafa6ee62ee105f66636ef3c827ce80eee3)), closes [#293](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/293)


### Bug Fixes

* **Booking form:** Remove the global-declarations, it messed things up ([8cc59ee](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/8cc59ee2bac6d7e51fbd34da583cf23af54187a5))
* **Booking page:** If the course is OnDemand, we should load the OnDemand variant instead, to get the events properly ([ba1e525](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ba1e525421c1750ed7f3b2e49d20ee092a691131))
* **Interest registration/Event:** If the course is on demand, we should load that variant, to get the proper events. ([5438067](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/54380675026f5e32d499b6aebf373f98373f2b59))
* **Profile:** If the query is missing, show the normal profile. ([ea4c3ac](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ea4c3acd04bd8f6ba2c1ebaa2417b3ad621b790b))
* **Security:** Hardened cookies with HttpOnly ([cfa2fca](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/cfa2fca974bdf6f5392ba8a421472dceb4d2964e))

## [3.1.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v3.0.0...v3.1.0) (2022-02-23)


### Features

* **My Profile/Bookings:** Ability to sort bookings either by Created (booking) or Event Start Date ([58b85c8](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/58b85c832707d8594c9aeac2e00d773655940e6c)), closes [#427](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/427)
* **My Profile/Bookings:** Added wp-hook/filter for `edu_bookings`, so that external plugins/code can customize the booking list. ([26d0590](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/26d0590fda156ea046debceba5257c1d505bb5fe)), closes [MultinetInteractive/EduAdmin-WordPress/issues/427#issuecomment-1048621038](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/427/issues/issuecomment-1048621038)


### Bug Fixes

* Fixed translation for Export-button in Bookings ([57b7b25](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/57b7b2504002c80a4382bbaec06b54e58f8dce93))


### Documentation

* Fix Copyright notice in RSS-feed ([a69ffd2](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a69ffd2b163f88f5b3c3a5b6792cb1deb887cd54))
* More info for the blog, for better SEO ([7f967b6](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7f967b609a1fa95a2d136e1a5e5acc99d61dd5a0))

## [3.0.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.40.2...v3.0.0) (2022-02-21)


### ⚠ BREAKING CHANGES

* **Login page:** Will probably break any custom styling to the login page.

### Features

* **My Profile/Bookings:** Export bookings into Excel (CSV) ([68c66aa](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/68c66aaca009f17ed5254363d084b43a8ff44555)), closes [#426](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/426)
* **My Profile/Bookings:** Show unnamed participants in list of bookings. ([64d1bd4](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/64d1bd49a31de31f18d2c24f73bdb8e5b1eaa4c4)), closes [#428](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/428)


### Bug Fixes

* **Checksum:** Fix calculation of checksum, forgot to add some files it should ignore, so it generated a faulty hash ([cf05b24](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/cf05b24e19ac9e12b152cae78e64d7ca116dfa27))


### Refactoring

* **Login page:** Remade the login page, so that it looks better on desktop and mobile ([8931993](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/89319935b04cfba88d5b2802078346392d4b7dc2))


### Documentation

* Updated documentation with new styles, enabled blog, wrote our first entry ([ecee658](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ecee6581b186bd30afc39ae95ae28ae38311f19a))

### [2.40.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.40.1...v2.40.2) (2022-02-03)


### Bug Fixes

* Added Book-button to template B (event) ([f760e70](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f760e700ee131266c49ddf3c593e81b35dbc335a)), closes [#418](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/418)


### Documentation

* Update documentation, remove `showmore` from listview, as it was never implemented ([b37c0ad](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b37c0ad790242c0edf9b425095fc5cfe782f514d))

### [2.40.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.40.0...v2.40.1) (2022-01-11)


### Bug Fixes

* Get OnDemand info if the coursetemplate is OnDemand ([075be39](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/075be3967467808ec22d284230623a58da2053b3))


### Documentation

* Add attribute ondemand to detailinfo ([35c5363](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/35c5363cea1992c46e499de42a34655d075e92c2))

## [2.40.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.39.1...v2.40.0) (2022-01-11)


### Features

* **Booking:** Support for OnDemand in the event selector on the booking page ([3416712](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/34167122ae0f60afd8266aad1da81425f27bded9))
* **EDUApiHelper:** Added extra fields for OnDemand, added extra method to fetch OnDemand courses, added filter to block OnDemand from showing up in normal course lists. ([11c6c53](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/11c6c531270b3b371db46550ee70e67a1e21ad37))
* Hide non-on-demand events from event lists ([208f982](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/208f982c7f5df4dd9e9a0297c2a6b10888d9f35f))
* OnDemand support for more views ([ee2d927](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ee2d92748132bc190a351d6d27f6bdd41afe8ef3))
* **Programme:** Hide headers based on course detail setting to hide headers. ([a5baeb0](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a5baeb073f5e6e0b9c9fbfb8d64d3f59f37d461e)), closes [#414](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/414)


### Bug Fixes

* **ApiHelper:** Added LocationId to fix issue with region filtering ([2f012b9](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2f012b9ca1cb36cd0badcb6054476425ae0fef5b))
* Changed from curly brace to brackets to fix error in PHP 8.0 ([175dca0](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/175dca0af713eff97ff66fa4f55e59ff35ca3edd))
* **Detail template:** Change code that checks `$course_level` ([a8e7562](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a8e7562e3f955c7fe87e69bd0917a8eda2a815e5))
* **docs:** Formatting the document was a bad idea ([7e89d27](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7e89d27fc076813ca531fb0452fccf3723032830))
* Fix ajax method that fetches minimum price ([71a4c80](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/71a4c802e0beb96d9ec2bf68cd8111c05ee4ce76))
* Fixed casing for VAT texts ([5c5c7ae](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5c5c7ae884ad014749750925748637cba03d179e))
* How about we use the correct version with nvmrc, update composer installer ([0fef61e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0fef61eceb2a0c32ec192081a8e5fc5f131163ae))
* Output only non-empty parts in the venue info. ([aca146f](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/aca146f784a20785b7bb241d72fae472892d0c8e))
* **Programme/Book:** Added null check for contact and customfields before looping over it. ([f633bd8](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f633bd8cdde2691ee852af2d5ca8634b56d24e30))
* Remove default value from parameter always sent ([f610d1c](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f610d1c08a82b919753da81b1c83b7eca1aca828))


### Documentation

* Added info about `ondemand` attribute for listview shortcode ([baa625d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/baa625dff4ef7997398423a4e0ccc056570aae1b))

### [2.39.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.39.0...v2.39.1) (2021-12-07)


### Bug Fixes

* Missing replacement of lower case VAT-text ([5e2b83b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5e2b83b063236335d02739f399732e4659d0d57b))

## [2.39.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.38.2...v2.39.0) (2021-11-24)


### Features

* Added MNNaturalize to make strings and numbers sortable in a better way ([2b45e0e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2b45e0e5102b78ca90148b7dd338f86f03705d78))


### Bug Fixes

* Fixed sorting of events ([125daeb](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/125daebe66e2c1d0153d151704422975f7197fa5))


### Refactoring

* Simplified reading of the code ([008f472](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/008f47245337a0eda111134c596c3509ecd4e303))

### [2.38.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.38.1...v2.38.2) (2021-11-09)


### Bug Fixes

* Fixed VAT-text to be uppercase ([7878cbd](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7878cbddca383d05e5b132a61258c33b33a30765))

### [2.38.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.38.0...v2.38.1) (2021-11-05)


### Bug Fixes

* **Course booking:** Filtering available events, to not include events that are fully booked. ([bf014de](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/bf014de3e99db0ad6b9c7a5a71c505d8e5371bb5))
* **Course booking:** If the end user visits the booking page without a selected event, select it in the dropdown, if available ([0ec0db0](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0ec0db0e1363926f3d85068918d62304ad4164a9)), closes [#405](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/405)
* **Documentation:** Added CNAME file in static-folder for GitHub Pages, fixed paths in config ([2f8cc2b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2f8cc2bd683b84353e1b101b9a1fb9994291c3cd))
* **Programme:** Fixed so that duplicate sort index-keys won't remove courses. ([578a636](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/578a63650d0feef595b2c26793127c34523b0f7b))


### Refactoring

* **Changelog:** Added .versionrc file to repo, so that we get more info in the changelog depending on what we've done ([e342b02](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e342b028760544dd6bcc2e781e5d574e9f49d636))
* Migrated documentation to new version of Docusaurus. ([44fafce](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/44fafce999ca25f61349096fe19eb68627fc8c3a))

## [2.38.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.37.1...v2.38.0) (2021-10-07)


### Features

* Added attribute `courseattributehasvalue` to allow a user to check if an attribute/CustomField is set/checked ([79f50d5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/79f50d571f2f2fc6af0ad7ef6e98a70e6bcc8044))
* Added support for `Checkbox` in `courseattributeid`-attribute, that will output a translatable string depending if it's checked or not. ([0ffd5ce](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0ffd5cec0059d41824b1099e3766ee460ebd2f5a))

### [2.37.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.37.0...v2.37.1) (2021-07-29)

## [2.37.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.36.1...v2.37.0) (2021-06-14)


### Features

* Ability to change who gets the booking confirmations after a completed booking ([d36075a](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d36075a4253fd495c2987fabc4891de4fed29596)), closes [#218](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/218)

### [2.36.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.36.0...v2.36.1) (2021-05-06)


### Bug Fixes

* Using percent instead of view-width/height. ([e4e58bb](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e4e58bbf5ce1189bca0b8885555858ab490ef797))

## [2.36.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.35.0...v2.36.0) (2021-04-21)


### Features

* Contain price names in elements for easier styling ([ab700c5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ab700c58c3e68c75c9c25edaf77dbdc42c6180c2)), closes [#264](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/264)


### Bug Fixes

* Remove an `a` that shouldn't have been in the price names. ([45f3ec7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/45f3ec758bb0b81d6b292f65e4b61771acc0c793))

## [2.35.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.34.1...v2.35.0) (2021-04-08)


### Features

* Use SortIndex on custom fields ([2d1c15c](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2d1c15c56f3a05d97593d291141e5ccb8c0b232c))

### [2.34.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.34.0...v2.34.1) (2021-04-08)


### Bug Fixes

* Update tested to-variable ([7887b1a](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7887b1a547b3218f7fc2dc0ca8bd00502b64510b))

## [2.34.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.33.1...v2.34.0) (2021-04-08)


### Features

* Book-button now also opens modal with form for programmes ([208d335](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/208d33537ecdb54c3bf0cf6fab4a7addfef63baf))
* Programme booking should use booking form if possible ([3bd9938](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3bd993889d1ec660c7c10ebd1c63c036e014400f))


### Documentation

* Updated the docs a little bit. ([b0705e4](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b0705e48efda54dcbca26e881f54bb85b2285a46))

### [2.33.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.33.0...v2.33.1) (2021-04-07)


### Bug Fixes

* Fixed render info text-function (still not fully converted from old soap) ([4979469](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/49794693913ce6d7c15647f5272572771f279828))
* Remove [@headers](https://github.com/headers) as well ([7567aa5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7567aa53cd13a2aaaf40b32e1372acb2860a2bbe))

## [2.33.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.32.2...v2.33.0) (2021-03-30)


### Features

* Added methods to open/close booking form modals ([ccb9067](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ccb906759fdec21837e143a3e8fbe4f991dcf931))
* Added option to switch out the booking form to one from EduAdmin instead ([915dbbf](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/915dbbf8e07ba8c01b0d1bbcb7bbcf7a9f5cd97b))
* Added PaymentTerms, PriceNames to OData and Consent to REST ([c3f7c15](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c3f7c1551fce9c7aaf81fe0c1359bd15911989a4))
* Added styling for the modal popup + backdrop ([c7e0764](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c7e0764af790423d853ad502696a66352feec326))
* Added support for booking form in API calls, so we can get the URL. ([0b70304](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0b703044558d6378688d9f697fcd1c5d2cc8d99c))
* Added support for event lists (listTemplate) to use the new booking form modal ([2645778](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/264577820ff3860f6f70c48b7b958f3a6e3594b8))
* Added support for the detail view to use the new booking form modal ([fae9d24](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/fae9d2460f7005b71d433ff6f133d1c15f4588c1))
* If the company using the plugin tries to use booking forms without configuring them, show an error in the places that would show the form (Modal variant) ([81fe12a](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/81fe12a2e40902b0e4ed40b2c03e79354940e31d))
* Instead of redirecting the users if they are explicitly linked to the booking form page, we'll shove an iframe in there. ([8d0a4e7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/8d0a4e725f5b38b4098d07dd9e4499c4964056b4))
* Making it so that when you activate the plugin, and don't have a booking page selected, we'll set the booking form option to true. ([5b3fe54](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5b3fe54e8d36daaf2599f82571288f7f67176a1d))
* Warn users that booking form needs to be configured in EduAdmin ([9b41947](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9b41947fd7f18c43168c9a3b82eaac75d1bc16e1))


### Documentation

* Slight update to a title in the Getting Started docs. ([fea5e51](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/fea5e51fc3ff0fc751a3d321a679f2c7ba26a6d6))

### [2.32.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.32.1...v2.32.2) (2021-02-17)


### Refactoring

* Use empty instead of count. ref [#377](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/377) ([d396c35](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d396c35c9363bb8f6f8dede41f7849a0d935b0f7))

### [2.32.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.32.0...v2.32.1) (2021-02-17)


### Bug Fixes

* Added extra check for Events in the booking form, so we can detect if there are any available events or not. fixes [#377](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/377) ([ac5df01](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ac5df01b2da5c64d302bbde6af7a9928cdf96b4f))

## [2.32.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.31.0...v2.32.0) (2021-02-09)


### Features

* The return of the Info text-field. fixes [#375](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/375) ([3d4644d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3d4644df31d2013b7ccaa1bc9a943768988160cd))

## [2.31.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.30.1...v2.31.0) (2021-02-08)


### Features

* Added separation of expired/used up limited discount cards. fixes [#373](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/373) ([6aca7d0](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6aca7d090a0c07ee6bf6d3972013dc7e9f1c2370))

### [2.30.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.30.0...v2.30.1) (2021-01-15)


### Bug Fixes

* Removed the strange occurrence of a closing div-tag. fixes [#371](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/371) ([b187e1c](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b187e1c4dea873d15d0a2eecfbf4512e9fff7df3))

## [2.30.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.29.1...v2.30.0) (2020-12-10)


### Features

* Added some protection against booking events that have already past their start date ([03a5423](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/03a542306926c767d056d7e2001a2d821e51e3a1)), closes [#357](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/357)

### [2.29.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.29.0...v2.29.1) (2020-12-10)


### Bug Fixes

* And same fix for Programme bookings (not being able to create WP-users) ([1b017a7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/1b017a780752dc00b7025e65456c16bcb8074713))

## [2.29.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.28.4...v2.29.0) (2020-12-10)


### Features

* Added another category for date settings ([2d61b08](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2d61b08b01ffeff69d00250dd630bd5840569cd2))
* Added get_option to main class with our request cache, to speed up fetching same option multiple times per execution/page request ([08721f9](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/08721f99f1d0d4d85220bb476935e7330ef74cbc))
* Added way to restore settings to default values for dates ([bd1b062](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/bd1b06221fffff13b2d92c851230b45901059de1))
* Adding new Date Settings-page ([f6b3296](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f6b329654faaf9ebd687cb2c9e617da15f0416ed))
* Date formatting in list view (events), template A ([dc52908](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/dc52908aa2f5778b869e9c438819f3c82474f5be))
* Date settings applied for list view (event) ([309398e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/309398eeeab6c949fa6775954954c3085b44b4c0))
* Fixed template B event list. ([783082d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/783082dc52a7c0bc8339ab06ed927de3a1b0a516))
* Remade some options in the date settings page, added method to output event dates that listens to the options ([79482c2](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/79482c27335ebd9a086a1ab2a245d62400dffa8a)), closes [#254](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/254) [#356](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/356) [#354](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/354)


### Bug Fixes

* Fixed a bug where the ParticipantVat went missing after an ajax reload in event lists (listview, not detail) ([34d7976](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/34d79768a70eaf8c2ab325c6249a41518fbb65a6))
* Move robot-check into the other checks first, to not block creation of users in WP ([3dbd5e7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3dbd5e75d2a7850a8812b48ffed5ba5e54da5ec0))


### Documentation

* Removed internal documentation from meta-bot and added link to external page. ([e50b2bf](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e50b2bf8052daf7e206c8b6474a21b0333eb2255))
* Removed Swedish as language for the plugin documentation ([33d7109](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/33d7109c5a345b8bc312a69389ca9600253af07d))


### Refactoring

* Doesn't need to be echoed. ([3a0779e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3a0779e206811e87febfa0ac65fe5f3c2bd97a1f))
* Removed custom format, because it's gonna be hell to implement that one. Let's stick with options for now. ([6bd2d39](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6bd2d39eea05089a95f5656a2656dc981e3a0f70))
* Removed settings text for programme (only events supported now) ([0c803a5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0c803a5ca491eaae7dd4652a3fd20d207742a48a))

### [2.28.4](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.28.3...v2.28.4) (2020-12-02)


### Bug Fixes

* Added permission_callback to register_rest_route (Thanks wordpress, I hate you) ([50859d2](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/50859d21c7a55b2e49683fbe065328d031eb626d))

### [2.28.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.28.2...v2.28.3) (2020-11-30)


### Bug Fixes

* Hide the captcha-fields on all devices. ([1def084](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/1def0842f4bd0d77c6b61d420f5ba243eef73315))

### [2.28.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.28.1...v2.28.2) (2020-11-27)


### Bug Fixes

* Added extra check for reCAPTCHA in javascript, since sites can load multiple recaptchas. ([3dd86df](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3dd86dfed1cb22124a77d02c88a4cd0af1f8a999))
* Fixed question handling for radio buttons ([4b61b73](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/4b61b73264bb813fd66eb9213c768aaf9e93e634))

### [2.28.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.28.0...v2.28.1) (2020-11-26)


### Bug Fixes

* Removing double output of start/end time if there's an event with a single day ([d91d2e8](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d91d2e84783525193c24043c15f791327894c52c))

## [2.28.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.27.0...v2.28.0) (2020-11-23)


### Features

* Added method for MultiNet to fetch diagnostics info ([94e20f1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/94e20f12f1097e5acc15cef61df25f922bff568b))

## [2.27.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.26.2...v2.27.0) (2020-11-19)


### Features

* Added basic support for reCAPTCHA v2 Checkbox. (Only booking form, not interest registration) ref [#157](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/157) ([b357789](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b3577894ba092b5cfad23883ddca58f6b50bfefc))
* Added more honeypots to booking form ([6efadc1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6efadc1c569ff4c01041392a02556ac9fb8f7d62)), closes [#157](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/157)


### Refactoring

* Disabling date-settings page for the moment ([7ee1e01](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7ee1e01394984f6758fc8e5ce320b393e54ef174))

### [2.26.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.26.1...v2.26.2) (2020-10-26)


### Bug Fixes

* Fixing date output in detail template ([25f64ab](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/25f64abdeddce2e8490ec8774c6f19f281112950))
* Hiding warnings from inability of setting headers ([6557b10](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6557b10f7079cb4ae1ef6a78ed09381f06d1d2a4))

### [2.26.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.26.0...v2.26.1) (2020-09-17)


### Bug Fixes

* Additional fix for old version of PHP cookies. ([118870e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/118870e4d3d06a617366fde19eaa48b83ec1d698))
* Sorting programme events by ProgrammeCourseSortIndex ([b2f7bd4](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b2f7bd465f84a857813331d4705ef5e7bea4cdde))

## [2.26.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.25.0...v2.26.0) (2020-09-17)


### Features

* Added support to make the search form react on query parameters as well, and not only posted variables. ([45b3fb2](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/45b3fb25d8f2003b942e43e0e8c0b26c956ec337))


### Bug Fixes

* Removed unused $_COOKIE, since everything works through EDU()->session now ([4a31776](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/4a31776992adb8b9e36875ca138b15f7dc664d13))
* Rewrote session/cookie lib to work with samesite and other things.. ([47c5fda](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/47c5fda02b9cf20698816a9059e4e884cb25232e))

## [2.25.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.24.4...v2.25.0) (2020-08-27)


### Features

* Added ability to post coupon codes on programme bookings as well. ([3852568](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3852568443961b1b079bac1e06231c474a59b515)), closes [#349](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/349)


### Bug Fixes

* Fixes missing CSS for required participant fields ([5867ba5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5867ba500ecc76f99ee0859249529233cfad9fe5)), closes [#350](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/350)

### [2.24.4](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.24.3...v2.24.4) (2020-08-24)


### Bug Fixes

* Fixes required-fields-bug that was introduced when we started adding the `data-required` attribute since hidden required-fields was bad practice ([c39bce1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c39bce161cbb8caef3621f7973631edd2e3ccfd5))

### [2.24.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.24.2...v2.24.3) (2020-08-24)


### Bug Fixes

* If you use SingleParticipant, required fields/questions should now work properly again. ([03d2c37](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/03d2c37529e1ccf38092850cca75236a4d54f84a)), closes [#346](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/346)

### [2.24.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.24.1...v2.24.2) (2020-08-21)


### Bug Fixes

* Force sort on ProgrammeCourseSortIndex to keep the configured sort index in EduAdmin. ([21f1298](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/21f12987d821b5a7b83316e0d06e7eafdc13fe32)), closes [#344](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/344)
* Send confirmation email options on programme bookings as well. ([41ba93b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/41ba93be71a67e8ce46feb1682c5c715b416054c)), closes [#343](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/343)


### Documentation

* update versionnumber ([a551c51](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a551c518b4ddb4d67e7a27b6069aa1c433c3913f))

### [2.24.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.24.0...v2.24.1) (2020-08-21)


### Bug Fixes

* If the MaxNumberParticipants on a programme is 0, we should let people book. ([37ccfba](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/37ccfbafbb4834e5e6084569677d2872d4912bf8)), closes [#339](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/339)
* ParticipantVat is not available on sessions/sub events ([acbfc94](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/acbfc942670f9798b71fdac120ed1d5834d326fe))

## [2.24.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.23.0...v2.24.0) (2020-08-20)


### Features

* Changing how we output prices in accordance to the new setting ([0d56f66](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0d56f66408c823a392dcdc766d1b7067c62cfc6b)), closes [#327](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/327)


### Bug Fixes

* We should allow the use of AddParticipant if it's a programme. ([7a14206](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7a1420616670c35d3e28c525f29787304e629bc6)), closes [#338](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/338)

## [2.23.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.22.1...v2.23.0) (2020-08-17)


### Features

* Use same method of showing dates for programmes as with course days.master ([9cc1948](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9cc19483695854fd35f72397f7ea968d9c2e7ef2)), closes [#319](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/319)

### [2.22.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.22.0...v2.22.1) (2020-08-17)


### Bug Fixes

* **detail:** Don't use the timezone-reformatting code on the course information time-variables, they don't know what timezone they belong to.master ([0ec92e9](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0ec92e9a128eaa73f6b65a9475145c31e7061ad0)), closes [#335](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/335)


### Documentation

* Added link to changelog ([1eb2fa5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/1eb2fa5b7f9bd8559566cf8b61a2664e0be02d8f))

## [2.22.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.21.0...v2.22.0) (2020-08-17)


### Features

* Adds attribute to make the listviews able to show sub-categories by specifying categorydeep. fixes [#303](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/303) ([5f19a6e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5f19a6ee0f7f48cd4442760c145a24a6abbd3e62))


### Bug Fixes

* Disabling all autocomplete ([9080625](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/90806255128748c612c149043002ce51f2ed19de)), closes [#317](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/317)


### Documentation

* Add info blurb about only being able to use one of the category-attributes ([bbc0737](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/bbc073720c8ba5f8d9a1cbda0f9d485431d2e73c))

## [2.21.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.20.0...v2.21.0) (2020-08-10)


### Features

* Added CSS-classes to interest registration pages. ([9916936](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9916936624d542562e2b431b5c6a9038e1786027)), closes [#329](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/329)
* Removed requirement for number of participants on interest registrations. ([3de2847](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3de28470bf3374305094620453b4550ac64e1383)), closes [#328](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/328)

## [2.20.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.19.7...v2.20.0) (2020-08-06)


### Features

* Added Programme-image to detail view. ([b3cc17c](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b3cc17cd0b4aca2ecef508bc3b4a58f4241bad1e)), closes [#330](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/330)


### Documentation

* Added some more info about troubleshooting. ([fdc0480](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/fdc0480e18148c55511a14150d0aa406d5a11ac2))
* Changed support URL ([2df5387](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2df538739ba040972e8c268cad1baf20f7ec6ade))
* Moved a line to the correct group. ([1c078c0](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/1c078c043bd8c79195f11afe24d41173bc31486a))
* Text about missing features ([c03c993](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c03c9938587f07b2eee24f00ff53c3dc9ca5a9a8))

### [2.19.7](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.19.6...v2.19.7) (2020-07-15)


### Bug Fixes

* Found an instance where we shouldn't add the timezone to the dates, because.. it's impossible. ([29c75df](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/29c75dfe9c45e97ad0356ff3b85ccc3e14740674))

### [2.19.6](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.19.5...v2.19.6) (2020-07-15)


### Bug Fixes

* Rolling with our own date methods, since the built in didn't do what I expected ([e57e2dc](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e57e2dc5c046edb8127d758078465dc1c215330b))

### [2.19.5](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.19.4...v2.19.5) (2020-07-14)


### Bug Fixes

* **dates:** Using another method from WP to present dates instead.. ([560df4b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/560df4b25255b56e1d497274ae2960fabfabe6f8))

### [2.19.4](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.19.3...v2.19.4) (2020-07-07)


### Bug Fixes

* Use `date_i18n` instead of `date` to get the correct timezone as well! ([7f2083f](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7f2083f630048b0eabf78c7af51bab9f4b8e5044))

### [2.19.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.19.2...v2.19.3) (2020-07-02)


### Bug Fixes

* Fixed so that the booking form cares about MaxParticipantNumber being set to zero (unlimited) ([25017be](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/25017be90314e517d6bba2bb15f71fd70a1739e4))
* Removed the use of setting timezone. ([fa63461](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/fa63461318f564d821afaf4797cb79fe53cced0e))

### [2.19.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.19.1...v2.19.2) (2020-05-15)


### Bug Fixes

* Correct date format. ([28ab52f](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/28ab52f6436e9a16a85f276866fd2c201f6f2030))

### [2.19.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.19.0...v2.19.1) (2020-05-14)


### Bug Fixes

* Changed output for certificate dates into a separate function, to handle missing start and end dates. ([cba1e2b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/cba1e2b539b4f2e18a40809485e7c562903c5fb2))

## [2.19.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.18.1...v2.19.0) (2020-05-13)


### Features

* Added missing method to delete programme bookings ([94f21d2](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/94f21d28a1cf22b11c3eb921072556356aba437d))


### Bug Fixes

* Don't show tabs for certificates or discount cards, if the end customer doesn't have one. ([9d67661](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9d67661f842f6868c1a7bd5a8193f0240bdd41af))
* Show certificate dates in YYYY-MM-DD instead. And only show ValidFrom if it's available. ([6f83515](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6f835157a59d647c8ca13575d1bbf4f5ad3f1edb))

### [2.18.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.18.0...v2.18.1) (2020-04-22)


### Bug Fixes

* Changing how we verify the nonce while paying. ([ce6027e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ce6027e287314a8cbb26c87f23e6d34fe904a9dc))

## [2.18.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.17.1...v2.18.0) (2020-04-14)


### Features

* Added canonical URL for programme as well ([9be5bff](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9be5bff2d25dfd67625a2c8a13b0396b4d9ef45d))
* Setting canonical URLs for detail/booking ([cbfec72](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/cbfec7218d5e3d53482f80365ac397eb0104d979))

### [2.17.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.17.0...v2.17.1) (2020-04-06)


### Bug Fixes

* **css:** Changed from `flex: 1` to `flex: auto`, because IE11 broke otherwise. ([76b681b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/76b681b61494f34f8b9edf497f101ec2c05b45b2))

## [2.17.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.16.2...v2.17.0) (2020-03-20)


### Features

* Ability to stop sending confirmation emails ([37f9ff6](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/37f9ff6ed8bac1913a1f11f912c069dd5f8c4cdf))

### [2.16.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.16.1...v2.16.2) (2020-03-19)


### Bug Fixes

* Wrong translation method used for payment methods ([78216eb](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/78216eb896bde4ac7d99fe594fa88035d5e5159f))

### [2.16.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.16.0...v2.16.1) (2020-03-19)


### Bug Fixes

* **payment:** Properly check for PaymentMethodId ([8a526d1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/8a526d1ea7906b74063266a1b8bdae4ec27d10ed))

## [2.16.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.15.1...v2.16.0) (2020-03-04)


### Features

* Added Countries to API Client ([e91f109](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e91f109d82e19d1befe153dbf120bfbf8b741fcf))
* **changelog:** Added changelog to the readme visible on WordPress with the latest 4 versions ([99890c6](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/99890c6ef0feff446fd0eca30d6c0b1d3a7c8e11))

### [2.15.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.15.0...v2.15.1) (2020-03-04)

## [2.15.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.14.1...v2.15.0) (2020-03-04)


### Features

* **ci:** Automatic update of checksum to lessen the amount of mishaps. ([d64a6d3](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d64a6d35d87c17fcecc5070394ea42b9e0a08fbf))

### [2.14.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.14.0...v2.14.1) (2020-03-03)


### Bug Fixes

* Re-added history.go(-1), because some customers used that ([18d62e4](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/18d62e4b677a4f21a1f0c2d53ae063d8d6021b7c))

## [2.14.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.13.1...v2.14.0) (2020-02-24)


### Features

* Added data-attributes for courseid and eventid on detail and booking views, so they can be targeted by CSS (if needed). fixes [#297](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/297) ([bd541f7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/bd541f7207aa4d5b0335d9336b3109b1c1364a43))


### Bug Fixes

* Fixed a logic error in the price computation output. ([b7b6211](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b7b6211b1a1342199b4c1756c996f1519dc388f9))

### [2.13.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.13.0...v2.13.1) (2020-02-06)


### Bug Fixes

* Fixes discount code validation ([0aa14ea](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0aa14ea94ebffb95f0f00a9910dd004e9fbcd459))

## [2.13.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.12.0...v2.13.0) (2020-01-15)


### Features

* Added code so that we send the CountryCode to EduAdmin ([9096904](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/90969042bc4c59a8bdb018e146d891b510f86ac6))
* Added country-selector for customer + invoice information (not sending it yet, as it is not supported in the API yet) ([1a98fe6](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/1a98fe608b0d438c8324b09d7a8fa135b7550e4c))
* Added Country-selector to Single Person-booking ([2216f94](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2216f9437ffdaed7a5ef7f4767e8a56ffd0d7e96))
* Added CountryCode to ContactPerson-class ([bf40ba7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/bf40ba7a54ce4e9607bfea090992d23cfa0ad538))
* If the logged in/new customer doesn't have any country code, we will fetch it from the EduAdmin account, and default to SE if it's missing. ([52afa7f](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/52afa7feab4f57777364759099ee2833e1504ef5))

## [2.12.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.8...v2.12.0) (2019-12-17)


### Features

* 🎸 Add optional filter for `get_integrations` ([e1fd75d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e1fd75d45cdeaea3cc1b8cb51be0708883adc3df))
* Added plugin type, and method to return a label for said type ([9bf1804](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9bf18044c13d2f6d08c62c72d3a6a1eb99326bb1))
* Do not run payment-plugins if the totalsum is zero ([e2b4493](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e2b44935fb83c38b978d4d42e10b77afeb8b203d)), closes [#288](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/288)
* Only send bookings through payment plugins if they are PaymentMethodId 2 (Card payment). ([6917ff0](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6917ff0f4f67515ac6f0806c2ef9627c3f32225d))
* Setting to enforce use of payment plugin. ([7fd4114](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7fd4114ee1ee03a6be8f566a43db00a506cb1b61)), closes [#290](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/290)
* Showing plugin type label in list of installed plugins ([bb015a3](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/bb015a3970025382d4690e9ab291ede8eea06426))
* The end user now has the possibility to select payment method (if there are multiple available) ([9aaab43](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9aaab43d34b377d5e6ebd26e6fe4c7085b8e5e68)), closes [#289](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/289)


### Bug Fixes

* Fixes so that programme bookings get a correct price check even if you don't have any participants/contact person details. ([3734187](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3734187d005ca8e7875c82e691ae77f051ba8619))
* Moved payment-methods to root-folder of content, because it's used by both programme and normal events. ([d7d1bfe](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d7d1bfe7e57e35a51bcefb90a72563bab2b7902d))
* we fall back to invoice through EduAdmin if there are no available plugins. fix for [#290](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/290) ([e545b4b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e545b4bfec15334a5530eaeb6be6aa7fcd6956ea))


### Refactoring

* Check data before accessing it ([1121aa4](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/1121aa40a4253af0e251bf5593e04ff37857cf7e))

### [2.11.8](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.7...v2.11.8) (2019-11-22)


### Styling

* 💄 fixes [#279](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/279) by adding classes to all labels in profile ([f2948fa](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f2948fa70baa4e8b91a1c5d701bb3537f193cee6))


### Documentation

* ✏️ Translated docs into swedish ([97e12b9](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/97e12b9e2b820c4a7e7d5d673c7111c011f97147))

### [2.11.7](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.6...v2.11.7) (2019-11-15)


### Bug Fixes

* 🐛 Adding custom CSS in wp_footer instead ([7e725bb](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7e725bb8440061cacefe374520c0760d2b9c38a5))

### [2.11.6](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.5...v2.11.6) (2019-11-08)


### Bug Fixes

* 🐛 Removing the javascript-version of back (FF-bug) ([f382807](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f382807ff81cb30fe2ce0cc59327d3480b3a64ee))

### [2.11.5](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.4...v2.11.5) (2019-11-07)

### [2.11.4](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.3...v2.11.4) (2019-11-07)


### Bug Fixes

* 🐛 Line endings can be troublesome ([b8e1411](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b8e14114834973707a9048efcf022cfcabc4650c))

### [2.11.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.2...v2.11.3) (2019-11-07)


### Bug Fixes

* 🐛 Correct path for new submodule ([5d21b42](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5d21b42fac6395911a90fac09c7e2e4d23e850c1))
* 🐛 eventinquiry check = 1 ([44ebf33](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/44ebf33cfb9b832f3336420db3ccd3d1e285d451))
* 🐛 Sorting all files for int-check, added debug-thing ([12fd9a7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/12fd9a75841f94b351615c1430b913c82b897a21))


### Refactoring

* 💡 Added submodule ([64e1218](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/64e12186cceada726fc7642699f66a8352cba35a))
* 💡 Adding PHP-version to phone-home-data ([158d5b5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/158d5b5c462bbd77398dc7521fae1dc266fdf62e))
* 💡 Moving api client to submodule ([f65a578](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f65a578264a337c899d6c7ca5f1b40c95b302c2f))

### [2.11.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.1...v2.11.2) (2019-11-07)


### Bug Fixes

* 🐛 Don't output all checked files ([49bc1af](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/49bc1af0a9dbb413ebee6f178fb8687a7501cd4e))

### [2.11.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.0...v2.11.1) (2019-11-07)


### Bug Fixes

* 🐛 Removed folder from checksum-check, removed scripts ([1bc3ed1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/1bc3ed169d1b6a42f9eeddbd2facb2be8a45f2a7))

## [2.11.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.10.1...v2.11.0) (2019-11-07)


### Features

* 🎸 Plugin integrity check ([d56608e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d56608e6f4817b0e840c994557a2927c3ba8018b)), closes [#280](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/280)


### Bug Fixes

* 🐛 Fix for actions ([72ba312](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/72ba3124220cebf167c41a8eccaf4d5528f38ec5))


### Documentation

* ✏️ Added documentation code ([e710127](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e71012720dda7ccdd0f9fe373132f8d0957b00fb))
* ✏️ Added more documentation ([9212a37](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9212a37d9f35abcd4f8979a807d82a9762fb6a9b))
* ✏️ Fixing path + domain for documentation ([53ea0bd](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/53ea0bd0d4091c1fdc5d023547d9e0c10fd6fc0d))

### [2.10.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.10.0...v2.10.1) (2019-09-11)


### Bug Fixes

* 🐛 Correct path for new submodule ([e060f02](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e060f026514bfa84b73df6732dc49c7b4cdb196c))
* 🐛 eventinquiry check = 1 ([b8e1fcf](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b8e1fcfb4b372bbf2873795dec9fd842fab6f57d))


### Refactoring

* 💡 Added submodule ([efb8549](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/efb85490186e7187c7f0ef3180174c5da3e7d109))
* 💡 Adding PHP-version to phone-home-data ([d316236](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d3162361bf4ac4787b2546c2123876a74ca6686c))
* 💡 Moving api client to submodule ([cb962e4](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/cb962e40a6b589ea5e973bc589926fef7b0610e7))

## [2.10.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.9.1...v2.10.0) (2019-08-29)


### Features

* 🎸 GLN numbers can now be added to a booking. fixes [#276](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/276) ([e19810c](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e19810cd0e81d08177094607189a49daa1aa2bfd))
* 🎸 Updated EduAdmin API client ([a8b8edd](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a8b8eddce3e0f48c4d711014c40f769a53b89f06))


### Bug Fixes

* 🐛 If the version supports it, use set_script_translations ([a210b6f](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a210b6fc78771583ec0cfbfd51a966b1f8c7f831))
* 🐛 More aggressive transient deletion ([4612268](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/4612268ea5f4247f6bda3721450979759ae95ab3))


### Refactoring

* 💡 Moving stuff into methods to deduplicate some code ([a86300e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a86300e93efda68895f964f06372a7108da5c5fb))

### [2.9.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.9.0...v2.9.1) (2019-08-19)


### Bug Fixes

* 🐛 Fix for <5.0 WP that doesn't have set_script_translation ([5e79191](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5e7919167957933f235fb91d09f88b4af34824c7))

## [2.9.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.8.0...v2.9.0) (2019-08-08)


### Features

* 🎸 News page with ability to warn if new versions is neede ([a196779](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a1967795579a5808fa8e4fd25f736e381ac18cbf))

## [2.8.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.7.1...v2.8.0) (2019-08-07)


### Features

* 🎸 Added filtercity-attribute to listview. fixes [#80](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/80) ([bf64a10](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/bf64a10cd2e62fb3f84b8963003ec114e9840848))

### [2.7.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.7.0...v2.7.1) (2019-08-06)


### Bug Fixes

* 🐛 Fix for is_checked if empty option value ([8260dcc](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/8260dcc08853d22ec92f6c3f59919f85eba2ef55))
* 🐛 Remove debug-info ([f98f480](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f98f48098a8bfbf2415fe0010d5af108b5908d16))


### Refactoring

* 💡 Added more warnings based on API output ([8667745](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/8667745d6e71b30dfbb7c3ad78971f869a2dbe52))
* 💡 Based on status code we now fetch error messages ([77a057d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/77a057d53a826ec20c1c2649c61a372a73d1480f))
* 💡 Changed all bool-get_option to our meth. fixes [#187](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/187) ([10ee867](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/10ee867d930624d39c5afc76514961f1c0d6995d))
* 💡 Fixed some settings to use checked/selected instead ([e62c7ad](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e62c7ad3db7dbdacf679dc7680374e915d66b55a))
* 💡 Optimizing code for readability ([2b2982b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2b2982b5962bd5cf0392aaba0ebda3ad9b3cfe40))
* 💡 Removed deprecated code ([03e75b8](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/03e75b88db756490b828027bb51feee53a341128))
* 💡 Some optimizations made, dedup. and so on ([5fccdb8](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5fccdb8d85f83d6b0dca1fb4c77c97d508f616fc))
* 💡 Updated the is_checked method to support inputs ([302387d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/302387d2b98a56ef036b6c24147bfd23cf306c66))

## [2.7.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.6.2...v2.7.0) (2019-07-29)


### Features

* 🎸 Setting for showing all certs in a company fixes [#259](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/259) ([64b05be](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/64b05bea054be72a36e41125f21c3123c675a8e6))

### [2.6.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.6.1...v2.6.2) (2019-07-25)


### Bug Fixes

* 🐛 Multibyte-searches should work now. :( Fixes [#270](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/270) ([f05c0f1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f05c0f13d6efce4b542d1edc092005488a045d5f))

### [2.6.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.6.0...v2.6.1) (2019-07-22)


### Bug Fixes

* 🐛 Fix for TypeScript type (timeout) ([22cc179](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/22cc179afd300cc4284952cecea8c96d4bd32e4b))
* 🐛 Required fields are required, fixes [#268](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/268) ([9604c35](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9604c35befba0a306b2c11aec7c33de5e3da1cc6))
* 🐛 Reset required-state if not participant ([d5a4f7d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d5a4f7dddee947026d83485fc3fa0d2e71c7b784))


### Refactoring

* 💡 Moved the javascript into TypeScript ([ae8481d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ae8481d5d6c8db44535d73fea7cd2dde3bd019c4))
* 💡 Removed unused code ([92cf4dc](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/92cf4dc761c3ea2898fe029480274d6045d88821))

## [2.6.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.5.1...v2.6.0) (2019-06-28)


### Features

* 🎸 Show prices on programme starts (detail view) ([57c1c26](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/57c1c267db4760e2bd1d3316788346326a9b4cb2))
* 🎸 Showing city (if available) on programme starts ([88f4d3d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/88f4d3db42e52d24839dd2038d9ab73e72fe446d))

### [2.5.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.5.0...v2.5.1) (2019-06-28)


### Bug Fixes

* 🐛 Don't write the debug info in prod ([a809097](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a80909711ddb9ea23090ce75fdd2c98633db7701))

## [2.5.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.4.2...v2.5.0) (2019-06-28)


### Features

* 🎸 Category filtering on programme-list ([c722379](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c722379e190e85f2bf30b69e2483dabc498e08c1))

### [2.4.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.4.1...v2.4.2) (2019-06-26)


### Bug Fixes

* 🐛 Show questions regardless of eventid in query ([3febc13](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3febc13af025e61d2e589f6c29a2023693a6ec05))

### [2.4.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.4.0...v2.4.1) (2019-06-04)


### Bug Fixes

* 🐛 Only one event = add hidden field ([25c813d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/25c813dd892d4030ff457b173dbe535c207fc8e4))

## [2.4.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.3.1...v2.4.0) (2019-05-31)


### Features

* 🎸 Back-buttons now use history.go(-1) or fallback url ([b3ce1f7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b3ce1f79ccc53f278776582635f97dcab429a0ba))
* 🎸 show/hideimages attribute on listview shortcode ([8480ff2](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/8480ff2006fdde3aad74639afe2d03e176336dba))


### Refactoring

* 💡 Added context to all translations ([5c0b5bd](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5c0b5bd3a6bc362e2de2cb1970177dad6f0f4d44))
* 💡 Changed text in interest-regs to Number of part ([3ca7eb1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3ca7eb1085a8060ff5a1128c931cd62b1c77fb97))

### [2.3.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.3.0...v2.3.1) (2019-05-01)


### Bug Fixes

* 🐛 Check question if suffix is contact. Skip multiple ([7d98ed7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7d98ed714454deb6b17120af31fc81ff95cb0fd2))


### Refactoring

* 💡 Added category-attribute to programmelist ([3e88306](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3e883069afc9badb1d84300bfe54e3523258d745))

## [2.3.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.2.0...v2.3.0) (2019-04-26)


### Features

* 🎸 Added data-attributes for dates ([a89753d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a89753d01e12454ea456a4cd8380f1791fe9f39e))


### Bug Fixes

* 🐛 Adding missing CSS class ([19a94f8](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/19a94f8cb58ef4dcf3dd722c8e7f44420bc04df5))

## [2.2.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.1.0...v2.2.0) (2019-04-24)


### Features

* 🎸 Course list can now also be limited by numberofevents ([ffa3b27](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ffa3b27bcd87c77cb1a153d5495365b479a3e283))

### [2.0.47](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.46...v2.0.47) (2019-04-09)

### [2.0.46](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.44...v2.0.46) (2019-04-04)

### [2.0.44](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.43...v2.0.44) (2019-03-14)

### [2.0.43](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.42...v2.0.43) (2019-03-13)

### [2.0.42](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.39...v2.0.42) (2019-03-11)

### [2.0.39](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.38...v2.0.39) (2019-02-21)

### [2.0.38](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.37...v2.0.38) (2019-02-19)

### [2.0.37](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.35...v2.0.37) (2019-02-14)

### [2.0.35](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.34...v2.0.35) (2019-02-12)

### [2.0.34](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.33...v2.0.34) (2019-02-08)

### [2.0.33](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.32...v2.0.33) (2019-01-28)

### [2.0.32](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.31...v2.0.32) (2018-12-05)

### [2.0.31](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.30...v2.0.31) (2018-11-30)

### [2.0.30](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.29...v2.0.30) (2018-11-19)

### [2.0.29](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.28...v2.0.29) (2018-11-19)

### [2.0.28](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.27...v2.0.28) (2018-10-30)

### [2.0.25](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.24...v2.0.25) (2018-10-11)

### [2.0.24](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.21...v2.0.24) (2018-10-10)

### [2.0.21](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.20...v2.0.21) (2018-09-17)

## [2.1.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.49...v2.1.0) (2019-04-23)


### Features

* 🎸 Added support for EDI Reference on bookings ([6e0bc2d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6e0bc2dd97203b01b4a55105fba36f6f9df8fc5c))

### [2.0.49](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.48...v2.0.49) (2019-04-12)

### [2.0.48](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.47...v2.0.48) (2019-04-12)


### Documentation

* ✏️ Removed an old requirement for php-mcrypt (Not needed) ([b62c9f1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b62c9f1b25fc25e0064fc1fae8a267e6b95a2e4b))

### [2.0.47](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.46...v2.0.47) (2019-04-09)


### Bug Fixes

* Missing `"` in a class attribute. ([5c81608](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5c816089ee5f058cb6a93d2940026f761d60f238))

### [2.0.46](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.44...v2.0.46) (2019-04-04)


### Bug Fixes

* Don't add temporary participant if you use the contact as participant. Would double the price. :D ([841463f](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/841463fbf57bb62bd936bcfc6d085a9761f0c8ec))

### [2.0.44](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.43...v2.0.44) (2019-03-14)

### [2.0.43](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.42...v2.0.43) (2019-03-13)

### [2.0.42](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.39...v2.0.42) (2019-03-11)

### [2.0.39](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.38...v2.0.39) (2019-02-21)

### [2.0.38](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.37...v2.0.38) (2019-02-19)

### [2.0.37](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.35...v2.0.37) (2019-02-14)

### [2.0.35](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.34...v2.0.35) (2019-02-12)

### [2.0.34](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.33...v2.0.34) (2019-02-08)

### [2.0.33](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.32...v2.0.33) (2019-01-28)

### [2.0.32](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.31...v2.0.32) (2018-12-05)

### [2.0.31](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.30...v2.0.31) (2018-11-30)

### [2.0.30](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.29...v2.0.30) (2018-11-19)

### [2.0.29](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.28...v2.0.29) (2018-11-19)

### [2.0.28](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.27...v2.0.28) (2018-10-30)

### [2.0.25](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.24...v2.0.25) (2018-10-11)

### [2.0.24](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.21...v2.0.24) (2018-10-10)

### [2.0.21](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.20...v2.0.21) (2018-09-17)

### [2.0.27](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.25...v2.0.27) (2018-10-16)

### [2.0.25](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.24...v2.0.25) (2018-10-11)

### [2.0.24](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.21...v2.0.24) (2018-10-10)

### [2.0.21](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.20...v2.0.21) (2018-09-17)

### [2.0.20](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.19...v2.0.20) (2018-09-13)

### [2.0.19](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.18...v2.0.19) (2018-09-10)

### [2.0.18](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.17...v2.0.18) (2018-09-04)

### [2.0.17](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.16...v2.0.17) (2018-08-21)

### [2.0.16](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.14...v2.0.16) (2018-08-16)

### [2.0.14](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.12...v2.0.14) (2018-08-14)

### [2.0.12](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.11...v2.0.12) (2018-07-26)

### [2.0.11](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.8...v2.0.11) (2018-07-23)


### Bug Fixes

* Added eventprice attributes to valid attributes in detailinfo ([52bb425](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/52bb42504a6ecb33702439650e1bed71eeb5ed64))
* Working sort order with group by City in detail view ([545fd7e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/545fd7efc4dbfcb6cb4ac6f2edaf92cff06f4232))

### [2.0.8](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.7...v2.0.8) (2018-07-02)


### Bug Fixes

* Fixes sort order on event dates (Fixes [#178](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/178)) ([0efc630](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0efc630dfbc5afadeabe7dacd904e8bc0e4cbd38))

### [2.0.7](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.6...v2.0.7) (2018-06-22)

### [2.0.6](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.5...v2.0.6) (2018-05-17)

### [2.0.5](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.4...v2.0.5) (2018-05-15)


### Bug Fixes

* Fixed a bug with saving attribute values ([2b2f694](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2b2f69441a426f1f84fa3d23fc0665cc639f80f4))

### [2.0.4](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.3...v2.0.4) (2018-05-09)


### Bug Fixes

* Better check if the person is logged in or not. ([c2335e6](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c2335e68dc17d505ca5165060eb2e165abb426a2))
* Checking for existence of the property data before we try to fetch data from it. ([28c9c2f](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/28c9c2f8332882891ce700bd7c6ca33cd0c6597c))
* REST-client for eduadmin-api-client didn't take care of strings ([ba5b3ad](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ba5b3ad57f05223628c5efc94ecbb7cb2976b1d4))

### [2.0.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.2...v2.0.3) (2018-04-27)

### [2.0.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.1...v2.0.2) (2018-04-17)

## [2.0.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.28...v2.0.0) (2018-04-04)

### [2.0.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.0...v2.0.1) (2018-04-10)

## [2.0.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.28...v2.0.0) (2018-04-04)

### [1.0.28](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.23...v1.0.28) (2018-02-08)

### [1.0.23](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.22...v1.0.23) (2018-01-31)

### [1.0.22](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.21...v1.0.22) (2018-01-26)

### [1.0.21](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.20...v1.0.21) (2018-01-25)

### [1.0.20](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.19...v1.0.20) (2018-01-19)

### [1.0.19](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.17...v1.0.19) (2018-01-19)

### [1.0.17](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.16...v1.0.17) (2018-01-18)

### [1.0.15](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.14...v1.0.15) (2018-01-15)

### [1.0.14](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.13...v1.0.14) (2018-01-09)

### [1.0.16](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.15...v1.0.16) (2018-01-18)

### [1.0.15](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.14...v1.0.15) (2018-01-15)

### [1.0.14](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.13...v1.0.14) (2018-01-09)

### [1.0.13](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.11...v1.0.13) (2018-01-09)

### [1.0.11](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.10...v1.0.11) (2017-12-22)

### [1.0.10](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.9...v1.0.10) (2017-12-21)

### [1.0.9](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.8...v1.0.9) (2017-12-20)

### [1.0.6](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.5...v1.0.6) (2017-11-16)

### [1.0.8](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.7...v1.0.8) (2017-12-18)

### [1.0.7](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.6...v1.0.7) (2017-12-01)

### [1.0.6](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.5...v1.0.6) (2017-11-16)

### [1.0.5](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.4...v1.0.5) (2017-11-16)

### [1.0.4](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.2...v1.0.4) (2017-11-14)

### [1.0.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.3...v1.0.2) (2017-11-14)

### [1.0.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.1...v1.0.3) (2017-11-13)

## [1.0.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.24...v1.0.0) (2017-11-08)

### [0.10.24](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.21...v0.10.24) (2017-09-29)

### [0.10.21](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.20...v0.10.21) (2017-09-13)

### [0.10.20](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.19...v0.10.20) (2017-08-10)

### [0.10.19](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.18...v0.10.19) (2017-07-18)

### [0.10.18](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.17...v0.10.18) (2017-07-17)

### [0.10.17](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.16...v0.10.17) (2017-07-10)

### [0.10.16](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.15...v0.10.16) (2017-06-07)

### [0.10.15](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.14...v0.10.15) (2017-05-30)

### [0.10.14](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.13...v0.10.14) (2017-05-10)

### [0.10.13](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.12...v0.10.13) (2017-04-28)

### [0.10.12](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.11...v0.10.12) (2017-04-20)

### [0.10.11](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.10...v0.10.11) (2017-04-19)


### Bug Fixes

* Show time for events with only one course day. ([089c3b8](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/089c3b8b72c73fd3d718c77669868c5bfb4b5c66))

### [0.10.10](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.9...v0.10.10) (2017-04-12)

### [0.10.9](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.8...v0.10.9) (2017-04-11)

### [0.10.8](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.7...v0.10.8) (2017-04-06)

### [0.10.7](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.6...v0.10.7) (2017-03-31)

### [0.10.6](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.5...v0.10.6) (2017-03-30)

### [0.10.5](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.4...v0.10.5) (2017-03-30)

### [0.10.4](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.3...v0.10.4) (2017-03-29)

### [0.10.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.2...v0.10.3) (2017-03-23)

### [0.10.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.1...v0.10.2) (2017-03-23)

### [0.10.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.0...v0.10.1) (2017-03-21)

## [0.10.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.19...v0.10.0) (2017-03-10)

### [0.9.19](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.18...v0.9.19) (2017-03-08)

### [0.9.18](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17...v0.9.18) (2017-02-28)

### [0.9.17](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.16...v0.9.17) (2017-01-25)

### [0.9.16](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.15...v0.9.16) (2017-01-25)

### [0.9.15](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.14...v0.9.15) (2017-01-19)

### [0.9.14](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.13...v0.9.14) (2017-01-19)

### [0.9.13](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.12...v0.9.13) (2017-01-19)

### [0.9.12](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.11...v0.9.12) (2017-01-17)

### [0.9.11](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.10...v0.9.11) (2017-01-17)

### [0.9.10](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.7...v0.9.10) (2017-01-13)
