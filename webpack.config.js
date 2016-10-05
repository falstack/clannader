var webpack = require('webpack');
var path = require('path');
var glob = require('glob');

module.exports = {
    entry: getEntry(),
    output: {
        path: path.join(__dirname, 'public/dev/js/'),
        publicPath: 'dist/img/',
        filename: "[name].js"
    },
    module: {
        loaders: [
            { test: /\.(png|jpe?g|gif|svg|swf|eot|ttf|woff)(\?.*)?$/, loader: 'url?limit=50000' },
            { test: /\.js$/, loader: "babel", exclude: /node_modules/ },
            { test: /\.css$/, loader: "style!css" },
            { test: /\.scss/, loader: "style!css!sass" },
            { test: /\.vue$/, loader: 'vue'}
        ]
    },
    babel: {
        presets: ['es2015', 'stage-0'],
        plugins: ['transform-runtime']
    },
    externals : {
        "vue" : "Vue",
        "vuex" : "Vuex",
        "vue-router" : "VueRouter",
        "vue-resource" : "VueResource"
    },
    resolve: {
        extensions: ['', '.js', '.vue', '.json', '.scss', '.css']
    }
};

if (process.env.NODE_ENV === 'production') {
    module.exports.output.path = path.join(__dirname, 'public/dist/js/');
    module.exports.plugins = [
        new webpack.DefinePlugin({
            'process.env': {
                NODE_ENV: '"production"'
            }
        }),
        new webpack.optimize.UglifyJsPlugin({
            sourceMap: false,
            compress: {
                warnings: false
            }
        }),
        new webpack.optimize.OccurenceOrderPlugin()
    ];
} else {
    module.exports.devtool = '#source-map';
}

function getEntry() {
    var entries = {};
    var entryFiles = glob.sync('resources/page/*.js');
    for(var i = 0;i<entryFiles.length;i++){
        var filePath = entryFiles[i];
        key = filePath.substring(filePath.lastIndexOf(path.sep),filePath.lastIndexOf('.'));
        entries[key] = path.join(__dirname,filePath);
    }
    return entries;
}