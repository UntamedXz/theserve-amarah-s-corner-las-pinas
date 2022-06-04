<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700;800&family=Poppins:wght@200;300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Login - Admin Panel</title>

    <style>
        body {
            background: url(../assets/images/background.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            height: 100vh;
        }

        @media (min-width: 768px) {
            .toast {
                top: 20px;
            }
        }
    </style>
</head>

<body>
    <div id="preloader"></div>

    <div class="toast">
        <div class="toast-content">
            <i class="fa-solid fa-triangle-exclamation warning"></i>

            <div class="message">
                <span class="text text-1"></span>
                <span class="text text-2"></span>
            </div>
        </div>
        <i class="fa-solid fa-xmark close"></i>
        <div class="progress"></div>
    </div>

    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'no input') {
        echo '<script>
        window.addEventListener("load", function () {
            document.querySelectory(".insert-modal").classList.toggle("active");
            document.querySelector(".toast").classList.toggle("active");
            document.querySelector(".text-1").textContent = "Error";
            document.querySelector(".text-2").textContent = "All fields are required!";
            document.querySelector(".progress").classList.toggle("active");
            document.querySelector(".close").addEventListener("click", () => {
                document.querySelector(".toast").classList.remove("active");
            });
        })
    </script>';
        unset($_SESSION['status']);
    }
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'no email') {
        echo '<script>
        window.addEventListener("load", function () {
            document.querySelector(".toast").classList.toggle("active");
            document.querySelector(".text-1").textContent = "Error";
            document.querySelector(".text-2").textContent = "Input email!";
            document.querySelector(".progress").classList.toggle("active");
            document.querySelector(".close").addEventListener("click", () => {
                document.querySelector(".toast").classList.remove("active");
            });
        })
    </script>';
        unset($_SESSION['status']);
    }
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'no password') {
        echo '<script>
        window.addEventListener("load", function () {
            document.querySelector(".toast").classList.toggle("active");
            document.querySelector(".text-1").textContent = "Error";
            document.querySelector(".text-2").textContent = "Input password!";
            document.querySelector(".progress").classList.toggle("active");
            document.querySelector(".close").addEventListener("click", () => {
                document.querySelector(".toast").classList.remove("active");
            });
        });
    </script>';
        unset($_SESSION['status']);
    }
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'email not registered') {
        echo '<script>
        window.addEventListener("load", function () {
            document.querySelector(".toast").classList.toggle("active");
            document.querySelector(".text-1").textContent = "Error";
            document.querySelector(".text-2").textContent = "Email not registered!";
            document.querySelector(".progress").classList.toggle("active");
            document.querySelector(".close").addEventListener("click", () => {
                document.querySelector(".toast").classList.remove("active");
            });
        });
    </script>';
        unset($_SESSION['status']);
    }
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'wrong password') {
        echo '<script>
        window.addEventListener("load", function () {
            document.querySelector(".toast").classList.toggle("active");
            document.querySelector(".text-1").textContent = "Error";
            document.querySelector(".text-2").textContent = "Wrong password!";
            document.querySelector(".progress").classList.toggle("active");
            document.querySelector(".close").addEventListener("click", () => {
                document.querySelector(".toast").classList.remove("active");
            });
        });
    </script>';
        unset($_SESSION['status']);
    }
    ?>

    <!-- LOGIN FORM -->
    <div class="login-form-container">
        <form action="./functions/processing" method="POST">
            <a href="#" class="logo"><img src="../assets/images/official_logo.png" alt=""></a>
            <h3>sign in</h3>
            <span>email</span>
            <input type="email" name="email" class="box" placeholder="enter your email" value="<?php if (isset($_SESSION['admin_email'])) {
                                                                                                    echo $_SESSION['admin_email'];
                                                                                                } if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>">
            <span>password</span>
            <input type="password" name="password" class="box" placeholder="enter your password" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>">
            <div class="checkbox">
                <input type="checkbox" name="rem" id="remember-me" <?php if(isset($_COOKIE['email']) && isset($_COOKIE['password'])) { echo "checked"; } ?>>
                <label for="remember-me">remember me</label>
            </div>
            <input type="submit" name="login" value="sign in" class="btn">
            <p>forget password? <a href="#">click here</a></p>
        </form>
    </div>

    <script>
        // PRELOADER JS
        var loader = document.getElementById("preloader");

        window.addEventListener("load", function() {
            loader.style.display = "none";
            setTimeout(() => {
                document.querySelector(".toast").classList.remove("active");
            }, 5000);
        })

        // CUSTOM ALERT JS
        document.querySelector('#close-alert').onclick = () => {
            alertbox.style.display = 'none';
        }
    </script>
</body>

</html>