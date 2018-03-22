// mains
let gulp = require( 'gulp' );
let pump = require( 'pump' );
let sass = require( 'gulp-sass' );
let mini = require( 'gulp-clean-css' );
let brow = require('browser-sync').create();
let conc = require( 'gulp-concat' );
let babel = require( 'gulp-babel' );
let ugly = require( 'gulp-uglify' );

// tasks
// makes all cssfiles go into main.css
gulp.task( 'css-sass', () => {
	return gulp.src( 'resources/main.scss' )
		.pipe( sass().on( 'error', sass.logError ))
		.pipe( gulp.dest( 'public/css' ))
});

// compresses the main.css after doing css-sass
gulp.task( 'css-minify', ['css-sass'], () => {
	return gulp.src( 'public/css/main.css' )
		.pipe( mini({ compatibility: 'ie8' }))
		.pipe( gulp.dest( 'public/css/' ));
});

// makes all jsfiles go into main.js
gulp.task('js-concat', () => {
	return gulp.src('resources/js/*.js')
		.pipe(conc('main.js'))
		.pipe(gulp.dest('public/js/'));
});

// makes the main.js compressable after doing js-concat
gulp.task('js-babel', ['js-concat'], () => {
	return gulp.src('public/js/*.js')
		.pipe(babel({"presets": ["@babel/env"]}))
		.pipe(gulp.dest('public/js/'));
});

// compresses the main.js after doing js-babel
gulp.task('js-uglify', ['js-babel'], () => {
	pump([gulp.src('public/js/main.js'), ugly(),
		gulp.dest('public/js')]
	)});

// starts browsersync
gulp.task('serve', function() {

	brow.init({
		proxy: {
			target: "localhost/competa/public",
		}
	});

	gulp.watch(['resources/js/*'], ['js-uglify', brow.reload]);
	gulp.watch(['resources/scss/*', 'resources/main.scss'], ['css-minify', brow.reload]);
	gulp.watch(['public/index.php', 'public/views/**/*'], [brow.reload]);
});

// main task that runs the scripts and serve.
gulp.task('default', ['css-minify', 'js-uglify', 'serve']);

