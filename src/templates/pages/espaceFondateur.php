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
        <table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Prénom</th>
      <th>Nom</th>
      <th>Email</th>
      <th>Numéro</th>
      <th>Statut</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $requeteValidationUser= 'SELECT * FROM users';

    $Validation = $conn -> prepare($requeteValidationUser);
    $Validation -> execute();

    while($AllValidation = $Validation -> fetch()){ 
        ?>
      <tr class="tr_données">
        <td class="td_données"><?= $AllValidation['id']; ?></td>
        <td class="td_données"><?= $AllValidation['prenom']; ?></td>
        <td class="td_données"><?= $AllValidation['nom']; ?></td>
        <td class="td_données"><?= $AllValidation['email']; ?></td>
        <td class="td_données"><?= $AllValidation['numero']; ?></td>
        <td class="td_données"><?= $AllValidation['statut']; ?></td>
        <td class="td_données">
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

if(isset($_POST['buttonRefus'])){
    $update = 'DELETE FROM users WHERE id = ?;';
    $updateUsers = $conn -> prepare($update);
    $updateUsers -> execute([$_POST['idUser2']]);
}


$page_content = ob_get_clean();

?>




