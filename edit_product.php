<?php
$servername = "ims.cm10enqi961k.us-east-2.rds.amazonaws.com";
$username = "pongodev";
$password = "pongodevPongodev";
$database = "imsdatabase";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

$product_id = "";
$product_category = "";
$product_name = "";
$product_quantity = "";
$product_price = "";


$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET method: Show the data of the client

    if ( !isset($_GET["id"]) ) {
        //echo "hh";
        header("location: content.php");
        exit;
    }

    $product_id = $_GET["id"];

    // read the row of the selected client from database table
    $sql = "SELECT * FROM product WHERE product_id=$product_id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        echo "Empty";
        //header("location: content.php");
        //exit;
    }

    //Store data from the database
    $product_category = $row['product_category'];
    $product_name = $row['product_name'];
    $product_quantity = $row['product_quantity'];
    $product_price = $row['product_price'];
    $total_value = $product_quantity * $product_price;

}
else {
    // POST method: Update the data of the client

    $product_id = $_POST["product_id"];
    $product_category = $_POST['product_category'];
    $product_name = $_POST['product_name'];
    $product_quantity = $_POST['product_quantity'];
    $product_price = $_POST['product_price'];

    do {
        if ( empty($product_category) || empty($product_name) || empty($product_quantity) || empty($product_price) ) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE product " .
               "SET product_category = '$product_category', product_name = '$product_name', product_quantity = '$product_quantity', product_price = '$product_price', total_value = '$total_value' " .
               "WHERE product_id = $product_id";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Client updated correctly";

        header("location: content.php");
        exit;

    } while (false);
}
?>

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
            <?php
            if ( !empty($errorMessage) ) {
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
            ?>
            <form method="POST">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Product Name</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="product_category" value="<?php echo $product_category; ?>">
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
                        <input type="text" class="form-control" name="product_name" value="<?php echo $product_name; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Quantity</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="product_quantity" value="<?php echo $product_quantity; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Price (per item)</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="product_price" value="<?php echo $product_price; ?>">
                    </div>
                </div>
                
                <?php
                if ( !empty($successMessage) ) {
                    echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                    ";
                }
                ?>

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