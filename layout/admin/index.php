<?php
session_start();
if(!isset($_SESSION['user']) == 'yes' || !$_SESSION['users_type'] == 3){
    header('location:../../login.php');
    echo $_SESSION['user'];
}
?>
<?php
    require 'sidebar.php';
    require_once '../../database.php';
    $sql = "SELECT *FROM users where user_type = 2";
    $supplayer =  mysqli_query($connection,$sql); 
    $totalSupplayer = mysqli_num_rows($supplayer);
    echo "total supp ".$totalSupplayer;
    $sql = "SELECT *FROM users where user_type = 1";
    $cusstumer =  mysqli_query($connection,$sql); 
    $totalCusttomer = mysqli_num_rows($supplayer);
    echo "total stud ".$totalCusttomer;
    $sql = "SELECT *FROM order_tbl where status = 2";
    $deliverd =  mysqli_query($connection,$sql); 
    $totalDeliverd = mysqli_num_rows($deliverd);
    if($totalDeliverd>0){
        $total = 0;
        while($row = mysqli_fetch_assoc($deliverd)){
            $total +=$row['total'];
        }
    }
    echo 'total deliverd '. $totalDeliverd;
    echo 'total price '.$total;
    $sql = "SELECT *FROM users where order_tbl = 1";
    $waiting =  mysqli_query($connection,$sql); 
    $totalWaiting = mysqli_num_rows($waiting);
    echo "total waiting ".$totalWaiting;
    $toDate = date('Y-m-d');
    //$sql = "SELECT name FROM users where month(users.date_created) = month('".$toDate."')";
    $sql = "SELECT *FROM users where user_type = 2 and date_created = 06";
     $thisMonth =  mysqli_query($connection,$sql); 
    // $newMonthUsers = mysqli_num_rows($thisMonth);
    // echo "This month new users ".$newMonthUsers;
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

    <h1>Admin dashboard</h1>
   
    
</body>
</html>