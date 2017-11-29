<?php
    
include 'dbConnection.php';
$conn = getDatabaseConnection();

    $sql = "INSERT INTO user_info(Zipcode)
            VALUES(:zip)";
    
    // INSERT INTO `user_info` (`Zipcode`) VALUES ('10111');
    $namedParameters = array();
    $namedParameters[':zip'] = $_GET['zip'];
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);


if(isset($_GET['zip'])) {
    global $conn;
    $sql = "SELECT Zipcode, TimeStamp
            FROM user_info
            WHERE Zipcode= :zip";

    $namedParameters = array();
    $namedParameters[':zip'] = $_GET['zip'];
            
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetchAll();//expecting only one record
    
    // print_r($record);
    
    echo json_encode($record);    
}

    // global $conn;
    // $sql = "SELECT COUNT(Zipcode) 
    //         FROM `user_info` 
    //         WHERE Zipcode= :zip ";
    // $namedParameters = array();
    // $namedParameters[':zip'] = $_GET['zip'];
            
    // $stmt = $conn->prepare($sql);
    // $stmt->execute($namedParameters);
    // $record = $stmt->fetchAll();//expecting only one record
    
    // // print_r($record);
    
    // echo json_encode($record);    

?>