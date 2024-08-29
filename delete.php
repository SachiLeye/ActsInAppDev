<?php
    if(isset($_GET["ID"])){
        $id = $_GET["ID"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "sachi_db";

        $connection = new mysqli($servername, $username, $password, $database);

        $sql = "DELETE FROM products WHERE ID = $id";
        $connection->query($sql);
    }
    
    header("location: /ActsAppDev/index.php");
    exit;
?>