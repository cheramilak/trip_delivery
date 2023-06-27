<?php
session_start();
$errors = array();
if(!isset($_SESSION['user']) == 'yes' || !$_SESSION['users_type'] == 3){
    header('location:login.php'); 
}
require_once '../../database.php';
  $user_id = $_SESSION['user_id'];



if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $phone = $_POST['number'];
  $address = $_POST['address'];
  //$name = $_POST['name'];
 
  
  if(empty($name) || empty($address) || empty($phone)){
    array_push($errors,'All fiel are required');
  }
  
   $sql = "UPDATE  `users` SET `name` = '$name' WHERE `id` = '$user_id'"; 
   $conn = mysqli_query($connection,$sql);
  
   if(isset($_POST['upload'])){
    $imageName = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];
    $tempName = $_FILES['image']['temp_name'];
    $imageExtenstion = explode('.',$imageName);
    $imageExtenstion = strtolower(end($imageExtenstion));
    $newImageName = uniqid();
    $newImageName .= '.'.$imageExtenstion;
    move_uploaded_file($tempName,'/image',$newImageName);
    $sql = "UPDATE  `admin` SET `image` = '$newImageName' WHERE `id` = '$user_id'"; 
    mysqli_query($connection,$sql);

   }
   $admin = "SELECT *FROM  admin WHERE user_id = '$user_id'";
   $result = mysqli_query($connection,$admin);
   $count = mysqli_num_rows($result);
   if(mysqli_num_rows($result)>0){
    $sql = "UPDATE  `admin` SET `phone` = $phone WHERE `user_id` = $user_id"; 
    mysqli_query($connection,$sql);
    $sql = "UPDATE  `admin` SET `address` = '$address' WHERE `user_id` = $user_id"; 
    mysqli_query($connection,$sql);
   }
   

   else{
    $sql = "INSERT INTO admin(user_id,phone,address) VALUES($user_id,$phone,'$address')";
    mysqli_query($connection,$sql);
   }
  }
    
$sql = "SELECT *FROM users WHERE id = '$user_id'";
$result = mysqli_query($connection,$sql);
$users = mysqli_fetch_array($result,MYSQLI_ASSOC);
$admin = "SELECT *FROM admin WHERE user_id = $user_id";

