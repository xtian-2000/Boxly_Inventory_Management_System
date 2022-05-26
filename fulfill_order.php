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
        header("location: product_list.php");
        exit;
    }

    $product_id = $_GET["id"];

    // read the row of the selected client from database table
    $sql = "SELECT * FROM product WHERE product_id=$product_id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: product_list.php");
        exit;
    }

    //Store data from the database
    $product_category = $row['product_category'];
    $product_name = $row['product_name'];
    $product_quantity = $row['product_quantity'];
    $product_price = $row['product_price']; 
    echo $product_price;

}
else {
    // POST method: Update the data of the client
    $order_quantity = $_POST["order_quantity"];

    do {
        if ( empty($order_quantity) ) {
            $errorMessage = "All the fields are required";
            break;
        }
       
        try {
            $sql = "UPDATE product 
            SET product_quantity = '(int)$product_quantity - (int)$order_quantity', 
            total_value = '(int)$order_quantity * (int)$product_price' 
            WHERE product_id = $product_id";
            $result = mysqli_query($connection, $sql); 
        } catch (mysqli_sql_exception $e) { 
           var_dump($e);
           exit; 
        } 

        //$result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Client updated correctly";

        header("location: product_list.php");
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
            <h2>Fulfill order</h2>
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
                    <label class="col-sm-3 col-form-label">Product Category</label>
                    <div class="col-sm-6">
                        <input disabled type="text" class="form-control" name="product_category" value="<?php echo $product_category; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Product Name</label>
                    <div class="col-sm-6">
                        <input disabled type="text" class="form-control" name="product_name" value="<?php echo $product_name; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Quantity</label>
                    <div class="col-sm-6">
                        <input disabled type="number" class="form-control" name="product_quantity" value="<?php echo $product_quantity; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Price (per item)</label>
                    <div class="col-sm-6">
                        <input disabled type="number" class="form-control" name="product_price" value="<?php echo $product_price; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Order Quantity</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="order_quantity">
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
                    <a class="btn btn-outline-primary" href="product_list.php" role="button">Cancel</a>
                </div>
            </div>

        </div>
    </body>
</html>