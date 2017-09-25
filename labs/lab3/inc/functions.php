<?php 
    session_start();
    
    $deck = range(1, 52);
    shuffle($deck);
 
    function playerturn($deck) {
        global $deck;
        $score = 0;
        
        // Hands out a certain amount of cards to player
        while($score < 38) {
            $suite = "";
            $card = array_pop($deck);
            // The card number/value
            $tempNum = (($card % 13) + 1); 
            // The suite value
            $suiteValue = (floor($card / 13) + 1); 
            // Calculates the score for the player
            $score = $score + $tempNum;
            
            // Identifies the suite
            switch($suiteValue)
            {
                case 1: $suite = "clubs";
                        break;
                case 2: $suite = "diamonds";
                        break;
                case 3: $suite = "hearts";
                        break;
                case 4: $suite = "spades";
                        break;
            }
            //Displays the card
            
            echo "<img src='cards/$suite/$tempNum.png' width='70'/>";
            
        }
        echo '<br/>';
        
        return $score;
    }
    
    // Player 1-4 are dealt cards and scores are printed
    
    
    function play() {
        $player_pics=array("Alex","Jenn","Jose","Mo");
        shuffle($player_pics);
        for ($i = 0; $i < 4; $i++) {
            echo "<img src='cards/clubs/$player_pics[$i].png' width='70'/>";
            // Scores are stored in score[] array
            $score[$i] = playerturn($deck); 
            echo "<div id ='names'>";
            echo $player_pics[$i];
            echo ": ";
            echo "</div>";
            echo "<div id ='score'>";
            echo 'score '.$score[$i].'<br/>';
            //array_push($score, playerturn($deck));
            echo "</div>";
        }
            
        
        $highestScore = 0; // find the highest score closed to 42
        $totalScore = 0; // Calculate total score for the winner
        $winnerIndex = -1; // To hold the index of the 'winner'
        
        // For loop used to find the highest score closed to 42
        for ($i = 0; $i < 4; $i++) {
            if ($score[$i] > 42) // players with scores above 42 automatically lose
                continue;
            if ($score[$i] > $highestScore) {
                $highestScore = $score[$i];
                $winnerIndex = $i;
            }
        }
        //IF THERE ARE MULTIPLE WINNERS
        for ($i = 0; $i < 4; $i++) {
            if ($score[$i] == $highestScore) 
            {
                $winners[] = $i; // add winners to winner array
            }
            else {continue;}
        }
            
        //IF THERE ARE NO WINNERS !! (all scores are about 42)
        if ($winnerIndex == -1){
            echo "<h2>No winners.</h2>"; 
            return;
        }
        
        // Adding all the points to the $totalScore, not including the winner's score
        for ($i = 0; $i < 4; $i++) {
            if ($score[$i] == $highestScore)
                continue;
            $totalScore = $totalScore + $score[$i];
        }
        
        
        for( $i = 0; $i < count($winners); $i++) {
            switch($winners[$i])
            {
                case 0: $winner = $player_pics[0];
                        break;
                case 1: $winner = $player_pics[1];
                        break;
                case 2: $winner = $player_pics[2];
                        break;
                case 3: $winner = $player_pics[3];;
                        break;
            }
            echo "<div id='Winner'>";
            echo "<h2> $winner wins $totalScore points!!</h2>";
            echo "</div>";
        }
    }


    
?>