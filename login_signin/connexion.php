<?php 

$conn = mysqli_connect("localhost", "root", "", "minprojet");

if (!$conn) {
    echo "connection error awdi!" . mysqli_connect_error();
}