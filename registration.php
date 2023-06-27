<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>

<?php
        if(isset($_POST['submite'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $repate_paasword = $_POST['repate_password'];
            $user_type = $_POST['user_type'];
            $errors = array();
            if(empty($name) or empty($email) or empty($password) or empty($repate_paasword) or empty($user_type)){
                array_push($errors,'All field arr required');
            }
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                array_push($errors,'Not valide email');
            }
            if(!strlen($password)>6){
                array_push($errors,'Password is must be greater than 5');
            }
            if(!($password == $repate_paasword)){
                array_push($errors,'Confirm password is not match');
            }

            require_once 'database.php';
            $sql = "SELECT *FROM users WHERE email = '$email'";
            $result = mysqli_query($connection,$sql); 
            $count = mysqli_num_rows($result);
            if($count>0){
                array_push($errors,'Email already exist');
            }
            if(count($errors) > 0){
                foreach($errors as $error){
                    echo "<div>$error</div>";
                }
            }
            else{
                $passwordHash = password_hash($password,PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (name,email,password,user_type) VALUES (?,?,?,?)";
                $stmt = mysqli_stmt_init($connection);
                $prepStmt = mysqli_stmt_prepare($stmt,$sql);
                if($prepStmt){
                    mysqli_stmt_bind_param($stmt,'sssi',$name,$email,$passwordHash,$user_type);
                    mysqli_stmt_execute($stmt);
                    echo "<div>You are regiseterd success</div>";
                }
                else{
                    die('something went wrong');
                }
            }


        }

?>
    <form action="registration.php" method="post">
        <div>
     <input type="text" name="name" placeholder="name">
        </div>
        <div>
          <input type="text" name="email" placeholder="email">  
        </div>
        <div>
            <input type="text" name="password" placeholder="password">
        </div>
        <div>
            <input type="text" name="repate_password" placeholder="repate_password">
        </div>
        <div><input type="radio" name="user_type" value="1">supplayer  <input type="radio" name="user_type" value="2">customer</div>
        <div>
            <input type="submit" name="submite" value="Register">
            
        </div>
    </form>
    
    

</body>
</html>