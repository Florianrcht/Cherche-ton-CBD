
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
      afficherMarker(data[i].enseigne, resCoordlat, resCoordlng);
    }
  });

function afficherMarker(enseigne, coordlat, coordlng){
  L.marker([coordlat, coordlng], {icon: pingBoutique}).addTo(map)
    .bindPopup(enseigne)
    .openPopup();
};

//-----------------------\\







//Création Boutiques\\

  //Clique sur la map
  function coordonnéesSurCarte(e, name) {
      popup
          .setLatLng(e.latlng)
          .setContent("Vous avez cliqué aux coordonnées : " + e.latlng.toString())
          .openOn(map);
          coordlat = e.latlng.lat;
          coordlng = e.latlng.lng;
          document.getElementById("coordlat").value = coordlat;
          document.getElementById("coordlng").value = coordlng;
  }
  map.on('click', coordonnéesSurCarte);
  //---------------\\








  //Formulaire création boutiques\\
  const form = document.getElementById("form_prod")
  form.addEventListener('submit', function(event) {
    requeteSQL(event);
    CréerMarker(event);
  });
  

  function requeteSQL(event) {
    event.preventDefault();
  
    //Récupération des valeurs du formulaire\\
    const store_name = document.getElementById("store_name").value;
    const id_producteur = document.getElementById("id_producteur").value;
    const store_address = document.getElementById("store_address").value;
    const store_phone = document.getElementById("store_phone").value;
    const store_email = document.getElementById("store_email").value;
    const store_website = document.getElementById("store_website").value;
    const coordlat = document.getElementById("coordlat").value;
    const coordlng = document.getElementById("coordlng").value;
    const cbd_products = document.getElementById("cbd_products").value;
    //--------------------------------------\\


    //Création de la requête SQL\\
    const sql = `INSERT INTO store (enseigne, id_producteur, adresse, numero, email, web, coordlat, coordlng, type) 
      VALUES ('${store_name}', '${id_producteur}','${store_address}', '${store_phone}', '${store_email}', '${store_website}', '${coordlat}', '${coordlng}', '${cbd_products}')`;
    //--------------------------\\



    //Envoi de la requête SQL au serveur\\
    fetch("http://localhost:3001/api/data2", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ sql: sql }),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
        alert(data);
      })
      .catch((error) => {
        console.error("Error:", error);
      });
    }
    //-----------------------------------\\
  


  //Création du ping\\
  function CréerMarker(event) {
    event.preventDefault();
    const name = document.querySelector('#store_name').value;
    L.marker([coordlat, coordlng], { icon: pingBoutique }).addTo(map)
      .bindPopup(name)
      .openPopup();
  }
  //----------------\\
  
  //-----------------------------\\



// Boucle
//setInterval(locate, 3000);