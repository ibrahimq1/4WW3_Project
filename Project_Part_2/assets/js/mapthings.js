	// Initialize and add the map
	function initMap() {
		// The location of Uluru
        
		const uluru = { lat: 43.1570368, lng: -79.9113216 };
		// The map, centered at Uluru
		const map = new google.maps.Map(document.getElementById("map"), {
			zoom: 12,
			center: uluru,
		});
        setMarkers(map);
    }

    const contentString =
    '<div id="content">' +
    '<div id="siteNotice">' +
    "</div>" +
    '<h3 id="firstHeading" class="firstHeading"><a href="http://localhost/Project_Part_2/individual_court.php">Title</b></a></h3>' +
    '<div id="bodyContent">' +
    '<p>Title, Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.' +
    "</p>" +
    "</div>" +
    "</div>";

    // Title, Lat, Long, z-index, info
    const locations = [
        ["Title", 43.2570368, -79.9113616, 4, contentString],
        ["Title", 43.1570368, -79.9423716, 5, contentString],
        ["Title", 43.1270368, -79.9513216, 3, contentString],
        ["Title", 43.1747368, -79.913616, 2, contentString],
        ["Title", 43.1570368, -79.9613216, 1, contentString],
      ];


    function setMarkers(map) {

        const image = {
            url: "./assets/img/mapball.png",
            // This marker is 32 pixels wide by 32 pixels high.
            size: new google.maps.Size(32, 32),
            // The origin for this image is (0, 0).
            origin: new google.maps.Point(0, 0),
            // The anchor for this image is the base of the flagpole at (0, 32).
            anchor: new google.maps.Point(0, 0),
          };

          const shape = {
            coords: [32,32,32],
            type: "circle",
          };

          for (let i = 0; i < locations.length; i++) {
            const location = locations[i];
        
            const marker = new google.maps.Marker({
              position: { lat: location[1], lng: location[2] },
              map,
              icon: image,
              shape: shape,
              title: location[0],
              zIndex: location[3],
            });

            const infowindow = new google.maps.InfoWindow({
                content: location[4],
                maxWidth: 200,
            });

            marker.addListener("click", () => {
                infowindow.open({
                anchor: marker,
                map,
                shouldFocus: false,
                });
            });
          }
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