---
id: getting-started
title: Getting started
sidebar_label: First time setup
---

Den här guiden kommer fokusera på att ni ska komma igång med [**EduAdmin-WordPress-tillägget**](https://wordpress.org/plugins/eduadmin-booking/), 
med standardmallar och inställningar så att era besökare kan börja boka direkt via er [**WordPress**](https://www.wordpress.org)-webbsida.

> Ifall ni inte har en API-nyckel för [**EduAdmin**](https://www.eduadmin.se) ännu,
> så kan ni kontakta vår support.
>
> [**EduAdmin**](https://www.eduadmin.se) är inte en gratistjänst,
> och API-nyckeln kommer med en månadskostnad.

Ifall ni har er API-nyckel redo, så kan vi gå igenom stegen här nedan!

## Installera tillägget

Se til att ni är inloggade i WordPress med en användare som har rättigheter att installera nya tillägg.
Från tilläggssidan, klicka på **Lägg till** och sök efter *EduAdmin*, 
det ni vill ha är "[**EduAdmin Booking**](https://wordpress.org/plugins/eduadmin-booking/)" av [**MultiNet Interactive AB**](https://www.multinet.com).

> Glöm inte att aktivera det nyinstallerade tillägget

## Konfigurera API-nyckeln

När ni aktiverat tillägget, så dyker ett ny menyalternativ (*EduAdmin*) upp i vänstermenyn,
så för att konfigurera er API-nyckel, gå till *Api-autentisering* och fyll i API-nyckeln som ni fått från [**MultiNet Interactive AB**](https://www.multinet.com)
(eller ifall ni fick en från företaget ni bygger webbsidan åt.)

## Skapa alla sidor som krävs

Efter att vi satt API-nyckeln, så behöver vi skapa ett par sidor, samt ställa in saker som krävs för att tillägget ska fungera,
så att era kunder kan se vilka tillgängliga kurser som finns tillgängliga att boka in sig på.

> För att alla sidor ska fungera, så behöver ni konfigurera dem i _Allmänna inställningar_,
> samt sätta vilken URL/mapp som tillägget ska jobba under.

Shortcodesen vi går igenom nedan kan ni läsa om i detalj på [shortcode](shortcodes.md)-page

Sidorna som vi rekommenderar att ni skapar är som följer

### `[eduadmin-listview]`

Den här sidan kommer att visa alla tillgängliga kurser som ni publicerat genom [**EduAdmin**](https://www.eduadmin.se),
och beroende på inställningar, så kan den visa olika information.

### `[eduadmin-detailview]`

Detaljvyn, som visar kursmallsinformationen och de tillgängliga kursdatumen (ifall det finns några).

Det är också möjligt att bygga en skräddarsydd mall, istället för de två standard-teman vi har.

### `[eduadmin-bookingview]`

Den här sidan är antagligen den viktigaste, eftersom det är sidan som används för att skicka bokningarna till [**EduAdmin**](https://www.eduadmin.se).

Formuläret byggs upp automatiskt av tillägger, hanterar egna fält och frågor som ni kan ställa in i [**EduAdmin**](https://www.eduadmin.se),
fälten har CSS-klasser, så att det är enkelt att sätta er design på formuläret.

### Tack-sida

Detta är en statisk sida som ni skapar som en _Tack_-sida, som slutkunden kommer till när de genomfört en bokning.

Sidan kommer också att köra javascriptet som är definierat i _Bokningsinställningar_-sektionen, ifall fältet är ifyllt,
detta används vanligtvis för att sätta slutmål i Analys-system.

## För att summera det vi gjort

Vi har gått igenom guiden, skapat några sidor, lagt till alla shortcodes.

Om allt är korrekt inställt, så borde ni nu kunna titta på er nya,
helt integrerade webbokning i katalogen som ni valde under konfigurationen.

Ifall ni upplever några buggar eller problem, 
kontrollera [Felsöknings](troubleshooting.md)-sidan för att se ifall problemet ni upplever finns beskrivet.
