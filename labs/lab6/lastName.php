<?php
session_start();

if (!isset($_SESSION['username'])) { //validates that admin has indeed logged in
    
    header("Location: index.php");
    
}

 include '../../dbConnection.php';
 $conn = getDatabaseConnection();

function getDepartmentInfo(){
    global $conn;        
    $sql = "SELECT deptName, departmentId 
            FROM tc_department 
            ORDER BY deptName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $department = $stmt->fetchAll();
    
    return $department;
    
}

function getDepartment($userId) {
    global $conn;    
    $sql = "SELECT *
            FROM tc_user INNER JOIN tc_department 
            WHERE tc_user.deptId = tc_department.departmentId and userId = $userId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(); //returning one records only
    // print_r($record);
    return $record;
}

function getUserInfo($userId) {
    global $conn;    
    $sql = "SELECT * 
            FROM tc_user
            WHERE userId = $userId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(); //returning one records only
    // print_r($record);
    return $record;
}

if (isset($_GET['userId'])) {
    $userInfo = getUserInfo($_GET['userId']);
    $deptInfo = getDepartment($_GET['userId']);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: User Info </title>
        
        <style>
            .mytext {
                width: 200px;
            }
        </style>
    </head>
    <body>

    <h1> User Information </h1>

    <fieldset>
        
        <legend> Details </legend>
        
        <form>
            
            <input type="hidden" name="userId" value="<?=$userInfo['userId']?>" />
            First Name: <br><input type="text" name="firstName" class="mytext" required value="<?=$userInfo['firstName']?>" /> <br>
            Last Name: <br><input type="text" name="lastName" class="mytext" required value="<?=$userInfo['lastName']?>" /> <br>
            Email: <br><input type="text" name="email" class="mytext" required value="<?=$userInfo['email']?>" /> <br>
            University Id: <br><input type="text" name="universityId" class="mytext" required value="<?=$userInfo['universityId']?>" /> <br>
            Phone: <br><input type="text" name="phone" class="mytext" required value="<?=$userInfo['phone']?>" /> <br>
            Gender: <br><input type="text" name="gender" class="mytext" required value="<?=($userInfo['gender']== 'M')?"Male": "Female" ?>" /> <br>        
            Role: <br><input type="text" name="role" class="mytext" required value="<?=$userInfo['role']?>" /> <br>
            Department: <br><input type="text" name="department" class="mytext" value="<?=$deptInfo['deptName']?>" /> <br>
                    
        </form>
        
    </fieldset>


    </body>
</html>