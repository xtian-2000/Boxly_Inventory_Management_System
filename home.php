<?php
    //Session started
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale-1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Boxly | Inventory Management System</title>
        
        <!-- === CSS=== -->
        <link rel="stylesheet" type="text/css" href="style.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <style>
            body {
            font-family: "Lato", sans-serif;
            height: 100vh;
            display: flex;
            align-items: none;
            justify-content: none;
            background-image: url("bg_home.jpg");
            background-size: cover;
            }

            .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            text-align:center;
            }

            .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;

            }

            .sidenav a:hover{
            color: #f1f1f1;
            }

            .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
            }

            @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
            }
        </style>

    </head>

    <body>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="product_list.php">Product List</a>
            <a href="transaction_list.php">Transaction List</a>
        </div>

        
        <div class="container">
            <div class="fixed-top text-left">
                <span style="color:white;font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
            </div>
        </div>
        
        <h2 style="display:flex; justify-content:center;color:white;">Welcome, <?php echo $_SESSION['username']; ?></h2>
      
        <script>
            function openNav() {
            document.getElementById("mySidenav").style.width = "100%";
            }

            function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            }
        </script>
   
    </body>
</html>