require("dotenv").config();
const path = require("path");
const mix = require("laravel-mix");
const environment = process.env.APP_ENV;
const strictMode = 'true' === process.env.STRICT_MODE ?? false;
const WebpackObfuscation = require('webpack-obfuscator');

if ("local" !== environment) {
    /**
     * =================================================================================================================
     * 💣    For complex build all bundles, Production or Development environments
     * =================================================================================================================
     */
    require('./asset/app/webpack.prod');

    mix.webpackConfig({
        plugins: [
            new WebpackObfuscation({
                rotateStringArray: true,
                rotateUnicodeArray: true,
            }),
        ],
    })
} else {
    /**
     * =================================================================================================================
     * 🤠    Uncomment the one, on which you work and run your ran watch, dev or prod, for local development environment
     * =================================================================================================================
     */
    require("./asset/app/webpack.dev");

    if (strictMode) {
        mix.sourceMaps()
    }
}

// Global dependencies for all bundles
mix.version();

// Global webpack config for all bundles
mix.webpackConfig(
    (module.exports = {
        resolve: {
            extensions: [".js", ".ts", ".vue"],
            alias: {
                "~": path.resolve(__dirname, "./asset"),
                "@": path.resolve(__dirname, "./node_modules"),
                "vue-property-decorator": "vue-property-decorator/lib/index.d.ts"
            },
        },
        optimization: {
            splitChunks: {
                chunks: 'all',
            },
        },
    }),
);

// Global babel config for all bundles
mix.babelConfig({
    plugins: [
        ["@babel/proposal-decorators", { "legacy": true }],
        ["@babel/proposal-class-properties", { "loose": true }]
    ],
    presets: [
        ['@babel/preset-env', { targets: { node: 'current' } }],
    ]
});

// Disable LICENSE files
mix.options({
    terser: {
        extractComments: false,
    }
});
