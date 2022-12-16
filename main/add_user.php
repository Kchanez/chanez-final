<?php
require_once('header.php');
require_once('../login_signin/connexion.php');
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body style="background-color: white">

<?php  

session_start();
if (isset($_POST['submit']) && $_POST['submit'] == 'Ajouter')
{ 
  // récupérer le nom et prenom de l'utilisateur
    $nom = ($_POST['nom']);
    $prenom = ($_POST['prenom']);
    // récupérer l'email 
    $email = $_POST['email'];
    
  $select = mysqli_query($conn , "SELECT * FROM  etudiants WHERE email = '$email' ");
    if(mysqli_num_rows($select)){
    echo "<div class='alert alert-danger text-center' role='alert'>
            <p> email already used ! </p>
          </div> ";
    header("location: main.php");
    } else {
          $query = "SELECT * FROM etudiants WHERE nom='$nom' ";
          $res = mysqli_query($conn ,$query);
        if($res)
        {
          $user_id = $_SESSION['user_id'];
          $query = "INSERT INTO etudiants (nom,prenom,email,id_user) VALUES ('$nom','$prenom','$email','$user_id') ";
          $res = mysqli_query($conn,$query);
          echo " L'utilisateur a été créée avec succés";
        }
        if($res)
        { 
          echo " L'utilisateur a été créée avec succés";
          header("location: main.php");
        }
        else 
          {
            echo "oops";
            header("location: main?error=fail");
          }
    }
}
?>
</body>
</html>