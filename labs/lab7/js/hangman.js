var selectedWord = "";
var selectedHint = "";
var board ="";
var remainingGuesses = 6;
var words = ["snake", "monkey", "beetle"];

// begin the game whtn the page is fully loaded
window.onload = startGame();


$("#letterBtn").click( function(){ 
   // updateImage();
   
   var boxVal = $("#letterBox").val();
   alert(boxVal);
   
} );

$(".letter").click( function(){ alert("hi"); });


function startGame() {
    pickWord();
    initBoard();
    updateBoard();
    createLetters()
}



function pickWord() {
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].toUpperCase();
}

function updateBoard() {
    $("#word").empty();
    
    for (var letter of board) {
        document.getElementById("word").innerHTML += letter + " ";
    }
}

function initBoard() {
    for (var letter in selectedWord) {
        board += '_ ';
    }
}


// Creating an array of available letters
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

// creates the letters inside the letters div
function createLetters(){       
    for (var letter of alphabet) {
        
        $("#letters").append("<button class='letter' id='"+letter+"'>" + letter + "</button>");
    }
    
}


function checkLetter(letter) {
    var positions = new Array();
    
    for (var i = 0; i<selectedWord.length; i++) {
        console.log(selectedWord);
        if (letter == selectedWord[i]) {
            positions.push(i);
        }
    }
    
    if (positions.length > 0) {
        updateWord(positions, letter);
    }
    else {
        remainingGuesses -= 1;
    }
}

// update the current word then calls for a board update
function updateWord(positions, letter) {
    for (var pos of positions) {
        board = replaceAt(board, pos, letter);
    }
    
    updateBoard();
}

//helpter function for replacing specific indexes in a strings
function replaceAt(str, index, value) {
    return str.substr(0, index) + value + str.substr(index + value.length);
    
}

//calculates and updates the image for our stick man
function updateImage() {
    $("#hangImg").attr("scr", "img/stick_" + (6 - remainingGuesses) + ".png");
}