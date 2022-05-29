<?php 
require_once '../includes/database_conn.php';

if(!empty($_POST['delete_product_id'])) {
    $deleteProductId = $_POST['delete_product_id'];

    $deleteProduct = mysqli_query($conn, "DELETE FROM product WHERE product_id = $deleteProductId");

    if($deleteProduct) {
        echo 'deleted';
    }
}