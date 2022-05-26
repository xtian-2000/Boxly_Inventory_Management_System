<?php
    //Session started
    session_start();

    //Variable from login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Connect to database
    $con=mysqli_connect("ims.cm10enqi961k.us-east-2.rds.amazonaws.com","pongodev","pongodevPongodev","imsdatabase","3306");

    //SQL query for verifying credentials
    mysqli_select_db($con,"imsdatabase");
    
    $result = mysqli_query($con,"SELECT * FROM admin WHERE admin_username = '".$username."' AND admin_password='".$password."' ");

    $rows = mysqli_num_rows($result); 

    if ($rows == 1) {
         
        
        // Get the admin_id
        if ($row = $result->fetch_assoc()) {
            $_SESSION['admin_id'] = $row['admin_id'];
        }

        $_SESSION['username'] = $username;

        //Redirect webpage
        header("Location: home.php");
        die();
    }
    else{
        //Alert for invalid credentials
        echo "<script type='text/javascript'>alert('Invalid credentials');</script>";
        header("Location: index.php");
    }

    mysqli_close($con);
?>
