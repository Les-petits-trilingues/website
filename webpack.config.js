const path = require('path');

module.exports = {
	entry: './src/index.js',
	output: {
		filename: 'main.js',
		path: path.resolve(__dirname, 'themes/lpt/assets/'),
	},
	devServer: {
		index: '',
		port: 3000,
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
	}
};