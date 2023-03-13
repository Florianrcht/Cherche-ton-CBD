
var map = L.map('map');


window.onload = locate();

// Token pk.eyJ1IjoiZmxvcmlhbnJjaHQiLCJhIjoiY2xka2p4NG5pMXdoZDNwdDU0ampyMnN6NSJ9.3RuMtRpGhlzYW-W9the7vA

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);


var greenIcon = L.icon({
  iconUrl: 'assets/imgs/greenPing2.png',
  iconSize:     [70, 48], // Taille de l'icon
  iconAnchor:   [40, 50], // Pointe de l'image
  popupAnchor:  [-5, -45] // Position de la popup par rapport au ping
});


L.marker([48.83944529936092, 2.3226181393088794], {icon: greenIcon}).addTo(map)
    .bindPopup('TRISTAN CBD HHC Shop Paris 14 Montparnasse')
    .openPopup();



var current_position, current_accuracy;

function onLocationFound(e) {
  // Rafraichit la position du marquer de l'utilisateur
  if (current_position) {
      map.removeLayer(current_position);
      map.removeLayer(current_accuracy);
  }

  var radius = e.accuracy / 2;

  current_position = L.marker(e.latlng).addTo(map)
    .bindPopup("You are within " + radius + " meters from this point").openPopup();

  current_accuracy = L.circle(e.latlng, radius).addTo(map);
}

function onLocationError(e) {
  alert(e.message);
}

map.on('locationfound', onLocationFound);
map.on('locationerror', onLocationError);

// Fonction qui charge la map    
function locate() {
  map.locate({setView: true, maxZoom: 20});
}
var coordlat;
var coordlng;
var name;
var popup = L.popup();

function onMapClick(e, name) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
        coordlat = e.latlng.lat;
        coordlng = e.latlng.lng;
        document.getElementById("coordlat").value = coordlat;
        document.getElementById("coordlng").value = coordlng;
}
map.on('click', onMapClick);


function requeteSQL(){
  console.log("test1");
  fetch('http://localhost:3000/api/data', {
  method: 'POST',
  headers: {
  'Content-Type': 'application/json'
  },
  body: JSON.stringify({sql: "INSERT INTO test (id) VALUES (1)" })
})
  .then(response => response.json())
  .then(data => {
    console.log("test2");
  alert(body);
  console.log(data);
  alert(data)
})
  .catch(error => {
  console.error('Error:', error);
});
}

function CréerMarker(event, name){
  event.preventDefault();
  name = document.querySelector('#name').value
  L.marker([coordlat, coordlng], {icon: greenIcon}).addTo(map)
    .bindPopup(name)
    .openPopup();
  requeteSQL();
}


var resCoordlat;
var resCoordlng;
let data;
fetch('http://localhost:3000/api/data')
  .then(response => response.json())
  .then(receivedData => {
    data = receivedData;
    for (let i = 0; i < data.length; i++) {
      let resCoordlat = (JSON.parse(data[i].coordlat));
      let resCoordlng = (JSON.parse(data[i].coordlng));
      let name = (JSON.stringify(data[i].name));
      afficherMarker(data[i].name, resCoordlat, resCoordlng);
    }
  });

function afficherMarker(name, coordlat, coordlng){
  L.marker([coordlat, coordlng], {icon: greenIcon}).addTo(map)
    .bindPopup(name)
    .openPopup();
};


// Boucle
//setInterval(locate, 3000);
