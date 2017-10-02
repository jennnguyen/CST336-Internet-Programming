<?php

    function yearList($startYear=1500, $endYear=2000) {  //assigning the parameters in here is the default parameters
        /*
        if (isset($_GET['startYear'])) {
            $startYear = $_GET['startYear'];
        }
        if (isset($_GET['endYear'])) {
            $endYear = $_GET['endYear'];
        }
        */
        $sum = 0;
        $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
        for ($i = $startYear; $i <= $endYear; $i+=4) {
                //if ($i % 4 != 0){
                //    continue;
                //}
                echo "<li> Year $i";
                if ($i % 100 == 0){
                    echo "<strong> Happy New Century </strong>";
                }
                if ($i == 1776){
                    echo "<strong> USA INDEPENDENCE </strong>";
                }
                
                echo "</br>";
                if ($i % 12 == 4){
                    echo "<img src='img/$zodiac[0].png'/>";
                }
                if ($i % 12 == 5){
                    echo "<img src='img/$zodiac[1].png'/>";
                }
                if ($i % 12 == 6){
                    echo "<img src='img/$zodiac[2].png'/>";
                }
                if ($i % 12 == 7){
                    echo "<img src='img/$zodiac[3].png'/>";
                }
                if ($i % 12 == 8){
                    echo "<img src='img/$zodiac[4].png'/>";
                }
                if ($i % 12 == 9){
                    echo "<img src='img/$zodiac[5].png'/>";
                }
                if ($i % 12 == 10){
                    echo "<img src='img/$zodiac[6].png'/>";
                }
                if ($i % 12 == 11){
                    echo "<img src='img/$zodiac[7].png'/>";
                }
                if ($i % 12 == 0){
                    echo "<img src='img/$zodiac[8].png'/>";
                }
                if ($i % 12 == 1){
                    echo "<img src='img/$zodiac[9].png'/>";
                }
                if ($i % 12 == 2){
                    echo "<img src='img/$zodiac[10].png'/>";
                }
                if ($i % 12 == 3){
                    echo "<img src='img/$zodiac[11].png'/>";
                }
                
                echo "</li>";
                $sum = $sum + $i;
            }
        return $sum;
    }
    

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Practice: Chinese Zodiac Years </title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1> Chinese Zodiac List</h1>
        
        <ul>
            <?php
                $sum = yearList($_GET['startYear'], $_GET['endYear']);
                //$sum = yearList(1900, 2000);
            ?>
        </ul>
        <strong>
            <?php
                echo "Year Sum: $sum";
            ?>
        </strong>
        
        
    </body>
</html>