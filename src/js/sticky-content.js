var stickyClass = "sticky";
var scrollpos = window.scrollY;
var nav = document.getElementById("main-navigation-wrapper");
var header = document.getElementById("site-header");

window.addEventListener("scroll", function() {
	scrollpos = window.scrollY;

	if (scrollpos > (header.offsetHeight - nav.offsetHeight)) {
		nav.classList.add(stickyClass);
	} else {
		nav.classList.remove(stickyClass);
	}
});
