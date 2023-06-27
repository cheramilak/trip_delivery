<?php
$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'tripDelivery';
$connection =  mysqli_connect($dbHost,$dbUser,$dbPassword,$dbName);
if(!$connection) {
    die('Something wrong');
}

?>