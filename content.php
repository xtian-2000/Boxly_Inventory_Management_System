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

    <!-- === CSS=== -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <div class="container my-5">
        <h1>Products</h1>
        <a class="btn btn-primary" href="add_product.php" role="button">New product</a>
        <button class="btn btn-primary" role="button">Export data</button>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Category</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price (per item)</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                        $hostName = "ims.cm10enqi961k.us-east-2.rds.amazonaws.com";
                        $userName = "pongodev";
                        $password = "pongodevPongodev";
                        $databaseName = "imsdatabase";

                        // Create connection
                        $conn = new mysqli($hostName, $userName, $password, $databaseName);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                         
                        echo $_SESSION['username'];
                        echo $_SESSION['admin_id'];

                        //SQL for reading the data from the db
                        $sql = "SELECT * FROM product WHERE admin_id = '". $_SESSION['admin_id'] ."' ";
                        $result = $conn->query($sql);

                        if (!$result) {
                            die("Invalid query: " . $conn->connect_error);
                        }

                        //Read data for each row
                        while($row = $result->fetch_assoc()){
                            echo "<tr>
                                    <td>$row[product_id]</td>
                                    <td>$row[product_category]</td>
                                    <td>$row[product_name]</td>
                                    <td>$row[product_quantity]</td>
                                    <td>$row[product_price]</td>
                                    <td>
                                        <a class='btn btn-primary btn-sm' href='edit_product.php?id=$row[product_id]'>Edit</a>
                                        <a class='btn btn-danger btn-sm' href='delete.php?id=$row[product_id]'>Delete</a>
                                    </td>
                                </tr>";
                        } 
                    ?>

            </tbody>
        </table>
    </div>
</body>

</html>