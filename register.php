<?php 
    require("header.php");

    if (isset($_SESSION['username']) && $_SESSION['accessLevel'] != 1) {
        header ("location: index.php");
    }
?>


    <div class="createArticle container">


    <h3 class="center errorMsg">Opret bruger</h3>
    <form action="" method="post">
        <div>
            <label for="formEmail">Email</label>
            <input type="email" name="formEmail" placeholder="Email" 
            value="<?php echo isset($_POST["formEmail"]) ? $_POST["formEmail"] : "" ?>" required>
        </div>
        <div>
            <label for="formUsername">Brugernavn</label>
            <input type="text" name="formUsername" placeholder="Brugernavn" 
            value="<?php echo isset($_POST["formUsername"]) ? $_POST["formUsername"] : "" ?>" required>
        </div>
        <div>
            <label for="formPassword">Adgangskode</label>
            <input type="password" name="formPassword" placeholder="Adgangskode" required>
        </div>
        <div>
            <label for="formPasswordRepeat">Gentag adgangskode</label>
            <input type="password" name="formPasswordRepeat" placeholder="Gantag adgangskode" required>
        </div>
        <?php 
        if (isset($_SESSION['accessLevel']) && $_SESSION['accessLevel'] == 1) { ?>
        <div>
            <label option="formAccessLevel">Access Level (1 er flest rettigheder)</label>
            <select name="formAccessLevel" >
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>
        </div>
        <?php } ?>
        <div>
            <input type="submit" value="Opret" name="value">
        </div>
    </form>

    <?php
    
    if(isset($_POST['formUsername'])){
        $formUsername = $_POST['formUsername'];
        $formEmail = $_POST['formEmail'];
        $formPassword = $_POST['formPassword'];
        $formPasswordRepeat = $_POST['formPasswordRepeat'];
        $formAccessLevel = 3;
        if (isset($_POST['accessLevel'])) {
            $formAccessLevel = $_POST['accessLevel'];
        }

        require "assets/connect.php";

        // Tester efter brugernavn
        $statement = $dbh->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $statement->bindParam(1, $formUsername);
        $statement->bindParam(2, $formEmail);
        $statement->execute();

        if ($row = $statement->fetch()) {
            echo "<p class='errorMsg'>Fejl! Brugernavnet $formUsername, eller e-mail $formEmail er allerede i brug!</p>";
        }
        else if ($formPassword != $formPasswordRepeat) {
            echo "<p class='errorMsg'>Fejl! Dine to kodeord er ikke ens!</p>";
        }
        else{
            $statement = $dbh->prepare("INSERT INTO users(username, email, password, accessLevel) VALUES(?, ?, ?, ?)");
            $statement->bindParam(1, $formUsername);
            $statement->bindParam(2, $formEmail);
            $statement->bindParam(3, $formPassword);
            $statement->bindParam(4, $formAccessLevel);
            
            $statement->execute();

            echo "<p class='success'>Brugeren er oprettet</p>";
        }
    }
    ?>

</div>



<?php
    require("footer.php");
?>