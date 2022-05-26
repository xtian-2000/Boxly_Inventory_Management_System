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

    .header {
        position: fixed;
        top: 0;
        margin-top: 100px;
    }
    </style>

</head>

<body>
    <header class="header">
        <h2 style="color:white;">Welcome, <?php echo $_SESSION['username']; ?></h2>


    </header>
    <?php
        include "./side_nav.php";
        echo createSideNav();
    ?>

</body>

</html>