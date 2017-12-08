<?php
    
include '../dbConnection.php';
$conn = getDatabaseConnection("finalproject");

$sql = "SELECT *
        FROM admin
        WHERE username = :username";

$namedParameters = array();
$namedParameters[':username'] = $_GET['username'];
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record

// print_r($record);

echo json_encode($record);
?>