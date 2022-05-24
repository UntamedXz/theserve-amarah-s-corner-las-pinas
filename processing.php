<?php
session_start();
require_once './includes/database_conn.php';

// LOGIN
if (isset($_POST['login'])) {
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = mysqli_escape_string($conn, $_POST['password']);

    if (empty($email) && empty($password)) {
        $_SESSION['status'] = "no input";
        header("Location: login");
    } else if (empty($email)) {
        $_SESSION['status'] = "no email";
        header("Location: login");
    } else if (empty($password)) {
        $_SESSION['status'] = "no password";
        header("Location: login");
    } else {
        $check = mysqli_query($conn, "SELECT * FROM customers WHERE email = '$email'");

        if (mysqli_num_rows($check) == 0) {
            $_SESSION['status'] = "email not registered";
            $_SESSION['email'] = $_POST['email'];
            header("Location: login");
        } else {
            $row = mysqli_fetch_array($check);

            if ($password == $row['password']) {
                if (isset($_POST['rem']) == 'checked') {
                    setcookie('email', $row['email'], time() + (86400 * 30), '/');
                    setcookie('password', $row['password'], time() + (86400 * 30), '/');
                } else {
                    setcookie('email', '');
                    setcookie('password', '');
                }
                $_SESSION['loggedin'] = true;
                $_SESSION['userEmail'] = $email;
                header("Location: cart");
            } else {
                $_SESSION['status'] = "wrong password";
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['userEmail'] = '';
                header("Location: login");
            }
        }
    }
}

// REGISTER
if (isset($_POST['register'])) {
    $username = mysqli_escape_string($conn, $_POST['username']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = mysqli_escape_string($conn, $_POST['password']);

    if (empty($username) && empty($email) && empty($password)) {
        $_SESSION['status'] = "no input";
        echo '<script>
    window.location.replace("register");
</script>';
    } else if (empty($username)) {
        $_SESSION['status'] = "no username";
        echo '<script>
    window.location.replace("register");
</script>';
    } else if (empty($email)) {
        $_SESSION['status'] = "no email";
        echo '<script>
    window.location.replace("register");
</script>';
    } else if (empty($password)) {
        $_SESSION['status'] = "no password";
        echo '<script>
    window.location.replace("register");
</script>';
    } else {
        $check = mysqli_query($conn, "SELECT * FROM customers WHERE email = '$email'");

        if (mysqli_num_rows($check) > 0) {
            $_SESSION['status'] = "Email already exist!";
            echo '<script>
    window.location.replace("register");
</script>';
        } else {
            $insert = mysqli_query($conn, "INSERT INTO customers VALUES ('', '$username', '$email', '$password')");
            if ($insert) {
                $_SESSION['status'] = "Registered Successfully!";
                echo '<script>
    window.location.replace("register");
</script>';
            } else {
                $_SESSION['status'] = "Something went wrong!";
                echo '<script>
    window.location.replace("register");
</script>';
            }
        }
    }
}
