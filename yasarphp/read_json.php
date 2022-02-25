<!DOCTYPE html>
<html>
<body>


<?php
  
 
$json = file_get_contents('json1.json');
  

$json_data = json_decode($json,true);

foreach ($json_data as $x => $value) {

echo "$x = $value <br>";
}
  
?>


</body>
</html>