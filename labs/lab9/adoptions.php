<?php
    include 'inc/header.php';
    include '../../dbConnection.php';
    $conn = getDatabaseConnection("c9");
    
    
    function getPetList() {
        global $conn;
        $sql = "SELECT * 
                FROM adoptees";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

?>

<script>
    $(document).ready( function() {
        $(".petLink").click( function() {
            $.ajax({
                type: "GET",
                url: "api/getPetInfo.php",
                dataType: "json",
                data: { "id": $(this).attr('id') },
                success: function(data,status) {
                    $("#petInfo").html(" <img src='img/" + data.pictureURL + "' alt='Picture of " + data.name + "' />" +
                                       "</br> Name: " + data.name +
                                       "</br> Type: " + data.type + 
                                       "</br> Breed: " + data.breed + 
                                       "</br> Color: " + data.color + 
                                       "</br> Age: " + data.age + 
                                       "</br> Description: " + data.description + "</br>");
                },
                complete: function(data,status) { //optional, used for debugging purposes
                }
            });//ajax
        }) //$("petLink")
    }) //$(document).ready
    
</script>            

<?php
        $pets = getPetList();
        foreach ($pets as $p){
            echo "Name: <a href='#' class='petLink' id='".$p['id']."'>". $p['name'] . "</a><br>";
            echo "Type: " . $p['type'] . "<br>";
            echo "<hr><br>";
        } 
           
?>

<div id="petInfo"></div>
        
<?php
    include 'inc/footer.php';
    
?>