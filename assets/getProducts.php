<?php 
    require "connect.php";

    if(isset($_GET["category"])){
        $statement = $dbh->prepare("SELECT * FROM `products` JOIN users ON products.userId = users.userId JOIN categories ON products.categoryId = categories.categoryId WHERE categories.name = ?");
        $statement->bindParam(1, $_GET["category"]);
    } else{
        $statement = $dbh->prepare("SELECT * FROM `products` JOIN users ON products.userId = users.userId JOIN categories ON products.categoryId = categories.categoryId");
    }
    $statement->execute();

    while ($row = $statement->fetch()) { ?>
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
                            echo "Oprettet: " . strftime("%A. %e %B", $row["timestamp"]) . " af ". $row["username"] 
                        ?> 
                    </div>
                    <p><?php echo $row["content"] ?>
                        <a href="#">Læs mere...</a></p>
                    <!-- Mulighed for sletning herunder -->
                </div>
            </article>
        <?php 
    }
$dbh = null;
?>