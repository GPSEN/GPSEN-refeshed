const webpack = require('webpack');
const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');


const paths = {
	ENTRY: __dirname + '/wp-content/themes/woo-child/src/',
	PUBLIC_PATH: __dirname + '/wp-content/themes/woo-child/build/',
};

module.exports = {
	entry: {
		old: paths.ENTRY + 'js/scripts.js',
		main: paths.ENTRY + 'js/main.js',
		bootstrap: paths.ENTRY + 'js/vendor/bootstrap.min.js',
		jqueryUI: paths.ENTRY + 'js/vendor/jquery-ui.js',
	},
	output: {
		path: path.resolve(paths.PUBLIC_PATH),
		filename: '[name].bundle.js',
		publicPath: paths.PUBLIC_PATH,
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /node_modules/,
				loader: 'babel-loader',
				query: {
					presets: ['es2015', 'stage-0']
				}
			},
			{
				test: /\.scss$/,
				use: ExtractTextPlugin.extract({
					fallback: 'style-loader',
					use: [
						{
							loader: 'css-loader',
							options: {
								sourceMap: true,
							}
						},
						{
							loader: 'postcss-loader', // Run post css actions
							options: {
								plugins: function () { // post css plugins, can be exported to postcss.config.js
									return [
										require('precss'),
										require('autoprefixer'),
									];
								},
								sourceMap: true,
							}
						},
						{
							loader: 'sass-loader',
							options: {
								sourceMap: true,
							},
						},
					],
					publicPath: paths.PUBLIC_PATH + 'css/',
				}),
			},
		],
	},
	plugins: [
		new webpack.ProvidePlugin({
			$: 'jquery',
			jQuery: 'jquery',
		}),
		new ExtractTextPlugin('css/main.css'),
	],
};