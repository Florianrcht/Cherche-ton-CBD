<?php

$page_title =" Accueil - CTCBD.com";

ob_start()
?>

  <div class="container">
    <div class="title">Inscription</div>
    <div class="content">
      <form action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nom</span>
            <input type="text" placeholder="Entrer votre nom" required>
          </div>
          <div class="input-box">
            <span class="details">Prénom</span>
            <input type="text" placeholder="Entrer votre prénom" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Entrer votre email" required>
          </div>
          <div class="input-box">
            <span class="details">Numéro de téléphone</span>
            <input type="text" placeholder="Entrer votre numéro de téléphone" required>
          </div>
          <div class="input-box">
            <span class="details">Mot de passe</span>
            <input type="text" placeholder="Entrer votre mot de passe" required>
          </div>
          <div class="input-box">
            <span class="details">Confirmer le mot de passe</span>
            <input type="text" placeholder="Confirmer votre mot de passe" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
          <span class="gender-title">Genre</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Homme</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Femme</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Tracteur</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
          <br>
          <br>
          <form action="/?page=accueilUser">
          <a href="/?page=accueilUser" aria-current="page">Home</a>
          </form>
        </div>
      </form>
    </div>
  </div>

  <?php
$page_content = ob_get_clean();

?>


