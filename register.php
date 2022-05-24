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

    <?php include './includes/navbar.php'; ?>

    <div class="toast-wrapper">
        <div class="toast">
            <div class="toast-content">
                <i id="alert_icon" class="fa-solid fa-triangle-exclamation warning"></i>

                <div class="message">
                    <span class="text text-1"></span>
                    <span class="text text-2"></span>
                </div>
            </div>
            <i class="fa-solid fa-xmark close"></i>
            <div class="progress"></div>
        </div>
    </div>

    <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] == 'no input') {
    echo '<script>
    window.addEventListener("load", function () {
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
    if(isset($_SESSION['status']) && $_SESSION['status'] == 'no username') {
    echo '<script>
    window.addEventListener("load", function () {
        document.querySelector(".toast").classList.toggle("active");
        document.querySelector(".text-1").textContent = "Error";
        document.querySelector(".text-2").textContent = "Input username!";
        document.querySelector(".progress").classList.toggle("active");
        document.querySelector(".close").addEventListener("click", () => {
            document.querySelector(".toast").classList.remove("active");
        });
    })
    </script>';
    unset($_SESSION['status']);
    }
    if(isset($_SESSION['status']) && $_SESSION['status'] == 'no email') {
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
    if(isset($_SESSION['status']) && $_SESSION['status'] == 'no password') {
    echo '<script>
    window.addEventListener("load", function () {
        document.querySelector(".toast").classList.toggle("active");
        document.querySelector(".text-1").textContent = "Error";
        document.querySelector(".text-2").textContent = "Input password!";
        document.querySelector(".progress").classList.toggle("active");
        document.querySelector(".close").addEventListener("click", () => {
            document.querySelector(".toast").classList.remove("active");
        });
    })
    </script>';
    unset($_SESSION['status']);
    }
    if(isset($_SESSION['status']) && $_SESSION['status'] == 'Email already exist!') {
    echo '<script>
    window.addEventListener("load", function () {
        document.querySelector(".toast").classList.toggle("active");
        document.querySelector(".text-1").textContent = "Error";
        document.querySelector(".text-2").textContent = "Email already exist!";
        document.querySelector(".progress").classList.toggle("active");
        document.querySelector(".close").addEventListener("click", () => {
            document.querySelector(".toast").classList.remove("active");
        });
    })
    </script>';
    unset($_SESSION['status']);
    }
    if(isset($_SESSION['status']) && $_SESSION['status'] == 'Registered Successfully!') {
    echo '<script>
    window.addEventListener("load", function () {
        document.querySelector(".toast").classList.toggle("active");
        document.getElementById("alert_icon").className = "fa-solid fa-check warning";
        document.querySelector(".text-1").textContent = "Success";
        document.querySelector(".text-2").textContent = "Registered Successfully!";
        document.querySelector(".progress").classList.toggle("active");
        document.querySelector(".close").addEventListener("click", () => {
            document.querySelector(".toast").classList.remove("active");
        });
    })
    </script>';
    unset($_SESSION['status']);
    }
    ?>

    <!-- REGISTRATION FORM -->
    <div class="reg-form-container">
        <form action="./processing.php" method="POST">
            <a href="#" class="logo"><img src="./assets/images/official_logo.png" alt=""></a>
            <h3>sign up</h3>
            <span>Username</span>
            <input type="text" name="username" class="box" placeholder="enter your username" id=""
                value="<?php if(isset($_POST['username'])) {echo $_POST['username'];} ?>">
            <span>email</span>
            <input type="email" name="email" class="box" placeholder="enter your email" id=""
                value="<?php if(isset($_POST['email'])) {echo $_POST['email'];} ?>">
            <span>password</span>
            <input type="password" name="password" class="box" placeholder="enter your password" id="" value="<?php if(isset($_POST['password'])) {echo $_POST['password'];} ?>">
            <input type="submit" name="register" value="sign up" class="btn">
            <p>have an account? <a href="login">login now</a></p>
        </form>
    </div>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js">
    </script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js">
    </script>
    <script src="./assets/js/script.js"></script>
    <script>
        // PRELOADER JS
        var loader = document.getElementById("preloader");

        window.addEventListener("load", function () {
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