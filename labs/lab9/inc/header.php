<!DOCTYPE html>
<html>
    <head>
        <title> CSUMB: Pet Shelter </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
       
        <style>
            .jumbotron{
              color: #d5f4e6;
              background: #f7cac9;
            }
        
            body {
                background: #ffef96;
                text-align: center;
            }
            
            .carousel-item img {
                display: block;
                height: 250px;
                line-height: 1;
                margin:auto;
                width: 250px; 
            }
        </style>
   
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
          <a class="navbar-brand" href="https://csumb.edu">CSUMB</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link" href="adoptions.php">Adoptions</a>
            </div>
          </div>
        </nav>
        
        
        <div class="jumbotron">
          <h1> CSUMB Animal Shelter</h1>
          <h2> The "official" animal adoption website of CSUMB </h2>
        </div>
        
       <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="10"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                  <img class="d-block img-fluid" src="img/alex.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block img-fluid" src="img/bear.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block img-fluid" src="img/carl.jpg" alt="Third slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block img-fluid" src="img/charlie.jpg" alt="Forth slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block img-fluid" src="img/lion.jpg" alt="Fifth slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block img-fluid" src="img/otter.jpg" alt="Sixth slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block img-fluid" src="img/otter.jpg" alt="Seventh slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block img-fluid" src="img/sally.jpg" alt="Eighth slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block img-fluid" src="img/samantha.jpg" alt="Ninth slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block img-fluid" src="img/ted.jpg" alt="Tenth slide">
              </div>
              <div class="carousel-item">
                  <img class="d-block img-fluid" src="img/tiger.jpg" alt="Eleventh slide">
              </div>
          </div>
  
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
     </div>