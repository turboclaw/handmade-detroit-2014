var gulp = require("gulp");
var minifyCSS = require("gulp-minify-css");

gulp.task("minify-css", function() {
  gulp.src("styles-import.css")
    .pipe(minifyCSS({}))
    .pipe(gulp.dest("styles.css"))
});

gulp.task("default", ["minify-css"]);