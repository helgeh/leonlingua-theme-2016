module.exports = function(grunt) {

  grunt.loadNpmTasks('grunt-ftp-push');

	var paths = {
		test: '/www/test.leonlingua/wp-content/themes/leonlingua-theme-2016/',
		prod: '/www/leonlingua/wp-content/themes/leonlingua-theme-2016/'
	};

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    remote: paths.test,
		ftp_push: {
	    deploy: {
	      options: {
					authKey: 'authKey1',
	    		host: 'ftp.domeneshop.no',
	    		dest: '<%= remote %>',
	    		port: 21
	      },
	      files: [
	        {
	          expand: true,
	          cwd: '.',
	          src: [
	            '**/*',
	            '!node_modules/**',
	            '!.git{,**/}*',
	            '!Gruntfile.js',
	            '!README.md'
	          ]
	        }
	      ]
	    }
	  }
  });

  grunt.registerTask('upload', 'Upload files to ftp server.', function(target) {
    if (target === 'prod') {
    	grunt.config.set('remote', paths.prod);
    	// grunt.task.run(['versionbump']);
    }
    grunt.task.run(['ftp_push:deploy']);
  });

  // grunt.registerTask('default', ['upload']);

};