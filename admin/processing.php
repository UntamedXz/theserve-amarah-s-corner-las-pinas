<?php
session_start();
require_once '../includes/database_conn.php';

// LOGIN
if (isset($_POST['login'])) {
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = mysqli_escape_string($conn, $_POST['password']);

    if (empty($email) && empty($password)) {
        $_SESSION['status'] = "no input";
        header("Location: ./login");
    } else if (empty($email)) {
        $_SESSION['status'] = "no email";
        header("Location: login");
    } else if (empty($password)) {
        $_SESSION['admin_email'] = $_POST['email'];
        $_SESSION['status'] = "no password";
        header("Location: login");
    } else {
        $check = mysqli_query($conn, "SELECT * FROM admin WHERE admin_email = '$email'");

        if (mysqli_num_rows($check) == 0) {
            $_SESSION['status'] = "email not registered";
            $_SESSION['admin_email'] = $_POST['email'];
            header("Location: login");
        } else {
            $row = mysqli_fetch_array($check);

            if ($password == $row['admin_password']) {
                if (isset($_POST['rem']) == 'checked') {
                    setcookie('email', $row['admin_email'], time() + (86400 * 30), '/');
                    setcookie('password', $row['admin_password'], time() + (86400 * 30), '/');
                } else {
                    setcookie('email', '');
                    setcookie('password', '');
                }
                $_SESSION['adminloggedin'] = true;
                $_SESSION['userEmail'] = $email;
                header("Location: ./index");
            } else {
                $_SESSION['status'] = "wrong password";
                $_SESSION['admin_email'] = $_POST['email'];
                $_SESSION['userEmail'] = '';
                header("Location: login");
            }
        }
    }
}

// EDIT CATEGORY MODAL
if (isset($_REQUEST['category_id_edit'])) {
    $category_id = $_REQUEST['category_id_edit'];
    $get_category = mysqli_query($conn, "SELECT * FROM category WHERE category_id = '$category_id'");

    $result_array = array();
    while($result=mysqli_fetch_assoc($get_category)) {
        $result_array['category_id'] = $result['category_id'];
        $result_array['category_title'] = $result['category_title'];
        $result_array['category_thumbnail'] = $result['categoty_thumbnail'];
    }

    echo json_encode($result_array);
}

// VIEW CATEGORY MODAL
if (isset($_REQUEST['category_id_view'])) {
    $category_id = $_REQUEST['category_id_view'];
    $get_category = mysqli_query($conn, "SELECT category_title, categoty_thumbnail FROM category WHERE category_id = '$category_id'");

    $result_array = array();
    while($result=mysqli_fetch_assoc($get_category)) {
        $result_array['category_title'] = $result['category_title'];
        $result_array['category_thumbnail'] = $result['categoty_thumbnail'];
    }

    echo json_encode($result_array);
}

// EDIT SUB CATEGORY MODAL
if (isset($_REQUEST['subcategory_id_edit'])) {
    $subcategory_id = $_REQUEST['subcategory_id_edit'];
    $get_subcategory = mysqli_query($conn, "SELECT category.category_title, subcategory.subcategory_id, subcategory.subcategory_title
    FROM subcategory
    INNER JOIN category
    ON subcategory.category_id=category.category_id
    WHERE subcategory.subcategory_id = $subcategory_id");

    $result_array = array();
    while($result=mysqli_fetch_assoc($get_subcategory)) {
        $result_array['category_title'] = $result['category_title'];
        $result_array['subcategory_id'] = $result['subcategory_id'];
        $result_array['subcategory_title'] = $result['subcategory_title'];
    }

    echo json_encode($result_array);
}