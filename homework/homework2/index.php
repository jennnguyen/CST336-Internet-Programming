
<!DOCTYPE html>
<html>
    <head>
        <title>Random Vending Machine </title>
        <meta charset="utf-8" />
        <style>
            @import url("css/styles.css");
        </style>
        <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    </head>
    <body>
        <div id="overview">
            <header>
                <h1>Vending Machine</h1>
            </header>
            <hr />
                <p>You are hungry but the vending machine is broken. The vending machine only dispenses random items.</p>        
        </div>
            
            
        <div id="main">
            <?php
            
                // Array of items inside the vending machine
                $machine = array("chips", "chocolate", "crackers", "donuts", "OJ", "soda");
                
                // Shuffle Array
                shuffle($machine);
                
                
                //Display pictures of the vending machine and the items
                echo "<div class='pictures'>";
                        echo "<img id='machinePic' src='img/machine.jpg' alt='machine' title='Machine' class='vendingmachine'/>";
                        
                        echo "<div class='items'>";
                        //For loop to display the items
                        for ($i=0; $i<6; $i++){
                            displaySnack($machine[$i]);
                            if ($i % 2 == 1){
                                echo "<br />";
                            }
                        }
                        echo "</div>";
                        
                echo "</div>";
                
                // Chooses random snack
                $snack = rand(0, 5);
                // 50/50 chance of an extra item falling out
                $extra = rand(0, 1);
                // 50/50 chance of a coin falling out
                $coin = rand(0, 1);
                
                // Array of coins
                $coins = array("quarter", "dime", "nickel", "penny");
                // Chooses random coin
                $randcoin = rand(0, count($coins)-1);
                
                
                // Displays the items that came out of the vending machine
                echo "<div class='retrieved'>";
                if ($extra == 1 ){
                    displayItem($machine[$snack]);
                    // The last item in the array is the extra item that comes out
                    $lastSnack = array_pop($machine); //retrieves and REMOVES last element in an array 
                    displayItem($lastSnack);
                    
                    if ($coin == 1 ){
                        displayItem($coin);
                        echo "<h4> A $coins[$randcoin] fell out of the machine!</h4>";
                    }
                    echo "<h4> An extra snack fell out!</h4>";
                    echo "<p>You've recieved <strong>$machine[$snack]</strong> and <strong>$lastSnack</strong> from the vending machine.</p>";
                }
                else {
                    displayItem($machine[$snack]);
                    if ($coin == 1 ){
                        displayItem($coin);
                        echo "<h4> A $coins[$randcoin] fell out of the machine!</h4>";
                        }
                    echo "<p>You've recieved <strong>$machine[$snack]</strong> from the vending machine.</p>";
                }
                
                echo "</div>";
                
                // Displays the items inside the vending machine
                function displaySnack($snack) {    
                    
                    echo "<img id='reel' src='img/$snack.png' alt='$snack' title='".ucfirst($snack) ."' height='50'/>";
                }
                // Display the items that came out of the vending machine
                function displayItem($snack) {    
                    
                    echo "<img id='reel' src='img/$snack.png' alt='$snack' title='".ucfirst($snack) ."'/>";
                }
            
                
            ?>
        
       </div> 
       
       
        <div id="footer">
            <footer>
                <hr>
                <small>
                CST336 Internet Programming. 2017&copy; Nguyen <br />
                <strong>Disclaimer:</strong> The information in this website is fictitous. <br />
                It is used for academic purposes only.
                </small>
            </footer>
        </div> 
    </body>
</html>