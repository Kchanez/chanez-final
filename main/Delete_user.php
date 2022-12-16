<?php 

require_once('header.php'); 
require_once('../login_signin/connexion.php');

if (isset($_GET['id']))
{
	$id=$_GET['id'];
	echo $id ;
	$query = "DELETE FROM `etudiants` WHERE id='$id'";
	$sql = mysqli_query($conn , $query);
	if($sql)
	{
		echo "l'utilisateur a été supprimer avec succès";
		header('location: main.php');
	}
	else 
	{
		echo "oops";
		header("location: main?error=fail");
	}
}


