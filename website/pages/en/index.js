/**
 * Copyright (c) 2017-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */

const React = require('react');

const CompLibrary = require('../../core/CompLibrary.js');

const MarkdownBlock = CompLibrary.MarkdownBlock; /* Used to read markdown */
const Container = CompLibrary.Container;
const GridBlock = CompLibrary.GridBlock;

const translate = require('../../server/translate.js').translate;

class HomeSplash extends React.Component {
	render() {
		const {siteConfig, language = ''} = this.props;
		const {baseUrl, docsUrl} = siteConfig;
		const docsPart = `${docsUrl ? `${docsUrl}/` : ''}`;
		const langPart = `${language ? `${language}/` : ''}`;
		const docUrl = doc => `${baseUrl}${docsPart}${langPart}${doc}`;

		const SplashContainer = props => (
			<div className="homeContainer">
				<div className="homeSplashFade">
					<div className="wrapper homeWrapper">{props.children}</div>
				</div>
			</div>
		);

		const Logo = props => (
			<div className="projectLogo">
				<img src={props.img_src} alt="Project Logo" />
			</div>
		);

		const ProjectTitle = () => (
			<h2 className="projectTitle">
				{siteConfig.title}
				<small>{siteConfig.tagline}</small>
			</h2>
		);

		const PromoSection = props => (
			<div className="section promoSection">
				<div className="promoRow">
					<div className="pluginRowBlock">{props.children}</div>
				</div>
			</div>
		);

		const Button = props => (
			<div className="pluginWrapper buttonWrapper">
				<a className="button" href={props.href} target={props.target}>
					{props.children}
				</a>
			</div>
		);

		return (
			<SplashContainer>
				<Logo img_src={`${baseUrl}img/undraw_monitor.svg`} />
				<div className="inner">
					<ProjectTitle siteConfig={siteConfig} />
					<PromoSection>
						<Button href="#try">
							<translate>Try It Out</translate>
						</Button>
					</PromoSection>
				</div>
			</SplashContainer>
		);
	}
}

class Index extends React.Component {
	render() {
		const {config: siteConfig, language = ''} = this.props;
		const {baseUrl} = siteConfig;

		const Block = props => (
			<Container padding={['bottom', 'top']} id={props.id} background={props.background}>
				<GridBlock align={props.align ? props.align : "center"} contents={props.children} layout={props.layout} />
			</Container>
		);

		const Features = () => (
			<Block layout="fourColumn">
				{[
					{
						content: <translate>Easy to setup and get customers to book through your website</translate>,
						image: `${baseUrl}img/undraw_fill_forms_yltj.svg`,
						imageAlign: 'top',
						title: <translate>Ready to go forms</translate>,
					},
					{
						content: <translate>With a few shortcodes, you're ready to go</translate>,
						image: `${baseUrl}img/undraw_wordpress_utxt.svg`,
						imageAlign: 'top',
						title: <translate>Integrates easily</translate>,
					},
				]}
			</Block>
		);

		const FeatureCallout = () => (
			<div className="productShowcaseSection paddingBottom" style={{textAlign: 'center'}}>
				<h2>Feature Callout</h2>
				<MarkdownBlock>
					- Test
					- Test 2
				</MarkdownBlock>
			</div>
		);

		const WorksWith = () => (
			<Block background="light" align={"left"}>
				{[
					{
						content:
							<translate>We have developed the plugin with themes in mind, so we apply very little styling
to the elements that we use, so that it is easier to integrate in your website
with your current themes.</translate>,
						image: `${baseUrl}img/undraw_note_list.svg`,
						imageAlign: 'right',
						title: <translate>Works with (almost) every theme!</translate>,
					},
				]}
			</Block>
		);

		const EasyToStart = () => (
			<Block id="try" align={"left"}>
				{[
					{
						content:
							<translate>Get started today by downloading the [**EduAdmin WordPress Plugin**](https://wordpress.org/plugins/eduadmin-booking/)<br />
(Note: You have to be a [**EduAdmin**](https://www.eduadmin.se) customer for the plugin to work)<br /><br />
Use the built-in templates, or create a custom template for your needs!</translate>,
						image: `${baseUrl}img/undraw_code_review.svg`,
						imageAlign: 'left',
						title: <translate>Easy to get started</translate>,
					},
				]}
			</Block>
		);

		const Description = () => (
			<Block background="light" align={"left"}>
				{[
					{
						content:
							<translate>With settings to configure how the plugin behaves, you can't go wrong.
You can configure what should be visible and not, templates for lists and details,
among many other settings available in the plugin.</translate>,
						image: `${baseUrl}img/undraw_operating_system.svg`,
						imageAlign: 'right',
						title: <translate>Customize it to match your needs</translate>,
					},
				]}
			</Block>
		);

		const Showcase = () => {
			if ((siteConfig.users || []).length === 0) {
				return null;
			}

			const showcase = siteConfig.users
				.filter(user => user.pinned)
				.map(user => (
					<a href={user.infoLink} key={user.infoLink}>
						<img src={user.image} alt={user.caption} title={user.caption} />
					</a>
				));

			const pageUrl = page => baseUrl + (language ? `${language}/` : '') + page;

			return (
				<div className="productShowcaseSection paddingBottom">
					<h2><translate>Who is Using This?</translate></h2>
					<p><translate>This project is used by all these people</translate></p>
					<div className="logos">{showcase}</div>
					<div className="more-users">
						<a className="button" href={pageUrl('users.html')}>
							<translate>More {siteConfig.title} Users</translate>
						</a>
					</div>
				</div>
			);
		};

		return (
			<div>
				<HomeSplash siteConfig={siteConfig} language={language} />
				<div className="mainContainer">
					<Features />
					<WorksWith />
					<EasyToStart />
					<Description />
					<Showcase />
				</div>
			</div>
		);
	}
}

module.exports = Index;
