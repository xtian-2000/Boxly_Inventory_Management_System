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
        //SQL query for getting admin_id
        $result = mysqli_query($con,"SELECT admin_id FROM admin WHERE admin_username = '".$username."' AND admin_password='".$password."' ");

        $admin_id = mysqli_num_rows($result); 

        //Create session variables
        $_SESSION['username'] = $username;
        $_SESSION['admin_id'] = $admin_id;

        //Redirect webpage
        header("Location: content.php");
        die();
    }
    else{
        //Alert for invalid credentials
        echo "<script type='text/javascript'>alert('Invalid credentials');</script>";
    }

    mysqli_close($con);
?>
