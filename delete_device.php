<?php
// Include config file
require_once "config.php";

session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}


    $id = '';
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
    }

    
    if (empty($id)) {
        throw new Exception("ID is blank");
    } else {
        $sql = "DELETE FROM `device` WHERE `id` = $id";
        $result = $mysqli->query($sql);
        header("location: my_devices.php");
    }