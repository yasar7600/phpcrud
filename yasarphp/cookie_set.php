<!DOCTYPE html>

<html>
<body>
    <form action="<?php $_PHP_SELF ?>" method ="get">
        first Name: <input type="text" name =" fname">
        <input type = "submit" />
    </form>
<?php
$cookie_name = "queryparam";
$cookie_value = $_SERVER['QUERY_STRING'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
echo 'cookie set <br>';
echo 'name ='. $cookie_name.'<br>';
echo 'value of cookie & param also = '.$cookie_value;
?>    
<!--set cookie(param ) from here and get it from cooki_get.php -->


</body>
</html>