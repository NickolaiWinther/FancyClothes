<?php 
session_start();

    if (isset($_POST["heading"])) {
        
        $heading = $_POST['heading'];
        // $imgSrc = $_POST['imgSrc'];
        $imgSrc;
        $imgAlt = $_POST['imgAlt'];
        $timestamp = time();
        $content = $_POST['content'];
        $userId = $_SESSION['userId'];
        $stars = $_POST['stars'];
        $categoryId = $_POST['categoryId'];
        $price = $_POST['price'];
    
        $imgSrc = basename($_FILES["imgSrc"]["name"]);
    
        $target_dir = "../img/";
        $target_file = $target_dir . basename($_FILES["imgSrc"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["imgSrc"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["imgSrc"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["imgSrc"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["imgSrc"]["name"]). " has been uploaded.";

                require_once "connect.php";
                $statement = $dbh->prepare("INSERT INTO products (heading, imgSrc, imgAlt, timestamp, content, userId, stars, categoryId, price) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $statement->bindParam(1, $heading);
                $statement->bindParam(2, $imgSrc);
                $statement->bindParam(3, $imgAlt);
                $statement->bindParam(4, $timestamp);
                $statement->bindParam(5, $content);
                $statement->bindParam(6, $userId);
                $statement->bindParam(7, $stars);
                $statement->bindParam(8, $categoryId);
                $statement->bindParam(9, $price);
            
                $statement->execute();
            
                header("location: ../index.php");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    
?>
