<?php
session_start();
//print_r($_POST);

include '../dbConnection.php';
$conn = getDatabaseConnection();


$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT *
        FROM fi_login
        WHERE username = :username 
        AND   password = :password";

$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;        
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record


if (empty($record)) {
    echo "<script type='text/javascript'>alert('Invalid username or password!'); window.location.replace('index.php'); </script>";
    //header("Location: index.php");
    
} else {
    
    //echo "right credentials!";
    $_SESSION['username'] = $record['username'];
    $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];
    //echo $_SESSION['adminFullName'] . "<br>";
    //echo $record['firstName'] . " " . $record['lastName'];
   header("Location: admin.php"); //redirecting to admin portal
}
?>