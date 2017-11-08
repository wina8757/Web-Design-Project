<?php
session_start();


$host = "us-cdbr-iron-east-05.cleardb.net";
$dbname="heroku_c95c62d6327a93c";
$username="bc1caf57472822";
$password="55c0d40e";
$conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
$conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$username = $_POST['email'];
//$password = $_POST['lastName'];


$sql = "SELECT *
        FROM tp_user
        WHERE email = :email";

$namedParameters = array();
$namedParameters[':email'] = $username;
//$namedParameters[':lastName'] = $password;        
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record



if (empty($record)) {
    
    echo "wrong username!";
    
} else {
    
    //echo "right credentials!";
    $_SESSION['username'] = $record['email'];
    $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];
  
   header("Location: items.php"); //redirecting to admin portal
}
?>

