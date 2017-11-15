var selectedWord = "";
var selectedHint = "";
var board = "";
var remainingGuesses = 6;
var hinter = false;

var words = ["snake", "monkey", "beetle"];

var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
var words = [{ word: "snake", hint: "It's a reptile" }, 
             { word: "monkey", hint: "It's a mammal" }, 
             { word: "beetle", hint: "It's an insect" }];

window.onload = startGame();

function startGame() {
    pickWord();
    createLetters();
    initBoard();
    updateBoard();
}

$("#hint").on('click', function(){
    if(hinter == false){
    $("#word").append("<br />");
    $("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>")
    hinter = true;
    }
});



//events // "button"
$(".letters").click( function(){ 
    //alert($(this).attr("id"));
    checkLetter( $(this).attr("id") );
    disableButton($(this));
    hinter = false;
});

$("#letterBtn").click( function(){ 
   var boxVal = $("#letterBox").val();
   alert(boxVal);
   
} );


$(".replayBtn").on('click', function() {
    location.reload();
});

function updateMan() {
    $("#hangImg").attr("src","img/stick_" + (6 - remainingGuesses) + ".png");
}


function initBoard() {
    for (var letter in selectedWord) {
        board += '_';
    }
    //console.log(board);
    
}
function pickWord() {
    var randomInt = Math.floor( Math.random() * words.length );
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
    //console.log(selectedWord);
}

function updateBoard() {
    $("#word").empty();
    for (var letter of board) {
        $("#word").innerHTML += letter + " ";
    }
    
    $("#word").append("</br>");
    $("#word").append("<span class='hint'> Hint " + selectedHint + "</span>");    
}

function createLetters(){
    for (var letter of alphabet) {
        $("#letters").append("<button class='btn btn-success letter' id='" + letter + "'>" + letter + "</button>");
    }
}

function checkLetter(letter) {
    var positions = [];
    for (var i=0; i < selectedWord.length; i++) {
        if (letter == selectedWord[i]) {
            positions.push(i);
        }
    }
    
    if (positions.length > 0) {
        updateWord(positions, letter);
        
        if (!board.includes('_')) {
            endGame(true);
        }
        
    } else {
        remainingGuesses--;
        updateMan();
    }
    
    if (remainingGuesses <= 0) {
        endGame(false);
    }
}

function updateWord(positions, letter) {
    for (var pos of positions) {
        board = replaceAt(board, pos, letter)
    }
    
    updateBoard();
}

function replaceAt(str, index, value) {
    return str.substr(0, index) + value + str.substr(index + value.length);
}



function disableButton(btn) {
    btn.prop("disabled",true);
    btn.attr("class", "btn btn-danger")
}


function endGame(win) {
    $("#letters").hide();
    
    if (win) {
        $("#won").show();
    }
    else {
        $("#lost").show();
    }
}
