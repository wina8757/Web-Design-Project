<?php
// print_r($_POST);
?>

<html>
    <head>
    </head>
    <body>
        
        <style>
            @import url("css/styles.css");
        </style>
        
        <h1><center><u>Result: </u></center></h1>
        <br /><br />

<?php
    $answer1 = $_POST['question-1-answers'];        
    $answer2 = $_POST['question-2-answers'];
    $answer3 = $_POST['question-3-answers'];
    $answer4 = $_POST['question-4-answers'];
    $answer5 = $_POST['question-5-answers'];
        
    $totalCorrect = 0;
            
    if ($answer1 == "B") { $totalCorrect++; }
    if ($answer2 == "B") { $totalCorrect++; }
    if ($answer3 == "B") { $totalCorrect++; }
    if ($answer4 == "A") { $totalCorrect++; }
    if ($answer5 == "D") { $totalCorrect++; }
    
    if($totalCorrect == 5)
    {
        echo "<img src= img/wow.gif>";
    }
    
    if(isset($_POST))
    {
        $user_fname = $_POST['fname'];
        $user_lname = $_POST['lname'];
        $user_id = $_POST['id'];
        $user_gender1 = $_POST['male'];
        $user_gender2 = $_POST['female'];
    }
    
    
		if(!isset($_POST['fname'])) 
		{  //form has not been submitted
            echo "<h2 style='color:red'>Type your First Name to start the quiz.</h2>";
        } 
        else 
        {   //form has been submitted
            if (empty($_POST['lname'])  && empty($_POST['id'])  ) 
            {
                echo "<h2 style='color:red'> Error! You must enter your Last Name and ID number.</h2>";
                return;
                exit;
            }
        }
      
   echo "<center><font face='Berlin Sans FB' size='8'><strong> First Name: </strong></font></center>" . $user_fname ;
    echo "<center><font face='Berlin Sans FB' size='8'><strong> Last Name: </strong></font></center>" . $user_lname . "<br />";
    echo "<center><font face='Berlin Sans FB' size='8'><strong> User ID : </strong></font></center>" . $user_id . "<br />";
    echo"<center><font face='Berlin Sans FB' size='8'>Your Score is <br> $totalCorrect / 5 correct </font></center>";
    
   
?>


</body>
</html>