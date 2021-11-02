	// Initialize and add the map
	function initMap() {
		// The location of Uluru
        
		const uluru = { lat: 43.2570368, lng: -79.9113216 };
		// The map, centered at Uluru
		const map = new google.maps.Map(document.getElementById("map"), {
			zoom: 12,
			center: uluru,
		});
		// The marker, positioned at Uluru
		const marker = new google.maps.Marker({
			position: uluru,
			map: map,
		});
	}

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
		y.value = position.coords.latitude + "," + position.coords.longitude
		console.log(position.coords.latitude + "," + position.coords.longitude)
	}