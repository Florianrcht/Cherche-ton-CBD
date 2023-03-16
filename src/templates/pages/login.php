<?php

$page_title =" Accueil - CTCBD.com";

ob_start()
?>

  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <!--<img src="images/frontImg.jpg" alt="">-->
        <div class="text">
          <span class="text-1">Chaque joint est une <br> nouvelle aventure</span>
          <span class="text-2">Allez vous connecter !</span>
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
          <form action="#">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Entrer votre email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Entrer votre mot de passe" required>
              </div>
              <div class="text"><a href="#">Mot de passe oublié ?</a></div>
              <div class="button input-box">
                <input type="submit" value="Envoyer">
              </div>
              <div class="text sign-up-text">Vous-avez déjà un compte ? <label for="flip">><a href="register.php"> Connectez-vous !</a></label></div>
            </div>
        </form>
      </div>
        
    </div>
  </div>
<?php
$page_content = ob_get_clean();

?>