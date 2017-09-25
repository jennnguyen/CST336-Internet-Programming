<?php



?>

<?php
 session_start();
 global $temp;
 $temp=array();


    if (!isset($_SESSION['count']))
    {
       $_SESSION['count'] = 0;
        $_SESSION['total']=1;
       
        
      
    } 
    else 
    {
          $_SESSION['count']++;
          $_SESSION['total']=$_SESSION['total'];
         
         
      
         
    }
   
   
    
    include 'inc/functions.php'
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dragon Ball Silver Jack </title>
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"> 
    </head>
   <div id="wrapper">
    <header>
         <a href="https://fontmeme.com/dragon-ball-z-font/"><img src="https://fontmeme.com/permalink/170923/0358a1d732c81bcd0c86360050c0aa36.png" alt="dragon-ball-z-font" border="0"></a>
    </header>
    
    <style>
        @import url("css/styles.css");
    </style>
 
    <body>
        <?php
            
            
            play();
            
            

            
            
                $start = microtime(true);

                 for ($i = 0; $i < 1000000; $i++) 
                 {
                    $j = rand(1,3000) * rand(1,2000);
                }

                $elapsedSecs = microtime(true) - $start;
                $_SESSION['total']+=$eslapsedSecs;
                if($_SESSION['count'] !=0)
                {
                $avg_time=$_SESSION['total']/$_SESSION['count'];
                }
                else {
                    $avg_time=$_SESSION['total'];
                }
                echo "<div id = 'time'>";
                
                echo "Time elapsed: " . $elapsedSecs . " secs";
                echo "<br />";
                echo "Average Elapsed time: " . $avg_time . "secs";
                echo "<br />";
                echo "Number of games played: " . $_SESSION['count'] . "";
                echo "</div>";
                
                
            
        ?>
        <br/> <br/>
        <form>
           <input type="submit" value="Play Again?" sound="jackpot"/>
        </form>
    </body>
    </div>
</html>