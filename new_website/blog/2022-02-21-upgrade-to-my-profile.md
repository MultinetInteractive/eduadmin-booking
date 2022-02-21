---
title: Upgrade to My Profile
authors: chga
tags: [Breaking Change, My Profile]
---

Version 3.0.0 gives you new design on login and booking list, 
unnamed participants and new "Export to Excel"-function added to booking list.
<!--truncate-->

## Update information

In this new version (**3.0.0**) of the WordPress plugin, we have added some new things.

- Unnamed participants is now shown under the Bookings tab
- Export to Excel (CSV) from the Bookings tab
- Fix for on-demand courses, so they actually show up as on-demand

There has also been changes to the Login Page and Booking page designs, 
to fix certain layout problems when a default theme is applied.

:::danger Breaking design change!

This _might_ break some custom designs if you have implemented any custom CSS to the login page and booking list page,
so be sure to **test this in a development environment first**, before updating to the new version.

:::

## Changes Login form

Example on how the Login Page form looked before this change (Swedish text):

![Login Pre-changed styling](/img/blog_images/20220221/login-pre-change.png)

And this is how the new form looks:

![Login Post-changed styling (Desktop)](/img/blog_images/20220221/post-change.png)

.. and in mobile layout:

![Login Post-changed styling (Mobile)](/img/blog_images/20220221/post-change-mobile.png)

## Changes Booking list

And this is how the booking list used to look before the design overhaul:

![Booking list pre-changed styling](/img/blog_images/20220221/booking-list-pre.png)

Which has been updated, to look like this:

![Booking list post-changed styling](/img/blog_images/20220221/booking-list-post.png)

