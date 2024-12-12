<?php

$servername = "localhost";
$username = "root";
$passwrd = "";
$database = "jeux_geo";
                            
$connect = mysqli_connect($servername, $username, $passwrd, $database);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>