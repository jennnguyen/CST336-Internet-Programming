<?php
    include 'inc/header.php';
?>
            
        <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
      <h2>Pets</h2>  
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
    
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="img/alex.jpg" alt="Los Angeles" style="width:100%;">
          </div>
    
          <div class="item">
            <img src="img/bear.jpg" alt="Chicago" style="width:100%;">
          </div>
        
          <div class="item">
            <img src="img/carl.jpg" alt="New york" style="width:100%;">
          </div>
          
          <div class="item">
            <img src="img/charlie.jpg" alt="New york" style="width:100%;">
          </div>
          
          <div class="item">
            <img src="img/lion.jpg" alt="New york" style="width:100%;">
          </div>
          
          <div class="item">
            <img src="img/otter.jpg" alt="New york" style="width:100%;">
          </div>
          
          <div class="item">
            <img src="img/sally.jpg" alt="New york" style="width:100%;">
          </div>
          
          <div class="item">
            <img src="img/samantha.jpg" alt="New york" style="width:100%;">
          </div>
          
          <div class="item">
            <img src="img/ted.jpg" alt="New york" style="width:100%;">
          </div>
          
          <div class="item">
            <img src="img/tiger.jpg" alt="New york" style="width:100%;">
          </div>
        </div>
    
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

</body>
</html>
        <br /><br />
        <a class="btn btn-outline-primary" href="adoptions.php" role="button">Adopt Now! </a>

        <br /><br />
        <hr>
        
<?php
    include 'inc/footer.php';
?>