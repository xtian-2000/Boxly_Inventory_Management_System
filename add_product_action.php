<?php
    # Get the date
    date_default_timezone_set('Asia/Hong_Kong');

    #Variable from the register form
    $product_category = $_POST['product_category'];
    $product_name = $_POST['product_name'];
    $product_quantity = $_POST['product_quantity'];
    $product_price = $_POST['product_price'];
    $date_created = date('d/m/y');
    $time_created = date('h:i:s');

    # SQL query  
    $conn = new mysqli('ims.cm10enqi961k.us-east-2.rds.amazonaws.com','pongodev','pongodevPongodev','imsdatabase');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("INSERT INTO product (product_category, product_name, product_quantity, product_price, time_created, date_created)VALUES(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $product_category, $product_name, $product_quantity, $product_price, $time_created, $date_created);
        $stmt->execute();
        echo "<script type='text/javascript'>alert('Added product successfully');</script>";
        $stmt->close();
        $conn->close();
    }
?>