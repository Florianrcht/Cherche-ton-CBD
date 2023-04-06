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
        <form action="#" method="POST" id="recherche">
            <label for="coordlat">Rechercher une boutique :</label>
            <input type="text" id="recherche_boutique" name="recherche_boutique">
            <input type="submit" id="rechercher" name="rechercher">
        </form>
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
        if(isset($_POST['rechercher'])){
            $recherche = $_POST['recherche_boutique'];
            $requeteValidationUser= "SELECT * FROM store WHERE statut=0 AND ( id LIKE '%$recherche%' OR id_producteur LIKE '%$recherche%' OR enseigne LIKE '%$recherche%' OR adresse LIKE '%$recherche%' OR numero LIKE '%$recherche%' OR email LIKE '%$recherche%' OR web LIKE '%$recherche%' OR type LIKE '%$recherche%')";
        } else {
            $requeteValidationUser= 'SELECT * FROM store WHERE statut=0 ';
        }

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
                <input type="hidden" name="IdUser1" value="<?=$AllValidation['id']?>">
                <input type="submit" id="IdUser1" name="buttonAcceptation" value="Autorisé">
            </form>
            <form method="POST" action="" id="operation_refu">
                <input type="hidden" name="IdUser2" value="<?=$AllValidation['id']?>">
                <input type="submit" id="IdUser2" name="buttonRefus" value="Bannir">
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
    $updateUsers -> execute([$_POST['IdUser1']]);
}

if(isset($_POST['buttonRefus'])){
    $update = 'DELETE FROM store WHERE id = ?;';
    $updateUsers = $conn -> prepare($update);
    $updateUsers -> execute([$_POST['IdUser2']]);
}



$page_content = ob_get_clean();

?>
