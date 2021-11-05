---
id: getting-started
title: Getting started
sidebar_label: First time setup
slug: /
---
This guide will focus on get you started with the [**EduAdmin WordPress Plugin**](https://wordpress.org/plugins/eduadmin-booking/), with default templates and settings so your visitors can start booking directly from your [**WordPress**](https://www.wordpress.org) webpage.

> If you do not have an API key for [**EduAdmin**](https://www.eduadmin.se) yet, 
> consider contacting our support.
>
> [**EduAdmin**](https://www.eduadmin.se) is not a free service, 
> and the API key comes with a monthly fee.

If you have your API key ready, let us go through the steps below!

> If you need the ability to customize things more than we have the ability to, 
> we recommend that you look into creating your own integration with our API.

## Installing the plugin

Make sure you are logged in to WordPress with a user, that has access to install new plugins.
From the plugin view, click **Add New** and search for _EduAdmin_, the one you want is "[**EduAdmin Booking**](https://wordpress.org/plugins/eduadmin-booking/)" by [**MultiNet Interactive AB**](https://www.multinet.com).

> Don't forget to activate the newly installed plugin

## Setting the API key

When you activate the plugin, a new menu item (_EduAdmin_) will appear in the left menu, 
to set your API key, navigate to the _Api Authentication_ and enter the API key you got from [**MultiNet Interactive AB**](https://www.multinet.com)
(or if you got one from the company you're building the website for.)

## Creating all the required pages

After setting the API key, we now need to create the bare minimum of required pages and set some settings,
so your customers can browse the available courses and if available book themselves.

> For all pages to work, you have to select them in the proper setting on _General settings_,
> and set which URL/folder the plugin should work under.

The shortcodes we go through below can be viewed in detail on the [shortcode](shortcodes.md)-page

The pages that we recommend that you create are as follows

### `[eduadmin-listview]`

This page will show the available courses that you have published through [**EduAdmin**](https://www.eduadmin.se),
and depending on what settings it can show different information.

### `[eduadmin-detailview]`

The details view, will show the course information and the available course dates (if there are any available).

It is also possible to build a custom template to use, instead of the two default themes we have.

### `[eduadmin-bookingview]` (or use the EduAdmin Booking Forms)

This page is probably the most important one, since it's the page used to post the bookings into [**EduAdmin**](https://www.eduadmin.se).

The form is automatically built by the plugin, and handles custom fields and questions that you can setup in [**EduAdmin**](https://www.eduadmin.se),
the elements have CSS classes, so it's easy to style the form, the way you want it to be.

* * *

And as stated in the header, you can also check the box in the top of "Booking settings", to use the booking forms from EduAdmin instead.

All customization for these forms are made directly in EduAdmin, so that you don't have to work inside of WordPress to modify them.

### Thank you-page

This is a static page that you create as a _Thank you_-page, whenever someone completes a booking.

It will also run the javascript specified in the _Booking settings_-section, if anything is specified,
this is normally used to complete goals in Analytic-systems.

## Wrapping it up

We went through the guide, created some pages, added the appropriate shortcodes.

If everything is setup correctly, you should now be able to view your new, 
fully integrated web booking in the directory you selected during the setup.

If you are experiencing some kind  or problems, 
check the [Troubleshooting](troubleshooting.md)-page to see 
if the issue you are experiencing is listed there.
