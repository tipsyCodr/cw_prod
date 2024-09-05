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
