module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        uglify: {
            bootstrap: {
                options: {
                    preserveComments: 'some',
                    mangle: true
                },
                files: {
                    'js/bootstrap.min.js': ['js/dev/bootstrap/*.js']
                }
            }
        },

        less: {
            child_theme: {
                options: {
                    paths: ["css/less"],
                    yuicompress: true
                },
                files: {
                    "style.css": "css/less/style.less"
                }
            },
            bootstrap: {
                options: {
                    paths: ["css/less"],
                    yuicompress: true
                },
                files: {
                    "css/bootstrap.css": "css/less/bootstrap/bootstrap.less"
                }
            }
        },

        bower: {
            install: {
                options: {
                    targetDir: 'components',
                    layout: 'byType',
                    install: true,
                    verbose: false,
                    cleanTargetDir: false,
                    cleanBowerDir: true
                }
            }
        },

        compress: {
            standard_bootstrap_3: {
                options: {
                    archive: '../standard-bootstrap-3.zip',
                    level: 9
                },
                files: [
                    {
                        src: [
                            '**',
                            '!**/css/less/**',
                            '!**/css/grunticon/*.less',
                            '!**/css/grunticon/grunticon.loader.txt',
                            '!**/css/grunticon/preview.html',
                            '!lib/*/css/less/*',
                            '!Gruntfile.js',
                            '!codekit-config.json',
                            '!package.json',
                            '!bower.json',
                            '!*.md',
                            '!**js/dev/**',
                            '!**/node_modules/**',
                            '!**/font/**',
                            '!**/svgs/**'
                        ],
                        dest: '../standard-bootstrap-3',
                        filter: 'isFile'
                    }
                ]
            }
        },

        watch: {
            js: {
                files: ['js/dev/bootstrap/*.js'],
                tasks: ['uglify']
            },
            less: {
                files: [
                    'css/less/**/*.less'
                ],
                tasks: ['less']
            }
        }

    });

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-bower-task');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-compress');

    grunt.registerTask('default', ['watch']);
    grunt.registerTask('setup', ['bower', 'less', 'uglify', 'watch']);
    grunt.registerTask('build', ['less', 'uglify', 'compress']);

};