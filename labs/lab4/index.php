<?php
    $backgroundImage = "img/sea.jpg";
    if (isset($_GET['keyword'])) {
        include 'api/pixabayAPI.php';
        echo "You searched for: " . $_GET['keyword'];
        $imageURLs = getImageUrls($_GET['keyword']);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel </title>
        <meta charset="utf-8"/>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            @import url("css/styles.css");
            body {
                background-image: url(<?=$backgroundImage?>);
            }
        </style>
    </head>
    <body>
        <br/> <br/>
        <?php
            if(!isset($imageURLs)) {
                echo "<h2> Type a keyword to display a slideshow <br /> with some random images from Pixabay.com </h2>";
            }
            else {
                //Display Carousel here
        ?>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php
                    for ($i = 0; $i < 5; $i++) {
                        echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                        echo ($i == 0)?" class='active'": "";
                        echo "></li>";
                    }
                ?>
            </ol>
            <!-- Wrapper for Images -->
            <div class="carousel-inner" role="listbox">
                <?php
                    for ($i = 0; $i < 5; $i++) {
                        do {
                            $randomIndex = rand(0, count($imageURLs));
                        }
                        while (!isset($imageURLs[$randomIndex]));
                    
                        echo '<div class="item ';
                        echo ($i == 0)?"active": "";
                        echo '">';
                        echo "<img src='" . $imageURLs[$randomIndex] . "' width ='200' >";
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
            </div>
            
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            
        </div>
        
        <?php
            }
        ?>
        
        <!-- HTML form goes here -->
        <form>
            <input type="text" name="keyword" placeholder=" Keyword">
            <input type="submit" value="Submit" />
        </form>
        
        
        
        <br/> <br/>
        
    </body>
</html>