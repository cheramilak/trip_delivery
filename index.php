<?php
session_start();
if(!isset($_SESSION['user']) == 'yes'){
    header('location:login.php');
    echo $_SESSION['user'];
}
?>
<?php
    require './layout/customer/sidebar-menu/sidebar.php';
    
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
    
    <h1>Users dashboard</h1>
    <a href="logout.php">logout</a>
</body>
</html>