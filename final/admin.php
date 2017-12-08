<?php
    session_start();
    
    if (!isset($_SESSION['username'])) { //checks whether admin has logged in
        
        header("Location: index.php");
        exit();
        
    }
    
    include '../dbConnection.php';
    $conn = getDatabaseConnection();
    
    function getCars() {
        global $conn;
        $sql = "SELECT * 
                FROM fi_cars cars
                JOIN fi_carInfo info
                ON cars.id = info.id";
                
        if (isset($_GET['submit'])){
            if (!empty($_GET['filter'])) {
                if ($_GET['filter'] == "1"){
                    $sql .= " AND cars.make = 'Audi'";
                }
                if ($_GET['filter'] == "2"){
                    $sql .= " AND cars.make = 'BMW'";
                }
                if ($_GET['filter'] == "3"){
                    $sql .= " AND cars.make = 'Chevrolet'";
                }
                if ($_GET['filter'] == "4"){
                    $sql .= " AND cars.make = 'Chrysler'";
                }
                if ($_GET['filter'] == "5"){
                    $sql .= " AND cars.make = 'Ford'";
                }
                if ($_GET['filter'] == "6"){
                    $sql .= " AND cars.make = 'Hyundai'";
                }
                if ($_GET['filter'] == "7"){
                    $sql .= " AND cars.make = 'Infiniti'";
                }
                if ($_GET['filter'] == "8"){
                    $sql .= " AND cars.make = 'Lexus'";
                }
                if ($_GET['filter'] == "9"){
                    $sql .= " AND cars.make = 'Mazda'";
                }
                if ($_GET['filter'] == "10"){
                    $sql .= " AND cars.make = 'Suburu'";
                }
                if ($_GET['filter'] == "11"){
                    $sql .= " AND cars.make = 'Toyota'";
                }
                
                if ($_GET['sortBy'] == "ascB"){
                    $sql .= " ORDER BY cars.make";
                }
                if ($_GET['sortBy'] == "descB"){
                    $sql .= " ORDER BY cars.make DESC";
                }
                if ($_GET['sortBy'] == "ascP"){
                    $sql .= " ORDER BY info.cost ";
                }
                if ($_GET['sortBy'] == "descP"){
                    $sql .= " ORDER BY info.cost DESC";
                }
                if ($_GET['sortBy'] == "ascM"){
                    $sql .= " ORDER BY info.milage";
                }
                if ($_GET['sortBy'] == "descM"){
                    $sql .= " ORDER BY info.milage DESC";
                }
            }
            
            else if ($_GET['sortBy'] == "ascB"){
                $sql .= " ORDER BY cars.make";
            }
            else if ($_GET['sortBy'] == "descB"){
                $sql .= " ORDER BY cars.make DESC";
            }
            else if ($_GET['sortBy'] == "ascP"){
                $sql .= " ORDER BY info.cost ";
            }
            else if ($_GET['sortBy'] == "descP"){
                $sql .= " ORDER BY info.cost DESC";
            }
            else if ($_GET['sortBy'] == "ascM"){
                $sql .= " ORDER BY info.milage";
            }
            else if ($_GET['sortBy'] == "descM"){
                $sql .= " ORDER BY info.milage DESC";
            }
            else {
                $sql .= " ORDER BY cars.make";
            } 
            
        }
        else {
            $sql .= " ORDER BY cars.make";
        }       
                
        /*if (!empty($_GET['keyword'])) {
            
            $searchterm = $_GET['keyword'];
            
            $sql .= " AND cars.model LIKE  '%" .$searchterm. "%' 
                      OR cars.make LIKE  '%" .$searchterm. "%'
                      OR info.color LIKE  '%" .$searchterm. "%' 
                      OR cars.year LIKE  '%" .$searchterm. "%'";
                      
            //$namedParameters[':keyword'] = "%" . $_GET['keyword'] . "%";
        }      */     
                
                
        $statement = $conn->prepare($sql);
        $statement->execute();
        //$statement->execute($namedParameters);
        $cars = $statement->fetchAll(PDO::FETCH_ASSOC);
        //print_r($users);
        return $cars;
    }

    if (isset($_GET['clear'])){
    header("Location: admin.php");
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
        
        <script>
            function confirmDelete(firstName) {
                return confirm("Are you sure you want to delete " + firstName + "?");
            }
        </script>
    </head>
    
    <body>
        <h2> Jennifer's Used Cars </h2>
        
        <div class="container-fluid">
            <form>
                <strong>Order by Brand:</strong>
                <input type="radio" name="sortBy" id="ascB" value="ascB"
                    <?= ($_GET['sortBy']=="ascB")?"checked":""  ?>
                />
                <label for="ascB">Ascending</label>
                <input type="radio" name="sortBy" id="descB" value="descB" 
                   <?= ($_GET['sortBy']=="descB")?"checked":""  ?>
                />
                 <label for="descB">Descending</label>

                <strong>&nbsp;&nbsp;Order by Price:</strong>
                <input type="radio" name="sortBy" id="ascP" value="ascP" 
                   <?= ($_GET['sortBy']=="ascP")?"checked":""  ?>
                />
                 <label for="ascP">Ascending</label>
                <input type="radio" name="sortBy" id="descP" value="descP" 
                   <?= ($_GET['sortBy']=="descP")?"checked":""  ?>
                />
                 <label for="descP">Descending</label>
                 
                <strong>&nbsp;&nbsp;Order by Milage:</strong>
                <input type="radio" name="sortBy" id="ascM" value="ascM" 
                   <?= ($_GET['sortBy']=="ascM")?"checked":""  ?>
                />
                 <label for="ascM">Ascending</label>
                <input type="radio" name="sortBy" id="descM" value="descM" 
                   <?= ($_GET['sortBy']=="descM")?"checked":""  ?>
                />
                 <label for="descM">Descending</label> 
                 
                <strong>&nbsp;&nbsp;Filter by: </strong>
                <select id=filter name="filter">
                    <option value=""> Select One </option>
                    <option value="1"  <?php if ($_GET['filter'] == "1" ) echo 'selected' ; ?>>Audi</option>
                    <option value="2"  <?php if ($_GET['filter'] == "2" ) echo 'selected' ; ?>>BMW</option>
                    <option value="3" <?php if ($_GET['filter'] == "3" ) echo 'selected' ; ?>>Chevrolet</option>
                    <option value="4" <?php if ($_GET['filter'] == "4" ) echo 'selected' ; ?>>Chrysler</option>
                    <option value="5" <?php if ($_GET['filter'] == "5" ) echo 'selected' ; ?>>Ford</option>
                    <option value="6" <?php if ($_GET['filter'] == "6" ) echo 'selected' ; ?>>Hyundai</option>
                    <option value="7" <?php if ($_GET['filter'] == "7" ) echo 'selected' ; ?>>Infiniti</option>
                    <option value="8" <?php if ($_GET['filter'] == "8" ) echo 'selected' ; ?>>Lexus</option>
                    <option value="9" <?php if ($_GET['filter'] == "9" ) echo 'selected' ; ?>>Mazda</option>
                    <option value="10" <?php if ($_GET['filter'] == "10" ) echo 'selected' ; ?>>Subaru</option>
                    <option value="11" <?php if ($_GET['filter'] == "11" ) echo 'selected' ; ?>>Toyota</option>
                </select>
                <!--</br>-->
                <!--<input type="text" name="keyword" style="width:300px;" placeholder=" Search" value="___get keyword___"/>-->
                &nbsp;&nbsp;
                <input type="submit" class="btn btn-dark" value="Search" name="submit" />
                <input type="submit" class="btn btn-outline-dark" name="clear" value="Clear Search"/>
                <hr>
            </form>
            
        </div>
        
        
        <div class="container">
            <form action="logout.php">
                <input type="submit" class='btn btn-secondary' value="Logout" />
            </form>
            <div style="padding-top:10px;"></div>
            <form action="addCar.php">
                <input type="submit" class="btn btn-primary" value="Add New Car Listing" />
            </form>
            <div style="padding-top:10px;"></div>
            <form action="carReports.php">
                <input type="submit" class="btn btn-success" value="View Car Report" />
            </form>
            <hr>
            <?php
                $cars = getCars();
                foreach ($cars as $c){
                    echo "<div id='leftimg'>";
                    echo " <img style='height: 300px;' src='img/" . $c['img'] . ".jpg' alt='Picture of ". $c['img'] . "' />";
                    echo "</div>";
                    echo "<div id='righttext'>";
                    echo "<h3>" . $c['make'] . " " . $c['model'] . "</h3>";
                    echo "Year: " . $c['year'] . "<br>";
                    echo "Color: " . $c['color'] . "<br>";
                    echo "Cost: $" . $c['cost'] . "<br>";
                    echo "Mileage: " . $c['milage'] . "<br>";
                    echo "</br> <h4> Specs: </h4>";
                    echo "City Gas Mileage: " . $c['gasC'] . " mpg";
                    echo "</br> High Gas Mileage: " . $c['gasH'] . " mpg";
                    echo "</br></br>";
                    
                    echo "<form class='updateCar' id='" . $c['id'] . "' style='display:inline' onsubmit='return false'>
                             <input type='submit' class='btn btn-info' value='Update'>
                          </form>";      
                    //echo "</br><a href='#' class='carLink' id='".$c['id']."'>[Update Car]</a>";
                    echo "<form action='deleteCar.php' style='display:inline' onsubmit='return confirmDelete(\"" . $c['make'] . " " . $c['model'] . "\")'>
                             <input type='hidden' name='carId' value='" . $c['id']. "' />
                             <input type='submit' class='btn btn-danger' value='Delete'>
                          </form>";
                            
                    echo "</div>";
                    
                    echo "<div class='clear'></div>";
                    echo "<hr><br>";
                } 
                   
            ?>
        </div>
        
        <hr>
        
        <div class="container-fluid">
            <!-- Log out -->
            <form action="logout.php">
                <input type="submit" class='btn btn-secondary' value="Logout" />
            </form>
        </div>
        
        
        
        
<div class="modal fade" id="carInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="carNameModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div id="carInfo"></div> 
      </div>
      <div class="modal-footer" id="carId">
        <button type="button" class="btn btn-info" onclick="updateCar()">Update Car</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
    </body>
    
    <script>
        $(document).ready( function() {
            $(".updateCar").click( function() {
                $('#carInfoModal').modal("show");
                $('#carInfo').empty();
                $('#carInfo').html("<img src='img/loading.gif'>");
                $.ajax({
                    type: "GET",
                    url: "getCarInfo.php",
                    dataType: "json",
                    data: { "id": $(this).attr('id') },
                    success: function(data) {
                        
                        $('#carInfo').html(
                            "Make: <input type='text' id='make' required value='" + data.make + "' />" +
                            "</br>Model: <input type='text' id='model' required value='" + data.model + "' />" +
                            "</br>Year: <input type='text' id='year' required value='" + data.year + "' />" +
                            "</br>Cost: $<input type='text' id='cost' required value='" + data.cost + "' />" +
                            "</br>Milage: <input type='text' id='milage' required value='" + data.milage + "' />" +
                            "</br>Color: <input type='text' id='color' required value='" + data.color + "' />" +
                            "</br>City Gas Milage: <input type='text' id='gasC' required value='" + data.gasC + "' /> mpg" +
                            "</br>Highway Gas Milage: <input type='text' id='gasH' required value='" + data.gasH + "' /> mpg" +
                            "</br>Image Location: img/<input type='text' id='imgloc' required value='" + data.img + "' />.jpg" +
                            "<input type='hidden' id='id' value='" + data.id + "' />"+
                            "</br>");
                          
                        $('#carNameModalLabel').html("Update Car Listing");
                        $("#carId").html($(this).attr('id'));
                        
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                    }
                });//ajax
            }) //$("carLink")
        }) //$(document).ready
        
        function updateCar(){
            
            $.ajax({
                type: "GET",
                url: "updateCar.php",
                dataType: "html",
                data: {id: $("#id").val(),
                       make : $("#make").val(),
                       model : $("#model").val(),
                       year : $("#year").val(),
                       cost : $("#cost").val(),
                       milage : $("#milage").val(),
                       color : $("#color").val(),
                       gasC : $("#gasC").val(),
                       gasH : $("#gasH").val(),
                       imgloc : $("#imgloc").val(),
                },
                success:function( msg ) {
                    alert( "Update Sucessful");
                    $('#carInfoModal').modal("hide");
                    location.reload();
                }
            });
  }
    </script>
          
</html>


