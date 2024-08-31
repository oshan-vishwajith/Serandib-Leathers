<?php

function getIPAddress()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function cartCount()
{
    global $connection;
    $ip = getIPAddress();
    $select_query = "select * from cart_details where ip_address='$ip'";
    $result_query = mysqli_query($connection, $select_query);
    $num_row = mysqli_num_rows($result_query);

    echo $num_row;
}


function addToCart()
{
    if (isset($_GET['add_to_cart'])) {
        if (!isset($_SESSION['username'])) {

            header('Location: ./user_area/user_login.php');
            exit();
        } else {
            global $connection;
            $ip = getIPAddress();
            $cart_item_id = $_GET['add_to_cart'];

            $select_query = "SELECT * FROM cart_details WHERE ip_address='$ip' AND item_id=$cart_item_id";
            $result_query = mysqli_query($connection, $select_query);
            $num_row = mysqli_num_rows($result_query);

            if ($num_row > 0) {
                echo "<script>alert('This Item is already Added to cart')</script>";
                echo "<script>window.open('item_detail.php?item_id=$cart_item_id','_self')</script>";
            } else {
                $insert_query = "INSERT INTO cart_details VALUES ($cart_item_id, '$ip')";
                $result_query = mysqli_query($connection, $insert_query);

                echo "<script>window.open('item_detail.php?item_id=$cart_item_id','_self')</script>";
            }
        }
    }
}




function loadItem()
{
    global $connection;
    $select_item = "SELECT * FROM item ORDER BY RAND()";
    $result_query = mysqli_query($connection, $select_item);

    while ($row = mysqli_fetch_assoc($result_query)) {
        $item_id = $row['item_id'];
        $item_title = $row['item_title'];
        $item_description = $row['item_description'];
        $category_id = $row['category_id'];
        $batch_id = $row['batch_id'];
        $item_price = $row['item_price'];
        $item_image1 = $row['item_image1'];

        echo "<div class='col-md-3 mx-4 my-3 pro'>
                <a href='item_detail.php?item_id=$item_id' class='card-link'>
                    <div class='card'>
                        <img src='admin/item_images/$item_image1' class='card-img-top' alt='$item_image1'>
                        <div class='card-body'>
                            <h5 class='card-title'>$item_title</h5>
                            <p>Rs. $item_price</p>
                            <a href='index.php?add_to_cart=$item_id' class='btn btn-primary'>Add To Cart</a>
                        </div>
                    </div>
                </a>
            </div>";
    }
}


function navbar()
{

    global $connection;


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
                         <li class='ff'><a href='?active'><i class='fa-solid fa-cart-shopping'></i><sup>";
        cartCount();
        echo "</sup></a></li>";
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
}

function itemSlider()
{
    global $connection;
    $select_item = "SELECT * FROM item ORDER BY RAND()";
    $result_query = mysqli_query($connection, $select_item);

    while ($row = mysqli_fetch_assoc($result_query)) {
        $item_id = $row['item_id'];
        $item_title = $row['item_title'];
        $item_description = $row['item_description'];
        $category_id = $row['category_id'];
        $batch_id = $row['batch_id'];
        $item_price = $row['item_price'];
        $item_image1 = $row['item_image1'];

        echo "<div class='pro'>
                <a href='item_detail.php?item_id=$item_id' class='card-link'>
                    <div class='card'>
                        <img src='admin/item_images/$item_image1' class='card-img-top' alt='$item_image1'>
                        <div class='card-body'>
                            <h5 class='card-title'>$item_title</h5>
                            <p>Rs. $item_price</p>
                            <a href='index.php?add_to_cart=$item_id' class='btn btn-warning'>Add To Cart</a>
                        </div>
                    </div>
                </a>
              </div>";
    }
}
