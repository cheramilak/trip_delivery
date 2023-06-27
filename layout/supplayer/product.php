<?php
session_start();
$errors = array();
if (!isset($_SESSION['user']) == 'yes' && !$_SESSION['users_type'] == 1) {
  header('location:login.php');
}
require_once '../../database.php';
$user_id = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $amount = $_POST['amount'];
  $filename = $_FILES["image"]["name"];
  $tempname = $_FILES["image"]["tmp_name"];
  $folder = '/../../public/food_image/'. $filename;

  if (empty($name) || empty($amount)) {
    echo 'All fiel are requireds';
  }
  require_once '../../database.php';
  $sql = "INSERT INTO food (name,created_by,amount,image) values ('$name',$user_id,$amount,'$filename')";
  $insert = mysqli_query($connection, $sql);

  if (!$insert) {
    echo 'something went wrong';
  }
  else{
    if (move_uploaded_file($tempname, $folder)) {
      echo "<h3>  Image uploaded successfully!</h3>";
  } else {
      echo "<h3>  Failed to upload image!</h3>";
      
  }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="setting.css">
  <title>Add prodact</title>
</head>

<body>
  <?php
  include 'sidebar.php';
  ?>
  <div class="container">

    <div class="setting__right--side-input">
      <h3>Add new product</h3>
      <br>
      <div class="setting__right--side-inner">
        <div class="input-box">

          <form action="product.php" method="post" enctype="multipart/form-data">

            <label for="name">Product name</label>
            <br>


            <input type="text" name="name" id="name" required placeholder="food name">
        </div>
        <div class="input-box">
          <label for="number">amount</label>
          <input type="number" name="amount" id="number" required placeholder="45">
        </div>
        <!-- <label> Status</label>
                <input type="radio" name="status" value="1" > hidden
                <input type="radio" name="status" value="2" > vissable -->
      </div>

      <div class="container">
        <div class="setting__right--side-inner">
          <div class="input-box">
            <label for="file">upload image(optinal)</label>
            <input type="file" name="image" value="">
          </div>
        </div>
      </div>



      <div class="setting__right--btn">
        <span class="setting__right--btn-border"></span>
        <div class="setting__right--mobile-btn">
          <br>
          <div><input href="setting.php" class="SaveBtn" name="submit" value="Save changes" type="submit"></div>
          </form>
        </div>
      </div>


    </div>
  </div>

  <div class="container" style="align-items: center; justify-content: center;">
    <h3>Product List</h3>
    <br>
    <div class="setting__right--side-inner">
      <div class="input-box">


        <table border="1" width="700">
          <thead>
            <tr>
              <th>
                name
              </th>
              <th>
                iamge
              </th>
              <th>
                amount
              </th>

              <th>
                status
              </th>
              <th>
                opration
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            //$sql = "SELECT   *from food ";
            $sql = "select name, image, status, amount from food where created_by=$user_id";
            $result = mysqli_query($connection, $sql);
            $resultcheck = mysqli_num_rows($result);
            if ($resultcheck > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>

                <tr width 200 height="50">
                  <td><?php echo $row['name'] ?></td>
                  <td><img src="<?php $row['image'] == null ? './img/user.svg' : './img/main_logo.svg' ?>" alt=""> </td>
                  <td><?php echo $row['amount'] ?></td>
                  <td><?php echo $row['status'] ?></td>
                  <td><?php echo $row['name'] ?></td>

                </tr>
            <?php
              }
            }

            ?>
          </tbody>

        </table>



      </div>
    </div>


</body>

</html>