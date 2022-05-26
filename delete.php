<?php
if ( isset($_GET["id"]) ) {
    $product_id = $_GET["id"];

    $servername = "ims.cm10enqi961k.us-east-2.rds.amazonaws.com";
    $username = "pongodev";
    $password = "pongodevPongodev";
    $database = "imsdatabase";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM product WHERE product_id=$product_id";
    $connection->query($sql);
}

header("location: content.php");
exit;
?>