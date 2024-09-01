<?php
include('../includes/connect.php');
include('../funtions/common.php');

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Header.css">
    <link rel="stylesheet" type="text/css" href="login.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body style="background-color: #E5E4E2;">
    <section id='header'>
        <?php


        echo " 
    <a href='../index.php'><img src='logo.png' alt='' class='logo'></a>
    <a class='navbar-brand' href='#'></a>
    <div>
        <ul id='navbar'>
            <li class='aa'><a href='../index.php'>Home</a></li>
            <li class='dropdown'>
                <a class='dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Shop</a>
                <ul class='dropdown-menu'>";

        $select_category = 'select * from categories';
        $result_category = mysqli_query($connection, $select_category);
        while ($row_data = mysqli_fetch_assoc($result_category)) {
            $category_title = $row_data['category_title'];
            $category_id = $row_data['category_id'];

            if ($category_id != 3) {

                echo "<li class='dropend'>
                <a class='dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>$category_title</a>
                <ul class='dropdown-menu'>";

                $select_batch = 'select * from batch';
                $result_batch = mysqli_query($connection, $select_batch);
                while ($row_data = mysqli_fetch_assoc($result_batch)) {
                    $batch_title = $row_data['batch_title'];
                    $batch_id = $row_data['batch_id'];
                    echo "<li><a class='dropdown-item' href='../{$category_title}_{$batch_title}.php'>$batch_title</a></li>
            <li>
                <hr class='dropdown-divider' />
            </li>";
                }

                echo "     </ul>
                    </li>
                         <li>
                    <hr class='dropdown-divider' />
                </li>";
            }
        }



        echo "   <li class=''>
<a href='../other.php' >Other</a>

                    </li>
                </ul>
            </li>
      <li class='bb'><a href='../New_arrival.php'>New Arrivals</a></li>
            <li class='mx-1 cc'><a href='../Best_seller.php'>Best Sellers</a></li>";



        if (isset($_GET['active'])) {

            if (!isset($_SESSION['username'])) {

                header('Location: ./user_area/user_login.php');
                exit();
            } else {

                header('Location: cart.php');
                exit();
            }
        }



        ?>
    </section>

    <div class="container-fluid">

        <div class="registration">
            <h1 class="title">Login</h1>

            <form method="post">
                <div class="form">
                    <label for="name">Username</label>
                    <input type="text" placeholder="Username" name="username" required>
                </div>
                <div class="form">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <div class="fogot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forgot Password</a>
                </div>

                <button type="submit" name="user_login">Login</button>
            </form>
            <br>
            <span class="login-link">
            <a href="../admin/admin_login.php" class="adminlogin">Admin Login</a><br>
                <span class="pre-text">Don't have an account? </span>
                <a href="user_registation.php" class="action-link"><u>Create Account</u></a>
            </span>
        </div>

    </div>
    <?php include('footer.php'); ?>

</body>

</html>



<?php

if (isset($_POST['user_login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $select_query = "select * from user where username='$username'";
    $result_select = mysqli_query($connection, $select_query);
    $row_data = mysqli_fetch_assoc($result_select);
    $num_row = mysqli_num_rows($result_select);
    $user_id = $row_data['user_id'];

    $ip = $row_data['user_ip'];

    $select_query_item = "select * from cart_details where ip_address='$ip'";
    $result_select_item = mysqli_query($connection, $select_query_item);

    $num_row_item = mysqli_num_rows($result_select_item);



    if ($num_row > 0) {

        if (password_verify($password, $row_data['user_password'])) {

            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user_id;

            if ($num_row_item == 0) {
                echo "<script>window.open('profile.php?edit_profile','_self')</script>";
            } else {
                echo "<script>window.open('../cart.php','_self')</script>";
            }
        } else {
            echo "<script>alert('invalid username or pasword')</script>";
        }
    } else {

        echo "<script>alert('invalid username or password')</script>";
        echo "<script>window.open('user_login.php','_self')</script>";
    }
}
