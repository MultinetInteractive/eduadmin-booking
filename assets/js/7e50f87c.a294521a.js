"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[672],{3905:(e,t,a)=>{a.d(t,{Zo:()=>s,kt:()=>k});var n=a(7294);function i(e,t,a){return t in e?Object.defineProperty(e,t,{value:a,enumerable:!0,configurable:!0,writable:!0}):e[t]=a,e}function r(e,t){var a=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),a.push.apply(a,n)}return a}function o(e){for(var t=1;t<arguments.length;t++){var a=null!=arguments[t]?arguments[t]:{};t%2?r(Object(a),!0).forEach((function(t){i(e,t,a[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(a)):r(Object(a)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(a,t))}))}return e}function d(e,t){if(null==e)return{};var a,n,i=function(e,t){if(null==e)return{};var a,n,i={},r=Object.keys(e);for(n=0;n<r.length;n++)a=r[n],t.indexOf(a)>=0||(i[a]=e[a]);return i}(e,t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);for(n=0;n<r.length;n++)a=r[n],t.indexOf(a)>=0||Object.prototype.propertyIsEnumerable.call(e,a)&&(i[a]=e[a])}return i}var l=n.createContext({}),m=function(e){var t=n.useContext(l),a=t;return e&&(a="function"==typeof e?e(t):o(o({},t),e)),a},s=function(e){var t=m(e.components);return n.createElement(l.Provider,{value:t},e.children)},p="mdxType",u={inlineCode:"code",wrapper:function(e){var t=e.children;return n.createElement(n.Fragment,{},t)}},h=n.forwardRef((function(e,t){var a=e.components,i=e.mdxType,r=e.originalType,l=e.parentName,s=d(e,["components","mdxType","originalType","parentName"]),p=m(a),h=i,k=p["".concat(l,".").concat(h)]||p[h]||u[h]||r;return a?n.createElement(k,o(o({ref:t},s),{},{components:a})):n.createElement(k,o({ref:t},s))}));function k(e,t){var a=arguments,i=t&&t.mdxType;if("string"==typeof e||i){var r=a.length,o=new Array(r);o[0]=h;var d={};for(var l in t)hasOwnProperty.call(t,l)&&(d[l]=t[l]);d.originalType=e,d[p]="string"==typeof e?e:i,o[1]=d;for(var m=2;m<r;m++)o[m]=a[m];return n.createElement.apply(null,o)}return n.createElement.apply(null,a)}h.displayName="MDXCreateElement"},3896:(e,t,a)=>{a.r(t),a.d(t,{assets:()=>s,contentTitle:()=>l,default:()=>k,frontMatter:()=>d,metadata:()=>m,toc:()=>p});var n=a(3117),i=a(102),r=(a(7294),a(3905)),o=["components"],d={id:"wordpress-actions",title:"WordPress Actions",sidebar_label:"WordPress Actions"},l=void 0,m={unversionedId:"wordpress-actions",id:"wordpress-actions",title:"WordPress Actions",description:"Here we have a list of all the actions that are available in the plugin.",source:"@site/docs/wordpress-actions.md",sourceDirName:".",slug:"/wordpress-actions",permalink:"/docs/wordpress-actions",draft:!1,editUrl:"https://github.com/MultinetInteractive/EduAdmin-WordPress/edit/master/new_website/docs/wordpress-actions.md",tags:[],version:"current",lastUpdatedBy:"NoLifeKing",lastUpdatedAt:1724070083,formattedLastUpdatedAt:"Aug 19, 2024",frontMatter:{id:"wordpress-actions",title:"WordPress Actions",sidebar_label:"WordPress Actions"},sidebar:"docs",previous:{title:"Your first custom template",permalink:"/docs/your-first-custom-template"},next:{title:"How to troubleshoot",permalink:"/docs/troubleshooting"}},s={},p=[{value:"Actions",id:"actions",level:2},{value:"<code>eduadmin-booking-completed</code>",id:"eduadmin-booking-completed",level:3},{value:"<code>eduadmin-bookingcompleted</code>",id:"eduadmin-bookingcompleted",level:3},{value:"<code>eduadmin-bookingerror</code>",id:"eduadmin-bookingerror",level:3},{value:"<code>eduadmin-bookingform-loaded</code>",id:"eduadmin-bookingform-loaded",level:3},{value:"<code>eduadmin-bookingform-view</code>",id:"eduadmin-bookingform-view",level:3},{value:"<code>eduadmin-checkpaymentplugins</code>",id:"eduadmin-checkpaymentplugins",level:3},{value:"<code>eduadmin-detail-view</code>",id:"eduadmin-detail-view",level:3},{value:"<code>eduadmin-list-course-view</code>",id:"eduadmin-list-course-view",level:3},{value:"<code>eduadmin-list-event-view</code>",id:"eduadmin-list-event-view",level:3},{value:"<code>eduadmin-list-programme-view</code>",id:"eduadmin-list-programme-view",level:3},{value:"<code>eduadmin-plugin-save_&lt;plugin-id&gt;</code>",id:"eduadmin-plugin-save_plugin-id",level:3},{value:"<code>eduadmin-processbooking</code>",id:"eduadmin-processbooking",level:3},{value:"<code>eduadmin-programme-bookingform-view</code>",id:"eduadmin-programme-bookingform-view",level:3},{value:"<code>eduadmin-programme-detail-view</code>",id:"eduadmin-programme-detail-view",level:3},{value:"<code>edu_integrations_init</code>",id:"edu_integrations_init",level:3},{value:"<code>eduadmin_loaded</code>",id:"eduadmin_loaded",level:3},{value:"<code>eduadmin_showtimers</code>",id:"eduadmin_showtimers",level:3}],u={toc:p},h="wrapper";function k(e){var t=e.components,a=(0,i.Z)(e,o);return(0,r.kt)(h,(0,n.Z)({},u,a,{components:t,mdxType:"MDXLayout"}),(0,r.kt)("p",null,"Here we have a list of all the actions that are available in the plugin."),(0,r.kt)("admonition",{type:"caution"},(0,r.kt)("p",{parentName:"admonition"},"Please use with care! This can break the functionality of the plugin.")),(0,r.kt)("h2",{id:"actions"},"Actions"),(0,r.kt)("p",null,"Some of the actions will have parameters that are passed to them, they will be explained in the section about the\naction."),(0,r.kt)("h3",{id:"eduadmin-booking-completed"},(0,r.kt)("inlineCode",{parentName:"h3"},"eduadmin-booking-completed")),(0,r.kt)("p",null,'This event fires when the booking is completed, and the "Thank you"-page is shown (requires the ',(0,r.kt)("inlineCode",{parentName:"p"},"edu-thankyou")," query\nparameter to be present)"),(0,r.kt)("table",null,(0,r.kt)("thead",{parentName:"table"},(0,r.kt)("tr",{parentName:"thead"},(0,r.kt)("th",{parentName:"tr",align:"left"},"Parameter name"),(0,r.kt)("th",{parentName:"tr",align:"left"},"Description"))),(0,r.kt)("tbody",{parentName:"table"},(0,r.kt)("tr",{parentName:"tbody"},(0,r.kt)("td",{parentName:"tr",align:"left"},(0,r.kt)("inlineCode",{parentName:"td"},"$booking_info")),(0,r.kt)("td",{parentName:"tr",align:"left"},"Contains either a ",(0,r.kt)("a",{parentName:"td",href:"https://api.eduadmin.se/?page=read#operation/GetSingleBooking"},"Booking")," or a ",(0,r.kt)("a",{parentName:"td",href:"https://api.eduadmin.se/?page=read#operation/GetSingleProgrammeBooking"},"ProgrammeBooking"))))),(0,r.kt)("p",null,"This event can be used when you want to trigger some custom code after a booking has been completed, like if you want to\ntrigger a webhook or something similar."),(0,r.kt)("h3",{id:"eduadmin-bookingcompleted"},(0,r.kt)("inlineCode",{parentName:"h3"},"eduadmin-bookingcompleted")),(0,r.kt)("p",null,"An old legacy event that is still available for backwards compatibility, used by some integrations/plugins to handle\npayment updates/information."),(0,r.kt)("h3",{id:"eduadmin-bookingerror"},(0,r.kt)("inlineCode",{parentName:"h3"},"eduadmin-bookingerror")),(0,r.kt)("p",null,"This event fires when there is an error with the booking."),(0,r.kt)("table",null,(0,r.kt)("thead",{parentName:"table"},(0,r.kt)("tr",{parentName:"thead"},(0,r.kt)("th",{parentName:"tr",align:"left"},"Parameter name"),(0,r.kt)("th",{parentName:"tr",align:"left"},"Description"))),(0,r.kt)("tbody",{parentName:"table"},(0,r.kt)("tr",{parentName:"tbody"},(0,r.kt)("td",{parentName:"tr",align:"left"},(0,r.kt)("inlineCode",{parentName:"td"},"$error_list")),(0,r.kt)("td",{parentName:"tr",align:"left"},"Contains the error message(s) that was returned from the API.")))),(0,r.kt)("h3",{id:"eduadmin-bookingform-loaded"},(0,r.kt)("inlineCode",{parentName:"h3"},"eduadmin-bookingform-loaded")),(0,r.kt)("p",null,"This event fires when the booking form is loaded, and the booking form is about to be rendered."),(0,r.kt)("table",null,(0,r.kt)("thead",{parentName:"table"},(0,r.kt)("tr",{parentName:"thead"},(0,r.kt)("th",{parentName:"tr",align:"left"},"Parameter name"),(0,r.kt)("th",{parentName:"tr",align:"left"},"Description"))),(0,r.kt)("tbody",{parentName:"table"},(0,r.kt)("tr",{parentName:"tbody"},(0,r.kt)("td",{parentName:"tr",align:"left"},(0,r.kt)("inlineCode",{parentName:"td"},"$login_user")),(0,r.kt)("td",{parentName:"tr",align:"left"},"Contains information about the user that is logged in (or pseudo user if there is none).")))),(0,r.kt)("h3",{id:"eduadmin-bookingform-view"},(0,r.kt)("inlineCode",{parentName:"h3"},"eduadmin-bookingform-view")),(0,r.kt)("p",null,"This event fires when the booking form has been loaded, and we know what course is shown."),(0,r.kt)("table",null,(0,r.kt)("thead",{parentName:"table"},(0,r.kt)("tr",{parentName:"thead"},(0,r.kt)("th",{parentName:"tr",align:"left"},"Parameter name"),(0,r.kt)("th",{parentName:"tr",align:"left"},"Description"))),(0,r.kt)("tbody",{parentName:"table"},(0,r.kt)("tr",{parentName:"tbody"},(0,r.kt)("td",{parentName:"tr",align:"left"},(0,r.kt)("inlineCode",{parentName:"td"},"$selected_course")),(0,r.kt)("td",{parentName:"tr",align:"left"},"Contains the ",(0,r.kt)("a",{parentName:"td",href:"https://api.eduadmin.se/?page=read#operation/GetSingleCourseTemplate"},"CourseTemplate")," that is shown in the booking form.")))),(0,r.kt)("h3",{id:"eduadmin-checkpaymentplugins"},(0,r.kt)("inlineCode",{parentName:"h3"},"eduadmin-checkpaymentplugins")),(0,r.kt)("p",null,"This event fires when the booking is about to be made, and the plugin is checking if there are any payment plugins that\nwants to inject themselves into the booking flow."),(0,r.kt)("table",null,(0,r.kt)("thead",{parentName:"table"},(0,r.kt)("tr",{parentName:"thead"},(0,r.kt)("th",{parentName:"tr",align:"left"},"Parameter name"),(0,r.kt)("th",{parentName:"tr",align:"left"},"Description"))),(0,r.kt)("tbody",{parentName:"table"},(0,r.kt)("tr",{parentName:"tbody"},(0,r.kt)("td",{parentName:"tr",align:"left"},(0,r.kt)("inlineCode",{parentName:"td"},"$ebi")),(0,r.kt)("td",{parentName:"tr",align:"left"},"Contains the ",(0,r.kt)("a",{parentName:"td",href:"https://github.com/MultinetInteractive/EduAdmin-WordPress/blob/production/class/class-eduadmin-bookinginfo.php"},"EduAdmin_BookingInfo")," that has been created.")))),(0,r.kt)("p",null,"Example of how this is used in the plugin for Svea WebPay can be found here:"),(0,r.kt)("p",null,(0,r.kt)("a",{parentName:"p",href:"https://github.com/MultinetInteractive/EduAdmin-WordPress-SveaWebPay/blob/master/class/class-edu-sveawebpay.php#L27"},"https://github.com/MultinetInteractive/EduAdmin-WordPress-SveaWebPay/blob/master/class/class-edu-sveawebpay.php#L27")),(0,r.kt)("h3",{id:"eduadmin-detail-view"},(0,r.kt)("inlineCode",{parentName:"h3"},"eduadmin-detail-view")),(0,r.kt)("p",null,"This event fires when the detail view is loaded, and the detail view is about to be rendered."),(0,r.kt)("table",null,(0,r.kt)("thead",{parentName:"table"},(0,r.kt)("tr",{parentName:"thead"},(0,r.kt)("th",{parentName:"tr",align:"left"},"Parameter name"),(0,r.kt)("th",{parentName:"tr",align:"left"},"Description"))),(0,r.kt)("tbody",{parentName:"table"},(0,r.kt)("tr",{parentName:"tbody"},(0,r.kt)("td",{parentName:"tr",align:"left"},(0,r.kt)("inlineCode",{parentName:"td"},"$selected_course")),(0,r.kt)("td",{parentName:"tr",align:"left"},"Contains the ",(0,r.kt)("a",{parentName:"td",href:"https://api.eduadmin.se/?page=read#operation/GetSingleCourseTemplate"},"CourseTemplate")," that is shown.")))),(0,r.kt)("h3",{id:"eduadmin-list-course-view"},(0,r.kt)("inlineCode",{parentName:"h3"},"eduadmin-list-course-view")),(0,r.kt)("p",null,"This event fires when the course list view is loaded, and the list view has been rendered."),(0,r.kt)("table",null,(0,r.kt)("thead",{parentName:"table"},(0,r.kt)("tr",{parentName:"thead"},(0,r.kt)("th",{parentName:"tr",align:"left"},"Parameter name"),(0,r.kt)("th",{parentName:"tr",align:"left"},"Description"))),(0,r.kt)("tbody",{parentName:"table"},(0,r.kt)("tr",{parentName:"tbody"},(0,r.kt)("td",{parentName:"tr",align:"left"},(0,r.kt)("inlineCode",{parentName:"td"},"$courses")),(0,r.kt)("td",{parentName:"tr",align:"left"},"Contains an array of the ",(0,r.kt)("a",{parentName:"td",href:"https://api.eduadmin.se/?page=read#operation/GetSingleCourseTemplate"},"CourseTemplates")," that is shown in the list.")))),(0,r.kt)("h3",{id:"eduadmin-list-event-view"},(0,r.kt)("inlineCode",{parentName:"h3"},"eduadmin-list-event-view")),(0,r.kt)("p",null,"This event fires when the event list view is loaded, and the list view has been rendered."),(0,r.kt)("table",null,(0,r.kt)("thead",{parentName:"table"},(0,r.kt)("tr",{parentName:"thead"},(0,r.kt)("th",{parentName:"tr",align:"left"},"Parameter name"),(0,r.kt)("th",{parentName:"tr",align:"left"},"Description"))),(0,r.kt)("tbody",{parentName:"table"},(0,r.kt)("tr",{parentName:"tbody"},(0,r.kt)("td",{parentName:"tr",align:"left"},(0,r.kt)("inlineCode",{parentName:"td"},"$events")),(0,r.kt)("td",{parentName:"tr",align:"left"},"Contains an array of the ",(0,r.kt)("a",{parentName:"td",href:"https://api.eduadmin.se/?page=read#operation/GetSingleEvent"},"Events")," that is shown in the list.")))),(0,r.kt)("h3",{id:"eduadmin-list-programme-view"},(0,r.kt)("inlineCode",{parentName:"h3"},"eduadmin-list-programme-view")),(0,r.kt)("p",null,"This event fires when the event list view is loaded, and the list view has been rendered."),(0,r.kt)("table",null,(0,r.kt)("thead",{parentName:"table"},(0,r.kt)("tr",{parentName:"thead"},(0,r.kt)("th",{parentName:"tr",align:"left"},"Parameter name"),(0,r.kt)("th",{parentName:"tr",align:"left"},"Description"))),(0,r.kt)("tbody",{parentName:"table"},(0,r.kt)("tr",{parentName:"tbody"},(0,r.kt)("td",{parentName:"tr",align:"left"},(0,r.kt)("inlineCode",{parentName:"td"},"$programmes")),(0,r.kt)("td",{parentName:"tr",align:"left"},"Contains an array of the ",(0,r.kt)("a",{parentName:"td",href:"https://api.eduadmin.se/?page=read#operation/GetSingleProgramme"},"Programmes")," that is shown in the list.")))),(0,r.kt)("h3",{id:"eduadmin-plugin-save_plugin-id"},(0,r.kt)("inlineCode",{parentName:"h3"},"eduadmin-plugin-save_<plugin-id>")),(0,r.kt)("p",null,"This is an internal action, only used to save the options for a plugin."),(0,r.kt)("p",null,(0,r.kt)("a",{parentName:"p",href:"https://github.com/MultinetInteractive/EduAdmin-WordPress/blob/production/includes/plugin/class-edu-integration.php#L152-L173"},"https://github.com/MultinetInteractive/EduAdmin-WordPress/blob/production/includes/plugin/class-edu-integration.php#L152-L173")),(0,r.kt)("h3",{id:"eduadmin-processbooking"},(0,r.kt)("inlineCode",{parentName:"h3"},"eduadmin-processbooking")),(0,r.kt)("p",null,"This event fires when the booking is made, and potential plugins can take part of the booking information for custom\nhandling."),(0,r.kt)("table",null,(0,r.kt)("thead",{parentName:"table"},(0,r.kt)("tr",{parentName:"thead"},(0,r.kt)("th",{parentName:"tr",align:"left"},"Parameter name"),(0,r.kt)("th",{parentName:"tr",align:"left"},"Description"))),(0,r.kt)("tbody",{parentName:"table"},(0,r.kt)("tr",{parentName:"tbody"},(0,r.kt)("td",{parentName:"tr",align:"left"},(0,r.kt)("inlineCode",{parentName:"td"},"$ebi")),(0,r.kt)("td",{parentName:"tr",align:"left"},"Contains the ",(0,r.kt)("a",{parentName:"td",href:"https://github.com/MultinetInteractive/EduAdmin-WordPress/blob/production/class/class-eduadmin-bookinginfo.php"},"EduAdmin_BookingInfo")," that has been created.")))),(0,r.kt)("h3",{id:"eduadmin-programme-bookingform-view"},(0,r.kt)("inlineCode",{parentName:"h3"},"eduadmin-programme-bookingform-view")),(0,r.kt)("p",null,"This event fires when the programme booking form has been loaded, and we know what programme is shown."),(0,r.kt)("table",null,(0,r.kt)("thead",{parentName:"table"},(0,r.kt)("tr",{parentName:"thead"},(0,r.kt)("th",{parentName:"tr",align:"left"},"Parameter name"),(0,r.kt)("th",{parentName:"tr",align:"left"},"Description"))),(0,r.kt)("tbody",{parentName:"table"},(0,r.kt)("tr",{parentName:"tbody"},(0,r.kt)("td",{parentName:"tr",align:"left"},(0,r.kt)("inlineCode",{parentName:"td"},"$programme")),(0,r.kt)("td",{parentName:"tr",align:"left"},"Contains the ",(0,r.kt)("a",{parentName:"td",href:"https://api.eduadmin.se/?page=read#operation/GetSingleProgramme"},"Programme")," that is shown in the booking form.")))),(0,r.kt)("h3",{id:"eduadmin-programme-detail-view"},(0,r.kt)("inlineCode",{parentName:"h3"},"eduadmin-programme-detail-view")),(0,r.kt)("p",null,"This event fires when the programme detail view is loaded, and the detail view is about to be rendered."),(0,r.kt)("table",null,(0,r.kt)("thead",{parentName:"table"},(0,r.kt)("tr",{parentName:"thead"},(0,r.kt)("th",{parentName:"tr",align:"left"},"Parameter name"),(0,r.kt)("th",{parentName:"tr",align:"left"},"Description"))),(0,r.kt)("tbody",{parentName:"table"},(0,r.kt)("tr",{parentName:"tbody"},(0,r.kt)("td",{parentName:"tr",align:"left"},(0,r.kt)("inlineCode",{parentName:"td"},"$programme")),(0,r.kt)("td",{parentName:"tr",align:"left"},"Contains the ",(0,r.kt)("a",{parentName:"td",href:"https://api.eduadmin.se/?page=read#operation/GetSingleProgramme"},"Programme")," that is shown in the detail view.")))),(0,r.kt)("h3",{id:"edu_integrations_init"},(0,r.kt)("inlineCode",{parentName:"h3"},"edu_integrations_init")),(0,r.kt)("p",null,"This event fires when the plugin is loaded, and the integrations are about to be loaded."),(0,r.kt)("h3",{id:"eduadmin_loaded"},(0,r.kt)("inlineCode",{parentName:"h3"},"eduadmin_loaded")),(0,r.kt)("p",null,"This event fires when the plugin is loaded, and the plugin is done initializing."),(0,r.kt)("h3",{id:"eduadmin_showtimers"},(0,r.kt)("inlineCode",{parentName:"h3"},"eduadmin_showtimers")),(0,r.kt)("p",null,"This event fires when the plugin is loaded, and the plugin is about to show the timers."),(0,r.kt)("p",null,"Can be used, if you want to extend the timer functionality, and add your own timers."))}k.isMDXComponent=!0}}]);