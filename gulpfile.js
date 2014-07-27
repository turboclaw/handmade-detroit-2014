var gulp = require("gulp");

var cssmin = require("gulp-cssmin");
var concat = require("gulp-concat");
var rename = require("gulp-rename");

gulp.task("smooshstyles", function () {
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
		"./css/m.footer.css"
	])
	.pipe(concat("2014.css"))
	.pipe(cssmin())
	.pipe(gulp.dest("./css"));
});

gulp.task("default", ["smooshstyles"]);