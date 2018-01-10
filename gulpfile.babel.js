import gulp from 'gulp';
import sass from 'gulp-sass';
import babel from 'gulp-babel';
import autoprefixer from 'gulp-autoprefixer';

console.log(process.cwd());


const paths = {
	sassSrc: process.cwd() + '/wp-content/themes/woo-child/src/sass/*.scss',
	sassDest: process.cwd() + '/wp-content/themes/woo-child/build/css',
	jsSrc: process.cwd() + '/wp-content/themes/woo-child/src/js/*.js',
	jsDest: process.cwd() + '/wp-content/themes/woo-child/build/js',
};


gulp.task('sass', () => {
	return gulp.src(paths.sassSrc)
		.pipe(sass())
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(gulp.dest(paths.sassDest));
});

gulp.task('js', () => {
	return gulp.src(paths.jsSrc)
		.pipe(babel(
			{
				presets: ['es2015']
			}
		))
		.pipe(gulp.dest(paths.jsDest));
});


gulp.task('default', () => {

	gulp.watch(paths.sassSrc, ['sass']);
});

