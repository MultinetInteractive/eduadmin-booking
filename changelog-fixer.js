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

		_VersionTree[version] = {
			version: version,
			startOfVersion: md.indexOf(version),
			endOfVersion: !!lastVersion ? md.indexOf(lastVersion) : -1
		};

		lastVersion = version;
	}

	delete _VersionTree[lastVersion];

	let outputChangelog = '';

	for (let version in _VersionTree) {

		let _md = md.substring(_VersionTree[version].startOfVersion, _VersionTree[version].endOfVersion).trim();

		_VersionTree[version] = {
			..._VersionTree[version],
			MarkdownContent: _md
		};

		outputChangelog += _md + '\n\n';
	}

	return outputChangelog;
};
