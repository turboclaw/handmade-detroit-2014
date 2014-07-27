var gulp = require("gulp");

var cssmin = require("gulp-cssmin");
var concat = require("gulp-concat");
var rename = require("gulp-rename");

var paths = {
  styles: ["./css/**/*.css"]
};

gulp.task("concatstyles", function () {
    gulp.src([
		"./bower_components/normalize-css/normalize.css",
		"./css/fonts.css",
		"./css/base.css",
		"./css/ducf/base.css",
		"./css/util.css",
		"./css/icons.css",
		"./css/layout.css",
		"./css/m.forms.css",
		"./css/m.article.css",
		"./css/m.comment.css",
		"./css/m.panel.css",
		"./css/m.calendar.css",
		"./css/m.masthead.css",
		"./css/m.footer.css",

		"./css/ducf/m.forms.css",
		"./css/ducf/m.article.css",
		"./css/ducf/m.panel.css",
		"./css/ducf/m.masthead.css"
	])
	.pipe(concat("2014.css"))
	.pipe(cssmin())
	.pipe(gulp.dest("./css"));
});

gulp.task("watch", function() {
  gulp.watch(paths.styles, ["concatstyles"]);
});

gulp.task("default", ["watch", "concatstyles"]);