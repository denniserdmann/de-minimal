var gulp        = require('gulp');

var sass 		= require('gulp-sass'),
    livereload  = require('gulp-livereload'),
    lr          = require('tiny-lr'),
    server      = lr();

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
        .pipe(livereload(server));
});

gulp.task('watch', function() {
    server.listen(8000, function (err) {
        if (err) {
            return console.log(err);
        }

        gulp.watch(paths.watch.styles, ['styles']);
    });
});

gulp.task('default', ['styles', 'watch']);