<?php
// Include config file
require_once "config.php";

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
//Variables

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Licenses</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php include("modularized/navigation.php");
    $sql = "SELECT `device_name`, `owner_id`, `license_id`, `license_type`,`license_name`, AES_DECRYPT(`license_code`, 'passkey') as license_code  FROM `userlicenses`";
    $result = $mysqli->query($sql);
    
    echo("
    <div class='table-responsive container'>
    <table class='table'>
    <thead class='thread'>
    <tr>  
      <th scope='col'>Device Name</th>
      <th scope='col'>License Name</th>
      <th scope='col'>License Type</th>
      <th scope='col'>License Code</th>
    </tr>
    </thead>
    <tbody>");
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($_SESSION["id"] == $row['owner_id']){
            $device_name = $row['device_name'];
            $license_id = $row['license_id'];
            $license_name = $row['license_name'];
            $license_type = $row['license_type'];
            $license_code = $row['license_code'];
            echo("
            <tr>
            <th scope='row'>$device_name</th>
                <td>$license_name</td>
                <td>$license_type</td>
                <td>$license_code</td>
            </tr>");
        }
    }
} else {
    echo "0 results";
}
$mysqli->close();

?>

</body>

</html>