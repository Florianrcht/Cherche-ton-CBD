
var map = L.map('map');


L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpandmbXliNDBjZWd2M2x6bDk3c2ZtOTkifQ._QA7i5Mpkd_m30IGElHziw', {
  maxZoom: 18,
  attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
    '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
    'Imagery © <a href="http://mapbox.com">Mapbox</a>',
  id: 'mapbox.streets'
}).addTo(map);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([48.83957556387109, 2.322628215069927]).addTo(map)
    .bindPopup('TRISTAN CBD HHC Shop Paris 14 Montparnasse')
    .openPopup();

var current_position, current_accuracy;

function onLocationFound(e) {
  // Si position actuelle définie, remplace le marker de position précédent par le nouveau actuel
  if (current_position) {
      map.removeLayer(current_position);
      map.removeLayer(current_accuracy);
  }

  // Rayon de position cercle marge d'erreur
  var radius = e.accuracy / 2;

  // Ajout du marker position sur la map
  current_position = L.marker(e.latlng).addTo(map)

  // Ajout du cercle rayon position sur la map
  current_accuracy = L.circle(e.latlng, radius).addTo(map);
}

// Message d'erreur quand localisation pas trouvée
function onLocationError(e) {

}

map.on('locationfound', onLocationFound);
map.on('locationerror', onLocationError);

function locate() {
  map.locate({setView: true, maxZoom: 16});
}

// Boucle qui refraiche la position
setInterval(locate, 10000);

