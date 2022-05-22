<?php

$username = $_POST['username'];
$password = $_POST['password'];

$con=mysqli_connect("ims.cm10enqi961k.us-east-2.rds.amazonaws.com","pongodev","pongodevPongodev","imsdatabase","3306");


mysqli_select_db($con,"imsdatabase");

$result = mysqli_query($con,"SELECT * FROM admin WHERE admin_username = '".$username."' AND admin_password='".$password."' ");

$rows = mysqli_num_rows($result); 

if ($rows == 1) {
    header("Location: content.php");
    die();
}
else{
    echo "<script type='text/javascript'>alert('Invalid credentials');</script>";
}

mysqli_close($con);
/*
header("Location: index.php");
    echo "<script type='text/javascript'> 
    parent.document.getElementById('main').style.display = 'block';
    </script>"; */

?>
