/**
 * gulpfile.js
 *
 * Defined all of our gulp plugins, tasks, and functionality for use with
 * compiling our source assets.
 *
 * @version 1.0.0
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @license https://opensource.org/licenses/gpl-license.php GNU Public License
 */

const gulp = require('gulp');
const cleanCSS = require('gulp-clean-css');

// By default, gulp-load-plugins only detects dependencies prefixed with gulp-.
var plugins = require('gulp-load-plugins')({
  pattern: [
    'gulp.*',
    'gulp-*',
    'gulp-*-*',
    'autoprefixer',
    'del',
    'lost',
    'rename'
  ]
});

// Where we get our source files from that we're going to compile.
var srcPaths = {
  scss: 'src/scss/',
  js: 'src/js/',
  images: 'src/images/'
}
var srcFiles = {
  scss: [
    srcPaths.scss + '*.scss',
    srcPaths.scss + '**/*.scss'
  ],
  js: [
    srcPaths.js + '*.js',
    srcPaths.js + '**/*.js'
  ],
  images: [
    // These are the only image file extensions imagemin supports.
    srcPaths.images + '*.svg',
    srcPaths.images + '*.png',
    srcPaths.images + '*.jpg',
    srcPaths.images + '*.jpeg',
    srcPaths.images + '*.gif',
    srcPaths.images + '**/*.svg',
    srcPaths.images + '**/*.png',
    srcPaths.images + '**/*.jpg',
    srcPaths.images + '**/*.jpeg',
    srcPaths.images + '**/*.gif'
  ]
};

// Where our files are output after being compiled.
var destPaths = {
  css: 'dist/css/',
  js: 'dist/js/',
  images: 'dist/images/'
};
var outputFile = {
  uncompressed: {
    css: 'index.css',
    js: 'index.js',
  },
  compressed: {
    css: 'index.min.css',
    js: 'index.min.js',
  }
};

// Define all of the tasks.
gulp.task('clean', () => {
  return cleanTask();
});

gulp.task('sass', () => {
  return sassTask();
});

gulp.task('js', () => {
  return jsTask();
});

gulp.task('images', () => {
  return imagesTask();
});

gulp.task('watch:sass', () => {
  return watchSassTask();
});

gulp.task('watch:js', () => {
  return watchJsTask();
});

gulp.task('watch:images', () => {
  return watchImagesTask();
});

/**
 * Run a compile, watch, and default task using the parallel function so it can
 * execute all tasks simultaneously rather than one after the other as it would
 * using the series() function. This increases performance.
 */
gulp.task('compile', gulp.parallel('sass', 'js', 'images'));
gulp.task('watch', gulp.parallel('watch:sass', 'watch:js', 'watch:images'));
gulp.task('default', gulp.parallel('compile', 'watch'));

/**
 * Where all of the magic happens. This is where the functions are called so
 * that we have reusable code across the various tasks we have defined for
 * scalability.
 */
function cleanTask() {
  return plugins.del([
    destPaths.css + outputFile.css,
    destPaths.js + outputFile.js,
    destPaths.images
  ]);
}

function sassTask() {
  return gulp.src(srcFiles.scss)

    // Error handling
    .pipe(plugins.sass().on('error', plugins.sass.logError))

    // Combine all of our CSS files into one to cut down on HTTP requests.
    .pipe(plugins.concat(outputFile.uncompressed.css))

    /**
     * Especially useful for when you're extracting font sizes
     * from design files. (e.g. Photoshop, Sketch, etc.)
     */
    .pipe(plugins.pxtorem({
      propList: [
        'font-size',
        'margin',
        'padding',
        'letter-spacing'
      ],
      // Setting this to false outputs both in the order: px, rem.
      replace: true
    }))

    /**
     * Automatically add CSS browser prefixes.
     *
     * Note: Microsoft has dropped all support for anything before
     * Windows 7. We should advise anyone on Windows 7 with IE 8-10
     * to update their browser and anyone on an operating system
     * before Windows 7 to update their operating system. We should
     * also advise anyone on Windows 8 to upgrade to Windows 8.1.
     *
     * @link https://www.directionsonmicrosoft.com/roadmap/2013/09/supported-internet-explorer-versions-windows-os
     * @link https://make.wordpress.org/core/handbook/best-practices/browser-support/
     */
    .pipe(plugins.autoprefixer())

    /**
     * Add the required header comment in the style.css file for WordPress
     * from the package.json file.
     */

    //.pipe(doiuse({ browsers: ['ie >= 11', '> 1%', 'last 2 versions'], ignore: ['rem'] }))

    // Output the compiled files.
    .pipe(gulp.dest(destPaths.css))

    // Create a minified (*.min.css) verison of the file.
    .pipe(plugins.concat(outputFile.compressed.css))

    // Minify CSS.
    .pipe(cleanCSS())

    // Output the compiled files.
    .pipe(gulp.dest(destPaths.css))

  // Sync with open browser window.
  //.pipe(plugins.browserSync.stream());
}

function jsTask() {
  return gulp.src(srcFiles.js)

    // Combine all of our JS files into one to cut down on HTTP requests.
    .pipe(plugins.concat(outputFile.uncompressed.js))

    // Output the compiled files to the uncompressed file.
    .pipe(gulp.dest(destPaths.js))

    // Create a minified (*.min.js) verison of the file.
    .pipe(plugins.concat(outputFile.compressed.js))

    // Minify JS.
    .pipe(plugins.uglify())

    // Output the compiled files.
    .pipe(gulp.dest(destPaths.js))

  // Sync with open browser window.
  //.pipe(plugins.browserSync.stream());
}

function imagesTask() {
  return gulp.src(srcFiles.images)

    // Only optimize new images, not ones that have already been optimized.
    .pipe(plugins.newer(destPaths.images))

    // Minify GIF, PNG, JPEG, and SVG files.
    .pipe(plugins.imagemin([
      plugins.imagemin.svgo({
        plugins: [
          { removeUselessDefs: true },
          { cleanupIDs: false}
        ]
      }),
      plugins.imagemin.gifsicle(),
      /*plugins.imagemin.jpegtran(),*/
      plugins.imagemin.optipng()
    ]))

    // Output the compiled files.
    .pipe(gulp.dest(destPaths.images));
}

function watchSassTask() {
  return gulp.watch(srcFiles.scss, () => {
    return sassTask();
  });
}

function watchJsTask() {
  return gulp.watch(srcFiles.js, () => {
    return jsTask();
  });
}

function watchImagesTask() {
  return gulp.watch(srcFiles.images, () => {
    return imagesTask();
  });
}
