<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'login');
 
$conn = mysqli_connect('localhost', 'root', 'janakiran', 'ims');
 

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>