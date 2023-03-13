<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navbar</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Flex:opsz,wght@8..144,100;8..144,300;8..144,500;8..144,700;8..144,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
  
    <nav>

      <a href="#" class="nav-icon" aria-label="visit homepage" aria-current="page">
        <img src="assets/imgs/weed.png" alt="weed icon">
        <span>ChercheTaFrappe</span>
      </a>

      <div class="main-navlinks">
        <button class="hamburger" type="button" aria-label="Toggle navigation" aria-expanded="false">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <div class="navlinks-container">
          <a href="#" aria-current="page">Home</a>
          <a href="/?page=boutiques">Les Shops</a>
          <a href="/?page=contact">Contact</a>
        </div>
      </div>

      <div class="nav-authentication">
        <a href="#" class="sign-user" aria-label="Sign in page">
          <img src="ressources/user.svg" alt="user-icon">
        </a>
        <div class="sign-btns">
          <button type="submit">Inscription</button>
          <button type="submit">Connexion</button>
        </div>
      </div>
    </nav>


    

    <script src="script.js"></script>
  </body>
</html> 