export default function ajaxPagesRecipes() {
	let triggers = document.querySelectorAll("page-numbers");
	Array.from(triggers).forEach((el) => {
		el.addEventListener("click", (ev) => {
			ev.preventDefault();
			let target = ev.currentTarget as HTMLAnchorElement;
			let paged = parseInt(target.innerHTML);
		});
	});
}
