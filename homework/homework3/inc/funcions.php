<?php

    // Displays the items inside the vending machine
    function displaySnack($snack) {    
        
        echo "<img id='reel' src='img/$snack.png' alt='$snack' title='".ucfirst($snack) ."' height='50'/>";
    }
    // Display the items that came out of the vending machine
    function displayItem($snack) {    
        
        echo "<img id='reel' src='img/$snack.png' alt='$snack' title='".ucfirst($snack) ."'/>";
    }

?>