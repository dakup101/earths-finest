export default function productsSlider_handle() {
	if (!document.querySelector(".ef-products-slider")) return;
	import(/* webpackChunkName: "print" */ "../inits/productsSlider").then(
		(module) => {
			const initFunction = module.default;
			initFunction();
		}
	);
}
