<?php
  
include '../dbConnection.php';

$conn = getDatabaseConnection("finalproject");

function getMovieCategory() {
    global $conn;
    $sql = "SELECT DISTINCT(category)
            FROM `movie` 
            ORDER BY category";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        echo "<option> "  . $record['category'] . "</option>";
    }
}

function getMovieLength() {
    global $conn;
    $sql = "SELECT DISTINCT(time)
            FROM `movie` 
            ORDER BY time";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        echo "<option> "  . $record['time'] . "</option>";
    }
}

function getMovieYear() {
    global $conn;
    $sql = "SELECT DISTINCT(year)
            FROM `movie` 
            ORDER BY year DESC";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        echo "<option> "  . $record['year'] . "</option>";
    }
}

function getMovieRating() {
    global $conn;
    $sql = "SELECT DISTINCT(rating)
            FROM `movie` 
            ORDER BY rating";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) 
    {
        echo "<option> "  . $record['rating'] . "</option>";
    }
}

function displayMovies(){
    global $conn;
    
    $sql = "SELECT * FROM movie WHERE 1 ";
    
    
    if (isset($_GET['submit'])) {
        
        $namedParameters = array();
        
        
        if (!empty($_GET['movieName'])) {
            $sql .= " AND title LIKE :movie"; //using named parameters
            $namedParameters[':movie'] = "%" . $_GET['movieName'] . "%";
         }
         
        if (!empty($_GET['category'])) {
            $sql .= " AND category = :category"; //using named parameters
            $namedParameters[':category'] =  $_GET['category'] ;
         }     
     
        if (!empty($_GET['time'])) {
            $sql .= " AND time = :length"; 
            $namedParameters[':length'] =   $_GET['time'] ;
        }
        
        if (!empty($_GET['year'])) {
           $sql .= " AND year = :release_year";
            $namedParameters[':release_year'] =   $_GET['year'] ;
        } 
        
        if (!empty($_GET['rating'])) {
            $sql .= " AND rating = :rating"; 
            $namedParameters[':rating'] =   $_GET['rating'] ;
        } 
        
    }//endIf (isset)
    
    ?>

<!DOCTYPE html>
<html>
    <head>
        <link  href="css/styles.css" rel="stylesheet" type="text/css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
        
        <title>MovieStore </title>
    </head>
    <body background="movie_bg.jpg">
        

        <div id="wrapper">
             <h1 class="chrome"> Movie Store</h1>
             <fieldset id="color2" style="width: 1600px; height: 180px">
   
     
                     <form id="even">
                        <h1>User Section</h1>
                        Movie: <input type="text" name="movieName" placeholder="Movie Name"/>
                        Category: <select name="category">
                                      <option value="">Select One</option>
                                      <?=getMovieCategory()?>
                                  </select>
                        Length (mins): 
                                  <select name="time">
                                    <option value="">Select One</option>
                                    <?=getMovieLength()?>
                                  </select>
                        Release Year: 
                                 <select name="year">
                                    <option value="">Select One</option>
                                    <?=getMovieYear()?>
                                 </select>
                        Rating: 
                                 <select name="rating">
                                    <option value="">Select One</option>
                                    <?=getMovieRating()?>
                                 </select>
                        <br>
                        <input type="submit" id="color" value="Search!" name="submit" >
                       
                     </form>
               
             
                    <form id="even2" method="POST" class="even2" action="loginProcess.php" action="admin.php">
                        <h1> Admin Login Section </h1>
                        <label>Username:  </label><input type="text" name="username" size="20"> <br> 
                        <label>Password:  </label><input type="password" name="password" size="20"><br>
                        <input type="submit"  id="button" id="color" name="login" value="Login">
                        
                          
                    </form>
    
            </fieldset>
        </div>

        
        <br/><br/>
        <div class="table-responsive">  
            <table id="employee_data" class="table table-striped table-bordered">  
                <thead>  
                    <tr>  
                       <td>No</td>  
                       <td>Title</td>  
                       <td>Year</td>  
                       <td>Time</td>  
                       <td>Rating</td> 
                       <td>Release Date</td>
                       <td>Category</td>
                       
                    </tr>  
                </thead>  
                    <?php  
                      $stmt = $conn->prepare($sql);
                      $stmt->execute($namedParameters);
                      $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                    $i=1;
                    foreach ($records as $record) 
                    {  
                        echo '  
                        <tr>  
                        <td>'.$i.'</td>  
                        <td>'.$record["title"].'</td>  
                        <td>'.$record["year"].'</td>  
                        <td>'.$record["time"].'</td>  
                        <td>'.$record["rating"].'</td>
                        <td>'.$record["releasedate"].'</td> 
                        <td>'.$record["category"].'</td> 
                        </tr>  
                        ';
                        $i++;
                    }  
                    ?>  
            </table>  
        </div>  
    
            <?php
            }
            ?>
        
        
        <!--</fieldset>-->
          <center>
                  <br></br>
                  <fieldset style="width: 1600px; height: 2500px;  opacity: 0.9;">
                        <?php
      
                            displayMovies();
                        ?>
                  </fieldset>
          </center>
      
    </body>
</html>
        <?php
            unset($_SESSION["error"]);
        ?>


