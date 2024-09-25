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
				badgeColor: "#1c9bf2",
				brightGreen: "#3ad30b",
				brightBlue: "#0b51d3",
				secondary: "#ecc94b",
				activeItem: "#5c6ac4",
				backgroundImage: {
					"lucid-gradient":
						"linear-gradient(180deg, rgba(235,214,245,1) 0%, rgba(212,207,245,1) 23%, rgba(212,230,246,1) 70%, rgba(255,255,255,1) 95%)",
				},
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
