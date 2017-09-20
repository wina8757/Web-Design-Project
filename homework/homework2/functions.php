<?php 
        function displayPic()
        {
            $randomValue = rand(0,20);
            switch($randomValue){
                case 0: $symbol = "1";
                        break;
                case 1: $symbol = "2";
                        break;
                case 2: $symbol = "3";
                        break;
                case 3: $symbol = "4";
                        break;
                case 4: $symbol = "5";
                        break;
                case 5: $symbol = "6";
                        break;
                case 6: $symbol = "7";
                        break;
                case 7: $symbol = "8";
                        break;
                case 8: $symbol = "9";
                        break;
                case 9: $symbol = "10";
                        break;
                case 10: $symbol = "11";
                        break;
                case 11: $symbol = "12";
                        break;
                case 12: $symbol = "13";
                        break;
                case 13: $symbol = "14";
                        break;
                case 14: $symbol = "15";
                        break;
                case 15: $symbol = "16";
                        break;
                case 16: $symbol = "17";
                        break;
                case 17: $symbol = "18";
                        break;
                case 18: $symbol = "19";
                        break;
                case 19: $symbol = "20";
                        break;
                case 20: $symbol = "21";
                        break;
            }
            echo "<img src ='img/$symbol.jpg' alt='Workout picture'
            title='$symbol'  />";

        }
        
?>