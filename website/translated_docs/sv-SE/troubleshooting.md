---
id: troubleshooting
title: Troubleshooting
sidebar_label: How to troubleshoot
---

## Vanliga frågor

Dessa frågor är de som har rapporterats mest, 
och är troligen ett konfigurationsproblem, 
eller ett kompatibilitetsproblem med andra WordPress-tillägg.

### Webbsidan visar gammal information

Om informationen på hemsidan inte uppdateras efter att du har sparat ny information i [**EduAdmin**](https://www.eduadmin.se),
så kan du rensa den interna cachen i vårt tillägg eller i andra eventuella cache-tillägg. 

Vi lagrar data lokalt för att göra webbsidan så snabb som möjligt.

### Det händer inget när jag klickar på sidorna

Se till att ni inte använder några tillägg som minifierar/ändrar ordning på stilmallar och javascript,
eller att ni lägger våra skript som undantag, så att de inte minifieras. Många av dessa tillägg
kontrollerar inte i vilken ordning skript behöver laddas i, och kan därför lägga in det i fel ordning.

### Sidan visas inte på rätt språk

Som standard, så kommer WordPress att ladda ner översättnings-paket för tillägg,
men vi har märkt att i vissa fall, så antingen misslyckas den att göra det
eller så är det ett översättningstillägg som förhindrar att översättningen fungerar korrekt.

Det ni kan göra är att kontrollera "Inställningar &gt; Allmänt" och se vad "Webbplatsspråk"
är inställt på.

### När jag försöker genomföra en bokning, så sker ett oväntat fel

När tillägget kontaktar [**EduAdmin**](https://www.eduadmin.se) för att slutföra bokningen,
så får vi tillbaka att bokningen är lyckad, eller en lista med fel som inträffade när bokningen skulle genomföras.

Ifall vi får ett "Oväntat fel" tillbaka, så betyder det att det är något vi inte har en klassificering för,
då behöver ni **kontakta oss** genom vår support-portal, när detta inträffar.

> Ni kan hitta support-portalen på [**https://support.multinet.se**](https://support.multinet.se).
