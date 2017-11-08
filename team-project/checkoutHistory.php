<?php

function displayCheckoutHistory() {
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $dbname="heroku_c95c62d6327a93c";
    $username="bc1caf57472822";
    $password="55c0d40e";
    $conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * 
            FROM `tp_history` 
            NATURAL JOIN tp_product
            NATURAL JOIN tp_user 
            WHERE productId = :productId";
    
    $namedParam = array(":productId"=>$_GET['productId']);
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $i =1;
    foreach ($records as $record) {
        
        echo "$i" .")." ."      PurchaseDate:  " .$record['purchaseDate'] . "<br />" . "<br />";
        echo "Product Name:  " .$record['productName']  . "<br />";
        echo "Product Type:  " .$record['productType'] . "<br />";
        echo "Price:  $ " .$record['price'] . ".00" ."<br />";
        echo "First Name:  " .$record['firstName'] . "<br />";
        echo "Last Name:  " .$record['lastName'] . "<br />";
        echo  "Email: " . " " .$record['email'] . "<br />";
        echo  "Phone Number: " . " " .$record['phone'] . "<br />";
        // echo  "Checkout Date: " . " " .$record['checkoutDate'] . "<br />";
        // echo  "Due Date: " . " " .$record['dueDate'] . "<br />";
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