<?php
session_start();
if (isset($_SESSION['userEmail']) && !empty($_SESSION['userEmail'])) {
    header("Location: ./index");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Amarah's Corner - BF Resort Las Piñas</title>

    <style>
        body {
            background: url(./assets/images/background.png) no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100%;
        }
    </style>
</head>

<body>
    <div id="preloader"></div>

    <?php include './includes/navbar.php';?>
    <input type="hidden" name="" id="cartCount" value="<?php echo $cartCount; ?>">

    <!-- TOAST -->
    <div class="toast" id="toast">
        <div class="toast-content" id="toast-content">
            <i id="toast-icon" class="fa-solid fa-triangle-exclamation warning"></i>

            <div class="message">
                <span class="text text-1" id="text-1"></span>
                <span class="text text-2" id="text-2"></span>
            </div>
        </div>
        <i class="fa-solid fa-xmark close"></i>
        <div class="progress"></div>
    </div>

    <!-- LOGIN FORM -->
    <div class="login-form-container">
        <form id="login">
            <a href="#" class="logo"><img src="./assets/images/official_logo.png" alt=""></a>
            <h3>sign in</h3>
            <span>email</span>
            <input type="email" name="loginEmail" id="loginEmail" class="box" placeholder="enter your email"
                value="<?php if (isset($_SESSION['email'])) {echo $_SESSION['email'];}?>">
            <input type="hidden" name="" id="error-email">
            <span>password</span>
            <input type="password" name="loginPassword" id="loginPassword" class="box" placeholder="enter your password">
            <input type="hidden" name="" id="error-password">
            <div class="checkbox">
                <input type="checkbox" name="rem" id="remember-me">
                <label for="remember-me">remember me</label>
            </div>
            <input type="submit" name="login" value="sign in" class="btn">
            <p>forget password? <a href="#">click here</a></p>
            <p>don't have an account? <a href="register">create one</a></p>
        </form>
    </div>

    <?php include './includes/cart-count.php' ?>
    <script>
        $('#login').on('submit', function(e) {
            e.preventDefault();

            if ($('#loginEmail').val() == '') {
                $('#error-email').val('Input email!');
            } else {
                $('#error-email').val('');
            }

            if ($('#loginPassword').val() == '') {
                $('#error-password').val('Input password!');
            } else {
                $('#error-password').val('');
            }

            if ($('#error-email').val() != '') {
                $('#toast').addClass('active');
                $('.progress').addClass('active');
                // $('#toast-icon').removeClass(
                //     'fa-solid fa-triangle-exclamation').addClass(
                //     'fa-solid fa-check warning');
                $('.text-1').text('Error!');
                $('.text-2').text('Input email!');

                setTimeout(() => {
                    $('#toast').removeClass("active");
                    $('.progress').removeClass("active");
                }, 5000);
            } else if ($('#error-password').val() != '') {
                $('#toast').addClass('active');
                $('.progress').addClass('active');
                // $('#toast-icon').removeClass(
                //     'fa-solid fa-triangle-exclamation').addClass(
                //     'fa-solid fa-check warning');
                $('.text-1').text('Error!');
                $('.text-2').text('Input password!');

                setTimeout(() => {
                    $('#toast').removeClass("active");
                    $('.progress').removeClass("active");
                }, 5000);
            } else {
                $.ajax({
                    type: "POST",
                    url: "login-validation",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        if (response == 'email not registered') {
                            $('#toast').addClass('active');
                            $('.progress').addClass('active');
                            // $('#toast-icon').removeClass(
                            //     'fa-solid fa-triangle-exclamation').addClass(
                            //     'fa-solid fa-check warning');
                            $('.text-1').text('Error!');
                            $('.text-2').text('Email not registered!');

                            setTimeout(() => {
                                $('#toast').removeClass("active");
                                $('.progress').removeClass("active");
                            }, 5000);
                        }

                        if (response == 'wrong password') {
                            $('#toast').addClass('active');
                            $('.progress').addClass('active');
                            // $('#toast-icon').removeClass(
                            //     'fa-solid fa-triangle-exclamation').addClass(
                            //     'fa-solid fa-check warning');
                            $('.text-1').text('Error!');
                            $('.text-2').text('Wrong password');

                            setTimeout(() => {
                                $('#toast').removeClass("active");
                                $('.progress').removeClass("active");
                            }, 5000);
                        }

                        if (response == 'success') {
                            location.href = 'http://localhost/theserve-amarah-s-corner-las-pinas';
                        }
                    }
                })
            }
        })
    </script>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js">
    </script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js">
    </script>
    <script src="./assets/js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script>
        // PRELOADER JS
        var loader = document.getElementById("preloader");

        window.addEventListener("load", function () {
            loader.style.display = "none";
            setTimeout(() => {
                document.querySelector(".toast").classList.remove("active");
            }, 5000);
        })
    </script>
</body>

</html>