module.exports = function(grunt) {
  grunt.initConfig({
    less: {
      development: {
        options: {
          compress: true,
          yuicompress: true,
          optimization: 2
        },
        files: {
          // target.css file: source.less file
          "wp-content/themes/oada/library/css/style.css": "wp-content/themes/oada/library/less/style.less"
        }
      }
    },
    watch: {
      styles: {
        files: ['"wp-content/themes/oada/library/less/*.less',"wp-content/themes/oada/library/less/**/*.less"], // which files to watch
        tasks: ['less','ftp-deploy'],
        options: {
          nospawn: true
        }
      }
    },
    'ftp-deploy': {
      build: {
        auth: {
          host: 'ftp.onlyadayaway.com',
          port: 21,
          authKey: 'key1'
        },
        src: 'wp-content/themes/oada/library/css/',
        dest: 'public_html/wp-content/themes/oada/library/css/'
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-ftp-deploy');


  grunt.registerTask('default', ['watch']);
};