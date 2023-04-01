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

$pages = ['accueilUser', 'boutiques', 'login', 'producteur','register','administrateur'];

if ($statut == 10) {
    if ($page === 'administrateur') {
        header('Location: ?page=accueilUser');
        exit;
    }
} elseif ($statut == 2000) {
    $pages[] = 'administrateur';

} else {
        
    $pages = ['login'];
}



if (!in_array($page, $pages)) {
    header('Location: ?page=accueilUser');
    exit;
}
