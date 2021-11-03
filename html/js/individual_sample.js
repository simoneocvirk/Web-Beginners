function initmap() {
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
