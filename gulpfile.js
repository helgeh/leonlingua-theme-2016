
const gulp = require('gulp');
const sftp = require('gulp-sftp');
const bump = require('gulp-bump');
const argv = require('yargs').argv;

const isProduction = (argv.production !== undefined || argv.prod !== undefined) ? true : false;

const paths = {
  test: '/www/test.leonlingua/wp-content/themes/leonlingua-theme-2016/',
  prod: '/www/leonlingua/wp-content/themes/leonlingua-theme-2016/'
};

const ftpOptions = {
	host: 'sftp.domeneshop.no',
	remotePath: paths.test,
	authFile: '.ftpauth',
	auth: 'authKey1'
};

const sourceFiles = [
  '**/*',
  '!node_modules/**',
  '!.git{,**/}*',
  '!Gruntfile.js',
  '!gulpfile.js',
  '!README.md',
  '!mysql-reset-test-tables.sql'
];


gulp.task('bump', function() {
	const opt = {
  	type: (isProduction ? 'patch' : 'prerelease')
  };
  return gulp.src(['./package.json', './style.css'])
	  .pipe(bump(opt))
	  .pipe(gulp.dest('./'));
});

gulp.task('deploy', ['bump'], function () {
	if (isProduction)
		ftpOptions.remotePath = paths.prod;
	return gulp.src(sourceFiles)
		.pipe(sftp(ftpOptions));
});

gulp.task('default', function () {
	return gulp.src(sourceFiles)
		.pipe(sftp(ftpOptions));
});