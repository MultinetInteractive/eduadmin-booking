#!/usr/bin/env bash

if [[ -z "$GITHUB_WORKFLOW" ]]; then
	echo "Script is only to be run by GitHub Actions" 1>&2
	exit 1
fi

if [[ -z "$WP_PASSWORD" ]]; then
	echo "WordPress.org password not set" 1>&2
	exit 1
fi

if [[ -z "$GITHUB_REF" || "$GITHUB_REF" == "refs/heads/production" ]]; then
	echo "Build branch is required and must not be production" 1>&2
	exit 0
fi

PLUGIN="eduadmin-booking"
PROJECT_ROOT=$GITHUB_WORKSPACE
VERSION="$(cat $PROJECT_ROOT/eduadmin.php | grep Version: | head -1 | cut -d: -f2 | tr -d '[[:space:]]')"

echo "Version: $VERSION of $PLUGIN"

# Remove files not needed in plugin for deployment
rm -f $PROJECT_ROOT/composer.json
rm -f $PROJECT_ROOT/commitlint.config.js
rm -f $PROJECT_ROOT/changelog-fixer.js
rm -f $PROJECT_ROOT/tsconfig.json
rm -f $PROJECT_ROOT/.scrutinizer.yml
rm -f $PROJECT_ROOT/CONTRIBUTING.md
rm -f $PROJECT_ROOT/LICENSE.md
rm -f $PROJECT_ROOT/phpunit.xml
rm -f $PROJECT_ROOT/.gitignore
rm -f $PROJECT_ROOT/Gulpfile.js
rm -f $PROJECT_ROOT/yarn.lock
rm -f $PROJECT_ROOT/package.json
rm -f $PROJECT_ROOT/readme.md
rm -fR $PROJECT_ROOT/.github
rm -fR $PROJECT_ROOT/scripts
rm -fR $PROJECT_ROOT/tests
rm -fR $PROJECT_ROOT/.git
rm -fR $PROJECT_ROOT/eduadmin-api-phpclient/.git
rm -fR $PROJECT_ROOT/eduadmin-api-phpclient/.gitignore
rm -fR $PROJECT_ROOT/eduadmin-api-phpclient/composer.yml
rm -fR $PROJECT_ROOT/eduadmin-api-phpclient/composer.json
rm -fR $PROJECT_ROOT/eduadmin-api-phpclient/phpunit.xml
rm -fR $PROJECT_ROOT/wp-tests
rm -fR $PROJECT_ROOT/vendor
rm -fR $PROJECT_ROOT/bin
rm -fR $PROJECT_ROOT/node_modules
rm -fR $PROJECT_ROOT/src
rm -fR $PROJECT_ROOT/docs
rm -fR $PROJECT_ROOT/website

# Make sure we are in the project root
cd $PROJECT_ROOT

# Go up one folder
cd ..

# Delete and recreate the deployFolder
rm -fR deployFolder
mkdir deployFolder

# Go into the deployFolder
cd deployFolder

# Clean up any previous svn dir
rm -fR svn

# Checkout the SVN repo
svn co -q "http://svn.wp-plugins.org/$PLUGIN" svn

# Copy our new version of the plugin into trunk
rsync -r -p -v --delete-before $PROJECT_ROOT/* svn/trunk

svn stat svn | grep '^?' | awk '{print $2}' | xargs -I x svn add x@
# Remove deleted files from SVN
svn stat svn | grep '^!' | awk '{print $2}' | xargs -I x svn rm --force x@
svn stat svn

# Commit to SVN
svn ci --no-auth-cache --username $WP_USERNAME --password $WP_PASSWORD svn -m "Committing changes for $VERSION"

# Remove SVN temp dir
rm -fR svn
