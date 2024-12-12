<?php
// File: add.php

require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $year = $_POST['year'];

    if (addCar($name, $brand, $year)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Failed to add car.";
    }
}
?>
