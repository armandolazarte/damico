var sarasa = [
    "./bower_components/jquery/jquery.js",
    //"./bower_components/bootstrap/dist/js/bootstrap.js",
    "./bower_components/bootstrap/js/carousel.js",
    "./bower_components/bootstrap/js/collapse.js",
    "./bower_components/bootstrap/js/transition.js",
    "./bower_components/bootstrap/js/tab.js",
    "./bower_components/bootstrap/js/modal.js",
    "./bower_components/ekko-lightbox/dist/ekko-lightbox.min.js",
    "./bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicket.min.js",
    "./resources/assets/js/*.js"
];
                
module.exports = function(grunt) {
    grunt.initConfig({        
        less: {
            dist: {
                src: "./resources/assets/less/styles.less",
                dest: "./public/css/damico.css"
            }
        },
        concat: {
            scripts: {
                src: sarasa,
                dest: "./public/js/damico.js"
            }
        },        
        uglify: {
            scripts: {
                options: {
                    mangle: true
                },                
                files: {
                    "./public/js/damico.js": sarasa                 
                }
            }           
        }, 
        cssmin: {
            options: {
                shorthandCompacting: false,
                roundingPrecision: -1
            },
            lib: {
                files: {
                    "./public/css/lib.css": [
                        "./bower_components/bootstrap/dist/css/bootstrap.min.css",
                        "./bower_components/components-font-awesome/css/font-awesome.min.css",
                        "./bower_components/ekko-lightbox/dist/ekko-lightbox.css",
                        "./bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicket.min.css"
                    ]
                }
            }
        },                    
        watch: {
            options: {
                atBegin: true
            },
            less: {
                files: "./resources/assets/less/*.less",
                tasks: ["less"]
            },
            concat: {
                files: "./js/*.js",
                tasks: ["concat:scripts"]
            }
        },
        copy: {
            fonts: {
                files: [
                    {expand: true, flatten: true, src: ['bower_components/bootstrap/dist/fonts/*'], dest: 'public/fonts/'},
                    {expand: true, flatten: true, src: ['bower_components/components-font-awesome/fonts/*'], dest: 'public/fonts/'}
                ]
            }
        },
        exec: {
            bower_install: {
                command: "bower install"
            }
        }
    });

    grunt.loadNpmTasks("grunt-contrib-less");    
    grunt.loadNpmTasks("grunt-contrib-uglify");
    grunt.loadNpmTasks("grunt-contrib-concat");
    grunt.loadNpmTasks("grunt-contrib-cssmin");
    grunt.loadNpmTasks("grunt-contrib-watch");
    grunt.loadNpmTasks("grunt-contrib-copy");
    grunt.loadNpmTasks("grunt-exec");

    grunt.registerTask("install", function(arg) {
        if (arg == "clean") {            
            grunt.file.delete("./bower_components");
        }
        grunt.task.run("exec:bower_install", "copy:fonts", "cssmin:lib", "less", "concat:scripts");
    });
    
};