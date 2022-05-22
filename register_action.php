<?php

    # Get the date
    date_default_timezone_set('Asia/Hong_Kong');

    #Variable from the register form
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $date_created = date('d/m/y');
    $time_created = date('h:i:s');

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    }else{
        # SQL query  
        $conn = new mysqli('ims.cm10enqi961k.us-east-2.rds.amazonaws.com','pongodev','pongodevPongodev','imsdatabase');
        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        }else{
            $stmt = $conn->prepare("INSERT INTO admin (admin_username, admin_email, admin_password, time_created, date_created)VALUES(?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $email, $password, $time_created, $date_created);
            $stmt->execute();
            echo "Register successfully";
            $stmt->close();
            $conn->close();
        }
    }

    
?>