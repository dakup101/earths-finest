import Swiper, { Autoplay, EffectFade, Lazy } from "swiper";
import "swiper/css/bundle";

export default function homeHero_init() {
	console.log("--- Home Hero Loaded ---");
	Swiper.use([Autoplay, EffectFade, Lazy]);
	const hero = new Swiper(".ef-hero", {
		// Params
		direction: "horizontal",
		loop: false,
		centeredSlides: true,
		speed: 1250,
		lazy: true,
		centeredSlidesBounds: true,
		slidesPerView: 1,
		effect: "fade",
		autoplay: {
			delay: 2000,
		},
		fadeEffect: {
			crossFade: true,
		},
	});
}
