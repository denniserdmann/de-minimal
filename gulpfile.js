var gulp        = require('gulp');

var sass 		= require('gulp-sass'),
    livereload  = require('gulp-livereload')


var paths = {
    master: {
        styles: 'scss/style.scss',
    },
    watch: {
        styles: 'scss/**/*.scss',
    },
    dist: {
        styles: '',
    }
};

gulp.task('styles', function () {
    gulp.src(paths.master.styles)
        .pipe(sass())
        .pipe(gulp.dest(paths.dist.styles))
        .pipe(livereload());
});

gulp.task('watch', function() {
    livereload.listen();
    gulp.watch(paths.watch.styles, ['styles']);
});

gulp.task('default', ['styles', 'watch']);