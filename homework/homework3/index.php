<?php
    
                
                
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Vending Machine </title>
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
                <p>You are hungry. Select which item you would like from the vending machine. Each item is <strong>$1.25</strong></p>        
        </div>
            
            
        <div id="main">
            <?php
                // Array of items inside the vending machine
                $machine = array("chips", "chocolate", "crackers", "donuts", "OJ", "soda");
                
                
                //Display pictures of the vending machine and the items
                echo "<div class='pictures'>";
                        echo "<img id='machinePic' src='img/machine.jpg' alt='machine' title='Machine' class='vendingmachine'/>";
                        
                        echo "<div class='items'>";
                        //For loop to display the items
                        for ($i=0; $i<6; $i++){
                            $temp2 = $i + 1;
                            $temp1 = $i;
                            displaySnack($machine[$i]);
                            if ($i % 2 == 1){
                                echo "<br />";
                                echo "<mark>A$temp1</mark> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <mark>A$temp2</mark>";
                                echo "<br />";
                            }
                        }
                ?>    
                        </div>
                    </div>
                    
                    
            
                <div class='retrieved'>
                <form>
                    How much money are you inserting? 
                    </br>$
                    <input type="text" name="money" placeholder="ie. 2.25" value="<?=$_GET['money']?>"><br>
                    </br>
                    Which item are you choosing?
                    </br>
                    <input type="radio" name="choice" value="1" checked> A1<br>
                    <input type="radio" name="choice" value="2" <?php if(isset($_GET['choice']) && $_GET['choice'] == '2')  echo ' checked="checked"';?> > A2<br>
                    <input type="radio" name="choice" value="3" <?php if(isset($_GET['choice']) && $_GET['choice'] == '3')  echo ' checked="checked"';?>> A3<br>
                    <input type="radio" name="choice" value="4" <?php if(isset($_GET['choice']) && $_GET['choice'] == '4')  echo ' checked="checked"';?>> A4<br>
                    <input type="radio" name="choice" value="5" <?php if(isset($_GET['choice']) && $_GET['choice'] == '5')  echo ' checked="checked"';?>> A5<br>
                    <input type="radio" name="choice" value="6" <?php if(isset($_GET['choice']) && $_GET['choice'] == '6')  echo ' checked="checked"';?>> A6<br>
                    </br>
                    Donate a dollar to the homeless shelter?
                    <select name="donate">
                        <?php
                            $option = array("yes", "no");
                            foreach($option as $value=>$name)
                            {
                                if($value == $_GET['donate'])
                                     echo "<option selected='selected' value='".$value."'>".$name."</option>";
                                else
                                     echo "<option value='".$value."'>".$name."</option>";
                            }
                        ?>
                    </select> 
                    </br>
                    </br>
                    <input type="submit" name="submit" value="Submit">
                </form>
                
                
                
            <?php
                 
                if(isset($_GET['submit'])) {
                    $d = $_GET['donate'];
                    $cashback = $_GET['money'] - 1.25;
                    if ($d == 0)
                        $cashback = $cashback - 1;
                    if ($cashback < 0)
                        echo "<p>You did not insert enough money. Please try again.</p>";
                    else {
                        $selected = $_GET['choice'] - 1;  // Storing Selected Value In Variable
                        displayItem($machine[$selected]);
                        echo "<p>You've recieved <strong>$machine[$selected]</strong> and <strong>$$cashback</strong> back from the vending machine.</p>";
                        if ($d == 0)
                            echo "<p>Thank you for donating!</p>";
                    }
                    
                }
            
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