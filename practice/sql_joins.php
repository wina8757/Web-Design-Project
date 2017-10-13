<?php

$host = 'localhost';//cloud 9
$dbname = 'tcp';
$username = 'root';
$password = '';
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

function getUsersAndDepartments() {
    global $dbConn;
    
    $sql = "SELECT firstName, lastName, deptName FROM `tc_user`
            INNER JOIN tc_department
            ON tc_user.deptId = tc_department.departmentId
            ORDER BY lastName";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);
    foreach ($records as $record) 
    {
        echo $record['firstName'] . '  ' . $record['lastName'] .  '  ' . $record['deptName'] . "<br />";
    }
}

function getUsersCheckout() {
    global $dbConn;
    
    $sql = "select firstName, lastName FROM tc_user WHERE userId IN (SELECT userId FROM tc_checkout INNER JOIN tc_device 
            ON tc_checkout.deviceId = tc_device.deviceId AND
            tc_device.deviceType = 'Tablet' )";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // print_r($records);
    foreach ($records as $record) 
    {
        echo $record['firstName'] . $record['lastName'] . "<br />";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>SQL Joins </title>
    </head>
    <body>

        <h2> Users and their corresponding departments (order by last name) </h2>

        <?=getUsersAndDepartments()?>

        <hr>
        
        
        <h2> Users who have checked out Tablets </h2>
        
        <?=getUsersCheckout()?>
         
        <hr>

    </body>
</html>