<?php
// Include config file
require_once "config.php";

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
if (isset($_POST['submit'])) { // Fetching variables of the form which travels in URL
    $license_type = $_POST['license_type'];
    $license_name = $_POST['license_name'];
    $license_code = $_POST['license_code'];
    $device_id = $_POST['device_id'];
    if ($license_code !='') {
        //Insert Query of SQL
        $query = ("INSERT INTO `license`(`license_type`, `license_name`, `license_code`, `device_id`) VALUES  ('$license_type', '$license_name', AES_ENCRYPT('$license_code', 'passkey'), $device_id)");
        if ($mysqli->query($query) === true) {
            $Message =  "Record created successfully";
            header("location: welcome.php");
        } else {
            $Message =  "Error: " . $query . "<br>" . $mysqli->error;
        }
    } else {
        $Message = "NULL VALUES!";
    }
    $mysqli->close(); // Closing Connection with Server
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php include("modularized/navigation.php");?>
    <div class="container mt-3">
        <h1>Add a new license</h1>
        <form method="post">
            <div class="form-group row">
                <label for="license_type" class="col-4 col-form-label">License Type</label>
                <div class="col-8">
                    <input id="license_type" name="license_type" type="text" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="license_name" class="col-4 col-form-label">License Name</label>
                <div class="col-8">
                    <input id="license_name" name="license_name" type="text" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="license_code" class="col-4 col-form-label">License Code</label>
                <div class="col-8">
                    <input id="license_code" name="license_code" type="text" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="device_id" class="col-4 col-form-label">Device ID</label>
                <div class="col-8">
                    <input id="device_id" name="device_id" type="text" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        <?php echo($Message)?>
    </div>
</body>

</html>