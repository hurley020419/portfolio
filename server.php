<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'cms_db' ;

$connect = mysqli_connect($db_host, $db_username,$db_password,$db_name);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>