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
    <link rel="stylesheet" href="./sidebar.css">
</head>

<body>

    <header class="header__menu">
        <div class="container">
            <div class="header__navbar">
                <div class="header__menu--left-side">
                    <a href="./index.html">
                        <img class="header__menu--logo" src="./img/main_logo.svg" alt="Food delivery website logo" />
                    </a>
                    <div class="header__menu--search">
                        <input class="header__menu--search-input" type="text" placeholder="Search " />
                        <i class="header__menu--search-icon fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>
                <div class="header__menu--right-side">
                    <nav class="header__menu--link">
                        <a class="menu_link" href="#">Restaurants</a>
                        <a class="menu_link" href="#">Deals</a>
                        <span class="header__menu--divider-vertical"></span>
                        <a class="menu_link active" href="#">My orders</a>
                    </nav>
                    <div class="header__menu--icon">
                        <a href="#"><img class="header__menu--icon-item" src="img/shopping bag.svg"
                                alt="shopping bag icon" /></a>
                        <span class="header__menu--icon-number">4</span>
                    </div>
                    <a href="setting.php">
                        <img class="header__menu--useravatar" src="img/useravatar.svg" alt="useravatar img" />
                    </a>
                    <span class="header__menu--divider-vertical"></span>
                    <img class="header__menu--icon-mobile menu-icon" src="img/menu.svg" alt=" header menu icon " />
                </div>
            </div>
        </div>


        <div class="sidebar">
            <div class="logo">
                <i class="fa-solid fa-bars icon menu-icon"></i>
                <span class="logo-name">Food Delivery</span>
            </div>

            <div class="sidebar-content">
                <ul class="lists">
                    <li class="list">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-house icon"></i>
                            <span class="link">Dashboard</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-utensils icon"></i>
                            <span class="link">Restaurants
                            </span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="#" class="nav-link">
                            <i class="fa-regular fa-bell icon"></i>
                            <span class="link">Notifications
                            </span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-circle-dollar-to-slot icon"></i>
                            <span class="link">Deals</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="#" class="nav-link">
                            <i class="fa-regular fa-address-card icon"></i>
                            <span class="link">About</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-plus icon"></i>
                            <span class="link">My Orders</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="#" class="nav-link">
                            <i class="fa-regular fa-message icon"></i>
                            <span class="link">Messages</span>
                        </a>
                    </li>
                </ul>

                <div class="bottom-cotent">
                    <li class="list">
                        <a href="setting.php" class="nav-link">
                            <i class="fa-solid fa-gear icon"></i>
                            <span class="link">Settings</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="" class="nav-link">
                            <i class="fa-solid fa-right-from-bracket icon"></i>
                            <span class="link">Logout</span>
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </header>

    <section class="overlay"></section>





    <!-- you can add new sction below -->






    <script src="./sidebar.js"></script>

</body>

</html>