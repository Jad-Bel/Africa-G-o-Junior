<?php
    include "/xampp/htdocs/africa-geo-junior/views/connect.php";
    if (isset($_GET['id_pays'])) {
        
        $id = $_GET['id_pays'];
        $sql = "Delete FROM pays WHERE id_pays = $id";
        $result = $connect->query($sql);
        echo "1";
    }

    header("location: /africa-geo-junior/adminPage.php");
    exit;
?>