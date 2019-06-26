<?php
require_once "connect.php";

$statement = $dbh->prepare("SELECT * FROM categories");
$statement->execute();


while ($row = $statement->fetch()) {
    $categories[] = $row["name"];
}

$dbh = null;


?>