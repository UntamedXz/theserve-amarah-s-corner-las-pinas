<?php
require_once './includes/database_conn.php';

if(isset($_POST['add-to-cart'])) {
    $product_id = $_POST['product_id'];
    $userEmail = $_POST['userEmail'];
    $qty = $_POST['qty'];
    $total = $_POST['total'];

    $getProduct = mysqli_query($conn, "SELECT * FROM product WHERE product_id = $product_id");
    $getCustomer = mysqli_query($conn, "SELECT * FROM customers WHERE email = '$userEmail'");

    while($row = mysqli_fetch_array($getProduct)) {
        $productId = $row['product_id'];
        $categoryId = $row['category_id'];
        $subcategoryId = $row['subcategory_id'];
    }

    while($rowC = mysqli_fetch_array($getCustomer)) {
        $userId = $rowC['user_id'];
    }

    $insertCart = mysqli_query($conn, "INSERT INTO cart (user_id, category_id, subcategory_id, product_id, product_qty, product_total) VALUES ('$userId', '$categoryId', '$subcategoryId', '$productId', '$qty', '$total')");

    if($insertCart) {
        echo 'success';
    }
}
?>