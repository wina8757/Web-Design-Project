<?php

$letterArray = range("A","Z");

//Displays the "letter to find" and "letter to omit" dropdown menus
function lettersDropdown(){
    global $letterArray;
    foreach($letterArray as $letter){
        echo "<option value='$letter'>$letter</option>";
    }
}

//Creates array with all the random letters that will be displayed in the table
function getLetterTable($size,$letterToFind,$letterToOmit){
    global $letterArray;
    
    $letterTable = array();
    for ($i=0; $i < $size*$size; $i++) {
        do {
          //loops until it gets a random letter different from "letter to find" AND "letter to omit"
		  $randomLetter = $letterArray[array_rand($letterArray)];
		} while ($randomLetter == $letterToFind || $randomLetter == $letterToOmit);
        $letterTable[] = $randomLetter;
    }

    //places "letter to find" in a random position
    $letterTable[array_rand($letterTable)] = $letterToFind;     
    
    return $letterTable;
}

function displayTable() {
	if (isset($_GET['submit'])) {
		$letterToFind = $_GET['letterToFind'];
		$letterToOmit = $_GET['letterToOmit'];
		$size         = $_GET['size'];

        if ($letterToFind == $letterToOmit) {
			echo "<br /><br /><strong>Error: Letter to Find MUST Be different from Letter to Omit!</strong>";
			return;
        }
		
		echo "<hr><h1> Find the letter " . $letterToFind . "</h1>";
		echo "<strong> Letter to Omit: " . $letterToOmit . "</strong><br />";

        $letterTable = getLetterTable($size,$letterToFind,$letterToOmit);
 		echo "<table border='1' style='margin:0 auto' cellpadding=7>";
 	 	$index = 0;
		for ($rows = 0; $rows < $size; $rows++) {
			echo "<tr>";
			for ($cols = 0; $cols < $size; $cols++) {
			   $letterToDisplay = $letterTable[$index];
				if ($letterToDisplay < 'H') {
					$color="red";
				} else if ($letterToDisplay < 'P') {
					$color="blue";
				} else {
					$color="green";
				}
				echo "<td style='color:$color'>" . $letterToDisplay . "</td>";
				$index++;
			}//endFor (cols)
			echo "</tr>";
		}//endFor (rows)
		echo "</table>";	
		
	}//endIf (submit)	
}//endFunction
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Midterm Practice - Program 1: Find the Letter</title>
  <style>
	td {
		font-size: 1.8em;
	}
	#wrapper {
		margin: 0 auto;
		width: 800px;
		text-align: center;
	}
  </style>
</head>

<body>
  <div id="wrapper">
    	<h3> Find the Letter!</h3>
    	<form method='get'>
        	<strong> Select a Letter to Find:</strong>
    		<select name="letterToFind">
    			<?=lettersDropdown()?>
    		</select>
    		<br /><br />
    		
    		Select Table Size:
    		<select name="size">
    			<option value="6">6x6</option>
    			<option value="7">7x7</option>
    			<option value="8">8x8</option>
    			<option value="9">9x9</option>
    			<option value="10">10x10</option>
    		</select>
    		<br /><br />
    		
    		Select Letter to Omit:
    		<select name="letterToOmit">
    			<?=lettersDropdown()?>
			</select>
			<br /><br />
			<input type="submit" value="Create Table" name="submit" />
			
		</form>
			
		<?=displayTable() ?>
   </div>
</body>
</html>