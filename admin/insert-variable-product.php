<?php
session_start();
if (!isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin'] == false) {
    header("Location: ./login");
}
require_once '../includes/database_conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


    <!-- datatable lib -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700;800&family=Poppins:wght@200;300;400;500;600;700&display=swap">

    <link rel="stylesheet" href="../assets/css/admin.css">

    <style>
    .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody::-webkit-scrollbar {
        width: 0px;
    }

    .dataTables_wrapper .dataTables_info {
        color: #936500 !important;
    }

    .dataTables_filter {
        margin-bottom: 10px;
    }

    .dataTables_filter label {
        color: #ffaf08;
    }

    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #ffaf08;
        color: #ffaf08;
    }

    table.dataTable thead {
        border-radius: 5px !important;
    }

    table.dataTable thead tr {
        background-color: #ffaf08;
        color: #070506;
        white-space: nowrap;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 5px 10px;
        background-color: #ffaf08 !important;
        color: #070506 !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #070506 !important;
        border-color: #ffaf08;
        color: #ffaf08 !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
        background-color: #936500 !important;
        color: #070506 !important;
    }

    .dataTables_wrapper .dataTables_length select {
        color: #ffaf08 !important;
        border-color: #936500;
        background: #070506 !important;
    }

    .dataTables_wrapper .dataTables_length label {
        color: #936500 !important;
    }

    table thead tr th:first-child {
        border-top-left-radius: 5px !important;
    }

    table thead tr th:last-child {
        border-top-right-radius: 5px !important;
    }
    </style>
    <title>Admin Panel</title>
</head>

<body>
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

    <!-- DELETE -->
    <div id="popup-box" class="popup-box delete-modal">
        <div class="top">
            <h3>Edit Category</h3>
            <div id="modalClose" class="fa-solid fa-xmark"></div>
        </div>
        <hr>
        <form id="delete_category">
            <div style="display: none;" class="form-group">
                <span>Category ID</span>
                <input type="text" id="delete_category_id" name="delete_category_id" value="">
            </div>
            <p>Are you sure, you want to delete this category?</p>
        </form>
        <hr>
        <div class="bottom">
            <div class="buttons">
                <button id="modalClose" type="button" class="cancel">CLOSE</button>
                <button form="delete_category" id="deleteSubCategory" type="submit" class="save">DELETE</button>
            </div>

        </div>
    </div>

    <!-- VIEW -->
    <div id="popup-box" class="popup-box view-modal">
        <div class="top">
            <h3>Edit Category</h3>
            <div id="modalClose" class="fa-solid fa-xmark"></div>
        </div>
        <hr>
        <form enctype="multipart/form-data">
            <h5>Category: <span style="color: #ffaf08; padding-left: 5px;" id="category_title_view"></span></h5>
            <h5>Category Thumbnail: <br> <img id="category_thumbnail_view" style="width: 150px; margin-top: 5px;"
                    src=""></h5>
        </form>
        <hr>
        <div class="bottom">
            <div class="buttons">
                <button id="modalClose" type="button" class="cancel">CLOSE</button>
            </div>
        </div>
    </div>

    <!-- UPDATE -->
    <div id="popup-box" class="popup-box edit-modal">
        <div class="top">
            <h3>Edit Category</h3>
            <div id="modalClose" class="fa-solid fa-xmark"></div>
        </div>
        <hr>
        <form enctype="multipart/form-data" id="edit-category">
            <div style="display: none;" class="form-group">
                <span>Category ID</span>
                <input type="text" id="update_category_id" name="update_category_id" value="">
            </div>
            <div class="form-group">
                <span>Category Title</span>
                <input type="text" id="update_category_title" name="update_category_title" value="">
            </div>
            <div class="form-group">
                <span>Category Image Name:</span>
                <input style="background-color: #3b3b3b; color: #949494;" type="text" class="file"
                    name="category_thumbnailDB" id="category_thumbnailDB" readonly>
            </div>
            <div class="form-group">
                <span>Select Category Image</span>
                <input type="file" accept=".jpg, .jpeg, .png" class="file" name="update_category_thumbnail"
                    id="update_category_thumbnail">
            </div>
        </form>
        <hr>
        <div class="bottom">
            <div class="buttons">
                <button id="modalClose" type="button" class="cancel">CANCEL</button>
                <button form="edit-category" type="submit" id="update_category" name="update_category" class="save">SAVE
                    CHANGES</button>
            </div>
        </div>
    </div>

    <!-- INSERT -->
    <div id="popup-box" class="popup-box insert-modal">
        <div class="top">
            <h3>INSERT Category</h3>
            <div id="modalClose" class="fa-solid fa-xmark"></div>
        </div>
        <hr>
        <form enctype="multipart/form-data" id="insert-category">
            <div class="form-group">
                <span>Category Title</span>
                <input type="text" id="insert_category_title" name="insert_category_title" value="">
            </div>
            <div class="form-group">
                <span>Select Category Image</span>
                <input type="file" accept=".jpg, .jpeg, .png" class="file" name="insert_category_thumbnail"
                    id="insert_category_thumbnail">
            </div>
        </form>
        <hr>
        <div class="bottom">
            <div class="buttons">
                <button id="modalClose" type="button" class="cancel">CANCEL</button>
                <button form="insert-category" type="submit" id="insert_category_btn" name="insert_category_btn"
                    class="save">INSERT</button>
            </div>
        </div>
    </div>

    <?php include 'top.php';?>

    <!-- MAIN -->
    <main>
        <h1 class="title">Insert Variable Product</h1>
        <ul class="breadcrumbs">
            <li><a href="index">Home</a></li>
            <li class="divider">/</li>
            <li><a href="product">View Product</a></li>
            <li class="divider">/</li>
            <li><a href="insert-variable-product" class="active">Insert Variable Product</a></li>
        </ul>
        <section class="insert-product">
            <div class="insert-product-wrapper">
                <div class="form_container_variable">
                    <span class="product_tab">Product Tab</span>
                    <div class="tabs">
                        <button id="details_btn">PRODUCT DETAILS</button>
                        <button id="variant_btn">PRODUCT VARIANT</button>
                        <button id="variations_btn">PRODUCT VARIATIONS</button>
                    </div>
                    <form action="" id="details_tab">
                        <div class="form_group">
                            <span>Product Category</span>
                            <select name="category-list" id="category-list">
                                <option selected="selected" value="SELECT CATEGORY">SELECT CATEGORY</option>
                                <?php
