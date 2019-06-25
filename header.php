<?php 
    session_start(); 
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Forside | FancyClothes.dk</title>
    <meta name="description" content="Velkommen til FancyClothes.dk">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

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
                <li class="active"><a href="index.php">Forside</a></li>
                <li><a href="#">Produkter</a></li>
                <li><a href="#">Nyheder</a></li>
                <li><a href="#">Handelsbetingelser</a></li>
                <li><a href="#">Om os</a></li>

                <?php if(isset($_SESSION["username"])) { ?>

                    <li><a href='assets/logout.php' class=''>Log ud</a></li>
                
                <?php } else { ?>

                    <li><a href='#' class='loginBtn'>Log ind</a></li>
                    <li><a href='assets/register.php'>Opret bruger</a></li>

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
        <form action="./assets/login.php" method="post">
            <label for="formUsername">Bruger:</label>
            <input type="text" id="formUsername" name="formUsername" placeholder="Brugernavn" required>
            <label for="formPassword">Password:</label>
            <input type="password" id="formPassword" name="formPassword" placeholder="Password" required>
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
    <?php if(isset($_SESSION["accessLevel"])) { ?>

    <div class="createArticle container">


        <h3 class="center errorMsg">Opret ny vare:</h3>
        <form action="assets/createProduct.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="imgSrc">Billede</label>
                <input type="file" id="imgSrc" name="imgSrc" placeholder="Vælg billede" required>
            </div>
            <div>
                <label for="imgAlt">Alt tekst</label>
                <input type="text" id="imgAlt" name="imgAlt" placeholder="Billedets alttekst..." required>
            </div>
            <div>
                <label for="heading">Overskrift</label>
                <input type="text" id="heading" name="heading" placeholder="Overskrift..." required>
            </div>
            <div>
                <label for="price">Overskrift</label>
                <input type="text" id="price" name="price" placeholder="Pris..." required>
            </div>
            <div>
                <label for="content">Brødtekst</label>
                <textarea name="content" id="content" cols="30" rows="10" placeholder="Brødtekst..." required></textarea>
            </div>
            <div>
                <label for="stars">Antal stjerner</label>
                <select name="stars" id="stars">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <label for="categoryId">Kategori</label>
                <select name="categoryId" id="categoryId" required>
                    <option value="1">Bukser</option>
                    <option value="2">Jakker</option>
                    <option value="3">Skjorter</option>
                    <option value="4">Strik</option>
                    <option value="5">T-shirts og tanktops</option>
                    <option value="6">Tasker</option>
                    <option value="7">Sko</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Opret" name="value">
            </div>
        </form>

    </div>
    <?php } ?>
    <main class="container">