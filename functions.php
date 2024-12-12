<?php
// File: functions.php

require_once 'config.php';

function getCars() {
    global $conn;
    $result = $conn->query("SELECT * FROM cars");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function addCar($name, $brand, $year) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO cars (name, brand, year) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $brand, $year);
    return $stmt->execute();
}

function getCarById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM cars WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function updateCar($id, $name, $brand, $year) {
    global $conn;
    $stmt = $conn->prepare("UPDATE cars SET name = ?, brand = ?, year = ? WHERE id = ?");
    $stmt->bind_param("ssii", $name, $brand, $year, $id);
    return $stmt->execute();
}

function deleteCar($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM cars WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
?>
