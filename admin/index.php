
<?php
include('../includes/connect.php');
include('../funtions/common.php');
session_start();

if (!isset($_SESSION['admin_username'])) {
    echo "<script>alert('Please Login')</script>";
    echo "<script>window.open('admin_login.php','_self')</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashbord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>

<body>

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid">
                <img src="../img/home.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">hello naji</a>
                        </li>
                    </ul>

                </nav>
            </div>
        </nav>

    </div>

    <h3 class="text-center p-2">Manage</h3>

    <div class="container-fluid bg-secondary">
        <div class="row  p-2 ">


            <button class="btn btn-primary col-md 1 m-2"><a href="insert_item.php" class="nav-link">Insert Item</a></button>
            <button class="btn btn-primary col-md 1 m-2"><a href="index.php?view_item" class="nav-link">View Item</a></button>
            <button class="btn btn-primary col-md 1 m-2"><a href="index.php?insert_category" class="nav-link">Insert Category</a></button>
            <button class="btn btn-primary col-md 1 m-2"><a href="index.php?view_category" class="nav-link">View Category</a></button>
            <button class="btn btn-primary col-md 1 m-2"><a href="index.php?insert_batch" class="nav-link">Insert Batch</a></button>
            <button class="btn btn-primary col-md 1 m-2"><a href="index.php?view_batch" class="nav-link">View Batch</a></button>
            <button class="btn btn-primary col-md 1 m-2"><a href="index.php?all_payment" class="nav-link">All Payments</a></button>
            <button class="btn btn-primary col-md 1 m-2"><a href="index.php?all_users" class="nav-link">All Users</a></button>
            <button class="btn btn-primary col-md 1 m-2"><a href="admin_logout.php" class="nav-link">Log Out</a></button>

        </div>
    </div>

    <div class="container">

    <?php  
        if (isset($_GET['insert_category'])) {
            include('insert_categories.php');
        }
        if (isset($_GET['insert_batch'])) {
            include('insert_batch.php');
        }
        if (isset($_GET['view_item'])) {
            include('view_item.php');
        }
        if (isset($_GET['view_category'])) {
            include('view_category.php');
        }
        if (isset($_GET['view_batch'])) {
            include('view_batch.php');
        }
        if (isset($_GET['all_payment'])) {
            include('all_payment.php');
        }

        if (isset($_GET['all_users'])) {
            include('all_users.php');
        }

        if (isset($_GET['update'])) {
            include('edit_item.php');
        
        }

        if (isset($_GET['update_batch'])) {
            include('edit_batch.php');
        
        }

        
        if (isset($_GET['update_category'])) {
            include('edit_category.php');
        
        }

        if (isset($_GET['delete'])) {
            $item_id=$_GET['delete'];
            $delete_color="delete from color where item_id=$item_id";
            $color_result = mysqli_query($connection, $delete_color);

            $delete_cart = "delete from cart_details where item_id=$item_id";
            $cart_result = mysqli_query($connection, $delete_cart);

            $delete_item="delete from item where item_id=$item_id";
            $item_result = mysqli_query($connection, $delete_item);

            echo "<script>alert('Successfully removed')</script>";
            echo "<script>window.open('index.php?view_item','_self')</script>";
        
        }

        if (isset($_GET['delete_category'])) {
            $category_id=$_GET['delete_category'];

            $delete_category="delete from categories where category_id=$category_id";
            $category_result = mysqli_query($connection, $delete_category);

            echo "<script>window.open('index.php?view_category','_self')</script>";
        
        }

        if (isset($_GET['delete_batch'])) {
            $batch_id=$_GET['delete_batch'];

            $delete_batch="delete from batch where batch_id=$batch_id";
            $batch_result = mysqli_query($connection, $delete_batch);

            echo "<script>window.open('index.php?view_batch','_self')</script>";
        
        }




    ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>