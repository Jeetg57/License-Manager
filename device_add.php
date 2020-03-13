<?php
// Include config file
require_once "config.php";

session_start();
$owner_id = $_SESSION['id'];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("license_manager", $connection); // Selecting Database from Server
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
    $device_name = $_POST['device_name'];
    if($device_name !=''){
    //Insert Query of SQL
    $query = mysql_query("INSERT INTO `device`(`device_name`, `owner_id`) VALUES ('$device_name', $owner_id)");
    echo "<br/><br/><span>Data Inserted successfully...!!</span>";
    header("location: welcome.php");
    }
    else{
    echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
    }
    }
    mysql_close($connection); // Closing Connection with Server
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <?php include("modularized/navigation.php");?>
    <form class="container mt-5" method="post">
        <h1>Add a device</h1>
        <div class="form-group row">
            <label for="device_name" class="col-4 col-form-label">Device Name</label>
            <div class="col-8">
                <input id="device_name" name="device_name" type="text" class="form-control" required="required">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</body>

</html>