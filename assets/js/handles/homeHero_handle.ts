export default function homeHero_handle() {
	if (!document.querySelector(".ef-hero")) return;
	import(/* webpackChunkName: "print" */ "../inits/homeHero").then((module) => {
		const initFunction = module.default;
		initFunction();
	});
}
