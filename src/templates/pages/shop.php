<link rel="stylesheet" type="text/css" href="www/assets/css/shop/style.css">

<div class="store-list">
  <?php
    foreach ($places['results'] as $place) {
      echo "<div>" . $place['name'] . "</div>";
    }
  ?>
</div>


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
?>

