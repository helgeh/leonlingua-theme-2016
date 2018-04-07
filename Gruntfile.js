module.exports = function(grunt) {

  grunt.loadNpmTasks('grunt-bump');
  grunt.loadNpmTasks('grunt-ftp-push');

  var paths = {
    test: '/www/test.leonlingua/wp-content/themes/leonlingua-theme-2016/',
    prod: '/www/leonlingua/wp-content/themes/leonlingua-theme-2016/'
  };

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    serverpath: paths.test,
    bump: {
      options: {
        files: ['package.json', 'style.css'],
        updateConfigs: ['pkg'],
        commitMessage: 'bump to version %VERSION%',
        commitFiles: ['package.json', 'style.css'],
        tagName: '%VERSION%',
        push: false,//'origin'
        incrementalUpdates: false
      }
    },
    ftp_push: {
      deploy: {
        options: {
          authKey: 'authKey1',
          host: 'ftp.domeneshop.no',
          dest: '<%= serverpath %>',
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
      grunt.config.set('serverpath', paths.prod);
    }
    grunt.task.run(['ftp_push:deploy']);
  });

  grunt.registerTask('release', ['bump', 'upload', 'upload:prod']);
  grunt.registerTask('stage', ['bump:prerelease', 'upload']);
  grunt.registerTask('default', ['upload']);

};