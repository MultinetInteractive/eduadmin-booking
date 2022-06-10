"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[360],{3905:(e,t,n)=>{n.d(t,{Zo:()=>h,kt:()=>c});var o=n(7294);function i(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function a(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}function r(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?a(Object(n),!0).forEach((function(t){i(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):a(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function s(e,t){if(null==e)return{};var n,o,i=function(e,t){if(null==e)return{};var n,o,i={},a=Object.keys(e);for(o=0;o<a.length;o++)n=a[o],t.indexOf(n)>=0||(i[n]=e[n]);return i}(e,t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);for(o=0;o<a.length;o++)n=a[o],t.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(e,n)&&(i[n]=e[n])}return i}var l=o.createContext({}),u=function(e){var t=o.useContext(l),n=t;return e&&(n="function"==typeof e?e(t):r(r({},t),e)),n},h=function(e){var t=u(e.components);return o.createElement(l.Provider,{value:t},e.children)},p={inlineCode:"code",wrapper:function(e){var t=e.children;return o.createElement(o.Fragment,{},t)}},d=o.forwardRef((function(e,t){var n=e.components,i=e.mdxType,a=e.originalType,l=e.parentName,h=s(e,["components","mdxType","originalType","parentName"]),d=u(n),c=i,m=d["".concat(l,".").concat(c)]||d[c]||p[c]||a;return n?o.createElement(m,r(r({ref:t},h),{},{components:n})):o.createElement(m,r({ref:t},h))}));function c(e,t){var n=arguments,i=t&&t.mdxType;if("string"==typeof e||i){var a=n.length,r=new Array(a);r[0]=d;var s={};for(var l in t)hasOwnProperty.call(t,l)&&(s[l]=t[l]);s.originalType=e,s.mdxType="string"==typeof e?e:i,r[1]=s;for(var u=2;u<a;u++)r[u]=n[u];return o.createElement.apply(null,r)}return o.createElement.apply(null,n)}d.displayName="MDXCreateElement"},9222:(e,t,n)=>{n.r(t),n.d(t,{frontMatter:()=>s,contentTitle:()=>l,metadata:()=>u,toc:()=>h,default:()=>d});var o=n(3117),i=n(102),a=(n(7294),n(3905)),r=["components"],s={id:"troubleshooting",title:"Troubleshooting",sidebar_label:"How to troubleshoot"},l=void 0,u={unversionedId:"troubleshooting",id:"troubleshooting",title:"Troubleshooting",description:"Common issues",source:"@site/docs/troubleshooting.md",sourceDirName:".",slug:"/troubleshooting",permalink:"/docs/troubleshooting",editUrl:"https://github.com/MultinetInteractive/EduAdmin-WordPress/edit/master/new_website/docs/troubleshooting.md",tags:[],version:"current",lastUpdatedBy:"Chris G\xe5rdenberg",lastUpdatedAt:1654852718,formattedLastUpdatedAt:"6/10/2022",frontMatter:{id:"troubleshooting",title:"Troubleshooting",sidebar_label:"How to troubleshoot"},sidebar:"docs",previous:{title:"Your first custom template",permalink:"/docs/your-first-custom-template"}},h=[{value:"Common issues",id:"common-issues",children:[{value:"The website is showing old data",id:"the-website-is-showing-old-data",children:[],level:3},{value:"Nothing happens when I click anything",id:"nothing-happens-when-i-click-anything",children:[],level:3},{value:"It&#39;s not showing in the correct language",id:"its-not-showing-in-the-correct-language",children:[],level:3},{value:"Whenever I try to complete a booking, an unexpected error occurs",id:"whenever-i-try-to-complete-a-booking-an-unexpected-error-occurs",children:[],level:3},{value:"The dates shown on my website are wrong",id:"the-dates-shown-on-my-website-are-wrong",children:[],level:3}],level:2}],p={toc:h};function d(e){var t=e.components,n=(0,i.Z)(e,r);return(0,a.kt)("wrapper",(0,o.Z)({},p,n,{components:t,mdxType:"MDXLayout"}),(0,a.kt)("h2",{id:"common-issues"},"Common issues"),(0,a.kt)("p",null,"These issues have been reported most of all,\nand is likely a configuration problem,\nor compatibility problem with other WordPress plugins."),(0,a.kt)("div",{className:"admonition admonition-info alert alert--info"},(0,a.kt)("div",{parentName:"div",className:"admonition-heading"},(0,a.kt)("h5",{parentName:"div"},(0,a.kt)("span",{parentName:"h5",className:"admonition-icon"},(0,a.kt)("svg",{parentName:"span",xmlns:"http://www.w3.org/2000/svg",width:"14",height:"16",viewBox:"0 0 14 16"},(0,a.kt)("path",{parentName:"svg",fillRule:"evenodd",d:"M7 2.3c3.14 0 5.7 2.56 5.7 5.7s-2.56 5.7-5.7 5.7A5.71 5.71 0 0 1 1.3 8c0-3.14 2.56-5.7 5.7-5.7zM7 1C3.14 1 0 4.14 0 8s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm1 3H6v5h2V4zm0 6H6v2h2v-2z"}))),"Missing features are not bugs")),(0,a.kt)("div",{parentName:"div",className:"admonition-content"},(0,a.kt)("p",{parentName:"div"},"If a feature is missing, it's probably because no one have asked for it, so it's not a bug.\nIf you want to request a feature, you can do so by creating an\n",(0,a.kt)("a",{parentName:"p",href:"https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/new/choose"},"issue"),"\nor contacting our ",(0,a.kt)("a",{parentName:"p",href:"https://support.eduadmin.se/en/support/tickets/new"},"support")))),(0,a.kt)("h3",{id:"the-website-is-showing-old-data"},"The website is showing old data"),(0,a.kt)("p",null,"If the data on the web page isn't updating after you have updated the information in ",(0,a.kt)("a",{parentName:"p",href:"https://www.eduadmin.se"},(0,a.kt)("strong",{parentName:"a"},"EduAdmin")),",\nyou might want to clear any eventual cache plugins, and the internal cache in our plugin."),(0,a.kt)("p",null,"We cache some data for a period, to make the website as fast as possible."),(0,a.kt)("p",null,"If you need to check if it's our plugin that is caching something, you can add ",(0,a.kt)("inlineCode",{parentName:"p"},"?edu-showtransients=1")," to the url,\nand it will output some comments in the source code, that will tell you everything that we cache."),(0,a.kt)("p",null,"The output will look something like this"),(0,a.kt)("pre",null,(0,a.kt)("code",{parentName:"pre",className:"language-html",metastring:'title="Example output from plugin when showing transients"',title:'"Example',output:!0,from:!0,plugin:!0,when:!0,showing:!0,'transients"':!0},"\n\x3c!-- EduAdmin Booking (<version>) Transients \n eduadmin-locations_<hash>__<version>: Expires in: 24 hours \n eduadmin-categories_<hash>__<version>: Expires in: 24 hours \n eduadmin-levels_<hash>__<version>: Expires in: 24 hours \n eduadmin-listcourses-courses_<hash>__<version>: Expires in: 5 minutes \n eduadmin-organization_<hash>__<version>: Expires in: 24 hours \n eduadmin-newapi-token__<version>: Expires in: 7 days \n eduadmin-subjects_<hash>__<version>: Expires in: 1 day \n eduadmin-regions_<hash>__<version>: Expires in: 1 day \n /EduAdmin Booking Transients --\x3e\n\n")),(0,a.kt)("h3",{id:"nothing-happens-when-i-click-anything"},"Nothing happens when I click anything"),(0,a.kt)("p",null,"Make sure you are not using any plugins that combine/rearrange stylesheets or javascripts,\nor put our scripts in a whitelist, so they are not combined. Many of these plugins are not\nchecking in what order they should be loaded and might put the scripts in the wrong order."),(0,a.kt)("h3",{id:"its-not-showing-in-the-correct-language"},"It's not showing in the correct language"),(0,a.kt)("p",null,"By default, WordPress will download language files for plugins,\nbut we have noticed in some instances that it either fails to do so,\nor another translation plugin is prohibiting the translation to work properly."),(0,a.kt)("p",null,'You can always check the "Settings ',">",' General" and see what "Site Language" is set to.'),(0,a.kt)("h3",{id:"whenever-i-try-to-complete-a-booking-an-unexpected-error-occurs"},"Whenever I try to complete a booking, an unexpected error occurs"),(0,a.kt)("p",null,"Most of the time, when the plugin connects to ",(0,a.kt)("a",{parentName:"p",href:"https://www.eduadmin.se"},(0,a.kt)("strong",{parentName:"a"},"EduAdmin"))," to complete the booking,\nwe get back either a success, or an array of errors."),(0,a.kt)("p",null,"The unexpected error means something went wrong, that we do not have a classification for,\nso please ",(0,a.kt)("strong",{parentName:"p"},"contact us")," at our support portal whenever this occurs."),(0,a.kt)("div",{className:"admonition admonition-tip alert alert--success"},(0,a.kt)("div",{parentName:"div",className:"admonition-heading"},(0,a.kt)("h5",{parentName:"div"},(0,a.kt)("span",{parentName:"h5",className:"admonition-icon"},(0,a.kt)("svg",{parentName:"span",xmlns:"http://www.w3.org/2000/svg",width:"12",height:"16",viewBox:"0 0 12 16"},(0,a.kt)("path",{parentName:"svg",fillRule:"evenodd",d:"M6.5 0C3.48 0 1 2.19 1 5c0 .92.55 2.25 1 3 1.34 2.25 1.78 2.78 2 4v1h5v-1c.22-1.22.66-1.75 2-4 .45-.75 1-2.08 1-3 0-2.81-2.48-5-5.5-5zm3.64 7.48c-.25.44-.47.8-.67 1.11-.86 1.41-1.25 2.06-1.45 3.23-.02.05-.02.11-.02.17H5c0-.06 0-.13-.02-.17-.2-1.17-.59-1.83-1.45-3.23-.2-.31-.42-.67-.67-1.11C2.44 6.78 2 5.65 2 5c0-2.2 2.02-4 4.5-4 1.22 0 2.36.42 3.22 1.19C10.55 2.94 11 3.94 11 5c0 .66-.44 1.78-.86 2.48zM4 14h5c-.23 1.14-1.3 2-2.5 2s-2.27-.86-2.5-2z"}))),"Want support? Find us here!")),(0,a.kt)("div",{parentName:"div",className:"admonition-content"},(0,a.kt)("p",{parentName:"div"},"You can find the support portal at ",(0,a.kt)("a",{parentName:"p",href:"https://support.eduadmin.se/en/support/tickets/new"},(0,a.kt)("strong",{parentName:"a"},"https://support.eduadmin.se/en/support/tickets/new")),"."))),(0,a.kt)("h3",{id:"the-dates-shown-on-my-website-are-wrong"},"The dates shown on my website are wrong"),(0,a.kt)("p",null,"Make sure you have set the correct timezone in your WordPress instance,\nwe try to convert the dates from the EduAdmin API, to fit your WordPress settings."),(0,a.kt)("p",null,"And if you want to check how we handle the dates, you can append ",(0,a.kt)("inlineCode",{parentName:"p"},"?edu-debugdates=1")," to the URL,\nand then you will see (in the source), something like this:"),(0,a.kt)("pre",null,(0,a.kt)("code",{parentName:"pre",className:"language-html",metastring:'title="Example output from plugin when debugging dates"',title:'"Example',output:!0,from:!0,plugin:!0,when:!0,debugging:!0,'dates"':!0},"\n\x3c!-- Array\n(\n    [0] => Y-m-d                        // The format of the date\n    [1] => 2020-09-01T17:00:00+02:00    // The original input to the method\n    [2] => 2020-09-01T17:00:00+02:00    // If we don't send any input, we calculate a new input to be used\n    [3] => 2020-09-01                   // This is what will be outputted into the website\n    [4] => +02:00                       // This is the calculated timezone offset\n    [5] => 7200                         // This is the timezone offset, in seconds\n    [6] => include                      // This is an approximation of where the code is used\n)\n--\x3e\n\n")))}d.isMDXComponent=!0}}]);