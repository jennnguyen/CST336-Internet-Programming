<?php
    include 'inc/header.php';
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
    
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
            
            $('#petInfoModal').modal("show");
            $('#petInfo').html("<img src='img/loading.gif'>")
            
            
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
                    
                    
                    $('#petNameModalLabel').html(data.name);
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



<!-- Modal -->
<div class="modal fade" id="petInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="petNameModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div id="petInfo"></div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


        
<?php
    include 'inc/footer.php';
    
?>