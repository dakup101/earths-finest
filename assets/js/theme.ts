// Loaded
console.log("--- Site Loaded ---");
import homeHero from "./handles/homeHero_handle";
import productCatsSlider from "./handles/productCatsSlider_handle";
import recipesSlider from "./handles/recipesSlider_handle";
import accordion from "./handles/accordion_handle";
import recipesFilter from "./handles/recipesFilter_handle";
import postsFilter from "./handles/postsFilter_handle";
import recipesSliderFetc from "./handles/recipesSliderFetch_handle";

// Rendered
window.addEventListener("DOMContentLoaded", () => {
	console.log("--- Site Rendered ---");
	homeHero();
	productCatsSlider();
	recipesSlider();
	accordion();
	recipesFilter();
	postsFilter();
	recipesSliderFetc();

	let mobileMenu = document.querySelector(".mobile-menu");
	let openMobileMenu = document.querySelectorAll(".open-mobile-menu");
	let closeMobileMenu = document.querySelector(".close-mobile-menu");

	Array.from(openMobileMenu).forEach((el) => {
		el.addEventListener("click", (ev) => {
			ev.preventDefault();
			console.log("a");
			mobileMenu.classList.remove("-translate-x-full");
		});
	});

	closeMobileMenu.addEventListener("click", (ev) => {
		ev.preventDefault();
		mobileMenu.classList.add("-translate-x-full");
	});

	let megaMenuTrigger = document.querySelector(".mega-menu-trigger");
	let megaMenu = document.querySelector(".mega-menu");
	let megaMenuTimeout = null;

	megaMenuTrigger.addEventListener("mouseenter", (ev) => {
		megaMenu.classList.remove("opacity-0");
		megaMenu.classList.remove("pointer-events-none");
		megaMenu.classList.remove("translate-y-5");
	});

	megaMenuTrigger.addEventListener("mouseleave", (ev) => {
		megaMenuTimeout = setTimeout(() => {
			hideMenu(megaMenu);
		}, 100);
	});

	megaMenu.addEventListener("mouseenter", () => {
		if (megaMenuTimeout) clearTimeout(megaMenuTimeout);
	});

	megaMenu.addEventListener("mouseleave", () => {
		megaMenuTimeout = setTimeout(() => {
			hideMenu(megaMenu);
		}, 100);
	});

	let backToTop = document.querySelector(".back-to-top");
	backToTop.addEventListener("click", () => {
		window.scrollTo({ top: 0, behavior: "smooth" });
	});

	window.addEventListener("scroll", () => {
		let windowY = window.scrollY;
		if (windowY > 350) {
			// Scrolling UP
			backToTop.classList.remove("opacity-0");
			backToTop.classList.remove("pointer-events-none");
		} else {
			// Scrolling DOWN
			backToTop.classList.add("opacity-0");
			backToTop.classList.add("pointer-events-none");
		}
	});
});

function hideMenu(menu) {
	menu.classList.add("opacity-0");
	menu.classList.add("pointer-events-none");
	menu.classList.add("translate-y-5");
}

export const ajaxUrl = "/wp-admin/admin-ajax.php";
