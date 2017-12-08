<?php
    session_start();
    
    if (!isset($_SESSION['username'])) { // Validates that the admin is logged in
        header("Location: index.php");
    }
    
    include("../dbConnection.php");
    $conn = getDatabaseConnection();
    
    
    $sql = "DELETE FROM fi_cars
            WHERE id = " . $_GET['carId'];
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    $sql = "DELETE FROM fi_carInfo
            WHERE id = " . $_GET['carId'];
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location: admin.php");

?>