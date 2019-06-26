<?php 
    require("header.php");
?>
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
    <aside>
        <div class="categories">
            <div class="catTop">
                <h4>Kategorier:</h4>
            </div>
            <div class="catMain">
                <ul>
                    <?php require("assets/getCategories.php"); 
                    foreach ($categories as $category) { ?>

                        <li><a href="index.php?category=<?php echo $category ?>"><?php echo $category ?></a></li>

                    <?php } ?>
                    <!-- <li><a href="#">Jakker</a></li>
                    <li><a href="#">Bukser</a></li>
                    <li><a href="#">Skjorter</a></li>
                    <li><a href="#">Strik</a></li>
                    <li><a href="#">T-shirts & Tank tops</a></li>
                    <li><a href="#">Tasker</a></li> -->
                </ul>
            </div>
        </div>

        <div class="newsletter">
            <div class="newsTop">
                <h4>Tilmeld nyhedsbrev</h4>
            </div>
            <div class="newsMain">
                <form action="">
                    <input type="text" placeholder="Navn">
                    <input type="email" placeholder="Email">
            </div>
            <div class="newsBottom">
                <input type="submit" value="Tilmeld">
                </form>
            </div>
        </div>
    </aside>
    <div class="products">
        <h3>INSPIRATION</h3>
        <hr>
        <div class="inspiration">
            <div class="catMen">
                <img src="img/kategoriHerre.jpg" alt="">
                <h5>Herretøj</h5>
                <div class="action">Lær mere</div>
            </div>
            <div class="catWomen">
                <img src="img/kategoriKvinde.jpg" alt="">
                <h5>Kvindetøj</h5>
                <div class="action">Lær mere</div>
            </div>
        </div>
        <div class="frontProducts">

            <?php 
                require("assets/getProducts.php");
            ?>
        </div>
    </div>
</main>

<?php 
    require("footer.php"); 
?>
