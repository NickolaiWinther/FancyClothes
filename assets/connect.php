<?php 
    $servername = "localhost";
    $dbName = "fancyclothes";
    $username = "root";
    $password = "";

    try {
        $dbh = new PDO("mysql:host=$servername;dbname=$dbName; charset=utf8", $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Det virker!";
    } 
    catch (PDOException $e) {
        echo "Noget gik galt!: " . $e->getMessage();
    }
?>