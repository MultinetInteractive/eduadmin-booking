const gulp = require("gulp");
const replace = require("gulp-replace");
const sass = require("gulp-sass")(require('sass'));
const pinfo = require("./package.json");
const exec = require('child_process').exec;
const changelog = require('./changelog-fixer.js');

/* Debug */
gulp.task("styles-frontend", function () {
	return gulp
		.src("src/scss/frontend/*.scss")
		.pipe(sass.sync().on("error", sass.logError))
		.pipe(gulp.dest("./content/style/compiled/frontend/"));
});

gulp.task("styles-admin", function () {
	return gulp
		.src("src/scss/admin/*.scss")
		.pipe(sass.sync().on("error", sass.logError))
		.pipe(gulp.dest("./content/style/compiled/admin/"));
});

gulp.task("readme-version", function () {
	return gulp
		.src("src/readme.*")
		.pipe(replace("$PLUGINVERSION$", pinfo.version))
		.pipe(replace("$PLUGINATLEAST$", pinfo.config.eduadmin.requiresAtLeast))
		.pipe(replace("$PLUGINTESTEDTO$", pinfo.config.eduadmin.testedUpTo))
		.pipe(replace("$CHANGELOG$", changelog()))
		.pipe(
			replace(
				"$PLUGINREQUIREDPHP$",
				pinfo.config.eduadmin.minimumPhpVersion
			)
		)
		.pipe(gulp.dest("./"));
});

gulp.task("eduadmin-version", function () {
	return gulp
		.src("src/eduadmin.php")
		.pipe(replace("$PLUGINVERSION$", pinfo.version))
		.pipe(replace("$PLUGINATLEAST$", pinfo.config.eduadmin.requiresAtLeast))
		.pipe(replace("$PLUGINTESTEDTO$", pinfo.config.eduadmin.testedUpTo))
		.pipe(
			replace(
				"$PLUGINREQUIREDPHP$",
				pinfo.config.eduadmin.minimumPhpVersion
			)
		)
		.pipe(replace("$CURRENTYEAR$", new Date().getFullYear()))
		.pipe(gulp.dest("./"));
});

gulp.task("update-checksum", function (cb) {
	let check = exec('php libraries/plugin-checksum.php', function (err, stdout, stderr) {
		stderr && console.log(stderr);
		cb(err);
	});

	check.stdout.on('data', data => {
		require('fs').writeFileSync('./PLUGIN-CHECKSUM', data);
	})
});

/* Deploy */
gulp.task("styles-frontend-nano", function () {
	return gulp
		.src("src/scss/frontend/*.scss")
		.pipe(sass.sync({outputStyle: 'compressed'}).on("error", sass.logError))
		.pipe(gulp.dest("./content/style/compiled/frontend/"));
});

gulp.task("styles-admin-nano", function () {
	return gulp
		.src("src/scss/admin/*.scss")
		.pipe(sass.sync({outputStyle: 'compressed'}).on("error", sass.logError))
		.pipe(gulp.dest("./content/style/compiled/admin/"));
});

gulp.task("default", function () {
	gulp.watch("src/scss/frontend/**/*.scss", gulp.series("styles-frontend"));
	gulp.watch("src/scss/admin/**/*.scss", gulp.series("styles-admin"));
	gulp.watch("src/eduadmin.php", gulp.series("eduadmin-version"));
	gulp.watch("src/readme.*", gulp.series("readme-version"));
	gulp.watch(
		"package.json",
		gulp.series("readme-version", "eduadmin-version")
	);
	gulp.watch("./**/*.php", gulp.series("update-checksum"));
});

gulp.task(
	"debug",
	gulp.series(
		"styles-frontend",
		"styles-admin",
		"readme-version",
		"eduadmin-version",
		"update-checksum"
	)
);
gulp.task(
	"deploy",
	gulp.series(
		"styles-frontend-nano",
		"styles-admin-nano",
		"readme-version",
		"eduadmin-version",
		"update-checksum"
	)
);
