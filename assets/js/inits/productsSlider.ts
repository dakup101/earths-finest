import Swiper, { Navigation, Lazy } from "swiper";
import "swiper/css/bundle";

export default function productsSlider() {
	console.log("--- Product Cats Slider Loaded ---");

	let parent = document.querySelector(".ef-products-slider .swiper-wrapper");
	let divs = parent.children;
	let divsArray = Array.from(divs).sort(function (a, b) {
		return 0.5 - Math.random();
	});
	parent.innerHTML = "";
	console.log(divsArray);
	divsArray.forEach((div) => {
		parent.appendChild(div);
	});

	Swiper.use([Navigation, Lazy]);
	const hero = new Swiper(".ef-products-slider", {
		// Params
		direction: "horizontal",
		loop: true,
		slidesPerView: 1,
		spaceBetween: 30,
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
