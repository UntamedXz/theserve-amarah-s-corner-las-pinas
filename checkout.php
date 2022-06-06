<?php
session_start();
require_once './includes/database_conn.php';
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
    header("Location: ./login");
}

$user_id = $_SESSION['id'];

$getAccountInfo = mysqli_query($conn, "SELECT * FROM customers WHERE user_id = '$user_id'");

while ($row = mysqli_fetch_array($getAccountInfo)) {
    $userId = $row['user_id'];
    $userProfileIcon = $row['user_profile_image'];
}

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    $getAccountInfo = mysqli_query($conn, "SELECT * FROM customers WHERE user_id = '$user_id'");
    $row = mysqli_fetch_array($getAccountInfo);
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

    <?php include './includes/navbar.php';?>
    <input type="hidden" name="" id="cartCount" value="<?php echo $cartCount; ?>">

    <input type="hidden" id="profileIconCheck" value="<?php echo $userProfileIcon; ?>">

    <script>
        $(window).on('load', function () {
            if ($('#profileIconCheck').val() == '') {
                $('#profileIcon').attr("src", "./assets/images/no_profile_pic.png");
            } else {
                $('#profileIcon').attr("src", "./assets/images/" + $('#profileIconCheck').val());
            }
        })
    </script>

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

    <section class="checkout">
        <div class="checkout_wrapper">
            <div class="left_checkout_wrapper">
                <form action="">
                    <h1>Checkout</h1>
                    <?php
$get_info = mysqli_query($conn, "SELECT * FROM customers WHERE user_id = $user_id");

foreach ($get_info as $info) {
    ?>
                    <span>Personal Information</span>
                    <div class="group_form_group">
                        <div class="form_group left">
                            <span>Fullname</span>
                            <input class="default" type="text" name="" id="" placeholder="Input fullname"
                                value="<?php echo $info['name'] ?>" readonly>
                        </div>
                        <div class="form_group right">
                            <span>Phone Number</span>
                            <input class="default" type="text" name="" id="" placeholder="Input phone number" readonly
                                value="<?php echo $info['phone_number'] ?>">
                        </div>
                    </div>
                    <div class="form_group">
                        <span>Email Address</span>
                        <input class="default" type="text" name="" id="" placeholder="Input email address" readonly
                            value="<?php echo $info['email'] ?>">
                    </div>
                    <?php
}
?>
                    <div class="form_group">
                        <span>Complete Address</span>
                        <input type="text" name="" id="" placeholder="Input complete address">
                    </div>
                    <div class="group_form_group">
                        <div class="form_group">
                            <span>Zip Code</span>
                            <input type="text" name="" id="" placeholder="4102">
                        </div>
                        <div class="form_group">
                            <span>Landmark</span>
                            <input type="text" name="" id="" placeholder="Near at 7/11">
                        </div>
                    </div>
                    <!-- <div class="radio_group">
                        <div class="delivery">
                            <span>Mode of Delivery</span>
                            <br>
                            <input type="radio" id="pick-up" name="deliver" value="PICK-UP">
                            <label for="pick-up">PICK UP</label>
                            <br>
                            <input type="radio" id="lalamove" name="deliver" value="lalamove">
                            <label for="bf-area">DELIVERY VIA LALAMOVE</label>
                            <br>
                            <input type="radio" id="bf-area" name="deliver" value="bf-area">
                            <label for="bf-area">DELIVERY WITHIN BF</label>
                        </div>
                        <div class="payment_group">
                            <span>Mode of Payment</span>
                            <br>
                            <input type="radio" id="gcash" name="payment" value="GCASH">
                            <label for="gcash">GCASH</label>
                            <br>
                            <input type="radio" id="COD" name="payment" value="COD">
                            <label for="gcash">COD</label>
                        </div>
                    </div> -->

                    <div class="payment-wrapper">
                        <span>Mode of Payment</span>
                        <div class="option_wrapper">
                            <input type="radio" name="payment" id="option-1" checked>
                            <input type="radio" name="payment" id="option-2">
                            <label for="option-1" class="option option-1">
                                <div class="box"></div>
                                <span>Cash on Delivery</span>
                            </label>
                            <label for="option-2" class="option option-2">
                                <div class="box"></div>
                                <span>Gcash</span>
                            </label>
                        </div>
                    </div>

                    <div class="payment-wrapper">
                        <span>Mode of Delivery</span>
                        <div class="option_wrapper">
                            <input type="radio" name="deliver" value="Pick Up" class="deliver" id="option-1-d" checked>
                            <input type="radio" name="deliver" value="Delivery via Lalamove" class="deliver"
                                id="option-2-d">
                            <input type="radio" name="deliver" value="Delivery within BF" class="deliver"
                                id="option-3-d">
                            <label for="option-1-d" class="option option-1">
                                <div class="box"></div>
                                <span>Pick Up</span>
                            </label>
                            <label for="option-2-d" class="option option-2">
                                <div class="box"></div>
                                <span>Delivery via Lalamove</span>
                            </label>
                            <label for="option-3-d" class="option option-3">
                                <div class="box"></div>
                                <span>Delivery within BF</span>
                            </label>
                        </div>
                        <span class="error-deliver" style="color: #dc3545;"></span>
                    </div>

                    <button>COMPLETE PURCHASE</button>
                </form>
            </div>
            <div class="right_checkout_wrapper">
                <span class="order_title">YOUR ORDER</span>
                <hr>
                <?php
