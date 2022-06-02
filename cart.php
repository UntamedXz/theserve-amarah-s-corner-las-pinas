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

// $getCartNumber = mysqli_query($conn, "SELECT COUNT(user_id) FROM cart WHERE user_id = $userId");

// while($rowCartNum = mysqli_fetch_array($getCartNumber)) {
//     $cartNumber = $row['COUNT(user_id)'];
// }

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
                    <?php
                    $getUserCart = mysqli_query($conn, "SELECT product.product_title, product.product_img1, subcategory.subcategory_title, product.product_price, cart.product_qty, cart.product_total
                    FROM cart
                    LEFT JOIN product
                    ON cart.product_id = product.product_id
                    LEFT JOIN subcategory
                    ON cart.subcategory_id = subcategory.subcategory_id WHERE cart.user_id = $userId");

                    foreach($getUserCart as $row) {
                    ?>
                    <div class="box">
                        <div class="img" style="background:
                            url(./assets/images/<?php echo $row['product_img1']; ?>) no-repeat; background-size: cover;
                            background-position: center;">
                        </div>
                        <div class="content">
                            <h3><?php echo $row['product_title']; ?></h3>
                            <h5><?php echo $row['subcategory_title']; ?></h5>
                            <h4>Price <strong>P<?php echo $row['product_price']; ?></strong></h4>
                            <div class="qty-remove">
                                <p class="unit">Quantity: <input value="<?php echo $row['product_qty']; ?>"></p>
                                <h4 class="subTotal">Subtotal <strong>P<?php echo $row['product_total']; ?></strong></h4>
                            </div>
                            <p class="btn-area">
                                    <i class='bx bxs-trash'></i>
                                    <span class="btn-2">Remove</span>
                                </p>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="right-bar">
                    <p><span>Total</span> <span><strong>P1,394.00</strong></span></p>

                    <a href="#"><i class='bx bxs-cart'></i>Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </section>

    <?php include './includes/cart-count.php' ?>
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