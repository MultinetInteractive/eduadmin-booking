/**
 * Copyright (c) 2017-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */

const React = require('react');

const CompLibrary = {
    Container: props => {
	    let classesToAdd = [];

	    if(!!props.padding) {
	    	for(let padd of props.padding) {
			    switch(padd) {
				    case "top":
					    classesToAdd.push("paddingTop");
					    break;
				    case "bottom":
					    classesToAdd.push("paddingBottom")
			    }
		    }
	    }

	    if(!!props.background) {
	    	classesToAdd.push(`${props.background}Background`);
	    }

    	return <div className={"container " + classesToAdd.join(" ")} id={props.id}>
		    <div className={"wrapper"}>{props.children}</div>
	    </div>;
    },
    GridBlock: props => {
	    return <div className={"gridBlock"} {...props}>{props.contents.map((element, index) => {
	    	let ImageElement = () => {
	    		return <div className={"blockImage"}>
				    <img src={element.image} />
			    </div>;
		    };

	    	let classesToAdd = [];

	    	if(!!props.align) {
	    		switch(props.align) {
				    case "center":
				    	classesToAdd.push("alignCenter");
				    	break;
				    case "right":
				    	classesToAdd.push("alignRight");
					    break;
			    }
		    }

	    	if(!!element.imageAlign) {
	    		switch(element.imageAlign) {
				    case "top":
				    	classesToAdd.push("imageAlignTop");
				    	break;
				    case "left":
				    	classesToAdd.push("imageAlignLeft");
				    	classesToAdd.push("imageAlignSide");
				    	break;
				    case "right":
				    	classesToAdd.push("imageAlignRight");
					    classesToAdd.push("imageAlignSide");
				    	break;
			    }
		    }

		    if(!!props.layout) {
			    switch (props.layout) {
				    case "fourColumn":
					    classesToAdd.push("fourByGridBlock");
					    break;
			    }
		    } else {
		    	classesToAdd.push("twoByGridBlock");
		    }

	    	return <div className={"blockElement " + classesToAdd.join(" ")} key={index}>
			    {element.imageAlign === "top" || element.imageAlign === "left" ? <ImageElement /> : null}
			    <div className={"blockContent"}>
				    <h2><div><span><p>{element.title}</p></span></div></h2>
				    <div><span><p dangerouslySetInnerHTML={{__html: element.content}}></p></span></div>
			    </div>
			    {element.imageAlign !== "top" && element.imageAlign !== "left" ? <ImageElement /> : null}
	    	</div>
	    })}</div>;
    },
};

const Container = CompLibrary.Container;
const GridBlock = CompLibrary.GridBlock;

import Layout from "@theme/Layout";

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
							Try It Out
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
						content: 'Easy to setup and get customers to book through your website',
						image: `${baseUrl}img/undraw_fill_forms_yltj.svg`,
						imageAlign: 'top',
						title: 'Ready to go forms',
					},
					{
						content: `With a few shortcodes, you're ready to go`,
						image: `${baseUrl}img/undraw_wordpress_utxt.svg`,
						imageAlign: 'top',
						title: 'Integrates easily',
					},
				]}
			</Block>
		);

		const WorksWith = () => (
			<Block background="light" align={"left"}>
				{[
					{
						content:
							`We have developed the plugin with themes in mind, so we apply very little styling
to the elements that we use, so that it is easier to integrate in your website
with your current themes.`,
						image: `${baseUrl}img/undraw_note_list.svg`,
						imageAlign: 'right',
						title: 'Works with (almost) every theme!',
					},
				]}
			</Block>
		);

		const EasyToStart = () => (
			<Block id="try" align={"left"}>
				{[
					{
						content:
							`Get started today by downloading the <a href="https://wordpress.org/plugins/eduadmin-booking/" target="_blank"><b>EduAdmin WordPress Plugin</b></a><br />
(Note: You have to be a <a href="https://www.eduadmin.se" target="_blank"><b>EduAdmin</b></a> customer for the plugin to work)<br /><br />
Use the built-in templates, or create a custom template for your needs!`,
						image: `${baseUrl}img/undraw_code_review.svg`,
						imageAlign: 'left',
						title: 'Easy to get started',
					},
				]}
			</Block>
		);

		const Description = () => (
			<Block background="light" align={"left"}>
				{[
					{
						content:
							`With settings to configure how the plugin behaves, you can't go wrong.
You can configure what should be visible and not, templates for lists and details,
among many other settings available in the plugin.`,
						image: `${baseUrl}img/undraw_operating_system.svg`,
						imageAlign: 'right',
						title: 'Customize it to match your needs',
					},
				]}
			</Block>
		);

		return (
			<div>
				<HomeSplash siteConfig={siteConfig} language={language} />
				<div className="mainContainer">
					<Features />
					<WorksWith />
					<EasyToStart />
					<Description />
				</div>
			</div>
		);
	}
}

export default props => <Layout><Index {...props} /></Layout>;
