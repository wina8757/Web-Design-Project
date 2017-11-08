<?php

function displayDescription() {
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $dbname="heroku_c95c62d6327a93c";
    $username="bc1caf57472822";
    $password="55c0d40e";
    $conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * 
            FROM `tp_product` 
            WHERE productId = :productId";
    
    $namedParam = array(":productId"=>$_GET['productId']);
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
   
    foreach ($records as $record) {
        
       
        echo "Product Name:  " .$record['productName']  . "<br />";
        $product = $record['productName'];
        
        echo "Product Type:  " .$record['productType'] . "<br />";
        echo "Price:  $ " .$record['price'] . ".00" ."<br />";
        echo "<br />";
        
        echo "<img src='img/$product.jpg' alt='$product'>";
       //  echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='" . ucfirst($symbol). "' width='70'>"  ;
        
        
        }
        
      
    
}

function displayProduct(){
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Product Description </title>
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <meta name="theme-color" content="#ffffff">
    </head>
    <body>
        
        <h2> Product Description </h2>


        <?=displayDescription()?>

    </body>
</html>