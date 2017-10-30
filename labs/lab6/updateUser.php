<?php
    session_start();
    
    if (!isset($_SESSION['username'])) { // Validates that the admin is logged in
        header("Location: index.php");
    }
    
    include("../../dbConnection.php");
    $conn = getDatabaseConnection();
    
    function getDepartmentInfo(){
        global $conn;
        
        $sql = "SELECT deptName, departmentId 
                FROM tc_department 
                ORDER BY deptName 
                ASC";
                    
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll();
        //print_r($records);        
        return $records;
    }
    
    function getUserInfo($userId) {
        global $conn;    
        $sql = "SELECT * 
                FROM tc_user
                WHERE userId = $userId";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch();

        return $record;
    }
    
    if (isset($_GET['updateUserForm'])) {
        $sql = "UPDATE tc_user
                SET firstName = :fName,
                lastName = :lName,
                email = :email,
                universityId = :universityId,
                gender = :gender,
                phone = :phone,
                role = :role,
                deptId = :deptId
			    WHERE userId = :userId";
        

        $namedParameters = array();
        $namedParameters[':fName'] =  $_GET['firstName'];
        $namedParameters[':lName'] =  $_GET['lastName'];
        $namedParameters[':email'] =  $_GET['email'];
        $namedParameters[':universityId'] =  $_GET['universityId'];
        $namedParameters[':gender'] = $_GET['gender'];
        $namedParameters[':phone']  =  $_GET['phone'];
        $namedParameters[':role']   = $_GET['role'];
        $namedParameters[':deptId'] = $_GET['deptId'];
        
        
    	$namedParameters[':userId'] = $_GET['userId'];
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
       
        
        echo "User has been updated successfully!";
    }

    if (isset($_GET['userId'])) {
        
        $userInfo = getUserInfo($_GET['userId']);

        //print_r($userInfo);
        
        
    }


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Updating User </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
         <style>
            @import url("css/styles.css");
        </style>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1> Admin Section </h1>
        <h2> Updating User Info </h2>
        
        <fieldset>
            <legend> Updating User </legend>
            
            <form>
                First Name: <input type="text" name="firstName" required value="<?=$userInfo['firstName']?>"/> 
                </br>
                Last Name: <input type="text" name="lastName" required value="<?=$userInfo['lastName']?>"/> 
                </br>
                Email: <input type="text" name="email" required value="<?=$userInfo['email']?>"/>
                </br>
                University Id: <input type="text" name="universityId" value="<?=$userInfo['universityId']?>"/>  
                </br>  
                Phone: <input type="text" name="phone" value="<?=$userInfo['phone']?>"/>
                </br>
                Gender: <input type="radio" name="gender" id="genderF" value="F" <?=($userInfo['gender']=='F')?"checked":""?> required/>
                        <label for="genderF">Female</label>
                        <input type="radio" name="gender" id="genderM" value="M" <?=($userInfo['gender']=='M')?"checked":""?> required/>
                        <label for="genderM">Male</label>
                </br>
                Role: <select name="role">
                        <optionue=""> Select One </option>
                        <option <?=($userInfo['role']=="Faculty")?"selected":""?>>Faculty</option>
                        <option <?=($userInfo['role']=="Student")?"selected":""?>>Student</option>
                        <option <?=($userInfo['role']=="Staff")?"selected":""?>>Staff</option>
                      </select>
                </br>
                Department: <select name="deptId">
                                <option value=""> Select One </option>
                                <?php
                                    $records = getDepartmentInfo();
                                   
                                    foreach ($records as $record) {
                                        
                                        echo  "<option value='" . $record['departmentId'] . "' ";
                                        
                                        
                                        if ($userInfo['deptId'] == $record['departmentId'])
                                            echo "selected='selected'";
                                            
                                        echo ">" . $record['deptName'] . "</option>";
                                    }
                                    
                                ?>
                            </select>
                </br>
                <input type="submit" name="updateUserForm" value="Update User!"/>
                
            </form>
        </fieldset>
        
    </body>
</html>