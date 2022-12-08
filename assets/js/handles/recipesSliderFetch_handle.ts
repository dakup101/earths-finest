export default function recipesSliderFetch_handle() {
	if (!document.querySelector(".ef-recipes-slider")) return;
	import(/* webpackChunkName: "print" */ "../inits/recipesSliderFetch").then(
		(module) => {
			const initFunction = module.default;
			initFunction();
		}
	);
}
