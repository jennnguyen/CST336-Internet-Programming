<?php

    function displaySymbol($symbol) {
        
        echo "<img src='../labs/lab2/img/$symbol.png' width='70' /> ";
        
    }

    $symbols = array("lemon", "orange", "cherry");
    
    //print_r($symbols); // displays array contents, only for debugging purposes
    
    //echo $symbols[0]; // displays first element in array

    //displaySymbol($symbols[2]);
    
    
    
    $symbols[] = "grapes"; //adds element at the end
    //$symbols[2] = "seven"; //replacing value
    
    array_push($symbols, "seven"); //adds element at the end of the array
    
    //displaySymbol($symbols[4]);
    
    for ($i = 0; $i < 5; $i++) {
        displaySymbol($symbols[$i]);
    }
    sort($symbols);
    print_r($symbols);
    
    //rsort($symbols);
    
    echo "<hr>";
    //shuffle($symbols);
    print_r($symbols);
    
    echo "<hr>";
    
    $lastSymbol = array_pop($symbols); //retrieves and REMOVES last element in an array 
    displaySymbol($lastSymbol);

    echo "<hr>";
    print_r($symbols);
    
    foreach($symbols as $s) {
        displaySymbol($s);
    }
    
    unset($symbols[2]);
    echo "<hr>";
    print_r($symbols);
    
    $symbols = array_values($symbols);
    echo "<hr>";
    print_r($symbols);
    
    //display a random symbol
    
    echo "<hr>";
    displaySymbol($symbols[rand(0, count($symbols)-1)]);
    displaySymbol($symbols[array_rand($symbols)]);
?>


<!DOCTYPE html>
<html>
    <head>
        <title>PHP Arays</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        
    </body>
</html>