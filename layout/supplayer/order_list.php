<?php 
require_once '../../database.php';
session_start();
if(!isset($_SESSION['user'])){
    header('location:../../login.php');
}
$user_id = $_SESSION['user_id'];
if(isset($_POST['submit'])){
    $quantety = $_POST['amount'];
    $foodId = $_POST['foodId'];

 $sql = "select *from food where id = $foodId";
 $result = mysqli_query($connection,$sql);
 $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
 $food_id = $row['id'];
 $amount = $row['amount'];
 $supplayer_by = $row['created_by'];
 $total = $amount*$quantety;
 
 

$sql3 = "INSERT INTO `order_tbl` (`order_by`, `supplay_by`, `food_id`, `total`, `quantity`, `time`, `status`) VALUES ($user_id, '$supplayer_by', '$food_id', '$total', '$quantety', current_timestamp(), '0')";           
            
$insert = mysqli_query($connection,$sql3);
if(!$insert){
  echo mysqli_error($connection);
}
}
if(isset($_POST['cancel'])){
  $food_order_id = $_POST['order'];
  $update = "UPDATE `order_tbl` SET `status` = '2' WHERE `order_tbl`.`id` = $food_order_id";
  mysqli_query($connection,$update);
}
if(isset($_POST['accept'])){
  $food_order_id = $_POST['order'];
  $update = "UPDATE `order_tbl` SET `status` = '1' WHERE `order_tbl`.`id` = $food_order_id";
  mysqli_query($connection,$update);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>

<?php 
include 'sidebar.php';


?>
<?php
if(isset($_GET['day'])){
  ?>
  <a href="order_list.php">Filter all order</a>
<?php 
}
else{
?>
<a href="order_list.php?day=1">Filter only two day order</a>
<?php
}
?>


<table border="1" width="500">
  <thead>
    <tr>
      <th>
        Food name
      </th>
      <th>
        Order by
      </th>
      <th>
        Food amount
      </th>
      <th>
        Quantety
      </th>
      <th>
        Time 
      </th>
      <th>
        status
      </th>
      <th>
        Opreration
      </th>
    </tr>
  </thead>
  <tbody>
    <?php
    $toDate = date('Y-m-d');
    if(isset($_GET['day'])){
     $sql = "SELECT food.name,users.name,food.amount,food.image,total,order_tbl.status,quantity,time,order_tbl.id FROM order_tbl INNER JOIN food on food.id = order_tbl.food_id INNER JOIN users ON users.id = order_tbl.supplay_by where supplay_by = $user_id and day(time) = day('" . $toDate . "') ";
    
    }
    else{
    $sql = "SELECT food.name,users.name,food.amount,food.image,total,order_tbl.status,quantity,time,order_tbl.id FROM order_tbl INNER JOIN food on food.id = order_tbl.food_id INNER JOIN users ON users.id = order_tbl.supplay_by where supplay_by = $user_id";
    }

    $result = mysqli_query($connection,$sql);
    $len = mysqli_num_rows($result);
    if($len >0){
      while($row = mysqli_fetch_assoc($result)){
       ?>
    <tr>
      <td>
      <?php echo $row['name'] ?>
      </td>
      <td>
      <!-- <?php echo $row['supplayer'] ?> -->
      </td>
      <td>
        <?php echo $row['total'] ?>
      </td>
      <td>
      <?php echo $row['time'] ?>
      </td>
      <td>
      <?php echo $row['time'] ?>
      </td>
      <td>
      <?php $sta = $row['status'];
      if($sta == 0){
        echo 'waiting';  
      }
      elseif($sta == 1){
        echo 'Ordered'; 
      }
      else{
        echo 'Not accepted'; 
      }
      ?>
      
      </td>
      <td>
        <?php 
        if($sta == 0){
          ?>
           <form action="order_list.php" method="post">
        
        <input type="text" name="order" hidden value="<?php echo $row['id'] ?>"> 
        <input type="submit" name="cancel" value="Cancel order">
        </form>
        <form action="order_list.php" method="post">
        
        <input type="text" name="order" hidden value="<?php echo $row['id'] ?>"> 
        <input type="submit" name="accept" value="Accept order">
        </form>
        <?php

        }
        else{
        echo '--';
        }

          ?>

     
       
        
       
      </td>
    </tr>
    <?php } } ?>
  </tbody>
</table>
</html>