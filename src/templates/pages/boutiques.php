

    
<?php


$page_title =" Boutiques - CTCBD.com";

ob_start()
?>
<div id="accueil_body1">
<div id="accueil_title">

        <br>        
        <br>
        <h1> Nos Boutiques | CTCBD </h1>
        <br>
        <br>

    </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.js"></script>
<script type="module" src="../../assets/js/boutiques/boutiques.js"></script>



<div id="map"></div>

<br><br>
<br><br>



<?php
$page_content = ob_get_clean();



?>



</body>

</html>



