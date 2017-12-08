<?php
    session_start();
    
    if (!isset($_SESSION['username'])) { //checks whether admin has logged in
        
        header("Location: index.php");
        exit();
        
    }
    
    include '../dbConnection.php';
    $conn = getDatabaseConnection();
    
    function numCars(){
        global $conn;
        echo "</br><h5>Number of used cars in the shop:</h5>";
        $sql = "SELECT COUNT(id)
                FROM fi_cars";
        $stmt = $conn->query($sql);	
        $results = $stmt->fetchAll();
        foreach ($results as $record) {
        	echo "<strong>Number of Cars:</strong> " . $record['COUNT(id)']  . "<br />";
        }
    }
    function avgCost(){
        global $conn;
        echo "</br><h5>Average cost of used cars in the shop:</h5>";
        $sql = "SELECT FLOOR(AVG(cost))
                FROM fi_carInfo";
        $stmt = $conn->query($sql);	
        $results = $stmt->fetchAll();
        foreach ($results as $record) {
        	echo "<strong>Average Cost:</strong> $" . $record['FLOOR(AVG(cost))']  . "<br />";
        }
    }
    
    function avgMilage(){
        global $conn;
        echo "</br><h5>Average mileage of used cars in the shop:</h5>";
        $sql = "SELECT FLOOR(AVG(milage))
                FROM fi_carInfo";
        $stmt = $conn->query($sql);	
        $results = $stmt->fetchAll();
        foreach ($results as $record) {
        	echo "<strong>Avgerage Mileages:</strong> " . $record['FLOOR(AVG(milage))']  . " miles<br />";
        }
    }
    
    function numMake(){
        global $conn;
        echo "</br><h5>Number of cars by each make, average cost, and milage: </h5>";
        $sql = "SELECT make, COUNT(make), FLOOR(AVG(cost)), FLOOR(AVG(milage))
                FROM fi_cars cars
                JOIN fi_carInfo info
                WHERE cars.id = info.id
                GROUP BY make";
        		
        $stmt = $conn->query($sql);	
        $results = $stmt->fetchAll();
        foreach ($results as $record) {
        	echo "<strong>Brand:</strong> " . $record['make']  . ", <strong>Count:</strong> " . $record['COUNT(make)'] . ", <strong>Average Cost:</strong> $" . $record['FLOOR(AVG(cost))'] . ", <strong>Average Milage:</strong> $" . $record['FLOOR(AVG(milage))'] . "<br />";
        }	

    }
    
    
    
    function underMile() {
        global $conn;
        echo "</br><h5>Cars under 25,000 miles: </h5>";
        $sql = "SELECT * 
                FROM fi_carInfo info
                JOIN fi_cars cars
                ON cars.id = info.id
                WHERE milage < 25000";
        $stmt = $conn->query($sql);	
        $results = $stmt->fetchAll();
        foreach ($results as $record) {
        echo "<strong>" . $record['year'] . " " . $record['make'] . " " .$record['model'] . "</strong>, $" . $record['cost'] . ", " . $record['milage'] . " miles. </br>";
        }
    }



?>


<!DOCTYPE html>
<html>
    <head>
        <title>Jennifer's Used Cars</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    </head>
    
    <body>
        <h2> Jennifer's Used Cars </h2>
        
       
        
        <div class="container"> 
            <form action="admin.php">
                <input type="submit" class='btn btn-info' value="Back" />
            </form>
            <div style='padding-top:10px;'></div>
            <form action="logout.php">
                <input type="submit" class='btn btn-primary' value="Logout" />
            </form>
            <h3> Car Reports</h3>
            <?php
                numCars();
                avgCost();
                avgMilage();
                numMake();
                underMile()
            ?>
        </div>
        
        <hr>
        
        
        
    </body>
    
</html>


