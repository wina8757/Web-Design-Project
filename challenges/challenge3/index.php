<!DOCTYPE html>
<html>
    <head>
        <script>
    
    function myFunction(){
        document.getElementById("varMax").innerHTML = "";
        document.getElementById("range").innerHTML = "";
        document.getElementById("equal").innerHTML = "";
        document.getElementById("sorted").innerHTML = "";
            
            var n1= document.getElementById("n1").value;
            var n2= document.getElementById("n2").value;
            var n3= document.getElementById("n3").value;
            
            var xyz = [ n1, n2, n3];
            
            function between(x, y, z ) {
              if (x > 50 || x <1 || y > 50 || y <1 || z > 50 || z <1){
              document.getElementById("range").innerHTML =" <p style='color:red;'>Number must be between 1 & 50.</p>" ;
              document.getElementById("varMax").innerHTML = "";
              document.getElementById("equal").innerHTML = "";
              document.getElementById("sorted").innerHTML = "";
              }
            }
            
            function equal(x, y, z ) {
              if (x == y && y== z && x == z)
              document.getElementById("equal").innerHTML =" <p style='color:green;'>All of your numbers are equal.</p>" ;

            }
            
            function mySort(x, y, z ) {
              if (x == y && y== z && x == z)
              document.getElementById("equal").innerHTML =" <p style='color:green;'>All of your numbers are equal.</p>" ;
            }
            
            
            equal(n1, n2, n3);
            xyz.sort(function(a, b){return a-b});
            
            var inlsort= xyz.toString();
            
            document.getElementById("varMax").innerHTML = "The biggest number is " + xyz[2];
            
            document.getElementById("sorted").innerHTML ="The number in ascending order are: " + inlsort;
            
            between(n1, n2, n3);

        }
        
    </script>
        
        
        <title>Challenge 3 </title>
    </head>
    <body>
        <h1> Sorting Numbers</h1> </br>
        Enter 3 numbers from 1-50 </br><br />
        
        <form >
          Number 1: <input name="number1" type="text" id="n1">
          <br><br>
        Number 2: <input name="number2" type="text" id="n2">
          <br><br>
        Number 3: <input name="number3" type="text" id="n3">
          <br><br>
        </form>
        <button onclick="myFunction();">Sort!</button>
        
        <div id="equal">
            
        </div>
        
        <h3 id="range">
            
        </h3>
        
        <h3 id="varMax">
        
        </h3>
        
        <div id="sorted">
            
        </div>
        
    </body>
</html>