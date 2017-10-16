<?php


function displayCheckoutHistory() {
    
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT * 
            FROM `tc_checkout` 
            NATURAL JOIN tc_device
            NATURAL JOIN tc_user 
            WHERE deviceId = :deviceId";
    
    $namedParam = array(":deviceId"=>$_GET['deviceId']);
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo  $record['firstName'] .  "  " . $record['lastName']. 
            "</br>&nbsp&nbsp&nbsp&nbspEmail: " . $record['email'] .  
            "</br>&nbsp&nbsp&nbsp&nbspPhone #: " . $record['phone']. 
            "</br>&nbsp&nbsp&nbsp&nbspRole: " . $record['role'] .  
            "</br>&nbsp&nbsp&nbsp&nbspDevice Name/ID: " . $record['deviceName'] . ", " . $record['deviceId'] .
            "</br>&nbsp&nbsp&nbsp&nbspCheckout Date: " . $record['checkoutDate']. 
            "</br>&nbsp&nbsp&nbsp&nbspDue Date: " . $record['dueDate']. 
            "</br>&nbsp&nbsp&nbsp&nbspReturn Date: ";
            
        if ($record['returnDate'] == NULL){
            echo "Currently Checked Out </br>";
        }
        else {
            echo $record['returnDate']. "</br>";
        }
        
    }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Checkout History </title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        
        <h2> Checkout History </h2>


        <?=displayCheckoutHistory()?>

    </body>
</html>