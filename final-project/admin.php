<?php
session_start();

if (!isset($_SESSION['username'])) { 
    header("Location: index.php");
    exit();
}

include '../dbConnection.php';

$conn = getDatabaseConnection("finalproject");

function displayMovies(){
    global $conn;
    
    $sql = "SELECT * FROM movie WHERE 1 ";

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
    <body background="Movie-poster.jpg">
        
        <br/><br/>
        
        <fieldset id="color2"  style="width: 624px; height: 130px">
            <!--<div class="container">-->
                <h1>Menu </h1>
                <!--       <form  id="form" method="POST"  action="insert.php" >-->
                <!--          <input type="submit"  id="color" value="Insert A New Game" />-->
                <!--       </form>-->
          
                <!--       <form id="form" action="index.php">-->
                <!--          <input type="submit"  id="color" value="Admin Logout" />-->
                <!--       </form>-->
                
                <!--<div>-->
                <!--      <form id="form" action="report1.php">-->
                <!--          <input type="submit"  id="color" value="Average Team Size " />-->
                <!--      </form>-->
                    
                <!--      <form id="form" action="report2.php">-->
                <!--          <input type="submit" id="color" value="Average Game Cost " />-->
                <!--      </form>-->
                      
                <!--      <form id="form" action="report3.php">-->
                <!--          <input type="submit" id="color" value="See Report3" />-->
                <!--      </form>-->
                <!--</div>-->
                      <a href="insert.php" role="button" class="btn btn-warning">Insert a New Movie</a>
                      <a href="sql1.php" role="button" class="btn btn-primary">SQL1</a>
                      <a href="sql2.php" role="button" class="btn btn-success">SQL2</a>
                      <a href="sql3.php" role="button" class="btn btn-info">SQL3</a>
                      <a href="index.html" role="button" class="btn btn-warning" style="background-color: #B18F6A !important">Create Account</a>
                      <a href="index.php" class="btn btn-danger">Admin Logout</a>
                <!--</div>-->
                
        </fieldset>

        <br/>
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
                       <td>Update Link</td>
                       <td>Delete Link</td>
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
                        <td>'."<a href='update.php?movieId=".$record['mov_id']."' class='btn btn-default' style='background-color: #f7cac9 !important; border-color: #d5f4e6'> Update </a>". '</td> 
                        <td>'."<a href='delete.php?movieId=".$record['mov_id']. "' class='btn btn-default' style='background-color: #b7d7e8 !important; border-color: #d5f4e6'> Delete </a>". '</td> 
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
                <fieldset style="width: 1200px; height: 3500px;  opacity: 0.9;">
                    <?php
                        displayMovies();
                    ?>
                </fieldset>
         
               </center>
    </div>
    </center>
    
    </body>
    
</html>



