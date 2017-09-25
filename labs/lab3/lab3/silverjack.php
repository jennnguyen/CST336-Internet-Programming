<?php
    $clubs=array("../cards/clubs/1.png");
    $hearts=array("../cards/hearts/1.png");
    $diamonds=array("../cards/diamonds/1.png");
    $randomValue=rand(0,12);
    
    for($i=2;$i<13;$i++)
    {
        $clubs[]="../cards/clubs/$i.png ";
    }
    for($i=2;$i<13;$i++)
    {
        $hearts[]="../cards/hearts/$i.png ";
    }
    for($i=2;$i<13;$i++)
    {
        $diamonds[]="../cards/diamonds/$i.png ";
    }
    
    
    

            
    for ($i=1; $i<3; $i++){
        ${"randomCard" . $i } = rand(0, 12);
        displayCard(${"randomCard" . $i});
                
    }
            
    function displayCard($randomCard) {    
        switch ($randomCard){
            case 0: $card = "1";
                $val = 1;
                break;
            case 1: $card = "2";
                $val = 2;
                break;
            case 2: $card = "3";
                $val = 3;
                break;
            case 3: $card = "4";
                $val = 4;
                break;
            case 4: $card = "5";
                $val = 5;
                break;
            case 5: $card = "6";
                $val = 6;
                break;
            case 6: $card = "7";
                $val = 7;
                break;
            case 7: $card = "8";
                $val = 8;
                break;
            case 8: $card = "9";
                $val = 9;
                break;
            case 9: $card = "10";
                $val = 10;
                break;
            case 10: $card = "11";
                $val = 11;
                break;
            case 11: $card = "12";
                $val = 12;
                break;
            case 12: $card = "13";
                $val = 13;
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
        
    echo "<img src='../cards/$suite/$card.png' alt='$card' title='".ucfirst($card) ."'/>";
    
        
    } 
    
    
?>


<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>