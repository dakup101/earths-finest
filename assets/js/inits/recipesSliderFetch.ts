import { ajaxUrl } from "../theme";
import recipesSlider from "../inits/recipesSlider";

export default function recipesSliderFetch() {
	console.log("--- Recipes Slider Fetch loaded ---");
	let sliderWrapper = document.querySelector(".recipes-slider-wrapper");
	let fetchTriggers = document.querySelectorAll(".recipes-change-trigger");

	Array.from(fetchTriggers).forEach((el) => {
		el.addEventListener("click", (ev) => {
			ev.preventDefault();
			Array.from(fetchTriggers).forEach((item) => {
				item.classList.remove("text-brown-light");
			});
			let target = ev.currentTarget as HTMLAnchorElement;
			let mealId = target.dataset.meal;
			let data = new FormData();
			target.classList.add("text-brown-light");
			data.append("action", "fetch_recipes_slider");
			data.append("meal", mealId);

			sliderWrapper.classList.add("loading");

			fetch(ajaxUrl, {
				method: "POST",
				body: data,
				credentials: "same-origin",
			})
				.then((response) => response.text())
				.then((text) => {
					console.log("chuj");
					console.log(text);
					sliderWrapper.innerHTML = text;
					recipesSlider();
					sliderWrapper.classList.remove("loading");
				});
		});
	});
}
