<?php

  include('dbConnection.php');
  // When you click Edit button below code get executed
  $data = stripslashes(file_get_contents("php://input"));
  $mydata = json_decode($data, true); 
  $id = $mydata['sid'];

  // Retrieve Specific Student information
  $sql = "SELECT * FROM `validcontacts` WHERE sno={$id} ";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
 

  // Returning Json Format Data as Response to Ajax Call 
   echo json_encode($row);

?>