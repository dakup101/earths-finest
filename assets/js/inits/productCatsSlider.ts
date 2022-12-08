import Swiper, { Navigation, Lazy } from "swiper";
import "swiper/css/bundle";

export default function productCatsSlider() {
	console.log("--- Product Cats Slider Loaded ---");
	Swiper.use([Navigation, Lazy]);
	const hero = new Swiper(".ef-cats-slider", {
		// Params
		direction: "horizontal",
		loop: true,
		slidesPerView: 1,
		spaceBetween: 10,
		lazy: true,
		// Navigation
		navigation: {
			nextEl: ".slide-next",
			prevEl: ".slide-prev",
		},
		// Responsive
		breakpoints: {
			320: {
				slidesPerView: 1,
			},
			991: {
				slidesPerView: 3,
			},
			1240: {
				slidesPerView: 4,
			},
		},
	});
}
