<?php
session_start();

if (!isset($_SESSION['username'])) { //checks whether admin has logged in
    
    header("Location: index.php");
    exit();
    
}

include '../../dbConnection.php';
$conn = getDatabaseConnection();


function displayUsers() {
    global $conn;
    $sql = "SELECT * 
            FROM tc_user
            ORDER BY userId";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($users);
    return $users;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page </title>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <script>
           
            function confirmDelete(firstName) {
                return confirm("Are you sure that you want to delete " + firstName + " ?");
            }
            
        </script>
        
        
        <style>
            #log {
                display:inline;
            }
            
            h1,h2, body {
                text-align:center;
                background: linear-gradient(to bottom, #cc99ff 0%, #ffff99 100%);
            }
        </style>
    </head>
    <body>
        
        <h1> TCP ADMIN PAGE </h1>
        <h2> Welcome <?=$_SESSION['adminFullName']?>! </h2>
        <hr>
                    
        <form id="log" action="addUser.php" >
            <input type="submit" class="btn btn-info" value="Add new User" />
        </form>
                    
        <form id="log" action="logout.php" style=display:"inline">
            <input type="submit" class="btn btn-info" value="Logout" />
        </form>
                    
        <br /> <br />
        
        <?php
        
        $users =displayUsers();
        
        foreach($users as $user) {
            
            // echo $user['userId'] . '  ' . $user['firstName'] . "  " . $user['lastName'];
            echo $user['userId'] . " ";
            echo "[<a href='firstName.php?userId=".$user['userId']."'> ".$user['firstName']." </a> ]";
            echo " "."[<a href='lastName.php?userId=".$user['userId']."'> ".$user['lastName']." </a> ]";
            // echo "[<a href='updateUser.php?userId=".$user['userId']."'> Update </a> ]";
            echo "<form action='updateUser.php' style='display:inline'>
                        <input type='hidden' name='userId' value='".$user['userId']."' />
                        <input type='submit' value='Update'>
                  </form>
            ";
            // echo "[<a href='deleteUser.php?userId=".$user['userId']."'> Delete </a> ]";
            echo "<form action='deleteUser.php' style='display:inline' onsubmit='return confirmDelete(\"". $user['firstName']. " ". $user['lastName']. "\")'>
                        <input type='hidden' name='userId' value='".$user['userId']."' />
                        <input type='submit' value='Delete'>
                  </form>
                  ";
            
            echo "<br />";
        }
        
        
        
        ?>
        
    </body>     
</html>