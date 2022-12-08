export default function accordion_handle() {
	if (!document.querySelector(".accordion-item")) return;
	import(/* webpackChunkName: "print" */ "../inits/accordion").then(
		(module) => {
			const initFunction = module.default;
			initFunction();
		}
	);
}
