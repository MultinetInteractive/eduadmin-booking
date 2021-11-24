"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[360],{9222:(e,t,n)=>{n.r(t),n.d(t,{frontMatter:()=>r,contentTitle:()=>h,metadata:()=>u,toc:()=>l,default:()=>p});var o=n(7462),s=n(3366),i=(n(7294),n(3905)),a=["components"],r={id:"troubleshooting",title:"Troubleshooting",sidebar_label:"How to troubleshoot"},h=void 0,u={unversionedId:"troubleshooting",id:"troubleshooting",isDocsHomePage:!1,title:"Troubleshooting",description:"Common issues",source:"@site/docs/troubleshooting.md",sourceDirName:".",slug:"/troubleshooting",permalink:"/docs/troubleshooting",editUrl:"https://github.com/MultinetInteractive/EduAdmin-WordPress/edit/master/new_website/docs/troubleshooting.md",tags:[],version:"current",lastUpdatedBy:"Chris G\xe5rdenberg",lastUpdatedAt:1637759948,formattedLastUpdatedAt:"11/24/2021",frontMatter:{id:"troubleshooting",title:"Troubleshooting",sidebar_label:"How to troubleshoot"},sidebar:"docs",previous:{title:"Your first custom template",permalink:"/docs/your-first-custom-template"}},l=[{value:"Common issues",id:"common-issues",children:[{value:"The website is showing old data",id:"the-website-is-showing-old-data",children:[]},{value:"Nothing happens when I click anything",id:"nothing-happens-when-i-click-anything",children:[]},{value:"It&#39;s not showing in the correct language",id:"its-not-showing-in-the-correct-language",children:[]},{value:"Whenever I try to complete a booking, an unexpected error occurs",id:"whenever-i-try-to-complete-a-booking-an-unexpected-error-occurs",children:[]},{value:"The dates shown on my website are wrong",id:"the-dates-shown-on-my-website-are-wrong",children:[]}]}],d={toc:l};function p(e){var t=e.components,n=(0,s.Z)(e,a);return(0,i.kt)("wrapper",(0,o.Z)({},d,n,{components:t,mdxType:"MDXLayout"}),(0,i.kt)("h2",{id:"common-issues"},"Common issues"),(0,i.kt)("p",null,"These issues have been reported most of all,\nand is likely a configuration problem,\nor compatibility problem with other WordPress plugins."),(0,i.kt)("blockquote",null,(0,i.kt)("p",{parentName:"blockquote"},"If a feature is missing, it's probably because no one have asked for it, so it's not a bug.\nIf you want to request a feature, you can do so by creating a\n",(0,i.kt)("a",{parentName:"p",href:"https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/new/choose"},"issue"),"\nor contacting our ",(0,i.kt)("a",{parentName:"p",href:"https://support.eduadmin.se/en/support/tickets/new"},"support"))),(0,i.kt)("h3",{id:"the-website-is-showing-old-data"},"The website is showing old data"),(0,i.kt)("p",null,"If the data on the web page isn't updating after you have updated the information in ",(0,i.kt)("a",{parentName:"p",href:"https://www.eduadmin.se"},(0,i.kt)("strong",{parentName:"a"},"EduAdmin")),",\nyou might want to clear any eventual cache plugins, and the internal cache in our plugin."),(0,i.kt)("p",null,"We cache some data for a period, to make the website as fast as possible."),(0,i.kt)("p",null,"If you need to check if it's our plugin that is caching something, you can add ",(0,i.kt)("inlineCode",{parentName:"p"},"?edu-showtransients=1")," to the url,\nand it will output some comments in the source code, that will tell you everything that we cache."),(0,i.kt)("p",null,"The output will look something like this"),(0,i.kt)("pre",null,(0,i.kt)("code",{parentName:"pre",className:"language-html"},"\n\x3c!-- EduAdmin Booking (<version>) Transients \n eduadmin-locations_<hash>__<version>: Expires in: 24 hours \n eduadmin-categories_<hash>__<version>: Expires in: 24 hours \n eduadmin-levels_<hash>__<version>: Expires in: 24 hours \n eduadmin-listcourses-courses_<hash>__<version>: Expires in: 5 minutes \n eduadmin-organization_<hash>__<version>: Expires in: 24 hours \n eduadmin-newapi-token__<version>: Expires in: 7 days \n eduadmin-subjects_<hash>__<version>: Expires in: 1 day \n eduadmin-regions_<hash>__<version>: Expires in: 1 day \n /EduAdmin Booking Transients --\x3e\n\n")),(0,i.kt)("h3",{id:"nothing-happens-when-i-click-anything"},"Nothing happens when I click anything"),(0,i.kt)("p",null,"Make sure you are not using any plugins that combine/rearrange stylesheets or javascripts,\nor put our scripts in a whitelist, so they are not combined. Many of these plugins are not\nchecking in what order they should be loaded and might put the scripts in the wrong order."),(0,i.kt)("h3",{id:"its-not-showing-in-the-correct-language"},"It's not showing in the correct language"),(0,i.kt)("p",null,"By default, WordPress will download language files for plugins,\nbut we have noticed in some instances that it either fails to do so,\nor another translation plugin is prohibiting the translation to work properly."),(0,i.kt)("p",null,'You can always check the "Settings ',">",' General" and see what "Site Language" is set to.'),(0,i.kt)("h3",{id:"whenever-i-try-to-complete-a-booking-an-unexpected-error-occurs"},"Whenever I try to complete a booking, an unexpected error occurs"),(0,i.kt)("p",null,"Most of the time, when the plugin connects to ",(0,i.kt)("a",{parentName:"p",href:"https://www.eduadmin.se"},(0,i.kt)("strong",{parentName:"a"},"EduAdmin"))," to complete the booking,\nwe get back either an success, or an array of errors."),(0,i.kt)("p",null,"The unexpected error means something went wrong, that we do not have a classification for,\nso please ",(0,i.kt)("strong",{parentName:"p"},"contact us")," at our support portal whenever this occurs."),(0,i.kt)("blockquote",null,(0,i.kt)("p",{parentName:"blockquote"},"You can find the support portal at ",(0,i.kt)("a",{parentName:"p",href:"https://support.eduadmin.se/en/support/tickets/new"},(0,i.kt)("strong",{parentName:"a"},"https://support.eduadmin.se/en/support/tickets/new")),".")),(0,i.kt)("h3",{id:"the-dates-shown-on-my-website-are-wrong"},"The dates shown on my website are wrong"),(0,i.kt)("p",null,"Make sure you have set the correct timezone in your WordPress instance,\nwe try to convert the dates from the EduAdmin API, to fit your WordPress settings."),(0,i.kt)("p",null,"And if you want to check how we handle the dates, you can append ",(0,i.kt)("inlineCode",{parentName:"p"},"?edu-debugdates=1")," to the URL,\nand then you will see (in the source), something like this:"),(0,i.kt)("pre",null,(0,i.kt)("code",{parentName:"pre",className:"language-html"},"\n\x3c!-- Array\n(\n    [0] => Y-m-d                        // The format of the date\n    [1] => 2020-09-01T17:00:00+02:00    // The original input to the method\n    [2] => 2020-09-01T17:00:00+02:00    // If we don't send any input, we calculate a new input to be used\n    [3] => 2020-09-01                   // This is what will be outputted into the website\n    [4] => +02:00                       // This is the calculated timezone offset\n    [5] => 7200                         // This is the timezone offset, in seconds\n    [6] => include                      // This is an approximation of where the code is used\n)\n--\x3e\n\n")))}p.isMDXComponent=!0}}]);