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
    <!-- Add product form div 
    <div>
        <button class="open-button" onclick="openForm()">Add Product</button>
    </div>
    
    <div id="add_product" class="form-popup">
        <form action="add_product_action.php" method="POST" class="form-container">
            <div>
                <select id="product_category" name="product_category">
                    <option value="Beverages">Beverages</option>
                    <option value="Bread/Bakery">Bread/Bakery</option>
                    <option value="Canned/Jarred Goods">Canned/Jarred Goods</option>
                    <option value="Dairy">Dairy</option>
                    <option value="Dry/Baking Goods">Dry/Baking Goods</option>
                    <option value="Frozen Foods">Frozen Foods</option>
                    <option value="Meat">Meat</option>
                    <option value="Produce">Produce</option>
                    <option value="Cleaners">Cleaners</option>
                    <option value="Paper Goods">Paper Goods</option>
                    <option value="Personal Care">Personal Care</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <div>
                <input type="text" placeholder="Product name" id="product_name" name="product_name" required>
            </div>

            <div>
                <input type='number' size='10' placeholder="Product quantity" id='product_quantity'
                    name='product_quantity' required />
            </div>

            <div>
                <input type='number' placeholder="Product price (per piece)" id='product_price' name='product_price'
                    required />
            </div>

            <input type="submit" value="Submit" class="btn btn-secondary">
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>
    <script>
    function openForm() {
        document.getElementById("add_product").style.display = "block";
    }

    function closeForm() {
        document.getElementById("add_product").style.display = "none";
    }
    </script>-->
    <div class="container my-5">
        <h1>Products</h1>
        <a class="btn btn-primary" href="add_product.php" role="button">New product</a>
        <button class="btn btn-primary" id="export_button">Export</button>
        <br>
        <table id="product_data" class="table" >
            <thead>
                <tr>
                    <th>Product Category</th>
                    <th>Product ID</th>
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

                        //SQL for reading the data from the db
                        $sql = "SELECT product_category, product_id, product_name, product_quantity, product_price FROM product";
                        $result = $conn->query($sql);

                        if (!$result) {
                            die("Invalid query: " . $conn->connect_error);
                        }

                        //Read data for each row
                        while($row = $result->fetch_assoc()){
                            echo "<tr>
                                    <td>" . $row["product_category"] . "</td>
                                    <td>" . $row["product_id"] . "</td>
                                    <td>" . $row["product_name"] . "</td>
                                    <td>" . $row["product_quantity"] . "</td>
                                    <td>" . $row["product_price"] . "</td>
                                    <td>
                                        <a class='btn btn-primary btn-smhref='update'>Update</a>
                                        <a class='btn btn-danger btn-sm href='delete'>Delete</a>
                                    </td>
                                </tr>";
                        } 
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