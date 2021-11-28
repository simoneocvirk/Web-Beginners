// Get location using geolocation
function getLocation() {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition, showError);
	}
	else{
		window.alert("Failed to get the location")
	}
}

function showPosition(position) {
	document.getElementById("lat").value = position.coords.latitude.toString();
	document.getElementById("lon").value = position.coords.longitude.toString();
	window.alert("latitude: " + position.coords.latitude + "\nlongitude: " + position.coords.longitude)
}

// Error handling
function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      window.alert("The page didn't get the permission.")
      break;
    case error.POSITION_UNAVAILABLE:
      window.alert("The information of this location is unavailable.")
      break;
    case error.TIMEOUT:
      window.alert("The attempting of getting location timed out.")
      break;
  }
}
