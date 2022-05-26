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
    <script src="table2excel.js"></script>
    
</head>

<body>
    <div class="container my-5">
        <h1>Products</h1>
        <a class="btn btn-primary" href="add_product.php" role="button">New product</a>
        <button class="btn btn-primary" id="export_button">Export</button>
        <br>
        <table id="product_data" class="table" >
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
                        //echo $_SESSION['admin_id'];

                        //SQL for reading the data from the db
                        $sql = "SELECT * FROM product ";
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
<<<<<<< HEAD
                                        <a class='btn btn-primary btn-smhref='update'>Update</a>
                                        <a class='btn btn-danger btn-sm href='delete'>Delete</a>
=======
                                        <a class='btn btn-primary btn-sm' href='edit_product.php?id=$row[product_id]'>Edit</a>
                                        <a class='btn btn-danger btn-sm' href='delete.php?id=$row[product_id]'>Delete</a>
>>>>>>> 3f1fbee0f8dbee0c34427734dc390d2f7bb7460e
                                    </td>
                                </tr>";
                        } 

                        // remove all session variables
                        session_unset();

                        // destroy the session
                        session_destroy();
                    ?>

            </tbody>
        </table>
    </div>
</body>
<script>

    // function html_table_to_excel(type)
    //     {
    //         var data = document.getElementById('product_data');
    //         var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});
    //         XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });
    //         XLSX.writeFile(file, 'file.' + type);  
    //     }
    //     const export_button = document.getElementById('export_button');
    //     export_button.addEventListener('click', () => {
    //         html_table_to_excel('xlsx');
    //     });

    document.getElementById('export_button').addEventListener('click', function(){
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("#product_data"));

});
    
</script>
    
    
</html>