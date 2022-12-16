<?php 
require_once('../login_signin/connexion.php');

session_start();
session_destroy();

header('location: ../login_signin/log in bootsttrap.php');
die();
?>