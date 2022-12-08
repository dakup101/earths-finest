import Swiper, { Navigation, Lazy } from "swiper";
import "swiper/css/bundle";

export default function productCatsSlider() {
	console.log("--- Recipes Slider Loaded ---");
	Swiper.use([Navigation, Lazy]);
	const hero = new Swiper(".ef-recipes-slider", {
		// Params
		direction: "horizontal",
		loop: true,
		lazy: true,
		slidesPerView: 3,
		spaceBetween: 40,
		// Navigation
		navigation: {
			nextEl: ".slide-next",
			prevEl: ".slide-prev",
		},
		breakpoints: {
			320: {
				slidesPerView: 1,
			},
			991: {
				slidesPerView: 2,
			},
			1240: {
				slidesPerView: 3,
			},
		},
	});
}
