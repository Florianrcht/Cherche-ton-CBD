<?php
session_start(); 
session_unset();
$_SESSION['user']['id']=6;
$_SESSION['user']['statut']=1;

header('Location: ?page=accueilInvité');
exit;
?>