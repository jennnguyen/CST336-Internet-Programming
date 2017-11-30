<?php


include '../../dbConnection.php';
$conn = getDatabaseConnection();


$sql = "SELECT *
        FROM tc_user
        WHERE username = :username AND password = :password"; 

$namedParameters = array();
$namedParameters[':username'] = $_GET['username'];
$namedParameters[':password'] = $_GET['password'];
       
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record

//print_r($record);

echo json_encode($record);
?>
