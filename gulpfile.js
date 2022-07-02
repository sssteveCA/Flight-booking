var events = require('events');
var gulp = require('gulp');
gulp.task('default',()=>{
    return new Promise((resolve,reject)=>{
        console.log('Hello Gulp');
        resolve();
    });
});
