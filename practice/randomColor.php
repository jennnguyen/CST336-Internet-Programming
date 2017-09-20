<?php
    function getRandomColor() {
        return "rgba(".rand(0, 255).", ".rand(0, 255).", ".rand(0, 255).", ". (rand(0, 100) / 100).");";
    }


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Random Background Color</title>
        <meta charset="utf-8"/>
        
        <style>
            body {
                /*background-color: rgba(15, 20, 200, .5);*/
                <?php
                
                echo "background-color: rgba(".rand(0, 255).", ".rand(0, 255).", ".rand(0, 255).", ". (rand(0, 100) / 100).");"
                
                ?>
                
            }
            
            h1{
              <?php
                echo "background-color: rgba(".rand(0, 255).", ".rand(0, 255).", ".rand(0, 255).", ". (rand(0, 100) / 100).");";
                echo "color: " . getRandomColor();
                ?>
            }
            
            h2{
                
              background-color: <?=getRandomColor()?>;  
            }
        </style>
    </head>
    <body>
        <h1>Welcome</h1>
        <h2>Jennifer Nguyen</h2>
        
        
    </body>
    
    
    
</html>