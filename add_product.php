<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale-1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Boxly | Inventory Management System</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="add_product">
            <div id="add_product" class="form-popup">
                
                <form action="add_product_action.php" method="POST" class="form-container">
                    <label for="product_category">Product category: </label>
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
                    </select><br>
                    <label for="product_name">Product name:</label>
                    <input type="text" id="product_name" name="product_name"><br>
                    <label for="product_quantity">Product quantity:</label>
                    <input type='number' size='10' id='product_quantity' name='product_quantity'/><br>
                    <label for="product_price">Product price (per item):</label>
                    <input type='number' id='product_price' name='product_price'/><br>

                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </body>
</html>