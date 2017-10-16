<?php
    
    include '../../dbConnection.php';
    
    $conn = getDatabaseConnection();
    
    function getDeviceTypes() {
        global $conn;
        $sql = "SELECT DISTINCT(deviceType)
                FROM `tc_device` 
                ORDER BY deviceType";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            
            echo "<option> "  . $record['deviceType'] . "</option>";
            
        }
    }

    function displayDevices(){
        global $conn;
        $sql = "SELECT * FROM tc_device WHERE 1";
 
        if (isset($_GET['submit'])){
            
            $namedParameters = array();
         
            
            // If user types in a device name
            if (!empty($_GET['deviceName'])) {
                //The following query allows SQL injection due to the single quotes
                $sql .= " AND deviceName LIKE :deviceName"; //using named parameters
                $namedParameters[':deviceName'] = "%" . $_GET['deviceName'] . "%";
            }
         
            if (!empty($_GET['deviceType'])) {
                //The following query allows SQL injection due to the single quotes
                $sql .= " AND deviceType = :deviceType"; //using named parameters
                $namedParameters[':deviceType'] =   $_GET['deviceType'] ;
            }
                
            if (isset($_GET['available'])) {
                $sql .= " AND status LIKE 'A'";
            }
            
            if ($_GET['orderBy']=="name") {
                $sql .= " ORDER BY tc_device.deviceName ASC";
            }
            
            if ($_GET['orderBy']=="price") {
                $sql .= " ORDER BY tc_device.price ASC";
            }
        }
        
        if (!isset($_GET['submit'])){
            $sql .= " ORDER BY tc_device.deviceName ASC";
        }
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record) {
        
            echo  $record['deviceName'] . " " . $record['deviceType'] . " " .
                  $record['price'] .  "  " . $record['status'] . 
                  " &nbsp <a target='checkoutHistory' href='checkoutHistory.php?deviceId=".$record['deviceId']."'> Checkout History </a> <br />";
        
        }
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 5: Device Search </title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        
        <h1> Technology Center: Checkout System </h1>
        
        <form>
            Device: <input type="text" name="deviceName" placeholder="Device Name"/>
            Type: 
            <select name="deviceType">
                <option value=""> Select One </option>
                <?=getDeviceTypes()?>
            </select>
            
            <input type="checkbox" name="available" id="available"/>
            <label for="available"> Available </label>
            
            </br>
            Order by:
            <input type="radio" name="orderBy" id="orderByName" value="name" 
                <?= ($_GET['orderBy']=='name')?"checked":""  ?>
            />
             <label for="orderByName"> Name</label>
            <input type="radio" name="orderBy" id="orderByPrice" value="price" 
               <?php
                if ($_GET['orderBy']=="price") {
                    echo "checked";
                }
             
             ?>
            />
             <label for="orderByPrice"> Price</label>
             
             
            <input type="submit" value="Search!" name="submit" />
        </form>
        </br>
        <div id="devs">
            <?=displayDevices()?>
            
            <iframe name="checkoutHistory" width="600" height="400"></iframe>
            
        </div>
        
    </body>
</html>