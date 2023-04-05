<?php

$page_title =" Administration - CTCBD.com";

ob_start()
?>
<div>
    <div class="image-acceuil">
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1 class="titreAccueil">Espace Admin<br>  </h1>
        <br>
        <br>
        <div class="tableInfoBoutique">
        <h3 class="tableTitleScores">ID</h3>
        <h3 class="tableTitleScores">ID du Producteur</h3>
        <h3 class="tableTitleScores">Enseigne</h3>
        <h3 class="tableTitleScores">Adresse</h3>
        <h3 class="tableTitleScores">Numero Téléphone</h3>
        <h3 class="tableTitleScores">Email</h3>
        <h3 class="tableTitleScores">Site Web</h3>
        <h3 class="tableTitleScores">Type Produit</h3>

    </div>

 
    <div class="tableBoutiques">
        <?php

            $requeteValidationUser= 'SELECT * FROM store WHERE statut = 0';

            $Validation = $conn -> prepare($requeteValidationUser);
            $Validation -> execute();

            while($AllValidation = $Validation -> fetch()){
            ?>
            <div class="boutiques">

                <p><?= $AllValidation['id'];  ?></p>
                <p><?= $AllValidation['id_producteur']; ?></p>
                <p><?= $AllValidation['enseigne'];  ?></p>
                <p><?= $AllValidation['adresse'];  ?></p>
                <p><?= $AllValidation['numero'];  ?></p>
                <p><?= $AllValidation['email']; ?></p>
                <p><?= $AllValidation['web'];  ?></p>
                <p><?= $AllValidation['type'];  ?></p>


                <div id="operation">
                    <form method="POST" action="" id="operation_auto">
                        <input type="hidden" name="idUser1" id="idUser1" value="<?=$AllValidation['id']  ?>">
                        <input type="submit" name="buttonAcceptation" id="idUser1" value="Autorisé">
                    </form>
                    <form method="POST" action="" id="operation_refu">
                        <input type="hidden" name="idUser2" id="idUser2" value="<?=$AllValidation['id']  ?>">
                        <input type="submit" name="buttonRefus" id="idUser2" value="Refusé">
                    </form>
                </div>
            </div>
            <?php
            }
            ?>
        
    </div>


</main>



<?php
if(isset($_POST['buttonAcceptation'])){
    $update = 'UPDATE store SET statut = 1 WHERE id = ?;';
    $updateUsers = $conn -> prepare($update);
    $updateUsers -> execute([$_POST['idUser1']]);
}

if(isset($_POST['buttonRefus'])){
    $update = 'DELETE FROM store WHERE id = ?;';
    $updateUsers = $conn -> prepare($update);
    $updateUsers -> execute([$_POST['idUser2']]);
}


$page_content = ob_get_clean();

?>
