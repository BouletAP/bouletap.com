'use strict';

var gulp = require('gulp');
var gutil = require( 'gulp-util' );

var ftpinfo = require('./gulp-private');
var ftp = require( 'vinyl-ftp' );


const sass = require('gulp-sass')(require('sass'));


var projectdata = {
  "sync_dev" : [
    './index.php',
    './app/',
    './medias/',
    './vendor/bouletap/forms/src/'
  ],
  "scss" : ["./scss/"]
};


gulp.task('ftp-deploy-watch', function() {

  var conn = ftp.create({
    host: ftpinfo.host,
    user: ftpinfo.user,
    password: ftpinfo.password,
    parallel: 5,
    log: gutil.log
  });

  gulp.watch(projectdata.sync_dev).on('change', function(event) {
    console.log('Changes detected! Uploading file "' + event);
    return gulp.src( [event], { base: '.', buffer: false } )
      .pipe( conn.dest( ftpinfo.remoteFolder ) )
    ;
  });
});



gulp.task('sass-watch', function () {

  // watch everything but FIND A WAY to stop PUT all the files everytime a change is updated.
  // return the ONE FILE that changed and update the ROOT?

  gulp.watch([
    './app/Blog/*.scss',
    './app/Blog/sass/*.scss',
  ], function () {
    return gulp.src([
      './app/Blog/*.scss',
    ])
      .pipe(sass().on('error', sass.logError))
      .pipe(gulp.dest('./medias/css'));
  });



  // gulp.watch([
  //   './sass/**/*.scss',
  //   './app/**/*.scss',
  // ], function () {
  //   return gulp.src([
  //     './sass/**/*.scss',
  //     './app/**/*.scss',
  //   ])
  //     .pipe(sass().on('error', sass.logError))
  //     .pipe(gulp.dest('./medias/css'));
  // });
});


gulp.task('watcher', gulp.parallel ('sass-watch', 'ftp-deploy-watch'));   

