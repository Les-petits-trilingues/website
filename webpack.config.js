const path = require('path');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')

module.exports = {
	entry: './src/index.js',
	output: {
		filename: 'main.js',
		path: path.resolve(__dirname, 'themes/lpt/assets/'),
	},
	devServer: {
		index: '',
		port: 3002,
		overlay: true,
		contentBase: path.join(__dirname, 'themes/lpt/assets'),
		publicPath: '/wp-content/themes/lpt/assets',
		proxy: {
			context: () => true,
			target: "http://localhost:8000",
			changeOrigin: true,
		}
	},
	module: {
		rules: [
			{
				test: /\.s[ac]ss$/i,
				exclude: /node_modules/,
				use: [
					{loader: 'style-loader',},
					{
						loader: 'css-loader',
						options: {
							importLoaders: 1,
						}
					},
					{loader: 'postcss-loader'},
					{loader: 'sass-loader'}
				]
			}
		]
	},
	plugins: [
		new BrowserSyncPlugin({
			host: 'localhost',
			port: 3000,
			proxy: 'http://localhost:3002',
			files: ["themes/lpt/**/*.php"]
		})
	]
};