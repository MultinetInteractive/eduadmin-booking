---
id: your-first-custom-template
title: Your first custom template
sidebar_label: Your first custom template
---

Den här guiden kommer visa hur du kan bygga `template_A`-mallen, men som en skräddarsydd mall.

---

Såhär implementerar vi standard-detaljvyn

```php
[eduadmin-detailview]
```

Det är bokstavligen allt som ni behöver för att detaljsidan ska börja fungera,
och sedan kan ni ändra några inställningar och lägga till attribut för att modifiera standard-utseendet.

Den första modifieringen vi ska lägga till för att använda skräddarsydda mallar,
är att lägga till attributet `customtemplate`. Detta gör att sidan slutar rita ut den vanliga mallen.

```php
[eduadmin-detailview customtemplate]
```

Så, ifall ni laddar om detaljvyn för en kursmall nu, så bör den inte visa något alls.
Oroa er inte, det är så det ska vara, eftersom vi sa åt tillägget att vi ska använda en skräddarsydd mall,
och vi la inte till något annat på sidan.

Så, nu ska vi återskapa `template_A`-mallen, så att vi lär känna skräddarsydda mallar.


All kod nedan ska med fördel läggas in i ett enda kodblock.
Vi kommer inte använda kursbilden, eftersom vi bara hämtar ut bild-URLen,
så vi vet inte ifall fältet kommer innehålla något, och vi vill inte rita ut trasiga bilder.

```html
[eduadmin-detailview customtemplate]

<div class="eduadmin">
    <a href="javascript://" onclick="eduGlobalMethods.GoBack('../');" class="backLink">
        « Tillbaka
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
        <h3>Kursbeskrivning</h3>
        <div>[eduadmin-detailinfo coursedescription]</div>

        <h3>Målet med kursen</h3>
        <div>[eduadmin-detailinfo coursegoal]</div>
  
        <h3>Målgrupp</h3>
        <div>[eduadmin-detailinfo coursetarget]</div>
  
        <h3>Förkunskapskrav</h3>
        <div>[eduadmin-detailinfo courseprerequisites]</div>
  
        <h3>Efter genomfört kurstillfälle</h3>
        <div>[eduadmin-detailinfo courseafter]</div>
  
        <h3>Citat</h3>
        <div>[eduadmin-detailinfo coursequote]</div>
  
    </div>
    <div class="eventInformation">
        <h3>Tid</h3>
        [eduadmin-detailinfo coursedays], 
        [eduadmin-detailinfo coursestarttime] - [eduadmin-detailinfo courseendtime]

        <h3>Prisinformation</h3>
        [eduadmin-detailinfo courseprice]
    </div>
</div>

[eduadmin-detailinfo courseeventlist]

<div class="eduadmin">
    <div class="inquiry">
        <a class="inquiry-link" href="[eduadmin-detailinfo courseinquiryurl]">
            Skicka intresseanmälan gällande kursen
        </a>
    </div>
</div>
```
