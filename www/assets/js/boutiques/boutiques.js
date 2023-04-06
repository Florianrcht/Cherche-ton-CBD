
//Chargement de la map\\
var map = L.map('map');

window.onload = locate();


L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

function locate() {
  map.locate({setView: true, maxZoom: 20});
}
//--------------------\\





//Ping sur la map des boutiques\\
  var pingBoutique = L.icon({
    iconUrl: 'assets/imgs/greenPing2.png',
    iconSize:     [70, 48], // Taille de l'icon
    iconAnchor:   [40, 50], // Pointe de l'image
    popupAnchor:  [-5, -45] // Position de la popup par rapport au ping
  });
//------------------------------\\






//Position de l'utilisateur\\
  var positionActuelle, rayonPosition;


  function localisationTrouvée(e) {
    // Rafraichit la position du marquer de l'utilisateur
    if (positionActuelle) {
        map.removeLayer(positionActuelle);
        map.removeLayer(rayonPosition);
    }

    var radius = e.accuracy / 2;

    positionActuelle = L.marker(e.latlng).addTo(map)
      .bindPopup("Votre position").openPopup();

      rayonPosition = L.circle(e.latlng, radius).addTo(map);
  }

  function localisationErreur(e) {
    alert(e.message);
  }

  map.on('locationfound', localisationTrouvée);
  map.on('locationerror', localisationErreur);

//-------------------------\\






//Affichage des boutiques\\

var coordlat;
var coordlng;
var enseigne;
var type;
var popup = L.popup();

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
      let type = (JSON.stringify(data[i].type));
      afficherMarker(data[i].enseigne, data[i].type, resCoordlat, resCoordlng);
    }
  });

function afficherMarker(enseigne, type, coordlat, coordlng){
  L.marker([coordlat, coordlng], {icon: pingBoutique}).addTo(map)
    .bindPopup(enseigne +" : " + type)
    .openPopup();
};

//-----------------------\\




//Affichage de l'itinéraire\\
/*

var control = L.Routing.control({
  waypoints: [
    L.latLng(48.8566, 2.3522), // position de départ
    L.latLng(45.7640, 4.8357) // position d'arrivée
  ],
  show: false // cacher les étapes
}).addTo(map);

// masquer la boîte de dialogue de l'itinéraire
control.hideSteps();
*/

//-------------------------\\






// Boucle
//setInterval(locate, 3000);

