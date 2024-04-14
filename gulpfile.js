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

  // watch component file changed
  const sassWatcher = gulp.watch([
    './app/**/*.scss', // component main scss file
    './app/**/sass/*.scss',
  ]);
  sassWatcher.on('change', function(path, stats) {
    let componentName = path.substring(4);
    componentName = componentName.substring(0, componentName.indexOf('\\'));
    return gulp.src(['./app/'+componentName+'/*.scss'])
      .pipe(sass().on('error', sass.logError))
      .pipe(gulp.dest('./medias/css'));
  });

// watch global scss file changed
// @todo: refactor sass folder into app somehow
  gulp.watch([
    './sass/**/*.scss'
  ], function () {
    return gulp.src([
      './sass/**/*.scss'
    ])
      .pipe(sass().on('error', sass.logError))
      .pipe(gulp.dest('./medias/css'));
  });
});


gulp.task('watcher', gulp.parallel ('sass-watch', 'ftp-deploy-watch'));   

