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
    <link rel="stylesheet" href="../Header.css">
    <link rel="stylesheet" type="text/css" href="login.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>


    <div class="container">
        <div class="registration">
            <h1 class="title">Admin-Login</h1>

            <br>
            <br>

            <form method="post">
                <div class="form">
                    <span class="icon">
                        <ion-icon name="mail-outline"></ion-icon>
                    </span>
                    <input type="text" placeholder="naji" name="username" required>
                </div>
                <div class="form">
                    <span class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="password" placeholder="1234" name="password" required>
                </div>

                <button type="submit" name="admin_login">Log In</button>
            </form>
            <span class="login-link">
                <a href="../user_area/user_login.php" class="action-link">User Login?</a>
            </span>
        </div>
    </div>



</body>

</html>



<?php

if (isset($_POST['admin_login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $select_query = "select * from admin where admin_username='$username'";
    $result_select = mysqli_query($connection, $select_query);
    $row_data = mysqli_fetch_assoc($result_select);
    $num_row = mysqli_num_rows($result_select);



    if ($num_row > 0) {
        $_SESSION['admin_username'] = $username;


        if ($password==$row_data['admin_password']) {

            $_SESSION['admin_username'] = $username;
            
                echo "<script>window.open('index.php','_self')</script>";
         
        } else {
            echo "<script>alert('invalid pasword')</script>";
        }
    } else {

        echo "<script>alert('invalid username or password')</script>";
        echo "<script>window.open('admin_login.php','_self')</script>";
    }
}
