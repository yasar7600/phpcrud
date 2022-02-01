<?php 
ob_start();
include('dbconnection.php');

// Retrieve
$sql = "SELECT * FROM `validcontacts`";
$result = $conn->query($sql);
if($result->num_rows > 0){
 $data = array();
 while($row = $result->fetch_assoc()){
  $data[] = $row;
 }
}
ob_end_clean();


// Returning JSON Format Data as Response to Ajax Call
echo json_encode($data)


?>