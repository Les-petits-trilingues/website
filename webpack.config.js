const path = require('path');

module.exports = {
	entry: './src/index.js',
	output: {
		filename: 'main.js',
		path: path.resolve(__dirname, 'themes/lpt/assets/'),
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