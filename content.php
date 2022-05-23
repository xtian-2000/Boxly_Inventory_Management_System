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
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <header> </header>
        <div id="login" class="login">
            <?php
                echo "Welcome ". $_SESSION['username'];
            ?>
            <br>
            <a href="add_product.php">Add products</a>
        </div>

        <?php
            include('connect_db.php');

            $deleted = 'false';

            $result = mysqli_query($conn,"SELECT product_category, product_id, product_name, product_quantity, product_price, total_value FROM product WHERE admin_id = '".$_SESSION['admin_id']."' AND deleted='".$deleted."' ");
            $rows = mysqli_query($conn, $result);
        ?>

        <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>S.N</th>
            <th>Product Category</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Quantity</th>
            <th>Product Price</th>
            <th>Total Value</th>
        </tr>
        <?php
            if (mysqli_num_rows($result) > 0) {
            $sn=1;
            while($data = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $sn; ?> </td>
            <td><?php echo $data['product_category']; ?> </td>
            <td><?php echo $data['product_id']; ?> </td>
            <td><?php echo $data['product_name']; ?> </td>
            <td><?php echo $data['product_quantity']; ?> </td>
            <td><?php echo $data['product_price']; ?> </td>
            <td><?php echo $data['total_value']; ?> </td>
        <tr>
        <?php
        $sn++;}} else { ?>
            <tr>
            <td colspan="8">No data found</td>
            </tr>
        <?php } ?>
        </table
    </body>
</html>