$result = mysqli_query($connection,$admin);

  $admin = mysqli_fetch_array($result,MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Food Delivery</title>
  <!-- Normalize default styles -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <!-- Main styles -->
  <link rel="stylesheet" href="./setting.css">
</head>

<body>
 <?php 
require 'sidebar.php';
 ?>
  <section class="setting">
    <div class="container">
      
    
      <div class="settings">
        <div class="setting__left--side">
          <h3 class="setting__left--side-title">Settings</h3>
          <a class="settings_account-inner" href="#">
            <div class="account_img">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.6666 17.5V15.8333C16.6666 14.9493 16.3155 14.1014 15.6903 13.4763C15.0652 12.8512 14.2174 12.5 13.3333 12.5H6.66665C5.78259 12.5 4.93474 12.8512 4.30962 13.4763C3.6845 14.1014 3.33331 14.9493 3.33331 15.8333V17.5" stroke="#83859C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9.99996 9.16667C11.8409 9.16667 13.3333 7.67428 13.3333 5.83333C13.3333 3.99238 11.8409 2.5 9.99996 2.5C8.15901 2.5 6.66663 3.99238 6.66663 5.83333C6.66663 7.67428 8.15901 9.16667 9.99996 9.16667Z" stroke="#83859C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="settings__left--account-content">
              <div class="settings__left--account-name">Account</div>
              <div class="settings__left--account-txt">Personal information</div>
            </div>
          </a>
          <a class="settings_account-inner" href="#">
            <div class="account_img">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.5 8.33333C17.5 14.1667 10 19.1667 10 19.1667C10 19.1667 2.5 14.1667 2.5 8.33333C2.5 6.3442 3.29018 4.43655 4.6967 3.03003C6.10322 1.6235 8.01088 0.833328 10 0.833328C11.9891 0.833328 13.8968 1.6235 15.3033 3.03003C16.7098 4.43655 17.5 6.3442 17.5 8.33333Z" stroke="#83859C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10 10.8333C11.3807 10.8333 12.5 9.71404 12.5 8.33333C12.5 6.95262 11.3807 5.83333 10 5.83333C8.61929 5.83333 7.5 6.95262 7.5 8.33333C7.5 9.71404 8.61929 10.8333 10 10.8333Z" stroke="#83859C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                
            </div>
            <div class="settings__left--account-content">
              <div class="settings__left--account-name">Address</div>
              <div class="settings__left--account-txt">Shippings addresses</div>
            </div>
          </a>
          <a class="settings_account-inner" href="#">
            <div class="account_img">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.5 3.33334H2.49998C1.5795 3.33334 0.833313 4.07953 0.833313 5V15C0.833313 15.9205 1.5795 16.6667 2.49998 16.6667H17.5C18.4205 16.6667 19.1666 15.9205 19.1666 15V5C19.1666 4.07953 18.4205 3.33334 17.5 3.33334Z" stroke="#83859C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M0.833313 8.33334H19.1666" stroke="#83859C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                
            </div>
            <div class="settings__left--account-content">
              <div class="settings__left--account-name">Payment method</div>
              <div class="settings__left--account-txt">Connected credit cards</div>
            </div>
          </a>
          <a class="settings_account-inner" href="#">
            <div class="account_img">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.99998 18.3333C9.99998 18.3333 16.6666 15 16.6666 10V4.16667L9.99998 1.66667L3.33331 4.16667V10C3.33331 15 9.99998 18.3333 9.99998 18.3333Z" stroke="#83859C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                
            </div>
            <div class="settings__left--account-content">
              <div class="settings__left--account-name">Security</div>
              <div class="settings__left--account-txt">Password, 2FA</div>
            </div>
          </a>
        </div>
        <form action="" method="post">
        <div class="setting__right--side">
          <h3 class="setting__right--side-title">Account</h3>
          <div class="setting__right--side-inner">
            <h2 class="setting__right--side-InnerTxt">Personal information</h2>
            
            <p class="setting__right--side-ImgTxt">Avatar</p>
            <div class="setting__right--side-ChangeUserImg">
              <img class="setting__right--side-UserImg" src="./img/account avatar.svg" alt="account avatar">
              <form action="setting.php" method="post" enctype="multipart/form-data">
              <input type="file" style="margin:20px;"><input type="submit" class="setting__right--side-btnChange" value="Change" name="upload" type="submit">
              </form>
              <button class="setting__right--side-btnRemove">Remove</button>
            </div>
            

            
            <div class="setting__right--side-input">
              <div class="input-box">
                <label for="name">First Name</label>
                <input type="text" name="name" id="name" value="<?php  echo $users['name']; ?>" required placeholder="Jane">
              </div>
              <div class="input-box">
                <label for="email">Email</label>
                <input type="email" name="email"  value="<?php echo $users['email']; ?>" id="email" readonly required placeholder="jane.robertson@example.com">
              </div>
              <div class="input-box">
                <label for="number">Phone number</label>
                <input type="number" name="number" id="number" value="<?php echo$admin['phone'] ?>" required placeholder="(+251) 555-0113">
              </div>
              <div class="input-box">
                <label for="number"><Address>Addresse</Address></label>
                <input type="text" name="address" value="<?php echo$admin['address'] ?>" id="number" required placeholder="Block and dorm number">
              </div>
            </div>
           
            
            <div class="setting__right--btn">
              <div><a class="LogOutBtn" href="../../logout.php"  type="button">Log out</a></div>
              <span class="setting__right--btn-border"></span>
              <div class="setting__right--mobile-btn">
              <div><input href="setting.php"  class="SaveBtn" name="submit" value="Save changes" type="submit"></div>
              
              </div>
            </div>
           
          </div>
        </div>
        </form>
      </div>
      
    </div>
  </section>
  
</body>

</html>