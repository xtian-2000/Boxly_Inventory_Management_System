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
        <div id="login" class="login" style="display: block;">
            <h2>Login</h2><br>
            <form action="login_action.php" method="POST">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required><br>

                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br>

                <input type="submit" value="Submit">
            </form>
            <a href="register.php">Register here</a>
        </div>
    </body>
</html>