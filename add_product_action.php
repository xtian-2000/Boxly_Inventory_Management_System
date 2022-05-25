<?php
    //Session started
    session_start();

    //Get the date
    date_default_timezone_set('Asia/Hong_Kong');

    //Variable from the register form
    $product_category = $_POST['product_category'];
    $product_name = $_POST['product_name'];
    $product_quantity = $_POST['product_quantity'];
    $product_price = $_POST['product_price'];
    $total_value = $product_quantity * $product_price;
    $date_created = date('d/m/y');
    $time_created = date('h:i:s');

    //Variable for the transaction
    $transaction_category = 'inbound';
    
    //SQL query  
    $conn = new mysqli('ims.cm10enqi961k.us-east-2.rds.amazonaws.com','pongodev','pongodevPongodev','imsdatabase');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        //Insert product information to database
        $stmt = $conn->prepare("INSERT INTO product (product_category, product_name, product_quantity, product_price, total_value, time_created, date_created, admin_id)VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $product_category, $product_name, $product_quantity, $product_price, $total_value, $time_created, $date_created, $_SESSION['admin_id']);
        $stmt->execute();

        //Insert transaction information to database
        $stmt2 = $conn->prepare("INSERT INTO transaction (transaction_category, product_name, product_quantity, product_price, total_value, time_created, date_created, admin_id)VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt2->bind_param("ssssssss", $transaction_category, $product_name, $product_quantity, $product_price, $total_value, $time_created, $date_created, $_SESSION['admin_id']);
        $stmt2->execute();

        echo "<script type='text/javascript'>alert('Added product successfully');</script>";
        header("location: content.php");
        $stmt->close();
        $conn->close();
    }
?>