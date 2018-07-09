var map;
var markers = [];

// seu array com latitude e longitudes, se o seu backend so tem endereco usa o geocode, eu fiz o exemplo com o text box pra te ajudar
function initMap() {
  
  //o mapa inicia centralizado em quebec
  var quebec = {lat: 43.734087,  lng: -79.403929};

  var storeAddress = $("#storeAddress");
  var storeAddressID = $("#storeAddressID");
  
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10, // pensa nesse zoom inicial dependendo dos enderecos que tu for usar
    center: quebec,
    mapTypeId: 'terrain'
  });
  
  var geocoder = new google.maps.Geocoder(),
  infoWindow = new google.maps.InfoWindow;

  document.getElementById('address').addEventListener('change', function() {
   // usa o geocoder declarado acima nessa mapa.
  geocodeAddress(geocoder, map);  
  });

  $.getJSON('./stores.php', function(data) {
    $.each(data, function(key, val) {
      console.info(val);
      addMarker(val);
    });
  });

  // Try HTML5 geolocation.
  // if (navigator.geolocation) {
  //   navigator.geolocation.getCurrentPosition(function(position) {
  //     var pos = {
  //       lat: position.coords.latitude,
  //       lng: position.coords.longitude
  //     };
  //     addMarker(pos);            
  //     map.setCenter(pos);
  //   }, function() {
  //     handleLocationError(true, infoWindow, map.getCenter());
  //   });
  // } else {
  //   // Browser doesn't support Geolocation
  //   handleLocationError(false, infoWindow, map.getCenter());
  // }

}

// Adds a marker to the map and push to the array.
function addMarker(location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map    
  });
  marker.id = location.storeID;
  marker.address = location.storeAddress;
  marker.storeName = location.storeName;

  marker.addListener('click', function() {
    // console.info(marker.id);
    storeAddress.value = marker.address;
    storeAddressID.value = marker.id;
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
