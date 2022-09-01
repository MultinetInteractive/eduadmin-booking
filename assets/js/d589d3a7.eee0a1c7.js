"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[90],{3905:(e,t,n)=>{n.d(t,{Zo:()=>p,kt:()=>h});var a=n(7294);function i(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function o(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);t&&(a=a.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,a)}return n}function r(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?o(Object(n),!0).forEach((function(t){i(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):o(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function s(e,t){if(null==e)return{};var n,a,i=function(e,t){if(null==e)return{};var n,a,i={},o=Object.keys(e);for(a=0;a<o.length;a++)n=o[a],t.indexOf(n)>=0||(i[n]=e[n]);return i}(e,t);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);for(a=0;a<o.length;a++)n=o[a],t.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(e,n)&&(i[n]=e[n])}return i}var d=a.createContext({}),l=function(e){var t=a.useContext(d),n=t;return e&&(n="function"==typeof e?e(t):r(r({},t),e)),n},p=function(e){var t=l(e.components);return a.createElement(d.Provider,{value:t},e.children)},u={inlineCode:"code",wrapper:function(e){var t=e.children;return a.createElement(a.Fragment,{},t)}},m=a.forwardRef((function(e,t){var n=e.components,i=e.mdxType,o=e.originalType,d=e.parentName,p=s(e,["components","mdxType","originalType","parentName"]),m=l(n),h=i,c=m["".concat(d,".").concat(h)]||m[h]||u[h]||o;return n?a.createElement(c,r(r({ref:t},p),{},{components:n})):a.createElement(c,r({ref:t},p))}));function h(e,t){var n=arguments,i=t&&t.mdxType;if("string"==typeof e||i){var o=n.length,r=new Array(o);r[0]=m;var s={};for(var d in t)hasOwnProperty.call(t,d)&&(s[d]=t[d]);s.originalType=e,s.mdxType="string"==typeof e?e:i,r[1]=s;for(var l=2;l<o;l++)r[l]=n[l];return a.createElement.apply(null,r)}return a.createElement.apply(null,n)}m.displayName="MDXCreateElement"},9390:(e,t,n)=>{n.r(t),n.d(t,{frontMatter:()=>s,contentTitle:()=>d,metadata:()=>l,toc:()=>p,default:()=>m});var a=n(3117),i=n(102),o=(n(7294),n(3905)),r=["components"],s={id:"getting-started",title:"Getting started",sidebar_label:"First time setup",slug:"/"},d=void 0,l={unversionedId:"getting-started",id:"getting-started",title:"Getting started",description:"This guide will focus on get you started with the EduAdmin WordPress Plugin, with default templates and settings so your visitors can start booking directly from your WordPress webpage.",source:"@site/docs/getting-started.md",sourceDirName:".",slug:"/",permalink:"/docs/",editUrl:"https://github.com/MultinetInteractive/EduAdmin-WordPress/edit/master/new_website/docs/getting-started.md",tags:[],version:"current",lastUpdatedBy:"Chris G\xe5rdenberg",lastUpdatedAt:1662020984,formattedLastUpdatedAt:"9/1/2022",frontMatter:{id:"getting-started",title:"Getting started",sidebar_label:"First time setup",slug:"/"},sidebar:"docs",next:{title:"Shortcodes",permalink:"/docs/shortcodes"}},p=[{value:"Installing the plugin",id:"installing-the-plugin",children:[],level:2},{value:"Setting the API key",id:"setting-the-api-key",children:[],level:2},{value:"Creating all the required pages",id:"creating-all-the-required-pages",children:[{value:"<code>[eduadmin-listview]</code>",id:"eduadmin-listview",children:[],level:3},{value:"<code>[eduadmin-detailview]</code>",id:"eduadmin-detailview",children:[],level:3},{value:"<code>[eduadmin-bookingview]</code> (or use the EduAdmin Booking Forms)",id:"eduadmin-bookingview-or-use-the-eduadmin-booking-forms",children:[],level:3},{value:"Thank you-page",id:"thank-you-page",children:[],level:3}],level:2},{value:"Wrapping it up",id:"wrapping-it-up",children:[],level:2}],u={toc:p};function m(e){var t=e.components,n=(0,i.Z)(e,r);return(0,o.kt)("wrapper",(0,a.Z)({},u,n,{components:t,mdxType:"MDXLayout"}),(0,o.kt)("p",null,"This guide will focus on get you started with the ",(0,o.kt)("a",{parentName:"p",href:"https://wordpress.org/plugins/eduadmin-booking/"},(0,o.kt)("strong",{parentName:"a"},"EduAdmin WordPress Plugin")),", with default templates and settings so your visitors can start booking directly from your ",(0,o.kt)("a",{parentName:"p",href:"https://www.wordpress.org"},(0,o.kt)("strong",{parentName:"a"},"WordPress"))," webpage."),(0,o.kt)("div",{className:"admonition admonition-info alert alert--info"},(0,o.kt)("div",{parentName:"div",className:"admonition-heading"},(0,o.kt)("h5",{parentName:"div"},(0,o.kt)("span",{parentName:"h5",className:"admonition-icon"},(0,o.kt)("svg",{parentName:"span",xmlns:"http://www.w3.org/2000/svg",width:"14",height:"16",viewBox:"0 0 14 16"},(0,o.kt)("path",{parentName:"svg",fillRule:"evenodd",d:"M7 2.3c3.14 0 5.7 2.56 5.7 5.7s-2.56 5.7-5.7 5.7A5.71 5.71 0 0 1 1.3 8c0-3.14 2.56-5.7 5.7-5.7zM7 1C3.14 1 0 4.14 0 8s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm1 3H6v5h2V4zm0 6H6v2h2v-2z"}))),"EduAdmin API Key")),(0,o.kt)("div",{parentName:"div",className:"admonition-content"},(0,o.kt)("p",{parentName:"div"},"If you do not have an API key for ",(0,o.kt)("a",{parentName:"p",href:"https://www.eduadmin.se"},(0,o.kt)("strong",{parentName:"a"},"EduAdmin"))," yet,\nconsider contacting our support."),(0,o.kt)("p",{parentName:"div"},(0,o.kt)("a",{parentName:"p",href:"https://www.eduadmin.se"},(0,o.kt)("strong",{parentName:"a"},"EduAdmin"))," is not a free service,\nand the API key comes with a monthly fee."))),(0,o.kt)("p",null,"If you have your API key ready, let us go through the steps below!"),(0,o.kt)("div",{className:"admonition admonition-tip alert alert--success"},(0,o.kt)("div",{parentName:"div",className:"admonition-heading"},(0,o.kt)("h5",{parentName:"div"},(0,o.kt)("span",{parentName:"h5",className:"admonition-icon"},(0,o.kt)("svg",{parentName:"span",xmlns:"http://www.w3.org/2000/svg",width:"12",height:"16",viewBox:"0 0 12 16"},(0,o.kt)("path",{parentName:"svg",fillRule:"evenodd",d:"M6.5 0C3.48 0 1 2.19 1 5c0 .92.55 2.25 1 3 1.34 2.25 1.78 2.78 2 4v1h5v-1c.22-1.22.66-1.75 2-4 .45-.75 1-2.08 1-3 0-2.81-2.48-5-5.5-5zm3.64 7.48c-.25.44-.47.8-.67 1.11-.86 1.41-1.25 2.06-1.45 3.23-.02.05-.02.11-.02.17H5c0-.06 0-.13-.02-.17-.2-1.17-.59-1.83-1.45-3.23-.2-.31-.42-.67-.67-1.11C2.44 6.78 2 5.65 2 5c0-2.2 2.02-4 4.5-4 1.22 0 2.36.42 3.22 1.19C10.55 2.94 11 3.94 11 5c0 .66-.44 1.78-.86 2.48zM4 14h5c-.23 1.14-1.3 2-2.5 2s-2.27-.86-2.5-2z"}))),"Need more customization?")),(0,o.kt)("div",{parentName:"div",className:"admonition-content"},(0,o.kt)("p",{parentName:"div"},"If you need the ability to customize things more than we have the ability to,\nwe recommend that you look into creating your own integration with our API."))),(0,o.kt)("h2",{id:"installing-the-plugin"},"Installing the plugin"),(0,o.kt)("p",null,"Make sure you are logged in to WordPress with a user, that has access to install new plugins.\nFrom the plugin view, click ",(0,o.kt)("strong",{parentName:"p"},"Add New")," and search for ",(0,o.kt)("em",{parentName:"p"},"EduAdmin"),', the one you want is "',(0,o.kt)("a",{parentName:"p",href:"https://wordpress.org/plugins/eduadmin-booking/"},(0,o.kt)("strong",{parentName:"a"},"EduAdmin Booking")),'" by ',(0,o.kt)("a",{parentName:"p",href:"https://www.multinet.com"},(0,o.kt)("strong",{parentName:"a"},"MultiNet Interactive AB")),"."),(0,o.kt)("div",{className:"admonition admonition-tip alert alert--success"},(0,o.kt)("div",{parentName:"div",className:"admonition-heading"},(0,o.kt)("h5",{parentName:"div"},(0,o.kt)("span",{parentName:"h5",className:"admonition-icon"},(0,o.kt)("svg",{parentName:"span",xmlns:"http://www.w3.org/2000/svg",width:"12",height:"16",viewBox:"0 0 12 16"},(0,o.kt)("path",{parentName:"svg",fillRule:"evenodd",d:"M6.5 0C3.48 0 1 2.19 1 5c0 .92.55 2.25 1 3 1.34 2.25 1.78 2.78 2 4v1h5v-1c.22-1.22.66-1.75 2-4 .45-.75 1-2.08 1-3 0-2.81-2.48-5-5.5-5zm3.64 7.48c-.25.44-.47.8-.67 1.11-.86 1.41-1.25 2.06-1.45 3.23-.02.05-.02.11-.02.17H5c0-.06 0-.13-.02-.17-.2-1.17-.59-1.83-1.45-3.23-.2-.31-.42-.67-.67-1.11C2.44 6.78 2 5.65 2 5c0-2.2 2.02-4 4.5-4 1.22 0 2.36.42 3.22 1.19C10.55 2.94 11 3.94 11 5c0 .66-.44 1.78-.86 2.48zM4 14h5c-.23 1.14-1.3 2-2.5 2s-2.27-.86-2.5-2z"}))),"tip")),(0,o.kt)("div",{parentName:"div",className:"admonition-content"},(0,o.kt)("p",{parentName:"div"},"Don't forget to activate the newly installed plugin"))),(0,o.kt)("h2",{id:"setting-the-api-key"},"Setting the API key"),(0,o.kt)("p",null,"When you activate the plugin, a new menu item (",(0,o.kt)("em",{parentName:"p"},"EduAdmin"),") will appear in the left menu,\nto set your API key, navigate to the ",(0,o.kt)("em",{parentName:"p"},"Api Authentication")," and enter the API key you got from ",(0,o.kt)("a",{parentName:"p",href:"https://www.multinet.com"},(0,o.kt)("strong",{parentName:"a"},"MultiNet Interactive AB")),"\n(or if you got one from the company you're building the website for.)"),(0,o.kt)("h2",{id:"creating-all-the-required-pages"},"Creating all the required pages"),(0,o.kt)("p",null,"After setting the API key, we now need to create the bare minimum of required pages and set some settings,\nso your customers can browse the available courses and if available book themselves."),(0,o.kt)("div",{className:"admonition admonition-note alert alert--secondary"},(0,o.kt)("div",{parentName:"div",className:"admonition-heading"},(0,o.kt)("h5",{parentName:"div"},(0,o.kt)("span",{parentName:"h5",className:"admonition-icon"},(0,o.kt)("svg",{parentName:"span",xmlns:"http://www.w3.org/2000/svg",width:"14",height:"16",viewBox:"0 0 14 16"},(0,o.kt)("path",{parentName:"svg",fillRule:"evenodd",d:"M6.3 5.69a.942.942 0 0 1-.28-.7c0-.28.09-.52.28-.7.19-.18.42-.28.7-.28.28 0 .52.09.7.28.18.19.28.42.28.7 0 .28-.09.52-.28.7a1 1 0 0 1-.7.3c-.28 0-.52-.11-.7-.3zM8 7.99c-.02-.25-.11-.48-.31-.69-.2-.19-.42-.3-.69-.31H6c-.27.02-.48.13-.69.31-.2.2-.3.44-.31.69h1v3c.02.27.11.5.31.69.2.2.42.31.69.31h1c.27 0 .48-.11.69-.31.2-.19.3-.42.31-.69H8V7.98v.01zM7 2.3c-3.14 0-5.7 2.54-5.7 5.68 0 3.14 2.56 5.7 5.7 5.7s5.7-2.55 5.7-5.7c0-3.15-2.56-5.69-5.7-5.69v.01zM7 .98c3.86 0 7 3.14 7 7s-3.14 7-7 7-7-3.12-7-7 3.14-7 7-7z"}))),"note")),(0,o.kt)("div",{parentName:"div",className:"admonition-content"},(0,o.kt)("p",{parentName:"div"},"For all pages to work, you have to select them in the proper setting on ",(0,o.kt)("em",{parentName:"p"},"General settings"),",\nand set which URL/folder the plugin should work under."))),(0,o.kt)("p",null,"The shortcodes we go through below can be viewed in detail on the ",(0,o.kt)("a",{parentName:"p",href:"/docs/shortcodes"},"shortcode"),"-page"),(0,o.kt)("p",null,"The pages that we recommend that you create are as follows"),(0,o.kt)("h3",{id:"eduadmin-listview"},(0,o.kt)("inlineCode",{parentName:"h3"},"[eduadmin-listview]")),(0,o.kt)("p",null,"This page will show the available courses that you have published through ",(0,o.kt)("a",{parentName:"p",href:"https://www.eduadmin.se"},(0,o.kt)("strong",{parentName:"a"},"EduAdmin")),",\nand depending on what settings it can show different information."),(0,o.kt)("h3",{id:"eduadmin-detailview"},(0,o.kt)("inlineCode",{parentName:"h3"},"[eduadmin-detailview]")),(0,o.kt)("p",null,"The details view, will show the course information and the available course dates (if there are any available)."),(0,o.kt)("p",null,"It is also possible to build a custom template to use, instead of the two default themes we have."),(0,o.kt)("h3",{id:"eduadmin-bookingview-or-use-the-eduadmin-booking-forms"},(0,o.kt)("inlineCode",{parentName:"h3"},"[eduadmin-bookingview]")," (or use the EduAdmin Booking Forms)"),(0,o.kt)("p",null,"This page is probably the most important one, since it's the page used to post the bookings into ",(0,o.kt)("a",{parentName:"p",href:"https://www.eduadmin.se"},(0,o.kt)("strong",{parentName:"a"},"EduAdmin")),"."),(0,o.kt)("p",null,"The form is automatically built by the plugin, and handles custom fields and questions that you can setup in ",(0,o.kt)("a",{parentName:"p",href:"https://www.eduadmin.se"},(0,o.kt)("strong",{parentName:"a"},"EduAdmin")),",\nthe elements have CSS classes, so it's easy to style the form, the way you want it to be."),(0,o.kt)("hr",null),(0,o.kt)("p",null,'And as stated in the header, you can also check the box in the top of "Booking settings", to use the booking forms from EduAdmin instead.'),(0,o.kt)("p",null,"All customization for these forms are made directly in EduAdmin, so that you don't have to work inside of WordPress to modify them."),(0,o.kt)("h3",{id:"thank-you-page"},"Thank you-page"),(0,o.kt)("p",null,"This is a static page that you create as a ",(0,o.kt)("em",{parentName:"p"},"Thank you"),"-page, whenever someone completes a booking."),(0,o.kt)("p",null,"It will also run the javascript specified in the ",(0,o.kt)("em",{parentName:"p"},"Booking settings"),"-section, if anything is specified,\nthis is normally used to complete goals in Analytic-systems."),(0,o.kt)("h2",{id:"wrapping-it-up"},"Wrapping it up"),(0,o.kt)("p",null,"We went through the guide, created some pages, added the appropriate shortcodes."),(0,o.kt)("p",null,"If everything is setup correctly, you should now be able to view your new,\nfully integrated web booking in the directory you selected during the setup."),(0,o.kt)("p",null,"If you are experiencing some kind  or problems,\ncheck the ",(0,o.kt)("a",{parentName:"p",href:"/docs/troubleshooting"},"Troubleshooting"),"-page to see\nif the issue you are experiencing is listed there."))}m.isMDXComponent=!0}}]);