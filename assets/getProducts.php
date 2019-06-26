<?php 
    require "connect.php";

    if(isset($_GET["category"])){
        $statement = $dbh->prepare("SELECT * FROM `products` JOIN users ON products.userId = users.userId JOIN categories ON products.categoryId = categories.categoryId WHERE categories.name = ?");
        $statement->bindParam(1, $_GET["category"]);
    } else{
        $statement = $dbh->prepare("SELECT * FROM `products` JOIN users ON products.userId = users.userId JOIN categories ON products.categoryId = categories.categoryId");
    }
    $statement->execute();

    $noProducts = true;

    while ($row = $statement->fetch()) { 
        $noProducts = false;
        ?>
        <article>
            <img src="img/<?php echo $row["imgSrc"] ?>" alt="<?php echo $row["imgAlt"] ?>">
            <div class="info">
                <h3><?php echo $row["heading"] ?></h3>
                <div class="stars">
                <?php 
                    for ($i=0; $i < 5 ; $i++) { 
                        echo $row["stars"] > $i ? "<i class='fa fa-star' aria-hidden='true'></i>" : "<i class='fa fa-star-o' aria-hidden='true'></i>";
                    }
                ?>
                </div>
            </div>
            <div class="description">
                <div class="published">
                    <?php 
                        setlocale(LC_TIME, "danish");
                        echo "Oprettet: " . strftime("%A %e. %B", $row["timestamp"]) . " af ". $row["username"] 
                    ?> 
                </div>
                <p><?php echo $row["content"] ?>
                    <a href="#">Læs mere...</a></p>
                <!-- Mulighed for sletning herunder -->
                <?php 
                if (isset($_SESSION['accessLevel'])) { 
                    if ($_SESSION['accessLevel'] == 1 || ($_SESSION['accessLevel'] == 2 && $_SESSION['username'] == $row['username'])){ ?>
                    
                    <a href="assets/deleteProduct.php?id=<?php echo $row["productId"] ?>" class="deleteMe">
                
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </a>
                    
                <?php } }?>
            </div>
        </article>
    <?php 
    }
$dbh = null;
?>