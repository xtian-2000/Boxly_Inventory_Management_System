<!DOCTYPE html>
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

    <!-- === Iconscout CSS=== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


</head>

<body class="indexbody">
    <div class="boxcontainer">
        <div class="form">
            <div id="login" class="form">
                <span class="title">Login</span>
                <form action="login_action.php" method="POST">
                    <div class="input-field">
                        <input type="text" placeholder="Username" id="username" name="username" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="Enter Password" id="password" name="password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="checkbox-text">
                        <input type="submit" class="btn btn-secondary" value="Submit" name="SubmitButton">
                        <a href="register.php" class="text">Register here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>