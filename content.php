<?php
    //Session started
    session_start();
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale-1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Boxly | Inventory Management System</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <header> </header>
        <div id="login" class="login">
            <?php
                echo "Welcome ". $_SESSION['username'];
            ?>
            <br>
            <a href="add_product.php">Add products</a>
        </div>
    </body>
</html>