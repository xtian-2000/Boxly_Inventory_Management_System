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
    <div class="container bg-light rounded my-5">
        <h1>Transactions</h1>
        <button class="btn btn-secondary" role="button" id="export_button">Export data</button>
        <br>
        <table class="table" id="transaction_data">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Transaction Category</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price (per item)</th>
                    <th>Total value</th>
                    <th>Date</th>
                    <th>Time</th>
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
                            $sql = "SELECT * FROM transaction WHERE admin_id = '". $_SESSION['admin_id'] ."' ";
                            $result = $conn->query($sql);

                            if (!$result) {
                                die("Invalid query: " . $conn->connect_error);
                            }

                            //Read data for each row
                            while($row = $result->fetch_assoc()){
                                echo "<tr>
                                        <td>$row[transaction_id]</td>
                                        <td>$row[transaction_category]</td>
                                        <td>$row[product_name]</td>
                                        <td>$row[product_quantity]</td>
                                        <td>$row[product_price]</td>
                                        <td>$row[total_value]</td>
                                        <td>$row[date_created]</td>
                                        <td>$row[time_created]</td>
                                    </tr>";
                            } 
                        ?>

            </tbody>
        </table>
    </div>
</body>
<script>
document.getElementById('export_button').addEventListener('click', function() {
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("#transaction_data"));

});
</script>

</html>