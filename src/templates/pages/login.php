<?php

if (isset($_POST['submit'])) {
  // Récupération des données du formulaire
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Connexion à la base de données
  require_once __DIR__ . '../../../includes/database.php';

  // Vérifie si c'est les bonne informations
  $requestUser = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
  $requestUser->execute([
    'email' => $email,
    'password' => $password
  ]);
  $user = $requestUser->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    // La session actuelle prends les données de l'utilisateur login
    $_SESSION['user'] = $user; 
    header('Location: /?page=accueilUser');
    exit;
  } else {
    // l'utilisateur n'existe pas ou les informations sont incorrectes
    $errorMessage = 'Email ou mot de passe incorrect';
  }
}

$page_title =" Accueil - CTCBD.com";

ob_start()
?>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <div class="text">
          <span class="text-1">Chaque joint est une <br> nouvelle aventure</span>
          <span class="text-2">Allez vous connecter !</span>
          <br><br>
          <form action="/?page=accueilUser">
          <a href="/?page=accueilUser" aria-current="page">Home</a>
          </form>
		  <div class="back">
           <img class="backImg" src="" alt="">
      	  </div>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Connexion</div>
            <?php if (isset($errorMessage)): ?>
              <div class="error-message"><?= $errorMessage ?></div>
            <?php endif ?>
          <form method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Entrer votre email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Entrer votre mot de passe" required>
              </div>
              <div class="text"><a href="#">Mot de passe oublié ?</a></div>
              <div class="button input-box">
                <input type="submit" name="submit" value="Envoyer">
              </div>
              <div class="text sign-up-text">Vous n'avez pas de compte ? <label for="flip">><a href="/?page=register"> Inscrivez-vous !</a></label></div>
            </div>
        </form>
      </div>
        
    </div>
  </div>
  <?php
$page_content = ob_get_clean();


?>
