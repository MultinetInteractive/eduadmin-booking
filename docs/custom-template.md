---
id: your-first-custom-template
title: Your first custom template
sidebar_label: Your first custom template
---

This guide will show how you can build the `template_A`-template, but as a custom template.

---

This is how the default detail view is implemented

```php
[eduadmin-detailview]
```

That's basically all you need for the detail view to start working, 
and then you can change some settings and add some attributes to modify the default appearance.

Now, the first modification we will do to make it possible to use custom templates, 
will be adding the attribute `customtemplate`. Doing this will disable the regular templates.

```php
[eduadmin-detailview customtemplate]
```

So, if you reload the detail view of a course template now, it should not show anything at all.
Don't worry, it is to be expected, since we told the plugin that we are going to use a custom template,
and didn't add anything else to the page.

So, let's go recreate the `template_A`-template, so we get to know the custom templating.

All the code below should go into a single code block. 
We won't be using the image, because we can only get the image URL,
not see if it actually contains anything, and we don't want to render broken images.

```html
[eduadmin-detailview customtemplate]

<div class="eduadmin">
    <a href="javascript://" onclick="eduGlobalMethods.GoBack('../', event);" class="backLink">
        « Go back
    </a>
    <div class="title">
        <h1 class="courseTitle">
            [eduadmin-detailinfo coursepublicname]
            <small class="courseLevel">
                [eduadmin-detailinfo courselevel]
            </small>
        </h1>
    </div>
    <hr />
    <div class="textblock">
        <h3>Course description</h3>
        <div>[eduadmin-detailinfo coursedescription]</div>

        <h3>Course goal</h3>
        <div>[eduadmin-detailinfo coursegoal]</div>
  
        <h3>Target group</h3>
        <div>[eduadmin-detailinfo coursetarget]</div>
  
        <h3>Prerequisites</h3>
        <div>[eduadmin-detailinfo courseprerequisites]</div>
  
        <h3>After the course</h3>
        <div>[eduadmin-detailinfo courseafter]</div>
  
        <h3>Quotes</h3>
        <div>[eduadmin-detailinfo coursequote]</div>
  
    </div>
    <div class="eventInformation">
        <h3>Time</h3>
        [eduadmin-detailinfo coursedays], 
        [eduadmin-detailinfo coursestarttime] - [eduadmin-detailinfo courseendtime]

        <h3>Price</h3>
        [eduadmin-detailinfo courseprice]
    </div>
</div>

[eduadmin-detailinfo courseeventlist]

<div class="eduadmin">
    <div class="inquiry">
        <a class="inquiry-link" href="[eduadmin-detailinfo courseinquiryurl]">
            Send inquiry about this course
        </a>
    </div>
</div>
```
