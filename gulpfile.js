/**
 * gulpfile.js
 *
 * Defined all of our gulp plugins, tasks, and functionality for use with
 * compiling our source assets.
 *
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @license MIT
 */

'use strict';

const gulp = require( 'gulp' );

// By default, gulp-load-plugins only detects dependencies prefixed with gulp-.
const plugins = require( 'gulp-load-plugins' )( {
	pattern: [
		'gulp.*',
		'gulp-*',
		'gulp-*-*',
		'autoprefixer',
		'del',
		'lost',
		'rename',
	],
} );

// Where we get our source files from that we're going to compile.
const srcPaths = {
	scss: 'assets/src/scss/',
	js: 'assets/src/js/',
	images: 'assets/src/images/',
};

const srcFiles = {
	scss: [ srcPaths.scss + '*.scss', srcPaths.scss + '**/*.scss' ],
	js: [ srcPaths.js + '*.js', srcPaths.js + '**/*.js' ],
	images: [
		// These are the only image file extensions imagemin supports.
		srcPaths.images + '*.png',
		srcPaths.images + '*.jpg',
		srcPaths.images + '*.jpeg',
		srcPaths.images + '*.gif',
		srcPaths.images + '**/*.png',
		srcPaths.images + '**/*.jpg',
		srcPaths.images + '**/*.jpeg',
		srcPaths.images + '**/*.gif',
	],
};

// Where our files are output after being compiled.
const destPaths = {
	css: 'assets/dist/css/',
	js: 'assets/dist/js/',
	images: 'assets/dist/images/',
};

const outputFile = {
	uncompressed: {
		css: 'index.css',
		js: 'index.js',
	},
	compressed: {
		css: 'index.min.css',
		js: 'index.min.js',
	},
};

// Define all of the tasks.
gulp.task( 'clean', () => {
	return cleanTask();
} );

gulp.task( 'compile:css', () => {
	return cssTask();
} );

gulp.task( 'compile:js', () => {
	return jsTask();
} );

gulp.task( 'compile:images', () => {
	return imagesTask();
} );

gulp.task( 'watch:css', () => {
	return watchCssTask();
} );

gulp.task( 'watch:js', () => {
	return watchJsTask();
} );

gulp.task( 'watch:images', () => {
	return watchImagesTask();
} );

gulp.task( 'lint:css', () => {
	return lintCssTask();
} );

gulp.task( 'lint:js', () => {
	return lintJsTask();
} );

/**
 * Run a compile, watch, and default task using the parallel function so it can
 * execute all tasks simultaneously rather than one after the other as it would
 * using the series() function. This increases performance.
 */
gulp.task(
	'compile',
	gulp.parallel( 'compile:css', 'compile:js', 'compile:images' )
);
gulp.task( 'watch', gulp.parallel( 'watch:css', 'watch:js', 'watch:images' ) );
gulp.task( 'lint', gulp.parallel( 'lint:css', 'lint:js' ) );
gulp.task( 'default', gulp.parallel( 'compile', 'watch' ) );

/**
 * Everything moving forward in this file is where all of the magic happens.
 * This is where the functions are called so that we have reusable code across
 * the various tasks we have defined for scalability.
 */
function cleanTask() {
	return plugins.del( [
		destPaths.css + outputFile.css,
		destPaths.js + outputFile.js,
		destPaths.images,
	] );
}

function cssTask() {
	return gulp
		.src( srcFiles.scss )
		.pipe( plugins.sourcemaps.init() )
		.pipe(
			// Error handling
			plugins.sass().on( 'error', plugins.sass.logError )
		)
		.pipe(
			// Combine all of our CSS files into one to cut down on HTTP requests.
			plugins.concat( outputFile.uncompressed.css )
		)
		.pipe(
			/**
			 * Especially useful for when you're extracting font sizes
			 * from design files. (e.g. Photoshop, Sketch, etc.)
			 */
			plugins.pxtorem( {
				propList: [
					'font-size',
					'margin',
					'padding',
					'letter-spacing',
				],
				// Setting this to false outputs both in the order: px, rem.
				replace: true,
			} )
		)
		.pipe(
			/**
			 * Automatically add CSS browser prefixes.
			 *
			 * Note: Microsoft has dropped all support for anything before
			 * Windows 7. We should advise anyone on Windows 7 with IE 8-10
			 * to update their browser and anyone on an operating system
			 * before Windows 7 to update their operating system. We should
			 * also advise anyone on Windows 8 to upgrade to Windows 8.1.
			 *
			 * @see https://www.directionsonmicrosoft.com/roadmap/2013/09/supported-internet-explorer-versions-windows-os
			 * @see https://make.wordpress.org/core/handbook/best-practices/browser-support/
			 */
			plugins.autoprefixer()
		)
		.pipe( plugins.sourcemaps.write() )
		.pipe(
			// Output the compiled files.
			gulp.dest( destPaths.css )
		)
		.pipe(
			// Create a minified (*.min.css) verison of the file.
			plugins.concat( outputFile.compressed.css )
		)
		.pipe(
			// Minify CSS.
			plugins.cleanCss()
		)
		.pipe(
			// Output the compiled files.
			gulp.dest( destPaths.css )
		);
}

function jsTask() {
	return gulp
		.src( srcFiles.js )
		.pipe(
			// Combine all of our JS files into one to cut down on HTTP requests.
			plugins.concat( outputFile.uncompressed.js )
		)
		.pipe(
			// Output the compiled files to the uncompressed file.
			gulp.dest( destPaths.js )
		)
		.pipe(
			// Create minified (*.min.js) version.
			plugins.concat( outputFile.compressed.js )
		)
		.pipe(
			// Minify JS.
			plugins.terser()
		)
		.pipe(
			// Output the compiled files.
			gulp.dest( destPaths.js )
		);
}

function imagesTask() {
	return gulp
		.src( srcFiles.images )
		.pipe(
			// Only optimize new images.
			plugins.newer( destPaths.images )
		)
		.pipe(
			// Minify SVG, PNG, and JPEG images.
			plugins.imagemin( [
				plugins.imagemin.svgo( { plugins: [ { cleanupIDs: false } ] } ),
				plugins.imagemin.optipng( { optimizationLevel: 7 } ),
				plugins.imagemin.mozjpeg( { quality: 90, progressive: true } ),
			] )
		)
		.pipe(
			// Output the compiled files.
			gulp.dest( destPaths.images )
		);
}

function lintCssTask() {
	return gulp.src( srcFiles.scss ).pipe(
		// Lint the SCSS.
		plugins.stylelint( {
			reporters: [
				{
					formatter: 'string',
					console: true,
				},
			],
		} )
	);
}

function lintJsTask() {
	srcFiles.js.push( 'gulpfile.js' );

	return gulp
		.src( srcFiles.js )
		.pipe( plugins.eslint() )
		.pipe( plugins.eslint.format() )
		.pipe( plugins.eslint.failAfterError() );
}

function watchCssTask() {
	return gulp.watch( srcFiles.scss, () => {
		return cssTask();
	} );
}

function watchJsTask() {
	return gulp.watch( srcFiles.js, () => {
		return jsTask();
	} );
}

function watchImagesTask() {
	return gulp.watch( srcFiles.images, () => {
		return imagesTask();
	} );
}
