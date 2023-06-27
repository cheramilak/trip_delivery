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
  $sql_delet = "DELETE FROM order_tbl WHERE `order_tbl`.`id` = $food_order_id";
  mysqli_query($connection,$sql_delet);
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

$sql = "SELECT supplay_by FROM `order_tbl` WHERE order_by = $user_id";

$result = mysqli_query($connection,$sql);
$len = mysqli_num_rows($result);
if($len>0){
    
}
?>

<table border="1" width="500">
  <thead>
    <tr>
      <th>
        Food name
      </th>
      <th>
        Food supplay by
      </th>
      <th>
        Food amount
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
    $sql = "SELECT food.name,users.name,food.amount,food.image,total,order_tbl.status,quantity,time,order_tbl.id FROM order_tbl INNER JOIN food on food.id = order_tbl.food_id INNER JOIN users ON users.id = order_tbl.supplay_by where order_by = $user_id";

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