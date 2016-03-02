/*-------------------------------------------------------------------
    Required plugins
-------------------------------------------------------------------*/
var gulp = require('gulp'),
    plumber = require('gulp-plumber'),
    notify = require('gulp-notify'),
    rename = require('gulp-rename'),
    compass = require('gulp-compass'),
    uglify = require('gulp-uglify'),
    htmlmin = require('gulp-htmlmin');

/*-------------------------------------------------------------------
    Configuration
-------------------------------------------------------------------*/
path = {
    styles: "source/scss",
    scripts: "source/js",
    templates: "source/templates"
}

/*-------------------------------------------------------------------
    Tasks
-------------------------------------------------------------------*/
// Compile sass into CSS
gulp.task('style', function() {
    gulp_theme(path.scripts, 'src', 'scss')
    .pipe(compass({
        config_file: './config.rb',
        css: 'css',
        sass: path.styles
    }));
});

// Concatenate & Minify JS
gulp.task('script', function() {
    gulp_theme(path.scripts, 'dev', 'js')
    .pipe(gulp.dest('js'))
    .pipe(notify({ message: 'Compiled <%= file.relative %> script.' }));

    gulp_theme(path.scripts, 'src', 'js')
    .pipe(uglify())
    .pipe(gulp.dest('js'))
    .pipe(notify({ message: 'Compiled <%= file.relative %> script.' }));
});

gulp.task('template', function() {
    // Copy SS files and leave them in there original stat
    gulp_theme(path.templates, 'dev', 'ss')
    .pipe(gulp.dest('templates'));

    // Minify SS files
    gulp_theme(path.templates, 'src', 'ss')
    .pipe(htmlmin({
        collapseWhitespace: true,
        collapseInlineTagWhitespace: true,
        minifyJS: true,
        minifyCSS: true,
        removeComments: true
    }))
    .pipe(gulp.dest('templates'));
});

// Watch
gulp.task('watch', function() {
    // Watch .scss files
    gulp.watch(path.styles+'/**/*.scss', ['style']);

    // Watch .js files
    gulp.watch(path.scripts+'/**/*.js', ['script']);

    // Watch .sss files
    gulp.watch(path.templates+'/**/*.ss', ['template']);
});

gulp.task('default', ['style', 'script', 'template', 'watch']);

function gulp_theme(path, type, extension){
    return gulp.src('./'+path+'/**/*.'+type+'.'+extension)
    .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
    .pipe(rename(function(path) {
        path.basename = path.basename.replace('.'+type, '')
    }));
}
