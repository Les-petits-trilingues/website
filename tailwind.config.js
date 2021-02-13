const colors = require("tailwindcss/colors");

module.exports = {
	purge: {
		content: ["./wp-content/themes/lpt/**/*.php"],
	},
	darkMode: false, // or 'media' or 'class'
	corePlugins: {
		transform: false,
		transformOrigin: false,
		transitionDelay: false,
		transitionDuration: false,
		transitionProperty: false,
		transitionTimingFunction: false,
		translate: false,
		rotate: false,
		scale: false,
		skew: false,
		gridAutoColumns: false,
		gridAutoFlow: false,
		gridAutoRows: false,
		gridColumn: false,
		gridColumnEnd: false,
		gridColumnStart: false,
		gridRow: false,
		gridRowEnd: false,
		gridRowStart: false,
		gridTemplateColumns: false,
		gridTemplateRows: false,
		gap: false,
	},
	theme: {
		colors: {
			black: "#000000",
			white: "#ffffff",
			gray: colors.gray,
			beige: {
				light: "#f4f1f1",
				DEFAULT: "#fef4e0",
			},
			green: {
				light: "#c1ebd5",
				DEFAULT: "#0da84a",
			},
			orange: {
				DEFAULT: "#f29833",
			},
			red: {
				DEFAULT: "#d42f2a",
			}
		},
		screens: {
			sm: '640px',
			md: '816px',
			//lg: '1024px',
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
