module.exports = function() {
	const fs = require('fs');
	const md = fs.readFileSync('CHANGELOG.md', 'utf8');

	let versions = md.match(/#{2,3} \[([0-9.]+)\]/g).slice(0, 5);

	let _VersionTree = {};

	let lastVersion = undefined;

	for (let version of versions) {
		if (!!lastVersion) {
			_VersionTree[lastVersion].endOfVersion = md.indexOf(version);
		}

		let fixedVersion = version.replace(/#/g, '').trim();

		_VersionTree[fixedVersion] = {
			version: fixedVersion,
			startOfVersion: md.indexOf(fixedVersion),
			endOfVersion: !!lastVersion ? md.indexOf(lastVersion) : -1
		};

		lastVersion = fixedVersion;
	}

	delete _VersionTree[lastVersion];

	let outputChangelog = '';

	for (let version in _VersionTree) {

		let _md = md.substring(_VersionTree[version].startOfVersion, _VersionTree[version].endOfVersion).replace(/### /g, '#### ').trim();

		_VersionTree[version] = {
			..._VersionTree[version],
			MarkdownContent: _md
		};

		outputChangelog += '### ' + _md + '\n\n';
	}

	return outputChangelog;
};
