<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php include("modularized/navigation.php");?>
    <div class="container">
        <h1>What do you want to do?</h1>
        <?php
        if(($_SESSION["username"]) == "admin"){
        
        
        echo("<ul>");
            echo('<li> <a href="license-add.php">Add new License</a></li>');
            echo("<li> <a href='all-licenses.php'> View Licenses</a></li>");
        
        }
        else{
            echo('<li><a href="device_add.php">Add new device</a></li>');
            echo('<li><a href="user-specific-license.php">My Licenses</a></li>');
            echo("</ul>");
        }
        ?>

    </div>
</body>

</html>