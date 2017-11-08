<?php
$host = "us-cdbr-iron-east-05.cleardb.net";
$dbname="heroku_c95c62d6327a93c";
$username="bc1caf57472822";
$password="55c0d40e";
$conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
$conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
function getProductTypes() {
    global $conn;
    $sql = "SELECT DISTINCT(productType)
            FROM `tp_product` 
            ORDER BY productType";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo "<option> "  . $record['productType'] . "</option>";
        
    }
}
function displayProducts(){
    global $conn;
    
    $sql = "SELECT * FROM tp_product WHERE 1 ";
    
    
    if (isset($_GET['submit'])){
        
        $namedParameters = array();
        
        
        if (!empty($_GET['productName'])) {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
  
            $sql .= " AND productName LIKE :productName"; //using named parameters
            $namedParameters[':productName'] = $_GET['productName'];
         }
         
        if (!empty($_GET['productType'])) {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
  
            $sql .= " AND productType = :pType"; //using named parameters
            $namedParameters[':pType'] =   $_GET['productType'] ;
         }     
         
         if (isset($_GET['available'])) {
             $sql .= " AND status = :dAvailability"; //using named parameters
            $namedParameters[':dAvailability'] =  "y" ;
         }
        
         if (isset($_GET['orderBy']) == name) {
             if($_GET['orderBy'] == asc)
             {
                  $sql .= " ORDER BY productName";
             }else{
                 $sql .= " ORDER BY productName DESC";
             }
                   
         }
         
    
        
        
    }//endIf (isset)
    
    //If user types a deviceName
     //   "AND deviceName LIKE '%$_GET['deviceName']%'";
    //if user selects device type
      //  "AND deviceType = '$_GET['deviceType']";
    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
     foreach ($records as $record) {
        
        echo  $record['productName'] . "     " .
              "<a target='checkoutHistory' href='checkoutHistory.php?productId=".$record['productId'].
              "'> Checkout History </a>  <a href='addcart.php?item=".$record['productName'].
              "'> Add to Cart </a> <a href='description.php?productId=".$record['productId']."'> Description </a> <br /> </t>";
        
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Team Project: Shopping Cart</title>
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <meta name="theme-color" content="#ffffff">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Gochi+Hand" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
         <div class = "jumbotron">
        <h1 id="banner">Farm Fresh: Fruits, Veggies, and Nuts</h1>
        </div>
    </head>
    <body >
        <div class = "outer">
        <div id = display>
        <form>
            Product: <input type="text" name="productName" placeholder="Product Name"/>
            Type: 
            <select name="productType">
               <option value="">Select One</option>
                <?=getProductTypes()?>
            </select>
            
            <input type="checkbox" name="available" id="available">
            <label for="available"> Available </label>
            
            <br>
            Order by Name:
            <input type="radio" name="orderBy" id="orderByName" value="asc"/> 
             <label for="orderByName"> Asc </label>
            <input type="radio" name="orderBy" id="orderByName" value="desc"/> 
             <label for="orderByName"> Desc </label>
            
            <input type="submit" value="Search!" name="submit" >
        </form>
        
        <hr>
        <a href="cart.php">Look at cart <br/></a>
        
        <?=displayProducts()?>
        </div> <!-- display -->
        
        <iframe name="checkoutHistory" height="500" allowtransparency="true" style="background: #d5e1df;"></iframe>
        </div> <!-- outer -->
    </body>
</html>