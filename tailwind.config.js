/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./assets/**/*.{html,js}",
		"./application/views/includes/*.{html,js,php}",
		"./application/views/layouts/*.{html,js,php}",
		"./application/views/**/*.{html,js,php}",
		"./application/views/*.{html,js,php}",
	],
	theme: {
		extend: {
			colors: {
				accent: "#5c6ac4",
				secondary: "#ecc94b",
				activeItem: "#5c6ac4",
			},
		},
	},
	plugins: [],
};
