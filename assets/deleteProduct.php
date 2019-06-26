<?php
session_start();
    if (isset($_SESSION['accessLevel'])) { 
        if ($_SESSION['accessLevel'] == 1 || ($_SESSION['accessLevel'] == 2 && $_SESSION['username'] == $row['username'])){ 

            require "connect.php";

            $productId = $_GET["id"];
        
        
            $statement = $dbh->prepare("DELETE FROM products WHERE productId = ?");
            $statement->bindParam(1, $productId);
            $statement->execute();
        
            header("location: ../index.php");
        }
    }


?>