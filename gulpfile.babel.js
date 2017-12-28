import gulp from 'gulp';
import sass from 'gulp-sass';
// import babel from 'gulp-babel';
import browserify from 'browserify';
import babelify from 'babelify';
import source from 'vinyl-source-stream';
import buffer from 'vinyl-buffer';
import uglify from 'gulp-uglify';
import sourcemaps from 'gulp-sourcemaps';
import livereload from 'gulp-livereload';


const paths = {
	sassSrc: process.cwd() + '/wp-content/themes/woo-child/src/sass/*.scss',
	sassDest: process.cwd() + '/wp-content/themes/woo-child/build/css',
	jsMain: process.cwd() + '/wp-content/themes/woo-child/src/js/main.js',
	jsComponents: process.cwd() + '/wp-content/themes/woo-child/src/js/components/*.js',
	jsDest: process.cwd() + '/wp-content/themes/woo-child/build/js',
};


gulp.task('sass', () => {
	return gulp.src(paths.sassSrc)
		.pipe(sass())
		.pipe(gulp.dest(paths.sassDest));
});

gulp.task('build:js', () => {
	// return gulp.src(paths.jsSrc)
	// 	.pipe(babel(
	// 		{
	// 			presets: ['es2015', 'env']
	// 		}
	// 	))
	// 	.pipe(gulp.dest(paths.jsDest));

	return browserify({ entries: paths.jsMain, debug: true, })
		.transform('babelify', { presets: ['es2015', 'env']})
		.bundle()
		.pipe(source('main.js'))
		.pipe(buffer())
		.pipe(sourcemaps.init())
		// .pipe(uglify())
		.pipe(sourcemaps.write('./maps'))
		.pipe(gulp.dest(paths.jsDest))

});

gulp.task('default', () => {

	gulp.watch(paths.jsComponents, ['build:js']);

});

