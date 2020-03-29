<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
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
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include("modularized/navigation.php");?>
    <div class="container">
        <h1>Add Something</h1>
        <?php
        if (($_SESSION["username"]) == "admin") {
            echo("<ul>");
            echo('<li> <a href="license-add.php">Add new License</a></li>');
            echo("<li> <a href='all-licenses.php'> View Licenses</a></li>");
        } else {?>
        <div class="container-cards">
            <div class="card text-white bg-dark mb-3" style="width: 20rem;">
                <!-- <img class="card-img-top" src="./images/computer.png" alt="Card image cap"> -->
                <div class="card-body">
                    <h5 class="card-title">Add New Device</h5>
                    <p class="card-text">Add a device in order to be assigned a license by your administrator</p>
                    <a href="device_add.php" class="btn btn-light">Add device</a>
                </div>
            </div>
            <div class="card text-white bg-dark mb-3" style="width: 20rem;">
                <!-- <img class="card-img-top" src="./images/cred.jpg" alt="Card image cap"> -->
                <div class="card-body">
                    <h5 class="card-title">Store a credit card</h5>
                    <p class="card-text">Store a card for yourself, this process is encrypted</p>
                    <a href="user-add-credit-card.php" class="btn btn-light">Store card</a>
                </div>
            </div>
            <div class="card text-white bg-dark mb-3" style="width: 20rem;">
                <!-- <img class="card-img-top" src="./images/license.jpg" alt="Card image cap"> -->
                <div class="card-body">
                    <h5 class="card-title">See My Assigned Licenses</h5>
                    <p class="card-text">View Licenses assigned by your administrator</p>
                    <a href="user-specific-license.php" class="btn btn-light">My licenses</a>
                </div>
            </div>
        </div>
        <hr>
        <h1>View My Stored Objects</h1>
        <div class="container-cards">
            <div class="card text-white bg-dark mb-3" style="width: 20rem;">
                <!-- <img class="card-img-top" src="./images/computer.png" alt="Card image cap"> -->
                <div class="card-body">
                    <h5 class="card-title">My Devices</h5>
                    <a href="my_devices.php" class="btn btn-light">View Devices</a>
                </div>
            </div>
            <div class="card text-white bg-dark mb-3" style="width: 20rem;">
                <!-- <img class="card-img-top" src="./images/cred.jpg" alt="Card image cap"> -->
                <div class="card-body">
                    <h5 class="card-title">My Credit Cards</h5>
                    <a href="user_specific_credit_credit_card.php" class="btn btn-light">View Credit Cards</a>
                </div>
            </div>

            <ul>
                <?php
        }
        ?>

        </div>
</body>

</html>