<?php 
    session_start(); 
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title ?> | FancyClothes.dk</title>
    <meta name="description" content="<?php echo $metaDescription ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="icon" href="img/homeicon.png" >

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Karla|Lato|Oswald" rel="stylesheet">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/slider.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div class="top container">
        <div class="language">
            <div class="flag">
                <img src="img/ikon.png" alt="Dansk ikon">
                <span>Dansk</span>
            </div>
            <span>DKK</span>
        </div>
        <div class="search">
            <input type="text" placeholder="Indtast søgning"><input type="submit" value="Søg">
        </div>
    </div>
    <hr>
    <div class="container home">
        <a href="index.php"><img src="img/homeIcon.png" alt="Forside ikon"></a>
        <!-- Velkomstbesked -->
        <h2><?php 
            echo isset($_SESSION["username"]) ? "Velkommen ". $_SESSION["username"] : "" ; 
        ?></h2>
    </div>
    <hr>
    <div class="container navbar">
        <nav>
            <ul>
                <li class="<?php echo $title == "Forside" ? "active" : "" ?>"><a href="index.php">Forside</a></li>
                <li><a href="#">Produkter</a></li>
                <li><a href="#">Nyheder</a></li>
                <li><a href="#">Handelsbetingelser</a></li>
                <li class="<?php echo $title == "Om os" ? "active" : "" ?>"><a href="about.php">Om os</a></li>

                <?php if(!isset($_SESSION["username"]) || $_SESSION["accessLevel"] == 1) { ?>
                    <!-- Hvis man ikke er logget ind, eller har accesslevel 1 -->
                    <li class="<?php echo $title == "Opret bruger" ? "active" : "" ?>"><a href='register.php' >Opret bruger</a></li>
                    
                    <?php } if(isset($_SESSION["accessLevel"])) { ?>
                    <!-- Hvis man er logget ind -->
                    <li><a href='assets/logout.php' class=''>Log ud</a></li>

                    <?php } else { ?>
                    <!-- Hvis man ikke er logget ind -->
                    <li><a href='#' class='loginBtn'>Log ind</a></li>
                    <?php } ?>
            </ul>
        </nav>
        <div class="basket">
            <div class="basketContent">
                <p>Din indkøbskurv er tom</p>
            </div>
            <div class="shopIcon">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <div class="login container">
        <!-- Fejlbesked ved login -->
        <?php echo isset($_GET["error"]) == "login" ? "<p class='errormsg'>Fejl ved login</p>" : "" ?>

        <form action="./assets/login.php" method="post">
            <label for="formUsername">Bruger:</label>
            <input type="text" id="formUsername" name="formUsername" placeholder="Brugernavn" 
            value="<?php echo isset($_GET["loginError"]) ? $_GET["loginError"] : "" ?>" required>

            <label for="formPassword">Password:</label>
            <input type="password" id="formPassword" name="formPassword" placeholder="Password" required>

            <!-- Den nuværende side, som man bliver sendt tilbage til, når man logger ind -->
            <input type="text" name="surrentPage" 
            value="<?php echo basename($_SERVER["PHP_SELF"]) ?>" hidden>

            <input type="submit" value="Log ind">
        </form>

        <a id="newUser" href="register.php">Ny bruger?</a>
    </div>
    <hr>
    <div class="container">
        <ul class="slider" id="slider">
            <li><img src="img/slide1.jpg" alt=""></li>
            <li><img src="img/slide2.jpg" alt=""></li>
            <li><img src="img/slide3.jpg" alt=""></li>
        </ul>
    </div>
    <hr class="hide400">
    <h1 class="tagline">FancyClothes.DK - tøj, kvalitet, simpelt!</h1>
    <hr>
    