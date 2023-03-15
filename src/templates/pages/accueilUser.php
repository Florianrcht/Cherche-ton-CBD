<?php

$page_title =" Accueil - CTCBD.com";

ob_start()
?>
<div>
    <div class="image-acceuil">
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1 class="titreAccueil">Bienvenue !<br>  </h1>
        <p class="accrocheTitre">Venez tester le meilleur CBD 100% BIO</p>
        <div class="blocShop">
            <a href="?page=boutiques" class="Shop">
                <div>Trouver un shop !</div>
            </a>
        </div>
    </div>
</div>
<br><br><br>
<div class="descri">
    <div class="text">
        <div class ="text1">
            <h3>Qu’est ce que le Cannabidiol (CBD) ?</h3><br>
            <p>Pour comprendre ce qu'est le CBD, il est important de savoir<br>que la plante de Cannabis est composée de plusieurs molécules,<br> appelées Cannabinoïdes.
                Longtemps connue <br> pour sa molécule THC et ses effets psychoactifs, <br> la plante de Cannabis dévoile peu à peu d’autres molécules aux <br> nombreux bienfaits, tels que le CBD.
                Lorsque <br> la plante contient moins de 0,2% de THC, <br> on parle alors de « fleur de chanvre ».
            </p>
        </div>
        <br><br><br>
        <div class ="text2">
            <h3>Quelle différence entre le CBD et le THC ?</h3><br>
            <p>À son état naturel, le Cannabis est chargé en moyenne <br> de 15 à 25% de THC. Cette concentration est <br>
                responsable  des effets psychoactifs, dits « planants ». <br> C’est pourquoi la fleur de Cannabis est considérée 
                <br> comme un stupéfiant, et sa consommation est illégale <br> en France, et dans plusieurs pays d’Europe.<br>
                Cependant, le Cannabidiol (CBD) n’a aucun effet psychoactif.<br> Il procure au contraire des effets positifs sur le corps humain, 
                <br> et notamment des propriétés relaxantes, telles <br> qu’une sensation de détente et de bien être.<br> 
                De plus, le CBD ne présente pas de risques d’addiction <br>ni de dépendance, et n’est absolument pas toxique. <br>
                La consommation de CBD, même à une dose élevée,<br> ne présente pas de risque de crises d’angoisse souvent 
                <br>associées à la consommation de THC.
            </p>
        </div>
    </div>
    <div class ="image-descri">
        <img src="assets/imgs/beuh2.jpeg">
    </div>

</div>
    <br>
    <br>
            <h2 class="team">Notre Équipe</h2>
            <p class="accrocheTeam">Fumez la vie avant que la vie vous fume !</p>
        <div class="blocCreateurs">
            <div id="Createurs">
                <img src="assets/imgs/teteBeuh.png" alt="Photo de profil " id="Pdp">
                <p id="nomsTeam">T</p>
                <p id="textJob">Developpeur</p>
            </div>
            <div id="Createurs">
                <img src="assets/imgs/teteBeuh.png" alt="Photo de profil " id="Pdp">
                <p id="nomsTeam">F</p>
                <p id="textJob">Developpeur</p>
            </div>
            <div id="Createurs">
                <img src="assets/imgs/teteBeuh.png" alt="Photo de profil " id="Pdp">
                <p id="nomsTeam">B</p>
                <p id="textJob">Developpeur</p>
            </div>
        </div>
    </div>



<?php
$page_content = ob_get_clean();

?>
