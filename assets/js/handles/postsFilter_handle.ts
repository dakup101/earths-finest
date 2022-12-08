export default function recipesFilter_handle() {
	if (!document.querySelector(".post-filter")) return;
	import(/* webpackChunkName: "print" */ "../inits/postsFilter").then(
		(module) => {
			const initFunction = module.default;
			initFunction();
		}
	);
}
