<?php

require_once __DIR__ . "/../../src/includes/init.php";

if (!isset($_POST['email'], $_POST['password'], $_POST['cpassword'])) {
	error_die('Erreur du formulaire', '/?page=register');
}

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
	error_die('Email invalide.', '/?page=register');
}

if (strlen($_POST['password']) < 4) {
	error_die('Mot de passe trop court', '/?page=register');
}

if ($_POST['password'] !== $_POST['cpassword']) {
	error_die('Les 2 mot de passe sont differents', '/?page=register');
}