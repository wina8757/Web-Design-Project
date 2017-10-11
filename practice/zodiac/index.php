<?php
    include 'functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Chinese Zodiac List </title>
    </head>
    <body>
        <h1> Chinese Zodiac List </h1>
        
        <ul>
            <?php
                $sum = yearList($_GET['start'], $_GET['end'], 1);
                echo "<h3>Year Sum: $sum</h3>";
            ?>

        </ul>
        
    </body>
</html>