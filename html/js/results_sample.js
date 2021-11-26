//Using Leaflet for embedding living map
var mymap = null;

function loadmap() {
mymap = L.map('map').setView([43.2630393069811, -79.91921269041875], 15);
  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiaHlxaGFuc29uIiwiYSI6ImNrdmk3ampqYzJxNmwyb3MxZzJjdmVpczYifQ.3WKcHBePQjzk5Tk9hkkF3A', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery &copy <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 20,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'your.mapbox.access.token'
  }).addTo(mymap);
}

function addMarker(lat, lon, name, idx) {
	var marker = L.marker([lat, lon])
			.bindPopup("Here is " + name + "<br>" + "<a href='individual_sample.php?idx=" + idx.toString() + "'>For more information</a>")
			.addTo(mymap);
} 
