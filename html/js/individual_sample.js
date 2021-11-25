/*function initmap() {
	map = new OpenLayers.Map("basicMap");
	var mapnik = new OpenLayers.Layer.OSM();
	// change lat lon to something a map can use
	var fromProjection = new OpenLayers.Projection("EPSG:4326"); 
	var toProjection = new OpenLayers.Projection("EPSG:900913");
	var position = new OpenLayers.LonLat(-79.92126610204545, 43.26293574538705).transform(fromProjection, toProjection);
	var zoom = 15; 
	map.addLayer(mapnik);
	map.setCenter(position, zoom);
	// add a marker
	var markers = new OpenLayers.Layer.Markers( "Markers" );
	map.addLayer(markers);
	markers.addMarker(new OpenLayers.Marker(position));
}
*/
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

function addMarker(lat, lon, name) {
	var marker = L.marker([lat, lon])
	.bindPopup("Here is " + name)
	.addTo(mymap);
}
