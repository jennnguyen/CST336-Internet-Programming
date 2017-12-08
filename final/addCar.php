<?php
    session_start();
    
    if (!isset($_SESSION['username'])) { //checks whether admin has logged in
        
        header("Location: index.php");
        exit();
        
    }
    
    include '../dbConnection.php';
    $conn = getDatabaseConnection();
    
    
    if (isset($_GET['addCarForm'])) { 
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
        
        
        $sql = "INSERT INTO fi_cars
                (id, make, model, year, gasC, gasH) 
                VALUES 
                (DEFAULT,'$make','$model','$year','$gasC','$gasH')";
                
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        
        $sql = "INSERT INTO fi_carInfo 
                (id, color, cost, milage, img) 
                VALUES 
                (DEFAULT,'$color','$cost','$milage','$img')";
                
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo "Car has been added successfully!";
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
        <h2> Admin Page: Add Car Listing </h2>
       
        <div class="container">
            <form action="admin.php">
                <input type="submit" class='btn btn-info' value="Back" />
            </form>
            <div style='padding-top:10px;'></div>
        
            <h4> Add New Car Listing</h4>
            <form>
                Make:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='make'/>
                </br>Model: &nbsp;&nbsp;&nbsp;<input type='text' name='model'  />
                </br>Year: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='year'  />
                </br>Cost: &nbsp;&nbsp;&nbsp;&nbsp;$<input type='text' name='cost'  />
                </br>Mileage: &nbsp;&nbsp;<input type='text' name='milage'  />
                </br>Color: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='color' />
                </br>City Gas Mileage: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='gasC'  /> mpg
                </br>Highway Gas Mileage: <input type='text' name='gasH' /> mpg
                </br>Image Location:&nbsp; img/<input type='text' name='imgloc'  />.jpg
                </br>
               <input type="submit" class="btn btn-primary" name="addCarForm" value="Add Car"/>
            </form>
       </div>
        
        <hr>
        
        <div class="container-fluid">
            <!-- Log out -->
            <form action="logout.php">
                <input type="submit" class='btn btn-secondary' value="Logout" />
            </form>
        </div>
        
        
        
        
    </body>
    
</html>


