<?php
    include '../dbConnection.php';
    $conn = getDatabaseConnection();
    $make = $_GET['make'];
    $model =  $_GET['model'];
    $year =  $_GET['year'];
    $cost =  $_GET['cost'];
    $milage = $_GET['milage'];
    $gasC =  $_GET['gasC'];
    $gasH = $_GET['gasH'];
    $img = $_GET['imgloc'];
    $color = $_GET['color'];
    $id = $_GET['id'];
    
    echo $make . " " . $model . " " . $year . " " . $cost . " " . $milage . " " . $gasC . " " . $gasH . " " . $color . " " . $img. " " . $id;
    
       $sql = "UPDATE fi_cars cars, fi_carInfo info
                SET cars.make = '$make',
                cars.model = '$model', 
                cars.year = '$year',
                cars.gasC = '$gasC',
                cars.gasH = '$gasH',
                info.cost = '$cost',
                info.milage = '$milage',
                info.img = '$img',
                info.color = '$color'
                WHERE cars.id = info.id
                AND cars.id = '$id'";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        

?>