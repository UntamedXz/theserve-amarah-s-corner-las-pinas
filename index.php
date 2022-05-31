<?php
require_once './includes/database_conn.php';
session_start();
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
    <script>
        (function(w, d) {
            w.CollectId = "628c48cbfaa7943a0bbb67f1";
            var h = d.head || d.getElementsByTagName("head")[0];
            var s = d.createElement("script");
            s.setAttribute("type", "text/javascript");
            s.async = true;
            s.setAttribute("src", "https://collectcdn.com/launcher.js");
            h.appendChild(s);
        })(window, document);
    </script>

    <style>
        /*FOOTER*/
        footer {
            background: black;
            width: 100%;
            bottom: 0;
            align-items: center;
            justify-content: center;
        }

        footer::before {
            content: '';
            left: 0;
            top: 100px;
            height: 1px;
            width: 100%;
            background: #AFAFB6;
            align-items: center;
        }

        footer .content {
            max-width: 1250px;
            margin: auto;
            padding: 30px 40px 40px 40px;
            align-items: center;

        }

        footer .content .top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 50px;
        }

        .content .top .logo-details {
            color: #fff;
            font-size: 20px;
        }

        .content .top .media-icons {
            display: flex;
        }

        .content .top .media-icons a {
            height: 30px;
            width: 30px;
            margin: 0 8px;
            border-radius: 50%;
            text-align: center;
            line-height: 30px;
            color: #fff;
            font-size: 17px;
            text-decoration: none;
            transition: all 0.4s ease;
            align-items: center;
        }

        .top .media-icons a:nth-child(1) {
            background: #4267B2;
        }

        .top .media-icons a:nth-child(1):hover {
            color: #4267B2;
            background: #fff;
        }

        .top .media-icons a:nth-child(2) {
            background: #1DA1F2;
        }

        .top .media-icons a:nth-child(2):hover {
            color: #1DA1F2;
            background: #fff;
        }

        .top .media-icons a:nth-child(3) {
            background: #E1306C;
        }

        .top .media-icons a:nth-child(3):hover {
            color: #E1306C;
            background: #fff;
        }

        .top .media-icons a:nth-child(4) {
            background: #0077B5;
        }

        .top .media-icons a:nth-child(4):hover {
            color: #0077B5;
            background: #fff;
        }

        .top .media-icons a:nth-child(5) {
            background: #FF0000;
        }

        .top .media-icons a:nth-child(5):hover {
            color: #FF0000;
            background: #fff;
        }

        footer .bottom-details {
            width: 100%;
            background: black;
        }

        footer .bottom-details .bottom_text {
            max-width: 1250px;
            margin: auto;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
        }

        .bottom-details .bottom_text span,
        .bottom-details .bottom_text a {
            font-size: 10px;
            font-weight: 200;
            color: #fff;
            opacity: 0.8;
            text-decoration: none;
        }

        .bottom-details .bottom_text a:hover {
            opacity: 1;
            text-decoration: underline;
        }

        .bottom-details .bottom_text a {
            margin-right: 10px;
        }

        @media (max-width: 900px) {
            footer .content .link-boxes {
                flex-wrap: wrap;
            }

            footer .content .link-boxes .input-box {
                width: 30%;
                margin-top: 2px;
            }
        }

        @media (max-width: 700px) {
            footer {
                position: relative;
            }

            .content .top .logo-details {
                font-size: 26px;
            }

            .content .top .media-icons a {
                height: 25px;
                width: 25px;
                font-size: 14px;
                line-height: 25px;
            }

            footer .content .link-boxes .box {
                width: calc(100% / 5 - 10px);
            }

            footer .content .link-boxes .input-box {
                width: 30%;
            }

            .bottom-details .bottom_text span,
            .bottom-details .bottom_text a {
                font-size: 12px;
            }
        }

        @media (max-width: 520px) {
            footer::before {
                top: 145px;
            }

            footer .content .top {
                flex-direction: column;
            }

            .content .top .media-icons {
                margin-top: 8px;
            }

            footer .content .link-boxes .box {
                width: calc(100% / 5 - 10px);
            }

            footer .content .link-boxes .input-box {
                width: 100%;
            }

        }
    </style>
</head>

