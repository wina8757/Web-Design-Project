<?php
 function yearList($startYear, $endYear, $interval)
 {
            $sum =0;
            $j =0;
            
            if (isset($_GET['start'])) 
            {
             $startYear = $_GET['start'];
            }
    
            $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
            for($i = $startYear ; $i <= $endYear ; $i += $interval)
            {
                    echo "<li> Year $i";
                    if($i == 1776)
                    {
                        echo "<strong> USA INDEPENDENCE!</strong>";
                    } 
                    if($i % 100 == 0){
                        echo "<strong> Happy New Century!</strong>";
                    }
                    if($i >= 1900)
                    {
                         echo "<br />";
                         echo "<img src = 'img/".$zodiac[$j].".png' /img>";
                         $j++;
                    }
                    $sum += $i;
                    echo "</li>";
                    if($j>11)
                    {
                        $j = 0;
                    }
            }
            echo "<br/>";
            return $sum;
 }
?>