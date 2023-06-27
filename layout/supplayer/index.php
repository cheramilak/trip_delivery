<?php
session_start();
if(!isset($_SESSION['user']) == 'yes'){
    header('location:login.php');
}
$user_id = $_SESSION['user_id'];
?>
<?php
    require 'sidebar.php';
    require_once '../../database.php';
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
<?php
        $toDate = date('Y-m-d');

//        $sql = "EXPLAIN SELECT COUNT('id') as total FROM order_tbl WHERE supplay_by = $user_id and day(time) = day($toDate)";
            $sql = "SELECT COUNT('id') as total FROM order_tbl WHERE day(time) = 05";  
            $result = mysqli_query($connection,$sql);
        // $rq = mysqli_fetch_array($result,MYSQLI_ASSOC);
        // echo $rq['rows'];
       // echo $result;
    ?>
    
    <h1>Supplayer dashboard</h1>
    
    <a href="logout.php">logout</a>
</body>
</html>