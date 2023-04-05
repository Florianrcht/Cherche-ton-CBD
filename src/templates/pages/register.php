<?php

if (isset($_POST['submit'])) {
  // Récupération des données du formulaire
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $numero = $_POST['numero'];
  $password = $_POST['password'];
  $genre = $_POST['genre'];
  $statut = 10;

  // Connexion à la base de données
  require_once __DIR__ . '../../../includes/database.php';

  // Requête d'insertion dans la table users
  $requestUser = $conn->prepare("INSERT INTO users (nom, prenom, email, numero, password, genre, statut) VALUES (?, ?, ?, ?, ?, ?, ?)");

  $requestUser->execute([$nom, $prenom, $email, $numero, $password, $genre, $statut]);
}



$page_title =" Inscription - CTCBD.com";

ob_start()
?>
  <div class="container">
    <div class="title">Inscription</div>
    <div class="content">
      <form action="/?page=register" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nom</span>
            <input type="text" name="nom" placeholder="Entrer votre nom" required>
          </div>
          <div class="input-box">
            <span class="details">Prénom</span>
            <input type="text" name="prenom" placeholder="Entrer votre prénom" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Entrer votre email" required>
          </div>
          <div class="input-box">
            <span class="details">Numéro de téléphone</span>
            <input type="text" name="numero" placeholder="Entrer votre numéro de téléphone" required>
          </div>
          <div class="input-box">
            <span class="details">Mot de passe</span>
            <input type="password" name="password" placeholder="Entrer votre mot de passe" required>
          </div>
          <div class="input-box">
            <span class="details">Confirmer le mot de passe</span>
            <input type="password" name="confirmermotdepasse" placeholder="Confirmer votre mot de passe" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="genre" id="dot-1" value="Homme">
          <input type="radio" name="genre" id="dot-2" value="Femme">
          <input type="radio" name="genre" id="dot-3" value="Engin Agricole">
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
            <span class="gender">Engin Agricole</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Register">
          <br>
          <br>
          <a href="/?page=accueilUser" aria-current="page">Home</a>
        </div>
      </form>
    </div>
  </div>
  <?php
$page_content = ob_get_clean();

?>