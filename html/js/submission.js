// translate the address to a lat and lon
function getLatLon() {
	var geocoder = new google.maps.Geocoder();
	// gets address that has id "address"
	geocoder.geocode({ 'address': document.getElementById("address").value }, function (results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			// calculate lat and lon based on address using google api
			var latitude = results[0].geometry.location.lat();
			var longitude = results[0].geometry.location.lng();
			// place lat and long onto screen in correct place
			document.getElementById("lat").value = latitude;
			document.getElementById("long").value = longitude;
		} else {
			// print to console if failure (for server)
		        console.log("Geocoding failed: " + status);                            
		}
	});
}

// google calls this so you need it
function initMap() {
	console.log("initialized");
}
