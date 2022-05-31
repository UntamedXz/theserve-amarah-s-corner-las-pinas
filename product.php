<?php
require_once "./includes/database_conn.php";

$id = $_GET['link'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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

    <?php include './includes/navbar.php'; ?>

    <!-- MENU SECTION -->
    <section class="menu" id="menu">
        <h3 class="title-header">Menu</h3>
        <div class="menu__container">
            <div class="menu__wrapper swiper mySwiper">
                <div class="menu__content swiper-wrapper">
                    <?php
                    $get_category = mysqli_query($conn, "SELECT * FROM category");

                    foreach ($get_category as $category_row) {
                        $encryptedCategoryId = urlencode(base64_encode($category_row['category_id']));
                    ?>
                        <a href="catalog?id=<?php echo $encryptedCategoryId; ?>" class="menu__card swiper-slide">
                            <div class="menu__image">
                                <img src="./assets/images/<?php echo $category_row['categoty_thumbnail']; ?>">
                            </div>
                            <div class="menu__name">
                                <h3><?php echo ucwords($category_row['category_title']); ?></h3>
                            </div>
                        </a>
                    <?php
                    }
                    ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    <?php
    $getProduct = mysqli_query($conn, "SELECT * FROM product WHERE product_slug = '$id'");

    foreach($getProduct as $row) {
    ?>
    <section class="product-details">
        <div class="product-details__wrapper">
            <div class="left">
                <div class="img-container">
                    <img src="./assets/images/<?php echo $row['product_img1']; ?>" alt="">
                </div>
                <div class="product-details">
                    <h1 class="product-title">
                        <?php echo $row['product_title']; ?>
                    </h1>
                    <span class="price"><small>Starts at </small> <b>P<?php echo $row['product_price']; ?></b></span>
                    <!-- <span class="desc">
                        Ham with Mozarella and Special Cheese
                    </span> -->
                </div>
            </div>
            <div class="right">
                <div class="form-group">
                    <span>Special Instructions (Optional)</span>
                    <input type="text" name="" id="">
                </div>
            </div>
        </div>
    </section>
    <?php
    }
    ?>

    <div class="product-footer">
        <div class="product-footer__wrapper">
            <div class="qty-container">
                <div class="prev">-</div>
                <div class="next">+</div>
                <input class="number-spinner" type="number" name="" id="" value="1">
            </div>
            <div class="total-box">
                <div class="total">
                    <span class="totalText">Total</span>
                    <span class="totalPrice">P125.00</span>
                </div>
                <div class="btn-container">
                    <button type="submit">ADD TO CART</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.prev').on('click', function() {
                var prev = $(this).closest('.qty-container').find('input').val();

                if (prev == 1) {
                    $(this).closest('.qty-container').find('input').val('1');
                } else {
                    var prevVal = prev - 1;
                    $(this).closest('.qty-container').find('input').val(prevVal);
                }
            });

            $('.next').on('click', function() {
                var next = $(this).closest('.qty-container').find('input').val();

                if (next == 100) {
                    $(this).closest('.qty-container').find('input').val('100');
                } else {
                    var nextVal = ++next;
                    $(this).closest('.qty-container').find('input').val(nextVal);
                }
            });
        })
    </script>

    <!-- TOTAL -->
    <script>
        $(document).ready(function() {
            $('.next').on('click', function() {
                
            });
        });
    </script>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 'auto',
            spaceBetween: 15,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

    <script>
        var loader = document.getElementById("preloader");

        window.addEventListener("load", function() {
            loader.style.display = "none";
        })
    </script>
</body>

</html>