function getLatLon() {
	var geocoder = new google.maps.Geocoder();
	geocoder.geocode({ 'address': document.getElementById("address").value }, function (results, status) {
		  if (status == google.maps.GeocoderStatus.OK) {
			          var latitude = results[0].geometry.location.lat();
			          var longitude = results[0].geometry.location.lng();
			          document.getElementById("lat").value = latitude;
			          document.getElementById("long").value = longitude;
			          }
		        else {
				             console.log("Geocoding failed: " + status);                            
				        }
		    });
}

function initMap() {
	    console.log("initialized")
}
