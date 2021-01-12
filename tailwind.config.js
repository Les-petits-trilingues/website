const colors = require("tailwindcss/colors");

module.exports = {
	purge: ["./themes/lpt/index.php"],
	darkMode: false, // or 'media' or 'class'
	theme: {
		colors: {
			black: "#000000",
			white: "#ffffff",
			gray: colors.gray,
			beige: {
				light: "#f4f1f1",
			},
			green: {
				light: "#c1ebd5",
				DEFAULT: "#0da84a",
			},
			orange: {
				DEFAULT: "#F29833",
			}
		},
		screens: {
			sm: '640px',
			md: '768px',
			lg: '1024px',
			//xl: '1280px',
			//'2xl': '1536px',
		},
		extend: {},
		fontFamily: {
			sans: ['"Source Han Sans SC"', '"Microsoft Yahei UI"', "sans-serif"]
		}
	},
	variants: {
		fontFamily: [],
		extend: {},
	},
	plugins: [],
}
