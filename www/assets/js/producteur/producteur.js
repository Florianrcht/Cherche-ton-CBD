
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
var enseigne;
var popup = L.popup();

function onMapClick(e, enseigne) {
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

form.addEventListener('submit', CréerMarker);

function requeteSQL(){
  console.log("test1");
<<<<<<< Updated upstream
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
=======
  
  // Récupération des valeurs du formulaire
  const prod_id = document.getElementById("prod_id").value;
  const store_name = document.getElementById("store_name").value;
  const store_address = document.getElementById("store_address").value;
  const store_phone = document.getElementById("store_phone").value;
  const store_email = document.getElementById("store_email").value;
  const store_website = document.getElementById("store_website").value;
  const coordlat = document.getElementById("coordlat").value;
  const coordlng = document.getElementById("coordlng").value;
  //const cbd_products = document.getElementById("cbd_products").value;
  console.log("test2");

  
  // Création de la requête SQL
  const sql = `INSERT INTO store (id_producteur,enseigne, adresse, numero, email, web, coordlat, coordlng) 
              VALUES ('${prod_id}', '${store_name}', '${store_address}', '${store_phone}', '${store_email}', '${store_website}', '${coordlat}', '${coordlng}')`;

  console.log("test3");
  console.log(sql);

  // Envoi de la requête SQL au serveur
  fetch('http://localhost:3001/api/data2', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({sql: sql})
  })
  
  .then(response => response.json())
  .then(data => {
    console.log('Success:', data);
  })
  .catch((error) => {
    console.error('Error:', error.message);
    console.log(data);

  });
  console.log("test4");

}



function CréerBoutique(event, enseigne){
  enseigne = document.querySelector('#enseigne').value
>>>>>>> Stashed changes
  L.marker([coordlat, coordlng], {icon: greenIcon}).addTo(map)
    .bindPopup(enseigne)
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
      let enseigne = (JSON.stringify(data[i].enseigne));
      afficherMarker(data[i].enseigne, resCoordlat, resCoordlng);
    }
  });

function afficherMarker(enseigne, coordlat, coordlng){
  L.marker([coordlat, coordlng], {icon: greenIcon}).addTo(map)
    .bindPopup(enseigne)
    .openPopup();
};


// Boucle
//setInterval(locate, 3000);

