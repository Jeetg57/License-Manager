<?php
// Include config file
require_once "config.php";

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
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
    <link rel="stylesheet" href="css/style.css">
</head>
<?php include("modularized/navigation.php");?>

<body>
    <?php
    $sql = "SELECT `id`, `device_name`, `owner_id` from `device`";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row

        while ($row = $result->fetch_assoc()) {
            if ($_SESSION["id"] == $row['owner_id']) {
                $device_name = $row['device_name'];
                $id = $row['id'];
                echo("
    <div class='card text-white bg-dark mb-3' style='width: 18rem;'>
        <div class='card-body'>
            <h5 class='card-title'>$device_name</h5>
            <a href='delete_device.php?id=$id' class='btn btn-danger'>Delete</a>
        </div>
    </div>
  
    ");
            }
        }
    } else {
        echo "0 results";
    }
    $mysqli->close();

    ?>
</body>

</html>