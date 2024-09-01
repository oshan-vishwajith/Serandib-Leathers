<?php
include('../includes/connect.php');
include('../funtions/common.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Header.css">
    <link rel="stylesheet" type="text/css" href="create.css">
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
            <h1 class="title">Create Account</h1>

            <form method="post">
                <div class="form">
                    <label for="username">Username</label>
                    <input type="text" placeholder="Username" name="username" required>
                </div>
                <div class="form">
                    <label for="name">Name</label>
                    <input type="text" placeholder="Full name" name="name" required>
                </div>
                <div class="form">

                    <label for="email">Email</label>
                    <input type="email" placeholder="Email" name="email" required>
                </div>
                <div class="form">
                    <label for="contact">Mobile</label>
                    <input type="text" inputmode="numeric" pattern="\d*" placeholder="Mobile" name="contact" required>
                </div>
                <div class="form">

                    <label for="password">Password</label>
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <div class="form">

                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" placeholder="confirm password" name="confirm_password" required>
                </div>
                <button type="submit" name="user_register">create account</button>
            </form>
            <span class="login-link">
                <span class="pre-text">Already have an account? </span>
                <a href="user_login.php" class="action-link"><u>Login in here</u></a>
            </span>
            
        </div>
    </div>



    <script src="script.js"></script>
    <?php include('footer.php'); ?>

</body>

</html>

<?php

if (isset($_POST['user_register'])) {

    $ip = getIPAddress();
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];
    $contact = $_POST['contact'];

    $select_query = "select * from user where username='$username' or user_email='$email'";
    $result_select = mysqli_query($connection, $select_query);
    $num_row = mysqli_num_rows($result_select);

    $minLength = 8;
    $hasLowerCase = preg_match('/[a-z]/', $password);
    $hasUpperCase = preg_match('/[A-Z]/', $password);
    $hasNumber = preg_match('/\d/', $password);


    if ($num_row > 0) {
        echo "<script>alert('Username or Email already exists');</script>";
    } elseif ($password != $confirm_password) {
        echo "<script>alert('Passwords do not match');</script>";
    } elseif (strlen($password) < $minLength || !$hasLowerCase || !$hasUpperCase || !$hasNumber) {

        echo "<script>alert('invalid password');</script>";
    } else {

        $insert_query = "insert into user (username,name,user_email,user_password,user_ip,user_mobille) 
        values ('$username','$name','$email','$hash_password','$ip','$contact')";

        $result_query = mysqli_query($connection, $insert_query);
        if ($result_query) {
            echo "<script>window.open('user_login.php','_self')</script>";
        } else {
            die(mysqli_error($connection));
        }
    }
}
?>