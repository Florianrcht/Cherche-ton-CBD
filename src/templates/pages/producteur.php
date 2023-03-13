
    

<?php

$page_title =" Producteur - CTCBD.com";

ob_start()
?>
<div id="accueil_body1">
<div id="accueil_title">
        <h1> Cherche Ton CBD | Producteur </h1>
    </div>
</div>

<div id="form_producteur">
<h4 id="form_title">Créer votre établissement</h4>
        <form method="POST"  action ="" class="form" id="form">
            <input type="text" id="name" name="name" placeholder="Nom de l'établissement">
            <br><br> 
            <input type="text" id="coordlat" name="coord" placeholder="Coordonnée latitude de l'établissement"></textarea><br><br>
            <input type="text" id="coordlng" name="coord" placeholder="Coordonnée longitude de l'établissement"></textarea><br><br> 
            <button id="bouton_connexion"> Envoyer </button> <!-- Bouton Envoyer -->
        </form>
</div>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>

<script type="module" src="../../assets/js/producteur/producteur.js" ></script>


<div id="map"></div>



<?php
 $requete_date_inscription = "SELECT pseudo FROM producteur WHERE id=1";
 $date_inscription = $conn->prepare($requete_date_inscription);
 $date_inscription->execute();
 $date_inscription = $date_inscription->fetch();
 foreach ($date_inscription as $date_login) {
 }
?>
<?=$date_login?>


<?php


$page_content = ob_get_clean();



?>




</body>
</html>

