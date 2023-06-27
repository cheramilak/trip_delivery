<?php
session_start();
if(!isset($_SESSION['user']) == 'yes'){
    header('location:login.php');
    
}
?>
<?php
    require '../../database.php';
    require 'sidebar.php';
    require 'category.php'
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    
    <h1>Customer dashboard</h1>
    <a href="logout.php">logout</a>
</body>
</html>