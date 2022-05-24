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

    </head>
    <body>
        <div >
            <button class="open-button" onclick="openForm()">Add Product</button>
        </div>
        <!-- Add product form div -->
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
                    <input type='number' size='10' placeholder="Product quantity" id='product_quantity' name='product_quantity' required/>        
                </div>

                <div>
                    <input type='number' placeholder="Product price (per piece)" id='product_price' name='product_price' required/>
                </div>

                <input type="submit" value="Submit">
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
        </script>        
        
            <!--<a href="add_product.php">Add products</a>-->
        </div>    
    </body>
</html>