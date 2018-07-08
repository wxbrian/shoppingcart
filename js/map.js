var map;
var markers = [];

// seu array com latitude e longitudes, se o seu backend so tem endereco usa o geocode, eu fiz o exemplo com o text box pra te ajudar
var pins = [
  {lat: 46.815887, lng: -71.216729}, //Quebec
  {lat: 45.548975, lng: -73.566751}, //Montreal
  {lat: 43.675696, lng: -79.346677}, // Toronto
  {lat: 42.336957, lng: -83.121179}, //Detroit
  {lat: 42.358774, lng:  -71.066478} // Boston
];

function initMap() {
  
  //o mapa inicia centralizado em quebec
  var quebec = {lat: 44.39701635571153,  lng: -76.02096736824166};
  
  
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 6, // pensa nesse zoom inicial dependendo dos enderecos que tu for usar
    center: quebec,
    mapTypeId: 'terrain'
  });
  
  var geocoder = new google.maps.Geocoder(),
  infoWindow = new google.maps.InfoWindow;
  
    document.getElementById('address').addEventListener('change', function() {
     // usa o geocoder declarado acima nessa mapa.
    geocodeAddress(geocoder, map);

  // Try HTML5 geolocation.
 if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            addMarker(pos);            
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
    });
  // Adds a marker at the center of the map.
  for (var i = pins.length - 1; i >= 0; i--) {
    addMarker(pins[i]);
  }
}

// Adds a marker to the map and push to the array.
function addMarker(location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map
  });
  markers.push(marker);
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
  setMapOnAll(map);
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?        'Error: The Geolocation service failed.' :                    'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  clearMarkers();
  markers = [];
}
function geocodeAddress(geocoder, resultsMap) {
    // pega a string do text box e acha a lat e long
        var address = document.getElementById('address').value;
  if (address){
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            addMarker(results[0].geometry.location)
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
}
