export default function accordion() {
	console.log("--- Accordions loaded ---");
	let items = document.querySelectorAll(".accordion-item");
	Array.from(items).forEach((el) => {
		let trigger = el.querySelector(".accordion-trigger") as HTMLElement;
		let content = el.querySelector(".accordion-content") as HTMLElement;

		content.style.height = "0px";

		trigger.addEventListener("click", (ev) => {
			let target = ev.currentTarget as HTMLElement;
			target.classList.toggle("active");
			target.classList.toggle("mb-5");
			content.style.height = target.classList.contains("active")
				? content.scrollHeight + "px"
				: "0px";
		});
	});
}
