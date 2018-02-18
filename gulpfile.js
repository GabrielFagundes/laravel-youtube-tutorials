var gulp = require('gulp'),
    sass = require('gulp-sass'),
    uglify = require('gulp-uglify'),
    autoprefixer = require('gulp-autoprefixer'),
    concat = require('gulp-concat'),
    prettify = require('gulp-jsbeautifier'),
    changed = require('gulp-changed'),
    rename = require('gulp-rename'),
    browserSync  = require('browser-sync'),
    reload  = browserSync.reload;

gulp.task('sass', function () {
  gulp.src('./resources/assets/scss/*.scss')
      .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
      .pipe(autoprefixer())
      .pipe(gulp.dest('./public/css'))
      .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
      .pipe(autoprefixer())
      .pipe(rename({suffix: '.min'}))
      .pipe(gulp.dest('./public/css'))
      .pipe(reload({stream:true}));
});

gulp.task('js', function() {
  gulp.src('./resources/assets/js/theme.js')
      .pipe(gulp.dest('../public/js/'))
      .pipe(concat('theme.min.js'))
      .pipe(uglify())
      .pipe(gulp.dest('./public/js/'))
      .pipe(reload({stream:true}));
});

gulp.task('sweet', function() {
  gulp.src('node_modules/sweetalert/dist/sweetalert.min.js')
      .pipe(concat('custom.js'))
      .pipe(gulp.dest('./public/js/'));
});

gulp.task('build-sass', function () {
  gulp.src('./resources/assets/scss/*.scss')
      .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
      .pipe(autoprefixer())
      .pipe(gulp.dest('../public/css'))
      .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
      .pipe(autoprefixer())
      .pipe(rename({suffix: '.min'}))
      .pipe(gulp.dest('./public/css'));
});

gulp.task('browser-sync', function() {
  browserSync.init({
    port: 80,
    notify: false,
    server: {
      baseDir: "../public/"
    }
  });
});

gulp.task('watch', function () {
  gulp.watch(['./js/*.js'], ['js']);
  gulp.watch(['./resources/assets/scss/**/*.scss'], ['sass']);
});

gulp.task('default', ['watch', 'browser-sync']);
