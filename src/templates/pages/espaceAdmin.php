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
        <table>
  <thead>
    <tr>
      <th>ID</th>
      <th>ID producteur</th>
      <th>Enseigne</th>
      <th>Adresse</th>
      <th>Numéro de Téléphone</th>
      <th>Email</th>
      <th>Site Web</th>
      <th>Type Produit</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $requeteValidationUser= 'SELECT * FROM store';

    $Validation = $conn -> prepare($requeteValidationUser);
    $Validation -> execute();

    while($AllValidation = $Validation -> fetch()){ 
        ?>
      <tr class="tr_données">
        <td class="td_données"><?= $AllValidation['id']; ?></td>
        <td  class="td_données"><a href ="?page=espaceFondateur"><?= $AllValidation['id_producteur']; ?></td>
        <td class="td_données"><?= $AllValidation['enseigne']; ?></td>
        <td class="td_données"><?= $AllValidation['adresse']; ?></td>
        <td class="td_données"><?= $AllValidation['numero']; ?></td>
        <td class="td_données"><?= $AllValidation['email']; ?></td>
        <td class="td_données"><?= $AllValidation['web']; ?></td>
        <td class="td_données"><?= $AllValidation['type']; ?></td>
        <td class="td_données">
        <form method="POST" action="" id="operation_auto">
                        <input type="hidden" name="idUser1" id="idUser1" value="<?=$AllValidation['id']  ?>">
                        <input type="submit" name="buttonAcceptation" id="idUser1" value="Autorisé">
                    </form>
          <form method="POST" action="" id="operation_refu">
            <input type="hidden" name="idUser2" id="idUser2" value="<?=$AllValidation['id']?>">
            <input type="submit" name="buttonRefus" id="idUser2" value="Bannir">
          </form>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>


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
