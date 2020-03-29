<?php
// Include config file
require_once "config.php";

session_start();
$Message = "";
$owner_id = $_SESSION['id'];
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

if (isset($_POST['submit'])) { // Fetching variables of the form which travels in URL
    $device_name = $_POST['device_name'];
    if ($device_name !='') {
        //Insert Query of SQL
        $query = ("INSERT INTO `device`(`device_name`, `owner_id`) VALUES ('$device_name', $owner_id)");
        if ($mysqli->query($query) === true) {
            $Message =  "Record created successfully";
        } else {
            $Message =  "Error: " . $query . "<br>" . $mysqli->error;
        }
    } else {
        $Message = "NULL VALUES!";
    }
    $mysqli->close(); // Closing Connection with Server
    sleep(2);
    header("location: welcome.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Welcome</title>
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
    <p class="text-center"><?php echo $Message ?></p>
</body>

</html>