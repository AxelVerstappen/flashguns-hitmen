'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var sassInput = 'app/stylesheets/scss/**/*.scss';
var sassOutput = 'app/stylesheets/css';

gulp.task('default', ['sass', 'sass:watch']);

gulp.task('sass', function () {
  return gulp.src(sassInput)
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest(sassOutput));
});
 
gulp.task('sass:watch', function () {
  gulp.watch(sassInput, ['sass']);
});