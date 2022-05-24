<?php 
session_start();
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
    header("Location: ./login");
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>

</head>


<script>
    $(document).ready(function () {
        $('#table_id').dataTable({
            responsive: true,
            scrollX: true,
        });
    });
</script>
</script>


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

    <section class="cart">
        <div class="wrapper">
            <h1>Shopping Cart</h1>
            <hr>
            <div class="project">
                <div class="shop">
                    <div class="box">
                        <div class="img" style="background:
                            url(https://d1sag4ddilekf6.azureedge.net/compressed/items/PHITE20220114095410029702/photo/menueditor_item_4b7424ad46314b1d93304f29b30ed091_1647089506293598067.jpg)
                            no-repeat;
                            background-size: cover;
                            background-position: center;">
                        </div>
                        <div class="content">
                            <h3>Ham & Cheese</h3>
                            <h5>Classic Flavor</h5>
                            <h4>Price <strong>P199</strong></h4>
                            <div class="qty-remove">
                                <p class="unit">Quantity: <input value="2"></p>
                                <p class="btn-area">
                                    <i class='bx bxs-trash'></i>
                                    <span class="btn-2">Remove</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="img" style="background:
                            url(https://d1sag4ddilekf6.azureedge.net/compressed/items/PHITE20220114095410015522/photo/menueditor_item_5955afb8c1964c85a38328cd9eaa9ccb_1647089542791428327.jpg)
                            no-repeat;
                            background-size: cover;
                            background-position: center;">
                        </div>
                        <div class="content">
                            <h3>Hawaiian Pizza</h3>
                            <h5>Classic Flavor</h5>
                            <h4>Price <strong>P199</strong></h4>
                            <div class="qty-remove">
                                <p class="unit">Quantity: <input value="2"></p>
                                <p class="btn-area">
                                    <i class='bx bxs-trash'></i>
                                    <span class="btn-2">Remove</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="img" style="background:
                            url(https://d1sag4ddilekf6.azureedge.net/compressed/items/PHITE20220114095409055210/photo/menueditor_item_113a2ca62d704b7f95fe3b786299eaf6_1647415409774154060.jpg)
                            no-repeat;
                            background-size: cover;
                            background-position: center;">
                        </div>
                        <div class="content">
                            <h3>Beef & Mushroom Overload</h3>
                            <h5>Special Flavor</h5>
                            <h4>Price <strong>P249</strong></h4>
                            <div class="qty-remove">
                                <p class="unit">Quantity: <input value="2"></p>
                                <p class="btn-area">
                                    <i class='bx bxs-trash'></i>
                                    <span class="btn-2">Remove</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-bar">
                    <p><span>Subtotal</span> <span><strong>P1,294.00</strong></span></p>
                    <hr>
                    <p><span>Shipping</span> <span><strong>P100</strong></span></p>
                    <hr>
                    <p><span>Total</span> <span><strong>P1,394.00</strong></span></p>

                    <a href="#"><i class='bx bxs-cart'></i>Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js">
    </script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js">
    </script>
    <script src="./assets/js/script.js"></script>
    <script>
        var loader = document.getElementById("preloader");

        window.addEventListener("load", function () {
            loader.style.display = "none";
        })
    </script>
</body>

</html>