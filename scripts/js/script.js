$(document).ready(function () {
	var height = $("#ingr").height();
	if (height > 200) {
		$("footer").css("position", "relative");
	}

	var fav = $("#catalog-container").height();
	if (fav > 600) {
		$("footer").css("position", "relative");
	}
});
