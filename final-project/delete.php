<?php

    include '../dbConnection.php';
    $conn = getDatabaseConnection("finalproject");
    $sql="DELETE FROM movie
          WHERE mov_id=" . $_GET['movieId'];
    
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    
    header("Location: admin.php");
?>
