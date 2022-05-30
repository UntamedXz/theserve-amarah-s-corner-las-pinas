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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Admin Panel</title>
</head>

<body>
    <?php include 'top.php'; ?>
        <!-- MAIN -->
        <main>
            <h1 class="title">Dashboard</h1>
            <ul class="breadcrumbs">
                <li><a href="#" class="active">Home</a></li>
            </ul>
            <section class="dashboard">
                <div class="dashboard-wrapper">
                    Dashboard angas gagu
                </div>

                
            </section>
            <?php include 'bottom.php' ?>
</body>

</html>