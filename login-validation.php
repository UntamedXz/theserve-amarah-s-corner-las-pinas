<?php
session_start();
require_once './includes/database_conn.php';

// LOGIN
$loginEmail = mysqli_real_escape_string($conn, $_POST['loginEmail']);
$loginPass = mysqli_real_escape_string($conn, $_POST['loginPassword']);
$checkLoginEmail = mysqli_query($conn, "SELECT * FROM customers WHERE email = '$loginEmail'");

if (mysqli_num_rows($checkLoginEmail) == 0) {
    echo 'email not registered';
} else {
    $row = mysqli_fetch_array($checkLoginEmail);

    if ($loginPass == $row['password']) {
        if (isset($_POST['rem']) == 'checked') {
            setcookie('email', $row['email'], time() + (86400 * 30), '/');
            setcookie('password', $row['password'], time() + (86400 * 30), '/');
        } else {
            setcookie('email', '');
            setcookie('password', '');
        }
        $_SESSION['loggedin'] = true;
        $_SESSION['userEmail'] = $loginEmail;
        echo 'success';
    } else {
        echo 'wrong password';
    }
}
