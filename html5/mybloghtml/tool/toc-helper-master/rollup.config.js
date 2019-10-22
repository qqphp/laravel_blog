const babel = require('rollup-plugin-babel');
const resolve = require('rollup-plugin-node-resolve')
const commonjs = require('rollup-plugin-commonjs')
const terser = require('rollup-plugin-terser')
const pkg = require('./package.json')

module.exports = {
    input: './js/toc-helper.js',
    output: {
        file: './js/toc-helper.min.js',
        format: 'umd',
        name: 'TocHelper',
        banner: `/*!\nDate ${new Date()} \nVersion ${pkg.version} \nCopyright © 2018-${new Date().getFullYear()} Design By ${pkg.author}\n*/`,
    },
    plugins: [
        commonjs({
            // exclude: ['node_modules/**']
        }),
        resolve({
            jsnext: true,
            main: true,
            browser: true
        }),
        babel({
            babelrc: true,
            externalHelpers: false,
            runtimeHelpers: false,
            exclude: 'node_modules/**'
        }),
        terser.terser({
            mangle:{
                properties:{
                    // 混淆所有的方法名
                    regex:/(winEvents|setTocScroll|resetTocScroll|syncTocScroll|offsetBodyScrollEvent|addOffsetBodyScrollEvent|removeOffsetBodyScrollEvent|offsetBodyScrollDebounce|getOffsetBodyScrollTop|GID|debounce|empty|clear|activeToc|getOffsetY|loadHeadings|setHash|setActive|setHightlight|__enter|__leave|__click|tocEvent|shadow|fixed)/
                }
            },
            output: {
                comments: /^!/
            }
        })
    ]
};