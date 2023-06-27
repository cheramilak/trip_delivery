<?php
session_start();
if(!isset($_SESSION['user']) == 'yes'){
    header('location:login.php');
}
?>
<?php
    require '../../database.php';
    require 'sidebar.php';
    $id = $_GET['id'];
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
        <title>food list</title>
</head>
<body>
<section class="popular" id="popular" >

<!-- <h1 class="heading">most <span>popular</span>foods</h1> -->

<div class="box-container">
  <?php 
    $sql = "select id,name,amount from food where created_by=$id";
    $result = mysqli_query($connection,$sql);
    $length = mysqli_num_rows($result);
    if($length>0){
        while($row = mysqli_fetch_assoc($result)){
            ?>
            
    <div class="box">
    <form action="order_list.php" method="post">
        <span class="price"><?php echo $row['amount'] ?> birr</span>
        <img src="images/p-1.jpg" alt="">
        <h3><?php echo $row['name'] ?></h3>
        <input type="text" hidden name="foodId" value="<?php echo $row['id'] ?>">
        <input type="number" placeholder="enter quantity" id="quantity" name="amount"  required class="box">
        <input href="#" type="submit" value="order now" name="submit" class="btn">
        </form>
    </div>
    
    <?php
        }
    }
    ?>
     
</div>

</section>
<script src="script.js"></script> 

<script>
    function showDialog(quanty){
       var amount = prompt('please enter your amount');
       var total = amount * quanty;
       if(total >0){
        $.ajax({
            type:'POST',
            url:'/food_by.php',
            data:amount,
            success:function(res){
                console.log('sucess order');
            }
        });
       }
        console.log("toatal amount = "+total);
    }
    
</script>
</body>
</html>