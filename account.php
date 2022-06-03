<?php
session_start();
require_once './includes/database_conn.php';
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
    header("Location: ./login");
}

$userEmail = $_SESSION['userEmail'];

$getUserId = mysqli_query($conn, "SELECT * FROM customers WHERE email = '$userEmail'");

while($row = mysqli_fetch_array($getUserId)) {
    $userId = $row['user_id'];
}

if(isset($_SESSION['userEmail'])) {
    $userEmail = $_SESSION['userEmail'];

    $getUserId = mysqli_query($conn, "SELECT * FROM customers WHERE email = '$userEmail'");
    $row = mysqli_fetch_array($getUserId);
    $userId = $row['user_id'];

    $getCartCount = mysqli_query($conn, "SELECT COUNT(user_id) FROM cart WHERE user_id = $userId");
    $rowCount = mysqli_fetch_array($getCartCount);
    $cartCount = $rowCount['COUNT(user_id)'];
} else {
    $cartCount = '0';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Amarah's Corner - BF Resort Las Piñas</title>

    <style>
        body {
            background: url(./assets/images/background.png) no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
        }
    </style>
</head>

<body>
    <div id="preloader"></div>

    <?php include './includes/navbar.php';?>
    <input type="hidden" name="" id="cartCount" value="<?php echo $cartCount; ?>">

    <section class="account">
        <div class="account-wrapper">
            <div class="first-row">
                <div class="img-cont">
                    <img src="./assets/images/B612_20220322_202642_720-min.jpg" alt="">
                </div>
                <div class="account-details">
                    <h1 class="name">Jennifer Sabado</h1>
                    <h3 class="type">Customer</h3>
                    <div class="tab">
                        <button>PROFILE</button>
                        <button>CONTACT</button>
                    </div>
                </div>
            </div>
            <div class="second-row">
                <div class="profile-info">
                    <div class="my-profile">
                        <span class="myProfile">MY PROFILE</span>
                        <hr>
                        <div class="name-email-edit">
                            <div class="name-email">
                                <h1>JENNIFER SABADO</h1>
                                <h3 style="word-wrap: break-all;">untamedandromeda@gmail.com</h3>
                            </div>
                        </div>
                    </div>
                    <div class="basic-information">
                        <span class="basicInformation">BASIC INFORMATION</span>
                        <hr>
                        <div class="basicInfoWrapper">
                            <span>Birthday: Dec. 12, 2000</span>
                            <span>Gender: Female</span>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="profile-details">
                    <form id="profile_details">
                        <h1 class="profile-details">PROFILE DETAILS</h1>
                        <hr>
                        <div class="form-group">
                            <span>Name</span>
                            <input type="text" name="" id="" placeholder="Input complete name" value="Jennifer Sabado">
                        </div>
                        <div class="form-group">
                            <span>Email</span>
                            <input type="email" name="" id="" value="untamedandromeda@gmail.com">
                        </div>
                        <div class="form-group">
                            <span>Birthday</span>
                            <input type="date" name="" id="">
                        </div>
                        <div class="form-group">
                            <span>Gender</span>
                            <div class="gender">
                                <input type="radio" name="gender" id="" value="FEMALE">
                                <label for="for female">FEMALE</label>
                                <input type="radio" name="gender" id="" value="MALE">
                                <label for="for female">MALE</label>
                            </div>
                        </div>
                        <button type="submit">UPDATE</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include './includes/cart-count.php' ?>
    <script>
        var loader = document.getElementById("preloader");

        window.addEventListener("load", function () {
            loader.style.display = "none";
        })
    </script>
</body>

</html>