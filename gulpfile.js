var gulp = require('gulp'),
  nodemon = require('gulp-nodemon'),
  plumber = require('gulp-plumber'),
  livereload = require('gulp-livereload'),
  r = require('gulp-requirejs'),
  less = require('gulp-less'),
  uglify = require('gulp-uglify');

gulp.task('scripts', function() {
  // r({
  //     baseUrl: './scripts_src/',
  //     out: 'main.js',
  //     name: '../node_modules/almond/almond',
  //     include: 'main',
  //     wrap: true,
  //     shim: {
  //       'bigfoot': ['jquery']
  //     },
  //     paths: {
  //       'jquery': '../bower_components/jquery/dist/jquery',
  //       'bigfoot': '../bower_components/bigfoot/dist/bigfoot'
  //     }
  //   })
  // .pipe(uglify())
  // .pipe(gulp.dest('./scripts'))
  // .pipe(livereload());
  gulp.src([
    './scripts_src/*',
     './bower_components/bigfoot/dist/bigfoot.js'
    ])
  .pipe(gulp.dest('./scripts'))
  .pipe(livereload());
})

gulp.task('less', function () {
  gulp.src('./style.less')
    .pipe(plumber())
    .pipe(less())
    .pipe(gulp.dest('./'))
    .pipe(livereload());
});

gulp.task('watch', function() {
  gulp.watch('./style.less', ['less']);
  gulp.watch('./css/*', ['less']);
  gulp.watch('./scripts_src/*.js', ['scripts']);
  livereload.listen();
});

gulp.task('default', [
  'less',
  'scripts',
  'watch'
]);
