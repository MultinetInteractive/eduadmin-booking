---
id: troubleshooting
title: Troubleshooting
sidebar_label: How to troubleshoot
---

## Common issues

These issues have been reported most of all, 
and is likely a configuration problem, 
or compatibility problem with other WordPress plugins.

### The website is showing old data

If the data on the web page isn't updating after you have updated the information in [**EduAdmin**](https://www.eduadmin.se),
you might want to clear any eventual cache plugins, and the internal cache in our plugin.

We cache some data for a period, to make the website as fast as possible.

If you need to check if it's our plugin that is caching something, you can add `?edu-showtransients=1` to the url,
and it will output some comments in the source code, that will tell you everything that we cache.

The output will look something like this

```html
<!-- EduAdmin Booking (<version>) Transients -->
<!-- eduadmin-locations_<hash>__<version>: Expires in: 24 hours -->
<!-- eduadmin-categories_<hash>__<version>: Expires in: 24 hours -->
<!-- eduadmin-levels_<hash>__<version>: Expires in: 24 hours -->
<!-- eduadmin-listcourses-courses_<hash>__<version>: Expires in: 5 minutes -->
<!-- eduadmin-organization_<hash>__<version>: Expires in: 24 hours -->
<!-- eduadmin-newapi-token__<version>: Expires in: 7 days -->
<!-- eduadmin-subjects_<hash>__<version>: Expires in: 1 day -->
<!-- eduadmin-regions_<hash>__<version>: Expires in: 1 day -->
<!-- /EduAdmin Booking Transients -->
```

### Nothing happens when I click anything

Make sure you are not using any plugins that combine/rearrange stylesheets or javascripts, 
or put our scripts in a whitelist, so they are not combined. Many of these plugins are not
checking in what order they should be loaded and might put the scripts in the wrong order.

### It's not showing in the correct language

By default, WordPress will download language files for plugins, 
but we have noticed in some instances that it either fails to do so,
or another translation plugin is prohibiting the translation to work properly.

You can always check the "Settings &gt; General" and see what "Site Language" is set to.

### Whenever I try to complete a booking, an unexpected error occurs

Most of the time, when the plugin connects to [**EduAdmin**](https://www.eduadmin.se) to complete the booking,
we get back either an success, or an array of errors.

The unexpected error means something went wrong, that we do not have a classification for,
so please **contact us** at our support portal whenever this occurs.

> You can find the support portal at [**https://support.multinet.se**](https://support.multinet.se).

### The dates shown on my website are wrong

Make sure you have set the correct timezone in your WordPress instance,
we try to convert the dates from the EduAdmin API, to fit your WordPress settings.

And if you want to check how we handle the dates, you can append `?edu-debugdates=1` to the URL,
and then you will see (in the source), something like this:

```html
<!-- Array
(
    [0] => Y-m-d                        // The format of the date
    [1] => 2020-09-01T17:00:00+02:00    // The original input to the method
    [2] => 2020-09-01T17:00:00+02:00    // If we don't send any input, we calculate a new input to be used
    [3] => 2020-09-01                   // This is what will be outputted into the website
    [4] => +02:00                       // This is the calculated timezone offset
    [5] => 7200                         // This is the timezone offset, in seconds
    [6] => include                      // This is an approximation of where the code is used
)
-->
```
