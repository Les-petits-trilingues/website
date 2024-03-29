const path = require('path');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const {WebpackManifestPlugin} = require('webpack-manifest-plugin');
const {CleanWebpackPlugin} = require('clean-webpack-plugin');

module.exports = ({production}) => {
	let module_css = [];
	let plugins = [];

	// Fix for webpack not setting NODE_ENV, preventing tailwind from purging css
	process.env.NODE_ENV = production ? "production" : "development";

	plugins.push(new CleanWebpackPlugin({
		cleanOnceBeforeBuildPatterns: [
			"fonts/*",
			"*.js",
			"*.css",
			"manifest.json",
		],
	}));

	if (production) {
		plugins.push(new MiniCssExtractPlugin({filename: '[name].[contenthash:5].css'}));
		plugins.push(new WebpackManifestPlugin({}));
	}

	module_css.push(production ? MiniCssExtractPlugin.loader : 'style-loader');

	return {
		entry: {
			index: './src/index.js',
		},
		output: {
			filename: production ? '[name].[contenthash:5].js' : '[name].js',
			path: path.resolve(__dirname, 'wp-content/themes/lpt/assets/'),
			publicPath: "/wp-content/themes/lpt/assets/",
		},
		stats: "normal",
		devServer: {
			index: '',
			port: 3002,
			overlay: true,
			contentBase: path.join(__dirname),
			publicPath: '/wp-content/themes/lpt/assets',
			proxy: {
				context: () => true,
				target: "http://localhost:8000",
				changeOrigin: true,
			},
			writeToDisk: true,
		},
		module: {
			rules: [
				{
					test: /\.s[ac]ss$/i,
					exclude: /node_modules/,
					use: [
						...module_css,
						{
							loader: 'css-loader',
							options: {
								sourceMap: !production,
								importLoaders: 1,
							},
						},
						{
							loader: 'postcss-loader',
							options: {
								sourceMap: !production,
							},
						},
						{
							loader: 'sass-loader',
							options: {
								sourceMap: !production,
							},
						},
					],
				},
				{
					test: /\.(woff|woff2)$/,
					type: "asset/resource",
					generator: {
						filename: "fonts/[contenthash][ext]"
					}
				}
			],
		},
		plugins: [
			...plugins,
			new BrowserSyncPlugin({
				host: 'localhost',
				port: 3000,
				proxy: 'http://localhost:3002',
				files: ["wp-content/themes/lpt/**/*.php"]
			})
		]
	};
};