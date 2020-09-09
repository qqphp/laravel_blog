const gulp = require('gulp');
const rollup = require('rollup');
const del = require('del')
const autoprefixer = require('autoprefixer');
const postcss = require('gulp-postcss')
const cssnano = require('cssnano')
const cleancss = require('gulp-clean-css');
const rename = require('gulp-rename')
const zip = require('gulp-zip')

const rollupConfig = require('./rollup.config.js')

const clean = function () {
    return del(['./js/toc-helper.min.js', './css/toc-helper.min.css'])
}
const buildjs = async function () {
    const bundle = await rollup.rollup({
        input: rollupConfig.input,
        plugins: rollupConfig.plugins
    })
    await bundle.write(rollupConfig.output)
}

const buildcss = function () {
    return gulp.src('./css/toc-helper.css')
        .pipe(postcss([
            autoprefixer(['last 5 version']),
            cssnano()
        ]))
        .pipe(cleancss({
            level: 2
        }))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('./css'))
}
const watch = function (done) { 
    gulp.watch('./css/toc-helper.css', gulp.series(buildcss))
    gulp.watch('./js/toc-helper.js', gulp.series(buildjs))
    done()
}
const buildZip = function(){
    return gulp.src(['./css/*.css','./js/*.js'])
        .pipe(zip('toc-helper.zip', {compress: true}))
        .pipe(gulp.dest('./'))
}
gulp.task('dev', gulp.series(clean, gulp.parallel(buildjs, buildcss, watch)))
gulp.task('default', gulp.series(clean, gulp.parallel(buildjs, buildcss), buildZip), function () {
    console.log('build completed!!!')
})