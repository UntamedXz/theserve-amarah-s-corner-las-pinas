<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("Location: ./index");
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
                <i class="fa-solid fa-triangle-exclamation warning"></i>

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
    if(isset($_SESSION['status']) && $_SESSION['status'] == 'email not registered') {
    echo '<script>
    window.addEventListener("load", function () {
        document.querySelector(".toast").classList.toggle("active");
        document.querySelector(".text-1").textContent = "Error";
        document.querySelector(".text-2").textContent = "Email not registered!";
        document.querySelector(".progress").classList.toggle("active");
        document.querySelector(".close").addEventListener("click", () => {
            document.querySelector(".toast").classList.remove("active");
        });
    })
    </script>';
    unset($_SESSION['status']);
    }
    if(isset($_SESSION['status']) && $_SESSION['status'] == 'wrong password') {
    echo '<script>
    window.addEventListener("load", function () {
        document.querySelector(".toast").classList.toggle("active");
        document.querySelector(".text-1").textContent = "Error";
        document.querySelector(".text-2").textContent = "Wrong password!";
        document.querySelector(".progress").classList.toggle("active");
        document.querySelector(".close").addEventListener("click", () => {
            document.querySelector(".toast").classList.remove("active");
        });
    })
    </script>';
    unset($_SESSION['status']);
    }
    ?>

    <!-- LOGIN FORM -->
    <div class="login-form-container">
        <form action="./processing.php" method="POST">
            <a href="#" class="logo"><img src="./assets/images/official_logo.png" alt=""></a>
            <h3>sign in</h3>
            <span>email</span>
            <input type="email" name="email" class="box" placeholder="enter your email"
                value="<?php if(isset($_SESSION['email'])) { echo $_SESSION['email']; } ?>">
            <span>password</span>
            <input type="password" name="password" class="box" placeholder="enter your password">
            <div class="checkbox">
                <input type="checkbox" name="rem" id="remember-me">
                <label for="remember-me">remember me</label>
            </div>
            <input type="submit" name="login" value="sign in" class="btn">
            <p>forget password? <a href="#">click here</a></p>
            <p>don't have an account? <a href="register">create one</a></p>
        </form>
    </div>

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