'use strict';

module.exports = function (grunt) {

    require('load-grunt-tasks')(grunt);
    require('time-grunt')(grunt);

    grunt.initConfig({
      app: 'wp-content/themes/vtstheme',
      vendor: 'wp-content/themes/vtstheme/assets/vendor',

      // CSS | Process SCSS files
      sass: {
          options: {
              sourceMap: false,
              outputStyle: 'expanded',
              includePaths: ['<%= vendor %>/foundation/scss',
                             '<%= vendor %>/sass-burger'
              ]
          },
          dist: {
            files: [{
              expand: true,
              cwd: '<%= app %>/assets/scss/',
              src: ['{,*/}*.scss'],
              dest: '<%= app %>/',
              ext: '.css'
            }]
          }
      },

      // Add vendor prefixes
      postcss: {
        options: {
          processors: [
            require('autoprefixer-core')({browsers: ['last 2 versions']})
          ]
        },
        dist: {
          files: [{
              expand: true,
              cwd: '<%= app %>/',
              src: '{,*/}*.css',
              dest: '<%= app %>/'
          }]
        }
      },

      // Minify CSS
      cssmin: {
        target: {
          files: {
            '<%= app %>/style.css': '<%= app %>/style.css'
          }
        }
      },

      // JS | Concat js files
      concat: {
        dist: {
          src: ['<%= vendor %>/jquery/dist/jquery.js',
                '<%= vendor %>/fastclick/lib/fastclick.js',
                '<%= vendor %>/foundation/js/foundation.js',
                '<%= app %>/assets/js/app.js'
               ],
          dest: '<%= app %>/script.js',
        },
      },

      // Check js files for errors
      jshint: {
          options: {
            jshintrc: '.jshintrc'
          },
          grunt: [
            'Gruntfile.js',
          ],
          scripts: [
            '<%= app %>/assets/js/app.js'
          ]
      },

      // Minify js files
      uglify: {
        options: {
          preserveComments: false,
          mangle: true
        },
        dist: {
          files: {
            '<%= app %>/script.js': ['<%= app %>/script.js']
          }
        }
      },

      // Watch files for changes
      watch: {
        options: {
          livereload: 35729
        },
        sass: {
          files: '<%= app %>/assets/scss/**/*.scss',
          tasks: ['sass', 'postcss']
        },
        php: {
          files: ['<%= app %>/**/*.php']
        },
        gruntfile: {
          files: 'Gruntfile.js',
          tasks: ['jshint:grunt']
        },
        scripts: {
          files: '<%= app %>/assets/js/app.js',
          tasks: ['jshint:scripts', 'concat']
        }
      },

      rsync: {
        options: {
          args: ['--verbose'],
          exclude: [],
          recursive: true,
          ssh: true
        },
        prod: {
          options: {
            src: '<%= app %>',
            dest: 'blog.vts.com/wp-content/themes',
            host: 'wp_firrt6@blog.vts.com',
            delete: true // Careful this option could cause data loss, read the docs!
          }
        }
      }

    });

    // Development
    grunt.registerTask('serve', [
        'jshint',
        'sass',
        'postcss',
        'concat',
        'watch'
    ]);

    // Build
    grunt.registerTask('build', [
        'jshint',
        'sass',
        'postcss',
        'cssmin',
        'concat',
        'uglify'
    ]);

    // Default
    grunt.registerTask('default', [
        'build',
    ]);

    grunt.registerTask('deploy', [
        'build',
        'rsync:prod'
    ]);

};
