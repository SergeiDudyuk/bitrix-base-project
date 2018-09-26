const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');

const config = {
	entry: {
		polyfills: [
			'babel-polyfill/dist/polyfill.min.js',
		],
		styles: './local/assets/source/styles.js',
		app: './local/assets/source/app.js',
	},
	output: {
		filename: 'bundle-[name].[hash].js',
		chunkFilename: 'chunk-[name].[hash].js',
		path: path.resolve('./local/assets/build'),
		publicPath: '/local/assets/build/'
	},
	module: {
		rules: [
			{
				test: /\.css$/,
				use: [
					{
						loader: 'style-loader',
						options: { attrs: { class: 'css-webpack-asset' } }
					},
					{
						loader: 'stripcomment-loader'
					},
					{
						loader: 'css-loader',
					},
					{
						loader: 'postcss-loader'
					},
				]
			},
			{
				test: /\.scss$/,
				use: [
					{
						loader: 'style-loader',
						options: { attrs: { class: 'css-webpack-asset' } }
					},
					{
						loader: 'stripcomment-loader'
					},
					{
						loader: 'css-loader',
					},
					{
						loader: 'postcss-loader'
					},
					{
						loader: 'sass-loader'
					}
				]
			},
			{
				test: /\.vue$/,
				loader: 'vue-loader',
			},
			{
				test: /\.js$/,
				exclude: /(node_modules)/,
				loader: 'babel-loader',
				options: {
					babelrc: true
				}
			},
			{ 
				test: /\.hbs$/, 
				loader: 'handlebars-loader'
			}
		]
	},
	plugins: [
		new HtmlWebpackPlugin({
			filename: 'assets.header.html',
			template: './local/assets/source/templates/assets.header.hbs',
			chunks: [
				'styles',
			],
			inject: false
		}),
		new HtmlWebpackPlugin({
			filename: 'assets.footer.html',
			template: './local/assets/source/templates/assets.footer.hbs',
			chunks: [
				'polyfills', 'app'
			],
			inject: false
		})
	]
};

module.exports = config;