module.exports = {
	"title": "EduAdmin plugin",
	"tagline": "EduAdmin integration for WordPress",
	"url": "https://wordpress.eduadmin.se/",
	"baseUrl": "/",
	"organizationName": "MultinetInteractive",
	"projectName": "EduAdmin-WordPress",
	"scripts": [
		"https://buttons.github.io/buttons.js"
	],
	"favicon": "img/eduadmin.png",
	"customFields": {
		"users": [],
		"repoUrl": "https://github.com/MultinetInteractive/EduAdmin-WordPress"
	},
	"trailingSlash": true,
	"onBrokenLinks": "log",
	"onBrokenMarkdownLinks": "log",
	"presets": [
		[
			"@docusaurus/preset-classic",
			{
				"docs": {
					"showLastUpdateAuthor": true,
					"showLastUpdateTime": true,
					"editUrl": "https://github.com/MultinetInteractive/EduAdmin-WordPress/edit/master/new_website/",
					"path": "./docs",
					"sidebarPath": "./sidebars.json"
				},
				"blog": {
					"blogTitle": "EduAdmin WordPress-plugin blog",
					"blogDescription": "News/Information about things about the EduAdmin WordPress-plugin",
					"path": "blog",
					"feedOptions": {
						"type": 'all',
						"copyright": `Copyright © ${new Date().getFullYear()} MultiNet Interactive AB`,
						"language": "en"
					}
				},
				"theme": {
					"customCss": "./src/css/customTheme.css"
				}
			}
		]
	],
	"plugins": [],
	"themeConfig": {
		"navbar": {
			"title": "EduAdmin plugin",
			"logo": {
				"src": "img/eduadmin.png"
			},
			"items": [
				{
					"to": "docs/",
					"label": "Documentation",
					"position": "right"
				},
				{
					"to": "blog/",
					"label": "Blog",
					"position": "right"
				},
				{
					"href": "https://github.com/MultinetInteractive/EduAdmin-WordPress/blob/production/CHANGELOG.md",
					"label": "Changelog",
					"position": "right"
				},
				{
					"href": "https://api.eduadmin.se/",
					"label": "EduAdmin API",
					"position": "right"
				}
			]
		},
		"image": "img/eduadmin.png",
		"footer": {
			"links": [
				{
					title: 'Docs',
					items: [
						{label: 'Getting Started', to: 'docs/'},
						{label: 'API Reference', href: 'https://api.eduadmin.se'},
						{label: 'Troubleshooting', to: 'docs/troubleshooting'},
						{label: 'Blog', to: 'blog/'}
					]
				}
			],
			"copyright": `Copyright © ${new Date().getFullYear()} MultiNet Interactive AB`,
			"logo": {
				"src": "img/eduadmin.png"
			}
		}
	}
}
