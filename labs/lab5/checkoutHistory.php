<?php


function displayCheckoutHistory() {
    
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT * 
            FROM `tc_checkout` 
            NATURAL JOIN tc_device
            NATURAL JOIN tc_user 
            WHERE deviceId = :deviceId";
    
    $namedParam = array(":deviceId"=>$_GET['deviceId']);
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $i =1;
    foreach ($records as $record) {
        
        echo "$i" .")." ."      Role:  " .$record['role'] . "<br />" . "<br />";
        echo "First Name:  " .$record['firstName']  . "<br />";
        echo "Last Name:  " .$record['lastName'] . "<br />";
        echo "University ID:  " .$record['universityId'] . "<br />";
        echo  "Email: " . " " .$record['email'] . "<br />";
        echo  "Phone Number: " . " " .$record['phone'] . "<br />";
        echo  "Checkout Date: " . " " .$record['checkoutDate'] . "<br />";
        echo  "Due Date: " . " " .$record['dueDate'] . "<br />";
        $i++;
        echo "<br />";
        }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Checkout History </title>
    </head>
    <body>
        
        <h2> Checkout History </h2>


        <?=displayCheckoutHistory()?>

    </body>
</html>