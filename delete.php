<?php
// File: delete.php

require_once 'functions.php';

$id = $_GET['id'];

if (deleteCar($id)) {
    header('Location: index.php');
    exit;
} else {
    echo "Failed to delete car.";
}
?>