$get_cart = mysqli_query($conn, "SELECT product.product_title, subcategory.subcategory_title, cart.product_total, product_qty
                FROM cart
                INNER JOIN product
                ON cart.product_id = product.product_id
                INNER JOIN subcategory
                ON cart.subcategory_id = subcategory.subcategory_id
                WHERE user_id = $user_id");

foreach ($get_cart as $cart) {
    ?>
                <div class="form_group">
                    <div class="span_group">
                        <span><?php echo $cart['product_title']; ?></span>
                        <span class="sub_category"><?php echo $cart['subcategory_title']; ?></span>
                        <span class="qty">x<?php echo $cart['product_qty']; ?></span>
                    </div>
                    <div class="total_span">
                        <span>P</span><span class="total_per_item"><?php echo $cart['product_total']; ?></span>
                    </div>
                </div>
                <?php
}
?>
                <hr>
                <div class="form_group">
                    <span>Total Purchases</span>
                    <div class="total_span">
                        <span>P</span><span class="total_purchases get_total">199.00</span>
                    </div>
                </div>
                <div class="form_group">
                    <span>Shipping Fee</span>
                    <div class="total_span">
                        <span>P</span><span class="shipping_fee get_total">199.00</span>
                    </div>
                </div>
                <hr>
                <div class="form_group">
                    <span>Total</span>
                    <div class="total_span total_bold">
                        <span class="total_bold">P</span><span class="total_bold overall_total">0.00</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include './includes/cart-count.php'?>
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
        // GET TOTAL
        $(window).on('load', function () {

            var delivery_opt = $('input[name=deliver]:checked').val();

            if (delivery_opt == "Delivery via Lalamove") {
                $('.shipping_fee').text(parseFloat(200).toFixed(2));
            } else if (delivery_opt == "Pick Up") {
                $('.shipping_fee').text(parseFloat(0).toFixed(2));
            }

            var overall_total = 0;
            $('.total_per_item').each(function () {
                var subtotal = parseFloat($(this).text());
                overall_total += subtotal;
            })

            $('.total_purchases').text(parseFloat(overall_total).toFixed(2));

            var total_purchases = $('.total_purchases').text();
            var shipping_fee = $('.shipping_fee').text();
            var sum = parseFloat(total_purchases) + parseFloat(shipping_fee);

            $('.overall_total').text(parseFloat(sum).toFixed(2));
        })

        $('.deliver').on('change', function () {
            var delivery_opt = $('input[name=deliver]:checked').val();

            if (delivery_opt == "Delivery via Lalamove") {
                $('.shipping_fee').text(parseFloat(200).toFixed(2));
            } else if (delivery_opt == "Pick Up") {
                $('.shipping_fee').text(parseFloat(0).toFixed(2));
            }

            var total_purchases = $('.total_purchases').text();
            var shipping_fee = $('.shipping_fee').text();
            var sum = parseFloat(total_purchases) + parseFloat(shipping_fee);

            $('.overall_total').text(parseFloat(sum).toFixed(2));
        })
    </script>
</body>

</html>