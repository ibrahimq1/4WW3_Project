	//global array that cointains map markers
  var mapmarkers = new Array();
  
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

    //dummy data for map marker popup
    const contentString =
    '<div id="content">' +
    '<div id="siteNotice">' +
    "</div>" +
    '<img id="card4" style="padding-bottom:10px; margin-left:0;" width="100%" height="auto" src="assets/img/ballcourt1.jpg" alt="Card image cap">' +
    '<h3 id="firstHeading" class="firstHeading"><a href="./individual_court.php">Title</b></a></h3>' +
    '<span class="bi bi-star-fill"></span>' +
		'<span class="bi bi-star-fill"></span>' +
		'<span class="bi bi-star-fill"></span>' +
		'<span class="bi bi-star-half"></span>' +
		'<span class="bi bi-star"></span>' +
    '<div id="bodyContent" style="padding-top:10px">' +
    '<p>Title, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' +
    "</p>" +
    "</div>" +
    "</div>";

    // Title, Lat, Long, z-index, info
    const locations = [
        ["Title0", 43.2570368, -79.9113616, 4, contentString],
        ["Title1", 43.1570368, -79.9423716, 5, contentString],
        ["Title2", 43.1270368, -79.9513216, 3, contentString],
        ["Title3", 43.1747368, -79.9136126, 2, contentString],
        ["Title4", 43.1570368, -79.9613216, 1, contentString],
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