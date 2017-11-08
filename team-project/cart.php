<?php
session_start();

function display() {
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Cart </title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Gochi+Hand" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
         <div class = "jumbotron">
        <h1 id="banner">Farm Fresh: Fruits, Veggies, and Nuts</h1>
        </div>
    </head>
    <body>
        <div id="display">
            <h2>Cart</h2>
            <?php
            if(isset($_SESSION['h']))
            {
            foreach($_SESSION['h'] as $val)
            {
                echo "<br>";
                echo $val;
            }
    
            }
            ?>
        </div>
    </body>
</html>