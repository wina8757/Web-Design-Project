<?php
     include 'functions.php';
     
     $mennames = array(
    'Christopher','Ryan','Ethan', 'John','Jackson','Aiden','Lucas', 'Liam','Noah', 'Isaac' ,'Peter', 'Justin' , 'Jake', 'Samuel'
    ,'Riley','Mason','Chase','Grayson','Gary','Mike  ','Joel','Kanye', 'Lennon' , 'Jesus' , 'Gabriel' , 'Will', 'Alex' ,'Hunter'  
    ,'Zeke','Blaze','Jax','Zander','Ajax',' Maddox','Nixon', 'Adam', 'Jason', 'Brad', 'Brandon', 'Philip' ,'Filipe', 'Contantine'
    ,'Paul','Ryan','Daniel','Kevin','Kevin', 'Mathew' , 'Mark' ,'Marcus' , 'Lucas', 'Timothy', 'Christopher', 'Sandy'
    ,'Tom','Derek','Marcus','Drew','Benjamin','Brett');
            
        array_unique($mennames);
        shuffle($mennames);
        
        for($i=0;$i<1;$i++)
        {
            if($mennames!=null)
            {
                 echo "  ";
                 $random_name = $mennames[rand(0, sizeof($mennames) - 1)];
                 echo "               ";
                 echo "&nbsp";
                 echo "&nbsp"; 
                 echo "&nbsp";
                 echo "&nbsp";
            } 
            else
            {
                 echo "Error: There is no names in array";
                 reset($mennames);
            }
   
   
            echo "<font size=12 >";
            echo $random_name;
            echo "</font>";
        }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Workout Program </title>
        <meta charset="utf-8"/>
    </head>
    
    <link href="styles.css" rel="stylesheet" type="text/css" />
    
    <body>
        <h1>Workout Routine</h1>
        <div id = "Text">
            <?php

            $workoutCard1 = displayPic();
            $workoutCard1= substr($workoutCard1,0,-1);
            
            $workoutCard2 = displayPic();
            $workoutCard2= substr($workoutCard2,0,-1);
            
            $workoutCard3 = displayPic();
            $workoutCard3= substr($workoutCard3,0,-1);
            
            $workoutCard4 = displayPic();
            $workoutCard4= substr($workoutCard4,0,-1);
            
            $workoutCard5 = displayPic();
            $workoutCard5= substr($workoutCard5,0,-1);
             
            $picture = array($workoutCard1, $workoutCard2, $workoutCard3
            ,$workoutCard4, $workoutCard5);
            array_unique($picture);
            
            echo"<div class ='Test'>";
            echo" <p>Monday</p>";
            echo "<img src= $workoutCard1 >";
            echo "</div>";
            
            echo "<div class ='Test'>";
            echo" <p>Tuesday</p>";
            echo "";
            echo "<img src= $workoutCard2 >";
            echo "</div>";
            
            echo "<div class ='Test'>";
            echo" <p>Wednesday</p>";
            echo "<img src= $workoutCard3 >";
            echo "</div>";
            
            echo "<div class ='Test'>";
            echo" <p>Thursday</p>";
            echo "<img src= $workoutCard4 >";
            echo "</div>";
            
            echo "<div class ='Test'>";
            echo" <p>Friday</p>";
            echo "<img src= $workoutCard5>";
            echo "</div>";

   

            ?>
            
            
    <br /><br /><br />
       <form>
          <font size=5>
          <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
          <input type='submit' value='Generate Sample Workout'/>
        </form>
        
        </div>
        
        <hr id="footer_hr">
        
        <footer>
            <!--<br /><br />-->
            
            <div id="Logo">
                <img  src="img/csumb.jpg" alt="CSUMB Logo" />
            </div> 
            
            <div id="Footer_text">
            <link href="https://fonts.googleapis.com/css?family=Amita" rel="stylesheet"> 
            
            CSUMB 2017&copy; Jessen Winardinata <br/>
            <strong>
                Disclaimer.
            </strong>
            <small>
            This is for academic puposes only. <br/>
            </small>
            
            </div>
            
        </footer>
        
    </body>
</html>

