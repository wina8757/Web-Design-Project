<?php
    function getRandomCard(){
     $randNum = rand(0,19);

             switch($randNum){
                case 0: $src = "img/clubs/ace.png";
                        $num=5;
                        break;
                case 1: $src = "img/clubs/jack.png";
                        $num =2;
                        break;
                case 2: $src = "img/clubs/king.png";
                        $num=4;
                        break;
                case 3: $src = "img/clubs/queen.png";
                        $num=3;
                        break;
                case 4: $src = "img/clubs/ten.png";
                        $num=1;
                        break;
                        
                case 5: $src = "img/diamonds/ace.png";
                        $num=5;
                        break;
                case 6: $src = "img/diamonds/queen.png";
                        $num=3;
                        break;
                case 7: $src = "img/diamonds/jack.png";
                        $num=2;
                        break;
                case 8: $src = "img/diamonds/king.png";
                        $num=4;
                        break;
                case 9: $src = "img/diamonds/ten.png";
                        $num=1;
                        break;
                        
                        
                case 10: $src = "img/hearts/ace.png";
                        $num=5;
                        break;
                case 11: $src = "img/hearts/jack.png";
                        $num=2;
                        break;
                case 12: $src = "img/hearts/king.png";
                        $num=4;
                        break;
                case 13: $src = "img/hearts/queen.png";
                        $num=3;
                        break;
                case 14: $src = "img/hearts/ten.png";
                        $num=1;
                        break;
                        
                        
                case 15: $src = "img/spades/ace.png";
                        $num=5;
                        break;
                case 16: $src = "img/spades/jack.png";
                        $num=2;
                        break;
                case 17: $src = "img/spades/king.png";
                        $num=4;
                        break;
                case 18: $src = "img/spades/queen.png";
                        $num=3;
                        break;
                case 19: $src = "img/spades/ten.png";
                        $num=1;
                        break;
            }
            return $src.$num;
    }
       
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Random Card Game</title>
    </head>
    
    <style>
        body{
            text-align:center;
        }
         #Text{
                display: inline-block;   
                text-align: center;
                margin: auto;
         }
         img{
             width: 200px;
             height: auto;
             
         }
         .Test{
             display: inline-block;
             verticle-align: middle;
         }

         
      
    </style>
    
    <body>
    
    <div>
        <h1>Random Card Game</h1>
        <div id="Text">
            <?php
            $humanCard = getRandomCard();
            $humanValue = intval(substr($humanCard,-1));
            $humanCard = substr($humanCard,0,-1);
            $computerCard = getRandomCard();
            $computerValue = intval(substr($computerCard,-1));
            $computerCard = substr($computerCard,0,-1);
            
            echo "<div class ='Test'>";
            echo" <p>Human</p>";
            echo "<img src= $humanCard >";
            echo "</div>";
            

            
            echo "<div class ='Test'>";
            echo "<p> Computer</p>";
            echo "<img src= $computerCard>";
            echo "</div>";

            if($computerValue > $humanValue)
            {
                echo "<p>Computer Wins</p>";
            }
            else if($computerValue < $humanValue){
                echo "<p>Human Wins</p>";
            }else{
                echo "<p>Tie</p>";
            }
        ?>
                
        </div>
       
        
        
    </div>
        
    </body>
</html>