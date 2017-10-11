<?php
//heroku_e6bf88f127f62dd

$host = 'localhost'; //in c9
$dbname = 'tcp';
$username = "root";
$password = "";
//Creates database connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//displays database related errors
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


function usersWithAnA() {
    global $dbConn;
    $sql = "SELECT * FROM tc_user WHERE firstName LIKE 'A%'";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //print_r($records);
    foreach ($records as $record) {
        echo $record['firstName'] . "  " . $record['lastName'] . "  " . $record['email'] . "</br>";
    }
}


function devices() {
    global $dbConn;
    $sql = "SELECT * FROM tc_device WHERE price BETWEEN 300 AND 1000";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $devices = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //print_r($records);
    foreach ($devices as $device) {
        echo $devices['deviceName'] . "  " . $devices['price'] . "</br>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h3>Users whose first name starts with an A:</h3>
        <?= usersWithAnA() ?>
        
        <h3>Devices between 300 and 1000</h3>
        <?= devices() ?>
    </body>
</html>