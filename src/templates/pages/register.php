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
<div class="plants">
        <img src="assets/imgs/beuh4.png" class="beuh" onclick="disappear(event)">
    </div>
    <div class="plants2">
        <img src="assets/imgs/beuh4.png" class="beuh" onclick="disappear(event)">
    </div>
    <div class="plants3">
        <img src="assets/imgs/beuh4.png" class="beuh" onclick="disappear(event)">
    </div>
    <div class="plants4">
        <img src="assets/imgs/beuh4.png" class="beuh" onclick="disappear(event)">
    </div>
    <div class="plants5">
        <img src="assets/imgs/beuh4.png" class="beuh" onclick="disappear(event)">
    </div>
    
    <script>
        
            var score = 0;

            var secretButton = document.getElementById("secret");

            if (score === 20) {
                secretButton.style.display = "inline-block";
            } else {
                secretButton.style.display = "none";
            }

            function disappear(event) {
                addScore();
                var beuh = event.target;
                beuh.classList.add("hide");
                setTimeout(function() {
                    beuh.classList.remove("hide");                
                }, 3000);
            }

            function addScore() {
                score++;
                document.getElementById("score").innerHTML = "🌿 : " + score;
            }

    </script>


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
                <span class="gender">👨</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="gender">👩</span>
              </label>
              <label for="dot-3">
                <span class="dot three"></span>
                <span class="gender">🚜</span>
                </label>
              </div>
            </div>

            <div class="button">
              <input type="submit" value="Register">
              <br>
              <br>
              <form action="/?page=accueilUser">
              <div id="score">🌿 : 0</div>
              <button id="secret" style="display:none;">Secret</button>
              </div>
              </form>
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
$page_content = ob_get_clean();

?>