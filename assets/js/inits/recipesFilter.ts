import { ajaxUrl } from "../theme";

const activeFilters = {
	meal: [],
	diet: [],
	product: [],
	page: "1",
};

export default function recipesFilter() {
	let filters = document.querySelectorAll(".recipe-filter");

	Array.from(filters).forEach((el) => {
		el.addEventListener("change", (ev) => {
			let target = ev.currentTarget as HTMLInputElement;
			let type = target.dataset.filter;
			let item = target.dataset.id;
			let isChecked = target.checked;
			manageFilter(type, item, isChecked);
			activeFilters.page = "1";
			fetchRecipes();
		});
	});
	managePages();
}

function scrollToPosts() {
	let element = document.querySelector(".recipes-archive-content");
	let headerOffset = 125;
	let elementPosition = element.getBoundingClientRect().top;
	let offsetPosition = elementPosition + window.pageYOffset - headerOffset;

	window.scrollTo({
		top: offsetPosition,
		behavior: "smooth",
	});
}

function managePages() {
	let pages = document.querySelectorAll(".page-numbers");
	Array.from(pages).forEach((el) => {
		el.addEventListener("click", (ev) => {
			ev.preventDefault();
			let target = ev.currentTarget as HTMLAnchorElement;
			activeFilters.page = target.innerHTML;
			fetchRecipes();
		});
	});
}

function manageFilter(type: string, item: string, isChecked: boolean) {
	switch (type) {
		case "meal":
			if (isChecked) {
				activeFilters.meal.push(item);
				break;
			}
			if (activeFilters.meal.indexOf(item) > -1)
				activeFilters.meal.splice(activeFilters.meal.indexOf(item), 1);
			break;
		case "diet":
			if (isChecked) {
				activeFilters.diet.push(item);
				break;
			}
			if (activeFilters.diet.indexOf(item) > -1)
				activeFilters.diet.splice(activeFilters.diet.indexOf(item), 1);
			break;
		case "product":
			if (isChecked) {
				activeFilters.product.push(item);
				break;
			}
			if (activeFilters.product.indexOf(item) > -1)
				activeFilters.product.splice(activeFilters.product.indexOf(item), 1);
			break;
	}
}

async function fetchRecipes() {
	console.log("Fetching Recipes...");
	console.log(activeFilters);
	let data = new FormData();
	let recipesWrapper = document.querySelector(".recipes-archive-content");
	recipesWrapper.classList.add("loading");

	data.append("action", "fetch_recipes");
	data.append("meal", activeFilters.meal.join(","));
	data.append("diet", activeFilters.diet.join(","));
	data.append("product", activeFilters.product.join(","));
	data.append("page", activeFilters.page);
	await fetch(ajaxUrl, {
		method: "POST",
		body: data,
		credentials: "same-origin",
	})
		.then((response) => response.text())
		.then((text) => {
			console.log(text);
			recipesWrapper.innerHTML = text;
			recipesWrapper.classList.remove("loading");
			managePages();
			scrollToPosts();
			return true;
		});
}
