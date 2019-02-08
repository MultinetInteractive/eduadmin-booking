const gulp = require("gulp");
const sass = require("gulp-sass");
const myth = require("gulp-myth");
const nano = require("gulp-cssnano");

gulp.task("styles-frontend", function() {
	return (
		gulp
			.src("src/scss/frontend/*.scss")
			.pipe(sass().on("error", sass.logError))
			//.pipe(nano())
			.pipe(myth())
			.pipe(gulp.dest("./content/style/compiled/frontend/"))
	);
});

gulp.task("styles-admin", function() {
	return (
		gulp
			.src("src/scss/admin/*.scss")
			.pipe(sass().on("error", sass.logError))
			//.pipe(nano())
			.pipe(myth())
			.pipe(gulp.dest("./content/style/compiled/admin/"))
	);
});

gulp.task("default", function() {
	gulp.watch("src/scss/frontend/**/*.scss", gulp.series("styles-frontend"));
	gulp.watch("src/scss/admin/**/*.scss", gulp.series("styles-admin"));
});
