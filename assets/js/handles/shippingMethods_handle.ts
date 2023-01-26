export default function shipping_methods_handle() {
	if (!document.querySelector(".the-delivery")) return;
	import(/* webpackChunkName: "print" */ "../inits/shippingMethods").then(
		(module) => {
			const initFunction = module.default;
			initFunction();
		}
	);
}
