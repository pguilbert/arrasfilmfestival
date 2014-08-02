var gulp 		= require('gulp');
var uglify 		= require('gulp-uglify');
var concat 		= require('gulp-concat');
var minifyCss 	= require('gulp-minify-css');
var concatCss 	= require('gulp-concat-css');

gulp.task('uglify', function() {
	gulp.src([
			'wp-content/themes/arrasfilmfestival2014/css/normalize.css', 
			'wp-content/themes/arrasfilmfestival2014/css/webflow.css',
			'wp-content/themes/arrasfilmfestival2014/css/main.css',
			'wp-content/themes/arrasfilmfestival2014/css/fancybox.css'
		])
        .pipe(concatCss('app.css'))
        .pipe(minifyCss({keepSpecialComments:0}))
        .pipe(gulp.dest('wp-content/themes/arrasfilmfestival2014/publics/css/'));

    gulp.src([
    		'wp-content/themes/arrasfilmfestival2014/js/modernizr.js',
    		'wp-content/themes/arrasfilmfestival2014/js/jquery.js',
    		'wp-content/themes/arrasfilmfestival2014/js/webflow.js',
    		'wp-content/themes/arrasfilmfestival2014/js/masonry.js',
    		'wp-content/themes/arrasfilmfestival2014/js/fancybox.js'
    	])
	    .pipe(uglify())
	    .pipe(concat('app.js'))
	    .pipe(gulp.dest('wp-content/themes/arrasfilmfestival2014/publics/js/'));

	gulp.src('wp-content/themes/arrasfilmfestival2014/js/settings.js')
	    .pipe(uglify())
	    .pipe(concat('settings.js'))
	    .pipe(gulp.dest('wp-content/themes/arrasfilmfestival2014/publics/js/'));
});