<?php
session_start();
if(isset($_SESSION['user'])){
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>login form</title>
</head>
<body>
    <?php
    if(isset($_POST['submit'])){
     
        $email = $_POST['email'];
        $password = $_POST['password'];
        require_once 'database.php';
        $sql = "SELECT *FROM users WHERE email = '$email'";
    
        $result = mysqli_query($connection,$sql);
        
        $users = mysqli_fetch_array($result,MYSQLI_ASSOC);
       
        if($users){
            if(password_verify($password,$users['password'])){
                session_start();
                $_SESSION['user'] = 'yes';
                $_SESSION['user_id'] = $users['id'];
                if($users['user_type'] == 1){
                    $_SESSION['users_type'] = 1;
                header('location: ./layout/supplayer/index.php');
                die();
                }
                elseif($users['user_type'] == 2){
                    $_SESSION['users_type'] = 2;
                header('location: ./layout/customer/index.php');
                 die();
                }
                elseif($users['user_type'] == 3){
                    $_SESSION['users_type'] = 3;
                header('location: ./layout/admin/index.php');
                die();
                }
                
                
                
            }
            else{
                echo "<div>Password is not match</div>";
               
            }
        }
        else{
            echo 'wron users';
            echo "<div>Email is not exist</div>";
        }
    }
    ?>
    <!-- <form action="login.php" method="post">
    <div>
    <input type="email" name="email" placeholder="enter your email">
    </div>

    <div>
    <input type="password" name="password" placeholder="enter your password">
    </div>
    <div>
    <input type="submit" name="submit" value="login">
    </div>
    </form> -->
    <form class="form" action="login.php" method="post">
       <p class="form-title">Sign in to your account</p>
        <div class="input-container">
          <input type="email" name="email" placeholder="Enter email">
          <span>
          </span>
      </div>
      <div class="input-container">
          <input type="password" name="password" placeholder="Enter password">
        </div>
         <button type="submit" name="submit" class="submit">
        Sign in
      </button>

      <p class="signup-link">
        No account?
        <a href="">Sign up</a>
      </p>
   </form>
</body>
</html>