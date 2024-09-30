import Swiper from "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs";

const swiper = new Swiper(".main-carousel", {
	// Optional parameters
	// direction: "vertical",
	loop: true,
	autoplay: {
		delay: 5000,
	},
	// If we need pagination
	pagination: {
		el: ".swiper-pagination",
	},
	freeMode: true,
	// Navigation arrows
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},

	// And if we need scrollbar
	scrollbar: {
		el: ".swiper-scrollbar",
	},
});

const communitySwiper = new Swiper(".comm-carousel", {
	// Optional parameters
	// direction: "vertical",
	loop: true,
	freeMode: true,
	// If we need pagination

	freeMode: true,
	// Navigation arrows
	navigation: {
		nextEl: ".comm-swiper-button-next",
		prevEl: ".comm-swiper-button-prev",
	},
	slidesPerView: 2,
	spaceBetween: 10,
	// Responsive breakpoints
	breakpoints: {
		// when window width is >= 320px
		320: {
			slidesPerView: 1.7,
			spaceBetween: 20,
		},
		// when window width is >= 480px
		480: {
			slidesPerView: 1.5,
			spaceBetween: 30,
		},
		// when window width is >= 640px
		700: {
			slidesPerView: 2,
			spaceBetween: 40,
		},
		900: {
			slidesPerView: 2,
			spaceBetween: 40,
		},
		1150: {
			slidesPerView: 3,
			spaceBetween: 40,
		},
		1400: {
			slidesPerView: 4,
			spaceBetween: 40,
		},
	},
	// And if we need scrollbar
	scrollbar: {
		el: ".swiper-scrollbar",
	},
});

const bottombarSlider = new Swiper(".bottombarSlider", {
	// Optional parameters
	// direction: "vertical",
	loop: false,
	freeMode: false,
	// If we need pagination

	// Navigation arrows
	navigation: {
		nextEl: ".bottom-next",
		prevEl: ".bottom-prev",
	},
	slidesPerView: 1,
	spaceBetween: 10,

	// And if we need scrollbar
	scrollbar: {
		el: ".bottombar-scroll",
	},
});
