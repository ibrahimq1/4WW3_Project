	//global array that cointains map markers
  var mapmarkers = new Array();
  var locations = new Array();
  
  let resultsdata;

  // Initialize and add the map
	function initMap() {
		// The default location for a random spot in hamilton
        
		const uluru = { lat: 43.1570368, lng: -79.9113216 };
		// The map, centered at that spot
		const map = new google.maps.Map(document.getElementById("map"), {
			zoom: 12,
			center: uluru,
      gestureHandling: "greedy",
		});
        setMarkers(map);
    }

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
          //shape of the icon for clickable area
          const shape = {
            coords: [32,32,32],
            type: "circle",
          };
          // making the markers based on locations in a loop
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
            //popup window all dummy data so doesn't matter what content
            const infowindow = new google.maps.InfoWindow({
                content: location[4],
                maxWidth: 200,
            });
            //on click of markers show popup
            marker.addListener("click", () => {
                infowindow.open({
                anchor: marker,
                map,
                shouldFocus: false,
                });
            });
            //markers pushed to global array to reference later and to use on hover bounce effect
            mapmarkers.push(marker);
          }
    }

    // Map markers bounce on card image selection

    for (let i = 0; i < locations.length; i++) {
        document.getElementById('card' + i).onmouseover = function(event){
          mapmarkers[i].setAnimation(google.maps.Animation.BOUNCE);
        }

        document.getElementById('card' + i).onmouseout = function(event){
          mapmarkers[i].setAnimation(null);
        }
    }

  //geolocation api to get current user location on map icon click on the search bar left hand side.
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