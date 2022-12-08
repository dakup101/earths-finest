export default function recipesSlider_handle() {
	if (!document.querySelector(".ef-recipes-slider")) return;
	import(/* webpackChunkName: "print" */ "../inits/recipesSlider").then(
		(module) => {
			const initFunction = module.default;
			initFunction();
		}
	);
}
