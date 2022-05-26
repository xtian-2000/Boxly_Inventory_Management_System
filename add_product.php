<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale-1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Boxly | Inventory Management System</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>
        <div class="container my-5">
            <h2>Add product</h2>
            
            <form action="add_product_action.php" method="POST">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Product Name</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="product_category" required>
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
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Product Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="product_name" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Quantity</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="product_quantity" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Price (per item)</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="product_price" required>
                    </div>
                </div>
            
                <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="content.php" role="button">Cancel</a>
                </div>
            </div>

        </div>
    </body>
</html>