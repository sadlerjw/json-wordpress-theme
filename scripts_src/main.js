require(['jquery', 'bigfoot'], function($, bigfoot) {
	$.bigfoot({
		actionOriginalFN: 'ignore'
	})

	$(document).ready(function() {
		var menuButton = document.getElementById("menu_button");
		var menu = document.getElementById("navContainer");
		var menuIsOpen = false;
		menuButton.addEventListener("click", function() {
			if (menuIsOpen === true) {
				menuButton.classList.remove("open");
				menuButton.classList.add("closed");
				menu.classList.remove("open");
				menuIsOpen = false;
			} else {
				menuButton.classList.add("open");
				menuButton.classList.remove("closed");
				menu.classList.add("open");
				menuIsOpen = true;
			}
		}, false);
	});
})