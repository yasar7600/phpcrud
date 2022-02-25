<!DOCTYPE html>
<html>
<body>

    <form action="<?php $_PHP_SELF ?>" method ="post">
        first Name: <input type="text" name =" fname">
        <input type = "submit" />
    </form>    
    
welcome <?php 
$name = isset($_POST['fname']) ? $_POST['fname'] : '';
echo $name;
?>

</body>
</html>