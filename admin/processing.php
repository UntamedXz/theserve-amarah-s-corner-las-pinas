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

// INSERT CATEGORY
if (isset($_POST['category'])) {
    $category_title = $_POST['category_title'];

    if (empty($category_title) && $_FILES['category_thumbnail']['error'] === 4) {
        $_SESSION['status'] = "empty field";
        echo '<script>
            window.location.replace("insert-category")
        </script>';
    } else if (empty($category_title)) {
        $_SESSION['status'] = "empty category title";
        echo '<script>
            window.location.replace("insert-category")
        </script>';
    } else if ($_FILES['category_thumbnail']['error'] === 4) {
        $_SESSION['status'] = "image does not exist";
        echo '<script>
            window.location.replace("insert-category")
        </script>';
    } else {
        $category_thumbnail_name = $_FILES['category_thumbnail']['name'];
        $category_thumbnail_size = $_FILES['category_thumbnail']['size'];
        $category_thumbnail_tmpname = $_FILES['category_thumbnail']['tmp_name'];

        $valid_img_ext = ['jpg', 'jpeg', 'png'];
        $img_ext = explode('.', $category_thumbnail_name);
        $img_ext = strtolower(end($img_ext));

        if (!in_array($img_ext, $valid_img_ext)) {
            $_SESSION['status'] = "invalid img ext";
            echo '<script>
                window.location.replace("insert-category")
            </script>';
        } else if ($category_thumbnail_size > 10485760) {
            $_SESSION['status'] = "too large";
            echo '<script>
                window.location.replace("insert-category")
            </script>';
        } else {
            $new_category_thumbnail_name = uniqid() . '-' . $category_thumbnail_name;

            move_uploaded_file($category_thumbnail_tmpname, '../assets/images/' . $new_category_thumbnail_name);

            $check = mysqli_query($conn, "SELECT * FROM category WHERE category_title = '$category_title'");

            if (mysqli_num_rows($check) > 0) {
                $_SESSION['status'] = "category title exist";
                echo '<script>
            window.location.replace("insert-category")
        </script>';
            } else {
                $insert_category = mysqli_query($conn, "INSERT INTO category VALUES ('', '$category_title', '$new_category_thumbnail_name')");

                if ($insert_category) {
                    $_SESSION['status'] = "Successfully added!";
                    echo '<script>
                    window.location.replace("insert-category")
                </script>';
                } else {
                    $_SESSION['status'] = "Something went wrong!";
                    echo '<script>
                    window.location.replace("insert-category")
                </script>';
                }
            }
        }
    }
}

// EDIT
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

// VIEW
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

// if($_FILES['update_category_thumbnail']['error'] === 4) {
//     echo 'all fields are required';
// }