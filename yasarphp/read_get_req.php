<!DOCTYPE html>
<html>
<body>

    <form action="<?php $_PHP_SELF ?>" method ="get">
        first Name: <input type="text" name =" fname">
        <input type = "submit" />
    </form>    
    
welcome <?php 
$name = isset($_GET['fname']) ? $_GET['fname'] : '';
echo $name;
?>

</body>
</html>