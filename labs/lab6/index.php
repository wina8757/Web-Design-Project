<!DOCTYPE html>
<html>
    <head>
        <title> Lab 6: Admin Login Page </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    </head>
    <body>
        
    <div class="container">
        <div class="row">        
            <div class="col-xs-12">
               <h1> Admin Login </h1>
                
                <form method="POST" action="loginProcess.php">
                    
                    Username: <input type="text" class="form-control" name="username"/> <br />
                    
                    Password: <input type="password" class="form-control" name="password"/> <br />
                    
                    <input type="submit" class="btn btn-default" name="login" value="Login"/>
                    
                    
                </form>
            </div>
         </div>
     </div>
     
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>