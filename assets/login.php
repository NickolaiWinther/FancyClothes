<?php 
    $formUsername = $_POST["formUsername"];
    $formPassword = $_POST["formPassword"];

    require "connect.php";

    $statement = $dbh->prepare("SELECT * FROM users WHERE username = ? && password = ?");
    $statement->bindParam(1, $formUsername);
    $statement->bindParam(2, $formPassword);
    $statement->execute();


    if(empty($row = $statement->fetch()) ){
        echo "Fejl i password eller username";
        header("location: ../index.php?error=login&email=$email");
    }else{
        session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['accessLevel'] = $row['accessLevel'];
        $_SESSION['userId'] = $row['userId'];

        print_r($formUsername);
        print_r($formPassword);
        header("location: ../index.php");
    }
    
    $dbh = null;
?>