module.exports = ({mode}) => {
	const production = mode !== "development";
	let plugins = [];

	if (production) {
		plugins.push(require('cssnano'));
	}

	return {
		plugins: [
			require('tailwindcss'),
			require('autoprefixer'),
			...plugins,
		]
	};
};