$fetchCategory = mysqli_query($conn, "SELECT * FROM category");

foreach ($fetchCategory as $categoryRow) {
    ?>
                                <option value="<?php echo $categoryRow['category_id']; ?>">
                                    <?php echo $categoryRow['category_title']; ?></option>
                                <?php
}
?>
                            </select>
                            <span class="error error-category"></span>
                        </div>
                        <div class="form_group subcategory-group">
                            <span>Product Subcategory</span>
                            <select name="subcategory-list" id="subcategory-list">
                                <option selected="selected" value="SELECT SUBCATEGORY">SELECT SUBCATEGORY</option>
                            </select>
                            <span class="error error-subcategory"></span>
                        </div>
                        <div class="form_group">
                            <span>Product Title</span>
                            <input type="text" name="product_title" id="simpleProduct-title">
                            <span class="error error-title"></span>
                        </div>
                        <div class="form_group">
                            <span>Product Url</span>
                            <input type="text" name="product_url" id="simpleProduct-url" readonly>
                            <span class="error error-url"></span>
                        </div>
                        <div class="form_group">
                            <span>Product Price</span>
                            <input type="text" name="product_price" id="simpleProduct-price">
                            <span class="error error-price"></span>
                        </div>
                        <div class="form_group">
                            <span>Product Sale Price</span>
                            <input type="text" name="product_salePrice" id="simpleProduct-salePrice">
                            <span class="error error-salePrice"></span>
                        </div>
                        <div class="form_group">
                            <span>Product Image 1</span>
                            <input type="file" accept=".jpg, .jpeg, .png" name="product_image1"
                                id="simpleProduct-image1">
                            <span class="error error-image"></span>
                        </div>
                        <div class="form_group">
                            <span>Image Preview</span>
                            <img id="file" style="width: 100px;" src="">
                        </div>
                        <div class="form_group">
                            <span>Product Keyword</span>
                            <input type="text" name="product_keyword" id="simpleProduct-keyword">
                            <span class="error error-keyword"></span>
                        </div>
                        <button type="submit" id="details_insert">NEXT</button>
                    </form>

                    <form action="" id="variant_tab">
                        <div class="form_group">
                            <span>Select Variant</span>
                            <div class="variant">
                                <select name="" id="variant_list">
                                    <?php
