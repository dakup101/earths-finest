import { ajaxUrl } from "../theme";
let activeCats = [];
let activePage = "1";

export default function postsFilter() {
	let filters = document.querySelectorAll(".post-filter");

	Array.from(filters).forEach((el) => {
		el.addEventListener("change", (ev) => {
			let target = ev.currentTarget as HTMLInputElement;
			let type = target.dataset.filter;
			let item = target.dataset.id;
			let isChecked = target.checked;
			manageFilter(type, item, isChecked);
			activePage = "1";
			fetchRecipes();
		});
	});

	managePages();
}

function manageFilter(type: string, item: string, isChecked: boolean) {
	if (isChecked) {
		activeCats.push(item);
		return;
	}
	if (activeCats.indexOf(item) > -1)
		activeCats.splice(activeCats.indexOf(item), 1);
}

async function fetchRecipes() {
	console.log("Fetching Posts...");
	let data = new FormData();
	let recipesWrapper = document.querySelector(".recipes-archive-content");
	recipesWrapper.classList.add("loading");

	data.append("action", "fetch_posts");
	data.append("cats", activeCats.join(","));
	data.append("page", activePage);
	let request = await fetch(ajaxUrl, {
		method: "POST",
		body: data,
		credentials: "same-origin",
	})
		.then((response) => response.text())
		.then((text) => {
			console.log(text);
			recipesWrapper.innerHTML = text;
			recipesWrapper.classList.remove("loading");
			scrollToPosts();
			return true;
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
			activePage = target.innerHTML;
			fetchRecipes();
		});
	});
}
