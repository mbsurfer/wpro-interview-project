var gulp = require('gulp'),
    less = require('gulp-less');

gulp.task('css', function(){
   return gulp.src('./vendor/twbs/bootstrap/less/bootstrap.less')
       .pipe(less())
       .pipe(gulp.dest('./public/css/'))
});

gulp.task('js', function(){
   gulp.src('./vendor/twbs/bootstrap/dist/js/bootstrap.min.js')
       .pipe(gulp.dest('./public/js/'))
});

gulp.task('default', ['css', 'js']);