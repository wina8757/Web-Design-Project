<?php
session_start();

if (!isset($_SESSION['username'])) 
{ 
    header("Location: index.php");
}
include("../dbConnection.php");
$conn = getDatabaseConnection("finalproject");


if (isset($_GET['movieId'])) {
    
   $movieInfo = getMovieInfo($_GET['movieId']);
    
}

function getMovieInfo()
{
    global $conn;    
    $sql = "SELECT * 
            FROM movie
            WHERE mov_id = :movieId";
    
    $namedParameters = array();
    $namedParameters[":movieId"] = $_GET['movieId'];  
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetchAll();
    return $record;
}

if (isset($_GET['addUserForm'])) {
    $mov_id     = $_GET['movieId'];
    $title      = $_GET['title'];
    $year       = $_GET['year'];
    $time       = $_GET['time'];
    $rating     = $_GET['rating'];
    $releasedate= $_GET['releasedate'];
    $country    = $_GET['country'];
    $category   = $_GET['category'];
    
    $sql = "INSERT INTO `movie`
            (`mov_id`, `title`, `year`,`time`, `rating`, `releasedate`, `country`, `category`) 
            VALUES (:movieId, :title, :year, :time, :rating, :releaseDate, :country, :category)";
			
	$namedParameters = array();
	$namedParameters[":title"] = $_GET['title'];
	$namedParameters[":movieId"] = $_GET['movieId'];
    $namedParameters[":year"] = $_GET['year'];
	$namedParameters[":time"] = $_GET['time'];
	$namedParameters[":rating"] = $_GET['rating'];
	$namedParameters[":releaseDate"] = $_GET['releasedate'];
	$namedParameters[":country"] = $_GET['country'];
	$namedParameters[":category"] = $_GET['category'];					
	
	
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <title> Admin: Adding Movie Information </title>
    </head>
    <body background="2014.jpg">
        
    <div id="wrapper">
             <h1 class="chrome">Adding Movie</h1>
             
             <br></br>        
             
        <center>
             <fieldset style="width: 550px; height: 450px; opacity: 0.9">
             <br/>

             <form class="form-horizontal">
                 <input type="hidden" name="movieId" value="<?=$movieInfo['mov_id']?>" />
                 
                 <div class="form-group">
                      <label class="control-label col-sm-3" for="title">Title:</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" required value="<?=$movieInfo['title']?>">
                      </div>
                 </div>
                 <div class="form-group">
                      <label class="control-label col-sm-3" for="year">Year:</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="year" required value="<?=$movieInfo['year']?>">
                      </div>
                 </div>
                 <div class="form-group">
                      <label class="control-label col-sm-3" for="time">Time:</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="time" required value="<?=$movieInfo['time']?>">
                      </div>
                 </div>
                 <div class="form-group">
                      <label class="control-label col-sm-3" for="rating">Rating:</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="rating" required value="<?=$movieInfo['rating']?>">
                      </div>
                 </div>
                 <div class="form-group">
                      <label class="control-label col-sm-3" for="releasedate">Release Date:</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="releasedate" required value="<?=$movieInfo['releasedate']?>">
                      </div>
                 </div>
                 <div class="form-group">
                      <label class="control-label col-sm-3" for="country">Country:</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="country" required value="<?=$movieInfo['country']?>">
                      </div>
                 </div>
                 <div class="form-group">
                      <label class="control-label col-sm-3" for="category">Category:</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="category" required value="<?=$movieInfo['category']?>">
                      </div>
                 </div>
                 
                 <!--<input type="submit" id="color" name="addUserForm" value="Add a New Movie!"/>-->
                 <button class="btn btn-success" name="addUserForm">Add a New Movie</button>
                 <a href="admin.php" class="btn btn-warning">Return to Admin Page</a>
             </form>
             
             </fieldset>
        </center>
    </div>
    
    </body>
</html>