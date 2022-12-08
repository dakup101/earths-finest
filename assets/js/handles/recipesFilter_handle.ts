export default function recipesFilter_handle() {
	if (!document.querySelector(".recipe-filter")) return;
	import(/* webpackChunkName: "print" */ "../inits/recipesFilter").then(
		(module) => {
			const initFunction = module.default;
			initFunction();
		}
	);
}
