<?php

  //print_r($_FILES);
  
  
  function go() {
      echo "<div id='images'>";
      echo "File size " . $_FILES['myFile']['size'];
      
      if (($_FILES["myFile"]["size"]) < 1000000) {
        move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"] );
      } else {
          echo "<h1> file too big! </h1>";
      }
      echo "</div>";
      

      $files = scandir("gallery/", 1);
      for ($i = 0; $i < count($files) - 2; $i++) {
         echo "<img src='gallery/" .   $files[$i] . "' width='50' id =".$files[$i]." >";
      }
  }
  
/*
  function checkUpload() {
      echo "Size: " . ($_FILES["myFile"]["size"]/1000000) . " MB<br>";
  }
*/
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Photo Gallery </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <style>
            h2 {
                background-color: yellow;
                color: red;
            }
            
            body {
                text-align: center;
                background-color: lightblue;
                font-style: normal;
                font-family: Arial,Helvetica;
                font-size:15px;
            }
            
            #Text, #Img{
                float: left;
            }

            #Img img{
                width: 75%;
                border-radius: 10px;
            }

            footer{
                clear: left;
                text-align: center;
                margin: 0px auto;
                width: 700px;
            }

            #footer1{
                    width: 100%;  
                    color: white;
                    background-color: #969696;
                    height: 3px;
            }
        </style>

        <?=go()?>

        <div id="bigPic">

        </div>
        
        <script>
            $(document).ready(function() {
                
                $("img").click(function() {
                  $("#bigPic").empty()
                  $("#bigPic").prepend("<img src='gallery/" + $(this).attr('id') +  "' width = 500/>")
                });
                
            
          } ); 
        
        </script>
        
    </head>
    <body>

    <h2> Photo Gallery </h2>
    <form method="POST" enctype="multipart/form-data"> 

        <input type="file" name="myFile" /> 
        <input type="submit" value="Upload File!" />

    </form>

    <hr id="footer1">
        
        <footer>
            
            <div id="Img">
                <img  src="img/csumb.jpg" alt="CSUMB Logo" />
            </div> 
            
            <div id="Text">
             CST 336-02 Internet Programming. 2017&copy; Winardinata <br />
             <strong>Disclaimer:</strong> The information in this web is fictitous. <br />
             It is used for academic purpose only
            </div>
            
        </footer>
        
    </body>
</html>