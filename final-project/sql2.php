<?php
session_start();

if (!isset($_SESSION['username'])) { 
    header("Location: index.php");
    exit();
}

include '../dbConnection.php';

$conn = getDatabaseConnection("finalproject");

function displayReviewer(){
    global $conn;
    
    $sql = "SELECT title, year, rating, releasedate, country, category , MAX(rev_stars)
            FROM movie, rating 
            WHERE movie.mov_id=rating.mov_id 
            AND rating.rev_stars IS NOT NULL
            GROUP BY  releasedate
            ORDER BY MAX(rev_stars) DESC";
?>

<!DOCTYPE html>
<html>
    <head>
        <link  href="css/styles.css" rel="stylesheet" type="text/css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />  
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <div>
        <center>
        <title>Movie Store Admin Page </title>
    </head>
    
    <div id="wrapper">
    <h1 class="chrome">Movie Store Admin Page</h1>
    <body background="2.jpg">
        
        <br/><br/>
        
        <fieldset id="color2"  style="width: 624px; height: 130px">
                <h1>Menu </h1>

                      <a href="sql1.php" role="button" class="btn btn-primary">SQL1</a>
                      <a href="sql3.php" role="button" class="btn btn-info">SQL3</a>
                      <a href="admin.php" class="btn btn-default" style="background-color: #ffcc5c !important; border-color: #f9d5e5 !important">Return to Admin Page</a>
                
        </fieldset>

        <br/>
        
        
        <h4 style="color: #CE3175 !important">What is the query to find the movie title, and the highest number of stars that movie received according to the group of the newest movie and arranged by the highest rating descending order.</h4><br/>
        
        <div class="table-responsive">  
            <table id="employee_data" class="table table-striped table-bordered">  
                <thead>  
                    <tr>  
                       <td>No</td>  
                       <td>Movie Title</td>  
                       <td>Release Year</td>
                       <td>Movie Rate</td>
                       <td>Release Date</td>
                       <td>Country</td>
                       <td>Movie Category</td>
                       <td>Movie Rating Score</td>
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
                        <td>'.$record["rating"].'</td>  
                        <td>'.$record["releasedate"].'</td>  
                        <td>'.$record["country"].'</td>  
                        <td>'.$record["category"].'</td>  
                        <td>'.$record["MAX(rev_stars)"].'</td>  
                        ';
                        $i++;
                    }  
                    ?>  
            </table>  
        </div>  
    
            <?php
            }
            ?>
                <center>
                <br></br>
                <fieldset style="width: 1400px; height: 1200px;  opacity: 0.9;">
                    <?php
                        displayReviewer();
                    ?>
                </fieldset>
         
               </center>
    </div>
    </center>
    
    </body>
    
</html>



