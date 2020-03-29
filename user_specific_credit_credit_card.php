<?php
// Include config file
require_once "config.php";

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
if (!isset($_SESSION['newid'])) {
    header("location: verify.php");
    exit;
}
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
    $sql = "SELECT `id`, `username`, AES_DECRYPT(`card_number`, 'passkey') as card_number, AES_DECRYPT(`cvv`, 'passkey') as cvv, card_type, expiry FROM `user_cards`";
    $result = $mysqli->query($sql);
    
    echo("
    <div class='table-responsive container'>
    <table class='table'>
    <thead class='thread'>
    <tr>  
      <th scope='col'>Username</th>
      <th scope='col'>Card Number</th>
      <th scope='col'>CVV</th>
      <th scope='col'>Type</th>
      <th scope='col'>Expiry</th>
    </tr>
    </thead>
    <tbody>");
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if ($_SESSION["username"] == $row['username']) {
            $id = $row['id'];
            $device_name = $row['username'];
            $card_number = $row['card_number'];
            $cvv = $row['cvv'];
            $card_type = $row['card_type'];
            $expiry = $row['expiry'];
            echo("
            <tr>
            <th scope='row'>$device_name</th>
                <td>$card_number</td>
                <td>$cvv</td>
                <td>$card_type</td>
                <td>$expiry</td>
                <td><a href='delete_card.php?id=$id' class='btn btn-danger'>Delete</a></td>
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