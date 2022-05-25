<?php
session_start();
if (!isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin'] == false) {
    header("Location: ./login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Admin Panel</title>

    <style>
        .toast-wrapper {
            position: relative;
            top: 0;
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.6s ease;
            overflow: hidden;
        }

        @media (min-width: 768px) {
            .toast-wrapper {
                height: 100vh;
            }
        }

        .toast-wrapper .toast {
            position: absolute;
            bottom: 0px;
            margin-bottom: 20px;
            padding: 10px 35px 10px 25px;
            background-color: var(--black);
            color: var(--primary);
            box-shadow: 0 5px 10px rgba(7, 5, 6, 0.4196078431);
            border-radius: 12px;
            border-left: 6px solid #ffaf08;
            z-index: 500;
            overflow: hidden;
            transform: translateY(calc(100% + 20px));
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.35);
        }

        @media (min-width: 768px) {
            .toast-wrapper .toast {
                top: 20px;
                right: 20px;
                bottom: unset;
                margin-bottom: unset;
                transform: unset;
                transform: translateX(calc(100% + 20px));
            }

            .toast-wrapper .toast.active {
                transform: translateX(0);
            }
        }

        .toast-wrapper .toast .toast-content {
            display: flex;
            align-items: center;
        }

        .toast-wrapper .toast .toast-content .warning {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 30px;
            width: 30px;
            background-color: #ffaf08;
            color: #070506;
            border-radius: 50%;
        }

        .toast-wrapper .toast .toast-content .message {
            display: flex;
            flex-direction: column;
            margin: 0 20px;
        }

        .toast-wrapper .toast .toast-content .message .text {
            font-size: 14px;
            font-weight: 400;
            color: #ffaf08;
        }

        .toast-wrapper .toast .toast-content .message .text-1 {
            font-weight: 600;
        }

        .toast-wrapper .toast .close {
            position: absolute;
            top: 10px;
            right: 15px;
            padding: 5px;
            cursor: pointer;
            opacity: 0.7;
        }

        .toast-wrapper .toast .close:hover {
            opacity: 1;
        }

        .toast-wrapper .toast .progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 2px;
            width: 100%;
            background-color: #070506;
        }

        .toast-wrapper .toast .progress:before {
            content: "";
            position: absolute;
            bottom: 0;
            right: 0;
            height: 100%;
            width: 100%;
            background-color: #ffaf08;
        }

        .toast-wrapper .toast .progress.active:before {
            animation: progress 5s linear forwards;
        }

        .toast-wrapper .toast.active {
            transform: translateY(0);
        }

        @keyframes progress {
            100% {
                right: 100%;
            }
        }
    </style>
</head>

<body>
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
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'empty field') {
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
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'empty category title') {
        echo '<script>
        window.addEventListener("load", function () {
            document.querySelector(".toast").classList.toggle("active");
            document.querySelector(".text-1").textContent = "Error";
            document.querySelector(".text-2").textContent = "Input category title!";
            document.querySelector(".progress").classList.toggle("active");
            document.querySelector(".close").addEventListener("click", () => {
                document.querySelector(".toast").classList.remove("active");
            });
        })
    </script>';
        unset($_SESSION['status']);
    }
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'image does not exist') {
        echo '<script>
        window.addEventListener("load", function () {
            document.querySelector(".toast").classList.toggle("active");
            document.querySelector(".text-1").textContent = "Error";
            document.querySelector(".text-2").textContent = "Upload category thumbnail!";
            document.querySelector(".progress").classList.toggle("active");
            document.querySelector(".close").addEventListener("click", () => {
                document.querySelector(".toast").classList.remove("active");
            });
        })
    </script>';
        unset($_SESSION['status']);
    }
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'invalid img ext') {
        echo '<script>
        window.addEventListener("load", function () {
            document.querySelector(".toast").classList.toggle("active");
            document.querySelector(".text-1").textContent = "Error";
            document.querySelector(".text-2").textContent = "File not supported!";
            document.querySelector(".progress").classList.toggle("active");
            document.querySelector(".close").addEventListener("click", () => {
                document.querySelector(".toast").classList.remove("active");
            });
        })
    </script>';
        unset($_SESSION['status']);
    }
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'too large') {
        echo '<script>
        window.addEventListener("load", function () {
            document.querySelector(".toast").classList.toggle("active");
            document.querySelector(".text-1").textContent = "Error";
            document.querySelector(".text-2").textContent = "Image size is too large!";
            document.querySelector(".progress").classList.toggle("active");
            document.querySelector(".close").addEventListener("click", () => {
                document.querySelector(".toast").classList.remove("active");
            });
        })
    </script>';
        unset($_SESSION['status']);
    }
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'Successfully added!') {
        echo '<script>
        window.addEventListener("load", function () {
            document.querySelector(".toast").classList.toggle("active");
            document.getElementById("alert_icon").className = "fa-solid fa-check warning";
            document.querySelector(".text-1").textContent = "Success";
            document.querySelector(".text-2").textContent = "Successfully added!";
            document.querySelector(".progress").classList.toggle("active");
            document.querySelector(".close").addEventListener("click", () => {
                document.querySelector(".toast").classList.remove("active");
            });
        })
    </script>';
        unset($_SESSION['status']);
    }
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'Something went wrong!') {
        echo '<script>
        window.addEventListener("load", function () {
            document.querySelector(".toast").classList.toggle("active");
            document.querySelector(".text-1").textContent = "Error";
            document.querySelector(".text-2").textContent = "Something went wrong!";
            document.querySelector(".progress").classList.toggle("active");
            document.querySelector(".close").addEventListener("click", () => {
                document.querySelector(".toast").classList.remove("active");
            });
        })
    </script>';
        unset($_SESSION['status']);
    }
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'category title exist') {
        echo '<script>
        window.addEventListener("load", function () {
            document.querySelector(".toast").classList.toggle("active");
            document.querySelector(".text-1").textContent = "Error";
            document.querySelector(".text-2").textContent = "Category title already exist!";
            document.querySelector(".progress").classList.toggle("active");
            document.querySelector(".close").addEventListener("click", () => {
                document.querySelector(".toast").classList.remove("active");
            });
        })
    </script>';
        unset($_SESSION['status']);
    }
    ?>

    <?php include 'top.php'; ?>

    <!-- MAIN -->
    <main>
        <h1 class="title">Insert Category</h1>
        <ul class="breadcrumbs">
            <li><a href="index">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Insert Category</a></li>
        </ul>
        <section class="insert-category">
            <div class="wrapper">
                <div class="form-container">
                    <h1>Insert Category</h1>
                    <form action="./processing.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <span>Category Title</span>
                            <input type="text" name="category_title">
                        </div>
                        <div class="form-group">
                            <span>Select Category Image</span>
                            <input type="file" accept=".jpg, .jpeg, .png" class="file" name="category_thumbnail">
                        </div>
                        <input type="submit" name="category" value="Insert Category">
                    </form>
                </div>
            </div>
        </section>
        <script>
            // PRELOADER JS
            var loader = document.getElementById("preloader");

            window.addEventListener("load", function() {
                loader.style.display = "none";
                setTimeout(() => {
                    document.querySelector(".toast").classList.remove("active");
                }, 5000);
            })

            let alertbox = document.querySelector('.alert');

            document.querySelector('#close-alert').onclick = () => {
                alertbox.style.display = 'none';
            }
        </script>
        <?php include 'bottom.php' ?>

</body>

</html>