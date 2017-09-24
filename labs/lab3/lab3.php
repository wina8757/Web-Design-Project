<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <style>
            @import url("css/styles.css");
        </style>
        <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
    </head>
    <header>
        <h1> Silverjack </h1>
    </header>
    <body>
        
        <?php
        session_start(); // start session
     
        $deck = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
        $start = microtime(true);
        if (!isset($_SESSION['matchCount'])) 
        { //checks whether the session exists
            $_SESSION['matchCount'] = 1;
            $_SESSION['totalElapsedTime'] = 0;
        }

        $suits = array("clubs","spades","hearts","diamonds");
        //get random number 0 to 51
        //get card until it goes past 35
        $pointTotal = 0;
        $names = array("Bob","Gillian","William","Dylan");
        shuffle($names);
        $winner = array(-1,-1,-1,-1);
        $j = 0;
        $winnerAmount = 0;
        for($i = 0; $i < 4;$i+=1)
        {
            echo "<div class='player'>";
            $total = 0;
            $cardArr = array();
            while($total<35)
            {
                do{
                    $bool = false;
                    $temp = rand(0,51);
                    if($deck[$temp] == 1)
                    {
                        $bool = true;
                    } else {
                        $deck[$temp] = 1;
                    }
                }while($bool);
                
                $cardArr[] = $temp;
                $total = $total + ($temp%13) + 1; 
            }
            if($total > $winnerAmount && $total <= 42)
            {
                $winner = array(-1,-1,-1,-1);
                $winner[0] = $i;
                $winnerAmount = $total;
                $j = 1;
            }
            
            
            else if($total == $winnerAmount)
            {
                $winner[$j] = $i;
                $j++;
            }
            echo "<div class='people'>";
            echo "<img src='img/$names[$i].jpg' style='border-style:solid;border-color:#4b0082;width:150px;height:150px;' />";
            echo "<h4 style='margin-left:10px;'>$names[$i]</h4>";
            echo "</div>";
            echo "<div class='cards'>";
            for($ii = 0; $ii < count($cardArr);$ii+=1)
            {
                echo"<img style='margin:1px;box-shadow:2px 2px #4b0082;' src='cards/".$suits[floor($cardArr[$ii] / 13)]."/".(($cardArr[$ii] % 13) + 1).".png' alt = '".$suits[floor($cardArr[$ii] / 13)].(($cardArr[$ii] % 13) + 1)."'>";
            }
            echo "</div>";
            echo "<p style='margin-right:50px;margin-left:25px;'>Points: $total</p>";
            $pointTotal = $pointTotal + $total;
            echo "</div>";
        }
        echo "</body>";
        echo "<footer>";
        $winningPoints = ($pointTotal-($winnerAmount*$j));
        
        $winnerNames = $names[$winner[0]];
       
        for($i = 1 ; $i < $j; $i++)
        {
            $winnerNames .=  " And " . $names[$winner[$i]]; 
        }
        
        echo "<p>$winnerNames wins " . $winningPoints ." points!!</p>";
        
       function elapsedTime()
       {
            global $start;
            echo "<hr>";
            $elapsedSecs = microtime(true) - $start;
            echo "This match elapsed time: " . $elapsedSecs . " secs <br /><br/>";

             echo "Matches played:"  . $_SESSION['matchCount'] . "<br />";

             $_SESSION['totalElapsedTime'] += $elapsedSecs;
     
             echo "Total elapsed time in all matches: " .  $_SESSION['totalElapsedTime'] . "<br /><br />";
     
            echo "Average time: " . ( $_SESSION['totalElapsedTime']  / $_SESSION['matchCount']);
     
            $_SESSION['matchCount']++;
        } //elapsedTime

        ?>
         <?=elapsedTime()?>
        </footer>
    
</html>