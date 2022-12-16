<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<?php
session_start();

$user = 0;
$success = 0;

require_once('connexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['user'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM connexion WHERE user='$username'";
    $result = mysqli_query($conn, $sql);

    $affich = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (($username == $affich[0]['user']) && ($pass == $affich[0]['password'])) {
        echo "you are logged in".'<br>' ;
        $_SESSION['user_id'] = $affich[0]['id'];
        header('location:../main/main.php');
    }else {
        $_SESSION['error'] = 'yes';
        header('location:../login_signin/log in bootsttrap.php');
        die();
    }
}
