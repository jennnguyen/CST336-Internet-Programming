<!DOCTYPE html>
<html>
    <head>
        <title>Random Card Game</title>
        <meta charset="utf-8" />
        <center><strong><h1>Random Card Game</h1></strong></center>
    </head>
    
    
    
    
    
    
    <body>
        <?php
        
  
            
            for ($i=1; $i<3; $i++){
                ${"randomCard" . $i } = rand(0,4);
                displayCard(${"randomCard" . $i});
                
            }
            
            
            
            function displayCard($randomCard) {    
                switch ($randomCard){
                    case 0: $card = "ten";
                            $foo = 1;
                            break;
                    case 1: $card = "jack";
                            $foo = 2;
                            break;
                    case 2: $card = "queen";
                            $foo = 3;
                            break;
                    case 3: $card = "king";
                            $foo = 5;
                            break;
                    case 4: $card = "ace";
                            $foo = 6;
                            break;
                }
                $randomSuite = rand(0,3);
                switch ($randomSuite){
                    case 0: $suite = "clubs";
                            break;
                    case 1: $suite = "diamonds";
                            break;
                    case 2: $suite = "hearts";
                            break;
                    case 3: $suite = "spades";
                            break;
                }
                
                echo "<img src='img/cards/$suite/$card.png' alt='$card' title='".ucfirst($card) ."'/>";
            }
            
            
      
        
        
        ?>
    </body>
</html>