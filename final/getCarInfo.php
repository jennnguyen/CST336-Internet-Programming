<?php
    
    $id = $_GET['id'];

    include '../dbConnection.php';
    $dbConn = getDatabaseConnection(); 
    
    $sql = "SELECT * 
            FROM fi_cars cars
            JOIN fi_carInfo info
            ON cars.id = info.id
            WHERE cars.id = $id";
    
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($resultSet);
        
?>