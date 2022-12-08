export default function homeHero_handle() {
	if (!document.querySelector(".ef-cats-slider")) return;
	import(/* webpackChunkName: "print" */ "../inits/productCatsSlider").then(
		(module) => {
			const initFunction = module.default;
			initFunction();
		}
	);
}
