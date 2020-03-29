<?php
// Include config file
require_once "config.php";

session_start();

$user_id = $_SESSION['id'];
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
$key = "jeet";
$Message = "";
if (isset($_POST['submit'])) { // Fetching variables of the form which travels in URL
    $card_number = $_POST['card_number'];
    $cvv = $_POST['cvv'];
    $card_type = $_POST['card_type'];
    $expiry = $_POST['date'];

    if ($card_number !='') {
        //Insert Query of SQL
        $query = ("INSERT INTO `usercards`(`card_number`, `cvv`, `card_type`, `expiry`, `user_id`) VALUES (AES_ENCRYPT('$card_number', 'passkey'), AES_ENCRYPT('$cvv', 'passkey'), '$card_type', '$expiry' ,$user_id)");
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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <?php include("modularized/navigation.php");?>
    <div class="container mt-3">
        <h1>Add a new license</h1>
        <form method="post">
            <div class="form-group row">
                <label for="card_number" class="col-4 col-form-label">Card Number</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-credit-card"></i>
                            </div>
                        </div>
                        <input id="card_number" name="card_number" type="number" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="cvv" class="col-4 col-form-label">CVV</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-credit-card-alt"></i>
                            </div>
                        </div>
                        <input id="cvv" name="cvv" type="number" min="1" max="999" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="card_type" class="col-4 col-form-label">Card Type</label>
                <div class="col-8">
                    <select id="card_type" name="card_type" class="custom-select">
                        <option value="MasterCard">MasterCard</option>
                        <option value="Visa">Visa</option>
                        <option value="AmericanExpress">AmericanExpress</option>
                        <option value="Discover">Discover</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-4 col-form-label">Date of expiry</label>
                <div class="col-8">
                    <input id="date" name="date" type="text" class="form-control" placeholder="01/24">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        <p class="text-center"><?php echo $Message ?></p>
    </div>

</body>

</html>