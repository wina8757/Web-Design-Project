<?php
session_start();

$username = $_POST["username"];
$error = "Error! Username/Password is Incorrect";

if($username == $_GET['username']){
    $_SESSION["username"] = $username;
}else{
    $_SESSION["error"] = $error;
}



include '../dbConnection.php';
$conn = getDatabaseConnection("finalproject");

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT *
        FROM admin
        WHERE username = :username 
        AND   password = :password";

$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;        
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record

if (empty($record)) {
    
    echo "wrong username or password!";
    
} else {
    $_SESSION['username'] = $record['username'];
    $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];
    header("Location: admin.php"); //redirecting to admin portal
}

?>