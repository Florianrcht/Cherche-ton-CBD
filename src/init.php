<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/includes/database.php';





if (isset($_GET['page'])) {
    $page = $_GET['page'];
}


if (!isset($_SESSION['user']) && $page !== 'login') {
    header('Location: ?page=login');
    exit;
}


$id = $_SESSION['user']['id'];
$requestStatut = $conn->prepare("SELECT statut FROM users WHERE id = $id");
$requestStatut->execute();
$statut = $requestStatut->fetch()['statut'];

$pages = [
          'recu','shop', //<--- Pages bizarre \\

          'espaceBanni', //<--- Pour les Bannis (0)\\

          'accueilInvité', //<--- Pour les invités (1)\\

          'accueilUser', 'boutiques', 'login', 'producteur','register','contact','profil', //<--- Pour les Utilisateurs (10)\\

          'espaceAdmin', //<--- Pour les Admins (2000)\\

          'espaceFondateur',//<--- Pour les Fondateurs (5000)\\
         ];






////////////////////---DEBUT DES RESTRICTIONS DES ROLES---\\\\\\\\\\\\\\\\\\\\

//Bannies
if ($statut == 0) {
    if (
        $page === 'recu' || $page === 'shop' 
     || $page === 'accueilInvité' 
     || $page === 'accueilUser' || $page === 'boutiques' || $page === 'login' || $page === 'producteur' || $page === 'register'  || $page === 'profil'
     || $page === 'espaceAdmin' 
     || $page === 'espaceFondateur')
     {
        header('Location: ?page=espaceBanni');
        exit;
    }
}

//Invités
else if ($statut == 1) {
    if (
        $page === 'recu' || $page === 'shop' 
     || $page === 'espaceBanni'
     || $page === 'accueilUser' || $page === 'producteur' || $page === 'profil'
     || $page === 'espaceAdmin' 
     || $page === 'espaceFondateur')
     {
        header('Location: ?page=login');
        exit;
    }
}

//Utilisateurs
else if ($statut == 10) {
    if (
        $page === 'recu' || $page === 'shop' 
     || $page === 'espaceBanni'
     || $page === 'accueilInvité' 
     || $page === 'espaceAdmin' 
     || $page === 'espaceFondateur')
     {
        header('Location: ?page=accueilUser');
        exit;
    }
}

//Admins
else if ($statut == 2000) {
    if (
        $page === 'recu' || $page === 'shop' 
     || $page === 'espaceFondateur')
     {        header('Location: ?page=accueilUser');
        exit;
    }
}

//Fondateurs
else if ($statut == 5000) {

} 

//Invité
else {
        
    $pages = ['login'];
}
////////////////////---FIN DES RESTRICTIONS DES ROLES---\\\\\\\\\\\\\\\\\\\\














/*if (!in_array($page, $pages)) {
    header('Location: ?page=accueilUser');
    exit;
}*/
?>