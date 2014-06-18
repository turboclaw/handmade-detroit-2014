var gulp = require("gulp");

var minifyCSS = require("gulp-minify-css");

gulp.task("minify-css", function() {

    gulp.src("css/2014-src.css")
        .pipe(minifyCSS({}))
        .pipe(gulp.dest("css/2014.css"));

});

gulp.task("default", ["minify-css"]);