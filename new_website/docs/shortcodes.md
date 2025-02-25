---
id: shortcodes
title: Shortcodes
sidebar_label: Shortcodes
---

Here we have a complete reference guide to all shortcodes available in the plugin, with all attributes.

* * *

## Shortcode reference

Almost all the shortcodes below can be used without attributes, please view the specific instructions for each
shortcode.

* * *

### `[eduadmin-bookingview]`

The booking view shortcode renders the actual form, that end users use when they want to complete their booking.

:::caution

The plugin will not work without it. (Unless if you only work with interest registration.)

:::

| Attribute              |      Value type       | Default value |
|:-----------------------|:---------------------:|:-------------:|
| template               | string (`template_A`) |  template_A   |
| courseid               |        integer        |    _null_     |
| hideinvoiceemailfield  |        boolean        |    _null_     |
| showinvoiceinformation |        boolean        |    _null_     |

The `template`-attribute will allow you to create custom booking pages, that uses different templates. Currently we only
have `template_A` available for use.

The `courseid`-attribute will allow you to create a booking page, for a specific course template.

The `hideinvoiceemailfield`-attribute, if set to `true`, will hide the email field for invoices

The `showinvoiceinformation`-attribute, if set to `true`, will force open the invoice section when the booking form is
loaded.

* * *

### `[eduadmin-coursepublicpricename]`

Used to output all available price names for a specific course template.

| Attribute      |       Value type       | Default value |
|:---------------|:----------------------:|:-------------:|
| courseid       |        integer         |    _null_     |
| orderby        |         string         |    _null_     |
| order          | string (`ASC`, `DESC`) |    _null_     |
| numberofprices |        integer         |    _null_     |

With the `courseid`-attribute, you can output the price names for a specific course template.

The `orderby`-attribute gives you the possibility to change the sort order of the outputted price names, and the `order`
-attribute decides in which way it should sort.

