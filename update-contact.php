<?php
require_once './includes/database_conn.php';

$user_id = $_POST['profile_details_id'];
$phone_num = mysqli_real_escape_string($conn, $_POST['phone_number']);
$email = mysqli_real_escape_string($conn, $_POST['contact-email']);

$updateContact = mysqli_query($conn, "UPDATE customers SET phone_number = '$phone_num', email = '$email' WHERE user_id = $user_id");

if($updateContact) {
    echo 'success';
}