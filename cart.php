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
    <input type="hidden" name="" id="cartCount" value="<?php echo $cartCount; ?>">

    <!-- DELETE -->
    <div id="popup-box" class="popup-box delete-modal">
        <div class="top">
            <h3>Delete Category</h3>
            <div id="modalClose" class="fa-solid fa-xmark"></div>
        </div>
        <hr>
        <form id="delete">
            <input type="text" name="" id="cartId" value="">
            <p>Are you sure, you want to delete this item?</p>
        </form>
        <hr>
        <div class="bottom">
            <div class="buttons">
                <button id="modalClose" type="button" class="cancel">CLOSE</button>
                <button form="delete" id="delete-btn" type="submit" class="save">DELETE</button>
            </div>

        </div>
    </div>

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

    <section class="cart">
        <div class="wrapper">
            <h1>Shopping Cart</h1>
            <hr>
            <div class="project">
                <div class="shop">
                    <?php
                    $getUserCart = mysqli_query($conn, "SELECT cart.cart_id, product.product_title, product.product_img1, subcategory.subcategory_title, product.product_price, cart.product_qty, cart.product_total
                    FROM cart
                    LEFT JOIN product
                    ON cart.product_id = product.product_id
                    LEFT JOIN subcategory
                    ON cart.subcategory_id = subcategory.subcategory_id WHERE cart.user_id = $userId");

                    foreach($getUserCart as $row) {
                    ?>
                    <form id="cart_item">
                    <div class="box" data-id="<?php echo $row['cart_id']; ?>">
                        <?php
                        if($row['product_img1'] != '') { 
                        ?>
                        <div class="img" style="background:
                            url(./assets/images/<?php echo $row['product_img1']; ?>) no-repeat; background-size: cover;
                            background-position: center;">
                        </div>
                        <?php
                        } else {
                        ?>
                        <div class="img" style="display: flex; align-items: center; justify-content: center; color: #6b6b6b;">
                            <span>NO IMAGE AVAILABLE</span>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="content">
                            <h3><?php echo $row['product_title']; ?></h3>
                            <h5><?php echo $row['subcategory_title']; ?></h5>
                            <h4>Price <strong>P<?php echo $row['product_price']; ?></strong></h4>
                            <div class="qty-remove">
                                <p class="unit">Quantity: <input value="<?php echo $row['product_qty']; ?>"></p>
                                <h4 class="subTotal">Subtotal <strong>P<?php echo $row['product_total']; ?></strong></h4>
                            </div>
                            <p form="cart_item" class="btn-area" data-id="<?php echo $row['cart_id']; ?>">
                                    <i class='bx bxs-trash'></i>
                                    <span class="btn-2">Remove</span>
                            </p>
                        </div>
                    </div>
                    </form>
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

    <script type="text/javascript">
        // CLICK REMOVE
        $('.btn-area').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('.delete-modal').addClass('active');
            $('#cartId').val(id);
        })

        // SUBMIT DELETE
        $('#delete').on('submit', function(e) {
            e.preventDefault();
            var cart_id = $('#cartId').val();

            $.ajax({
                type: "POST",
                url: "delete-cart-item",
                data: {
                    'cart_id': cart_id,
                },
                success: function(response) {
                    if(response == 'success') {
                        location.reload();
                    }
                }
            })
        })

        // CLOSE MODAL
        $(document).on('click', '#modalClose', function () {
                $(".delete-modal").removeClass("active");
        })
    </script>
</body>

</html>