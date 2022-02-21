#!/usr/bin/env bash

if [[ -z "$GITHUB_WORKFLOW" ]]; then
	echo "Script is only to be run by Travis CI" 1>&2
	exit 1
fi

if [[ -z "$WP_PASSWORD" ]]; then
	echo "WordPress.org password not set" 1>&2
	exit 1
fi

if [[ -z "$GITHUB_REF" || "$GITHUB_REF" != "refs/heads/production" ]]; then
	echo "Build branch is required and must be a release-tag" 1>&2
	exit 0
fi


PLUGIN="eduadmin-booking"
PROJECT_ROOT=$GITHUB_WORKSPACE
VERSION="$(cat $PROJECT_ROOT/eduadmin.php | grep Version: | head -1 | cut -d: -f2 | tr -d '[[:space:]]')"

echo "Version: $VERSION of $PLUGIN"

# Check if the tag exists for the version we are building
TAG=$(svn ls "https://plugins.svn.wordpress.org/$PLUGIN/tags/$VERSION")
error=$?
if [ $error == 0 ]; then
    # Tag exists, don't deploy
    echo "Tag already exists for version $VERSION, aborting deployment"
    exit 1
fi

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
rm -f $PROJECT_ROOT/.gitmodules
rm -f $PROJECT_ROOT/.gitattributes
rm -f $PROJECT_ROOT/.nvmrc
rm -f $PROJECT_ROOT/Gulpfile.js
rm -f $PROJECT_ROOT/yarn.lock
rm -f $PROJECT_ROOT/package.json
rm -f $PROJECT_ROOT/readme.md
rm -f $PROJECT_ROOT/.versionrc
rm -f $PROJECT_ROOT/.editorconfig
rm -fR $PROJECT_ROOT/.github
rm -fR $PROJECT_ROOT/scripts
rm -fR $PROJECT_ROOT/tests
rm -fR $PROJECT_ROOT/.git
rm -fR $PROJECT_ROOT/.idea
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
rm -fR $PROJECT_ROOT/new_website

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

# Add new version tag
mkdir svn/tags/$VERSION
rsync -r -p -v --delete-before $PROJECT_ROOT/* svn/tags/$VERSION

# Add new files to SVN
svn stat svn | grep '^?' | awk '{print $2}' | xargs -I x svn add x@
# Remove deleted files from SVN
svn stat svn | grep '^!' | awk '{print $2}' | xargs -I x svn rm --force x@
svn stat svn

# Commit to SVN
svn ci --no-auth-cache --username $WP_USERNAME --password $WP_PASSWORD svn -m "Deploy version $VERSION"

# Remove SVN temp dir
rm -fR svn

curl -X POST \
-H 'Content-type: application/json' \
--data '{"username": "GitHub Actions", "channel":"#wordpress-eduadmin", "icon_url": "https://slack-files2.s3-us-west-2.amazonaws.com/avatars/2017-12-19/288981919427_f45f04edd92902a96859_512.png","text": "EduAdmin Booking plugin version '"$VERSION"' deployed to <https://sv.wordpress.org/plugins/eduadmin-booking/|wp.org> :tada:"}' \
$SLACK_HOOKURL
