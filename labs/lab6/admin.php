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
            ORDER BY lastName";
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
        <script>
           
            function confirmDelete(firstName) {
                return confirm("Are you sure that you want to delete " + firstName + " ?");
            }
            
        </script>
        
        
        <style>
            #log {
                display:inline;
            }
        </style>
    </head>
    <body>

        <h1> TCP ADMIN PAGE </h1>
        <h2> Welcome <?=$_SESSION['adminFullName']?>! </h2>
        
        <hr>
        
        <form id="log" action="addUser.php" >
            <input type="submit" value="Add new User" />
        </form>
        
         <form id="log" action="logout.php" style=display:"inline">
            <input type="submit" value="Logout" />
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