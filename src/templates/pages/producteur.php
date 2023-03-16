

    
<?php


$page_title =" Boutiques - CTCBD.com";

ob_start()
?>
<div id="accueil_body1">
<div id="accueil_title">

        <br>        
        <br>
        <h1> Votre Magasin | CTCBD </h1>
        <br>
        <br>

</div>
    <div id="form_prod">
    <h2> Formulaire d'adhésion : </h2>
    <br>
    <form action="#" method="POST" id="form">
        <label for="store_name">(ID PRODUCTEUR) :</label>
        <input type="int" id="prod_id" name="prod_id" required><br><br>

        <label for="store_name">Nom du magasin :</label>
        <input type="text" id="store_name" name="store_name" required><br><br>
        
        <label for="store_address">Adresse :</label>
        <input type="text" id="store_address" name="store_address" required><br><br>
        
        <label for="store_phone">Téléphone :</label>
        <input type="tel" id="store_phone" name="store_phone" required><br><br>
        
        <label for="store_email">Email :</label>
        <input type="email" id="store_email" name="store_email" required><br><br>
        
        <label for="store_website">Site web :</label>
        <input type="url" id="store_website" name="store_website"><br><br>
        
        <label for="coordlat">Coordonnées latitude :</label>
        <input type="text" id="coordlat" name="coordlat" required><br><br>
        
        <label for="coordlng">Coordonnées longitude :</label>
        <input type="text" id="coordlng" name="coordlng" required><br><br>

        <label for="cbd_products">Produits CBD vendus :</label>
        <input type="text" name="cbd_products" required></input><br><br>
        
        <input type="submit" value="Envoyer">
    </form>
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>

<script type="module" src="../../assets/js/producteur/producteur.js"></script>

<div id="map"></div>



<?php
// Récupérer la position actuelle de l'utilisateur
$location = file_get_contents('https://ipapi.co/json/');
$location = json_decode($location, true);
$latitude = $location['latitude'];
$longitude = $location['longitude'];

// Effectuer une requête de recherche de magasins de CBD à proximité
$url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$latitude,$longitude&radius=50000&type=health&keyword=cbd&key=YOUR_API_KEY";
$places = file_get_contents($url);
$places = json_decode($places, true);

// Boucle sur les résultats de la requête et afficher les noms des magasins
foreach ($places['results'] as $place) {
  echo $place['name'] . "<br>";
}

$page_content = ob_get_clean();



?>



</body>

</html>



