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
        foreach ($records as $record) {
            echo  "<option value='" . $record['departmentId'] . "'>" . $record['deptName'] . "</option>";
        } 
    }
    
    
    if (isset($_GET['addUserForm'])) { // If the user clicked on the "Add User" button
        $firstName = $_GET['firstName'];
        $lastName = $_GET['lastName'];
        $email    = $_GET['email'];
        $universityId = $_GET['universityId'];
        $phone    = $_GET['phone'];
        $gender   = $_GET['gender'];
        $role   = $_GET['role'];
        $deptId   = $_GET['deptId'];
        // INSERT INTO `tc_user` (`userId`, `firstName`, `lastName`, `email`, `universityId`, `gender`, `phone`, `role`, `deptId`) VALUES ('1', 'firstName', 'lastName', 'email', 'uni', 'F', 'phone', 'role', '1')
        $sql = "INSERT INTO tc_user
                (firstName, lastName, email, universityId, gender, phone, role, deptId)
                VALUES
                (:fName, :lName, :email, :universityId, :gender, :phone, :role, :deptId)";
                
        $namedParameters = array();
        $namedParameters[':fName'] =  $firstName;
        $namedParameters[':lName'] =  $lastName;
        $namedParameters[':email'] =  $email;
        $namedParameters[':universityId'] =  $universityId;
        $namedParameters[':gender'] = $gender;
        $namedParameters[':phone']  = $phone;
        $namedParameters[':role']   = $role;
        $namedParameters[':deptId'] = $deptId;
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        
        echo "User has been added successfully!";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Adding New User </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
         <style>
            @import url("css/styles.css");
        </style>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1> Admin Section </h1>
        <h2> Adding New Users</h2>
        
        <fieldset>
            <legend> Add New User </legend>
            
            <form>
                First Name: <input type="text" name="firstName" required/> 
                </br>
                Last Name: <input type="text" name="lastName" required/> 
                </br>
                Email: <input type="text" name="email" required/>
                </br>
                University Id: <input type="text" name="universityId"/>  
                </br>  
                Phone: <input type="text" name="phone"/>
                </br>
                Gender: <input type="radio" name="gender" id="genderF" required/>
                        <label for="genderF">Female</label>
                        <input type="radio" name="gender" id="genderM" required/>
                        <label for="genderM">Male</label>
                </br>
                Role: <select name="role">
                        <optionue=""> Select One </option>
                        <option>Faculty</option>
                        <option>Student</option>
                        <option>Staff</option>
                      </select>
                </br>
                Department: <select name="deptId">
                                <option value=""> Select One </option>
                                <?php
                                    getDepartmentInfo();
                                ?>
                            </select>
                </br>
                <input type="submit" name="addUserForm" value="Add User!"/>
                
            </form>
        </fieldset>
        
    </body>
</html>