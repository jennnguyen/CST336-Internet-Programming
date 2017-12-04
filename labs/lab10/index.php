<?php

if($_FILES["myFile"]["size"] < 1000000){
    move_uploaded_file($_FILES['myFile']["tmp_name"], "gallery/" . $_FILES["myFile"]["name"]);
}
else{
    echo "<span> File size is too large</span><br/>";
}
$files = scandir("gallery/", 1);

echo "<div id='thumbnails'>";

for($i = 0; $i < count($files) - 2; $i++){
    echo "<img onclick='changeSize(this)' src='gallery/" .   $files[$i] . "' height='70' > ";
}

echo "</div";

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Photo Gallery </title>
        <link rel="stylesheet" href="css/styles.css">
         <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    </head>
    <body>
        <script>
            function changeSize(element){
                /*var positionInfo = element.getBoundingClientRect();
                var height = positionInfo.height;
                var width = positionInfo.width;
                $(element).toggleClass('.clicked').siblings().removeClass('.clicked');
               if(element.style.height <= 71){
                    element.style.width = width*5;
                    element.style.height = height*5;
                    element.classList.toggle(".clicked");
                }
                else{
                    element.style.width = width/5;
                    element.style.height = height/5;
                }*/
                
                var positionInfo = element.getBoundingClientRect();
                var height = positionInfo.height;
                var width = positionInfo.width;
                if($(element).hasClass('enlarged')){
                    $(element).removeClass('enlarged');
                    element.style.width = width/5;
                    element.style.height = height/5;
    
                }
                else{
                    $(element).addClass('enlarged')
                    element.style.width = width*5;
                    element.style.height = height*5;
                    
                }
                
                
                
            }
        </script>
        <h2> Photo Gallery </h2>
        <form method ="POST" enctype="multipart/form-data">
            <input type="file" name="myFile"/>
            <input type="submit" value ="Upload File!"/>
        </form>
    </body>
</html>