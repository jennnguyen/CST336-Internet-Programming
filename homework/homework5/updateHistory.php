<?php
include '../../dbConnection.php';
$conn = getDatabaseConnection();

$search = $_GET['query'];


$sql = "SELECT COUNT(*) 
        AS Rows, keyword 
        FROM searchHistory 
        WHERE keyword = :search";


$namedParameters = array();
$namedParameters[':search'] =  $search; 

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$count = $stmt->fetch();
echo "<h2>The keyword '" . $search . "' has been searched " . $count[0] . " time(s)</h2>";
echo "<h3>Search History: </h3>";






$sql = "SELECT *
        FROM searchHistory
        WHERE keyword = :search"; 

      
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$records = $stmt->fetchAll();

foreach ($records as $r) {
        echo $r['date'] . " " . $r['time'] . "</br>";
}


  
// Insert query search into the database 
//INSERT INTO `searchHistory` (`id`, `keyword`, `date`, `time`) VALUES ('', 'query', CURRENT_DATE(), CURRENT_TIME());
$sql = "INSERT INTO searchHistory 
        (id, keyword, date, time) 
        VALUES 
        ('', :search, CURRENT_DATE(), CURRENT_TIME())";
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);

?>
