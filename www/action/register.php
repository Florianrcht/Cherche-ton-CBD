<?php
// Connexion à la base de données


// Traitement du formulaire d'inscription

if(isset($_POST['submit'])) {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $telephone = $_POST['telephone'];
  $mot_de_passe = $_POST['mot_de_passe'];
  $genre = $_POST['genre'];

  // Validation des données
  // ...

  // Hachage du mot de passe
  $mot_de_passe_hache = password_hash($mot_de_passe, PASSWORD_DEFAULT);

  // Insertion des données dans la table users
  $sql = "INSERT INTO users (nom, prenom, email, telephone, mot_de_passe, genre) VALUES (:nom, :prenom, :email, :telephone, :mot_de_passe, :genre)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':nom', $nom);
  $stmt->bindParam(':prenom', $prenom);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':telephone', $telephone);
  $stmt->bindParam(':mot_de_passe', $mot_de_passe_hache);
  $stmt->bindParam(':genre', $genre);

  $stmt->execute();

  // Redirection vers la page de confirmation ou d'erreur
  // ...
}
?>