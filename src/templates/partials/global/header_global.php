
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Flex:opsz,wght@8..144,100;8..144,300;8..144,500;8..144,700;8..144,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
  
    <nav>

      <a href="/?page=accueilUser" class="nav-icon" aria-label="visit homepage" aria-current="page">
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
          <a href="/?page=accueilUser" aria-current="page">Home</a>
          <a href="/?page=boutiques">Les Shops</a>
          <a href="/?page=producteur">Votre Magasin</a>
          <a href="/?page=contact">Contact</a>
        </div>
      </div>

      <div class="nav-authentication">
        <a href="#" class="sign-user" aria-label="Sign in page">
        </a>
        <div class="sign-btns">
          <div id="inscription" ><?= $_SESSION['user']['prenom']?></div>
        </div>
      </div>
    </nav>
    <script>
  // Sélectionnez le bouton d'inscription
  const inscriptionBtn = document.getElementById("inscription");

  // Ajoutez un événement "click" au bouton d'inscription
  inscriptionBtn.addEventListener("click", function() {
    // Créez le menu déroulant
    const dropdownMenu = document.createElement("div");
    dropdownMenu.classList.add("dropdown-menu");
    
    // Ajoutez le lien de déconnexion dans le menu déroulant
    const deconnexionLink = document.createElement("a");
    deconnexionLink.classList.add("option");
    deconnexionLink.setAttribute("href", "/?page=disconnect");
    deconnexionLink.textContent = "disconnect";
    dropdownMenu.appendChild(deconnexionLink);
    
    // Ajoutez le menu déroulant à la div "sign-btns"
    const signBtns = document.querySelector(".sign-btns");
    signBtns.appendChild(dropdownMenu);
  });
</script>
    