$get_variant = mysqli_query($conn, "SELECT * FROM product_variant");

foreach ($get_variant as $row_variant) {
    ?>
                                    <option value="<?php echo $row_variant['variant_id']; ?>">
                                        <?php echo $row_variant['variant_title']; ?></option>
                                    <?php
}
?>
                                </select>
                                <button id="add_variant">ADD</button>
                            </div>
                        </div>
                        <hr>
                        <?php
$get_variant_field = mysqli_query($conn, "SELECT * FROM product_variant");

foreach ($get_variant_field as $row_variant_field) {
    ?>
                        <div class="group_form_group" data-group_form_group="<?php echo $row_variant_field['variant_id']; ?>">
                            <div class="form_group left">
                                <span>Name: </span>
                                <span><?php echo $row_variant_field['variant_title']; ?></span>
                            </div>
                            <div class="form_group right">
                                <span>Value(s): </span>
                                <input type="text" name="" id="" placeholder="Insert attributes separated by comma" class="attribute" data-attribute="<?php echo $row_variant_field['variant_id']; ?>">
                            </div>
                            <div class="form_group btn_variant">
                                <button data-remove="<?php echo $row_variant_field['variant_id']; ?>" id="remove_variant" class="remove_variant"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                        <?php
}
?>
<hr>
<button type="submit" id="variant_insert">NEXT</button>
                    </form>
                </div>
            </div>
        </section>

        <script>
        // DATA TABLES
        var dataTable = $('#example').DataTable({
            "processing": true,
            "serverSide": true,
            "paging": true,
            "pagingType": "simple",
            "scrollX": true,
            "sScrollXInner": "100%",
            "aLengthMenu": [
                [5, 10, 15, 100],
                [5, 10, 15, 100]
            ],
            "iDisplayLength": 5,
            "ajax": {
                url: "./functions/category-table",
                type: "post"
            }
        });

        var dataTables = $('#attrTbl').DataTable({
            "processing": true,
            "serverSide": true,
            "pagingType": "simple",
            "scrollX": true,
            "sScrollXInner": "100%",
            "paging": false,
            "ordering": false,
            "info": false,
            scrollY: "165px",
            "ajax": {
                url: "./functions/product-attributes-table",
                type: "post"
            }
        });
        </script>

        <script>
        // CATEGORY | SUBCATEGORY AJAX
        $(document).ready(function() {
            $("#category-list").change(function() {
                var category_id = $(this).val();
                $.ajax({
                    url: "./functions/get-subcategory",
                    type: "POST",
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        if (data === 'empty') {
                            $('.subcategory-group').hide();
                        } else {
                            $('.subcategory-group').show();
                            $('#subcategory-list').html(data);
                        }
                    }
                })
            });
        });

        $(window).on('load', function() {
            $('#variant_tab').css("display", "none");
        })

        // TAB
        $('#details_insert').on('click', function(e) {
            e.preventDefault();
            $('#details_btn').css("background-color", "#070506");
            $('#details_btn').css("color", "#ffaf08");
            $('#variant_btn').css("background-color", "#ffaf08");
            $('#variant_btn').css("color", "#070506");
            $('#details_tab').css("display", "none");
            $('#variant_tab').css("display", "flex");
        })

        $('#add_variant').on('click', function(e) {
            e.preventDefault();
            var selected_variant = $('#variant_list').find(":selected").val();
            var group_form_group =  $('*[data-group_form_group= '+ selected_variant +']');

            group_form_group.css("display", "flex");
        })

        $('.remove_variant').each(function() {
            $(this).on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('remove');
            var group_form_group =  $('*[data-group_form_group= '+ id +']');
            var attribute =  $('*[data-attribute= '+ id +']');

            group_form_group.css("display", "none");
            attribute.val('');

        })
        })
        </script>


        <?php include 'bottom.php'?>

</body>

</html>