They work like other `orderby` and `order` attributes, so they are whitespace-separated. The available fields for
sorting is available in the
[**API Documentation**](https://api.eduadmin.se/?page=read#operation/GetSingleCourseTemplate)
under the _Read only OData version 4.0_ section, and then _CourseTemplates_, and then expand the _PriceNames_-property
to the right.

Currently (as of writing this document) these fields are available

```json

{
  "PriceNameId": 0,
  "PriceNameDescription": "string",
  "PublicPriceName": true,
  "GroupPrice": true,
  "Price": 0,
  "PriceNameCode": "string"
}

```

The `numberofprices` will limit the amount of visible price names (if there are more than specified), to the number you
enter into this attribute.

* * *

### `[eduadmin-detailinfo]`

This shortcode is used when you want to create your own custom template [**detail view**](#eduadmin-detailview).

| Attribute                 |                   Value type                   | Default value |
|:--------------------------|:----------------------------------------------:|:-------------:|
| courseid                  |                    integer                     |    _null_     |
| coursename                |                    boolean                     |     null      |
| coursepublicname          |                    boolean                     |     null      |
| courselevel               |                    boolean                     |     null      |
| courseimage               |                    boolean                     |     null      |
| courseimagetext           |                    boolean                     |     null      |
| coursedays                |                    boolean                     |     null      |
| coursestarttime           |                    boolean                     |     null      |
| courseendtime             |                    boolean                     |     null      |
| courseprice               | boolean, string (`both`, `inclVat`, `exclVat`) |     null      |
| eventprice                | boolean, string (`both`, `inclVat`, `exclVat`) |     null      |
| coursedescriptionshort    |                    boolean                     |     null      |
| coursedescription         |                    boolean                     |     null      |
| coursegoal                |                    boolean                     |     null      |
| coursetarget              |                    boolean                     |     null      |
| courseprerequisites       |                    boolean                     |     null      |
| courseafter               |                    boolean                     |     null      |
| coursequote               |                    boolean                     |     null      |
| courseeventlist           |                    boolean                     |     null      |
| showmore                  |                    integer                     |     null      |
| courseattributeid         |                    integer                     |     null      |
| courseattributehasvalue   |                    integer                     |     null      |
| courseeventlistfiltercity |                    boolean                     |     null      |
| pagetitlejs               |                    boolean                     |     null      |
| bookurl                   |                    boolean                     |     null      |
| courseinquiryurl          |                    boolean                     |     null      |
| order                     |             string (`ASC`, `DESC`)             |    _null_     |
| orderby                   |                     string                     |    _null_     |

We will go into each attribute on the [_custom template_](custom-template.md) page.

* * *

### `[eduadmin-detailview]`

This will output the default detail view, you can select from two templates (`template_A` and `template_B`).

| Attribute      |             Value type              | Default value |
|:---------------|:-----------------------------------:|:-------------:|
| template       | string (`template_A`, `template_B`) |  template_A   |
| courseid       |               integer               |    _null_     |
| customtemplate |               boolean               |    _null_     |
| showmore       |               integer               |    _null_     |
| hide           |               string                |    _null_     |

By setting the `template`-attribute, you can override the setting in the backend.

With the `courseid`-attribute, you can create a detail view for a specific course.

If you add the `customtemplate`-attribute, you can create your own [_custom template_](custom-template.md).

The `showmore`-attribute will limit the number of visible events in the event lists for the detail view, before it
starts showing a _Show more_-link to show all events.

The `hide`-attribute lets you hide certain elements from the default template, if you wanted to.

Available sections for hiding are

- description
- goal
- target
- prerequisites
- after
- quote
- time
- price

* * *

### `[eduadmin-eventinterest]`

This shortcode will output a interest registration form, for a course template, and a specific event.

Currently this shortcode doesn't have any attributes to customize it.

* * *

### `[eduadmin-listview]`

One of the main shortcodes, as it shows the end users a list of your courses/events.

| Attribute       |             Value type              | Default value |
|:----------------|:-----------------------------------:|:-------------:|
| template        | string (`template_A`, `template_B`) |  template_A   |
| category        |               string                |    _null_     |
| categorydeep    |               string                |    _null_     |
| subject         |               string                |    _null_     |
| subjectid       |               integer               |    _null_     |
| hidesearch      |               boolean               |     false     |
| onlyevents      |               boolean               |     false     |
| onlyempty       |               boolean               |     false     |
| numberofevents  |               numeric               |    _null_     |
| mode            |               string                |    _null_     |
| orderby         |               string                |    _null_     |
| order           |       string (`ASC`, `DESC`)        |    _null_     |
| showsearch      |               boolean               |    _null_     |
| showcity        |               boolean               |     true      |
| showbookbtn     |               boolean               |     true      |
| showreadmorebtn |               boolean               |     true      |
| city            |               integer               |    _null_     |
| courselevel     |               integer               |    _null_     |
| searchCourse    |               string                |    _null_     |
| filtercity      |               string                |    _null_     |
| hideimages      |               boolean               |    _null_     |
| showimages      |               boolean               |    _null_     |
| ondemand        |               boolean               |     false     |
| allcourses      |               boolean               |     false     |

The `template`-attribute lets you override the default setting for what template the list should use.

The `category`-attribute lets you enter a string to match for categories in [**EduAdmin**](https://www.eduadmin.se), so
that the list filters the results based on the matches.

If you want to show all sub-categories, you can use the `categorydeep`-attribute instead.

:::note

Only one of the category-attributes can be used at a time, and `categorydeep` will always be used if both are supplied.

:::

The `subject`-attribute lets you enter a string to match subjects in [**EduAdmin**](https://www.eduadmin.se), so that
the list filters the results based on the matches.

The `subjectid`-attribute lets you filter the list on a specific subject, based on its ID.

If you use the `hidesearch`-attribute, you can hide the default search bar.

The `onlyevents`-attribute will filter the list, to only contain course templates that have coming events.

The `onlyempty`-attribute will only show course templates without coming events.

The `numberofevents`-attribute will limit the number of visible events, by default we show all available from the
results from the API.

You can set the `mode`-attribute to either `event` or `course`, to make the list show events or course templates.

The `orderby`-attribute gives you the possibility to change what field the list should be ordered by. The available
fields can be found at https://api.eduadmin.se/?page=read#operation/GetEvents
or https://api.eduadmin.se/?page=read#operation/GetCourseTemplates depending on what `mode`-attribute you are using,
either `event` or `course`,
and the `order`-attribute takes the values ASC or DESC.

`showsearch` will force the search bar to be visible.

The `showcity`-attribute will show the city where the event is held (if applicable)

And the `showbookbtn`-attribute will decide if you want to show the _Book_-button in the event list.

The `showreadmorebtn`-attribute decides if you want to show a _Read more_-button.

The `city`-attribute will filter the list to show events that occur in the entered city (`LocationId`).

The `courselevel`-attribute will filter the list to show courses that fall under the entered course level.

The `searchCourse`-attribute controls the freetext search.

If you enter the `filtercity`-attribute, the list will be filtered based on the string you put in.

The `hideimages`-attribute will hide the images for course templates, if it was enabled by backend settings.

The `showimages`-attribute will show the images for course templates, if it was disabled by backend settings.

The `ondemand`-attribute will determine if you show either courses with planned events, or on demand courses.

The `allcourses`-attribute will show all courses, regardless if they are on demand or not.

* * *

### `[eduadmin-loginview]`

Renders the login and the profile pages (if login is used).

Does not have any attributes to customize anything at the moment.

* * *

### `[eduadmin-loginwidget]`

This shortcode renders a _widget_ to handle login information.

| Attribute  | Value type | Default value |
|:-----------|:----------:|:-------------:|
| logintext  |   string   |    Log in     |
| logouttext |   string   |    Log out    |
| guesttext  |   string   |     Guest     |

The `logintext`-attribute will change the text on the _Log in_ button/link to whatever you choose

The `logouttext`-attribute will change the text on the _Log out_ button/link to whatever you choose

The `guesttext`-attribute will change the text on the _Guest_ label to whatever you choose

* * *

### `[eduadmin-objectinterest]`

This shortcode will output a interest registration form, for a course template. It can be used with and without the
attribute for `courseid`, depending on the use.

| Attribute | Value type | Default value |
|:----------|:----------:|:-------------:|
| courseid  |  integer   |    _null_     |

The `courseid`-attribute will make the shortcode output a specific form, for that specific course template.

* * *

### `[eduadmin-programme-book]`

As with the other booking view, this is important if you want to be able to receive end users programme bookings. It
will render a predetermined form with all info needed to book a programme.

| Attribute        | Value type | Default value |
|:-----------------|:----------:|:-------------:|
| programmeid      |  integer   |    _null_     |
| programmestartid |  integer   |    _null_     |

You can also build static pages and apply the attribute `programmeid` to make a programme specific form. And if you also
specify the `programmestartid`, it can be tied to a specific programme start.

* * *

### `[eduadmin-programme-detail]`

This is the detail view, to view a specific programme, it can be used to create a custom page with a specific programme,
or used as the default view for all programmes.

| Attribute   | Value type | Default value |
|:------------|:----------:|:-------------:|
| programmeid |  integer   |    _null_     |

And if you want to create a specific page for a programme, you can also use the `programmeid`-attribute.

* * *

### `[eduadmin-programme-list]`

As with the normal list view, this view lists the available programmes you have created in [**EduAdmin**](https://www.eduadmin.se).

| Attribute | Value type | Default value |
|:----------|:----------:|:-------------:|
| category  |   string   |    _null_     |

And if you want to filter this list, you can apply the `category`-attribute.

* * *

### `[eduadmin-programmeinfo]`

This shortcode is used when you want to create your own custom template [**programme view**](#eduadmin-programme-detail).

:::note

We will add more attributes to this shortcode in the future.

:::

| Attribute                 | Value type | Default value |
|:--------------------------|:----------:|:-------------:|
| programmeid               |  integer   |    _null_     |
| programmename             |  boolean   |     null      |
| programmepublicname       |  boolean   |     null      |
| programmeimage            |  boolean   |     null      |
| programmeimagetext        |  boolean   |     null      |
| programmedescriptionshort |  boolean   |     null      |
| programmedescription      |  boolean   |     null      |
| programmegoal             |  boolean   |     null      |
| programmetarget           |  boolean   |     null      |
| programmeprerequisites    |  boolean   |     null      |
| courseafter               |  boolean   |     null      |
| programmequote            |  boolean   |     null      |
