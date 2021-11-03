//Using Leaflet for embedding living map
function loadmap(){
  var mymap = L.map('map').setView([43.2630393069811, -79.91921269041875], 16);

  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiaHlxaGFuc29uIiwiYSI6ImNrdmk3ampqYzJxNmwyb3MxZzJjdmVpczYifQ.3WKcHBePQjzk5Tk9hkkF3A', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery &copy <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 20,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'your.mapbox.access.token'
}).addTo(mymap);

//Add markers on the location
    var marker1 = L.marker([43.262951708321154, -79.9212761103261])
                  .bindPopup("Here is the Bridges"+ "<br>" +'<a href="individual_sample.html">For more information</a>')   
                  .addTo(mymap);
    var marker2 = L.marker([43.263648710083466, -79.91730295763841])
                  .bindPopup("Here is the La Piazza")
                  .addTo(mymap);
  }
