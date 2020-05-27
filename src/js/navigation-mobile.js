var navButton = document.getElementById("main-navigation-toggle");
navButton.addEventListener("click", function () {
    var nav = document.getElementsByTagName("body")[0];
    var openClass = "main-navigation-open";
    var ariaAttr = "aria-expanded";
    var isOpen = nav.classList.toggle(openClass);
    if (isOpen) {
        navButton.setAttribute(ariaAttr, "true");
    } else {
        navButton.setAttribute(ariaAttr, "false");
    }
});
