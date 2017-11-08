<!DOCTYPE html>

<html>
    <head>
        <title>User Login</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Gochi+Hand" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
         <div class = "jumbotron">
        <h1 id="banner">Farm Fresh: Fruits, Veggies, and Nuts</h1>
        </div>
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <meta name="theme-color" content="#ffffff">
    </head>
    <body>
    <div class="login">
      <h2> User Login </h2>
        
        <form method="POST" action="loginProcess.php">
            
            Username: <input type="text" name="email"/> <br />
            <input type="submit" name="login" value="Login"/>
            
            <p>
                Example: ter@ter.com
            </p>
            
        </form>
        </div>
    </body>
</html>