<body>
    <div id="preloader"></div>

    <?php include './includes/navbar.php';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo "
        <script type='text/javascript'>
            window.onload = (event) => {
                document.querySelector('.header .header-1 .left .profile').style.display = 'flex';

                document.querySelector('.header .header-1 .left .loginBtn').style.display = 'none';
            }
        </script>
        ";
    }
    ?>

    <!-- BANNER SECTION -->
    <section class="banner" id="home">
        <img src="./assets/images/banner.jpg" alt="">
    </section>
    <!-- BRANCH NAME SECTION -->
    <section class="branch">
        <h1 class="branch">Amarah's Corner - BF Resort Las Piñas Branch</h1>
        <h5 class="desc">We aim to be one of the most competitive Pizza Place nationwide. By Serving one of the best
            pizza that will satisfy your cravings.</h5>
    </section>
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
                                <img src="./assets/images/<?php echo $category_row['categoty_thumbnail']; ?>" alt="">
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
    <!-- UPDATES SECTION -->
    <section class="updates" id="updates">
        <h3 class="title-header">Updates</h3>
        <div class="row">
            <!-- UPDATE 1 -->
            <div class="col">
                <div class="image-cont">
                    <img src="./assets/images/2021-12-29.jpg" alt="">
                </div>
                <h4>Posted on Dec 29, 2021</h4>
                <h5>Let's continue the festivities with family and friends! Because food is more enjoyable when shared!
                    🤗 Tara na sa Amarah and enjoy our menu -- pizza, pasta, wings, milktea, fruit tea and frappe! See
                    youuuu, Katambay! 🤗💛</h5>
            </div>
            <!-- UPDATE 2 -->
            <div class="col">
                <div class="image-cont">
                    <img src="./assets/images/2021-12-28.jpg" alt="">
                </div>
                <h4>Posted on Dec 28, 2021</h4>
                <h5>Merry Christmas, Katambay!<3 </h5>
            </div> <!-- UPDATE 3 -->
            <div class="col">
                <div class="image-cont">
                    <img src="./assets/images/2021-12-21.jpg" alt="">
                </div>
                <h4>Posted on Dec 21, 2021</h4>
                <h5>Jumpstart your day with Amarah's ALL-DAY BREAKFAST MEALS! Calling all SILOG lovers out
                    there! Namnamin ang sarap ng almusal anytime of the day! 🤗 Tara na sa Amarahs,
                    Katambay! 💛 <br> #amarahscorner <br> #amarahscornerph <br> #katambay<3 </h5>
            </div>
        </div>
        <div id="load-more">
            <input type="submit" class="load-more" value="LOAD MORE">
        </div>
    </section>
    <!-- FEEDBACK SECTION -->
    <section class="feedbacks" id="feedbacks">
        <h3 class="title-header">FEEDBACKS</h3>
        <div class="feedbacks__cont">
            <!-- FEEDBACK 1 -->
            <div class="feedbacks__card">
                <div class="feedbacks__top">
                    <div class="feedbacks__user-profile">
                        <div class="feedbacks__user-profile__image">
                            <img class="img" src="./assets/images/B612_20220322_202642_720-min.jpg">
                        </div>
                        <div class="feedbacks__name-user">
                            <h4>Jennifer Sabado</h4>
                            <h5>@jennifer.sabado</h5>
                        </div>
                    </div>

                    <div class="feedbacks__rate">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
                <div class="feedbacks__comments">
                    <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates quos error reiciendis
                        pariatur
                        voluptate eos, mollitia sit explicabo corrupti dolores, fugiat saepe ad nulla ut!</h5>
                </div>
            </div>
            <!-- FEEDBACK 2 -->
            <div class="feedbacks__card">
                <div class="feedbacks__top">
                    <div class="feedbacks__user-profile">
                        <div class="feedbacks__user-profile__image">
                            <img class="img" src="./assets/images/Kaye.jpg">
                        </div>
                        <div class="feedbacks__name-user">
                            <h4>Kaye Billones</h4>
                            <h5>@kaye.billones</h5>
                        </div>
                    </div>

                    <div class="feedbacks__rate">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
                <div class="feedbacks__comments">
                    <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates quos error reiciendis
                        pariatur
                        voluptate eos, mollitia sit explicabo corrupti dolores, fugiat saepe ad nulla ut!</h5>
                </div>
            </div>
            <!-- FEEDBACK 3 -->
            <div class="feedbacks__card">
                <div class="feedbacks__top">
                    <div class="feedbacks__user-profile">
                        <div class="feedbacks__user-profile__image">
                            <img class="img" src="./assets/images/Mark.jpg">
                        </div>
                        <div class="feedbacks__name-user">
                            <h4>Mark Ryan Jancorda</strong>
                                <h5>@markryan.jancorda</h5>
                        </div>
                    </div>

                    <div class="feedbacks__rate">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
                <div class="feedbacks__comments">
                    <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates quos error reiciendis
                        pariatur
                        voluptate eos, mollitia sit explicabo corrupti dolores, fugiat saepe ad nulla ut!</h5>
                </div>
            </div>
            <!-- FEEDBACK 4 -->
            <div class="feedbacks__card">
                <div class="feedbacks__top">
                    <div class="feedbacks__user-profile">
                        <div class="feedbacks__user-profile__image">
                            <img class="img" src="./assets/images/Jovy.jpg">
                        </div>
                        <div class="feedbacks__name-user">
                            <h4>Jovelyn Ocampo</strong>
                                <h5>@jovelyn.ocampo</h5>
                        </div>
                    </div>

                    <div class="feedbacks__rate">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
                <div class="feedbacks__comments">
                    <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates quos error reiciendis
                        pariatur
                        voluptate eos, mollitia sit explicabo corrupti dolores, fugiat saepe ad nulla ut!</h5>
                </div>
            </div>
        </div>
        <div id="load-more-feedbacks">
            <input type="submit" class="load-more-feedbacks" value="LOAD MORE">
        </div>
    </section>
    <?php include './includes/footer.php';?>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js">
    </script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js">
    </script>
    <script src="./assets/js/script.js"></script>
    <script>
        var loader = document.getElementById("preloader");

        window.addEventListener("load", function() {
            loader.style.display = "none";
        })
    </script>
</body>

</html>