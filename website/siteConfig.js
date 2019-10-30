/**
 * Copyright (c) 2017-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */

// See https://docusaurus.io/docs/site-config for all the possible
// site configuration options.

// List of projects/orgs using your project for the users page.
const users = [
  /*{
    caption: 'MultiNet Interactive AB',
    image: '/EduAdmin-WordPress/img/undraw_open_source.svg',
    infoLink: 'https://www.multinet.com',
    pinned: true,
  },
  {
    caption: 'RODA AB',
    image: '/EduAdmin-WordPress/img/undraw_open_source.svg',
    infoLink: 'https://www.roda.se',
    pinned: true,
  },*/
];

const siteConfig = {
  title: 'EduAdmin plugin',
  tagline: 'EduAdmin integration for WordPress',
  url: 'https://wordpress.eduadmin.se/',
  baseUrl: '/',
  cname: 'wordpress.eduadmin.se',

  // Used for publishing and more
  projectName: 'EduAdmin-WordPress',
  organizationName: 'MultinetInteractive',

  // For no header links in the top nav bar -> headerLinks: [],
  headerLinks: [
    {doc: 'getting-started', label: 'Documentation'},
    {href: 'https://api.eduadmin.se/', label: 'EduAdmin API', target: '_blank'},
    /*{page: 'help', label: 'Help'},*/
    /*{blog: true, label: 'Blog'},*/
  ],

  // If you have users set above, you add it here:
  users,

  /* path to images for header/footer */
  headerIcon: 'img/eduadmin.png',
  footerIcon: 'img/eduadmin.png',
  favicon: 'img/eduadmin.png',

  /* Colors for website */
  colors: {
    primaryColor: '#c11a2b',
    secondaryColor: '#a81a2b',
  },

  // This copyright info is used in /core/Footer.js and blog RSS/Atom feeds.
  copyright: `Copyright © ${new Date().getFullYear()} MultiNet Interactive AB`,

  highlight: {
    // Highlight.js theme to use for syntax highlighting in code blocks.
    theme: 'default',
  },

  // Add custom scripts here that would be placed in <script> tags.
  scripts: ['https://buttons.github.io/buttons.js'],

  // On page navigation for the current documentation page.
  onPageNav: 'separate',
  // No .html extensions for paths.
  cleanUrl: true,

  // Open Graph and Twitter card images.
  ogImage: 'img/eduadmin.png',
  twitterImage: 'img/eduadmin.png',

  // For sites with a sizable amount of content, set collapsible to true.
  // Expand/collapse the links and subcategories under categories.
  // docsSideNavCollapsible: true,

  // Show documentation's last contributor's name.
  enableUpdateBy: true,

  // Show documentation's last update time.
  enableUpdateTime: true,

  editUrl: 'https://github.com/MultinetInteractive/EduAdmin-WordPress/edit/master/docs/',

  // You may provide arbitrary config keys to be used as needed by your
  // template. For example, if you need your repo's URL...
  repoUrl: 'https://github.com/MultinetInteractive/EduAdmin-WordPress',
};

module.exports = siteConfig;
