<?php

$page_title =" Fondateur - CTCBD.com";

ob_start()
?>
<div>
    <div class="image-acceuil">
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1 class="titreAccueil">Espace Fondateur<br>  </h1>
        <br>
        <br>
        <div class="tableInfoBoutique">
        <h3 class="tableTitleScores">ID</h3>
        <h3 class="tableTitleScores">Pseudo</h3>
        <h3 class="tableTitleScores">Email</h3>
        <h3 class="tableTitleScores">Statut</h3>


    </div>

 
    <div class="tableBoutiques">
        <?php

            $requeteValidationUser= 'SELECT * FROM users';

            $Validation = $conn -> prepare($requeteValidationUser);
            $Validation -> execute();

            while($AllValidation = $Validation -> fetch()){
            ?>
            <div class="boutiques">

                <p><?= $AllValidation['id'];  ?></p>
                <p><?= $AllValidation['pseudo']; ?></p>
                <p><?= $AllValidation['password'];  ?></p>
                <p><?= $AllValidation['email'];  ?></p>
                <p><?= $AllValidation['statut'];  ?></p>



                <div id="operation">
                    <form method="POST" action="" id="operation_refu">
                        <input type="hidden" name="idUser2" id="idUser2" value="<?=$AllValidation['id']  ?>">
                        <input type="submit" name="buttonRefus" id="idUser2" value="Bannir">
                    </form>
                </div>
            </div>
            <?php
            }
            ?>
        
    </div>


</main>



<?php

if(isset($_POST['buttonRefus'])){
    $update = 'DELETE FROM users WHERE id = ?;';
    $updateUsers = $conn -> prepare($update);
    $updateUsers -> execute([$_POST['idUser2']]);
}


$page_content = ob_get_clean();

?>




