module.exports = {
    presets: [
        [
            '@babel/env',
            {
                "targets": {
                    "browsers": [   //https://github.com/browserslist/browserslist
                        "last 2 versions",
                    ]
                },
                "useBuiltIns": false,
                "modules": false,
                "debug": false
            }
        ]
    ],
    plugins: [
        [
            "@babel/plugin-transform-runtime",{
                corejs: false,
                helpers: false,
                regenerator: false,
                useESModules: false
            }
        ]
    ]
}