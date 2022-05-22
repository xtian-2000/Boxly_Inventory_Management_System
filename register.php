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
        <div class="login">
            <h2>Register</h2><br>
            <form action="register_action.php" method="POST">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required><br>

                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br>
                
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br>

                <label for="password_confirm">Confirm password:</label><br>
                <input type="password" id="password_confirm" name="password_confirm" required><br>

                <input type="submit" value="Submit">
            </form>
            <a href="index.php">Go back</a>
        </div>
    </body>
</html>