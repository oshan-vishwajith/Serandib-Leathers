<?php
include('includes/connect.php');
include('funtions/common.php');
session_start();

$ip = getIPAddress();
    $select_query = "select * from cart_details where ip_address='$ip'";
    $result_query = mysqli_query($connection, $select_query);
    $num_row = mysqli_num_rows($result_query);
    if ($num_row==0) {
        echo "<script>alert('Cart Is empty')</script>";
       echo "<script>window.open('index.php','_self')</script>";
    }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./Header.css">

</head>

<body style="background-color: #E5E4E2;">
    <div class="container-fluid">

<?php 

echo " <section id='header'>
            <a href='index.php'><img src='logo.png' alt='' class='logo'></a>
            <a class='navbar-brand' href='#'></a>
            <div>
                <ul id='navbar'>
                    <li class='aa'><a href='index.php'>Home</a></li>
                    <li class='dropdown'>
                        <a class='dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Shop</a>
                        <ul class='dropdown-menu'>";

    $select_category = 'select * from categories';
    $result_category = mysqli_query($connection, $select_category);
    while ($row_data = mysqli_fetch_assoc($result_category)) {

        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];

        if ($category_id != 3) {

            echo "<li class='dropend '>
            <a class='dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>$category_title</a>
            <ul class='dropdown-menu'>";

            $select_batch = 'select * from batch';
            $result_batch = mysqli_query($connection, $select_batch);
            while ($row_data = mysqli_fetch_assoc($result_batch)) {
                $batch_title = $row_data['batch_title'];
                $batch_id = $row_data['batch_id'];
                echo "<li><a class='dropdown-item' href='{$category_title}_{$batch_title}.php'>$batch_title</a></li>
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



    echo "   <li class='other'>
                                <a href='other.php' >Other</a>

                            </li>
                        </ul>
                    </li>
                    <li class='bb'><a href='New_arrival.php'>New Arrivals</a></li>
                    <li class='cc'><a href='Best_seller.php'>Best Sellers</a></li>";

    if (!isset($_SESSION['username'])) {
        echo "<li class='p-0 ms-2 dd' ><a href='./user_area/user_registation.php'>Create</a></li>
                    <li class='p-0 me-3 ee'><a href='./user_area/user_login.php'>/LogIn</a></li>
                ";
        echo "
                    <form class='d-flex search-wrapper' role='search'>
                        <input type='search' name='searchitem' id='searchitem' class='form-control' placeholder='Search' aria-label='Search'>
                        <div id='searchlist'></div>
                    </form>

                                </ul>
            </div>

                    </section>";
    } else {


        echo "
                    <form class='d-flex search-wrapper ' role='search'>
                        <input type='search' name='searchitem' id='searchitem' class='form-control' placeholder='Search' aria-label='Search'>
                        <div id='searchlist'></div>
                    </form>
                <li class=' gg mx-1'><a href='user_area/profile.php?orders'><i class='fa-regular fa-user'></i></a></li>
                                      <div class='toggle-btn'>

             </ul>
            </div>

        </section>
        ";
    }


    if (isset($_GET['active'])) {

        if (!isset($_SESSION['username'])) {


            echo "<script>window.open('./user_area/user_login.php','_self')</script>";
        } else {

            echo "<script>window.open('cart.php','_self')</script>";
        }
    }







?>

    



      

        <div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container border rounded p-3" style="width: 1000px; background-color: #f8f9fa;">
        <?php
        $ip = getIPAddress();
        $select_query = "SELECT * FROM cart_details WHERE ip_address='$ip'";
        $result_query = mysqli_query($connection, $select_query);
        $num_row = mysqli_num_rows($result_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            $item_id = $row['item_id'];
            $select_item = "SELECT * FROM item WHERE item_id=$item_id";
            $item_result = mysqli_query($connection, $select_item);
            while ($data = mysqli_fetch_assoc($item_result)) {
                $item_title = $data['item_title'];
                $item_description = $data['item_description'];
                $category_id = $data['category_id'];
                $batch_id = $data['batch_id'];
                $item_price = $data['item_price'];
                $item_image1 = $data['item_image1'];

    
                echo "
                
                <div class='row align-items-center mb-3' style='height: 100px;'>
                
                <div class='col-3'>
                               

                        <img src='admin/item_images/$item_image1' alt='$item_title' class='img-fluid' style='max-height: 100px;'>
            
                        </div>
                    <div class='col-3'>
                        <h3>$item_title</h3>
                        <p>$item_description</p>
                    </div>
                    <div class='col-2'>
                        <h3>Rs.$item_price</h3>

                    </div>
                    </a>
                    <div class='col-1 m-3'>
                        <a href='additem_detail.php?item_id=$item_id'><button class='btn btn-success'>Details</button></a>
                    </div>
                          <div class='col-1 m-3'>
                       <a href='cart.php?remove_item=$item_id'> <button class='btn btn-danger'>Remove</button></a>
                    </div>
                </div>
                <hr>";
            }
        }
        
        if (isset($_GET['remove_item'])) {
        $delete_query = "delete from cart_details where item_id=$item_id";
        $delete_result = mysqli_query($connection, $delete_query);
            
        echo "<script>window.open('cart.php','_self')</script>";

        }
        ?>
    </div>
   
</div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#searchitem').keyup(function() {
                var query = $(this).val();
                if (query != '') {
                    $.ajax({
                        url: "search.php",
                        method: "POST",
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#searchlist').fadeIn();
                            $('#searchlist').html(data);
                        }
                    });
                } else {
                    $('#searchlist').fadeOut();
                    $('#searchlist').html("");
                }
            });
            $(document).on('click', '#searchlist ul li', function() {
                $('#searchitem').val($(this).text());
                $('#searchlist').fadeOut();
            });
        });
    </script>
    <?php include('./footer.php'); ?>
</body>

</html>