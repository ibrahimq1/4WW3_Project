var x = document.getElementById("userloc");
var y = document.getElementById("searchString");

	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else {
			y.value = "Geolocation is not supported by this browser.";
		}
		}

	function showPosition(position) {
		y.value = position.coords.latitude + "," + position.coords.longitude;
		console.log(position.coords.latitude + "," + position.coords.longitude);
	}