/** @type {import('tailwindcss').Config} */
const {
	iconsPlugin,
	dynamicIconsPlugin,
} = require("@egoist/tailwindcss-icons");
module.exports = {
	content: [
		"./assets/**/*.{html,js}",
		"./application/views/includes/*.{html,js,php}",
		"./application/views/layouts/*.{html,js,php}",
		"./application/views/**/*.{html,js,php}",
		"./application/views/*.{html,js,php}",
		"./node_modules/flowbite/**/*.js",
	],
	theme: {
		extend: {
			colors: {
				accent: {
					DEFAULT: "#5c6ac4",
					dark: "#363b75",
					light: "rgb(187 196 255)",
					lightest: "rgb(242 244 255)",
				},
				secondary: "#ecc94b",
				activeItem: "#5c6ac4",
			},
		},
	},
	plugins: [
		require("flowbite/plugin"),
		require("@tailwindcss/forms"),
		iconsPlugin(),
		dynamicIconsPlugin(),
	],
};
