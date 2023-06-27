<?
require_once "../../database.php";
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
    <link
        href="https://fonts.googleapis.com/css2?family=Inter&family=Lato:wght@300&family=Nunito:wght@400;500&display=swap"
        rel="stylesheet" />
    <!-- Main styles -->
    <link rel="stylesheet" href="./category.css">
</head>

<body>
    <section class="category">
        <div class="container">
            <div class="category__inner">
            <?php
                     $sql = "select user_id,resturant_name from supplayer";
                     $result = mysqli_query($connection,$sql);
                     if(mysqli_num_rows($result)>0){
                       while( $row = mysqli_fetch_assoc($result)){
                    ?>
                <a href="food_by.php?id=<?php echo $row['user_id']?>" class="category__item">
                    <div class="category__photo">
                     
                        <img class="category__img" src="./img/pizza.png" alt="">
                    </div>
                    <div class="category__name"><?php echo($row['resturant_name'])?></div>
                    </a>
                    <?php
                       }
                     }
                     ?>
            </div>
        </div>
    </section>
</body>
<!-- <a href="№" class="category__item">
                    <div class="category__photo">
                        <img class="category__img" src="./img/burger.png" alt="">
                    </div>
                    <div class="category__name">Burger</div>
                </a>
                <a href="#" class="category__item">
                    <div class="category__photo">
                        <img class="category__img" src="./img/meat.png" alt="">
                    </div>
                    <div class="category__name">BBQ</div>
                </a>
                <a href="#" class="category__item">
                    <div class="category__photo">
                        <img class="category__img" src="./img/sushi.png" alt="">
                    </div>
                    <div class="category__name">Sushi</div>
                </a>
                <a href="#" class="category__item">
                    <div class="category__photo">
                        <img class="category__img" src="./img/broccoli.png" alt="">
                    </div>
                    <div class="category__name">Vegan</div>
                </a>
                <a href="#" class="category__item">
                    <div class="category__photo">
                        <img class="category__img" src="./img/cake.png" alt="">
                    </div>
                    <div class="category__name">Desserts</div>
                </a> -->

</html>