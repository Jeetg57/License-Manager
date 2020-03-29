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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>

    <title>All Licenses</title>
</head>

<body>
    <?php 
    include("modularized/navigation.php");

    $sql = "SELECT `id`,`license_type`,`license_name`, AES_DECRYPT(`license_code`, 'passkey') as license_code, `device_id` FROM `license`;";
    $result = $mysqli->query($sql);
    echo("
    <div class='table-responsive'>
    <table class='table'>
    <thead class='thread-dark'>
    <tr>  
      <th scope='col'>License ID</th>
      <th scope='col'>License Name</th>
      <th scope='col'>License Type</th>
      <th scope='col'>
      License Code
      </th>
      <th scope='col'>Device ID</th>
    </tr>
    </thead>
    <tbody>");
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $license_id = $row['id'];
        $license_name = $row['license_name'];
        $license_type = $row['license_type'];
        $license_code = $row['license_code'];
        $device_id = $row['device_id'];
        echo("
        <tr>
            <th scope='row'>$license_id</th>
            <td>$license_name</td>
            <td>$license_type</td>
            <td>
            <div class='input-group '>
            <input id='foo' value='$license_code'>
            <button class='btn' data-clipboard-target='#foo'>
                <img src='assets/clippy.svg' alt='Copy to clipboard' width='20px'>
            </button></div></td>
            <td>$device_id</td>
        </tr>");
        
    }
} else {
    echo "0 results";
}
$mysqli->close();

?>

    <script>
    var clipboard = new ClipboardJS('.btn');

    clipboard.on('success', function(e) {
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);

        e.clearSelection();
    });

    clipboard.on('error', function(e) {
        console.error('Action:', e.action);
        console.error('Trigger:', e.trigger);
    });
    </script>

</body>

</html>