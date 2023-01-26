import { ajaxUrl } from "../theme";

export default function shippingMethods() {
	console.log("--- Shipping Methods Getter loaded ---");
	let shippingWrapper = document.querySelector(".the-delivery");
	if (!shippingWrapper) return;

	if (shippingWrapper.querySelector("ul"))
		shippingWrapper.childNodes[0].remove();

	document.addEventListener("updated_checkout", () => {
		let data = new FormData();
		data.append("action", "fetch_shipping_methods");
		shippingWrapper.classList.add("loading");
		shippingWrapper.classList.remove("loaded");

		fetch(ajaxUrl, {
			method: "POST",
			body: data,
			credentials: "same-origin",
		})
			.then((response) => response.text())
			.then((text) => {
				shippingWrapper.innerHTML = text;
				shippingWrapper.classList.remove("loading");
				if (shippingWrapper.querySelector("ul"))
					shippingWrapper.childNodes[0].remove();
				console.log("--- Shipping Methods Loaded ---");
				console.log(text);
			});
	});
}
