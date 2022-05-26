<?php 
require_once '../includes/database_conn.php';

if(!empty($_POST['delete_category_id'])) {
    $deleteCategoryId = $_POST['delete_category_id'];

    $deleteCategory = mysqli_query($conn, "DELETE FROM category WHERE category_id = $deleteCategoryId");

    if($deleteCategory) {
        echo 'deleted';
    }
}