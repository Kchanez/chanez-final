<?php
$user = 0;
$success = 0;

require('connexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo 'good';
    $username = $_POST['user'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM connexion WHERE user='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num>0) {
            $user = 1;
            echo 'user exists';
        }else {
            $sql = "INSERT INTO connexion (user, password) VALUES ('$username', '$pass')";
        }
        $result = mysqli_query($conn,$sql);
        if ($result) {
            $success = 1;
            header('location:log in bootsttrap.php');
            Die();
        }else {
            mysqli_connect_error();
        }
    }
}