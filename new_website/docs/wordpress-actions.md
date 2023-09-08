---
id: wordpress-actions
title: WordPress Actions
sidebar_label: WordPress Actions
---

Here we have a list of all the actions that are available in the plugin.

:::caution

Please use with care! This can break the functionality of the plugin.

:::

## Actions

Some of the actions will have parameters that are passed to them, they will be explained in the section about the
action.

### `eduadmin-booking-completed`

This event fires when the booking is completed, and the "Thank you"-page is shown (requires the `edu-thankyou` query
parameter to be present)

| Parameter name  | Description                                                                                                                                                                                |
|:----------------|:-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `$booking_info` | Contains either a [Booking](https://api.eduadmin.se/?page=read#operation/GetSingleBooking) or a [ProgrammeBooking](https://api.eduadmin.se/?page=read#operation/GetSingleProgrammeBooking) |

This event can be used when you want to trigger some custom code after a booking has been completed, like if you want to
trigger a webhook or something similar.

### `eduadmin-bookingcompleted`

An old legacy event that is still available for backwards compatibility, used by some integrations/plugins to handle
payment updates/information.

### `eduadmin-bookingerror`

This event fires when there is an error with the booking.

| Parameter name | Description                                                   |
|:---------------|:--------------------------------------------------------------|
| `$error_list`  | Contains the error message(s) that was returned from the API. |

### `eduadmin-bookingform-loaded`

This event fires when the booking form is loaded, and the booking form is about to be rendered.

| Parameter name | Description                                                                              |
|:---------------|:-----------------------------------------------------------------------------------------|
| `$login_user`  | Contains information about the user that is logged in (or pseudo user if there is none). |

### `eduadmin-bookingform-view`

This event fires when the booking form has been loaded, and we know what course is shown.

| Parameter name     | Description                                                                                                                            |
|:-------------------|:---------------------------------------------------------------------------------------------------------------------------------------|
| `$selected_course` | Contains the [CourseTemplate](https://api.eduadmin.se/?page=read#operation/GetSingleCourseTemplate) that is shown in the booking form. |

### `eduadmin-checkpaymentplugins`

This event fires when the booking is about to be made, and the plugin is checking if there are any payment plugins that
wants to inject themselves into the booking flow.

| Parameter name | Description                                                                                                                                                                |
|:---------------|:---------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `$ebi`         | Contains the [EduAdmin_BookingInfo](https://github.com/MultinetInteractive/EduAdmin-WordPress/blob/production/class/class-eduadmin-bookinginfo.php) that has been created. |

Example of how this is used in the plugin for Svea WebPay can be found here:

https://github.com/MultinetInteractive/EduAdmin-WordPress-SveaWebPay/blob/master/class/class-edu-sveawebpay.php#L27

### `eduadmin-detail-view`

This event fires when the detail view is loaded, and the detail view is about to be rendered.

| Parameter name     | Description                                                                                                        |
|:-------------------|:-------------------------------------------------------------------------------------------------------------------|
| `$selected_course` | Contains the [CourseTemplate](https://api.eduadmin.se/?page=read#operation/GetSingleCourseTemplate) that is shown. |

### `eduadmin-list-course-view`

This event fires when the course list view is loaded, and the list view has been rendered.

| Parameter name | Description                                                                                                                                 |
|:---------------|:--------------------------------------------------------------------------------------------------------------------------------------------|
| `$courses`     | Contains an array of the [CourseTemplates](https://api.eduadmin.se/?page=read#operation/GetSingleCourseTemplate) that is shown in the list. |

### `eduadmin-list-event-view`

This event fires when the event list view is loaded, and the list view has been rendered.

| Parameter name | Description                                                                                                               |
|:---------------|:--------------------------------------------------------------------------------------------------------------------------|
| `$events`      | Contains an array of the [Events](https://api.eduadmin.se/?page=read#operation/GetSingleEvent) that is shown in the list. |

### `eduadmin-list-programme-view`

This event fires when the event list view is loaded, and the list view has been rendered.

| Parameter name | Description                                                                                                                       |
|:---------------|:----------------------------------------------------------------------------------------------------------------------------------|
| `$programmes`  | Contains an array of the [Programmes](https://api.eduadmin.se/?page=read#operation/GetSingleProgramme) that is shown in the list. |

### `eduadmin-plugin-save_<plugin-id>`

This is an internal action, only used to save the options for a plugin.

https://github.com/MultinetInteractive/EduAdmin-WordPress/blob/production/includes/plugin/class-edu-integration.php#L152-L173

### `eduadmin-processbooking`

This event fires when the booking is made, and potential plugins can take part of the booking information for custom
handling.

| Parameter name | Description                                                                                                                                                                |
|:---------------|:---------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `$ebi`         | Contains the [EduAdmin_BookingInfo](https://github.com/MultinetInteractive/EduAdmin-WordPress/blob/production/class/class-eduadmin-bookinginfo.php) that has been created. |

### `eduadmin-programme-bookingform-view`

This event fires when the programme booking form has been loaded, and we know what programme is shown.

| Parameter name | Description                                                                                                                  |
|:---------------|:-----------------------------------------------------------------------------------------------------------------------------|
| `$programme`   | Contains the [Programme](https://api.eduadmin.se/?page=read#operation/GetSingleProgramme) that is shown in the booking form. |

### `eduadmin-programme-detail-view`

This event fires when the programme detail view is loaded, and the detail view is about to be rendered.

| Parameter name | Description                                                                                                                 |
|:---------------|:----------------------------------------------------------------------------------------------------------------------------|
| `$programme`   | Contains the [Programme](https://api.eduadmin.se/?page=read#operation/GetSingleProgramme) that is shown in the detail view. |

### `edu_integrations_init`

This event fires when the plugin is loaded, and the integrations are about to be loaded.

### `eduadmin_loaded`

This event fires when the plugin is loaded, and the plugin is done initializing.

### `eduadmin_showtimers`

This event fires when the plugin is loaded, and the plugin is about to show the timers.

Can be used, if you want to extend the timer functionality, and add your own timers.