var gulp = require('gulp');
var rupture = require('rupture');
var plumber = require('gulp-plumber');
var autoprefix = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var imagemin = require('gulp-imagemin');
var rename = require('gulp-rename');
var stylus = require('gulp-stylus');
var uglify = require('gulp-uglify');
var jeet = require('jeet');

var paths = {
    copyVendor: {
        src: 'wp_project/wp-content/themes/projetoteste/_assets/vendor/**/*',
        dest: 'wp_project/wp-content/themes/projetoteste/assets/vendor/'
    },
    style: {
        src: 'wp_project/wp-content/themes/projetoteste/_assets/stylus/main.styl',
        dest: 'wp_project/wp-content/themes/projetoteste/assets/css/'
    },
    script: {
        src: 'wp_project/wp-content/themes/projetoteste/_assets/js/**/*.js',
        dest: 'wp_project/wp-content/themes/projetoteste/assets/js/'
    },
    image: {
        src: 'wp_project/wp-content/themes/projetoteste/_assets/image/**/*',
        dest: 'wp_project/wp-content/themes/projetoteste/assets/image/'
    }
};

function copyVendor() {
    return gulp.src(paths.copyVendor.src)
        .pipe(plumber())
        .pipe(gulp.dest(paths.copyVendor.dest));
}


function style() {
    return gulp.src(paths.style.src)
        .pipe(plumber())
        .pipe(stylus({
            use: jeet(),
            use: rupture(),
            compress: true
        }))
        .pipe(autoprefix('last 2 versions'))
        .pipe(rename('main.min.css'))
        .pipe(gulp.dest(paths.style.dest));
}

function script() {
    return gulp.src(paths.script.src, { sourcemaps: false })
        .pipe(plumber())
        .pipe(concat('main.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(paths.script.dest));
}

function image() {
    return gulp.src(paths.image.src, { sourcemaps: false })
        .pipe(plumber())
        .pipe(
            imagemin([
                imagemin.gifsicle({ interlaced: true }),
                imagemin.jpegtran({ progressive: true }),
                imagemin.optipng({ optimizationLevel: 5 }),
                imagemin.svgo({
                    plugins: [
                        {
                            removeViewBox: false,
                            collapseGroups: true
                        }
                    ]
                })
            ])
        )
        .pipe(gulp.dest(paths.image.dest));
}

function watch() {
    gulp.watch('wp_project/wp-content/themes/projetoteste/_assets/js/**/*', script);
    gulp.watch('wp_project/wp-content/themes/projetoteste/_assets/stylus/**/*', style);
    gulp.watch(paths.image.src, image);
}

var build = gulp.series(gulp.parallel(copyVendor, style, script), image, watch);

exports.copyVendor = copyVendor;
exports.style = style;
exports.script = script;
exports.image = image;
exports.watch = watch;
exports.build = build;
exports.default = build;